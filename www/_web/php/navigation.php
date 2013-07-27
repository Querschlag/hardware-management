<?php

	/**
	 * Url Param composer
	 *
	 * Generates required GET params for hyperlinks
	 *
	 * @param array (associative)
	 * @return string 
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */

	function navParams($params = array(), $autoAppendIds = true)
 	{
		$menu = (isset($params['menu'])) ? $params['menu'] : null;
 		if ($menu == null)
 			$menu = GET('menu');
		if ($menu == null)
			$menu = SESSION('selectedMainMenuItem');
		
		// add menu parameter
		$paramString = '?menu=' . $menu;
		
		$modul = (isset($params['mod'])) ? $params['mod'] : null;
 		if ($modul == null && $autoAppendIds)
			$modul = GET('mod');
		// add menu parameter
		if ($modul != null)
			$paramString .= '&mod=' . $modul;
		
		$room = (isset($params['room'])) ? $params['room'] : null;
		if ($room == null && $autoAppendIds)
			$room = GET('room');
		// add room parameter
		if ($room != null)
			$paramString .= '&room=' . $room;
		
		$device = (isset($params['device'])) ? $params['device'] : null;
		if ($device == null && $autoAppendIds)
			$device = GET('device');
		// add device parameter
		if ($device != null)
			$paramString .= '&device=' . $device;
		
		$component = (isset($params['component'])) ? $params['component'] : null;
		if ($component == null && $autoAppendIds)
			$component = GET('component');
		// add component parameter
		if ($component != null)
			$paramString .= '&component=' . $component;
		
		$supplier = (isset($params['supplier'])) ? $params['supplier'] : null;
		if ($supplier == null && $autoAppendIds)
			$supplier = GET('supplier');
		// add supplier parameter
		if ($supplier != null)
			$paramString .= '&supplier=' . $supplier;
		
		$user = (isset($params['user'])) ? $params['user'] : null;
		if ($user == null && $autoAppendIds)
			$user = GET('user');
		// add user parameter
		if ($user != null)
			$paramString .= '&user=' . $user;

		
		return $paramString;
 	}
	
	
	/**
	 * Returns the title for given menu param for main navigation
	 * 
	 * @param string, null
	 * @return string
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */
	 
	function menuTitle($menuItem)
	{
		if ($menuItem == 'scrap')
			return 'Ausmustern';
		else if ($menuItem == 'maintenance')
			return 'Wartung';
		else if ($menuItem == 'reporting')
			return 'Reporting';
		else if ($menuItem == 'management')
			return 'Stammdaten';
		
		return '';
	}
	
	
	/**
	 * Returns the menu item for the current url
	 * 
	 * @return string
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */
	 
	function menuItem()
	{
		$menu = GET('menu');
		if ($menu == null)
			$menu = SESSION('selectedMainMenuItem');
		
		return $menu;
	}
	
?>