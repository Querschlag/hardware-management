<?php
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
		 *  function to hash password
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		private function hashPassword($password)
		{
			// return hashed password
			return hash('md5', $password);
		}
		
		/** 
		 *  function to generate password
		 */
		private function generatePassword()
		{
			// the allowed characters
			$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!`\"§$%&/()=?;:";
			
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
			
			// hash password
			$password = $this->hashPassword($password);
			
			// get user with username from db
			$user = $this->_database->getUserByUsername($username);
		}				
		
		/**
		 *  function called after user lost password to reset password
		 * 
		 *  @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function lostPassword()
		{
			// get user name (user email)
			$username = $this->_view->getUserName();
			
			// get user with username from db
			$user = $this->_database->getUserByUsername($username);
			
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
			$username = $this->_view->getUserName();
			
			// get user group id
			$groupId = $this->_view->getGroupId();
			
			// get user with username from db
			$user = $this->_database->getUserByUsername($username);
			
			// check if user already exist
			if(isset($user) == FALSE)
			{
				// create confirmation link
				$confirmLink = sprintf('%s?id=%d,', $_SERVER['PHP_SELF'], $this->_database->getNextUserId());
				
				// create password
				$password = $this->hashPassword($this->generatePassword());
				
				// get lost password message
				$message = sprintf($this->_view->getMessage(), $username, $confirmLink);
					
				// get email subject
				$subject = $this->_view->getSubject();
					
				// send mail
				if(mail($username, $subject, $message) == FALSE)
				{
					// set error information
					$this->_view->setEmailNotSend();
					
					// create new user
					$result = $this->_database->insertUser($username, $password, $groupId, FALSE);
					
					// check result
					if($result == FALSE)
					{
						// set error information
						$this->_view->setError();
					}
				}	
				else 
				{
					// set success information
					$this->_view->setSuccess();	
				}
			}
			else
			{
				// set user exist error
				$this->_view->setExistError();
			}
		}

		/** 
		 *  function to insert user
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function insertUser()
		{
			// get user name (user email)
			$username = $this->_view->getUserName();
			
			// get password 
			$password1 = $this->_view->getPassword1();
			
			// get confirm password
			$password2 = $this->_view->getPassword2();
			
			// get user group id
			$groupId = $this->_view->getGroupId();
			
			// check username
			if(empty($username) == FALSE && isset($groupId))
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
					// create new user
					$result = $this->_database->insertUser($username, $this->hashPassword($password1), $groupId, TRUE);
					
					// check result
					if($result == FALSE)
					{
						// set error information
						$this->_view->setError();
					}
				}
				else 
				{
					// set password request error
					$this->_view->setPasswordRequestError();	
				}
			}
			else 
			{
				// set user not exist error
				$this->_view->setNotExistError();	
			}
		}

		/**
		 *  function to update password
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function updatePassword()
		{
			// get user id
			$userId = $this->_view->getUserId();
			
			// get user
			$user = $this->_database->getUserById($userId);
			
			// check if person exist
			if(isset($user) == TRUE)
			{
				// get password 
				$password1 = $this->_view->getPassword1();
			
				// get confirm password
				$password2 = $this->_view->getPassword2();
				
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
					$result = $this->_database->updateUserPassword($userId, $this->hashPassword($password1));
					
					// check result
					if($result == FALSE)
					{
						// set error information
						$this->_view->setError();
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
		 *  function to update role
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function updateRole()
		{
			// get user id
			$userId = $this->_view->getUserId();
			
			// get user
			$user = $this->_database->getUserById($userId);
			
			// check if person exist
			if(isset($user) == TRUE)
			{
				// get group id
				$groupId = $this->_view->getGroupId();
				
				// update role
				$result = $this->_database->updateUserRole($userId, $groupId);					
				
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