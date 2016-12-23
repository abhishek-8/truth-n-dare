<html>
<head>
     <!-- Required meta tags always come first -->
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Truth-n-dare</title>
          <!-- Compiled and minified CSS -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
          <!--Animate Css -->
          <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
          <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
          <!--Import materialize.css-->
          <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <!--Import jQuery before materialize.js-->
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
          <script type="text/javascript" src="js/materialize.min.js"></script>
       <!--   <script type="text/javascript" src="../profile_options.js"></script>  -->
          <link rel="stylesheet" href="../main_page.css">
          <script src="../main_page.js"></script>
  <title>
    Truth-N-Dare
  </title>
</head>
</html>

<?php
session_start();
$uid=$_SESSION['login_user'];
$fn='chat';
$ln='';
if(isset($_SESSION['active_chat_with']))
$fid=$_SESSION['active_chat_with'];

  $conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

else {
  if(isset($_SESSION['active_chat_with'])) {
$sql="SELECT * from users where user_id=$fid";

if($conn->query($sql)==TRUE) {

  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)==1) {
    $row=mysqli_fetch_assoc($result);
    $fn=$row['f_name'];
    $ln=$row['l_name'];
}
}
else
        echo "ERROR :".$sql."<br>".$conn->error;

$sql="SELECT * from users where user_id=$fid";

if($conn->query($sql)==TRUE) {

  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)==1) {

    $row=mysqli_fetch_assoc($result);
    $fn=$row['f_name'];
    $ln=$row['l_name'];

 $sql1="SELECT conversation_id from conversation where ( user_id_1=$uid and user_id_2=$fid ) or ( user_id_2=$uid and user_id_1=$fid )";


echo '<div class="green" style="border:1px solid;border-radius:2px;" onclick="contract()"><span>'.$fn.' '.$ln.'<span></div>
        <div id="window" disabled style="border:1px solid; border-radius:2px; height:85%;width:100%;overflow:scroll;">';

 if($conn->query($sql1)==TRUE)
 {
    $res=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($res)==1)
     {
        $row=mysqli_fetch_assoc($res);
         $cid=$row['conversation_id'];
         $sql2="SELECT * from conversation_reply where conversation_id=$cid";
            if($conn->query($sql2)==TRUE) {
             $result=mysqli_query($conn,$sql2);
             while($row=mysqli_fetch_assoc($result)) {
              if( $row['user_id']==$fid)
                echo '<span style="color:blue;">'.$row['reply'].'</span>'.'<br>';
              else
                echo 'You : '.$row['reply'].'<br>';
             }
            }

          else
            echo "ERROR :".$sql2."<br>".$conn->error;

     }

 }

else
        echo "ERROR :".$sql1."<br>".$conn->error;
}
echo '</div>';

        echo '<div style="border:1px solid;width:100%;height:15%;">
            <form id="typebox" name="typebox" onsubmit="return disp()" method="POST">
                    <input type="text" autocomplete="off" placeholder="Type a message" name="msg" style="background-color:white;">
            </form>
        </div>';
 }
}
 else {
  echo '<div class="green" style="border:1px solid;border-radius:2px;" onclick="contract()"><span>chat</span></div>
        <div id="window" disabled style="border:1px solid; border-radius:2px; height:85%;width:100%; background-color:white"></div>
        <div style="border:1px solid;width:100%;height:15%;">
            <form id="typebox" name="typebox" onsubmit="return disp()" method="POST">
                    <input type="text" autocomplete="off" placeholder="Type a message" name="msg" style="background-color:white;">
            </form>
        </div>';

 }
 }
$conn->close();
?>
