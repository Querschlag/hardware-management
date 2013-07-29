<?php
	require_once('php/navigation.php');
	
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
	class BreadcrumbRoom implements IRoom
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
		public function displayRoom($id, $number, $name, $note, $roomHasProblems = false)
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
		 *  function to display problem count
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayProblemCount($count)
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
			if(isset($_GET['room'])) $retVal = $_GET['room'];
			
			// return value
			return $retVal;
		}
	}

	// create view object
	$view = new BreadcrumbRoom($_POST);
	
	// create database
	$database = new Database();
	
	// create controller object
	$controller = new RoomController($view, $database);	
		
	// select room to change
	$controller->selectRoom();		

	
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
	
	echo '<li> >> <a href="index.php' . navParams( array('mod' => 'rooms'), false ) . '">';
	
	echo menuTitle($menuItem);

	echo '</a></li>';
	
	// rest of navigation tree based on GET params
	// FIXME: Load names for selected room, device, component from database
	if (GET('room'))
		echo '<li> >> <a href="index.php' .
		navParams( array('mod' => 'room', 'room' => GET('room')), false ) .
		'">' . $view->getRoomNumber() . '</a></li>';
	if (GET('device'))
		echo '<li> >> <a href="index.php' . 
		navParams( array('mod' => 'device', 'room' => GET('room'), 'device' => GET('device')), false ) .
		'">PC001</a></li>'; 
	if (GET('component'))
		echo '<li> >> <a href="index.php' .
		navParams( array('mod' => 'component', 'room' => GET('room'), 'device' => GET('device'), 'component' => GET('component')), false ) .
		'">Komponente 1</a></li>';
?>