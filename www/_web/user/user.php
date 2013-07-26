<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=user">Benutzer</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php?mod=createUser">Neuer Benutzer</a>
		<div class="clearfix"></div>
	</div>
	<h2>Benutzer</h2>
	<ul class="orders">
		<li style="background-color: #eee"><a href="index.php?mod=editUser&id=1">Bernd (Systembetreuer)</a></li>
		<li style="background-color: #ddd"><a href="index.php?mod=editUser&id=2">Otto (Azubi)</a></li>
		<li style="background-color: #eee"><a href="index.php?mod=editUser&id=3">Richard (Lehrer)</a></li>
		<li style="background-color: #ddd"><a href="index.php?mod=editUser&id=4">Bianca (Verwaltung)</a></li>
	</ul>
</div>