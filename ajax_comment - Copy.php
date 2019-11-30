<?php 
include_once("config.inc.php");
include('chksession.php');
if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
		$post_id=$FormData['pid'];
		$uid=$FormData['uid'];
		$comment=$FormData['postcomment'];
		$cimage=$FormData['cimage'];
		if(!empty($comment)){
		$arr=array(
							"user_id"=>$uid,
							"post_id"=>$post_id,
							"comment"=>$comment,
							"cimage"=>$cimage,
							"comment_status"=>1,							
							"cdate"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'comment');
	 //echo $regmsg="comment Added Successfully !";	

		}											
												 ?>