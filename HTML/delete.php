<?php
	// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else{
	session_start();
	$curr_user_id=$_SESSION['login_user'];
	$sql1="DELETE from group_members_id where members_id=$curr_user_id";
	$sql2="DELETE from friends where user_id_1=$curr_user_id or user_id_2=$curr_user_id";
	$sql3="DELETE from users_blocked where user_id=$curr_user_id";
	$sql4="DELETE from users where user_id=$curr_user_id";
	if($conn->query($sql1)==TRUE) {
		if($conn->query($sql2)==TRUE) {
			if($conn->query($sql3)==TRUE) {
				if($conn->query($sql4)==TRUE) {
		
					}
				else
					echo "ERROR :".$sql."<br>".$conn->error;
		
				}
			else
				echo "ERROR :".$sql."<br>".$conn->error;
		
			}
		else
			echo "ERROR :".$sql."<br>".$conn->error;	
		}
	else
		echo "ERROR :".$sql."<br>".$conn->error;

$conn->close();

}
session_destroy();
header("Location: login_signup.php"); // Redirecting To Home Page
?>