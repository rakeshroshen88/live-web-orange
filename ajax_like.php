<?php 
include_once("config.inc.php");
include('chksession.php');
 if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				} 
				
$post_id=$_POST['postid'];
				
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
if($cnt == 0){$cnt=0;}
}else{
$sql1 = "UPDATE post_like SET do_like = '0' WHERE post_id=".$post_id." and user_id=".$_SESSION['sess_webid']; 
$db->query($sql1);
//echo $regmsg="Like";	
$status = true;
$message = "like";
$cnt=$db->getSingleResult("SELECT count(like_id) from do_like = '1' and post_like where post_id=".$post_id);
if($cnt == 0){$cnt=0;}

}

	
}else{
		
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"post_id"=>$post_id,
							"do_like"=>1,
							"status"=>'yes',							
							"l_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
				$insid=insertData($arr, 'post_like');
				 $cnt=$db->getSingleResult("SELECT count(like_id) from post_like where do_like = '1' and post_id=".$post_id);
				 if($cnt == 0){$cnt=0;}
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