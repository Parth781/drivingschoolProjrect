<?php

$username = $_REQUEST["username"];

$list = array();
$list = glob("UploadedDocs/$username/Aadhar/1.*");
check($list);

$list = glob("UploadedDocs/$username/Birth/2.*");
check($list);

$list = glob("UploadedDocs/$username/Leaving/3.*");
check($list);

$list = glob("UploadedDocs/$username/Photo/4.*");
check($list);

function check($list) {
	$total = count($list);
	if($total > 1) {
		$var = date("F d Y H:i:s.",filectime($list[0]));
		$index = 0;
		for( $i=1 ; $i<$total ; $i++) {
			$var1 = date("F d Y H:i:s.",filectime($list[$i]));
			$index1 = $i;
			if($var1 > $var) {
				unlink($list[$index]);
				$index = $index1;
				$var = $var1;
			}
			else {
				unlink($list[$i]);
			}
		}
		echo "1";
	}
	else if($total == 1) {
		echo "1";
	}
	else {
		echo "0";
	}
}





?>