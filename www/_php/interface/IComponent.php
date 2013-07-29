<?php
	/**
	* Interface for Room
	*
	* Interface for display Room
	*
	* @category 
	* @package
	* @author Thomas Michl <thomas.michl1988@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	interface IComponent
	{
		/**
		 *  function to display components
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function displayComponents($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type, $isDevice);
		
		/**
		 *  function to display device
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com> 
		 */
		public function displayDevice($id, $name, $note, $deviceHasProblems=false);
		
		/**
		 *  function to display floor
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDeviceType($DeviceTypeName);
		
		/**
		 *  function to display floor
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDeviceTypeEnd();
		
		/** 
		 *  function to display problem count
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com> 
		 */
		public function displayProblemCount($count);
		
		/**
		 *  function to get component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentId();
		
		/**
		 *  function to set component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function setComponentId($id);
		
		/**
		 *  function to get component deliverer
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentDeliverer();
			
		/** 
		 *  function to get component room
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentRoom();
			
		/**
		 * function to get component name 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentName();
			
		/**
		 * function to get component buying date 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentBuy();
			
		/**
		 * function to get component warranty 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentWarranty();
			
		/**
		 * function to get component note 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentNote();
			
		/**
		 * function to get component supplier 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentSupplier();
			
		/**
		 * function to get component types 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentTypes();
			
		/**
		 * function to get component types 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentIsDevice();
		
		/**
		 * function to set error
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */			
		public function setError();
	}
?>