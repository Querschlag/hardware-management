<?php
	/**
	* Controller for ComponentAttributes
	*
	* Controller for Insert, Update and Delete ComponentAttributes
	*
	* @category 
	* @package
	* @author Thomas Bayer <thomasbayer95@gmail.com>
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	class ComponentAttributeController implements IComponentAttributeController
	{
		/**
		 *  storage for the dialog
		 */
		private $_view;
		
		/** 
		 *  storage for the database
		 */
		private $_database;
		
		/** 
		 * default constructor
		 */
		function __construct($view, $database) 
		{
			// store view
			$this->_view = $view;
			
			// create database
			$this->_database = $database; 
		}
		
		/**
		 *  function insert a new component
		 *
		 * @author Thomas Michl <thomas.michl1988@gmail.com> 
		 */
		public function insertAttribute()
		{
			
		}
	}
?>