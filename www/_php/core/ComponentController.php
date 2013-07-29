<?php

	// include component controller
	if(file_exists('../interface/IComponentController.php')) require_once('../interface/IComponentController.php');
	if(file_exists('../_php/interface/IComponentController.php')) require_once('../_php/interface/IComponentController.php');
	
	// include component entity
	if(file_exists('../entity/ComponentEntity.php')) require_once('../entity/ComponentEntity.php');
	if(file_exists('../_php/entity/ComponentEntity.php')) require_once('../_php/entity/ComponentEntity.php');
	
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
		function __construct($view, $database) 
		{
			// store view
			$this->_view = $view;
			
			// create database
			$this->_database = $database; 
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
					$component->componentId,
					$component->componentDeliverer,
					$component->componentRoom,
					$component->componentName,
					$component->componentBuy,
					$component->componentWarranty,
					$component->componentNote,
					$component->componentSupplier,
					$component->componentType,
					$component->componentIsDevice);
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
			$buy = $this->_view->getComponentBuy();
			
			// get component length of warranty (timestamp)
			$warranty = $this->_view->getComponentWarranty();
			
			// get component note
			$note = $this->_view->getComponentNote();
			
			// get component supplier
			$supplier = $this->_view->getComponentSupplier();
			
			// get component type
			$type = $this->_view->getComponentTypes();
			
			// get component type
			$isDevice = $this->_view->getComponentIsDevice();
			
			// check room number and room name
			// if($deliverer && $room && $name && $warranty && $buy && $supplier && $type)
			// {
				// // insert component
				// $this->_database->insertComponent($deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type,$isDevice);
// 				
				// // insert component main or sub
				// // $this->_database->insertComponentComponent($aggregatId, $partId, $khkId);
// 				
				// // insert component transaction
				// $this->_database->insertComponentTransaction($componentId, $userId, $transactionId, $date, $comment);
// 				
// 				
// 				
			// }
			// else 
			// {
				// // set error to frontend
				// $this->_view->setError();
			// }
			$id = $this->_database->insertComponent($deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type, $isDevice);
			
			if($isDevice == 1) {
				$subId = $this->_database->insertSubComponent($id, 0);
			} else {
				$subId = $this->_database->insertSubComponent(POST('MainDevice'), $id);
			}
			
			$this->_view->setComponentId($id);
		}	
		
		/**
		 *  update a component
		 * 
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function updateComponent($id)
		{			
			// get component deliverer
			$deliverer = $this->_view->getComponentDeliverer();
			
			// get component room
			$room = $this->_view->getComponentRoom();
			
			// get component name
			$name = $this->_view->getComponentName();
			
			// get component buying buy
			$buy = $this->_view->getComponentBuy();
			
			// get component length of warranty (timestamp)
			$warranty = $this->_view->getComponentWarranty();
			
			// get component note
			$note = $this->_view->getComponentNote();
			
			// get component supplier
			$supplier = $this->_view->getComponentSupplier();
			
			// get component type
			$type = $this->_view->getComponentTypes();
			
			// check room number and room name
			if($id && $deliverer && $room && $name && $warranty && $note && $buy && $supplier && $type)
			{
				// insert room
				$this->_database->updateComponent($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type);
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
		public function deleteComponent($id)
		{			
			// check id,
			if(isset($id))
			{
				// delete component
				$this->_database->deleteComponent($id);
			}
			else 
			{
				// set error to frontend
				// $this->_view->setError();
			}
		}

		/**
		 * delete a component
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
		public function rejectionComponent($id)
		{			
			// check id,
			if(isset($id))
			{
				// delete component
				$this->_database->rejectionComponent($id);
			}
			else 
			{
				// set error to frontend
				// $this->_view->setError();
			}
		}
		
		/**
		 * delete a component
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
		public function selectAttributesByType($type) {
			return $this->_database->getComponentAttributesFromComponent($type);
		}
		
		/**
		 * delete a component
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
		public function insertAttributes($attributeId, $componentId, $value) {
			$this->_database->insertAttributeValue($attributeId, $componentId, $value);
		}
	}
?>