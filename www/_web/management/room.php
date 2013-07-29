<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			require_once('php/additions.php');

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
	
	<?php
		
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
		class Device implements IComponent
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
			 *  function to display components
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com> 
			 */
			public function displayComponents($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type, $isDevice) {}
							
			/**
			 *  function to display device
			 * 
			 * @author Adrian Geuss <adriangeuss@gmail.com>
			 */
			public function displayDevice($id, $roomId, $name, $note, $deviceHasProblems = false)
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
				print '<li ';
				if ((menuItem() == 'maintenance' || menuItem() == 'scrap') && $deviceHasProblems) print 'class="hardwareProblem"';
				print '><a href="index.php' . navParams(array('mod' => 'device', 'room' => $roomId, 'device' => $id)) . '">' . $name . '</a></li>';

				// increase row count
				$this->_rowCount++;
			}
		
			/**
			 *  function to display floor
			 * 
			 * @author Adrian Geuss <adriangeuss@gmail.com>
			 */
			public function displayDeviceType($deviceTypeName)
			{
				// print end list
				print '</ul>';
				
				// print floor name
				print '<h2>' . $deviceTypeName . '</h2>';
				
				// print start list
				print '<ul class="rooms">';
				
				// reset row count
				$this->_rowCount = 0;
			}

			/** 
	 		*  function to display problem count
	 		* 
	 		* @author Adrian Geuss <adriangeuss@gmail.com>
	 		*/
			public function displayProblemCount($count) 
			{
				if (menuItem() == 'maintenance' || menuItem() == 'scrap')
					print '<b><span class="problems"><p>Probleme: ' . $count . '</p></span></b>';
			}
			
			/**
			 *  function to display room end
			 * 
			 *  @author Adrian Geuss <adriangeuss@gmail.com>
			 */
			public function displayDeviceTypeEnd()
			{
				// print end list
				print '</ul>';
				
				// reset row count
				$this->_rowCount = 0;
			}

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
			public function getComponentName(){}
				
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
		$view = new Device($_POST);
		
		// create database
		$database = new Database();
		
		// create controller object
		$controller = new ComponentController($view, $database);	
			
		// select room to change
		$controller->selectDevicesForRoomId(GET('room'));		
		
	?>
	
	<!---
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
	-->
</div>
