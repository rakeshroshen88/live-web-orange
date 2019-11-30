<?php include('config.inc.php');
include('chksession.php');
$output = '';  
 $ses_id = session_id();
 $_SESSION['sess_ses_id']=$ses_id;
// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$random=rand(10,1000000);
$upload_location = "product/";


// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

   // File name
   $filename = $_FILES['files']['name'][$index];

   // Get extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");

	
   // Check extension
   if(in_array($ext, $valid_ext)){
     // File path
     $path = $upload_location.$random.$filename;

     // Upload file
     if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
        $files_arr[] = $path;
				$arr=array(
							"pid"=>$ses_id,					 
							"imgid"=>$random.$filename,
							"ses_id"=>$ses_id
			    );
				//print_r($arr);
				$insid=insertData($arr, 'productimage');
     }
   }

}

echo json_encode($files_arr);
die;


?>
