<?php 

include 'connection2.php';

$username = $_REQUEST["username"];
$set = "applied - pending";

$q = "update guest set status = '$set' ";
mysqli_query($con, $q);




?>