<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 verturin
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

namespace verturin\missingtopicauthor;

class ext extends \phpbb\extension\base
{
	public function is_enableable()
	{
		$errors = [];

		$language = $this->container->get('language');
		$language->add_lang('install_lang', 'verturin/missingtopicauthor');

		if (phpbb_version_compare(PHPBB_VERSION, '3.3.0', '<'))
		{
			$errors[] = $language->lang('MSU_REQUIRES_PHPBB');
		}

		if (phpbb_version_compare(PHP_VERSION, '7.2.0', '<'))
		{
			$errors[] = $language->lang('MSU_REQUIRES_PHP');
		}

		return empty($errors) ? true : $errors;
	}
}
