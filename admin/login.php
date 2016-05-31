<?php
	function login($users){
		$user = $_POST['user'];
		$passwd = $_POST['password'];
		foreach($users as list($l_user, $l_passwd)){
			if($user == $l_user && $passwd == $l_passwd){
				$_SESSION['user']=$user;
				unset($_SESSION['logout']);
				return TRUE;
			}
		}
		return FALSE;
	}
?>
