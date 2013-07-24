<?php
	/**
	* Interface for Database
	*
	* Interface for Database connection
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	interface IDatabase
	{
		/**
		 *  function to get rooms
		 *
		 * @return RoomEntity[] 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRooms();
		
		/**
		 *  function to insert room
		 * 
		 * @param int $floor The Room etage.
		 * @param int $number The Room number.
		 * @param string $name The Room name.
		 * @param string $note The Room note.
		 */
		public function insertRoom($floor, $number, $name, $note);
		
		/**
		 *  function to update room
		 * 
		 * @param int $id The Room id.
		 * @param int $floor The Room floor.
		 * @param int $number The Room number.
		 * @param string $name The Room name.
		 * @param string $note The Room note.
		 */
		public function updateRoom($id, $floor, $number, $name, $note);
		
		/**
		 *  function to delete room
		 * 
		 * @param int $id The Room id.
		 */
		public function deleteRoom($id);
		
		/**
		 * function to get components
		 * 
		 * @return components
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function getComponents();
		
		/**
		 *  function to insert components
		 * 
		 * @param integer $deliverer The components deliverer id
		 * @param integer $room The components room id
		 * @param string $name The components name
		 * @param integer $buy The components buy date
		 * @param integer $warranty The components warranty
		 * @param string $note The components note
		 * @param string $supplier The components supplier
		 * @param integer $type The components type
		 * 
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function insertComponent($deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type);
				
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
		public function updateComponent($id, $deliverer, $room, $name, $date, $warranty, $note, $supplier, $type);
		
		/**
		 * delete a component
		 * 
		 * @param integer $id The components component id
		 *
		 * @return void
		 * @author Thomas Michl <thomas.michl1988@gmail.com>  
		 */
 		public function deleteComponent($id);
		
		/**
		 * select all deliverers
		 * 
		 * @return DelivererEntity[]
		 */
		 public function getDeliverers();
		 
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
		  * @return 1 - true
		  *			2 - false
		  */
		 public function insertDeliverer($companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email);
		 
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
		  * @return 1 - true
		  *			2 - false
		  */
		 public function updateDeliverer($id, $companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email);
		 
		 /**
		  * delete deliverer
		  * 
		  * @return 1 - true
		  *			2 - false
		  */
		 public function deleteDeliverer($id);
		 
		 /**
		 * select all Usergroups
		 * 
		 * @return UsergroupEntity[]
		 */
		 public function getUsergroups();
		 
		 /**
		  * insert usergroup
		  *
		  * @param string $name usergroup name 
		  * @param int $permission number which displayed the Rights of the usergroup 		  
		  * 
		  * @return 1 - true
		  *			2 - false
		  */
		 public function insertUsergroup($name, $permission);
		 
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
		 public function updateUsergroup($id, $name, $permission);
		 
		 /**
		  * delete usergroup
		  * 
		  * @return 1 - true
		  *			2 - false
		  */
		 public function deleteUsergroup($id);
		 
		  /**
		 * select the Usergroup by id
		 * 
		 * @param int $id id
		 *
		 * @return UsergroupEntity
		 */
		 public function getUsergroupById($id);
		 
		 /**
		 * select all Users
		 * 
		 * @return UserEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getUsers();
		 
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
		 public function insertUser($name, $userGroupId, $password, $email);
		 
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
		 public function updateUser($id, $name, $userGroupId, $password, $email);
		 
		 /**
		 * delete user
		 * 
		 * @return 1 - true
		 *			2 - false
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function deleteUser($id);
		 
		 /**
		 * check if password for user is correct
		 * 
		 * @param int $id id
		 * @param string $password password(blank)
		 * @return 1 - true (password correct)
		 *			2 - false(password incorrect)
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function checkUserPw($id, $password);
		  
		 /**
		 * select all TransactionTypes
		 * 
		 * @return TransactionTypesEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactionTypes();

		 /**
		 * select TransactionTypeById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionType
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactionTypeById($id);	

         /**
		 * select all Transaction
		 * 
		 * @return TransactionEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactions();

		 /**
		 * select TransactionById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionTypeEntity
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getTransactionById($id);			 
		   
		 /**
		 * select all ValidValue
		 * 
		 * @return ValidValueEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getValidValues();

		 /**
		 * select ValidValueById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionTypeEntity
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getValidValueEntityById($id);	
		  
}
