<?php
	/**
	*  Maintenance entity
	*
	*  Maintenance entity to store transaction data
	*
	* @category 
	* @package
	* @author Daniel Schulz <schmoschu@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class MaintenanceEntity
	{
		/**
		 *  storage for the Maintenance id
		 */
		public $maintenanceId;
		
		/**
		 *  storage for the Component id
		 */
		public $componentId;

		/**
		 *  storage for the transaction id
		 */
		public $transactionId;	
		
		/**
		 *  storage for the Comment
		 */
		public $maintenanceComment;	
		
		 /**
		 *  storage for the Date
		 */		
		public $maintenanceDate;	
		
	}
?>