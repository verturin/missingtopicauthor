<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 verturin
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

namespace verturin\missingtopicauthor\migrations;

class v1_1_1 extends \phpbb\db\migration\migration
{
	/**
	 * Check whether this migration has already been installed.
	 *
	 * @return bool
	 */
	public function effectively_installed()
	{
		return isset($this->config['msu_version'])
			&& version_compare($this->config['msu_version'], '1.1.1', '>=');
	}

	/**
	 * Depends on the previous migration.
	 *
	 * @return array
	 */
	public static function depends_on()
	{
		return ['\verturin\missingtopicauthor\migrations\v1_1_0'];
	}

	/**
	 * Replace hard-coded English defaults with language keys
	 * so the banner text gets translated according to the user's language.
	 *
	 * @return array
	 */
	public function update_data()
	{
		return [
			['custom', [[$this, 'migrate_default_messages']]],
			['config.update', ['msu_version', '1.1.1']],
		];
	}

	/**
	 * Replace stored messages with language keys IF they still match the old hard-coded defaults.
	 * If the admin already customized them, leave the custom text untouched.
	 *
	 * @return void
	 */
	public function migrate_default_messages()
	{
		$old_missing  = '⚠️ The author of this topic is no longer a member of the forum.';
		$old_inactive = 'ℹ️ The author of this topic has not visited the forum for a while.';

		if (isset($this->config['msu_missing_message'])
			&& $this->config['msu_missing_message'] === $old_missing)
		{
			$this->config->set('msu_missing_message', 'MSU_DEFAULT_MISSING_MSG');
		}

		if (isset($this->config['msu_inactive_message'])
			&& $this->config['msu_inactive_message'] === $old_inactive)
		{
			$this->config->set('msu_inactive_message', 'MSU_DEFAULT_INACTIVE_MSG');
		}
	}
}
