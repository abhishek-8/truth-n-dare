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
$sql="SELECT * from friends where (user_id_1='$curr_id' OR user_id_2='$curr_id') and status='accepted'";

if($conn->query($sql)==TRUE) {

	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>=1) {
		while($row=mysqli_fetch_assoc($result)) {
		
			$frnd_id=$row['user_id_1'];
		if($row['user_id_1']==$curr_id)
			$frnd_id=$row['user_id_2'];
		
		$sql="SELECT f_name,l_name from users WHERE user_id=$frnd_id";

			if($conn->query($sql)==TRUE) {
				$res=mysqli_query($conn,$sql);
				$row1=mysqli_fetch_assoc($res);
				echo '<table style="border:1px solid black; width:50%;background:#e3f2fd;">
						<tr><td>'.$row1['f_name'].' '.$row1['l_name'].'</td><td>'.'<a href="remove.php?id='.$frnd_id.'">Remove</a>'.'</td></tr>
					</table>';
			}
			else
				echo "ERROR :".$sql."<br>".$conn->error;			

		}
		
	}
	else
		echo 'No friends :(';
	
}
else
	echo "ERROR :".$sql."<br>".$conn->error;
}
$conn->close();
?>