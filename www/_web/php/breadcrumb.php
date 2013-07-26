<?php
	
	require_once('php/additions.php');
		
	// include IRoom
	require_once('../_php/interface/IRoom.php');
	
	// include room controller
	require_once('../_php/core/RoomController.php');
	
	// include mock database
	require_once('../_php/database/Database.php');
	
	// include room entity
	require_once('../_php/entity/RoomEntity.php');

	/**
	* Room object
	*
	* Room object with functionality of IRoom
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class Room implements IRoom
	{
		/**
		 *  storage for the room name
		 */
		private $_number;
						
		/**
		 *  function to display room
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com> 
		 */
		public function displayRoom($id, $number, $name, $note)
		{
			// store room name
			$this->_number = $number;
		}
	
		/**
		 *  function to display floor
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayFloor($floorNumber)
		{
		}
		
		/**
		 *  function to display room end
		 * 
		 *  @author Johannes Alt <altjohannes@gmail.com>
		 */
		public function displayRoomEnd()
		{
		}
	
		/**
		 *  function to get room number
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomNumber()
		{
			// return room number
			return $this->_number;			
		}
		
		/** 
		 *  function to get room name
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomName()
		{		
		}
		
		/**
		 * function to get room note 
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomNote()
		{				
		}
		
	   /** 
	 	*  function to get floor number
	 	* 
	 	* @author Johannes Alt <altjohannes510@gmail.com>
		*/
		public function getFloorNumber()
		{
		}
		
		/**
		 * function to set error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */			
		public function setError()
		{		
		}
	
	   /**
	 	*  function to set required data error
	 	* 
	 	* @author Johannes Alt <altjohannes510@gmail.com>
	 	*/
		public function setRequiredDataError()
		{
		}
			
		/**
		 * function to get room id
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getRoomId()
		{
			// return value to return
			$retVal = NULL;					
			
			// check and set room id
			if(isset($_GET['roomId'])) $retVal = $_GET['roomId'];
			
			// return value
			return $retVal;
		}
	}

	// create view object
	$view = new Room($_POST);
	
	// create database
	$database = new Database();
	
	// create controller object
	$controller = new RoomController($view, $database);	
		
	// select room to change
	$controller->selectRoom();		

			
	/*<li>>> <a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>"><?php echo $view->getRoomNumber(); ?></a></li>
	*/
	
	/**
	 * Breadcrumb composer
	 *
	 * Creates breadcrumb navigation based on GET params
	 *
	 * @package template
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */
	
	require_once('php/additions.php');
	
	// start page
	echo '<li><a href="index.php">Startseite</a></li>';
	
	// main menu item
	$menuItem = GET('menu');
	
	echo '<li> >> <a href="index.php' . menuParams() . '&mod=rooms">';
	
	if ($menuItem == 'scrap')
		echo 'Ausmustern';
	else if ($menuItem == 'maintenance')
		echo 'Wartung';
	else if ($menuItem == 'reporting')
		echo 'Reporting';
	else if ($menuItem == 'management')
		echo 'Stammdaten';
	
	echo '</a></li>';
	
	// rest of navigation tree based on GET params
	// FIXME: Load names for selected room, device, component from database
	if (GET('room'))
		echo '<li> >> <a href="index.php' . menuParams() .
		'&mod=room&room=' . GET('room') .
		'">R001</a></li>';
		
	if (GET('device'))
		echo '<li> >> <a href="index.php' . menuParams() .
		'&mod=device&room=' . GET('room') .
		'&device=' . GET('device') .
		'">PC001</a></li>'; 
	if (GET('component'))
		echo '<li> >> <a href="index.php' . menuParams() .
		'&mod=component&room=' . GET('room') .
		'&device=' . GET('device') .
		'&component=' . GET('component') .
		'">Komponente 1</a></li>';
?>