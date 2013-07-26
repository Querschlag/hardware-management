<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=stock">Neubeschaffung</a></li>
		<li>>> <a href="index.php?mod=storeComponent">Ger&auml;t anlegen</a></li>
	</ul>
</div>
<div id="module">
	<h3>Komponente anlegen</h3>
	<!--
		//TODO
		
		When providing this form with functionality, please modify the 'mod' parameter to point to the current
		module (see /php/navigation.php for more details), so you can make use of the auto appended id of
		user,room,device,component,supplier and so on.
		
		After doing your update and validation stuff use this:
		
			header( "Location: index.php" . echo navParams(array('mod' => '<upperModule>')) );
		
		to redirect to the page where you came or started the wizard from.
	-->
	<?php
		require_once('php/additions.php');
		
		$step = POST('step');
		
		if ($step == 3) 
		{
			header('location:index.php?mod=stock');
		}
		else if ($step == 2) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=storeComponent" method="post">
				<p>Attribut 1</p><input name="attribute1" type="text"/>
				<p>Attribut 2</p><input name="attribute2" type="text"/>
				<input name="step" value="3" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Anlegen" />
				<input onClick="location.href = \'index.php?mod=stock\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else
		{
	
			echo '
			<!-- Device creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=storeComponent" method="post">
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/Chip1.png" /><p>Prozessor</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/EthernetCable.png" /><p>Ethernet Kabel</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/Motherboard.png" /><p>Motherboard</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/RCAConnector_Plug.png" /><p>Audio Anschluss</p></div>
				<input name="step" value="2" type="hidden" />
				<div class="clearfix" />
				<input onClick="location.href = \'index.php?mod=stock\'"; type="button" value="Abbrechen" />
			</form>
			';
		
		}
	?>
</div>