<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'user'), false) ?>">Benutzer</a></li>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'editUser')) ?>">Benutzer bearbeiten</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="right destructiveButton" href="javascript:void(0)">Benutzer l&ouml;schen</a>
		<div class="clearfix"></div>
	</div>
	<h2>Otto (Systembetreuer)</h2>
	<!--
		//TODO
		
		When providing this form with functionality, please modify the 'mod' parameter to point to the current
		module (see /php/navigation.php for more details), so you can make use of the auto appended id of
		user,room,device,component,supplier and so on.
		
		After doing your update and validation stuff use this:
		
			header( "Location: index.php" . echo navParams(array('mod' => '<upperModule>')) );
		
		to redirect to the page where you came or started the wizard from.
	-->
	<form action="index.php<?php echo navParams(array('mod' => 'user'), false) ?>" method="post">
		<select name="usergroup">
			<optgroup label="W&auml;hle eine Gruppe"></optgroup>
				<option value="0">Systembetreuer</option>
				<option value="1">Azubi</option>
				<option value="2">Lehrer</option>
				<option value="3">Verwaltung</option>
		</select>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="&Uuml;bernehmen" />
		<input onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'user'), false) ?>'"; type="button" value="Abbrechen" />
	</form>
	
		<div id="dialog" title="Benutzer l&ouml;schen?">
	<p>Sind Sie sicher, dass Sie den Benutzer "<?php print $view->getRoomNumber(); ?>" l&ouml;schen wollen?</p>
</div>

	<script>
		$(function() { $('#dialog').hide(); } );
	
		$(function() {
			$('#btnDeleteRoom').on('click', function()
				{
				    $("#dialog").dialog({
				        autoOpen: true,
				        minWidth: 400,
				        width: 400,
				        buttons: 
				        [
				            	{
				            		text: "Benutzer löschen",
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
	
</div>