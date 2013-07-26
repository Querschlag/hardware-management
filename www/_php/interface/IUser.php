<?php
    /**
	 * Interface for User
	 *
	 * Interface for Insert, Update and Delete User
	 *
	 * @category 
	 * @package
	 * @author Johannes Alt <altjohannes510@gmail.com>
	 * @author Thomas Bayer <thomasbayer95@gmail.com>
	 * @copyright 2013 B3ProjectGroup2
	 */
	interface IUser
	{
		/**
		 *  function to display user
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayUser($id, $groupId, $name, $firstName, $lastName, $email);
		
		/**
		 *  function to get user name
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getUserName();
		
		/**
		 *  function to get password
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getPassword();
		
		/**
		 *  function to set password error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function setPasswordError();

		/**
		 *  function to set user don't exist error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function setNotExistError();	
		
		/**
		 *  function to get user id
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getUserId();
		
		/**
		 *  function to get email adress
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getEmail();
		
		/**
		 *  function to get subject of mail
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getSubject();

		/**
		 *  function to set email not send error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function setEmailNotSend();

		/**
		 *  function to set success information
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function setSuccess();	

		/**
		 *  function to get first name
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getFirstName();

		/**
		 *  function to get last name
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getLastName();

		/**
		 *  function to get group id
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getGroupId();
		
		/**
		 *  function to set error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
 		public function setError();						

		/** 
		 *  function to set user exist error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
 		public function setExistError();

 		/**
		 *  function to get confirm password
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
 		public function getPassword2();
	}
?>