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
                                            <img src="images/resources/user.png" id="rmvid" alt="" width="120" height="120">
                                            <?php }else{?>
                                                <img src="upload/<?=$profilerow['image_id']?>" id="rmvid" alt="" width="120" height="120">
                                                <?php }?>
												<!-- <input type="file" id="file1">-->
												
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
                                  
								  </div>
                                <!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Filter </h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                   
                                </div>
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec rewivew">
                                    <h3><?=$_SESSION['sess_name']?></h3>
                                    <div class="star-descp">
                                        <span><?=$profilerow['current_company']?>
													</span>
                                      
                                    </div>
                                    <!--star-descp end-->
                                    <div class="tab-feed st2 settingjb">
                                        <ul>
                                           
                                           
                                            
                                         

                                        </ul>
                                    </div>
                                    <!-- tab-feed end-->
                                </div>
                                <!--user-tab-sec end-->
                                <div class="product-feed-tab current" id="saved-jobs">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active  " id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">All Friends</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="profile" aria-selected="false">Following</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#applied" role="tab" aria-controls="applied" aria-selected="false">Suggetions Near You</a>
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
										$q=$_POST['searchpage'];
										$sql="select * from all_user where first_name like '%$q%' or last_name like '%$q%' order by user_id ";
										 //$sql="SELECT * from all_user where user_id NOT IN ( select follow from followers) ";
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
                                                                                <img src="images/resources/user.png" alt="" width="40" height="40">
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

                                                        <?php }}else{ echo "<div class='portfolio-gallery-sec'>No match</div>"; }?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										//$sql="SELECT * from all_user where user_id IN ( select follow from followers) ";
										$sql11="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										$db->query($sql11);
										 //$sql="SELECT * from followers where user_id IN(SELECT follow from user_profile where work='".$profilerow['work']."')";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										//echo 'select first_name from '.$_TBL_USER." where user_id=".$frow['follow'];
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
                                                                                <img src="images/resources/user.png" alt="" width="40" height="40">
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
<?php }else{ echo "<div class='portfolio-gallery-sec'>No match</div>";}?>
                                                        
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										$dbus=new DB();
										 $sqls="SELECT * FROM user_profile where zip_code='".$profilerow['zip_code']."' limit 0,50";
										//$sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where college='".$profilerow['college']."')";
										$dbus->query($sqls);
										if($dbus->numRows()>0)
										{
										 while($frow1=$dbus->fetchArray()){
										//image_id
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow1['user_id']);
										$userfpath=$frow1['image_id'];	
										$woorking=$frow1['work'];
										$currentcity=$frow1['current_city'];
										?>
                                                        <div class="col-md-6" id="hide<?=$frow1['user_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($userfpath)){?>
                                                                            <img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/user.png" alt="" width="40" height="40">
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
                                                                            <a class="clrbtn follownew"  id="follownew<?=$frow1['uder_id']?>"   fid="<?=$frow1['uder_id']?>" href="javascript:void(0);">follow</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php }?>
														<?php }else{ echo "<div class='portfolio-gallery-sec'>No match</div>";}?>
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
                                                                                <img src="images/resources/user.png" alt="" width="40" height="40">
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
<?php }else{  echo "<div class='portfolio-gallery-sec'>No match</div>";}?>
                                                        
                                            </div>

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
	

    <?php include('footer.php') ?>