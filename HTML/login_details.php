<?php 

// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if(!isset($_SESSION['login_user'])) 
	header('Location:login_signup.php');
else {

$curr_user_id=$_SESSION['login_user'];

$sql="SELECT * from users where user_id=$curr_user_id"; 

if($conn->query($sql)==TRUE) {
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1) {
		$row = mysqli_fetch_assoc($result);
		$fn=$row['f_name'];
		$ln=$row['l_name'];
		$un=$row['username'];
		$gender=$row['gender'];
		$em=$row['email'];
		$dob=$row['dob'];

	}
	
}
else
	echo "ERROR :".$sql."<br>".$conn->error;

$conn->close();
}
?>