<?php 
include_once("config.inc.php");
include('chksession.php');
 if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				} 
				
$post_id=$_POST['postid'];
if(!empty($post_id)){
$sql="update user_post set post_hide='1' where post_id=".$post_id;
$db->query($sql);
echo $regmsg="Post hide!";	
} 
	 
//}
?>