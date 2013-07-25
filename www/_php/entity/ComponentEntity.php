<?php
	/**
	*  Component entity
	*
	*  Component entity to store component data
	*
	* @category 
	* @package
	* @author Johannes Alt <altjohannes510@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class ComponentEntity
	{
		/**
		 *  storage for the component id
		 */
		public $componentId;
		
		/** 
		 *  storage for the deliverer of the component
		 */
		public $componentDeliverer;
		
		/**
		 *  storage for the Room of the component
		 */
		public $componentRoom;
		
		/**
		 *  storage for the component name
		 */
		public $componentName;
		
		/** 
		 *  storage for the component buy date
		 */
		public $componentBuy;
		
		/**
		 *  storage for the component warranty
		 */
		public $componentWarranty;
		
		/**
		 *  storage for the component note
		 */
		public $componentNote;
		
		/**
		 *  storage for the component supplier
		 */
		public $componentSupplier;
		
		/**
		 *  storage for the component type
		 */
		public $componentType;
		
		/**
		 *  storage flag for Device or component
		 */
		 public $componentIsDevice;
		 
		 /**
		 *  storage flag for problems
		 */
		 public $componentHasProblems;
	}
?>