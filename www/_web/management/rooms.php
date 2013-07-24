<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php?mod=rooms">R&auml;ume</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php?mod=create_room">Raum hinzuf&uuml;gen</a>
		<a class="right" href="index.php?mod=create_room">Lieferanten</a>
		<a class="right" href="index.php?mod=create_device">Bestellung</a>
		<div class="clear"></div>
	</div>
	
	<?php
		// include IRoom
		require_once('../_php/interface/IRoom.php');
		
		// include room controller
		require_once('../_php/core/RoomController.php');
		
		// include mock database
		require_once('../_php/test/MockDatabase.php');
		
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
			 *  storage for the row max
			 */
			private $_rowMax = 3;
			
			/** 
			 *  storage for the row count
			 */
			private $_rowCount;
					
			/**
			 *  function to display room
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com> 
			 */
			public function displayRoom($id, $number, $name, $note)
			{
				// check row count
				if($this->_rowCount == $this->_rowMax)
				{
					// print end list
					print '</ul>';					
				}
				
				// check row count
				if(isset($this->_rowCount) == FALSE || $this->_rowCount == $this->_rowMax)
				{
					// print start list
					print '<ul class=\"rooms\">';
					
					// reset row count
					$this->_rowCount = 0;
				}
				
				// print list element
				print '<li><a href=\"index.php?mod=room\">' . $number . '</a></li>';
				
				// increase row count
				$this->_rowCount++;			
			}
		
			/**
			 *  function to display floor
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function displayFloor($floorNumber)
			{
				// print end list
				print '</ul>';
				
				// print floor number
				print '<h2>Stockwerk ' . $floorNumber . '</h2>';
				
				// print start list
				print '<ul class=\"rooms\">';
				
				// reset row count
				$this->_rowCount = 0;
			}
			
			/**
			 *  function to display room end
			 * 
			 *  @author Johannes Alt <altjohannes@gmail.com>
			 */
			public function displayRoomEnd()
			{
				// print end list
				print '</ul>';
				
				// reset row count
				$this->_rowCount = 0;
			}
		
			/**
			 *  function to get room number
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getRoomNumber()
			{			
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
			 * function to set error
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */			
			public function setError()
			{				
			}
		
			/**
			 * function to set room number erro
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function setRoomNumberError()
			{				
			}
		
			/**
			 * function to get room id
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getRoomId()
			{				
			}
		}

		// create view object
		$view = new Room();
		
		// create database
		$database = new Database();
		
		// create controller object
		$controller = new RoomController($view, $database);
		
		// select the rooms
		$controller->selectRooms();
	?>
</div>