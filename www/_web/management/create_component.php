<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php?mod=rooms">R&auml;ume</a></li>
		<li>>> <a href="index.php?mod=component">R001</a></li>
		<li>>> <a href="index.php?mod=device">PC001</a></li>
	</ul>
</div>
<div id="module">
	<h3>Komponente anlegen</h3>
	<?php
		require_once('php/additions.php');
		
		$step = POST('step');
		
		if ($step == 3) 
		{
			header('location:index.php?mod=device');
		}
		else if ($step == 2) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=create_component" method="post">
				<p>Attribut 1</p><input name="attribute1" type="text"/>
				<p>Attribut 2</p><input name="attribute2" type="text"/>
				<input name="step" value="3" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Speichern" />
				<input onClick="location.href = \'index.php?mod=device\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else
		{
	
			echo '
			<!-- Device creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=create_component" method="post">
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/Chip1.png" /><p>Prozessor</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/EthernetCable.png" /><p>Ethernet Kabel</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/Motherboard.png" /><p>Motherboard</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/RCAConnector_Plug.png" /><p>Audio Anschluss</p></div>
				<input name="step" value="2" type="hidden" />
				<div class="clear" />
				<input onClick="location.href = \'index.php?mod=device\'"; type="button" value="Abbrechen" />
			</form>
			';
		
		}
	?>
</div>