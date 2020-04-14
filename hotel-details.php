H<?php include('header.php');
include('chksession.php');
$id=base64_decode($_REQUEST['hid']);
$db2=new DB();
$db3=new DB();
$sql="SELECT * FROM $_TBL_HOTEL WHERE id=$id";
$db->query($sql)or die($db->error());
$row=$db->fetchArray();
$cid=$row['cityid'];
$sid=$row['stateid'];
$title=$row['title'];
 $city=$db2->getSingleResult("select cityname from cities where id=".$cid);
 $state=$db2->getSingleResult("select title from $_TBL_STATE where id=".$sid);
$sql3="SELECT * FROM hotellist WHERE title='$title'";
$db3->query($sql3)or die($db3->error());
$row3=$db3->fetchArray();

?>

 <section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Room listing</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">ROOM DETAILS FULL WIDTH</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Room List</li>
                </ul>
            </nav>
        </div>
    </div>
</section>


<section class="details"> 
        <div class="container container1170">
            <div class="detail-slider">
              <div class="hoteldeatilsslider1">
                    <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                        <ol class="carousel-indicators">
						<?php  $sql2="SELECT * FROM $_TBL_ITEMIMAGE WHERE item_id=".$row['id'];
								$db2->query($sql2)or die($db2->error());
								if($db2->numRows()>0)	
								{
								while($imagerow=$db2->fetchArray()){
						?>
                            <li data-target="#carouselExampleCaptions" data-slide-to="<?=$imagerow['id']?>" class="">
                               <?php if(!empty($imagerow['image'])){ ?>
                                <img src="<?=$_SITE_PATH?>upload/<?=$imagerow['image']?>" class="d-block w-100" alt="...">
								<?php }else{ ?>
						<img src="img/room1.jpg" alt="image" class="d-block w-100">
						<?php }?>
                            </li>
                          <?php  }} ?>	
                            <li data-target="#carouselExampleCaptions" data-slide-to="2" class="active">
                             
								
								<?php if(!empty($row['picture'])){ ?>
                            <img src="<?=$_SITE_PATH?>holi/<?=$row['picture']?>" class="d-block w-100" alt="image">
						<?php }else{ ?>
						<img src="img/room1.jpg" alt="image" class="d-block w-100">
						<?php }?>
                            </li>
                        </ol>
                        <div class="carousel-inner">
						<?php  $sql2="SELECT * FROM $_TBL_ITEMIMAGE WHERE item_id=".$row['id'];
								$db2->query($sql2)or die($db2->error());
								if($db2->numRows()>0)	
								{
								while($imagerow=$db2->fetchArray()){
						?>
                            <div class="carousel-item" wfd-invisible="true">
							 <?php if(!empty($imagerow['image'])){ ?>
                                <img src="<?=$_SITE_PATH?>upload/<?=$imagerow['image']?>" class="d-block w-100" alt="...">
								<?php }else{ ?>
						<img src="img/room1.jpg" alt="image" class="d-block w-100">
						<?php }?>

                            </div>
<?php  }} ?>	
                          
                            <div class="carousel-item active">
                                <?php if(!empty($row['picture'])){ ?>
                            <img src="<?=$_SITE_PATH?>holi/<?=$row['picture']?>" class="d-block w-100" alt="image">
						<?php }else{ ?>
						<img src="img/room1.jpg" alt="image" class="d-block w-100">
						<?php }?>

                            </div>
                            <!-- <div class="carousel-item">
                                                        <img src="img/la.jpg" class="d-block w-100" alt="...">

                                                    </div>-->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


            </div>
            <div class="detail-content">
                <div class="detail-title">
                    <div class="title-left">
                        <h3><?=$row['title']?></h3>
                        <div class="rating">
                           <!-- <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>-->
								 <span><?php if($row['starrating']==1) {?>
				<i class="fa fa-star yl"></i>sdfsdf
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				
				<?php }elseif($row['starrating']==2){?>
				<i class="fa fa-star yl"></i>sd
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<?php }elseif($row['starrating']==3){?>
				<i class="fa fa-star yl"></i>sf
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<?php }elseif($row['starrating']==4){?>
				<i class="fa fa-star yl"></i>sc
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star bk"></i>
				<?php }elseif($row['starrating']==5){?>
			<i class="fa fa-star yl"></i>ss
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<?php }else{?>
					
				<i class="fa fa-star bk"></i>adasdsad
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
					
			<?php	}?></span>
			
                        </div>
                    </div>
                    <div class="title-right pull-right">
                        
                        <div class="title-price pull-right">
                            <h3>₦<?=$row['price']?><span>/Night</span></h3>
                        </div>
                        <a href="hotel-booking.php" class="btn btn-orange pull-right">Book Now</a>
                    </div>
                </div>
                <div class="detail-overview">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="overview-outer">
                                <div class="overview-content mar-bottom-30">
                                    <h4>Overview</h4>
                                    <p><?=$row['sortdetail']?></p>
                                    <p class="mar-0"><?=$row['detail']?></p>
                                </div>
                                <div class="price-table ">
                                    <h4>Price and Rates(/Night)</h4>
                                    <table class="table table-bordered mar-0">
                                        <thead>
                                            <tr>
                                                <td>Sun</td>
                                                <td>Mon</td>
                                                <td>Tues</td>
                                                <td>Wed</td>
                                                <td>Thurs</td>
                                                <td>Fri</td>
                                                <td>Sat</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>₦<?=$row3['Sunday']?></td>
                                                <td>₦<?=$row3['Monday']?></td>
                                                <td>₦<?=$row3['Tuesday']?></td>
                                                <td>₦<?=$row3['wednesday']?></td>
                                                <td>₦<?=$row3['Thursday']?></td>
                                                <td>₦<?=$row3['Friday']?></td>
                                                <td>₦<?=$row3['Saturday']?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="overwiew-map">
							 <div class="shadow_box" style="text-align:center; margin-top:35px; " align="right"><div id="map_canvas" style="height:250px; width:620px;" >Google Map</div></div>
		 <input id="address"  type="hidden" value="<?=$row['title']?>&nbsp; <?=$row['place']?> &nbsp; <?=$city?> &nbsp; <?=$state?>">
  
	  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&sensor=true">
