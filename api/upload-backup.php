<?php
 /*
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

*/

$target_path = "../upload/";
 
$target_path = $target_path . basename( $_FILES['myphoto']['name']);
 
if (move_uploaded_file($_FILES['myphoto']['tmp_name'], $target_path)) {
	
	
	
    echo "Upload and move success";
} else {
echo $target_path;
    echo "There was an error uploading the file, please try again!";
}




?>