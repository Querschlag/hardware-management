<?php
	require_once('php/navigation.php'); 

	// Workaround: Replaces usage of GET parameter 'menu'
	$_SESSION['selectedMainMenuItem'] = GET('menu');
?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php<?php echo navParams( array('mod' => 'createRoom'), false ); ?>">Raum hinzuf&uuml;gen</a>
		<a class="right" href="index.php<?php echo navParams( array('mod' => 'supplier'), false ); ?>">Lieferanten</a>
		<a class="right" href="index.php<?php echo navParams( array('mod' => 'user'), false ); ?>">Benutzer</a>
		<div class="clearfix"></div>
	</div>
	
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<?php
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
			 *  storage for the row max
			 */
			 
			private $_rowMax = 7;
			
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
					print '<ul class="rooms">';
					
					// reset row count
					$this->_rowCount = 0;
				}
				
				// print list element
				print '<li><a href="index.php' . navParams(array('mod' => 'room', 'room' => $id)) . '">' . $number . '</a></li>';

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
				
				// check floor number
				if($floorNumber == 0)
				{
					// print floor name
					print '<h2>Erdgeschoss</h2>';
				}
				else if($floorNumber > 0)
				{
					// print floor name
					print '<h2>' . $floorNumber . '. Obergeschoss</h2>';
				}
				else 
				{
					// print floor nmae
					print '<h2>' . ($floorNumber * -1) . ' Untergeschoss</h2>';
				}
				
				// print start list
				print '<ul class="rooms">';
				
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
	 		*  function to display problem count
	 		* 
	 		* @author Johannes Alt <altjohannes510@gmail.com>
	 		*/
			public function displayProblemCount($count) 
			{
				// check count
				if($count > 0)
				{
					// set problem count message
					print '<b><span><p>Es wurden ' . $count . ' Probleme gefunden.</p></span></b>';
				}				
			}
		
			/**
			 *  function to get room number
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getRoomNumber()
			{
				// return return value
				return $_POST['number'];			
			}
			
			/** 
			 *  function to get room name
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getRoomName()
			{
				// return return value
				return $_POST['name'];		
			}
			
			/**
			 * function to get room note 
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getRoomNote()
			{
				// return return value
				return $_POST['note'];				
			}
			
		   /** 
		 	*  function to get floor number
		 	* 
		 	* @author Johannes Alt <altjohannes510@gmail.com>
			*/
			public function getFloorNumber()
			{
				// return return value
				return $_POST['floor'];
			}
			
			/**
			 * function to set error
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */			
			public function setError()
			{
				// print unknown error message
				print '<b><p><span class="require">Unbekannter Fehler! 
						Bitte versuchen Sie es später nocheinmal</span></p></b>';		
			}
		
		   /**
		 	*  function to set required data error
		 	* 
		 	* @author Johannes Alt <altjohannes510@gmail.com>
		 	*/
			public function setRequiredDataError()
			{
				// print error message
				print '<b><p><span class="require">Pflichtfelder k&ouml;nnen nicht leer sein.</span></p></b>';
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
		$view = new Room($_POST);
		
		// create database
		$database = new Database();
		
		// create controller object
		$controller = new RoomController($view, $database);
				
		// select the rooms
		$controller->selectRooms();
	?>
	
	<!-- mock rooms
	<h2>Erdgeschoss</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'room', 1); ?>">R001</a></li>
		<li><a href="index.php<?php echo navParams(null, 'room', 2); ?>">R002</a></li>
		<li><a href="index.php<?php echo navParams(null, 'room', 3); ?>">R003</a></li>
	</ul>
	<h2>Stockwerk 1</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'room', 4); ?>">R101</a></li>
		<li><a href="index.php<?php echo navParams(null, 'room', 5); ?>">R102</a></li>
		<li><a href="index.php<?php echo navParams(null, 'room', 6); ?>">R103</a></li>
	</ul>
	<h2>Stockwerk 2</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'room', 7); ?>">R201</a></li>
		<li><a href="index.php<?php echo navParams(null, 'room', 8); ?>">R202</a></li>
		<li><a href="index.php<?php echo navParams(null, 'room', 9); ?>">R203</a></li>
	</ul>
	-->
</div>