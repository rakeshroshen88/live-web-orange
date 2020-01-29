<?php include('header.php');
include('chksession.php');
		$sql="SELECT * FROM $_TBL_EVENT where eid=".$_REQUEST['eid'];
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['edate'];
		  $e31=explode(' ',$e);
		  
		  $e3=explode('-',$e31[0]);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
		  $month_name = date("F", mktime(0, 0, 0, $e3[1], 10));
		?>


<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/event-style.css" >
<link rel="stylesheet" href="css/responsive.css" >

<section class="section-event-single-featured-header">
            <div class="container">
                <div class="section-content">
                    <h1>Tickets for  <?=$row['etitle']?></h1> 
                    <p>
                        <span>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>  <?=$row['eplace']?>
                        </span>
                    </p>
                </div>
            </div>
        </section>
    
        <section class="section-event-single-header">
            <div class="container">
                <h1>Get up close to FC Barcelona</h1>
                <ul class="ticket-purchase">
                    <li>
                        Ticket from
                    </li>
                    <li>
                        <span> ₦ <?=number_format($row['price'],2);?></span>
                    </li>
                    <li>
                        <a href="event-order-details.php?eid=<?=$row['eid']?>">Request for Tickets</a>
                    </li>
                </ul>
            </div>
        </section>
    
        <section class="section-event-single-content">
            <div class="container">
                <div class="row">
                    <div id="primary" class="col-sm-12 col-md-12">
                        <div class="event-features">
                            <ul>
                                <li>
                                    <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>
                                    Smartphone <br> tickets accepted
                                </li>
                                <li>
                                    <i class="fa fa-hourglass-o fa-2x" aria-hidden="true"></i>
                                    Duration: 1 hour <br> and 30 minutes
                                </li>
                                <li>
                                    <i class="fa fa-subway fa-2x" aria-hidden="true"></i>
                                    Metro Line 3: stop Palau <br> Reial or Les Corts
                                </li>
                                <li>
                                    <i class="fa fa-car fa-2x" aria-hidden="true"></i>

                                    Car Parking:<br> Available
                                </li>
                            </ul>
                        </div>
                        <div class="event-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="event-info-img">
                                            <!-- Carousel -->
        
<div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
		<img src="images/events/<?=$row['eimageid']?>" class="d-block w-100" alt="<?=$row2['etitle']?>">          

        </div>
<?php 
		
		$sql1="SELECT * FROM eimage WHERE e_id=".$row['eid'];
		$db->query($sql1)or die($db->error());
		while($rownew=$db->fetchArray()){	?>
        <div class="carousel-item">
            <img src="images/events/<?=$rownew['image']?>" class="d-block w-100" alt="<?=$row['etitle']?>">
        </div>
		<?php } ?>
   
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
                                <div class="col-md-6">
                                    <div class="event-info-about">
                                        <h2>ABOUT THIS <?=$row['etitle']?></h2>
                                       <?=$row['edetail']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-highlights">
                            <h2>Highlights</h2>
                             <p><?=$row['highlight']?></p>
                           
					   </div>
                        <div class="event-location">
                            <h2>Location</h2>
                            <p> <?=$row['eplace']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="event-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.6864762013092!2d2.1206311157511477!3d41.380895979264686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a498f576297baf%3A0x44f65330fe1b04b9!2sCamp+Nou!5e0!3m2!1sen!2sph!4v1491114335931" width="100%" height="435" allowfullscreen></iframe>
        </section>

        
         
          

<?php include('footer.php') ?>
<script type="text/javascript">
    $(document).ready(function(){
        var divWidth = $(".scrtabs-tabs-movable-container ul li").width();
        var liLenth = $(".scrtabs-tabs-movable-container ul li").length;
        //var TotalWidth = ;

        $(".scrtabs-tabs-movable-container ul").width(parseFloat(divWidth) * parseFloat(divWidth));
        


        $(".scrtabs-tab-scroll-arrow-left").click(function(){
            //$(".scrtabs-tabs-movable-container").css('left', '+=150');
            $( ".scrtabs-tabs-movable-container" ).animate({ left: "-=180"});

            var divWidth = $(".scrtabs-tabs-movable-container ul li").width();

            //alert(divWidth);

         


        });

        $(".scrtabs-tab-scroll-arrow-right").click(function(){
            //$(".scrtabs-tabs-movable-container").css('left', '+=150');
            $( ".scrtabs-tabs-movable-container" ).animate({ left: "+=180"});

        });

        // filter for events
        $(".scrtabs-tabs-movable-container ul li a").click(function(){
            var href = $(this).attr('href');
            var arr = href.split('#');
            ///alert(arr[1]);  
            $(".listeventshome li").removeClass("active"); 
            $(".listeventshome li[data-category='"+arr[1]+"']").addClass("active");
        })

    });
</script>