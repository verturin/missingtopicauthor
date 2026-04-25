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
	/**
	 * Check whether the extension can be enabled.
	 * Requires phpBB >= 3.3.0 and PHP >= 7.2.
	 *
	 * @return array|bool
	 */
	public function is_enableable()
	{
		$errors = [];

		if (phpbb_version_compare(PHPBB_VERSION, '3.3.0', '<'))
		{
			$errors[] = 'This extension requires phpBB 3.3.0 or newer.';
		}

		if (phpbb_version_compare(PHP_VERSION, '7.2.0', '<'))
		{
			$errors[] = 'This extension requires PHP 7.2.0 or newer.';
		}

		return empty($errors) ? true : $errors;
	}
}
