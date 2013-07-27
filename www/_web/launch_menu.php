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
					<div class="tile"><a href="index.php?menu=management&mod=rooms">Stammdaten</a></div>
					<div class="tile"><a href="index.php?menu=scrap&mod=rooms">Ausmustern</a></div>
					<div class="tile"><a href="index.php?menu=maintenance&mod=rooms">Wartung</a></div>';
			}
			
			if ($userPermission == 1 || $userPermission == 2 || $userPermission == 3) {
				echo '<div class="tile"><a href="index.php?menu=reporting&mod=rooms">Reporting</a></div>';
			}
			
			if ($userPermission == 1) {
				echo '<div class="tile"><a href="index.php?menu=management&mod=user">Benutzer</a></div>';
			}
		?>
	</div>
</div>