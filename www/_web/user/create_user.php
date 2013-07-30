<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'user'), false) ?>">Benutzer</a></li>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'createUser'), false) ?>">Benutzer anlegen</a></li>
	</ul>
</div>
<div id="module">
	
	
	
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
				}
				
				/**
				 *  function to display user group
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayGroup($id, $name, $permisson)
				{
					// check usergroup post back
					if(isset($_POST['usergroup']) && $_POST['usergroup'] == $id)
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
					// return username
					return strtolower($_POST['firstName']) . '.' . strtolower($_POST['lastName']);
				}
				
				/**
				 *  function to get password
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getPassword()
				{
				}
				
				/**
				 *  function to set password error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setPasswordError() 
				{					
				}
		
				/**
				 *  function to set user don't exist error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setNotExistError() 
				{					
				}
				
				/**
				 *  function to get user id
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getUserId() 
				{
				}
				
				/**
				 *  function to get email adress
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getEmail() 
				{
					// get email
					return $_POST['email'];
				}
				
				/**
				 *  function to get subject of mail
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getSubject() 
				{
					// return subject text
					return 'IT Hardware Verwaltung - Neues Konto';
				}
		
				/**
				 *  function to set email not send error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setEmailNotSend() 
				{
					// print email error
					print '<b><p><span class="require">Die Email konnte nicht gesendet werden. 
							Bitte versuchen Sie es später nocheinmal.</span></p></b>';	
				}
		
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
					// return group id
					return $_POST['usergroup'];
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
		 		public function setExistError() 
		 		{
		 			// set error text
		 			print '<b><p><span class="require">Der Benutzername oder die 
		 					Email Adress wird bereits verwendet.</span></p></b>';
		 		}
		
		 		/**
				 *  function to get confirm password
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
		 		public function getPassword2() { }
				
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
				 *  function to get message
				 * 
				 *  @author Johannes Alt <altjohannes510@gmx.net>
				 */
				public function getMessage()
				{
					// return message
					return 'IT Verwaltung B3-Fürth. \r\n\r\n'
						  .'Ein Konto wurde für Sie erstellt. Ihre Login daten sind: \r\n'
						  .'Benutzername: %s\r\n'
						  .'Passwort: %s';
				}
			}

		// create view
		$view = new User();
		
		// create database
		$database = new Database();
		
		// create controller
		$controller = new UserController($view, $database); 
	?>

	<h2>Benutzer anlegen</h2>
	<form method="post">
		<p>Vorname</p><input name="firstName" type="text" value="<?php if(isset($_POST['firstName'])) print $_POST['firstName']; ?>"/>&nbsp;<span class="require">*</span>
		<p>Nachname</p><input name="lastName" type="text" value="<?php if(isset($_POST['lastName'])) print $_POST['lastName']; ?>"/>&nbsp;<span class="require">*</span>
		<p>Email</p><input name="email" type="email" value="<?php if(isset($_POST['email'])) print $_POST['email']; ?>"/>&nbsp;<span class="require">*</span>
		
		<p>Gruppe</p>
		<select name="usergroup">
			<optgroup label="W&auml;hle eine Gruppe"></optgroup>
				<?php $controller->selectUserGroups(); ?>
		</select>
		<?php
			// check button
			if(isset($_POST['btnSubmit']))
			{
				// invite user into application
				$controller->inviteUser();
				
				// check error count
				if($controller->getErrorCount() == 0)
				{
					// print javascript redirect
					print '<script>$(function() { window.location = "index.php' . navParams(array('mod' => 'user')) .'"; })</script>';
				}
			}
		?>
		
		<p class="require">* Pflichtfeld</p>
		
		<input name="btnSubmit" type="submit" value="Anlegen" />
		<input  type="button" value="Abbrechen" onClick="location.href = 'index.php<?php echo navParams(array('mod' => 'user'), false) ?>'" />
	</form>
</div>