<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 * French install language strings.
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
	'MSU_REQUIRES_PHPBB' => 'Cette extension nécessite phpBB 3.3.0 ou supérieur.',
	'MSU_REQUIRES_PHP'   => 'Cette extension nécessite PHP 7.2.0 ou supérieur.',
]);
