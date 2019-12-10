<?php include_once("config.inc.php");
if(!isset($_SESSION['sess_webid']) or empty($_SESSION['sess_webid']))
	
	{
		$fl=explode('/',$_SERVER['SCRIPT_NAME']);
		if(empty($_SERVER['QUERY_STRING']))
			{
			$fullname=$fl[count($fl)-1];
			}else{
			$fullname=$fl[count($fl)-1].'?'.$_SERVER['QUERY_STRING'];	
			}
		
		$_SESSION['sess_doc']=$fullname;		
		redirectpage("index.php");
		die();
	}
?>
