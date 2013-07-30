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
	$roomView = new BreadcrumbRoom($_POST);
	
	// create database
	$database = new Database();
	
	// create controller object
	$roomController = new RoomController($roomView, $database);	
		
	// select room to change
	$roomController->selectRoom();	
	
	
	
	// include IComponent
	require_once('../_php/interface/IComponent.php');
	
	// include room controller
	require_once('../_php/core/ComponentController.php');
	
	// include mock database
	require_once('../_php/database/Database.php');
	
	// include room entity
	require_once('../_php/entity/ComponentEntity.php');

	/**
	* Devices object
	*
	* Device object with functionality of IComponent
	*
	* @category 
	* @package
	* @author Adrian Geuss <adriangeuss@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class BreadcrumbDevice implements IComponent
	{
		
		/**
		 *  storage for the device name
		 */
		private $_name;
		
		/**
		 *  function to display components
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function displayComponent($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type, $isDevice) {}
						
		/**
		 *  function to display device
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDevice($id, $roomId, $name, $note, $deviceHasProblems = false)
		{
			$this->_name = $name;
		}
	
		/**
		 *  function to display floor
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDeviceType($deviceTypeName){}

		/** 
 		*  function to display problem count
 		* 
 		* @author Adrian Geuss <adriangeuss@gmail.com>
 		*/
		public function displayProblemCount($count){}
		
		/**
		 *  function to display room end
		 * 
		 *  @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDeviceTypeEnd(){}
		
		/**
		 *  function to display components
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com> 
		 */
		public function displayComponents($components){}
		
		/**
		 *  function to set component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function setComponentName($device_name){}

		/**
		 *  function to get component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentId(){}
		
		/**
		 *  function to set component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function setComponentId($id){}
		
		/**
		 *  function to get component deliverer
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentDeliverer(){}
			
		/** 
		 *  function to get component room
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentRoom(){}
			
		/**
		 * function to get component name 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentName()
		{
			return $this->_name;
		}
			
		/**
		 * function to get component buying date 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentBuy(){}
			
		/**
		 * function to get component warranty 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentWarranty(){}
			
		/**
		 * function to get component note 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentNote(){}
			
		/**
		 * function to get component supplier 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentSupplier(){}
			
		/**
		 * function to get component types 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentTypes(){}
			
		/**
		 * function to get component types 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentIsDevice(){}
		
		/**
		 * function to set error
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */			
		public function setError(){}
			
		/**
		 * function to get room id
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function getDeviceId()
		{
			// return value to return
			$retVal = NULL;					
			
			// check and set room id
			if(isset($_GET['device'])) $retVal = $_GET['device'];
			
			// return value
			return $retVal;
		}
	}

	// create view object
	$deviceView = new BreadcrumbDevice($_POST);
	
	// create database
	$database = new Database();
	
	// create controller object
	$deviceController = new ComponentController($deviceView, $database);	
		
	// select room to change
	$deviceController->selectDevice();	
	
	
	
	
	// include IComponent
	require_once('../_php/interface/IComponent.php');
	
	// include room controller
	require_once('../_php/core/ComponentController.php');
	
	// include mock database
	require_once('../_php/database/Database.php');
	
	// include room entity
	require_once('../_php/entity/ComponentEntity.php');

	/**
	* Component object
	*
	* Component object with functionality of IComponent
	*
	* @category 
	* @package
	* @author Adrian Geuss <adriangeuss@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class BreadcrumbComponent implements IComponent
	{
		
		/**
		 *  storage for the device name
		 */
		private $_name;
		
			
		/**
		 *  function to display components
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function displayComponent($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type, $isDevice)
		{
			$this->_name = $name;
		}
		
		/**
		 *  function to display components
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com> 
		 */
		public function displayComponents($components){}
						
		/**
		 *  function to display device
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDevice($id, $roomId, $name, $note, $deviceHasProblems = false){}
	
		/**
		 *  function to display floor
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDeviceType($deviceTypeName){}

		/** 
 		*  function to display problem count
 		* 
 		* @author Adrian Geuss <adriangeuss@gmail.com>
 		*/
		public function displayProblemCount($count){}
		
		/**
		 *  function to display room end
		 * 
		 *  @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayDeviceTypeEnd(){}
		
		/**
		 *  function to set component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function setComponentName($device_name){}

		/**
		 *  function to get component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentId()
		{
			return GET('component');
		}
		
		/**
		 *  function to set component id
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function setComponentId($id){}
		
		/**
		 *  function to get component deliverer
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentDeliverer(){}
			
		/** 
		 *  function to get component room
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentRoom(){}
			
		/**
		 * function to get component name 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentName()
		{
			return $this->_name;
		}
			
		/**
		 * function to get component buying date 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentBuy(){}
			
		/**
		 * function to get component warranty 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentWarranty(){}
			
		/**
		 * function to get component note 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentNote(){}
			
		/**
		 * function to get component supplier 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentSupplier(){}
			
		/**
		 * function to get component types 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentTypes(){}
			
		/**
		 * function to get component types 
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */
		public function getComponentIsDevice(){}
		
		/**
		 * function to set error
		 * 
		 * @author Thomas Michl <thomas.michl1988@gmail.com>
		 */			
		public function setError(){}
			
		/**
		 * function to get room id
		 * 
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function getDeviceId(){}
	}

	// create view object
	$componentView = new BreadcrumbComponent($_POST);
	
	// create database
	$database = new Database();
	
	// create controller object
	$componentController = new ComponentController($componentView, $database);	
		
	// select room to change
	$componentController->selectComponent();

	
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
		'">' . $roomView->getRoomNumber() . '</a></li>';
	if (GET('device'))
		echo '<li> >> <a href="index.php' . 
		navParams( array('mod' => 'device', 'room' => GET('room'), 'device' => GET('device')), false ) .
		'">' . $deviceView->getComponentName() . '</a></li>'; 
	if (GET('component'))
		echo '<li> >> <a href="index.php' .
		navParams( array('mod' => 'component', 'room' => GET('room'), 'device' => GET('device'), 'component' => GET('component')), false ) .
		'">' . $componentView->getComponentName() . '</a></li>';
?>