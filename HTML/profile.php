<?php
include('login_details.php');
//Redirect to home page if trying to open profile after the session is destroyed(i.e logged out).
if(!isset($_SESSION['login_user']))
	header('Location:login_signup.php');
include('find.php');
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<!-- Required meta tags always come first -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Profile</title>
		<!-- Compiled and minified CSS 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css"> -->
		<!--Animate Css -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<!--Impost custom css-->
		<link type="text/css" rel="stylesheet" href="../style.css">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--Import jQuery before materialize.js
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
		<script src="../jquery-2.1.1.min.js"></script> 
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="../profile_options.js"></script>



	</head>
	<body id="profile">
		<nav class="green" id="pro_nav">
			<h1 class="brand-logo">Truth-n-dare</h1>
			<ul class="right">
				<li><a href="groups.php">Play</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
		<div class="row">
			<div class="card-panel green lighten-1 col l2" id="dp">
				<img src="../jc.jpg" id="def_dp"></img>
				<p>Username : <?php echo $un; ?></p>
			</div>
			
			<div class="card-panel col l6 m6 s6 push-l1" style="background-color:transparent;">
				
				<a class="btn" onclick="b()">Basic Details</a>
				<a class="btn" onclick="f()">Friends</a>
				<a class="btn" onclick="g()">Game Stats</a>
				<p id="change">
					<!-- Area to display user info according to the button pressed  -->
				</p>
			</div>
			<div class="card-panel col l2 push-l2">
				<div class="row">
				<div class="col l10">
				<form method="POST" action="">
				<input type="search" placeholder="add a friend" name="search">
				</form>
				</div>
				<div class="col l2">
					<i class="material-icons">search</i>
				</div>
					
				
				</div>
				<span><?php echo $err; ?></span>
			</div>
		</div>
		
		<div class="row">
			<div class="card-panel col l6 push-l3" >
				<a class="btn">Account Info</a>
				<ul>
					<li>Email : <span><?php echo $em;?></span></li>
					<li>Username : <span><?php echo $un; ?></span></li>
					<li><a class="btn red right lighten-2" onclick="confirmation()">Delete account</a></li>
				</ul>
			</div>

			<div class="card-panel col l2 push-l4">
				<a class="btn" onclick="fr()">Friend Requests</a>
				<p id="fr">
					<!-- Area to display friend requests  -->
				</p>
			</div>
		</div>
		
	</body>
</html>