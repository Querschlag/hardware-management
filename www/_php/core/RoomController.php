<?php
	
	// include room controller
	require_once('../../interface/IRoomController.php');

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
		function __construct($view) 
		{
			// store view
			$this->_view = $view;

			// create database
			// TODO 
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
			
			// iteration over all rooms
			foreach($rooms as $room)
			{							
				// display room
				$this->_view->displayRoom(
					$room['r_id'], 
					sprintf("%1%02d", $room['r_etage'], $room['r_nr']), 
					$room['r_bezeichnung'], 
					$room['r_notiz']);
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
			
			// check room number
			if(strlen($number) == 3 && preg_match("[^\d]", $number, $matches))
			{
				// get floor number
				$floor = $this->getFloorNumberByNumber($number);
			
				// get room name from frontend
				$name = $this->_view->getRoomName();
				
				// get room note from frontend
				$note = $this->_view->getRoomNote();
				
				// check room number and room name
				if(isset($number) && isset($name))
				{
					// insert room
					$result = $this->_database->insertRoom($floor, $number, $name, $note);
					
					// check result of the function
					if($result == TRUE)
					{
						// set success information
						$this->_view->setSuccess();
					}
					else 
					{
						// set error to frontend
						$this->_view->setError();						
					}
				}
				else 
				{
					// set error to frontend
					$this->_view->setError();
				}
			}
			else 
			{
				// set room number error
				$this->_view->setRoomNumberError();
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
			
			// check room number
			if(strlen($number) == 3 && preg_match("[^\d]", $number, $matches))
			{
				// get floor number
				$floor = $this->getFloorNumberByNumber($number);
			
				// get room name from frontend
				$name = $this->_view->getRoomName();
				
				// get room note from frontend
				$note = $this->_view->getRoomNote();
				
				// check room id, room number and romm name
				if(isset($id) && isset($name))
				{
					// update room
					$result = $this->_database->updateRoom($id, $floor, $number, $name, $note);
					
					// check result of the function
					if($result == TRUE)
					{
						// set success information
						$this->_view->setSuccess();
					}
					else 
					{
						// set error to frontend
						$this->_view->setError();						
					}
				}
				else 
				{
					// set error to frontend
					$this->_view->setError();
				}
			}
			else 
			{
				// set room number error
				$this->_view->setRoomNumberError();
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
				
				// check result of the function
				if($result == TRUE)
				{
					// set success information
					$this->_view->setSuccess();
				}
				else 
				{
					// set error to frontend
					$this->_view->setError();						
				}
			}
			else 
			{
				// set error to frontend
				$this->_view->setError();
			}	
		}
		
		/**
		 *  function to get floor number by room number
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		private function getFloorNumberByNumber(&$number)
		{
			// floor number
			$floor = null;
			
			// check for int
			if(is_integer($number))
			{
				// find all numbers in string
				$found = preg_match("[\d]", $number, $matches); 
				
				// check found result
				if($found >= 1)
				{
					// get first number
					$floor = $matches[0];
					
					// set number to 0
					$number = 0;
					
					// from 1 to x
					for($index = 1; $index < $found; $index++)
					{
						// set number
						$number = ($number * 10) + $matches[$index];
					}
				}
			}
			
			// return floor number
			return $floor;			
		}
	}
?>