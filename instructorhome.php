<!DOCTYPE html>

<?php
	include 'connection2.php';
	$email = $_SESSION["email"];
	//$g1 = "select * from notification where receiver = '$email' ";
	$unread = "unread";
	$g1 = "select * from notification where receiver = '$email' && status = '$unread' order by status DESC ";
	$g2 = mysqli_query($con, $g1);
	$g4 = mysqli_num_rows($g2);
	//$g2 = mysqli_query($con, $g1);
	$h1 = "select * from instrschedule where email = '$email' ";
	$h2 = mysqli_query($con, $h1);
	//$number_list = mysqli_num_rows($h2);
	//$number_list = $number_list + 1;
	
	if(isset($_GET['lat'])) {
	$j1 = "select * from location where email = '$email' ";
	$j2 = mysqli_query($con, $j1);
	$j3 = mysqli_num_rows($j2);
	$latitude = $_GET['lat'];
	$longitude = $_GET['lon'];
	date_default_timezone_set("Asia/Kolkata");
	$timex = localtime();
	$minutes = $timex[1];
	$hours = $timex[2];
	$sec = 0;
	
	if($j3 == 0) {
		$j = "insert into location(email,latitude,longitude,time) values ('$email','$latitude','$longitude','$hours:$minutes:$sec') ";
		mysqli_query($con, $j);
	}
	else {
		$k1 = "update location set latitude = '$latitude' where email = '$email' ";
		$k2 = "update location set longitude = '$longitude' where email = '$email' ";
		$k3 = "update location set time = '$hours:$minutes:$sec' where email = '$email' ";
		mysqli_query($con, $k1);
		mysqli_query($con, $k2);
		mysqli_query($con, $k3);
	}
}

?>

<?php

$a1 = "select * from notification where receiver = '$email' ";
				$a2 = mysqli_query($con, $a1);
				$accept = "accept";
				$reject = "reject";
				$i = -1;
				$a4 = mysqli_num_rows($a2);
				if($a2 != false) {
					
				}

