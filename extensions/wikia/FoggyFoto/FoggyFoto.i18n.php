<?php
/**
 * Internationalisation file for Special:FoggyFoto extension / game.
 *
 * @addtogroup Extensions
 */

$messages = array();

$messages['en'] = array(
	'foggyfoto' => 'Foggy Foto game',
	'foggyfoto-desc' => 'Creates a page where the Foggy Foto game can be played in HTML5 + Canvas. It will be accessible via Nirvana\'s APIs',
	'foggyfoto-score' => 'Score: <span>$1</span>',
	'foggyfoto-progress' => 'Photos: <span>$1</span>',
	'foggyfoto-progress-numbers' => '$1/$2',
);

/** Message documentation (Message documentation)
 *
 */
$messages['qqq'] = array(
	'foggyfoto-progress' => 'Parameters:
* $1 is replaced with {{msg-wikia|foggyfoto-progress-numbers}}.',
	'foggyfoto-progress-numbers' => 'This is the format of the numbers that will be substituted into the "$1" portion of {{msg-wikia|foggyfoto-progress}}. Parameters:
* $1 is what number photo the player is on (starting with 1)
* $2 is the total number of photos in a round of the game.',
	'foggyfoto' => 'Special page name for "Foggy Foto" game.',
	'foggyfoto-desc' => '{{desc}}',
);
