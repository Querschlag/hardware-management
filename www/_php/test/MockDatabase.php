<?php
	// include idatabase interface
	require_once('../interface/IDatabase.php');
	
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
	class MockDatabase implements IDatabase
	{
		/**
		 *  storage for the last insert, update or delete room
		 */
		public $_rooms = array();
				
		/**
		 *  function to insert room
		 * 
		 * @param int $floor The Room etage.
		 * @param int $number The Room number.
		 * @param string $name The Room name.
		 * @param string $note The Room note.
		 */
		public function insertRoom($floor, $number, $name, $note)
		{
			// store data in room entity
			$entity = new RoomEntity();
			
			// set data
			$entity->roomFloor = $floor;
			
			// set number
			$entity->roomNumber = $number;
			
			// set name
			$entity->roomName = $name;
			
			// set note
			$entity->roomNote = $note;
			
			// store entity
			$this->_rooms[] = $entity;
		}	
		
		
		/**
		 *  function to get rooms
		 *
		 * @return RoomEntity[] 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRooms()
		{
			// create first room entity
			$entity = new RoomEntity();
			
			// set room data
			$entity->roomId = 1;
			$entity->roomFloor = 2;
			$entity->roomNumber = 14;
			$entity->roomName = 'Medien IT-Raum';
			$entity->roomNote = 'IT Raum der Mediendesigner';

			// add entity to array
			$this->_rooms[] = $entity;
			
			// create room entity
			$entity = new RoomEntity();
			
			// set room data
			$entity->roomId = 2;
			$entity->roomFloor = 1;
			$entity->roomNumber = 2;
			$entity->roomName = 'Unterrichtsraum';

			// add entity to array
			$this->_rooms[] = $entity;
			
			// create room entity
			$entity = new RoomEntity();
			
			// set room data
			$entity->roomId = 3;
			$entity->roomFloor = 0;
			$entity->roomNumber = 1;
			$entity->roomName = 'Labor';
			$entity->roomNote = '';

			// add entity to array
			$this->_rooms[] = $entity;
			
			// create room entity
			$entity = new RoomEntity();
			
			// set room data
			$entity->roomId = 4;
			$entity->roomFloor = 3;
			$entity->roomNumber = 0;

			// add entity to array
			$this->_rooms[] = $entity;
			
			// return entites
			return $this->_rooms;
		}
		
		/**
		 *  function to update room
		 * 
		 * @param int $id The Room id.
		 * @param int $floor The Room floor.
		 * @param int $number The Room number.
		 * @param string $name The Room name.
		 * @param string $note The Room note.
		 */
		public function updateRoom($id, $floor, $number, $name, $note){}
		
		/**
		 *  function to delete room
		 * 
		 * @param int $id The Room id.
		 */
		public function deleteRoom($id){}
		
		/**
		 * function to get components
		 * 
		 * @return components
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function getComponents(){}
		
		/**
		 *  function to insert components
		 * 
		 * @param integer $deliverer The components deliverer id
		 * @param integer $room The components room id
		 * @param string $name The components name
		 * @param string $date The components date
		 * @param integer $warranty The components warranty
		 * @param string $note The components note
		 * @param string $supplier The components supplier
		 * @param integer $type The components type
		 * 
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function insertComponents($deliverer, $room, $name, $date, $warranty, $note, $supplier, $type){}
				
		/**
		 * update a component
		 * 
		 * @param integer $id The components component id
		 * @param integer $deliverer The components deliverer id
		 * @param integer $room The components room id
		 * @param string $name The components name
		 * @param string $date The components date
		 * @param integer $warranty The components warranty
		 * @param string $note The components note
		 * @param string $supplier The components supplier
		 * @param integer $type The components type
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>   
		 */
		public function updateComponent($id, $deliverer, $room, $name, $date, $warranty, $note, $supplier, $type){}
		
		/**
		 * delete a component
		 * 
		 * @param integer $id The components component id
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
 		public function deleteComponent($id){}
		
		/**
		 * select all deliverers
		 * 
		 * @return void
		 */
		 public function getDeliverers(){}
		 
		 /**
		  * insert deliverer
		  *
		  * @param string $companyName company name 
		  * @param string $street street 
		  * @param string $zipCode zip code
		  * @param string $location location
		  * @param string $phoneNumber phone number
		  * @param string $mobileNumber mobile number
		  * @param string $faxNumber fax number
		  * @param string $email email 
		  * 
		  * @return void
		  */
		 public function insertDeliverer($companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email){}
		 
		 /**
		  * update deliverer
		  *
	  	  * @param int $id id
		  * @param string $companyName company name 
		  * @param string $street street 
		  * @param string $zipCode zip code
		  * @param string $location location
		  * @param string $phoneNumber phone number
		  * @param string $mobileNumber mobile number
		  * @param string $faxNumber fax number
		  * @param string $email email 
		  * 
		  * @return void
		  */
		 public function updateDeliverer($id, $companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email){}
		 
		 /**
		  * delete deliverer
		  * 
		  * @return void
		  */
		 public function deleteDeliverer($id){}
		
	}
?>
