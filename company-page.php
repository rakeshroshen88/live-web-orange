<?php 
  include('config.inc.php');
$makearr1=array();
$makearr1=getValuesArr( 'com_category', "id","catname","", "" );
//if(!empty($_SESSION['sess_webid'])){redirect("dashboard.php");}
$makearr=array();
$makearr=getValuesArr( $_TBL_COUNTRIES, "country_id","name","", "" );
  
?>
<!DOCTYPE html>
<html>
 
<head>
	<meta charset="UTF-8">
	<title>Create Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	 
</head>


<body class="sign-in" oncontextmenu="return false;">
	

	<div class="wrapper">		

		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
									<img src="images/cm-logo.png" alt="">
									<p>OrangeState,  is a global  platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
								</div><!--cm-logo end-->	
								<img src="images/cm-main-img.png" alt="">			
							</div><!--cmp-info end-->
						</div>
						<div class="col-lg-6">
							<div class="login-sec">
								<ul class="sign-control">
													
									<li data-tab="tab-2"><a href="#" title="">Sign up</a></li>				
								</ul>			
								<div class="sign_in_sec current" id="tab-1">
									
									
									<h4 style="color:#FF0000;"><?php
									//$nonce='decode';
									if(!empty($_REQUEST['msg'])){
									$decoded = base64_decode($_REQUEST['msg']);
									 echo $decoded;}?></h4></br>
									
								</div><!--sign_in_sec end-->
								
								<div class="sign_in_sec" id="tab-2">
									<div class="signup-tab">
									<h4 style="color:#FF0000;" id="company_error"></h4>
										<i class="fa fa-long-arrow-left"></i>
										<!--<h2>johndoe@example.com</h2>-->
										<ul>
											
											<li data-tab="tab-4" class="current"><a href="#" title="">Company</a></li>
										</ul>
									</div>
									<div id="success"></div>
									 
									<div class="dff-tab" id="tab-4">
										<form name="companyform" id="companyform" action="" method="post">
											<div class="row">
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="company-name" id="company-name" placeholder="Company Name">
														<i class="la la-building"></i>
													</div>
													<span id="error_com" class="text-danger"></span>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
													<?php echo createComboBox($makearr,"country", ""," id='country1' class='custom-select d-block w-100'")?>
												<!--	/* <select  name="country1" id="country1" placeholder="Country">
															<option>Nigira</option>
															<option>USA</option>
															<option>India</option>
														</select> */
														<input type="text" name="country1" id="country1" placeholder="Country">-->
														<i class="la la-globe"></i>
													</div>
													<span id="error_con" class="text-danger"></span>
												</div>
												
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<!--<select>
															<option>Category</option>
															<option>Category 1</option>
															<option>Category 2</option>
															<option>Category 3</option>
															<option>Category 4</option>
														</select>-->
														<?php echo createComboBox($makearr1,'category1',$row['catid'],' class="form-control" id="category" ');?>
														<i class="la la-dropbox"></i>
														<span><i class="fa fa-ellipsis-h"></i></span>
													</div>
												</div>
												
												
												<div class="col-lg-12 no-pdd">
													<div class="checky-sec st2">
														<div class="fgt-sec">
															<input type="checkbox" name="cc" id="c3">
															<label for="c3">
																<span></span>
															</label>
															<small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
														</div><!--fgt-sec end-->
														<span id="error_c3" class="text-danger"></span>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<button type="submit" id="companysubmit" value="submit">Get Started</button>
												</div>
											</div>
										</form>
									</div>
								</div>		
							
							
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
			<div class="footy-sec">
				<div class="container">
					<ul>
						<li><a href="help-center.html" title="">Help Center</a></li>
						<li><a href="about.html" title="">About</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="forum.html" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="images/copy-icon.png" alt="">Copyright 2019</p>
				</div>
			</div><!--footy-sec end-->
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>



<script src="js/ui-elements.js"></script>
<script src="js/blockUI/jquery.blockUI.js"></script>
<script src="js/media.js"></script>
</body> 
</html>