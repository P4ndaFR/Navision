<?php
	session_start();
	
	$tabSize = count($_SESSION['points']);
	$_SESSION['points'][$tabSize]=$_SESSION['bat'];
	$_SESSION['points'][$tabSize+1]=$_SESSION['etage'];
	

	$_SESSION['points'][$tabSize+2]=$_SESSION['selectedPoint'];
	$_SESSION['points'][$tabSize+3]=$_SESSION['location'];
	
	
	$json = json_encode($_SESSION['points']);
	echo $json;
?>