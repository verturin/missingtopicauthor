<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 * French translation - public strings.
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
	'MSU_LAST_POST'  => 'Dernier message',
	'MSU_LAST_VISIT' => 'Dernière visite',
	'MSU_DAYS_AWAY'  => [
		1 => 'Absent depuis %d jour',
		2 => 'Absent depuis %d jours',
	],

	'MSU_DEFAULT_MISSING_MSG'  => '⚠️ L’auteur de ce sujet n’est plus membre du forum.',
	'MSU_DEFAULT_INACTIVE_MSG' => 'ℹ️ L’auteur de ce sujet n’a pas visité le forum depuis un certain temps. Il risque de ne pas répondre tout suite.',
]);
