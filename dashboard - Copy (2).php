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
												<span>Graphic Designer at Self Employed</span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li>
												<a href="javascript:void(0)" id="follow"><h4>Following</h4></a>
												<span><?php 
												echo $num=$db->getSingleResult("SELECT * from followers where user_id=".$_SESSION['sess_webid']);
												?></span>
											</li>
											<li>
												<h4>Followers</h4>
												<span><?php 
												echo $num=$db->getSingleResult("SELECT * from followers where follow=".$_SESSION['sess_webid']);
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
<form  method="post" id="uploadForm" enctype="multipart/form-data">
									<div class="post-topbar newpost1">
										<h3>Create Post</h3>
										<div class="user-picy">
										<?php if(empty($userspath)){?>
											<img src="images/resources/user-pic.png" alt="">
										<?php }else{ ?>
										<img src="upload/<?=$userspath?>" alt="" width="50" height="50" style="border-radius: 50%;">
										<?php }?>
										</div>
										<div class="post-st">
											 <textarea cols="5" rows="4" placeholder="Write Somethin..." name="postid" id="postid"></textarea>
										</div>
										<div class="post-img-list">
											<div id="image_preview"></div>
										</div>
										<div class="Feelingpst">
											<ul>
												<li class="select-fee-select">
													<select>
														<option>Feeling</option>
														<option>Celebriting</option>
													</select>
												</li>
				<li class="feeling-input">
				<p class="lead emoji-picker-container">
              <input type="text" class="form-control" placeholder="what are you feeling..." data-emojiable="true" name="feeling">

            </p>
			
	<script src="lib/js/config.js"></script>
    <script src="lib/js/util.js"></script>
    <script src="lib/js/jquery.emojiarea.js"></script>
    <script src="lib/js/emoji-picker.js"></script>
	<script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: 'lib/img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
													<!--<input type="text" id="feeling" name="feeling" placeholder="what are you feeling..." name="">-->
												</li>
											</ul>
										</div>
										<div class="postoptions">
											<ul>
												<li>
														<label>
															<img src="images/gallery.png">Photo/ Video	
															<input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple>
														</label>
														<input type="hidden" name="imgid" id="imgid" value=""/>
													</li>

													<li>
														<a>
															<img src="images/users.png">Tag Friends	
															 
														</a>
													</li>

													<li>
														<a>
															<img src="images/emo.png">Feeling/Activity	
															 
														</a>
													</li>

													<li>
														<a>
															<img src="images/record.png">Live Video	
															 
														</a>
													</li>

											</ul>
 
										</div>
										<div class="post-st text-right">
											<ul>
												 
												<li><!--<a class="active"  href="#" title="">Post Status</a>-->
												<button type="submit" id="uploadpost" value="Post-Status" class="active">Post Status</button>
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
$sql="SELECT * from user_post order by post_id desc limit 0,5";
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
													<li><img src="images/icon8.png" alt=""><span><?=$userrow['current_company']?></span></li>
													<li><img src="images/icon9.png" alt=""><span><?=$userrow['current_city']?></span></li>
												</ul>
												<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
												</ul>
											</div>
											<div class="job_descp">
												<h3><?=$row['postemos']?></h3>
												 
												<p><?=$row['post_details']?></p>
												<?php 
												 $ext = pathinfo($row['allpath'], PATHINFO_EXTENSION);
												 if($ext=='mp4' or $ext=='webm'){?>
												 <video id='my-video' class='video-js' controls preload='auto'  poster='images/oceans.png' data-setup='{}'>
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
														<a href="javascript:void(0)" class="like2" id="like2" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Like</a>
														<img src="images/liked-img.png" alt="">
														<span><?=$lcount?></span>
													</li> 
													<li><a href="javascript:void(0)" class="com" cid="<?=$row['post_id']?>"><i class="fas fa-comment-alt"></i> Comment <?=$ccount?></a></li>
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
													<form id="commentForm" method="post">
													<input type="hidden" name="pid" id="pid" value="<?=$row['post_id']?>">
													<input type="hidden" name="uid" id="uid" value="<?=$row['user_id']?>" >
													
													<input type="hidden" name="cimage" id="cimage" value="" >
													
													<input type="file" id="cimageupload" name="cimageupload" >
													
													<p class="lead emoji-picker-container">
													<input type="text"  placeholder="Post a comment" name="postcomment" data-emojiable="true" id="postcomment"></p>
													<button type="submit" name="commentid" id="commentid">Send</button>
														</form>
													</div>
												</div>
												</div>
												<div id="showcomment">
												</div>
												<?php //////////////?>
<?php 
$sqlc="SELECT * from comment where post_id=".$row['post_id'];
$dbc->query($sqlc);
if($dbc->numRows()>0)
{
while($rowc=$dbc->fetchArray()){
$username=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowc['user_id']);

$pimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	

	?>
												<div class="comment">
																	<h3><?=$username?></h3>
																	<span><!--<img src="images/clock.png" alt=""> -->
											<?php if(!empty($pimage)){ ?>																	
											<img src="upload/<?=$pimage?>" alt="" height="40" width="40"><?php }else{ ?>
											<img src="images/clock.png" alt="">
											<?php }?>
																	<?php echo timeago($rowc['cdate']);?>   </span>
																	<?php if(!empty($rowc['cimage'])){ ?>
																	<img src="upload/<?=$rowc['cimage']?>" height="50" width="50"/><?php }?>
																	<p><?=$rowc['comment']?> </p>
																	<a href="javascript:void(0)" title="" class="active" id="replyiddiv" cid="<?=$rowc['c_id']?>"><i class="fa fa-reply-all"></i>Reply</a>
										<?php //////Add Reply/ user image////////?>
										<div id="replydisplay<?=$rowc['c_id']?>" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">
														<img src="upload/<?=$userimage?>" alt="">
													</div>
													<div class="comment_box">
													<form id="replyForm" method="post">
													<input type="hidden" name="pid" id="pid" value="<?=$rowc['post_id']?>">
													<input type="hidden" name="uid" id="uid" value="<?=$rowc['user_id']?>" >
													<input type="hidden" name="cid" id="cid" value="<?=$rowc['c_id']?>" >
													<input type="hidden" name="rimage" id="rimage" value="" >
													
													<input type="file" id="rimageupload" name="rimageupload" >
													<p class="lead emoji-picker-container">
													<input type="text"  placeholder="Reply on comment" name="rpostcomment" id="rpostcomment" data-emojiable="true">
													</p>
													<button type="submit" name="replyid" id="replyid">Send</button>
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
																	<h3><?=$username1?></h3>
																	<span><!--<img src="images/clock.png" alt=""> -->
																	<?php if(!empty($rpimage)){ ?>
																	<img src="upload/<?=$rpimage?>" alt=""> 
																	<?php }else{?>
																	<img src="images/clock.png" alt="">
																	<?php }?>
																	<?php echo timeago($rowr['rdate']);?> </span>
																	
																	<?php if(!empty($rowr['rimage'])){ ?>
																	<img src="upload/<?=$rowr['rimage']?>" height="50" width="50"/><?php }?>
																	<p><?=$rowr['r_comment']?> </p>
																	</div>
										
<?php }} ///////////////?>
										
										
										
										
										
																	
													</div>
