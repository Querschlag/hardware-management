<?php namespace Template; ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
	</ul>
</div>
<div id="module">
	<h3>Problem Melden</h3>
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<form action="index.php<?php echo navParams(null, 'device'); ?>" method="post">
		<p>Datum</p><input name="Datum" type="text"/>
		<p>Notiz</p><textarea name="description" rows=6 cols=30></textarea>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="Melden" />
		<input onClick="location.href = 'index.php<?php echo navParams(null, 'device'); ?>'" type="button" value="Abbrechen" />
	</form>
</div>