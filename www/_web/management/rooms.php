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
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php?mod=createRoom<?php echo '&menu=' . GET('menu');?>">Raum hinzuf&uuml;gen</a>
		<div class="clearfix"></div>
	</div>
	<h2>Erdgeschoss</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R001</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R002</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R003</a></li>
	</ul>
	<h2>Stockwerk 1</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R101</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R102</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R103</a></li>
	</ul>
	<h2>Stockwerk 2</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R201</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R202</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R203</a></li>
	</ul>
</div>