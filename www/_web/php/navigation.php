<?php

/**
	 * Url Param composer
	 *
	 * Generates required GET params for hyperlinks
	 *
	 * @param array of strings
	 * @return string 
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */

	function navParams($params, $menu = null, $modul = null, $roomId = null, $deviceId = null, $componentId = null)
	{
		foreach ($params as $param) {
			
		}
		if ($menu == null)
			$menu = GET('menu');
		if ($modul == null)
			$modul = GET('mod');
		if ($roomId == null)
			$roomId = GET('room');
		if ($deviceId == null)
			$deviceId = GET('device');
		if ($componentId == null)
			$componentId = GET('component');
		
		$params = '?menu=' . $menu;
		if ($modul) $params .= '&mod=' . $modul;
		if ($roomId) $params .= '&room=' . $roomId; 
		if ($deviceId) $params .= '&device=' . $deviceId; 
		if ($componentId) $params .= '&component=' . $componentId; 
		
		return $params;
	}
	
	
	/**
	 * Returns the menu param for main navigation
	 * 
	 * @param string, null
	 * @return string
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */
	 
	function menuParams($menu = null)
	{
		if ($menu == null)
			$menu = GET('menu');
		
		return '?menu=' . $menu;
	}
	
?>