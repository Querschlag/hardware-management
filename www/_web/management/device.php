<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
	</ul>
</div>
<div id="module">
	<div id="action_bar"><!-- Params -->
		<a class="left" href="index.php?mod=addComponent<?php echo '&menu=' . GET('menu');?>">Komponente hinzuf&uuml;gen</a>
		<a class="right destructiveButton" href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">Ausmustern</a>
		<a class="right" href="index.php?mod=create_room<?php echo '&menu=' . GET('menu');?>">Problem melden</a>
		<a class="right" href="index.php?mod=create_room<?php echo '&menu=' . GET('menu');?>">Probleme: 2</a>
		<div class="clearfix"></div>
	</div>
	<h2>Komponenten</h2>
	<ul class="components">
		<li><a href="index.php<?php echo navParams(null, 'component', null, null, 1); ?>">Komponente 1</a></li>
		<li><a href="index.php<?php echo navParams(null, 'component', null, null, 2); ?>">Komponente 2</a></li>
		<li><a href="index.php<?php echo navParams(null, 'component', null, null, 3); ?>">Komponente 3</a></li>
	</ul>
	<hr>
	<h2>Wartungshistorie</h2>
	<ul class="support_event">
		<li style="background-color:#eee">12.07.2013 - Wartungsfall gemeldet: Geh&auml;use kaputt</li>
		<li style="background-color:#ddd">15.07.2013 - Bearbeitung durch Azubi (Otto)</li>
		<li style="background-color:#eee">17.07.2013 - Wartungsfall behoben.</li>
	</ul>
</div>