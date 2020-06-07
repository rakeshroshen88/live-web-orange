<?php include("config.inc.php");
include('chat/database_connection.php');
$dbu=new DB();
$sqlu="select * from all_user where user_id =".$_SESSION['sess_webid'];
$dbu->query($sqlu);
$alluserrow=$dbu->fetchArray();
$makearr=array();
$makearr=getValuesArr( $_TBL_COUNTRIES, "country_id","name","", "" );

?>

<?php 
// Program to display complete URL     
      
if(isset($_SERVER['HTTPS']) &&  
            $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
        $link = "http"; 
  
// Here append the common URL  
// characters. 
$link .= "://"; 
      
// Append the host(domain name, 
// ip) to the URL. 
$link .= $_SERVER['HTTP_HOST']; 
      
// Append the requested resource 
// location to the URL 
$link .= $_SERVER['PHP_SELF']; 
      
// Display the link 
 //$link; 
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

	<!--<script type="text/javascript" src="js/jquery-2.1.0.js"></script>-->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="664380665812-8b9mqe830i9ibuer9b3g9l14tga0n0tl.apps.googleusercontent.com">

   
	<!--<a href="#" onclick="signOut();">Sign out</a>-->
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	
	<script type="text/javascript" src="ttps://code.jquery.com/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>-->
	
	<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
	<script> //header('Access-Control-Allow-Origin', "*");
	   		var BASEURL='//orangestate.ng/';
			var social_AjaxURL='//orangestate.ng/';
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
					<?php if($link !='http://orangestate.ng/marketplace-home.php'){?>
						<form action="search.php" method="post" id="search_box" name="searchpage1">
							<!--<input type="text" name="search" placeholder="Search..." onkeyup="showResult(this.value)">-->
							<input type="text" id="search-box" class="search" name="searchpage" placeholder="Search for People" />
							<button type="submit" name="seafrchsubmit"><i class="la la-search"></i></button>
						</form>
						<div id="suggesstion-box" class="searchrsult"></div>
						<?php }?>
					</div>
					
					<!--search-bar end-->
					
      
<script>

$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "usersearch.php",
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
								<a href="tour-destination.php" title="">
									<span><img src="images/tourist.png" alt=""></span>
									Tourism
								</a>
								<ul>
									<li><a href="tour-destination-list.php" title="">Tourist sites</a></li>
									<!--<li><a href=" " title="">History</a></li>-->
									<li><a href="event-home.php" title="">Events</a></li>
								</ul>
							</li>


							<li>
								<a href="company-list.php" title="">
									<span><img src="images/hubbusiness.png" alt=""></span>
									Business Hub
								</a>
								<ul>
									<li><a href="hotel-home.php" title="Hotel">Hotels</a></li>
									<li><a href="business_directory_home.php" title="">Business Directory</a></li>
									<!--<li><a href="" title="">Bars and Lounge</a></li>
									<li><a href="" title="">Fast foods</a></li>-->
								</ul>
							</li>

							<li>
								<a href="i-can-cook.php" title="">
									<span><img src="images/hopital.png" alt=""></span>
									I Can
								</a>
								<ul>
									<li><a href="i-can-cook.php" title="i-can-cook.php">How to cook</a></li>
									<li><a href="language_translator.php" title="">Learn Our Dialects</a></li>
									  
								</ul>
							</li>
 
							 
  
							<li>
								<a href="marketplace-home.php" title="">
									<span><img src="images/icon3.png" alt=""></span>
									 Shop Online
								</a>
							</li>
							
							
							
							
 
							<li class="viewcaronhouse">
							<span class="cart-design">
									<img src="images/users.png" alt="" style="width: 27px;">
									<span class="cartnumber"><?php 
												 echo $notcountfrnd=$db->getSingleResult("SELECT count(id) from friendrequest where request_fid='".$_SESSION['sess_webid']."' and status='1'");
												 
												
												?></span>

								</span>
								
								<div class="carviewtop">
          <div class="card">
            <div class="card-header  ">
			<span style="float: left;">
			<h4 class="card-title">Friends </h4></span><span style="float: right;">
             
										
										<a href="setting.php" title="">Setting</a></span>
									
            </div>
            <div class="card-content">

              <ul class="list-group mb-3 checkoutlist-rpdoct carlisting1">
			  <li class="" >
			  <p id="tempshow1">
               <?php
			
			?>
 <div class="carlisting1main">
                   
             </div>                
	</p></li> 

          <?php 
										$dbuf=new DB();
										$dbmut=new DB();
										 $sql="SELECT * from all_user where user_id IN ( select user_id  from friendrequest where request_fid =".$_SESSION['sess_webid']." and status='1')";
										//$sql="SELECT * from followers where user_id=".$uid;
										$db->query($sql);
										
										$db->query($sql);
										if($db->numRows()>0)
										{
										 while($frow=$db->fetchArray()){
										/* 	$uid= $frow['user_id'];
										//////////////////////////////////////
										$msql="select first_name, user_id from all_user where user_id IN(SELECT IF(user_id = '".$_SESSION['sess_webid']."' OR follow = '".$uid."', follow, user_id)
FROM followers
WHERE ((user_id = '".$_SESSION['sess_webid']."' OR follow = '".$uid."') OR (follow ='".$_SESSION['sess_webid']."' OR follow = '".$uid."')))";
$dbmut->query($msql);
$total_records=$dbmut->numRows(); */
/* $mflist=array();
while($mrow=$dbmut->fetchArray()){
	$mrowuser=base64_encode($mrow['user_id']);
	 $mflist[]='<a href="view-profile.php?uid='.$mrowuser.'">'.$mrow['first_name'].'</a>';
	  }
	  $mf=implode(', ',$mflist); */
										//////////////////////////////////////
									
										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);
										$currentcity=$dbuf->getSingleResult("select current_city from user_profile where user_id=".$frow['user_id']);
										$uid1=$frow['user_id'];
										//if($woorking==$profilerow['work']){
										?>
				<li class="list-group-item d-flex justify-content-between border-top1px">
                                                      <?php if(!empty($userfpath)){?>
                                                                        	<a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>">    <img src="upload/<?=$userfpath?>" alt="" height="50" width="50" style="border-radius: 100px;"></a>
                                                                            <?php }else{ ?>
																			<a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 100px;"></a>

                                                                                <?php }?>	<a href="view-profile.php?uid=<?php echo base64_encode($frow['user_id']);?>"> <span class="product-name"><?=$frow['first_name']?></span></a>
                  <span class="product-price shiping">					<a class="clrbtn freqfollownew"  id="freqfollownew<?=$uid1?>" fid="<?=$uid1?>" href="javascript:void(0);"> Accept</a>
										  
										   <a class="clrbtn delfreqfollownew"  id="delfreqfollownew<?=$uid1?>" fid="<?=$uid1?>" href="javascript:void(0);"> Reject</a>
                                                                        </span>
                </li>
                
										 <?php }} ?>
										 
										 
				
                <hr>
				
              	<li><a href="notification.php" class="btn btn-primary pull-right">View All Friends</a></li>
              </ul>

            </div>
          </div>

           
        </div>
      
							</li>
 							 
					<li class="viewcaronhouse">
							<span class="cart-design">
									<img src="images/icon7.png" alt="" style="width: 30px;">
									<span class="cartnumber"><?php 
												 $notcount=$db->getSingleResult("SELECT count(id) from notification where user_id='".$_SESSION['sess_webid']."' and status='1' and notification_type='liked'");
												
												$notcount1=$db->getSingleResult("SELECT count(id) from notification where user_id='".$_SESSION['sess_webid']."' and status='1' and notification_type='comment'");
												echo $notcount+$notcount1;
												?></span>

								</span>
								
								



								 
								 
								<div class="carviewtop">
          <div class="card">
            <div class="card-header  ">
			<span style="float: left;">
			<h4 class="card-title">Notification </h4></span><span style="float: right;">
             
										
										<a href="setting.php" title="">Setting</a></span>
									
            </div>
            <div class="card-content">

              <ul class="list-group mb-3 checkoutlist-rpdoct carlisting1">
			  <li class="" >
			  <p id="tempshow1">
               <?php
			
			?>
 <div class="carlisting1main">
                   
             </div>                
	</p></li> 

										 
										 
										 
										
			  <li class="" >
			  <p id="tempshow">
