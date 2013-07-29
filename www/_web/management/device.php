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
	<ul class="components">
		<li><a href="index.php<?php echo navParams(array('mod' => 'component', 'component' => 1)); ?>">Komponente 1</a></li>
		<li><a href="index.php<?php echo navParams(array('mod' => 'component', 'component' => 2)); ?>">Komponente 2</a></li>
		<li><a href="index.php<?php echo navParams(array('mod' => 'component', 'component' => 3)); ?>">Komponente 3</a></li>
	</ul>
	<h2>Wartungshistorie</h2>
	<ul class="support_event">
		<li style="background-color:#eee">12.07.2013 - Wartungsfall gemeldet: Geh&auml;use kaputt</li>
		<li style="background-color:#ddd">15.07.2013 - Bearbeitung durch Otto (Azubi)</li>
		<li style="background-color:#eee">15.07.2013 - Wartungsfall behoben.</li>
	</ul>
</div>