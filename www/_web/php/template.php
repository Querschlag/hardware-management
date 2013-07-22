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
			if ($moduleName == 'bla')
				return '/html/bla.html';
			
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