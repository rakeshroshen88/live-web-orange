<?php 
include_once("config.inc.php");
include('chksession.php');

 $overview=$_POST['overview'];
$com_id=$_POST['cid'];
if(!empty($overview)){
  $sql1 = "UPDATE $_TBL_COMPANY SET page_details = '".$overview."' WHERE com_id=".$com_id;
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
$location=$FormData['location'];
//print_r($FormData);
//$dob=$FormData['dob'];
//$dob=date('Y-m-d',strtotime($dob));
$totalemp=$FormData['totalemp'];
$uemail=$FormData['uemail'];
$page_address=$FormData['page_address'];
$contactnumber=$FormData['contactnumber'];
$website=$FormData['website'];

$establish=$FormData['establish'];
  $sql1 = "UPDATE company_page  SET email_id = '".$uemail."' , location = '".$location."' , totalemp = '".$totalemp."' , establish = '".$establish."' , page_address = '".$page_address."', contactnumber = '".$contactnumber."', website = '".$website."' WHERE user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
echo $regmsg="Profile updated!";
}


$link=$_POST['link'];

if(!empty($link)){
$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"slink"=>$link,					
							"status"=>1
			    );
			
     $insid=insertData($arr, 'social_link');
	echo $regmsg="social saved!";

}


$clink=$_POST['clink'];
$cuserid=$_POST['cuserid'];
if(!empty($clink)){
$arr=array(					"user_id"=>$_SESSION['sess_webid'],
							"com_id"=>$cuserid,
							"slink"=>$clink,					
							"status"=>1
			    );
			
     $insid=insertData($arr, 'social_link');
	echo $regmsg="social saved!";

}

$current_city=$_POST['current_city'];
$hometown=$_POST['hometown'];
if(!empty($current_city) or !empty($hometown)){
 $sql1 = "UPDATE user_profile SET current_city = '".$current_city."', twon = '".$hometown."' WHERE user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
echo $regmsg="Location saved!";

}


$com_id=$_POST['cid'];
if(!empty($_SESSION['sess_ses_id'])){
   $sql1 = "UPDATE company_document SET com_id = '".$com_id."' WHERE user_id='".$_SESSION['sess_webid']."' and ses_id='".$_SESSION['sess_ses_id']."'";
$db->query($sql1);
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
   echo $sql1 = "UPDATE user_image SET gallery_name = '".$galleryname."' WHERE user_id=".$_SESSION['sess_webid']." and ses_id='".$_SESSION['sess_ses_id']."'";
  $db->query($sql1);
  echo $regmsg="Data updated!";

}

$delidg=$_POST['delidg'];
$img=$_POST['img'];
if(!empty($delidg)){
  $sql1 = "DELETE FROM company_document WHERE user_id=".$_SESSION['sess_webid']." and com_d_id='".$delidg."'";
$db->query($sql1);
unlink($img);
echo $regmsg="Deleted!";

}


//$ses_id = session_id();
?>