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
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php?mod=addDevice<?php echo '&menu=' . GET('menu');?>">Ger&auml;t hinzuf&uuml;gen</a>
		<div class="clearfix"></div>
	</div>
	<h2>Computer</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">PC001</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">PC002</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">PC003</a></li>
	</ul>
	<h2>Drucker</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">HP MP105</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">Canon i350</a></li>
	</ul>
	<h2>Router</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">DLINK 1</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">DLINK 2</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">FritzBox!</a></li>
	</ul>
</div>