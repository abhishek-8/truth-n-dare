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
	$ang=$_POST['ang'];
	$replier=$_POST['rname'];
	$rep=$_POST['rid'];
	$sql1="INSERT into game values ($gid,'$replier',$ang,$rep)";
            if($conn->query($sql1)==TRUE) 
            { }

            else { echo "ERROR :".$sql1."<br>".$conn->error;}
 }
 $conn->close();
?>