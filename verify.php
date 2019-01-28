<!DOCTYPE html>
<?php

include 'connection2.php';

$username = $_POST["username"];
$password = $_POST["password"];

$q1 = "select * from student where username = '$username' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_num_rows($q2);
echo $q3;

if($q3 == 0) {
	$r1 = "select * from guest where username = '$username' ";
	$r2 = mysqli_query($con, $r1);
	$r3 = mysqli_num_rows($r2);
	if($r3 != 0) {
		$r4 = mysqli_fetch_array($r2);
		$pass2 = $r4['password'];
		if($password == $pass2) {
			$_SESSION["email"] = $r4['email'];
			$_SESSION["username"] = $r4['username'];
			$_SESSION["usertype"] = "guest";
			header('location:guesthome.php');
		}
		else header('location:login.html');
	}
	else {
		$s1 = "select * from instructor where username = '$username' ";
		$s2 = mysqli_query($con, $s1);
		$s3 = mysqli_num_rows($s2);
		if($s3 != 0) {
			$s4 = mysqli_fetch_array($s2);
			$pass2 = $s4['password'];
			if($password == $pass2) {
				$_SESSION["email"] = $s4['email'];
				$_SESSION["username"] = $s4['username'];
				$_SESSION["usertype"] = "instructor";
				header('location:instructorhome.php');
			}
			else header('location:login.html');
		}
		else {
			$t1 = "select * from admin where username = '$username' ";
			$t2 = mysqli_query($con, $t1);
			$t3 = mysqli_num_rows($t2);
			if($t3 != 0) {
				$t4 = mysqli_fetch_array($t2);
				$pass2 = $t4['password'];
				if($password == $pass2) {
					$_SESSION["email"] = $t4['email'];
					$_SESSION["username"] = $t4['username'];
					$_SESSION["usertype"] = "admin";
					header('location:adminhome.php');
				}
				else header('location:login.html');
			}
			else {
				header('location:login.html');
			}
		}
	}		
}
else {
	$q4 = mysqli_fetch_array($q2);
	$pass_c = $q4['password'];
	if($password == $pass_c) {
		$_SESSION["username"] = $q4['username'];
		$_SESSION["email"] = $q4['email'];
		$_SESSION["usertype"] ="student";
		header('location:studenthome.php');
	}
	//else header('location:login.html');
}

?>