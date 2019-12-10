<?php include('header.php'); 
include('chksession.php');
						$dbn=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
						?>

    <section class="cover-sec">
	<div class="cover-sec1">
	<?php if(!empty($profilerow['cover_image_id'])){ ?>
	<img src="upload/<?=$profilerow['cover_image_id']?>" alt="" id="coverid">
	<?php }else{ ?>
        <img src="images/resources/company-cover.jpg" alt="" id="coverid">
	<?php } ?>
	</div>
		<label class="btn btn-primary" style="position:absolute; right:10%; bottom:10%;">
			<input type="file" style="display:none;" id="file2" name="file2"/>
			Browse
		</label>
    </section>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <?php if($profilerow['image_id']=='' and empty($profilerow['image_id'])){ ?>
                                            <img src="images/resources/user.png" id="rmvid" alt="">
                                            <?php }else{?>
                                                <img src="upload/<?=$profilerow['image_id']?>" id="rmvid" alt="">
                                                <?php }?>
												<!-- <input type="file" id="file1">-->
												
                                                    <div class="add-dp" id="OpenImgUpload">
                                                        <input type="file" id="file1">
                                                        <label for="file1"><i class="fas fa-camera"></i></label>
                                                    </div>
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-status">
                                            <li>
                                                <span>Following</span>
                                                <b><?php 
												echo $num=$db->getSingleResult("SELECT * from followers where user_id=".$_SESSION['sess_webid']);
												?></b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b><?php 
												 $num=$db->getSingleResult("SELECT * from followers where follow=".$_SESSION['sess_webid']);
												 if(!empty($num)){ echo $num;}else{ echo "0";}
												?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->
                                    <ul class="social_links">
                                        <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                        <li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-google-plus-square"></i> Http://www.googleplus.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li>
                                    </ul>
                                </div>
                                <!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Following </h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <!--sd-title end-->
                                    <div class="suggestions-list">
									  <?php 
										$dbuf=new DB();
										$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);
										?>
                                        <div class="suggestion-usd">
                                            <?php if(!empty($userfpath)){?>
                                          <img src="upload/<?=$userfpath?>" alt="" height="40" width="40">
                                            <?php }else{ ?>
                                            <img src="images/resources/s2.png" alt=""  height="40" width="40">
                                             <?php }?>
                                            <div class="sgt-text">
                                               <h4><?=$usernamef?></h4>
                                                <span><?=$woorking?></span>
                                            </div>
                                            <!--<span><i class="la la-plus follownew" id="follownew<?=$frow['f_id']?>" fid="<?=$frow['follow']?>"></i></span>-->
                                        </div>
										<?php }} ?>
                                      
									  <div class="view-more">
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div>
                                    <!--suggestions-list end-->
                                </div>
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9">
                            <div class="main-ws-sec profile-lisgn">
                                <div class="user-tab-sec rewivew">
                                    <h3><?=$_SESSION['sess_name']?></h3>
                                    <div class="star-descp">
                                        <span><?=$profilerow['current_company']?>
													</span>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                        <a href="javascript:void(0);" title="">Status</a>
                                    </div>
                                    <!--star-descp end-->
                                    <div class="tab-feed st2 settingjb">
                                        <ul>
                                            <li data-tab="feed-dd" class="active">
                                                <a href="#" title="">
                                                    <img src="images/ic1.png" alt="">
                                                    <span>Feed</span>
                                                </a>
                                            </li>
                                            <li data-tab="info-dd">
                                                <a href="#" title="">
                                                    <img src="images/ic2.png" alt="">
                                                    <span>About </span>
                                                </a>
                                            </li>
                                            <li data-tab="saved-jobs">
                                                <a href="#" title="">
                                                    <img src="images/ic4.png" alt="">
                                                    <span>Following</span>
                                                </a>
                                            </li>
                                            <li data-tab="my-bids">
                                                <a href="#" title="">
                                                    <img src="images/ic5.png" alt="">
                                                    <span>follower</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd">
                                                <a href="#" title="">
                                                    <img src="images/ic3.png" alt="">
                                                    <span>Photo</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <!-- tab-feed end-->
                                </div>
                                <!--user-tab-sec end-->
                                <div class="product-feed-tab followinglisting" id="saved-jobs">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active  " id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">All Friends</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="profile" aria-selected="false">Following</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#applied" role="tab" aria-controls="applied" aria-selected="false">College</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  " id="cadidates-tab" data-toggle="tab" href="#cadidates" role="tab" aria-controls="contact" aria-selected="false">Current City</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade  show active  " id="mange" role="tabpanel" aria-labelledby="mange-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										//$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										 $sql="SELECT * from all_user where user_id NOT IN ( select follow from followers) ";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										//$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										?>
                                                        <div class="col-md-6">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/s2.png" alt="">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$frow['first_name']?></h3>
                                                                                        <div class="epi-sec epi2">
                                                                                            <ul class="descp descptab bklink">
                                                                                                <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="job_descp noborder">

                                                                        <div class="devepbtn appliedinfo noreply">
                                                    <a class="clrbtn follownew" id="follownew<?=$frow['user_id']?>" fid="<?=$frow['user_id']?>" href="javascript:void(0);" >follow</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php }}else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>"; }?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										//$sql="SELECT * from all_user where user_id IN ( select follow from followers) ";
										$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										$db->query($sql);
										 //$sql="SELECT * from followers where user_id IN(SELECT follow from user_profile where work='".$profilerow['work']."')";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);
										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['follow']);
										//if($woorking==$profilerow['work']){
										?>
                                                        <div class="col-md-6" id="hide<?=$frow['f_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/s2.png" alt="">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$usernamef?></h3>
                                                                                        <div class="epi-sec epi2">
                                                                                            <ul class="descp descptab bklink">
                                                                                               <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="job_descp noborder">

                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="follownew1<?=$frow['f_id']?>" fid="<?=$frow['f_id']?>" href="javascript:void(0);"> Unfollow</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
														<?php }?>
