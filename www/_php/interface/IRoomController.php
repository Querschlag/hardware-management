<?php
	/**
	* Interface for Room
	*
	* Interface for Insert, Update and Delete Room
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	interface IRoomController
	{
		/**
		 *  function to get count of errors
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getErrorCount();
		
		/**
		 *  Select all rooms and print the room on UI
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function selectRooms();
		
		/** 
		 * Select a room and print the room on UI
		 * 
		 *  @author Johannes Alt <altjohannes@gmail.com>
		 */
		public function selectRoom();
		
		/**
		 *  function insert a new room
		 *
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function insertRoom();
		
		/**
		 *  function to update room
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function updateRoom();
		
		/**
		 * function to delete room
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function deleteRoom();
		
		/**
		 * function to get rooms (only Entities)
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getRooms();
	}
?>