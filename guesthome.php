<!DOCTYPE html>
<html>

<?php 

include 'connection2.php';

$email = $_SESSION["email"];
$username = $_SESSION["username"];

?>

<head>
	<title>Home</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- chrome meta tag -->
    <meta name="theme-color" content="#0800ad">

    <!-- bootstrap meta -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="user_css/guesthome.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- animation on scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
	<!-- <img src="images/four1.png" style="height: 20%; width: 25%; margin-top: 1%; margin-left: 37%"> -->
	<div class="instructions">
		<h3>Please complete the following steps to continue</h3>
	</div>

	<!----- cards ------>
	<div id="ratings" class="ratings">
	    <div class="container">
	        <div class="row">	            
	            <div class="col-lg-3 col-md-3" data-aos="flip-left" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card" id="details">
	                    <i class="fas fa-file-signature"></i>
	                    <h3>Fill Details</h3>
	                    <p>Change any details filled in the registration form</p>
	                    <p><span><a href="#">No Changes?</a></span></p>
	                    <!-- tick if no changes -->
	                    <span class="completed"><i class="fas fa-check-circle" id="tick1" style="display: none;"></i></span>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="flip-left" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card" id="vehicles">
	                    <i class="fas fa-car"></i>
	                    <h3>Select Vehicle</h3>
	                    <p>Select the car you want</p>

	                     <!-- tick if no changes -->
	                    <span class="completed"><i id="vehicletick" class="fas fa-check-circle" style="margin-top: 40px; margin-left: 70px; margin-top: 55px; display: none;"></i></span>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="flip-left" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card" id="instructor">
	                    <i class="fas fa-chalkboard-teacher"></i>
	                    <h3>Select instructor</h3>
	                    <p>Select instructor available here</p>

	                    <!-- tick if no changes -->
	                    <span class="completed"><i id="instructortick" class="fas fa-check-circle" style="margin-top: 40px; margin-left: 70px; margin-top: 55px; display: none;"></i></span>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="flip-left" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card" id="documents" style="padding-right: 0">
	                    <i class="fas fa-passport" style="margin-right: 30px;"></i>
	                    <h3 style="margin-right: 30px">Upload documents</h3>
	                 
	                    <div class="col-lg-6 col-md-6" style="padding-left: 0px; line-height: 1.1;">
	                    	<p>Aadhar Card</p>
	                    	<p>Birth Certificate</p>
	                    	<p>Leaving Certificate</p>
	                    	<p>Photo</p>
	                    </div>

	                    <div class="col-lg-6 col-md-6">
	                    	<span class="completed"><i id="aadhartick" class="fas fa-check-circle" style="height: 40px; width: 40px; padding: 7px 7px; font-size: 25px ; margin-left: 2px; margin-top: 5px; position: absolute; left: 50px ; display: block;"></i></span>
	                    	<span class="completed"><i id="birthtick" class="fas fa-check-circle" style="height: 40px; width: 40px; padding: 7px 7px; font-size: 25px ; margin-left: 2px; margin-top: 5px; position: absolute; left: 50px; top: 45px; display: block;"></i></span>
	                    	<span class="completed"><i id="leavingtick" class="fas fa-check-circle" style="height: 40px; width: 40px; padding: 7px 7px; font-size: 25px ; margin-left: 2px; margin-top: 5px; position: absolute; left: 50px; top: 90px; display: block;"></i></span>
	                    	<span class="completed"><i id="phototick" class="fas fa-check-circle" style="height: 40px; width: 40px; padding: 7px 7px; font-size: 25px ; margin-left: 2px; margin-top: 5px; position: absolute; left: 50px; top: 135px; display: block"></i></span>
	                    </div>
	                    <!-- tick if no changes -->
	                   <!--  <span class="completed"><i class="fas fa-check-circle" style="margin-top: 40px; margin-left: 70px; margin-top: 55px; display: block;"></i></span> -->
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
 
 	<!--- End cards ---->

 	<!-- submit button -->
 	<form method="get" id="finalise">
 		<button type="submit" class="mybutton" style="background: #5400ff; margin-top: -40px; margin-left: 46%; font-size: 18px"><span>Go</span></button>
 	</form>
 	
	<button type="submit" id="logout" class="mybutton" style="background: #5400ff; margin-top: 20px; margin-left: 44.62%; font-size: 18px"><span>Logout</span></button>
	
	<!-- document Modal -->
	<div id="documet-modal" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content-doc">
		 <form action="guesthome.html" method='post' enctype="multipart/form-data" id="uploadform" style="margin-left: 40px;">
			<p>Scanned Copy of Aadhar Card</p>
			<input type="file" id="aadhar" name="aadhar"><br>
			<p>Scanned Copy of Birth Certificate</p>
			<input type="file" id="birth" name="birth"><br>		
			<p>Scanned Copy of Leaving Certificate</p>
			<input type="file" id="leaving" name="leaving"><br>			
			<p>Scanned Copy of Photo</p>
			<input type="file" id="photo" name="photo"><br>			
            <button type="submit" class="mybutton" style="background: #22cc1c; color: white; margin-left: -13px;"><span>Upload</span></button>
		</form>
	  </div> 	
	</div>

	<!-- if no changes in form hide link and show tick -->
	<script>
		$(document).ready(function() {
			$("a").on("click", function() {
				$(this).remove();
				$("#tick1").css("display", "block");
				$("#details").on("click", function() {
					window.location = "#";
				});
				event.stopPropagation();
			});
		});
	</script>

	<!-- navigate to pages when clicked on cards -->
	<script>
		$(document).ready(function() {
			
			$("#logout").click(function() {
				window.location = 'logout.php';
			});
			//checking available documents
			function checkDocs() {
				var xhttp;
				var username = "<?php echo $username; ?>";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						var text = this.responseText;
						if(text.charAt(0) == 1) $("#aadhartick").css('display','block');
						else $("#aadhartick").css('display','none');
						if(text.charAt(1) == 1) $("#birthtick").css('display','block');
						else $("#birthtick").css('display','none');
						if(text.charAt(2) == 1) $("#leavingtick").css('display','block');
						else $("#leavingtick").css('display','none');
						if(text.charAt(3) == 1) $("#phototick").css('display','block');	
						else $("#phototick").css('display','none');
					}
				};
				xhttp.open("GET", "files_check.php?username="+username, true);
				xhttp.send();
			}
			
			function checkInstructor() {
				var xhttp;
				var username = "<?php echo $username; ?>";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						if(this.responseText == 1)	$("#instructortick").css('display','block');
						else $("#instructortick").css('display','none');
					}
				};
				xhttp.open("GET", "instructor_check.php?username="+username, true);
				xhttp.send();
			}
			
			function checkVehicle() {
				var xhttp;
				var username = "<?php echo $username; ?>";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						if(this.responseText == 1)	$("#vehicletick").css('display','block');
						else $("#vehicletick").css('display','none');
					}
				};
				xhttp.open("GET", "vehicle_check.php?username="+username, true);
				xhttp.send();
			}
			
			checkDocs();
			checkInstructor();
			checkVehicle();
			
			// 1. form details
			$("#details").on("click", function() {
				if($("#tick1").css("display") == "none") {
					window.location = "guestform.html";
				}
			});

			// 2. instructor list
			$("#instructor").on("click", function() {
				window.location = "instructorlist.php";
			});

			// 3. vehicle list
			$("#vehicles").on("click", function() {
				window.location = "selectvehicle.html";
			});

			// 4. upload documents
			$("#documents").on("click", function() {
				$("#documet-modal").css('display', 'block');
				$(document).keydown(function(event){ 
					var x = event.which;
					if(x == 27) {
						$("#documet-modal").css('display', 'none');
					}
				});
			});
			
			
			$("form#uploadform").submit(function() {
				event.preventDefault();
				var formData = new FormData(this);
				var request = $.ajax({
					type: "POST",
					url: "upload1.php",
					data: formData,
					success: function (data) {
						var pos1 = data.indexOf("1");
						var length = data.length;
						var string = data.slice(4,pos1);
						window.alert(string);
						if(string == "Uploaded") {
							$("#aadhartick").css('display','block');
						}
						data = data.slice(pos1+1,length);
						pos1 = data.indexOf("2");
						length = data.length;
						string = data.slice(0,pos1);
						if(string == "Uploaded") {
							$("#birthtick").css('display','block');
						}
						data = data.slice(pos1+1,length);
						pos1 = data.indexOf("3");
						length = data.length;
						string = data.slice(0,pos1);
						if(string == "Uploaded") {
							$("#leavingtick").css('display','block');
						}
						data = data.slice(pos1+1,length);
						pos1 = data.indexOf("4");
						length = data.length;
						string = data.slice(0,pos1);
						if(string == "Uploaded") {
							$("#phototick").css('display','block');
						}
						//checkDocs();
						//alert(data);
					},
					cache: false,
					contentType: false,
					processData: false
				});
				$("#documet-modal").css('display', 'none');
			});
			$("form#finalise").submit(function() {
				event.preventDefault();
				var truearray = new Array();
				var i = 0;
				//form tick
				if($("#tick1").css('display') == "none") {
					truearray[i] = 0;
					i++;
				}
				else {
					truearray[i] = 1;
					i++;
				}
				
				//vehicle tick
				if($("#vehicletick").css('display') == "none") {
					truearray[i] = 0;
					i++;
				}
				else {
					truearray[i] = 1;
					i++;
				}
				
				//instructor tick
				if($("#instructortick").css('display') == "none") {
					truearray[i] = 0;
					i++;
				}
				else {
					truearray[i] = 1;
					i++;
				}
				
				//documents ticks
				//aadhar
				if($("#aadhartick").css('display') == "none") {
					truearray[i] = 0;
					i++;
				}
				else {
					truearray[i] = 1;
					i++;
				}
				//birth
				if($("#birthtick").css('display') == "none") {
					truearray[i] = 0;
					i++;
				}
				else {
					truearray[i] = 1;
					i++;
				}
				
				//leaving
				if($("#leavingtick").css('display') == "none") {
					truearray[i] = 0;
					i++;
				}
				else {
					truearray[i] = 1;
					i++;
				}
				
				//photo
				if($("#phototick").css('display') == "none") {
					truearray[i] = 0;
					i++;
				}
				else {
					truearray[i] = 1;
					i++;
				}
				for(var j=0 ; j<7 ; j++) {
					if(truearray[j] == 0) {
						alert("Form incomplete");
						break;
					}
				}
				if(j == 7) {
					var xhttp;
					var username = "<?php echo $username; ?>";
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						//window.alert(this.status);
						if(this.readyState == 4 && this.status == 200) {
							alert("Form submitted to admin");
						}
					};
					xhttp.open("GET", "status_change.php?username="+username, true);
					xhttp.send();
				}
			});
		});	
	</script>	

	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>