<?php 
$dbt=new DB;?>
  <!--<?php $sqlt="select * from notification where user_id='".$_SESSION['sess_webid']."' and  notification_type='liked'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		$ship=0;
		while($rowt=$dbt->fetchArray()){
		
		$ppid=$rowt['post_id'];	
$user_id=$db->getSingleResult("select user_id from user_post where  post_id='$ppid'");	
//echo 'select first_name from all_user where user_id='.$user_id;
 $image_id=$db->getSingleResult('select image_id from user_profile where user_id='.$user_id);	
 $name=$db->getSingleResult('select first_name from all_user where user_id='.$user_id);	
		 "select post_title from user_post where  post_id='$ppid'";
		$post_title=$db->getSingleResult("select post_title from user_post where  post_id='$ppid'");
         
		
		//$ship1=$db->getSingleResult("select shippingcharge from $_TBL_PRODUCT where  id='$ppid'");
			if($rowt['status']=='1'){
			?>
 <div class="carlisting1main" style="background-color: aliceblue;">
                    <h6 class="my-0"><?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?><span class="prodcutname"> You Like on <?=$name?> <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div>                
	<?php
			}else{ ?>
 <div class="carlisting1main" >
                    <h6 class="my-0"><?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?><span class="prodcutname"> You Like on <?=$name?> <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div> 
			<?php }}} ?>-->
	
	<?php $sqlt="select * from notification where f_userid='".$_SESSION['sess_webid']."' and  notification_type='liked'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		$ship=0;
		while($rowt=$dbt->fetchArray()){
		
		$ppid=$rowt['post_id'];	
$user_id=$db->getSingleResult("select user_id from user_post where  post_id='$ppid'");	
//echo 'select first_name from all_user where user_id='.$user_id;
 $name=$db->getSingleResult('select first_name from all_user where user_id='.$user_id);	
 $image_id=$db->getSingleResult('select image_id from user_profile where user_id='.$user_id);	

		 "select post_title from user_post where  post_id='$ppid'";
		$post_title=$db->getSingleResult("select post_title from user_post where  post_id='$ppid'");
         
		
		//$ship1=$db->getSingleResult("select shippingcharge from $_TBL_PRODUCT where  id='$ppid'");
			if($rowt['status']=='1'){
			?>
 <div class="carlisting1main" style="background-color: aliceblue;">
                    <h6 class="my-0"><?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?><span class="prodcutname"> <?=$name?> Like on your <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div>                
	<?php
			}else{ ?>
 <div class="carlisting1main" >
                    <h6 class="my-0"><?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?><span class="prodcutname"> <?=$name?> Like on your <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div> 
			<?php }}}?> 
			<!--
