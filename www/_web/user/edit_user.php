<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=user">Benutzer</a></li>
		<li>>> <a href="index.php?mod=createUser">Benutzer anlegen</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="right destructiveButton" id="btnDeleteUser" href="javascript:void(0);">Benutzer l&ouml;schen</a>
		<div class="clearfix"></div>
	</div>
	<h2>Otto (Systembetreuer)</h2>
	<form action="index.php?mod=user" method="post">
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
		<input onClick="location.href = 'index.php?mod=user'"; type="button" value="Abbrechen" />
		
		<div id="dialog" title="Benutzer l&ouml;schen?">
	<p>Sind Sie sicher, dass Sie den Benutzer "<?php print $view->getRoomNumber(); ?>" l&ouml;schen wollen?</p>
</div>


	<script>
		$(function() { $('#dialog').hide(); } );
	
		$(function() {
			$('#btnDeleteUser').on('click', function()
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
													window.location = "index.php?mod=user";
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
				$controller->deleteUser();	
			}
	?>
		
	</form>
</div>