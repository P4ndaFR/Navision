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
	<nav>
		<div class="nav-wrapper red">
			<a href="./" class="brand-logo center">Navision</a>
			<ul id="nav-mobile" class="left hide-on-med-and-down">
       			<li><a href="./" class="white red-text waves-effect waves-light btn">previous</a></li>
     		</ul>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
       			<li><a href="./logout.php" class="waves-effect waves-light btn white red-text">logout</a></li>
     		</ul>
		</div>
	</nav>
		<div class="row">
			<div class="col s8">
				<script type="text/javascript" src="js/route.js"></script>
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
														<td><?php if(isset($_GET['pt'])){echo$_GET['pt'];}else{echo'0';}?></td>
													</tr>
												</table>
												<?php
														echo '<table id="liaisons" style="display:none;">';
														for($i = 0 ; $i < count($liaisons) ; $i++)
														{
																echo '<tr>';
																echo '<td>'.$liaisons[$i][0].'</td>';
																echo '<td>'.$liaisons[$i][1].'</td>';
																echo '</tr>';
														}
														echo '</table>';
														//echo '<pre>'.print_r($points).'</pre>';
												?>

												<div class="col s12">
														<div id="mapid"></div>
												</div>
								</div>
			</div>
			<div class="col s4">
				<form method="post">
					<div class="row">
						<div class="input-field col s12">
							<select name="src" id="src">
								<?php
									foreach(get_points() as $point){
										echo "<option>".$point['ID_PT']."</option>";
									}
								?>
							</select>
							<label>Choisir le point source</label>
						</div>
						<div class="row">
							<div class="input-field col s12">
							<select name="dest" id="dest">
								<?php
									foreach(get_points() as $point){
										echo "<option>".$point['ID_PT']."</option>";
									}
								?>
							</select>
							<label>Choisir le point source</label>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col s2 offset-s5">
							<button class="btn red white_text waves-effect waves-light" type="submit" name="action" value="route">Submit
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
			</div>
		</div>
	</body>
</html>
