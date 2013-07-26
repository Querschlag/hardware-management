<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'user'), false) ?>">Benutzer</a></li>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'createUser'), false) ?>">Benutzer anlegen</a></li>
	</ul>
</div>
<div id="module">
	<h2>Benutzer anlegen</h2>
	<!--
		//TODO
		
		When providing this form with functionality, please modify the 'mod' parameter to point to the current
		module (see /php/navigation.php for more details), so you can make use of the auto appended id of
		user,room,device,component,supplier and so on.
		
		After doing your update and validation stuff use this:
		
			header( "Location: index.php" . echo navParams(array('mod' => '<upperModule>')) );
		
		to redirect to the page where you came or started the wizard from.
	-->
	<form action="index.php<?php echo navParams(array('mod' => 'user'), false) ?>" method="post">
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
		<input  type="button" value="Abbrechen" onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'user'), false) ?>'" />
	</form>
</div>