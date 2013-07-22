<?php
	require_once('php/template.php');
	require_once('php/additions.php');
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
        
        <?php
        	/*
			 * Login check
			 */
			 
			 include('check_login.php')
        ?>

		<div id="header">
			<div id="top_nav">
				<ul>
					<li><strong>Verwaltung</strong></li>
					<li><strong>Bestellung</strong></li>
					<li><strong>Reporting</strong></li>
				</ul>
			</div>
			<div id="search_bar">
				<form action="index.php" method="get">
					<input name="search" ="text" />
					<input name="btnSearch" type="submit" value="Suchen" />
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<div id="content">
			<?php
				/*
				 * Include module content
				 */
				 
				$module = \template\ModuleImporter::moduleForName(GET('module'));
				if ($module != null)
					include($module);
			?>
		</div>
		<div id="footer"></div>
    </body>
</html>
