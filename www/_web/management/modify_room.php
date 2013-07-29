<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(); ?>">Raum &auml;ndern</a></li>
	</ul>
</div>
<div id="module">
	<!--
		//TODO
		
		When providing this form with functionality, please modify the 'mod' parameter to point to the current
		module (see /php/navigation.php for more details), so you can make use of the auto appended id of
		user,room,device,component,supplier and so on.
		
		After doing your update and validation stuff use this:
		
			header( "Location: index.php" . echo navParams(array('mod' => '<upperModule>')) );
		
		to redirect to the page where you came or started the wizard from.
	-->
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<form method="post">
		
		<?php
		
			// check room id
			if(isset($_GET['room']))
			{
				// print site header
				print '<h3>Raum &auml;ndern</h3>';				
			}
			
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
				 *  function to display room
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com> 
				 */
				public function displayRoom($id, $number, $name, $note)
				{
					// store number
					$_POST['number'] = $number;
					
					// store name
					$_POST['name'] = $name;
					
					// store note
					$_POST['note'] = $note;
				}
			
				/**
				 *  function to display floor
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayFloor($floorNumber)
				{
					// store floor number in post
					$_POST['floor'] = $floorNumber;
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
		 		*  function to display problem count
		 		* 
		 		* @author Johannes Alt <altjohannes510@gmail.com>
		 		*/
				public function displayProblemCount($count) 
				{
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
					// return value to return
					$retVal = NULL;					
					
					// check and set room id
					if(isset($_GET['room'])) $retVal = $_GET['room'];
					
					// return value
					return $retVal;
				}
			}
			
			// create view object
			$view = new Room();
			
			// create database
			$database = new Database();
			
			// create controller object
			$controller = new RoomController($view, $database);			
							
			// check posts
			if( isset($_POST['floor']) 	== FALSE	&&
				isset($_POST['number'])	== FALSE 	&&
				isset($_POST['name'])	== FALSE	&&
				isset($_POST['note'])	== FALSE	&&
			 	isset($_GET['room'])  == TRUE)
				{							
					// select room to change
					$controller->selectRoom();
				}
		?>
		
		<p>Stockwerk</p>
		<select name="floor">
			<optgroup label="W&auml;hle ein Stockwerk"></optgroup>
				<option value="0" <?php if(isset($_POST['floor']) && $_POST['floor'] == 0) echo 'selected'; ?>>Erdgeschoss</option>
				<option value="1" <?php if(isset($_POST['floor']) && $_POST['floor'] == 1) echo 'selected'; ?>>1 Stockwerk</option>
				<option value="2" <?php if(isset($_POST['floor']) && $_POST['floor'] == 2) echo 'selected'; ?>>2 Stockwerk</option>
		</select>&nbsp;<span class="require">*</span>
		
		<p>Raumnummer</p>
		<input name="number" type="text" <?php if(isset($_POST['number'])) echo 'value="' . $_POST['number'] .'"'; ?>/>&nbsp;<span class="require">*</span>
		
		<p>Bezeichnung</p>
		<input name="name" type="text" <?php if(isset($_POST['name'])) echo 'value="' . $_POST['name'] .'"'; ?>/>&nbsp;<span class="require">*</span>
		<p>Notiz</p>
		<textarea name="note" rows=6 cols=30 <?php if(isset($_POST['note'])) echo 'value="' . $_POST['note'] .'"'; ?>></textarea>
		<?php		
			// check insert button
			if(isset($_POST['btnAddSubmit']))
			{
				// call insert method
				$controller->insertRoom();
								
				// check error count
				if($controller->getErrorCount() == 0)
				{
					// no redirect
					header( 'Location: index.php'. navParams(array('mod' => 'modifyRoom')) );
				}
			}
			else if(isset($_POST['btnChangeSubmit']))
			{
				// call update method
				$controller->updateRoom();
								
				// check error count
				if($controller->getErrorCount() == 0)
				{
					// redirect
					header( 'Location: index.php'. navParams(array('mod' => 'room')) );
				}				
			}
		?>
		
		<p class="require">* Pflichtfeld</p>
		
		<?php  
			if(isset($_GET['room']))
			{
				// print change button
				print '<input name="btnChangeSubmit" type="submit" value="&Auml;ndern" />';				
			}
			else
			{
				// print site header
				print '<input name="btnAddSubmit" type="submit" value="Hinzuf&uuml;gen" />';					
			}
		?>
		<input onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'room')); ?>'" type="button" value="Abbrechen" />	

	</form>
</div>