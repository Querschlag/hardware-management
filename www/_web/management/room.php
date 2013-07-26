<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
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

			// Breadcrumb navigation
			include('php/breadcrumb.php');
		?>
	</ul>
</div>

<div id="dialog" title="Raum l&ouml;schen?">
	<p>Sind Sie sicher, dass Sie den Raum "<?php print $view->getRoomNumber(); ?>" l&ouml;schen wollen?</p>
</div>


<script>
	$(function() { $('#dialog').hide(); } );

	$(function() {
		$('#btnDeleteRoom').on('click', function()
			{
			    $("#dialog").dialog({
			        autoOpen: true,
			        minWidth: 430,
			        width: 430,
			        buttons: 
			        [
			            	{
			            		text: "Raum & Geräte löschen",
			            		name: "btnYes",
			            		class: "destructiveButton",
			                	click: function () 
			                		{  	
										var ajax = $.ajax
											(
												{
													async: false,
													type: "POST",
													url: window.location,
													data: { btnYes: true },	
												}										
											);	
											
										ajax.done
										(
											function()
											{
												window.location = "index.php?mod=rooms";
											}
										);				
									}
							},
			            	{
			            		text: "Abbrechen",
			            		name: "btnNo",
			                	click: function () { $(this).dialog("close"); }
							}
			        ],
			        modal: true,
			        overlay: 
			        {
			            opacity: 0.5,
			            background: "black"
			        }
			    });
			});
	});
</script>
	
<?php	
		// check yes button
		if(isset($_POST['btnYes']))
		{
			// delete room
			$controller->deleteRoom();	
		}
?>


<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php?mod=addDevice<?php echo '&menu=' . GET('menu');?>">Ger&auml;t hinzuf&uuml;gen</a>		
		<a class="right destructiveButton" href="javascript:void(0);" id="btnDeleteRoom">Raum l&ouml;schen</a>
		<a class="right" href="index.php?mod=change_room&roomId=<?php echo GET('roomId'); echo '&menu=' . GET('menu');?>">Raum bearbeiten</a>				
		<div class="clearfix"></div>
	</div>
	
	<h2>Computer</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'device', null, 1); ?>">PC001</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 2); ?>">PC002</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 3); ?>">PC003</a></li>
	</ul>
	<h2>Drucker</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'device', null, 4); ?>">HP MP105</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 5); ?>">Canon i350</a></li>
	</ul>
	<h2>Router</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(null, 'device', null, 6); ?>">DLINK 1</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 7); ?>">DLINK 2</a></li>
		<li><a href="index.php<?php echo navParams(null, 'device', null, 8); ?>">FritzBox!</a></li>
	</ul>
</div>
