<?php
/**
 * Landing Pages as content extension
 *
 * @author Federico "Lox" Lucignano <federico(at)wikia-inc.com>
 * @author Łukasz 'TOR' Garczewski <tor(at)wikia-inc.com>
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This file is part of MediaWiki, it is not a valid entry point.\n";
	exit( 1 );
}

$app = F::app();
$dir = dirname( __FILE__ );

/**
 * info
 */
$app->wg->append(
	'wgExtensionCredits',
	array(
		"name" => "Landing Pages as content",
		"description" => "Landing Pages",
		"descriptionmsg" => "landingpagesascontent-desc",
		"url" => "http://help.wikia.com/wiki/Help:LendingPagesAsContent",
		"author" => array(
			'Federico "Lox" Lucignano <federico(at)wikia-inc.com>',
			'Łukasz \'TOR\' Garczewski <tor(at)wikia-inc.com>'
		)
	),
	'other'
);

/**
 * services
 */
$app->wg->set( 'wgAutoloadClasses', "{$dir}/LandingPagesParser.class.php", 'LandingPagesParser' );

/**
 * message files
 */
$app->wg->set( 'wgExtensionMessagesFiles', "{$dir}/LandingPagesAsContent.i18n.php", 'LandingPagesAsContent' );

/**
 * wikitext magic words
 */
define('__NORAIL__', '__NORAIL__');
define('__NONAV__', '__NONAV__');
define('__NOHEADER__', '__NOHEADER__');
define('__INTERLANGTOP__', '__INTERLANGTOP__');

/**
 * hooks
 */
$app->registerHook( 'LanguageGetMagic', 'LandingPagesParser', 'onLanguageGetMagicHook' );
$app->registerHook( 'InternalParseBeforeLinks', 'LandingPagesParser', 'onInternalParseBeforeLinksHook' );
//$app->registerHook( 'ArticleFromTitle', 'LandingPagesParser', 'onArticleFromTitle' );
$app->registerHook( 'ArticlePurge', 'LandingPagesParser', 'onArticlePurge' );
$app->registerHook( 'ArticleSaveComplete', 'LandingPagesParser', 'onArticleSaveComplete' );

/**
 * settings
 */
if ( empty( $app->wg->LandingPagesAsContentMagicWords ) ) {
	 $app->wg->LandingPagesAsContentMagicWords = array(
		__NORAIL__ => 'wgSuppressRail',
		__NONAV__ => 'wgSuppressWikiHeader',
		__NOHEADER__ => 'wgSuppressPageHeader',
		__INTERLANGTOP__ => 'wgInterlangOnTop',
	);
}
