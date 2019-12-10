<?php 
include_once("config.inc.php");
include('chksession.php');
if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
		$post_id=$_POST['pid'];
		$uid=$_POST['uid'];
		$mp3=$_POST['mp3'];
		$cimage=$_POST['cimage'];
		if(!empty($cimage)){
		$arr=array(
							"user_id"=>$uid,
							"post_id"=>$post_id,
							"comment"=>'',
							"cimage"=>$cimage,
							"mp3"=>$mp3,
							"comment_status"=>1,							
							"cdate"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'comment');
	 $dbc=new DB();
	 $dbr=new DB();
	 //echo $regmsg="comment Added Successfully !";	
	  $sqlc="SELECT * from comment where post_id=".$post_id.' and c_id='.$insid;
		$dbc->query($sqlc);
		if($dbc->numRows()>0)
		{
		$rowc=$dbc->fetchArray();
		}
		$username=$dbc->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowc['user_id']);

		$pimage=$dbc->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	
		
}


											echo '<div class="comment">
													<div class="commnt-bx">
																	<span class="proilf-pic">';
											if(!empty($pimage)){
											echo '<img src="upload/'.$pimage.'" alt="" height="40" width="40">';
											 }else{ 
											echo '<img src="images/resources/user.png" alt="">';
											 }
												if(!empty($rowc['mp3'])){ 
													echo '<img src="emoji/'.$rowc['cimage'].'" height="50" width="50"/>';
													}else{
														echo '<img src="upload/'.$rowc['cimage'].'" height="50" width="50"/>';
													}
													echo '<span class="user-name-in-coment">'.$username.'</span>';
													if(!empty($rowc['comment'])){
													echo '<span class="commword">'.$rowc['comment'].'</span>';
													}
													echo '</span>
												</div>
												 <div class="action-like-acti">
													<a href="javascript:void(0)" title="" class="active" id="replyiddiv" cid="'.$rowc['c_id'].'"><i class="fa fa-reply-all"></i>Reply</a>
													<span class="coment-time"></span> 
													</div>
										
										<div id="replydisplay'.$rowc['c_id'].'" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">
														<img src="upload/'.$userimage.'" alt="">
													</div>
													<div class="comment_box">
													<form id="replyForm" method="post">
													<input type="hidden" name="pid" id="pid'.$rowc['c_id'].'" value="'.$rowc['post_id'].'">
													<input type="hidden" name="uid" id="uid'.$rowc['c_id'].'" value="'.$rowc['user_id'].'" >
													<input type="hidden" name="cid" id="cid'.$rowc['c_id'].'" value="'.$rowc['c_id'].'" >
													<input type="hidden" name="rimage" id="rimage'.$rowc['c_id'].'" value="" >
													<label class="cemeraicon" for="rimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="rimageupload" name="rimageupload" >
													<p class="lead emoji-picker-container">
													<input type="text"  placeholder="Reply on comment" name="rpostcomment" id="rpostcomment'.$rowc['c_id'].'" data-emojiable="true">
													</p>
													<button type="button" name="replyid" id="replyid'.$rowc['c_id'].'" class="replyid" rid="'.$rowc['c_id'].'">Send</button>
														</form>
													</div>
												</div>
												</div>';
										

 $sqlr="SELECT * from reply where c_id=".$rowc['c_id'];
$dbr->query($sqlr);
if($dbr->numRows()>0)
{
while($rowr=$dbr->fetchArray()){
$date=explode('-',$rowr['rdate']);


$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
$username1=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowr['user_id']);
$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowr['user_id']);		
	
	
																echo '<div class="comment">
																	
																	<span class="proilf-pic">';
																	if(!empty($rpimage)){
																	echo '<img src="upload/'.$rpimage.'" alt="">'; 
																	}else{
																	echo '<img src="images/clock.png" alt="">';
																	}
																	 echo '</span>
																	<h3>'.$username1.'</h3>';
																	if(!empty($rowr['rimage'])){
																	echo '<img src="upload/'.$rowr['rimage'].'" height="50" width="50"/>'; }
																	echo '<p class="commword">'.$rowr['r_comment'].'</p>
																</div>';
 }} 			
										
										
										
										
																	
													echo '</div>';
 die; 
?>