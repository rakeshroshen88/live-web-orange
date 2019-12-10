<?php include('header.php');
include('chksession.php');

?>
		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3 col-md-4 pd-left-none no-pd">
								<div class="main-left-sidebar no-margin">
									<div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
												<div class="usr-pic">
						<?php  $dbn=new DB();
						  $sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						while($rowi=$dbn->fetchArray()){
							 $impid=$rowi['image_id'];
						}
						?>
						<?php if($impid=='' and empty($impid)){ echo "$impid";?>
							<img src="images/resources/user.png" alt="">
						<?php }else{?>
							<img src="upload/<?=$impid?>" alt="" height="120">
						<?php }?>
												    
												<!--	<img src="images/resources/user-pic.png" alt="">-->
													
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												<h3><?=$_SESSION['sess_name']?></h3>
												<span><?php 
												echo $emp=$db->getSingleResult("SELECT current_company from user_profile where user_id=".$_SESSION['sess_webid']);
												?></span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li><!--javascript:void(0)" id="follow-->
												<a href="profile.php"><h4>Following</h4></a>
												<span><?php 
												echo $num1=$db->getSingleResult("SELECT * from followers where user_id=".$_SESSION['sess_webid']);
												 if(empty($num1)){ echo "0";}
												?></span>
											</li>
											<li>
												<h4>Followers</h4>
												<span><?php 
												 $num=$db->getSingleResult("SELECT * from followers where follow=".$_SESSION['sess_webid']);
												 if(empty($num)){ echo "0";}
												?></span>
											</li>
											<li>
												<h4>Massage</h4>
												<span>3</span>
											</li>

											<li>
												<a href="my-profile.html" title="">View Profile</a>
											</li>
										</ul>
									</div><!--user-data end-->
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Following</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
										<?php  
										/* $sqlres = "SELECT * from {$wpdb->prefix}carer_information where status=1  and carer_info_id IN ({$carer_id}) "; */
										$dbuf=new DB();
										$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										$db->query($sql);
										if($db->numRows()>0)
										{
										while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);										
											
										/* $sqluserf="SELECT * from user_profile where user_id=".$row['user_id'];
										$dbuf->query($sqluserf);
										if($dbuf->numRows()>0)
										{
										$userrowf=$dbuf->fetchArray();
										} */
											
											?>
											<div class="suggestion-usd">
											<?php if(!empty($userfpath)){?>
												<img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
											<?php }else{ ?>
											<img src="images/resources/s2.png" alt="">
											<?php }?>
												<div class="sgt-text">
													<h4><?=$usernamef?></h4>
													<span><?=$woorking?></span>
												</div>
												 
											</div>
											
										<?php }}?>
											
											
											
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									<div class="tags-sec full-width">
										<ul>
											<li><a href="#" title="">Help Center</a></li>
											<li><a href="#" title="">About</a></li>
											<li><a href="#" title="">Privacy Policy</a></li>
											<li><a href="#" title="">Community Guidelines</a></li>
											<li><a href="#" title="">Cookies Policy</a></li>
											<li><a href="#" title="">Career</a></li>
											<li><a href="#" title="">Language</a></li>
											<li><a href="#" title="">Copyright Policy</a></li>
										</ul>
										<div class="cp-sec">
											<img src="images/logo2.png" alt="">
											<p><img src="images/cp.png" alt="">Copyright 2019</p>
										</div>
									</div><!--tags-sec end-->
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6 col-md-8 no-pd">
								<div class="main-ws-sec">
	<link href="lib/css/emoji.css" rel="stylesheet">
									<!-- new post-st end-->
									<style type="text/css">
										.newpost1{}
										.newpost1{}
										.newpost1 .post-st textarea{ width: 100%;     border: none; }
										.newpost1 .post-st{      width: 87%; }
									</style>
									<form  method="post" id="AddForm" enctype="multipart/form-data">
									<div class="post-topbar newpost1">
										<h3>Add Product</h3>
										<div class="user-picy">
										<?php if(empty($userspath)){?>
											<img src="images/resources/user-pic.png" alt="">
										<?php }else{ ?>
										<img src="upload/<?=$userspath?>" alt="" width="50" height="50" style="border-radius: 50%;">
										<?php }?>
										</div>
										<div class="post-st">
											 <input type="text" name="productname" id="productname" placeholder="Product Name..." required />
										</div>
										<div class="post-st">
											 <input type="text" name="price" id="price" placeholder="Product price..." required />
										</div>
										
										<div class="post-st">
											 <input type="text" name="prod_sprice" id="prod_sprice" placeholder="Product selling price..." required />
										</div> 
										<div class="post-st">
											<select name="ptype">
											<option value="1" >Type 1</option>
											<option value="2">Type 2</option>
											<option value="3">Type 3</option>
											</select>
										</div>
										
										<div class="post-st">
											<select name="category">
											<option value="1">category 1</option>
											<option value="2">category 2</option>
											<option value="3">category 3</option>
											</select>
										</div>
										
										<div class="post-st">
											 <textarea cols="5" rows="4" placeholder="Product Details..." name="pdetails" id="pdetails"></textarea>
										</div>
										<div class="post-img-list">
											<div id="image_preview1"></div>
										</div>
										<div class="Feelingpst">
											
										</div>
										<div class="post-img-list">
											<div id="image_preview"></div>
										</div>
										<div class="postoptions">
											<ul>
											<li>
														<label>
															<img src="images/gallery.png">Add product Image
															<input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple>
														</label>
														<input type="hidden" name="imgid" id="imgid" value=""/>
													</li>
													

											</ul>
 
										</div>
										<div class="post-st text-right">
											<ul>
												 
												<li><!--<a class="active"  href="#" title="">Post Status</a>uploadpost-->
												<button type="button" id="addproduct" value="Add product" class="active postbtn">Add product</button>
												</li>
											</ul>
										</div><!--post-st end-->

									</div> 
