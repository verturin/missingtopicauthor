<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 verturin
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

namespace verturin\missingtopicauthor\acp;

class main_info
{
	/**
	 * Module information for the ACP.
	 *
	 * @return array
	 */
	public function module()
	{
		return [
			'filename' => '\verturin\missingtopicauthor\acp\main_module',
			'title'    => 'ACP_MSU_TITLE',
			'modes'    => [
				'settings' => [
					'title' => 'ACP_MSU_SETTINGS',
					'auth'  => 'ext_verturin/missingtopicauthor && acl_a_board',
					'cat'   => ['ACP_MSU_TITLE'],
				],
			],
		];
	}
}
