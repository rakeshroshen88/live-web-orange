<?php 
include_once("config.inc.php");
//include('chksession.php');
/*  if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				}  */
				
$followid=$_POST['followid'];	
echo $dsql="DELETE FROM followers where f_id=".$followid;
//echo $dsql="DELETE FROM followers where f_id=".$_SESSION['sess_webid']." and follow=".$followid;
$db->query($dsql);
 echo $regmsg="follower Removed Successfully !";


?>