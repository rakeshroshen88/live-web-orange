<?php include('header.php'); 
include('chksession.php');
if(!empty($_SESSION['com_webid'])){
	$cid=$_SESSION['com_webid'];
}else{
	$cid=$_REQUEST['comid'];
}
						$dbn=new DB();
						$sqln="select * from $_TBL_COMPANY where com_id =".$cid;
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();						
						$uid=$profilerow['user_id'];

						?>

    <section class="cover-sec">
        <div class="cover-sec1">
            <?php if(!empty($profilerow['cover_image_id'])){ ?>
                <img src="upload/<?=$profilerow['cover_image_id']?>" alt="" id="coverid">
                <?php }else{ ?>
                    <img src="images/resources/company-cover.jpg" alt="" id="coverid">
                    <?php } ?>
        </div>
        <?php if($_SESSION['sess_webid']==$uid){?>
            <label class="btn btn-primary" style="position:absolute; right:10%; bottom:10%;">
                <input type="file" id="file55" style="display:none;">
                <!--<input type="file" style="display:none;" id="file4" name="file4" /> -->Browse
            </label>
            <?php }?>
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
                                        <?php if($profilerow['imgid']=='' and empty($profilerow['imgid'])){ ?>
                                            <img src="images/resources/user.png" id="rmvid" alt="" style="width: 200px; height:200px;">
                                            <?php }else{?>
                                                <img src="upload/<?=$profilerow['imgid']?>" id="rmvid" alt="" style="width: 200px; height:200px;">
                                                <?php }?>
                                                    <!-- <input type="file" id="file1">-->
                                                    <?php if($_SESSION['sess_webid']==$uid){?>
                                                        <div class="add-dp" id="OpenImgUpload">
                                                            <input type="file" id="file3">
                                                            <label for="file3"><i class="fas fa-camera"></i></label>
                                                        </div>
                                                        <?php } ?>
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-status">

                                            <li>
                                                <span>Followers</span>
                                                <b><?php 
												 $num=$db->getSingleResult("SELECT * from followers where follow=".$cid);
												 if(!empty($num)){ echo $num;}else{ echo "0";}
												?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->
                                    <ul class="social_links MyList">

                                        <li data-tab="feed-dd"><a href="javascript:void(0);" title=""><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                        <li data-tab="services"><a href="javascript:void(0);" title=""><i class="fa fa-cogs" aria-hidden="true"></i>Services</a></li>
                                        <li data-tab="review"><a href="javascript:void(0);" title=""><i class="fa fa-eye" aria-hidden="true"></i>Reviews</a></li>
                                        <li data-tab="portfolio-dd"><a href="javascript:void(0);" title="" class="animated fadeIn active" data-tab="portfolio-dd"><i class="fa fa-picture-o" aria-hidden="true"></i>Photos</a></li>
                                        <li data-tab="my-bids"><a href="javascript:void(0);" title=""><i class="la la-globe"></i>Contacts</a></li>
                                        <li data-tab="info-dd"><a href="javascript:void(0);" title=""><i class="fa fa-user" aria-hidden="true"></i></i>About</a></li>

                                    </ul>
                                </div>

                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec rewivew">
                                    <h3><?=$profilerow['page_name']?></h3>
                                    <?php if(!empty($profilerow['establish'])){?>
                                        <div class="star-descp">
                                            <span>Established Since<?=$profilerow['establish']?>
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
                                        <?php } ?>
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
                                                            <span>Followers </span>
                                                        </a>
                                                    </li>

                                                    <li data-tab="portfolio-dd">
                                                        <a href="#" title="">
                                                            <img src="images/ic3.png" alt="">
                                                            <span>Photo</span>
                                                        </a>
                                                    </li>

                                                    <li data-tab="services">
                                                        <a href="#" title="">
                                                            <img src="images/ic5.png" alt="">
                                                            <span>Services</span>
                                                        </a>
                                                    </li>
                                                    <li data-tab="review">
                                                        <a href="#" title="">
                                                            <img src="images/ic5.png" alt="">
                                                            <span>Reviews</span>
                                                        </a>
                                                    </li>

                                                    <li data-tab="my-bids">
                                                        <a href="#" title="">
                                                            <img src="images/ic5.png" alt="">
                                                            <span>Contact Us</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <!-- tab-feed end-->
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 no-left-pd">
                                        <?php ///////////////////////////////////?>
                                            <style>
                                                #container {
                                                    margin: 0;
                                                    padding: 0;
                                                    width: 100%;
                                                    margin-top: 0;
                                                    float: left;
                                                }
                                                
                                                #contentbox {
                                                    width: 100%;
                                                    border: 1px solid #d2dbe3;
                                                    font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 14px;
                                                    margin-bottom: 6px;
                                                    text-align: left;
                                                    float: left;
                                                    border-radius: 3px;
                                                    padding: 7px;
                                                }
                                                
                                                #feelingtxtHint select {
                                                    background: #ffe7d9;
                                                    line-height: initial;
                                                    border: none;
                                                    height: 35px;
                                                    border: 1px solid #d2dbe3;
                                                    border-right: none;
                                                    padding: 1px 8px 2px;
                                                }
                                                
                                                .Feelingpst ul {
                                                    display: flex;
                                                }
                                                
                                                #msgbox {
                                                    border: solid 1px #dedede;
                                                    padding: 5px;
                                                    display: none;
                                                    background-color: #f2f2f2
                                                }
                                                
                                                #display {
                                                    display: none;
                                                    border-left: solid 1px #dedede;
                                                    border-right: solid 1px #dedede;
                                                    border-bottom: solid 1px #dedede;
                                                    overflow: hidden;
                                                }
                                                
                                                .display_box {
                                                    padding: 4px;
                                                    border-top: solid 1px #dedede;
                                                    font-size: 12px;
                                                    height: 40px;
                                                }
                                                
                                                .display_box:hover {
                                                    background: #3b5998;
                                                    color: #FFFFFF;
                                                }
                                                
                                                .image {
                                                    width: 25px;
                                                    float: left;
                                                    margin-right: 6px
                                                }
                                            </style>
                                            <style type="text/css">
                                                .newpost1 {}
                                                
                                                .newpost1 {}
                                                
                                                .newpost1 .post-st textarea {
                                                    width: 100%;
                                                    border: none;
                                                }
                                                
                                                .newpost1 .post-st {
                                                    width: 87%;
                                                }
                                            </style>
											
											
											
											

            <div class="product-feed-tab current" id="feed-dd">
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											

                                                <?php ////////////////////////?>
                                                    <?php if($_SESSION['sess_webid']==$uid){?>
                                                        <form method="post" id="uploadForm" enctype="multipart/form-data">
                                                            <div class="post-topbar newpost1">
                                                                <h3>Create Post</h3>
                                                                <div class="clreatsot">
                                                                    <div class="user-picy">
                                                                        <?php if(empty($profilerow['imgid'])){?>
                                                                            <img src="images/resources/user.png" alt="" width="60" height="60">
                                                                            <?php }else{ ?>
                                                                                <img src="upload/<?=$profilerow['imgid']?>" alt="" width="50" height="50" style="border-radius: 50%;">
                                                                                <?php }?>
                                                                    </div>

                                                                    <div class="post-st">
                                                                        <textarea cols="5" rows="4" placeholder="Write Somethin..." name="postid" id="postid"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="post-img-list">
                                                                    <div id="image_preview"></div>
                                                                </div>

                                                                <div class="Feelingpst" id="Feelingpst" style="display:none;">
                                                                    <ul>
                                                                        <li class="select-fee-select">
                                                                            <select name="selectfeel" id="selectfeel" class="selectfeel">
                                                                                <option value="">Select Feeling</option>

                                                                                <?php $db1=new DB();

								 $sql1="SELECT * FROM $_TBL_FEELINGC where status='yes'";

								 $db1->query($sql1)or die($db1->error());

								 while($row1=$db1->fetchArray()){

								 $catid=$row1['id'];

								?>

                                                                                    <option value="<?=$catid?>">
                                                                                        <?php echo $row1['catname'];?>
                                                                                    </option>

                                                                                    <?php } ?>

                                                                                        <!--<option value="Celebriting">Celebriting</option>
														<option value="Watching">Watching</option>
														<option value="Eating">Eating</option>
														<option value="Drinking">Drinking</option>
														<option value="Traveling">Traveling to</option>
														<option value="Drinking">Attending</option>-->
                                                                            </select>
                                                                        </li>
                                                                        <div id="feelingtxtHint"></div>
                                                                        <li class="feeling-input">

                                                                            <p class="lead emoji-picker-container">
                                                                                <input type="text" class="form-control emg" placeholder="what are you feeling..." data-emojiable="true" name="feeling">
                                                                            </p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <input type="hidden" name="tagfriends" id="tagfriends" value="" placeholder="Search Friends" />

                                                                <div class="locationdiv" style="display:none">
                                                                    <div class="loctg">
                                                                        at
                                                                    </div>
                                                                    <div class="location-input">
                                                                        <input type="text" name="livelocationinput" id="livelocationinput" class="form-control livelocationinput" placeholder="where are you..?" value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="map_canvas1"></div>
                                                                <div id="container" style="display:none">
                                                                    <div id="contentbox" contenteditable="true">
                                                                    </div>
                                                                    <div id='display'>
                                                                    </div>
                                                                    <div id="msgbox">
                                                                    </div>
                                                                </div>

                                                                <div class="postoptions">
                                                                    <ul>
                                                                        <li>
                                                                            <label>
                                                                                <img src="images/gallery.png">Photo/ Video
                                                                                <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple>
                                                                            </label>
                                                                            <input type="hidden" name="imgid" id="imgid" value="" />
                                                                        </li>

                                                                        <li>
                                                                            <a id="" class="tagshow">
                                                                                <img src="images/users.png">Tag Friends

                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a class="feeling">
                                                                                <img src="images/emo.png">Feeling/Activity

                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a class="livelocation">
                                                                                <img src="images/postloaction.png" alt="new location">

                                                                            </a>
                                                                        </li>

                                                                        <li class="postbtnli">
                                                                            <button type="submit" id="uploadpost" value="Post-Status" class="active postbtn">Post Status</button>
                                                                        </li>

                                                                        <!--<li>
														<a>
															<img src="images/record.png">Live Video	

														</a>
													</li>-->

                                                                    </ul>

                                                                </div>

                                                            </div>
                                                            <input type="hidden" name="pageid" id="pageid" value="<?=$cid?>" />
                                                        </form>

                                                        <div class="posts-section" id="postshow">

                                                        </div>

                                                        <?php } ////////////////////////?>

                                                            <div class="posts-section">

                                                                <?php
