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

class v1_2_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['msu_display_mode']);
	}

	public static function depends_on()
	{
		return ['\verturin\missingtopicauthor\migrations\v1_1_1'];
	}

	public function update_data()
	{
		return [
			['config.add', ['msu_display_mode', 'first']],
		];
	}
}
