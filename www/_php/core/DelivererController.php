<?php
	/**
	* Controller for Deliverers
	*
	* Controller for Insert, Update and Delete Deliverers
	*
	* @category 
	* @package
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class DelivererController implements IDelivererController
	{
		/**
		 *  storage for the dialog
		 */
		private $_view;
		
		/** 
		 *  storage for the database
		 */
		private $_database;
		
		/** 
		 * default constructor
		 */
		function __construct($view) 
		{
			// store view
			$_view = $view;
			
			// create database
			// TODO 
		}
		
		/**
		 *  select all deliverers and print the deliverers on UI
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com> 
		 */
		public function selectDeliverers()
		{
			// get deliverers from deliverers
			$deliverers = $_database->getDeliverers();
			
			// iteration over all deliverers
			foreach($deliverers as $deliverer)
			{							
				$_view->displayDeliverer(
					$deliverer['i_id'], 
					$deliverer['i_firmenname'], 	
					$deliverer['i_strasse'], 
					$deliverer['i_plz'], 
					$deliverer['i_ort'], 
					$deliverer['i_tel'], 
					$deliverer['i_mobil'], 
					$deliverer['i_fax'], 
					$deliverer['i_email']);
			}
		}
		
		/**
		 *  insert a new Deliverer
		 *
		 * @author Thomas Bayer <thomasbayer95@gmail.com> 
		 */
		public function insertDeliverer()
		{
			// get company name from frontend
			$companyName = $_view->getDelivererCompanyName();
			
			// get street from frontend
			$street = $_view->getDelivererStreet();
			
			// get zip code from frontend
			$zipCode = $_view->getDelivererZipCode();
			
			// get location from frontend
			$location = $_view->getDelivererLocation();
			
			// get phone number from frontend
			$phoneNumber = $_view->getDelivererPhoneNumber();
			
			// get mobile number from frontend
			$mobileNumber = $_view->getDelivererMobileNumber();
			
			// get fax number from frontend
			$faxNumber = $_view->getDelivererFaxNumber();
			
			// get email from frontend
			$email = $_view->getDelivererEmail();
			
			// check id, company name, street, zip code, location, phone number, mobile number, fax number, email 
			if(isset($companyName) && isset($street) && isset($zipCode) && isset($location) && isset($phoneNumber) && isset($mobileNumber) && isset($faxNumber) && isset($email))
			{
				// insert deliverer
				$_database->insertDeliverer($companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email);
			}
			else 
			{
				// set error to frontend
				$_view->setError();
			}
		}	
		
		/**
		 *  update a deliverer
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com> 
		 */
		public function updateDeliverer()
		{
			// get unique deliverer id
			$id = $_view->getDelivererId();
			
			// get company name from frontend
			$companyName = $_view->getDelivererCompanyName();
			
			// get street from frontend
			$street = $_view->getDelivererStreet();
			
			// get zip code from frontend
			$zipCode = $_view->getDelivererZipCode();
			
			// get location from frontend
			$location = $_view->getDelivererLocation();
			
			// get phone number from frontend
			$phoneNumber = $_view->getDelivererPhoneNumber();
			
			// get mobile number from frontend
			$mobileNumber = $_view->getDelivererMobileNumber();
			
			// get fax number from frontend
			$faxNumber = $_view->getDelivererFaxNumber();
			
			// get email from frontend
			$email = $_view->getDelivererEmail();
			
			// check id, company name, street, zip code, location, phone number, mobile number, fax number, email 
			if(isset($id) && isset($companyName) && isset($street) && isset($zipCode) && isset($location) && isset($phoneNumber) && isset($mobileNumber) && isset($faxNumber) && isset($email))
			{
				// update deliverer
				$_database->updateDeliverer($id, $companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email);
			}
			else 
			{
				// set error to frontend
				$_view->setError();
			}
		
		}

		/**
		 * delete a deliverer
		 *
		 * @author Thomas Bayer <thomasbayer95@gmail.com>  
		 */
		public function deleteDeliverer()
		{
			// get unique deliverer id
			$id = $_view->getDelivererId();
			
			// check id
			if(isset($id))
			{
				// delete deliverer
				$_database->deleteDeliverer($id);
			}
			else 
			{
				// set error to frontend
				$_view->setError();
			}
		}
	}
?>