<?php include( 'config.inc.php');
include( 'chksession.php');
if(isset($_POST['task']) and $_POST['task']=="del")
	{
		 echo $sql="delete from ".$_TBL_TEMPORDER." where id=".$_POST['id'];
		$db->query($sql);
		$err="Deleted Successfully";
		redirect($_SITE_PATH."checkout.php");	
		$tot=$db1->getSingleResult("select count(*) from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'");
	  if($tot==0)
		{
		unset($_SESSION['sess_coup']);
		unset($_SESSION['sess_coupcode']);
		unset($_SESSION['sess_couptype']);
		echo "ok";
		}	
	}
?>