<?php 
include('config.inc.php');
include_once("config.inc.php");
/* Getting file name */
if(!empty($_FILES['file']['name'])){
$filename = $_FILES['file']['name'];
$random=rand(10,10000000);
/* Location */
$location = "upload/".$random.$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}
if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
     $done="done";
	 $imageid=$random.$filename;
	 $_SESSION['sess_img']=$imageid;
   }else{
      echo 0;
   }
}
}
if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
//print_r($FormData);
$current_city=$FormData['current_city'];
$hometown=$FormData['hometown'];
$work=$FormData['work'];
$school=$FormData['school'];
$collage=$FormData['collage'];
$worklocation=$FormData['worklocation'];
$current_company=$FormData['current_company'];
$current_studied=$FormData['current_studied'];
$website=$FormData['website'];
$address=$FormData['address'];
$aboutus=$FormData['aboutus'];
$postal_code=$FormData['postal_code'];
$intrest_area=implode(',', $_POST["area"]);
//print_r($intrest_area);
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"image_id"=>$_SESSION['sess_img'],
							"current_city"=>$current_city,
							"twon"=>$hometown,
							"work"=>$work,
							"school"=>$school,
							"college"=>$collage,
							"state"=>$worklocation,                           
							"current_company"=>$current_company,
							"current_studied"=>$current_studied,
							"zip_code"=>$postal_code,
                            "website"=>$website,
							"address"=>$address,
							"about_user"=>$aboutus,
							"intrest_area"=>$intrest_area,
							"termandcondition"=>'1',
							"update_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
		 $whereClause=" user_id=".$_SESSION['sess_webid'];
		 updateData($arr, 'user_profile', $whereClause);		
    // $insid=insertData($arr, 'user_profile');
	 echo $regmsg="Profile Added Successfully !";	

?>