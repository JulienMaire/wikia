<?php

$app = F::app();
$dir = dirname(__FILE__) . '/';

$wgExtensionCredits['specialpage'][] = array(
    'path' => __FILE__,
    'name' => 'WikiMap',
    'author' => 'Piotr Ożga',
    'descriptionmsg' => 'wikiMap-desc'
);

$wgExtensionMessagesFiles['WikiMapAliases'] = $dir . 'WikiMap.alias.php';

$app->registerClass('wikiMap', $dir . 'wikiMap.class.php');
$app->registerClass('wikiMapSpecialController', $dir . 'wikiMapSpecialController.class.php');
$app->registerSpecialPage('WikiMap', 'wikiMapSpecialController');
$app->registerExtensionMessageFile('wikiMap', $dir . 'wikiMap.i18n.php');