<?php	
$sqlt="select * from notification where user_id='".$_SESSION['sess_webid']."' and notification_type='comment'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		$ship=0;
		while($rowt=$dbt->fetchArray()){
		
		$ppid=$rowt['post_id'];	
$user_id=$db->getSingleResult("select user_id from user_post where  post_id='$ppid'");	
$image_id=$db->getSingleResult('select image_id from user_profile where user_id='.$user_id);	
//echo 'select first_name from all_user where user_id='.$user_id;
 $name=$db->getSingleResult('select first_name from all_user where user_id='.$user_id);	
		 "select post_title from user_post where  post_id='$ppid'";
		$post_title=$db->getSingleResult("select post_title from user_post where  post_id='$ppid'");
  if($rowt['status']=='1'){
			?>
		<div class="carlisting1main" style="background-color: aliceblue;">
                    <h6 class="my-0">
					
					<?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?>
					
					<span class="prodcutname"> You Comment on <?=$name?> <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div>                
	<?php
			}else{ ?>
 <div class="carlisting1main">
                    <h6 class="my-0">
					<?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?>
					<span class="prodcutname"> You Comment on <?=$name?> <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div> 
			<?php }}} ?>-->
	
<?php	
$sqlt="select * from notification where f_userid='".$_SESSION['sess_webid']."' and notification_type='comment'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		$ship=0;
		while($rowt=$dbt->fetchArray()){
		
		$ppid=$rowt['post_id'];	
$user_id=$db->getSingleResult("select user_id from user_post where  post_id='$ppid'");	
//echo 'select first_name from all_user where user_id='.$user_id;
$image_id=$db->getSingleResult('select image_id from user_profile where user_id='.$user_id);	
 $name=$db->getSingleResult('select first_name from all_user where user_id='.$user_id);	
		 "select post_title from user_post where  post_id='$ppid'";
		$post_title=$db->getSingleResult("select post_title from user_post where  post_id='$ppid'");
  if($rowt['status']=='1'){
			?>
		<div class="carlisting1main" style="background-color: aliceblue;">
                    <h6 class="my-0">
					<?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?>
					<span class="prodcutname"> <a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><?=$name?></a> Comment on  your <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div>                
	<?php
			}else{ ?>
 <div class="carlisting1main" >
                    <h6 class="my-0">
					<?php if(!empty($image_id)){ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="upload/<?=$image_id?>" height="40px;" width="40px;" style="border-radius: 50%;"/></a><?php }else{ ?><a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><img src="images/resources/user.png" alt="" height="40" width="40" style="border-radius: 50%;"></a><?php } ?>
					<span class="prodcutname"> <a href="view-profile.php?uid=<?php echo base64_encode($user_id);?>"><?=$name?></a> Comment on your <a href="view-post.php?pid=<?=$ppid?>" >Post</a></span>
		<span class="text-muted"></span></h6><hr>
         </div> 
			<?php }}} 
	
	
	?>  </p></li> 

               
                <hr>
				
              	<li><a href="notification.php" class="btn btn-primary pull-right">View All Notification</a></li>
              </ul>

            </div>
          </div>

           
        </div>
      
							</li>
 							
 							
					</ul>
					  
						<ul>
							 
							<li class="viewcaronhouse">
								<span class="cart-design">
									<img src="img/carticon.png">
									<span class="cartnumber"><?php 
												echo $iemcount=$db->getSingleResult("SELECT count(*) from $_TBL_TEMPORDER where sessionid='".session_id()."'");
												?></span>

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
		$path2=$rowt['prod_large_image'];
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
		   
		  
			
			?>
 <div class="carlisting1main">
                    <h6 class="my-0"><span class="prodcutname"><?php if(!empty($rowt['product_name'])){
		echo $rowt['product_name']; } ?>  (Qty : <?php echo $rowt['quantity'];?> ) </span><span class="text-muted">-  ₦<?php if(!empty($rowt['cost'])){
		echo $rowt['cost']; } ?>.00 <span class="text-muted btndel" title="Remove" pid="<?php echo $rowt['id'];?>">X</span></span></h6>
                    
                  
				   
                  
		
               
             </div>                
	<?php
