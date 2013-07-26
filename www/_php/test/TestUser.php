<html>
	<head>
		<title>Test User</title>
	</head>
	<body>
		<?php
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
			class MockUser implements IUser
			{
				/**
				 *  storage for the id 
				 */
				private $_id;
				
				/**
				 *  storage for the username
				 */
				private $_userName;
				
				/**
				 *  storage for the first name
				 */
				private $_firstName;
				
				/**
				 *  storage for the last name
				 */
				private $_lastName;

				/**
				 *  storage for the email
				 */
				private $_email;

				/**
				 *  storage for the group id
				 */
				private $_groupId;
				
				/**
				 *  storage for the password
				 */
				private $_password;
				
				/**
				 *  storage for the confirm password
				 */
				private $_password2;
				
				/**
				 * paramized constructor
				 */
				public function __construct($id,
											$username, 
											$firstName, 
											$lastName, 
											$email, 
											$groupId, 
											$password, 
											$password2)
				{
					$this->_id = $id;
					
					// store username
					$this->_userName = $username;
					
					// store first name
					$this->_firstName = $firstName;
					
					// store last name
					$this->_lastName = $lastName;
					
					// store email
					$this->_email = $email;
					
					// store group id
					$this->_groupId = $groupId;
					
					// store password
					$this->_password = $password;
					
					// store password 2
					$this->_password2 = $password2;
				}
				
				/**
				 *  function to get user name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getUserName() 
				{
					// return username
					return $this->_userName;
				}
				
				/**
				 *  function to get password
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getPassword() 
				{
					// return password
					return $this->_password;
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
					// return user id
					return $this->_id;
				}
				
				/**
				 *  function to get email adress
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getEmail() 
				{
					// return email
					return $this->_email;
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
					return $this->_firstName;
				}
		
				/**
				 *  function to get last name
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getLastName() 
				{
					// return last name
					return $this->_lastName;
				}
		
				/**
				 *  function to get group id
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com>
				 */
				public function getGroupId() 
				{
					// return group id
					return $this->_groupId;
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
		 		public function getPassword2() 
		 		{
		 			// return password
		 			return $this->_password2;
		 		}
			}
		?>
		
		<b>Select User Test</b>
		<?php ?>		
		<br/>
		
		<b>Insert User Test (Username = '', Firstname = 'Max', Lastname = 'Mustermann',
							 Email = 'max.mustermann@mail.com', Group = 0)</b>
		<?php ?>
		<br/>
		
		<b>Insert User Test (Username = 'max.muster', Firstname = '', Lastname = 'Mustermann',
							 Email = 'max.mustermann@mail.com', Group = 0)</b>
		<?php ?>
		<br/>
		
		<b>Insert User Test (Username = 'max.muster', Firstname = 'Max', Lastname = '',
							 Email = 'max.mustermann@mail.com', Group = 0)</b>
		<?php ?>
		<br/>
		
		<b>Insert User Test (Username = 'max.muster', Firstname = 'Max', Lastname = 'Mustermann',
							 Email = '', Group = 0)</b>
		<?php ?>
		<br/>
		
		<b>Insert User Test (Username = 'max.muster', Firstname = 'Max', Lastname = 'Mustermann',
							 Email = 'max.mustermann@mail.com', Group = NULL)</b>
		<?php 
			// create view
			$view = new MockUser();
			
			// create database
			$database = new MockDatabase();
			
			// create controller
			$controller = new UserController($view, $database);
		?>
		<br/>
	</body>
</html>