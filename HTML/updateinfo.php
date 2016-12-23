<?php
session_start();
$fn=$_POST['f_name'];
$ln=$_POST['l_name'];
$date=$_POST['DOB'];
$id=$_SESSION['login_user'];
$con=new mysqli("localhost","root","","db");

if($con->query("UPDATE users set f_name='$fn' where user_id=$id")==False || $con->query("UPDATE users set l_name='$ln' where user_id=$id")==False || $con->query("UPDATE users set dob='$date' where user_id=$id")==False )
echo "ERROR".$con->error;
header('Location:profile.php');
?>