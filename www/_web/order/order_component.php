<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=order">Bestellungen</a></li>
		<li>>> <a href="index.php?mod=placeOrder">Bestellung anlegen</a></li>
		<li>>> <a href="index.php?mod=order_component">Komponenten</a></li>
	</ul>
</div>
<div id="module">
<?php


$step = POST('step');

 if ($step == 2) 
		{
			echo '
			<div class="progress">
			<ol>
			
			<li class="inactiveStep">
				<img class="stepImage" src="img/stepprogress/Number_grey_1.png" alt="">
				<span class="stepTitle">Komponente wählen</span>
			
			</li>
			
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_2.png" alt="">
				<span class="stepTitle">Komponente Eigenschaften</span>

			</li>
			<div class="clearfix"></div>
			</ol>
		</div>';
			
		}
		else 
		{
			echo '
			<div class="progress">
			<ol>
			
			<li class="activeStep">
				<img class="stepImage" src="img/stepprogress/Number_green_1.png" alt="">
				<span class="stepTitle">Komponente wählen</span>
		
			</li>
			
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_2.png" alt="">
				<span class="stepTitle">Komponente Eigenschaften</span>
	
			</li>

			<div class="clearfix"></div>
			</ol>
		</div>
		';

		}
			?>
		
	
	
	
	<h3>Komponente bestellen</h3>
	<?php
		require_once('php/additions.php');
		
		$step = POST('step');
		
		if ($step == 3) 
		{
			header('location:index.php?mod=order');
		}
		else if ($step == 2) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=order_component" method="post">
				<p>Attribut 1</p><input name="attribute1" type="text"/>
				<p>Attribut 2</p><input name="attribute2" type="text"/>
				<input name="step" value="3" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Bestellen" />
				<input onClick="location.href = \'index.php?mod=order\'" type="button" value="Abbrechen" />
			</form>
			';

		}
		else
		{
	
			echo '
			<!-- Device creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=order_component" method="post">
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/Chip1.png" /><p>Prozessor</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/EthernetCable.png" /><p>Ethernet Kabel</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/Motherboard.png" /><p>Motherboard</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/component_icons/RCAConnector_Plug.png" /><p>Audio Anschluss</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/add-button.png" /><p>Typ hinzuf&uuml;gen</p></div>
				<input name="step" value="2" type="hidden" />
				<div class="clearfix"></div>
				<div class="cancelButton"><input onClick="location.href = \'index.php?mod=order\'" type="button" value="Abbrechen" /></div>
			</form>
			';
		
		}
	?>
</div>