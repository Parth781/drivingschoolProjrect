<?php

include 'connection2.php';

$username = $_REQUEST["username"];
$q1 = "select * from guest where username = '$username' ";
$r1 = "select * from instructor where username = '$username' ";
$s1 = "select * from student where username = '$username' ";
$t1 = "select * from admin where username = '$username' ";
$q2 = mysqli_query($con, $q1);
$r2 = mysqli_query($con, $r1);
$s2 = mysqli_query($con, $s1);
$t2 = mysqli_query($con, $t1);
$q3 = mysqli_num_rows($q2);
$r3 = mysqli_num_rows($r2);
$s3 = mysqli_num_rows($s2);
$t3 = mysqli_num_rows($t2);

if(($q3 == 0) && ($r3 == 0) && ($s3 == 0) && ($t3 == 0)) {
	echo "1";
}
else {
	echo "0";
}


?>