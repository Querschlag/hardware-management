<?php
	/**
	* Interface for Room
	*
	* Interface for display Room
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	interface IReport
	{
		/**
		 *  function to display componet transaction
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayComponentTransaction($comTransactionId, $date, $comment, $type, $fistname, $lastname);
		
		/**
		 *  function to display transactin
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function displayTransaction($id, $name);
		
		/**
		 *  function to get transaction type
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getTransactionType();
			
		/**
		 *  function to get component id
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getComponentId();
		
		/**
		 *  function to get user id
		 * 
		 * @author Johannes Alt
		 */
		public function getUserId();
		
		/**
		 *  function to get date
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getDate();
			
		/**
		 *  function to get note
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function getNote();
			
		/**
		 *  function to set error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function setError();
		
		/**
		 *  function to set required data error
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		public function setRequiredDataError();			
	}
?>