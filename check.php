<?php

//include 'connection2.php';

$username = $_SESSION["username"];

$qq1 = "select * from student where username = '$username' ";
$qq2 = mysqli_query($con, $qq1);
$qq3 = mysqli_fetch_array($qq2);
$instr_email = $qq3['instr_email'];
/*$r1 = "select * from instructor where email = '$instr_email' ";
$r2 = mysqli_query($con, $r1);
$r2 = mysqli_query($con, $r1);
$r3 = mysqli_fetch_array($r2);
$instr_name = $r3['username'];*/

//$date = "2018-10-22";
$date = date_create($date);
$date = date_format($date,"Y-m-d");
$pp1 = "select * from instrschedule where email = '$instr_email' && date = '$date' order by time ASC";
$pp2 = mysqli_query($con, $pp1);
//echo $p2;
//echo 
$ii = 0;
if($pp2 != "false") {
	//echo "here";
	$length = mysqli_num_rows($pp2);
	//echo $length;
	$length = $length * 8;
	$length = $length + 8;
	$time_array = array();
	while($pp3 = mysqli_fetch_array($pp2)) {
			$time_array[$ii] = $pp3['time'];
		$ii++;
	}
	$time_array[] = "22:00:00";
	$ii++;
	//echo $time_array[0];
	
						
	//case1 start-time
	$available_array = array();
	$ii = 0;
	$start_hour = 10;
	$start_minute = 0;
	$nn = 0;
						
	for($aa = 0; $aa < $length ; $aa = $aa + 8) {
		$next_time = $time_array[$nn];
		//echo ord($next_time[0]);
		$next_hour = normaltime(ord($next_time[0])-48,ord($next_time[1])-48);
		//echo $next_hour;
		//echo " & min : ";
		//echo $next_time[2] ;
		$next_minute = normaltime(ord($next_time[3])-48,ord($next_time[4])-48);
		//echo $next_minute;
		for($bb = 0; $bb < 25 ; $bb++) {
			if(($next_hour - $start_hour >= 1) && ($start_hour < 21)) {
				if($next_hour - $start_hour == 1) {
					if($next_minute > $start_minute) {
						//echo "here";
						$available_array[] = $start_hour;
						$available_array[] = $start_minute;
						$ii = $ii + 2;
						if($start_minute == 30) {
							$start_hour = $start_hour + 1;
							$start_minute = 0;
						}
						else {
							$start_minute = 30;
						}
					}
					else {
						if($next_minute == $start_minute) {
						if($start_minute == 30) {
							$start_hour = $start_hour + 3;
							$start_minute = 0;
							break;
						}
						else {
							$start_hour = $start_hour + 2;
							$start_minute = 30;
							break;
						}
					}
					else {
						$start_hour = $start_hour + 2;
						break;
					}
				}
			}	
			else {
				$available_array[] = $start_hour;
				//echo $available_array[$i];
				$available_array[] = $start_minute;
				$ii = $ii + 2;
				if($start_minute == 30) {
					$start_hour = $start_hour + 1;
					$start_minute = 0;
				}
				else {
					$start_minute = 30;
					}
				}
			}
			else {
				break;
			}
		}
		$nn++;
	}
}
else {
	$available_array = array();
}
				
?>