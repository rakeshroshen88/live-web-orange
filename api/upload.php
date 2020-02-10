
<?php


header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header("Content-Type: application/json; charset=UTF-8");


require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->post('/upload_profile','upload_profile');
$app->post('/upload_camera','upload_camera');  
$app->post('/create_post_upload','create_post_upload');
$app->post('/signup_profile_upload','signup_profile_upload'); 

$app->run();

function upload_profile() {

	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    print_r($data);
    $token=$data->token; 
    $user_id=$data->user_id; 
    //$lastCreated=$data->lastCreated;
    $systemToken=apiToken($user_id);

    
   
    try {

    	$target_path = "../upload/";
		 
		$target_path = $target_path . basename( $_FILES['myphoto']['name']);
		$imgName = $_FILES["myphoto"]["name"];
		$user_id = $_POST["user_id"]; 
		 
		if (move_uploaded_file($_FILES['myphoto']['tmp_name'], $target_path)) {

			$db = getDB();
		             $sql1="UPDATE user_profile SET image_id ='".$imgName."' WHERE user_id=".$user_id;  
		            $stmt1 = $db->prepare($sql1);
		            $stmt1->execute();
		    $db = null; 
		    echo '{"success":{"text":"Successfull Uploaded"}}';  
		} else {
		echo $target_path;
		    echo '{"error":{"text":"There was an error uploading the file, please try again!"}}'; 
		}

		} catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


 
}

function upload_camera() {

	$target_path = "../upload/";
 
$target_path = $target_path . basename( $_FILES['myphoto']['name']);
 
if (move_uploaded_file($_FILES['myphoto']['tmp_name'], $target_path)) {
	echo '{"success":{"text":"Upload and move success"}}'; 
} else {
echo $target_path;
	echo '{"error":{"text":"There was an error uploading the file, please try again!"}}'; 
}

 
} 

/// create Post upload
function create_post_upload() {

	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    print_r($data);
    $token=$data->token; 
    $user_id=$data->user_id;
    $post_id=$data->post_id;
    //$lastCreated=$data->lastCreated;
    $systemToken=apiToken($user_id);
    
    
   
    try {

    	$target_path = "../upload/";
		 
		$target_path = $target_path . basename( $_FILES['file']['name']);
		$imgName = $_FILES["file"]["name"];
		$imgwithURL = "upload/".$imgName;
		$user_id = $_POST["user_id"];
		$post_id = $_POST["post_id"]; 
		 
		if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {

			$db = getDB();
		            $sql1="UPDATE user_post SET allpath ='".$imgwithURL."' WHERE user_id='".$user_id."' AND post_id=".$post_id;  
		            $stmt1 = $db->prepare($sql1);
		            $stmt1->execute();
		    $db = null; 
		    echo '{"success":{"text":"Successfull Uploaded"}}';  
		} else {
		echo $target_path;
		    echo '{"error":{"text":"There was an error uploading the file, please try again!"}}'; 
		}

		} catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


 
}
  



/// create Post upload
function signup_profile_upload() {
  
   
    try {

    	$target_path = "../upload/";
		 
		$target_path = $target_path . basename( $_FILES['file']['name']);
		$imgName = $_FILES["file"]["name"]; 
		$user_id = $_POST["user_id"];  
		 
		if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {

			$db = getDB();
		            echo $sql1="UPDATE user_profile SET image_id='".$imgName."' WHERE user_id=".$user_id;  
		            $stmt1 = $db->prepare($sql1);
		            $stmt1->execute();
		    $db = null; 
		    echo '{"success":{"text":"Successfull Uploaded"}}';  
		} else {
		echo $target_path;
		    echo '{"error":{"text":"There was an error uploading the file, please try again!"}}'; 
		}

		} catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


 
}

 

?>
