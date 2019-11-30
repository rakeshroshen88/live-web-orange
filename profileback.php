<?php include('header.php') ?>


<section class="cover-sec">
	<img src="images/resources/company-cover.jpg" alt="">
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
								<?php if($userspath=='' and empty($userspath)){ ?>
							<img src="images/resources/user.png" alt="">
						<?php }else{?>
							<img src="upload/<?=$userspath?>" alt="" >
						<?php }?>
									
									<div class="add-dp" id="OpenImgUpload">
										<input type="file" id="file">
										<label for="file"><i class="fas fa-camera"></i></label>												
									</div>
								</div><!--user-pro-img end-->
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
												echo $num=$db->getSingleResult("SELECT * from followers where follow=".$_SESSION['sess_webid']);
												?></b>
										</li>
									</ul>
								</div><!--user_pro_status end-->
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
							</div><!--user_profile end-->
							<div class="suggestions full-width">
								<div class="sd-title">
									<h3>Following </h3>
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
											<h4>John Doe</h4>
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
											<span>C & C++ Developer</span>
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
											<h4>John Doe</h4>
											<span>PHP Developer</span>
										</div>
										<span><i class="la la-plus"></i></span>
									</div>
									<div class="view-more">
										<a href="#" title="">View More</a>
									</div>
								</div><!--suggestions-list end-->
							</div><!--suggestions end-->
						</div><!--main-left-sidebar end-->
					</div>
					<div class="col-lg-9">
						<div class="main-ws-sec">
							<div class="user-tab-sec rewivew">
								<h3>John Doe</h3>
								<div class="star-descp">
									<span>Graphic Designer at Self Employed</span>
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star-half-o"></i></li>
									</ul>
									<a href="#" title="">Status</a>
								</div><!--star-descp end-->
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
												<span>follower</span>
											</a>
										</li>
										<li data-tab="my-bids">
											<a href="#" title="">
												<img src="images/ic5.png" alt="">
												<span>Following</span>
											</a>
										</li>
										<li data-tab="portfolio-dd">
											<a href="#" title="">
												<img src="images/ic3.png" alt="">
												<span>Photo</span>
											</a>
										</li>


									</ul>
								</div><!-- tab-feed end-->
							</div><!--user-tab-sec end-->
							<div class="product-feed-tab" id="saved-jobs">
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
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
										 <div class="row">
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
										 <div class="row">
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="tab-pane fade show active" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">

										<div class="row">
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
										 
									</div>	
								</div>
							</div>
							<div class="product-feed-tab current" id="feed-dd">
								<div class="posts-section">
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
												<h3>UI Designer</h3>
												 
												<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using ... <a href="#" title="">view more</a></p>
												
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
												<h3>UI Designer</h3>
												 
												<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using ... <a href="#" title="">view more</a></p>
												
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


									<div class="process-comm">
										<div class="spinner">
											<div class="bounce1"></div>
											<div class="bounce2"></div>
											<div class="bounce3"></div>
										</div>
									</div><!--process-comm end-->
								</div><!--posts-section end-->
							</div><!--product-feed-tab end-->

							<div class="product-feed-tab" id="my-bids">
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
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
										 <div class="row">
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
										 <div class="row">
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="tab-pane fade show active" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">

										<div class="row">
											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">

															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>


															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="col-md-6">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="images/resources/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
																		<li><img src="images/icon9.png" alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Accept</a></li>
																<li><a href="#" title="">Unbid</a></li>
																<li><a href="#" title="">Close</a></li>
																<li><a href="#" title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn" href="#"> Unfollow</a>
																
																
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
										 
									</div>	
								</div>
							</div><!--product-feed-tab end-->

							<div class="product-feed-tab" id="info-dd">
								<div class="user-profile-ov">
									<h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac magna convallis bibendum. Quisque laoreet augue eget augue fermentum scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
								</div><!--user-profile-ov end-->
								<div class="user-profile-ov st2">
									<h3><a href="#" title="" class="exp-bx-open">Experience </a><a href="#" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
									<h4>Web designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
									<h4>UI / UX Designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
									<h4>PHP developer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
									<p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
								</div><!--user-profile-ov end-->

							 

								<div class="user-profile-ov newcontactabout">
									<h3>Contact and Basic Info</a>  </h3>
									<h4>Contact Information</h4>

									<ul class="list-tab-contact">
										<li><span class="lable">Mobile Number</span> <span class="details">93965245242</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

										<li><span class="lable">Email</span> <span class="details">hello@gmail.co</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

										<li><span class="lable">Social Links</span> <span class="details">www.thiswebsite.com</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>


										<li><span class="lable">Birth Date</span> <span class="details">25th Jan</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

										<li><span class="lable">Birth Year</span> <span class="details">1989</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

										<li><span class="lable">Gender</span> <span class="details">Female</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>

										<li><span class="lable">Interested In</span> <span class="details">Male & Female	</span> <span class="eidt-list"><a href="#" title="" class="contact-box-open"><i class="fa fa-pencil"></i></a></span></li>



									</ul>


								 
								</div><!--user-profile-ov end-->






								<div class="user-profile-ov">
									<h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
									<h4>Master of Computer Science</h4>
									<span>2015 - 2018</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
								</div><!--user-profile-ov end-->
								<div class="user-profile-ov">
									<h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
									<h4>India</h4>
									<p>151/4 BT Chownk, Delhi </p>
								</div><!--user-profile-ov end-->
								<div class="user-profile-ov">
									<h3><a href="#" title="" class="skills-open">Skills</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a></h3>
									<ul>
										<li><a href="#" title="">HTML</a></li>
										<li><a href="#" title="">PHP</a></li>
										<li><a href="#" title="">CSS</a></li>
										<li><a href="#" title="">Javascript</a></li>
										<li><a href="#" title="">Wordpress</a></li>
										<li><a href="#" title="">Photoshop</a></li>
										<li><a href="#" title="">Illustrator</a></li>
										<li><a href="#" title="">Corel Draw</a></li>
									</ul>
								</div><!--user-profile-ov end-->
							</div><!--product-feed-tab end-->

							<div class="product-feed-tab" id="my-bids">
								<div class="posts-section">
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="images/resources/us-pic.png" alt="">
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
												<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
											</ul>
											<a><i class="la la-eye"></i>Views 50</a>
										</div>
									</div><!--post-bar end-->
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="images/resources/us-pic.png" alt="">
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
												<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
											</ul>
											<a><i class="la la-eye"></i>Views 50</a>
										</div>
									</div><!--post-bar end-->
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="images/resources/us-pic.png" alt="">
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
												<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
											</ul>
											<a><i class="la la-eye"></i>Views 50</a>
										</div>
									</div><!--post-bar end-->
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="images/resources/us-pic.png" alt="">
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
												<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
											</ul>
											<a><i class="la la-eye"></i>Views 50</a>
										</div>
									</div><!--post-bar end-->
									<div class="process-comm">
										<a href="#" title=""><img src="images/process-icon.png" alt=""></a>
									</div><!--process-comm end-->
								</div><!--posts-section end-->
							</div><!--product-feed-tab end-->
							<div class="product-feed-tab" id="portfolio-dd">
								<div class="portfolio-gallery-sec">
									<h3>Portfolio</h3>
									<div class="portfolio-btn">
										<a href="#" title=""><i class="fas fa-plus-square"></i> Add Portfolio</a>
									</div>
									<div class="gallery_pf">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img1.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img2.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img3.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img4.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img5.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img6.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img7.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img8.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img9.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="images/resources/pf-img10.jpg" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
										</div>
									</div><!--gallery_pf end-->
								</div><!--portfolio-gallery-sec end-->
							</div><!--product-feed-tab end-->

						</div><!--main-ws-sec end-->
					</div>

				</div>
			</div><!-- main-section-data end-->
		</div> 
	</div>
