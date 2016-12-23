<?php
session_start();
$id=$_SESSION['login_user'];
$conn=new mysqli("localhost","root","","db");
$sql="SELECT * from q_and_a where replier_id=$id";
if($conn->query($sql)==TRUE){
$result=mysqli_query($conn,$sql);
$n=mysqli_num_rows($result);

if($n==0) {
	echo 'No games played.';
}

else {
/*	
for($x=1;$x<=$n-10;$x++)
{
	$row=mysqli_fetch_assoc($result);
}

for($x=1;$x<=10;$x++)
{*/
	while($row=mysqli_fetch_assoc($result)) {	
	echo "Question Answered : ".$row['question'].'<br>';
	}
//}
}
}
$conn->close();
?>