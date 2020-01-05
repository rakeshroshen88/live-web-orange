<?php include( 'header.php'); include( 'chksession.php'); ?>
<?php $catid1=base64_decode($_REQUEST['cid']);
$subid1=base64_decode($_REQUEST['subid']);
$subsubid=base64_decode($_REQUEST['subsubid']);
 $pid=base64_decode($_REQUEST['pid']);
///////////////////////history////////////////////////////
		$whereClauseh=" user_id=".$_SESSION['sess_webid']." and prod_id=".$pid;
		if(matchExists('history', $whereClauseh))
		{}else{
			$arrhis=array(  	"user_id"=>$_SESSION['sess_webid'],
							"prod_id"=>$pid
			    );
				
			$history=insertData($arrhis, 'history');
			
		}
///////////////////////////////////////////////////

  $sql="SELECT * from ".$_TBL_PROD1." where id='$pid'";
	$db->query($sql);
	if($db->numRows()>0)
		{
	$row=$db->fetchArray();
		}
	$catname=$db->getSingleResult('select catname from category where id='.$row['catid']);
	 $path=$row['prod_large_image'];
	 $path1=$row['image1'];
	 $path2=$row['image2'];
	 $goid=base64_encode($row['id']);
// on each product page, set "setRecentlyViewed" like so:
  setRecentlyViewed( $row['prod_name'], htmlspecialchars($_SERVER['REQUEST_URI']),$path );
	?>
        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="breadcrumb flat">
                                    <a href="../">Home</a>
                                    <a href="">
                                        <?=$catname?>
                                    </a>
                                    <a href="javascript:;" class="active">
                                        <?=$row['prod_name']?>
                                    </a>
                                </div>

                                <div class="card">
                                    <div class="row">
                                        <aside class="col-sm-5 border-right">
                                            <article class="gallery-wrap">
                                                <div class="img-big-wrap">
                                                    <!--Carousel Wrapper-->
                                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                                        <!--Slides-->
                                                        <div class="carousel-inner" role="listbox">
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100" src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>">
                                                            </div>

<?php $dbt=new DB;
$sqlt="select * from productimage where pid='".$row['id']."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{

	while($rowt=$dbt->fetchArray()){
		$pathslider=$rowt['imgid'];?>
       <div class="carousel-item">
           <img class="d-block w-100" src="<?=$_SITE_PATH?>product/<?=$pathslider?>" alt="Second slide">
        </div>

        <?php }} ?>
        <!--<div class="carousel-item">
            <img class="d-block w-100" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/252820/1320x580-78.jfif" alt="Third slide">
        </div>-->
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
               
            
                                                        </div>
                                                        <!--/.Slides-->
                                                        <!--Controls-->
                                                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                        <!--/.Controls-->
                                                        <ol class="img-small-wrap">
                                                            <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="<?=$_SITE_PATH?>product/<?=$path?>" class="img-fluid"></li>
                                                            <?php $dbt=new DB;
