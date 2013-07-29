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
		
		// include IRoom
		require_once('../_php/interface/IComponent.php');
		
		// include component controller
		require_once('../_php/core/ComponentController.php');
		
		// include database
		require_once('../_php/database/Database.php');
		
		// include component entity
		require_once('../_php/entity/ComponentEntity.php');
		
		class Component implements IComponent 
		{
			/**
			 *  function to display components
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com> 
			 */
			public function displayComponents($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type, $isDevice){}
			
			/**
			 *  function to get component id
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentId()
			{
				return $_POST['k_id'];
			}
			 
			/**
			 *  function to set component id
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function setComponentId($k_id)
			{
				$_POST['k_id'] = $k_id;
			}
			
			/**
			 *  function to get component deliverer
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentDeliverer()
			{
				return POST('deliverer');
			}
				
			/** 
			 *  function to get component room
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentRoom()
			{
				return POST('room') ? POST('room') : 1;
			}
				
			/**
			 * function to get component name 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentName() 
			{
				return POST('device_name');
			}
				
			/**
			 * function to get component buying date 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentBuy()
			{
				return strtotime(POST('buy'));
			}
				
			/**
			 * function to get component warranty 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentWarranty()
			{
				return (strtotime($_POST['buy']) + (POST('warranty') * 86400));
			}
				
			/**
			 * function to get component note 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentNote()
			{
				return POST('note');
			}
				
			/**
			 * function to get component supplier 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentSupplier()
			{
				return POST('supplier');
			}
				
			/**
			 * function to get component types 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentTypes() 
			{
				return POST('type');
			}
			
			/**
			 * function to get component types 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentIsDevice()
			{
				return POST('device');
			}
			
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
		
		if ($step == 7) 
		{
			header('location:index.php?mod=stock');
		}
		else if ($step == 6) 
		{
			$room = POST('room');
		
			if($room == 0)
			{
				header('location:index.php?mod=stock');
			}
			else 
			{
				echo '
				<!-- Device adding wizard - Step 3 -->
				<h4>Benennung</h4>
				<form action="index.php?mod=storeDevice" method="post">
					<p>1</p><input name="attribute2" type="text" value="PC004"/>
					<p>2</p><input name="attribute2" type="text" value="PC005"/>
					<input name="step" value="7" type="hidden" />
					<br>
					<br>
					<input name="btnSubmit" type="submit" value="Speichern" />
					<input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" />
				</form>
				';
			}
				
		}
		else if ($step == 5) 
		{
	
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Wie viele Ger&auml;te anlegen?</h4>
			<form action="index.php?mod=storeDevice" method="post">
				<p>Anzahl</p><input name="itemCount" type="text"/>
				<input name="step" value="6" type="hidden" />
				<p>Raum</p>
				<select name="room">
						<option value="0">Lager</option>
					<optgroup label="Erdgeschoss"></optgroup>
						<option value="1">R001</option>
						<option value="2">R002</option>
						<option value="3">R003</option>
					<optgroup label="Stockwerk 1"></optgroup>
						<option value="4">R101</option>
						<option value="5">R102</option>
						<option value="6">R103</option>	
					<optgroup label="Stockwerk 2"></optgroup>
						<option value="7">R201</option>
						<option value="8">R202</option>
						<option value="9">R203</option>
						
				</select>
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Anlegen" />
				<input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 4) 
		{
			for($i = 0; $i < count($_POST['componentAttribute']); $i++)
			{
				$controller->insertAttributes($_POST['componentAttribute'][$i], $view->getComponentId(), $_POST['attributeValue'][$i]);				
			}
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Komponenten</h4>
			<form action="index.php?mod=storeComponent" method="post">
			
				<input name="step" value="4" type="hidden" />
				<input type="hidden" name="id" value="'.$view->getComponentId().'">				
				<input name="device_name" value="'.$_POST['device_name'].'" type="hidden"/>
				<input name="btnSubmit" type="submit" value="Komponente hinzuf&uuml;gen" />
			</form>
			<br>
			<br>
			<form action="index.php?mod=storeDevice" method="post">
				<input name="step" value="5" type="hidden" />
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 3) 
		{
			$controller->insertComponent();
			// $attributes = $controller->selectAttributesByType($view->getComponentTypes());
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=storeDevice" method="post">
				<p>Attribut 1</p>
				<input type="hidden" name="componentAttribute[]" value="9" />
				<input name="attributeValue[]" type="text" value="4 GB RAM" />
				<p>Attribut 2</p>
				<input type="hidden" name="componentAttribute[]" value="14" />
				<input name="attributeValue[]" type="text" value="4GHz" />
				<input name="step" value="4" type="hidden" />
				<input name="device_name" value="'.$_POST['device_name'].'" type="hidden"/>
				<input type="hidden" name="k_id" value="'.$view->getComponentId().'">	
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" />
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
				<select name="deliverer">
					<optgroup label="W&auml;hle einen Lieferant"></optgroup>
						<option value="1">Lieferant 1</option>
						<option value="1">Lieferant 1</option>
						<option value="1">Lieferant 1</option>
						<option value="1">Lieferant 1</option>
				</select>
				<p>Hersteller</p><input name="supplier" type="text"/>
				<p>Kaufdatum</p><input name="buy" type="date"/>
				<p>Gew&auml;hrleistung in Jahren</p><input name="warranty" type="number"/>
				<p>Notiz</p><textarea name="note" rows=6 cols=30></textarea>
				<input name="step" value="3" type="hidden" />
				<input type="hidden" name="type" value="'.$view->getComponentTypes().'">
				<input type="hidden" name="device" value="'.$view->getComponentIsDevice().'">
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" />
			</form>
			<div class="clearfix"></div>
			';
		
		}
		else
		{
			//get devices id's
			echo '
			<!-- Device creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=storeDevice" method="post">
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/BluRayPlayer_Disc.png" /><p>Blu-ray Player</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/Computer.png" value="12" /><p>Computer</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/HomeServer.png" /><p>Server</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/InkjetPrinter.png" /><p>Drucker</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/Modem_Blue.png" /><p>Modem</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/NetBook.png" /><p>Notebook</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/Smartphone.png" /><p>Mobiles Ger&auml;t</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/device_icons/TVSetRetro.png" /><p>Fernseher</p></div>
				<div class="deviceButton"><input name="btnSubmit" type="image" src="img/add-button.png" /><p>Typ hinzuf&uuml;gen</p></div>
				<input name="device" value="1" type="hidden">
				<input name="step" value="2" type="hidden" />
				<div class="clearfix"></div>
				<div class="cancelButton"><input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" /></div>
			</form>
			';
		
		}
	?>
</div>