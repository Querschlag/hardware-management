<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=stock">Neubeschaffung</a></li>
		<li>>> <a href="index.php?mod=storeDevice">Ger&auml;t anlegen</a></li>
	</ul>
</div>
<div id="module">
	<h3>Ger&auml;t anlegen</h3>
	<?php
		require_once('php/additions.php');
		
		// include IRoom
		require_once('../_php/interface/IComponent.php');
		
		// include room controller
		require_once('../_php/core/ComponentController.php');
		
		// include mock database
		require_once('../_php/database/Database.php');
		
		// include room entity
		require_once('../_php/entity/ComponentEntity.php');
		
		class Component implements IComponent 
		{
			/**
			 *  function to display components
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com> 
			 */
			public function displayComponents($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type){}
			
			/**
			 *  function to get component id
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentId(){}
			
			/**
			 *  function to get component deliverer
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentDeliverer(){}
				
			/** 
			 *  function to get component room
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentRoom(){}
				
			/**
			 * function to get component name 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentName(){}
				
			/**
			 * function to get component buying date 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentBuy(){}
				
			/**
			 * function to get component warranty 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentWarranty(){}
				
			/**
			 * function to get component note 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentNote(){}
				
			/**
			 * function to get component supplier 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentSupplier(){}
				
			/**
			 * function to get component types 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentTypes(){}
			
			/**
			 * function to set error
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */			
			public function setError(){}
		}

			// create view object
			$view = new Component($_POST);
			
			// create database
			$database = new Database();
			
			// create controller object
			$controller = new ComponentController($view, $database);
		
		$step = POST('step');
		
		if ($step == 6) 
		{
			header('location:index.php?mod=stock');
		}
		else if ($step == 5) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Wie viele Ger&auml;te anlegen?</h4>
			<form action="index.php?mod=storeDevice" method="post">
				<p>Anzahl</p><input name="itemCount" type="text"/>
				<input name="step" value="6" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Anlegen" />
				<input onClick="location.href = \'index.php?mod=stock\'"; type="button" value="Abbrechen" />
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
			<form action="index.php?mod=storeComponent" method="post">
				<input name="step" value="4" type="hidden" />
				<input name="btnSubmit" type="submit" value="Komponente hinzuf&uuml;gen" />
			</form>
			<br>
			<br>
			<form action="index.php?mod=storeDevice" method="post">
				<input name="step" value="5" type="hidden" />
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=stock\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 3) 
		{
			// $controller->insertComponent();
			// die();
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=storeDevice" method="post">
				<p>Attribut 1</p><input name="attribute1" type="text"/>
				<p>Attribut 2</p><input name="attribute2" type="text"/>
				<input name="step" value="4" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=stock\'"; type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 2) 
		{
			
			echo '
			<!-- Device creation wizard - Step 2 -->
			<form action="index.php?mod=storeDevice" method="post">
				<p>Bezeichnung</p><input name="device_name" type="text"/>
				<br>
				<p>Lieferant</p>
				<select name="supplier">
					<optgroup label="W&auml;hle einen Lieferant"></optgroup>
						<option value="0">Lieferant 1</option>
						<option value="1">Lieferant 1</option>
						<option value="2">Lieferant 1</option>
						<option value="3">Lieferant 1</option>
				</select>
				<p>Hersteller</p><input name="manufactor" type="text"/>
				<p>Kaufdatum</p><input name="purchaseDate" type="date"/>
				<p>Gew&auml;hrleistung in Jahren</p><input name="warranty" type="number"/>
				<p>Notiz</p><textarea name="description" rows=6 cols=30></textarea>
				<input name="step" value="3" type="hidden" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=stock\'"; type="button" value="Abbrechen" />
			</form>
			<div class="clearfix" />
			';
		
		}
		else
		{
	
			echo '
			<!-- Device creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=storeDevice" method="post">
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/BluRayPlayer_Disc.png" /><p>Blu-ray Player</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Computer.png" /><p>Computer</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/HomeServer.png" /><p>Server</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/InkjetPrinter.png" /><p>Drucker</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Modem_Blue.png" /><p>Modem</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/NetBook.png" /><p>Notebook</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/Smartphone.png" /><p>Mobiles Ger&auml;t</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/device_icons/TVSetRetro.png" /><p>Fernseher</p></div>
				<input name="step" value="2" type="hidden" />
				<input onClick="location.href = \'index.php?mod=stock\'"; type="button" value="Abbrechen" />
				<div class="clearfix" />
			</form>
			';
		
		}
	?>
</div>