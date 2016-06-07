<?php
	if(!isset($_SESSION))session_start();
	if(!isset($_SESSION['login']))$_SESSION=FALSE;
	$bdd = new PDO('mysql:host=home.apremel.fr;dbname=Navision;charset=utf8', 'Navision', 'Navision');
	include_once 'modele.php';
	include_once 'login.php';
	$points = get_points();
	$liaisons = get_liaisons();
	if(isset($_GET['etage'])){
		$strings = explode(',',$_GET['etage']);
		$_SESSION['etage']=$strings[0];
		$_SESSION['bat']=$strings[1];
	}
	if(isset($_POST['action'])){
		switch ($_POST['action']) {
			case 'add':
				if(!isset($_POST['nom'])){
					add_point($_SESSION['bat'],$_SESSION['etage'],$_POST['X'],$_POST['Y'],NULL,NULL,0);
					unset($_POST['X']);
					unset($_POST['Y']);
					header('Location: ./?page=add');
					exit;
				}else{
					add_point($_SESSION['bat'],$_SESSION['etage'],$_POST['X'],$_POST['Y'],$_POST['nom'],$_POST['description'],1);
					unset($_POST['nom']);
					unset($_POST['description']);
					unset($_POST['X']);
					unset($_POST['Y']);
					header('Location: ./?page=add');
					exit;
			}
				break;

			case 'modify':
				if(!isset($_POST['nom'])){
					modify_point($_GET['pt'],$_POST['X'],$_POST['Y'],NULL,NULL,0);
					unset($_POST['X']);
					unset($_POST['Y']);
					header('Location: ./?page=modify');
					exit;
				}else{
					modify_point($_GET['pt'],$_POST['X'],$_POST['Y'],$_POST['nom'],$_POST['description'],1);
					unset($_POST['nom']);
					unset($_POST['description']);
					unset($_POST['X']);
					unset($_POST['Y']);
					header('Location: ./?page=modify');
					exit;
			}
				break;
				case 'remove':
						remove_point($_GET['pt']);
						header('Location: ./?page=remove');
						exit;
					break;
				case 'route':
						add_route($_POST['src'],$_POST['dest']);
						header('Location: ./?page=route');
						exit;
					break;
	}
	}

	if(isset($_GET['page'])){
		switch ($_GET['page']){
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
			case 'route':
				include_once 'vue/route.php';
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
