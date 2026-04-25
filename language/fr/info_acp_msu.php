<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 * French ACP module titles (auto-loaded).
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
	'ACP_MSU_TITLE'    => 'Auteur de sujet absent',
	'ACP_MSU_SETTINGS' => 'Paramètres',
]);
