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
	function get_users(){
		global $bdd;
		$req = $bdd->prepare('SELECT `USER`,`PASSWORD` FROM `ADMINISTRATEUR`;');
		$req->execute();
		$user = $req->fetchAll();
		return $user;
	}
	function get_bats(){
		global $bdd;
		$req = $bdd->prepare('SELECT NOM_BAT,CODE_BAT FROM BATIMENTS;');
		$req->execute();
		$bats = $req->fetchALL();
		return $bats;
	}
	function get_plans($bat){
		global $bdd;
		$req = $bdd->prepare('SELECT URL_PLAN,NOM,NOM_BAT FROM PLANS,BATIMENTS WHERE BATIMENTS.CODE_BAT = PLANS.CODE_BAT && NOM_BAT = :nom_bat;');
		$req->execute(array('nom_bat' => $bat));
		$plans = $req->fetchALL();
		return $plans;
	}
?>
