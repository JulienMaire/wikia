<?= wfRenderModule( 'Footer', 'Menu', array( 'items' => $toolbar )); ?>
<li class="menu overflow-menu" style="display:none">
	<span class="arrow-icon-ctr"><span class="arrow-icon arrow-icon-top"></span><span class="arrow-icon arrow-icon-bottom"></span></span>
	<a href="#"><?= wfMsg('oasis-toolbar-more') ?></a>
	<ul class="tools-menu"></ul>
</li>