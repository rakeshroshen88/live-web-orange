<?php include('header.php'); 
include('chksession.php');
						$dbn=new DB();
						$db5=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
						?>

<style>

#container
{    margin: 0;
    padding: 0;
    width: 100%;
    margin-top: 0;
    float: left;
}
#contentbox
{
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
#feelingtxtHint select{    background: #ffe7d9;
    line-height: initial;
    border: none;
    height: 35px;
    border: 1px solid #d2dbe3;
    border-right: none;
    padding: 1px 8px 2px;}
.Feelingpst ul{display: flex;}
#msgbox
{
border:solid 1px #dedede;padding:5px;
display:none;background-color:#f2f2f2
}
#display
{
display:none;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; border-top:solid 1px #dedede; font-size:12px; height:40px;
}
.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
.image
{
width:25px; float:left; margin-right:6px
}</style>

    <section class="cover-sec">
	<div class="cover-sec1">
	<?php if(!empty($profilerow['cover_image_id'])){ ?>
	<img src="upload/<?=$profilerow['cover_image_id']?>" alt="" id="coverid" style="width:1920px; height:500px">
	<?php }else{ ?>
        <img src="images/resources/company-cover.jpg" alt="" id="coverid">
	<?php } ?>
	</div>
		<label class="btn btn-primary" style="position:absolute; right:10%; bottom:10%;">
			<input type="file" style="display:none;" id="file2" name="file2"/>
			Browse
		</label>
    </section>
