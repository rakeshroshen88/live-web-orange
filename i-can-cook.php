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

     

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 pd-left-none no-pd leftbar-mainlist">
								<div class="main-left-sidebar no-margin">
									<div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
												<style type="text/css">

												</style>

												<div class="profile-newimg">
													<div class="newimg-lfet">
														<?php  $dbn=new DB();
						$db2=new DB();
						   $sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						while($rowi=$dbn->fetchArray()){
							 $impid=$rowi['image_id'];
						}
						?>
						<?php if($impid=='' and empty($impid)){ echo "$impid";?>
							<img src="images/resources/user.png"  alt="" >
						<?php }else{?>
							<img src="upload/<?=$impid?>" alt="" >
						<?php }?>

													 
													</div>
													<div class="profiledetailsname">
														<h2><?=$_SESSION['sess_name']?></h2>
														<p><?php 
												echo $emp=$db->getSingleResult("SELECT current_company from user_profile where user_id=".$_SESSION['sess_webid']);
												
												?> Mutual Friends</p>
													</div>

												</div>



												<!--<div class="usr-pic">
						<?php  $dbn=new DB();
						$db2=new DB();
						   $sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						while($rowi=$dbn->fetchArray()){
							 $impid=$rowi['image_id'];
						}
						?>
						<?php if($impid=='' and empty($impid)){ echo "$impid";?>
							<img src="images/resources/user.png"  alt="" height="90" width="90">
						<?php }else{?>
							<img src="upload/<?=$impid?>" alt="" height="90" width="90">
						<?php }?>
												    
												 
													
												</div>  -->
											</div><!--username-dt end-->
											<!-- <div class="user-specs">
												<h3><?=$_SESSION['sess_name']?></h3>
												<span><?php 
												echo $emp=$db->getSingleResult("SELECT current_company from user_profile where user_id=".$_SESSION['sess_webid']);
												
												?></span>
											</div>-->
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li><!--javascript:void(0)" id="follow-->
												<a href="my-profile.php"><h4><span class="foocat">Following </span><span class="follusingnumber"><?php 
												 $num1=$db->getSingleResult("SELECT count(f_id) from followers where user_id=".$_SESSION['sess_webid']." limit 0,5");
												if(empty($num1)){ echo "0";}else{ echo $num1; }
												?></span></h4></a>
												
											</li> 
											<li>
												<h4><span class="foocat">Followers </span> <span class="follusingnumber"><?php 
												 $num=$db->getSingleResult("SELECT count(f_id) from followers where follow=".$_SESSION['sess_webid']);
												 if(empty($num)){ echo "0";}else{ echo $num; }
												?></span></h4>
												
											</li>
											<li>
												<a href="javascript:void(0);" ><h4><span class="foocat">Message </span> <span class="follusingnumber"><?php 
												 $query = "
	SELECT * FROM chat_message 
	WHERE from_user_id = '".$_SESSION['sess_webid']."'	
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	echo $countm = $statement->rowCount();
												// $message=$db->getSingleResult("SELECT * from message where user_id=".$_SESSION['sess_webid']);
												 //if(empty($countm)){ echo "0";}
												?></span></h4></a>
												
											</li>

											<li>
												<a href="my-profile.php" title="" class="viewprobtn">View Profile</a>
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
											
											
                                    <ul class="social_links">
                                       <!-- <li><a href="#" title=""><i class="la la-globe"></i> <?=$profilerow['website']?></a></li>
                                        -->
                                    
									
									
									<?php  $dbs=new DB();
									  $sqls="select * from social_link where user_id =".$_SESSION['sess_webid'];
									  $db->query($sqls);
									  while($rows=$db->fetchArray()){?>
                                        <li><a href="<?=$rows['slink']?>" title="" target="_blank"><i class="la la-globe"></i><?=$rows['slink']?></a></li>
									<?php }?>

									</ul>
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									<!--<div class="tags-sec full-width">
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
                        <div class="col-lg-9 width78">
						 
                                <!--user-tab-sec end-->
							
                            <div class="main-ws-sec profile-lisgn newtranstionsl">
                              <div class="user-tab-sec rewivew" style="height: 200px; text-align: center; margin-top: 20px;">
                              	<!--<div class="imgtranTop">
                              		<img src="/img/langturuimb.jpg" alt="imgtranTop">
                              	</div>-->
                              	<div class="imgtranTophead" style="margin-left: 65px;">
                                   <h3>Welcome to</h3>
                                   <p>I CAN COOK</p>
                                  </div>                            
                                </div>
                            
                            <div class="product-feed-tab" >
                                <div class="portfolio-gallery-sec">
                                    
								
                                   
                                <div id="library">   
                                <div class="row tras_sub_title">
									<div class="col-md-12">
										 <h3>Library</h3>
											</br>
					<style>
					.active-pink-2 input[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.active-pink input[type=text] {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.active-purple-2 input[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #ce93d8;
  box-shadow: 0 1px 0 0 #ce93d8;
}
.active-purple input[type=text] {
  border-bottom: 1px solid #ce93d8;
  box-shadow: 0 1px 0 0 #ce93d8;
}
.active-cyan-2 input[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan input[type=text] {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan .fa, .active-cyan-2 .fa {
  color: #4dd0e1;
}
.active-purple .fa, .active-purple-2 .fa {
  color: #ce93d8;
}
.active-pink .fa, .active-pink-2 .fa {
  color: #f48fb1;
}

.controltranstion h3 {
    border-bottom: 1px solid #ff5e00 !important;
    padding: 7px 0;
    color: #ff5e00; !important;
    font-weight: normal;
    font-size: 15px;
    margin-bottom: 7px !important;
	 margin-bottom: 7px !important;
}
.mr-3{
    margin-right: -2rem !important;
}
					</style>	

<script>

$(document).ready(function() {
     $("#example").DataTable();
} );
	</script>				<!-- Search form -->
<!--<form class="form-inline active-cyan-4">
  <input class="form-control form-control-sm mr-3 w-25" type="text" placeholder="Search"
    aria-label="Search">
  <i class="fas fa-search" aria-hidden="true"></i>
</form>-->
									</div>
								</div>
								
								
								
															
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th><b> Cuisine </b>(A-Z) </th>
            <th>Duration</th>
            <th>Size</th>
        
        </tr>
    </thead>
	
    <tbody>
         <?php
										$sql="SELECT * FROM allvideo";
										$db->query($sql)or die($db->error());
										while($row=$db->fetchArray()){	?>
										<tr>
										 <td><?=$row['title']?><span style="float: right; padding-right: 30px;" class="controltranstion"> <a href="i-can-cook-play-video.php?vid=<?=$row['id']?>"class='aplay'><i class='fa fa-play' title='play'  aria-hidden='true'></i>
										</a></span></td>
								
										 <td><?php $du=$row['duration'];
										  $duration=$du/60;
										  echo number_format($duration,2);
										 ?> Mins</td>
										
										
										
										 <td >
										 <?=sizeFormat($row['videosize'])?>
										 </td>
										 
										
										
										</tr>
										<?php }?>
		
       
     
    
       
       
	   </tbody>
</table>

<table border="0" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td class="gutter">
                <div class="line number1 index0 alt2" style="display: none;">1</div>
            </td>
            <td class="code">
                <div class="container" style="display: none;">
                    <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<?php
function sizeFormat($bytes){ 
$kb = 1024;
$mb = $kb * 1024;
$gb = $mb * 1024;
$tb = $gb * 1024;

if (($bytes >= 0) && ($bytes < $kb)) {
return $bytes . ' B';

} elseif (($bytes >= $kb) && ($bytes < $mb)) {
return ceil($bytes / $kb) . ' KB';

} elseif (($bytes >= $mb) && ($bytes < $gb)) {
return ceil($bytes / $mb) . ' MB';

} elseif (($bytes >= $gb) && ($bytes < $tb)) {
return ceil($bytes / $gb) . ' GB';

} elseif ($bytes >= $tb) {
return ceil($bytes / $tb) . ' TB';
} else {
return $bytes . ' B';
}
}
?>		
								
								
								
								
								
                          
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
<input type="hidden" name="audioval" id="audioval" value="" />
<div id="audioplay1"></div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>

<!-- DataTables Select CSS -->
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- DataTables Select JS -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    <?php include('footer.php') ?>


