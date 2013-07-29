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
	
	
	/**
	 * Removes get parameter from given url
	 * 
	 * @return string
	 * @author http://www.luqmanmarzuki.com/read/20100330/php_to_remove_certain_url_parameter.html
	 */
	function rm_url_param($param_rm, $query='')
    {
	    empty($query)? $query=$_SERVER['QUERY_STRING'] : '';
	    parse_str($query, $params);
	    unset($params[$param_rm]);
	    $newquery = '';
	    foreach($params as $k => $v)
	        { $newquery .= '&'.$k.'='.$v; }
	    return substr($newquery,1);
    }

?>