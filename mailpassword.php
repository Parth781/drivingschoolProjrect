<?php

include 'connection2.php';

$email = $_SESSION["email"];
$username = $_POST["username"];
$_SESSION["username"] = $username;

$q = "update guest set username = '$username' where email = '$email' ";
mysqli_query($con, $q);

$q1 = "select * from guest where email = '$email' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);
$fname = $q3['fname'];
$lname = $q3['lname'];

$x = "";
for($i=1 ; $i<=8 ; $i++) {
	if($i % 4 == 0) {
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
//echo $x;

$q = "update guest set password = '$x' where email = '$email' ";
mysqli_query($con, $q);

$sub = "Registration Successful";
$message = "Hello $fname $lname,
									Welcome to ABC Driving School!
									Thank you for joining us. Your registration is complete.
									Username : $username
									Password : $x
									To be our member, please select your vehicle, instructor if desired to be particular & pay the fees.
									We look forward to be in touch with you soon.
						Incase it is not you, please revert back on our email address...";
						
$to = $email;
$headers = "From : ABC Driving School";

if(mail($to, $sub, $message, $headers)) {
	echo "<script type='text/javascript'> window.location='preferences.php'; </script>";
}
else {
	echo "<script type='text/javascript'>alert('Failed to send mail'); 
		window.location='preferences.php';
		</script>";
}


?>