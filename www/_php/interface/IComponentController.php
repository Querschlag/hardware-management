<?php
	/**
	* Interface for Component
	*
	* Interface for Insert, Update and Delete Component
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @author Thomas Michl <thomas.michl1988@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	interface IComponentController
	{
		/**
		 *  Select all components and print the room on UI
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function selectComponents();
		
		/**
		 *  function insert a new component
		 *
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function insertComponent();
		
		/**
		 *  function to update component
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
		public function updateComponent();
		
		/**
		 * function to delete component
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function deleteComponent();
		
	}
?>