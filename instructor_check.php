<?php

include 'connection2.php';

$username = $_REQUEST["username"];
//$username = "Gainz2408";

$q1 = "select * from guest where username = '$username' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);

if($q3['instructor'] == "") {
	echo "0";
}
else {
	echo "1";
}


?>