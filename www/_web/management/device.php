<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// Breadcrumb navigation
			include ('php/breadcrumb.php');
		?>
	</ul>
</div>
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
				protected function displayActionButtonAddDevice() {}
				
				/**
				 *  function action button for editing a room 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonEditRoom() {}
				
				/**
				 *  function action button for deleting a room 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonDeleteRoom() {}
				
				/**
				 *  function action button for adding a component 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonAddComponent()
				{
					echo '<a class="left" href="index.php' . navParams(array('mod' => 'addComponent')) .'">Komponente hinzuf&uuml;gen</a>';
				}
				
				/**
				 *  function action button for fixing a problem 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonFixProblem()
				{
					echo '<a class="right" href="index.php' . navParams(array('mod' => 'fixProblem')) .'">Problem beheben</a>';
				}
				
				/**
				 *  function action button for reporting problem 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonReportProblem()
				{
					echo '<a class="right" href="index.php' . navParams(array('mod' => 'reportProblem')) .'">Problem melden</a>';
				}
				
				/**
				 *  function action button for scraping a device 
				 *
				 * @author Adrian Geuss <adriangeuss@gmail.com>
				 */
				protected function displayActionButtonScrapDevice()
				{
					echo '<a class="right destructiveButton" href="index.php' . navParams(array('mod' => 'device')) .'">Ausmustern</a>';
				}
				
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
	<h2>Komponenten</h2>
	
	<?php
	
		// include IComponent
		require_once('../_php/interface/IReport.php');
		
		// include room controller
		require_once('../_php/core/ReportController.php');
		
		// include mock database
		require_once('../_php/database/Database.php');
		
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
		class Component implements IComponent
		{	
			/**
			 *  function to display components
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com> 
			 */
			public function displayComponent($id, $deliverer, $room, $name, $buy, $warranty, $note, $supplier, $type, $isDevice){}
			
			/**
			 *  function to display components
			 * 
			 * @author Adrian Geuss <adriangeuss@gmail.com> 
			 */
			public function displayComponents($components)
			{
				if(file_exists('../_php/entity/RoomEntity.php')) require_once('../_php/entity/ComponentEntity.php');
				
				print '<ul class="components">';
				
				if (sizeof($components) == 0)
				{
					print '<li>Keine Komponenten verbaut.</a></li>';
				}
				else
				{
					foreach ($components as $key => $componentEntity) {
						print '<li><a href="index.php' . navParams(array('mod' => 'component', 'component' => $componentEntity->componentId)) . '">' . $componentEntity->componentName . '</a></li>';
					}
				}
					
				print '</ul>';
			}
							
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
			 *  function to set component id
			 * 
			 * @author Thomas Michl <thomas.michl1988@gmail.com>
			 */
			public function setComponentName($device_name) {}
			
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
		$view = new Component($_POST);
		
		// create database
		$database = new Database();
		
		// create controller object
		$controller = new ComponentController($view, $database);	
			
		// select room to change
		$controller->selectComponentsForDevice(GET('device'));		
		
	?>
	<?php
		// include IComponent
		require_once('../_php/interface/IReport.php');
		
		// include room controller
		require_once('../_php/core/ReportController.php');
		
		// include mock database
		require_once('../_php/database/Database.php');
		
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
		class Report implements IReport
		{
			/**
			*  storage for the report index
			*/
			private $_index = 0;
			
			/**
			 *  function to display componet transaction
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function displayComponentTransaction($comTransactionId, $date, $comment, $type, $firstname, $lastname)
			{
				// color for table
				$color = '#ddd';
				
				// check index
				if(($this->_index % 2) == 0)
				{
					// change color
					$color = '#eee';
				}
				
				// print report
				print '<li style="background-color:' . $color . '">' . $date . ' - ' . $type . ' - ' . $comment . ' - ' . $firstname . ' ' . $lastname . '</li>';
				
				// increase index
				$this->_index++;
			}
			
			/**
			 *  function to display transactin
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function displayTransaction($id, $name)
			{				
			}
			
			/**
			 *  function to get transaction type
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getTransactionType()
			{				
			}
				
			/**
			 *  function to get component id
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getComponentId()
			{
				// return component id
				return GET('device');				
			}
			
			/**
			 *  function to get user id
			 * 
			 * @author Johannes Alt
			 */
			public function getUserId()
			{				
			}
			
			/**
			 *  function to get date
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getDate()
			{				
			}
				
			/**
			 *  function to get note
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */
			public function getNote()
			{				
			}
				
			/**
			 *  function to set error
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
		}

		// create view object
		$reportView = new Report($_POST);
		
		// create controller object
		$reportController = new ReportController($reportView, $database);			
	?>
	<!--
	<ul class="components">
		<li><a href="index.php<?php echo navParams(array('mod' => 'component', 'component' => 1)); ?>">Komponente 1</a></li>
		<li><a href="index.php<?php echo navParams(array('mod' => 'component', 'component' => 2)); ?>">Komponente 2</a></li>
		<li><a href="index.php<?php echo navParams(array('mod' => 'component', 'component' => 3)); ?>">Komponente 3</a></li>
	</ul>
	-->
	<h2>Wartungshistorie</h2>
	<ul class="support_event">
		<?php
			// select report
			$reportController->getReportByComponentId();
		?>
	</ul>
</div>