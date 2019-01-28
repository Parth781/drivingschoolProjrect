<!DOCTYPE html>

<?php

include 'connection2.php';

/*if($_SESSION["usertype"] != "admin") {
	header('location:logout.php');
}*/

$status = "applied - pending";
$q1 = "select * from guest where status = '$status' order by fname ASC";
$q2 = mysqli_query($con, $q1);
$size = mysqli_num_rows($q2);

?>




<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
	
	<script>
	$(document).ready(function() {
		var rows = <?php echo $size; ?>;
		//accept button
		function createAcceptfunction( i ) {
			return function() {
				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						alert("Student Accepted and details added in Database");
						window.location = 'createschedule.php?index='+i;
					}
				};
				xhttp.open("GET", "accept_reject.php?index="+i+"&work=accept", true);
				xhttp.send();
				
			}
		}
		
		for(let i=0 ; i<rows ; i++) {
			$('#accept'+i).click( createAcceptfunction ( i ) );
		}
		//reject button
		function createRejectfunction( i ) {
			return function() {
				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						alert("Student Rejected and details removed from database");
					}
				};
				xhttp.open("GET", "accept_reject.php?index="+i+"&work=reject", true);
				xhttp.send();
			}
		}
		
		for(let i=0 ; i<rows ; i++) {
			$('#reject'+i).click( createRejectfunction ( i ) );
		}
		
		//return button
		function createReturnfunction( i ) {
			return function() {
				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					//window.alert(this.status);
					if(this.readyState == 4 && this.status == 200) {
						alert("Form returned for changes");
					}
				};
				xhttp.open("GET", "accept_reject.php?index="+i+"&work=return", true);
				xhttp.send();
			}
		}
		
		for(let i=0 ; i<rows ; i++) {
			$('#return'+i).click( createReturnfunction ( i ) );
		}
		
		//view button
		function createViewfunction( i ) {
			return function() {
				window.location.href = "http://localhost/DSMS/viewdetails.php?index="+i;
			}
		}
		
		for(let i=0 ; i<rows ; i++) {
			$('#view'+i).click( createViewfunction ( i ) );
		}
	});
	
	</script>
	
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="adminhome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li>   
        </ul>
      </div>  
    </nav>


    <div class="container">
      <br>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#students">students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#requests">requests</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="students" class="container tab-pane active"><br>
          <h3>Schedule</h3>
			
          <table class="table table-hover" style="text-align: center;">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Instructor</th>
                <th>Vehicle</th> 
                <th>Session Time</th> 
              </tr>
            </thead>
            <tbody class="bg-primary" style="color: white">
			<?php 

				$date = getDate();
				$day = $date['mday'];
				$month = $date['mon'];
				$year = $date['year'];
				$r1 = "select * from studentschedule where date = '$year-$month-$day' ";
				$r2 = mysqli_query($con, $r1);
				$i=0;
				while($r3 = mysqli_fetch_array($r2)) {
					$i++;
					$stud_email = $r3['email'];
					$s1 = "select * from student where email = '$stud_email' ";
					$s2 = mysqli_query($con, $s1);
					$s3 = mysqli_fetch_array($s2);
					$instr_email = $s3['instr_email'];
					$reg_num = $s3['reg_num'];
					$branch = $s3['branch'];
					$t1 = "select * from vehicle where reg_num = '$reg_num' && branch = '$branch' ";
					$t2 = mysqli_query($con, $t1);
					$t3 = mysqli_fetch_array($t2);
					
			?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $s3['name']; ?></td>
                <td><?php echo $instr_email; ?></td>
                <td><?php echo $t3['model_name']; ?></td>
                <td><?php echo $r3['time']; ?></td>
              </tr>
              <?php 
				
				}
			  ?>
			  
            </tbody>
          </table>

        </div>
        
        <div id="requests" class="container tab-pane fade"><br>

          <h3>REQUESTS</h3>

		  <?php
			
			
		  ?>
		  
          <table class="table table-hover">                   
                    <tbody>
                      <tr>
					  
					  <?php
						
						$i = -1;
						while($q3 = mysqli_fetch_array($q2)) {
							$i++;
							$accept = "accept";
							$reject = "reject";
							$return = "return";
							$view = "view";
							$accept = $accept.$i;
							$reject = $reject.$i;
							$return = $return.$i;
							$view = $view.$i;
					  ?>
                        <td><?php echo $q3['fname']." ".$q3['mname']." ".$q3['lname']." - ".$q3['username']; ?>
                        <div style="float: right;">
                          <button class="btn btn-sm btn-success" id="<?php echo $accept; ?>">Accept</button>
                          <button class="btn btn-sm btn-danger" id="<?php echo $return; ?>">Return</button>
						  <button class="btn btn-sm btn-danger" id="<?php echo $reject; ?>">Reject</button>
                          <button class="btn btn-sm btn-primary" id="<?php echo $view; ?>">View Details</button>
                        </div> 
                          

                        </td>
						<?php 
							}
						?>
                      </tr>                      
                    </tbody>
                  </table>

        </div>
        
      </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>