$db4=new DB();
$l=array();
$sql4="SELECT user_id from com_like where com_id=".$cid;
$db4->query($sql4);
if($db4->numRows()>0)
{
while($row4=$db4->fetchArray()){
	$l[]=$row4['follow'];
}
}
$allfriend=implode(',',$l);
if(!empty($allfriend)){
$allfriends=$allfriend;
}else{
$allfriends=0;	
}

 $db1=new DB();
 $db2=new DB();
 $dbf=new DB();
$dblike=new DB();
$dbr=new DB();
$dbc=new DB();
$dbu=new DB();
$dbp=new DB();
  // $sqlp="SELECT * from user_post where pageid=".$cid." and FIND_IN_SET(".$_SESSION['sess_webid'].",tagfriends) and user_id='".$_SESSION['sess_webid']."' or user_id IN($allfriends) and post_hide='0'  order by post_id desc";

	   $sqlp="SELECT * from user_post where pageid=".$cid." and post_hide='0'  order by post_id desc";

$dbp->query($sqlp);
if($dbp->numRows()>0)
{
while($row=$dbp->fetchArray()){

//$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	
$sqluser="SELECT * from user_profile where user_id=".$row['user_id'];
$dbu->query($sqluser);
if($dbu->numRows()>0)
{
$userrow=$dbu->fetchArray();
}
$lcount=$dblike->getSingleResult('select count(like_id) from post_like where post_id='.$row['post_id']);
$ccount=$dblike->getSingleResult('select count(c_id) from comment where post_id='.$row['post_id']);
?>
                                                                    <div class="post-bar">
                                                                        <div class="post_topbar">
                                                                            <div class="usy-dt">
                                                                                 <?php if(empty($profilerow['imgid'])){?>
                                                                            <img src="images/resources/user.png" alt="" width="60" height="60">
                                                                            <?php }else{ ?>
                                                                                <img src="upload/<?=$profilerow['imgid']?>" alt="" width="50" height="50" style="border-radius: 50%;">
                                                                                <?php }?>
                                                                                            <div class="usy-name">
                                                                                                <h3><?=$profilerow['page_name']?></h3>
                                                                                                <span><img src="images/clock.png" alt=""><?php echo timeago($row['post_date']);?></span>
                                                                                            </div>
                                                                            </div>
                                                                            <div class="ed-opts">
                                                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                                                <ul class="ed-options">
                                                                                    <?php if($_SESSION['sess_webid']==$row['user_id']){?>
                                                                                        <li><a href="javascript:void(0);" title="" data-toggle="modal" data-target="#myModal<?=$row['post_id']?>" id="editpost" editpostid="<?=$row['post_id']?>">Edit Post</a></li>
                                                                                        <?php } ?>
                                                                                            <li><a href="javascript:void(0);" id="posthide" title="" hidepost="<?=$row['post_id']?>">Hide</a></li>
                                                                                            <?php if($_SESSION['sess_webid']==$row['user_id']){?>
                                                                                                <li><a href="javascript:void(0);" class="deletepost" id="deletepost" title="" delpost="<?=$row['post_id']?>">Delete</a></li>
                                                                                                <?php } ?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div id="show"></div>
                                                                        <div class="epi-sec">
                                                                            <ul class="descp">
                                                                                <?php if(!empty($profilerow['establish'])){?>
                                                                                    <li><img src="images/icon8.png" alt=""><span><?=$profilerow['establish']?></span></li>
                                                                                    <?php } if(!empty($row['livelocation'])){?>
                                                                                        <li><img src="images/icon9.png" alt=""><span><?=$row['livelocation']?></span></li>
                                                                                        <?php }elseif(!empty($row['location'])){?>
                                                                                            <li><img src="images/icon9.png" alt=""><span><?=$userrow['location']?></span></li>
                                                                                            <?php }else{ ?>
                                                                                                <li></li>
                                                                                                <?php }?>
                                                                            </ul>
                                                                            <!--<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-share"></i></a></li>

												</ul>-->
                                                                            <?php /////////////?>
                                                                                <div class="overview-box" id="share-box">
                                                                                    <div class="overview-edit">
                                                                                        <h3>Share Now</h3>
                                                                                        <form id="formexp" method="post">
                                                                                            <input type="text" name="subject" id="subject" placeholder="Subject">
                                                                                            <textarea name="exp" id="exp"></textarea>
                                                                                            <button type="button" id="expsave" class="save">Save</button>
                                                                                            <!--<button type="submit" class="save-add">Save & Add More</button>-->
                                                                                            <button type="submit" class="cancel">Cancel</button>
                                                                                        </form>
                                                                                        <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
                                                                                    </div>
                                                                                    <!--overview-edit end-->
                                                                                </div>
                                                                                <?php /////////////
		$db21=new DB();
		$feelingimgid=$row['feelingimgid'];
		$feelingimgidpath=$db21->getSingleResult('select imgid from '.$_TBL_FEELINGS." where subcatname='".$feelingimgid."'");
		?>
                                                                        </div>
                                                                        <div class="job_descp">
                                                                            <h3 class="font-weight-500"><?php 
												if(!empty($row['post_title'])){
												echo $row['post_title']; }  if(!empty($feelingimgid)){?>:
												<img src="allimg/<?=$feelingimgidpath;?>" height="20"width="20"> <?=$feelingimgid?> 
												<span class="bold"> <?=$row['postemos']?> </span> <?php } ?></h3>

                                                                            <p>
                                                                                <?=$row['post_details']?>
                                                                            </p>
                                                                            <?php if(!empty($row['tagfriends'])){
													//$a=array();
													 $tagf=$row['tagfriends'];
													$sql2='select first_name,user_id from all_user where user_id IN ('.$tagf.')';
													$db2->query($sql2)or die($db12->error());
												while($row1=$db2->fetchArray()){
												 $a=$row1['first_name'].' ';?>
                                                                                <a href="view-profile.php?uid=<?=base64_encode($row1['user_id'])?>">
                                                                                    <?=$row1['first_name']?>
                                                                                </a>
                                                                                <?php }
												}

											//$b=implode(',',$a);
											//$c=explode(',',$a);
											//print_r($b);
											//print_r($c);
												?>
                                                                                    <?php 
												 $ext = pathinfo($row['allpath'], PATHINFO_EXTENSION);
												 if($ext=='mp4' or $ext=='webm'){?>
                                                                                        <video id='my-video<?=$row[' post_id ']?>' class='video-js' controls preload='auto' poster='images/oceans.png' data-setup='{}'>
                                                                                            <source src='<?=$row[' allpath ']?>' type='video/mp4' width="100%">
                                                                                            <source src='<?=$row[' allpath ']?>' type='video/webm' width="100%">
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
                                                                                        <a href="javascript:void(0)" class="like2" id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Liked</a>
                                                                                        <?php }else{?>
                                                                                            <a href="javascript:void(0)" class="like2" id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Like</a>

                                                                                            <?php }?>
                                                                                                <img src="images/liked-img.png" alt="">
                                                                                                <span id="lcount<?=$row['post_id']?>"><?=$lcount?></span>
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
                                                                                                        <img src="upload/<?=$userimage?>" />
                                                                                                        <?php }else{?>
                                                                                                            <img src="images/resources/user.png" alt="" height="40" width="40">
                                                                                                            <?php } ?>
                                                                                                </div>
                                                                                                <li class="feeling-input">
                                                                                                    <div class="comment_box feeling-input">
                                                                                                        <form id="" method="post">
                                                                                                            <input type="hidden" name="pid" id="pid<?=$row['post_id']?>" value="<?=$row['post_id']?>">
                                                                                                            <input type="hidden" name="uid" id="uid<?=$row['post_id']?>" value="<?=$_SESSION['sess_webid']?>">

                                                                                                            <input type="hidden" name="cimage" id="cimage<?=$row['post_id']?>" value="">
                                                                                                            <label class="cemeraicon" for="cimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                                                                                            <input type="file" id="cimageupload" name="cimageupload">

                                                                                                            <p class="lead emoji-picker-container">
                                                                                                                <input type="text" cid="<?=$row['post_id']?>" placeholder="Post a comment" class="cp" id="postcomment<?=$row['post_id']?>" name="postcomment<?=$row['post_id']?>" data-emojiable="true">
                                                                                                            </p>
                                                                                                            <style>
                                                                                                                .wishlistcartemoji1 {
                                                                                                                    width: 300px !important;
                                                                                                                    bottom: 0!important;
                                                                                                                    height: 200px!important;
                                                                                                                    top: inherit !important;
                                                                                                                }
                                                                                                                
                                                                                                                .wishlistcartemoji1 li {
                                                                                                                    display: inline;
                                                                                                                    width: 50px;
                                                                                                                }
                                                                                                                
                                                                                                                .wishlistcartemoji1 li a img {
                                                                                                                    width: 30px !important;
                                                                                                                    height: 30px !important;
                                                                                                                }
                                                                                                                
                                                                                                                #close {
                                                                                                                    float: right;
                                                                                                                    margin: 10px;
                                                                                                                }
                                                                                                            </style>
                                                                                                            <ul class="wishlistcartemoji1" style="display:none;">
                                                                                                                <div id="close"><a href="javascript:void(0)">X</a></div>
                                                                                                                <?php 
  $sql1="SELECT * FROM emoji order by id desc";
