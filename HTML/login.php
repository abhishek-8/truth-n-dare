<?php
$error="";

if( isset($_POST['submit']) ) /*Checks if login button is clicked*/{  
$user=$_POST['username'];
$password=$_POST['password'];
// Create connection
$conn = new mysqli("localhost", "root", "", "db");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else {

$sql="SELECT * from users where username='$user' AND password='$password'";
if($conn->query($sql)==TRUE) {
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['login_user']=$row['user_id'];
		header('Location:profile.php');
	}
	else {
		$error="Username or password is invalid";
	}
}
else
	echo "ERROR :".$sql."<br>".$conn->error;
}
$conn->close();
}


?>