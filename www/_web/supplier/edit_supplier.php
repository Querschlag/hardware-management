<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>

		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=supplier">Lieferant</a></li>
		<li>>> <a href="index.php?mod=createSupplier"></a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="right destructiveButton" href="index.php?mod=supplier">Lieferant l&ouml;schen</a>
		<div class="clearfix"></div>
	</div>
	<h2>DHL</h2>
	<form action="index.php?mod=supplier" method="post">
		<p>Firmenname</p><input name="name" type="text"/>
		<p>Postleitzahl</p><input name="Plz" type="text"/>
		<p>Ort</p><input name="Ort" type="text"/>
		<p>Telefon</p><input name="Tel" type="text"/>
		<p>Mobiltelefon</p><input name="Mobil" type="text"/>
		<p>Fax</p><input name="fax" type="text"/>
		<p>Email</p><input name="email" type="email"/>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="&Uuml;bernehmen" />
		<input onClick="location.href = 'index.php?mod=supplier'"; type="button" value="Abbrechen" />
	</form>
</div>