<div class="vchat" id="vchat">
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
                                            <img src="images/resources/user.png" id="rmvid" alt="" height="190" width="190">
                                            <?php }else{?>
                                                <img src="upload/<?=$profilerow['image_id']?>" id="rmvid" alt="" height="190" width="190">
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
                                            
                                            <li><h4>
                                                <span>Friends</span></h4>
                                                <b><?php 
												
												 $num1=$db->getSingleResult("SELECT count(f_id) from followers where user_id=".$_SESSION['sess_webid']." or follow=".$_SESSION['sess_webid']."");
												if(empty($num1)){ echo "0";}else{ echo $num1; }
												?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->
                                  
							   </div>
							   
							     <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Explore </h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                   
									 <div class="suggestions-list">
									   <ul class="social_links MyList">

                                        <li ><a href="dashboard.php" title=""><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                      
                                        <li ><a href="company-list.php" title=""><i class="fa fa-building" aria-hidden="true"></i>View Pages</a></li>
										<li><a href="company-page.php" title=""><i class="fa fa-building" aria-hidden="true"></i>create Pages</a></li>
                                        <li ><a href="profile-account-setting.php" title="" class="animated fadeIn active" ><i class="fa fa-cogs" aria-hidden="true"></i>Setting</a></li>
                                       
                                       <!-- <li data-tab="info-dd"><a href="javascript:void(0);" title=""><i class="fa fa-user" aria-hidden="true"></i></i>About</a></li>-->

                                    </ul>
									  </div>
                                </div>
                               
							   
							   <div class="suggestions full-width">
										<div class="sd-title">
											<h3>Following</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
										<?php  
										/* $sqlres = "SELECT * from {$wpdb->prefix}carer_information where status=1  and carer_info_id IN ({$carer_id}) "; */
										$dbuf=new DB();
										  $sql="SELECT * from followers where user_id=".$_SESSION['sess_webid']." order by user_id limit 0,5";
										$db->query($sql);
										if($db->numRows()>0)
										{
										while($frow=$db->fetchArray()){
											 $frow['follow'];
											
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);										
											
										/* $sqluserf="SELECT * from user_profile where user_id=".$row['user_id'];
										$dbuf->query($sqluserf);
										if($dbuf->numRows()>0)
										{
										$userrowf=$dbuf->fetchArray();
										} */
											
											?>
											<div class="suggestion-usd">
											<?php if(!empty($userfpath)){?>
												 <a href="view-profile.php?uid=<?php echo base64_encode($frow['follow']);?>"><img src="upload/<?=$userfpath?>" alt="" height="50" width="50"></a>
											<?php }else{ ?>
											 <a href="view-profile.php?uid=<?php echo base64_encode($mostrow['user_id']);?>"><img src="images/resources/user.png" alt="" height="40" width="40"></a>
											<?php }?>
												<div class="sgt-text">
													<h4><?=$usernamef?></h4>
													<span><?=$woorking?></span>
												</div>
												 
											</div>
											
										<?php }}else{ echo "&nbsp; Data Not Availablle";} ?>
											
											
											
											<div class="view-more">
												<a href="my-profile.php" title="">View More</a>
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
									</div>
                          
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec profile-lisgn">
                                <div class="user-tab-sec rewivew">
                                    <h3><?=$_SESSION['sess_name']?></h3>
                                    <div class="star-descp">
                                        <span><?=$profilerow['current_company']?>
													</span>
                                      
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
                                                    <span>Friends</span>
                                                </a>
                                            </li>
                                            
                                            <li data-tab="portfolio-dd">
                                                <a href="#" title="">
                                                    <img src="images/ic3.png" alt="">
                                                    <span>Photo</span>
                                                </a>
                                            </li>
											
											<li data-tab="frq">
                                                <a href="#" title="">
                                                    <img src="images/ic3.png" alt="">
                                                    <span>Friend Request</span>
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
                                            <a class="nav-link active  " id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">Friends</a>
                                        </li>
                                        <!--<li class="nav-item">
                                            <a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="profile" aria-selected="false">Friends</a>
                                        </li>-->
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
										  $db4=new DB();
										$l=array();
									 $sql4="SELECT * from followers where user_id=".$_SESSION['sess_webid']."";
										$db4->query($sql4);
										if($db4->numRows()>0)
										{
										while($row4=$db4->fetchArray()){
											$l[]=$row4['follow'];
										}
										}
										$allfriend=implode(',',$l);
										$sql5="SELECT * from followers where follow=".$_SESSION['sess_webid']."";
										$db4->query($sql5);
										if($db4->numRows()>0)
										{
										while($row4=$db4->fetchArray()){
											$l1[]=$row4['user_id'];
										}
										}
										$allfriend1=implode(',',$l1);
										if(empty($allfriend)){$allfriend=0;}
										if(empty($allfriend1)){$allfriend1=0;}
										  //echo $sql="SELECT * from followers where follow=".$_SESSION['sess_webid']." or user_id=".$_SESSION['sess_webid'];
										 $sql="SELECT * from user_profile where user_id IN($allfriend) or user_id IN($allfriend1)";
										
										 //$sql="SELECT * from all_user where user_id NOT IN ( select follow from followers) ";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
											 
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$frow['current_company'];
										$college=$frow['college'];
										$userfpath=$frow['image_id'];
										$currentcity=$frow['current_city'];
										?>
										<?php $cnt=$db5->getSingleResult("SELECT count(f_id) from followers where user_id = '".$frow['user_id']."' or follow=".$frow['user_id']);
							
							$f_id=$db5->getSingleResult("SELECT f_id from followers where user_id = '".$frow['user_id']."' or follow=".$frow['user_id']);
									
									?>
                                                        <div class="col-md-6">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>"> <img src="upload/<?=$userfpath?>" alt="" height="50" width="50"></a>
                                                                            <?php }else{ ?>
                                                                             <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">    <img src="images/resources/user.png" alt="" height="40" width="40"></a>
                                                                                <?php }?>
                                                                                    <div class="usy-name">
 <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">                                                                                         <h3><?=$usernamef?></h3>
        </a>                                                                                <div class="epi-sec epi2">
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
                                                    <a class="clrbtn follownew1" id="follownew1<?=$f_id?>" fid="<?=$f_id?>" href="javascript:void(0);" >Unfriend </a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php }}else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>"; }?>
                                            </div>
                                        </div>
                                       
									  <!-- <div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										$sql="SELECT * from user_profile where user_id IN($allfriend) or user_id IN($allfriend1)";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$frow['current_company'];
										$college=$frow['college'];
										$userfpath=$frow['image_id'];
										$currentcity=$frow['current_city'];
										
										
										?>
                                                        <div class="col-md-6" id="hide<?=$frow['f_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                        <a href="view-profile.php?uid=<?php echo base64_encode($frow['follow']);?>">     <img src="upload/<?=$userfpath?>" alt="" height="50" width="50"></a>
                                                                            <?php }else{ ?>
                                                                         <a href="view-profile.php?uid=<?php echo base64_encode($frow['follow']);?>">        <img src="images/resources/user.png" alt="" height="40" width="40"></a>
                                                                                <?php }?>
                                                                                    <div class="usy-name">
 <a href="view-profile.php?uid=<?php echo base64_encode($frow['follow']);?>">                                                                                         <h3><?=$usernamef?></h3>
       </a>                                                                                 <div class="epi-sec epi2">
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
                                                                            <a class="clrbtn follownew1"  id="follownew1<?=$frow['f_id']?>" fid="<?=$frow['f_id']?>" href="javascript:void(0);"> Unfriend </a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
														<?php }?>
