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
		<p>Benutzername</p><input name="name" type="text"/>
		<p>Passwort</p><input name="name" type="password"/>
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
		<input onClick="location.href = 'index.php?mod=user'"; type="button" value="Abbrechen" />
	</form>
</div>