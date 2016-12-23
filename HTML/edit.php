<html>
	<head>
		<!-- Required meta tags always come first --
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
		<!--Animate Css -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<!--Impost custom css-->
		<link type="text/css" rel="stylesheet" href="../style.css">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="../profile_options.js"></script>
	</head>
</html>
<?php
include('login_details.php');
echo '<form action="updateinfo.php" method="POST" style="background:#e3f2fd">
			First name :<input type="text" name="f_name" value='.$fn.'><br>
			Last name :<input type="text" name="l_name" value='.$ln.'><br>
			DOB :<input type="date" name="DOB" value='.$dob.'><br>
			<input type="SUBMIT" value="DONE" class="btn"><i class="material-icons right">send</i>
      </form>';
?>