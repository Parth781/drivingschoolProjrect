<?php

include 'connection2.php';

$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$_SESSION["email"] = $_POST["email"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$age = $_POST["age"];
$raddress = $_POST["raddress"];
//$pickup = $_POST["plocation"];
$contact = $_POST["mobile"];
//echo $contact;


/*$fname = $_GET["fname"];
$mname = $_GET["mname"];
$lname = $_GET["lname"];
$_SESSION["email"] = $_GET["email"];
$email = $_GET["email"];
$dob = $_GET["dob"];
$age = $_GET["age"];
$raddress = $_GET["raddress"];
//$pickup = $_POST["plocation"];
$contact = $_GET["mobile"];
//echo $contact;*/

$date = date('Y-m-d', strtotime($_GET["dob"]));
$time = strtotime($date);
$day = date("d",$time);	
$month = date("m",$time);	
$year = date("Y",$time);

$q = "insert into guest(fname,mname,lname,email,dob,age,raddress,contact) values('$fname','$mname','$lname','$email','$year-$month-$day','$age','$raddress','$contact') ";
$check = mysqli_query($con, $q);
header('location:emailverify.php');
//echo $check;









?>