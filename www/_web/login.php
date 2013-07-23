<?php
	
	require_once('php/additions.php');
	
	$username = POST('username');
	$password = POST('password');
	
	//echo 'username: ' . $username . '| password: ' . $password;
	if ($username != null && $password != null)
	{
		//echo 'valid username and password';
		// Login with backend connector class
		if (true)
		{
			session_start();
			$_SESSION['userGroup'] = 1;
			$_SESSION['username'] = $username;
			
			header('location:index.php');
		} else {
			echo 'Falscher Benutzername oder Passwort.';
		}
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hardware Management</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/ico" href="favicon.ico">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/content.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <div id="top-menu"></div>

		<div id="header"></div>
		<div id="content">
			<div id="information">
				<h1>Hardware Management B3</h1>
			</div>
			<div id="login">
				<form action="login.php" method="post">
					<p>Benutzername</p><input name="username" type="text" />
					<p>Passwort</p><input name="password" type="text" />
					<p><input name="btnLogin" type="submit" value="Anmelden"/></p>
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<div id="footer"></div>
    </body>
</html>