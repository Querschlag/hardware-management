<?php

	/**
	* Login Manager
	*
	* @author Adrian Geuss <adriangeuss@gmail.com>
	* @copyright 2013 B3ProjectGroup2
	*/
	
	session_start();

	if ( !isset($_SESSION['userGroup']) || $_SESSION['userGroup'] == null)
	{	
		// Redirect to login page
		header('location:login.php');
	}
?>