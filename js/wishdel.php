<?php 

if(isset($_GET['task']) and $_GET['task']=="del")
	{
		 $sql="delete from wishlish where prodid=".$_GET['id']."  and user_id=".$_SESSION['sess_webid'];
		$db->query($sql);
		$err="Deleted Successfully";
		//redirect($_SITE_PATH."checkout.php");	
		///$tot=$db1->getSingleResult("select count(*) from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'");
	  if($tot==0)
		{
		unset($_SESSION['sess_coup']);
		unset($_SESSION['sess_coupcode']);
		unset($_SESSION['sess_couptype']);
		}	
	}
	
	?>