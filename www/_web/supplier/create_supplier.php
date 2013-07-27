<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?menu=management&mod=rooms">Stammdaten</a></li>
		<li>>> <a href="index.php?mod=supplier">Lieferant</a></li>
		<li>>> <a href="index.php?mod=createSupplier">Lieferant anlegen</a></li>
	</ul>
</div>
<div id="module">
	<h2>Lieferant anlegen</h2>
	<form action="index.php?mod=supplier" method="post">
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
		<input  type="button" value="Abbrechen" onClick="location.href = 'index.php?mod=supplier'" />
	</form>
</div>