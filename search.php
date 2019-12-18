<?php include('header.php'); 
include('chksession.php');
						$dbn=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
						?>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="main-ws-sec">
                                
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
										
										<li class="nav-item">
                                            <a class="nav-link  " id="companies-tab" data-toggle="tab" href="#companies" role="tab" aria-controls="contact" aria-selected="false">Companies</a>
                                        </li>
										
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade  show active  " id="mange" role="tabpanel" aria-labelledby="mange-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuf=new DB();
										$db7=new DB();
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
                                                        <div class="col-md-4">
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

<?php $cnt=$db7->getSingleResult("SELECT count(f_id) from followers where user_id = '".$_SESSION['sess_webid']."' and follow=".$frow['user_id']);
							
							$f_id=$db7->getSingleResult("SELECT f_id from followers where user_id = '".$_SESSION['sess_webid']."' and follow=".$frow['user_id']);
									if($cnt>0){
									?>
                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="<?=$f_id?>" fid="<?=$f_id?>" href="javascript:void(0);"> Unfollow</a>
                                                                        </div>
																		
									<?php }else{ ?>
														<div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew"  id="<?=$cityrow['user_id']?>" fid="<?=$cityrow['user_id']?>" href="javascript:void(0);"> follow</a>
                                                                        </div>
									<?php } ?>	
                                                                        <!--<div class="devepbtn appliedinfo noreply">
                                                    <a class="clrbtn follownew" id="follownew<?=$frow['user_id']?>" fid="<?=$frow['user_id']?>" href="javascript:void(0);" >follow</a>

                                                                        </div>-->
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
										$db6=new DB();
										//$sql="SELECT * from all_user where user_id IN ( select follow from followers) ";
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
										
										$sql11="select * from all_user where first_name like '%$q%' or last_name like '%$q%' and user_id IN($allfriend) GROUP BY user_id ";
										$db->query($sql11);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										//echo 'select first_name from '.$_TBL_USER." where user_id=".$frow['follow'];
										//$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);
										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										//if($woorking==$profilerow['work']){
										?>
                                                        <div class="col-md-4" id="hide<?=$frow['user_id']?>">
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
                                                                    <div class="job_descp noborder float-right">
																	
																	<?php $cnt=$db6->getSingleResult("SELECT count(f_id) from followers where user_id = '".$_SESSION['sess_webid']."' and follow=".$frow['user_id']);
							
							$f_id=$db6->getSingleResult("SELECT f_id from followers where user_id = '".$_SESSION['sess_webid']."' and follow=".$frow['user_id']);
									if($cnt>0){
									?>
                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="<?=$f_id?>" fid="<?=$f_id?>" href="javascript:void(0);"> Unfollow</a>
                                                                        </div>
																		
									<?php }else{ ?>
														<div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew"  id="<?=$cityrow['user_id']?>" fid="<?=$cityrow['user_id']?>" href="javascript:void(0);"> follow</a>
                                                                        </div>
									<?php } ?>	

                                                                      <!--  <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="follownew1<?=$frow['f_id']?>" fid="<?=$frow['f_id']?>" href="javascript:void(0);"> follow</a>

                                                                        </div>-->
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
                                                        <div class="col-md-4" id="hide<?=$frow1['user_id']?>">
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
                                                                    <div class="job_descp noborder float-right">

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
										$db5=new DB();
										//$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										// $sql="SELECT * from followers where follow IN(SELECT user_id from user_profile where current_city='".$profilerow['current_city']."')";
										 $sql="SELECT * from user_profile where current_city='".$profilerow['current_city']."'";
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($cityrow=$db->fetchArray()){
										//$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['follow']);

										//$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['follow']);
										//$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['follow']);
										//$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['follow']);
//if($currentcity==$profilerow['current_city']){
										?>
                                                        <div class="col-md-4" id="hide<?=$frow['f_id']?>">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($cityrow['image_id'])){?>
                                                                            <img src="upload/<?=$cityrow['image_id']?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/user.png" alt="" width="40" height="40">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$cityrow['first_name']?></h3>
                                                                                        <div class="epi-sec epi2">
                                                                                            <ul class="descp descptab bklink">
          <?php if(!empty($cityrow['current_company'])){ ?> 
		  <li><img src="images/icon8.png" alt=""><span><?=$cityrow['current_company']?></span></li>
		  <?php }?>  
		  <?php if(!empty($cityrow['current_city'])){ ?>                                                                             <li><img src="images/icon9.png" alt=""><span><?=$cityrow['current_city']?></span></li>
		   <?php }?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="job_descp noborder float-right">
							<?php $cnt=$db5->getSingleResult("SELECT count(f_id) from followers where user_id = '".$_SESSION['sess_webid']."' and follow=".$cityrow['user_id']);
							
							$f_id=$db5->getSingleResult("SELECT f_id from followers where user_id = '".$_SESSION['sess_webid']."' and follow=".$cityrow['user_id']);
									if($cnt>0){
									?>
                                                                        <div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew1"  id="<?=$f_id?>" fid="<?=$f_id?>" href="javascript:void(0);"> Unfollow</a>
                                                                        </div>
																		
									<?php }else{ ?>
														<div class="devepbtn appliedinfo noreply">
                                                                            <a class="clrbtn follownew"  id="<?=$cityrow['user_id']?>" fid="<?=$cityrow['user_id']?>" href="javascript:void(0);"> follow</a>
                                                                        </div>
									<?php } ?>									
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
														<?php }?>
