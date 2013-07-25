<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<?php
			require_once('php/additions.php');
		
			$menuItem = GET('menu');
			
			echo '<li>>> <a href="index.php?mod=rooms&menu=$menuItem">';
			
			if ($menuItem == 'scrap')
				echo 'Ausmustern';
			else if ($menuItem == 'maintenance')
				echo 'Wartung';
			else if ($menuItem == 'reporting')
				echo 'Reporting';
			else if ($menuItem == 'management')
				echo 'Stammdaten';
			
			echo '</a></li>';
		?>
		<li>>> <a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R001</a></li>
		<li>>> <a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">PC001</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php?mod=addComponent<?php echo '&menu=' . GET('menu');?>">Komponente hinzuf&uuml;gen</a>
		<a class="right destructiveButton" href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">Ausmustern</a>
		<a class="right" href="index.php?mod=create_room<?php echo '&menu=' . GET('menu');?>">Problem melden</a>
		<a class="right" href="index.php?mod=create_room<?php echo '&menu=' . GET('menu');?>">Probleme: 2</a>
		<div class="clearfix"></div>
	</div>
	<h2>Komponenten</h2>
	<ul class="components">
		<li><a href="index.php?mod=component<?php echo '&menu=' . GET('menu');?>">Komponente 1</a></li>
		<li><a href="index.php?mod=component<?php echo '&menu=' . GET('menu');?>">Komponente 1</a></li>
		<li><a href="index.php?mod=component<?php echo '&menu=' . GET('menu');?>">Komponente 1</a></li>
	</ul>
	<hr>
	<h2>Wartungshistorie</h2>
	<ul class="support_event">
		<li style="background-color:#eee">12.07.2013 - Wartungsfall gemeldet: Geh&auml;use kaputt</li>
		<li style="background-color:#ddd">15.07.2013 - Bearbeitung durch Azubi (Otto)</li>
		<li style="background-color:#eee">17.07.2013 - Wartungsfall behoben.</li>
	</ul>
</div>