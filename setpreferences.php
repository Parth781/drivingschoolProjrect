<?php

include 'connection2.php';

$email = $_SESSION["email"];
//$email = "jaineel.ns@somaiya.edu";
$stime = $_POST["starttime"];
$etime = $_POST["endtime"];
$ctype = $_POST["coursetype"];
$numdays = $_POST["num_days"];

$q = "insert into preference(email, time_start, time_end, course_type) values('$email','$stime','$etime','$ctype') ";
mysqli_query($con, $q);

function encode($text) {
	if($text == "Monday") return 1;
	else if($text == "Tuesday") return 2;
	else if($text == "Wednesday") return 3;
	else if($text == "Thursday") return 4;
	else if($text == "Friday") return 5;
	else if($text == "Saturday") return 6;
	else return 0;
}

for( $i=1 ; $i<=$numdays ; $i++) {
	$day = "day_";
	$day2 = "day";
	$day = $day.$i;
	$day2 = $day2.$i;
	$day = $_POST["$day"];
	$day = encode($day);
	$q = "update preference set $day2 = '$day' where email = '$email' ";
	mysqli_query($con, $q);
}

header('location:guesthome.php');

?>