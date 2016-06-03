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
	function get_etages($bat){
		global $bdd;
		$req = $bdd->prepare('SELECT ETAGE.`CODE_BAT`,`NIVEAU`,`NOM`,`URL_PLAN` FROM `ETAGE`,BATIMENTS WHERE ETAGE.CODE_BAT = BATIMENTS.CODE_BAT && NOM_BAT = :nom_bat;');
		$req->execute(array('nom_bat' => $bat));
		$etages = $req->fetchALL();
		return $etages;
	}
	function add_point($bat,$etage,$X,$Y,$nom,$description){
		global $bdd;
		$req = $bdd->prepare('INSERT INTO `Navision`.`POINT` (`ID_PT`, `CODE_BAT`, `NIVEAU`, `X`, `Y`, `NOM`, `DESCRIPTION`, `QR_CODE`, `URL_QRCODE`)
		VALUES (0, :bat, :etage, :X, :Y, :nom, :description, NULL, NULL);');
		$req->execute(array('bat'=> $bat, 'etage' => $etage, 'X'=> $X, 'Y'=>$Y, 'nom' => $nom, 'description'=> $description));
	}
	function modify_point($id,$X,$Y,$nom,$description){
		global $bdd;
		$req = $bdd->prepare('UPDATE POINT SET X = :X, Y = :Y, NOM = :nom, DESCRIPTION = :description WHERE ID_PT = :id;');
		$req->execute(array('id'=> $id, 'X'=> $X, 'Y'=>$Y, 'nom' => $nom, 'description'=> $description));
	}
	function remove_point($id){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM POINT WHERE ID_PT = :id;');
		$req->execute(array('id'=> $id));
	}
?>
