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
		<?php			
			if(isset($_GET['user']) && isset($_SESSION['uid']) && $_GET['user'] != $_SESSION['uid'])
			{
				// print user delete link
				echo '<a class="right destructiveButton" id="btnDeleteUser" href="javascript:void(0);">Benutzer l&ouml;schen</a>';
			}		
		?>		
		<div class="clearfix"></div>
	</div>
		<form method="post">
			
		<?php
			// include user controller
			require_once('../_php/core/UserController.php');
			
			// include database
			require_once('../_php/database/Database.php');
			
			// include user interface
			require_once('../_php/interface/IUser.php');
		
			/**
			 * Class for User
			 *
			 * Class for Insert, Update and Delete User
			 *
			 * @category 
			 * @package
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 * @copyright 2013 B3ProjectGroup2
			 */
			class User implements IUser
			{
				/**
				 *  function to display user
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayUser($id, $groupId, $name, $firstName, $lastName, $email) 
				{
					// store user data
					$_POST['usergroup'] = $groupId;
					
					// store name
					$_POST['name'] = $name;
					
					// store first name
					$_POST['firstName'] = $firstName;
					
					// store name
					$_POST['lastName'] = $lastName;
					
					// store email
					$_POST['email'] = $email;
				}
				
				/**
				 *  function to display user group
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayGroup($id, $name, $permisson)
				{
					// check group id
					if(isset($_POST['usergroup'])&& $id == $_POST['usergroup'])
					{
						// print group
						print '<option value="' . $id . '" selected="selected">' . $name . '</option>';
					}
					else 
					{
						// print group
						print '<option value="' . $id . '">' . $name . '</option>';	
					}					
				}
							
				/**
				 *  function to get user name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getUserName() 
				{
					// return user name
					return $_POST['name'];
				}
				
				/**
				 *  function to get password
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getPassword() 
				{
					// password to return
					$password = NULL;
					
					// check post value
					if(isset($_POST['password1']))
					{
						// set password 1
		 				$password = $_POST['password1'];
					}
					
					// return password
					return $password;
				}
				
				/**
				 *  function to set password error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setPasswordError() 
				{
					// print unknown error message
					print '<b><p><span class="require">Das Passwort entspricht nicht den Anforderungen.</span></p></b>';
				}
		
				/**
				 *  function to set user don't exist error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setNotExistError() 
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
				 *  function to get user id
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getUserId() 
				{
					// uniquei user id
					$uid;
					
					// check get id
					if(isset($_GET['user']))
					{
						// return user id
						$uid = $_GET['user']; 
					}
					else if(isset($_SESSION['uid']))
					{
						// return user id
						$uid = $_SESSION['uid'];
					}
					
					// return uniquei user id
					return $uid;
				}
				
				/**
				 *  function to get email adress
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getEmail() 
				{
					// return email
					return $_POST['email'];
				}
				
				/**
				 *  function to get subject of mail
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getSubject() {}
		
				/**
				 *  function to set email not send error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setEmailNotSend() {}
		
				/**
				 *  function to get first name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getFirstName() 
				{
					// return first name
					return $_POST['firstName'];
				}
		
				/**
				 *  function to get last name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getLastName() 
				{
					// return last name
					return $_POST['lastName'];
				}
		
				/**
				 *  function to get group id
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getGroupId()
				{
					// user group to return
					$usergroup = NULL;
					
					// check post
					if(isset($_POST['usergroup']))
					{
						// set usergroup
						$usergroup = $_POST['usergroup'];
					}
					
					// return user group id
					return $usergroup;
				}
				
				/**
				 *  function to set error
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
				 *  function to set user exist error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
		 		public function setExistError() {}
		
		 		/**
				 *  function to get confirm password
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
		 		public function getPassword2() 
		 		{
					// password to return
					$password = NULL;
					
					// check post value
					if(isset($_POST['password2']))
					{
						// set password 1
		 				$password = $_POST['password2'];
					}
					
					// return password
					return $password;
		 		}
				
				/**
				 *  function to get message
				 * 
				 *  @author Johannes Alt <altjohannes510@gmx.net>
				 */
				public function getMessage() {}
			}
	
			// create view
			$view = new User();
			
			// create database
			$database = new Database();
			
			// create controller
			$controller = new UserController($view, $database); 
			
			// check posts
			if( isset($_POST['name'])== FALSE	&&
				isset($_POST['firstName']) == FALSE 	&&
				isset($_POST['lastName']) == FALSE	&&
				isset($_POST['email'])== FALSE	&&
			 	isset($_POST['usergroup']) == FALSE)
				{							
					// get user
					$controller->getUser();
				}
		?>	

	<h2>
		<?php if(isset($_POST['firstName'])) print $_POST['firstName']; ?>&nbsp;<?php if(isset($_POST['lastName'])) print $_POST['lastName']; ?> 
	</h2>
		<p>Benutzername</p><input name="name" type="text" value="<?php if(isset($_POST['name'])) print $_POST['name']; ?>"/>
		<p>Vorname</p><input name="firstName" type="text" value="<?php if(isset($_POST['firstName'])) print $_POST['firstName']; ?>"/>
		<p>Nachname</p><input name="lastName" type="text" value="<?php if(isset($_POST['lastName'])) print $_POST['lastName']; ?>"/>
		<p>Email</p><input name="email" type="email" value="<?php if(isset($_POST['email'])) print $_POST['email']; ?>"/>
		<?php if(isset($_GET['user']) && isset($_SESSION['uid']) && $_GET['user'] == $_SESSION['uid']): ?>
			<p>Passwort</p><input name="password1" type="password" title="Das Passwort muss min. 6 Zeichen lang sein und muss Groß- und Kleinbuchstaben sowie Zahlen beinhalten."/>
			<p>Passwort bestätigen</p><input name="password2" type="password"/>
		<?php endif; ?>
		
		<?php if(isset($_GET['user']) && isset($_SESSION['uid']) && $_GET['user'] != $_SESSION['uid']): ?>
			<p>Gruppe</p>
			<select name="usergroup">
				<optgroup label="W&auml;hle eine Gruppe"></optgroup>
				<?php $controller->selectUserGroups(); ?>
			</select>
		<?php endif; ?>
		
				<div id="dialog" title="Benutzer l&ouml;schen?">
			<p>Sind Sie sicher, dass Sie den Benutzer "<?php if(isset($_POST['firstName'])) print $_POST['firstName']; ?>&nbsp;<?php if(isset($_POST['lastName'])) print $_POST['lastName']; ?>" l&ouml;schen wollen?</p>
		</div>

	<script>
		$(function() { $('#dialog').hide(); } );
	
		$(function() { $(document).tooltip(); })
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
														success: function(result)
																{
																	window.location = "index.php?menu=" + $.get("menu") + "&mod=user";
																}	
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
			if(isset($_POST['btnSubmit']))
			{
				// udpate user
				$controller->updateUser();
				
				// check error count
				if($controller->getErrorCount() == 0)
				{
					// print javascript redirect
					print '<script>$(function() { window.location = "index.php' . navParams(array('mod' => 'user')) .'"; })</script>';
				}
			}
	?>
	<br/>
	<br/>
	<input name="btnSubmit" type="submit" value="&Uuml;bernehmen" />
	<input onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'user'), false) ?>'" type="button" value="Abbrechen" />
		
	</form>
	
	<?php	
		// check yes button
		if(isset($_POST['btnYes']))
		{
			// delete user
			$controller->deleteUser();	
		}
	?>
</div>