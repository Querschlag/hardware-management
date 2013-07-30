<?php
	// include user controller
	if(file_exists('../interface/IUserController.php')) require_once('../interface/IUserController.php');
	if(file_exists('../_php/interface/IUserController.php')) require_once('../_php/interface/IUserController.php');
	
	// include user entity
	if(file_exists('../entity/UserEntity.php')) require_once('../entity/UserEntity.php');
	if(file_exists('../_php/entity/UserEntity.php')) require_once('../_php/entity/UserEntity.php');

	// include user group entity
	if(file_exists('../entity/UserGroupEntity.php')) require_once('../entity/UserGroupEntity.php');
	if(file_exists('../_php/entity/UserGroupEntity.php')) require_once('../_php/entity/UserGroupEntity.php');

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
		 *  storage for the error count
		 */
		private $_errorCount = 0;		
		
		/**
		 *  function to get error count
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getErrorCount()
		{
			// return error count
			return $this->_errorCount;
		}
		
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
		 *  function to selects user group
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function selectUserGroups()
		{
			// get user groups
			$groups = $this->_database->getUsergroups();
			
			// iteration over all groups
			foreach($groups as $group)
			{
				// display user group
				$this->_view->displayGroup($group->userGroupId, 
										   $group->userGroupName, 
										   $group->userGroupPermisson);
			}
		}
		
		/**
		 *  function to select user group
		 */
		public function selectUserGroup()
		{
			// get group id
			$groupId = $this->_view->getGroupId();
			
			// get user group
			$group = $this->_database->getUsergroupById($groupId);
			
			// check group
			if(isset($group))
			{
				// display user group
				$this->_view->displayGroup($group->userGroupId, 
										   $group->userGroupName, 
										   $group->userGroupPermisson);
			}
		}
		
		/** 
		 *  function to generate password
		 */
		private function generatePassword()
		{
			// the allowed characters
			$characters = "AaBb0CcDd1EeFf2GgHh3IiJj4KkLl5MmNn6OoPp7QqRr8SsTt9UuVv?WwXx!YyZz";
			
			srand();			
			
			// while password contains password police
			do
			{
				// password string
				$password = '';
				
				// for a length of 8 characters
				for($length = 8; $length >= 0; $length--)
				{
					// get next random character
					$character = substr($characters, rand(0, strlen($characters)), 1);
					
					// add character to password
					$password = $password . $character;
				}			
				
				// check password police
				$passwordPolice =  	(empty($password1) == FALSE && 
									empty($password2) == FALSE && 
									$password1 == $password2 &&
									strlen($password1) >= 6 &&
									preg_match("/[a-z]/", $password1) == 1 && 
									preg_match("/[A-Z]/", $password1) == 1 &&
									preg_match("/[0-9]/", $password1) == 1);
									
			} while($passwordPolice == TRUE);
		
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
					
					// increase error count
					$this->_errorCount++;
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
												
					// get user group
					$group = $this->_database->getUsergroupById($user->userGroupId);
					
					// check group
					if(isset($group))
					{
						// display user group
						$this->_view->displayGroup($group->userGroupId, 
												   $group->userGroupName, 
												   $group->userGroupPermisson);
					} 
				}
			}
			else 
			{
				// set user not exist error
				$this->_view->setNotExistError();	
				
				// increase error count
				$this->_errorCount++;
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
											
				// get user group
				$group = $this->_database->getUsergroupById($user->userGroupId);
				
				// check group
				if(isset($group))
				{
					// display user group
					$this->_view->displayGroup($group->userGroupId, 
											   $group->userGroupName, 
											   $group->userGroupPermisson);
				}  
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
				// generate new password
				$password = $this->generatePassword();
				
				// get lost password message
				$message = sprintf($this->_view->getMessage(), $user->userName, $password);
				
				// get email subject
				$subject = $this->_view->getSubject();
				
				// send mail
				if(mail($email, $subject, $message) == TRUE)
				{
					// update user
					$result = $this->_database->updateUser( $user->userId, 
															$user->userName, 
															$user->userGroupId, 
															$user->userFirstName, 
															$user->userLastName, 
															$password, 
															$user->userEmail);
															
					// check result
					if($result == FALSE)
					{
						// set error information
						$this->_view->setError();
						
						// increase error count
						$this->_errorCount++;
					}
				}	
				else 
				{
					// set error information
					$this->_view->setEmailNotSend();
					
					// increase error count
					$this->_errorCount++;	
				}
			}	
		   else
		   	{
				// set user not exist error
				$this->_view->setNotExistError();
				
				// increase error count
				$this->_errorCount++;
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
		
			// check user name
			if(empty($username) == FALSE)
			{
				// get user with username from db
				$userUserName = $this->_database->getUserByUsername($username);
			}
			
			// check user email
			if(empty($email) == FALSE)
			{
				// get user with email from db
				$userEmail = $this->_database->getUserByEmail($email);
			}
			
			// check if user already exist
			if(	isset($userUserName) == FALSE && isset($userEmail) == FALSE)
			{
				// check required data
				if(	empty($username) == FALSE && empty($email) == FALSE && 
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
					if(mail($email, $subject, $message) == TRUE)
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
							
							// increase error count
							$this->_errorCount++;
						}
					}	
					else 
					{				
						// set error information
						$this->_view->setEmailNotSend();
						
						// increase error count
						$this->_errorCount++;							
					}
				}
				else 
				{
					// set required data error
					$this->_view->setRequiredDataError();
					
					// increase error count
					$this->_errorCount++;
				}
			}
			else
			{
				// set user exist error
				$this->_view->setExistError();
				
				// increase error count
				$this->_errorCount++;
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
				
				// get user with username from db
				$userByUsername = $this->_database->getUserByUsername($username);

				// get user with email from db
				$userByEmail = $this->_database->getUserByEmail($email);

				if(	($userByEmail == NULL || $userByEmail->userId == $user->userId) &&
					($userByUsername == NULL || $userByUsername->userId == $user->userId))
				{
					// check entered data
				   if(	empty($username) == FALSE && empty($email) == FALSE && 
				   		empty($firstName) == FALSE && empty($lastName) == FALSE )
					{
						// check for empty password
						if(!empty($password1) && !empty($password2))
						{
							// check password
							if(	$password1 == $password2 &&
								strlen($password1) >= 6 &&
								preg_match("/[a-z]/", $password1) && 
								preg_match("/[A-Z]/", $password1) &&
								preg_match("/[0-9]/", $password1))
							{
								// update user
								$result = $this->_database->updateUser( $user->userId, 
																		$username, 
																		$user->userGroupId, 
																		$firstName, 
																		$lastName, 
																		$password1, 
																		$email);
								
								// check result
								if($result == FALSE)
								{
									// set error information
									$this->_view->setError();
									
							   		// increase error count
									$this->_errorCount++;
								}
							}
							else
							{
								// set password error
								$this->_view->setPasswordError();
								
								// increase error count
								$this->_errorCount++;
							}
						}
						else if(isset($groupId)) 
						{
							// update user
							$result = $this->_database->updateUser( $user->userId, 
												$username, 
												$groupId, 
												$firstName, 
												$lastName, 
												NULL, 
												$email);
												
							// check result
							if($result == FALSE)
							{
								// set error information
								$this->_view->setError();
								
						   		// increase error count
								$this->_errorCount++;
							}	
						}
						else 
						{						
							// update user
							$result = $this->_database->updateUser( $user->userId, 
												$username, 
												$user->userGroupId, 
												$firstName, 
												$lastName, 
												NULL, 
												$email);
												
							// check result
							if($result == FALSE)
							{
								// set error information
								$this->_view->setError();
								
						   		// increase error count
								$this->_errorCount++;
							}	
						}
					}
				   else
				   	{
				   		// set required data error
				   		$this->_view->setRequiredDataError();
						
				   		// increase error count
						$this->_errorCount++;
				   	}				
				}
				else 
				{
					// set user already exist error
					$this->_view->setExistError();
					
					// increase error count
					$this->_errorCount++;	
				}
			}
			else
			{
				// set user not exist error
				$this->_view->setError();
				
				// increase error count
				$this->_errorCount++;							
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