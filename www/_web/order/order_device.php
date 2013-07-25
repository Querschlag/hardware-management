<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=order">Bestellungen</a></li>
		<li>>> <a href="index.php?mod=placeOrder">Bestellung anlegen</a></li>
		<li>>> <a href="index.php?mod=order_device">Ger&auml;te</a></li>
	</ul>
</div>
<div id="module">
	<h3>Ger&auml;t bestellen</h3>
	<?php
		require_once('php/additions.php');
		
		$step = POST('step');
		
		if ($step == 6) 
		{
			header('location:index.php?mod=order');
		}
		else if ($step == 5) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Wie viele Ger&auml;te bestellen?</h4>
			<form action="index.php?mod=order_device" method="post">
				<p>Anzahl</p><input name="itemCount" type="text"/>
				<input name="step" value="6" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Bestellen" />
				<input onClick="location.href = \'index.php?mod=order\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 4) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Komponenten</h4>
			<ul class="components">
				<li>Komponente 1</li>
				<li>Komponente 1</li>
				<li>Komponente 1</li>
			</ul>
			<form action="index.php?mod=order_component" method="post">
				<input name="step" value="4" type="hidden" />
				<input name="btnSubmit" type="submit" value="Komponente hinzuf&uuml;gen" />
			</form>
			<br>
			<br>
			<form action="index.php?mod=order_device" method="post">
				<input name="step" value="5" type="hidden" />
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=order\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 3) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=order_device" method="post">
				<p>Attribut 1</p><input name="attribute1" type="text"/>
				<p>Attribut 2</p><input name="attribute2" type="text"/>
				<input name="step" value="4" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=order\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 2) 
		{
			
			echo '
			<!-- Device creation wizard - Step 2 -->
			<form action="index.php?mod=order_device" method="post">
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
				<input onClick="location.href = \'index.php?mod=order\'"; type="button" value="Abbrechen" />
			</form>
			<div class="clearfix" />
			';
		
		}
		else
		{
	
			echo '
			<!-- Device creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=order_device" method="post">
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/BluRayPlayer_Disc.png" /><p>Blu-ray Player</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Computer.png" /><p>Computer</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/HomeServer.png" /><p>Server</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/InkjetPrinter.png" /><p>Drucker</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Modem_Blue.png" /><p>Modem</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/NetBook.png" /><p>Notebook</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Smartphone.png" /><p>Mobiles Ger&auml;t</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/TVSetRetro.png" /><p>Fernseher</p></div>
				<input name="step" value="2" type="hidden" />
				<input onClick="location.href = \'index.php?mod=order\'"; type="button" value="Abbrechen" />
				<div class="clearfix" />
			</form>
			';
		
		}
	?>
</div>