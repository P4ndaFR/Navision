<?php
	$bdd = new PDO('mysql:host=localhost;dbname=Navision;charset=utf8', 'Navision', 'Navision');
	include_once('vue.php');
	include_once('modele.php');
	include_once('dijkstra.php');
	$points = get_points();
	$liaisons = get_liaisons();

	passthru("java -jar Navision.jar 11 12");
	passthru("java -jar Navision.jar 11");

?>