$sqlt="select * from productimage where pid='".$row['id']."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{

	while($rowt=$dbt->fetchArray()){
		$pathslider=$rowt['imgid'];?>
                                                                <li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100" src="<?=$_SITE_PATH?>product/<?=$pathslider?>" class="img-fluid"></li>
                                                                <?php }} ?>
                                                        </ol>
                                                    </div>
                                                    <!--/.Carousel Wrapper-->

                                                </div>

                                                <!-- slider-nav.// -->
                                            </article>
                                            <!-- gallery-wrap .end// -->
                                        </aside>
                                        <aside class="col-sm-7">
                                            <article class="card-body detaipage-body">
                                                <div class="product-pup-detailss">
                                                    <ul>
                                                        <li>
                                                            <a href="">
                                                                <?=$catname?>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="">
                                                                <?=$row['prod_name']?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h3 class="prodcutname product_name"><?=$row['prod_name']?></h3>
                                                    <p class="timeofproduc">
                                                        <?php echo timeago($row['prod_date']);?>
                                                    </p>
                                                    <div class="prdcutprice">
                                                        <?php
				$save=$row['prod_price']-$row['prod_sprice']; 			
			    $mrp=$row['prod_price'];
				$persen=$row['prod_price']-$row['prod_sprice'];
				$discount=($persen*100)/$mrp;
			    $orgprice=$row['prod_sprice'];
			    $finalprice=$row['prod_sprice'];
				?>
                                                            <h2 class="prodcfprice"> ₦ <?php // echo $row['prod_sprice'];?><?php
 $proprice1=str_replace(",","",$row['prod_sprice']);															echo $price=number_format( $proprice1,2);?></h2>
															 <?php if(!empty($row['material'])){ ?>
															 <h3 class="prodcttype"><b>Material:</b> <?=$row['material']?></h3><?php }?>
															
															 <?php if(!empty($row['manufacturer'])){ ?>
															 <h3 class="prodcttype"><b>Manufacturer: </b><?=$row['manufacturer']?></h3><?php }?>
															 
															  <?php if(!empty($row['weight'])){ ?>
															 <h3 class="prodcttype"><b>Weight:</b> <?=$row['weight']?></h3><?php }?>
															
                                                           <?php  if(!empty($row['sort_detail'])){ ?>
														   <h3 class="prodcttype"><b>Description:</b>  <?=$row['sort_detail']?></h3><?php } ?>
                                                            <!--<h3 class="prodcttype">Condition: Used - Good</h3>-->
                                                    </div>
                                                    <div class="slelect-dteails">
                                                        <h2>Seller Information</h2>
                                                        <div class="post_topbar">
                                                            <div class="usy-dt">
															<?php 
															if($row['userid']==0){ echo "Orange State "; }else{
																
															echo $name=$db->getSingleResult('select first_name from all_user where user_id='.$row['userid']); } ?>
                                                                <!--<?php $joindate=$db->getSingleResult('select joindate from all_user where user_id='.$_SESSION['sess_webid']);

					if($userspath=='' and empty($userspath)){ ?>
							<img src="images/resources/user.png" alt="">
						<?php }else{?>
							<img src="upload/<?=$userspath?>" alt="" height="40" width="40">
						<?php }?>
							<div class="usy-name">
							<h3><?=$_SESSION['sess_name']?></h3>-->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="clear"></div>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <dl class="param param-inline">
                                                            <dt>Quantity: </dt>
                                                            <dd>
                                                                <select class="form-control form-control-sm" style="width:70px;" id="tono<?=$row['id']?>">
                                                                    <option value="1"> 1 </option>
                                                                    <option value="2"> 2 </option>
                                                                    <option value="3"> 3 </option>
                                                                </select>
                                                            </dd>
                                                        </dl>
                                                        <!-- item-property .// -->
                                                    </div>
                                                    <!-- col.// -->
                                                    <div class="col-sm-7">
                                                        <dl class="param param-inline">
                                                            	<?php 
				$color=$row['color'];
				if(!empty($color)){
				echo '<dt>Color: </dt>';
				}
				$colornew=explode(",",$color);				
				 $colorcount=count($colornew);
				for($i=0;$i<$colorcount;$i++){
				?>
				<input type="radio"  name="input_array_name"  /><?=$colornew[$i]?> &nbsp;
				<?php }
				
				?>
                                                          <!-- <?php if(!empty($row[ 'prodsize1']) or !empty($row[ 'prodsize2']) or !empty($row[ 'prodsize3']) or !empty($row[ 'prodsize4'])){ ?> <dt>Size: </dt> <?php }?>
                                                            <dd> <?php if(!empty($row[ 'prodsize1'])){ ?>
                                                                <label class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2<?=$row['id']?>" value="SM" <?php if($row[ 'prodsize1']=='S'){ echo "selected"; } ?>>
                                                                    <span class="form-check-label">SM</span>
                                                                </label><?php }?>
																<?php if(!empty($row[ 'prodsize2'])){ ?>
                                                                <label class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2<?=$row['id']?>" value="MD" <?php if($row[ 'prodsize2']=='MD' ){ echo "selected"; } ?>>
                                                                    <span class="form-check-label">MD</span>
                                                                </label><?php }?>
																<?php if(!empty($row[ 'prodsize3'])){ ?>
                                                                <label class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2<?=$row['id']?>" value="XXL" <?php if($row[ 'prodsize3']=='L' ){ echo "selected"; } ?>>
                                                                    <span class="form-check-label">L</span>
                                                                </label><?php }?>
																
																
																<?php if(!empty($row[ 'prodsize4'])){ ?>
                                                                <label class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2<?=$row['id']?>" value="XXL" <?php if($row[ 'prodsize4']=='EXL' ){ echo "selected"; } ?>>
                                                                    <span class="form-check-label">XXL</span>
                                                                </label><?php } ?>
                                                            </dd>
                                                        -->
														
														<?php 
				$size=$row['allsize'];
				if(!empty($size)){
				echo '<dt>Size: </dt>';
				}
				$sizenew=explode(",",$size);				
				 $sizecount=count($sizenew);
				for($i=0;$i<$sizecount;$i++){
				?>
				<input type="radio"  name="inlineRadioOptions"  /><?=$sizenew[$i]?> &nbsp;
				<?php }
				
				?>
														
														
														</dl>
                                                        <!-- item-property .// -->
                                                    </div>
                                                    <!-- col.// -->
                                                </div>

                                                <hr>
                                                <a href="#" class="btn btn-lg btn-primary text-uppercase buynow-btn-n  addtocart" pid="<?=$row['id']?>"> Buy now </a>

                                                <button class="btn btn-lg btn-outline-primary text-uppercase add-btnbtn11 my-cart-btn addtocartnew" pid="<?=$row['id']?>" data-id="1" data-name="product 1" data-summary="summary 1" data-price="10" data-quantity="1" data-image="https://s3-us-west-2.amazonaws.com/s.cdpn.io/252820/1320x580-78.jfif">Add to Cart</button>
                                                <!-- row.// -->
												</hr></br><br/>
										<div class="addthis_inline_share_toolbox"></div>
                                                <div class="detila-prodcs-descroption">
                                                    <h3>Description</h3>
                                                    <div class="scrsss">
                                                        <?=$row['prod_detail']?>
                                                    </div>
                                                </div>
												
												<h3><a href="feedback.php?pid=<?=$_REQUEST['pid']?>&page=<?=base64_encode('product')?>" class="pull-right writereviebtn">Write Review</a></h3>

                                    </div>

                                    </article>
                                    <!-- card-body.// -->
                                    </aside>
                                    <!-- col.// -->
                                </div>
                                <!-- row.// -->
                            </div>
                            <!-- card.// -->