<?php }else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                                        
                                            </div>

                                        </div>
                                        
										-->
										<div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										
										//$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										//$sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where college='".$profilerow['college']."' and user_id !='".$_SESSION['sess_webid']."')";
										 $sql="SELECT * FROM user_profile where zip_code='".$profilerow['college']."' and user_id IN($allfriend) or user_id IN($allfriend1)";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$frow['current_company'];
										$college=$frow['college'];
										$userfpath=$frow['image_id'];
										$currentcity=$frow['current_city'];
										
										?>
										
                                                        <div class="col-md-6" id="hide<?=$frow['f_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">  <img src="upload/<?=$userfpath?>" alt="" height="50" width="50"></a>
                                                                            <?php }else{ ?>
                                                                              <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">    <img src="images/resources/user.png" alt="" height="50" width="50"></a>
                                                                                <?php }?>
                                                                                    <div class="usy-name">
  <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">                                                                                        <h3><?=$usernamef?></h3>
    </a>                                                                             <div class="epi-sec epi2">
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
<?php $cnt=$db5->getSingleResult("SELECT count(f_id) from followers where user_id = '".$frow['user_id']."' or follow=".$frow['user_id']);
$f_id=$db5->getSingleResult("SELECT f_id from followers where user_id = '".$frow['user_id']."' or follow=".$frow['user_id']);
									
									?>
                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="follownew<?=$f_id?>"   fid="<?=$f_id?>" href="javascript:void(0);"> Unfriend </a>

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
										$sql="SELECT * from user_profile where current_city='".$profilerow['current_city']."'  and user_id NOT IN($allfriend) or user_id IN($allfriend1)";
										
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										 $cnt=$db5->getSingleResult("SELECT count(f_id) from followers where user_id = '".$frow['user_id']."' or follow=".$frow['user_id']);
$f_id=$db5->getSingleResult("SELECT f_id from followers where user_id = '".$frow['user_id']."' or follow=".$frow['user_id']);
									
								
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$frow['current_company'];
										$college=$frow['college'];
										$userfpath=$frow['image_id'];
										$currentcity=$frow['current_city'];
										
										?>
                                                        <div class="col-md-6" id="hide<?=$frow['f_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                           <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">   <img src="upload/<?=$userfpath?>" alt="" height="50" width="50"></a>
                                                                            <?php }else{ ?>
                                                                             <a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">     <img src="images/resources/user.png" alt="" height="40" width="40"></a>
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
 	<?php if($cnt>0){	?>																
<a class="clrbtn follownew1"  id="<?=$f_id?>" fid="<?=$f_id?>" href="javascript:void(0);"> Unfriend </a>
	<?php }else{?>
<a class="clrbtn sendreequest"  id="sendreequest<?=$frow1['uder_id']?>"   fid="<?=$frow1['uder_id']?>" href="javascript:void(0);">Add as a Friend</a>
	
	<?php } ?>

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
								
	<?php //post section// ?>
	<link href="lib/css/emoji.css" rel="stylesheet">
									<!-- new post-st end-->
									<style type="text/css">
										.newpost1{}
										.newpost1{}
										.newpost1 .post-st textarea{ width: 100%;     border: none; }
										.newpost1 .post-st{      width: 87%; }
									</style>

	<?php //End post section// ?>
	
 <div class="product-feed-tab current " id="feed-dd">
<form  method="post" id="uploadForm" enctype="multipart/form-data">
									<div class="post-topbar newpost1">
										<h3>Create Post</h3>
										<div class="clreatsot">
										<div class="user-picy">
										<?php if(empty($userspath)){?>
											<img src="images/resources/user.png" alt="" width="50" height="50">
										<?php }else{ ?>
										<img src="upload/<?=$userspath?>" alt="" width="50" height="50" style="border-radius: 50%;">
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
													<select name="selectfeel" id="selectfeel" class="selectfeel" >
													<option value="">Select Feeling</option>
													
																														<?php $db1=new DB();

								 $sql1="SELECT * FROM $_TBL_FEELINGC where status='yes'";

								 $db1->query($sql1)or die($db1->error());

								 while($row1=$db1->fetchArray()){

								 $catid=$row1['id'];

								?>

								 <option value="<?=$catid?>"><?php echo $row1['catname'];?></option>

								 <?php } ?>
														
														<!--<option value="Celebriting">Celebriting</option>
														<option value="Watching">Watching</option>
														<option value="Eating">Eating</option>
														<option value="Drinking">Drinking</option>
														<option value="Traveling">Traveling to</option>
														<option value="Drinking">Attending</option>-->
													</select>
												</li>
												<div  id="feelingtxtHint"></div>
												<li class="feeling-input">
												 
												<p class="lead emoji-picker-container">
											  <input type="text" class="form-control emg" placeholder="what are you feeling..." data-emojiable="true" name="feeling">
											</p>		
												</li>
																			</ul>
										</div>
	<input type="hidden" name="tagfriends" id="tagfriends" value="" placeholder="Search Friends" />
	
	<div class="locationdiv"style="display:none">
	<div class="loctg">
		at
	</div>
	<div class="location-input">
<input type="text" name="livelocationinput" id="livelocationinput" class="form-control livelocationinput" placeholder="where are you..?" value=""  />
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
														<input type="hidden" name="imgid" id="imgid" value=""/>
													</li>

													<li>
														<a id="" class="tagshow">
															<img src="images/users.png">Tag Friends	
															 
														</a>
													</li>

													<li>
														<a  class="feeling">
															<img src="images/emo.png">Feeling/Activity	
															 
														</a>
													</li>

													<li>
														<a  class="livelocation">
															 <img src="images/postloaction.png" alt="new location"> 
															 
														</a>
													</li>

													<li class="postbtnli">
														<button type="button" id="uploadpost" value="Post-Status" class="active postbtn">Post Status</button>
													</li>



													<!--<li>
														<a>
															<img src="images/record.png">Live Video	
															 
														</a>
													</li>-->

											</ul>
 
										</div>
										 

									</div> 
</form>
									<!--new post-st end-->



<div class="posts-section app">
	<div class="app-timeline" id="postshow">
</div>
</div>
									
<div class="posts-section app">
	<div class="app-timeline"id="faq-result">
									
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
						
								
								
								
								
								
								</div><!--main-ws-sec end-->
	                              <!--main-ws-sec end-->

                            </div>
                            <!--product-feed-tab end-->

                          
 <div class="product-feed-tab" id="frq">
                                <div class="portfolio-gallery-sec">
                                    <h3>All Friends Request</h3>
                                   <!-- <div class="portfolio-btn">
                                        <a href="#" title=""><i class="fas fa-plus-square"></i> Add Picture</a>
                                    </div>-->
                                    <div class="gallery_pf">
									
									 
									 <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										 $sql="SELECT * from all_user where user_id IN ( select user_id  from friendrequest where request_fid =".$_SESSION['sess_webid']." and status='1')";
										//$sql="SELECT * from followers where user_id=".$uid;
										$db->query($sql);
										
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
									
										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										$uid1=$frow['user_id'];
										//if($woorking==$profilerow['work']){
										?>
                                                        <div class="col-md-6" id="hide<?=$frow['user_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/user.png" alt="" height="40" width="40">
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
																		
																		<a class="clrbtn freqfollownew"  id="freqfollownew<?=$_SESSION['sess_webid']?>" fid="<?=$_SESSION['sess_webid']?>" href="javascript:void(0);"> Accept</a>
										  
										   <a class="clrbtn delfreqfollownew"  id="delfreqfollownew<?=$_SESSION['sess_webid']?>" fid="<?=$_SESSION['sess_webid']?>" href="javascript:void(0);"> Reject</a>
                                                                        <!--    <a class="clrbtn sendreequest"  id="sendreequest<?=$frow['user_id']?>" fid="<?=$frow['user_id']?>" href="javascript:void(0);"> Send Friend Request</a>-->

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
														<?php }?>
<?php } //else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                                        
                                            </div>


