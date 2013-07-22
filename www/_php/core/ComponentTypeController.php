<?php
	/**
	* Controller for ComponentTypes
	*
	* Controller for Insert, Update and Delete ComponentTypes
	*
	* @category 
	* @package
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @author Thomas Michl <thomas.michl1988@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class ComponentTypeController implements IComponentTypeController
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
		 *  Select all components and print the room on UI
		 * 
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function selectComponents()
		{
			// get rooms from database
			$components = $_database->getComponents();
			
			// iteration over all rooms
			foreach($components as $component)
			{							
				// display room
				$_view->displayComponents($component['k_id']);
			}
		}
		
		/**
		 *  Insert a new Component to database
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
		public function insertComponent()
		{			
			// get component deliverer
			$deliverer = $_view->getComponentDeliverer();
			
			// get component room
			$room = $_view->getComponentRoom();
			
			// get component name
			$name = $_view->getComponentName();
			
			// get component buying date
			$date = $_view->getComponentDate();
			
			// get component length of warranty (timestamp)
			$warranty = $_view->getComponentWarranty();
			
			// get component note
			$note = $_view->getComponentNote();
			
			// get component supplier
			$supplier = $_view->getComponentSupplier();
			
			// get component type
			$type = $_view->getComponentTypes();
			
			// check room number and room name
			if($deliverer && $room && $name && $warranty && $date && $supplier && $type)
			{
				// insert room
				$_database->insertComponent($deliverer, $room, $name, $date, $warranty, $note, $supplier, $type);
			}
			else 
			{
				// set error to frontend
				$_view->setError();
			}
		}
	}
?>