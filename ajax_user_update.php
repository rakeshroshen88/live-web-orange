<?php 
include_once("config.inc.php");
//include('chksession.php');

 $overview=$_POST['overview'];

if(!empty($overview)){
 $sql1 = "UPDATE user_profile SET about_user = '".$overview."' WHERE user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
echo $regmsg="overview saved!";

}
$exp=$_POST['exp'];
$add=$_POST['add'];
$subject=$_POST['subject'];
$expid=$_POST['expid'];
if(!empty($exp) or !empty($subject) and !empty($expid)){
  $sql1 = "UPDATE user_experience SET subject = '".$subject."' , details = '".$exp."' WHERE exp_id=".$expid;
$db->query($sql1);
echo $regmsg="Experience updated!";	
}
if($add=='add'){
$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"details"=>$exp,
							"subject"=>$subject,
							"exp_status"=>1,						
							"exp_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'user_experience');
	echo $regmsg="Experience saved!";

}

	
if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
				
if(!empty($FormData)){
$mobileno=$FormData['mobileno'];
$dob=$FormData['dob'];
$dob=date('Y-m-d',strtotime($dob));
$interested=$FormData['interested'];
$website=$FormData['website'];
$gender=$FormData['gender'];
 $sql1 = "UPDATE user_profile SET mobileno = '".$mobileno."' , dob = '".$dob."' , gender = '".$gender."' , website = '".$website."' , intrest_in = '".$interested."' WHERE user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
echo $regmsg="Profile updated!";
}


$skills=$_POST['skills'];

if(!empty($skills)){
$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"skills"=>$skills,					
							"s_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'skills');
	echo $regmsg="skill saved!";

}

$current_city=$_POST['current_city'];
$hometown=$_POST['hometown'];
if(!empty($current_city) or !empty($hometown)){
 $sql1 = "UPDATE user_profile SET current_city = '".$current_city."', twon = '".$hometown."' WHERE user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
echo $regmsg="Location saved!";

}


$galleryname=$_POST['galleryname'];
if(!empty($galleryname)){
  $sql1 = "UPDATE user_image SET gallery_name = '".$galleryname."' WHERE user_id=".$_SESSION['sess_webid']." and ses_id='".$_SESSION['sess_ses_id']."'";
$db->query($sql1);
unset($_SESSION['sess_ses_id']);
echo $regmsg="Gallery saved!";

}

$delid=$_POST['delid'];
if(!empty($delid)){
  $sql1 = "DELETE FROM skills WHERE user_id=".$_SESSION['sess_webid']." and id='".$delid."'";
$db->query($sql1);
echo $regmsg="Skill deleted!";

}



$updateeduid=$_POST['updateeduid'];
if(!empty($updateeduid)){
   $sql1 = "UPDATE user_image SET gallery_name = '".$galleryname."' WHERE user_id=".$_SESSION['sess_webid']." and ses_id='".$_SESSION['sess_ses_id']."'";
  $db->query($sql1);
  echo $regmsg="Data updated!";

}

$delidg=$_POST['delidg'];
if(!empty($delidg)){
  $sql1 = "DELETE FROM user_image WHERE user_id=".$_SESSION['sess_webid']." and img_id='".$delidg."'";
$db->query($sql1);
echo $regmsg="Deleted!";

}


//$ses_id = session_id();
?>