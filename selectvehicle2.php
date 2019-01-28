<?php 

include 'connection2.php';

$username = $_SESSION["username"];
//echo $username;
$vehicle = $_POST["vehiclename"];
//echo $vehicle;
$q = "update guest set vehicle = '$vehicle' where username = '$username' ";
mysqli_query($con, $q);

header('location:guesthome.php');

?>