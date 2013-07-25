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
		<li>>> <a href="index.php?mod=component<?php echo '&menu=' . GET('menu');?>">Komponente1</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="right destructiveButton" href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">Ausmustern</a>
		<div class="clearfix"></div>
	</div>
	<h2>Eigenschaften</h2>
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<form action="index.php?mod=device" method="post">
		<p>Attribut 1</p><input name="attribut1" type="text" />
		<p>Attribut 2</p><input name="attribut1" type="text" />
		<p>Attribut 3</p><input name="attribut1" type="text" />
		<input name="btnSubmit" type="submit" value="Speichern" />
	</form>

</div>