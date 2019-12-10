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
if(!empty($post_details)){
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"allpath"=>  $imgid,
							"post_details"=>$post_details,
							"postemos"=>$feeling,								
							"post_status"=>1,						
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
												<div class="usy-dt">
													<img src="upload/'.$userrow['image_id'].'" alt="" height="40" weigth="40">
													<div class="usy-name">
														<h3>'.$usernamepost.'</h3>
														<span><img src="images/clock.png" alt="">'.timeago($row['post_date']).'</span>
													</div>
												</div>
												<div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="#" title="">Edit Post</a></li>
														<li><a href="#" title="">Unsaved</a></li>
														<li><a href="#" title="">Unbid</a></li>
														<li><a href="#" title="">Close</a></li>
														<li><a href="#" title="">Hide</a></li>
													</ul>
												</div>
											</div>
											<div id="show"></div>
											<div class="epi-sec">
												<ul class="descp">
													<li><img src="images/icon8.png" alt=""><span>'.$userrow['current_company'].'</span></li>
													<li><img src="images/icon9.png" alt=""><span>'.$userrow['current_city'].'</span></li>
												</ul>
												<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
												</ul>
											</div>
											<div class="job_descp">
												<h3>'.$row['postemos'].'</h3>
												 
												<p>'.$row['post_details'].'</p>
												<img src="'.$row['allpath'].'" width="100%" />

												

												
											</div>
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														<a href="javascript:void(0)" class="like2" id="like2" like1="'.$row['post_id'].'"><i class="fas fa-heart"></i> Like</a>
														<img src="images/liked-img.png" alt="">
														<span>'.$lcount.'</span>
													</li> 
													<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment '.$ccount.'</a></li>
												</ul>
												<a href="#"><i class="fas fa-eye"></i>Views 50</a>
											</div>
										</div>';
}
?>