</main>

<div class="overview-box" id="overview-box">
	<div class="overview-edit">
		<h3>Overview</h3>
		<span>5000 character left</span>
		<form>
			<textarea></textarea>
			<button type="submit" class="save">Save</button>
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->


<div class="overview-box" id="experience-box">
	<div class="overview-edit">
		<h3>Experience</h3>
		<form>
			<input type="text" name="subject" placeholder="Subject">
			<textarea></textarea>
			<button type="submit" class="save">Save</button>
			<button type="submit" class="save-add">Save & Add More</button>
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="contact-box">
	<div class="overview-edit">
		<h3>Contact Info</h3>
		<form>

			<div class="row">
					<div class="col-lg-6 no-left-pd">
						<input type="text" name="school" placeholder="Mobile Number">
					</div>
					<div class="col-lg-6 no-righ-pd">
						<input type="Email" name="school" placeholder="Email">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 no-left-pd">
						<input type="text" name="school" placeholder="Social Links">
					</div>
					<div class="col-lg-6 no-righ-pd">
						<div class="datefm">
							<input type="text" name="from" placeholder="From" class="datepicker">	
							<i class="fa fa-calendar"></i>
						</div>
					</div>
					
				</div>

				<div class="row">
					 <div class="col-lg-6 no-left-pd">
						<select>
							<option>Gender</option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>
					<div class="col-lg-6 no-righ-pd">
						<select>
							<option>Interested In</option>
							<option>Male</option>
							<option>Female</option>
							<option>Male & Female</option>
						</select>
					</div>
				</div>

			  
			<button type="submit" class="save">Save</button> 
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="education-box">
	<div class="overview-edit">
		<h3>Education</h3>
		<form>
			<input type="text" name="school" placeholder="School / University">
			<div class="datepicky">
				<div class="row">
					<div class="col-lg-6 no-left-pd">
						<div class="datefm">
							<input type="text" name="from" placeholder="From" class="datepicker">	
							<i class="fa fa-calendar"></i>
						</div>
					</div>
					<div class="col-lg-6 no-righ-pd">
						<div class="datefm">
							<input type="text" name="to" placeholder="To" class="datepicker">
							<i class="fa fa-calendar"></i>
						</div>
					</div>
				</div>
			</div>
			<input type="text" name="degree" placeholder="Degree">
			<textarea placeholder="Description"></textarea>
			<button type="submit" class="save">Save</button>
			<button type="submit" class="save-add">Save & Add More</button>
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="location-box">
	<div class="overview-edit">
		<h3>Location</h3>
		<form>
			<div class="datefm">
				<select>
					<option>Country</option>
					<option value="pakistan">Pakistan</option>
					<option value="england">England</option>
					<option value="india">India</option>
					<option value="usa">United Sates</option>
				</select>
				<i class="fa fa-globe"></i>
			</div>
			<div class="datefm">
				<select>
					<option>City</option>
					<option value="london">London</option>
					<option value="new-york">New York</option>
					<option value="sydney">Sydney</option>
					<option value="chicago">Chicago</option>
				</select>
				<i class="fa fa-map-marker"></i>
			</div>
			<button type="submit" class="save">Save</button>
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="skills-box">
	<div class="overview-edit">
		<h3>Skills</h3>
		<ul>
			<li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
			<li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
			<li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
		</ul>
		<form>
			<input type="text" name="skills" placeholder="Skills">
			<button type="submit" class="save">Save</button>
			<button type="submit" class="save-add">Save & Add More</button>
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->

<div class="overview-box" id="create-portfolio">
	<div class="overview-edit">
		<h3>Create Portfolio</h3>
		<form>
			<input type="text" name="pf-name" placeholder="Portfolio Name">
			<div class="file-submit">
				<input type="file" id="file">
				<label for="file">Choose File</label>	
			</div>
			<div class="pf-img">
				<img src="images/resources/np.png" alt="">
			</div>
			<input type="text" name="website-url" placeholder="htp://www.example.com">
			<button type="submit" class="save">Save</button>
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->


<?php include('footer.php') ?>