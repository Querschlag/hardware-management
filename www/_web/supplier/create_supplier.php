<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<!--
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?menu=management&mod=rooms">Stammdaten</a></li>
		<li>>> <a href="index.php?mod=supplier">Lieferant</a></li>
		<li>>> <a href="index.php?mod=createSupplier">Lieferant anlegen</a></li>
		-->

		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>">Lieferanten</a></li>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'createSupplier'), false) ?>">Lieferant anlegen</a></li>

	</ul>
</div>
<div id="module">
	<h2>Lieferant anlegen</h2>
	<!--
		//TODO
		
		When providing this form with functionality, please modify the 'mod' parameter to point to the current
		module (see /php/navigation.php for more details), so you can make use of the auto appended id of
		user,room,device,component,supplier and so on.
		
		After doing your update and validation stuff use this:
		
			header( "Location: index.php" . echo navParams(array('mod' => '<upperModule>')) );
		
		to redirect to the page where you came or started the wizard from.
		
		action="index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>"
	-->
	<?php
			// include deliverer controller
			require_once('../_php/core/DelivererController.php');
			
			// include mock database
			require_once('../_php/database/Database.php');
			
			// include deliverer entity
			require_once('../_php/entity/DelivererEntity.php');
		
			// include deliverer entity
			require_once('../_php/interface/IDeliverer.php');
			
			/**
			* Deliverer object
			*
			* Deliverer object with functionality of IRoom
			*
			* @category 
			* @package
			* @author Johannes Alt <altjohannes510@gmail.com>
			* @copyright 2013 B3ProjectGroup2
			*/	
			class Deliverer implements IDeliverer
			{
				
				/** 
				 * default constructor
				 */
				function __construct($post) 
				{	
					if($post != array())
					{
						$_POST['companyName'] = $post['companyName'];
						$_POST['street'] = $post['street'];
						$_POST['zip'] = $post['zip'];
						$_POST['city'] = $post['city'];
						$_POST['telephone'] = $post['telephone'];
						$_POST['mobile'] = $post['mobile'];
						$_POST['fax'] = $post['fax'];
						$_POST['email'] = $post['email'];
						$_POST['country'] = $post['country'];
					}
				}
		
								
				/**
				 *  function to display room
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com> 
				 */
				public function displayDeliverer($id, $companyName, $street, $zip, $city, $telephone, $mobile, $fax, $email, $country)
				{
					$_POST['companyName'] = $post['companyName'];
					$_POST['street'] = $post['street'];
					$_POST['zip'] = $post['zip'];
					$_POST['city'] = $post['city'];
					$_POST['telephone'] = $post['telephone'];
					$_POST['mobile'] = $post['mobile'];
					$_POST['fax'] = $post['fax'];
					$_POST['email'] = $post['email'];
					$_POST['country'] = $post['country'];		
				}
			
				/**
			* function to get Deliverer id
			* 
			* @author Thomas Bayer <thomasbayer95@gmail.com>
			*/
			public function getDelivererId()
			{
				return "";
			}
		
			
			/**
			 *  function to get Deliverer campany name
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererCompanyName()
			{
				if(isset($_POST['companyName']))
				{
					return $_POST['companyName'];
				}
			}
		
			/** 
			 *  function to get Deliverer street
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererStreet()
			{
				if(isset($_POST['street']))
				{
					return $_POST['street'];
				}
			}
		
				
			/**
			 * function to get Deliverer zip 
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererZip()
			{
				if(isset($_POST['zip']))
				{
					return $_POST['zip'];
				}
			}
			
			/**
			 * function to get Deliverer city
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererCity()
			{
				if(isset($_POST['city']))
				{
					return $_POST['city'];
				}
			}
			
			
			/**
			 * function to get Deliverer telephone 
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererTelephone()
			{
				if(isset($_POST['telephone']))
				{
					return $_POST['telephone'];
				}
			}
			
			
			/**
			 * function to get Deliverer mobile
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererMobile()
			{
				if(isset($_POST['mobile']))
				{
					return $_POST['mobile'];
				}
			}
			
			
			/**
			 * function to get Deliverer fax
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererFax()
			{
				if(isset($_POST['fax']))
				{
					return $_POST['fax'];
				}
			}
			
			
			/**
			 * function to get Deliverer email
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererEmail()
			{
				if(isset($_POST['email']))
				{
					return $_POST['email'];
				}	
			}
			
			
			/**
			 * function to get Deliverer country
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererCountry()
			{
				if(isset($_POST['country']))
				{
					return $_POST['country'];
				}
			}
				
			/**
			 * function to set error
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */			
			public function setError()
			{
				// print unknown error message
				print '<b><p><span class="require">Unbekannter Fehler! 
						Bitte versuchen Sie es später nocheinmal</span></p></b>';		
			}
		
		   /**
			 * function to set Deliverer email
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function setDelivererEmailError()
			{
				// print error message
				print '<b><p><span class="require">E-Mail ist nicht richtig</span></p></b>';
			}

			/**
		 	 *  function to set required data error
		 	 * 
		 	 * @author Johannes Alt <altjohannes510@gmail.com>
		 	 */
			public function setRequiredDataError()
			{
				// print error message
				print '<b><p><span class="require">Pflichtfelder k&ouml;nnen nicht leer sein.</span></p></b>';
			}
			
			}
	
			// create view object
			$view = new Deliverer($_POST);
			
			// create database
			$database = new Database();
			
			// create controller object
			$controller = new DelivererController($view, $database);
	
	?>
	
	<form method="post">
		<p>Firmenname</p><input name="companyName" value="<?php echo $view->getDelivererCompanyName(); ?>" type="text"/>&nbsp;<span class="require">*</span>
		<p>Straße</p><input name="street" value="<?php echo $view->getDelivererStreet(); ?>" type="text"/>
		<p>Postleitzahl</p><input name="zip" value="<?php echo $view->getDelivererZip(); ?>" type="text"/>
		<p>Ort</p><input name="city" value="<?php echo $view->getDelivererCity(); ?>" type="text"/>
		<p>Land</p><input name="country" value="<?php echo $view->getDelivererCountry(); ?>" type="text"/>
		<p>Telefon</p><input name="telephone" value="<?php echo $view->getDelivererTelephone(); ?>" type="text"/>
		<p>Mobiltelefon</p><input name="mobile" value="<?php echo $view->getDelivererMobile(); ?>" type="text"/>
		<p>Fax</p><input name="fax" value="<?php echo $view->getDelivererFax(); ?>" type="text"/>
		<p>Email</p><input name="email" value="<?php echo $view->getDelivererEmail(); ?>" type="email"/>
		<br>
		
		<?php
			
			if(isset($_POST['btnAddSubmit']))
			{
				if(trim($view->getDelivererCompanyName()) != "")
				{
					$controller->insertDeliverer();
					
					header( "Location: index.php" . navParams(array('mod' => 'supplier')) );
				}
				else 
				{
					$view->setRequiredDataError();
				}
				
			}
			
			// select the deliverers
			// $controller->selectDeliverers();
		?>
		
		<br>
		<p class="require">* Pflichtfeld</p>
		<input name="btnAddSubmit" type="submit" value="Anlegen" />
		<input  type="button" value="Abbrechen" onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>'" />
	</form>
</div>