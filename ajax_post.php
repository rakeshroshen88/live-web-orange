<?php include('config.inc.php');
include('chksession.php');
$output = '';  
if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}

//print_r($FormData);
$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
print_r($FormData);
$feeling=$FormData['feeling'];
$post_details=$FormData['postid'];
$imgid=$FormData['imgid'];
$tagfriends=$FormData['tagfriends'];
$fsubcatname=$FormData['fsubcatname'];
$livelocationinput=$FormData['livelocationinput'];
if(!empty($FormData['pageid'])){
$pageid=$FormData['pageid'];
}else{
$pageid=0;	
}
$post_title=$FormData['selectfeel'];

$fname=$db->getSingleResult('select catname from '.$_TBL_FEELINGC." where id=".$post_title);
$prod_detail1 = mysqli_real_escape_string($link, $post_details);
if(!empty($prod_detail1)){
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"allpath"=>  $imgid,
							"post_title"=>$fname,
							"feelingimgid"=>  $fsubcatname,
							"post_details"=>$prod_detail1,
							"postemos"=>$feeling,
							"tagfriends"=>$tagfriends,
							"post_status"=>1,	
							"pageid"=>$pageid,	
							"livelocation"=>$livelocationinput,								
							"post_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'user_post');
	 //echo $regmsg="Post Added Successfully !";
$sql="SELECT * from user_post where post_id=".$insid;
$db->query($sql);
if($db->numRows()>0)
{
$row=$db->fetchArray();
}
$dbc=new DB();
$dbr=new DB();
$db1=new DB();
$dbu=new DB();
$db2=new DB();
$sqluser="SELECT * from user_profile where user_id=".$_SESSION['sess_webid'];
$dbu->query($sqluser);
if($dbu->numRows()>0)
{
$userrow=$dbu->fetchArray();
}	 

$usernamepost=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$row['user_id']);
$lcount=$db1->getSingleResult('select count(like_id) from post_like where post_id='.$insid);
$ccount=$db1->getSingleResult('select count(c_id) from comment where post_id='.$insid);
echo $datashow='<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">';
												if(empty($userrow['image_id'])){
													echo '<img src="images/resources/user.png" alt="" height="40" width="40">';
												}else{
												echo '<img src="upload/'.$userrow['image_id'].'" alt="" width="40" height="40">'; }
													echo '<div class="usy-name">
														<h3>'.$usernamepost.'</h3>
														<span><img src="images/clock.png" alt="">'.timeago($row['post_date']).'</span>
													</div>
												</div>
												<div class="ed-opts">
													<a href="javascript:void(0);" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="javascript:void(0);" title="" data-toggle="modal" data-target="#myModal'.$row['post_id'].'" id="editpost" editpostid="'.$row['post_id'].'">Edit Post</a></li>
														<li><a href="javascript:void(0);"  id="posthide" title="" hidepost="'.$row['post_id'].'" >Hide</a></li>
														<li><a href="javascript:void(0);" id="deletepost" title="" delpost="'.$row['post_id'].'" >Delete</a></li>
													</ul>
												</div>
											</div>
											<div id="show"></div>
											<div class="epi-sec">
												<ul class="descp">';
												if(!empty($userrow['current_company'])){
													echo '<li><img src="images/icon8.png" alt=""><span>'.$userrow['current_company'].'</span></li>';
												}
												if(!empty($row['livelocation'])){
													//livelocation
													echo '<li><img src="images/icon9.png" alt=""><span>'.$row['livelocation'].'</span></li>';
												}else if(!empty($row['current_city'])){
													echo '<li><img src="images/icon9.png" alt=""><span>'.$userrow['current_city'].'</span></li>';
												}else{
													echo '<li></li>';
												}
												echo '</ul>';
												
											echo '</div>';
											$db21=new DB();
											$feelingimgid=$row['feelingimgid'];
											$feelingimgidpath=$db21->getSingleResult('select imgid from '.$_TBL_FEELINGS." where subcatname='".$feelingimgid."'");
											if(!empty($row['post_title'])){
											echo '<div class="job_descp">
											<h3>'.$row['post_title']; }
												if(!empty($feelingimgid)){
												echo ': <img src="allimg/'.$feelingimgidpath.'" height="20"width="20">'.$feelingimgid.'  '.$row['postemos'].'</h3>';
											}
											if(!empty($row['tagfriends'])){
													//$a=array();
													 $tagf=$row['tagfriends'];
													$sql2='select first_name,user_id from all_user where user_id IN ('.$tagf.')';
													$db2->query($sql2)or die($db12->error());
												while($row1=$db2->fetchArray()){
												echo $a=$row1['first_name'].' ';
												}
												}
												echo '<p>'.$row['post_details'].'</p>';
												$ext = pathinfo($row['allpath'], PATHINFO_EXTENSION);
												 if($ext=='mp4' or $ext=='webm'){
												 echo "<video id='my-video' class='video-js' width='640' height='264' controls preload='auto'  poster='images/oceans.png' data-setup='{}'>
													<source src='".$row['allpath']."' type='video/mp4' width='100%'>
													<source src='".$row['allpath']."' type='video/webm' width='100%'>
													<p class='vjs-no-js'>
												      To view this video please enable JavaScript, and consider upgrading to a web browser that
												      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
												    </p>
												  </video>";
												 }else{
												$url='';
												$path='';
												if(!empty($row['allpath'])){
												$path=explode(',',$row['allpath']);
												$count=count($path);
												//foreach($path as $url){
												for($i=0;$i<=$count; $i++){
												echo '<img src="'.$path[$i].'" width="100%" />';

												}}
												}

												
											echo '
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														<a href="javascript:void(0)" class="like2" id="like'.$row['post_id'].'" like1="'.$row['post_id'].'"><i class="fas fa-heart"></i> Like</a>
														<img src="images/liked-img.png" alt="">
														<span>'.$lcount.'</span>
													</li> 
													<li><a href="javascript:void(0)" class="com" cid="'.$row['post_id'].'"><i class="fas fa-comment-alt"></i> Comment '.$ccount.'</a></li>
												</ul>
												
											</div>
										';

//<a href="#"><i class="fas fa-eye"></i></a>
echo '<div id="commentdisplay'.$row['post_id'].'" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">';
														if(!empty($userimage)){ 
														echo'<img src="upload/'.$userimage.'"/>';
														}else{
														echo '<img src="images/resources/user.png" alt="" height="40" width="40">';
														} 
													echo '</div>
													<li class="feeling-input">				
													<div class="comment_box feeling-input">
													<form id="" method="post">
													<input type="hidden" name="pid" id="pid'.$row['post_id'].'" value="'.$row['post_id'].'">
													<input type="hidden" name="uid" id="uid'.$row['post_id'].'" value="'.$_SESSION['sess_webid'].'" >
													
													<input type="hidden" name="cimage" id="cimage'.$row['post_id'].'" value="" >
													<label class="cemeraicon"	 for="cimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="cimageupload" name="cimageupload" >
													
													<p class="lead emoji-picker-container">
													<input type="text"  placeholder="Post a comment" class="cp" id="postcomment'.$row['post_id'].'" name="postcomment'.$row['post_id'].'" data-emojiable="true"></p>
													<style>
.wishlistcartemoji1{ width: 300px !important;    bottom: 0!important;    height: 200px!important;    top: inherit !important; }
.wishlistcartemoji1 li{display:inline;width:50px;}
.wishlistcartemoji1 li a img{    width: 30px !important;  height: 30px !important;}
#close{float: right; margin:10px;}
</style>
<ul class="wishlistcartemoji1" style="display:none;"  >
<div id="close"><a href="javascript:void(0)">X</a></div>';

  $sql1="SELECT * FROM emoji order by id desc";
$db->query($sql1)or die($db->error());
while($row1=$db->fetchArray()){
 $ext = pathinfo($row1['image'], PATHINFO_EXTENSION);	
if($ext=='mp3'){
	
				$a.='';					 
 }else{	
				$b.='<li>
							  <a href="javascript:void(0);" pid="'.$row['post_id'].'" im="'.$row1['image'].'"  mp3="'.$row1['mp3'].'"  uid="'.$row['user_id'].'" class="emoji1"><img src="emoji/'.$row1['image'].'" height="50" width="50" />
						</a>
						</li>';

 } } echo $b;echo "</ul>";
 echo '<a href="javascript:void(0);" name="send_chatemoji1"  class="send_chatemoji1" id="comment1'.$row['post_id'].'" uid="'.$row['post_id'].'"><i class="emoji-picker-icon emoji-picker fa fa-smile-o"></i> </a>
													<button type="button" id="commentid'.$row['post_id'].'" class="commentid" cid="'.$row['post_id'].'">Send</button>
														</form>
													</div>
												</div>
												</div>
												
<div class="comment-listing">';

 $sqlc="SELECT * from comment where post_id=".$row['post_id'];
$dbc->query($sqlc);
if($dbc->numRows()>0)
{
while($rowc=$dbc->fetchArray()){
$username=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowc['user_id']);
 'select image_id from user_profile where user_id='.$rowc['user_id'];
$pimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);
$userimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$_SESSION['sess_webid']);	

												echo '<div class="comment">
													<div class="commnt-bx">
																	<span class="proilf-pic">';
											if(!empty($pimage)){ 																	
											echo '<img src="upload/'.$pimage.'" alt="" height="40" width="40">';
											}else{ 
											echo '<img src="images/resources/user.png" alt="" height="40" width="40">';
											}
													
													

													if(!empty($rowc['mp3'])){ 
													echo '<img src="emoji/'.$rowc['cimage'].'" height="50" width="50"/>'; }elseif(!empty($rowc['cimage'])){ 
													echo '<img src="upload/'.$rowc['cimage'].'" height="50" width="50"/>';
													 }
													echo '<span class="user-name-in-coment">'.$username.'</span>
													<span class="commword">'.$rowc['comment'].' </span>
													</span>
												</div>
												 <div class="action-like-acti">
													<a href="javascript:void(0)" title="" class="active" id="replyiddiv" cid="'.$rowc['c_id'].'"><i class="fa fa-reply-all"></i>Reply</a>
													<span class="coment-time">';
													echo timeago($rowc['cdate']);
													echo '</span> 
													</div>
										
										<div id="replydisplay'.$rowc['c_id'].'" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">';
													if(!empty($userimage)){
														echo '<img src="upload/'.$userimage.'" alt="">';
													}else{
														echo '<img src="images/resources/user.png" alt="" height="40" width="40">';
													}
													echo '</div>
													<div class="comment_box">
													<form id="replyForm" method="post">
													<input type="hidden" name="pid" id="pid'.$rowc['c_id'].'" value="'.$rowc['post_id'].'">
													<input type="hidden" name="uid" id="uid'.$rowc['c_id'].'" value="'.$rowc['user_id'].'" >
													<input type="hidden" name="cid" id="cid'.$rowc['c_id'].'" value="'.$rowc['c_id'].'" >
													<input type="hidden" name="rimage" id="rimage'.$rowc['c_id'].'" value="" >
													<label class="cemeraicon" for="rimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="rimageupload" name="rimageupload" >
													<p class="lead emoji-picker-container">
													<input type="text"  placeholder="Reply on comment" name="rpostcomment" class="rp" id="rpostcomment'.$rowc['c_id'].'" data-emojiable="true">
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
$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);		
	
	
																echo '<div class="comment">
																	<div class="commnt-bx">
																	<span class="proilf-pic">';
																	if(!empty($rpimage)){
																	echo '<img src="upload/'.$rpimage.'" alt="">'; 
																	}else{
																	echo '<img src="images/resources/user.png" alt="" height="40" width="40">';
																	 }
																	 
																	echo '<span class="user-name-in-coment">'.$username1.' 1</span> ';
																	if(!empty($rowr['rimage'])){ 
																	echo '<img src="upload/'.$rowr['rimage'].'" height="50" width="50"/>'; }
																	echo '<span class="commword">'.$rowr['r_comment'].' 
																	<br/>
																	<span class="tim-dat1">';
																	echo timeago($rowr['rdate']); 
																	echo '</span></span>
																	</span>
																	</div>
																</div>';
										
 }} 
													echo '</div>';
 } } 

												
												
											echo '</ul>
												
											</div></div></div>';
												 }
									
?>