<?php include('header.php') ?>
 <div class="vchat" id="vchat">
 <section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>All Companies</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
						
<?php $db1=new DB();
$sql="SELECT * from company_page order by com_id desc limit 0,50";
$db->query($sql);
if($db->numRows()>0)
{
while($row=$db->fetchArray()){
$date=explode('-',$row['created_date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);		
	?>
						<div class="col-md-3">
							<div class="company_profile_info">
								<div class="company-up-info">
								 <?php if($row['imgid']=='' and empty($row['imgid'])){ ?>
                                            <img src="images/resources/cmp-icon.png" id="rmvid" alt="" style="width: 150px; height:150px;">
                                            <?php }else{?>
                                             <img src="upload/<?=$row['imgid']?>" id="rmvid" alt="" style="width: 130px;     height: 130px;">
                                           <?php }?>
									
									<h3><?=$row['page_name']?></h3>
									<h4>Establish  <?php echo date('d M,Y',$st);?></h4>
									<ul>
									<?php $cnt=$db1->getSingleResult("SELECT count(com_id) from com_like where user_id = '".$_SESSION['sess_webid']."' and do_like = '1' and com_id=".$row['com_id']);
									if($cnt>0){
									?>
										<li><a href="javascript:void(0);" title="" id="f<?=$row['com_id']?>" com="<?=$row['com_id']?>" class="follow comfollow">Liked</a></li>
									<?php }else{ ?>	
										<li><a href="javascript:void(0);" title="" id="f<?=$row['com_id']?>" com="<?=$row['com_id']?>" class="follow comfollow">Like</a></li>
									<?php } ?>
										
									<!--	<li><a href="company-profile.php?comid=<?=$row['com_id']?>" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>-->
									</ul>
								</div>
								<a href="company-profile.php?comid=<?=$row['com_id']?>" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
<?php } } ?>
					
					</div>
				</div><!--companies-list end-->
				<div class="process-comm">
					<div class="spinner">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div><!--process-comm end-->
			</div>
		</section><!--companies-info end-->
		
		


 </div>
<?php include('footer.php') ?>