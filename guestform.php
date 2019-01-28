<!DOCTYPE html>
<html>

<?php

include 'connection2.php';

//for setting mindate for selecting dob
	date_default_timezone_set("Asia/Kolkata");
	$date = getDate();
	//echo $date['mday'];
	$day = $date['mday'];
	$month = $date['mon'];
	$year = $date['year'];
	$year = $year - 18;
	$dash = "-";
	$zero = "0";
	if($month < 10) {
		if($day < 10) {
			$mindate = $year.$dash.$zero.$month.$dash.$zero.$day;
		}
		else {
			$mindate = $year.$dash.$zero.$month.$dash.$day;
		}
	}
	else {
		if($day < 10) {
			$mindate = $year.$dash.$month.$dash.$zero.$day;
		}
		else {
			$mindate = $year.$dash.$month.$dash.$day;
		}
	}

//checking which page caused redirect
   $link = $_SERVER['HTTP_REFERER'];
   echo $link;
   $page = "http://localhost/DSMS/guesthome.php";
   $page2 = "http://localhost/DSMS/guestform.php";
    if($link == $page) {
	    $return = 1;
	    $email = $_SESSION["email"];
	    $q1 = "select * from guest where email = '$email' ";
	    $q2 = mysqli_query($con, $q1);
	    $q3 = mysqli_fetch_array($q2);
	    $fname = $q3['fname'];
	    $mname = $q3['mname'];
	    $lname = $q3['lname'];
	    $dob = $q3['dob'];
	    $age = $q3['age'];
	    $raddress = $q3['raddress'];
	    $plocation = $q3['plocation'];
	    $contact = $q3['contact'];
    }
    if($link == $page2) {
		$return = 2;
		include 'emailverify.php';
		
	}
?>

