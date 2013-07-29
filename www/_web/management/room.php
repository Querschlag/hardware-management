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

<script language="JavaScript" type="text/javascript">
	$(function() { $('#dialog').hide(); } );

	$(function() {
		$('.btnDeleteRoom').on('click', function()
			{
			    $("#dialog").dialog({
			        autoOpen: true,
			        minWidth: 430,
			        width: 430,
			        buttons: 
			        [
			            	{
			            		text: unescape("Raum & Ger%E4te l%F6schen"),
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
												var url = "index.php?menu=" + $.get("menu") + "&mod=rooms";
												window.location = url;
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
		
		<?php
			
			require_once('php/actionbar.php');
			
			/**
			* RoomsActionBarController class
			*
			* Controller displaying actionbar buttons for rooms
			*
			* @category 
			* @package
			* @author Adrian Geuss <adriangeuss@gmail.com>
			* @copyright 2013 IFA11B2 IT-Team2
			*/
			
			class RoomsActionBarController extends ActionBarController
			{
		
				/**
				 *  function action button for adding a room 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonAddRoom() {}
				
				/**
				 *  function action button for user management 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonUserManagement() {}
				
				/**
				 *  function action button for supplier
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonSupplier() {}
				
				/**
				 *  function action button for adding a device
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonAddDevice() 
				{
					echo '<a class="left" href="index.php' . navParams(array('mod' => 'addDevice')) .'">Ger&auml;t hinzuf&uuml;gen</a>';
				}
				
				/**
				 *  function action button for editing a room 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonEditRoom()
				{
					echo '<a class="right" href="index.php' . navParams(array('mod' => 'modifyRoom')) .'">Raum bearbeiten</a>';
				}
				
				/**
				 *  function action button for deleting a room 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonDeleteRoom()
				{
					echo '<a class="right destructiveButton btnDeleteRoom" href="javascript:void(0);">Raum l&ouml;schen</a>';
				}
				
				/**
				 *  function action button for adding a component 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonAddComponent() {}
				
				/**
				 *  function action button for fixing a problem 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonFixProblem() {}
				
				/**
				 *  function action button for reporting problem 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonReportProblem() {}
				
				/**
				 *  function action button for scraping a device 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonScrapDevice() {}
				
				/**
				 *  function action button for scraping a component
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonScrapComponent() {}
			}
			
			$actionbar = new RoomsActionBarController( array('menu' => menuItem(), 'mod' => GET('mod')) );
			$actionbar->displayActionBar();
		?>
							
		<div class="clearfix"></div>
	</div>
	
	<h2>Computer</h2>
	<ul class="rooms">
		<li <?php $requiresMaintenance = true; if ((menuItem() == 'maintenance' || menuItem() == 'scrap') && $requiresMaintenance) print 'class="hardwareProblem"'; ?>><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 1)); ?>">PC001</a></li>
		<li><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 2)); ?>">PC002</a></li>
		<li><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 3)); ?>">PC003</a></li>
	</ul>
	<h2>Drucker</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 4)); ?>">HP MP105</a></li>
		<li <?php $requiresMaintenance = true; if ((menuItem() == 'maintenance' || menuItem() == 'scrap') && $requiresMaintenance) print 'class="hardwareProblem"'; ?>><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 5)); ?>">Canon i350</a></li>
	</ul>
	<h2>Router</h2>
	<ul class="rooms">
		<li><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 6)); ?>">DLINK 1</a></li>
		<li <?php $requiresMaintenance = true; if ((menuItem() == 'maintenance' || menuItem() == 'scrap') && $requiresMaintenance) print 'class="hardwareProblem"'; ?>><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 7)); ?>">DLINK 2</a></li>
		<li><a href="index.php<?php echo navParams(array('mod' => 'device', 'device' => 8)); ?>">FritzBox!</a></li>
	</ul>
</div>
