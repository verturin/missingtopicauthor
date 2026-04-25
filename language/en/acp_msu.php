<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 * English ACP form strings.
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
	'ACP_MSU_SETTINGS_SAVED'        => 'Missing Topic Author settings have been saved.',
	'ACP_MSU_GENERAL'               => 'General settings',
	'ACP_MSU_ENABLE'                => 'Enable extension',
	'ACP_MSU_ENABLE_EXPLAIN'        => 'Master switch. When disabled, no banner will be displayed.',

	'ACP_MSU_MISSING_SECTION'       => 'Missing author banner',
	'ACP_MSU_MISSING_SECTION_EXPLAIN' => 'Shown when the topic author account has been deleted, deactivated, or is anonymous.',
	'ACP_MSU_SHOW_MISSING'          => 'Show banner for missing author',
	'ACP_MSU_MISSING_MESSAGE'       => 'Missing author message',
	'ACP_MSU_MISSING_MESSAGE_EXPLAIN' => 'Text displayed in the banner.',
	'ACP_MSU_MISSING_COLOR'         => 'Missing author banner color',
	'ACP_MSU_MISSING_COLOR_EXPLAIN' => 'Background color of the banner (hex format, e.g. #cc0000).',

	'ACP_MSU_INACTIVE_SECTION'      => 'Inactive author banner',
	'ACP_MSU_INACTIVE_SECTION_EXPLAIN' => 'Shown when the topic author has not visited the forum for more than the threshold.',
	'ACP_MSU_SHOW_INACTIVE'         => 'Show banner for inactive author',
	'ACP_MSU_INACTIVE_DAYS'         => 'Inactivity threshold (days)',
	'ACP_MSU_INACTIVE_DAYS_EXPLAIN' => 'Number of days since last visit after which the author is considered inactive. Set to 0 to disable.',
	'ACP_MSU_INACTIVE_MESSAGE'      => 'Inactive author message',
	'ACP_MSU_INACTIVE_MESSAGE_EXPLAIN' => 'Text displayed in the banner.',
	'ACP_MSU_INACTIVE_COLOR'        => 'Inactive author banner color',
	'ACP_MSU_INACTIVE_COLOR_EXPLAIN' => 'Background color of the banner (hex format, e.g. #ff8800).',
]);
