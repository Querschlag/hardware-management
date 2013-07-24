<?php
	/**
	*  transaction entity
	*
	*  transaction entity to store transaction data
	*
	* @category 
	* @package
	* @author Daniel Schulz <schmoschu@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class TransactionEntity
	{
		/**
		 *  storage for the Transaction id
		 */
		public $transactionId;
		
		/**
		 *  storage for the Transaction Description
		 */
		public $transactionDescription;	

         /**
		 *  storage for the transactionTypeId
		 */
		public $transactionTypeId;

         /**
		 *  storage for the userId
	   	 */
		public $userId;	         
	}
?>