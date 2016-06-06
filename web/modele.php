<?php
	function get_points(){
		global $bdd;
		$req = $bdd->prepare('SELECT `CODE_BAT`,`NIVEAU`,`ID_PT`,`X`,`Y`,`NOM`,`DESCRIPTION`,`POI` FROM `POINT`;');
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
	function get_niveau($id){
  	global $bdd;
 		$req = $bdd->prepare('SELECT CODE_BAT,NIVEAU FROM `POINT` WHERE ID_PT = :id;');
 		$req->execute(array('id' => $id));
		$etage = $req->fetchALL();
		return $etage;
	}
	function get_etages($bat){
		global $bdd;
		$req = $bdd->prepare('SELECT ETAGE.`CODE_BAT`,`NIVEAU`,`NOM`,`URL_PLAN` FROM `ETAGE`,BATIMENTS WHERE ETAGE.CODE_BAT = BATIMENTS.CODE_BAT && NOM_BAT = :nom_bat;');
		$req->execute(array('nom_bat' => $bat));
		$etages = $req->fetchALL();
		return $etages;
	}
<<<<<<< HEAD
	function add_point($bat,$etage,$X,$Y,$nom,$description){
=======
	function add_point($bat,$etage,$X,$Y,$nom,$description,$poi){
		global $bdd;
		$req = $bdd->prepare('INSERT INTO `Navision`.`POINT` (`ID_PT`, `CODE_BAT`, `NIVEAU`, `X`, `Y`, `NOM`, `DESCRIPTION`, `POI`)
		VALUES (0, :bat, :etage, :X, :Y, :nom, :description, :poi);');
		$req->execute(array('bat'=> $bat, 'etage' => $etage, 'X'=> $X, 'Y'=>$Y, 'nom' => $nom, 'description'=> $description, 'poi' => $poi));
	}
	function modify_point($id,$X,$Y,$nom,$description,$poi){
>>>>>>> 0e156833f399e63faff593615b2a873f55ea2207
		global $bdd;
		$req = $bdd->prepare('UPDATE POINT SET X = :X, Y = :Y, NOM = :nom, DESCRIPTION = :description, POI = :poi WHERE ID_PT = :id;');
		$req->execute(array('id'=> $id, 'X'=> $X, 'Y'=>$Y, 'nom' => $nom, 'description'=> $description, 'poi' => $poi));
	}
	function remove_point($id){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM LIAISON WHERE `ID_PT` = :id || `POI_ID_PT` = :id ;');
		$req->execute(array('id'=> $id,'id'=> $id));
		$req = $bdd->prepare('DELETE FROM POINT WHERE ID_PT = :id;');
		$req->execute(array('id'=> $id));
	}
	function get_autoincrement(){
		global $bdd;
		$req = $bdd->prepare('SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "Navision" AND TABLE_NAME = "POINT";');
		$req->execute();
		$id = $req->fetchALL();
		return $id;
	}
	function add_route($src,$dest){
		global $bdd;
		$req = $bdd->prepare('INSERT INTO `Navision`.`LIAISON` (`POI_ID_PT`, `ID_PT`, `DISTANCE`) VALUES (:src, :dest, NULL);');
		$req->execute(array('src'=> $src, 'dest'=>$dest));
	}
?>
