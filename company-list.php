<?php include('header.php') ?>
 
 <section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>All Companies</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6">
<?php
$sql="SELECT * from company_page order by com_id desc limit 0,50";
$db->query($sql);
if($db->numRows()>0)
{
while($row=$db->fetchArray()){
$date=explode('-',$row['created_date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);		
	?>
						
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon.png" alt="">
									<h3><?=$row['page_name']?></h3>
									<h4>Establish  <?php echo date('d M,Y',$st);?></h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="company-profile.php" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
<?php }} ?>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon1.png" alt="">
									<h3>Google Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon2.png" alt="">
									<h3>Pinterest</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon3.png" alt="">
									<h3>Microsoft Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon4.png" alt="">
									<h3>Line Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon5.png" alt="">
									<h3>Linked In</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon6.png" alt="">
									<h3>Apple Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon7.png" alt="">
									<h3>Samsung Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon8.png" alt="">
									<h3>Oppo</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon9.png" alt="">
									<h3>Game loft</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon10.png" alt="">
									<h3>Android Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/cmp-icon11.png" alt="">
									<h3>Oracle</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="company-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
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
		
		



<?php include('footer.php') ?>