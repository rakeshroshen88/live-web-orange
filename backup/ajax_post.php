<?php include('config.inc.php');
include('chksession.php');
$output = '';  
 


if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}

//print_r($FormData);

$feeling=$FormData['feeling'];
$post_details=$FormData['postid'];
$imgid=$FormData['imgid'];
$tagfriends=$FormData['tagfriends'];
$fsubcatname=$FormData['fsubcatname'];
if(!empty($FormData['pageid'])){
$pageid=$FormData['pageid'];
}else{
$pageid=0;	
}
$post_title=$FormData['selectfeel'];

$fname=$db->getSingleResult('select catname from '.$_TBL_FEELINGC." where id=".$post_title);
if(!empty($post_details)){
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"allpath"=>  $imgid,
							"post_title"=>$fname.' '.$fsubcatname,
							"post_details"=>$post_details,
							"postemos"=>$feeling,
							"tagfriends"=>$tagfriends,
							"post_status"=>1,	
							"pageid"=>$pageid,							
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
												if(!empty($userrow['current_city'])){
													echo '<li><img src="images/icon9.png" alt=""><span>'.$userrow['current_city'].'</span></li>';
												}
												echo '</ul>';
												/* <ul class="bk-links">
													<li><a href="#" title=""><i class="la la-share"></i></a></li>
													
												</ul> */
											echo '</div>';
											if(!empty($row['post_title'])){
											echo '<div class="job_descp">
												<h3>'.$row['post_title'].': '.$row['postemos'].'</h3>';
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

												
											echo '</div>
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														<a href="javascript:void(0)" class="like2" id="like2" like1="'.$row['post_id'].'"><i class="fas fa-heart"></i> Like</a>
														<img src="images/liked-img.png" alt="">
														<span>'.$lcount.'</span>
													</li> 
													<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment '.$ccount.'</a></li>
												</ul>
												
											</div>
										</div>';
}
//<a href="#"><i class="fas fa-eye"></i></a>
?>
