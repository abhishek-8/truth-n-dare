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
$fn='chat';
$ln='';
if(isset($_SESSION['active_chat_with'])) {
$fid=$_SESSION['active_chat_with'];

  $conn = new mysqli("localhost", "root", "", "db");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

else {
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
}
echo '<div class="green" style="border:1px solid;border-radius:5px;margin-top:220px;height:30px;width:100%;" onclick="expand()"><span>'.$fn.' '.$ln.'</span></div>'; 
}
else
echo '<div class="green" style="border:1px solid;border-radius:5px;margin-top:220px;height:30px;width:100%;" onclick="expand()"><span>chat</span></div>'; 

$conn->close();		
?>