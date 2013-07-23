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
			
			$select = "Select * from raeume order by r_etage asc, r_nr asc;";
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
		 * @return void
		 */
		 public function getDeliverers()
		 {
		 	
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
		 public function insertDeliverer($companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email)
		 {
		 	
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
		 public function updateDeliverer($id, $companyName, $street, $zipCode, $location, $phoneNumber, $mobileNumber, $faxNumber, $email)
		 {
		 	
		 }
		 
		 /**
		  * delete deliverer
		  * 
		  * @return void
		  */
		 public function deleteDeliverer($id)
		 {
		 	
		 }
	}
?>