<?php }else{  echo "<div class='portfolio-gallery-sec'>No match</div>";}?>
                                                        
                                            </div>

                                        </div>
                                   
									<?php ////////////////////////////////?>
									
									 <div class="tab-pane fade" id="companies" role="tabpanel" aria-labelledby="companies-tab">
                                            <div class="row">
                                                <?php ////////follower All Friends//////////?>
                                                    <?php 
										$dbuc=new DB();
										$dbuc1=new DB();
										$q=$_POST['searchpage'];
										$sql="select * from company_page where page_name like '%$q%'  order by com_id ";
										 //$sql="SELECT * from all_user where user_id NOT IN ( select follow from followers) ";
										$dbuc->query($sql);
										if($dbuc->numRows()>0)
										{
										 while($frow=$dbuc->fetchArray()){
										//$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuc1->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										//$userfpath=$dbuc1->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuc1->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										?>
                                                        <div class="col-md-4">
                                                            <div class="post-bar">
                                                                <div class="post_topbar applied-post">
                                                                    <div class="usy-dt">
                                                                        <?php if(!empty($frow['imgid'])){?>
                                                                            <img src="upload/<?=$frow['imgid']?>" alt="" height="50" width="50">
                                                                            <?php }else{ ?>
                                                                                <img src="images/resources/cmp-icon.png" alt="" width="40" height="40">
                                                                                <?php }?>
                                                                                    <div class="usy-name">
                                                                                        <h3><?=$frow['page_name']?></h3>
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
                                                                    <div class="job_descp noborder float-right">
<?php $cnt=$dbuc1->getSingleResult("SELECT count(com_id) from com_like where user_id = '".$_SESSION['sess_webid']."' and do_like = '1' and com_id=".$frow['com_id']);
									if($cnt>0){
									?>
                                                                        <div class="devepbtn appliedinfo noreply">
                                                    <a class="clrbtn comfollow" id="f<?=$frow['com_id']?>" com="<?=$frow['com_id']?>" href="javascript:void(0);" >liked</a>

                                                                        </div>
									<?php }else{ ?>		
											<div class="devepbtn appliedinfo noreply">
                                                    <a class="clrbtn comfollow" id="f<?=$frow['com_id']?>" com="<?=$frow['com_id']?>" href="javascript:void(0);" >like</a>

                                                                        </div>
									<?php } ?>									
																		
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php }}else{ echo "<div class='portfolio-gallery-sec'>No match</div>"; }?>
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