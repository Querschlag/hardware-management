<form method="post" id="form">
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
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
			
			$menuItem = GET('menu');
			
			echo '<li>>> <a href="index.php?mod=rooms&menu='. $menuItem . '">';
			
			print $menuItem;
			
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
		<li>>> <a href="index.php?mod=room<?php echo '&menu=' . GET('menu');?>"><?php echo $view->getRoomNumber(); ?></a></li>
	</ul>
</div>

<div id="dialog" title="Raum l&ouml;schen?">
	<p>Sind Sie sicher, dass Sie den Raum "<?php print $view->getRoomNumber(); ?>" l&ouml;schen wollen?</p>
	<p>
		<input name="btnYes" type="submit" value="Ja" style="width:75px;" />
		<input name="btnNo" type="submit"  value="Nein" style="width:75px;" />
		
		<?php		
			// check yes button
			if(isset($_POST['btnYes']))
			{
				// delete room
				$controller->deleteRoom();
				
				// check error count
				if($controller->getErrorCount() == 0)
				{
					// no redirect
					header( "Location: index.php?mod=rooms" );
				}	
			}
		?>
	</p>
</div>

<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php?mod=addDevice<?php echo '&menu=' . GET('menu');?>">Ger&auml;t hinzuf&uuml;gen</a>		
		<a class="right" href="" name="btnDeleteRoom">Raum l&ouml;schen</a>
		<a class="right" href="index.php?mod=change_room&roomId=<?php echo GET('roomId'); echo '&menu=' . GET('menu');?>">Raum bearbeiten</a>				
		<div class="clearfix"></div>
	</div>
	<h2>Computer</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">PC001</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">PC002</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">PC003</a></li>
	</ul>
	<h2>Drucker</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">HP MP105</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">Canon i350</a></li>
	</ul>
	<h2>Router</h2>
	<ul class="rooms">
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">DLINK 1</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">DLINK 2</a></li>
		<li><a href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">FritzBox!</a></li>
	</ul>
</div>
</form>