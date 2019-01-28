<?php

include 'connection2.php';

$email = $_SESSION["email"];
$username = $_SESSION["username"];

//$username = "gainz_071a";

if(!is_dir("UploadedDocs")) {
	mkdir("UploadedDocs");
}
$maindir = "UploadedDocs/";
$subdirectory = $maindir.$username;
if(!is_dir($subdirectory)) {
	mkdir($subdirectory);
}
$aadhar = "/Aadhar";
$birth = "/Birth";
$leaving = "/Leaving";
$photo = "/Photo";

makedir($subdirectory, $aadhar);
makedir($subdirectory, $birth);
makedir($subdirectory, $leaving);
makedir($subdirectory, $photo);

function makedir($subdirectory, $text) {
	$dir = $subdirectory.$text;
	if(!is_dir($dir)) {
		mkdir($dir);
	}
}

$file_aadhar = $_FILES['aadhar']['name'];
$tmp_name_aadhar = $_FILES['aadhar']['tmp_name'];
$file_birth = $_FILES['birth']['name'];
$tmp_name_birth = $_FILES['birth']['tmp_name'];
$file_leaving = $_FILES['leaving']['name'];
$tmp_name_leaving = $_FILES['leaving']['tmp_name'];
$file_photo = $_FILES['photo']['name'];
$tmp_name_photo = $_FILES['photo']['tmp_name'];

fileupload($file_aadhar, $tmp_name_aadhar, $username,1);
fileupload($file_birth, $tmp_name_birth, $username,2);
fileupload($file_leaving, $tmp_name_leaving, $username,3);
fileupload($file_photo, $tmp_name_photo, $username,4);

function fileupload($file_name, $file_tmp_name,$username,$i) {
	$position = strpos($file_name, ".");
	$fileextension = substr($file_name, $position + 1);
	$fileextension= strtolower($fileextension);

	if($i == 1) {
		$path = "UploadedDocs/$username/Aadhar/";
	}
	else if($i == 2) {
		$path = "UploadedDocs/$username/Birth/";
	}
	else if($i == 3) {
		$path = "UploadedDocs/$username/Leaving/";
	}
	else {
		$path = "UploadedDocs/$username/Photo/";
	}
	if(isset($file_name)) {
		//$path = "UploadedDocs/$username/";
		//echo $path;
		//echo $file_name;
		if(!empty($file_name)) {
			if($fileextension == "jpg" || $fileextension == "jpeg" || $fileextension == "png") {
				if(move_uploaded_file($file_tmp_name, $path.$file_name)) {				
					rename($path.$file_name,$path.$i.".".$fileextension);
					echo "Uploaded$i";
				}
				else {
					echo "Failed$i";
				}
			}
			else {
				echo "Failed$i";
			}
		}
		else {
			echo "Failed$i";
		}
	}
	else {
		echo "Failed$i";
	}
}

	


?>