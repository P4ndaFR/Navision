<?php
	$bdd = new PDO('mysql:host=home.apremel.fr;dbname=Navision;charset=utf8', 'Navision', 'Navision');
	//include_once('vue.php');
	include_once('modele.php');
	include_once('dijkstra.php');
	$points = get_points();
	$liaisons = get_liaisons();
?>
<pre>
<?php print_r(get_user())?>
</pre>
