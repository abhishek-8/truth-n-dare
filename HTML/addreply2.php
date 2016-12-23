<?php
include('login_details.php');

$uid=$_SESSION['login_user'];
$cid=$_SESSION['grp_id'];
$text=$un;

$text=$text.":".$_POST['msg'];

// Create connection
$conn = new mysqli("localhost","root","","db");

$sql1="INSERT into conversation(conversation_id,user_id_1,user_id_2) values ($cid,$uid,$uid)";
		if($conn->query($sql1)==TRUE){}
		
	$sql2="INSERT into conversation_reply(reply,user_id,conversation_id) values('$text',$uid,$cid)";
		if( $conn->query($sql2)==TRUE) {}
		else
			echo "ERROR :".$sql2."<br>".$conn->error;
$conn->close();
?>