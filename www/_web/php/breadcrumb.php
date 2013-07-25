<?php
	namespace Template; 
	
	/**
	 * Breadcrumb composer
	 *
	 * Creates breadcrumb navigation based on GET params
	 *
	 * @package template
	 * @author Adrian Geuss <adriangeuss@gmail.com>
	 * @copyright 2013 IFA11B2 IT-Team2
	 */
	
	require_once('php/additions.php');
	
	// start page
	echo '<li><a href="index.php">Startseite</a></li>';
	
	// main menu item
	$menuItem = GET('menu');
	
	echo '<li> >> <a href="index.php' . menuParams() . '&mod=rooms">';
	
	if ($menuItem == 'scrap')
		echo 'Ausmustern';
	else if ($menuItem == 'maintenance')
		echo 'Wartung';
	else if ($menuItem == 'reporting')
		echo 'Reporting';
	else if ($menuItem == 'management')
		echo 'Stammdaten';
	
	echo '</a></li>';
	
	// rest of navigation tree based on GET params
	// FIXME: Load names for selected room, device, component from database
	if (GET('room'))
		echo '<li> >> <a href="index.php' . menuParams() .
		'&mod=room&room=' . GET('room') .
		'">R001</a></li>';
		
	if (GET('device'))
		echo '<li> >> <a href="index.php' . menuParams() .
		'&mod=device&room=' . GET('room') .
		'&device=' . GET('device') .
		'">PC001</a></li>'; 
	if (GET('component'))
		echo '<li> >> <a href="index.php' . menuParams() .
		'&mod=component&room=' . GET('room') .
		'&device=' . GET('device') .
		'&component=' . GET('component') .
		'">Komponente 1</a></li>';
?>