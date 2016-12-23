<?php

$err="";
if(isset($_POST['search'])) {
$find=$_POST['search'];
	// Create connection
$conn = new mysqli("localhost", "root", "", "db");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else {

$sql="SELECT * from users where username='$find'";

if($conn->query($sql)==TRUE) {
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_assoc($result);
		
		$current_id=$_SESSION['login_user'];
		$frnd_id=$row['user_id'];

		$test ="SELECT * from friends where ( user_id_1=$current_id and user_id_2=$frnd_id ) or ( user_id_2=$current_id and user_id_1=$frnd_id ) ";
		if($conn->query($test)==TRUE) {
		$res=mysqli_query($conn,$test);
		if(mysqli_num_rows($res)==0) {
		$sql1="INSERT INTO friends(user_id_1,user_id_2) VALUES ($current_id,$frnd_id)";
		if($conn->query($sql1)==TRUE)
			$err="Request Sent";
		else
			echo "ERROR :".$sql1."<br>".$conn->error;
		}
		else
			$err="Already added";
	}
}
	else {
		$err="Not found";
	}
}
else
	echo "ERROR :".$sql."<br>".$conn->error;
}
$conn->close();
}
?>