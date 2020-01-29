<?php include('header.php');
include('chksession.php');
?>

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/event-style.css" >
<link rel="stylesheet" href="css/responsive.css" >


 
        
        <section class="hero-1">
            <div class="container">
                <div class="row">
                    <div class="hero-content">
                        <h1 class="hero-title">Make Your Dream Come True</h1>
                        <p class="hero-caption">Meet your favorite artists, sport teams and parties</p>
                        <div class="hero-search"><form action="event-search.php" method="get">
                            <input type="text" placeholder="Seach Artist, Team, or Venue" name="search">
							</form>
                        </div>
                        <div class="hero-location">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> San Francisco <a href="#">Change Location</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-todays-schedule">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2>Today's Schedule</h2>
                        <span class="todays-date"><i class="fa fa-calendar" aria-hidden="true"></i> <strong><?php echo date('d');?></strong> <?php echo date('M Y');?> </span>
                    </div>
                    <div class="section-content">
                        <ul class="clearfix">
		<?php $db2=new DB();
		$sql2="SELECT * FROM $_TBL_EVENT order by edate";
		  $db2->query($sql2)or die($db2->error());
		  while($row2=$db2->fetchArray()){	
		  $e=$row2['edate'];
		  $e31=explode(' ',$e);
		  
		  $e3=explode('-',$e31[0]);
		 // print_r($e3);
		// echo  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
		
		$month_name = date("F", mktime(0, 0, 0, $e3[1], 10));
		?>
                            <li class="event-1">
                                <span class="event-time"><?=$row2['etime']?><!--<strong>AM</strong>--></span>
                                <strong class="event-name"><?=$row2['etitle']?></strong>
                                <a href="event-details.php?eid=<?=$row2['eid']?>" class="get-ticket">Get Ticket</a>
                            </li>
		  <?php } ?>	
                              
                        </ul>
                        <strong class="event-list-label">Full Event <span>Schedules</span></strong>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-upcoming-events section-calendar-events ">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2>Upcoming Events</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.</p>
                        <a href="#">See all upcoming events</a>
                    </div>

                    <div class="section-header">
                        <div class="scrtabs-tab-scroll-arrow scrtabs-tab-scroll-arrow-left" style="display: block;"><span class="glyphicon glyphicon-chevron-left"></span></div>
                        <div class="scrtabs-tabs-fixed-container">
                            <div class="scrtabs-tabs-movable-container">
                                <ul class="nav nav-tabs event-tabs" role="tablist">
		<?php /* $sql="SELECT edate FROM $_TBL_EVENT group by edate";
		$db->query($sql)or die($db->error());
		while($row=$db->fetchArray()){	
		$e=$row['edate'];
		$e31=explode(' ',$e);
		$e3=explode('-',$e31[0]);
		$month_name = date("F", mktime(0, 0, 0, $e3[1], 10));
		if($e3[1]=='01'){$mon='Jan';}
		if($e3[1]=='02'){$mon='Feb';}
		if($e3[1]=='03'){$mon='Mar';}
		if($e3[1]=='04'){$mon='Apr';}
		if($e3[1]=='05'){$mon='May';}
		if($e3[1]=='06'){$mon='Jun';}
		if($e3[1]=='07'){$mon='Jul';}
		if($e3[1]=='08'){$mon='Aug';}
		if($e3[1]=='09'){$mon='Sept';}
		if($e3[1]=='10'){$mon='Oct';}
		if($e3[1]=='11'){$mon='Nov';}
		if($e3[1]=='12'){$mon='Dec';} */
		?>
								   <!--<li role="presentation" class="active">
                                        <a href="#<?=$mon?>" role="tab" data-toggle="tab"><?=$mon?> <span><?=$e3[0]?></span></a>
                                    </li>-->
		<?php //}?>	
									<li role="presentation" class="active">
                                        <a href="#Jan" role="tab" data-toggle="tab">Jan <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Feb" role="tab" data-toggle="tab">Feb <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Mar" role="tab" data-toggle="tab">Mar <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Apr" role="tab" data-toggle="tab">Apr <span>2020</span></a>
                                    </li>
									 <li role="presentation">
                                        <a href="#May" role="tab" data-toggle="tab">May <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Jun" role="tab" data-toggle="tab">Jun <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Jul" role="tab" data-toggle="tab">Jul <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Aug" role="tab" data-toggle="tab">Aug <span>2016</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Sep" role="tab" data-toggle="tab">Sep <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Oct" role="tab" data-toggle="tab">Oct <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Nov" role="tab" data-toggle="tab">Nov <span>2020</span></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Dec" role="tab" data-toggle="tab">Dec <span>2020</span></a>
                                    </li>
                                    
                                </ul>

                            </div>
                        </div>
                        

                        <div class="scrtabs-tab-scroll-arrow scrtabs-tab-scroll-arrow-right" style="display: block;"><span class="glyphicon glyphicon-chevron-right"></span></div>
                    </div>


                    <div class="section-content width100 listeventshome">
                        <ul class="clearfix">
						<?php $sql="SELECT * FROM $_TBL_EVENT order by edate";
		$db->query($sql)or die($db->error());
		if ($db->numRows() > 0)
		{
		while($row=$db->fetchArray()){	
		$e=$row['edate'];
		  $e31=explode(' ',$e);
		  
		  $e3=explode('-',$e31[0]);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
		  $month_name = date("F", mktime(0, 0, 0, $e3[1], 10));
		  if($e3[1]=='01'){$mon='Jan';}
		if($e3[1]=='02'){$mon='Feb';}
		if($e3[1]=='03'){$mon='Mar';}
		if($e3[1]=='04'){$mon='Apr';}
		if($e3[1]=='05'){$mon='May';}
		if($e3[1]=='06'){$mon='Jun';}
		if($e3[1]=='07'){$mon='Jul';}
		if($e3[1]=='08'){$mon='Aug';}
		if($e3[1]=='09'){$mon='Sep';}
		if($e3[1]=='10'){$mon='Oct';}
		if($e3[1]=='11'){$mon='Nov';}
		if($e3[1]=='12'){$mon='Dec';}
		?>
                            <li data-category="<?=$mon?>"  class="active">
                                <div class="date">
                                    <a href="#">
                                        <span class="day"><?=$e3[2]?></span>
                                        <span class="month"><?=$month_name?></span>
                                        <span class="year"><?=$e3[0]?></span>
                                    </a>
                                </div>
                                <a href="event-details.php?eid=<?=$row['eid']?>">
								<?php if(!empty($row['eimageid'])){?>
                                    <img src="images/events/<?=$row['eimageid']?>" alt="<?=$row['etitle']?>">
								<?php }else{ ?>
								 <img src="images/events/noimmage.jpeg" alt="<?=$row['etitle']?>">
								<?php } ?>
                                </a>
                                <div class="info">
                                    <p><?=$row['etitle']?> <span><?=$row['eventcat']?></span></p>
                                    <a href="event-details.php?eid=<?=$row['eid']?>" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                          
		<?php }}else{ ?>
		  <li><div class="info"> Event Not Found!</div></li>
		<?php }?>		
						 <!-- <li data-category="May_2016" class="active">
                                <div class="date">
                                    <a href="#">
                                        <span class="day">27</span>
                                        <span class="month">August</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/events/upcoming-event-3.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li data-category="May_2016"  class="active">
                                <div class="date">
                                    <a href="#">
                                        <span class="day">25</span>
                                        <span class="month">August</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/events/upcoming-event-1.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>BMW Open Championship <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            <li data-category="May_2016" class="active">
                                <div class="date">
                                    <a href="#">
                                        <span class="day">27</span>
                                        <span class="month">August</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/events/upcoming-event-3.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Envato Author SF Meetup <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>

                            <li data-category="Jun_2016">
                                <div class="date">
                                    <a href="#">
                                        <span class="day">26</span>
                                        <span class="month">August</span>
                                        <span class="year">2016</span>
                                    </a>
                                </div>
                                <a href="#">
                                    <img src="images/events/upcoming-event-2.jpg" alt="image">
                                </a>
                                <div class="info">
                                    <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                                    <a href="#" class="get-ticket">Get Ticket</a>
                                </div>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-event-category">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2>Event by Categories</h2>
                    </div>
                    <div class="section-content">
                        <ul class="row clearfix">
		<?php $db1=new DB();
		 $sql1="SELECT * FROM com_category where menuname='event'";
		  $db1->query($sql1)or die($db1->error());
		  while($row1=$db1->fetchArray()){	
		  
		?>
                            <li class="col-sm-3">
                                 <div class="category-1 ">
								 <?php if(!empty($row1['imgid'])){?>
                                <img src="category/<?=$row1['imgid']?>" alt="<?=$row1['catname']?>">
								<?php }else{ ?>
								 <img src="images/events/noimmage.jpeg" alt="<?=$row1['catname']?>">
								<?php } ?>
                                <a href="event-list.php?categoty=<?=$row1['catname']?>"><span><?=$row1['catname']?></span></a>
                                </div>
                            </li>
							
		  <?php } ?>
                           <!-- <li class=" col-sm-3">
                                <div class="category-2 ">
                                <img src="images/events/event-category-2.jpg" alt="image">
                                <a href="#"><span>Sports</span></a>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="category-3 ">
                                <img src="images/events/event-category-3.jpg" alt="image">
                                <a href="#"><span>Threaters</span></a>
                                </div>
                            </li>
                            <li class=" col-sm-3">
                                <div class="category-4 ">
                                <img src="images/events/event-category-4.jpg" alt="image">
                                <a href="#"><span>Parties</span></a>
                                </div>
                            </li>
                            <li class=" col-sm-3">
                                <div class="category-5 ">
                                <img src="images/events/event-category-5.jpg" alt="image">
                                <a href="#"><span>Communities</span></a>
                                </div>
                            </li>
                            <li class=" col-sm-3">
                                <div class="category-6">
                                <img src="images/events/event-category-6.jpg" alt="image">
                                <a href="#"><span>Classes</span></a>
                                </div>

                            </li>
                            <li class=" col-sm-3">
                                <div class="category-2 ">
                                <img src="images/events/event-category-2.jpg" alt="image">
                                <a href="#"><span>Sports</span></a>
                                </div>
                            </li>
                            <li class="col-sm-3">
                                <div class="category-3 ">
                                <img src="images/events/event-category-3.jpg" alt="image">
                                <a href="#"><span>Threaters</span></a>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-stats">
            <div class="container">
                <div class=" ">
                    <div class="section-content">
                        <ul class="row clearfix">
                            <li class="col-sm-4">
                                <span class="count">598</span>
                                <hr>
                                <p>Events Active</p>
                            </li>
                            <li class="col-sm-4">
                                <span class="count">16,173</span>
                                <hr>
                                <p>Active User</p>
                            </li>
                            <li class="col-sm-4">
                                <span class="count">136,874</span>
                                <hr>
                                <p>Ticket Sold</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-recent-videos">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2>Recent Videos</h2>
                    </div>
                    <div class="section-content">
                        <ul class="row clearfix">
                            <li class="col-sm-3">
                                <div class="video">
                                    <img src="images/events/recent-video-1.jpg" alt="image">
                                    <div class="video-player">
                                        <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a> 
                                        <span>2:33</span>
                                    </div>
                                </div>
                                <h3 class="video-title">
                                    <a href="#">Envato Author Community Fun Hiking at Semeru Mountaint</a>
                                </h3>
                            </li>
                            <li class="col-sm-3">
                                <div class="video">
                                    <img src="images/events/recent-video-2.jpg" alt="image">
                                    <div class="video-player">
                                        <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a> 
                                        <span>2:33</span>
                                    </div>
                                </div>
                                <h3 class="video-title">
                                    <a href="#">Nike Urban Running Chalenge with Kobe 2016</a>
                                </h3>
                            </li>
                            <li class="col-sm-3">
                                <div class="video">
                                    <img src="images/events/recent-video-3.jpg" alt="image">
                                    <div class="video-player">
                                        <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a> 
                                        <span>2:33</span>
                                    </div>
                                </div>
                                <h3 class="video-title">
                                    <a href="#">Entrepreneurial Think Thank: Shifting the Education Paradigm</a>
                                </h3>
                            </li>
                            <li class="col-sm-3">
                                <div class="video">
                                    <img src="images/events/recent-video-4.jpg" alt="image">
                                    <div class="video-player">
                                        <a href="#"><i class="fa fa-play" aria-hidden="true"></i></a> 
                                        <span>2:33</span>
                                    </div>
                                </div>
                                <h3 class="video-title">
                                    <a href="#">Southeast Asia Weekend Festival 2016</a>
                                </h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-call-to-action">
            <div class="container">
                <div class="row">
                    <div class="section-content">
                        <ul class="row clearfix">
                            <li class="col-sm-12 col-md-9">
                                <h3>Share experiences with your friends</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                            </li>
                            <!--<li class="col-sm-12 col-md-3">
                                <a href="#" class="action-btn">Learn More</a>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
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