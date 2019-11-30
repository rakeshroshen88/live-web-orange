<?php
	require_once("../config.inc.php");
	$_ADMIN_DIR = $_DIR_PATH."admin/";
	$_ADMIN_URL = $_SITE_PATH."admin/";
	
	if(isset($_GET['lao']))
		$_SESSION['leftareaopen']=$_GET['lao'];
		
###########Website Setting#####################################
$sqladmin="select * from ".$_TBL_ADMIN_SETTING ." where Extra_id='1' ";
$db->query($sqladmin);
$row_setting=$db->fetchArray();
$_LIST_LEN=$row_setting['paging_back_end'];
	
################################################
	
if(!empty($_SESSION['SES_ADMIN_ID'])){
	//$qryStr.=(!empty($_REQUEST['oby'])?'&oby='.$_REQUEST['oby']:'');
	//$qryStr.=(!empty($_REQUEST['sort'])?'&sort='.$_REQUEST['sort']:'');
	//$qryStr.=(!empty($_REQUEST['page'])?'&page='.$_REQUEST['page']:'');
}
	if(isset($_REQUEST['pageContent']))	
	{
		$pageContent=stripslashes($_POST['pageContent']);
		@preg_match("/(\/[^\/]*)/",$_SERVER['PHP_SELF'],$matches);
		$searchStr=$matches[0];

		if(@strpos($pageContent,'src="'.$searchStr)!==false)
		{
			$pageContent=@str_replace('src="'.$searchStr,'src="http://'.$_SERVER_NAME.$searchStr,$pageContent);
		}
		if(@strpos($pageContent,'src="htmleditor')!==false)
		{
			$pageContent=@str_replace('src="htmleditor','src="'.stripHttps($_SITE_PATH)."htmleditor" ,$pageContent);
		}
		$pageContent=str_replace("Â","",$pageContent);
	}
	if(!empty($_SESSION['SES_ADMIN_ID'])){
	$adminEmail=$db->getSingleResult("SELECT adminEmail FROM $_TBL_ADMIN WHERE  adminID=".$_SESSION['SES_ADMIN_ID']);
	}
?>
