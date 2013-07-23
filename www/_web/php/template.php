<?php namespace template;

	/**
	 * Importer for UI modules
	 *
	 * Importer for loading UI modules depending on given name
	 *
	 * @package template
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 B3ProjectGroup2
	 */
	 
	require_once('additions.php');
	
	class ModuleImporter
	{
		static function moduleForName($moduleName)
		{
			if ($moduleName == 'rooms')
				return 'management/rooms.php';
			if ($moduleName == 'room')
				return 'management/room.php';
			if ($moduleName == 'device')
				return 'management/device.php';
			if ($moduleName == 'component')
				return 'management/component.php';
			if ($moduleName == 'create_room')
				return 'management/create_room.php';
			if ($moduleName == 'create_device')
				return 'management/create_device.php';
			if ($moduleName == 'create_component')
				return 'management/create_component.php';
			
			if ($moduleName == 'order')
				return 'order/order.php';
			if ($moduleName == 'modifyOrder')
				return 'order/modify_order.php';
			if ($moduleName == 'confirmOrder')
				return 'order/confirm_order.php';
			if ($moduleName == 'reorderOrder')
				return 'order/reorder_order.php';
			if ($moduleName == 'placeOrder')
				return 'order/place_order.php';
			if ($moduleName == 'order_device')
				return 'order/order_device.php';
			if ($moduleName == 'order_component')
				return 'order/order_component.php';
				
			if ($moduleName == 'user')
				return 'user/user.php';

			
			// default module
			$userGroup = SESSION('userGroup');
			if ($userGroup != null)
			{
				return 'launch_menu.php';
			} else {
				return null;
			}
		}
	}
	
	
?>