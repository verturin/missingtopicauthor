<?php
/**
 *
 * Missing Topic Author. An extension for the phpBB Forum Software package.
 * French ACP form strings.
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
	'ACP_MSU_SETTINGS_SAVED'        => 'Les paramètres de l’extension ont été enregistrés.',
	'ACP_MSU_GENERAL'               => 'Paramètres généraux',
	'ACP_MSU_ENABLE'                => 'Activer l’extension',
	'ACP_MSU_ENABLE_EXPLAIN'        => 'Interrupteur principal. Lorsque désactivé, aucun bandeau n’est affiché.',

	'ACP_MSU_MISSING_SECTION'       => 'Bandeau "auteur absent"',
	'ACP_MSU_MISSING_SECTION_EXPLAIN' => 'Affiché lorsque le compte de l’auteur du sujet est supprimé, désactivé, ou anonyme.',
	'ACP_MSU_SHOW_MISSING'          => 'Afficher le bandeau "auteur absent"',
	'ACP_MSU_MISSING_MESSAGE'       => 'Message "auteur absent"',
	'ACP_MSU_MISSING_MESSAGE_EXPLAIN' => 'Texte affiché dans le bandeau.',
	'ACP_MSU_MISSING_COLOR'         => 'Couleur du bandeau "auteur absent"',
	'ACP_MSU_MISSING_COLOR_EXPLAIN' => 'Couleur de fond du bandeau (format hex, ex. #cc0000).',

	'ACP_MSU_INACTIVE_SECTION'      => 'Bandeau "auteur inactif"',
	'ACP_MSU_INACTIVE_SECTION_EXPLAIN' => 'Affiché lorsque l’auteur du sujet n’a pas visité le forum depuis plus que le seuil défini.',
	'ACP_MSU_SHOW_INACTIVE'         => 'Afficher le bandeau "auteur inactif"',
	'ACP_MSU_INACTIVE_DAYS'         => 'Seuil d’inactivité (jours)',
	'ACP_MSU_INACTIVE_DAYS_EXPLAIN' => 'Nombre de jours depuis la dernière visite au-delà duquel l’auteur est considéré comme inactif. Mettez 0 pour désactiver.',
	'ACP_MSU_INACTIVE_MESSAGE'      => 'Message "auteur inactif"',
	'ACP_MSU_INACTIVE_MESSAGE_EXPLAIN' => 'Texte affiché dans le bandeau.',
	'ACP_MSU_INACTIVE_COLOR'        => 'Couleur du bandeau "auteur inactif"',
	'ACP_MSU_INACTIVE_COLOR_EXPLAIN' => 'Couleur de fond du bandeau (format hex, ex. #ff8800).',
]);
