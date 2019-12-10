<?php include("config.inc.php");
?>
<!DOCTYPE html>
<html>
 
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
</head>

<body oncontextmenu="return false;">	

	<div class="wrapper">	
		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="index.html" title=""><img src="images/logo.png" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
						<form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="index.html" title="">
									<span><img src="images/icon1.png" alt=""></span>
									Home
								</a>
							</li>

							 

							<li>
								<a href=" " title="">
									<span><img src="images/tourist.png" alt=""></span>
									Tourist Destination
								</a>
								<ul>
									<li><a href=" " title="">Tourist sites</a></li>
									<li><a href=" " title="">History</a></li>
									<li><a href=" " title="">Events</a></li>
								</ul>
							</li>


							<li>
								<a href=" " title="">
									<span><img src="images/hotelss.png" alt=""></span>
									Hospitality
								</a>
								<ul>
									<li><a href=" " title="">Hotels</a></li>
									<li><a href="  " title="">Restaurants</a></li>
									<li><a href=" " title="">Bars and Lounge</a></li>
									<li><a href=" " title="">Fast foods</a></li>
								</ul>
							</li>

							<li>
								<a href=" " title="">
									<span><img src="images/hopital.png" alt=""></span>
									I Can
								</a>
								<ul>
									<li><a href=" " title="">How to cook</a></li>
									<li><a href=" " title="">Our dialect</a></li>
									  
								</ul>
							</li>
 
							 
  
							<li>
								<a href=" " title="">
									<span><img src="images/icon3.png" alt=""></span>
									 Shop Online
								</a>
							</li>
							
							
							
							 
							 
							<li>
								<a href="#" title="" class="not-box-open">
									<span><img src="images/icon7.png" alt=""></span>
									Notification
								</a>
								<div class="notification-box noti" id="notification">
									<div class="nt-title">
										<h4>Setting</h4>
										<a href="#" title="">Clear all</a>
									</div>
									<div class="nott-list">
										<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="images/resources/ny-img1.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="images/resources/ny-img2.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="images/resources/ny-img3.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="images/resources/ny-img2.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="view-all-nots">
						  					<a href="#" title="">View All Notification</a>
						  				</div>
									</div><!--nott-list end-->
								</div><!--notification-box end-->
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					<?php if(!empty($_SESSION['sess_name'])){
					
						 $sql="select * from user_profile user_id =".$_SESSION['sess_webid'];
						$db->query($sql);
						while($rowi=$db->fetchrow()){
							 $impid=$rowi['image_id'];
						}
						?>
					<div class="user-account">
						<div class="user-info">
						<?php if($impid=='' and empty($impid)){?>
							<img src="images/resources/user.png" alt="">
						<?php }else{?>
							<img src="upload/<?=$impid?>" alt="">
						<?php }?>
							<a href="#" title=""><?=$_SESSION['sess_name']?></a>
							<i class="la la-sort-down"></i>
						</div>
						<div class="user-account-settingss" id="users">
							<h3>Online Status</h3>
							<ul class="on-off-status">
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
											<span></span>
										</label>
										<small>Online</small>
									</div>
								</li>
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c6">
										<label for="c6">
											<span></span>
										</label>
										<small>Offline</small>
									</div>
								</li>
							</ul>
							<h3>Custom Status</h3>
							<div class="search_form">
								<form>
									<input type="text" name="search">
									<button type="submit">Ok</button>
								</form>
							</div><!--search_form end-->
							<h3>Setting</h3>
							<ul class="us-links">
								<li><a href="setting.php" title="">Account Setting</a></li>
								<li><a href="#" title="">Privacy</a></li>
								<li><a href="#" title="">Faqs</a></li>
								<li><a href="#" title="">Terms & Conditions</a></li>
							</ul>
							<h3 class="tc"><a href="sign-in.html" title="">Logout</a></h3>
						</div><!--user-account-settingss end-->
					</div>
					<?php }else{?>
					<div class="user-account">
						<div class="user-info">
							<img src="images/resources/user.png" alt="">
							<a href="<?=$_SITE_PATH?>sign-in.php" title="">Login</a>
							<i class="la la-sort-down"></i>
						</div>
					</div>
					<?php }?>
				
				</div><!--header-data end-->
			</div>
		</header><!--header end-->	