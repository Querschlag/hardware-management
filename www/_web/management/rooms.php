<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<?php
			require_once('php/additions.php');
		
			$menuItem = GET('menu');
			
			echo '<li>>> <a href="index.php?mod=rooms&menu=$menuItem">';
			
			if ($menuItem == 'scrap')
				echo 'Ausmustern';
			else if ($menuItem == 'maintenance')
				echo 'Wartung';
			else if ($menuItem == 'reporting')
				echo 'Reporting';
			else if ($menuItem == 'management')
				echo 'Stammdaten';
			
			echo '</a></li>';
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
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R001</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R002</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R003</a></li>
	</ul>
	<h2>Stockwerk 1</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R101</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R102</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R103</a></li>
	</ul>
	<h2>Stockwerk 2</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R201</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R202</a></li>
		<li><a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>">R203</a></li>
	</ul>
</div>