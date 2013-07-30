<?php namespace Template; ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(); ?>">Problem melden</a></li>
	</ul>
</div>
<div id="module">
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

	
	<h3>Problem Melden</h3>
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
	<form action="index.php<?php echo navParams(array('mod' => 'device')); ?>" method="post">
		<p>Datum</p><input name="Datum" type="text"/>
		<p>Notiz</p><textarea name="description" rows=6 cols=30></textarea>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="Melden" />
		<input onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'device')); ?>'" type="button" value="Abbrechen" />
	</form>
</div>