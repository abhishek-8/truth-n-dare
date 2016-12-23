<?php
include('login_details.php');
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
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script src="../jquery-2.1.1.min.js"></script> 
		<script src="../main_page.js"></script>


		
	</head>

	<body id="grp_enter">
		<nav class="green">
               <h1 class="brand-logo">Truth-n-dare</h1>
               <ul class="right">
                    <li>
                    <div class="chip">
                    <img src="../jc.jpg">
                    <?php echo $un; ?>
                    </div>
                    </li>

                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
               </ul>
          </nav>
		<div class="row">

			<div class="col s4  card-panel" id="existing">
				<h5 class="center">Existing Groups</h5>
				<div id="list" class="center"></div>
			</div>

			<div class="col s5 card-panel" id="cng">
				<h5 class="center">Create a new Group</h5>

					<form method="POST" name="grp_name" onsubmit="return getname()">
						<input type="text" placeholder="Group name" name="gname">
					</form>

					<form method="POST" name="members" onsubmit="return add()" id="members">
						<input type="text" placeholder="Members to add" name="memun">
					</form>
					<p id="added"></p>
					<div class="center"><a class="btn" href="main_page.php">Submit</a></div>
					<br>
			</div>
			
		</div>
	</body>
</html>