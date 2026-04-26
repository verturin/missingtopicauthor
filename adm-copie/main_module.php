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

class main_module
{
	/** @var string */
	public $u_action;

	/** @var string */
	public $tpl_name;

	/** @var string */
	public $page_title;

	/**
	 * Main entry point for the ACP module.
	 *
	 * @param int    $id
	 * @param string $mode
	 * @return void
	 */
	public function main($id, $mode)
	{
		global $phpbb_container;

		/** @var \verturin\missingtopicauthor\controller\acp_controller $acp_controller */
		$acp_controller = $phpbb_container->get('verturin.missingtopicauthor.acp.controller');

		$this->tpl_name = 'acp_msu_body';
		$this->page_title = 'ACP_MSU_TITLE';

		$acp_controller->set_u_action($this->u_action);
		$acp_controller->display_settings();
	}
}