</script>
   <script type="text/javascript">
     var geocoder;
 var map;
 function initialize() {
   geocoder = new google.maps.Geocoder();
   var latlng = new google.maps.LatLng(28.24, 77.18);
   var myOptions = {
     zoom: 15,
     center: latlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   }
   map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
codeAddress();
 }

 function codeAddress() {
   var address = document.getElementById("address").value;
   geocoder.geocode( { 'address': address}, function(results, status) {
     if (status == google.maps.GeocoderStatus.OK) {
       map.setCenter(results[0].geometry.location);
       var marker = new google.maps.Marker({
           map: map,
           position: results[0].geometry.location
       });
     } else {
     alert("Geocode was not successful for the following reason: " + status);
     }
   });
 }
 
 google.maps.event.addDomListener(window, 'load', initialize);  

   </script>
						
                                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6026.082962155818!2d77.23120039590765!3d28.499075196145483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3da3f68853d%3A0xcd720b2a87c87b08!2sE%20Pixel%20Services!5e0!3m2!1sen!2sin!4v1582451193781!5m2!1sen!2sin" width="450" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>


    <section class="amenities">
    <div class="container container1170">
        <div class="section-title">
            <h3>Explore <span>Amenities</span></h3>
        </div>
        <div class="amenities-content">
            <div class="row">
			<?php  				if(!empty($row['amenities'])){
								$a=explode(',' , $row['amenities']);
								$b=count($a);
								for($i=0;$i<$b;$i++){
								$sql3="SELECT * FROM $_TBL_AMENITIES WHERE status='1' and id=".$a[$i];
								$db2->query($sql3)or die($db2->error());
								if($db2->numRows()>0)	
								{
								$imagerow1=$db2->fetchArray();
						?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <?=$imagerow1['icon']?>
                        </div>
                        <h4><?=$imagerow1['title']?></h4>
                    </div>
                </div>
			<?php }} }	?>
				<!--
				<div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </div>
                        <h4>Transport</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                        </div>
                        <h4>Free wifi</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-bath" aria-hidden="true"></i>
                        </div>
                        <h4>Laundry service</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                        </div>
                        <h4>Quick service</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <h4>City map</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                        </div>
                        <h4>Swimming pool</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <h4>Smoking free</h4>
                    </div>
                </div>
            
			-->
			</div>
        </div>
    </div>