$dbf->query($sql1)or die($dbf->error());
while($row1=$dbf->fetchArray()){
 $ext = pathinfo($row1['image'], PATHINFO_EXTENSION);	
if($ext=='mp3'){

				$a.='';					 
 }else{	
				$b.='<li>
							  <a href="javascript:void(0);" pid="'.$row['post_id'].'" im="'.$row1['image'].'"  mp3="'.$row1['mp3'].'"  uid="'.$row['user_id'].'" class="emoji1"><img src="emoji/'.$row1['image'].'" height="50" width="50" />
						</a>
						</li>';

 } } echo $b;echo "</ul>"; ?>
                                                                                                                    <a href="javascript:void(0);" name="send_chatemoji1" class="send_chatemoji1" id="comment1<?=$row['post_id']?>" uid="<?=$row['post_id']?>"><i class="emoji-picker-icon emoji-picker fa fa-smile-o"></i> </a>
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
											<img src="images/resources/user.png" alt="" height="40" width="40">
											<?php }?>

													<?php if(!empty($rowc['mp3'])){ ?>
													<img src="emoji/<?=$rowc['cimage']?>" height="50" width="50"/><?php }elseif(!empty($rowc['cimage'])){ ?>
													<img src="upload/<?=$rowc['cimage']?>" height="50" width="50"/>
													<?php }?>
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
                                                                                                                            <input type="hidden" name="uid" id="uid<?=$rowc['c_id']?>" value="<?=$rowc['user_id']?>">
                                                                                                                            <input type="hidden" name="cid" id="cid<?=$rowc['c_id']?>" value="<?=$rowc['c_id']?>">
                                                                                                                            <input type="hidden" name="rimage" id="rimage<?=$rowc['c_id']?>" value="">
                                                                                                                            <label class="cemeraicon" for="rimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                                                                                                            <input type="file" id="rimageupload" name="rimageupload">
                                                                                                                            <p class="lead emoji-picker-container">
                                                                                                                                <input type="text" rid="<?=$rowc['c_id']?>" placeholder="Reply on comment" name="rpostcomment" class="rp" id="rpostcomment<?=$rowc['c_id']?>" data-emojiable="true">
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
                                                                                                                        <div class="commnt-bx">
                                                                                                                            <span class="proilf-pic"><!--<img src="images/clock.png" alt=""> -->
																	<?php if(!empty($rpimage)){ ?>
																	<img src="upload/<?=$rpimage?>" alt=""> 
																	<?php }else{?>
																	<img src="images/resources/user.png" alt="" height="40" width="40">
																	<?php }?>

																	<span class="user-name-in-coment"><?=$username1?> 1</span>
                                                                                                                            <?php if(!empty($rowr['rimage'])){ ?>
                                                                                                                                <img src="upload/<?=$rowr['rimage']?>" height="50" width="50" />
                                                                                                                                <?php }?>
                                                                                                                                    <span class="commword"><?=$rowr['r_comment']?> 
																	<br/>
																	<span class="tim-dat1">
																	<?php echo timeago($rowr['rdate']);?> </span></span>
                                                                                                                                    </span>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <?php }} ///////////////?>

                                                                                                    </div>
                                                                                                    <?php } } //////////////?>
                                                                                            </div>

                                                                                            </ul>

                                                                        </div>
                                                                    </div>
                                                                    <!--post-bar end-->

                                                                    <?php } }
 ?>

                                                                        <!--
										<div class="process-comm">
											<div class="spinner">
												<div class="bounce1"></div>
												<div class="bounce2"></div>
												<div class="bounce3"></div>
											</div>
										</div> process-comm end-->
                                                            </div>
                                                            <!--posts-section end-->
                                            </div>
                                            <!--main-ws-sec end-->
                                   

                                    <!--main-ws-sec end-->

                                    <!--product-feed-tab end-->

                                    <div class="product-feed-tab" id="my-bids">
                                        <!--<ul class="nav nav-tabs" id="myTab" role="tablist">
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
                            </ul>-->

                                        <div class="tab-content background-white" id="myTabContent">

                                            <div class="tab-pane fade show active" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">
                                                <?php ///////////current city/////////////?>
                                                    <div class="row">
                                                        <!--Section: Contact v.2-->
                                                        <section class="mb-4">

                                                            <!--Section heading-->
                                                            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                                                            <!--Section description-->
                                                            <h3 class="text-center w-responsive mx-auto mb-5">Do you have any query? Please do not hesitate to contact us directly. Our team will come back to you within
										a matter of hours to help you.</h3>

                                                            <div class="row">

                                                                <!--Grid column-->
                                                                <div class="col-md-12 ">
                                                                    <form id="contact-form" name="contact-form" action="mail.php" method="POST" style="padding:15px;">
