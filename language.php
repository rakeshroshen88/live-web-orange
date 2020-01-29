<?php include('header.php'); 
//include('chksession.php');
						$dbn=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
						?>

<style>#container
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
}
.product-feed-tab {
    float: left;
    width: 100%;
    display: block !important;
}
.portfolio-gallery-sec h3 {
    font-weight: 600;
    font-size: 18px;
    margin-bottom: 0px !important; 
    padding-left: 5px;
	float: none !important; 
   
}

.cover-sec {
    height: 143px !important; 
    overflow: hidden;
}
</style>

    <section class="cover-sec">
	
		<label style="position:absolute; right:10%; bottom:10%;">
			
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
                                            <li>
                                                <span>Following</span>
                                                <b><?php 
												 $num1=$db->getSingleResult("SELECT count(f_id) from followers where user_id=".$_SESSION['sess_webid']." limit 0,5");
												if(empty($num1)){ echo "0";}else{ echo $num1; }
												?></b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b><?php 
												
												 $num=$db->getSingleResult("SELECT count(f_id) from followers where follow=".$_SESSION['sess_webid']);
												 if(!empty($num)){ echo $num;}else{ echo "0";}
												?></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->
                                  <?php if(!empty($profilerow['website'])){?>
                                    <ul class="social_links">
                                        <li><a href="#" title=""><i class="la la-globe"></i> <?=$profilerow['website']?></a></li>
                                        
                                    
									<?php } ?>
									
									<?php  $dbs=new DB();
									  $sqls="select * from social_link where user_id =".$_SESSION['sess_webid'];
									  $db->query($sqls);
									  while($rows=$db->fetchArray()){?>
                                        <li><a href="<?=$rows['slink']?>" title="" target="_blank"><i class="la la-globe"></i><?=$rows['slink']?></a></li>
									<?php }?>

									</ul>
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
												<img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
											<?php }else{ ?>
											<img src="images/resources/user.png" alt="" height="40" width="40">
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
									
                                <!--user_profile end
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Following </h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                   
                                </div>-->
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9">
						
                                <!--user-tab-sec end-->
							
                            <div class="main-ws-sec profile-lisgn">
                              <div class="user-tab-sec rewivew">
                                   <h3>Welcome to</h3><p>Akwa Ibom</p>
                                                                       
                                </div>
                            
                            <div class="product-feed-tab" >
                                <div class="portfolio-gallery-sec">
                                    
									<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<h3>English</h3></br>
									<textarea name="tlanguage" id="tlanguage" placeholder="Type your Text !" rows="12" cols="50"style="border-radius: 5px;"></textarea></div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<h3>Hindi</h3></br>
									<textarea rows="12" cols="50" name="rlanguage" id="rlanguage" readonly style="border-radius: 5px;"></textarea></div>
									</div>
                                   
                                   
                                <div class="row"><p>&nbsp; </br>	</p>
							     <h3>Library</h3>
								 <p>
								 <input type="text" placeholder="search" name="libsearch"/></p>
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


<script>

$(document).ready(function(){
	$("#tlanguage").keyup(function(){
		$.ajax({
		type: "POST",
		url: "languageprint.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			//$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#rlanguage").show();
			$("#rlanguage").html(data);
			$("#rlanguage").css("background","#FFF");
		}
		});
	});
});
</script>
<?php include('footer.php');?>