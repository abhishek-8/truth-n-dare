<?php	
include('login_details.php');
// Create connection
$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else {
	$gid=$_SESSION['grp_id'];

$sql1="SELECT * from q_and_a where grp_id=$gid AND replier_id=$curr_user_id";
if($conn->query($sql1)==TRUE) {
	$result=mysqli_query($conn,$sql1);
	while($row=mysqli_fetch_assoc($result)) {
	$q = $row['question'];
	}
	echo $q;
	
}
else { echo "ERROR :".$sql1."<br>".$conn->error;}

}			
 $conn->close();
?>