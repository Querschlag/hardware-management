<?php
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
			$_view = $view;
			
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
			$rooms = $_database->getRooms();
			
			// iteration over all rooms
			foreach($rooms as $room)
			{							
				// display room
				$_view->displayRoom($room['r_id'], $room['r_nr'], $room['r_bezeichnung'], $room['r_notiz']);
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
			$number = $_view->getRoomNumber();
			
			// get room name from frontend
			$name = $_view->getRoomName();
			
			// get room note from frontend
			$note = $_view->getRoomNote();
			
			// check room number and room name
			if(isset($number) && isset($name))
			{
				// insert room
				$_database->insertRoom($number, $name, $note);
			}
			else 
			{
				// set error to frontend
				$_view->setError();
			}
		}
	}
?>