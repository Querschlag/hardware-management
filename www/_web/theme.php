<?php
	session_start();
	
	$redirect = false;
	$params = null;
	
	if (GET('lightTheme'))
	{
		$_SESSION['theme2'] = false;
		$params = rm_url_param('lightTheme');
		$redirect = true;
	}
		
	if (GET('darkTheme'))
	{
		$_SESSION['theme2'] = true;
		$params = rm_url_param('darkTheme');
		$redirect = true;
	}

	if ($redirect) {
		$url = $_SERVER['PHP_SELF'];
		$url .= ($params) ? '?' : '';
		$url .= $params;
		header('location:' . $url);
	}
		
	echo '<link rel="stylesheet" href="css/content';
	if (SESSION('theme1') == true)
		echo '';
	else
		echo '2';
	echo '.css">';	
?>