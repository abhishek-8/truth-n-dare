var video;
var canvas, ctx;
var angle = 0,W,H,speed=0.0;
var interval=null;
var stoppingAngle=0;

function init()
{
     video = document.getElementById('sourcevid');
     canvas = document.getElementById('myCanvas');
     ctx = canvas.getContext('2d');
     W=canvas.width;
     H=canvas.height;
     drawRotatingVideo(W/2,H/2);
     show2();
     $('#question').hide();
}

function setspeed(x)
     {speed=x/1000;}

function startit(angl,x,rep_id,mode)
{       

    if(mode==1) {
         // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="addgame.php";
    var data="ang="+angl+"&rid="+rep_id+"&rname="+x;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    // Send the data to PHP now
    hr.send(data); // Actually execute the request

    }

     stoppingAngle = angl;
     angle=0;
     if( angle==0)
     setspeed(500);
   //  document.getElementById('textbox').innerHTML=angl;
     drawRotatingVideo(200,200);
     interval=setInterval("processFrame()", 1); // call processFrame each 25ms

     document.getElementById('replier').innerHTML=x;

}

function processFrame() {
    
     if(speed==0)
          clearInterval(interval);
     else if(angle>370)
     {
          drawRotatingVideo(W/2,H/2);
          stoproutine();
     }
     else if(angle>350)
          setspeed(10);
     else if(angle>300)
          setspeed(100);

     //document.getElementById('textbox').innerHTML=angle;
     drawRotatingVideo(W/2,H/2);
}

function drawRotatingVideo(x, y)
{
     // Clear the zone at the top right quarter of the canvas
     ctx.clearRect(0, 0, W, H);
     // We are going to change the coordinate system, save the context!
     ctx.save();
     // translate, rotate and recenter the image at its "real" center,
     //not the top left corner
     ctx.translate(x, y);
     // rotate and increment the current angle
     ctx.rotate(angle += speed);
     ctx.translate(-100,-100);
     ctx.drawImage(video, 0, 0, W/2.5, H/2);
     // restore the context
     ctx.restore();
}

function stoproutine()
{    
    setspeed(1);

    // document.getElementById('textbox').innerHTML=(angle*(180/Math.PI)%360)+" "+stoppingAngle;
     if((angle*(180/Math.PI)%360) >= stoppingAngle-3 && (angle*(180/Math.PI)%360) <= stoppingAngle+3)
          {
              // alert("coming");
               setspeed(0);
               $('#question').show();            
          }

}



// done with rotations 

function showq() {


      // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    
    var url ="show_ques_asked.php";
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("qa").innerHTML ="Question for you :"+return_data;
        }
    }
    // Send the data to PHP now
    hr.send(); // Actually execute the request
    document.getElementById("qa").innerHTML ="processing...";
    
    
}

function feedQues() {
      // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    var y=ask.elements['q'].value;
    
    var url ="addques.php";
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("textbox").innerHTML = return_data;
        }
    }
    // Send the data to PHP now
    hr.send("q="+y); // Actually execute the request
    document.getElementById("textbox").innerHTML ="processing...";
    hide();
    return false;
}

function hide(){
    $('#question').hide();
}

function contract() {
  // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url = "../chat1.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("chat_window").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("chat_window").innerHTML = "";
}

function expand() {

  // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="../chat2.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("chat_window").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("chat_window").innerHTML = "";
}

//group chat 
function disp2() {

    var y=textbox.elements['message'].value;
    if(y!="") {
         // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="addreply2.php";
    var msg="msg="+y;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(msg); // Actually execute the request

    document.getElementById('grp_chat').innerHTML=document.getElementById('grp_chat').innerHTML+"You: "+y+"<br>";
    }
    document.getElementById('textbox').reset();
    return false;
}

//one-one chat
function disp() {
    var x=typebox.elements['msg'].value;
    if(x!="") {
         // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="addreply.php";
    var msg="msg="+x;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the data to PHP now... and wait for response to update the status div
    hr.send(msg); // Actually execute the request

    
    document.getElementById('window').innerHTML=document.getElementById('window').innerHTML+"You: "+x+"<br>";
    }
    
    document.getElementById('typebox').reset();
    return false;
}

//sets group name variable
function getname() {
    var gnm=grp_name.elements['gname'].value;

    var hr = new XMLHttpRequest();

    var url ="create_group.php";
    var name="gn="+gnm;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(name); // Actually execute the request
    return false;
}

//add members to the group
function add() {

    var membr=members.elements['memun'].value;
    var hr = new XMLHttpRequest();

    var url ="add_group_member.php";
    var name="mem="+membr;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(name);
    document.getElementById('added').innerHTML=document.getElementById('added').innerHTML+membr+",";
    document.getElementById('members').reset();

    return false;
}

$(document).ready( function () {
  show();
});

function show() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="existing_groups.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("list").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("list").innerHTML = "";
}

function show2() {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="groupchat.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById('grp_chat').innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById('grp_chat').innerHTML = "fetching conversation...";
}

function expand1() {

  // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="showfrnds.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("frnds").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("frnds").innerHTML = "";
}

function contract1() {

  // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url ="showfrnds1.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("frnds").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("frnds").innerHTML = "";
}