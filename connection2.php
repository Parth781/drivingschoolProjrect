

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

date_default_timezone_set("Asia/Kolkata");

?>