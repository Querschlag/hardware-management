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

	function navParams($params)
	{
		$menu = (isset($params['menu'])) ? $params['menu'] : null;
		if ($menu == null)
			$menu = GET('menu');
		
		// add menu parameter
		$paramString = '?menu=' . $menu;
		
		$modul = (isset($params['mod'])) ? $params['mod'] : null;
		if ($modul == null)
			$modul = GET('modul');
		// add menu parameter
		if ($modul != null)
			$paramString .= '&mod=' . $modul;
		
		$room = (isset($params['room'])) ? $params['room'] : null;
		if ($room == null)
			$room = GET('room');
		// add room parameter
		if ($room != null)
			$paramString .= '&room=' . $room;
		
		$device = (isset($params['device'])) ? $params['device'] : null;
		if ($device == null)
			$device = GET('device');
		// add device parameter
		if ($device != null)
			$paramString .= '&device=' . $device;
		
		$component = (isset($params['component'])) ? $params['component'] : null;
		if ($component == null)
			$component = GET('component');
		// add component parameter
		if ($component != null)
			$paramString .= '&component=' . $component;
		
		$supplier = (isset($params['supplier'])) ? $params['supplier'] : null;
		if ($supplier == null)
			$supplier = GET('supplier');
		// add supplier parameter
		if ($supplier != null)
			$paramString .= '&supplier=' . $supplier;
		
		$user = (isset($params['user'])) ? $params['user'] : null;
		if ($user == null)
			$user = GET('user');
		// add user parameter
		if ($user != null)
			$paramString .= '&user=' . $user;

		
		return $paramString;
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