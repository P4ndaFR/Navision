<?php
	// Initialisation
	$bdd = new PDO('mysql:host=localhost;dbname=Navision;charset=utf8', 'Navision', 'Navision');

	include_once('modele.php');
	include_once('dijkstra.php');
	$points = get_points();
	$liaisons = get_liaisons();
	include_once('vue.php');
	if($_GET['page'] == 1)
	{
		include_once('scan.php');
	}
	else
	{
		include_once('vue.php');
	}
	//include_once('scan.php');
?>
