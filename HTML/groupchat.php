<?php
session_start();
$uid=$_SESSION['login_user'];
$cid=$_SESSION['grp_id'];

$conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

else {
      $sql2="SELECT * from conversation_reply where conversation_id=$cid";
            if($conn->query($sql2)==TRUE) {
             $result=mysqli_query($conn,$sql2);
             while($row=mysqli_fetch_assoc($result)) {
          
                echo $row['reply'].'<br>';
             
            }
     }
     else
      echo "ERROR :".$sql2."<br>".$conn->error;

 }
 
$conn->close();         
?>