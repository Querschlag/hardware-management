<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>
		<li><a href="index.php">Startseite</a></li>
		<li>>> <a href="index.php?mod=order">Bestellung</a></li>
		<li>>> <a href="index.php?mod=order">Bestellung anlegen</a></li>
	</ul>
</div>
<div id="module">
	<h2>Was m&ouml;chten Sie bestellen?</h2>
	<?php
		require_once('php/additions.php');
		
		{
	
			echo '
			<!-- Selection for order - Step 1 -->
			<div id="order_selction">
				<div class="largeButton">
					<form action="index.php?mod=order_device" method="post">
						<input name="btnDevice" type="submit" value="Ger&auml;t" />
					</form>
				</div>
				<div class="largeButton">
					<form action="index.php?mod=order_component" method="post">
						<input name="btnComponent" type="submit" value="Komponente" />
					</form>
				</div>
			</div>
			';
		
		}
	?>
</div>