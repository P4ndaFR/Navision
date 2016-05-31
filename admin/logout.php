<?php
	session_start();
	$_SESSION['login']=FALSE;
	unset($_SESSION['user']);
	header("location: ./");
?>
