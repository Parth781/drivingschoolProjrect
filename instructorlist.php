<!DOCTYPE html>

<?php 

include 'connection2.php';

if($_SESSION["usertype"] != "guest") {
	header('location:logout.php');
}

$q1 = "select * from instructor";
$q2 = mysqli_query($con, $q1);
$num = mysqli_num_rows($q2);


?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
  <script>
	$(document).ready(function() {
		var row = <?php echo $num; ?>;
		//alert(row);
		
		function createSubmitfunction( i ) {
			return function() {
				var instr = $('#name'+i).html();
				alert(instr);
				$("#instr").val(instr);
				$("#instr_name").submit();
			}
		}
		
		for(let i=0 ; i<row ; i++) {
			$('#submit'+i).click( createSubmitfunction( i ) );
		}
	});
		
	
  
  </script>
</head>
<body style="background: #b0abb2">
 
<div class="container-fluid">
  <h2 style="text-align: center; font-size: 30px; letter-spacing: 1.4px;">Select Instructor</h2>
  <div>
	<?php
		
		$i = -1;
		while($q3 = mysqli_fetch_array($q2)) {
			$i++;
			$submit = "submit";
			$name = "name";
			$submit = $submit.$i;
			$name = $name.$i;
	?>
    <div class="card bg-primary text-white" style="width:260px; padding-top: 30px;margin: 30px 20px; box-shadow: 5px 10px 18px #888888; float: left">
      <img class="card-img-top" src="images/user.png" alt="Card image" style="width:90%; margin: auto">
      <div class="card-body">
        <h4 class="card-title" id="<?php echo $name; ?>"><?php echo $q3['name']; ?></h4>
        <a id="<?php echo $submit; ?>" class="btn btn-dark">Select</a>
      </div>
    </div>
	
	<form id="instr_name" action="instructorlist2.php" method="POST">
		<input type="hidden" name="instr" id="instr">
	</form>
	
	<?php 
		}
	?>
    
  
</div>
</div>
</body>
</html>
