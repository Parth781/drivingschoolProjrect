<?php

include 'connection2.php';

if($_SESSION["usertype"] != "student") {
	header('location:logout.php');
}

$time = array();
$time = $_POST["newtime"];
$fordate = $_POST["fordate"];
$oldtime = $_POST["oldtime"];
//echo $oldtime;
//echo $fordate;
//echo $time;
if($time == "Choose option") {
	echo "<script type='text/javascript'> window.alert('Please select appropriate time'); window.location = 'studenthome.php'; </script>";
}
$hours = ((ord($time[0])-48)*10 + (ord($time[1])-48));
$minutes = ((ord($time[3])-48)*10 + (ord($time[4])-48));
//echo $hours;
//echo $minutes;


$x = "";
for($i=1 ; $i<=6 ; $i++) {
	if($i % 3 == 0) {
		$x2 = rand(0,9);
	}
	else if($i % 2 != 0) {
		$int = rand(97,122);
		$x2 = chr($int);
	}
	else {
		$int = rand(65,90);
		$x2 = chr($int);
	}
	$x = $x.$x2;
}

$notify_id = $x;
//echo $notify_id;
$sender = $_SESSION["email"];
//$sender = "pulinshah07@gmail.com";
$q1 = "select * from student where email = '$sender' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);
$receiver = $q3['instr_email'];
//echo $receiver;
$header = "Request Change Time";
$message = "Request to change time for the date $fordate & time $oldtime";
//echo $message;
$status = "unread";

$q = "insert into notification(sender,receiver,header,message,status,changetime_id) values('$sender','$receiver','$header','$message','$status','$notify_id') "; 
$ret1 = mysqli_query($con, $q);

$year = substr($fordate,0,4);
$month = substr($fordate,5,2);
$date = substr($fordate,8,2);
$hour2 = substr($oldtime,0,2);
$minute2 = substr($oldtime,3,2);
$sec = substr($oldtime,6,2);
$status = "pending";

$q = "insert into changetime(issuer,id,old,new,date,status) values('$sender','$notify_id','$hour2:$minute2:$sec','$hours:$minutes:$sec','$year-$month-$date','$status') ";
mysqli_query($con, $q);


header('location:studenthome.php');




?>