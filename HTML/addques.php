<?php 
	// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else {
	session_start();
	$gid=$_SESSION['grp_id'];
	
 //$ques=$_POST['q'];
 $aid=$_SESSION['login_user'];
 $rid=$_SESSION['rep_id'];
 $q=$_POST['q'];
$sql1="INSERT into q_and_a(question,asker_id,replier_id,grp_id) values('$q',$aid,$rid,$gid)";
if($conn->query($sql1)==TRUE) {
	
}
else { echo "ERROR :".$sql1."<br>".$conn->error;}
}
 $conn->close();
?>