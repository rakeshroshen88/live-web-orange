<?php include('header.php');
include('chksession.php');
?>

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/event-style.css" >
<link rel="stylesheet" href="css/responsive.css" >


 <section class="section-featured-header all-sports-events">
            <div class="container">
                <div class="section-content">
                    <h1>All Sports Events</h1>
                </div>
            </div>
        </section>
    
        <section class="section-refine-search">
            <div class="container">
                <div class="row">
                    <form action="event-search.php">
                        <div class="row">
                        <div class="keyword col-sm-6 col-md-4">
                            <label>Search Keyword</label>
                            <input type="text" class="form-control hasclear" placeholder="Search" name="search"> 
                        </div>
                        <div class="location col-sm-6 col-md-3">
                            <label>Location</label>
                            <select class="selectpicker dropdown" name="location">
							
                              <option>Select Location</option>
							  <?php $sql="SELECT eplace FROM $_TBL_EVENT GROUP BY eplace DESC";
		$db->query($sql)or die($db->error());
		while($row=$db->fetchArray()){	?>
							   <option value="<?=$row['eplace']?>"><?=$row['eplace']?></option>
		<?php }?>      
                            </select>
                        </div>
                        <div class="event-date col-sm-6 col-md-3">
                            <label>Event Date</label>
                           <input type="text" name="eventdate" />
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <input type="submit" value="Search">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    
        <section class="section-search-content">
            <div class="container">
                <div class="row">
                    <div id="secondary" class="col-md-4 col-lg-3">
                        <div class="search-filter">
                            <div class="search-event-title">
                                <h2><span>Event</span> <?=$_REQUEST['cat']?> </h2>
                            </div>
                            <!--<div class="search-filter-delivery">
                                <h3>Delivery</h3>
                                <div class="checkbox">
                                    <input id="delivery1" class="styled" type="checkbox" checked="">
                                    <label for="delivery1">
                                        All
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="delivery2" class="styled" type="checkbox">
                                    <label for="delivery2">
                                        Electronic
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="delivery3" class="styled" type="checkbox">
                                    <label for="delivery3">
                                        Instant
                                    </label>
                                </div>
                            </div>-->
							<?php 
					  $search=$_REQUEST['search'];
					  $cat=$_REQUEST['cat'];
					  $sorts=$_REQUEST['sorts'];
					  $location=$_REQUEST['location'];
					  $qryStr="search=$search";
							?>
                            <div class="search-filter-category">
                                <h3>Categories</h3>
                                <div class="checkbox">
                                    <input id="category1" class="styled" type="checkbox" <?php if($cat=='all'){ echo "checked";} ?> value="all" onClick="chkcat('all')">
                                    <label for="category1">
                                        All
                                    </label>
                                </div>
							<script language="javascript">
