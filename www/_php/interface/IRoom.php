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
		public function displayRoom($id, $number, $name, $note, $roomHasProblems=false);
		
		/**
		 *  function to display floor
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayFloor($floorNumber);
		
		/**
		*  function to display room end
		* 
		*  @author Johannes Alt <altjohannes510@gmail.com>
		*/
		public function displayRoomEnd();
		
		/** 
		 *  function to display problem count
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayProblemCount($count);
		
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
		
		/**
		* function to get Problems
		*
		* @return bool hasProblem
		* 
		* @author Daniel Schulz <schmoschu@gmail.com>
		*
		*/
		/*public function getProblems();*/
	}
?>