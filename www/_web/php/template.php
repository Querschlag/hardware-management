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

			
			$userGroup = SESSION('userGroup');
			if ($userGroup != null)
			{
				if ($userGroup == 1)
					return 'management/rooms.php';
			} else {
				return null;
			}
		}
	}
	
	
?>