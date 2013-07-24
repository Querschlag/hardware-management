<?php namespace Template; ?>
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
		<a class="left" href="index.php?mod=createRoom<?php echo '&menu=' . GET('menu');?>">Raum hinzuf&uuml;gen</a>
		<div class="clearfix"></div>
	</div>
	
	<?php
	
		// // include IRoom
		// require_once('../_php/interface/IRoom.php');
// 		
		// // include room controller
		// require_once('../_php/core/RoomController.php');
// 		
		// // include mock database
		// require_once('../_php/test/MockDatabase.php');
// 		
		// // include room entity
		// require_once('../_php/entity/RoomEntity.php');
// 	
		// class Room implements IRoom
		// {
			// /**
			 // *  storage for the row max
			 // */
			// private $_rowMax = 3;
// 			
			// /** 
			 // *  storage for the row count
			 // */
			// private $_rowCount;
// 					
			// /**
			 // *  function to display room
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com> 
			 // */
			// public function displayRoom($id, $number, $name, $note)
			// {
				// // check row count
				// if($this->_rowCount == $this->_rowMax)
				// {
					// // print end list
					// print '</ul>';					
				// }
// 				
				// // check row count
				// if(isset($this->_rowCount) == FALSE || $this->_rowCount == $this->_rowMax)
				// {
					// // print start list
					// print '<ul class=\"rooms\">';
// 					
					// // reset row count
					// $this->_rowCount = 0;
				// }
// 				
				// // print list element
				// print '<li><a href=\"index.php?mod=room\">' . $number . '</a></li>';
// 				
				// // increase row count
				// $this->_rowCount++;			
			// }
// 		
			// /**
			 // *  function to display floor
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com>
			 // */
			// public function displayFloor($floorNumber)
			// {
				// // print end list
				// print '</ul>';
// 				
				// // print floor number
				// print '<h2>Stockwerk ' . $floorNumber . '</h2>';
// 				
				// // print start list
				// print '<ul class=\"rooms\">';
// 				
				// // reset row count
				// $this->_rowCount = 0;
			// }
// 			
			// /**
			 // *  function to display room end
			 // * 
			 // *  @author Johannes Alt <altjohannes@gmail.com>
			 // */
			// public function displayRoomEnd()
			// {
				// // print end list
				// print '</ul>';
// 				
				// // reset row count
				// $this->_rowCount = 0;
			// }
// 		
			// /**
			 // *  function to get room number
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com>
			 // */
			// public function getRoomNumber()
			// {			
			// }
// 			
			// /** 
			 // *  function to get room name
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com>
			 // */
			// public function getRoomName()
			// {				
			// }
// 			
			// /**
			 // * function to get room note 
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com>
			 // */
			// public function getRoomNote()
			// {				
			// }
// 			
			// /**
			 // * function to set error
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com>
			 // */			
			// public function setError()
			// {				
			// }
// 		
			// /**
			 // * function to set room number erro
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com>
			 // */
			// public function setRoomNumberError()
			// {				
			// }
// 		
			// /**
			 // * function to get room id
			 // * 
			 // * @author Johannes Alt <altjohannes510@gmail.com>
			 // */
			// public function getRoomId()
			// {				
			// }
		// }
// 
		// // create view object
		// $view = new Room();
// 		
		// // create database
		// $database = new MockDatabase();
// 		
		// // create controller object
		// $controller = new RoomController($view, $database);
// 		
		// // select the rooms
		// $controller->selectRooms();
	?>
	
	
	
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
</div>