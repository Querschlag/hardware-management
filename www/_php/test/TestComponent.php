<html>
	<head>
		<title>Test - Component</title>
	</head>
	<body>
					
		<?php
			
			// include IRoom
			require_once('../interface/IComponent.php');
		
			// include room controller
			require_once('../core/ComponentController.php');
			
			// include mock database
			require_once('../test/MockDatabase.php');
		
			// include room entity
			require_once('../entity/ComponentEntity.php');
		
			/**
			* Mock object room
			*
			* Mock object for the room
			*
			* @category 
			* @package
		 	* @author Thomas Michl <thomas.michl1988@gmail.com> 
			* @copyright 2013 B3ProjectGroup2
			*/
			class MockComponent implements IComponent
			{
				/**
				 *  storage for the component id
				 */
				private $_id;
				
				/**
				 *  storage for the deliverer id
				 */
				private $_deliverer;
				
				/** 
				 *  storage for the room id
				 */
				private $_room;
				
				/**
				 *  storage for the name
				 */
				private $_name;
				
				/**
				 *  storage for the buy timestamp
				 */
				public $_buy;
				
				/**
				 *  storage for the warranty
				 */
				public $_warranty;
				
				/**
				 *  storage for the note
				 */
				public $_note;
				
				/**
				 *  storage for the supplier
				 */
				public $_supplier;
				
				/**
				 *  storage for the type
				 */
				public $_type;
				
				/**
				 *  storage for the error
				 */
				public $_error;
				
				
				
				/**
				 *  storage for the type
				 */
				public $_components;
				
				/** 
				 * default constructor
				 */
				public function __construct($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type) 
				{
					// store id
					$this->_id = $id;
					
					// store deliverer
					$this->_deliverer = $deliverer;
					
					// store room
					$this->_room = $room;
					
					// store name
					$this->_name = $name;
					
					// store $buy
					$this->_buy = $buy;
					
					// store warranty
					$this->_warranty = $warranty;
					
					// store note
					$this->_note = $note;
					
					// store supplier
					$this->_supplier = $supplier;
					
					// store type
					$this->_type = $type;
					
					// set assert options
					assert_options(ASSERT_BAIL, 1);
				}
				
				/**
				 *  function to display room
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com> 
				 */
				public function displayComponents($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type)
				{
					// print display room
					print $id . ' ' . $deliverer . ' '. $room . ' ' . $name . ' ' . $buy . ' ' . $warranty . ' ' . $note . ' ' . $supplier . ' ' . $type . '<br/>';
					
					// create room entity
					$entity = new ComponentEntity();
					
					// set data
					$entity->componentId = $id;
					
					// set data
					$entity->componentDeliverer = $deliverer;
					
					// set name
					$entity->componentRoom = $room;
					
					// store room
					$this->_components[] = $entity;
				}
				
				/**
				 * function to get id
				 * 
		 		 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentId()
				{
					// return deliverer
					return $this->_id;
				}
				
				/**
				 *  function to get deliverer
				 * 
		 		 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentDeliverer()
				{
					// return deliverer
					return $this->_deliverer;
				}
					
				/** 
				 *  function to get room
				 * 
		 		 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentRoom()
				{
					// return room
					return $this->_room;
				}
					
				/**
				 * function to get room 
				 * 
		 		 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentName()
				{
					// return note
					return $this->_name;
				}
			
				/**
				 * function to get component buying date 
				 * 
				 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentBuy()
				{
					// return buy
					return $this->_buy;
				}
				/**
				 * function to get component warranty 
				 * 
				 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentWarranty()
				{
					// return warranty
					return $this->_warranty;
				}
				/**
				 * function to get component note 
				 * 
				 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentNote()
				{
					// return note
					return $this->_note;
				}
					
				/**
				 * function to get component supplier 
				 * 
				 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentSupplier()
				{
					// return supplier
					return $this->_supplier;
				}
					
				/**
				 * function to get component types 
				 * 
				 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */
				public function getComponentTypes()
				{
					// return type
					return $this->_type;
				}
				
				/**
				 * function to set error
				 * 
				 * @author Thomas Michl <thomas.michl1988@gmail.com>
				 */			
				public function setError()
				{
					// return error
					return $this->_error;
				}
			}
			?>
			
			<?php

			$view = new MockComponent(1, 1, 1, 'CPU', 12312312, 12312314, 'Notiz', 'INTEL', 1);
			$database = new MockDatabase();
			
			// create controller
			$controller = new ComponentController($view, $database);
			
			// select controller
			$controller->selectComponents();
			
			foreach($database->_component as $dbComponents)
			{
				var_dump($dbComponents);
			}
			
		?>
	</body>
</html>