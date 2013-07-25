<?php
	/**
	*  ComponentTransaction entity
	*
	*  ComponentTransaction entity to store ComponentTransaction data
	*
	* @category 
	* @package
	* @author Daniel Schulz <schmoschu@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class ComponentTransactionEntity
	{
		/**
		 *  storage for the componentTransaction id
		 */
		public $componentTransactionId;
		
		/**
		 *  storage for the componentId
		 */
		public $componentId;	

         /**
		 *  storage for the transactionId
		 */
		public $transactionId;
		
		/**
		 *  storage for the userId
	   	 */
		public $userId;

         /**
		 *  storage for the date
	   	 */
		public $date;	

		/**
		 *  storage for the comment
	   	 */
		public $comment;

		
	}
?>