$ct++; 
	   $discount=$rowt['discount'];
	   $ship1=$rowt['shippingcharge'];
	   $tax_amt=$rowt['tax_amt'];
	   $grand_total=$grand_total+$rowt['prod_total'];
	   $totalvat=$totalvat+$tax_amt;
	   $ship=$ship+$ship1;

	}} ?>  </p></li> 


	<li class="list-group-item d-flex justify-content-between border-top1px">
                  <span class="product-name">Shipping &amp; Handling</span>
                  <span class="product-price shiping">₦<?=number_format($ship,2,'.',',')?></span>
                </li>
				
				<li class="list-group-item d-flex justify-content-between border-top1px">
                  <span class="product-name">Total &amp; VAT</span>
                  <span class="product-price shiping">₦<?=number_format($totalvat,2,'.',',')?></span>
                </li>
                
                
                <li class="list-group-item d-flex justify-content-between">
                  <span class="product-name success bold finalprice">Order Total</span>
                  <span class="product-price bold finalprice gt">₦<?=number_format(($grand_total+$ship+$totalvat-$discount),2,'.',',')?></span>
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
						<a href="#" title="" ><i class="fa fa-bars"></i></a>
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
							<a href="#" title="" ><?=$_SESSION['sess_name']?></a>
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
							<h3 class="tc"><a href="company-page.php" title="">create Business Hub</a></h3>
							
							<h3 class="tc"><a href="company-list.php" title="">View Business Hub</a></h3>
							<h3 class="tc">
							<a href="Javascript:void(0)" onclick="signOut();">Logout</a>
							<!--<a href="logout.php" onclick="signOut();" title="">Logout</a>--></h3>
							
							<!--<h3 class="tc"><a href="javascript:void(0);" onclick="signOut();" title="">Logout</a></h3>-->
							
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
		