<input type="hidden" id="send2" name="send2" value="send2">
 
                                                                        <!--Grid row-->
                                                                        <div class="row">

                                                                            <!--Grid column-->
                                                                            <div class="col-md-6">
                                                                                <div class="md-form mb-0">
                                                                                    <input type="text" id="name" name="name" class="form-control">
                                                                                    <label for="name" class="">Your name</label>
                                                                                </div>
                                                                            </div>
                                                                            <!--Grid column-->

                                                                            <!--Grid column-->
                                                                            <div class="col-md-6">
                                                                                <div class="md-form mb-0">
                                                                                    <input type="text" id="email" name="email" class="form-control">
                                                                                    <label for="email" class="">Your email</label>
                                                                                </div>
                                                                            </div>
                                                                            <!--Grid column-->

                                                                        </div>
                                                                        <!--Grid row-->

                                                                        <!--Grid row-->
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="md-form mb-0">
                                                                                    <input type="text" id="subject" name="subject" class="form-control">
                                                                                    <label for="subject" class="">Subject</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="md-form mb-0">
                                                                                    <input type="text" id="mobileno" name="mobileno" class="form-control">
                                                                                    <label for="mobileno" class="">Mobile No</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--Grid row-->

                                                                        <!--Grid row-->
                                                                        <div class="row">

                                                                            <!--Grid column-->
                                                                            <div class="col-md-12">

                                                                                <div class="md-form">
                                                                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                                                                    <label for="message">Your message</label>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!--Grid row-->

                                                                    </form>

                                                                    <div class="text-center text-md-left" style="padding:15px;">
                                                                        <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                                                                    </div>
                                                                    <div class="status"></div>
                                                                </div>
                                                                <!--Grid column-->

                                                            </div>

                                                        </section>
                                                        <!--Section: Contact v.2-->

                                                    </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!--product-feed-tab end-->

                                    <div class="product-feed-tab" id="info-dd">
                                        <div class="user-profile-ov">
                                            <h3> Overview <a href="#" title="" class="overview-open"></a>
	<?php if($_SESSION['sess_webid']==$uid){?>
									<a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a>
	<?php }?>
									</h3>
                                            <p>
                                                <?php echo $profilerow['page_details'];?>
                                            </p>
                                        </div>

                                        <div class="user-profile-ov newcontactabout">
                                            <h3>Basic Info <span class="eidt-list">
											<?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?>
										</span>  </h3>

                                            <ul class="list-tab-contact">
                                                <li><span class="lable"> <h3>Establish Since </h3></span> <span class="details"><?=$profilerow['establish']?></span> <span class="eidt-list">
											<?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?>
										</span></li>

                                                <li><span class="lable"> <h3>Email </h3></span> <span class="details"><?=$profilerow['email_id']?></span> <span class="eidt-list">

									<?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?>

										</span></li>

                                               

                                                <li><span class="lable"> <h3>Total Employees </h3></span> <span class="details"><?=$profilerow['totalemp']?></span> <span class="eidt-list"><?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?></span></li>
											
											  <li><span class="lable"> <h3>Website  </h3></span> <span class="details"><?=$profilerow['website']?></span> <span class="eidt-list"><?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?></span></li>
											
											
											  <li><span class="lable"> <h3>Contact Number  </h3></span> <span class="details"><?=$profilerow['contactnumber']?></span> <span class="eidt-list"><?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?></span></li>
											
											 <li><span class="lable"> <h3>Location </h3></span> <span class="details"><?=$profilerow['location']?></span> <span class="eidt-list"><?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?></span></li>
											  <li><span class="lable"> <h3>Address </h3></span> <span class="details"><?=$profilerow['page_address']?></span> <span class="eidt-list"><?php if($_SESSION['sess_webid']==$uid){?>
										<a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a>
											<?php } ?></span></li>

                                            </ul>

                                        </div>

                                        <div class="user-profile-ov">

                                            <h3>Social Link <a href="#" title="" class="skills-open1"> <?php if($_SESSION['sess_webid']==$uid){?><i class="fa fa-plus-square"></i>
								<?php } ?>
								</a></h3>
                                            <ul>
                                                <?php  $dbs=new DB();
									  $sqls="select * from social_link where com_id=".$cid;
									  $db->query($sqls);
									  while($rows=$db->fetchArray()){?>
                                                    <li>
                                                        <a href="jsvsscript:void(0);" title="" class="skillsdel1" delid="<?=$rows['id']?>">
                                                            <?=$rows['slink']?>
                                                        </a>
                                                    </li>
                                                    <?php }?>

                                            </ul>
                                        </div>

                                    </div>

                                    <div class="product-feed-tab" id="portfolio-dd">
                                        <div class="portfolio-gallery-sec">
                                            <h3>All Picture</h3>
                                            <div class="portfolio-btn">
                                               <?php if($_SESSION['sess_webid']==$uid){?> <a href="#" title=""><i class="fas fa-plus-square"></i> Add Picture</a><?php } ?>
                                            </div>
                                            <div class="gallery_pf">
                                                <div class="row">
                                                    <?php
										$dbg=new DB();
										$sqlg="SELECT * from company_document where user_id=".$_SESSION['sess_webid'].' and com_id='.$cid;
										$dbg->query($sqlg);
										if($dbg->numRows()>0)
										{
										 while($grow=$dbg->fetchArray()){
										?>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                            <div class="ed-opts">
                                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                                <ul class="ed-options">

                                                                    <li><a href="javascript:void(0);" class="cgallerydel" id="gallerydel" title="" delidcg="<?=$grow['com_d_id']?>">Delete</a></li>
                                                                </ul>
                                                            </div>

                                                            <div class="gallery_pt">

                                                                <img src="<?=$grow['com_doc_id']?>" alt="">
                                                                <a href="#" title="" class="cgallerydel" delidcg="<?=$grow['com_d_id']?>"><img src="<?=$grow['com_doc_id']?>" ></a>
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

                                    <!--user-tab-sec end-->
                                    <div class="product-feed-tab" id="saved-jobs">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active  " id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">All Followers </a>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
                                                <div class="row">
                                                    <?php ////////follower All Friends//////////?>
                                                        <?php 
										$dbuf=new DB();
										 $sql="SELECT * from com_like where com_id=".$cid;
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
                                                                                    <img src="images/resources/user.png" alt="" height="40" width="40">
                                                                                    <?php }?>
                                                                                        <div class="usy-name">
                                                                                            <h3><?=$usernamef?></h3>
                                                                                            <div class="epi-sec epi2">
                                                                                                <ul class="descp descptab bklink">
                                                                                                    <?php if(!empty($woorking)){ ?>
                                                                                                        <li><img src="images/icon8.png" alt=""><span><?=$woorking?></span></li>
                                                                                                        <?php }?>
                                                                                                            <?php if(!empty($currentcity)){ ?>
                                                                                                                <li><img src="images/icon9.png" alt=""><span><?=$currentcity?></span></li>
                                                                                                                <?php }?>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                        </div>
                                                                        <div class="job_descp noborder">

                                                                            <div class="devepbtn appliedinfo noreply">
                                                                                <?php if($frow['do_like']==1){
									?>
                                                                                    <li><a href="javascript:void(0);" title="" id="f<?=$frow['com_id']?>" com="<?=$frow['com_id']?>" class="follow comfollow">Liked</a></li>
                                                                                    <?php }else{ ?>
                                                                                        <li><a href="javascript:void(0);" title="" id="f<?=$frow['com_id']?>" com="<?=$frow['com_id']?>" class="follow comfollow">Like</a></li>
                                                                                        <?php } ?>

                                                                                            <!--<a class="clrbtn follownew" id="follownew<?=$frow['f_id']?>" fid="<?=$frow['follow']?>" href="javascript:void(0);"> Follow</a>-->

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <?php }}else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="product-feed-tab" id="review">

                                        <h3 style="padding:20px;">Write Review<a href="javascript:void(0);" title="" class="review-open"><i class="fa fa-pencil"></i></a></h3>

                                        <?php
					$dbn=new DB();
				     $sqln="select * from feedback where pages='company' and prod_id =".$cid." limit 0,5";
					$dbn->query($sqln);
					if($dbn->numRows()>0){	
					?>
                                            <?php while($rowfeed=$dbn->fetchArray()){
					$image_id=$db->getSingleResult("SELECT image_id from user_profile where user_id=".$rowfeed['user_id']);
					$first_name=$db->getSingleResult("SELECT first_name from all_user where user_id=".$rowfeed['user_id']);
					?>
                                                <div class="feedbackbox background-white">
                                                    <div class="headerfeedabcdk">
                                                        <?php if(!empty($image_id)){?>
                                                            <img src="upload/<?=$image_id?>" alt="india">
                                                            <?php }else{ ?>
                                                                <img src="images/resources/user.png" alt="" width="50" height="50">
                                                                <?php } ?>
                                                                    <h3><?=$first_name?></h3>
                                                                    <span class="feedback-time"><?php echo timeago($rowfeed['feedback_date']);?></span>

                                                    </div>
                                                    <div class="feedbackbox-details">
                                                        <span class="starlinting">
							<?php if($rowfeed['rate']==1){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==2){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==3){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==4){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==5){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							</span>

                                                        <h4><?=$rowfeed['title']?></h4>
                                                        <p>
                                                            <?=$rowfeed['review']?>
                                                        </p>
                                                    </div>

                                                </div>
                                                <?php }} ?>

                                    </div>

                                    <div class="product-feed-tab background-white" id="services">
                                        <h3 style="padding:20px;">Add Servoice <?php if($_SESSION['sess_webid']==$uid){?> <a href="javascript:void(0);" title="" class="services-open"><i class="fa fa-pencil"></i></a> <?php } ?></h3>

                                        <?php
					$dbs=new DB();
				     $sqls="select * from com_services where service_page_type='company' and com_id =".$cid." limit 0,5";
					$dbs->query($sqls);
					if($dbs->numRows()>0){	
					?>
                                            <?php while($rowservice=$dbs->fetchArray()){

					?>
                                                <div class="feedbackbox background-white">
                                                    <div class="headerfeedabcdk">

                                                        <h3><?=$rowservice['service_name']?></h3>
                                                      

                                                        <span class="">Duration varies • Starting From  <h4><?=$rowservice['starting_price']?></h4></span>

                                                    </div>
                                                    <div class="feedbackbox-details">
                                                        <div class="row">
                                                            <div class="col-lg-8 no-left-pd">
                                                                <p>
                                                                    <?=$rowservice['service_details']?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 no-righ-pd">
                                                                <?php if(!empty($rowservice['service_image_id'])){ ?>
                                                                    <img src="upload/<?=$rowservice['service_image_id']?>" />
                                                                    <?php } ?>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <?php }} ?>

                                    </div>

                               
								

                               


















<div class="posts-section app">
	<div class="app-timeline" id="postshow">
</div>
</div>
									
<div class="posts-section app">
<div class="app-timeline" id="faq-result">
									
<?php

$db4=new DB();
$l=array();
$sql4="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
$db4->query($sql4);
if($db4->numRows()>0)
{
while($row4=$db4->fetchArray()){
	$l[]=$row4['follow'];
}
}
$allfriend=implode(',',$l);
if(!empty($allfriend)){
$allfriends=$allfriend;
}else{
$allfriends=0;	
}


$sql5="SELECT * from followers where follow=".$_SESSION['sess_webid']."";
										$db4->query($sql5);
										if($db4->numRows()>0)
										{
										while($row4=$db4->fetchArray()){
											$l1[]=$row4['user_id'];
										}
										}
										$allfriend1=implode(',',$l1);
										
										if(empty($allfriend1)){$allfriend1=0;}
$db22=new DB();
$db1=new DB();
$dblike=new DB();
$dbr=new DB();
$dbc=new DB();
$dbu=new DB();
$dbp=new DB();
$mainuserimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$_SESSION['sess_webid']);

