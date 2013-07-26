<?php namespace Template;

	/**
	 * Importer for UI modules
	 *
	 * Importer for loading UI modules depending on given name
	 *
	 * @package template
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */
	 
	require_once('additions.php');
	
	class ModuleImporter
	{
		static function moduleForName($moduleName)
		{
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
			
			if ($moduleName == 'stock')
				return 'stock/stock.php';
			if ($moduleName == 'store')
				return 'stock/store.php';
			if ($moduleName == 'storeDevice')
				return 'stock/store_device.php';
			if ($moduleName == 'storeComponent')
				return 'stock/store_component.php';
			
			if ($moduleName == 'rooms')
				return 'management/rooms.php';
			if ($moduleName == 'room')
				return 'management/room.php';
			if ($moduleName == 'device')
				return 'management/device.php';
			if ($moduleName == 'component')
				return 'management/component.php';
			if ($moduleName == 'createRoom')
				return 'management/create_room.php';
			if ($moduleName == 'addDevice')
				return 'management/add_device.php';
			if ($moduleName == 'addComponent')
				return 'management/add_component.php';
			if ($moduleName == 'reportProblem')
				return 'management/reporting.php';
			if ($moduleName == 'fixProblem')
				return 'management/support.php';
			
				
			if ($moduleName == 'user')
				return 'user/user.php';
			if ($moduleName == 'editUser')
				return 'user/edit_user.php';
			if ($moduleName == 'createUser')
				return 'user/create_user.php';
			
			
			if ($moduleName == 'supplier')
				return 'supplier/supplier.php';
			if ($moduleName == 'editSupplier')
				return 'supplier/edit_supplier.php';
			if ($moduleName == 'createSupplier')
				return 'supplier/create_supplier.php';

			
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