<?php

	/**
	* PHP additions
	*
	* @author Adrian Geuss <adriangeuss@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/

	
	
	/**
	 * Return the GET parameter for the given key
	 * 
	 * @param string $key, mixed $default 
	 * @return mixed 
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * 
	 */
	function GET($key, $default = null)
	{
		if ( isset($_GET[$key]) ) return $_GET[$key];
		return $default;
	}
	
	
	/**
	 * Return the POST parameter for the given key
	 * 
	 * @param string $key, mixed $default 
	 * @return mixed 
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * 
	 */
	function POST($key, $default = null)
	{
		if ( isset($_POST[$key]) ) return $_POST[$key];
		return $default;
	}
	
	
	/**
	 * Return the SESSION parameter for the given key
	 * 
	 * @param string $key, mixed $default 
	 * @return mixed 
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * 
	 */
	function SESSION($key, $default = null)
	{
		if ( isset($_SESSION[$key]) ) return $_SESSION[$key];
		return $default;
	}

?>