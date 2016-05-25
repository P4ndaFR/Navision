<?php
	function get_points(){
		global $bdd;
		$req = $bdd->prepare('SELECT `ID_PT`,`CODE_BAT`,`X`,`Y`,`ETAGE`,`NOM`,`DESCRIPTION` FROM POINT;');
		$req->execute();
		$points = $req->fetchAll();
		return $points;
	}
	function get_liaisons(){
		global $bdd;
		$req = $bdd->prepare('SELECT `POI_ID_PT` AS source, `ID_PT` AS destination FROM `LIAISON`;');
		$req->execute();
		$liaisons = $req->fetchAll();
		return $liaisons;
	}
?>
