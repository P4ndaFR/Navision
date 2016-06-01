<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Navision</title>

	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
	<script>  $( document ).ready(function(){  $(".button-collapse").sideNav(); }) </script>
	<nav>
		<div class="nav-wrapper">
			<a href="./" class="waves-effect waves-light btn left">previous</a>
			<a href="./" class="brand-logo center">Navision</a>
			<a href="./logout.php" class="waves-effect waves-light btn right">logout</a>
		</div>
	</nav>
	<div class="row">
		<div class="col s8">
			<p>salut</p>
		</div>
		<div class="col s4">
			<div class="row">
				<a href="./?action=add" class="col waves-effect waves-light btn-large s12"><i class="material-icons left">location_on</i>Ajouter un Point</a>
			</div>
			<div class="row">
				<a href="./?action=modify" class="col waves-effect waves-light btn-large s12"><i class="material-icons left">mode_edit</i>Modifier un Point</a>
			</div>
			<div class="row">
				<a href="./?etage=action=remove" class="col waves-effect waves-light btn-large s12"><i class="material-icons left">location_off</i>Supprimer un Point</a>
			</div>
		</div>
	</div>
</body>
</html>
