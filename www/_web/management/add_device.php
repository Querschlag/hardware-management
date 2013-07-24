<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=rooms">R&auml;ume</a></li>
		<li>>> <a href="index.php?mod=room">R001</a></li>
		<li>>> <a href="index.php?mod=device">Ger&auml;te</a></li>
		<li>>> <a href="index.php?mod=create_device">Ger&auml;t hinzuf&uuml;gen</a></li>
	</ul>
</div>
<div id="module">
	<h3>Ger&auml;t hinzuf&uuml;gen</h3>
	<?php
		require_once('php/additions.php');
		
		$step = POST('step');
		
		if ($step == 4) 
		{
			header('location:index.php?mod=room');
		}
		else if ($step == 3) 
		{
			
			/*
			 * FIXME: Just select a devices from storage and add it to room
			 */
			
			echo '
			<!-- Device adding wizard - Step 3 -->
			<h4>Benennung</h4>
			<form action="index.php?mod=addDevice" method="post">
				<p>1</p><input name="attribute2" type="text" value="PC004"/>
				<p>2</p><input name="attribute2" type="text" value="PC005"/>
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
			<!-- Device adding wizard - Step 2 -->
			<form action="index.php?mod=addDevice" method="post">
				<p>Ger&auml;t w&auml;hlen</p>
				<select name="device">
					<optgroup label="Ger&auml;t w&auml;hlen"></optgroup>
						<option value="0">Ger&auml;t 1</option>
						<option value="1">Ger&auml;t 2</option>
						<option value="2">Ger&auml;t 3</option>
				</select>
				<p>Anzahl</p><input name="itemCount" type="text"/>
				<input name="step" value="3" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=room\'"; type="button" value="Abbrechen" />
			</form>
			<div class="clearfix" />
			';
		
		}
		else
		{
	
			echo '
			<!-- Device adding wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=addDevice" method="post">
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
				<div class="clearfix" />
			</form>
			';
		
		}
	?>
</div>