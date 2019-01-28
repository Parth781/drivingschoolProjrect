<!DOCTYPE html>
<html>
<head>
	<title>Admin search</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	
	<script>
	function selectPerson(text) {
		window.location.href = "http://localhost/DSMS/Myjson.php" + '?select=' + text;
	}
		
	
	$(document).ready(function() {
		$("#guest").click(function() {
			var text = "guest";
			selectPerson(text);
		});
		$("#student").click(function() {
			var text = "student";
			selectPerson(text);
		});
		$("#instructor").click(function() {
			var text = "instructor";
			selectPerson(text);
		});
	});
		
		
	</script>
	
</head>
<body>
<?php

include 'connection2.php' ;

$json_array= array();

if(isset($_GET["select"])) {
	if($_GET["select"] == "guest") {
		$sql = "select * from guest";
	}
	else if($_GET["select"] == "student") {
		$sql = "select * from student";
	}
	else {
		$sql = "select * from instructor";
	}
	$result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($result)) {
		$json_array[] = $row;
	}
}
json_encode($json_array);

?>

<p>Students</p><input type="radio" name="student" id="student">
<p>Instructors</p><input type="radio" name="instructor" id="instructor">
<p>Guests</p><input type="radio" name="guest" id="guest">

<p><pre><?php print_r($json_array); ?></pre></p>


</body>


</html>