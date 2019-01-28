<?php

include 'connection2.php';

$index = $_GET["index"];

$status = "applied - pending";
$q1 = "select * from guest where status = '$status' order by fname ASC";
$q2 = mysqli_query($con, $q1);
$i = 0;
while($row = mysqli_fetch_array($q2)) {
	if($i == $index) break;
	$i++;
}

$stud_email = $row['email'];

/*$q = "delete from guest where email = '$stud_email' ";
mysqli_query($con, $q);*/

$q1 = "select * from student where email = '$stud_email' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);

$instr_email = $q3['instr_email'];
echo $stud_email;


$q1 = "select * from preference where email = '$stud_email' ";
$q2 = mysqli_query($con, $q1);
$q3 = mysqli_fetch_array($q2);

function decode($text) {
	if($text == "1") return "Monday";
	else if($text == "2") return "Tuesday";
	else if($text == "3") return "Wednesday";
	else if($text == "4") return "Thursday";
	else if($text == "5") return "Friday";
	else if($text == "6") return "Saturday";
	else return 0;
}

$days = array();	
$day1 = $q3['day1'];
$days[] = $day1;
$day2 = $q3['day2'];
$days[] = $day2;
$numdays = 2;

if($q3['day3'] != 0) {
	$day3 = $q3['day3'];
	$days[] = $day3;
	$numdays = 3;
}

if($q3['day4'] != 0) {
	$day4 = $q3['day4'];
	$days[] = $day4;
	$numdays = 4;
}

if($q3['day4'] != 0) {
	$day4 = $q3['day4'];
	$days[] = $day5;
	$numdays = 5;
}


$startdate = "2018-10-22";

sort($days);
/*for( $i=0 ; $i<$numdays ; $i++) {
	$days[$i] = decode($days[$i]);
}*/

function increment($c, $l) {
	$a = array();
	if(($c == 1 && $l == 2) || ($c == 2 && $l == 2) || ($c == 3 && $l == 6) || ($c == 4 && $l == 6) || ($c == 5  && $l == 3)) {
		$c++;
		$l = 1;
	}
	else $l++;
	$a[] = $c;
	$a[] = $l;
	return $a;
}
		


$totalsessions = 0;
$course_code = $q3['course_type'];
if($course_code == 12) $totalsessions = 4;
if($course_code == 3) $totalsessions = 10;
if($course_code == 34) $totalsessions = 16;
if($course_code == 6) $totalsessions = 21;

$pref_start_time = $q3['time_start'];
$pref_end_time = $q3['time_end'];

$course_id = 1;
$lec_num = 1;
$status = "incomplete";
$arr = array();
//echo $numdays;
//echo $totalsessions;
$date = date_create($startdate);

for($i=1 ; $i<=$totalsessions ; ) {
	//$i--;
	for($j=0 ; $j<$numdays ; $j++) { 
		
		$date3 = date_format($date,"Y-m-d");
		$timestamp = date_timestamp_get($date);
		$date2 = getdate($timestamp);
		//echo $date2['wday'];
		if($date2['wday'] == $days[$j]) {
			$a1 = "select * from instrschedule where email = '$instr_email' && date = '$date3' && time > '$pref_start_time' && time < '$pref_end_time' ";
			$a2 = mysqli_query($con, $a1);
			$a4 = mysqli_num_rows($a2);
			if($a4 == 1) {
				$a3 = mysqli_fetch_array($a2);
				$time = $a3['time'];
				$time = date_create($time);
				date_add($time,date_interval_create_from_date_string("1 hour 30 minutes"));
				if($time < $pref_end_time) {
					$time = date_format($time,"H:i:s");
					$b = "insert into studentschedule(email,date,time,course_id,lec_num,status) values('$stud_email','$date3','$time','$course_id','$lec_num','$status') ";
					mysqli_query($con, $b);
					$c = "insert into instrschedule(email,stud_email,date,time,course_id,lec_num,status) values('$instr_email','$stud_email','$date3','$time','$course_id','$lec_num','$status') ";
					mysqli_query($con, $c);
					//echo $i;
					$arr = increment($course_id,$lec_num);
					$course_id = $arr[0];
					$lec_num = $arr[1];
					$i++;
					if($i > $totalsessions) break;
				}
				else {
					//echo "jere";
					date_add($time,date_interval_create_from_date_string("-1 hour -30 minutes"));
					if($time > $pref_start_time) {
						$time = date_format($time,"H:i:s");
						$b = "insert into studentschedule(email,date,time,course_id,lec_num,status) values('$stud_email','$date3','$time','$course_id','$lec_num','$status') ";
						mysqli_query($con, $b);
						$c = "insert into instrschedule(email,stud_email,date,time,course_id,lec_num,status) values('$instr_email','$stud_email','$date3','$time','$course_id','$lec_num','$status') ";
						mysqli_query($con, $c);
						$arr = increment($course_id,$lec_num);
						$course_id = $arr[0];
						//echo $i;
						$lec_num = $arr[1];
						$i++;
						if($i > $totalsessions) break;
					}
				}
			}
			else if($a4 == 0) {
				$time = $pref_start_time;
				$time = date_create($time);
				$time = date_format($time,"H:i:s");
				$b = "insert into studentschedule(email,date,time,course_id,lec_num,status) values('$stud_email','$date3','$time','$course_id','$lec_num','$status') ";
				mysqli_query($con, $b);
				$c = "insert into instrschedule(email,stud_email,date,time,course_id,lec_num,status) values('$instr_email','$stud_email','$date3','$time','$course_id','$lec_num','$status') ";
				mysqli_query($con, $c);
				$arr = increment($course_id,$lec_num);
				$course_id = $arr[0];
				$lec_num = $arr[1];
				$i++;
				if($i > $totalsessions) break;
				//echo $i;
			}
		}
		else {
			date_add($date,date_interval_create_from_date_string("1 day"));
			$j--;
		}
	}
}

header('location:adminhome.php');


?>