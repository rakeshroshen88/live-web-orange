<?php
session_start();
include("config.inc.php");
 //$errMsg="";
$db1=new DB();
$newpassword=base64_decode($_POST['newpassword']);
$Password=base64_encode($_POST['oldpassword']);
$sql1="select * from ".$_TBL_USER." where password='".$Password."'";//die;
$db->query($sql1);
if($db->numRows()< 0)
	{ 
		$sql1 = "UPDATE $_TBL_USER SET password = '".$newpassword."' user_id=".$_SESSION['sess_webid'];
		$db->query($sql1);
		echo "Password hass been changed";
	}else{
		echo "Old password Incorrect";
	}
 ?>