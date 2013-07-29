<?php	
	// include database
	if(file_exists('../interface/IDatabase.php')) require_once('../interface/IDatabase.php');
	if(file_exists('../_php/interface/IDatabase.php')) require_once('../_php/interface/IDatabase.php');
	
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
			/**
			 * Checks connection to the main mySQL server.
			 * 
			 * If working locally with no access to this server, this will reduce the
			 * time the application would need to connect to the none accessable server,
			 * before using the local fallback.
			 * 
			 * If there are any problem in production environment, please increase the
			 * timeout and/or server ports to avoid the local fallback.
			 * 
			 */
			
			$timeout = 0.5;
			$port = 80;
			 
			$fp = @fsockopen("10.9.4.55", $port, $errno, $errstr, $timeout);
			if (!$fp) {
			    // echo "$errstr ($errno)<br />\n";
				if (!mysql_connect("localhost", "itv_v1", "") )
				{
					mysql_connect("itv_v1", "root", "");
				}
			} else {
				@fclose($x);
				if (!@mysql_connect("10.9.4.55", "itv_v1", ""))
					mysql_connect("localhost", "itv_v1", "");
			}
			
			mysql_select_db("itv_v1") or die (mysql_error());
		}
		
	
		/**
		 *  function to get rooms
		 *
		 * @return Dictionary [problemCount(int), rooms(array)]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function getRooms()
		{   
			$entityArray = array();
			
			$select = "SELECT * FROM raeume WHERE r_id < 900000 AND deletedFlag = 0 ORDER BY r_etage asc, r_nr asc;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new RoomEntity();
				$entity->roomId = $row['r_id'];
				$entity->roomNumber = $row['r_nr'];
				$entity->roomFloor = $row['r_etage'];
				$entity->roomName = $row['r_bezeichnung'];
				$entity->roomNote= $row['r_notiz'];
				
				$select  = "SELECT 
				CASE WHEN count(*) > 0 then true else false END As problem
						FROM raeume rae
						INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						INNER JOIN komp_vorgang kovo ON kovo.K_id = kom.k_id 
						AND v_id = 2
						WHERE rae.r_id = ".$row['r_id']."";
				$DataSub = mysql_query($select);
				$rowSub = mysql_fetch_assoc($DataSub);
				$entity->roomHasProblems = $rowSub["problem"];
				
				$entityArray[] = $entity;
			}
			
			$select  = "SELECT count(*) AS problemCount
						FROM raeume rae
						INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						INNER JOIN komp_vorgang kovo ON kovo.K_id = kom.k_id AND v_id = 2
						WHERE kom.deletedFlag = 0 AND kom.k_device = 1 AND rae.deletedFlag = 0;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return array('problemCount' => $row["problemCount"], 'rooms' => $entityArray);
	
		}
		
		/**
		 *  function to get room by id
		 *
		 * @return RoomEntity[] 
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function getRoomByRoomId($id)
		{
			$select = "SELECT *
						FROM raeume 
						WHERE r_id = ".$id." AND deletedFlag = 0
						ORDER BY r_etage asc, r_nr asc;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			$entity = new RoomEntity();
			$entity->roomId = $row['r_id'];
			$entity->roomNumber = $row['r_nr'];
			$entity->roomFloor = $row['r_etage'];
			$entity->roomName = $row['r_bezeichnung'];
			$entity->roomNote= $row['r_notiz'];
			
			$select  = "SELECT CASE WHEN count(*) > 0 then true else false END As problem
						FROM raeume rae
						INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						INNER JOIN komp_vorgang kovo ON kovo.K_id = kom.k_id AND v_id = 2;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			$entity->roomHasProblems = $row["problem"];
			
			return $entity;			
		}
		
		/**
		 *  function to insert room
		 * 
		 * @param int $floor The Room etage.
		 * @param int $number The Room number.
		 * @param string $name The Room name.
		 * @param string $note The Room note.
		 *
		 * @return Room Id
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function insertRoom($floor, $number, $name, $note)
		{
			$insert = "INSERT INTO raeume (r_nr, r_etage, r_bezeichnung, r_notiz, deletedFlag) 
						VALUES('$number', $floor, '$name', '$note', 0)";
			mysql_query($insert)  or die(mysql_error());
			
			$select = "SELECT r_id FROM raeume ORDER BY r_id desc LIMIT 1";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return $row["r_id"];
		}
		
		/**
		 *  function to update room
		 * 
		 * @param int $id The Room id.
		 * @param int $floor The Room floor.
		 * @param int $number The Room number.
		 * @param string $name The Room name.
		 * @param string $note The Room note.
		 * @author Leon Geim<leon.geim@gmail.com>
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
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function deleteRoom($id)
		{
			$delete ="UPDATE  
							komponente
						SET lieferant_r_id = 900000
						WHERE 
							lieferant_r_id = ".$id.";";
			return mysql_query($delete);
		
			$delete ="UPDATE FROM 
							raeume 
						SET deletedFlag = 1
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
			
			$select = "SELECT kom.*, CASE WHEN (Select v_id
									FROM komp_vorgang kova 
									WHERE kova.k_id = kom.k_id
									Order by Datum DESC
               						LIMIT 1) = 2 then true else false end as v_id
						FROM komponente kom
						WHERE deletedFlag = 0
						ORDER BY kom.k_id asc;";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
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
				$entity->componentHasProblems = $row['v_id'];
				$entityArray[] = $entity;
			}
			return $entityArray;
		}
		
		/**
		 * function to get components
		 * 
		 * @return components
		 * @author Thomas Bayer <thomasbayer95gmail.com> 
		 */
		public function getComponentsbyDelivererId($id)
		{
			$entityArray = array();
			
			$select = "SELECT kom.*, CASE WHEN (Select v_id
									FROM komp_vorgang kova 
									WHERE kova.k_id = kom.k_id
									Order by Datum DESC
               						LIMIT 1) = 2 then true else false end as v_id
						FROM komponente kom where kom.lieferant_l_id = '".$id."'";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
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
				$entity->componentHasProblems = $row['v_id'];
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
		 * @return ComponentID(int)
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		public function insertComponent($deliverer, $room, $name, $date, $warranty, $note, $supplier, $type, $isDevice)
		{
			$insert = "INSERT INTO komponente
						(lieferant_l_id, lieferant_r_id, k_name,
						k_einkaufsdatum,k_gewaehrleistungsdauer,k_Notiz,
						k_hersteller,komponentenarten_ka_id, k_device,
						k_erstellungszeit, deletedFlag) 
						VALUES(".$deliverer.", ".$room.", '".$name."',
								".$date.", ".$warranty.", '".$note."',
								'".$supplier."', ".$type.", ".$isDevice.",
								".Time().", 0)";
			mysql_query($insert) or die(mysql_error());
			
			$select = "SELECT k_id FROM komponente
						ORDER BY k_id desc LIMIT 1";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
						
			return $row["k_id"];
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
			$delete = "DELETE FROM 
							komponente_komponente
						WHERE 
							komponenten_k_id = ".$id.";";
			mysql_query($delete);	

			$delete = "DELETE FROM 
							komponente_kattribut
						WHERE 
							komponenten_k_id = ".$id.";";
			mysql_query($delete);				
		
			$delete ="UPDATE  
							komponente 
						SET deletedFlag = 1
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
			
			$select = "SELECT * FROM lieferant WHERE deletedFlag = 0 ORDER BY l_id ASC;";
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
		 * select deliverer by id
		 * 
		 * @return Array
		 */
		 public function getDeliverersById($id)
		 {			
			$select = "SELECT * FROM lieferant where l_id =\"" . $id . "\"";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
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
			$entity->delivererCountry= $row['l_land'];

			return $entity;
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
		  * @return Deliverer Id
		  */
		 public function insertDeliverer($companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email, $country)
		 {
		 	$insert ="INSERT INTO lieferant (l_firmenname,l_strasse,
												l_plz,l_ort,
												l_tel,l_mobil,
												l_fax,l_email,
												l_land, deletedFlag)
								VALUES(	'".$companyName."','".$street."',
										'".$zipCode."','".$location."',
										'".$phoneNumber."','".$mobileNumber."',
										'".$faxNumber."','".$email."',
										'".$country."', 0);";
										
			mysql_query($insert);
			
			$select = "SELECT l_id FROM lieferant ORDER BY l_id desc LIMIT 1";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return $row["l_id"];
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
		 public function updateDeliverer($id, $companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email, $country)
		 {
		 	$update = "UPDATE lieferant 
					   SET l_firmenname = \"".$companyName."\",
							l_strasse = \"".$street."\",
							l_plz= \"".$zipCode."\",
							l_ort= \"".$location."\",
							l_tel= \"".$phoneNumber."\",
							l_mobil= \"".$mobileNumber."\",
							l_fax= \"".$faxNumber."\",
							l_email= \"".$email."\",
							l_land= \"".$country."\"
						WHERE
							l_id = ".$id.";";
							
			mysql_query($update);
		 }
		 
		 /**
		  * delete deliverer
		  * 
		  * @return void
		  */
		 public function deleteDeliverer($id)
		 {
		 	$delete ="UPDATE 
							lieferant 
							SET deletedFlag = 1
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
		  * @return Usergroup Id
		  */
		 public function insertUsergroup($name, $permission)
		 {
		 $insert ="INSERT INTO benutzergruppe (bg_name,bg_rechte, deletedFlag)
								VALUES(	'".$name."',".$permission.", 0);";
										
			mysql_query($insert);
			
			$select = "SELECT bg_id FROM benutzergruppe ORDER BY bg_id desc LIMIT 1";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return $row["bg_id"];			
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
			
			$select = "SELECT * FROM benutzer WHERE deletedFlag = 0 ORDER BY b_id ASC;";
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
				$entity->deletedFlag = 0;
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
			$select = "SELECT * FROM benutzer WHERE b_id = ".$id." AND deletedFlag = 0;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			if($row['b_id'] == null)
			{
				return null;
			}
			
			$entity = new UserEntity();
			$entity->userId = $row['b_id'];
			$entity->userGroupId = $row['bg_id'];
			$entity->userPw = $row['b_pw'];
			$entity->userName = $row['b_name'];
			$entity->userFirstName = $row['b_vorname'];
			$entity->userLastName = $row['b_nachname'];				
			$entity->userEmail = $row['b_email'];
				
			return $entity;					
		 }
		 
		 /**
		  *  function to get user by email adress
		  * 
		  * @return UserEntity
		  * 
		  * @author Leon Geim<leon.geim@gmail.com>
		  */
		 public function getUserByEmail($email)
		 {
			$select = "SELECT * FROM benutzer WHERE b_email = '".$email."' AND deletedFlag = 0;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			if($row['b_id'] == null)
			{
				return null;
			}
			
			$entity = new UserEntity();
			$entity->userId = $row['b_id'];
			$entity->userGroupId = $row['bg_id'];
			$entity->userPw = $row['b_pw'];
			$entity->userName = $row['b_name'];
			$entity->userFirstName = $row['b_vorname'];
			$entity->userLastName = $row['b_nachname'];				
			$entity->userEmail = $row['b_email'];
				
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
		  * @return User Id
		  * @author Leon Geim<leon.geim@gmail.com>
		  */
		 public function insertUser($name, $userGroupId, $firstname, $lastname, $password, $email)
		 {
			 $insert ="INSERT INTO benutzer (bg_id, b_pw, b_name, b_vorname, b_nachname, b_email, deletedFlag)
								VALUES(".$userGroupId.",PASSWORD('".$password."'),'".$name."', '".$firstname."', '".$lastname."' ,'".$email."', 0);";
										
			return mysql_query($insert);
			
			$select = "SELECT b_id FROM benutzer ORDER BY b_id desc LIMIT 1";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return $row["b_id"];		
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
		 public function updateUser($id, $name, $userGroupId, $firstname, $lastname, $password, $email)
		 {
			 $update = "UPDATE benutzer 
						   SET bg_id = ".$userGroupId.",
							   b_pw = PASSWORD('".$password."'),
							   b_name = '".$name."',
							   b_vorname = '".$firstname."',
							   b_nachname = '".$lastname."',
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
			$update ="UPDATE 
							benutzer 
						SET
							deletedFlag = 1
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
						
			$Data = mysql_query($check);
			$row = mysql_fetch_assoc($Data);
			
			if($row["Erg"] == "1")
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
			$row = mysql_fetch_assoc($Data);
			
			$entity = new ComponentTransactionEntity();
			$entity->componentTransactionId = $row['kom_id'];
			$entity->componentId = $row['k_id'];
			$entity->transactionId = $row['v_id'];
			$entity->componentTransactionuserId = $row['b_id'];
			$entity->componentTransactionDate = $row['datum'];
			$entity->componentTransactionComment = $row['comment'];
									
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
		 * @return ComponentTransaction Id
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function insertComponentTransaction($componentId, $userId, $transactionId, $date, $comment)
		 {
			 $insert ="INSERT INTO komp_vorgang 
						(k_id, v_id, b_id, comment, datum)
						VALUES(".$componentID.",".$transactionId.",".$userId.",".$comment.",".date." );";
										
			mysql_query($insert);
			
			$select = "SELECT kom_id FROM komp_vorgang ORDER BY kom_id desc LIMIT 1";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return $row["kom_id"];	
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
			$row = mysql_fetch_assoc($Data);
			
			$entity = new TransactionEntity();
			$entity->transactionId = $row['v_id'];
			$entity->transactionDescription = $row['v_bezeichnung'];						
			return $entity;
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
			$row = mysql_fetch_assoc($Data);
			$entity = new ValidValueEntity();
			$entity->validValueId = $row['zw_id'];
			$entity->validValueValue = $row['zw_wert'];
								
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
		 public function getComponentAttributesFromComponentType($id)
		 {
			$entityArray = array();
		 
			$select = "SELECT kat.kat_id, kat.kat_name, ka.ka_id
					   FROM komponentenarten ka
					   INNER JOIN kart_kattribut kar ON kar.komponentenarten_ka_id = ka.ka_id
					   INNER JOIN komponentenattribute kat ON kat.kat_id = kar.komponentenattribute_kat_id
					   WHERE ka.ka_id = ".$id.";";
					   
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentAttributeEntity();
				$entity->componentAttributeId = $row['kat_id'];
				$entity->componentAttributeName = $row['kat_name'];
				$entity->componentAttributeIsFromComponent = false;
				$entity->componentAttributeUncertaintId = $row['ka_id'];
				
				$select = "SELECT zw_id, zw_wert FROM zulaessige_werte zw 
							INNER JOIN kattribut_zulaessiger_wert kazw ON kazw.zulaessige_werte_zw_id = zw_id
							WHERE kazw.komponentenattribute_kat_id = ".$row['kat_id'].";";
				
				$entitySubArray = array();
				
				$DataSubSelect = mysql_query($select);
				while($rowSubSelect = mysql_fetch_assoc($DataSubSelect))
				{
					$entitySubArray[$rowSubSelect['zw_id']] = $rowSubSelect['zw_wert'];
				}
				//echo var_export($entitySubArray);
				$entity->componentAttributeValidValue = $entitySubArray;
				
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
		 public function getComponentAttributesFromComponent($id)
		 {
			$entityArray = array();
			$entitySubArray = array();
		 
			$select = "SELECT kat.kat_id, kat.kat_name, kom.k_id, koat.khkat_wert
						FROM komponente kom
						INNER JOIN komponente_kattribut koat ON koat.komponenten_k_id = kom.k_id
						INNER JOIN komponentenattribute kat ON kat.kat_id = koat.komponentenattribute_kat_id
						WHERE kom.k_id = ".$id.";";
					   
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentAttributeEntity();
				$entity->componentAttributeId = $row['kat_id'];
				$entity->componentAttributeName = $row['kat_name'];
				$entity->componentAttributeIsFromComponent = true;
				$entity->componentAttributeUncertaintId = $row['k_id'];
				$entity->componentAttributeComponentValue = $row['khkat_wert'];
				
				$select = "SELECT zw_wert FROM zulaessige_werte zw 
							INNER JOIN kattribut_zulaessiger_wert kazw ON kazw.zulaessige_werte_zw_id = zw_id
							WHERE kazw.komponentenattribute_kat_id = ".$row['kat_id'].";";
				$DataSubSelect = mysql_query($select);
				while($rowSubSelect = mysql_fetch_assoc($DataSubSelect))
				{
					$entitySubArray[] = $rowSubSelect['zw_wert'];
				}

				$entity->componentAttributeValidValue = $entitySubArray;
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
							kom.k_id = ".$id." AND kom.deletedFlag = 0;";
					   
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			$entity = new ComponentAttributeEntity();
			$entity->componentAttributeId = $row['kat_id'];
			$entity->componentAttributeName = $row['kat_name'];
			$entity->componentAttributeIsFromComponent = true;
			$entity->componentAttributeUncertaintId = $row['k_id'];
			$entity->componentAttributeComponentValue = $row['khkat_wert'];
						
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
			$row = mysql_fetch_assoc($Data);
			
			$entity = new ComponentAttributeEntity();
			$entity->componentAttributeId = $row['kat_id'];
			$entity->componentAttributeName = $row['kat_name'];
			$entity->componentAttributeIsFromComponent = true;
			$entity->componentAttributeUncertaintId = $row['ka_id'];
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
		 * @return ComponentAttribute Id
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function insertComponentAttribute($componentAttributeName , $IsForComponent, $componentAttributeUncertaintId, $componentAttributeComponentValue)
		 {
			 $insert ="INSERT INTO komponentenattribute (kat_name)
								VALUES('".$componentAttributeName."');";
			 mysql_query($insert);
			 
			 $select = "SELECT MAX(kat_id) AS ID FROM komponentenattribute;";
			 $Data = mysql_query($select);
			 $row = mysql_fetch_assoc($Data);
								
			if($IsForComponent)
			{
				$insert ="INSERT INTO komponente_kattribut (komponenten_k_id, komponentenattribute_kat_id, khkat_wert)
								VALUES(".$componentAttributeUncertaintId.", ".$row["ID"].", '".$componentAttributeComponentValue."');";
				mysql_query($insert);
			}
			else
			{
				$insert ="INSERT INTO kart_kattribut (komponentenarten_ka_id, komponentenattribute_kat_id)
								VALUES(".$componentAttributeUncertaintId.", ".$row["ID"].");";
				mysql_query($insert);
			}
			
			return $row["ID"];
										
		 }
		 
		 
		  /**
		 * select all ComponentTypes
		 * 
		 * @return ComponentTypeEntity[]
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentTypes()
		 {
			$arrayEntity = array();
		 	$select = "SELECT *
					   FROM komponentenarten;";
					   
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentTypeEntity();
				$entity->typeId = $Data['ka_id'];
				$entity->typeName = $Data['ka_komponentenart'];
				$entity->typeImagePath = $Data['ka_link'];
				$arrayEntity[] = $entity;
			}
						
			return $arrayEntity;
		 }

		 /**
		 * select ComponentTypeById
		 * 
		 * @param int $id id
		 *
		 * @return ComponentTypeEntity
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentTypeById($id)
		 {
		 	if(file_exists('../entity/RoomEntity.php')) require_once('../entity/ComponentTypeEntity.php');
		 	if(file_exists('../_php/entity/RoomEntity.php')) require_once('../_php/entity/ComponentTypeEntity.php');
			
			$select = "SELECT ka_id, ka_komponentenart, ka_link
					   FROM komponentenarten
						WHERE
							ka_id = ".$id.";";
							
			$data = mysql_query($select);
		   
			$row = mysql_fetch_assoc($data);
			
			$entity = new ComponentTypeEntity();
			$entity->typeId = $row['ka_id'];
			$entity->typeName = $row['ka_komponentenart'];
			$entity->typeImagePath = $row['ka_link'];
						
			return $entity;
		 }

		 
		 
         /**
		 * insert ComponentType
		 *
		 * @param string $typeName 
		 * @param string $typeImagePath	
		 *
		 * @return ComponentType Id
		 * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function insertComponentType($typeName, $typeImagePath)
		 {
			 $insert ="INSERT INTO komponentenarten (ka_komponentenart, ka_link)
								VALUES('".$typeName."', '".typeImagePath."');";
										
			mysql_query($insert);
			
			$select = "SELECT MAX(ka_id) AS ID FROM komponentenarten;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			 
			 return $row["ID"];
		 }
		 
		 
		 /**
		 * get SubComponent by MasterComponentId
		 *
	  	 * @param int $id id
		 * 
		 * @return ComponentEntity[]
		 *
         * @author Leon Geim<leon.geim@gmail.com>		  
		 */
		 public function getSubComponentsbyComponentId($id)
		 {
			$entityArray = array();
			
			$select = "SELECT kom.*, CASE WHEN (Select v_id
									FROM komp_vorgang kova 
									WHERE kova.k_id = kom.k_id
									Order by Datum DESC
               						LIMIT 1) = 2 then true else false end as v_id
						FROM komponente_komponente sub
						INNER JOIN komponente kom ON kom.k_id = sub.komponenten_k_id_teil
						WHERE
							sub.komponenten_k_id_aggregat = ".$id.";";
			$Data = mysql_query($select);
			
			$entityArray = array();
			while ($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy = $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier = $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				$entity->componentHasProblems = $row['v_id'];	

				$entityArray[] = $entity;				
			}
						
			return $entityArray;
		 }
		 
		 
			 
		 /**
		 * insert SubComponent
		 *
	  	 * @param int $componentId
		 * @param int $subComponentId
		 * 
		 * @return SubComponent ID
		 *
         * @author Daniel Schulz <schmoschu@gmail.com>		  
		 */
		 public function insertSubComponent($componentId, $subComponentId)
		 {
			$insert ="INSERT INTO komponente_komponente (komponenten_k_id_aggregat, komponenten_k_id_teil)
								VALUES(".$componentId.", ".$subComponentId.");";
										
			mysql_query($insert);
			
			$select = "SELECT MAX(khk_id) AS ID FROM komponente_komponente;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			 
			 return $row["ID"];
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
								VALUES(".$componentId.",".$attributeId.", '".$value."');";
										
			return mysql_query($insert) or die(mysql_error());
			
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
			
			$select = "SELECT Distinct(k_name) as name FROM komponente WHERE deletedFlag = 0 order by k_name";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{				
				$nameArray[] = $row["name"];
			}
			
			return $nameArray;
		 }
		 
		 /**
		  *  function to get user by user name
		  * 
		  * @return UserEntity
		  * 
		  * @author Leon Geim <leon.geim@gmail.com>
		  */
		 public function getUserByUsername($userName) 
		 { 
			$select = "SELECT * FROM benutzer
						WHERE b_name = '".$userName."' AND deletedFlag = 0";
			mysql_select_db("itv_v1");		   
			$Data = mysql_query($select) 
			or die ("MySQL-Error: " . mysql_error());  			
			$row = mysql_fetch_assoc($Data);
			if($row['b_id'] == null)
			{
				return null;
			}
			$entity = new UserEntity();
			$entity->userId = $row['b_id'];
			$entity->userGroupId = $row['bg_id'];
			$entity->userPw = $row['b_pw'];
			$entity->userName = $row['b_name'];
			$entity->userFirstName = $row['b_vorname'];
			$entity->userLastName = $row['b_nachname'];				
			$entity->userEmail = $row['b_email'];
						
			return $entity;
		 }
		 
		  /**
		 * get DistinctComponents
		 * 
		 * @return Dictionary 
		 *
         * @author Leon Geim<leon.geim@gmail.com>	  
		 */
		 public function getComponentDevices()
		 {
			$entityArray = array();
						
			$select = "SELECT kom.*,  CASE WHEN (Select v_id
									FROM komp_vorgang kova 
									WHERE kova.k_id = kom.k_id
									Order by Datum DESC
               						LIMIT 1) = 2 then true else false end as v_id
						FROM komponente kom
						WHERE kom.k_device = 1 AND kom.deletedFlag = 0;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier= $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				$entity->componentHasProblems= $row['v_id'];
				
				$entityArray[] = $entity;
				
			}
			
			$select  = "SELECT count(*) AS problemCount
						FROM raeume rae
						INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						INNER JOIN komp_vorgang kovo ON kovo.K_id = kom.k_id AND v_id = 2
						WHERE kom.k_device = 1;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return array('problemCount' => $row["problemCount"], 'rooms' => $entityArray);
			
		 }
		 
		   /**
		 * get DistinctComponents
		 * 
		 * @return Dictionary 
		 *
         * @author Leon Geim<leon.geim@gmail.com>
		 */
		 public function getComponentsWithoutDevices()
		 {
			$entityArray = array();
			
						
			$select = "SELECT kom.*,  CASE WHEN (Select v_id
									FROM komp_vorgang kova 
									WHERE kova.k_id = kom.k_id
									Order by Datum DESC
               						LIMIT 1) = 2 then true else false end as v_id
						FROM komponente kom
						WHERE kom.k_device = 0 AND kom.deletedFlag = 0;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier= $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				$entity->componentHasProblems= $row['v_id'];
				
				$entityArray[] = $entity;
				
			}
			
			$select  = "SELECT count(*) AS problemCount
						FROM raeume rae
						INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						INNER JOIN komp_vorgang kovo ON kovo.K_id = kom.k_id AND v_id = 2
						WHERE kom.k_device = 0;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return array('problemCount' => $row["problemCount"], 'rooms' => $entityArray);
		 }
		 
		  /**
		  *  function to get Number Of Problems from devices
		  * 
		  * @return NumberOfProblems
		  * 
		  * @author Leon Geim<leon.geim@gmail.com>
		  */
		 public function getNumberComponentProblems()
		 {
			$select  = "SELECT count(*) AS problemCount
						FROM raeume rae
						INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						INNER JOIN komp_vorgang kovo ON kovo.K_id = kom.k_id AND v_id = 2
						WHERE rae.deletedFlag = 0;";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			return $row["problemCount"];
		 }	

		 /**
		 *  function to get Components in Storage
		 * 
		 * @return ComponentEntity[]
		 * 
		 * @author Leon Geim <leon.geim@gmail.com>
		 */
		 public function getDistinctComponentsInStorage($roomId)
		{
			$entityArray = array();
			
						
			$select = "SELECT 
							distinct(k_name), k_id, lieferant_l_id, k_einkaufsdatum,
							k_gewaehrleistungsdauer, k_notiz, k_hersteller, komponentenarten_ka_id	
						FROM komponente
						WHERE lieferant_r_id = ".$roomId." AND deletedFlag = 0;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier= $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				$entity->componentHasProblems= $row['v_id'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		}

	 
		 /**
		 * get Maintenances
		 * 
		 * @return MaintenanceEntitiy[]
		 * @param int $count last x-rows
		 *
         * @author Leon Geim <leon.geim@gmail.com>		  
		 */
		 public function getMaintenances($count=0)
		 {
			$entityArray = array();
		 
		 $limit;
		 if($count > 0)
		 {
			$limit = "LIMIT ".$count.";";
		 }
		 else
		 {
			$limit = ";";
		 }
			$select = "SELECT * FROM komp_vorgang ORDER BY kom_id DESC '".
						$limit . "'";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new MaintenanceEntity();
				$entity->maintenanceId = $row['kom_id'];
				$entity->componentId = $row['k_id'];
				$entity->transactionId = $row['v_id'];
				$entity->maintenanceComment = $row['comment'];
				$entity->maintenanceDate= $row['datum'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }
		 
		 /**
		 * get Maintenances Rooms
		 * 
		 * @param int $id roomId
		 * @param int $count last x-rows
		 *
		 * @return MaintenanceEntitiy[]
		 *
         * @author Leon Geim <leon.geim@gmail.com>  
		 */
		 public function getMaintenancesFromRoom($id, $count=0)
		 {
			$entityArray = array();
		 
			$limit;
			if($count > 0)
			{
				$limit = "LIMIT ".$count.";";
			}
			else
			{
				$limit = ";";
			}
		 
			$select = "SELECT kova.kom_id, kova.k_id, kova.v_id, kova.comment, kova.datum
							FROM raeume rae
							INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
							INNER JOIN komp_vorgang kova ON kova.k_id = kom.k_id
							WHERE rae.r_id = ".$id." ORDER BY kova.kom_id DESC '".
							$limit. "'";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new MaintenanceEntity();
				$entity->maintenanceId = $row['kom_id'];
				$entity->componentId = $row['k_id'];
				$entity->transactionId = $row['v_id'];
				$entity->maintenanceComment = $row['comment'];
				$entity->maintenanceDate= $row['datum'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }
		 
		 /**
		 * get Maintenances component
		 * 
		 * @param int $id componentId
		 * @param int $count last x-rows
		 *
		 * @return MaintenanceEntitiy[]
		 *
         * @author Leon Geim <leon.geim@gmail.com>
		 */
		 public function getMaintenancesFromComponent($id, $count=0)
		{
			$entityArray = array();
		 
			$limit;
			if($count > 0)
			{
				$limit = "LIMIT ".$count.";";
			}
			else
			{
				$limit = ";";
			}
			
			$select = "SELECT kova.kom_id, kova.k_id, kova.v_id, kova.comment, kova.datu
							FROM komponente kom
							INNER JOIN komp_vorgang kova ON kova.k_id = kom.k_id
							WHERE kom.k_id = ".$id." ORDER BY kova.kom_id DESC '".
							$limit."'";
						
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new MaintenanceEntity();
				$entity->maintenanceId = $row['kom_id'];
				$entity->componentId = $row['k_id'];
				$entity->transactionId = $row['v_id'];
				$entity->maintenanceComment = $row['comment'];
				$entity->maintenanceDate= $row['datum'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		}

 		/**
		 * insert insertMaintenance.
		 *
	  	 * @param int $attributeId
		 * @param int $componentId
		 * @param int $value
		 * 
		 * @return 1 - true
		 *		   2 - false
		 *
         * @author Leon Geim <leon.geim@gmail.com>
		 */
		 public function insertMaintenance($userId, $componentId, $transactionId, $maintenanceComment, $maintenanceDate)
		{
			$select = "SELECT v_id FROM komp_vorgang WHERE k_id = ".$componentId." Order by kom_id desc LIMIT 1";
			$Data = mysql_query($select);
			$row = mysql_fetch_assoc($Data);
			
			if($row["v_id"] == '1')
			{
				$insert = "INSERT INTO komp_vorgang (k_id, v_id, b_id, comment, datum)
							VALUES (".$componentId.", ".$transactionId.", ".$userId.", ".$maintenanceComment.", ".$maintenanceDate.");";
							
				mysql_query($insert);
				
				$select = "SELECT MAX(kom_id) as ID from komp_vorgang;";
				$Data = mysql_query($select);
				$row = mysql_fetch_assoc($Data);
				
				return $row["ID"];
			}
		}		 
		
		  /**
		 * insert insertMaintenance.
		 *
	  	 * @param int $componentId componentId
		 * 
		 * @return 1 - true
		 *		   2 - false
		 *
         * @author Leon Geim <leon.geim@gmail.com>
		 */
		 public function takeOutOfService($componentId)
		 {
			//Verschieben von Komponenten in Lager
			//Man bekommt nen Device und all Komponenten werden ins Lager verschoben	
			
			$select = "SELECT * FROM komponente_komponente WHERE komponenten_k_id_aggregat = ".$componentId.";";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$update = "UPDATE komponente SET lieferant_r_id = 900000 WHERE k_id = ".$row["komponenten_k_id_teil"].";";
				mysql_query($update);
			}
			
			$update = "UPDATE komponente SET lieferant_r_id = 900000 WHERE k_id = ".$componentId.";";
			mysql_query($update);
		 }
		 
		  /**
		 * delete Corpses.
		 *
		 * @return 1 - true
		 *		   2 - false
		 *
         * @author Leon Geim <leon.geim@gmail.com>		  
		 */
		 public function deleteCorpses()
		 {
			$interval = 60*60*24;
			$time = Time();
			$select = "SELECT * FROM komponente WHERE (k_name is NULL OR k_name = '')
						AND k_erstellungszeit > ".$time-$interval;
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$delete = "DELETE 
							FROM komponente_komponente 
							WHERE komponenten_k_id = ".$row["k_id"]." 
							OR komponenten_k_id_teil = ".$row["k_id"]."";
							
				mysql_query($delete);
				
				$delete = "DELETE 
							FROM komponente_kattribut 
							WHERE komponenten_k_id = ".$row["k_id"]."";
							
				mysql_query($delete);
				
				$delete = "DELETE 
							FROM komp_vorgang 
							WHERE k_id = ".$row["k_id"]."";
							
				mysql_query($delete);
				
				$delete = "UPDATE 
							FROM komponente 
							SET deletedFlag = 1
							WHERE k_id = ".$row["k_id"]."";
							
				mysql_query($delete);			
			}
		}
			
		  /**
		  *  function to get Components in Storage
		  * 
		  * @return ComponentEntity[]
		  * 
		  * @author Leon Geim <leon.geim@gmail.com>
		  */
		 public function getComponentsInStorageByName($name, $count)
		 {
			$entityArray = array();
		 
			$select = "SELECT * FROM komponente WHERE k_name = '".$name."' AND
													  lieferant_r_id  = 900000 AND deletedFlag = 0 LIMIT ".$count;
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier = $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				
				$entityArray[] = $entity;
			}
			
			return $entityArray;
		 }
		 
		 	 /**
		  *  function to get Devices by RoomId
		  * 
		  * @param int $id roomId
		  *
		  * @return ComponentEntity[]
		  * 
		  * @author Leon Geim <leon.geim@gmail.com>
		  */
		 public function getComponentDevicesByRoomId($roomId)
		 {
			$entityArray = array();
						
			$select = "SELECT kom.*,  CASE WHEN (Select v_id
									FROM komp_vorgang kova 
									WHERE kova.k_id = kom.k_id
									Order by Datum DESC
               						LIMIT 1) = 2 then true else false end as v_id
						FROM raeume rae
						INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						WHERE kom.k_device = 1 AND rae.r_id = ".$roomId." AND kom.deletedFlag = 0;";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier= $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				$entity->componentHasProblems= $row['v_id'];
				
				$entityArray[] = $entity;
				
			}
			return $entityArray;
		 }
		 
		 /**
		  *  function to get Devices by RoomId
		  * 
		  * @param int $id componentId
		  * @param int $id roomId
		  *
		  * @return ComponentEntity[]
		  * 
		  * @author Leon Geim <leon.geim@gmail.com>		  
		  */
		 public function getComponentsByDeviceandRoomId($componentId, $roomId)
		 {
			$entityArray = array();
						
			//$select = "SELECT kom.*,  CASE WHEN (Select v_id
			$select = "SELECT *, CASE WHEN (Select v_id
							FROM komp_vorgang kova 
							WHERE kova.k_id = kom.k_id
							Order by Datum DESC
							LIMIT 1) = 2 then true else false end as v_id
							FROM raeume rae
							INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
							INNER JOIN komponente_komponente koko ON koko.komponenten_k_id_aggregat = kom.k_id 
							WHERE kom.k_device = 1 AND rae.r_id = ".$roomId.";";
			$Data = mysql_query($select);
			while($row = mysql_fetch_assoc($Data))
			{
				$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier= $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				$entity->componentHasProblems= $row['v_id'];
				
				$entityArray[] = $entity;
				
			}
			return $entityArray;
		 }
		 
		 /**
		  *  function to get component by componentId
		  * 
		  * @param int $id componentId
		  *
		  * @return ComponentEntity
		  * 
		  * @author Daniel Schulz <schmoschu@gmail.com>
		  * @author Adrian Geuss <adriangeuss@gmail.com>
		  */
		 public function getComponentbyComponentId($id)
		 {
		 	/*
			 *  FIXME: Does anyone need this query? Purpose?
			 * 	
			 */
		 	
			// $select = "SELECT kom.*,  CASE WHEN (Select v_id
									// FROM komp_vorgang kova 
									// WHERE kova.k_id = kom.k_id
									// Order by Datum DESC
               						// LIMIT 1) = 2 then true else false end as v_id
						// FROM raeume rae
						// INNER JOIN komponente kom ON kom.lieferant_r_id = rae.r_id
						// INNER JOIN komponente_komponente koko ON koko.komponenten_k_id_aggregat = kom.k_id 
						// WHERE kom.k_device = 1 AND kom.k_id = ".$id.";";
			$select = "SELECT *
						FROM komponente
						WHERE k_device = 0 AND deletedFlag = 0 AND k_id = ".$id.";";
			$Data = mysql_query($select);			
			$row = mysql_fetch_assoc($Data);
			
			$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier= $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				
			return $entity;  
		 }
		 
		 /**
		  *  function to get device by device id
		  * 
		  * @param int $id deviceId
		  *
		  * @return ComponentEntity
		  * 
		  * @author Adrian Geuss <adriangeuss@gmail.com>
		  */
		 public function getDevicebyDeviceId($id)
		 {
			$select = "SELECT *
						FROM komponente
						WHERE k_device = 1 AND deletedFlag = 0 AND k_id = ".$id.";";
			$Data = mysql_query($select);			
			$row = mysql_fetch_assoc($Data);
			
			$entity = new ComponentEntity();
				$entity->componentId = $row['k_id'];
				$entity->componentDeliverer = $row['lieferant_l_id'];
				$entity->componentRoom = $row['lieferant_r_id'];
				$entity->componentName = $row['k_name'];
				$entity->componentBuy= $row['k_einkaufsdatum'];
				$entity->componentWarranty = (isset($row['k_gewaehrleistungsdatum'])) ? $row['k_gewaehrleistungsdatum'] : null;
				$entity->componentNote = $row['k_notiz'];
				$entity->componentSupplier= $row['k_hersteller'];
				$entity->componentType = $row['komponentenarten_ka_id'];
				$entity->componentIsDevice = $row['k_device'];
				
			return $entity;  
		 }
	}
?>