function chkcat(cat)
	{	
		location.href="event-search.php?cat="+cat;
	
	}
	
	</script>		
								<?php $db1=new DB();
		 $sql1="SELECT * FROM com_category where menuname='event'";
		  $db1->query($sql1)or die($db1->error());
		  while($row1=$db1->fetchArray()){	
		  $catnew=$row1['catname'];
		?>
							
                                <div class="checkbox">
                                    <input id="<?=$row1['catname']?>" class="styled" type="checkbox" onClick="chkcat('<?=$row1['catname']?>')" <?php if($cat=='$catnew'){ echo "checked";} ?>>
                                    <label for="<?=$row1['catname']?>">
                                       <?=$row1['catname']?>
                                    </label>
                                </div>
		  <?php }?>    
                                
                            </div>
                            <!--<div class="search-filter-seat-features">
                                <h3>Seat Features</h3>
                                <div class="checkbox">
                                    <input id="features1" class="styled" type="checkbox" checked="">
                                    <label for="features1">
                                        All
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="features2" class="styled" type="checkbox">
                                    <label for="features2">
                                        Aisle
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="features3" class="styled" type="checkbox">
                                    <label for="features3">
                                        Ex-Obstucted View
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="features4" class="styled" type="checkbox">
                                    <label for="features4">
                                        Parking Pass Included
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input id="features5" class="styled" type="checkbox">
                                    <label for="features5">
                                        Wheelchair Accessible
                                    </label>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                    
                    <div id="primary" class="col-md-8 col-lg-9">
                      <?php 
					  
					  if(empty($rec))
			{
			$_LIST_LEN=2;
			}else{
			$_LIST_LEN=$rec;
			}
					  $db2=new DB();
	if(!empty($search)){
				$sql2="SELECT * FROM $_TBL_EVENT where etitle like '%$search%' or eplace like '%$location%'";
	}elseif(!empty($sorts)){
		$sql2="SELECT * FROM $_TBL_EVENT order by price $sorts";	
	}else{
		if($cat=='all'){
			$sql2="SELECT * FROM $_TBL_EVENT ";
		}else{
			 $sql2="SELECT * FROM $_TBL_EVENT where eventcat='$cat'";	
		}
	}
	$db2->query($sql2)or die($db2->error());
	$total_records=$db2->numRows();
	$page=new Page;
	$page->show_disabled_links=true;
	$page->set_page_data($_PAGE,$total_records,$_LIST_LEN,10,true,true,true);
	$page->set_qry_string($qryStr);
	$db2->query($page->get_limit_query($sql2)); 
	if(empty($total_records)){$_LIST_LEN=0;}
	?>
                        <div class="search-result-header">
                            <div class="row">
                                <div class="col-sm-7">
                                    <h2>All Sports Events at San Francisco</h2>
                                    <span>Showing <?=$_LIST_LEN?> of <?=$total_records?> Results</span>
                                </div>
                                <div class="col-sm-5">
                                    <label>Sort By</label>
									<form>
                                    <select class="" name="sorts" id="sorts">
                                      <option value="asc">Price: Low-High</option>
                                      <option value="desc">Price: High-Low</option>
                                    </select>
									</form>
                                </div>
                            </div>
                        </div>
                      
	<?php if($db2->numRows()>0)
		{
		  while($row2=$db2->fetchArray()){	
		  $e=$row2['edate'];
		  $e31=explode(' ',$e);		  
		  $e3=explode('-',$e31[0]);		
		  $month_name = date("F", mktime(0, 0, 0, $e3[1], 10));
		?>
                        <div class="search-result-item">
                            <div class="row">
                                <div class="search-result-item-info col-sm-9">
                                    <h3><?=$row2['etitle']?></h3>
                                    <ul class="row">
                                        <li class="col-sm-5 col-lg-6">
                                            <span>Venue</span>
                                           <?=$row2['eplace']?>
                                        </li>
                                        <li class="col-sm-4 col-lg-3">
                                            <span><?php $timestamp = strtotime($row2['edate']);

echo $day = date('l', $timestamp);?></span>
                                          <?php echo $date = date('F M Y', $timestamp);?>
                                        </li>
                                        <li class="col-sm-3">
                                            <span>Time</span>
                                             <?=$row2['etime']?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-result-item-price col-sm-3">
                                    <span>Price From</span>
                                    <strong> ₦ <?=number_format($row2['price'],2);?></strong>
                                    <a href="event-order-details.php?eid=<?=$row2['eid']?>">Request Now</a>
                                </div>
                            </div>
                        </div>
		  <?php }?>
		  
<!--
					   <div class="search-result-item sold-out">
                            <div class="row">
                                <div class="search-result-item-info col-sm-9">
                                    <h3>Golf Master SF Championship</h3>
                                    <ul class="row">
                                        <li class="col-sm-5 col-lg-6">
                                            <span>Venue</span>
                                            First Niagara Center (Buffalo, NY)
                                        </li>
                                        <li class="col-sm-4 col-lg-3">
                                            <span>Saturday</span>
                                            August. 1st, 2016 
                                        </li>
                                        <li class="col-sm-3">
                                            <span>Time</span>
                                            07:00 PM
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-result-item-price col-sm-3">
                                    <span>Price From</span>
                                    <strong>$113</strong>
                                    <a href="#">Sold Out</a>
                                </div>
                            </div>
                        </div>
                        <div class="search-result-item sale">
                            <div class="ribbon"><span>Sale</span></div>
                            <div class="row">
                                <div class="search-result-item-info col-sm-9">
                                    <h3>UEFA Champions League final (FC Barcelona v AC Milan)</h3>
                                    <ul class="row">
                                        <li class="col-sm-5 col-lg-6">
                                            <span>Venue</span>
                                            Palace Of Auburn Hills (Auburn Hills, MI)
                                        </li>
                                        <li class="col-sm-4 col-lg-3">
                                            <span>Saturday</span>
                                            August. 3rd, 2016 
                                        </li>
                                        <li class="col-sm-3">
                                            <span>Time</span>
                                            07:00 PM
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-result-item-price col-sm-3">
                                    <span>Price From</span>
                                    <strong><span>$140</span>$125</strong>
                                    <a href="#" class="sold-out">Request Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="search-result-item">
                            <div class="row">
                                <div class="search-result-item-info col-sm-9">
                                    <h3>FA Cup final (Manchester City v Leicester City)</h3>
                                    <ul class="row">
                                        <li class="col-sm-5 col-lg-6">
                                            <span>Venue</span>
                                            First Niagara Center (Buffalo, NY)
                                        </li>
                                        <li class="col-sm-4 col-lg-3">
                                            <span>Saturday</span>
                                            August. 1st, 2016 
                                        </li>
                                        <li class="col-sm-3">
                                            <span>Time</span>
                                            07:00 PM
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-result-item-price col-sm-3">
                                    <span>Price From</span>
                                    <strong>$140</strong>
                                    <a href="#">Request Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="search-result-item">
                            <div class="row">
                                <div class="search-result-item-info col-sm-9">
                                    <h3>NBA Finals</h3>
                                    <ul class="row">
                                        <li class="col-sm-5 col-lg-6">
                                            <span>Venue</span>
                                            CONSOL Energy Center (Pittsburgh, PA)
                                        </li>
                                        <li class="col-sm-4 col-lg-3">
                                            <span>Saturday</span>
                                            August. 5th, 2016 
                                        </li>
                                        <li class="col-sm-3">
                                            <span>Time</span>
                                            07:00 PM
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-result-item-price col-sm-3">
                                    <span>Price From</span>
                                    <strong>$155</strong>
                                    <a href="#">Request Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="search-result-item sold-out">
                            <div class="row">
                                <div class="search-result-item-info col-sm-9">
                                    <h3>Women's Baseball World Cup  </h3>
                                    <ul class="row">
                                        <li class="col-sm-5 col-lg-6">
                                            <span>Venue</span>
                                            Lincoln Financial Field (Philadelphia, PA)
                                        </li>
                                        <li class="col-sm-4 col-lg-3">
                                            <span>Saturday</span>
                                            August. 6th, 2016 
                                        </li>
                                        <li class="col-sm-3">
                                            <span>Time</span>
                                            07:00 PM
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-result-item-price col-sm-3">
                                    <span>Price From</span>
                                    <strong>$160</strong>
                                    <a href="#">Sold Out</a>
                                </div>
                            </div>
                        </div>
                        <div class="search-result-item">
                            <div class="row">
                                <div class="search-result-item-info col-sm-9">
                                    <h3>UCI Road World Championships</h3>
                                    <ul class="row">
                                        <li class="col-sm-5 col-lg-6">
                                            <span>Venue</span>
                                            Rose Bowl (Pasadena, CA)
                                        </li>
                                        <li class="col-sm-4 col-lg-3">
                                            <span>Saturday</span>
                                            August. 20th, 2016 
                                        </li>
                                        <li class="col-sm-3">
                                            <span>Time</span>
                                            07:00 PM
                                        </li>
                                    </ul>
                                </div>
                                <div class="search-result-item-price col-sm-3">
                                    <span>Price From</span>
                                    <strong>$175</strong>
                                    <a href="#">Request Now</a>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="search-result-footer">
                            <ul class="pagination">
							 <?php $page->get_page_nav()?>		  
                              <!--  <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li class="active"><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>-->
                            </ul>
                        </div>
                   
<?php	}else{

?>  
 <div class="search-result-footer search-filter">
					<b>Data not found !</b>                   
 </div>
 <?php   } ?> 
					
					
					
					</div>
                </div>
            </div>
        </section>

        
         
          

<?php include('footer.php') ?>
<script type="text/javascript">
$(function() {
    $('#sorts').change(function() {
        this.form.submit();
    });
});
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