<div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf1=new DB();
										$dbufn=new DB();
										 //echo $sqln="SELECT * from all_user where user_id IN ( select request_fid from friendrequest where user_id =".$_SESSION['sess_webid'].")";
										//$sql="SELECT * from followers where user_id=".$uid;
										 $sqln="SELECT * from friendrequest where user_id =".$_SESSION['sess_webid'];
										$dbufn->query($sqln);
										if($dbufn->numRows()>0)
										{
										 while($frow=$dbufn->fetchArray()){
									$uid1=$frow['request_fid'];
										$woorking=$dbuf1->getSingleResult('select current_company from user_profile where user_id='.$frow['request_fid']);
										$userfpath=$dbuf1->getSingleResult('select image_id from user_profile where user_id='.$frow['request_fid']);
										$currentcity=$dbuf1->getSingleResult("select current_city from user_profile where user_id=".$frow['request_fid']);
										
										$first_name=$dbuf1->getSingleResult("select first_name from user_profile where user_id=".$frow['request_fid']);
										
										//if($woorking==$profilerow['work']){
										?>
                                                        <div class="col-md-6" id="hide<?=$frow['user_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/user.png" alt="" height="40" width="40">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$first_name?></h3>
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
																		
																		<a class="clrbtn "  id="<?=$uid1?>" fid="<?=$uid1?>" href="javascript:void(0);"> Request sent</a>
										  
										   <a class="clrbtn delfreqfollownew"  id="delfreqfollownew<?=$uid1?>" fid="<?=$uid1?>" href="javascript:void(0);"> Delete</a>
                                                                        <!--    <a class="clrbtn sendreequest"  id="sendreequest<?=$frow['user_id']?>" fid="<?=$frow['user_id']?>" href="javascript:void(0);"> Send Friend Request</a>-->

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
														<?php }?>
<?php }else{ echo "<div class='portfolio-gallery-sec'>Result Not Found</div>";}?>
                                                        
                                            </div>

									 
									 
                                      </div>
                                    <!--gallery_pf end-->
                                </div>
                                <!--portfolio-gallery-sec end-->
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
								
								
								   <div class="user-profile-ov">
								
    
                                    <h3><a href="#" title="" class="skills-open1">Social Link <i class="fa fa-plus-square"></i></a></h3>
                                    <ul>
									<?php  $dbs=new DB();
									  $sqls="select * from social_link where user_id =".$_SESSION['sess_webid'];
									  $db->query($sqls);
									  while($rows=$db->fetchArray()){?>
                                        <li><a href="jsvsscript:void(0);" title="" class="skillsdel1" delid="<?=$rows['id']?>"><?=$rows['slink']?></a></li>
<?php }?>
                                     
                                    </ul>
                                </div>
								
								 
                                <!--user-profile-ov end-->
                            </div>
                            <!--product-feed-tab end-->

                            <div class="product-feed-tab" id="portfolio-dd">
                                <div class="portfolio-gallery-sec">
                                    <h3>All Picture</h3>
                                    <div class="portfolio-btn">
                                        <a href="#" title=""><i class="fas fa-plus-square"></i> Add Picture</a>
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
						
						
						<?php //////////Right Section////////////?>
						<div class="col-lg-3">
						<div style="margin-top: 185px;">
						
						<div class="right-sidebar">
									<div class="widget widget-about addwizards">
										<div class="sd-title">
											<h3>Adverts</h3>
											 
										</div>
						<div class="sliderad1">
								<?php 
								 $sql1="SELECT * FROM slider_add where img_type='advertisement' limit 0,2";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){?>
								   <div class="adds-box">
											<a href="slider/<?=$row1['picture']?>" target="_blank">
												<img src="slider/<?=$row1['picture']?>" alt="ads">
											</a>
									</div>
								 <?php } ?>

						</div>

										<!--<div class="adds-box">
											<img src="img/newads.jpg" alt="ads">
										</div>-->


										 
									</div><!--widget-about end-->

									</div>
						</div>
						</div>
						<?php //////////////////////?>
						
                        <!--main-ws-sec end-->
                    </div>

                </div>
            </div>
            <!-- main-section-data end-->
        </div>
       
    </main>
