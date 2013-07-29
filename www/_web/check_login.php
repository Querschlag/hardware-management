<?php

	/**
	* Login Manager
	*
	* @author Adrian Geuss <adriangeuss@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	
	if(!isset($_COOKIE["PHPSESSID"]))
	{
		session_start();
	}

	if ( !isset($_SESSION['userPermission']))
	{	
		// Redirect to login page
		session_destroy();
		header('location:login.php');
	}
?>