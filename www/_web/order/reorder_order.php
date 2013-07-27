<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=order">Bestellungen</a></li>
		<li>>> <a href="index.php?mod=modifyOrder&id=1">Bestellung: PC</a></li>
		<li>>> <a href="index.php?mod=confirmOrder&id=1">Nachbestellen</a></li>
	</ul>
</div>
<div id="module">
	<h3>Nachbestellen</h3>
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<form action="index.php?mod=modifyOrder&id=1" method="post">
		<p>Anzahl</p>
		<input name="itemCount" type="text"/>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="Nachbestellen" />
		<input onClick="location.href = 'index.php?mod=modifyOrder&id=1'" type="button" value="Abbrechen" />
	</form>
</div>