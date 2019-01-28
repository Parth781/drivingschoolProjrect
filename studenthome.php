<!DOCTYPE html>

<?php
	include 'connection2.php';
	//$email = "pulinshah07@gmail.com";
	$email = $_SESSION["email"];
	$c1 = "select * from notification where receiver = '$email' ";
	$unread = "unread";
	$d1 = "select * from notification where receiver = '$email' && status = '$unread' order by status DESC ";
	$d2 = mysqli_query($con, $d1);
	$d3 = mysqli_num_rows($d2);
	$c2 = mysqli_query($con, $c1);
	$number_notif = mysqli_num_rows($c2);
	//$number_notif = 5;
	
	$h1 = "select * from studentschedule where email = '$email' ";
	$h2 = mysqli_query($con, $h1);
	$number_list = mysqli_num_rows($h2);
	$number_list = $number_list + 1;
	
	function normaltime($v1, $v2) {
		$ten = 10;
		$v = ($v1*$ten) + $v2;
		return $v;
	}
	
?>




<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
	
    <title>student home</title>
	
	<script>
	
	
	
	</script>
	
	<script>
	$(document).ready(function() {
		var z = <?php echo $number_list; ?>;
		//var z = <?php echo ord($number_list)-48; ?>;
		//alert(z);
		for(let i=1 ; i<z ; i++) {
			$('#changetime'+i).hide();
			$('#confirmT'+i).hide();
			$('#confirmD'+i).hide();
			$('#changetime'+i).hide();
			$('#changedate'+i).hide();
			$('#date2'+i).hide();
			$('#time2'+i).hide();
			//window.alert(i);
		}
		$("#changepic").css("opacity","0.0");
		$("#changepic").hover(function() {
			$("#changepic").css("opacity","0.5");
			$("#changepic").click(function() {
				window.location = 'changeprofile.php';
			});
		},
		function() {
			$("#changepic").css("opacity", "0.0");
		});
		
		function createChangefunction( i ) {
			return function() {
				$('#changedate'+i).show();
				$('#changetime'+i).show();
				$('#change'+i).hide();
			}
		}
		
		for(let i = 1; i < z ; i++) {
			$('#change'+i).click( createChangefunction( i ) ); 
		}
		
		function createCancelfunction( i ) {
			return function() {
				$('#change'+i).show();
				$('#changedate'+i).hide();
				$('#changetime'+i).hide();
				$('#time1'+i).show();
				$('#time2'+i).hide();
				$('#changetime2'+i).hide();
				$('#confirmT'+i).hide();
				$('#confirmD'+i).hide();
				$('#date1'+i).show();
				$('#date2'+i).hide();
			}
		}
		
		for(let i = 1; i < z ; i++) {	
			$('#cancel'+i).click( createCancelfunction( i ) ); 
		}
		
		function createChangeTimefunction( i ) {
			return function() {
				$('#time2'+i).show();
				$('#time1'+i).hide();
				$('#changetime2'+i).show();
				$('#changedate'+i).hide();
				$('#changetime'+i).hide();
				$('#confirmT'+i).show();
			}
		}
		
		for(let i = 1; i < z ; i++) {
			$('#changetime'+i).click( createChangeTimefunction( i ) );
		}
		
		function createChangeDatefunction( i ) {
			return function() {
				$('#date1'+i).hide();
				$('#date2'+i).show();
				$('#confirmD'+i).show();
				$('#changedate'+i).hide();
				$('#changetime'+i).hide();
			}
		}
		
		for(let i = 1; i <z ; i++) {
			$('#changedate'+i).click( createChangeDatefunction( i ) );
		}
		
		function createConfirmTimefunction( i ) {
			return function() {
				$("#addtime").val($('#selected'+i).text());
				$("#fordate").val($('#date1'+i).text());
				$("#oldtime").val($('#time1'+i).html());
				$("#timeform").submit();
			}
		}
		
		for(let i = 1; i < z ; i++) {
			$('#confirmT'+i).click( createConfirmTimefunction( i ) );
		}
		
		function createConfirmDatefunction( i ) {
			return function() {
				$("#olddate").val($('#date1'+i).text());
				$("#newdatenew").val($('#newdate'+i).val());
				$("#dateformnew").submit();
			}
		}
		
		for(let i = 1; i < z ; i++) {
			$('#confirmD'+i).click( createConfirmDatefunction( i ) );
		}
		
		function createSelectedfunction( i ) {
			return function() {
				$('#selected'+i).text($(this).text());
			}
		}
		
		for(let i = 1; i < z ; i++) {			
			$('.dropdown-menu a').click( createSelectedfunction( i ) );
		}
		
		//notifications
		
		function openModalfunction( i ) {
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
		}
		
		
	
	});
	</script>
			
			
  </head>
  <body>
	<nav class="navbar navbar-default" >
		<div class="container-fluid">
			<ul class="nav navbar-nav" >
				<li><a href="studenthome.php" style="color: black !important">Home</a></li>
				<li><a href="locateInstructor.html" style="color: black !important">Locate Instructor</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<div class="dropdown" style="float : left;">
					<a href="#" class="btn btn-info btn-lg" data-toggle="dropdown" style="">
						<span class="glyphicon glyphicon-bell" style=""></span>
					</a>
		
					<ul class="dropdown-menu">
						<?php 
						
						$i = -1;
							while($c3 = mysqli_fetch_array($c2)) {
								$i++;
								$notif = "noti";
								$header = "header";
								$notif = $notif.$i;
								$header = $header.$i;
						?>
						<li class="dropdown-header" id="<?php echo $header; ?>">
							<?php 
								echo $c3['header'];
							?>
						</li>
						<li><a class="dropdown-item" id="<?php echo $notif; ?>"  data-toggle="modal" data-target="#myModal">
							<?php
								echo $c3['message'];
							?>
							</a>
						</li>
							<?php } ?>
					</ul>
				</div>
				<p class="" style="color : #FFFFFF; z-index = 3; position : absolute; background-color : red;"><?php echo $d3; ?></p>
	  
	  
				<!--<div class="dropdown" style="float : left; padding-left : 20px; padding-right : 10px;"> -->
				<li style="padding-left : 20px;">
					<img src="images/nophoto.PNG" class="img-circle" width="45px" height="45px" data-toggle="dropdown">
					<ul class="dropdown-menu">
						<li class="dropdown-header">
							<img src="images/nophoto.PNG" id="profilepic" class="img-circle other" width="95px" height="95px">
							<img src="images/overlap.PNG" class="overlap" id="changepic">
							<?php 
							$x = "select * from student where email = '$email' ";
							$x2 = mysqli_query($con, $x);
							$x3 = mysqli_fetch_array($x2);
							
							?>
							<p class="padded"><?php echo $x3['name']; ?></p>
							<p class="padded2"><?php echo $x3['email']; ?></p>
							<p class="padded2"><?php echo $x3['username']; ?></p></li>
						</li>
						<li><a class="dropdown-item" href="#">Profile</a></li>
						<li><a class="dropdown-item" href="#">Change Password</a></li>
						<li><a class="dropdown-item" href="#">Help</a></li>
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
                <th>Date</th>
                <th>Time</th>
                <th>Content</th>
				<th>Action</th>
              </tr>
            </thead>
			<?php
				//$email = "pulinshah07@gmail.com";
				$email = $_SESSION["email"];
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
					//echo "<script type='text/javascript'> window.alert('xx'); </script>"; 
					//echo "11";
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
				<td id="<?php echo $date2; ?>">
				<div class="form-group">
					<form action="changedate.php" method="POST" id="<?php echo $dateform; ?>">
					<input type="date" id="<?php echo $newdate; ?>" class="form-control" name="<?php echo $newdate; ?>">
					</form>
				</div>
				</td>
                <td id="<?php echo $date1; ?>"><?php echo $h3['date']; ?></td>
				<td id="<?php echo $time2; ?>"><div class="dropdown" style="padding:0px; margins:0px;">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span id="<?php echo $selected; ?>">Choose option</span><span class="caret"></span></button>
					<ul class="dropdown-menu" style="padding:0px;" id="<?php echo $timelist; ?>">
					
					<?php 
						$date = $h3['date'];
						//echo $date;
						//echo "<script type='text/javascript'> window.alert('p'); </script>";
						include 'check.php';
							
							for($g = 0; $g<$ii ; $g = $g + 2) {
							
					?>
						<li><a class="dropdown-item"><?php echo $available_array[$g]; echo ":"; echo $available_array[$g + 1]; 
						if($available_array[$g+1] == 0) {
							echo "0";
						}
						?></a></li>
						<?php 
							}
						?>
						
					</ul>
					</div>
				</td>
                <td id="<?php echo $time1; ?>"><?php echo $h3['time']; ?></td>
				<td><?php echo $t3['lec_details']; ?></td>
                <td>
				  <button class="btn btn-sm btn-success" id="<?php echo $confirm_time; ?>" ><i class="far fa-calendar-alt"></i> Confirm </button>
				  <button class="btn btn-sm btn-success" id="<?php echo $confirm_date; ?>" ><i class="far fa-calendar-alt"></i> Confirm </button>
				  <button class="btn btn-sm btn-success" id="<?php echo $change_date; ?>" ><i class="far fa-calendar-alt"></i> Date </button>
				  <button class="btn btn-sm btn-success" id="<?php echo $change_time; ?>" ><i class="far fa-calendar-alt"></i> Time </button>
                  <button class="btn btn-sm btn-success" id="<?php echo $change; ?>" ><i class="far fa-calendar-alt"></i> Change Schedule </button>
                  <button class="btn btn-sm btn-danger" id="<?php echo $cancel; ?>"><i class="far fa-times-circle"></i> Cancel </button>
                </td>
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
  			<!--<button type="button" id="modalbutton" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
	
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
				$a1 = "select * from notification where sender = '$email' ";
				$a2 = mysqli_query($con, $a1);
				$c1 = "select * from student where email = '$email' ";
				$c2 = mysqli_query($con, $c1);
				//echo $a2;
				
				$c3 = mysqli_fetch_array($c2);
				$instr_email = $c3['instr_email'];
				
				$i = -1;
				if($a2 != false) {
					$a4 = mysqli_num_rows($a2);
				while($a3 = mysqli_fetch_array($a2)) {
					$i++;
					$accept = "accept";
					$reject = "reject";
					$accept = $accept.$i;
					$reject = $reject.$i;
					if($a3['changedate_id'] != "") {
						$code = $a3['changedate_id'];
						$b1 = "select * from changedate where id = '$code' ";
						$b2 = mysqli_query($con, $b1);
						$b3 = mysqli_fetch_array($b2);
						$old_date = $b3['old'];
						$d1 = "select * from instrschedule where email = '$instr_email' && stud_email = '$email' && date = '$old_date' ";
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
						$b1 = "select * from changetime where id = '$code' ";
						$b2 = mysqli_query($con, $b1);
						$b3 = mysqli_fetch_array($b2);
						$old_date = $b3['date'];
						$d1 = "select * from instrschedule where email = '$instr_email' && stud_email = '$email' && date = '$old_date' ";
						$d2 = mysqli_query($con, $d1);
						$d3 = mysqli_fetch_array($d2);
						$courseid = $d3['course_id'];
						$lecnum = $d3['lec_num'];
						$e1 = "select * from course where id = '$courseid' && lec_num = '$lecnum' ";
						$e2 = mysqli_query($con, $e1);
						$e3 = mysqli_fetch_array($e2);
					}
				
			?>
				<tr>
					<td><?php echo $e3['name']; ?></td>
					<td><?php echo $lecnum; ?></td>
					<td><?php echo $e3['lec_details']; ?></td>
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
					<td><?php echo $b3['status']; ?></td>
				</tr>
			<?php
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