</form>
									<!--new post-st end-->



<div class="posts-section" id="postshow">

</div>
									
<div class="posts-section">
									
<?php $db1=new DB();
$dbr=new DB();
$dbc=new DB();
$dbu=new DB();
$sql="SELECT * from user_post where post_hide='0' order by post_id desc limit 0,5";
$db->query($sql);
if($db->numRows()>0)
{
while($row=$db->fetchArray()){
$userimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$_SESSION['sess_webid']);

$usernamepost=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$row['user_id']);
//$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	
$sqluser="SELECT * from user_profile where user_id=".$row['user_id'];
$dbu->query($sqluser);
if($dbu->numRows()>0)
{
$userrow=$dbu->fetchArray();
}
$lcount=$db1->getSingleResult('select count(like_id) from post_like where post_id='.$row['post_id']);
$ccount=$db1->getSingleResult('select count(c_id) from comment where post_id='.$row['post_id']);
?>
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
												<?php if(empty($userrow['image_id'])){?>
													<img src="images/resources/us-pic.png" alt="">
												<?php }else{?>
												<img src="upload/<?=$userrow['image_id']?>" alt="" height="40" width="40">
												<?php }?>
													<div class="usy-name">
														<h3><?=$usernamepost?></h3>
														<span><img src="images/clock.png" alt=""><?php echo timeago($row['post_date']);?></span>
													</div>
												</div>
												<div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="javascript:void(0);" title="" data-toggle="modal" data-target="#myModal<?=$row['post_id']?>" id="editpost" editpostid="<?=$row['post_id']?>">Edit Post</a></li>
														<li><a href="javascript:void(0);"  id="posthide" title="" hidepost="<?=$row['post_id']?>" >Hide</a></li>
														<li><a href="javascript:void(0);" class="deletepost" id="deletepost" title="" delpost="<?=$row['post_id']?>" >Delete</a></li>
													</ul>
												</div>
											</div>
											<div id="show"></div>
											<div class="epi-sec">
												<ul class="descp">
												<?php if(!empty($userrow['current_company'])){?>
													<li><img src="images/icon8.png" alt=""><span><?=$userrow['current_company']?></span></li>
													<?php } if(!empty($userrow['current_city'])){?>
													<li><img src="images/icon9.png" alt=""><span><?=$userrow['current_city']?></span></li><?php }?>
												</ul>
												<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-share"></i></a></li>
													
												</ul>
											</div>
											<div class="job_descp">
												<h3 class="font-weight-500"><?=$row['post_title']?>:<span class="bold"> <?=$row['postemos']?> </span></h3>
												
												 
												<p><?=$row['post_details']?></p>
												<?php 
												 $ext = pathinfo($row['allpath'], PATHINFO_EXTENSION);
												 if($ext=='mp4' or $ext=='webm'){?>
												 <video id='my-video<?=$row['post_id']?>'  class='video-js' controls preload='auto'  poster='images/oceans.png' data-setup='{}'  >
													<source src='<?=$row['allpath']?>' type='video/mp4' width="100%">
													<source src='<?=$row['allpath']?>' type='video/webm' width="100%">
													<p class='vjs-no-js'>
												      To view this video please enable JavaScript, and consider upgrading to a web browser that
												      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
												    </p>
												  </video>
												
												 <?php }else{
												$url='';
												$path='';
												if(!empty($row['allpath'])){
												$path=explode(',',$row['allpath']);
												$count=count($path);
												//foreach($path as $url){
												for($i=0;$i<=$count; $i++){
													//echo $i;
												?>										
												<img src="<?=$path[$i]?>" width="100%" />
												<?php }} 
												}
												?>

												<!-- video link -->

												<!--<video id='my-video' class='video-js' controls preload='auto'  poster='images/oceans.png' data-setup='{}'>
													<source src='images/oceans.mp4' type='video/mp4'>
													<source src='images/oceans.webm' type='video/webm'>
													<p class='vjs-no-js'>
												      To view this video please enable JavaScript, and consider upgrading to a web browser that
												      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
												    </p>
												  </video>-->

												<!-- video link -->

												
											</div>
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														 <?php 
														 $lucount=$db1->getSingleResult('select count(like_id) from post_like where post_id='.$row['post_id'].' and user_id='.$_SESSION['sess_webid'] );
											if($lucount>0){
												?>
														<a href="javascript:void(0)" class="like2" id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> UnLike</a>
											<?php }else{?>	
											<a href="javascript:void(0)" class="like2" id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Like</a>
											
											<?php }?>
														<img src="images/liked-img.png" alt="">
														<span><?=$lcount?></span>
													</li> 
													<li><a href="javascript:void(0)" class="com" cid="<?=$row['post_id']?>"><i class="fas fa-comment-alt"></i> Comment <?=$ccount?></a></li>
													<li class="pull-right">
														<a href="#"><i class="fas fa-eye"></i>Views 50</a>
													</li>

													<div id="commentdisplay<?=$row['post_id']?>" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">
														<!--<img src="images/resources/bg-img4.png" alt="">-->
														<?php if(!empty($userimage)){ ?>
														<img src="upload/<?=$userimage?>"/>
														<?php }else{?>
														<img src="images/resources/bg-img4.png" alt="">
														<?php } ?>
													</div>
													<li class="feeling-input">				
													<div class="comment_box feeling-input">
													<form id="" method="post">
													<input type="hidden" name="pid" id="pid<?=$row['post_id']?>" value="<?=$row['post_id']?>">
													<input type="hidden" name="uid" id="uid<?=$row['post_id']?>" value="<?=$_SESSION['sess_webid']?>" >
													
													<input type="hidden" name="cimage" id="cimage<?=$row['post_id']?>" value="" >
													<label class="cemeraicon"	 for="cimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="cimageupload" name="cimageupload" >
													
													<p class="lead emoji-picker-container">
													<input type="text"  placeholder="Post a comment" id="postcomment<?=$row['post_id']?>" name="postcomment<?=$row['post_id']?>" data-emojiable="true"></p>
													<button type="button" id="commentid<?=$row['post_id']?>" class="commentid" cid="<?=$row['post_id']?>">Send</button>
														</form>
													</div>
												</div>
												</div>
												<?php //////////////?>
