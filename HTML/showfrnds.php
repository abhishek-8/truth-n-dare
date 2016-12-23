<?php

echo '<button class="green btn" style="width:232px;" onclick="contract1()">Friends</button>';
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
echo '<p id=""  style="border:1px solid;height:88%;width:100%;overflow:scroll;background:white;">';
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
				echo '<a href="main_page.php?id='.$frnd_id.'">'.$row1['f_name'].' '.$row1['l_name'].'</a>'.'<br>';
			}
			else
				echo "ERROR :".$sql."<br>".$conn->error;			

		}
	}
	else
		 echo 'No friends';
	
}
else
	echo "ERROR :".$sql."<br>".$conn->error;
}
$conn->close();	
?>