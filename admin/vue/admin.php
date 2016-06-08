<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Navision</title>

	<link type="text/css" rel="stylesheet" href="css/style.css">
	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
	<script>  $( document ).ready(function(){  $(".button-collapse").sideNav(); }) </script>
	<nav>
		<div class="nav-wrapper red">
			<a href="" class="brand-logo center">Navision</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
       			<li><a href="./logout.php" class="waves-effect waves-light btn white red-text">logout</a></li>
     		</ul>
		</div>
	</nav>
	<div class="row" >
		<form class="col l12 offset-l4" id="container2">
			<div class="row" >
				<div class="input-field col s4" >
					<select name="etage" id="id">
						<?php
							foreach(get_bats() as $bat){
								echo "<optgroup label=\"".$bat['NOM_BAT']."\"value=\"".$bat['NOM_BAT']."\">";
								echo $bat['NOM_BAT'];
								foreach(get_etages($bat['NOM_BAT']) as $etage){
									echo "<option class=\"red red-text\" value=\"".$etage['NIVEAU'].",".$bat['CODE_BAT']."\">".$etage['NOM']."</option>";
								}
								echo "</optgroup>";
							}
						?>
					</select>
					<label>Choisissez un étage</label>
				</div>
			</div>	
			<div class="row" >
				<div class="col l4 center">
					<button class="btn waves-effect waves-light red" type="submit" name="page" value="etage">Sélectionner<i class="material-icons right">send</i></button>
				</div>
			</div>
		</form>
	</div>
	<script>
	$(document).ready(function() {
        	$('select').material_select();
	});
	</script>
</body>
</html>
