

<?php
session_start();

$servername = "127.0.0.1";
$username = "id7249489_pulin";
$password = "ravagers";
$dbname = "id7249489_drivingschool";

$con = mysqli_connect($servername, $username, $password, $dbname);
if($con == NULL) {
	echo " Connection Failed";
}
else {
	//echo "Connected";
}


mysqli_select_db($con, 'drivingschool');

?>