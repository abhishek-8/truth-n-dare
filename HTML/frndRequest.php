<html>
	<head>
		<!-- Required meta tags always come first -->
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
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="../profile_options.js"></script>
	</head>
</html>
<?php
	// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

else {
	session_start();
$curr_id=$_SESSION['login_user'];
$sql="SELECT * from friends where user_id_2=$curr_id and status='pending'";

if($conn->query($sql)==TRUE) {

	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>=1) {
		while($row=mysqli_fetch_assoc($result)) {
					$frnd_id=$row['user_id_1'];
					
		if($row['user_id_1']==$curr_id)
			$frnd_id=$row['user_id_2'];
		
		$sql="SELECT f_name,l_name from users WHERE user_id=$frnd_id";

			if($conn->query($sql)==TRUE) {
				$res=mysqli_query($conn,$sql);
				$row1=mysqli_fetch_assoc($res);
				echo $row1['f_name'].' '.$row1['l_name'].'<a href="cancel_request.php?id='.$frnd_id.'"><span><i class="material-icons right">not_interested</i></span></a><a href="accept_request.php?id='.$frnd_id.'"><span style="color:green;"><i class="material-icons right">done</i></span></a>'.'<br>';
			}

		}
		}
		else
			echo "No pending requests.";
}
}
$conn->close();
?>