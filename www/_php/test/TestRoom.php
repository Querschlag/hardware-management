<html>
	<head>
		<title>Test - Room</title>
	</head>
	<body>
					
		<?php
			
			// include IRoom
			require_once('../interface/IRoom.php');
		
			// include room controller
			require_once('../core/RoomController.php');
			
			// include mock database
			require_once('../test/MockDatabase.php');
		
			// include room entity
			require_once('../entity/RoomEntity.php');
		
			/**
			* Mock object room
			*
			* Mock object for the room
			*
			* @category 
			* @package
			* @author Johannes Alt <altjohannes510@gmail.com>
			* @copyright 2013 B3ProjectGroup2
			*/
			class MockRoom implements IRoom
			{
				/**
				 *  storage for the id
				 */
				private $_id;
				
				/**
				 *  storage for the number
				 */
				private $_number;
				
				/** 
				 *  storage for the name
				 */
				private $_name;
				
				/**
				 *  storage for the note
				 */
				private $_note;
				
				/**
				 *  storage for the rooms
				 */
				public $_rooms;
				
				/** 
				 * default constructor
				 */
				public function __construct($id, $number, $name, $note) 
				{
					// store id
					$this->_id = $id;
					
					// store number
					$this->_number = $number;
					
					// store name
					$this->_name = $name;
					
					// store note
					$this->_note = $note;
					
					// set assert options
					assert_options(ASSERT_BAIL, 1);
				}
				
				/**
				 *  function to display room
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com> 
				 */
				public function displayRoom($id, $number, $name, $note)
				{
					// print display room
					print $id . ' ' . $number . ' '. $name . ' ' . $note . '<br/>';
					
					// create room entity
					$entity = new RoomEntity();
					
					// set data
					$entity->roomId = $id;
					
					// set data
					$entity->roomNumber = $number;
					
					// set name
					$entity->roomName = $name;
					
					// set note 
					$entity->roomNote = $note;
					
					// store room
					$this->_rooms[] = $entity;
				}
				
				/**
				 *  function to get room number
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomNumber()
				{
					// return room number
					return $this->_number;
				}
					
				/** 
				 *  function to get room name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomName()
				{
					// return room name
					return $this->_name;
				}
					
				/**
				 * function to get room note 
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomNote()
				{
					// return note
					return $this->_note;
				}
					
				/**
				 * function to set error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */			
				public function setError()
				{
					assert(isset($this->_id) && isset($this->_name));
				}
				
				/**
				 * function to set room number erro
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setRoomNumberError()
				{
					assert(!(strlen($this->_number) == 3 && preg_match("[^\d]", $this->number, $matches)));
				}
				
				/**
				 * function to get room id
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getRoomId()
				{
					// return room id
					return $this->_id;
				}
			}
		?>		

		<b>Select Test</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->selectRooms();
			
			// iteration over all db rooms
			foreach($database->_rooms as $dbRoom)
			{
				// found flag
				$found = FALSE;
				
				// iteration over all view rooms
				foreach($view->_rooms as $viewRoom)
				{
					// check room id
					if($dbRoom->roomId == $viewRoom->roomId)
					{
						// check name
						assert($dbRoom->roomName == $viewRoom->roomName);
						
						// check note
						assert($dbRoom->roomNote == $viewRoom->roomNote);
						
						// check room number
						assert(sprintf("%d%02d", $dbRoom->roomFloor, $dbRoom->roomNumber) == $viewRoom->roomNumber);	
						
						// set found
						$found = TRUE;
					}
				}
				
				// check found flag
				assert($found);
			}			
		?>

		<br/>
		
		<b>Insert Test 1 (Room Number '1')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == FALSE);
						
			// print success
			print 'Success';
		?>

		<br/>
		
		<b>Insert Test 2 (Room Number '01')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '01', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == FALSE);
						
			// print success
			print 'Success';		
		?>
		
		<br/>
		
		<b>Insert Test 3 (Room Number '001')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '001', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]));
			
			// check insert parameter
			assert($database->_rooms[0]->roomFloor == 0);
			assert($database->_rooms[0]->roomNumber == 1);
			assert($database->_rooms[0]->roomName == $view->getRoomName());
			assert($database->_rooms[0]->roomNote == $view->getRoomNote());
						
			// print success
			print 'Success';
		?>
		
		<br/>
		
		<b>Insert Test 4 (Room Number '001a')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '001a', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == FALSE);
						
			// print success
			print 'Success';
		?>
		
		<br/>
		
		<b>Insert Test 5 (Room Number '')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == FALSE);
						
			// print success
			print 'Success';
		?>
		
		<br/>
		
		<b>Insert Test 6 (Name '')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '001', '', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == FALSE);
						
			// print success
			print 'Success';
		?>
		
		<br/>
		
		<b>Update Test 1 (Update!)</b><br/>
		<?php
			// create view and database
			$view = new MockRoom(1, '001', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			assert($database->_rooms[0]->roomFloor == 0);
			assert($database->_rooms[0]->roomNumber == 1);
			assert($database->_rooms[0]->roomName == $view->getRoomName());
			assert($database->_rooms[0]->roomNote == $view->getRoomNote());
			
			// create new view and controller with new data
			$view = new MockRoom(0, '101', 'Religion', '');
			$controller = new RoomController($view, $database);
			
			// update room
			$controller->updateRoom();

			// check update file
			assert(isset($database->_rooms[0]) == TRUE);
			assert($database->_rooms[0]->roomFloor == 1);
			assert($database->_rooms[0]->roomNumber == 1);
			assert($database->_rooms[0]->roomName == $view->getRoomName());
			assert($database->_rooms[0]->roomNote == $view->getRoomNote());			

			// print success
			print 'Success';
		?>

		<br/>
		
		<b>Update Test 2 (No Update!)</b><br/>
		<?php
			// create view and database
			$view1 = new MockRoom(1, '001', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view1, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			assert($database->_rooms[0]->roomFloor == 0);
			assert($database->_rooms[0]->roomNumber == 1);
			assert($database->_rooms[0]->roomName == $view1->getRoomName());
			assert($database->_rooms[0]->roomNote == $view1->getRoomNote());
			
			// create new view and controller with new data
			$view2 = new MockRoom(0, '555', '', '');
			$controller = new RoomController($view2, $database);
			
			// update room
			$controller->updateRoom();

			// check update file
			assert(isset($database->_rooms[0]) == TRUE);
			assert($database->_rooms[0]->roomFloor == 0);
			assert($database->_rooms[0]->roomNumber == 1);
			assert($database->_rooms[0]->roomName == $view1->getRoomName());
			assert($database->_rooms[0]->roomNote == $view1->getRoomNote());			

			// print success
			print 'Success';
		?>

		<br/>
		
		<b>Update Test 3 (No Update!)</b><br/>
		<?php
			// create view and database
			$view1 = new MockRoom(1, '001', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view1, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			assert($database->_rooms[0]->roomFloor == 0);
			assert($database->_rooms[0]->roomNumber == 1);
			assert($database->_rooms[0]->roomName == $view1->getRoomName());
			assert($database->_rooms[0]->roomNote == $view1->getRoomNote());
			
			// create new view and controller with new data
			$view2 = new MockRoom(0, '55', 'Reli', '');
			$controller = new RoomController($view2, $database);
			
			// update room
			$controller->updateRoom();

			// check update file
			assert(isset($database->_rooms[0]) == TRUE);
			assert($database->_rooms[0]->roomFloor == 0);
			assert($database->_rooms[0]->roomNumber == 1);
			assert($database->_rooms[0]->roomName == $view1->getRoomName());
			assert($database->_rooms[0]->roomNote == $view1->getRoomNote());	

			// print success
			print 'Success';
		?>
		
	</body>
</html>