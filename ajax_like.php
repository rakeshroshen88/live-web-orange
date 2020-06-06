<?php 
include_once("config.inc.php");
include('chksession.php');
 if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				} 
				
$post_id=$_POST['postid'];
$uid=$db->getSingleResult("SELECT user_id from user_post where post_id=".$post_id);				
				//if(!empty($post_id)){
 $sql="SELECT * from post_like where post_id=".$post_id." and user_id=".$_SESSION['sess_webid'];
$db->query($sql);
if($db->numRows()>0)
{
$row=$db->fetchArray();
if($row['do_like']==0){
$sql1 = "UPDATE post_like SET do_like = '1' WHERE post_id=".$post_id." and user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
//echo $regmsg="liked";	
$status = true;
$message = "liked";
$cnt=$db->getSingleResult("SELECT count(like_id) from post_like where do_like = '1' and  post_id=".$post_id);
////////notification//////////////
	 /* $notarr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"post_id"=>$post_id,	
							"f_userid"=>$uid,
							"notification_type"=>'liked',
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $not=insertData($notarr, 'notification'); */

}else{
$sql1 = "UPDATE post_like SET do_like = '0' WHERE post_id=".$post_id." and user_id=".$_SESSION['sess_webid']; 
$db->query($sql1);
//echo $regmsg="Like";	

////////notification//////////////
	 /* $notarr=array(
							"user_id"=>$uid,
							"post_id"=>$post_id,	
							"f_userid"=>$uid,
							"notification_type"=>'unlike',
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $not=insertData($notarr, 'notification'); */
$status = true;
$message = "like";
$cnt=$db->getSingleResult("SELECT count(like_id) from post_like where do_like = '1' and  post_id=".$post_id);

}

	
}else{
	
	
	 $postname=$db->getSingleResult("SELECT post_details from user_post where post_id=".$post_id);
	 $email_id=$db->getSingleResult("SELECT email_id from all_user where user_id=".$uid);
	 $name=$db->getSingleResult("SELECT first_name from all_user where user_id=".$uid);
	 $lastname=$db->getSingleResult("SELECT last_name from all_user where user_id=".$uid);
	
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"post_id"=>$post_id,
							"do_like"=>1,
							"status"=>'yes',							
							"l_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
				$insid=insertData($arr, 'post_like');
				////////notification//////////////
	 $notarr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"post_id"=>$post_id,
							"f_userid"=>$uid,							
							"notification_type"=>'liked',
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $not=insertData($notarr, 'notification');
	 /////////////////////////////
					$cnt=$db->getSingleResult("SELECT count(like_id) from post_like where do_like = '1' and  post_id=".$post_id);

				 
				if($insid !== false){
					$status = true;
					$message = "liked";
					}else{
					$status = false;
					$message = "like";
					}
			
	
}
			$response['status']= $status;
			$response['countid']= $cnt;
			$response['message'] = $message;
			echo json_encode($response);
			die;
	 
//}
?>