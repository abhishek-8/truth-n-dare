<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);

else {

	session_start();
	$curr_id=$_SESSION['login_user'];
	$grp_id=$_SESSION['grp_id'];
	$m=$_POST['mem'];	

$sql1="SELECT user_id from users where username='$m'";

if($conn->query($sql1)==TRUE) {
	$res=mysqli_query($conn,$sql1);
		$row = mysqli_fetch_assoc($res);
		$mem_id=$row['user_id'];
				
	$sql="INSERT into grp_members(grp_id,member_id) VALUES ($grp_id,$mem_id)";

	if($conn->query($sql)==TRUE) {
	}

	/*else 
		echo "ERROR :".$sql."<br>".$conn->error;*/
}
/*
else 
	echo "ERROR :".$sql1."<br>".$conn->error;*/
}

$conn->close();
?>