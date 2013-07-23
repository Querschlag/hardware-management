<?php
	/**
	* Controller for Components
	*
	* Controller for Insert, Update and Delete Components
	*
	* @category 
	* @package
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @author Thomas Michl <thomas.michl1988@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class ComponentController implements IComponentController
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
		 *  Select all components and print the room on UI
		 * 
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function selectComponents()
		{
			// get components from database
			$components = $this->_database->getComponents();
			
			// iteration over all components
			foreach($components as $component)
			{							
				// display components
				$this->_view->displayComponents(
					$component->componentId);
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
			$deliverer = $this->_view->getComponentDeliverer();
			
			// get component room
			$room = $this->_view->getComponentRoom();
			
			// get component name
			$name = $this->_view->getComponentName();
			
			// get component buying date
			$date = $this->_view->getComponentDate();
			
			// get component length of warranty (timestamp)
			$warranty = $this->_view->getComponentWarranty();
			
			// get component note
			$note = $this->_view->getComponentNote();
			
			// get component supplier
			$supplier = $this->_view->getComponentSupplier();
			
			// get component type
			$type = $this->_view->getComponentTypes();
			
			// check room number and room name
			if($deliverer && $room && $name && $warranty && $date && $supplier && $type)
			{
				// insert room
				$this->_database->insertComponent($deliverer, $room, $name, $date, $warranty, $note, $supplier, $type);
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
			}
		}	
		
		/**
		 *  update a component
		 * 
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function updateComponent()
		{
			// get unique deliverer id
			$id = $this->_view->getComponentId();
			
			// get component deliverer
			$deliverer = $this->_view->getComponentDeliverer();
			
			// get component room
			$room = $this->_view->getComponentRoom();
			
			// get component name
			$name = $this->_view->getComponentName();
			
			// get component buying date
			$date = $this->_view->getComponentDate();
			
			// get component length of warranty (timestamp)
			$warranty = $this->_view->getComponentWarranty();
			
			// get component note
			$note = $this->_view->getComponentNote();
			
			// get component supplier
			$supplier = $this->_view->getComponentSupplier();
			
			// get component type
			$type = $this->_view->getComponentTypes();
			
			// check room number and room name
			if($id && $deliverer && $room && $name && $warranty && $note && $date && $supplier && $type)
			{
				// insert room
				$this->_database->updateComponent($id, $deliverer, $room, $name, $date, $warranty, $note, $supplier, $type);
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
			}
		
		}

		/**
		 * delete a component
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
		public function deleteComponent()
		{
			// get unique component id
			$id = $this->_view->getComponentId();
			
			// check id,
			if(isset($id))
			{
				// delete component
				$this->_database->deleteComponent($id);
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
			}
		}	
	}
?>