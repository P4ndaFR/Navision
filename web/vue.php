<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Navision</title>

	<!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen"/>

    <!-- Import Leafletjs -->
     <link rel="stylesheet" href="leaflet/leaflet.css" />
     <link rel="stylesheet" href="css/style.css" />

    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link type="text/css" rel="stylesheet" href="css/etage.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="html5-qrcode/lib/html5-qrcode.min.js"></script>
    <script type="text/javascript" src="html5-qrcode/lib/jsqrcode-combined.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
	<nav>
		<div class="nav-wrapper red">
            <a href="./" class="brand-logo center"><i class="material-icons">navigation</i></a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="index.php?page=scan">Où suis-je ?</a></li>
                <li><a href="index.php?page=poi">Points d'intérêts</a></li>
                <li><a href="index.php?page=batiment">Plan de l'école</a></li>
            </ul>
		</div>
	</nav>
