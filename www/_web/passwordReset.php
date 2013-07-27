<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Passwort Rücksetzen</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/ico" href="favicon.ico">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/content.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    	
 <div id="top-menu"></div>

		<div id="header">
			<div id="top_nav">
	        	<h1><a href="./login.php">IT Verwaltung - B3 F&uuml;rth</a></h1>
	        </div>
		</div>
		<div id="content">
			<div id="module">
				<h2>Passwort zur&uuml;cksetzen</h2>
				<form action="login.php" method="post">
					<p>E-Mail:</p><input name="Mail" type="text" />
					<p>&nbsp;</p>
					<input name="btnReset" type="submit" value="Passwort zur&uuml;cksetzen"/>
					<input onClick="location.href = 'login.php'" type="button" value="Zur&uuml;ck" />
				</form>
		</div>
			<div class="clear"></div>
		</div>
		<div id="footer"></div>
    </body>
</html>