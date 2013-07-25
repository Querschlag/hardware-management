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
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function getComponents()
		{
			
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
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function insertComponents($deliverer, $room, $name, $date, $warranty, $note, $supplier, $type)
		{
			
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
		 * @author Thomas Michl <thomas.michl1988@gmail.com>   
		 */
		public function updateComponent($id, $deliverer, $room, $name, $date, $warranty, $note, $supplier, $type)
		{
		
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
				$entity->userGroupPermisson = $row['bg_rechte']				
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
			$row = mysql_fetch_assoc($Data)
			
			$entity = new UserGroupEntity();
			$entity->userGroupId = $row['bg_id'];
			$entity->userGroupName = $row['bg_name'];
			$entity->userGroupPermisson = $row['bg_rechte']				
						
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
				$entity->userPw = $row['b_pw']		
				$entity->userName = $row['b_name']		
				$entity->userEmail = $row['b_email']			
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }
		 
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
		  * @author Leon Geim<leon.geim@gmail.com>
		  */
		 public function insertUser($name, $userGroupId, $password, $email)
		 {
			 $insert ="INSERT INTO benutzer (bg_id, b_pw, b_name, b_email)
								VALUES(".$userGroupId.",PASSWORD('".$password."'),'".$name."','".$email."');";
										
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
							   b_email = '".$email."'							   
							WHERE
								b_id = ".$id.";";
		 
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
		 * select all TransactionTypes
		 * 
		 * @return TransactionTypesEntity[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getTransactionTypes()
		 {
			$entityArray = array();
			
			$select = "SELECT 	*
						FROM	vorgangsartenstatus
						ORDER BY vs_id ASC;";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new TransactionTypeEntity();
				$entity->transactionTypeId = $row['vs_id'];
				$entity->transactionTypeName = $row['vs_bezeichnung'];
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }

		 /**
		 * select TransactionTypeById
		 * 
		 * @param int $id id
		 *
		 * @return TransactionType
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getTransactionTypeById($id)	
		{
			$select = "SELECT * FROM vorgangsartenstatus WHERE vs_id = ".$id.";";
			
			$Data = mysql_query($select);
			
			$entity = new TransactionTypeEntity();
			$entity->transactionTypeId = $Data['vs_id'];
			$entity->transactionTypeName = $Data['vs_bezeichnung'];
									
			return $entity;
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
				$entity->transactionTypeId = $row['vs_id']		
				$entity->userId = $row['b_id']		
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
			$entity->transactionTypeId = $Data['vs_id']		
			$entity->userId = $Data['b_id']		
						
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
			 $insert ="INSERT INTO vorgangsarten (v_bezeichnung, vs_id, b_id)
								VALUES(".$transactionDescription.",".$transactionTypeId.",".$userId.");";
										
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
								v_bezeichnung = ".$transactionDescription.",
								vs_id = ".$transactionTypeId.",
								b_id = ".$userId."							   
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
			$select = "kat.kat_id, kat.kat_name, ka.ka_id
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
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function insertTransaction($transactionDescription, $transactionTypeId, $userId);
		 
		 /**
		 * update Transaction
		 *
		 * @param int $id
	  	 * @param string $componentAttributeName 
		 * @param bool $IsForComponent - true Component false ComponentType
		 * @param int $componentAttributeUncertaintId	  
		 * @param string $componentAttributeComponentValue - Null if IsForComponent = false
		 *
		 * @return 1 - true
		 *		   2 - false
         * @author Leon Geim<leon.geim@gmail.com>		  
		 */
		 public function updateTransaction($id, $transactionDescription, $transactionTypeId, $userId);
		 
		 /**
		 * delete Transaction
		 * 
		 * @return 1 - true
		 *		   2 - false
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function deleteTransaction($id);
		 
	}
?>