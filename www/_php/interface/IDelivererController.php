<?php
	/**
	 * Interface for Deliverer
	 *
	 * Interface for Insert, Update and Delete Deliverer
	 *
	 * @category 
	 * @package
	 * @author Johannes Alt <altjohannes510@gmail.com>
	 * @author Thomas Bayer <thomasbayer95@gmail.com>
	 * @copyright 2013 B3ProjectGroup2
	 */
	interface IDelivererController
	{
		/**
		 * select all Deliverers and print the room on UI
		 *
		 * @author Thomas Bayer <thomasbayer95@gmail.com>  
		 */
		public function selectDeliverers();
		
		/**
		 *  select deliverer by id and print the deliverers on UI
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com> 
		 */
		public function selectDeliverersById($id);
		
		/**
		 *  select components by deliverer id
		 * 
		 * @author Thomas Bayer <thomasbayer95@gmail.com> 
		 */
		public function selectComponentsByDelivererId($id);
		
		/**
		 * insert a new deliverer
		 *
		 * @author Thomas Bayer <thomasbayer95@gmail.com>  
		 */
		public function insertDeliverer();
		
		/**
		 * update a deliverer
		 *
		 * @author Thomas Bayer <thomasbayer95@gmail.com>  
		 */
		public function updateDeliverer();
		
		/**
		 * delete a deliverer
		 *
		 * @author Thomas Bayer <thomasbayer95@gmail.com>  
		 */
		public function deleteDeliverer();
		
		/**
		 * delete a deliverer
		 *
		 * @author Thomas Bayer <thomasbayer95@gmail.com>  
		 */
		public function getDeliverer();
	}
?>