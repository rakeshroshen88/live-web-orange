<?php
include("config.inc.php");
 //$errMsg="";
$db1=new DB();
//$Password=base64_encode($_POST['txtPassword']);
 $sql1="select * from ".$_TBL_USER." where (email_id='".$_POST['txtUserName']."' or mobile_no='".$_POST['txtUserName']."') and password='".$_POST['txtPassword']."'";//die;
$db->query($sql1);
if($db->numRows()> 0)
	{
	$result=$db->fetchArray();
		if($result['user_status']=='1')
			{
			$_SESSION['sess_webid']=$result['user_id'];
			$_SESSION['sess_webmail']=$result['email_id'];	
			$_SESSION['sess_name']=$result['first_name'];
		

			redirect("dashboard.php");

			}else{
			$a="Sorry,You are not Active user";
			$nonce='decode';
			$encoded = base64_encode($a);
			$decoded = base64_decode($a);
			redirectpage("sign-in.php?msg=".$encoded);
			die();
			}
	}else{
		
		 $a="Invalid E-mail or Password";
		 $nonce='decode';
		 $encoded = base64_encode($a);
		 $decoded = base64_decode($a);
		 redirectpage("sign-in.php?msg=".$encoded);
	die();
	
	}
?>