</div>
 </div>
	<div class="overview-box" id="overview-box">
        <div class="overview-edit">
            <h3>Overview</h3>
            <span>5000 character left</span>
            <form id="formoverview" method="post">
                <textarea name="overview" id="overview"><?=$profilerow['about_user']?></textarea>
                <button type="button" class="save" id="overviewsave">Save</button>
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
                <button type="button" class="save" id="savelocation">Save</button>
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
                <button type="button" name="" id="skillssave" class="save">Save</button>
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
            <h3>Socal Media Link</h3>
             <form name="" id="" method="post">
                <input type="text" name="link" id="link" placeholder="Socal Media Link">
                <button type="submit" name="" id="socalsave" class="save">Save</button>
                <!--<button type="submit" class="save-add">Save & Add More</button>-->
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
	
	
	
	
	
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
                <button type="button" id="expsave" class="save">Save</button>
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

                <button type="button" class="save" id="coninfosave">Save</button>
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
                <button type="button" id="expsave" class="save">Save</button>
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
              
                <button type="button" class="save" id="gallerysave">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->
<style>
.wishlistcartemoji1{ width: 300px !important;  height: 200px!important;  position: absolute;    }
.wishlistcartemoji1 li{display:inline;width:50px;}
.wishlistcartemoji1 li a img{    width: 30px !important;  height: 30px !important;}
#close1{float: right; margin:10px;}
</style>
 <ul class="wishlistcartemoji1" id="wishlistcartemoji1" style="display:none;"  >
