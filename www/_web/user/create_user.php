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
					// print group
					print '<option value="' . $id . '">' . $name . '</option>';
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
					return 'IT Hardware Verwaltung';
				}
		
				/**
				 *  function to set email not send error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setEmailNotSend() {}
		
				/**
				 *  function to set success information
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setSuccess() {}
		
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
		 		public function setError() {}				
		
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
		 		public function getPassword2() { }
				
				/**
				 *  function to get message
				 * 
				 *  @author Johannes Alt <altjohannes510@gmx.net>
				 */
				public function getMessage()
				{
					// return message
					return nl2br('IT Verwaltung B3-Fürth. \r\n\r\n'
						  		.'Ein Konto wurde für Sie erstellt. Ihre Login daten sind: \r\n'
						  		.'Benutzername: %s\r\n'
						  		.'Passwort: %s');
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
		<p>Vorname</p><input name="firstName" type="text" value="<?php if(isset($_POST['firstName'])) print $_POST['firstName']; ?>"/>
		<p>Nachname</p><input name="lastName" type="text" value="<?php if(isset($_POST['lastName'])) print $_POST['lastName']; ?>"/>
		<p>Email</p><input name="email" type="email" value="<?php if(isset($_POST['email'])) print $_POST['email']; ?>"/>
		<p>Gruppe</p>
		<select name="usergroup">
			<optgroup label="W&auml;hle eine Gruppe"></optgroup>
				<?php $controller->selectUserGroups(); ?>
		</select>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="Anlegen" />
		<input  type="button" value="Abbrechen" onClick="location.href = 'index.php?mod=user'" />
		
		<?php
			// check button
			if(isset($_POST['btnSubmit']))
			{
				// invite user into application
				$controller->inviteUser();
			}
		?>
	</form>
</div>