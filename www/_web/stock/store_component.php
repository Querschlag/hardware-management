<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=stock">Neubeschaffung</a></li>
		<li>>> <a href="index.php?mod=storeComponent">Komponente anlegen</a></li>
	</ul>
</div>
<div id="module">
<?php


$step = POST('step');

if ($step == 3) 
		{
			echo '
			<div class="progress">
			<ol>
			
			<li class="inactiveStep">
				<img class="stepImage" src="img/stepprogress/Number_grey_1.png" alt="">
				<span class="stepTitle">Komponente wählen</span>
				
			</li>
			
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_2.png" alt="">
				<span class="stepTitle">Komponente Eigenschaften</span>

			</li>
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_3.png" alt="">
				<span class="stepTitle">Komponente Attribute</span>

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
				<span class="stepTitle">Komponente wählen</span>
			
			</li>
			
			<li class="activeStep">
			<img class="stepImage" src="img/stepprogress/Number_green_2.png" alt="">
				<span class="stepTitle">Komponente Eigenschaften</span>

			</li>
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_3.png" alt="">
				<span class="stepTitle">Komponente Attribute</span>
	
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
			<li class="inactiveStep">
			<img class="stepImage" src="img/stepprogress/Number_grey_3.png" alt="">
				<span class="stepTitle">Komponente Attribute</span>
		
			</li>
			<div class="clearfix"></div>
			</ol>
		</div>
		';

		}
			?>
	
	
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
		
		// include IComponent
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
				return POST('device_name') ? POST('device_name') : '';
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
		
		
		
		require_once('php/additions.php');
		
		$step = POST('step');
		
		if ($step == 4) 
		{
			header('location:index.php?mod=stock');
		}
		else if ($step == 3) 
		{
			$controller->insertComponent();
			// $attributes = $controller->selectAttributesByType($view->getComponentTypes());
			
			echo '
			<!-- Component creation wizard - Step 3 -->
			<h4>Eigenschaften</h4>
			<form action="index.php?mod=storeDevice" method="post">
				<p>Attribut 1</p>
				<input type="hidden" name="componentAttribute[]" value="8" />
				<input name="attributeValue[]" type="text" value="Chipsatz" />
				<p>Attribut 2</p>
				<input type="hidden" name="componentAttribute[]" value="17" />
				<input name="attributeValue[]" type="text" value="Festplattenspeicher" />
				<input type="hidden" name="step" value="5" />
				<input type="hidden" name="device_name" value="'.POST('device_name').'" />
				<input type="hidden" name="k_id" value="'.$view->getComponentId().'" />	
				<br>
				<br>
				<input name="btnSubmit" type="submit" value="Anlegen" />
				<input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" />
			</form>
			';

		}
		else if ($step == 2) 
		{
			// include IDeliverer
			require_once('../_php/interface/IDeliverer.php');
			
			// include Deliverer controller
			require_once('../_php/core/DelivererController.php');
			
			// include database
			require_once('../_php/database/Database.php');
			
			// include Deliverer entity
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
			<!-- Component creation wizard - Step 2 -->
			<form action="index.php?mod=storeComponent" method="post">
				<p>Bezeichnung</p><input name="device_name" type="text"/>
				<br>
				<p>Lieferant</p>
				<select name="deliverer">
					<optgroup label="W&auml;hle einen Lieferant"></optgroup>
						'.$delivererList.'
				</select>
				<p>Hersteller</p><input name="supplier" type="text"/>
				<p>Kaufdatum</p><input name="buy" type="date"/>
				<p>Gew&auml;hrleistung in Jahren</p><input name="warranty" type="number"/>
				<p>Notiz</p><textarea name="note" rows=6 cols=30></textarea>
				<input name="step" value="3" type="hidden" />
				<input type="hidden" name="type" value="'.$view->getComponentTypes().'">
				<input type="hidden" name="device" value="'.$view->getComponentIsDevice().'">
				<input type="hidden" name="MainDevice" value="'.POST('MainDevice').'" />
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
	
			echo '
			<!-- Component creation wizard - Step 1 -->
			<form class="deviceSelection" action="index.php?mod=storeComponent" method="post">
				<div class="deviceButton"><input name="type" type="image" src="img/component_icons/Chip1.png" /><p>Prozessor</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/component_icons/EthernetCable.png" /><p>Ethernet Kabel</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/component_icons/Motherboard.png" value="3" /><p>Motherboard</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/component_icons/RCAConnector_Plug.png" /><p>Audio Anschluss</p></div>
				<div class="deviceButton"><input name="type" type="image" src="img/add-button.png" /><p>Typ hinzuf&uuml;gen</p></div>
				<input type="hidden" name="device" value="0">
				<input type="hidden" name="MainDevice" value="'.GET('MainDevice').'" />
				<input type="hidden" name="step" value="2" />
				<div class="clearfix"></div>
				<div class="cancelButton"><input onClick="location.href = \'index.php?mod=stock\'" type="button" value="Abbrechen" /></div>
			</form>
			';
		
		}
	?>
</div>