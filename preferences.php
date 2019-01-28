<!DOCTYPE html>
<html>
<?php 

include 'connection2.php';

/*if($_SESSION["usertype"] != "guest") {
	header('location:logout.php');
}*/

$email = $_SESSION["email"];
//$email = "jaineel.ns@somaiya.edu";
$username = $_SESSION["username"];
//$username = "yelowflash";

?>

	<head>
		<title>Preferences</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script>
			$(document).ready(function() {
				$("#form").hide();
				$("#course li a").click(function() {
					$("#coursebutton").html($(this).text()+"  "+"<span class='caret'></span>");
					$("#coursetype").val($(this).attr('id'));
				});
				
				function createFunction( i ) {
					return function() {
						$('#buttonselectday'+i).html($(this).text());
						$('#day_'+i).val($(this).text());
						var day = $(this).text();
						for(let j=1 ; j<=5 ; j++) {
							if(j != i) {
								//$('#selectday'+i+' li').addClass("disabled");
								//alert(day);
								$('#'+day+""+j).addClass("disabled");
							}
						}
					}
				}
				
				for(let i=1 ; i<=5 ; i++) {
					$('#selectdaydiv'+i).hide();
					$('#selectday'+i+' li a').click( createFunction( i ) );
				}
	
				//selecting number of days
				var selectday = "selectday";
				$("#numdays li a").click(function() {
					var days = $(this).text();
					$("#num_days").val($(this).attr('id'));
					$("li").removeClass("disabled");
					
					for(let i=1 ; i<=5 ; i++) {
						$('#selectdaydiv'+i).hide();
						$('#buttonselectday'+i).text("Select day "+i);
					}
					for(let i=1 ; i<=days ; i++) {
						$('#selectdaydiv'+i).show();
					}
				});
				
				$("#submit").click(function() {
					var stime = $("#start_time").val();
					//alert(stime);
					var etime = $("#end_time").val();
					$("#starttime").val(stime);
					$("#endtime").val(etime);
					$("#form1").submit();
				});
			});
		</script>
		
	</head>
	<style>
		body {
			background: #d9dce0;
		}

		.container {
			padding-top: 30px;
		}

		.container p {
			line-height: 1;
			font-size: 19px;
		}

		label {
			padding-left: 60px;
		}

		.form-inline {
			padding-top: 20px;
			padding-bottom: 40px;
		}

		.dropdown {
			margin: 20px;
		}

		#submit {
			margin-left: 40px;
		}
	</style>
	
	<body>
		<div class="container">
			<p>Please note that the time interval should be of less than 4 hours, & will be scheduled to start within this mentioned time</p>
			<p>With these preferences of yours, we will shortlist the vehicles & instructors available and provide you an option to select amongst them</p>
			<div class="form-inline">
				<label for="start_time">Start Time</label>
				<input type="time" class="form-control" id="start_time">
				<label for="end_time">End Time</label>
				<input type="time" class="form-control" id="end_time">
			</div>
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="coursebutton">Course
					<span class="caret"></span></button>
				<ul id="course" class="dropdown-menu">
					<li><a  id="12">Basics (Learn how to drive a car but in an empty space)</a></li>
					<li><a  id="3">Advanced Driving - 1 (Includes basic training, & driving on roads but less challenging environment)</a></li>
					<li><a  id="34">Advanced Driving - 1 & 2 (Learning to drive in any kind of situation, includes parking lessons)</a></li>
					<li><a  id="6">Full training</a></li>
				</ul>
			</div>
			
			<div>
				<div class="dropdown">
					<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" id="numberbutton">Number of days
						<span class="caret"></span></button>
					<ul id="numdays" class="dropdown-menu">
						<li><a  id="2">2</a></li>
						<li><a  id="3">3</a></li>
						<li><a  id="4">4</a></li>
						<li><a  id="5">5</a></li>
					</ul>
				</div>
				
				<div class="dropdown" id="selectdaydiv1">
					<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" id="buttonselectday1">Select day 1
						<span class="caret"></span></button>
					<ul id="selectday1" class="dropdown-menu">
						<li id="Monday1"><a  >Monday</a></li>
						<li id="Tuesday1"><a  >Tuesday</a></li>
						<li id="Wednesday1"><a  >Wednesday</a></li>
						<li id="Thursday1"><a  >Thursday</a></li>
						<li id="Friday1"><a  >Friday</a></li>
						<li id="Saturday1"><a  >Saturday</a></li>
					</ul>
				</div>
				
				<div class="dropdown" id="selectdaydiv2">
					<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" id="buttonselectday2">Select day 2
						<span class="caret"></span></button>
					<ul id="selectday2" class="dropdown-menu">
						<li id="Monday2"><a  >Monday</a></li>
						<li id="Tuesday2"><a  >Tuesday</a></li>
						<li id="Wednesday2"><a  >Wednesday</a></li>
						<li id="Thursday2"><a  >Thursday</a></li>
						<li id="Friday2"><a  >Friday</a></li>
						<li id="Saturday2"><a  >Saturday</a></li>
					</ul>
				</div>
				
				<div class="dropdown" id="selectdaydiv3">
					<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" id="buttonselectday3">Select day 3
						<span class="caret"></span></button>
					<ul id="selectday3" class="dropdown-menu">
						<li id="Monday3"><a  >Monday</a></li>
						<li id="Tuesday3"><a  >Tuesday</a></li>
						<li id="Wednesday3"><a  >Wednesday</a></li>
						<li id="Thursday3"><a  >Thursday</a></li>
						<li id="Friday3"><a  >Friday</a></li>
						<li id="Saturday3"><a  >Saturday</a></li>
					</ul>
				</div>
				
				<div class="dropdown" id="selectdaydiv4">
					<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" id="buttonselectday4">Select day 4
						<span class="caret"></span></button>
					<ul id="selectday4" class="dropdown-menu">
						<li id="Monday4"><a  >Monday</a></li>
						<li id="Tuesday4"><a  >Tuesday</a></li>
						<li id="Wednesday4"><a  >Wednesday</a></li>
						<li id="Thursday4"><a  >Thursday</a></li>
						<li id="Friday4"><a  >Friday</a></li>
						<li id="Saturday4"><a  >Saturday</a></li>
					</ul>
				</div>
				
				<div class="dropdown" id="selectdaydiv5">
					<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" id="buttonselectday5">Select day 5
						<span class="caret"></span></button>
					<ul id="selectday5" class="dropdown-menu">
						<li id="Monday5"><a  >Monday</a></li>
						<li id="Tuesday5"><a  >Tuesday</a></li>
						<li id="Wednesday5"><a  >Wednesday</a></li>
						<li id="Thursday5"><a  >Thursday</a></li>
						<li id="Friday5"><a  >Friday</a></li>
						<li id="Saturday5"><a  >Saturday</a></li>
					</ul>
				</div>
			
			
		</div>

		<button type="submit" id="submit" class="btn btn-success">Submit</button>

		<div id="form">
			<form action="setpreferences.php" method="POST" id="form1">
				<input type="time" name="starttime" id="starttime">
				<input type="time" name="endtime" id="endtime">
				<input type="number" name="coursetype" id="coursetype">
				<input type="number" name="num_days" id="num_days">
				<input type="text" name="day_1" id="day_1">
				<input type="text" name="day_2" id="day_2">
				<input type="text" name="day_3" id="day_3">
				<input type="text" name="day_4" id="day_4">
				<input type="text" name="day_5" id="day_5">
			</form>
		</div>
	</body>
</html>