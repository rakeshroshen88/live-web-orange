<?php include('header.php');
include('chksession.php');
?>

<style type="text/css">
    .chatfeature-leftbar{display: none}
</style>
<section>
     
	<div class="hotelhomesslider">
		<div class="swiper-content">
			<div class="slider-logo">
				<img src="img/bed-logo.png" alt="Image">
			</div>
			<h3 data-animation="animated fadeInUp">The lap of Luxury</h3>
			<h1 data-animation="animated fadeInUp">Hotel <span>Hotux</span></h1>
			<a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or mar-right-10"><i class="fa fa-book"></i> Explore Our Rooms</a>
			<a href="#" data-animation="animated fadeInUp" class="slider-btn btn-wt"><i class="fa fa-book"></i> Book A Room Now</a>
		</div>

		<img src="img/hotel-slider2.jpg" alt="slider2">
	</div>
    <div class="banner-form">
        <div class="container">
            <div class="form-content">
                <div class="table-item">
                    <div class="form-group">
                        <div class="date-range-inner-wrapper">
                            <input id="date-range2" class="form-control" value="Check In"> 
                        </div>
                    </div>
                </div>
                <div class="table-item">
                    <div class="form-group form-icon">
                        <div class="date-range-inner-wrapper">
                            <input id="date-range3" class="form-control" value="Check Out">
                            
                        </div>
                    </div>
                </div>
                <div class="table-item">
                    <div class="form-group form-icon">
                        <select>
                            <option value="0">Guest</option>
                            <option value="1">0</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">4</option>
                        </select>
                    </div>
                </div>
                <div class="table-item">
                    <div class="form-group form-icon">
                        <select>
                            <option value="0">Nights</option>
                            <option value="1">0</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">4</option>
                        </select>
                    </div>
                </div>

                <div class="table-item">
                    <div class="form-group form-icon">
                        <select>
                            <option value="0">City</option>
                            <option value="1"> City 0</option>
                            <option value="2">City 1</option>
                            <option value="3">City  2</option>
                            <option value="4">City  3</option>
                            <option value="5">City  4</option>
                        </select>
                    </div>
                </div>

                <div class="table-item">
                    <div class="form-btn">
                        <a class="btn btn-orange">Check Availability</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about-us">
    <div class="container container1170">
        <div class="section-title">
            <h2>About <span>Us</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
        </div>
        <div class="about-outer">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-content">
                        <h3 class="mar-bottom-30">Finest and Luxurious Hotel in the Town</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius iaculis gravida. Nunc vel maximus libero. Quisque ligula nisi, hendrerit et scelerisque et, scelerisque vitae magna. Integer sollicitudin, ex auctor iaculis tempor, mauris odio accumsan odio.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius iaculis gravida. Nunc vel maximus libero. Quisque ligula nisi, hendrerit et scelerisque et, scelerisque vitae magna. Integer sollicitudin, ex auctor iaculis tempor, mauris odio accumsan odio.</p>
                        <a class="btn btn-orange mar-top-10">KNOW MORE ABOUT US <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-image">
                        <div class="image-box">
                            <div class="image-1 abt-image">
                                <img src="img/about1.jpg" alt="image">
                            </div>
                            <div class="image-2 abt-image">
                                <img src="img/about2.jpg" alt="image">
                            </div>
                        </div>
                        <div class="image-box">
                            <div class="image-3 abt-image">
                                <img src="img/about3.jpg" alt="image">
                            </div>
                            <div class="image-4 abt-image">
                                <img src="img/about4.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="rooms">
    <div class="container container1170">
        <div class="section-title">
            <h2>Explore <span>Rooms</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
        </div>
        <div class="room-outer">
            <div class="row">
			  <?php 	
				$db2=new DB();
				 $sql="SELECT * FROM $_TBL_HOTEL";
				$db->query($sql)or die($db->error());
				while($row2=$db->fetchArray()){	
				 $cid=$row2['cityid'];
				 $city=$db2->getSingleResult("select cityname from cities where id=".$id);
				 $sql2="SELECT * FROM $_TBL_ITEMIMAGE WHERE item_id='".$row2['id']."' limit 0,1";
				 $db2->query($sql2)or die($db2->error());
				 $imagerow=$db2->fetchArray();
				
		?> 
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="room-item">
                        <div class="room-image">
						<?php if(!empty($row2['picture'])){ ?>
                            <img src="<?=$_SITE_PATH?>holi/<?=$row2['picture']?>" alt="image">
						<?php }else{ ?>
						<img src="img/room1.jpg" alt="image">
						<?php }?>
                        </div>
                        <div class="room-content">
                            <div class="room-title">
                                <h4><?=$row2['title']?></h4>
                                <p>₦<?=$row2['price']?>/Night</p>
                                <div class="deal-rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                            </div>
                            <div class="room-services mar-bottom-15">
                                <ul>
                                    <li><i class="fa fa-bed" aria-hidden="true"></i>  Bed Rooms</li>
                                    <li><i class="fa fa-wifi" aria-hidden="true"></i>  Wi-Fi</li>
                                </ul>
                            </div>
                            <p><?=$row2['sortdetail']?></p>
                            <div class="room-btns mar-top-20">
                                <a href="hotel-details.php?hid=<?=base64_encode($row2['id'])?>" class="btn btn-black mar-right-10">VIEW DETAILS</a>
                                <a href="hotel-booking.php?hid=<?=base64_encode($row2['id'])?>" class="btn btn-orange">BOOK NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
              
				<?php } ?>  
			
            </div>
        </div>
        <div class="section-btn">
            <a href="#" class="btn btn-black mar-right-10">EXPLORE ALL ROOMS <i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>
