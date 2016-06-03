<?php
	function get_points(){
		global $bdd;
		$req = $bdd->prepare('SELECT `CODE_BAT`,`NIVEAU`,`ID_PT`,`X`,`Y`,`NOM`,`DESCRIPTION`,`QR_CODE`,`URL_QRCODE` FROM `POINT`;');
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
		$req = $bdd->prepare('SELECT `CODE_BAT`,`NIVEAU`,`NOM`,`URL_PLAN` FROM `ETAGE`,BATIMENTS WHERE BATIMENTS.CODE_BAT = PLANS.CODE_BAT && NOM_BAT = :nom_bat;');
		$req->execute(array('nom_bat' => $bat));
		$plans = $req->fetchALL();
		return $plans;
	}
/*	function add_point($X,$Y){
		global $bdd;
		$req = $bdd->prepare('INSERT INTO `Navision`.`POINT` (`ID_PT`, `CODE_BAT`, `URL_PLAN`, `X`, `Y`, `ETAGE`, `NOM`, `DESCRIPTION`, `QR_CODE`, `URL_QRCODE`) VALUES ('', '', '', ':X', ':Y', '', NULL, NULL, NULL, NULL);');
		$req->execute(array('X' => $X,'Y' => $Y));
	}*/
?>
