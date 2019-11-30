<?php 
include('header.php');
if($_POST['submit1']=='veryfy')
 {	 
  $uid=$_POST['uid'];
  echo $sql="select * from ".$_TBL_USER." where email_id='".$_POST['email1']."'";
$db->query($sql);
if($db->numRows()>0)
	{
	$result=$db->fetchArray();
	$uid=$result['uniqueid'];
	$first_name=$result['first_name'];	 
	$em=$_POST['email1'];
	$otp=$_POST['otp'];
		if($result['uniqueid']==$otp)
			{
	 $update=array( "user_status"=>'1');	
	 $where=" email_id=".$_REQUEST['email1'];
	 echo $sql1="update $_TBL_USER set user_status='1' where email_id='$em'";
	 $db->query($sql1);
	 $dataupdate=updateData($update, $_TBL_USER, $where); 
	 
	 echo"<script>alert('Verification successfully done! ! ')</script>";	
		
			}	
			$_SESSION['sess_webid']=$result['user_id'];
			$_SESSION['sess_webmail']=$em;	
			$_SESSION['sess_name']=$result['first_name'];
			redirect("get-started.php");
			//auto login/ get start/index/
	} 
 } 
?>