</section>


 <section class="amenities">
    <div class="container container1170">
        <div class="section-title">
            <h3>Explore <span>Room Amenities</span></h3>
        </div>
        <div class="amenities-content">
            <div class="row">
			<?php  	
			//print_r($row['facilityid']);
			if(!empty($row['facilityid'])){
			$a1=explode(',' , $row['facilityid']);
								$b1=count($a1);
								for($i1=0;$i1<$b1;$i1++){
								 $sql3="SELECT * FROM facility WHERE status='1' and id=".$a1[$i1];
								$db->query($sql3)or die($db->error());
								if($db->numRows()>0)	
								{
								$imagerow2=$db->fetchArray();
						?>	
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <?=$imagerow2['icon']?>
                        </div>
                        <h4><?=$imagerow2['title']?></h4>
                    </div>
                </div>
			<?php }} }	?>
				<!--
				<div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </div>
                        <h4>Transport</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                        </div>
                        <h4>Free wifi</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-bath" aria-hidden="true"></i>
                        </div>
                        <h4>Laundry service</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                        </div>
                        <h4>Quick service</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <h4>City map</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                        </div>
                        <h4>Swimming pool</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <h4>Smoking free</h4>
                    </div>
                </div>
            
			-->
			</div>
        </div>
    </div>
</section>



<section class="detail-reviews">
    <div class="container container1170">
        <div class="section-title">
            <h2>Explore <span>Reviews</span></h2>
        </div>
        <div class="review-outer">
            <ul>
                <li>
                    <div class="review-item">
                        <div class="review-image">
                            <img src="img/review1.jpg" alt="image">
                        </div>
                        <div class="review-content">
                            <h5>Micheal Clordy</h5>
                            <a href="#"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                            <p class="date">November 10,2018 at 3:10 pm</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id iaculis arcu. Aenean non dolor magna. In sed consectetur nisi. Sed venenatis, nibh sit amet sodales ullamcorper, ipsum orci condimentum tortor, et cursus veli.tturpis at justo. Vivamus pellentesque volutpat urna vel eleifend. </p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="review-item">
                                <div class="review-image">
                                    <img src="img/review1.jpg" alt="image">
                                </div>
                                <div class="review-content">
                                    <h5>Micheal Clordy</h5>
                                    <a href="#"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                    <p class="date">November 10,2018 at 3:10 pm</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id iaculis arcu. Aenean non dolor magna. In sed consectetur nisi. Sed venenatis, nibh sit amet sodales ullamcorper, ipsum orci condimentum tortor, et cursus veli.tturpis at justo. Vivamus pellentesque volutpat urna vel eleifend. </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="review-item">
                        <div class="review-image">
                            <img src="img/review1.jpg" alt="image">
                        </div>
                        <div class="review-content">
                            <h5>Micheal Clordy</h5>
                            <a href="#"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                            <p class="date">November 10,2018 at 3:10 pm</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id iaculis arcu. Aenean non dolor magna. In sed consectetur nisi. Sed venenatis, nibh sit amet sodales ullamcorper, ipsum orci condimentum tortor, et cursus veli.tturpis at justo. Vivamus pellentesque volutpat urna vel eleifend. </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="comment-box">
            <h4>Leave a message</h4>
            <form>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="fname" placeholder="First Name" value="<?=$alluserrow['first_name']?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?=$alluserrow['last_name']?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" id="email" placeholder="Email" value="<?=$alluserrow['email_id']?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="number" placeholder="Phone" value="<?=$alluserrow['mobile_no']?>" readonly>
                    </div>
                    <div class="textarea col-md-12">
                        <textarea class="form-control"  placeholder="Enter a message"></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="comment-btn">
                            <a href="#" class="btn btn-orange">Submit</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


 


    <?php include('footer.php') ?>


    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        $('#date-range2').datepicker({
            uiLibrary: 'bootstrap'
        });

        $('#date-range3').datepicker({
            uiLibrary: 'bootstrap'
        });
    </script>
     
    
    <script>
       
     $('#myCarousel11').carousel({
        interval:   4000
    });
    </script> 

