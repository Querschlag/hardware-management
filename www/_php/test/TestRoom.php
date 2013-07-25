<html>
	<head>
		<title>Test - Room</title>
	</head>
	<body>
					
		<?php
			
			mail('alt.johannes@gmx.net', 'Subject', 'Message');
			
			// include IRoom
			if(file_exists('../interface/IRoom.php')) require_once('../interface/IRoom.php');
			if(file_exists('../_php/interface/IRoom.php')) require_once('../_php/interface/IRoom.php');
		
			// include room controller
			if(file_exists('../core/RoomController.php')) require_once('../core/RoomController.php');
			if(file_exists('../_php/core/RoomController.php')) require_once('../_php/core/RoomController.php');
			
			// include mock database			
			if(file_exists('../test/MockDatabase.php')) require_once('../test/MockDatabase.php');
			if(file_exists('../_php/test/MockDatabase.php')) require_once('../_php/test/MockDatabase.php');
			
			// include room entity
			if(file_exists('../entity/RoomEntity.php')) require_once('../entity/RoomEntity.php');
			if(file_exists('../_php/entity/RoomEntity.php')) require_once('../_php/entity/RoomEntity.php');
					
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
				 * storage for the floor number
				 */
				private $_floor;
				
				/** 
				 * default constructor
				 */
				public function __construct($id, $floor, $number, $name, $note) 
				{
					// store id
					$this->_id = $id;
					
					// store number
					$this->_number = $number;
					
					// store name
					$this->_name = $name;
					
					// store note
					$this->_note = $note;
					
					// store floor number
					$this->_floor = $floor;
					
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
				 *  function to display floor
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayFloor($floorNumber)
				{
					// store floor number
					$this->_floor = $floorNumber;
				}
				
				/**
				*  function to display room end
				* 
				*  @author Johannes Alt <altjohannes@gmail.com>
				*/
				public function displayRoomEnd()  { }
		
				
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
				 *  function to set required data error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setRequiredDataError()
				{
					assert(!(isset($number) && strlen($number) > 0 && !empty($name) && isset($floor) && strlen($floor) > 0));
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
				
				/** 
				 *  function to get floor number
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getFloorNumber()
				{
					// return floor number
					return $this->_floor;
				}
				
				/**
				 *  function to compare if room is equal
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function Equal($room)
				{
					// check floor
					assert($room->roomFloor == $this->_floor);
					
					// check number
					assert($room->roomNumber == $this->_number);
					
					// check name
					assert($room->roomName == $this->_name);
					
					// check note
					assert($room->roomNote == $this->_note);
				}
				
				/**
				 *  function to compare if room is not equal
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function NotEqual($room)
				{
					// check floor
					assert($room->roomFloor != $this->_floor);
					
					// check number
					assert($room->roomNumber != $this->_number);
					
					// check name
					assert($room->roomName != $this->_name);
					
					// check note
					assert($room->roomNote != $this->_note);					
				}
			}
		?>		

		<b>Select Test 1</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, 1, '1', 'Religion', 'Nur für Frau Leutsch');
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
						// check for equal room
						// $view->Equal($dbRoom);

						// set found
						$found = TRUE;
					}
				}
				
				// check found flag
				assert($found);
			}
						
			// print success
			print 'Success';			
		?>

		<br/>

		<b>Select Test 2</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, 1, '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$room = $controller->selectRoom();
			
			// print success
			print 'Success';
		?>

		<br/>

		<b>Select Test 3</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1000, 1, '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$room = $controller->selectRoom();
										
			// print success
			print 'Success';
		?>


		<br/>
		
		<b>Insert Test 1 (Room Number '1')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '', '101', 'Religion', 'Nur für Frau Leutsch');
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
			$view = new MockRoom(1, '01', '', 'Religion', 'Nur für Frau Leutsch');
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
			$view = new MockRoom(1, '0', '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// select controller
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]));
			
			// check insert parameter
			$view->Equal($database->_rooms[0]);
						
			// print success
			print 'Success';
		?>
		
		<br/>
		
		<b>Insert Test 4 (Name '')</b><br/>
		<?php  
			// create view and database
			$view = new MockRoom(1, '0', '001', '', 'Nur für Frau Leutsch');
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
			$view = new MockRoom(1, '0', '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			$view->Equal($database->_rooms[0]);
			
			// create new view and controller with new data
			$view = new MockRoom(0, '1', '1', 'Religion', '');
			$controller = new RoomController($view, $database);
			
			// update room
			$controller->updateRoom();

			// check update file
			assert(isset($database->_rooms[0]) == TRUE);
			$view->Equal($database->_rooms[0]);
			
			// print success
			print 'Success';
		?>

		<br/>
		
		<b>Update Test 2 (No Update!)</b><br/>
		<?php
			// create view and database
			$view1 = new MockRoom(1, '0', '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view1, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			$view1->Equal($database->_rooms[0]);
			
			// create new view and controller with new data
			$view2 = new MockRoom(0, '', '555', '', '');
			$controller = new RoomController($view2, $database);
			
			// update room
			$controller->updateRoom();

			// check update file
			assert(isset($database->_rooms[0]) == TRUE);
			$view1->Equal($database->_rooms[0]);
			$view2->NotEqual($database->_rooms[0]);
			
			// print success
			print 'Success';
		?>

		<br/>
		
		<b>Update Test 3 (No Update!)</b><br/>
		<?php
			// create view and database
			$view1 = new MockRoom(1, '0', '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view1, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			$view1->Equal($database->_rooms[0]);
			
			// create new view and controller with new data
			$view2 = new MockRoom(0, '', '55', 'Reli', '');
			$controller = new RoomController($view2, $database);
			
			// update room
			$controller->updateRoom();

			// check update file
			assert(isset($database->_rooms[0]) == TRUE);
			$view1->Equal($database->_rooms[0]);
			$view2->NotEqual($database->_rooms[0]);
			
			// print success
			print 'Success';
		?>
		
		
		<br/>
		
		<b>Delete Test 1 (Delete!)</b><br/>
		<?php
			// create view and database
			$view1 = new MockRoom(1, '0', '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view1, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			$view1->Equal($database->_rooms[0]);
			
			// create new view and controller with new data
			$view2 = new MockRoom($database->_rooms[0]->roomId, '', '', '', '');
			$controller = new RoomController($view2, $database);
			
			// update room
			$controller->deleteRoom();

			// check update file
			assert(isset($database->_rooms[0]) == FALSE);
			
			// print success
			print 'Success';
		?>

		<br/>

		<b>Delete Test 2 (No Delete!)</b><br/>
		<?php
			// create view and database
			$view1 = new MockRoom(1, '0', '1', 'Religion', 'Nur für Frau Leutsch');
			$database = new MockDatabase();
			
			// create controller
			$controller = new RoomController($view1, $database);
			
			// insert room
			$controller->insertRoom();
						
			// check last insert file
			assert(isset($database->_rooms[0]) == TRUE);
			$view1->Equal($database->_rooms[0]);
			
			// create new view and controller with new data
			$view2 = new MockRoom(($database->_rooms[0]->roomId + 1), '', '', '', '');
			$controller = new RoomController($view2, $database);
			
			// update room
			$controller->deleteRoom();

			// check update file
			assert(isset($database->_rooms[0]) == TRUE);
			
			// print success
			print 'Success';
		?>
		
	</body>
</html>