<?php

	// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

else{
	session_start();
	$curr_id=$_SESSION['login_user'];
	if (isset($_GET['id']) ) 
		$frnd_id = $_GET['id'];

$sql="DELETE from friends where user_id_1=$frnd_id AND user_id_2=$curr_id";
if($conn->query($sql)==TRUE) {
header('Location:profile.php');
}
else
	echo "ERROR :".$sql."<br>".$conn->error;
}
$conn->close();
?>