<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=user">Benutzer</a></li>
		<li>>> <a href="index.php?mod=createUser">Benutzer anlegen</a></li>
	</ul>
</div>
<div id="module">
	<h2>Benutzer anlegen</h2>
	<form action="index.php?mod=user" method="post">
		<p>Vorname</p><input name="firstName" type="text"/>
		<p>Nachname</p><input name="lastName" type="text"/>
		<p>Email</p><input name="email" type="email"/>
		<p>Gruppe</p>
		<select name="usergroup">
			<optgroup label="W&auml;hle eine Gruppe"></optgroup>
				<option value="0">Systembetreuer</option>
				<option value="1">Azubi</option>
				<option value="2">Lehrer</option>
				<option value="3">Verwaltung</option>
		</select>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="Anlegen" />
		<input  type="button" value="Abbrechen" onClick="location.href = 'index.php?mod=user'" />
	</form>
</div>