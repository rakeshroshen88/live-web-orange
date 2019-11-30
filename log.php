<?php 
include('config.inc.php');
include('chksession.php');
$dbrew=new DB();
$reward=$dbrew->getSingleResult('select reward from '.$_TBL_USER." where user_id=".$_SESSION['sess_webid']);
$time=$dbrew->getSingleResult('select totaltime from '.$_TBL_USER." where user_id=".$_SESSION['sess_webid']);
$reward1=$reward+1;
$time1=$time+1;
$arrt1=array(
							"reward"=>$reward1,
							"totaltime"=>$time1
			    );
			
		 $whereClause1=" user_id=".$_SESSION['sess_webid'];
		 updateData($arrt1, $_TBL_USER , $whereClause1);
?>