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

class v1_1_0 extends \phpbb\db\migration\migration
{
	/**
	 * Check whether this migration has already been installed.
	 *
	 * @return bool
	 */
	public function effectively_installed()
	{
		return isset($this->config['msu_version'])
			&& version_compare($this->config['msu_version'], '1.1.0', '>=');
	}

	/**
	 * Dependencies. Requires phpBB >= 3.3.0.
	 *
	 * @return array
	 */
	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v330\v330'];
	}

	/**
	 * Add configuration entries and the ACP module.
	 *
	 * @return array
	 */
	public function update_data()
	{
		return [
			// Global enable
			['config.add', ['msu_enabled', 1]],

			// Missing author banner
			['config.add', ['msu_show_missing', 1]],
			['config.add', ['msu_missing_message', 'MSU_DEFAULT_MISSING_MSG']],
			['config.add', ['msu_missing_color', '#cc0000']],

			// Inactive author banner
			['config.add', ['msu_show_inactive', 1]],
			['config.add', ['msu_inactive_days', 180]],
			['config.add', ['msu_inactive_message', 'MSU_DEFAULT_INACTIVE_MSG']],
			['config.add', ['msu_inactive_color', '#ff8800']],

			// Version marker
			['config.add', ['msu_version', '1.1.0']],

			// ACP module: parent category under "Extensions"
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_MSU_TITLE',
			]],

			// ACP module: settings mode under the category above
			['module.add', [
				'acp',
				'ACP_MSU_TITLE',
				[
					'module_basename' => '\verturin\missingtopicauthor\acp\main_module',
					'modes'           => ['settings'],
				],
			]],
		];
	}
}
