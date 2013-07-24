<?php namespace Template; ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<li>>> <a href="index.php<?php echo navParams(); ?>">Raum hinzuf&uuml;gen</a></li>
	</ul>
</div>
<div id="module">
	<h3>Raum hinzuf&uuml;gen</h3>
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<form action="index.php<?php echo navParams(null, 'rooms'); ?>" method="post">
		<p>Stockwerk</p>
		<select name="floor">
			<optgroup label="W&auml;hle ein Stockwerk"></optgroup>
				<option value="0">Erdgeschoss</option>
				<option value="1">1</option>
				<option value="2">2</option>
		</select>
		<p>Bezeichnung</p><input name="name" type="text"/>
		<p>Notiz</p><textarea name="description" rows=6 cols=30></textarea>
		<br>
		<br>
		<input name="btnSubmit" type="submit" value="Hinzuf&uuml;gen" />
		<input onClick="location.href = 'index.php<?php echo navParams(null, 'rooms'); ?>'" type="button" value="Abbrechen" />
	</form>
</div>