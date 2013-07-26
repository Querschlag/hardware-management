<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'user'), false) ?>">Benutzer</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php<?php echo navParams(array('mod' => 'createUser'), false) ?>">Neuer Benutzer</a>
		<div class="clearfix"></div>
	</div>
	<h2>Benutzer</h2>
	<ul class="orders">
		<li style="background-color: #eee"><a href="index.php<?php echo navParams(array('mod' => 'editUser', 'user' => 1)) ?>">Bernd (Systembetreuer)</a></li>
		<li style="background-color: #ddd"><a href="index.php<?php echo navParams(array('mod' => 'editUser', 'user' => 2)) ?>">Otto (Azubi)</a></li>
		<li style="background-color: #eee"><a href="index.php<?php echo navParams(array('mod' => 'editUser', 'user' => 3)) ?>">Richard (Lehrer)</a></li>
		<li style="background-color: #ddd"><a href="index.php<?php echo navParams(array('mod' => 'editUser', 'user' => 4)) ?>">Bianca (Verwaltung)</a></li>
	</ul>
</div>