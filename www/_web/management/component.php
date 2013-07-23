<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php?mod=rooms">R&auml;ume</a></li>
		<li>>> <a href="index.php?mod=room">R001</a></li>
		<li>>> <a href="index.php?mod=device">PC001</a></li>
		<li>>> <a href="index.php?mod=component">Komponente1</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="right" href="index.php?mod=create_room">Nachbestellen</a>
		<div class="clear"></div>
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