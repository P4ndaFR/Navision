<?php
<<<<<<< HEAD
	$bdd = new PDO('mysql:host=localhost;dbname=Navision;charset=utf8', 'Navision', 'Navision');
	//include_once('vue.php');
//	include_once('modele.php');
=======
<<<<<<< HEAD
	// Initialisation
	$bdd = new PDO('mysql:host=localhost;dbname=Navision;charset=utf8', 'Navision', 'Navision');
=======
	$bdd = new PDO('mysql:host=home.apremel.fr;dbname=Navision;charset=utf8', 'Navision', 'Navision');
	//include_once('vue.php');
>>>>>>> 7c799e89a92da7dadfbbf9367ccad01e4467d480
	include_once('modele.php');
>>>>>>> d3e02f2836ef91f8af8f4b8195209690cdd112f2
	include_once('dijkstra.php');
	include_once('../admin/modele.php');
	$points = get_points();
	$liaisons = get_liaisons();
<<<<<<< HEAD

	include_once('vue.php');
	//include_once('scan.php');
=======
>>>>>>> 7c799e89a92da7dadfbbf9367ccad01e4467d480
?>
<pre>
<?php print_r(get_user())?>
</pre>
