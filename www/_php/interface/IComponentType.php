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
	interface IComponentType
	{
		/**
		 *  function to display components
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function displayComponents($id);
		
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
		public function getComponentDate();
			
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
		 * function to set error
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */			
		public function setError();
	}
?>