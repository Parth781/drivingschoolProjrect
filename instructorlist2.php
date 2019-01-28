<?php

include 'connection2.php';

if($_SESSION["usertype"] != "guest") {
	header('location:logout.php');
}

$email = $_SESSION["email"];
$instr_name = $_POST["instr"];
echo $email;
echo $instr_name;

$q = "update guest set instructor = '$instr_name'  where email = '$email' ";
mysqli_query($con, $q);

header('location:guesthome.php');


?>