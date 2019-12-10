<?php
include_once("common.php");
ob_end_clean();
$_SESSION['SES_ADMIN_ID']="";
$_SESSION['SES_ADMIN_ID']='';
$_SESSION['SES_ADMIN_USER']='';
$_SESSION['SES_ADMIN_ROLE']='';
unset($_SESSION['SES_ADMIN_ID']);
unset($_SESSION['SES_ADMIN_USER']);
unset($_SESSION['SES_ADMIN_ROLE']);
//$_SESSION=array();
//unset($_SESSION);
//session_unset();
//session_destroy();
redirectpage("index.php");// Transefer index.php
?>