$sqlp="SELECT * from user_post where FIND_IN_SET(".$_SESSION['sess_webid'].",tagfriends) or user_id='".$_SESSION['sess_webid']."' or user_id IN($allfriends) or user_id IN($allfriend1) and post_hide='0' order by post_id desc limit 0,5";
$dbp->query($sqlp);
if($dbp->numRows()>0)
{
while($row=$dbp->fetchArray()){

//$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	
$sqluser="SELECT * from user_profile where user_id=".$row['user_id'];
$dbu->query($sqluser);
if($dbu->numRows()>0)
{
$userrow=$dbu->fetchArray();
}
$lcount=$dblike->getSingleResult('select count(like_id) from post_like where do_like = 1 and post_id='.$row['post_id']);
$ccount=$dblike->getSingleResult('select count(c_id) from comment where post_id='.$row['post_id']);
 
?>

<div class="app-timeline-item">
	        <div class="user">
	        	<?php if(empty($userrow['image_id'])){?>
					<img src="images/resources/user.png" alt=""  /> 
					<?php }else{?>
					<img src="upload/<?=$userrow['image_id']?>" alt="" /> 
					<?php }?> 

	        </div>
	        <div class="content">
	            <div class="title">
	            		<?=$userrow['first_name']?> 
															
															<?php if(!empty($row['tagfriends'])){
																?>
																<span class="withfrnd">- with </span> 
														<?php 	//$a=array();
																	 $tagf=$row['tagfriends'];
																	$sql2='select first_name,user_id from all_user where user_id IN ('.$tagf.')';
																	$db2->query($sql2)or die($db12->error());
																while($row1=$db2->fetchArray()){
																 $a=$row1['first_name'].' ';?>
																 
																<a href="view-profile.php?uid=<?=base64_encode($row1['user_id'])?>" class="tagsrfnds11"><?=$row1['first_name']?></a>
																<?php }
																}
															
															//$b=implode(',',$a);
															//$c=explode(',',$a);
															//print_r($b);
															//print_r($c);
																?>

																<?php if(!empty($userrow['current_company']) or !empty($row['livelocation']) or !empty($userrow['current_city'])){?> 

																	<span class="headlocation">
																	at 
																	<span class="lcoaionname">
																	<?php if(!empty($userrow['current_company'])){?>
																		 <?=$userrow['current_company']?> 
																				<?php } if(!empty($row['livelocation'])){?>
																		<?=$row['livelocation']?>
																				<?php }elseif(!empty($userrow['current_city'])){?>
																		<?=$userrow['current_city']?>	
																			<?php }else{ ?><li></li>
																		<?php }?>
																		</span>


																		</span>


																<?php } ?>

							<div class="ed-opts"><span id="editpost1<?=$row['post_id']?>"></span>
								<a  href="javascript:void(0);" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
									<ul class="ed-options">
													<?php if($_SESSION['sess_webid']==$row['user_id']){?>
														<li><a href="javascript:void(0);" title="" data-toggle="modal" data-target="#myModal<?=$row['post_id']?>" class="editpost" id="editpost<?=$row['post_id']?>" editpostid="<?=$row['post_id']?>">Edit Post</a></li>
													<?php } ?>
														<li><a href="javascript:void(0);"  id="posthide" class="posthide" title="" hidepost="<?=$row['post_id']?>" >Hide</a></li>
													<?php if($_SESSION['sess_webid']==$row['user_id']){?>
														<li><a href="javascript:void(0);" class="deletepost" id="deletepost" title="" delpost="<?=$row['post_id']?>" >Delete</a></li>
														<?php } ?>
									</ul>
							</div>

						 </div>

	            <?php /////////////
		
				$feelingimgid=$row['feelingimgid'];
				$feelingimgidpath=$db22->getSingleResult('select imgid from '.$_TBL_FEELINGS." where subcatname='".$feelingimgid."'");
				?>

				<div class="job_descp">
				
				<?php if (!empty($row['post_title']) or !empty($feelingimgid))
					{ ?><h3 class="font-weight-500"><?php }  if (!empty($row['post_title']))
					{
					    echo $row['post_title'];
					}
					if (!empty($feelingimgid))
					{ ?>: <img src="allimg/<?=$feelingimgidpath ?>"width="20"> <?=$feelingimgid ?> <span class="bold"> <?=$row['postemos'] ?> </span> <?php
					} ?>
					<?php if (!empty($row['post_title']) or !empty($feelingimgid))
					{?>
					</h3><?php } ?> <p><?=$row['post_details'] ?> </p>

					<?php 
					if (!empty($row['allpath']))
					    {
					        $path = explode(',', $row['allpath']);
					        $count = count($path);
					        for ($i = 0;$i <= $count;$i++)
					        { 
						    $ext = pathinfo($path[$i], PATHINFO_EXTENSION);
							if ($ext == 'mp4' or $ext == 'webm')
							{ ?><video class="video-js"controls data-setup="{}"id="my-video<?=$row['post_id'] ?>"poster="images/oceans.png"preload="auto"><source src="<?=$path[$i]?>"type="video/mp4"width="100%"><source src="<?=$path[$i]?>"type="video/webm"width="100%"><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/"target="_blank">supports HTML5 video</a></p></video><?php
								}else{
							?>
								<img src="<?=$path[$i] ?>"width="100%" style="max-width: 100%;">
						
						<?php }
					        }
					    }
					
					/* else
					{
					    $url = '';
					    $path = '';
					    if (!empty($row['allpath']))
					    {
					        $path = explode(',', $row['allpath']);
					        $count = count($path);
					        for ($i = 0;$i <= $count;$i++)
					        { ?><img src="<?=$path[$i] ?>"width="100%"><?php
					        }
					    }
					}  */?></div>


 
	            <p class="sharelinks">

	            	<!---- like code started -->

	            	<?php 
														
											$lucount=$db1->getSingleResult('select count(like_id) from post_like where do_like = 1 and post_id='.$row['post_id'].' and user_id='.$_SESSION['sess_webid'] );
											if($lucount>0){
												?>
														<a href="javascript:void(0)" class="like2 text-muted  i_liked" id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Liked</a>
														<span id="lcount<?=$row['post_id']?>" class="margin-right-10 i_liked"><?=$lcount?></span>
											<?php }else{?>	
											<a href="javascript:void(0)" class="like2 text-muted " id="like<?=$row['post_id']?>" like1="<?=$row['post_id']?>"><i class="fas fa-heart"></i> Like</a>
											<span id="lcount<?=$row['post_id']?>" class="margin-right-10"><?=$lcount?></span>
											
											<?php }?>
											 
					<!---- like code ended -->

	                <a href="javascript:void(0)" class="text-muted margin-right-10 showcmtBtn"><span class="fa fa-comment"></span> Comments <?=$ccount?></a>
	                <a href="#" class="text-muted margin-right-10"><span class="fa fa-share-alt"></span> Share</a>
	                <a href="#" class="text-muted"><span class="fa fa-bullhorn"></span> Report</a>

	                <span class="pull-right text-muted"> <i class="fa fa-clock-o"></i> <?php echo timeago($row['post_date']);?></span>
	            </p>

	            <div class="comments mainCommentList"   style="display:;">
				
	                <div class="total"><?=$ccount?> Comments for this post</div>

	                <?php $comallcount=$ccount;
							 $comrowperpage = 3;

						 $sqlc="SELECT * from comment where post_id=".$row['post_id']." limit 0,$comrowperpage";
						$dbc->query($sqlc);
						if($dbc->numRows()>0)
						{
						while($rowc=$dbc->fetchArray()){
						$username=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowc['user_id']);
						 'select image_id from user_profile where user_id='.$rowc['user_id'];
						$pimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	

							?>
				                <div class="comment" id="myList<?=$row['post_id']?>"  >
<input type="hidden" id="comrow<?=$row['post_id']?>" value="3">
 <input type="hidden" id="comall<?=$row['post_id']?>" value="<?php echo $comallcount; ?>">
 <input type="hidden" id="comid" value="<?=$rowc['c_id']?>">
  <input type="hidden" id="postid1" value="<?=$row['post_id']?>">
				                    <div class="contact contact-rounded contact-lg">
				                    	<div class="comnetimg">
				                    		<?php if(!empty($pimage)){ ?>
				                    			<a href="view-profile.php?uid=<?php echo base64_encode($rowc['user_id']);?>">
				                    				<img src="upload/<?=$pimage?>" alt="" >
				                    				</a>
				                    			<?php }else{ ?>
												<a href="view-profile.php?uid=<?php echo base64_encode($rowc['user_id']);?>"><img src="images/resources/user.png" alt=""></a>
												<?php }?>


					                    </div>
				                        <div class="contact-container">
				                            <a href="view-profile.php?uid=<?php echo base64_encode($rowc['user_id']);?>"><?=$username?></a>
				                            <span class="coment-time"><?php echo timeago($rowc['cdate']);?> </span> 
				                            <div class="replybody-mg">
					                            <?php if(!empty($rowc['mp3'])){ ?>
														<img src="emoji/<?=$rowc['cimage']?>" height="50" width="50"/><?php }elseif(!empty($rowc['cimage'])){ ?>
														<img src="upload/<?=$rowc['cimage']?>" height="50" width="50"/>
														<?php }?>
					                            <span><?=$rowc['comment']?></span>
					                        </div>
				                            <div class="replycommnetbt">
								           		<a  href="javascript:void(0)" id="replyiddiv" cid="<?=$rowc['c_id']?>" >Reply</a>
								           	</div>
				                        </div>
				                    </div>


				                    <?php ///////Show Reply////////

$rcomallcount=$db1->getSingleResult("SELECT count(*) from reply where c_id=".$rowc['c_id']);
											 $sqlr="SELECT * from reply where c_id=".$rowc['c_id'];
											$dbr->query($sqlr);
											if($dbr->numRows()>0)
											{
											while($rowr=$dbr->fetchArray()){
											$date=explode('-',$rowr['rdate']);


											$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
											$username1=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowr['user_id']);
											$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowr['user_id']);		
												?>
<input type="hidden" id="rcomrow<?=$rowc['c_id']?>" value="6">
 <input type="hidden" id="rcomall<?=$rowc['c_id']?>" value="<?php echo $rcomallcount; ?>">
				                    <div class="comment">
						                    <div class="contact contact-rounded contact-lg">
						                    	<div class="comnetimg">
						                    		<?php if(!empty($rpimage)){ ?>
																	<a href="view-profile.php?uid=<?php echo base64_encode($rowr['user_id']);?>"><img src="upload/<?=$rpimage?>" alt=""></a> 
																	<?php }else{?>
																	<a href="view-profile.php?uid=<?php echo base64_encode($rowr['user_id']);?>"><img src="images/resources/user.png" alt=""  ></a>
																	<?php }?>


						                    	</div>
						                        <div class="contact-container">
						                            <a href="#"> <?=$username1?></a>
						                            <span class="coment-time"><?php echo timeago($rowr['rdate']);?> </span> 
						                            <?php if(!empty($rowr['rimage'])){ ?></br>
																	<img src="upload/<?=$rowr['rimage']?>" height="50" width="50"/></br><?php }?>
																	<span class="commword"><?=$rowr['r_comment']?>
																		</span>																	

						                        </div>
						                    </div>
						            </div>
									
									

									
									
						           <?php }} ///////////////?>
									<span id="replydisplay1<?=$rowc['c_id']?>"></span>
							<!--		
<?php if($rcomallcount>6){ ?>					
<button type="button" class="btn loadmorereply" id="rloadMore<?=$rowc['c_id']?>" cid="<?=$rowc['c_id']?>">View More reply</button>
				<?php } ?>-->
						           <div id="replydisplay<?=$rowc['c_id']?>" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">
														<?php if(!empty($mainuserimage)){ ?>
														<img src="upload/<?=$mainuserimage?>"/>
														<?php }else{?>
														<img src="images/resources/user.png" alt="" height="40" width="40">
														<?php } ?>
													</div>
													<div class="comment_box">
													<form id="replyForm" method="post">
													<input type="hidden" name="pid" id="pid<?=$rowc['c_id']?>" value="<?=$rowc['post_id']?>">
													<input type="hidden" name="uid" id="uid<?=$rowc['c_id']?>" value="<?=$rowc['user_id']?>" >
													<input type="hidden" name="cid" id="cid<?=$rowc['c_id']?>" value="<?=$rowc['c_id']?>" >
													<input type="hidden" name="rimage" id="rimage<?=$rowc['c_id']?>" value="" >
													<label class="cemeraicon" for="rimageupload<?=$rowc['c_id']?>"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="rimageupload<?=$rowc['c_id']?>" name="rimageupload" class="rimageupload" cid="<?=$rowc['c_id']?>" >
													<p class="lead emoji-picker-container">
													<input type="text"  rid="<?=$rowc['c_id']?>"  placeholder="Reply on comment" name="rpostcomment" class="rp" id="rpostcomment<?=$rowc['c_id']?>" data-emojiable="true">
													</p>
													<button type="button" name="replyid" id="replyid<?=$rowc['c_id']?>" class="replyid" rid="<?=$rowc['c_id']?>">Send</button>
														</form>
													</div>
												</div>
									</div>

				                    

				                    <!--

						           	
					                <div class="replycommnet" id="replydisplay<?=$rowc['c_id']?>" style="display:none;">
				                            	<div class="form">
				                            		<form id="replyForm" method="post">
				                            			<input type="hidden" name="pid" id="pid<?=$rowc['c_id']?>" value="<?=$rowc['post_id']?>">
														<input type="hidden" name="uid" id="uid<?=$rowc['c_id']?>" value="<?=$rowc['user_id']?>" >
														<input type="hidden" name="cid" id="cid<?=$rowc['c_id']?>" value="<?=$rowc['c_id']?>" >
														<input type="hidden" name="rimage" id="rimage<?=$rowc['c_id']?>" value="" >
														<label class="cemeraicon" for="rimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
														<input type="file" id="rimageupload" name="rimageupload" >

														<p class="lead emoji-picker-container">
														<input type="text"  rid="<?=$rowc['c_id']?>"  placeholder="Reply on comment" name="rpostcomment" class="rp" id="rpostcomment<?=$rowc['c_id']?>" data-emojiable="true">
														</p>
														<button type="button" name="replyid" id="replyid<?=$rowc['c_id']?>" class="replyid" rid="<?=$rowc['c_id']?>">Send</button>



									                    <div class="form-group">
									                        <div class="input-group">
									                            <input type="text" class="form-control" placeholder="Your comment..." />
									                            <div class="input-group-btn">
									                                <button class="btn btn-default">Post Comment</button>
									                            </div>
									                        </div>
									                    </div>
									                </form>
									                </div> 

				                            </div> -->


					                 



				                </div>
				       <?php } ?> 
					  <!-- <ul id="myList">
    <li>One</li>
    <li>Two</li>
    <li>Three</li>
    <li>Four</li>
    <li>Five</li>
    <li>Six</li>
    <li>Seven</li>
    <li>Eight</li>
    <li>Nine</li>
    <li>Ten</li>
    <li>Eleven</li>
    <li>Twelve</li>
    <li>Thirteen</li>
    <li>Fourteen</li>
    <li>Fifteen</li>
    <li>Sixteen</li>
    <li>Seventeen</li>
    <li>Eighteen</li>
    <li>Nineteen</li>
    <li>Twenty one</li>
    <li>Twenty two</li>
    <li>Twenty three</li>
    <li>Twenty four</li>
    <li>Twenty five</li>
