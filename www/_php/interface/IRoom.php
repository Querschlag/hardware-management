<?php
	/**
	* Interface for Room
	*
	* Interface for display Room
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	interface IRoom
	{
		/**
		 *  function to display room
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function displayRoom($id, $number, $name, $note);
		
		/**
		 *  function to display floor
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayFloor($floorNumber);
		
		/**
		*  function to display room end
		* 
		*  @author Johannes Alt <altjohannes@gmail.com>
		*/
		public function displayRoomEnd();
		
		/**
		 *  function to get room number
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomNumber();
			
		/** 
		 *  function to get room name
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomName();
			
		/**
		 * function to get room note 
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomNote();
			
		/**
		 * function to set error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */			
		public function setError();
		
		/**
		 *  function to set required data error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function setRequiredDataError();
		
		/**
		 * function to get room id
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomId();
		
		/** 
		 *  function to get floor number
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getFloorNumber();
	}
?>