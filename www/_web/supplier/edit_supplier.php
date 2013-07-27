<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>

	<!--		
		<li><a href="index.php?menu=management&mod=rooms">Stammdaten</a></li>
		<li>>> <a href="index.php?mod=supplier">Lieferant</a></li>
		<li>>> <a href="">Lieferant bearbeiten</a></li>
	-->
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>">Lieferanten</a></li>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'supplier')) ?>">Lieferant bearbeiten</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="right destructiveButton" href="index.php?mod=supplier">Lieferant l&ouml;schen</a>
		<div class="clearfix"></div>
	</div>
	<h2>DHL</h2>
	<!--
		//TODO
		
		When providing this form with functionality, please modify the 'mod' parameter to point to the current
		module (see /php/navigation.php for more details), so you can make use of the auto appended id of
		user,room,device,component,supplier and so on.
		
		After doing your update and validation stuff use this:
		
			header( "Location: index.php" . echo navParams(array('mod' => '<upperModule>')) );
		
		to redirect to the page where you came or started the wizard from.
	-->
	<form action="index.php<?php echo navParams(array('mod' => 'supplier')) ?>" method="post">
		<p>Firmenname</p><input name="name" type="text"/>
		<p>Postleitzahl</p><input name="Plz" type="text"/>
		<p>Ort</p><input name="Ort" type="text"/>
		<p>Land</p><input name="Land" type="text"/>
		<p>Telefon</p><input name="Tel" type="text"/>
		<p>Mobiltelefon</p><input name="Mobil" type="text"/>
		<p>Fax</p><input name="fax" type="text"/>
		<p>Email</p><input name="email" type="email"/>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="&Uuml;bernehmen" />
		<input onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>'" type="button" value="Abbrechen" />
	</form>
</div>