<head>
	<title>Driving School Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#0b00ff">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="user_css/guestform.css">
	<link rel="stylesheet" type="text/css" href="button.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<!-- navigation -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="index.html" class="navbar-brand">Home</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Services</a></li>
            <li><a href="index.html">Testimonials</a></li>
            <li><a href="index.html">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.html">login <i class="fas fa-sign-in-alt"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- end navigation -->
	
    

	<!-- form -->
	<div class="myform">
		<div class="container">
			<h2>Registration form</h2>
			<p>Please fill the form and submit it with your valid details <br>We assure you that your personal data will be kept safe and secure.<br></p>
			<form method="POST" id="my-form" onsubmit="return sendmails();">
				<div class="form-inline">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<label for="fname">First Name</label><br>
							<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" pattern="([A-Za-z]+$)" required title="must contain only characters">
						</div>
						<div class="col-lg-4 col-md-4">
							<label for="fname">Middle Name</label><br>
							<input type="text" class="form-control" id="mname" placeholder="Enter Middle Name" name="mname" pattern="([A-Za-z]+$)" required title="must contain only characters">
						</div>
						<div class="col-lg-4 col-md-4">
							<label for="fname">Last Name</label><br>
							<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" pattern="([A-Za-z]+$)" required title="must contain only characters">
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="form-group">
					<label for="email">Email ID</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your valid email ID" required title="enter valid email address"> 
				</div>
				
				
				
				<div class="form-inline">
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<label for="gender">Gender</label><br>
						    <select class="form-control" id="gender">
						    	<option value="M">Male</option>
						        <option value="F">Female</option>
						    </select>
						</div>
						<div class="col-lg-3 col-md-3">
							<label for="dob">Date of Birth</label><br>
							<input type="date" class="form-control" id="dob" name="dob" max="<?php echo $mindate; ?>" required>
						</div>
						<div class="col-lg-3 col-md-3">
							<label for="age">Age</label><br>
							<input type="number" class="form-control" id="age" name="age" min="18" required>
						</div>
						<div class="col-lg-3 col-md-3">							
							<label for="branch">Branch</label><br>
						    <select class="form-control" id="branch">
								<?php
									$t1 = "select * from branch";
									$t2 = mysqli_query($con, $t1);
									while($t3 = mysqli_fetch_array($t2)) {	
								?>
									<option value="<?php echo $t3['name']; ?>"><?php echo $t3['name']." - ".$t3['address']; ?></option>
								<?php
									}
								?>
						    </select>
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label for="raddress">Residential Address</label>
					<input type="text" class="form-control" id="raddress" name="raddress" placeholder="Your residential address here..." required>
				</div>
				
				<br>
				
				<div class="form-group" id="plocationdiv">
					<label for="plocation">Pickup Location</label>
					<input type="text" class="form-control" id="plocation" name="plocation" placeholder="Your pickup location here..." required><br>
					<div class="form-group form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" value="no" id="sameas">&nbsp;&nbsp;Same as residential address? 
						</label>
					</div>
				</div>
				
				<br>
				
				<div class="form-inline">
					<label for="mobile">Mobile No. :</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile No." required pattern="(^\d{10}$)" title="enter valid number">
				</div>	
				
				<button type="submit" class="mybutton" id="myBtn"><span>Register Me</span></button>
			</form>
		</div>
	</div>
	<!-- end form -->

	<!-- footer -->
    <div class="footer">
     	<div class="container">
         	<div class="row">
             	<div class="col-lg-4 col-md-4">
	                 <h4>Contact Us</h4>
	                 <p><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;111 Main Street, Washington DC, 22222</p>
	                 <p><i class="fas fa-at"></i>&nbsp;&nbsp;info@drive.com</p>
	                 <p><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;+1 222 222 2222</p>
             	</div>
             	<div class="col-lg-4 col-md-4">
	                 <h4>names</h4>
             	</div>
             	<div class="col-lg-4 col-md-4">
	                 <h4>About</h4>
	                 <p>About Us</p>
	                 <p>Privacy</p>
	                 <p>Term & Condition</p>
             	</div>
         	</div>
     	</div>
 	</div>
 	<!-- end footer -->


 	<!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <h3>We will send you an email which will contain a verification code</h3>
		<form action="emailverify2.php" method="POST">
			<input placeholder="Verification Code" type="text" class="form-control" name="code" required="" style="width: 20%; margin: auto; margin-top: 20px;"><br>
			<button class="mybutton" style="margin: 10px;"><span>Submit</span></button>
		</form>
	  </div>

	</div>

	<script>
	function sendmails() {
		http = new XMLHttpRequest(); 
		var fname = $("#fname").val();
		var mname = $("#mname").val();
		var lname = $("#lname").val();
		var email = $("#email").val();
		var dob = $("#dob").val();
		var age = $("#age").val();
		var gender = $("#gender").val();
		var raddress = $("#raddress").val();
		var plocation = $("#plocation").val();
		var contact = $("#mobile").val();
		var branch = $("#branch").val();
		http.open("POST","emailverify.php?fname="+fname+"&mname="+mname+"&lname="+lname+"&email="+email+"&dob="+dob+"&age="+age+"&gender="+gender+"&raddress="+raddress+"&plocation="+plocation+"&contact="+contact+"&branch="+branch, true);
		http.send();
	}
	
	
	</script>
	
	
	<!-- when details are valid show modal -->
	<script>
		$(() => $('#my-form').submit(event => {
			event.preventDefault();
			$("#myModal").css('display', 'block');	
		}));
	</script>


	<!-- disable pickup location on check-->
	<script>
	$(document).ready(function(){
		$("#sameas").prop('checked',true);
		var check = $("#sameas").prop('checked');
		$("#sameas").removeAttr('checked');
		//$("#plocationdiv").hide();
		/*var retur = "<?php echo $return; ?>";
		if(retur == 1) {
			$("#fname").val("<?php echo $fname; ?>");
			$("#mname").val("<?php echo $mname; ?>");
			$("#lname").val("<?php echo $lname; ?>");
			$("#email").val("<?php echo $email; ?>");
			$("#dob").val("<?php echo $dob; ?>");
			$("#age").val("<?php echo $age; ?>");
			$("#raddress").val("<?php echo $raddress; ?>");
			$("#plocation").val("<?php echo $plocation; ?>");
			$("#mobile").val("<?php echo $contact; ?>");
			$("#form").attr('action','guesthome.php');
			$("#submit").html('Save');
		}*/
	    $("#sameas").click(function(){
	    	//var flag = $("#sameas").val();
			var flag = $("#sameas").prop('checked');
			//alert(flag);
	        if(flag == check) {
	    		//$("#sameas").val("yes");
				//alert(flag);
				var resiadd = $("#raddress").val();
				//alert(resiadd);
				$("#plocation").val(resiadd);
				//$("#plocation").prop('disabled','true');
	        }
	        else {
	        	//$("#sameas").val("no");
				var flag = "";
				$("#plocation").val(flag);
				//$("#plocation").removeProp('disabled');
	       	}
	    });
		$("#plocation").click(function(){
			$("#sameas").removeAttr('checked');
			//$("#sameas").prop('checked','false');
		});
	});
	</script>

	<!-- button hover -->
    <script>
	document.querySelector('.mybutton').onmousemove = (e) => {

		const x = e.pageX - e.target.offsetLeft
		const y = e.pageY - e.target.offsetTop

		e.target.style.setProperty('--x', `${ x }px`)
		e.target.style.setProperty('--y', `${ y }px`)
	
	}
	</script>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>