<?php ///////////////////////////////////////////////////?>
<div class="container mt20">
            <div class="row">
            <div class="col-md-8">

                 
					<?php
					$dbn=new DB();
				     $sqln="select * from feedback where pages='product' and prod_id =".$pid;
					$dbn->query($sqln);
					if($dbn->numRows()>0){	
					?>
					<h3 class="title">Reviews </h3>
					<?php while($rowfeed=$dbn->fetchArray()){
					$image_id=$db->getSingleResult("SELECT image_id from user_profile where user_id=".$rowfeed['user_id']);
					$first_name=$db->getSingleResult("SELECT first_name from all_user where user_id=".$rowfeed['user_id']);
					?>
                    <div class="feedbackbox background-white">
                        <div class="headerfeedabcdk">
							<?php if(!empty($image_id)){?>
                            <img src="upload/<?=$image_id?>" alt="india">
							<?php }else{ ?>
							<img src="images/resources/user.png" alt="" width="50" height="50">
							<?php } ?>
                            <h3><?=$first_name?></h3>
                            <span class="feedback-time"><?php echo timeago($rowfeed['feedback_date']);?></span>

                        </div>
                        <div class="feedbackbox-details">
                            <span class="starlinting">
							<?php if($rowfeed['rate']==1){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==2){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==3){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==4){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($rowfeed['rate']==5){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							</span>

                            <h4><?=$rowfeed['title']?></h4>
                           <p><?=$rowfeed['review']?></p>
                        </div>
                    </div>
					<?php }} ?>

<!--
                    <div class="feedbackbox background-white">
                        <div class="headerfeedabcdk">
                            <img src="img/img-25.jpg" alt="india">
                            <h3>Sachin Techkule</h3>
                            <span class="feedback-time">30 min ago</span>

                        </div>
                        <div class="feedbackbox-details">
                            <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>

                            <h4>A real "gotta do this" experience</h4>
                            <p>
                                We just returned from this tour with out guide Sam. It was just my self and my husband so we really had a terrific personal experience. Just being in Old Delhi is eye opening. I'm not even sure I can accurately describe it or do it justice. Sam took us from subway to streets and by tuk tuks always watching out for us, especially me as I use a cane. He gave a history lesson as well as the most delicious food we've had in India this trip. Sam was an outstanding guide, very articulate with excellent english.
He get 5 gold stars from us. I didn't know about this company and how much it gives back to the community. I am now extra pleased we did this tour and I will highly recommend it and Sam to anyone visiting India.
                            </p>
                        </div>
                    </div>


                    <div class="feedbackbox background-white">
                        <div class="headerfeedabcdk">
                            <img src="img/img-25.jpg" alt="india">
                            <h3>Sachin Techkule</h3>
                            <span class="feedback-time">30 min ago</span>

                        </div>
                        <div class="feedbackbox-details">
                            <span class="starlinting"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>

                            <h4>A real "gotta do this" experience</h4>
                            <p>
                                We just returned from this tour with out guide Sam. It was just my self and my husband so we really had a terrific personal experience. Just being in Old Delhi is eye opening. I'm not even sure I can accurately describe it or do it justice. Sam took us from subway to streets and by tuk tuks always watching out for us, especially me as I use a cane. He gave a history lesson as well as the most delicious food we've had in India this trip. Sam was an outstanding guide, very articulate with excellent english.
He get 5 gold stars from us. I didn't know about this company and how much it gives back to the community. I am now extra pleased we did this tour and I will highly recommend it and Sam to anyone visiting India.
                            </p>
                        </div>
                    </div>

-->
            </div>
            </div>
        </div>
		<?php ////////////////////////////////////////?>
                            <!-- new code -->
                            <div class="container" >
                                <div class="_3aadb_LRmas _3aadb_LRmas1">Similar Items You May Like<!--New for you--></div>
                                <section class="_588b5_3MtNs">
                                    <section class="morepdlisting">
                                        <ul class="b49ee_2pjyI _6a0fe_3Mm35">
						<?php  $sql="SELECT * from ".$_TBL_PRODUCT." where catid='".$row['catid']."' ORDER BY RAND()";						
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){						
						$path=$row['prod_large_image'];
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];?>
                                            <li class="bbe45_3oExY _9efef_381hp">
                                                <a class="a2cf5_2S5q5 ae72d_3tPQG" href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                                                    <div class="fd0b5_20IbM">
                                                        <picture>
                                                            <img data-expand="100" data-src="product/<?=$path?>" alt="<?=$row['prod_name']?>" class="f5e10_VzEXF _59c59_3-MyH lazyloaded " src="product/<?=$path?>" height=""></picture>
                                                    </div>
                                                    <div>
                                                        <h3 class="_25677_1VXsu"><?=$row['prod_name']?></h3>
                                                        <div class="_4e81a_39Ehs f57ef_hFN-_"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span><?=$finalprice?></span>
                                                        </div>
                                                        <div class="_287bd_1qnW0">
                                                            <div class="_114c2_18RSu"></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

						<?php }} ?>
                                     
                                             
                                        </ul>
                                    </section>
                                </section>

                            </div>
							<?php //echo getRecentlyViewed();?>
                            <!-- new code ended -->
							 



							 
                        </div>
                    </div>
                </div>

                <div class="container">
				
				
					<div class="row">
					 <div class="col-md-12">
					  <h4>View History</h4><br/>
            <div class="row  productsslider">
			<?php 
						$db4=new DB();
						$h=array();
						$sql4="SELECT * from history where user_id=".$_SESSION['sess_webid'];
						$db4->query($sql4);
						if($db4->numRows()>0)
						{
						while($row4=$db4->fetchArray()){
							$h[]=$row4['prod_id'];
						}
						}
						$allpid=implode(',',$h);
						
						?>
               
						
                <div class="row">
                    <div class="col-md-12">
                        <div id="blogCarousel1" class="carousel slide" data-ride="carousel">

                            

                            <!-- Carousel items -->
                        <div class="carousel-inner">
						<div class="carousel-item active">
                                    <div class="row">
						<?php
						 $sql="SELECT * from ".$_TBL_PRODUCT." where id IN($allpid) limit 0,4";									
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){
						$path=$row['prod_large_image'];
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];
							?>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap"><?=number_format($discount,2)?>% Off</span>
                                                        <div class="_7e903_3FsI6">
														 <a href="product-details.php?pid=<?=base64_encode($row['id'])?>" pid="<?=$row['id']?>">
												                    <picture>
												                           <img   class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>" height="240"></picture>
												                </a>
                                                          
                                                          

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                                                                <div class="af885_1iPzH">
                                                                   <h3><?=$row['prod_name']?></h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span><?=number_format($row['prod_sprice'],2);?></span>
                                                                </div>
                                                            </a>
                                                            <form action="" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id']?>" tono="1">Add To Cart</button>
                                                                    
                                                                </div>
																<div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtowishlist" type="button" pid="<?=$row['id']?>" tono="1">Add To Wishlist</button>
                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
						<?php }} ?>								
                                    </div>
                                    
                                </div>
								<!--
								 <div class="carousel-item">
                                    <div class="row">
						<?php  $sql1="SELECT * from ".$_TBL_PRODUCT." where id IN($allpid) limit 4,8";										
						$db->query($sql1);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){
						$path=$row['prod_large_image'];
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];
							?>
                                         <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap"><?=number_format($discount,2)?>% Off</span>
                                                        <div class="_7e903_3FsI6">
														 <a href="product-details.php?pid=<?=base64_encode($row['id'])?>" pid="<?=$row['id']?>">
												                    <picture>
												                           <img   class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></picture>
												                </a>
                                                          
                                                          

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                                                                <div class="af885_1iPzH">
                                                                   <h3><?=$row['prod_name']?></h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span><?=number_format($row['prod_sprice'],2);?></span>
                                                                </div>
                                                            </a>
                                                            <form action="" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id']?>" tono="1">Add To Cart</button>
                                                                    
                                                                </div>
																<div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtowishlist" type="button" pid="<?=$row['id']?>" tono="1">Add To Wishlist</button>
                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
						<?php }} ?>								
                                    </div>
                                    
                                </div>
                                --> 
                            </div>
                            <!--.carousel-inner-->
							<?php if($allpid>0){ ?>
                            <!--<div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel1" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel1" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>-->
							<?php } ?>

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

        </div>

					</div>
              

                    <?php 
                 function setRecentlyViewed ( $item, $url,$path ) {
    //@session_start();
     $_SESSION['items'] = array( $item, $url,$path );
    //print_r($_SESSION['items']);
  }
  
  function getRecentlyViewed () {
     $str = '<div class="_3aadb_LRmas _3aadb_LRmas1">Your Most Recently Viewed Item</div>';
     
    if ( $_SESSION['items'] > 0 ) {
        $str .= '<section class="_588b5_3MtNs">';
        $str .= '<section class="morepdlisting">';
        $str .= '<ul class="b49ee_2pjyI _6a0fe_3Mm35">';
        $str .= '<li class="bbe45_3oExY _9efef_381hp">
        <a class="a2cf5_2S5q5 ae72d_3tPQG" href="'.$_SESSION['items'][1].'"><div class="fd0b5_20IbM"><picture><img src="product/'.$_SESSION['items'][2].'" /></picture></div>
        <h3 class="_25677_1VXsu">'.$_SESSION['items'][0].'</h3>
        <div class="_4e81a_39Ehs f57ef_hFN-_"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>3</span>
        </div>
        </a>

        </li>';
        $str .= '</ul>';
        $str .= '</section>';
        $str .= '</section>';
    } else {
        $str .= 'Nothing selected yet!';
    }
    return $str;
  }
  
  
  
  // Display the results like so
  
                ?>
 
                            </div>
				
                <?php /*
				 function setRecentlyViewed ( $item, $url,$path ) {
  	//@session_start();
  	 $_SESSION['items'] = array( $item, $url,$path );
	print_r($_SESSION['items']);
  }
  
  function getRecentlyViewed () {
  	 $str = '<h2>Your Most Recently Viewed Item:</h2>';
	 
  	if ( $_SESSION['items'] > 0 ) {
  		$str .= '<ul>';
  		$str .= '<li>
		<img src="product/'.$_SESSION['items'][2].'" />
		<a href="'.$_SESSION['items'][1].'">'.$_SESSION['items'][0].'</a></li>';
  		$str .= '</ul>';
  	} else {
  		$str .= 'Nothing selected yet!';
  	}
  	return $str;
  }
  
  
  
  // Display the results like so
  
			*/	?>
				
                <!-- main-section-data end-->
            </div>
            </div>
        </main>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5de61e2227786889"></script>

        <script src="js/jquery.mycart.js"></script>

        <script type="text/javascript">
            $(function() {

                var goToCartIcon = function($addTocartBtn) {
                    var $cartIcon = $(".my-cart-icon");
                    var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
                        "position": "fixed",
                        "z-index": "999"
                    });
                    $addTocartBtn.prepend($image);
                    var position = $cartIcon.position();
                    $image.animate({
                        top: position.top,
                        right: 350,
                    }, 500, "linear", function() {
                        $image.remove();
                    });
                }

            });
        </script>

        <script src="lib/js/config.js"></script>
        <script src="lib/js/util.js"></script>
        <script src="lib/js/jquery.emojiarea.js"></script>
        <script src="lib/js/emoji-picker.js"></script>
        <script>
            $(function() {
                // Initializes and creates emoji set from sprite sheet
                window.emojiPicker = new EmojiPicker({
                    emojiable_selector: '[data-emojiable=true]',
                    assetsPath: 'lib/img/',
                    popupButtonClasses: 'fa fa-smile-o'
                });
                // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
                // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
                // It can be called as many times as necessary; previously converted input fields will not be converted again
                window.emojiPicker.discover();
            });
        </script>
        <?php include( 'footer.php') ?>
            <script>
                function preview_image() {
                    var total_file = document.getElementById("upload_file").files.length;
                    for (var i = 0; i < total_file; i++) {

                        $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
                    }
                }

                //video player
            </script>
            <script type="text/javascript">
                document.documentElement.setAttribute("lang", "en");
                document.documentElement.removeAttribute("class");
				var axe;
                axe.run(function(err, results) {
                    console.log(results.violations);
                });
            </script>