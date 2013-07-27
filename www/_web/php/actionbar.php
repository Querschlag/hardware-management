<?php

	require_once('navigation.php');
	
	/**
	* ActionBarController class
	*
	* Controller displaying actionbar buttons depending on selected menu and modules
	*
	* @category 
	* @package
	* @author Adrian Geuss <adriangeuss@gmail.com>
	* @copyright 2013 IFA11B2 IT-Team2
	*/
	
	abstract class ActionBarController
	{
		/**
		 *  storage for menu item
		 */
		private $_menu;
		
		/** 
		 *  storage for module name
		 */
		private $_module;
		
		/** 
		 * default constructor
		 * 
		 * @param array ('menu' => string, 'mod' => string)
		 */
		function __construct($args) 
		{
			if (isset($args['menu'])) $this->_menu = $args['menu'];
			if (isset($args['mod'])) $this->_module = $args['mod'];
			
			if (!$this->_menu)
				echo 'Missing argument: "menu"';
			if (!$this->_module)
				echo 'Missing argument: "mod"';
		}
		
		/**
		 *  function action button for adding a room 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		public function displayActionBar()
		{
			if ($this->_module == 'rooms')
			{
				if ($this->_menu == 'management')
					$this->displayActionButtonAddRoom();
				if ($this->_menu == 'management')
					$this->displayActionButtonUserManagement();
				if ($this->_menu == 'management')
					$this->displayActionButtonSupplier();
			}
			
			if ($this->_module == 'room')
			{
				if ($this->_menu == 'management')
					$this->displayActionButtonAddDevice();
				if ($this->_menu == 'management')
					$this->displayActionButtonEditRoom();
				if ($this->_menu == 'management')
					$this->displayActionButtonDeleteRoom();
			}

			if ($this->_module == 'device')
			{
				if ($this->_menu == 'management')
					$this->displayActionButtonAddComponent();
				if ($this->_menu == 'maintenance')
					$this->displayActionButtonFixProblem();
				if ($this->_menu == 'reporting')
					$this->displayActionButtonReportProblem();
				if ($this->_menu == 'scrap')
					$this->displayActionButtonScrapDevice();
			}
			
			if ($this->_module == 'component')
			{
				if ($this->_menu == 'scrap')
					$this->displayActionButtonScrapComponent();
			}
		}
		
		
		/**
		 *  function action button for adding a room 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonAddRoom();
		
		/**
		 *  function action button for user management 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonUserManagement();
		
		/**
		 *  function action button for supplier
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonSupplier();
		
		/**
		 *  function action button for adding a device
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonAddDevice();
		
		/**
		 *  function action button for editing a room 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonEditRoom();
		
		/**
		 *  function action button for deleting a room 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonDeleteRoom();
		
		/**
		 *  function action button for adding a component 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonAddComponent();
		
		/**
		 *  function action button for fixing a problem 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonFixProblem();
		
		/**
		 *  function action button for reporting problem 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonReportProblem();
		
		/**
		 *  function action button for scraping a device 
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonScrapDevice();
		
		/**
		 *  function action button for scraping a component
		 *
		 * @author Adrian Geuss <adriangeuss@gmail.com>
		 */
		abstract protected function displayActionButtonScrapComponent();
	}
?>