<?php } } //////////////?>
												
												
												</ul>
												<a href="#"><i class="fas fa-eye"></i>Views 50</a>
											</div>
										</div><!--post-bar end-->

<?php } }
 ?>
										<div class="top-profiles">
											<div class="pf-hd">
												<h3>Top Profiles</h3>
												<i class="la la-ellipsis-v"></i>
											</div>
											<div class="profiles-slider">
												<div class="user-profy">
													<img src="images/resources/user1.png" alt="">
													<h3>Uduak Umoh</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="followw">Follow</a></li>
														<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
														
													</ul>
													<a href="#" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="images/resources/user2.png" alt="">
													<h3>Uduak Umoh</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="followw">Follow</a></li>
														<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
														
													</ul>
													<a href="#" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="images/resources/user3.png" alt="">
													<h3>Uduak Umoh</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="followw">Follow</a></li>
														<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
														
													</ul>
													<a href="#" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="images/resources/user1.png" alt="">
													<h3>Uduak Umoh</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="followw">Follow</a></li>
														<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
														
													</ul>
													<a href="#" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="images/resources/user2.png" alt="">
													<h3>Uduak Umoh</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="followw">Follow</a></li>
														<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
														
													</ul>
													<a href="#" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="images/resources/user3.png" alt="">
													<h3>Uduak Umoh</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="followw">Follow</a></li>
														<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
														
													</ul>
													<a href="#" title="">View Profile</a>
												</div><!--user-profy end-->
											</div><!--profiles-slider end-->
										</div><!--top-profiles end-->

<?php
 $sql="SELECT * FROM user_post WHERE user_id IN (SELECT user_id FROM all_user WHERE user_id ='".$_SESSION['sess_webid']."');";
$db->query($sql);
if($db->numRows()>0)
{
while($row=$db->fetchArray()){?>
	


 
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<img src="images/resources/us-pic.png" alt="">
													<div class="usy-name">
														<h3>Uduak Umoh</h3>
														<span><img src="images/clock.png" alt="">3 min ago</span>
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
													<li><img src="images/icon8.png" alt=""><span>Webz Engine</span></li>
													<li><img src="images/icon9.png" alt=""><span>India</span></li>
												</ul>
												<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
												</ul>
											</div>
											<div class="job_descp">
												<h3>Red Sea Fight Night is LIVE NOW</h3>
												 
												<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using ...</p>

												<!-- video link -->

												<video id='my-video' class='video-js' controls preload='auto'  poster='images/oceans.png' data-setup='{}'>
													<source src='images/oceans.mp4' type='video/mp4'>
													<source src='images/oceans.webm' type='video/webm'>
													<p class='vjs-no-js'>
												      To view this video please enable JavaScript, and consider upgrading to a web browser that
												      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
												    </p>
												  </video>

												<!-- video link -->

												
											</div>
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														<a href="#"><i class="fas fa-heart"></i> Like</a>
														<img src="images/liked-img.png" alt="">
														<span>25</span>
													</li> 
													<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
												</ul>
												<a href="#"><i class="fas fa-eye"></i>Views 50</a>
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
											<h3><a href="sign-in.html" title="">Visit Shop</a></h3> 
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