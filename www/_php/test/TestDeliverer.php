<html>
	<head>
		<title>Test - </title>
	</head>
	<body>
					
		<?php
			
			// include IDeliverer
			require_once('../interface/IDeliverer.php');
		
			// include Deliverer controller
			require_once('../core/DelivererController.php');
			
			// include mock database
			require_once('../test/MockDatabase.php');
		
			// include Deliverer entity
			require_once('../entity/DelivererEntity.php');
		
			/**
			* Mock object Deliverer
			*
			* Mock object for the Deliverer
			*
			* @category 
			* @package
			* @author Johannes Alt <altjohannes510@gmail.com>
			* @author Thomas Bayer <thomasbayer95@gmail.com>
			* @copyright 2013 B3ProjectGroup2
			*/
			class MockDeliverer implements IDeliverer
			{
				/**
				 *  storage for the deliverer id
				 */
				private $_delivererId;
				
				/**
				 *  storage for the deliverer company name
				 */
				private $_delivererCompanyName;
				
				/**
				 *  storage for the deliverer street
				 */
				private $_delivererStreet;
				
				/** 
				 *  storage for the deliverer zip code
				 */
				private $_delivererZip;
				
				/**
				 *  storage for the deliverer city
				 */
				private $_delivererCity;
				
				/**
				 *  storage for the deliverer phone number
				 */
				private $_delivererTelephone;
				
				/**
				 *  storage for the deliverer mobile number
				 */
				private $_delivererMobile;
				
				/**
				 *  storage for the deliverer fax number
				 */
				private $_delivererFax;
				
				/**
				 *  storage for the deliverer email adress
				 */
				private $_delivererEmail;
				
				/**
				 *  storage for the deliverer country
				 */
				private $_delivererCountry;
				
				/**
				 *  storage for the deliverer 
				 */
				public $_deliverers;
				
				public function __construct($delivererId, $delivererCompanyName, $delivererStreet, $delivererZip, $delivererCity, $delivererTelephone, $delivererMobile, $delivererFax, $delivererEmail, $delivererCountry) 
				{
					// id
					$this->_delivererId = $delivererId;
					
					// company name
					$this->_delivererCompanyName = $delivererCompanyName;
					
					// street
					$this->_delivererStreet = $delivererStreet;
					
					// zip
					$this->_delivererZip = $delivererZip;
					
					// city
					$this->_delivererCity = $delivererCity;

					// telephone
					$this->_delivererTelephone = $delivererTelephone;
					
					// mobile
					$this->_delivererMobile = $delivererMobile;
					
					// fax
					$this->_delivererFax = $delivererFax;
					
					// email
					$this->_delivererEmail = $delivererEmail;
					
					// country
					$this->_delivererCountry = $delivererCountry;
					
					// set assert options
					assert_options(ASSERT_BAIL, 1);
				}
				
				/**
				 *  function to display Deliverer
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function displayDeliverer($id, $companyName, $street, $zip, $city, $telephone, $mobile, $fax, $email, $country)
				{
					// print display Deliverer
					print $id . ' ' . $companyName . ' ' . $street . ' ' . $zip . ' ' . $city . ' ' . $telephone . ' ' . $mobile . ' ' . $fax . ' ' . $email . ' ' . $country . '<br/>';
					
					// create Deliverer entity
					$entity = new DelivererEntity();
					
					// set id
					$entity->delivererId = $id;
					
					// set company name
					$entity->delivererCompanyName = $companyName;
					
					// set street
					$entity->delivererStreet = $street;
					
					// set zip 
					$entity->delivererZip = $zip;
					
					// set city
					$entity->delivererCity = $city;
					
					// set telephone
					$entity->delivererTelephone = $telephone;
					
					// set mobile
					$entity->delivererMobile = $mobile;
					
					// set fax
					$entity->delivererFax = $fax;
					
					// set email
					$entity->delivererEmail = $email;
					
					// set country
					$entity->delivererCountry = $country;
					
					// store Deliverer
					$this->_deliverers[] = $entity;
				}
				
				/**
				 * function to get Deliverer id
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererId()
				{
					// return Deliverer id
					return $this->_delivererId;
				}
				
				/**
				 *  function to get Deliverer campany name
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererCompanyName()
				{
					// return Deliverer company name
					return $this->_delivererCompanyName;
				}
					
				/** 
				 *  function to get Deliverer street
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererStreet()
				{
					// return Deliverer street
					return $this->_delivererStreet;
				}
					
				/**
				 * function to get Deliverer zip 
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererZip()
				{
					// return zip
					return $this->_delivererZip;
				}
				
				/**
				 * function to get Deliverer city
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererCity()
				{
					// return city
					return $this->_delivererCity;
				}
				
				/**
				 * function to get Deliverer telephone 
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererTelephone()
				{
					// return telephone
					return $this->_delivererTelephone;
				}
				
				/**
				 * function to get Deliverer mobile
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererMobile()
				{
					// return mobile
					return $this->_delivererMobile;
				}
				
				/**
				 * function to get Deliverer fax
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererFax()
				{
					// return fax
					return $this->_delivererFax;
				}
				
				/**
				 * function to get Deliverer email
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererEmail()
				{
					// return email
					return $this->_delivererEmail;
				}
				
				/**
				 * function to get Deliverer country
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function getDelivererCountry()
				{
					// return country
					return $this->_delivererCountry;
				}
					
				/**
				 * function to set error
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */			
				public function setError()
				{
					assert(isset($this->_delivererId) && isset($this->_delivererCompanyName));
				}
				
				
				/**
				 * function to set Deliverer email
				 * 
				 * @author Thomas Bayer <thomasbayer95@gmail.com>
				 */
				public function setDelivererEmailError()
				{
					assert(!preg_match("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?", $this->_delivererEmail, $matches));
				}
			}
		?>		

		<b>Select Test</b><br/>
		<?php  
			// create view and database
			$view = new MockDeliverer(1, 'Funkwerk', 'Hansastraße 4', '90411','Fürth', '0911/65765', '0171/65765', '0911/65766', 'info@funwerk.de', 'Deutschland');
			$database = new MockDatabase();
			
			// create controller
			$controller = new DelivererController($view, $database);
			
			// select controller
			$controller->selectDeliverers();
			
			// iteration over all db Deliverers
			foreach($database->_deliverers as $dbDeliverer)
			{
				// found flag
				$found = FALSE;
				
				// iteration over all view Deliverers
				foreach($view->_deliverers as $viewDeliverer)
				{
					// check Deliverer id
					if($dbDeliverer->delivererId == $viewDeliverer->delivererId)
					{
						// check company name
						assert($dbDeliverer->delivererCompanyName == $viewDeliverer->delivererCompanyName);
						
						// check street
						assert($dbDeliverer->delivererStreet == $viewDeliverer->delivererStreet);
						
						// check
						assert($dbDeliverer->delivererZip == $viewDeliverer->delivererZip);
						
						// check
						assert($dbDeliverer->delivererCity == $viewDeliverer->delivererCity);
						
						// check
						assert($dbDeliverer->delivererTelephone == $viewDeliverer->delivererTelephone);
						
						// check
						assert($dbDeliverer->delivererMobile == $viewDeliverer->delivererMobile);
						
						// check
						assert($dbDeliverer->delivererFax == $viewDeliverer->delivererFax);
						
						// check
						assert($dbDeliverer->delivererEmail == $viewDeliverer->delivererEmail);
						
						// check
						assert($dbDeliverer->delivererCountry == $viewDeliverer->delivererCountry);
						
						
						// set found
						$found = TRUE;
					}
				}
				
				// check found flag
				assert($found);
			}			
		?>

		<br/>
		
		<b>Insert Test 1 (Deliverer Number '1')</b><br/>
		<?php  
			// create view and database
			$view = new MockDeliverer(1, 'Funkwerk', 'Hansastraße 4', '90411','Fürth', '0911/65765', '0171/65765', '0911/65766', 'info@funwerk.de', 'Deutschland');
			$database = new MockDatabase();
			
			// create controller
			$controller = new DelivererController($view, $database);
			
			// select controller
			$controller->insertDeliverer();
						
			// check last insert file
			assert(isset($database->_Deliverers[0]) == FALSE);
						
			// print success
			print 'Success';
		?>

		<br/>
		
		<b>Update Test 1</b><br/>
		<?php
			/*
			// create view and database
			$view = new MockDeliverer(1, 'Funkwerk', 'Hansastraße 4', '90411','Fürth', '0911/65765', '0171/65765', '0911/65766', 'info@funwerk.de', 'Deutschland');
			$database = new MockDatabase();
			
			// create controller
			$controller = new DelivererController($view, $database);
			
			// insert Deliverer
			$controller->insertDeliverer();
						
			// check last insert file
			assert(isset($database->_Deliverers[0]) == TRUE);
			assert($database->_Deliverers[0]->DelivererFloor == 0);
			assert($database->_Deliverers[0]->DelivererNumber == 1);
			assert($database->_Deliverers[0]->DelivererName == $view->getDelivererName());
			assert($database->_Deliverers[0]->DelivererNote == $view->getDelivererNote());
			
			// create new view and controller with new data
			$view = new MockDeliverer(1, '101', 'Religion', '');
			$controller = new DelivererController($view, $database);
			
			// update Deliverer
			$controller->updateDeliverer();

			// print success
			print 'Success';
			 */
		?>
		
	</body>
</html>