<?php
	// Initialisation
	$bdd = new PDO('mysql:host=home.apremel.fr;dbname=Navision;charset=utf8', 'Navision', 'Navision');

	include_once('modele.php');
	$points = get_points();
	$liaisons = get_liaisons();
	if(isset($_GET['etage'])){
		$strings = explode(',',$_GET['etage']);
		$_SESSION['etage']=$strings[0];
		$_SESSION['bat']=$strings[1];
	}
	if(isset($_GET['selectedPoint'])){
		$array = get_niveau($_GET['selectedPoint']);
		$_SESSION['bat']=$array[0][0];
		echo $array[0][0];
		$_SESSION['etage']=$array[0][1];
		echo $array[0][1];
	}

	include_once('dijkstra.php');
	include_once('vue.php');

	if(isset($_GET['page']))
	{
		switch($_GET['page'])
		{

			case 'etage':
				include_once('etage.php');
			break;
			case 'batiment':
				include_once('batiment.php');
			break;
			case 'scan':
				include_once('scan.php');
			break;
			case 'poi':
				include_once('poi.php');
			break;
		}
	}
	else
	{
		include_once('accueil.php');
	}
?>