</ul>
-->
<span id="commentdisplay<?=$row['post_id']?>" style="display:;"></span>
<span id="norecord<?=$row['post_id']?>" pid="<?=$row['post_id']?>"></span>
<button type="button" class="btn loadmore" id="loadMore<?=$row['post_id']?>" pid="<?=$row['post_id']?>">View More Comment</button>


<div></div>
					   <?} //////////////?>

					
				<!-- form start ended-->	
					<div class="form newpostcomments">
	                    <div class="form-group">
	                       
	                        	<form id="" method="post">
													<input type="hidden" name="pid" id="pid<?=$row['post_id']?>" value="<?=$row['post_id']?>">
													<input type="hidden" name="uid" id="uid<?=$row['post_id']?>" value="<?=$_SESSION['sess_webid']?>" >
													
													<input type="hidden" name="cimage" id="cimage<?=$row['post_id']?>" value="" cid="" >
													<label class="cemeraicon"	 for="cimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="cimageupload<?=$row['post_id']?>" class="cimageupload" name="cimageupload" cid="<?=$row['post_id']?>">

													<a href="javascript:void(0);" name="send_chatemoji1"  class="send_chatemoji1" id="comment1<?=$row['post_id']?>" uid="<?=$row['post_id']?>" cid="<?=$row['post_id']?>"><i class="emoji-picker-icon emoji-picker fa fa-smile-o"></i> </a>

													<div class="input-group">

														<p class="lead emoji-picker-container">
														<input type="text" cid="<?=$row['post_id']?>" placeholder="Your comment..." class="cp form-control" id="postcomment<?=$row['post_id']?>" name="postcomment<?=$row['post_id']?>" data-emojiable="true"></p>
														

													<div class="input-group-btn">
														<button type="button" id="commentid<?=$row['post_id']?>" class="commentid btn btn-default" cid="<?=$row['post_id']?>">Post Comment</button>
													</div>
													</div>

														</form> 

	                            
	                        
	                    </div>
	                </div>


	            <!-- form start ended-->


	               <!-- <div class="form">
	                    <div class="form-group">
	                        <div class="input-group">
	                            <input type="text" class="form-control" placeholder="Your comment..." />
	                            <div class="input-group-btn">
	                                <button class="btn btn-default">Post Comment</button>
	                            </div>
	                        </div>
	                    </div>
	                </div>-->
	            </div>
	        </div>
	    </div>
	

	<!--- new itme for post ended --->


