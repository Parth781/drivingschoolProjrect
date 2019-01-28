<!DOCTYPE html>
<html>

<?php

session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "drivingschool";

$con = mysqli_connect($servername, $username, $password, $dbname);
if($con == NULL) {
	echo " Connection Failed";
}
else {
	//echo "Connected";
}

mysqli_select_db($con, 'drivingschool');

//$email = $_SESSION["email"];
$email = "pulinshah07@gmail.com";
if(isset($_GET['lat'])) {
	$q1 = "select * from location where email = '$email' ";
	$q2 = mysqli_query($con, $q1);
	$q3 = mysqli_num_rows($q2);
	$latitude = $_GET['lat'];
	$longitude = $_GET['lon'];
	date_default_timezone_set("Asia/Kolkata");
	$timex = localtime();
	$minutes = $timex[1];
	$hours = $timex[2];
	$sec = 0;
	
	if($q3 == 0) {
		$q = "insert into location(email,latitude,longitude,time) values ('$email','$latitude','$longitude','$hours:$minutes:$sec') ";
		mysqli_query($con, $q);
	}
	else {
		$r1 = "update location set latitude = '$latitude' where email = '$email' ";
		$r2 = "update location set longitude = '$longitude' where email = '$email' ";
		$r3 = "update location set time = '$hours:$minutes:$sec' where email = '$email' ";
		mysqli_query($con, $r1);
		mysqli_query($con, $r2);
		mysqli_query($con, $r3);
	}
}

?>

<head>
	<title>location</title>
</head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	  <script>
	$(document).ready(function() {
		//$("p").delay(10000);
		getLocation();
	});
  
	</script>
</head>

<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="homepage.html">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>    
      </ul>
    </div>  
  </nav>
  <br>
  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABi04YvzMrTxOSU0xjy2k9Yyj8rKBvBxc"></script>
  
  <script>
		function getLocation() {
			//alert("c");
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}
		function showPosition(position) {
			var lat = position.coords.latitude;
			var lon = position.coords.longitude;
			//alert("xxx");
			var flag = "http://localhost/DSMS/instructorSchedule.php";
			var check = window.location.href;
			alert(check);
			if(flag == check) {
			window.location.href = window.location.href+'?lat='+lat+'&lon='+lon;
			}
		}
  </script>

	<div class="container">
		<h2>schedule</h2>
		<table>
			<tr>
				<th>lesson no</th>
				<th>name</th>
				<th>date</th>
				<th>time</th>
				<th>address</th>
			</tr>

			<tr>
				<td>1</td>
				<td>parth</td>
				<td>Thursday - (02-08-2018)</td>
				<td>10:30 - 11:30am</td>
				<td>sdf</td>
			</tr>

			<tr>
				<td>2</td>
				<td>pulin</td>
				<td>Saturday - (04-08-2018)</td>
				<td>10:00 - 10:30am</td>
				<td>sdf</td>
			</tr>

			<tr>
				<td>3</td>
				<td>kaushal</td>
				<td>Sunday - (05-08-2018)</td>
				<td>11:00 - 11:30am</td>
				<td>sdf</td>
			</tr>

			<tr>
				<td>4</td>
				<td>rohit</td>
				<td>Sunday - (05-08-2018)</td>
				<td>11:30 - 12:30pm</td>
				<td>sdf</td>
			</tr>
		</table>

		<button onclick="getLocation()">Try It</button>
		
		<footer>
			<p>contact information: <a href="mailto:example@gmail.com">example@gmail.com</a></p>
			<p>About us</p>
		</footer>
	</div>
</body>
</html>