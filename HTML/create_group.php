<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

else {
	session_start();
	$curr_id=$_SESSION['login_user'];
	$grp_nm=$_POST['gn'];

$sql="INSERT into grp(grp_name,admin_id) VALUES ('$grp_nm',$curr_id)";

if($conn->query($sql)==TRUE) {
$sql1="SELECT grp_id from grp where grp_name='$grp_nm'";
	if($conn->query($sql1)==TRUE) {
		$result=mysqli_query($conn,$sql1);
				while($row = mysqli_fetch_assoc($result) ) {

						$_SESSION['grp_id']=$row['grp_id'];
						$grp_id=$row['grp_id'];
					$sql="INSERT into grp_members(grp_id,member_id) VALUES ($grp_id,$curr_id)";

						if($conn->query($sql)==TRUE){}
						else echo "ERROR :".$sql."<br>".$conn->error;

				}
	}
	else
	echo "ERROR :".$sql1."<br>".$conn->error;	

}

else 
	echo "ERROR :".$sql."<br>".$conn->error;	
}

$conn->close();
?>