<?php } }
 ?>
										
								
										

		 <div id="load_data" class="post"></div>
		<div id="load_data_message"></div>
</div>

							
									
									</div>
	


  </div>











							   <div class="col-lg-4 no-righ-pd ">
                                         <?php
					$dbc=new DB();
				    $sqlc="select * from company_page where page_cat_id ='".$profilerow['page_cat_id']."' and com_id !='$cid' limit 0,10";
					$dbc->query($sqlc);
					if($dbc->numRows()>0){	
					?>
                                            <?php while($rowc=$dbc->fetchArray()){

					?>
                                                <div class="feedbackbox background-white">
												
                                     
                                                   
 <?php if(empty($rowc['imgid'])){?>
                                                                                    <img src="images/resources/user.png" alt="" height="40" width="40">
                                                                                    <?php }else{?>
                                                                                        <img src="upload/<?=$rowc['imgid']?>" alt="" height="40" width="40">
                                                                                        <?php }?>
                                              <a href="company-profile.php?comid=<?=$rowc['com_id']?>" title="">  <h3><?=$rowc['page_name']?></h3>
                                                        </a>

                                                        <span class="">Establish In <h4><?=$rowc['establish']?></h4></span>

                                                   
                                                   
                                                </div>
                                                <?php } } ?>
                                </div>
								
								
								
								
								
								</div>
                            </div>
                        </div>

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
<textarea name="overview" id="overview"><?=$profilerow['page_details']?>        </textarea>
                <button type="submit" class="save" id="comoverviewsave" cid="<?=$profilerow['com_id']?>">Save</button>
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
                    <input type="text" class="form-control1" name="hometown" id="hometown" required value="<?=$profilerow['twon']?>" />
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
                                <input type="text" name="from" placeholder="From 2010">

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

    <div class="overview-box" id="services-open-box">
        <div class="overview-edit">
            <h3>Add Services</h3>

            <form id="servicesaveform" method="post">
                <input type="hidden" name="company" id="company" value="company" />
                <input type="hidden" name="serviceimage" id="serviceimage" value="" />
                <input type="hidden" name="com_id" id="com_id" value="<?=$cid?>" />
                <input type="text" name="servicename" id="servicename" placeholder="Service Name">
                <div class="datepicky">
                    <div class="row">
                        <div class="col-lg-12 no-left-pd">
                            <div class="datefm">
                                <input type="text" name="start_price" id="start_price" placeholder="Start Price">

                            </div>
                        </div>

                    </div>
                </div>
                <input type="file" name="file56" id="file56" placeholder="Image">
                <div class="serv" style="height:100px; width:100px;"></div>
                <textarea name="description" id="description" placeholder="Description"></textarea>
                <button type="button" name="servicesave" id="servicesave" class="save servicesave">Save</button>
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
                                <input type="text" name="from" placeholder="From 2010">

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

    <div class="overview-box" id="review-open-box">
        <div class="overview-edit">
            <h3>Reviews</h3>
            <form id="feedback" name="feedback" class="feedback" method="post">
                <input type="hidden" id="page" name="page" value="company" />
                <input type="hidden" id="pid" name="pid" value="<?=$cid?>" />
                <input type="text" name="subject" id="subject" placeholder="Subject" required>
                <textarea name="comreview" id="comreview"></textarea>
                <div class="wrapper1">
                    <input type="checkbox" id="st1" name="rate" value="1" />
                    <label for="st1"></label>
                    <input type="checkbox" id="st2" name="rate" value="2" />
                    <label for="st2"></label>
                    <input type="checkbox" id="st3" name="rate" value="3" />
                    <label for="st3"></label>
                    <input type="checkbox" id="st4" name="rate" value="4" />
                    <label for="st4"></label>
                    <input type="checkbox" id="st5" name="rate" value="5" />
                    <label for="st5"></label>
                </div>
                </br>

                <button type="button" id="comfeedback" class="comfeedback">Save</button>
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
            <h3>Company Info</h3>
            <form id="contactinfoform" method="post">

                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <input type="text" name="establish" placeholder="Establish Since" value="<?=$profilerow['establish']?>">
                    </div>
                    <div class="col-lg-6 no-righ-pd">
                        <input type="email" name="uemail" placeholder="Email" value="<?=$profilerow['email_id']?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <input type="text" name="totalemp" placeholder="Total Employee" value="<?=$profilerow['totalemp']?>">
                    </div>
					
					
					<div class="col-lg-6 no-left-pd">
                        <input type="text" name="website" placeholder="website" value="<?=$profilerow['website']?>">
                    </div>
                    <!--class="datepicker"-->

                </div>

                <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <input type="text" name="location" placeholder="Location" value="<?=$profilerow['location']?>">
                    </div>
					
					<div class="col-lg-6 no-left-pd">
                        <input type="text" name="contactnumber" placeholder="contactnumber" value="<?=$profilerow['contactnumber']?>">
                    </div>
					
                    <!--class="datepicker"-->

                </div>
				 <div class="row">
                    <div class="col-lg-6 no-left-pd">
                        <input type="text" name="page_address" placeholder="Company Address" value="<?=$profilerow['page_address']?>">
                    </div>
