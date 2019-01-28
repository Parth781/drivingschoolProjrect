<?php

include 'connection2.php';

if($_SESSION["usertype"] != "student") {
	header('location:logout.php');
}

$olddate = $_POST["olddate"];
$newdate = $_POST["newdatenew"];

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
$sender = $_SESSION["email"];
$q1 = "select * from student where email = '$sender' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);
$receiver = $q3['instr_email'];

$header = "Request Change Date";
$message = "Request to change date to the date $newdate from $olddate";
$status = "pending";

$q = "insert into notification(sender,receiver,header,message,status,changedate_id) values('$sender','$receiver','$header','$message','$status','$notify_id') "; 
$ret1 = mysqli_query($con, $q);

$oldyear = substr($olddate,0,4);
$oldmonth = substr($olddate,5,2);
$olddate = substr($olddate,8,2);

$newyear = substr($newdate,0,4);
$newmonth = substr($newdate,5,2);
$newdate = substr($newdate,8,2);

$q = "insert into changedate(issuer,id,old,new,status) values('$sender','$notify_id','$oldyear-$oldmonth-$olddate','$newyear-$newmonth-$newdate','$status') ";
mysqli_query($con, $q);

header('location:studenthome.php');


?>