<?php

include 'connection2.php';

$header = $_REQUEST["header"];
$header = substr($header,8);
$header = substr($header,0,-8);
$message = $_REQUEST["message"];
$message = substr($message,8);
$message = substr($message,0,-8);
$receiver = $_REQUEST["email"];
$read = "read";
$q = "update notification set status = '$read' where header = '$header' && message = '$message' && receiver = '$email' ";
$q = "insert into notification(sender,receiver,header,message) values('$receiver','$receiver','$header','$message') ";
mysqli_query($con, $q);


echo "!";



?>