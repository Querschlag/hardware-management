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
	<div id="action_bar">
		<a class="right destructiveButton" href="index.php?mod=device<?php echo '&menu=' . GET('menu');?>">Ausmustern</a>
		<div class="clearfix"></div>
	</div>
	<h2>Eigenschaften</h2>
	<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
	<form action="index.php?mod=device" method="post">
		<p>Attribut 1</p><input name="attribut1" type="text" />
		<p>Attribut 2</p><input name="attribut1" type="text" />
		<p>Attribut 3</p><input name="attribut1" type="text" />
		<input name="btnSubmit" type="submit" value="Speichern" />
	</form>

</div>