</div>
                <button type="submit" class="save" id="compinfosave">Save</button>
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

    <div class="overview-box" id="skills-box1">
        <div class="overview-edit">
            <h3>Socal Link</h3>
            <form name="" id="" method="post">
                <input type="hidden" name="cuserid" id="cuserid" value="<?=$cid?>">
                <input type="text" name="clink" id="clink" placeholder="Skills">
                <button type="button" name="" id="csocalsave" class="save">Save</button>
                <!--<button type="submit" class="save-add">Save & Add More</button>-->
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>

    <div class="overview-box" id="create-portfolio">
        <div class="overview-edit">
            <h3>Create Gallery</h3>
            <form enctype="multipart/form-data" id="gallery" name="gallery" method="post">

                <div class="file-submit">
                    <input type="file" id="upload_file5" name="upload_file5[]" multiple>
                    <label for="upload_file5">Choose File</label>
                </div>
                <input type="hidden" id="imgid" value="" />
                <!--<div class="pf-img" id="show">
                    <img src="images/resources/np.png" alt="">
                </div>-->

                <button type="submit" class="save" id="comgallerysave" cid="<?=$profilerow['com_id']?>">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <?php include('footer.php') ?>

        <script>
            function preview_image() {
                var filename = $("#upload_file").val();
                var ext = filename.split('.').pop();
                if (ext != 'mp4') {
                    var total_file = document.getElementById("upload_file").files.length;
                    for (var i = 0; i < total_file; i++) {
                        $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
                    }
                }
            }
			
/* 	$(".ed-opts .ed-opts-open").click(function(){ 
		$(".ed-options").removeClass("open");
		$(this).parent().children(".ed-options").toggleClass("open");
		//$(".content a").not(this).hide("slow");
	}); */
        </script>