<div id="close"><a href="javascript:void(0)">X</a></div>
<?php 
  $sql1="SELECT * FROM emoji order by id desc";
$db->query($sql1)or die($db->error());
while($row1=$db->fetchArray()){
 $ext = pathinfo($row1['image'], PATHINFO_EXTENSION);	
if($ext=='mp3'){
	
				$a.='';					 
 }else{	
				$b.='<li>
							  <a href="javascript:void(0);"  im="'.$row1['image'].'"  mp3="'.$row1['mp3'].'"  uid="'.$_SESSION['sess_webid'].'" class="emoji1 emojinew" ><img src="emoji/'.$row1['image'].'" height="50" width="50" />
						</a>
						</li>';

 } } echo $b; ?>
 </ul>

<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&sensor=false&libraries=places&ver=0.4b" async defer></script>
	<script type='text/javascript' src='js/jquery.geocomplete.js?ver=0.4b'></script>
 <input type="hidden" name="uid" value="<?=$_SESSION['sess_webid']?>" id="uid" >
<?php include('footer.php') ?>
<script src="js/profileloadmore.js"></script>
<script src="lib/js/config.js"></script>
    <script src="lib/js/util.js"></script>
    <script src="lib/js/jquery.emojiarea.js"></script>
    <script src="lib/js/emoji-picker.js"></script>
	<script>
	
	$( 'input[type=button]' ).on('click', function(){
            var cursorPos = $('#text').prop('selectionStart');
            var v = $('#text').val();
            var textBefore = v.substring(0,  cursorPos );
            var textAfter  = v.substring( cursorPos, v.length );
            $('#text').val( textBefore+ $(this).val() +textAfter );
        });
		
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
	  
	  
	  /////////////////////////////////////
jQuery(document).ready(function ($) {

jQuery("#livelocationinput").attr("autocomplete","location17");

jQuery("#livelocationinput").geocomplete({
map: ".map_canvas1",
details: "form",
types: ["geocode", "establishment"],
}).bind("geocode:result", function(event, result){
//jQuery("#state").val(result.address_components[2].long_name);
//console.log(result);

});



});

$(".ed-opts .ed-opts-open").click(function(){ 
		$(".ed-options").removeClass("open");
		$(this).parent().children(".ed-options").toggleClass("open");
		//$(".content a").not(this).hide("slow");
	});
    </script> 
