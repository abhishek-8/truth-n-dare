/*var el = document.getElementById('update');
el.onclick = showFoo;
*/
function showFoo() {
  // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url = "edit.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("change").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("change").innerHTML = "processing...";
}


//Function to request Basic details of user from PHP
function b(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url = "basic_details.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("change").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("change").innerHTML = "processing...";
}


//Function to request Friend List of user from PHP
function f(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    var url = "friendlist.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("change").innerHTML = return_data;
	    }
    }

    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("change").innerHTML = "processing...";
}

//Function to request Game stats of user from PHP
function g(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    var url = "gamestats.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("change").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("change").innerHTML = "processing...";
}

//Function to request pending friend request of user from PHP
function fr(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    
    var url = "frndRequest.php";
    
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("fr").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("fr").innerHTML = "processing...";
}

function confirmation() {
	var res=confirm("Do you wish to continue?");
	if( res == true )
		window.location.assign("delete.php");
}
