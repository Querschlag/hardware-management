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
        <title>IT Verwaltung - B3 F&uuml;rth</title>
        <meta name="description" content="Tool for tracking hardware devices and components in an educational environment.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/ico" href="favicon.ico">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <?php
        	// Stylesheet chooser
       		include('theme.php');
       	?>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<script type="text/javascript">
			;(function($) {
			    $.fn.textfill = function(options) {
			        var fontSize = options.maxFontPixels;
			        var ourText = $('h1:visible:first', this);
			        var maxHeight = $(this).height();
			        var maxWidth = $(this).width();
			        var textHeight;
			        var textWidth;
			        do {
			            ourText.css('font-size', fontSize);
			            textHeight = ourText.height();
			            textWidth = ourText.width();
			            fontSize = fontSize - 1;
			        } while ((textHeight > maxHeight || textWidth > maxWidth) && fontSize > 3);
			        return this;
			    }
			})(jQuery);
			
			$(document).ready(function() {
			    $('.jtextfill').textfill({ minFontPixels: 36 });
			});
		</script>
		
		<!--
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
       -->
        
        <?php
        	/*
			 * Login check
			 */
			 
			if (isset($_GET['logout']))
			{
			 	if(!isset($_COOKIE["PHPSESSID"]))
				{
					session_start();
				}

				$_SESSION['userPermission'] = null;
				session_destroy();
			}
			 
			include('check_login.php')
        ?>

		<div id="header">
			<div id="top_nav">
				<h1 class="jtextfill"><a href="./">IT Verwaltung - B3 F&uuml;rth</a></h1>
			</div>
			<div id="user_bar">
				<?php
					// Include user logout
					include('userbar.php');
				?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div id="content">
			<?php
				/*
				 * Include module content
				 */
				 
				$module = \Template\ModuleImporter::moduleForName(GET('mod'));
				if ($module != null)
					include($module);
			?>
		</div>
		<div id="footer">
			<?php
				// Include page footer
				include('footer.php');
			?>
		</div>
    </body>
</html>
