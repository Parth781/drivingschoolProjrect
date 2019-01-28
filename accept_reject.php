<?php

include 'connection2.php';

$index = $_REQUEST["index"];
//$index = 0;
$work = $_REQUEST["work"];
//$work = "accept";

if($work == "accept") {
	$status = "applied - pending";
	$q1 = "select * from guest where status = '$status' order by fname ASC";
	$q2 = mysqli_query($con, $q1);
	$i = 0;
	while($row = mysqli_fetch_array($q2)) {
		if($i == $index) break;
		$i++;
	}
	$username = $row['username'];
	$fname = $row['fname'];
	$mname = $row['mname'];
	$lname = $row['lname'];
	$email = $row['email'];
	$dob = $row['dob'];
	$age = $row['age'];
	$gender = $row['gender'];
	$password = $row['password'];
	$radd = $row['raddress'];
	$ploc = $row['plocation'];
	$contact = $row['contact'];
	$branch = $row['branch'];
	$vehicle_name = $row['vehicle'];
	$instr_name = $row['instructor'];
	$fullname = $fname." ".$mname." ".$lname;
	echo $fullname;
	$r1 = "select * from vehicle where model_name = '$vehicle_name' && branch = '$branch' ";
	$r2 = mysqli_query($con, $r1);
	$r3 = mysqli_fetch_array($r2);
	$vehicle_reg_num = $r3['reg_num'];
	echo $vehicle_reg_num;
	$s1 = "select * from instructor where name = '$instr_name' && reg_num = '$vehicle_reg_num' ";
	$s2 = mysqli_query($con, $s1);
	$s3 = mysqli_fetch_array($s2);
	$instr_email = $s3['email'];
	
	$year = substr($dob,0,4);
	$month = substr($dob,5,2);
	$date = substr($dob,8,2);
	
	$q = "insert into student(username,name,email,password,dob,age,reg_num,instr_email,gender,contact,raddress,plocation,branch) values('$username','$fullname','$email','$password','$year-$month-$date','$age','$vehicle_reg_num','$instr_email','$gender','$contact','$radd','$ploc','$branch') ";
	mysqli_query($con, $q);
	
	
}
else if($work == "reject") {
	$status = "applied - pending";
	$q1 = "select * from guest where status = '$status' order by fname ASC";
	$q2 = mysqli_query($con, $q1);
	$i = 0;
	while($row = mysqli_fetch_array($q2)) {
		if($i == $index) break;
	}
	$username = $row['username'];
	$q = "delete from guest where username = '$username' ";
	mysqli_query($con, $q);
}
else {
	$status = "applied - pending";
	$q1 = "select * from guest where status = '$status' order by fname ASC";
	$q2 = mysqli_query($con, $q1);
	$i = 0;
	while($row = mysqli_fetch_array($q2)) {
		if($i == $index) break;
	}
	$username = $row['username'];
	$status = "pending";
	$q = "update guest set status = '$status' where username = '$username' ";
	mysqli_query($con, $q);
}

?>