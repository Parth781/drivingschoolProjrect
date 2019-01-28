<?php

include 'connection2.php';


$x = "";
for($i=1 ; $i<=6 ; $i++) {
	$x2 = rand(0,9);
	$x = $x.$x2;
}



/*$email = $_SESSION["email"];
$q = "update guest set code = '$x' where email = '$email' ";
mysqli_query($con, $q);

$q1 = "select * from guest where email = '$email' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);
$fname = $q3['fname'];
$lname = $q3['lname'];*/

$fname = $_REQUEST["fname"];
$mname = $_REQUEST["mname"];
$lname = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$dob = $_REQUEST["dob"];
$age = $_REQUEST["age"];
$gender = $_REQUEST["gender"];
$raddress = $_REQUEST["raddress"];
$plocation = $_REQUEST["plocation"];
$contact = $_REQUEST["contact"];
$branch = $_REQUEST["branch"];
$q = "insert into guest(fname,mname,lname,email,dob,age,gender,password,code,raddress,plocation,contact,branch) values ('$fname','$mname','$lname','$email','$dob','$age','$gender','$x','$x','$raddress','$plocation','$contact','$branch') ";
$q1 = mysqli_query($con, $q);

$_SESSION["email"] = $email;

/*$email = "pulinshah07@gmail.com";
$fname = "Pulin";
$lname = "Shah";*/

$sub = "Email Verification Code";
$message = "Hello $fname $lname,
									Welcome to ABC Driving School!
									To verify your email, please insert the code in the email verification page. 
									Your email verification code is $x.
									It is same as your temporary password as well.
						Incase it is not you, please revert back on our email address...";

$to = $email;
$headers = "From : ABC Driving School";

if(mail($to, $sub, $message, $headers)) {
	/*echo "<script type='text/javascript'>alert('Mail Sent'); 
		window.location='index.html';
		</script>";*/
		echo "Mail sent";
}
else {
	/*echo "<script type='text/javascript'>alert('Failed to send mail'); 
		window.location='index.html';
		</script>";*/
		echo "Failed";
}


?>


