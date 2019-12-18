<?php include('header.php');
include('chksession.php');
$db2=new DB();   
 $wherestr1=' where id='.$_REQUEST['tourid'];
 $sql="SELECT * from ".$_TBL_DESTINATION.$wherestr1;
 $db->query($sql);
 if($db->numRows()>0)	{	
 $row=$db->fetchArray();	
 }
?>

<style type="text/css">
    .chatfeature-leftbar{display: none}
</style>
    <!-- PLACEMENT trip_planner_breadcrumbs -->
    <div class="ppr_rup ppr_priv_trip_planner_breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumb1">
                    <a class="link" href=""><span>Home </span></a>
                </li>
                <li class="breadcrumb1">
                    <a class="link" href=""><span>India </span></a>
                </li>

                <li class="breadcrumb1">
                    <a class="link" href=""><span><?=$row['title']?> </span></a>
                </li>

            </ul>

            <div class="desiniation-name">
                <h1><?=$row['title']?> <span class="pull-right ticketpricehead"> Ticket Price: Free</span></h1> 
                <h5><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$row['address']?></h5>
                <div class="reivewlisting-title">
                    <span class="startling25s">
                               							<?php if($row['rating']==1){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==2){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==3){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==4){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==5){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>

                            </span>
                    <span class="reviewnuber"><?=$reviews=$db2->getSingleResult("select * from feedback where pages='destination' and prod_id =".$row['id']);?> Reviews</span>
                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="main-section">
             <div class="container">
            <div class="background-white"> <!----- background-white -->
            
                <!--************************************
                Inner Banner Start
        *************************************-->
                <section class="tourpage-slider">
                    <div class="row">
                        <div class="col-md-8">
                            <section class="tourpage-slider1">
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                          <?php if(!empty($row['picture'])){ ?>														<img src="destination/<?=$row['picture']?>" alt="image destinations" style="width: 100%;">														<?php }else{ ?>														<img src="img/tours/img-01.jpg" alt="image destinations">														<?php } ?>
                                        </div>										<?php 																				$sql2="SELECT * FROM $_TBL_DESIMAGE WHERE item_id=".$_REQUEST['tourid'];										$db->query($sql2)or die($db2->error());										if($db->numRows()>0)												{												$inum=0;														while($imagerow=$db->fetchArray()){										?>
                                        <div class="carousel-item">
                                            <img src="<?=$_SITE_PATH?>destination/thumb/<?=$imagerow['image']?>" alt="<?=$row['title']?>">
                                        </div>
											<?php }} ?>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>

                                </div>
                            </section>
                        </div>

                        <div class="col-md-4">
                            <div class="map-detail-features">
							<div class="shadow_box" ><div id="map_canvas" style="width:100%; height:295px; position: static !important; overflow: initial !important;">Google Map</div></div>
    
       
       
       <input id="address"  type="hidden" value="<?=$row['address']?>">
      <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCHjEdSo36jq0S-tEF1Ksn-JGSKjnEn6Qw&sensor=true">
</script>-->

							
                                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.507048677982!2d77.18333191508015!3d28.52447538246043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1e0667819b4f%3A0x834995f160759db8!2sQutub%20Minar!5e0!3m2!1sen!2sin!4v1574005286101!5m2!1sen!2sin" width="100%" height="295" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
                            </div>
                        </div>
                    </div>
                </section>
                
 
         
            <div class="row">
                <div class="col-md-8">
                    <div class="tour-details">
                       <?=$row['detail']?>


                    </div>
                </div><!-- col-md-8---->
                <div class="col-md-4">
                    <div class="detailssidebar">
                        <h3>Key Details</h3>
                        <ul>
                            <li>Mobile Ticket: Accepted</li>
                            <li>Languages Offered: English</li>
                            <li>Timing:  9AM to 6:00</li>
                            <li>Nearest Railway Station: New Delhi </li>
                            <li>Nearest Bank: HDFC Bank </li>
                            <li>Nearest Bus Stand: New Delhi </li>
                            <li>Helpline Number: 000000000 </li>
                             
                            
                        </ul>

                    </div>

                </div>

                
            </div>
        </div>

        <div class="container mt20">
            <div class="row">
            <div class="col-md-12">
                    <div class="tg-listing tg-listingvone">
                                 <h3 class="title">Other Tourist Destination</h3>
                                <div class="clearfix"></div>
                                <div class="row"><?php
								$db1=new DB();
								$wherestr1=' where populor=1 order by id limit 0,3';	$sql="SELECT * from ".$_TBL_DESTINATION.$wherestr1;	
								$db->query($sql);
								if($db->numRows()>0)	{
									while($row=$db->fetchArray()){
										$date=explode('-',$row['date']);
										$st=mktime(0,0,0,$date[1],$date[2],$date[0]);
										?>
                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="tg-populartour">
                                            <figure>
                                                <a href="tour-destination-details.php?tourid=<?=$row['id']?>"><?php if(!empty($row['picture'])){ ?>														<img src="destination/<?=$row['picture']?>" alt="image destinations">														<?php }else{ ?>														<img src="img/tours/img-01.jpg" alt="image destinations">														<?php } ?></a>
                                                
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                    <h3><a href="tour-destination-details.php?tourid=<?=$row['id']?>"><?=$row['title']?></a></h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p><?=$row['weither']?></p>
                                                </div>
                                                <div class="tg-populartourfoot">
                                                    <div class="tg-durationrating">
                                                       <span class="starlinting">													   													   <?php if($row['rating']==1){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==2){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==3){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==4){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($row['rating']==5){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>													   													   </span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <em>(<?=$catname=$db1->getSingleResult("select * from feedback where pages='destination' and prod_id =".$row['id']);?> Review)</em>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>	<?php }} ?>
                                   <!-- <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="tg-populartour">
                                            <figure>
                                                <a href="tour-destination-details.php"><img src="img/img-26.jpg" alt="image destinations"></a>
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                    <h3><a href="tour-destination-details.php">City Tours in Europe, Paris</a></h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh...</p>
                                                </div>
                                                <div class="tg-populartourfoot">
                                                    <div class="tg-durationrating">
                                                       <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <em>(3 Review)</em>
                                                    </div>
                                                    <div class="tg-pricearea">
                                                        <del class="ticketprice">Ticket Price</del>
                                                        <h4>$2</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="tg-populartour">
                                            <figure>
                                                <a href="tour-destination-details.php"><img src="img/img-27.jpg" alt="image destinations"></a>
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                    <h3><a href="tour-destination-details.php">City Tours in Europe, Paris</a></h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh...</p>
                                                </div>
                                                <div class="tg-populartourfoot">
                                                    <div class="tg-durationrating">
                                                       <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <em>(3 Review)</em>
                                                    </div>
                                                    <div class="tg-pricearea">
                                                        <del class="ticketprice">Ticket Price</del>
                                                        <h4>$2</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="tg-populartour">
                                            <figure>
                                                <a href="javascript:void(0);"><img src="img/img-28.jpg" alt="image destinations"></a>
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                    <h3><a href="javascript:void(0);">City Tours in Europe, Paris</a></h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh...</p>
                                                </div>
                                                <div class="tg-populartourfoot">
                                                    <div class="tg-durationrating">
                                                       <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <em>(3 Review)</em>
                                                    </div>
                                                    <div class="tg-pricearea">
                                                        <del class="ticketprice">Ticket Price</del>
                                                        <h4>Free</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
 
-->
                                    
                                </div>
                                 
                            </div>
                </div>
                </div>


        </div>

<?php ///////////////////////////////////////////////////?>
<div class="container mt20">   
         <div class="row">       
		 <div class="col-md-8">       
		 <h3 class="title">Reviews 
		 <a href="feedback.php?pid=<?=$_REQUEST['tourid']?>&page=<?=base64_encode('destination')?>" class="pull-right writereviebtn">Write Review</a></h3>					<?php	
		 $dbn=new DB();	
		 
		  $sqln="select * from feedback where pages='destination' and prod_id =".$_REQUEST['tourid'];	
		 $dbn->query($sqln);
		 while($rowfeed=$dbn->fetchArray()){
			 $image_id=$db->getSingleResult("SELECT image_id from user_profile where user_id=".$rowfeed['user-id']);
			 $first_name=$db->getSingleResult("SELECT first_name from all_user where user_id=".$rowfeed['user-id']);	
			 ?>                    <div class="feedbackbox background-white">                        <div class="headerfeedabcdk">							<?php if(!empty($image_id)){?>                            <img src="upload/<?=$image_id?>" alt="india">							<?php }else{ ?>							<img src="images/resources/user.png" alt="" width="50" height="50">							<?php } ?>                            <h3><?=$first_name?></h3>                            <span class="feedback-time"><?php echo timeago($rowfeed['feedback_date']);?></span>                        </div>                        <div class="feedbackbox-details">                            <span class="starlinting">							<?php if($rowfeed['rate']==1){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($rowfeed['rate']==2){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($rowfeed['rate']==3){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($rowfeed['rate']==4){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							<?php if($rowfeed['rate']==5){ ?>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<i class="fa fa-star" aria-hidden="true"></i>							<?php } ?>							</span>                            <h4><?=$rowfeed['title']?></h4>                           <p><?=$rowfeed['review']?></p>                        </div>                    </div>					<?php } ?><!--                    <div class="feedbackbox background-white">                        <div class="headerfeedabcdk">                            <img src="img/img-25.jpg" alt="india">                            <h3>Sachin Techkule</h3>                            <span class="feedback-time">30 min ago</span>                        </div>                        <div class="feedbackbox-details">                            <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>                            <h4>A real "gotta do this" experience</h4>                            <p>                                We just returned from this tour with out guide Sam. It was just my self and my husband so we really had a terrific personal experience. Just being in Old Delhi is eye opening. I'm not even sure I can accurately describe it or do it justice. Sam took us from subway to streets and by tuk tuks always watching out for us, especially me as I use a cane. He gave a history lesson as well as the most delicious food we've had in India this trip. Sam was an outstanding guide, very articulate with excellent english.He get 5 gold stars from us. I didn't know about this company and how much it gives back to the community. I am now extra pleased we did this tour and I will highly recommend it and Sam to anyone visiting India.                            </p>                        </div>                    </div>                    <div class="feedbackbox background-white">                        <div class="headerfeedabcdk">                            <img src="img/img-25.jpg" alt="india">                            <h3>Sachin Techkule</h3>                            <span class="feedback-time">30 min ago</span>                        </div>                        <div class="feedbackbox-details">                            <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>                            <h4>A real "gotta do this" experience</h4>                            <p>                                We just returned from this tour with out guide Sam. It was just my self and my husband so we really had a terrific personal experience. Just being in Old Delhi is eye opening. I'm not even sure I can accurately describe it or do it justice. Sam took us from subway to streets and by tuk tuks always watching out for us, especially me as I use a cane. He gave a history lesson as well as the most delicious food we've had in India this trip. Sam was an outstanding guide, very articulate with excellent english.He get 5 gold stars from us. I didn't know about this company and how much it gives back to the community. I am now extra pleased we did this tour and I will highly recommend it and Sam to anyone visiting India.                            </p>                        </div>                    </div>-->            </div>            </div>        </div>		<?php ////////////////////////////////////////?>  

    </div><!----- background-white -->

        </div>

    </main>

    <?php include('footer.php') ?>
	
	
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBXH7JgXIWzi8QpwjwiwOKk3jDo6k3cEaM&sensor=true">
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