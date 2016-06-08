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
			<script type="text/javascript" src="js/etage.js"></script>
			<script type="text/javascript" src="js/qrcode.js"></script>
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
		<div class="col s4" id="container3">
			<div class="row">
				<a href="./?page=add" class="col waves-effect waves-light btn-large s12 red"><i class="material-icons left">location_on</i>Ajouter un Point</a>
			</div>
			<div class="row">
				<a href="./?page=modify" class="col waves-effect waves-light btn-large s12 red"><i class="material-icons left">mode_edit</i>Modifier un Point</a>
			</div>
			<div class="row">
				<a href="./?page=remove" class="col waves-effect waves-light btn-large s12 red"><i class="material-icons left">location_off</i>Supprimer un Point</a>
			</div>
			<div class="row">
				<a href="./?page=route" class="col waves-effect waves-light btn-large s12 red">Routage</a>
			</div>
			<div id="qrcode"><p>Sélectionner un point pour avoir le qrcode a imprimer</p></div>
		</div>
	</div>
</body>
</html>
