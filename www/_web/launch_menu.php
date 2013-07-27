<?php
	
	function getTiles()
	{
		$tiles = array();
		$userPermission = SESSION('userPermission');
		
		if ($userPermission == 1) {
			$tiles[] = '<div id="order" class="tile"><a href="index.php?mod=order">Bestellungen</a></div>';
		}
		
		if ($userPermission == 1 || $userPermission == 2) {
			$tiles[] = '<div id="stock" class="tile"><a href="index.php?mod=stock">Neubeschaffung</a></div>';
			$tiles[] = '<div id="management" class="tile"><a href="index.php?menu=management&mod=rooms">Stammdaten</a></div>';
			$tiles[] = '<div id="scrap" class="tile"><a href="index.php?menu=scrap&mod=rooms">Ausmustern</a></div>';
			$tiles[] = '<div id="maintenance" class="tile"><a href="index.php?menu=maintenance&mod=rooms">Wartung</a></div>';
		}
		
		if ($userPermission == 1 || $userPermission == 2 || $userPermission == 3) {
			$tiles[] = '<div id="reporting" class="tile"><a href="index.php?menu=reporting&mod=rooms">Reporting</a></div>';
		}
		
		if ($userPermission == 1) {
			$tiles[] = '<div id="user" class="tile"><a href="index.php?menu=management&mod=user">Benutzer</a></div>';
		}
		
		
		// Add 'last' class when there's an uneven number
		if ( (sizeof($tiles) % 2) != 0 )
		{
			$tiles[sizeof($tiles) - 1] = str_replace('class="', 'class="lastTile ', $tiles[sizeof($tiles) - 1] );
		}
		
		return $tiles;
	}
	
?>

<!-- Refactor this to be created dynamically -->
<div id="module">
	<div id="launch_menu">
		<?php 
			foreach (getTiles() as $tileCode) {
				echo $tileCode;
			}
		?>
		<div class="clearfix"></div>
	</div>
</div>