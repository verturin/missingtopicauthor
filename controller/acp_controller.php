<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 verturin
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

namespace verturin\missingtopicauthor\controller;

class acp_controller
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string */
	protected $u_action;

	/**
	 * Constructor
	 */
	public function __construct(
		\phpbb\config\config $config,
		\phpbb\language\language $language,
		\phpbb\request\request $request,
		\phpbb\template\template $template
	)
	{
		$this->config = $config;
		$this->language = $language;
		$this->request = $request;
		$this->template = $template;
	}

	/**
	 * Set custom form action URL.
	 *
	 * @param string $u_action
	 * @return void
	 */
	public function set_u_action($u_action)
	{
		$this->u_action = $u_action;
	}

	/**
	 * Display and handle the ACP settings form.
	 *
	 * @return void
	 */
	public function display_settings()
	{
		$this->language->add_lang('acp_msu', 'verturin/missingtopicauthor');
		// 'common' contains MSU_DEFAULT_MISSING_MSG / MSU_DEFAULT_INACTIVE_MSG
		$this->language->add_lang('common', 'verturin/missingtopicauthor');

		add_form_key('verturin_msu_acp');

		// Handle form submission
		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('verturin_msu_acp'))
			{
				trigger_error($this->language->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			$inactive_days = max(0, (int) $this->request->variable('msu_inactive_days', 30));

			$this->config->set('msu_enabled', $this->request->variable('msu_enabled', 0));
			$this->config->set('msu_show_missing', $this->request->variable('msu_show_missing', 0));
			$this->config->set('msu_show_inactive', $this->request->variable('msu_show_inactive', 0));
			$this->config->set('msu_inactive_days', $inactive_days);

			// If the submitted text matches the translation of the default key,
			// re-store the language key so it stays multi-lingual.
			// Otherwise, store the customized text as-is.
			$missing_input = $this->request->variable('msu_missing_message', '', true);
			$this->config->set('msu_missing_message', $this->normalize_message($missing_input, 'MSU_DEFAULT_MISSING_MSG'));
			$this->config->set('msu_missing_color', $this->sanitize_color($this->request->variable('msu_missing_color', '#cc0000')));

			$inactive_input = $this->request->variable('msu_inactive_message', '', true);
			$this->config->set('msu_inactive_message', $this->normalize_message($inactive_input, 'MSU_DEFAULT_INACTIVE_MSG'));
			$this->config->set('msu_inactive_color', $this->sanitize_color($this->request->variable('msu_inactive_color', '#ff8800')));

			trigger_error($this->language->lang('ACP_MSU_SETTINGS_SAVED') . adm_back_link($this->u_action));
		}

		// Resolve stored values for display (turn language keys into translated text)
		$missing_message  = (string) $this->config['msu_missing_message'];
		$inactive_message = (string) $this->config['msu_inactive_message'];

		// Assign current values to template
		$this->template->assign_vars([
			'U_ACTION'             => $this->u_action,

			'MSU_ENABLED'          => (bool) $this->config['msu_enabled'],
			'MSU_SHOW_MISSING'     => (bool) $this->config['msu_show_missing'],
			'MSU_SHOW_INACTIVE'    => (bool) $this->config['msu_show_inactive'],
			'MSU_INACTIVE_DAYS'    => (int) $this->config['msu_inactive_days'],

			'MSU_MISSING_MESSAGE'  => $this->resolve_message($missing_message),
			'MSU_MISSING_COLOR'    => (string) $this->config['msu_missing_color'],

			'MSU_INACTIVE_MESSAGE' => $this->resolve_message($inactive_message),
			'MSU_INACTIVE_COLOR'   => (string) $this->config['msu_inactive_color'],
		]);
	}

	/**
	 * Convert a stored value into displayable text.
	 * If the value is a default-message language key, return its translation.
	 *
	 * @param string $message
	 * @return string
	 */
	protected function resolve_message($message)
	{
		if (preg_match('/^MSU_DEFAULT_[A-Z_]+$/', (string) $message))
		{
			return $this->language->lang($message);
		}
		return (string) $message;
	}

	/**
	 * If the submitted text matches the translation of the default key
	 * (in the current language), store the key instead of the text.
	 * This keeps the banner translatable when the admin hasn't customized it.
	 *
	 * @param string $submitted_text
	 * @param string $default_key
	 * @return string
	 */
	protected function normalize_message($submitted_text, $default_key)
	{
		$submitted_text = trim((string) $submitted_text);
		if ($submitted_text === '' || $submitted_text === trim($this->language->lang($default_key)))
		{
			return $default_key;
		}
		return $submitted_text;
	}

	/**
	 * Validate a hex color value. Falls back to a safe default on invalid input.
	 *
	 * @param string $color
	 * @return string
	 */
	protected function sanitize_color($color)
	{
		$color = trim((string) $color);
		return preg_match('/^#[0-9a-fA-F]{6}$/', $color) ? $color : '#cc0000';
	}
}
