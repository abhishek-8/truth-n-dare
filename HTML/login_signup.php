<?php 
session_start();

//user already logged in ,trying to go to login page.Gets redirected to his profile.
if( isset($_SESSION['login_user']) )
header('Location:profile.php');

include('login.php');
include('signup.php');

?>

<!DOCTYPE html>
<html lang="">
	<head>
		<!-- Required meta tags always come first -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Truth-n-Dare</title>
		<!-- Compiled and minified CSS 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">-->
		<!--Animate Css -
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">  -->
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"/>
		<!--Import animate.css-->
		<link type="text/css" rel="stylesheet" href="../animate.css" />
		<!--Impost custom css-->
		<link type="text/css" rel="stylesheet" href="../style.css">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--Import jQuery before materialize.js
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>  -->
		<script type="text/javascript" src="js/materialize.min.js"></script>

		
		<script src="../jquery-2.1.1.min.js"></script>
		<!--Import jQuery for hide() and show()-->
		<script type="text/javascript" src="../hide.js"></script>
		 

		
	</head>
	<body id="home" background="pexels-photo.jpg">
		<!-- sign up area initially hidden -->
		<div class="sgn z-depth-5 card-panel hoverable" style="z-index:1;">
			<form name="sign_up" action="" method="post">
				<div class="row">
					<div class="input-field col l6">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="f"  placeholder="firstname">
					</div>
					<div class="input-field col l6">
						<input type="text" name="l"  placeholder="lastname">
					</div>
				</div>
				<div class="row">
					<input class="with-gap" type="radio" value="male" name="gender" id="male">
					<label for="male">male</label>
					<input class="with-gap" type="radio" value="female" name="gender" id="female">
					<label for="female">female</label>
				</div>
				<div class="row">
					<input type="text" name="username" placeholder="username">
				</div>
				<div class="row">
					<p>DOB</p>
					<input type="date" name="dob" placeholder="dob(dd-mm-yyyy)">
				</div>
				<div class="row">
					<p>Choose email</p>
					<input class="validate" type="email" name="email" placeholder="xyz@gmail.com">
				</div>
				<div class="row">
					<p>Choose password</p>
					<input type="password" name="password" placeholder="password">
					<!--<br>
					<p>Confirm password</p>
					<input type="password" name="cpass"> -->
					
				</div>
				<div class="center">
					<input style="float:left" type="submit" name="sign" value="Submit" class="red lighten-2 btn" >
					<button style="float:right" class="cancel btn" onclick="return false">Cancel</button>
				</div>
			</form>
		</div>
		<!-- login + (home screen) -->
		<div class="login">
			<nav id="home_navbar">
				<h1 id="text_slide">
				<ul>
					<li class="animated bounceInLeft">Truth</li>
					<li class="animated rotateIn">-n-</li>
					<li class="animated bounceInRight">dare</li>
				</ul>
				</h1>
			</nav>
		
			<div class="row" id="home_content">
				<div class="col l6 m6 s12" >
					<div id="instrutions">
						<p><h4 class="red-text text-lighten-2">Instructions</h4></p>
						<ol>
							<h5><li>Join a group</li>
							<li>Spin the bottle</li>
							<li>Ask questions</li></h5>
						</ol>
					</div>
				</div>
				<div class="col l6 m6 s12">
					<div class="card-panel hoverable" id="login" >
						<form action="" method="post">
							<input type="text" name="username"  placeholder="username">
							<input type="password" name="password"  placeholder="password">
							<input type="submit" name="submit" value="Login" class=" red lighten-2 btn">
							<span><?php echo $error; ?></span>
						</form>
						<p>Don't have an account?
							<button class="sgn_up btn">
							Sign Up
							</button>
						</p>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>