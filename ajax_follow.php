<?php 
include_once("config.inc.php");
include('chksession.php');
/*  if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				}  */
//$connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e");
$dbu=new DB();				
$followid=$_POST['followid'];
$sqluser="SELECT * from user_profile where user_id=".$_SESSION['sess_webid'];
$dbu->query($sqluser);
if($dbu->numRows()>0)
{
$userrow=$dbu->fetchArray();
}
/* $emailid=$db->getSingleResult('select email_id from '.$_TBL_USER." where user_id=".$userrow['user_id']); */
				//if(!empty($post_id)){
  $sql="SELECT * from followers where user_id=".$_SESSION['sess_webid']." and follow=".$followid;
$db->query($sql);
if($db->numRows()>0)
{
$row=$db->fetchArray();
$follower=$row['follow'];
$dsql="DELETE FROM followers where user_id=".$_SESSION['sess_webid']." and follow=".$followid;
$db->query($dsql);
 echo $regmsg="follower Removed Successfully !";
/*if (in_array($followid, $follower, true)) {
    if (($key = array_search($followid, $follower)) !== false) {
    unset($array[$key]);
	}

$sql1 = "UPDATE user_profile SET allfriends = '".$friends"' WHERE user_id=".$_SESSION['sess_webid']; */

$conf=$_POST['conf'];
if($conf=='conf' or $conf !='conf' ){
$sql1 = "UPDATE friendrequest SET status='2' WHERE request_fid = '".$followid."' and user_id=".$_SESSION['sess_webid']; 
$db->query($sql1);
}
}else{
		
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"follow"=>$followid,							
							"status"=>'yes',							
							"f_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'followers');
	 
	 ////////////////Notification///////////////////
	 
		/* $notarr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"f_userid"=>$followid,	
							"notification_type"=>'follower',
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $not=insertData($notarr, 'notification'); */
	 //////////////////////////////////
	 $conf=$_POST['conf'];

//if($conf=='conf'){
  $sql1 = "DELETE FROM friendrequest WHERE user_id = '".$followid."' and request_fid='".$_SESSION['sess_webid']."'"; 
$db->query($sql1);
echo $regmsg="following";	
}
	 
//}
?>