<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php?mod=rooms">R&auml;ume</a></li>
		<li>>> <a href="index.php?mod=room">R001</a></li>
	</ul>
</div>
<div id="module">
	<h3>Ger&auml;t anlegen</h3>
	<?php
		require_once('php/additions.php');
		
		$step = POST('step');
		
		if ($step == 4) 
		{
			header('location:index.php?mod=room');
		}
		else if ($step == 3) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=create_device" method="post">
				<p>Attribut 1</p><input name="attribute1" type="text"/>
				<p>Attribut 2</p><input name="attribute2" type="text"/>
				<input name="step" value="4" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Speichern" />
				<input onClick="location.href = \'index.php?mod=room\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 2) 
		{
			
			echo '
			<!-- Device creation wizard - Step 2 -->
			<form action="index.php?mod=create_device" method="post">
				<p>Bezeichnung</p><input name="device_name" type="text"/>
				<br>
				<p>Lieferant</p><input name="supplier" type="text"/>
				<p>Hersteller</p><input name="manufactor" type="text"/>
				<p>Kaufdatum</p><input name="purchaseDate" type="text"/>
				<p>Gew&auml;hrleistung</p><input name="warranty" type="text"/>
				<p>Notiz</p><textarea name="description" rows=6 cols=30></textarea>
				<input name="step" value="3" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=room\'"; type="button" value="Abbrechen" />
			</form>
			<div class="clear" />
			';
		
		}
		else
		{
	
			echo '
			<!-- Device creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=create_device" method="post">
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/BluRayPlayer_Disc.png" /><p>Blu-ray Player</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Computer.png" /><p>Computer</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/HomeServer.png" /><p>Server</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/InkjetPrinter.png" /><p>Drucker</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Modem_Blue.png" /><p>Modem</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/NetBook.png" /><p>Notebook</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Smartphone.png" /><p>Mobiles Ger&auml;t</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/TVSetRetro.png" /><p>Fernseher</p></div>
				<input name="step" value="2" type="hidden" />
				<input onClick="location.href = \'index.php?mod=room\'"; type="button" value="Abbrechen" />
				<div class="clear" />
			</form>
			';
		
		}
	?>
</div>