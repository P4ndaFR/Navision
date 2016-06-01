<?php
	// Initialisation
	$bdd = new PDO('mysql:host=home.apremel.fr;dbname=Navision;charset=utf8', 'Navision', 'Navision');

	include_once('modele.php');
	$points = get_points();
	$liaisons = get_liaisons();

	include_once('dijkstra.php');
	include_once('vue.php');

	if(isset($_GET['page']))
	{
		switch($_GET['page'])
		{

			case 'etage':
				if(isset($_GET['drop']))
				{
					switch ($_GET['drop']) {
						case 1:
							
							break;
						
						default:
							# code...
							break;
					}	
				}
					include_once('etage.php');
			break;
			case 'scan':
				include_once('scan.php');
			break;
		}
	}
	else
	{
		include_once('accueil.php');
	}
?>