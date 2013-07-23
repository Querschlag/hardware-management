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
			$this->_view = $view;
			
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
			$deliverers = $this->_database->getDeliverers();
			
			// iteration over all deliverers
			foreach($deliverers as $deliverer)
			{							
				$this->_view->displayDeliverer(
					$deliverer->delivererId, 
					$deliverer->delivererCompanyName, 	
					$deliverer->delivererStreet, 
					$deliverer->delivererZip, 
					$deliverer->delivererCity, 
					$deliverer->delivererTelephone, 
					$deliverer->delivererMobile, 
					$deliverer->delivererFax, 
					$deliverer->delivererEmail);
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
			$companyName = $this->_view->getDelivererCompanyName();
			
			// get street from frontend
			$street = $this->_view->getDelivererStreet();
			
			// get zip code from frontend
			$zipCode = $this->_view->getDelivererZipCode();
			
			// get location from frontend
			$location = $this->_view->getDelivererLocation();
			
			// get phone number from frontend
			$phoneNumber = $this->_view->getDelivererPhoneNumber();
			
			// get mobile number from frontend
			$mobileNumber = $this->_view->getDelivererMobileNumber();
			
			// get fax number from frontend
			$faxNumber = $this->_view->getDelivererFaxNumber();
			
			// get email from frontend
			$email = $this->_view->getDelivererEmail();
			
			// check id, company name, street, zip code, location, phone number, mobile number, fax number, email 
			if(isset($companyName) && isset($street) && isset($zipCode) && isset($location) && isset($phoneNumber) && isset($mobileNumber) && isset($faxNumber) && isset($email))
			{
				// insert deliverer
				$this->_database->insertDeliverer(
					$companyName, 
					$street, 
					$zipCode, 
					$location, 
					$phoneNumber, 
					$mobileNumber, 
					$faxNumber, 
					$email);
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
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
			$id = $this->_view->getDelivererId();
			
			// get company name from frontend
			$companyName = $this->_view->getDelivererCompanyName();
			
			// get street from frontend
			$street = $this->_view->getDelivererStreet();
			
			// get zip code from frontend
			$zipCode = $this->_view->getDelivererZipCode();
			
			// get location from frontend
			$location = $this->_view->getDelivererLocation();
			
			// get phone number from frontend
			$phoneNumber = $this->_view->getDelivererPhoneNumber();
			
			// get mobile number from frontend
			$mobileNumber = $this->_view->getDelivererMobileNumber();
			
			// get fax number from frontend
			$faxNumber = $this->_view->getDelivererFaxNumber();
			
			// get email from frontend
			$email = $this->_view->getDelivererEmail();
			
			// check id, company name, street, zip code, location, phone number, mobile number, fax number, email 
			if(isset($id) && isset($companyName) && isset($street) && isset($zipCode) && isset($location) && isset($phoneNumber) && isset($mobileNumber) && isset($faxNumber) && isset($email))
			{
				// update deliverer
				$this->_database->updateDeliverer(
					$id, 
					$companyName, 
					$street, 
					$zipCode, 
					$location, 
					$phoneNumber, 
					$mobileNumber, 
					$faxNumber, 
					$email);
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
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
			$id = $this->_view->getDelivererId();
			
			// check id
			if(isset($id))
			{
				// delete deliverer
				$this->_database->deleteDeliverer($id);
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
			}
		}
	}
?>