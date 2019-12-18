<?php 
include_once("config.inc.php");
include('chksession.php');
 if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				} 
				
$post_id=$_POST['com_id'];
				
				//if(!empty($post_id)){
 $sql="SELECT * from com_like where com_id=".$post_id." and user_id=".$_SESSION['sess_webid'];
$db->query($sql);
if($db->numRows()>0)
{
$row=$db->fetchArray();
if($row['do_like']==0){
$sql1 = "UPDATE com_like SET do_like = '1' WHERE com_id=".$post_id." and user_id=".$_SESSION['sess_webid'];
$db->query($sql1);
//echo $regmsg="liked";	
$status = true;
$message = "liked";
$cnt=$db->getSingleResult("SELECT count(com_id) from com_like where do_like = '1' and  com_id=".$post_id);
if($cnt == 0){$cnt=0;}
}else{
$sql1 = "UPDATE com_like SET do_like = '0' WHERE com_id=".$post_id." and user_id=".$_SESSION['sess_webid']; 
$db->query($sql1);
//echo $regmsg="Like";	
$status = true;
$message = "like";
$cnt=$db->getSingleResult("SELECT count(com_id) from com_like where do_like = '1' and  com_id=".$post_id);
if($cnt == 0){$cnt=0;}

}

	
}else{
		
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"com_id"=>$post_id,
							"do_like"=>1,
							"status"=>'yes',							
							"c_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
				$insid=insertData($arr, 'com_like');
				 $cnt=$db->getSingleResult("SELECT count(com_id) from com_like where do_like = '1' and com_id=".$post_id);
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