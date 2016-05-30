<?php
	// Initialisation
	$bdd = new PDO('mysql:host=localhost;dbname=Navision;charset=utf8', 'Navision', 'Navision');

	include_once('modele.php');
	$points = get_points();
	$liaisons = get_liaisons();

	include_once('dijkstra.php');
	include_once('vue.php');
	
	switch(isset($_GET['page']))
	{
		case 'scan':
			include_once('scan.php');
		break;
		default:
			include_once('accueil.php');
		break;
	}
?>