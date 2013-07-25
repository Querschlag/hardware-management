<?php

	require_once('../interface/IDatabase.php');
	
	/**
	* Database connection
	*
	* Database connection to select, insert, update or delete data
	*
	* @category 
	* @package
	* @author Leon Geim<leon.geim@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class Database implements IDatabase
	{
		public function __construct() 
		{
			$verbindung = mysql_connect("localhost", "root", "");
			mysql_select_db("itv_v1");
					
		}
		
	
		/**
		 *  function to get rooms
		 *
		 * @return RoomEntity[] 
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function getRooms()
		{   
			$entityArray = array();
			
			$select = "SELECT * FROM raeume order by r_etage asc, r_nr asc;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new RoomEntity();
				$entity->roomId = $row['r_id'];
				$entity->roomNumber = $row['r_nr'];
				$entity->roomFloor = $row['r_etage'];
				$entity->roomName = $row['r_bezeichnung'];
				$entity->roomNote= $row['r_notiz'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		}
		
		/**
		 *  function to get room by id
		 *
		 * @return RoomEntity[] 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomByRoomId($id)
		{
			$select = "SELECT * FROM raeume order by r_etage asc, r_nr asc;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			$entity = new RoomEntity();
			$entity->roomId = $row['r_id'];
			$entity->roomNumber = $row['r_nr'];
			$entity->roomFloor = $row['r_etage'];
			$entity->roomName = $row['r_bezeichnung'];
			$entity->roomNote= $row['r_notiz'];
			
			return $entity;			
		}
		
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
			$insert = "INSERT INTO raeume (r_nr, r_etage, r_bezeichnung, r_notiz) 
						VALUES(".$number. ", ".$floor.", '".$name."', '".$note."')";
			return mysql_query($insert);
			
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
			$update = "UPDATE raeume SET
									r_nr = ".$number.",
									r_etage= ".$floor.",
									r_bezeichnung = '".$name."',
									r_Notiz = '".$note."'
						WHERE
									r_id = ".$id.";";
									
			return mysql_query($update);
									
			
		}
		
		/**
		 *  function to delete room
		 * 
		 * @param int $id The Room id.
		 */
		public function deleteRoom($id)
		{
			$delete ="DELETE FROM 
							raeume 
						WHERE 
							r_id = ".$id.";";
			return mysql_query($delete);
		}
		
		/**
		 * function to get components
		 * 
		 * @return components
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function getComponents()
		{
			$entityArray = array();
			
			$select = "SELECT * FROM komponente ORDER BY k_id asc;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new RoomEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = $row['k_gewaehrleistungsdauer'];
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier = $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
								
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		}
		
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
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function insertComponents($deliverer, $room, $name, $date, $warranty, $note, $supplier, $type, $isDevice)
		{
			$insert = "INSERT INTO raeume
						(lieferant_l_id, lieferant_r_id, k_name,
						k_einkaufsdatum,k_gewaehrleistungsdauer,k_Notiz,
						k_hersteller,komponentenarten_ka_id, k_device) 
						VALUES(".$deliverer.", ".$room.", '".$name."',
								".$date.", ".$warranty.", '".$note."',
								'".$supplier."', ".$type.", ".$isDevice.")";
			return mysql_query($insert);
		}
				
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
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function updateComponent($id, $deliverer, $room, $name, $date, $warranty, $note, $supplier, $type, $isDevice)
		{
			$update = "UPDATE komponente SET
									lieferant_l_id= ".$deliverer.",
									lieferant_r_id = ".$room.",
									k_name = '".$name."',
									k_einkaufsdatum = ".$date.",
									k_gewaehrleistungsdauer= ".$warranty.",
									k_Notiz = '".note."',
									k_hersteller = '".$supplier."',
									komponentenarten_ka_id = ".$type.",
									k_device = ".$isDevice."
						WHERE
									k_id = ".$id.";";
									
			return mysql_query($update);
		}
		
		/**
		 * delete a component
		 * 
		 * @param integer $id The components component id
		 *
		 * @return void
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
 		public function deleteComponent($id)
		{
			$delete ="DELETE FROM 
							komponente 
						WHERE 
							k_id = ".$id.";";
			return mysql_query($delete);
		}
		
		/**
		 * select all deliverers
		 * 
		 * @return Array
		 */
		 public function getDeliverers()
		 {
		 	$entityArray = array();
			
			$select = "SELECT * FROM lieferant order by l_id ASC;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new DelivererEntity();
				$entity->delivererId = $row['l_id'];
				$entity->delivererCompanyName = $row['l_firmenname'];
				$entity->delivererStreet = $row['l_strasse'];
				$entity->delivererZip = $row['l_plz'];
				$entity->delivererCity= $row['l_ort'];
				$entity->delivererTelephone= $row['l_tel'];
				$entity->delivererMobile= $row['l_mobil'];
				$entity->delivererFax= $row['l_fax'];
				$entity->delivererEmail= $row['l_email'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
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
		  * 
		  * @return void
		  */
		 public function insertDeliverer($companyName, $street, $zipCode, $location, 
										$phoneNumber, $mobileNumber, $faxNumber, $email)
		 {
		 	$insert ="INSERT INTO lieferant (l_firmenname,l_strasse,
												l_plz,l_ort,
												l_tel,l_mobil,
												l_fax,l_email)
								VALUES(	'".$companyName."','".$street."',
										'".$zipCode."','".$location."',
										'".$phoneNumber."','".$mobileNumber."',
										'".$faxNumber."','".$email."');";
										
			return mysql_query($insert);
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
		 public function updateDeliverer($id, $companyName, $street, $zipCode, $location,
										$phoneNumber, $mobileNumber, $faxNumber, $email)
		 {
		 	$update = "UPDATE lieferant 
					   SET l_firmenname = ".$companyName.",
							l_strasse = ".$street.",
							l_plz= ".$zipCode.",
							l_ort= ".$location.",
							l_tel= ".$phoneNumber.",
							l_mobil= ".$mobileNumber.",
							l_fax= ".$faxNumber.",
							l_email= ".$email."
						WHERE
							l_id = ".$id.";";
							
			return mysql_query($update);
		 }
		 
		 /**
		  * delete deliverer
		  * 
		  * @return void
		  */
		 public function deleteDeliverer($id)
		 {
		 	$delete ="DELETE FROM 
							lieferant 
						WHERE 
							l_id = ".$id.";";
			return mysql_query($delete);
		 }
		 
		  /**
		 * select all Usergroups
		 * 
		 * @return UsergroupEntity[]
		 */
		 public function getUsergroups()
		 {
			$entityArray = array();
			
			$select = "SELECT * FROM benutzergruppe order by bg_id ASC;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new UserGroupEntity();
				$entity->userGroupId = $row['bg_id'];
				$entity->userGroupName = $row['bg_name'];
				$entity->userGroupPermisson = $row['bg_rechte'];				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 
		 }
		 
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
		 {
		 $insert ="INSERT INTO benutzergruppe (bg_name,bg_rechte)
								VALUES(	'".$name."',".$permission.");";
										
			return mysql_query($insert);
		 }
		 
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
		 {
			 $update = "UPDATE benutzergruppe 
						   SET bg_name = '".$name."',
								bg_rechte = ".$permission."
							WHERE
								bg_id = ".$id.";";
								
				return mysql_query($update);
		 }
		 
		 /**
		  * delete usergroup
		  * 
		  * @return 1 - true
		  *			2 - false
		  */
		 public function deleteUsergroup($id)
		 {
			$delete ="DELETE FROM 
							benutzergruppe 
						WHERE 
							bg_id = ".$id.";";
			return mysql_query($delete);
		 }
		 
		  /**
		 * select the Usergroup by id
		 * 
		 * @param int $id id
		 *
		 * @return UsergroupEntity
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getUsergroupBYId($id)
		 {			
			$select = "SELECT * 
					   FROM 
							benutzergruppe 
						WHERE 
							bg_id = ".$id." 
						ORDER BY bg_id ASC;";
			
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			$entity = new UserGroupEntity();
			$entity->userGroupId = $row['bg_id'];
			$entity->userGroupName = $row['bg_name'];
			$entity->userGroupPermisson = $row['bg_rechte'];				
						
			return $entity;
		 }
		 /**
		 * select all Users
		 * 
		 * @return UserEntity[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getUsers()
		 {
			$entityArray = array();
			
			$select = "SELECT * FROM benutzer order by b_id ASC;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new UserEntity();
				$entity->userId = $row['b_id'];
				$entity->userGroupId = $row['bg_id'];
				$entity->userPw = $row['b_pw'];
				$entity->userName = $row['b_name'];
				$entity->userFirstName = $row['b_vorname'];
				$entity->userLastName = $row['b_nachname'];				
				$entity->userEmail = $row['b_email'];
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }
	
	
		  /**
		 * select UserById
		 * 
		 * @return UserEntity
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		  public function getUserById($id)
		 {
			$select = "SELECT * FROM benutzer WHERE b_id = ".$id.";";
			$Data = mysql_query($select);
			
			$entity = new UserEntity();
			$entity->userId = $Data['b_id'];
			$entity->userGroupId = $Data['bg_id'];
			$entity->userPw = $Data['b_pw'];
			$entity->userName = $Data['b_name'];
			$entity->userFirstName = $Data['b_vorname'];
			$entity->userLastName = $Data['b_nachname'];				
			$entity->userEmail = $Data['b_email'];
				
			return $entity;					
		 }
		 
		 /**
		  * insert user
		  *
		  * @param string $name 
		  * @param int $userGroupId	  
		  * @param string $password (blank)
		  * @param string $email
		  * @param string $vorname	
		  * @param string $nachname
		  * 
		  * @return 1 - true
		  *			2 - false
		  * @author Leon Geim<leon.geim@gmail.com>
		  */
		 public function insertUser($name, $userGroupId, $password, $email)
		 {
			 $insert ="INSERT INTO benutzer (bg_id, b_pw, b_name, b_vorname, b_nachname, b_email)
								VALUES(".$userGroupId.",PASSWORD('".$password."'),'".$name."', '".$vorname."', '".$nachname."' ,'".$email."');";
										
			return mysql_query($insert);
		 }
		 /**
		  * update user
		  *
	  	  * @param int $id id
		  * @param string $name 
		  * @param int $userGroupId	  
		  * @param string $password (blank)
		  * @param string $email
		  * @param string $vorname	
		  * @param string $nachname
		  * 
		  * @return 1 - true
		  *			2 - false
          * @author Leon Geim<leon.geim@gmail.com>
		  */
		 public function updateUser($id, $name, $userGroupId, $password, $email)
		 {
			 $update = "UPDATE benutzer 
						   SET bg_id = ".$userGroupId.",
							   b_pw = PASSWORD('".$password."'),
							   b_name = '".$name."',
							   b_vorname = '".$vorname."',
							   b_nachname = '".$nachname."',
							   b_email = '".$email."'							   
							WHERE
								b_id = ".$id.";";
								
			return mysql_query($update);
		 
		 }
		 /**
		  * delete user
		  * 
		  * @return 1 - true
		  *			2 - false
		  * @author Leon Geim<leon.geim@gmail.com>
		  */
		 public function deleteUser($id)
		 {
			$delete ="DELETE FROM 
							benutzer 
						WHERE 
							b_id = ".$id.";";
			return mysql_query($delete);
		 }
		 /**
		  * check if password for user is correct
		  * 
		  * @param int $id id
		  * @param string $password password(blank)
		  * @return true (password correct)
		  *			false(password incorrect)
		  * @author Leon Geim<leon.geim@gmail.com>
		  */
		  public function checkUserPw($id, $password)
		 {
			$check = "SELECT 
							Case When b_pw = PASSWORD('".$password."') then true else false END As Erg
						FROM benutzer
						WHERE b_id = ".$id.";";
						
			$Data = mysql_query($select);
			if($Data["erg"] == "1")
			{
				return true;
			}
			else
			{
				return false;
			}
			
		 }
		 
		 /**
		 * select all ComponentTransactions
		 * 
		 * @return ComponentTransactionEntity[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentTransactions()
		 {
			$entityArray = array();
			
			$select = "SELECT 	*
						FROM	komp_vorgang
						order by kom_id ASC;";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentTransactionEntity();
				$entity->componentTransactionId = $row['kom_id'];
				$entity->componentId = $row['k_id'];
				$entity->transactionId = $row['v_id'];
				$entity->componentTransactionuserId = $row['b_id'];
				$entity->componentTransactionDate = $row['datum'];
				$entity->componentTransactionComment = $row['comment'];
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }

		 /**
		 * select ComponentTransactionById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionType
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentTransactionById($id)	
		{
			$select = "SELECT * 
					   FROM komp_vorgang 
					   WHERE kom_id = ".$id.";";
			
			$Data = mysql_query($select);
			
			$entity = new ComponentTransactionEntity();
			$entity->componentTransactionId = $Data['kom_id'];
			$entity->componentId = $Data['k_id'];
			$entity->transactionId = $Data['v_id'];
			$entity->componentTransactionuserId = $Data['b_id'];
			$entity->componentTransactionDate = $Data['datum'];
			$entity->componentTransactionComment = $Data['comment'];
									
			return $entity;
		}
		
		 /**
		 * insert ComponentTransaction
		 *
		 * @param string $comment 
		 * @param int $componentId	
         * @param int $userId		 
		 * @param int $transactionId
		 * @param int $date
		 *
		 * @return 1 - true
		 *		   2 - false
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function insertComponentTransaction($componentId, $userId, $transactionId, $date, $comment)
		 {
			 $insert ="INSERT INTO komp_vorgang 
						(k_id, v_id, b_id, comment, datum)
						VALUES(".$componentID.",".$transactionId.",".$userId.",".$comment.",".date." );";
										
			return mysql_query($insert);
		 }
		 /**
		 * update ComponentTransaction
		 *
	  	 * @param int $id id
		 * @param string $comment 
		 * @param int $componentId	
         * @param int $userId		 
		 * @param int $transactionId
		 * @param int $date
		 * 
		 * @return 1 - true
		 *		   2 - false
         * @author Leon Geim<leon.geim@gmail.com> 
		 */
		 public function updateComponentTransaction($id, $componentId, $userId, $transactionId, $date, $comment)
		 {
			 $update = "UPDATE komp_vorgang 
						   SET k_id = ".$componentId.",
							   v_id = PASSWORD('".$transactionId."'),
							   b_id = '".$userId."',
							   comment = '".$comment."',
							   datum = '".$date."'							   						   
							WHERE
								kom_id = ".$id.";";
								
			return mysql_query($update);
		 }
		 
		 /**
		 * delete ComponentTransaction
		 * 
		 * @return 1 - true
		 *		   2 - false
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function deleteComponentTransaction($id)
		 {
				$delete ="DELETE FROM 
							komp_vorgang 
						WHERE 
							kom_id = ".$id.";";
			return mysql_query($delete);
		 }
		 
         /**
		 * select all Transaction
		 * 
		 * @return TransactionEntity[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getTransactions()
		 {
			$entityArray = array();
			
			$select = "SELECT 	*
						FROM	vorgangsarten
						ORDER BY v_id ASC;";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new TransactionEntity();
				$entity->transactionId = $row['v_id'];
				$entity->transactionDescription = $row['v_bezeichnung'];
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }

		 /**
		 * select TransactionById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionTypeEntity
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getTransactionById($id)			 
		 {
			$select = "SELECT 	*
						FROM	vorgangsarten
						WHERE v_id = ".$id.";";
						
			$Data = mysql_query($select);
			
			$entity = new TransactionEntity();
			$entity->transactionId = $Data['v_id'];
			$entity->transactionDescription = $Data['v_bezeichnung'];						
			return $entity;
		 }
		 
         /**
		 * insert Transaction
		 *
		 * @param string $transactionDescription 
		 * @param int $transactionTypeId	  
		 * @param string $userId
		 *
		 * @return 1 - true
		 *		   2 - false
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function insertTransaction($transactionDescription, $transactionTypeId, $userId)
		 {
			 $insert ="INSERT INTO vorgangsarten (v_bezeichnung)
								VALUES(".$transactionDescription.");";
										
			return mysql_query($insert);
		 }
		 /**
		 * update Transaction
		 *
	  	 * @param int $id id
		 * @param string $transactionDescription 
		 * @param int $transactionTypeId	  
		 * @param string $userId
		 * 
		 * @return 1 - true
		 *		   2 - false
         * @author Leon Geim<leon.geim@gmail.com>		  
		 */
		 public function updateTransaction($id, $transactionDescription, $transactionTypeId, $userId)
		 {
			 $update = "UPDATE vorgangsarten 
						   SET 
								v_bezeichnung = ".$transactionDescription."				   
							WHERE
								v_id = ".$id.";";
		 }
		 /**
		 * delete Transaction
		 * 
		 * @return 1 - true
		 *		   2 - false
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function deleteTransaction($id)
		 {
			$delete ="DELETE FROM 
							vorgangsarten 
						WHERE 
							v_id = ".$id.";";
			return mysql_query($delete);
		 }
		 
		 /**
		 * select all ValidValue
		 * 
		 * @return ValidValueEntity[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getValidValues()
		 {
			$entityArray = array();
			
			$select = "SELECT 	*
						FROM	zulaessige_werte
						ORDER BY zw_id ASC;";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ValidValueEntity();
				$entity->validValueId = $row['zw_id'];
				$entity->validValueValue = $row['zw_wert'];
					
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }

		 /**
		 * select ValidValueById
		 * 
		 * @param int $id id
		 *
		 * @return ValidValueEntity
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getValidValueEntityById($id)	
		 {
			$select = "SELECT 	*
						FROM	zulaessige_werte
						WHERE zw_id = ".$id.";";
						
			$Data = mysql_query($select);
			$entity = new ValidValueEntity();
			$entity->validValueId = $Data['zw_id'];
			$entity->validValueValue = $Data['zw_wert'];
								
			return $entity;
		 }
		 /**
		 * select all ComponentAttributeEntitysFromComponentType
		 *
		 * componentAttributeComponentValue = NULL;
		 *
		 * @return ComponentAttributeEntitys[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentAttributesFromComponentType()
		 {
			$entityArray = array();
		 
			$select = "SELECT kat.kat_id, kat.kat_name, ka.ka_id
					   FROM komponentenarten ka
					   INNER JOIN kart_kattribut kar ON kar.komponentenarten_ka_id = ka.ka_id
					   INNER JOIN komponentenattribute kat ON kat.kat_id = kar.komponentenattribute_kat_id";
					   
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentAttributeEntity();
				$entity->componentAttributeId = $row['kat_id'];
				$entity->componentAttributeName = $row['kat_name'];
				$entity->componentAttributeIsFromComponent = false;
				$entity->componentAttributeUncertaintId = $row['ka_id'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
					   
					   
		 }
		 
		 /**
		 * select all ComponentAttributeFromComponent
		 *
		 * componentAttributeComponentValue = value;
		 *
		 * @return ComponentAttributeEntitys[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentAttributesFromComponent()
		 {
			$entityArray = array();
		 
			$select = "SELECT kat.kat_id, kat.kat_name, kom.k_id, koat.khkat_wert
						FROM komponente kom
						INNER JOIN komponente_kattribut koat ON koat.komponenten_k_id = kom.k_id
						INNER JOIN komponentenattribut kat ON kat.kat_id = koat.komponentenattribute_kat_id";
					   
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentAttributeEntity();
				$entity->componentAttributeId = $row['kat_id'];
				$entity->componentAttributeName = $row['kat_name'];
				$entity->componentAttributeIsFromComponent = true;
				$entity->componentAttributeUncertaintId = $row['k_id'];
				$entity->componentAttributeComponentValue = $row['khkat_wert'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }
		 
		 
		  /**
		 * select ComponentAttributesFromComponentTypeByComponentId
		 *
		 * componentAttributeComponentValue = Value;
		 * 
		 * @param int $id id
		 *
		 * @return ComponentAttributeEntity
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentAttributeFromComponentTypeByComponentId($id)
		 {
			$select = "SELECT 
							kom.k_id, koat.khkat_wert, kat.kat_id, kat.kat_name
						FROM komponente kom
						INNER JOIN komponentenarten kar ON kom.komponentenarten_ka_id = kar.ka_id
						INNER JOIN kart_kattribut kart ON kart.komponentenarten_ka_id = kar.ka_id
						INNER JOIN komponentenattribute kat ON kat.kat_id = kart.komponentenattribute_kat_id
						INNER JOIN komponente_kattribut koat ON koat.komponentenattribute_kat_id = kat.kat_id AND
																koat.komponenten_k_id = kom.k_id
						WHERE
							kom.k_id = ".$id.";";
					   
			$Data = mysql_query($select);
			
			$entity = new ComponentAttributeEntity();
			$entity->componentAttributeId = $Data['kat_id'];
			$entity->componentAttributeName = $Data['kat_name'];
			$entity->componentAttributeIsFromComponent = true;
			$entity->componentAttributeUncertaintId = $Data['k_id'];
			$entity->componentAttributeComponentValue = $Data['khkat_wert'];
						
			return $entity;
		 }
		 
		  /**
		 * select ComponentAttributeFromComponentTypeByComponentTypeId
		 *
		 * componentAttributeComponentValue = Null;
		 * 
		 * @param int $id id
		 *
		 * @return ComponentAttributeEntity
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentAttributeFromComponentTypeByComponentTypeId($id)
		 {
			$select = "SELECT kat.kat_id, kat.kat_name, ka.ka_id
					   FROM komponentenarten ka
					   INNER JOIN kart_kattribut kar ON kar.komponentenarten_ka_id = ka.ka_id
					   INNER JOIN komponentenattribute kat ON kat.kat_id = kar.komponentenattribute_kat_id
						WHERE
							ka.ka_id = ".$id.";";
					   
			$Data = mysql_query($select);
			
			$entity = new ComponentAttributeEntity();
			$entity->componentAttributeId = $Data['kat_id'];
			$entity->componentAttributeName = $Data['kat_name'];
			$entity->componentAttributeIsFromComponent = true;
			$entity->componentAttributeUncertaintId = $Data['ka_id'];
			$entity->componentAttributeComponentValue = null;
						
			return $entity;
		 }		 
		 
		 /**
		 * insert ComponentAttribute
		 *
		 * @param string $componentAttributeName 
		 * @param bool $IsForComponent - true Component false ComponentType
		 * @param int $componentAttributeUncertaintId	  
		 * @param string $componentAttributeComponentValue - Null if IsForComponent = false
		 *
		 * @return 1 - true
		 *		   2 - false
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function insertComponentAttribute($componentAttributeName , $IsForComponent, $componentAttributeUncertaintId, $componentAttributeComponentValue)
		 {
			 $insert ="INSERT INTO komponentenattribute (kat_name)
								VALUES(".$componentAttributeName.");";
			 mysql_query($insert);
			 
			 $select = "SELECT MAX(kat_id) AS ID FROM komponentenattribute;";
			 $Data = mysql_query($select);
								
			if($IsForComponent)
			{
				$insert ="INSERT INTO komponente_kattribut (komponenten_k_id, komponentenattribute_kat_id, khkat_wert)
								VALUES(".$componentAttributeUncertaintId.", ".$Data["ID"].", '".$componentAttributeComponentValue."');";
				mysql_query($insert);
			}
			else
			{
				$insert ="INSERT INTO kart_kattribut (komponentenarten_ka_id, komponentenattribute_kat_id)
								VALUES(".$componentAttributeUncertaintId.", ".$Data["ID"].");";
			 mysql_query($insert);
			}
										
			return mysql_query($insert);
		 }
		 
		 /**
		 * update ComponentAttribute
		 *
		 * @param int $id
	  	 * @param string $componentAttributeName 
		 * @param bool $IsForComponent - true Component false ComponentType
		 * @param int $componentAttributeUncertaintId	  
		 * @param string $componentAttributeComponentValue - Null if IsForComponent = false
		 *
		 * @return 1 - true
		 *		   2 - false
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function updateComponentAttribute($id, $componentAttributeName, $IsForComponent, $componentAttributeUncertaintId, $componentAttributeComponentValue);
		 
		  /**
		 * select all ComponentTypes
		 * 
		 * @return ComponentTypeEntity[]
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getComponentTypes();

		 /**
		 * select ComponentTypeById
		 * 
		 * @param int $id id
		 *
		 * @return ComponentTypeEntity
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function getComponentTypeById($id);			 
		 
         /**
		 * insert ComponentType
		 *
		 * @param string $typeName 
		 * @param string $typeImagePath	
		 *
		 * @return 1 - true
		 *		   2 - false
		 * @author Daniel Schulz <schmoschu@gmail.com>
		 */
		 public function insertComponentType($typeName, $typeImagePath);
		 
		 /**
		 * update ComponentType
		 *
	  	 * @param int $id id
		 * @param string $typeName 	  
		 * @param string $typeImagePath
		 * 
		 * @return 1 - true
		 *		   2 - false
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function updateComponentType($id, $typeName, $typeImagePath);
		 
		 /**
		 * update ComponentType
		 *
	  	 * @param int $id id
		 * @param string $typeName 	  
		 * @param string $typeImagePath
		 * 
		 * @return 1 - true
		 *		   2 - false
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function updateComponentType($id, $typeName, $typeImagePath);
		 
		 /**
		 * get SubComponents by MasterComponentId
		 *
	  	 * @param int $id id
		 * 
		 * @return ComponentEntity[]
		 *
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function getSubComponentbyComponentId($id);
		 
		 /**
		 * get MasterComponentId by SubComponentId
		 *
	  	 * @param int $id id
		 * 
		 * @return ComponentEntity[]
		 *
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function getMasterComponentbyComponentId($id);
		 
		 		 /**
		 * get MasterComponentId by SubComponentId
		 *
	  	 * @param int $id id
		 * 
		 * @return ComponentEntity
		 *
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function getMasterComponentbyComponentId($id);
		 
		 /**
		 * insert SubComponent
		 *
	  	 * @param int $componentId
		 * @param int $subComponentId
		 * 
		 * @return 1 - true
		 *		   2 - false
		 *
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function insertSubComponent($componentId, $subComponentId)
		 {
			$insert ="INSERT INTO komponente_komponente (komponenten_k_id_aggregat, komponenten_k_id_teil)
								VALUES(".$componentId.", ".$subComponentId.");";
										
			return mysql_query($insert);
		 }
		 
		 /**
		 * insert AttributeValue
		 *
	  	 * @param int $attributeId
		 * @param int $componentId
		 * @param int $value
		 * 
		 * @return 1 - true
		 *		   2 - false
		 *
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function insertAttributeValue($attributeId, $componentId, $value)
		 {
			$insert ="INSERT INTO komponente_kattribut (komponenten_k_id, komponentenattribute_kat_id, khkat_wert)
								VALUES(".$attributeId.", ".$componentId.", ".$value.");";
										
			return mysql_query($insert);
		 }
		 
		 /**
		 * get DistinctComponents
		 * 
		 * @return ComponentEntitiy[]
		 *
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function getDistinctComponents()
		 {
			$nameArray = array();
			
			$select = "SELECT Distinct(k_name) as name FROM komponente order by k_name";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{				
				$nameArray[] = $row["name"];
			}
			
			return $nameArray;
		 }
	}
?>