?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" http-equiv="refresh" content="30" content="width=device-width, initial-scale=1, shrink-to-fit=no"  >

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<style>
	body {
		background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
	}

	.navbar {
		background: rgba(0,0,0,0.4);
	}

	.other {
		float : left;
		z-index : -1;
		position : absolute;
	}
	.padded {
		padding-top : 40px;
		padding-right : 5px;
		padding-left : 110px;
	}
	.padded2 {
		padding-left : 110px;
	}
	.overlap {
		opacity : 0.2;
		float : left;
		width : 95px;
		heigth : 95px;
	}
	</style>
	
    <title>Instructor Home</title>
	
	
	
	<script>
	$(document).ready(function() {
		alert("here");
		/*function getLocation() {
			//alert("c");
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}
		function showPosition(position) {
			var lat = position.coords.latitude;
			var lon = position.coords.longitude;
			//alert("xxx");
			var flag = "http://localhost/DSMS/instructorhome.php";
			var check = window.location.href;
			//alert(check);
			if(flag == check) {
			window.location.href = window.location.href+'?lat='+lat+'&lon='+lon;
			}
		}
			
		getLocation();	*/
			
		//table2
		var rows = <?php echo $a4; ?>;
		alert(rows);
		
		function createAcceptedfunction( i ) {
			return function() {
				var xhttp;
				var email = "<?php echo $email; ?>";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.readyState);
					if(this.readyState == 4 && this.status == 200) {
						//alert(this.responseText);
						window.location.href = window.location.href;
					}
				};
				var code = $('#'+i).val();
				code = code.substr(1);
				//alert(code);
				xhttp.open("GET", "notification_handler.php?email="+email+"&code="+code+"&work=accept", true);
				xhttp.send();
			}
		}
		
		for(let i=0 ; i<rows ; i++) {
			$('#accept'+i).click( createAcceptedfunction ( i ) );
		}
		
		function createRejectedfunction( i ) {
			return function() {
				var xhttp;
				var email = "<?php echo $email; ?>";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						window.location.href = window.location.href;
					}
				};
				var code = $('#'+i).val();
				code = code.substr(1);
				xhttp.open("GET", "notification_handler.php?email="+email+"&code="+code+"&work=reject", true);
				xhttp.send();
			}
		}
		
		for(let i=0 ; i<rows ; i++) {
			$('#reject'+i).click( createRejectedfunction ( i ) );
		}
		
		
		
		/*function openModalfunction( i ) {
			return function() {
				var header = $('#header'+i).text();
				
				var message = $('#noti'+i).text();
				
				$("#modalhead").html(header);
				$("#modaltext").html(message);
				
			}
		}
		
		var notifs = <?php echo $number_notif; ?>;
		for(let i=0 ; i<notifs ; i++) {
			$('#noti'+i).click( openModalfunction( i ) );
		}*/
		
			
	});
	</script>
			
			
  </head>
  <body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav" >
				<li><a href="instructorhome.php" style="color: black !important">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<div class="dropdown" style="float : left;">
					<a href="#" class="btn btn-info btn-lg" data-toggle="dropdown" style="">
						<span class="glyphicon glyphicon-bell" style=""></span>
					</a>
		
					<ul class="dropdown-menu">
						<?php 
						
						$i = -1;
							while($g3 = mysqli_fetch_array($g2)) {
								$i++;
								$notif = "noti";
								$header = "header";
								$notif = $notif.$i;
								$header = $header.$i;
						?>
						<li class="dropdown-header" id="<?php echo $header; ?>">
							<?php 
									echo $g3['header'];
							?>
						<li><a class="dropdown-item" id="<?php echo $notif; ?>"  data-toggle="modal" data-target="#myModal">
							<?php
								
									echo $g3['message'];

							?>
							</a>
						</li>
							<?php } ?>
					</ul>
				</div>
				<p class="" style="color : #FFFFFF; z-index = 3; position : absolute; background-color : red;"><?php echo $g4; ?></p>
	  
	  
				<!--<div class="dropdown" style="float : left; padding-left : 20px; padding-right : 10px;"> -->
				<li style="padding-left : 20px;">
					<img src="images/nophoto.PNG" class="img-circle" width="45px" height="45px" data-toggle="dropdown">
					<ul class="dropdown-menu">
						<li class="dropdown-header">
							<img src="images/nophoto.PNG" id="profilepic" class="img-circle other" width="95px" height="95px">
							<img src="images/overlap.PNG" class="overlap" id="changepic">
							<p class="padded">Rohit Nadiger</p>
							<p class="padded2">nadiger.r@somaiya.edu</p>
							<p class="padded2">rohit11</p></li>
						</li>
						<li><a class="dropdown-item" href="help.php">Help</a></li>
						<li><a class="dropdown-item" href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>



    <div class="container">
		
          <table class="table">
            <thead style="background-color: black; color: white; text-align: center;">
              <tr>
                <th>Course Name</th>
                <th>Lec Number</th>
				<th>Student</th>
                <th>Date</th>
                <th>Time</th>
                <th>Content</th>
              </tr>
            </thead>
			<?php
				//$email = "pulinshah07@gmail.com";
				//$email = $_SESSION["email"];
				$date = getDate();
				$day = $date['mday'];
				$day = $day - 1;
				$month = $date['mon'];
				$year = $date['year'];
				$timex = localtime();
				$minutes_now = $timex[1];
				$hours_now = $timex[2];
				
				//echo ord($number_list)-48;
				//defining ids
				$id = 0;
				
				while($h3 = mysqli_fetch_array($h2)) {
					$id++;
					$confirm_time = "confirmT";
					$confirm_date = "confirmD";
					$change_date = "changedate";
					$change_time = "changetime";
					$change = "change";
					$cancel = "cancel";
					$time1 = "time1";
					$time2 = "time2";
					$date1 = "date1";
					$date2 = "date2";
					$selected = "selected";
					$timelist = "timelist";
					$dateform = "dateform";
					$newdate = "newdate";
					$confirm_time = $confirm_time.$id;
					//echo $confirm_time;
					$confirm_date = $confirm_date.$id;
					$change_date = $change_date.$id;
					$change_time = $change_time.$id;
					$change = $change.$id;
					$cancel = $cancel.$id;
					$time1 = $time1.$id;
					$time2 = $time2.$id;
					$date1 = $date1.$id;
					$date2 = $date2.$id;
					$selected = $selected.$id;
					$timelist = $timelist.$id;
					$dateform = $dateform.$id;
					$newdate = $newdate.$id;
			?>
            <tbody class="bg-primary" style="color: white">
			  <tr>
				<td>
				<?php 
					$cid = $h3['course_id'];
					$t1 = "select * from course where id = '$cid' ";
					$t2 = mysqli_query($con, $t1);
					$t3 = mysqli_fetch_array($t2);
					$cname = $t3['name'];
					echo $cname;
				
				?>
			  
				</td>
                <td><?php echo $h3['lec_num']; ?></td>
				<td>
					<?php 
						$email2 = $h3['stud_email'];
						$bb1 = "select * from student where email = '$email2' ";
						$bb2 = mysqli_query($con, $bb1);
						$bb3 = mysqli_fetch_array($bb2);
						echo $bb3['name'];
					?>
				</td>
                <td id="<?php echo $date1; ?>"><?php echo $h3['date']; ?></td>
                <td id="<?php echo $time1; ?>"><?php echo $h3['time']; ?></td>
				<td><?php echo $t3['lec_details']; ?></td>
              </tr>
            </tbody>
				<?php } ?>
          </table>
		  
		  <form action="changetime.php" method="POST" id="timeform">
				<input type="hidden" id="addtime" name="newtime">
				<input type="hidden" id="fordate" name="fordate">
				<input type="hidden" id="oldtime" name="oldtime">
			</form>
			
			<form action="changedate.php" method="POST" id="dateformnew">
				<input type="hidden" name="olddate" id="olddate">
				<input type="hidden" name="newdatenew" id="newdatenew">
			</form>
			
        </div>

        <!-- bootstrap modal -->
        <div class="container">
  			<!-- Trigger the modal with a button -->
  			<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="	#myModal">Open Modal</button>-->
	
  			<!-- Modal -->
  			<div class="modal fade" id="myModal" role="dialog">
	    		<div class="modal-dialog">
	    
			      	<!-- Modal content-->
			      	<div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title" id="modalhead">Modal Header</h4>
				        </div>
				        <div class="modal-body">
				          <p id="modaltext">Some text in the modal.</p>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
			      	</div>
	    		</div>
  			</div>
		</div>
		
		
		<table class="table">
            <thead style="background-color: black; color: white; text-align: center;">
              <tr>
                <th>Course Name</th>
                <th>Lec Number</th>
				<th>Content</th>
				<th>Student</th>
                <th>Date</th>
				<th>New Date</th>
                <th>Time</th>
				<th>New Time</th>
				<th>Action</th>
              </tr>
            </thead>
			<tbody class="bg-primary" style="color: white">
			<?php 
				//echo $email;
				$a1 = "select * from notification where receiver = '$email' ";
				$a2 = mysqli_query($con, $a1);
				
				$i = -1;
				
				while($a3 = mysqli_fetch_array($a2)) {
					$i++;
					$accept = "accept";
					$reject = "reject";
					$accept = $accept.$i;
					$reject = $reject.$i;
					if($a3['changedate_id'] != "") {
						$code = $a3['changedate_id'];
						$stud_email = $a3['sender'];
						$pending = "pending";
						$b1 = "select * from changedate where id = '$code' && status = '$pending' ";
						$b2 = mysqli_query($con, $b1);
						$b3 = mysqli_fetch_array($b2);
						$b4 = mysqli_num_rows($b2);
						$old_date = $b3['old'];
						$d1 = "select * from instrschedule where email = '$email' && stud_email = '$stud_email' && date = '$old_date' ";
						$d2 = mysqli_query($con, $d1);
						$d3 = mysqli_fetch_array($d2);
						$courseid = $d3['course_id'];
						$lecnum = $d3['lec_num'];
						$e1 = "select * from course where id = '$courseid' && lec_num = '$lecnum' ";
						$e2 = mysqli_query($con, $e1);
						$e3 = mysqli_fetch_array($e2);
					}
					else {
						$code = $a3['changetime_id'];
						$stud_email = $a3['sender'];
						$pending = "pending";
						$b1 = "select * from changetime where id = '$code' && status = '$pending' ";
						$b2 = mysqli_query($con, $b1);
						$b3 = mysqli_fetch_array($b2);
						$b4 = mysqli_num_rows($b2);
						$old_date = $b3['date'];
						$d1 = "select * from instrschedule where email = '$email' && stud_email = '$stud_email' && date = '$old_date' ";
						$d2 = mysqli_query($con, $d1);
						$d3 = mysqli_fetch_array($d2);
						$courseid = $d3['course_id'];
						$lecnum = $d3['lec_num'];
						$e1 = "select * from course where id = '$courseid' && lec_num = '$lecnum' ";
						//echo $courseid;
						$e2 = mysqli_query($con, $e1);
						$e3 = mysqli_fetch_array($e2);
					}
					echo $b4;
				if($b4 != 0) {
					//for($jk = 0 ; $jk<0 ; $jk++) {
			?>
				<tr>
					<td><?php echo $e3['name']; ?></td>
					<td><?php echo $lecnum; ?></td>
					<td><?php echo $e3['lec_details']; ?></td>
					<td>
						<?php 
							$f1 = "select * from student where email = '$stud_email' ";
							$f2 = mysqli_query($con, $f1);
							$f3 = mysqli_fetch_array($f2);
							echo $f3['name'];
						?>
					</td>
					<td><?php echo $old_date; ?></td>
					<td>
						<?php 
							if($a3['changedate_id'] != "") echo $b3['new'];
							else echo $old_date;
						?>
					</td>
					<td><?php echo $d3['time']; ?></td>
					<td>
						<?php 
							if($a3['changedate_id'] != "") echo $d3['time'];
							else echo $b3['new'];
						?>
					</td>
					<td>
						<form>
							<input type="hidden" id="<?php echo $i; ?>" value="<?php echo $i.$code;?>">
						</form>
						<button class="btn btn-sm btn-success" id="<?php echo $accept; ?>" ><i class="far fa-calendar-alt"></i> Accept </button>
						<button class="btn btn-sm btn-danger" id="<?php echo $reject; ?>" ><i class="far fa-calendar-alt"></i> Reject </button>
					</td>
				</tr>
			<?php
				//}
				}
				}
				
			?>
			</tbody>		
		</table>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>