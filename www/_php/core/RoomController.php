<?php
	
	// include room controller
	require_once('../_php/interface/IRoomController.php');

	// include room entity
	require_once('../_php/entity/RoomEntity.php');

	/**
	* Controller for Rooms
	*
	* Controller for Insert, Update and Delete Rooms
	*
	* @category 
	* @package
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class RoomController implements IRoomController
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

			// store database
			$this->_database = $database;
		}
		
		/**
		 *  Select all rooms and print the room on UI
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function selectRooms()
		{
			// get rooms from database
			$rooms = $this->_database->getRooms();
			
			// create floor array
			$floors = array();
			
			// iteration over all rooms
			foreach($rooms as $room)
			{
				// add room to floor list
				$floors[$room->roomFloor][] = $room;					
			}
			
			// iteration over all floors
			foreach($floors as $key=>$floor)
			{
				// display floor number
				$this->_view->displayFloor($key);
				
				// iteration over the floor rooms
				foreach($floor as $room)
				{
					// display room
					$this->_view->displayRoom(
						$room->roomId, 
						$room->roomNumber,
						$room->roomName, 
						$room->roomNote);	
				}
				
			// display room end
				$this->_view->displayRoomEnd();
			}
		}
		
		/**
		 *  Insert a new room to database
		 *
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function insertRoom()
		{
			// get room number from frontend
			$number = $this->_view->getRoomNumber();
			
				// get floor number
			$floor = $this->_view->getFloorNumber();
			
				// get room name from frontend
				$name = $this->_view->getRoomName();
				
				// get room note from frontend
				$note = $this->_view->getRoomNote();
				
				// check room number and room name
				if(isset($number) && !empty($name))
				{
					// insert room
					$result = $this->_database->insertRoom($floor, $number, $name, $note);
				}
				else 
				{
					// set error to frontend
					$this->_view->setError();
				}
			}
		
		/**
		 *  function to update room
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function updateRoom()
		{
			// get uniquei room id
			$id = $this->_view->getRoomId();
			
			// get room number from frontend
			$number = $this->_view->getRoomNumber();
			
				// get floor number
			$floor = $this->_view->getFloorNumber();
			
				// get room name from frontend
				$name = $this->_view->getRoomName();
				
				// get room note from frontend
				$note = $this->_view->getRoomNote();
				
				// check room id, room number and romm name
				if(isset($id) && !empty($name))
				{
					// update room
					$result = $this->_database->updateRoom($id, $floor, $number, $name, $note);
				}
				else 
				{
					// set error to frontend
					$this->_view->setError();
				}
			}
		
		/**
		 * function to delete room
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function deleteRoom()
		{
			// get uniquei room id
			$id = $this->_view->getRoomId();
			
			// check room id
			if(isset($id))
			{
				// delete room
				$result = $this->_database->deleteRoom($id);
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
			}	
		}
	}
?>