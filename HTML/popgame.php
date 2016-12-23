<?php
include('login_details.php');
	// Create connection
$conn = new mysqli("localhost", "root", "", "db");


// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else {

	$gid=$_SESSION['grp_id'];

$sql="DELETE from game where grp_id=$gid and rep_id=$curr_user_id";
    if($conn->query($sql)==TRUE) 
     {}
    else { echo "ERROR :".$sql."<br>".$conn->error;}
header('Location:main_page.php');   
} 
 $conn->close();   
?>    