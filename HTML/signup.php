<?php

if( isset($_POST['sign']) ) /*Checks if submit is clicked*/{
$fn=$_POST['f'];
$ln=$_POST['l'];
$sx=$_POST['gender'];
$user=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$dob=date("Y-m-d", strtotime($_POST['dob']));

// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {

$sql="INSERT INTO users (username,email,password,f_name,l_name,dob,gender) VALUES ('$user','$email','$password','$fn','$ln','$dob','$sx')"; 
if( $user=="" || $password=="" )
	header('Location:login_signup.php');
else if($conn->query($sql)==TRUE){
	$sql="SELECT * from users where username='$user' AND password='$password'";
	if($conn->query($sql)==TRUE) {
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['login_user']=$row['user_id'];
		header('Location:profile.php');
	}

}
else{
	header('Location:login_signup.php');

}
}
$conn->close();
}
}
?>