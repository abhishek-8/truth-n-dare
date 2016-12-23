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

$sql="SELECT grp_id FROM grp_members where member_id=$curr_id";

if($conn->query($sql)==TRUE) {
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0) {
		echo "No groups";
	}

	else {
	
	while($row = mysqli_fetch_assoc($result) ) {
		
		$sel_id=$row['grp_id'];
		$sql1="SELECT grp_name FROM grp where grp_id=$sel_id";

		if($conn->query($sql1)==TRUE) {
				$result1=mysqli_query($conn,$sql1);
				while($row1 = mysqli_fetch_assoc($result1) ) {

						echo '<a href="main_page.php?gid='.$sel_id.'">'.$row1['grp_name'].'</a><br>';
				}
		}
		else {
			echo "ERROR :".$sql1."<br>".$conn->error;	
		}

	}
	}
	
}
else
	echo "ERROR :".$sql."<br>".$conn->error;
}
$conn->close();
?>