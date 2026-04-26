<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 verturin
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

namespace verturin\missingtopicauthor\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var array|false Cache SQL — une seule requête par page */
	protected static $author_row = null;

	/** @var bool */
	protected static $fetched = false;

	/** @var bool Premier post de la page déjà traité */
	protected static $first_done = false;

	public function __construct(
		\phpbb\db\driver\driver_interface $db,
		\phpbb\config\config $config,
		\phpbb\user $user,
		\phpbb\language\language $language
	)
	{
		$this->db       = $db;
		$this->config   = $config;
		$this->user     = $user;
		$this->language = $language;
	}

	public static function getSubscribedEvents()
	{
		return [
			'core.user_setup'                => 'load_language_on_setup',
			'core.viewtopic_modify_post_row' => 'handle_post_row',
		];
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'verturin/missingtopicauthor',
			'lang_set' => 'common',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function handle_post_row($event)
	{
		if (empty($this->config['msu_enabled']))
		{
			return;
		}

		// Mode "premier post uniquement" : on ignore les posts suivants
		$display_mode = $this->config['msu_display_mode'] ?? 'all';
		if ($display_mode === 'first' && self::$first_done)
		{
			return;
		}

		// Une seule requête SQL pour toute la page
		if (!self::$fetched)
		{
			self::$fetched = true;
			$user_id       = (int) $event['topic_data']['topic_poster'];

			$sql              = 'SELECT user_lastvisit, user_type FROM ' . USERS_TABLE . ' WHERE user_id = ' . $user_id;
			$result           = $this->db->sql_query($sql);
			self::$author_row = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);

			if (self::$author_row && (int) self::$author_row['user_type'] === USER_IGNORE)
			{
				self::$author_row = false;
			}
		}

		$post_row = $event['post_row'];

		// Bandeau rouge : compte supprimé ou anonymisé
		if (!self::$author_row)
		{
			if (!empty($this->config['msu_show_missing']))
			{
				$post_row['MSU_SHOW_MISSING']  = true;
				$post_row['MSU_MISSING_MSG']   = $this->resolve_message($this->config['msu_missing_message']);
				$post_row['MSU_MISSING_COLOR'] = $this->config['msu_missing_color'];
				self::$first_done = true;
			}
			$event['post_row'] = $post_row;
			return;
		}

		// Bandeau orange : pas connecté depuis XX jours
		$threshold_days = (int) $this->config['msu_inactive_days'];
		if ($threshold_days > 0 && !empty($this->config['msu_show_inactive']))
		{
			$last_visit = (int) self::$author_row['user_lastvisit'];

			if ($last_visit > 0 && (time() - $last_visit) > ($threshold_days * 86400))
			{
				$days_away = (int) floor((time() - $last_visit) / 86400);

				$post_row['MSU_SHOW_INACTIVE']  = true;
				$post_row['MSU_INACTIVE_MSG']   = $this->resolve_message($this->config['msu_inactive_message']);
				$post_row['MSU_INACTIVE_COLOR'] = $this->config['msu_inactive_color'];
				$post_row['MSU_INACTIVE_TEXT']  = $this->language->lang('MSU_DAYS_AWAY', $days_away);
				$post_row['MSU_LAST_VISIT']     = $this->user->format_date($last_visit);
				self::$first_done = true;
			}
		}

		$event['post_row'] = $post_row;
	}

	protected function resolve_message($message)
	{
		if (preg_match('/^MSU_DEFAULT_[A-Z_]+$/', (string) $message))
		{
			return $this->language->lang($message);
		}
		return (string) $message;
	}
}
