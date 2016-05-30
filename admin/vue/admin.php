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
			<a href="" class="brand-logo center">Navision</a>
			<a href="./logout.php" class="waves-effect waves-light btn right">logout</a>
		</div>
	</nav>

	<form>
		<div class="row">
			<div class="input-field col s4 offset-s4">
				<select name="etage" id="id">
					<?php
						foreach(get_bats() as $bat){
							echo "<optgroup label=\"".$bat['NOM_BAT']."\">";
							echo $bat['NOM_BAT'];
							foreach(get_plans($bat['NOM_BAT']) as $plan){
								echo "<option value=\"".$plan['NOM']."\">".$plan['NOM']."</option>";
							}
							echo "</optgroup>";
						}
					?>
				</select>
				<label>Choisissez un étage</label>
			</div>
		</div>
		<div class="row">
			<div class="col s2 offset-s5">
				<button class="btn waves-effect waves-light" type="submit" name="action" value="plan">Submit
					<i class="material-icons right">send</i>
				</button>
			</div>
		</div>
	</form>
	<script>
	$(document).ready(function() {
        	$('select').material_select();
	});
	</script>
</body>
</html>
