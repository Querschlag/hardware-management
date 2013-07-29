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
	
	<?php
			$step = POST('step');
	
	if ($step == 7) 
		{
			
			
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
			<div class="progress">
			<ol>
			
			<li class="inactiveStep">
				<img class="stepImage" src="img/stepprogress/Number_grey_1.png" alt="">
				<span class="stepTitle">Gerät wählen</span>
			</li>
			
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_2.png" alt="">
				<span class="stepTitle">Gerät Daten</span>

			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_3.png" alt="">
				<span class="stepTitle">Gerät Attribute</span>
			
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_4.png" alt="">
							<span class="stepTitle">Komponente hinzufügen</span>
	
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_5.png" alt="">
							<span class="stepTitle">Geräte Menge</span>
		
			</li>
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_6.png" alt="">
				<span class="stepTitle">Raum auswählen</span>
		
			</li>
			<div class="clearfix"></div>
			</ol>
		</div>';
			}
		
		
				
		}
		else if ($step == 5) 
		{
	echo '
			<div class="progress">
			<ol>
			
			<li class="inactiveStep">
				<img class="stepImage" src="img/stepprogress/Number_grey_1.png" alt="">
				<span class="stepTitle">Gerät wählen</span>

			</li>
			
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_2.png" alt="">
				<span class="stepTitle">Gerät Daten</span>
		
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_3.png" alt="">
				<span class="stepTitle">Gerät Attribute</span>

			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_4.png" alt="">
								<span class="stepTitle">Komponente hinzufügen</span>

			</li>
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_5.png" alt="">
							<span class="stepTitle">Geräte Menge</span>

			</li>

			<div class="clearfix"></div>
			</ol>
		</div>';

		}
		else if ($step == 4) 
		{
		echo '
			<div class="progress">
			<ol>
			
			<li class="inactiveStep">
				<img class="stepImage" src="img/stepprogress/Number_grey_1.png" alt="">
				<span class="stepTitle">Gerät wählen</span>

			</li>
			
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_2.png" alt="">
				<span class="stepTitle">Gerät Daten</span>
	
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_3.png" alt="">
				<span class="stepTitle">Gerät Attribute</span>

			</li>
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_4.png" alt="">
				<span class="stepTitle">Komponente hinzufügen</span>

			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_5.png" alt="">
						<span class="stepTitle">Geräte Menge</span>
			</li>
			<div class="clearfix"></div>
			</ol>
		</div>';

		}
		else if ($step == 3) 
		{
			echo '
			<div class="progress">
			<ol>
			
			<li class="inactiveStep">
				<img class="stepImage" src="img/stepprogress/Number_grey_1.png" alt="">
				<span class="stepTitle">Gerät wählen</span>
			
			</li>
			
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_2.png" alt="">
				<span class="stepTitle">Gerät Daten</span>
	
			</li>
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_3.png" alt="">
				<span class="stepTitle">Gerät Attribute</span>
			
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_4.png" alt="">
				<span class="stepTitle">Komponente hinzufügen</span>
		
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_5.png" alt="">
						<span class="stepTitle">Geräte Menge</span>
			</li>
			<div class="clearfix"></div>
			</ol>
		</div>';

		}
		else if ($step == 2)
		{	
	echo '
			<div class="progress">
			<ol>
			
			<li class="inactiveStep">
				<img class="stepImage" src="img/stepprogress/Number_grey_1.png" alt="">
			    <span class="stepTitle">Gerät wählen</span>

			</li>
			
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_2.png" alt="">
				<span class="stepTitle">Gerät Daten</span>
			
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_3.png" alt="">
				<span class="stepTitle">Gerät Attribute</span>
		
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_4.png" alt="">
				<span class="stepTitle">Komponente hinzufügen</span>
				
			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_5.png" alt="">
					<span class="stepTitle">Geräte Menge</span>

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
				<span class="stepTitle">Gerät wählen</span>

			</li>
			
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_2.png" alt="">
				<span class="stepTitle">Gerät Daten</span>

			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_3.png" alt="">
				<span class="stepTitle">Gerät Attribute</span>

			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_4.png" alt="">
				<span class="stepTitle">Komponente hinzufügen</span>

			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_5.png" alt="">
				<span class="stepTitle">Geräte Menge</span>
</li>
			<div class="clearfix"></div>
			</ol>
		</div>';
		
		}
	?>
	
	
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
		
		// include IComponent
		require_once('../_php/interface/IComponent.php');
		
		// include component controller
		require_once('../_php/core/ComponentController.php');
		
		// include database
		require_once('../_php/database/Database.php');
		
		// include component entity
		require_once('../_php/entity/ComponentEntity.php');
		
		// include component attributeEntity
		require_once('../_php/entity/ComponentAttributeEntity.php');
		
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
				return POST('k_id');
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
				return POST('room') ? POST('room') : 900000;
			}
				
			/**
			 * function to get component name 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function getComponentName() 
			{
				return POST('device_name') ? '' : '';
			}
				
			/**
			 * function to get component name 
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function setComponentName($device_name) 
			{
				$_POST['device_name'] = $device_name;
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
				return (strtotime(POST('buy')) + (POST('warranty') * 86400));
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
		

		
		if ($step == 7) 
		{
			// foreach(POST('deviceNames') as $names) {
				// $controller->insertComponent();
			// }
			header('location:index.php?mod=stock');
		}
		else if ($step == 6) 
		{
			$room = $view->getComponentRoom();
		
			if($room == 0)
			{
				header('location:index.php?mod=stock');
			}
			else 
			{				
				$controller->updateComponentNameAndRoom($_SESSION['MainDeviceId'], $_SESSION['MainDeviceName'], $view->getComponentRoom());
				
				$deviceNames = "";
				for($i = 1; $i <= POST('itemCount'); $i++) {
					$deviceNames .= '<p>Gerät '.$i.'</p><input type="text" name="deviceNames[]" value="'.$_SESSION['MainDeviceName'].'-'.$i.'" />';
				}
				
				echo '
				<!-- Device adding wizard - Step 3 -->
				<h4>Benennung</h4>
				<form action="index.php?mod=storeDevice" method="post">
					'.$deviceNames.'
					<input type="hidden" name="step" value="7" />
					<input type="hidden" name="room" value="'.$view->getComponentRoom().'" />
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
			// insert attributes for device components
			for($i = 0; $i < count(POST('componentAttribute')); $i++)
			{
				$controller->insertAttributes($_POST['componentAttribute'][$i], $_SESSION['SubDeviceId'], $_POST['attributeValue'][$i]);				
			}

		
			// include IRoom
			require_once('../_php/interface/IRoom.php');

			// include room controller
			require_once('../_php/core/RoomController.php');
			
			// include room entity
			require_once('../_php/entity/RoomEntity.php');
		
			/**
			* Room object
			*
			* Room object with functionality of IRoom
			*
			* @category 
			* @package
			* @author Johannes Alt <altjohannes510@gmail.com>
			* @copyright 2013 B3ProjectGroup2
			*/	
			class Room implements IRoom
			{
				/**
				 *  storage for the row max
				 */
				 
				private $_rowMax = 7;
				
				/** 
				 *  storage for the row count
				 */
				private $_rowCount;
									
				/**
				 *  function to display room
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com> 
				 */
				public function displayRoom($id, $number, $name, $note, $roomHasProblems = false) {}
			
				/**
				 *  function to display floor
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayFloor($floorNumber) {}
				
				/**
				 *  function to display room end
				 * 
				 *  @author Johannes Alt <altjohannes@gmail.com>
				 */
				public function displayRoomEnd() {}
			
				/** 
		 		*  function to display problem count
		 		* 
		 		* @author Johannes Alt <altjohannes510@gmail.com>
		 		*/
				public function displayProblemCount($count) {}
			
				/**
				 *  function to get room number
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomNumber()
				{
				}
				
				/** 
				 *  function to get room name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomName()
				{
				}
				
				/**
				 * function to get room note 
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomNote()
				{		
				}
				
			   /** 
			 	*  function to get floor number
			 	* 
			 	* @author Johannes Alt <altjohannes510@gmail.com>
				*/
				public function getFloorNumber()
				{
				}
				
				/**
				 * function to set error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */			
				public function setError()
				{	
				}
			
			   /**
			 	*  function to set required data error
			 	* 
			 	* @author Johannes Alt <altjohannes510@gmail.com>
			 	*/
				public function setRequiredDataError()
				{
				}
					
				/**
				 * function to get room id
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomId()
				{
				}
				
			}
			
			// create controller object
			$rController = new RoomController($view, $database);
					
			// select the rooms
			$rooms = $rController->getRooms();
			
			$roomList = '<select name="room"><optgroup label="Bitte Raum wählen"></optgroup>';
			foreach($rooms['rooms'] as $value) {
				$roomList .= '<option value="'.$value->roomId.'">'.$value->roomFloor.''.(strlen($value->roomNumber) > 1 ? $value->roomNumber : '0'.$value->roomNumber).'</option>';
			}
			$roomList .= '</select>';

			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Wie viele Ger&auml;te anlegen?</h4>
			<form action="index.php?mod=storeDevice" method="post">
				<p>Anzahl</p>
				<input type="number" name="itemCount" min="1" value="1"/>
				<input type="hidden" name="step" value="6" />
				<p>Raum</p>
				'.$roomList.'
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
				$controller->insertAttributes($_POST['componentAttribute'][$i], $_SESSION['MainDeviceId'], $_POST['attributeValue'][$i]);
			}
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Komponenten</h4>
			<form action="index.php?mod=storeComponent" method="post">
			
				<input name="step" value="1" type="hidden" />				
				<input type="hidden" name="device_name" value="'.POST('device_name').'" />
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
			$attributes = $controller->selectAttributesByType($view->getComponentTypes());
			
			$_SESSION['MainDeviceId'] = $view->getComponentId();
			$_SESSION['MainDeviceName'] = POST('device_name');
			
			$attrList = '';
			foreach($attributes as $attribute)
			{
				$attrList .= '<p>'.utf8_encode($attribute->componentAttributeName).'</p>';
				$attrList .= '<input type="hidden" name="componentAttribute[]" value="'.$attribute->componentAttributeId.'" />';
				
				if($attribute->componentAttributeValidValue) {
					
					$attrList .= '<select name="attributeValue[]">';
					foreach($attribute->componentAttributeValidValue as $key => $value) {
						$attrList .= '<option value="'.$value.'">'.$value.'</p>';
					}
					$attrList .= '</select>'; 
				} else {
					$attrList .= '<input type="text" name="attributeValue[]" />';
				}
			}
			
			echo '
			<!-- Device creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=storeDevice" method="post">
				'.$attrList.'
				<input type="hidden" name="step" value="4" />
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Weiter" />
				<input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 2)
		{
			// include IComponent
			require_once('../_php/interface/IDeliverer.php');
			
			// include component controller
			require_once('../_php/core/DelivererController.php');
			
			// include database
			require_once('../_php/database/Database.php');
			
			// include component entity
			require_once('../_php/entity/DelivererEntity.php');
			
			class Deliverer implements IDeliverer 
			{
				/**
				 *  function to display Deliverer
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com> 
				 */
				public function displayDeliverer($id, $companyName, $street, $zip, $city, $telephone, $mobile, $fax, $email, $country){}
				
				/**
				* function to get Deliverer id
				* 
				* @author Thomas Bayer <thomasbayer95@gmail.com>
				*/
				public function getDelivererId(){}
			
				
				/**
				 *  function to get Deliverer campany name
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererCompanyName(){}
			
				/** 
				 *  function to get Deliverer street
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererStreet(){}
			
					
				/**
				 * function to get Deliverer zip 
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererZip(){}
				
				
				/**
				 * function to get Deliverer city
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererCity(){}
				
				
				/**
				 * function to get Deliverer telephone 
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererTelephone(){}
				
				
				/**
				 * function to get Deliverer mobile
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererMobile(){}
				
				
				/**
				 * function to get Deliverer fax
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererFax(){}
				
				
				/**
				 * function to get Deliverer email
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererEmail(){}
				
				
				/**
				 * function to get Deliverer country
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererCountry(){}
				
					
				/**
				 * function to set error
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */			
				public function setError(){}
				
				/**
				 * function to set Deliverer email
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function setDelivererEmailError(){}
			}

			$dController = new DelivererController($view, $database);
			
			$deliverer = $dController->getDeliverer();
			
			$delivererList = "";
			foreach($deliverer as $value) {
				$delivererList .= '<option value="'.$value->delivererId.'">'.$value->delivererCompanyName.'</option>';
			}
			
			echo '
			<!-- Device creation wizard - Step 2 -->
			<form action="index.php?mod=storeDevice" method="post">
				<p>Bezeichnung</p><input name="device_name" type="text"/>
				<br>
				<p>Lieferant</p>
				<select name="deliverer">
					<optgroup label="W&auml;hle einen Lieferant"></optgroup>
					'.$delivererList.'
				</select>
				<p>Hersteller</p>
				<input name="supplier" type="text"/>
				<p>Kaufdatum</p>
				<input name="buy" type="date"/>
				<p>Gew&auml;hrleistung in Jahren</p>
				<input name="warranty" type="number"/>
				<p>Notiz</p>
				<textarea name="note" rows=6 cols=30></textarea>
				<input name="step" value="3" type="hidden" />
				<input type="hidden" name="type" value="'.$view->getComponentTypes().'" />
				<input type="hidden" name="device" value="'.$view->getComponentIsDevice().'" />
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