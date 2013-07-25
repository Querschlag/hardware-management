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
	<div id="action_bar">
		<a class="left" href="index.php<?php echo navParams(null, 'addDevice'); ?>">Ger&auml;t hinzuf&uuml;gen</a>
		<div class="clearfix"></div>
	</div>
	<h2>Computer</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'device', null, 1); ?>">PC001</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 2); ?>">PC002</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 3); ?>">PC003</a></li>
	</ul>
	<h2>Drucker</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'device', null, 4); ?>">HP MP105</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 5); ?>">Canon i350</a></li>
	</ul>
	<h2>Router</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'device', null, 6); ?>">DLINK 1</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 7); ?>">DLINK 2</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 8); ?>">FritzBox!</a></li>
	</ul>
</div>