<div class="comment-listing">
<?php 
 $sqlc="SELECT * from comment where post_id=".$row['post_id'];
$dbc->query($sqlc);
if($dbc->numRows()>0)
{
while($rowc=$dbc->fetchArray()){
$username=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowc['user_id']);
 'select image_id from user_profile where user_id='.$rowc['user_id'];
$pimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	

	?>
												<div class="comment">
													<div class="commnt-bx">
																	<span class="proilf-pic"><!--<img src="images/clock.png" alt=""> -->
											<?php if(!empty($pimage)){ ?>																	
											<img src="upload/<?=$pimage?>" alt="" height="40" width="40"><?php }else{ ?>
											<img src="images/clock.png" alt="">
											<?php }?>
													
													

													<?php if(!empty($rowc['cimage'])){ ?>
													<img src="upload/<?=$rowc['cimage']?>" height="50" width="50"/><?php }?>
													<span class="user-name-in-coment"><?=$username?></span>
													<span class="commword"><?=$rowc['comment']?> </span>
													</span>
												</div>
												 <div class="action-like-acti">
													<a href="javascript:void(0)" title="" class="active" id="replyiddiv" cid="<?=$rowc['c_id']?>"><i class="fa fa-reply-all"></i>Reply</a>
													<span class="coment-time"><?php echo timeago($rowc['cdate']);?> </span> 
													</div>
										<?php //////Add Reply/ user image////////?>
										<div id="replydisplay<?=$rowc['c_id']?>" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">
														<img src="upload/<?=$userimage?>" alt="">
													</div>
													<div class="comment_box">
													<form id="replyForm" method="post">
													<input type="hidden" name="pid" id="pid<?=$rowc['c_id']?>" value="<?=$rowc['post_id']?>">
													<input type="hidden" name="uid" id="uid<?=$rowc['c_id']?>" value="<?=$rowc['user_id']?>" >
													<input type="hidden" name="cid" id="cid<?=$rowc['c_id']?>" value="<?=$rowc['c_id']?>" >
													<input type="hidden" name="rimage" id="rimage<?=$rowc['c_id']?>" value="" >
													<label class="cemeraicon" for="rimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="rimageupload" name="rimageupload" >
													<p class="lead emoji-picker-container">
													<input type="text"  placeholder="Reply on comment" name="rpostcomment" id="rpostcomment<?=$rowc['c_id']?>" data-emojiable="true">
													</p>
													<button type="button" name="replyid" id="replyid<?=$rowc['c_id']?>" class="replyid" rid="<?=$rowc['c_id']?>">Send</button>
														</form>
													</div>
												</div>
												</div>
										<?php ///////////////?>
										
<?php ///////Show Reply////////


 $sqlr="SELECT * from reply where c_id=".$rowc['c_id'];
$dbr->query($sqlr);
if($dbr->numRows()>0)
{
while($rowr=$dbr->fetchArray()){
$date=explode('-',$rowr['rdate']);


$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
$username1=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowr['user_id']);
$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);		
	?>
	
																<div class="comment">
																	
																	<span class="proilf-pic"><!--<img src="images/clock.png" alt=""> -->
																	<?php if(!empty($rpimage)){ ?>
																	<img src="upload/<?=$rpimage?>" alt=""> 
																	<?php }else{?>
																	<img src="images/clock.png" alt="">
																	<?php }?>
																	<?php echo timeago($rowr['rdate']);?> </span>
																	<h3><?=$username1?></h3>
																	<?php if(!empty($rowr['rimage'])){ ?>
																	<img src="upload/<?=$rowr['rimage']?>" height="50" width="50"/><?php }?>
																	<p class="commword"><?=$rowr['r_comment']?> </p>
																</div>
										
<?php }} ///////////////?>
										
										
										
										
										
																	
													</div>
