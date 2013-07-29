<?php require_once('php/navigation.php'); ?>
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
				protected function displayActionButtonScrapComponent()
				{
					echo '<a class="right destructiveButton" href="index.php' . navParams(array('mod' => 'device')) .'">Ausmustern</a>';
				}
			}
			
			$actionbar = new RoomsActionBarController( array('menu' => menuItem(), 'mod' => GET('mod')) );
			$actionbar->displayActionBar();
		?>
		
		<div class="clearfix"></div>
	</div>
	<h2>Eigenschaften</h2>
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<form action="index.php<?php echo navParams(array('mod' => 'device')); ?>" method="post">
		<p>Attribut 1</p><input name="attribut1" type="text" disabled=""/>
		<p>Attribut 2</p><input name="attribut1" type="text" disabled=""/>
		<p>Attribut 3</p><input name="attribut1" type="text" disabled=""/>
		<p><input onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'device', 'room' => GET('room'), 'device' => GET('device')), false); ?>'" type="button" value="Zur&uuml;ck" /></p>
	</form>

</div>