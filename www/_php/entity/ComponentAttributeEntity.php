<?php
	/**
	*  ComponentAttribute entity
	*
	*  ComponentAttribute entity to store ComponentAttribute data
	*
	* @category 
	* @package
	* @author Daniel Schulz <schmoschu@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/	
	class ComponentAttributeEntity
	{
		/**
		 *  storage for the ComponentAttribute id
		 */
		public $componentAttributeId;
		
		/**
		 *  storage for the ComponentAttribute Name
		 */
		public $componentAttributeName;

		/**
		 *  flag to storage if Component -> ComponentAttribute with Value = true Or ComponentType -> ComponentAttribute
		 */
		public $componentAttributeIsFromComponent;
		
		/**
		 *  storage for id componentId if componentAttributeIsFromComponent true else ComponentTypeId
		 */
		public $componentAttributeUncertaintId;
		
		/**
		 *  storage for the Value if Component -> ComponentAttribute
		 */
		public $componentAttributeComponentValue;
		
		/**
		 *  storage for the Value if Component -> ComponentAttribute
		 */
		public $componentAttributeValidValue[];
		
	}
?>