<?php } } //////////////?>
</div>
												
												
												</ul>
												
											</div>
										</div><!--post-bar end-->

<?php } }
 ?>
										
										<div class="process-comm">
											<div class="spinner">
												<div class="bounce1"></div>
												<div class="bounce2"></div>
												<div class="bounce3"></div>
											</div>
										</div><!--process-comm end-->
									</div><!--posts-section end-->
								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3 pd-right-none no-pd">
								<div class="right-sidebar">
									<div class="widget widget-about">
										  <div class="point-story" style="    padding: 30px;">
										  		<h3 style="font-size: 51px;
    font-weight: bold;
    color: #ff5e00;">5000</h3>
										  		<h4>Orange Points</h4>

										  </div>

										 
									</div><!--widget-about end-->

									<div class="widget widget-about">
										<div class="sd-title">
											<h3>Top Picks on Marketplace</h3>
											 
										</div>
										 
										 <div class="shop-homes1">
										 		<ul>
										 			<li>
										 				<img src="images/shop1.jpg">
										 				<h5> Up to ₦7,000 off  </h5>
										 			</li>

										 			<li>
										 				<img src="images/shop2.jpg">
										 				<h5> Up to 50% off </h5>
										 			</li>

										 			<li>
										 				<img src="images/shop3.jpg">
										 				<h5> Starting ₦399</h5>
										 			</li>

										 			<li>
										 				<img src="images/shop1.jpg">
										 				<h5> Lowest ever prices  </h5>
										 			</li>


										 		</ul>



										 </div>

										<div class="sign_link">
											<h3><a href="" title="">Visit Shop</a></h3> 
										</div>
									</div><!--widget-about end-->
									<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Top Search</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="jobs-list">
											<div class="job-info">
												<div class="shortimg">
													<img src="images/resources/s1.png">
												</div>
												<div class="job-details">
													<h3>Senior Product Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span></span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="shortimg">
													<img src="images/resources/s1.png">
												</div>
												<div class="job-details">
													<h3>Senior UI / UX Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span></span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="shortimg">
													<img src="images/resources/s1.png">
												</div>
												<div class="job-details">
													<h3>Junior Seo Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span></span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="shortimg">
													<img src="images/resources/s1.png">
												</div>
												<div class="job-details">
													<h3>Senior PHP Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span></span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="shortimg">
													<img src="images/resources/s1.png">
												</div>
												<div class="job-details">
													<h3>Senior Developer Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span></span>
												</div>
											</div><!--job-info end-->
										</div><!--jobs-list end-->
									</div><!--widget-jobs end-->

									<div class="widget suggestions full-width">
										<div class="sd-title">
											<h3>Most Viewed People</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
											<div class="suggestion-usd">
												<img src="images/resources/s1.png" alt="">
												<div class="sgt-text">
													<h4>Jessica William</h4>
													<span>Graphic Designer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="images/resources/s2.png" alt="">
												<div class="sgt-text">
													<h4>Uduak Umoh</h4>
													<span>PHP Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="images/resources/s3.png" alt="">
												<div class="sgt-text">
													<h4>Poonam</h4>
													<span>Wordpress Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="images/resources/s4.png" alt="">
												<div class="sgt-text">
													<h4>Bill Gates</h4>
													<span>C &amp; C++ Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="images/resources/s5.png" alt="">
												<div class="sgt-text">
													<h4>Jessica William</h4>
													<span>Graphic Designer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="images/resources/s6.png" alt="">
												<div class="sgt-text">
													<h4>Uduak Umoh</h4>
													<span>PHP Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
										</div><!--suggestions-list end-->
									</div>
								</div><!--right-sidebar end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
			
		</main>



<?php include('footer.php') ?>
<script>
function preview_image() 
{
var total_file=document.getElementById("upload_file").files.length;
for(var i=0;i<total_file;i++)
{
	
$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
}
}

//video player

 
var player = videojs('my-video', {
  autoplay: 'muted'
}); 
 

</script>