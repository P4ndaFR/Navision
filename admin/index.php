<?php
	if(!isset($_SESSION))session_start();
	if(!isset($_SESSION['login']))$_SESSION=FALSE;
	$bdd = new PDO('mysql:host=localhost;dbname=Navision;charset=utf8', 'Navision', 'Navision');
	include_once 'modele.php';
	include_once 'login.php';
	$points = get_points();
	if(isset($_GET['etage'])){
		$strings = explode(',',$_GET['etage']);
		$_SESSION['etage']=$strings[0];
		$_SESSION['bat']=$strings[1];
	}
	if(isset($_POST['X'])){
		if(!isset($_POST['nom'])){
			add_point($_SESSION['bat'],$_SESSION['etage'],$_POST['X'],$_POST['Y'],NULL,NULL,NULL,NULL);
			unset($_POST['X']);
			unset($_POST['Y']);
			header('Location: ./?action=add');
			exit;
		}else{
			add_point($_SESSION['bat'],$_SESSION['etage'],$_POST['X'],$_POST['Y'],$_POST['nom'],$_POST['description'],NULL,NULL);
			unset($_POST['nom']);
			unset($_POST['description']);
			unset($_POST['X']);
			unset($_POST['Y']);
			header('Location: ./?action=add');
			exit;
		}
	}
	if(isset($_GET['action'])){
		switch ($_GET['action']){
			case 'etage':
				include_once 'vue/plans.php';
			break;
			case 'add':
				include_once 'vue/add.php';
			break;
			case 'modify':
				include_once 'vue/modify.php';
			break;
			case 'remove':
				include_once 'vue/remove.php';
			break;
		}
	}
	else{
		if(isset($_POST['user']) && isset($_POST['password'])){
			$_SESSION['login']=login(get_users());
		}
		if($_SESSION['login'])include_once 'vue/admin.php';
		else include_once 'vue/vue.php';
	}
?>
<pre>
	<?php print_r($_GET);
	print_r($_SESSION);
	print_r($_POST);
	print_r($points)?>
</pre>
