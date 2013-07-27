<!-- Refactor this to be created dynamically -->
<div id="module">
	<div id="launch_menu">
		<?php 
			$userPermission = SESSION('userPermission');
		
			if ($userPermission == 1) {
				echo '<div class="tile"><a href="index.php?mod=order">Bestellungen</a></div>';
			}
			
			if ($userPermission == 1 || $userPermission == 2) {
				echo '
					<div class="tile"><a href="index.php?mod=stock">Neubeschaffung</a></div>
					<div class="tile"><a href="index.php?mod=rooms&menu=management">Stammdaten</a></div>
					<div class="tile"><a href="index.php?mod=rooms&menu=scrap">Ausmustern</a></div>
					<div class="tile"><a href="index.php?mod=rooms&menu=maintenance">Wartung</a></div>';
			}
			
			if ($userPermission == 1 || $userPermission == 2 || $userPermission == 3) {
				echo '<div class="tile"><a href="index.php?mod=rooms&menu=reporting">Reporting</a></div>';
			}
			
			if ($userPermission == 1) {
				echo '<div class="tile"><a href="index.php?mod=user&menu=management">Benutzer</a></div>';
			}
		?>
	</div>
</div>