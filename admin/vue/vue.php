<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Navision</title>

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
		<div class="nav-wrapper">
            <a href="" class="brand-logo center">Navision</a>
		</div>
	</nav>
	<div class="row">
    <form class="col s12 m12 l12 offset-m2 offset-l4" method="post">
      <div class="row">
        <div class="input-field col s12 m8 l4">
          <input placeholder="login" name="user" id="user" type="text">
          <label for="user">User</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m8 l4">
          <input name="password" id="password" type="password">
          <label for="password">Password</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="page">Submit
      <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
</body>
</html>
