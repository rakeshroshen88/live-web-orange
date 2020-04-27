<?php 
include_once("config.inc.php");
include('chksession.php');
$dbu=new DB();				
$followid=$_POST['followid'];

  $sql="DELETE FROM friendrequest where user_id='".$followid."' and request_fid='".$_SESSION['sess_webid']."'";
$db->query($sql);

 echo $regmsg="Rejected!";

	 
//}
?>