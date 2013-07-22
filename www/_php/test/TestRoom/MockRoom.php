<html>
	<head>
		<title>Mock - Object - Room</title>
	</head>
	<body>
					
		<?php
			
			// include IRoom
			require_once('../../interface/IRoom.php');
		
			// include room controller
			require_once('../../core/RoomController.php');
		
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
					assert(!isset($this->_id) && !isset($this->_name));
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
		
		<b>Insert Test 1 (Room Number '1')</b><br/>
		<?php  
			// create view and controller
			$view = new MockRoom(1, '1', 'Religion', 'Nur für Frau Leutsch');
			$controller = new RoomController($view);
			
			// select controller
			$controller->insertRoom();
						
			// print success
			print 'Success';
		?>

		<br/>
		
		<b>Insert Test 2 (Room Number '01')</b><br/>
		<?php  
			// create view and controller
			$view = new MockRoom(1, '01', 'Religion', 'Nur für Frau Leutsch');
			$controller = new RoomController($view);
			
			// select controller
			$controller->insertRoom();
			
			// print success
			print 'Success';
		?>
		
		<br/>
		
		<b>Insert Test 3 (Room Number '001')</b><br/>
		<?php  
			// create view and controller
			$view = new MockRoom(1, '001', 'Religion', 'Nur für Frau Leutsch');
			$controller = new RoomController($view);
			
			// select controller
			$controller->insertRoom();
			
			// print success
			print 'Success';
		?>
		
		<br/>
		
		<b>Insert Test 4 (Room Number '001a')</b><br/>
		<?php  
			// create view and controller
			$view = new MockRoom(1, '001a', 'Religion', 'Nur für Frau Leutsch');
			$controller = new RoomController($view);
			
			// select controller
			$controller->insertRoom();
			
			// print success
			print 'Success';
		?>
		
		<br/>
		<br/>
		
		<b>Insert Test 5 (Room Number '')</b><br/>
		<?php  
			// create view and controller
			$view = new MockRoom(1, '', 'Religion', 'Nur für Frau Leutsch');
			$controller = new RoomController($view);
			
			// select controller
			$controller->insertRoom();
			
			// print success
			print 'Success';
		?>
		
			<b>Insert Test 6 (Name '')</b><br/>
		<?php  
			// create view and controller
			$view = new MockRoom(1, '001', '', 'Nur für Frau Leutsch');
			$controller = new RoomController($view);
			
			// select controller
			$controller->insertRoom();
			
			// print success
			print 'Success';
		?>
	</body>
</html>