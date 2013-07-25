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
		<a class="left" href="index.php?mod=createSupplier">Neuer Lieferant</a>
		<div class="clearfix"></div>
	</div>
	<h2>Lieferanten</h2>
	<ul class="orders">
		<li style="background-color: #eee"><a href="index.php?mod=editSupplier&supplier=1">DHL</a></li>
		<li style="background-color: #ddd"><a href="index.php?mod=editSupplier&supplier=2">Kondrad</a></li>

	</ul>
</div>