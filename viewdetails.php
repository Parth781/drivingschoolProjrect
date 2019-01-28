<!DOCTYPE html>
<html>

<?php

include 'connection2.php';
$index = $_GET["index"];

$status = "applied - pending";
$q1 = "select * from guest where status = '$status' order by fname ASC";
$q2 = mysqli_query($con, $q1);
$i = 0;
while($q3 = mysqli_fetch_array($q2)) {
	if($i == $index) break;
}

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
    <link rel="stylesheet" type="text/css" href="user_css/viewdetails.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- animation on scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
	<!----- cards ------>
	<div id="ratings" class="ratings">
		<!-- first line -->
	    <div class="container">
	        <div class="row">	            
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>First Name</h3>
	                    <p><?php echo $q3['fname'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Middle Name</h3>
	                    <p><?php echo $q3['mname'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Last Name</h3>
	                    <p><?php echo $q3['lname'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Email</h3>	
	                 	<p><?php echo $q3['email'];?></p>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- second line -->
	    <div class="container">
	        <div class="row">	            
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="250" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Date Of Birth</h3>
	                    <p><?php echo $q3['dob'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="250" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Age</h3>
	                    <p><?php echo $q3['age'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="250" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Gender</h3>
	                    <p><?php echo $q3['gender'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="250" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Code</h3>	
	                 	<p><?php echo $q3['code'];?></p>
	                </div>
	            </div>
	        </div>
	    </div>

		<!-- third line -->
	    <div class="container">
	        <div class="row">	            
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="350" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Username</h3>
	                    <p><?php echo $q3['username'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="350" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Residential Address</h3>
	                    <p><?php echo $q3['raddress'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="350" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Pickup Address</h3>
	                    <p><?php echo $q3['plocation'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="350" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Contact</h3>	
	                 	<p><?php echo $q3['contact'];?></p>
	                </div>
	            </div>
	        </div>
	    </div>	    

	    <!-- fourth line -->
	    <div class="container">
	        <div class="row">	            
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="450" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Branch</h3>
	                    <p><?php echo $q3['branch'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="450" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Vehicle</h3>
	                    <p><?php echo $q3['vehicle'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="450" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Instructor</h3>
	                    <p><?php echo $q3['instructor'];?></p>
	                </div>
	            </div>
	            <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="450" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Status</h3>	
	                 	<p><?php echo $q3['status'];?></p>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- images line -->
	    <div class="container">
	        <div class="row">	            
	            <div class="col-lg-6 col-md-6 doc-img" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Aadhar Card</h3>
	                    <img src="UploadedDocs/<?php echo $q3['username']; ?>/Aadhar/1.png" style="width: 530px; height: 370px;">
	                </div>
	            </div>
	            <div class="col-lg-6 col-md-6 doc-img" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Birth Certificate</h3>
	                    <img src="UploadedDocs/<?php echo $q3['username']; ?>/Birth/2.png" style="width: 530px; height: 370px;">
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- images line -->
	    <div class="container">
	        <div class="row">	            
	            <div class="col-lg-6 col-md-6 doc-img" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Leaving Certificate</h3>
	                    <img src="UploadedDocs/<?php echo $q3['username']; ?>/Leaving/3.png" style="width: 530px; height: 370px;">
	                </div>
	            </div>
	            <div class="col-lg-6 col-md-6 doc-img" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"  data-aos-once="true">
	                <div class="card">
	                    <h3>Photo</h3>
	                    <img src="UploadedDocs/<?php echo $q3['username']; ?>/Photo/4.png" style="width: 530px; height: 370px;">
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- toggle button -->
	    <label class="switch">
			<input type="checkbox" id="check" checked="yes">
		  	<span class="slider round"></span>
		</label>	

	</div>
 
 	<!--- End cards ---->

 	<!-- hide cards if toggle off -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("input").click(function() {
				$(".doc-img").toggleClass("toggle-image");
			});
			
		});
	</script>

	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>