<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Navision</title>

	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen"/>
		<link type="text/css" rel="stylesheet" href="css/etage.css"/>
		<link type="text/css" rel="stylesheet" href="leaflet/leaflet.css"/>


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
			<a href="./?page=etage" class="waves-effect waes-light btn left">previous</a>
		</div>
	</nav>
		<div class="row">
			<div class="col s8">
				<script type="text/javascript" src="js/add.js"></script>
				<script type="text/javascript" src="leaflet/leaflet.js"></script>
				<script type="text/javascript" src="leaflet/leaflet.sprite.js"></script>
								<div class="card" id="map">
												<?php
														echo '<table id="points" style="display:none;">';
														for($i = 0 ; $i < count($points) ; $i++)
														{
																echo '<tr>';
																echo '<td>'.$points[$i]['X'].'</td>';
																echo '<td>'.$points[$i]['Y'].'</td>';
																echo '<td>'.$points[$i]['ID_PT'].'</td>';
																echo '<td>'.$points[$i]['NOM'].'</td>';
																echo '<td>'.$points[$i]['DESCRIPTION'].'</td>';
																echo '<td>'.$points[$i]['CODE_BAT'].'</td>';
																echo '<td>'.$points[$i]['NIVEAU'].'</td>';
																echo '</tr>';
														}
														echo '</table>';
														//echo '<pre>'.print_r($points).'</pre>';
												?>
												<table id="session" style="display:none;">
													<tr>
														<td><?php echo $_SESSION['bat']?></td>
														<td><?php echo $_SESSION['etage']?></td>
													</tr>
												</table>

												<div class="col s12">
														<div id="mapid"></div>
												</div>
								</div>
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
						<form method="post">
							<div class="row">
								<div class="input-field col s4">
									<input placeholder="Abscise X" id="X1" name="X" type="text" class="validate X">
									<label for="X1">X:</label>
								</div>
								<div class="input-field col s4">
									<input placeholder="Ordonné Y" id="Y1" name="Y" type="text" class="validate Y">
									<label for="Y1">Y:</label>
								</div>
								<div class="input-field col s4">
									<input placeholder="Nom" id="nom" name="nom" type="text" class="validate">
									<label for="nom">Nom:</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea id="description" name="description" class="materialize-textarea"></textarea>
									<label for="description">Description du point d'intérêt</label>
								</div>
							</div>
							<div class="row">
								<div class="col offset-s4">
									<button class="btn waves-effect waves-light" type="submit" name="action" value="add">Submit
										<i class="material-icons right">send</i>
									</button>
								</div>
							</div>
						</form>
					</div>
					<div id="D2" class="col s12" style="display:none">
						<form method="post">
							<div class="row">
								<div class="input-field col s6 offset-s3">
									<input placeholder="Abscise X" id="X2" name="X" type="text" class="validate X">
									<label for="X2">X:</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6 offset-s3">
									<input placeholder="Ordonné Y" id="Y2" name="Y" type="text" class="validate Y">
									<label for="Y2">Y:</label>
								</div>
							</div>
							<div class="row">
								<div class="col offset-s4">
									<button class="btn waves-effect waves-light" type="submit" name="action" value="add">Submit
										<i class="material-icons right">send</i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
