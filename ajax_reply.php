<?php 
include_once("config.inc.php");
include('chksession.php');
if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
		$post_id=$_POST['pid'];
		$uid=$_POST['uid'];
		$cid=$_POST['cid'];
		$rcomment=$_POST['rpostcomment'];
		$rimage=$_POST['rimage'];
		if(!empty($rcomment)){
		$arr=array(
							"user_id"=>$uid,
							"post_id"=>$post_id,
							"c_id"=>$cid,
							"rimage"=>$rimage,
							"r_comment"=>$rcomment,							
							"r_status"=>1,							
							"rdate"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'reply');
$db1=new DB();
$dbr=new DB();
$sqlr="SELECT * from reply where c_id=".$cid.' and r_id='.$insid;
$dbr->query($sqlr);
if($dbr->numRows()>0)
{
$rowr=$dbr->fetchArray();
$date=explode('-',$rowr['rdate']);


$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
$username1=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowr['user_id']);
$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowr['user_id']);		
	
	
																echo '<div class="comment">
																	
																	<span class="proilf-pic">';
																	if(!empty($rpimage)){
																	echo '<img src="upload/'.$rpimage.'" alt="">'; 
																	}else{
																	echo '<img src="images/resources/user.png" alt="">';
																	}
																	 echo '</span>
																	<h3>'.$username1.'</h3>';
																	if(!empty($rowr['rimage'])){
																	echo '<img src="upload/'.$rowr['rimage'].'" height="50" width="50"/>'; }
																	echo '<p class="commword">'.$rowr['r_comment'].'</p>
																</div>';
 } 			
			
	// echo $regmsg="Reply Added Successfully !";	
}
?>