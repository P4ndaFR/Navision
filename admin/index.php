<?php
	if(!isset($_SESSION))session_start();
	if(!isset($_SESSION['login']))$_SESSION=FALSE;
	$bdd = new PDO('mysql:host=localhost;dbname=Navision;charset=utf8', 'Navision', 'Navision');
	include_once 'modele.php';
	include_once 'login.php';
	if(isset($_POST['user']) && isset($_POST['password'])){
		$_SESSION['login']=login(get_users());
	}
	if($_SESSION['login'])include_once 'vue/admin.php';
	else include_once 'vue/vue.php';
?>
<pre>
	<?php print_r($_SESSION)?>
</pre>