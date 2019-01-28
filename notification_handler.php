<?php

include 'connection2.php';

$email = $_REQUEST["email"];
$code = $_REQUEST["code"];
$work = $_REQUEST["work"];


if($work == "accept") {
	$q1 = "select * from notification where changedate_id = '$code' ";
	$q2 = mysqli_query($con, $q1);
	$q4 = mysqli_num_rows($q2);
	if($q4 == 0) {
		echo "here";
		$q1 = "select * from notification where changetime_id = '$code' ";
		$q2 = mysqli_query($con, $q1);
		$q3 = mysqli_fetch_array($q2);
		$new_sender = $q3['receiver'];
		echo $new_sender;
		$new_receiver = $q3['sender'];
		$r1 = "select * from changetime where id = '$code' ";
		$r2 = mysqli_query($con, $r1);
		$r3 = mysqli_fetch_array($r2);
		$old_time = $r3['old'];
		$new_time = $r3['new'];
		$date = $r3['date'];
		$q = "update instrschedule set time = '$new_time' where email = '$new_sender' && stud_email = '$new_receiver' && date = '$date' ";
		mysqli_query($con, $q);
		$q = "update studentschedule set time = '$new_time' where email = '$new_receiver' && date = '$date' && time = '$old_time' ";
		mysqli_query($con, $q);
		$header = "Request for change in time granted";
		$message = "Request for change in time from $old_time to $new_time for date $date is accepted";
		$status = "unread";
		$q = "insert into notification(sender, receiver, header, message, status) values('$new_sender','$new_receiver','$header','$message','$status') ";
		mysqli_query($con, $q);
		$accept = "accepted";
		$q = "update changetime set status = '$accept' where id = '$code' ";
		mysqli_query($con, $q);
	}
	else {
		echo "correct";
		$q1 = "select * from notification where changedate_id = '$code' ";
		$q2 = mysqli_query($con, $q1);
		$q3 = mysqli_fetch_array($q2);
		$new_sender = $q3['receiver'];
		$new_receiver = $q3['sender'];
		$r1 = "select * from changedate where id = '$code' ";
		$r2 = mysqli_query($con, $r1);
		$r3 = mysqli_fetch_array($r2);
		$old_date = $r3['old'];
		$new_date = $r3['new'];
		//$date = $r3['date'];
		$q = "update instrschedule set date = '$new_date' where email = '$new_sender' && stud_email = '$new_receiver' && date = '$old_date' ";
		mysqli_query($con, $q);
		$q = "update studentschedule set date = '$new_date' where email = '$new_receiver' && date = '$old_date' ";
		mysqli_query($con, $q);
		$header = "Request for change in date granted";
		$message = "Request for change in date from $old_date to $new_date is accepted";
		$status = "unread";
		$q = "insert into notification(sender, receiver, header, message, status) values('$new_sender','$new_receiver','$header','$message','$status') ";
		mysqli_query($con, $q);
		$accept = "accepted";
		$q = "update changedate set status = '$accept' where id = '$code' ";
		mysqli_query($con, $q);
	}
}
else {
	$q1 = "select * from notification where changedate_id = '$code' ";
	$q2 = mysqli_query($con, $q1);
	if($q2 == false) {
		$q1 = "select * from notification where changetime_id = '$code' ";
		$q2 = mysqli_query($con, $q1);
		$q3 = mysqli_fetch_array($q2);
		$new_sender = $q3['receiver'];
		$new_receiver = $q3['sender'];
		$r1 = "select * from changetime where id = '$code' ";
		$r2 = mysqli_query($con, $r1);
		$r3 = mysqli_fetch_array($r2);
		$old_time = $r3['old'];
		$new_time = $r3['new'];
		$date = $r3['date'];
		$header = "Request for change in time rejected";
		$message = "Request for change in time from $old_time to $new_time for date $date is rejected";
		$status = "unread";
		$q = "insert into notification(sender, receiver, header, message, status) values('$new_sender','$new_receiver','$header','$message','$status') ";
		mysqli_query($con, $q);
		/*$q = "delete from notification where changetime_id = '$code' ";
		mysqli_query($con, $q);
		$q = "delete from changetime where id = '$code' ";
		mysqli_query($con, $q);*/
		$accept = "rejected";
		$q = "update changetime set status = '$accept' where id = '$code' ";
		mysqli_query($con, $q);
	}
	else {
		$q1 = "select * from notification where changedate_id = '$code' ";
		$q2 = mysqli_query($con, $q1);
		$q3 = mysqli_fetch_array($q2);
		$new_sender = $q3['receiver'];
		$new_receiver = $q3['sender'];
		$r1 = "select * from changedate where id = '$code' ";
		$r2 = mysqli_query($con, $r1);
		$r3 = mysqli_fetch_array($r2);
		$old_date = $r3['old'];
		$new_date = $r3['new'];
		$header = "Request for change in date rejected";
		$message = "Request for change in date from $old_date to $new_date is rejected";
		$status = "unread";
		$q = "insert into notification(sender, receiver, header, message, status) values('$new_sender','$new_receiver','$header','$message','$status') ";
		mysqli_query($con, $q);
		/*$q = "delete from notification where changedate_id = '$code' ";
		mysqli_query($con, $q);
		$q = "delete from changedate where id = '$code' ";
		mysqli_query($con, $q);*/
		$accept = "rejected";
		$q = "update changedate set status = '$accept' where id = '$code' ";
		mysqli_query($con, $q);
	}
}
?>