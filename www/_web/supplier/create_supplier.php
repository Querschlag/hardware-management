<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>">Lieferanten</a></li>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'createSupplier'), false) ?>">Lieferant anlegen</a></li>
	</ul>
</div>
<div id="module">
	<h2>Lieferant anlegen</h2>
	<!--
		//TODO
		
		When providing this form with functionality, please modify the 'mod' parameter to point to the current
		module (see /php/navigation.php for more details), so you can make use of the auto appended id of
		user,room,device,component,supplier and so on.
		
		After doing your update and validation stuff use this:
		
			header( "Location: index.php" . echo navParams(array('mod' => '<upperModule>')) );
		
		to redirect to the page where you came or started the wizard from.
	-->
	<form action="index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>" method="post">
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
		<input name="btnSubmit" type="submit" value="Anlegen" />
		<input  type="button" value="Abbrechen" onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>'" />
	</form>
</div>