<?php }else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                                        
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										//$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										$sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where college='".$profilerow['college']."')";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										$college=$dbuf->getSingleResult('select college from user_profile where user_id='.$frow['follow']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['follow']);
										
										?>
                                                        <div class="col-md-6" id="hide<?=$frow['f_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/s2.png" alt="">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$usernamef?></h3>
                                                                                        <div class="epi-sec epi2">
                                                                                            <ul class="descp descptab bklink">
                                                                                                <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="job_descp noborder">

                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="follownew<?=$frow['f_id']?>"   fid="<?=$frow['f_id']?>" href="javascript:void(0);"> Unfollow</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php }?>
														<?php }else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										//$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										 $sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where current_city='".$profilerow['current_city']."')";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['follow']);
//if($currentcity==$profilerow['current_city']){
										?>
                                                        <div class="col-md-6" id="hide<?=$frow['f_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/s2.png" alt="">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$usernamef?></h3>
                                                                                        <div class="epi-sec epi2">
                                                                                            <ul class="descp descptab bklink">
          <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="job_descp noborder">

                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="<?=$frow['f_id']?>" fid="<?=$frow['f_id']?>" href="javascript:void(0);"> Unfollow</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
														<?php }?>
<?php }else{  echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                                        
                                            </div>

                                        </div>
                                    </div>
                                </div>
 <div class="product-feed-tab current " id="feed-dd">

									
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
													<img src="images/resources/user.png" alt="">
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
														<?php if($_SESSION['sess_webid']==$row['user_id']){?>
														<li><a href="javascript:void(0);" class="deletepost" id="deletepost" title="" delpost="<?=$row['post_id']?>" >Delete</a></li>
														<?php } ?>
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
												<!--<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-share"></i></a></li>
													
												</ul>-->
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
														<a href="javascript:void(0)" class="like2" id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Un Like</a>
											<?php }else{?>	
											<a href="javascript:void(0)" class="like2" id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Like</a>
											
											<?php }?>
														<img src="images/liked-img.png" alt="">
														<span><?=$lcount?></span>
													</li> 
													<li><a href="javascript:void(0)" class="com" cid="<?=$row['post_id']?>"><i class="fas fa-comment-alt"></i> Comment <?=$ccount?></a></li>
													<?php 
												 $ext = pathinfo($row['allpath'], PATHINFO_EXTENSION);
												 if($ext=='mp4' or $ext=='webm'){?>
													<li class="pull-right">
														<a href="#"><i class="fas fa-eye"></i>Views 50</a>
													</li>
												 <?php }?>
												 
												
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
	                              <!--main-ws-sec end-->

                            </div>
                            <!--product-feed-tab end-->

                            <div class="product-feed-tab followinglisting" id="my-bids">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active  " id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">All Friends</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="profile" aria-selected="false">Work</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#applied" role="tab" aria-controls="applied" aria-selected="false">College</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  " id="cadidates-tab" data-toggle="tab" href="#cadidates" role="tab" aria-controls="contact" aria-selected="false">Current City</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade   " id="mange" role="tabpanel" aria-labelledby="mange-tab">
                                        <div class="row">
                                            <?php ////////follower All Friends//////////?>
                                                <?php 
										$dbuf=new DB();
										 $sql="SELECT * from followers where follow=".$_SESSION['sess_webid'];
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										
										?>
                                                    <div class="col-md-6">
                                                        <div class="post-bar">
                                                            <div class="post_topbar applied-post">
                                                                <div class="usy-dt">
                                                                    <?php if(!empty($userfpath)){?>
                                                                        <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                        <?php }else{ ?>
                                                                            <img src="images/resources/s2.png" alt="">
                                                                            <?php }?>
                                                                                <div class="usy-name">
                                                                                    <h3><?=$usernamef?></h3>
                                                                                    <div class="epi-sec epi2">
                                                                                        <ul class="descp descptab bklink">
                                                                                            <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                </div>
                                                                <div class="job_descp noborder">

                                                                    <div class="devepbtn appliedinfo noreply">
                                                                        <a class="clrbtn follownew" id="follownew<?=$frow['f_id']?>" fid="<?=$frow['follow']?>" href="javascript:void(0);"> Follow</a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
											
                                                    <?php }}else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
                                        <div class="row">
                                            <?php ////////follower All Friends//////////?>
                                                <?php 
										$dbuf=new DB();
									     $sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where work='".$profilerow['work']."')";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										?>
                                                    <div class="col-md-6">
                                                        <div class="post-bar">
                                                            <div class="post_topbar applied-post">
                                                                <div class="usy-dt">
                                                                    <?php if(!empty($userfpath)){?>
                                                                        <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                        <?php }else{ ?>
                                                                            <img src="images/resources/s2.png" alt="">
                                                                            <?php }?>
                                                                                <div class="usy-name">
                                                                                    <h3><?=$usernamef?></h3>
                                                                                    <div class="epi-sec epi2">
                                                                                        <ul class="descp descptab bklink">
                                                                                           <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                </div>
                                                                <div class="job_descp noborder">

                                                                    <div class="devepbtn appliedinfo noreply">
                                                                        <a class="clrbtn follownew"  id="follownew<?=$frow['f_id']?>" fid="<?=$frow['follow']?>" href="javascript:void(0);"> Follow</a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <?php }}else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>"; }?>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">

                                        <div class="row">
                                            <?php ////////follower All Friends//////////?>
                                                <?php 
										$dbuf=new DB();
										 $sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where college='".$profilerow['college']."')";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										?>
                                                    <div class="col-md-6">
                                                        <div class="post-bar">
                                                            <div class="post_topbar applied-post">
                                                                <div class="usy-dt">
                                                                    <?php if(!empty($userfpath)){?>
                                                                        <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                        <?php }else{ ?>
                                                                            <img src="images/resources/s2.png" alt="">
                                                                            <?php }?>
                                                                                <div class="usy-name">
                                                                                    <h3><?=$usernamef?></h3>
                                                                                    <div class="epi-sec epi2">
                                                                                        <ul class="descp descptab bklink">
                                                                                           <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                </div>
                                                                <div class="job_descp noborder">

                                                                    <div class="devepbtn appliedinfo noreply">
                                                                        <a class="clrbtn follownew" id="follownew<?=$frow['f_id']?>"  fid="<?=$frow['follow']?>" href="javascript:void(0);"> Follow</a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <?php }}else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade show active" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">
                                        <?php ///////////current city/////////////?>
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										$sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where current_city='".$profilerow['current_city']."')";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										?>
                                                        <div class="col-md-6">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/s2.png" alt="">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$usernamef?></h3>
                                                                                        <div class="epi-sec epi2">
                                                                                            <ul class="descp descptab bklink">
                                                                                                <?php if(!empty($woorking)){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
		  <?php }?>  
		  <?php if(!empty($currentcity)){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
		   <?php }?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="job_descp noborder">

                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew"  id="follownew<?=$frow['f_id']?>" fid="<?=$frow['follow']?>" href="javascript:void(0);"> Follow</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php }}else{echo "<div class='portfolio-gallery-sec'>Result Not Found</div>"; }?>
                                            </div>

                                    </div>
                                </div>
                            </div>
                            <!--product-feed-tab end-->

                            <div class="product-feed-tab" id="info-dd">
                                <div class="user-profile-ov">
                                    <h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                    <p><?php echo $profilerow['about_user'];?></p>
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov st2">
                                    <h3><a href="#" title="" class="exp-bx-open">Experience  <i class="fa fa-plus-square"></i></a></h3>
									<?php  $dbexp=new DB();
									  $sqlexp="select * from user_experience where user_id =".$_SESSION['sess_webid'];
									  $dbexp->query($sqlexp);
									  while($rowexp=$dbexp->fetchArray()){?>
                                    <h4><?=$rowexp['subject']?><a href="#" eid="<?=$rowexp['exp_id']?>" class="exp_open1" title=""><i class="fa fa-pencil"></i></a></h4>
									
                                    <p><?=$rowexp['details']?></p>
									
								  <?php }?>
                                </div>
                                <!--user-profile-ov end-->

                                <div class="user-profile-ov newcontactabout">
                                    <h3>Contact and Basic Info</a>  </h3>
                                    <h4>Contact Information</h4>

                                    <ul class="list-tab-contact">
                                        <li><span class="lable">Mobile Number</span> <span class="details"><?=$profilerow['mobileno']?></span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

                                        <li><span class="lable">Email</span> <span class="details"><?=$alluserrow['email_id']?></span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

                                        <li><span class="lable">Social Links</span> <span class="details"><?=$profilerow['website']?></span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

                                        <li><span class="lable">Birth Date</span> <span class="details"><?=$profilerow['dob']?></span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

                                       <!-- <li><span class="lable">Birth Year</span> <span class="details">1989</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>-->

                                        <li><span class="lable">Gender</span> <span class="details"><?=$profilerow['gender']?></span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

                                        <li><span class="lable">Interested In</span> <span class="details"><?=$profilerow['intrest_in']?></span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

                                    </ul>

                                </div>
                                <!--user-profile-ov end-->

        <div class="user-profile-ov">
		

                                    <h3><a href="#" title="" class="ed-box-open" >Education  <i class="fa fa-plus-square"></i></a></h3>
									<?php  $dbedu=new DB();
									  $sqledu="select * from user_education where user_id =".$_SESSION['sess_webid'];
									  $dbedu->query($sqledu);
									  while($rowedu=$dbedu->fetchArray()){?>
                                    <h4><?=$rowedu['edu_title']?><a href="#" eid="<?=$rowedu['edu_id']?>"  id="educationupdate" title=""><i class="fa fa-pencil"></i></a></h4>
									<span><?=$rowedu['star_year']?> - <?=$rowedu['end_year']?></span>
                                    <p><?=$rowedu['description']?></p>
									
								  <?php }?>
                                   
                                </div>
                                <!--user-profile-ov end-->
								
                                <div class="user-profile-ov">
								

                                    <h3><a href="#" title="" class="lct-box-open" >Location <i class="fa fa-plus-square"></i></a></h3>
                                    <h4><?=$profilerow['current_city']?> <a href="#" title="" class="lct-box-open" ><i class="fa fa-pencil"></i></a></h4>
                                    <p><?=$profilerow['twon']?> </p>
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov">
								
    
                                    <h3><a href="#" title="" class="skills-open">Skills <i class="fa fa-plus-square"></i></a></h3>
                                    <ul>
									<?php  $dbs=new DB();
									  $sqls="select * from skills where user_id =".$_SESSION['sess_webid'];
									  $db->query($sqls);
									  while($rows=$db->fetchArray()){?>
                                        <li><a href="jsvsscript:void(0);" title="" class="skillsdel" delid="<?=$rows['id']?>"><?=$rows['skills']?></a></li>
<?php }?>
                                       <!-- <li><a href="#" title="">PHP</a></li>
                                        <li><a href="#" title="">CSS</a></li>
                                        <li><a href="#" title="">Javascript</a></li>
                                        <li><a href="#" title="">Wordpress</a></li>
                                        <li><a href="#" title="">Photoshop</a></li>
                                        <li><a href="#" title="">Illustrator</a></li>
                                        <li><a href="#" title="">Corel Draw</a></li>-->
                                    </ul>
                                </div>
                                <!--user-profile-ov end-->
                            </div>
                            <!--product-feed-tab end-->

                            <div class="product-feed-tab" id="my-bids">
                                <div class="posts-section">
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="images/resources/user.png" alt="">
                                                <div class="usy-name">
                                                    <h3>John Doe</h3>
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
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                            </ul>
                                            <ul class="bk-links">
                                                <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                            </ul>
                                        </div>
                                        <div class="job_descp">
                                            <h3>Simple Classified Site</h3>
                                            <ul class="job-dt">
                                                <li><span>$300 - $350</span></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                            <ul class="skill-tags">
                                                <li><a href="#" title="">HTML</a></li>
                                                <li><a href="#" title="">PHP</a></li>
                                                <li><a href="#" title="">CSS</a></li>
                                                <li><a href="#" title="">Javascript</a></li>
                                                <li><a href="#" title="">Wordpress</a></li>
                                                <li><a href="#" title="">Photoshop</a></li>
                                                <li><a href="#" title="">Illustrator</a></li>
                                                <li><a href="#" title="">Corel Draw</a></li>
                                            </ul>
                                        </div>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
                                                    <a href="#"><i class="la la-heart"></i> Like</a>
                                                    <img src="images/liked-img.png" alt="">
                                                    <span>25</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a>
                                                </li>
                                            </ul>
                                            <a><i class="la la-eye"></i>Views 50</a>
                                        </div>
                                    </div>
                                    <!--post-bar end-->
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="images/resources/user.png" alt="">
                                                <div class="usy-name">
                                                    <h3>John Doe</h3>
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
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                            </ul>
                                            <ul class="bk-links">
                                                <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                            </ul>
                                        </div>
                                        <div class="job_descp">
                                            <h3>Ios Shopping mobile app</h3>
                                            <ul class="job-dt">
                                                <li><span>$300 - $350</span></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                            <ul class="skill-tags">
                                                <li><a href="#" title="">HTML</a></li>
                                                <li><a href="#" title="">PHP</a></li>
                                                <li><a href="#" title="">CSS</a></li>
                                                <li><a href="#" title="">Javascript</a></li>
                                                <li><a href="#" title="">Wordpress</a></li>
                                                <li><a href="#" title="">Photoshop</a></li>
                                                <li><a href="#" title="">Illustrator</a></li>
                                                <li><a href="#" title="">Corel Draw</a></li>
                                            </ul>
                                        </div>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
                                                    <a href="#"><i class="la la-heart"></i> Like</a>
                                                    <img src="images/liked-img.png" alt="">
                                                    <span>25</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a>
                                                </li>
                                            </ul>
                                            <a><i class="la la-eye"></i>Views 50</a>
                                        </div>
                                    </div>
                                    <!--post-bar end-->
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="images/resources/user.png" alt="">
                                                <div class="usy-name">
                                                    <h3>John Doe</h3>
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
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                            </ul>
                                            <ul class="bk-links">
                                                <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                            </ul>
                                        </div>
                                        <div class="job_descp">
                                            <h3>Simple Classified Site</h3>
                                            <ul class="job-dt">
                                                <li><span>$300 - $350</span></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                            <ul class="skill-tags">
                                                <li><a href="#" title="">HTML</a></li>
                                                <li><a href="#" title="">PHP</a></li>
                                                <li><a href="#" title="">CSS</a></li>
                                                <li><a href="#" title="">Javascript</a></li>
                                                <li><a href="#" title="">Wordpress</a></li>
                                                <li><a href="#" title="">Photoshop</a></li>
                                                <li><a href="#" title="">Illustrator</a></li>
                                                <li><a href="#" title="">Corel Draw</a></li>
                                            </ul>
                                        </div>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
                                                    <a href="#"><i class="la la-heart"></i> Like</a>
                                                    <img src="images/liked-img.png" alt="">
                                                    <span>25</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a>
                                                </li>
                                            </ul>
                                            <a><i class="la la-eye"></i>Views 50</a>
                                        </div>
                                    </div>
                                    <!--post-bar end-->
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="images/resources/user.png" alt="">
                                                <div class="usy-name">
                                                    <h3>John Doe</h3>
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
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                            </ul>
                                            <ul class="bk-links">
                                                <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                            </ul>
                                        </div>
                                        <div class="job_descp">
                                            <h3>Ios Shopping mobile app</h3>
                                            <ul class="job-dt">
                                                <li><span>$300 - $350</span></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                            <ul class="skill-tags">
                                                <li><a href="#" title="">HTML</a></li>
                                                <li><a href="#" title="">PHP</a></li>
                                                <li><a href="#" title="">CSS</a></li>
                                                <li><a href="#" title="">Javascript</a></li>
                                                <li><a href="#" title="">Wordpress</a></li>
                                                <li><a href="#" title="">Photoshop</a></li>
                                                <li><a href="#" title="">Illustrator</a></li>
                                                <li><a href="#" title="">Corel Draw</a></li>
                                            </ul>
                                        </div>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
                                                    <a href="#"><i class="la la-heart"></i> Like</a>
                                                    <img src="images/liked-img.png" alt="">
                                                    <span>25</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a>
                                                </li>
                                            </ul>
                                            <a><i class="la la-eye"></i>Views 50</a>
                                        </div>
                                    </div>
                                    <!--post-bar end-->
                                    <div class="process-comm">
                                        <a href="#" title=""><img src="images/process-icon.png" alt=""></a>
                                    </div>
                                    <!--process-comm end-->
                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="portfolio-dd">
                                <div class="portfolio-gallery-sec">
                                    <h3>Gallery</h3>
                                    <div class="portfolio-btn">
                                        <a href="#" title=""><i class="fas fa-plus-square"></i> Add Gallery</a>
                                    </div>
                                    <div class="gallery_pf">
                                        <div class="row">
										<?php
										$sql="SELECT * from user_post where post_hide='0' order by post_id desc limit 0,5";
										$db->query($sql);
										if($db->numRows()>0)
										{
										while($row=$db->fetchArray()){
										if(!empty($row['allpath'])){
										$path=explode(',',$row['allpath']);
										$count=count($path);
										for($i=0;$i<=$count; $i++){
										?>
										
                                           <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                <div class="gallery_pt">
                                                    <img src="<?=$path[$i]?>" alt="">
                                                    <a href="#" title=""><img src="<?=$path[$i]?>" alt=""></a>
                                                </div>
                                                
                                            </div><!--gallery_pt end-->
											
										<?php }}

										}}	
										$dbg=new DB();
										$sqlg="SELECT * from user_image where user_id=".$_SESSION['sess_webid'];
										$dbg->query($sqlg);
										if($dbg->numRows()>0)
										{
										 while($grow=$dbg->fetchArray()){
										?>
											 <div class="col-lg-4 col-md-4 col-sm-6 col-6">
											 <div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														
														
														<li><a href="javascript:void(0);" class="gallerydel" id="gallerydel" title="" delidg="<?=$grow['img_id']?>" >Delete</a></li>
													</ul>
												</div>
											
                                                <div class="gallery_pt">
												<h3><?=$grow['gallery_name']?></h3>
                                                    <img src="<?=$grow['imgpath']?>" alt="<?=$grow['gallery_name']?>">
                                                    <a href="#" title="" class="gallerydel" delidg="<?=$grow['img_id']?>"><img src="<?=$grow['imgpath']?>" alt="<?=$grow['gallery_name']?>"></a>
                                                </div>
                                                <!--gallery_pt end-->
                                            </div>
										<?php }} ?>
											
                                         </div>
                                    </div>
                                    <!--gallery_pf end-->
                                </div>
                                <!--portfolio-gallery-sec end-->
                            </div>
                            <!--product-feed-tab end-->

                        </div>
                        <!--main-ws-sec end-->
                    </div>

                </div>
            </div>
            <!-- main-section-data end-->
        </div>
        </div>
    </main>
	
	<div class="overview-box" id="overview-box">
        <div class="overview-edit">
            <h3>Overview</h3>
            <span>5000 character left</span>
            <form id="formoverview" method="post">
                <textarea name="overview" id="overview"><?=$profilerow['about_user']?></textarea>
                <button type="submit" class="save" id="overviewsave">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->
	
	<div class="overview-box" id="location-box">
        <div class="overview-edit">
            <h3>Location</h3>
             <form name="locationform" id="locationform" method="post">
                <div class="datefm">
				<div class="form-group">
														<label>Current Lives *</label>
														<input type="text" name="current_city" id="current_city" class="form-control1" value="<?=$profilerow['current_city']?>" required />

													</div>
                   <!-- <select>
                        <option>Country</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="england">England</option>
                        <option value="india">India</option>
                        <option value="usa">United Sates</option>
                    </select>
                    <i class="fa fa-globe"></i>-->
                </div>
                <div class="datefm">
				<label>Hometown *</label>
														<input type="text" class="form-control1" name="hometown" id="hometown" required value="<?=$profilerow['twon']?>"/>
                   <!-- <select>
                        <option>City</option>
                        <option value="london">London</option>
                        <option value="new-york">New York</option>
                        <option value="sydney">Sydney</option>
                        <option value="chicago">Chicago</option>
                    </select>
                    <i class="fa fa-map-marker"></i>-->
                </div>
                <button type="submit" class="save" id="savelocation">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->
	
	<div class="overview-box" id="skills-box">
        <div class="overview-edit">
            <h3>Skills</h3>
             <form name="" id="" method="post">
                <input type="text" name="skills" id="skills" placeholder="Skills">
                <button type="submit" name="" id="skillssave" class="save">Save</button>
                <!--<button type="submit" class="save-add">Save & Add More</button>-->
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->
	
    <div class="overview-box" id="education-box">
        <div class="overview-edit">
            <h3>Education</h3>
            
            <form id="educationinfoform" method="post">
                <input type="text" name="school" placeholder="School / University">
                <div class="datepicky">
                    <div class="row">
                        <div class="col-lg-6 no-left-pd">
                            <div class="datefm">
                                <input type="text" name="from" placeholder="From 2010" >
                               
                            </div>
                        </div>
                        <div class="col-lg-6 no-righ-pd">
                            <div class="datefm">
                                <input type="text" name="to" placeholder="To 2012">
                               <!-- <i class="fa fa-calendar"></i>-->
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" name="degree" placeholder="Degree">
                <textarea name="description" placeholder="Description"></textarea>
                <button type="button" name="educationsave" id="educationsave" class="save">Save</button>
                <!--<button type="submit" class="save-add">Save & Add More</button>-->
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->



    <div class="overview-box" id="education-box1">
        <div class="overview-edit">
            <h3>Education1</h3>
            
            <form id="educationinfoform" method="post">
                <input type="text" name="school" placeholder="School / University">
                <div class="datepicky">
                    <div class="row">
                        <div class="col-lg-6 no-left-pd">
                            <div class="datefm">
                                <input type="text" name="from" placeholder="From 2010" >
                               
                            </div>
                        </div>
                        <div class="col-lg-6 no-righ-pd">
                            <div class="datefm">
                                <input type="text" name="to" placeholder="To 2012">
                               <!-- <i class="fa fa-calendar"></i>-->
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" name="degree" placeholder="Degree">
                <textarea name="description" placeholder="Description"></textarea>
                <button type="submit" name="educationsave" id="Educationsave" class="save">Save</button>
                <!--<button type="submit" class="save-add">Save & Add More</button>-->
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="ed-box">
        <div class="overview-edit">
            <h3>Experience</h3>
            <form id="formexp" method="post">
                <input type="text" name="subject" id="subject" placeholder="Subject">
                <textarea name="exp" id="exp"></textarea>
                <button type="submit" id="expsave" class="save">Save</button>
                <!--<button type="submit" class="save-add">Save & Add More</button>-->
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->
	
	
	<div class="overview-box" id="ed-box1">
        
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="contact-box">
        <div class="overview-edit">
            <h3>Contact Info</h3>
           <form id="contactinfoform" method="post">

                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <input type="text" name="mobileno" placeholder="Mobile Number" value="<?=$profilerow['mobileno']?>">
                    </div>
                    <div class="col-lg-6 no-righ-pd">
                        <input type="Email" name="uemail" placeholder="Email" value="<?=$alluserrow['email_id']?>" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <input type="text" name="website" placeholder="Social Links" value="<?=$profilerow['website']?>">
                    </div><!--class="datepicker"-->
                    <div class="col-lg-6 no-righ-pd">
                        <div class="datefm">
                            <input type="date" name="dob" placeholder="Date of birthday"  value="<?=$profilerow['dob']?>">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <select name="gender">
                            <option >Gender</option>
                            <option value="Male" <?php if($profilerow['gender']=='Male'){echo 'selected';}?>>Male</option>
                            <option value="Female" <?php if($profilerow['gender']=='Female'){echo 'selected';}?>>Female</option>
                        </select>
                    </div>
                    <div class="col-lg-6 no-righ-pd">
                        <select name="interested">
                            <option>Interested In</option>
                            <option value="Male" <?php if($profilerow['intrest_in']=='Male'){echo 'selected';}?>>Male</option>
                            <option value="Female" <?php if($profilerow['intrest_in']=='Female'){echo 'selected';}?>>Female</option>
                            <option value="Male & Female" <?php if($profilerow['intrest_in']=='Male'){echo 'selected';}?>>Male & Female</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="save" id="coninfosave">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
   
    <div class="overview-box" id="experience-box">
        <div class="overview-edit">
            <h3>Experience</h3>
            <form id="formexp" method="post">
                <input type="text" name="subject2" id="subject2" placeholder="Subject">
                <textarea name="exp2" id="exp2"></textarea>
                <button type="submit" id="expsave" class="save">Save</button>
                <!--<button type="submit" class="save-add">Save & Add More</button>-->
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->


    <div class="overview-box" id="create-portfolio">
        <div class="overview-edit">
            <h3>Create Gallery</h3>
            <form enctype="multipart/form-data" id="gallery" name="gallery" method="post">
                <input type="text" name="galleryname" id="galleryname" placeholder="Gallery Name">
				 <!-- <input type="file" id="upload_file2" name="upload_file2[]"  multiple>-->
               <div class="file-submit">
                    <input type="file" id="upload_file2" name="upload_file2[]"  multiple>
                    <label for="upload_file2">Choose File</label>
                </div>
				<input type="hidden" id="imgid" value="" />
                <!--<div class="pf-img" id="show">
                    <img src="images/resources/np.png" alt="">
                </div>-->
              
                <button type="submit" class="save" id="gallerysave">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <?php include('footer.php') ?>