</section>


<section class="call-to-action">
    <div class="container-fluid">
        <div class="row display-flex">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="call-content pad-left-30">
                    <h2 class="white mar-bottom-25">Discover a brand <span>luxurious</span> hotel</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor, eros nec porttitor viverra, felis libero luctus nisi, non volutpat purus felis ut erat ipsum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor, eros nec porttitor viverra, felis libero luctus nisi, non volutpat purus felis ut erat ipsum.</p>
                    <a href="#" class="btn btn-orange mar-top-20">READ MORE <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="call-button">
                    <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo"><i class="fa fa-play"></i></button>
                </div>
                <div class="video-figure"></div>
            </div>
        </div>
    </div>
</section>


<section class="news">
    <div class="container container1170">
        <div class="section-title">
            <h2>Latest <span>News</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
        </div>
        <div class="news-outer">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="news-item">
                        <div class="news-image">
                            <img src="img/news1.jpg" alt="image">
                        </div>
                        <div class="news-content">
                            <p class="date mar-bottom-5">16 DECEMBER 2019</p>
                            <h4><a href="single-right.html">Why choose Hotux Hotel to travel this summer</a></h4>
                            <div class="room-services mar-bottom-10">
                                <ul>
                                    <li><a href="single-right.html"><i class="fa fa-user" aria-hidden="true"></i> By Jack Daniels</a></li>
                                    <li><a href="single-right.html"><i class="fa fa-comment" aria-hidden="true"></i> 3 comments</a></li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                            <a href="single-left.html">READ MORE <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="news-item">
                        <div class="news-image">
                            <img src="img/news1.jpg" alt="image">
                        </div>
                        <div class="news-content">
                            <p class="date mar-bottom-5">16 DECEMBER 2019</p>
                            <h4><a href="single-right.html">Why choose Hotux Hotel to travel this summer</a></h4>
                            <div class="room-services mar-bottom-10">
                                <ul>
                                    <li><a href="single-right.html"><i class="fa fa-user" aria-hidden="true"></i> By Jack Daniels</a></li>
                                    <li><a href="single-right.html"><i class="fa fa-comment" aria-hidden="true"></i> 3 comments</a></li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                            <a href="single-left.html">READ MORE <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="news-item">
                        <div class="news-image">
                            <img src="img/news1.jpg" alt="image">
                        </div>
                        <div class="news-content">
                            <p class="date mar-bottom-5">16 DECEMBER 2019</p>
                            <h4><a href="single-right.html">Why choose Hotux Hotel to travel this summer</a></h4>
                            <div class="room-services mar-bottom-10">
                                <ul>
                                    <li><a href="single-right.html"><i class="fa fa-user" aria-hidden="true"></i> By Jack Daniels</a></li>
                                    <li><a href="single-right.html"><i class="fa fa-comment" aria-hidden="true"></i> 3 comments</a></li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                            <a href="single-left.html">READ MORE <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-btn">
            <a href="#" class="btn btn-black mar-right-10">EXPLORE ALL <i class="fas fa-angle-double-right"></i></a>
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
       
       /* $('#date-range2').dateRangePicker({
    autoClose: true,
    singleDate : true,
    showShortcuts: false,
    singleMonth: true,
    showTopbar: false,
    extraClass: 'reserved-form',
    customArrowPrevSymbol: '<span class="fa fa-angle-left"></span>',
    customArrowNextSymbol: '<span class="fa fa-angle-right"></span>'
    
  });

$('#date-range3').dateRangePicker({
    autoClose: true,
    singleDate : true,
    showShortcuts: false,
    singleMonth: true,
    showTopbar: false,
    extraClass: 'reserved-form',
    customArrowPrevSymbol: '<span class="fa fa-angle-left"></span>',
    customArrowNextSymbol: '<span class="fa fa-angle-right"></span>'
    
  });*/
    </script> 

