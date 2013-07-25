<?php
	// include idatabase interface
	require_once('../interface/IDatabase.php');
	
	// include room entity
	require_once('../entity/RoomEntity.php');
	
	// include component entity
	require_once('../entity/ComponentEntity.php');
	
	// include deliverer entity
	require_once('../entity/DelivererEntity.php');

	/**
	* Mock object room
	*
	* Mock object for the room
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @author Thomas Michl <thomas.michl1988@gmail.com>
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class MockDatabase implements IDatabase
	{
		/**
		 *  storage for the last insert, update or delete room
		 */
		public $_rooms = array();
		
		/**
		 *  storage for the last insert, update or delete component
		 */
		public $_component = array();
		
		/**
		 *  storage for the last insert, update or delete deliverer
		 */
		public $_deliverers = array();
				
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
			
			// set default room id
			$id = 0;
			
		    // get next free id name
		    foreach($this->_rooms as $room)
			{
				// check id
				if($room->roomId > $id)
				{
					// set room id
					$id = $room->roomId;
				}
			}
			
			// set room id
			$entity->roomId = $id;
			
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
		public function updateRoom($id, $floor, $number, $name, $note)
		{
			// iteration over all rooms
			foreach($this->_rooms as $key => $room)
			{
				// check id of the value
				if($room->roomId == $id)
				{
					// change data
					$room->roomFloor = $floor;
				
					// change number
					$room->roomNumber = $number;
				
					// change name
					$room->roomName = $name;
				
					// change note
					$room->roomNote = $note;
				
					// set room
					$this->_rooms[$key] = $room;
				
					// break
					break;
				}
			}
			// check room
			if(isset($room))
			{
				
			}
		}
		
		/**
		 *  function to delete room
		 * 
		 * @param int $id The Room id.
		 */
		public function deleteRoom($id){}
		
		/**
		 * function to get components
		 * 
		 * @return ComponentsEntity[] 
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function getComponents()
		{
			// create first room entity
			$entity = new ComponentEntity();
			
			// set room data
			$entity->componentId = 1;
			$entity->componentDeliverer = 1;
			$entity->componentRoom = 1;
			$entity->componentName = 'CPU';
			$entity->componentBuy = 14;
			$entity->componentWarranty = 14;
			$entity->componentNote = 'Notiz';
			$entity->componentSupplier = 'INTEL';
			$entity->componentType = 1;

			// add entity to array
			$this->_component[] = $entity;
			
			// return entites
			return $this->_component;
		}
		/**
		 *  function to insert components
		 * 
		 * @param integer $deliverer The components deliverer id
		 * @param integer $room The components room id
		 * @param string $name The components name
		 * @param interger $buy The components buy date
		 * @param integer $warranty The components warranty
		 * @param string $note The components note
		 * @param string $supplier The components supplier
		 * @param integer $type The components type
		 * 
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function insertComponent($deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type)
		{
			// store data in room entity
			$entity = new ComponentEntity();
			
			// set data
			$entity->componentDeliverer = $deliverer;
			
			// set number
			$entity->componentRoom = $room;
			
			// set name
			$entity->componentName = $name;
			
			// set note
			$entity->componentBuy = $buy;
			
			// set name
			$entity->componentWarranty = $warranty;
			
			// set note
			$entity->componentNote = $note;
			
			// set name
			$entity->componentProducer = $supplier;
			
			// set note
			$entity->componentType = $type;
			
			// store entity
			$this->_component[] = $entity;
		}
				
		/**
		 * update a component
		 * 
		 * @param integer $id The components component id
		 * @param integer $deliverer The components deliverer id
		 * @param integer $room The components room id
		 * @param string $name The components name
		 * @param string $buy The components buy date
		 * @param integer $warranty The components warranty
		 * @param string $note The components note
		 * @param string $supplier The components supplier
		 * @param integer $type The components type
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>   
		 */
		public function updateComponent($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type)
		{			
			// set data
			$this->_component[$id]->componentDeliverer = $deliverer;
			
			// set number
			$this->_component[$id]->componentRoom = $room;
			
			// set name
			$this->_component[$id]->componentName = $name;
			
			// set note
			$this->_component[$id]->componentBuy = $buy;
			
			// set name
			$this->_component[$id]->componentWarranty = $warranty;
			
			// set note
			$this->_component[$id]->componentNote = $note;
			
			// set name
			$this->_component[$id]->componentProducer = $supplier;
			
			// set note
			$this->_component[$id]->componentType = $type;
		}
		
		/**
		 * delete a component
		 * 
		 * @param integer $id The components component id
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
 		public function deleteComponent($id)
 		{
 			unset($this->_component[$id]);
 		}

		/**
		 * delete a component
		 * 
		 * @param integer $id The components component id
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
		public function rejectionComponent($id) {
				
			// component room change to to stock
			// component note change
			$this->_component[$id]->componentNote = "ausgemustert";
		}
		
		/**
		 * select all deliverers
		 * 
		 * @return void
		 */
		 public function getDeliverers()
		 {
		 	// create first deliverer entity
			$entity = new DelivererEntity();
			
			// set deliverer data
			$entity->delivererId = 1;
			$entity->delivererCompanyName = "Funkwerk";
			$entity->delivererStreet = "Südwestpark 94";
			$entity->delivererZip = "90449";
			$entity->delivererCity = "Nürnberg";
			$entity->delivererTelephone = "0911/208 3462";
			$entity->delivererMobile = "0171/2310983";
			$entity->delivererFax = "0911/208 3463";
			$entity->delivererEmail = "info@funkwerk.de";
			$entity->delivererCountry = "Deutschland";
		
			// add entity to array
			$this->_deliverers[] = $entity;
			
			// return entites
			return $this->_deliverers;
		 }
		 
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
		  * @param string $country country 
		  * 
		  * @return void
		  */
		 public function insertDeliverer($companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email, $country)
		 {
		 	// create first deliverer entity
			$entity = new DelivererEntity();
			
			$entity->delivererCompanyName = $companyName;
			$entity->delivererStreet = $street;
			$entity->delivererZip = $zipCode;
			$entity->delivererCity = $location;
			$entity->delivererTelephone = $phoneNumber;
			$entity->delivererMobile = $mobileNumber;
			$entity->delivererFax = $faxNumber;
			$entity->delivererEmail = $email;
			$entity->delivererCountry = $country;
			
			// store entity
			$this->_deliverers[] = $entity;
			
		 }
		 
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
		 public function updateDeliverer($id, $companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email, $country){}
		 
		 /**
		  * delete deliverer
		  * 
		  * @return void
		  */
		 public function deleteDeliverer($id){}
		 
		 /**
		 * select all Usergroups
		 * 
		 * @return UsergroupEntity[]
		 */
		 public function getUsergroups()
		 {}
		 
		 /**
		  * insert usergroup
		  *
		  * @param string $name usergroup name 
		  * @param int $permission number which displayed the Rights of the usergroup 		  
		  * 
		  * @return 1 - true
		  *			2 - false
		  */
		 public function insertUsergroup($name, $permission)
		 {}
		 
		 /**
		  * update usergroup
		  *
	  	  * @param int $id id
		  * @param string $name usergroup name 
		  * @param int $permission number which displayed the Rights of the usergroup 		  
		  * 
		  * @return 1 - true
		  *			2 - false
		  */
		 public function updateUsergroup($id, $name, $permission)
		 {}
		 
		 /**
		  * delete usergroup
		  * 
		  * @return 1 - true
		  *			2 - false
		  */
		 public function deleteUsergroup($id)
		 {}
		 
		 
		  /**
		 * select the Usergroup by id
		 * 
		 * @param int $id id
		 *
		 * @return UsergroupEntity
		 */
		 public function getUsergroupById($id){}
		 
		 /**
		 * select all Users
		 * 
		 * @return UserEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getUsers(){}
		 
		 /**
		 * insert user
		 *
		 * @param string $name 
		 * @param int $userGroupId	  
		 * @param string $password (blank)
		 * @param string $email	  
		 *
		 * @return 1 - true
		 *			2 - false
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function insertUser($name, $userGroupId, $password, $email){}
		 
		 /**
		 * update user
		 *
	  	 * @param int $id id
		 * @param string $name 
		 * @param int $userGroupId	  
		 * @param string $password (blank)
		 * @param string $email
		 * 
		 * @return 1 - true
		 *			2 - false
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function updateUser($id, $name, $userGroupId, $password, $email){}
		 
		 /**
		 * delete user
		 * 
		 * @return 1 - true
		 *			2 - false
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function deleteUser($id){}
		 
		 /**
		 * check if password for user is correct
		 * 
		 * @param int $id id
		 * @param string $password password(blank)
		 * @return 1 - true (password correct)
		 *			2 - false(password incorrect)
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function checkUserPw($id, $password){}
		  
		 /**
		 * select all TransactionTypes
		 * 
		 * @return TransactionTypesEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactionTypes(){}

		 /**
		 * select TransactionTypeById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionType
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactionTypeById($id){}	

         /**
		 * select all Transaction
		 * 
		 * @return TransactionEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactions(){}

		 /**
		 * select TransactionById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionTypeEntity
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactionById($id){}			 
		   
		 /**
		 * select all ValidValue
		 * 
		 * @return ValidValueEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getValidValues(){}

		 /**
		 * select ValidValueById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionTypeEntity
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getValidValueEntityById($id){}
	}
?>
