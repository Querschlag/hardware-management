<?php
	// include user controller
	if(file_exists('../interface/IUserController.php')) require_once('../interface/IUserController.php');
	if(file_exists('../_php/interface/IUserController.php')) require_once('../_php/interface/IUserController.php');
	
	// include user entity
	if(file_exists('../entity/UserEntity.php')) require_once('../entity/UserEntity.php');
	if(file_exists('../_php/entity/UserEntity.php')) require_once('../_php/entity/UserEntity.php');

	/**
	* Controller for Users
	*
	* Controller for Insert, Update and Delete Users
	*
	* @category 
	* @package
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class UserController implements IUserController
	{
		/**
		 *  storage for the view
		 */
		private $_view;

		/**
		 *  storage for the database
		 */		
		private $_database;
		
		/**
		 *  paramized constructor
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function __construct($view, $database)
		{
			// store view
			$this->_view = $view;
			
			// store database
			$this->_database = $database;
		}
		
		/** 
		 *  function to generate password
		 */
		private function generatePassword()
		{
			// the allowed characters
			$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!`\"§$%&/()=?;:";
			
			// while password contains password police
			do
			{
				// password string
				$password = '';
				
				// for a length of 8 characters
				for($length = 8; $length >= 0; $length--)
				{
					// get next random character
					$character = rand(0, strlen($characters));
					
					// add character to password
					$password = $password + $character;
				}			
				
				// check password police
				$passwordPolice =  	empty($password1) == FALSE && 
									empty($password2) == FALSE && 
									$password1 == $password2 &&
									strlen($password1) >= 6 &&
									preg_match("/[a-z]/", $password1) && 
									preg_match("/[A-Z]/", $password1) &&
									preg_match("/[0-9]/", $password1);

			} while($passwordPolice == FALSE);
		
		    // return the password
			return $password;
		}
		
		/**
		 *  function to log in user
		 * 
		 *  @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function logIn()
		{			
			// get user name (user email)
			$username = $this->_view->getUserName();
			
			// get password
			$password = $this->_view->getPassword();
						
			// get user with username from db
			$user = $this->_database->getUserByUsername($username);
			
			// check user
			if(isset($user))
			{
				// check user password
				$result = $this->_database->checkUserPw($user->userId, $password);
						
				// check password
				if($result == FALSE)
				{
					// set password error
					$this->_view->setPasswordError();
				}
				else 
				{
					// display user on ui
					$this->_view->displayUser(	$user->userId, 
												$user->userGroupId, 
												$user->userName, 
												$user->userFirstName,
												$user->userLastName,
												$user->userEmail);
				}
			}
			else 
			{
				// set user not exist error
				$this->_view->setNotExistError();	
			}
		}				
		
		/**
		 *  function to get users
		 */
		public function getUsers()
		{
			// get all users from database
			$users = $this->_database->getUsers();
			
			// iteration over all users
			foreach($users as $user)
			{
				// display user on ui
				$this->_view->displayUser(	$user->userId, 
											$user->userGroupId, 
											$user->userName, 
											$user->userFirstName,
											$user->userLastName,
											$user->userEmail);
			}
		}
		
		/** 
		 *  function to get user
		 */
		public function getUser()
		{
			// get user id
			$userId = $this->_view->getUserId();
			
			// get all users from database
			$user = $this->_database->getUserById($userId);
		
			// check user id
			if(isset($user))
			{
				// display user on ui
				$this->_view->displayUser(	$user->userId, 
											$user->userGroupId, 
											$user->userName, 
											$user->userFirstName,
											$user->userLastName,
											$user->userEmail);
			}
		}
		
		/**
		 *  function called after user lost password to reset password
		 * 
		 *  @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function lostPassword()
		{
			// get user name (user email)
			$email = $this->_view->getEmail();
			
			// get user with username from db
			$user = $this->_database->getUserByEmail($email);
			
			// check for null
			if(isset($user))
			{
				// get lost password message
				$message = sprintf($this->_view->getMessage(), $username, $this->generatePassword());
				
				// get email subject
				$subject = $this->_view->getSubject();
				
				// send mail
				if(mail($username, $subject, $message) == FALSE)
				{
					// set error information
					$this->_view->setEmailNotSend();
				}	
				else 
				{
					// set success information
					$this->_view->setSuccess();	
				}
			}
		}
		
		/**
		 *  function to invite a new user
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function inviteUser()
		{
			// get user name (user email)
			$email = $this->_view->getEmail();

			// get user name (user email)
			$username = $this->_view->getUserName();
			
			// get user first name
			$firstName = $this->_view->getFirstName();
			
			// get user last name
			$lastName = $this->_view->getLastName();
			
			// get user group id
			$groupId = $this->_view->getGroupId();
			
			// get user with username from db
			$userUserName = $this->_database->getUserByUsername($username);
			
			// get user with email from db
			$userEmail = $this->_database->getUserByEmail($email);
			
			// check if user already exist
			if(	isset($userUserName) == FALSE && isset($userEmail) == FALSE &&
				empty($firstName) == FALSE && empty($lastName) && 
			   	empty($firstName) == FALSE && empty($lastName) == FALSE &&
			   	isset($groupId))
			{
				// create password
				$password = $this->generatePassword();
				
				// get lost password message
				$message = sprintf($this->_view->getMessage(), $username, $password);
					
				// get email subject
				$subject = $this->_view->getSubject();
					
				// send mail
				if(mail($username, $subject, $message) == TRUE)
				{
					// create new user
					$result = $this->_database->insertUser(	$username, 
															$groupId, 
															$firstName, 
															$lastName, 
															$password,
															$email );
					
					// check result
					if($result == FALSE)
					{
						// set error information
						$this->_view->setError();
					}
				}	
				else 
				{				
					// set error information
					$this->_view->setEmailNotSend();							
				}
			}
			else
			{
				// set user exist error
				$this->_view->setExistError();
			}
		}

		/**
		 *  function to update password
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function updateUser()
		{
			// get user id
			$userId = $this->_view->getUserId();
			
			// get user
			$user = $this->_database->getUserById($userId);
			
			// check if person exist
			if(isset($user) == TRUE)
			{
				// get username 
				$username = $this->_view->getUserName();
				
				// get first name
				$firstName = $this->_view->getFirstName();
				
				// get last name
				$lastName = $this->_view->getLastName();
				
				// get email
				$email = $this->_view->getEmail();
				
				// get group id
				$groupId = $this->_view->getGroupId();
				
				// get password 
				$password1 = $this->_view->getPassword();
			
				// get confirm password
				$password2 = $this->_view->getPassword2();
				
				// check entered data
			   if(	empty($username) == FALSE && empty($email) == FALSE && 
			   		empty($firstName) == FALSE && empty($lastName) == FALSE &&
					isset($groupId))
				{
					// check password
					if(	empty($password1) == FALSE && 
						empty($password2) == FALSE && 
						$password1 == $password2 &&
						strlen($password1) >= 6 &&
						preg_match("/[a-z]/", $password1) && 
						preg_match("/[A-Z]/", $password1) &&
						preg_match("/[0-9]/", $password1))
					{
						// update password
						$result = $this->_database->updateUserPassword($userId, $password1);
						
						// check result
						if($result == FALSE)
						{
							// set error information
							$this->_view->setError();
						}
					}
				}
			}
			else
			{
				// set user not exist error
				$this->_view->setNotExistError();							
			}
		}
		
		/**
		 *  function to delete user
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function deleteUser()
		{
			// get user id
			$userId = $this->_view->getUserId();
			
			// get user
			$user = $this->_database->getUserById($userId);
			
			// check if person exist
			if(isset($user) == TRUE)
			{
				// delete user
				$result = $this->_database->deleteUser($userId);
					
				// check result
				if($result == FALSE)
				{
					// set error information
					$this->_view->setError();
				}
			}
			else
			{
				// set user not exist error
				$this->_view->setNotExistError();							
			}
		}
	}
?>