<?php include('header.php');
include('chksession.php');
?>
 
<style type="text/css">
    .chatfeature-leftbar{display: none}
</style>
    <main>
        <div class="main-section">
            <div class="container">
                <!--************************************
                Inner Banner Start
        *************************************-->
        <section class="tg-parallax tg-innerbanner detailsbanner">
            
            <div class="bannerinnermain">
                <div class="tg-sectionspace tg-haslayout">
                 
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1><?php echo $_REQUEST['type']; ?></h1>
                            <h2>Donec id elit non mi porta gravida at eget metus</h2>
                            <ol class="tg-breadcrumb">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li class="tg-active">Listing</li>
                            </ol>
                        </div>
                    </div>
                 
            </div>

                <img src="img/bgparallax-06.jpg" alt="new banner">
            </div>
        </section>
      
            </div>





            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-listing tg-listingvone">
                                 
                                <div class="clearfix"></div>
                                <div class="row">
								<?php $wherestr1=" where cityid='".$_POST['dcity']."' or type='".$_POST['dtype']."'";	
								$_LIST_LEN=20;
								$db1=new DB();
								$sql="SELECT * from ".$_TBL_DESTINATION.$wherestr1;		$db->query($sql);	
								$total_records=$db->numRows();
								$page=new Page;
								$page->show_disabled_links=true;	
								$page->set_page_data($_PAGE,$total_records,$_LIST_LEN,10,true,true,true);
								$page->set_qry_string($qryStr);
								$db->query($page->get_limit_query($sql));
								if($db->numRows()>0)	{	
								while($row=$db->fetchArray()){	
								$date=explode('-',$row['date']);
								$st=mktime(0,0,0,$date[1],$date[2],$date[0]);
								?>
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                        <div class="tg-populartour">
                                            <figure>
                                                <a href="tour-destination-details.php?tourid=<?=$row['id']?>"><?php if(!empty($row['picture'])){ ?>														<img src="destination/<?=$row['picture']?>" alt="image destinations">														<?php }else{ ?>														<img src="img/tours/img-01.jpg" alt="image destinations">														<?php } ?></a>
                                                
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                     <h3><a href="tour-destination-details.php?tourid=<?=$row['id']?>">															<?=$row['title']?></a></h3>
                                                </div>
                                                <div class="tg-description">
                                                    <p><?=$row['weither']?></p>
                                                </div>
                                                <div class="tg-populartourfoot">
                                                    <div class="tg-durationrating">
                                                       <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <em>(<?=$reviews=$db1->getSingleResult("select * from feedback where pages='destination' and prod_id =".$row['id']);?> Review)</em>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              	<?php }} ?>
                                   

                                  
                                    
                                </div>
                                <div class="clearfix"></div>
                                <nav class="tg-pagination">
								<?php echo $page->get_page_nav();?>
                                   <!-- <ul>
                                        <li class="tg-active"><a href="javascript:void(0);">1</a></li>
                                        <li><a href="javascript:void(0);">2</a></li>
                                        <li><a href="javascript:void(0);">3</a></li>
                                        <li><a href="javascript:void(0);">4</a></li>
                                        <li class="tg-nextpage"><a href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>-->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
           

        </div>

    </main>

    <?php include('footer.php') ?>