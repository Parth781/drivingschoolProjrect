<?php

include 'connection2.php';

$check = $_POST["code"];
$email = $_SESSION["email"];
$q1 = "select * from guest where email = '$email' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);
$code = $q3['code'];
echo $check;
echo $code;

if($check == $code) {
	echo "<script type='text/javascript'>alert('Verification code accepted!'); window.location ='registrationform.php'; </script>";
}
else {
	echo "<script type='text/javascript'> alert('Invalid verification code'); window.location = 'emailverify.php'; </script>";
}



?>