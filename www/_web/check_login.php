<?php

	/**
	* Login Manager
	*
	* @author Adrian Geuss <adriangeuss@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	
	session_start();

	if ( !isset($_SESSION['userPermission']) || $_SESSION['userPermission'] == null)
	{	
		// Redirect to login page
		header('location:login.php');
	}
?>