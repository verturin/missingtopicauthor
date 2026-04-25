<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 * English translation - public strings.
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
	'MSU_LAST_POST'  => 'Last post',
	'MSU_LAST_VISIT' => 'Last visit',
	'MSU_DAYS_AWAY'  => [
		1 => 'Away for %d day',
		2 => 'Away for %d days',
	],

	'MSU_DEFAULT_MISSING_MSG'  => '⚠️ The author of this topic is no longer a member of the forum.',
	'MSU_DEFAULT_INACTIVE_MSG' => 'ℹ️ The author of this topic has not visited the forum for a while. They may not respond right away.',
]);
