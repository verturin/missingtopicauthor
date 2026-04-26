<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 * English install language strings.
 *
 * @copyright (c) 2026 verturin
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'MSU_REQUIRES_PHPBB' => 'This extension requires phpBB 3.3.0 or newer.',
	'MSU_REQUIRES_PHP'   => 'This extension requires PHP 7.2.0 or newer.',
]);
