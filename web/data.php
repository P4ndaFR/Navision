<?php
	session_start();
	$json = json_encode($_SESSION['points']);
	echo $json;
?>