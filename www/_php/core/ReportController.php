<?php
	
	// include report controller
	if(file_exists('../interface/IRoomController.php')) require_once('../interface/IRoomController.php');
	if(file_exists('../_php/interface/IRoomController.php')) require_once('../_php/interface/IRoomController.php');
	
	// include component transaction entity
	if(file_exists('../entity/ComponentTransactionEntity.php')) require_once('../entity/ComponentTransactionEntity.php');
	if(file_exists('../_php/entity/ComponentTransactionEntity.php')) require_once('../_php/entity/ComponentTransactionEntity.php');

	// include transaction entity
	if(file_exists('../entity/TransactionEntity.php')) require_once('../entity/TransactionEntity.php');
	if(file_exists('../_php/entity/TransactionEntity.php')) require_once('../_php/entity/TransactionEntity.php');

	// include user entity
	if(file_exists('../entity/UserEntity.php')) require_once('../entity/UserEntity.php');
	if(file_exists('../_php/entity/UserEntity.php')) require_once('../_php/entity/UserEntity.php');

	/**
	* Controller for Content Transaction
	*
	* Controller for Insert, Update and Delete Content Transaction
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class ReportController
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
		private $_errorCount;
		
		/**
		 *  paramized constructor
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		function __construct($view, $database) 
		{
			// store view
			$this->_view = $view;
			
			// store databse
			$this->_database = $database;		
		}
		
		/**
		 *  function to get reports by component id
		 * 
		 * @author Johannes Alt <altjohannes510@gmail.com>
		 */
		function getReportByComponentId()
		{
			// get component _id
			$componentId = $this->_view->getComponentId();
			
			// get component transaction
			$componentTransactions = $this->_database->getComponentTransactionByComponentId($componentId);
			
			// iteration over all transactions
			foreach ($componentTransactions as $componentTransaction) 
			{
				// get transaction
				$transaction = $this->_database->getTransactionById($componentTransaction->transactionId);
				
				// get user
				$user = $this->_database->getUserByIdIncludeInactiveUser($componentTransaction->componentTransactionuserId);
				
				// check user and transaction
				if(isset($transaction) && isset($user))
				{
					// display component transaction
					$this->_view->displayComponentTransaction(	$componentTransaction->componentTransactionId,
																gmdate("d.m.Y", $componentTransaction->componentTransactionDate),
																$componentTransaction->componentTransactionComment,
																$transaction->transactionTypName,
																$user->userFirstName,
																$user->userLastName);
				}
			}
		} 

		/**
		 *  function to get transactions
		 */
		function getTransactions()
		{
			// get transactions
			$transactions = $this->_database->getTransactions();
			
			// iteration over all transactions
			foreach($transactions as $transaction)
			{
				// display transaction
				$this->_view->displayTransaction($transaction->transactionId, $transaction->transactionTypName);
			}
		}

		/**
		 *  function to insert component transaction
		 * 
		 * @author Johannes Alt
		 */
		public function insertComponentTransaction()
		{
			// get transaction type
			$type = $this->_view->getTransactionType();
			
			// get component id
			$component = $this->_view->getComponentId();
			
			// get user id
			$user = $this->_view->getUserId();
			
			// get transaction date
			$date = $this->_view->getDate();
			
			// get transaction note
			$note = $this->_view->getNote();
			
			// check note and date
			if(isset($type) && isset($component) && isset($user) && isset($date) && isset($note))
			{
				// insert component transaction
				$result = $this->_database->insertComponentTransaction($component, $user, $transaction, $date, $note);
				
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
				// set required data error
				$this->_view->setRequiredDataError();
				
				// increase error count
				$this->_errorCount++;	
			}
		}
	}
?>