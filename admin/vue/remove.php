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
	<script type="text/javascript">
	function showRadio() {
		var n = document.form.btnr.length;
		for(i=1;i<=n;i++) {
			if(document.getElementById('choix'+i).checked == true) {
				document.getElementById('D'+i).style.display = "block";
			} else {
				document.getElementById('D'+i).style.display = "none";
			}
		}
	  }
	</script>
	<nav>
		<div class="nav-wrapper">
			<a href="./" class="brand-logo center">Navision</a>
			<a href="./logout.php" class="waves-effect waves-light btn right">logout</a>
			<a href="./?etage=<?php echo $_GET['etage']?>&action=plan" class="waves-effect waes-light btn left">previous</a>
		</div>
	</nav>
		<div class="row">
			<div class="col s8">
				<p class="col s12">salut<p>
			</div>
			<div class="col s4">
				<form name="form">
					<div class="row">
						<p class="col s6">
						      <input class="with-gap" name="btnr" type="radio" id="choix1" onclick="showRadio()"/>
						      <label for="choix1">Point d'intérêt</label>
						</p>
						<p class="col s6">
					 		<input class="with-gap" name="btnr" type="radio" id="choix2" onclick="showRadio()"/>
							<label for="choix2">Point de routage</label>
						</p>
					</div>
				</form>
				<div class="row">
					<div id="D1" class="col s12" style="display:none">
						<form class="col s12">
							<div class="row">
								<div class="input-field col s4">
									<input placeholder="Abscise X" id="X" type="text" class="validate">
									<label for="X">X:</label>
								</div>
								<div class="input-field col s4">
									<input placeholder="Ordonné Y" id="Y" type="text" class="validate">
									<label for="Y">Y:</label>
								</div>
								<div class="input-field col s4">
									<input placeholder="Nom" id="nom" type="text" class="validate">
									<label for="nom">Nom:</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="description" class="materialize-textarea"></textarea>
									<label for="description">Description du point d'intérêt</label>
								</div>
							</div>
						</form>
					</div>
					<div id="D2" class="col s12" style="display:none">
						<form>
							<div class="row">
								<div class="input-field col s6 offset-s2">
									<input placeholder="Abscise X" id="X" type="text" class="validate">
									<label for="X">X:</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6 offset-s2">
									<input placeholder="Ordonné Y" id="Y" type="text" class="validate">
									<label for="Y">Y:</label>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
