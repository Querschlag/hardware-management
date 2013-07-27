<?php
	require_once('php/additions.php');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IT Verwaltung - B3 F&uuml;rth</title>
        <meta name="description" content="Tool for tracking hardware devices and components in an educational environment.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/ico" href="favicon.ico">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/content.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

		<div id="header">
			<div id="top_nav">
	        	<h1><a href="./login.php">IT Verwaltung - B3 F&uuml;rth</a></h1>
	        </div>
		</div>
		<div id="content">
			<div id="module">
				<div id="login">
					<div id="information">
						<h2>Anmeldung</h2>
					</div>
					<form action="login.php" method="post">
						<p>Benutzername</p><input name="username" type="text" value="<?php if(isset($_POST['username'])) print $_POST['username'];  ?>"></input>
						<p>Passwort</p><input name="password" type="password" />
						<p><a href="passwordReset.php">Passwort vergessen?</a> </p>
						<p><input name="btnLogin" type="submit" value="Anmelden"/></p>
						
						<?php
				// include IUser
				require_once('../_php/interface/IUser.php');
				
				// include user controller
				require_once('../_php/core/UserController.php');
				
				// include database
				require_once('../_php/database/Database.php');
			
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
						echo 'here';
						session_start();
						$_SESSION['userPermission'] = 1;
						$_SESSION['username'] = $username;
						
						header( "Location: index.php" );
					}
			
					/**
					 *  function to display user group
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function displayGroup($id, $name, $permisson)
					{
					}
					
					/**
					 *  function to get user name
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function getUserName() 
					{
						// return user name
						return $_POST['username'];	
					}
					
					/**
					 *  function to get password
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function getPassword() 
					{
						// return password
						return $_POST['password'];
					}
					
					/**
					 *  function to set password error
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function setPasswordError() 
					{
						// set error text
						print '<b><p><span class="require">Falscher Benutzername oder Passwort.</span></p></b>';
					}
			
					/**
					 *  function to set user don't exist error
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function setNotExistError() 
					{
						// set error text
						print '<b><p><span class="require">Falscher Benutzername oder Passwort.</span></p></b>';
					}
					
					/**
					 *  function to get user id
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function getUserId() {}
					
					/**
					 *  function to get email adress
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function getEmail() {}
					
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
					public function getFirstName() {}
			
					/**
					 *  function to get last name
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function getLastName() {}
			
					/**
					 *  function to get group id
					 * 
					 * @author Johannes Alt <altjohannes510@gmail.com>
					 */
					public function getGroupId() {}
					
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
			 		public function getPassword2() {}
				}
	
				// create view object
				$view = new User();
				
				// create database
				$database = new Database();
				
				// create controller object
				$controller = new UserController($view, $database);
				
				// check button
				if(isset($_POST['btnLogin']))
				{
					// log in user
					$controller->logIn();
				}				
			?>
	
					</form>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>
				Copyright &copy; 2013 <a href="https://github.com/Querschlag/hardware-management">IFA11B2 IT-Team2</a>
			</p>
			<img class="logo" src="img/Logo_team2_int.png" alt="IFA11B2 - IT-Team2 Logo" />
		</div>
    </body>
</html>