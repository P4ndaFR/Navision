<?php
	session_start();
	// Initialisation
	$bdd = new PDO('mysql:host=home.apremel.fr:3306;dbname=Navision;charset=utf8', 'Navision', 'Navision');

	include_once('modele.php');
	include_once('dijkstra.php');
	$points = get_points();
	$liaisons = get_liaisons();
	if(isset($_GET['etage'])){
		$strings = explode(',',$_GET['etage']);
		$_SESSION['etage']=$strings[0];
		$_SESSION['bat']=$strings[1];
	}
	if(isset($_GET['selectedPoint'])){
		$array = get_niveau($_GET['selectedPoint']);
		$_SESSION['source']=$_GET['selectedPoint'];
		$_SESSION['bat']=$array[0][0];
		$_SESSION['etage']=$array[0][1];
	}

	include_once('dijkstra.php');
	include_once('vue.php');

	if(isset($_GET['page']))
	{
		switch($_GET['page'])
		{

			case 'etage':
			if(isset($_SESSION['source']) && isset($_SESSION['dest'])){
				find_path($_SESSION['source'],$_SESSION['dest']);
				$_SESSION['path']=read_path();
				}
				include_once('etage.php');
			break;
			case 'batiment':
				include_once('batiment.php');
			break;
			case 'scan':
				if(isset($_GET['dest']))$_SESSION['dest']=$_GET['dest'];
				include_once('scan.php');
			break;
			case 'poi':
				unset($_SESSION['source']);
				unset($_SESSION['dest']);
				include_once('poi.php');
			break;
		}
	}
	else
	{
		include_once('accueil.php');
	}
?>
