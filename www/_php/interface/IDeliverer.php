<?php
	/**
	* Interface for Deliverer
	*
	* Interface for display Deliverer
	*
	* @category 
	* @package
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	interface IDeliverer
	{
		/**
		 *  function to display Deliverer
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com> 
		 */
		public function displayDeliverer($id, $companyName, $street, $zip, $city, $telephone, $mobile, $fax, $mail, $country);
		
		/**
		* function to get Deliverer id
		* 
		* @author Thomas Bayer <thomasbayer95@gmail.com>
		*/
		public function getDelivererId();
	
		
		/**
		 *  function to get Deliverer campany name
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererCompanyName();
	
		/** 
		 *  function to get Deliverer street
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererStreet();
	
			
		/**
		 * function to get Deliverer zip 
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererZip();
		
		
		/**
		 * function to get Deliverer city
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererCity();
		
		
		/**
		 * function to get Deliverer telephone 
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererTelephone();
		
		
		/**
		 * function to get Deliverer mobile
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererMobile();
		
		
		/**
		 * function to get Deliverer fax
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererFax();
		
		
		/**
		 * function to get Deliverer email
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererEmail();
		
		
		/**
		 * function to get Deliverer country
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function getDelivererCountry();
		
			
		/**
		 * function to set error
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */			
		public function setError();
		
		/**
		 * function to set Deliverer email
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com>
		 */
		public function setDelivererEmailError();
	}
?>