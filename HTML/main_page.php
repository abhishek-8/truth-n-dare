<?php

include('login_details.php');

if(isset($_GET['id'])) {
  $_SESSION['active_chat_with']=$_GET['id'];
}
if(isset($_GET['gid'])) {
  $_SESSION['grp_id']=$_GET['gid'];
}

function produceElement($arr, $cx , $cy, $r)
{

     $cnt=count($arr);
     $x=0;$y=0;
     $angle=0;
     $offset=360/$cnt;
      $conn = new mysqli("localhost", "root", "", "db");

     foreach ($arr as $i => $value) {
          $y=$cy-$r*cos($angle*pi()/180);
          $x=$cx+$r*sin($angle*pi()/180);
          $angle+=$offset;

           $sql="SELECT username from users where user_id=$value";

              if($conn->query($sql)==TRUE) {
            $result=mysqli_query($conn,$sql);
  
                  $row = mysqli_fetch_assoc($result);
                  $val=$row['username'];
             }  
          echo '<div class="chip" style="position:absolute; top:'.$y.'px; left:'.$x.'px;" ><img src="../jc.jpg" style="width:75px; height:70px;"><span style="color:black">'.$val.'</span></div>';

     }
}

if(isset($_POST['q']))
 $q=$_POST['q'];


?>

<html>
<head>
     <!-- Required meta tags always come first -->
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta http-equiv="refresh" content="120">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Truth-n-dare</title>
          <!-- Compiled and minified CSS
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">-->
          <!--Animate Css -->
          <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
          <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
          <!--Import materialize.css-->
          <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <!--Import jQuery before materialize.js
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
          <script type="text/javascript" src="../js/materialize.min.js"></script>
       <!--   <script type="text/javascript" src="../profile_options.js"></script>  -->
          <link rel="stylesheet" href="../main_page2.css">
          <script src="../jquery-2.1.1.min.js"></script>
          <script type="text/javascript" src="../main_page.js"></script>
          
          


  <title>
    Truth-N-Dare
  </title>
</head>

<body onload="init()">
          <div id="question" style="width:45%;position:absolute;margin-left:10px;margin-top:10px;z-index:1;" class="z-depth-5 card-panel">
               <h5 id="rep">Ask a question to </h5><p id="replier"></p>
                
                 <form name="ask" method="POST" onsubmit="return feedQues()" >
                   <input type="text" name="q">
                 </form>
                 <a class="waves-effect waves-light btn-flat" onclick="hide()">Cancel</a>
          </div>
          <div id="question_display" style="overflow:scroll;width:35%;position:absolute;margin-left:200px;margin-top:310px;z-index:1;" class="z-depth-2 card-panel">
            <p id="qa">Question for you : </p>
            <a  class="waves-effect waves-light btn-flat" href="popgame.php">Okay</a><br>
          </div>  

          <div style="z-index:-1;">  


          <!---------------------------------top-------------------------------->
          <nav class="green">
               <h1 class="brand-logo">Truth-n-dare</h1>
               <ul class="right">
                    <li>
                    <div class="chip">
                    <img src="../jc.jpg">
                    <?php echo $un; ?>
                    </div>
                    </li>

                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
               </ul>
          </nav>



    <!------------------------------bottom-------------------------------->
    <div class="row">     



          <!-----------------------------grpchat-------------------------------->
               <div class="col l3 card-panel" id="grpchat">
                    <div disabled id="grp_chat" name="" style="overflow:scroll;">

                    </div>
                    <form id="textbox" name="textbox" onsubmit="return disp2()" method="POST">

                      <input autocomplete="off" type="text" name="message" placeholder="Type a message...">

                    </form>

               </div>



        <!-----------------------------rest part-------------------------------->
        <img id="sourcevid" style="display:none;" src="../bottle(new).jpg"/>
               <div class="col l8 card-panel" id="rest">
                         
               <div id="chat_window">
                    <div id="chat_head" class="green" onclick="expand()"></div> 
              </div>
              <canvas id="myCanvas" width="620" height="360" ></canvas>
 
              <?php
                $arr=array();
              // Create connection
            $conn = new mysqli("localhost", "root", "", "db");

            // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $gid=$_SESSION['grp_id'];

            $sql="SELECT member_id from grp_members where grp_id=$gid";

              if($conn->query($sql)==TRUE) {
            $result=mysqli_query($conn,$sql);
  
                  while($row = mysqli_fetch_assoc($result) ) {
                      array_push($arr,$row['member_id']);
                  }
            }
              
            produceElement($arr,510,260,240);

            $sql="SELECT * from game where grp_id=$gid";

            if($conn->query($sql)==TRUE) {

              $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>=1) {

              $row=mysqli_fetch_assoc($result);

                  $_SESSION['rep_id']=$row['rep_id'];
                  
                if($row['rep_id']!=$curr_user_id) {
              echo '<script type="text/javascript">
                    var ang='.$row['angle'].';
                    var r="'.$row['replier'].'";
                    var rid='.$row['rep_id'].';
                    init();
                    startit(ang,r,rid,0);
                    </script>';

                  }

               else {

                  echo '<script type="text/javascript">
                          showq();
                        </script>';
              
               }   

              }

            else {
                
                $cnt=count($arr);
                $r=rand(1,$cnt);
                $ang=(360/$cnt)*($r-1);
                $rep= $arr[$r-1];
                $_SESSION['rep_id']=$rep;
                $sql="SELECT * from users where user_id=$rep";
                if($conn->query($sql)==TRUE) {
                $result=mysqli_query($conn,$sql);
  
                  while($row = mysqli_fetch_assoc($result) ) {
                    if($row['user_id']==$rep){
                      $replier=$row['username'];
                    break;
                  }
                  
                }
                
                }  
                }
              }
              $conn->close();
               ?>

 <button class="btn" onclick="startit(<?php echo $ang; ?>,'<?php echo $replier; ?>',<?php echo $rep; ?>,'1')">Spin</button>

              <div id="frnds">
                <button id="frnds_head" class="green btn" onclick="expand1()">Friends</button>
              </div> 
               </div>
          </div>
          </div>     
</body>
</html>