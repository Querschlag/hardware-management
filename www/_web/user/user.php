<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'user'), false) ?>">Benutzer</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php<?php echo navParams(array('mod' => 'createUser'), false) ?>">Neuer Benutzer</a>
		<div class="clearfix"></div>
	</div>
	<h2>Benutzer</h2>
	
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
				 *  storage for the user index
				 */
				 private $_index = 0;
				
				/**
				 *  function to display user
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayUser($id, $groupId, $name, $firstName, $lastName, $email) 
				{
					// color for table
					$color = '#ddd';
					
					// check index
					if(($this->_index % 2) == 0)
					{
						// change color
						$color = '#eee';
					}
					
					// print link
					print '<li style="background-color: ' . $color . '"><a href="index.php ' . navParams(array('mod' => 'editUser', 'user' => $id)) . '">' . $firstName . ' ' . $lastName . ' ';
					
					// increase index
					$this->_index++;
				}
				
				/**
				 *  function to display user group
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function displayGroup($id, $name, $permisson)
				{
					// print link group and end
					print '(' . $name . ')</a></li>';			
				}
							
				/**
				 *  function to get user name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getUserName() {}
				
				/**
				 *  function to get password
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getPassword() {}
				
				/**
				 *  function to set password error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setPasswordError() {}
		
				/**
				 *  function to set user don't exist error
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function setNotExistError() {}
				
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
		?>
	
	<ul class="orders">
		<?php
			// get user
			$controller->getUsers();
		?>
	</ul>
</div>