<div id="WikiWelcome" class="WikiWelcome">
	<h1><?= wfMsg('cnw-welcome-headline', $wgSitename) ?></h1>
	<p><?= wfMsg('cnw-welcome-instruction1') ?></p>
	<?= Wikia::specialPageLink('CreatePage', 'button-createpage', 'wikia-button createpage', 'blank.gif', 'oasis-create-page', 'sprite new'); ?>
	<p><?= wfMsg('cnw-welcome-instruction2') ?></p>
	<p class="help"><?= wfMsg('cnw-welcome-help') ?></p>
</div>