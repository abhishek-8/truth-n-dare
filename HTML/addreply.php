<?php
session_start();
$uid=$_SESSION['login_user'];
$fid=$_SESSION['active_chat_with'];
$text=$_POST['msg'];

	// Create connection
$conn = new mysqli("localhost","root","","db");

$sql="SELECT conversation_id from  conversation where ( user_id_1=$uid and user_id_2=$fid ) OR ( user_id_2=$uid and user_id_1=$fid )";

if($conn->query($sql)==TRUE) {
	$cid=0;
	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)==1) {
		
		$row=mysqli_fetch_assoc($result);
		$cid=$row['conversation_id'];

		$sql2="INSERT into conversation_reply(reply,user_id,conversation_id) values('$text',$uid,$cid)";
		if( $conn->query($sql2)==TRUE) {

		}
		else
			echo "ERROR :".$sql2."<br>".$conn->error;
	}

	else {
		$sql1="INSERT into conversation(user_id_1,user_id_2) values ($uid,$fid)";
		if($conn->query($sql1)==TRUE){
		$sql="SELECT conversation_id from  conversation where ( user_id_1=$uid and user_id_2=$fid ) OR ( user_id_2=$uid and user_id_1=$fid )";
		if($conn->query($sql)==TRUE) {
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1) {
			$row=mysqli_fetch_assoc($result);
			$cid=$row['conversation_id'];
			$sql2="INSERT into conversation_reply(reply,user_id,conversation_id) values('$text',$uid,$cid)";
		if( $conn->query($sql2)==TRUE) {

		}
		else
			echo "ERROR :".$sql2."<br>".$conn->error;
		}
		}
		else
		echo "ERROR :".$sql1."<br>".$conn->error;
		}
		else
		echo "ERROR :".$sql1."<br>".$conn->error;
	}

}
else
		echo "ERROR :".$sql1."<br>".$conn->error;
$conn->close();
?>