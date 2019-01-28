<!DOCTYPE html>
<html>

<?php

include 'connection2.php';
 
$email = $_SESSION["email"];
$_SESSION["usertype"] = "guest";
?>

<head>
	<title> Register </title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- chrome meta tag -->
    <meta name="theme-color" content="#0800ad">

    <!-- bootstrap meta -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- button hover animation -->
    <link rel="stylesheet" type="text/css" href="button.css">
    <link rel="stylesheet" type="text/css" href="user_css/registrationform.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	
	<script type="text/javascript">
		function getsize(text) {
			return text.length;
		}
		
		function testunder(text,truetest) {
			var pattern = /_/g;
			var check = pattern.test(text);
			if(check == truetest) {
				var under = text.match(pattern);
				return under.length;
			}
			else {
				return 0;
			}
		}
		
		function testdot(text,truetest) {
			var pattern = /\./g;
			var check = pattern.test(text);
			if(check == truetest) {
				var dot = text.match(pattern);
				return dot.length;
			}
			else {
				return 0;
			}
		}
		
		function testdigit(text,truetest) {
			var pattern = /\d/g;
			var check = pattern.test(text);
			if(check == truetest) {
				var digits = text.match(pattern);
				return digits.length;
			}
			else {
				return 0;
			}
		}
			
		function testquality(text) {
			var pattern = /[^[A-Z|a-z|0-9|\_|\.]/g;
			var temp = pattern.test(text);
			return temp;
			//work on restricting number of digits to 3, dots to 1, underscore to 1, and alphabets minimum 4
		}
		
		function testStart(text) {
			var pattern = /^[A-Z|a-z]/g;
			var test = pattern.test(text);
			return test;
		}
		
	</script>
	
	<script type="text/javascript">
	$(document).ready(function() {
		$("#submit").prop('disabled','true');
		//getting true in truetest & false in falsetest
		var at = "@";
		var alpha = "a";
		var truetest = testquality(at);
		var falsetest = testquality(alpha);

		$("#username").keyup(function() {
			var text = $("#username").val();
			var size = getsize(text);
			var test = testquality(text);
			var test2 = testunder(text,truetest);
			var test3 = testdot(text,truetest);
			var test4 = testdigit(text,truetest);
			var start = testStart(text);
			if(start == falsetest) {
				$("#error").html("Must start with a character only");
				$("#submit").prop('disabled','true');
			}
			else if(size < 8) {
				$("#error").html("Must have at least 8 characters");
				$("#submit").prop('disabled','true');
			}
			else if(test == truetest) {
				$("#error").html("Must only contain letters,digits,underscore or dots only");
				$("#submit").prop('disabled','true');
			}	
			else if(test2 > 1) {
				$("#error").html("Must contain atmost 1 underscore");
				$("#submit").prop('disabled','true');	
			}
			else if(test3 > 1) {
				$("#error").html("Must contain atmost 1 dot");
				$("#submit").prop('disabled','true');
			}
			else if(test4 > 4) {
				$("#error").html("Must contain atmost 4 digits");
				$("#submit").prop('disabled','true');
			}
			else {
				//window.alert("GERE");
				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						//document.getElementById("error").innerHTML = this.responseText;
						if(this.responseText == 1) {
							//alert("THIS");
							$("#submit").removeAttr('disabled');
							document.getElementById("error").innerHTML = "Username Available";
						}
						else {
							//alert("OH");
							$("#submit").prop('disabled','true');
							document.getElementById("error").innerHTML = "Username Unavailable";
						}
					}
				};
				xhttp.open("GET", "username_test.php?username="+text, true);
				xhttp.send();
				
					
			}
			/*else {
				$("#error").html("Available");
				$("#submit").removeAttr('disabled');
			}*/
		});
	});
	
	</script>
	
	
</head>

<body>

    <img src="images/two.png" style="height: 20%; width: 35%; margin-top: 1%; margin-left: 32%">

	<form action="mailpassword.php" method="POST">
		<h1>Choose your username</h1>
		<input  placeholder="username" type="text" name="username" id="username" maxlength="15" required>
		<p id="error"><!-- error message here --></p><br>
		<button id="submit" class="mybutton"><span>Submit</span></button>
	</form>

	<!-- button hover -->
    <script>
      document.querySelector('.mybutton').onmousemove = (e) => {

	      const x = e.pageX - e.target.offsetLeft
	      const y = e.pageY - e.target.offsetTop

	      e.target.style.setProperty('--x', `${ x }px`)
	      e.target.style.setProperty('--y', `${ y }px`)
  
    	}
  	</script> 
</body>

</html>