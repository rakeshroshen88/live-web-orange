<?php 
include_once("config.inc.php");
//include('chksession.php');
/*  if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				}  */
				
$followid=$_POST['followid'];
	
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
/* if (in_array($followid, $follower, true)) {
   if (($key = array_search($followid, $follower)) !== false) {
    unset($array[$key]);
	}
}else{
	
} */
/* if($row['do_like']==0){
$sql1 = "UPDATE followers SET follow = '1' WHERE user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
echo $regmsg="followers Successfully !";	
}else{
$sql1 = "UPDATE followers SET follow = '0' WHERE user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
echo $regmsg="followers hide Successfully !";	
} */
	
}else{
		
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"follow"=>$followid,							
							"status"=>'yes',							
							"f_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'followers');
	 echo $regmsg="following";	
}
	 
//}
?>