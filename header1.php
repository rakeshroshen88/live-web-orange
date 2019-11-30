<?php include("config.inc.php");
$dbu=new DB();
$sqlu="select * from all_user where user_id =".$_SESSION['sess_webid'];
$dbu->query($sqlu);
$alluserrow=$dbu->fetchArray();
$makearr=array();
$makearr=getValuesArr( $_TBL_COUNTRIES, "country_id","name","", "" );

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
	<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/video-js.css">
	<link href="images/logo.png" rel="icon" sizes="32x32" type="image/png" />
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	
	<script type="text/javascript" src="ttps://code.jquery.com/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	-->
	<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
	
	<script>
	   		var BASEURL='http://orangestate.ng/';
			//var BASEURL='http://localhost/orange_state/';
	</script>
</head>

<body oncontextmenu="return false;">	

	<div class="wrapper">	
		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="index.php" title=""><img src="images/logo.png" alt=""></a>
					</div><!--logo end-->
					
					<div class="search-bar">
						<form action="search.php" method="post" id="search_box" name="searchpage1">
							<!--<input type="text" name="search" placeholder="Search..." onkeyup="showResult(this.value)">-->
							<input type="text" id="search-box" class="search" name="searchpage" placeholder="Search for Products" />
							<button type="submit" name="seafrchsubmit"><i class="la la-search"></i></button>
						</form>
						
					</div><!--search-bar end-->
					<div id="suggesstion-box"></div>
      
<script>

$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "livesearch.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
//To select country name
function selectCountry(val) {

$("#search-box").val(val);
$("#suggesstion-box").hide();
}

/* $(function() {
	
	var $placeholder = $('input[placeholder]');
	
	if ($placeholder.length > 0) {
	
		var attrPh = $placeholder.attr('placeholder');
		
		$placeholder.attr('value', attrPh)
		  .bind('focus', function() {
			
			var $this = $(this);
			
			if($this.val() === attrPh)
				$this.val('').css('color','#171207');
			
		}).bind('blur', function() {
		
			var $this = $(this);
		
			if($this.val() === '')
				$this.val(attrPh).css('color','#333');
		
		});
	
	}
	
});

 */


</script>
					
					<nav>
						<ul>
							<li>
								<a href="index.php" title="">
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
								<a href="marketplace-home.php" title="">
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

							<li class="viewcaronhouse">
								<span class="addtocart1">
									<span class=" my-cart-icon fa fa-cart-arrow-down">
										<span class="my-cart-badge"><?php 
												echo $iemcount=$db->getSingleResult("SELECT count(*) from $_TBL_TEMPORDER where sessionid='".session_id()."'");
												?></span>
									</span>
								</span>
								
								<div class="carviewtop">
          <div class="card">
            <div class="card-header  ">
              <h4 class="card-title">Your cart (<?php 
												echo $iemcount=$db->getSingleResult("SELECT count(*) from $_TBL_TEMPORDER where sessionid='".session_id()."'");
												?>)</h4>
            </div>
            <div class="card-content">
              <ul class="list-group mb-3 checkoutlist-rpdoct carlisting1">
			  <li class="" >
			  <p id="tempshow">
               <?php $grand_total=0;
$ct=1;
$dbt=new DB;
 $sqlt="select * from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		$ship=0;
		while($rowt=$dbt->fetchArray()){
		
		$ppid=$rowt['prodid'];		
		$path2=$db->getSingleResult("select prod_large_image from $_TBL_PRODUCTUCT where  id='$ppid'");
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
		
		$ship1=$db->getSingleResult("select shippingcharge from $_TBL_PRODUCT where  id='$ppid'");
			
			?>
 <div class="carlisting1main">
                    <h6 class="my-0"><span class="prodcutname"><?php if(!empty($rowt['product_name'])){
		echo $rowt['product_name']; } ?>  (Qty : <?php echo $rowt['quantity'];?> ) </span><span class="text-muted">-  ₦<?php if(!empty($rowt['cost'])){
		echo $rowt['cost']; } ?>.00 <span class="text-muted btndel" title="Remove" pid="<?php echo $rowt['id'];?>">X</span></span></h6>
                    
                  
				   
                  
		
               
             </div>                
	<?php
$ct++; 
	  
	   $grand_total=$grand_total+$rowt['prod_total'];
	   $ship=$ship+$ship1;

	}} ?>  </p></li> 


	<li class="list-group-item d-flex justify-content-between border-top1px">
                  <span class="product-name">Shipping &amp; Handling</span>
                  <span class="product-price shiping">₦<?=number_format($ship,2,'.',',')?></span>
                </li>
                
                
                <li class="list-group-item d-flex justify-content-between">
                  <span class="product-name success bold finalprice">Order Total</span>
                  <span class="product-price bold finalprice gt">₦<?=number_format($grand_total+$ship,2,'.',',')?></span>
                </li>
                
                <hr>
              	<li><a href="checkout.php" class="btn btn-primary pull-right">Checkout</a></li>
              </ul>

            </div>
          </div>

           
        </div>
      
							</li>
						</ul>
					</nav>
					<!--<li class="list-group-item d-flex justify-content-between ">
                  <span class="product-name">TAX / VAT</span>
                  <span class="product-price">$0</span>
                </li>-->
					
					<!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					
					<?php if(!empty($_SESSION['sess_name'])){
						$dbus=new DB();
						$userspath=$dbus->getSingleResult('select image_id from user_profile where user_id='.$_SESSION['sess_webid']);
						 
						?>
					<div class="user-account">
						<div class="user-info">
							<?php if($userspath=='' and empty($userspath)){ ?>
							<img src="images/resources/user.png" alt="">
						<?php }else{?>
							<img src="upload/<?=$userspath?>" alt="" height="40" width="40">
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
								<li><a href="profile-account-setting.php" title="">Account Setting</a></li>
								<li><a href="#" title="">Privacy</a></li>
								<li><a href="#" title="">Faqs</a></li>
								<li><a href="#" title="">Terms & Conditions</a></li>
							</ul>
							<h3 class="tc"><a href="company-page.php" title="">create page</a></h3>
							<h3 class="tc"><a href="logout.php" title="">Logout</a></h3>
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