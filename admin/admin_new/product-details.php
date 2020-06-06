<?php include ('header.php');
include ('chksession.php'); ?>
<?php $catid1 = base64_decode($_REQUEST['cid']);
$subid1 = base64_decode($_REQUEST['subid']);
$subsubid = base64_decode($_REQUEST['subsubid']);
$pid = base64_decode($_REQUEST['pid']);
///////////////////////history////////////////////////////
$whereClauseh = " user_id=" . $_SESSION['sess_webid'] . " and prod_id=" . $pid;
if (matchExists('history', $whereClauseh))
{
}
else
{
    $arrhis = array(
        "user_id" => $_SESSION['sess_webid'],
        "prod_id" => $pid
    );

    $history = insertData($arrhis, 'history');

}
///////////////////////////////////////////////////
$sql = "SELECT * from " . $_TBL_PROD1 . " where id='$pid'";
$db->query($sql);
if ($db->numRows() > 0)
{
    $row = $db->fetchArray();
}
$catname = $db->getSingleResult('select catname from category where id=' . $row['catid']);
$path = $row['prod_large_image'];
if(!empty($path)){
							$path=$path;
						}else{
							$path='noimage.jpg'; 
						}
$path1 = $row['image1'];
$path2 = $row['image2'];
$goid = base64_encode($row['id']);
// on each product page, set "setRecentlyViewed" like so:
setRecentlyViewed($row['prod_name'], htmlspecialchars($_SERVER['REQUEST_URI']) , $path);
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
                                        <?=$catname
?>
                                    </a>
                                    <a href="javascript:;" class="active">
                                        <?=$row['prod_name'] ?>
                                    </a>
                                </div>

                                <div class="newproduc-details-page">
                                	<div class="row">
                                	<div class="col-md-9">
                                	<div class="let-part-productdetail">
                                		<div class="row">
                                			<aside class="col-md-5">
                                            <article class="gallery-wrap">
                                                <div class="img-big-wrap">
                                                    <!--Carousel Wrapper-->
                                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                                        <!--Slides-->
                                                        <div class="carousel-inner" role="listbox">
                                                            <div class="carousel-item active" id="carouselimage">
                                                                <img class="d-block"  src="<?=$_SITE_PATH
?>product/<?=$path
?>" alt="<?=$row['prod_name'] ?>">
                                                            </div>

<?php $dbt = new DB;
$sqlt = "select * from productimage where pid='" . $row['id'] . "'";
$dbt->query($sqlt);
if ($dbt->numRows() > 0)
{

    while ($rowt = $dbt->fetchArray())
    {
        $pathslider = $rowt['imgid']; 
		
		if(!empty($pathslider)){
							$pathslider=$pathslider;
						}else{
							$pathslider='noimage.jpg'; 
						}
		
		?>
       <div class="carousel-item">
           <img class="d-block w-100" src="<?=$_SITE_PATH
?>product/<?=$pathslider
?>" alt="Second slide">
        </div>

        <?php
    }
} ?>
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
                                                            <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="<?=$_SITE_PATH
?>product/<?=$path
?>" class="img-fluid"></li>
                                                            <?php $dbt = new DB;
$sqlt = "select * from productimage where pid='" . $row['id'] . "'";
$dbt->query($sqlt);
if ($dbt->numRows() > 0)
{

    while ($rowt = $dbt->fetchArray())
    {
        $pathsliders = $rowt['imgid']; 
		 if(!empty($pathsliders)){
            $pathslider=$pathsliders;
          }else{
			$pathslider='noimage.jpg'; 
        }
		?>
                                                                <li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100" src="<?=$_SITE_PATH
?>product/<?=$pathslider
?>" class="img-fluid"></li>
                                                                <?php
    }
} ?>
                                                        </ol>
                                                    </div>
                                                    <!--/.Carousel Wrapper-->

                                                </div>

                                                <!-- slider-nav.// -->
                                            </article>
                                            <!-- gallery-wrap .end// -->
                                        </aside>


                                        <div class="prodouctdteails-right col-md-7" >
                                        	<div class="productdetails-2">
                                        		<h1><?=$row['prod_name']?></h1>
                                        		<div class="product-review-details">
												
                            <div class="details-start">
							<?php if($row['star']==1){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['star']==2){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['star']==3){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['star']==4){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['star']==5){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
													
                                        			<!--	<i class="fa fa-star" aria-hidden="true"></i>
														
                                        				<i class="fa fa-star" aria-hidden="true"></i>
                                        				<i class="fa fa-star" aria-hidden="true"></i>
                                        				<i class="fa fa-star" aria-hidden="true"></i>
                                        				<i class="fa fa-star" aria-hidden="true"></i>
                                        				<i class="fa fa-star" aria-hidden="true"></i>-->
                                        				<i> <?php echo $row['star'];?>.0 <i class="fa fa-angle-down" aria-hidden="true"></i></i>
                                        			</div>
                                        			
													
													<div class="totalnumberReiew">
                                        				<?php 
														 $fcount=$db->getSingleResult("select * from feedback where pages='product' and prod_id =".$row['id']);
														 if($fcount==0){ echo "0";}else{
															 echo $fcount;
														 }
														 ?> Reviews
                                        			</div>
<!--
                                        			<div class="totalnumberOrder">
                                        				12 Orders
                                        			</div>

                                        			<div class="totalnumberFreebies">
                                        				1 Review of Freebies
                                        			</div>-->



                                        		</div>

                                        		<div class="prodi-price">
                                        			<h3>NGN <?php
 $proprice1=str_replace(",","",$row['prod_sprice']);
 echo $price=number_format( $proprice1,2);?> <span class="pricecrossed">NGN <?php
 $proprice2=str_replace(",","",$row['prod_price']);
 echo $price=number_format( $proprice2,2);?></span> </h3>
                                        			<div class="strockstage">
													<?php
													$prodquantity=$db->getSingleResult("SELECT SUM(prodquantity) from prodattributes where prodid=".$row['id']);
													if($prodquantity > 0){ ?>
                                        				<span class="instock">In Stock</span>
													<?php }else{ ?>
                                        				<!--<span class="Outstock">Out of Stock</span>-->
													<?php } ?>
                                        			</div>

                                        		</div>
<form action="" id="myFormby" name="myFormby" method="post">	
                                        		<div class="produ-color">
                                        		<?php
 $prodcolor=$db->getSingleResult("SELECT prodcolor from prodattributes where prodid=".$row['id']);
if(!empty($prodcolor)){
?>
<h5>Color</h5>
<?php } ?>	
                                        			<ul>
													<?php 
				$sql="SELECT * from prodattributes where prodid=".$row['id'];
				$db->query($sql);
				if($db->numRows()>0)
					{
					while($rownew=$db->fetchArray()){ 
					if(!empty($rownew['prodcolor'])){
						if(!empty($rownew['thumbnail'])){
							$patht='product/small/'.$rownew['thumbnail'];
						}else{
							$patht='img/noimg.jpg';
						}
					?>
                                        				<li><a href="javascript:void(0)" class="pickcolor" pcolor="<?=$rownew['prodcolor']?>" pcolor1="<?=$rownew['image_id']?>" pq="<?=$rownew['prodquantity']?>">
														<img src="<?=$patht?>" title="Green" alt="product Color" /></a>
														<span><?=$rownew['prodcolor']?></span>
														</li>
					<?php }  }} ?>
					</ul>
					 
                                        		</div>
<span style="color:red;" id="errormsg"></span>
                                                <div class="produ-color produc-size">
                                                 
<h5>Size</h5>  
                <?php 
                 $sql="SELECT prodsize,prodquantity from prodattributes where prodid=".$row['id']." GROUP BY prodsize";
                $db->query($sql);
                if($db->numRows()>0)
                    {
                while($rownew=$db->fetchArray()){ ?>
                        <div class="sizedib">
                                                        <input type="radio"  id="size_<?=$rownew['prodsize']?>"  name="inlineRadioOptions" value="<?=$rownew['prodsize']?>" class="productsize" pz="<?=$rownew['prodsize']?>" pq="<?=$rownew['prodquantity']?>" pid="<?=$row['id']?>"  />
                                                        <label for="size_<?=$rownew['prodsize']?>"></label><?=$rownew['prodsize']?>
                                                    </div>

                    <?php }} ?>
                                                </div>


                                        		<div class="Quantity-product">
                                        			<h5>Quantity</h5>

                                        			<div id="field1">
    <button type="button" id="sub" class="sub">-</button>
    <input type="number" id="tono<?=$row['id']?>" name="tono" value="1" min="1" max="3" />
    <button type="button" id="add" class="add">+</button>
</div>
<input type="hidden" name="input_array_name" id="input_array_name" value=""/ >


                                        		</div>
												
                                        		<div class="buybtn-newdesign">
												
                                        			<button pid="<?=$row['id']?>" class="addtocart">Buy </button>
                                        			<button pid="<?=$row['id']?>" class="addtocartnew">Add to Cart <i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
												
												    <button id="out" disabled="disabled"style="display:none;">Buy </button>
                                        			<button id="out1" disabled="disabled" style="display:none;" >Add to Cart <i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
											
                                        			<button class="hearticon_whilish_btn addtowishlist" pid="<?=$row['id']?>" tono="1"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                        		</div>

                                        		
												
												
												
												
											</form>	
												
												
												<div class="compare-pric-titme">
												<?php if(!empty($row['prodtype'])){ ?>
                                                    <p>Type: <?=$row['prodtype']?> </p>
													<?php } if(!empty($row['prodcapacity'])){ ?>
                                                    <p>Capacity: <?=$row['prodcapacity']?></p> <?php } ?>
                                        			<!--<p>Compare Price of similar items: N10,254</p>-->
                                        		</div>
                                        		<div class="addthis_inline_share_toolbox"></div>



                                        	</div>

                                        </div>
                                        </div>
										
										<script type="text/javascript">
$('.productsize').click(function(){
	var pid = jQuery(this).attr('pid');
	var pz = jQuery(this).attr('pz');
	var pq = jQuery(this).attr('pq');
	
	if(pq>0){
		$('.addtocartnew').show();
		$('.addtocart').show();
		$('#out').hide();
		$('#out1').hide();
		$('#errormsg').html('');
	}else{
		$('#out').show();
		$('#out1').show();
		$('.addtocartnew').hide();
		$('.addtocart').hide();
		$('#errormsg').html('Product Out Of sock');
	}
	
});	
$('.pickcolor').click(function(){
	var pq = jQuery(this).attr('pq');
	if(pq>0){
		$('.addtocartnew').show();
		$('.addtocart').show();
		$('#out').hide();
		$('#out1').hide();
		$('#errormsg').html('');
	}else{
		$('#out').show();
		$('#out1').show();
		$('.addtocartnew').hide();
		$('.addtocart').hide();
		$('#errormsg').html('Product Out Of sock');
	}
  var pcolor = jQuery(this).attr('pcolor');
  var pimage = jQuery(this).attr('pcolor1');
  
   $('#input_array_name').html('');
  $('#input_array_name').val('');
  $('#input_array_name').html(pcolor);
  $('#input_array_name').val(pcolor);
  $('#carouselimage').html('');
  // $('#carouselimage').hide();
  
  //$('#carouselimage').html('product/small/'+pimage);
   $('#carouselimage').html('<img class="d-block"  src="'+BASEURL+'/product/small/'+pimage+'" />');
  

});
	$('.add').click(function () {
		if ($(this).prev().val() < 15) {
    	$(this).prev().val(+$(this).prev().val() + 1);
		}
});
$('.sub').click(function () {
		if ($(this).next().val() > 1) {
    	if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
});

</script>
                                        <div class="product_details-tabs-new mt-3 ">

                                        <div class="row">
                                        	<div class="col-md-3">
                                        		<div class="details-page-adds">
                                        			<a href="">
                                        				<img src="img/ads-big.jpg" />
                                        			</a>
 
                                        		</div>
                                        		
                                        	</div>

                                        	<div class="col-md-9">
                                        		<div class="product_details-tabs">
                                        			<div class="card tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
		  <?php  if(!empty($row['sort_detail'])){ ?>
            <li class="nav-item">
                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Overview</a>
            </li>
			<?php } if(!empty($row['prod_detail'])){ ?>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Specification</a>
            </li>
			<?php } if(!empty($row['shipping'])){ ?>
            <li class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Shipping</a>
            </li>
			<?php } if(!empty($row['warranty'])){ ?>
            <li class="nav-item">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Three" aria-selected="false">Warranty</a>
            </li>
			<?php } if(!empty($row['rpolicy'])){ ?>
            <li class="nav-item">
                <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="Three" aria-selected="false">Return Policy</a>
            </li>
			<?php } //if(!empty($row['prodtype'])){ ?>
            <li class="nav-item">
                <a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="Three" aria-selected="false">Reviews</a>
            </li>
			<?php  if(!empty($row['manufacturer'])){ ?>
			
			<li class="nav-item">
                <a class="nav-link" id="seven-tab" data-toggle="tab" href="#seven" role="tab" aria-controls="Three" aria-selected="false">Manufacturer</a>
            </li>
			<?php } ?>

          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
			<?=$row['sort_detail']?>
                     
          </div>
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            <?=$row['prod_detail']?>
          </div>
          <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
           <?=$row['shipping']?>            
          </div>
          <div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="three-tab">
           <?=$row['warranty']?>
          </div>

          <div class="tab-pane fade p-3" id="five" role="tabpanel" aria-labelledby="three-tab">
           <?=$row['rpolicy']?>            
          </div>

          <div class="tab-pane fade p-3" id="six" role="tabpanel" aria-labelledby="three-tab">
		  <h3>
            <a href="feedback.php?pid=<?=$_REQUEST['pid']?>&page=<?=base64_encode('product')?>" class="mb-10  writereviebtn">Write Review</a></h3>
            <?php
					$dbn=new DB();
				     $sqln="select * from feedback where pages='product' and prod_id =".$pid." limit 0,2";
					$dbn->query($sqln);
					if($dbn->numRows()>0){	
					?> 
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
          </div>


<div class="tab-pane fade p-3" id="seven" role="tabpanel" aria-labelledby="three-tab">
          <?=$row['manufacturer']?>
          </div>
        </div>
      </div>

                                        		</div>

                                        	</div>


                                        </div>
                                        </div>

                                	</div>
                                	</div>


                                	<div class="col-md-3">
                                		<div class="side-more-product">
                                			<h6>You May Also Like </h6>

                                			<div id="sideProduct-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                                        <!--Slides-->
                                                        <div class="carousel-inner" role="listbox">
                                                            <div class="carousel-item active">
                                                                 <ul>
						<?php  $sql="SELECT * from ".$_TBL_PRODUCT." where catid='".$row['catid']."' ORDER BY RAND() limit 0,10";						
						$db->query($sql);						
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){						
						$path=$row['prod_large_image'];
						if(!empty($path)){
							$path=$path;
						}else{
							$path='noimage.jpg'; 
						}
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];?>
                                					<li>
                                						<div class="prod-1">
                                							<a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                                							<div class="side-bar-img">
                                								<img src="product/<?=$path?>" alt="<?=$row['prod_name']?>">
                                							</div>
                                							<div class="product-details-side-bar">
                                								<h3><?=$row['prod_name']?></h3>
                                								<h4 class="price-side-bar">₦ <?php echo $pricenew=number_format( $finalprice,2);?> </h4>
                                							</div>
                                							</a>
                                						</div>

                                					</li>


											<?php }} ?>

                                			</ul>
                                                            
															
															</div>
<?php
$rowcount=$db->getSingleResult("SELECT * from ".$_TBL_PRODUCT." where catid='".$row['catid']."'");
if($rowcount>10){
?>
                                                            <div class="carousel-item">
                                                                 <ul>
						<?php  $sql="SELECT * from ".$_TBL_PRODUCT." where catid='".$row['catid']."' ORDER BY RAND() limit 10,20";						
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){						
						$path=$row['prod_large_image'];
						if(!empty($path)){
							$path=$path;
						}else{
							$path='noimage.jpg'; 
						}
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];?>
                                					<li>
                                						<div class="prod-1">
                                							<a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                                							<div class="side-bar-img">
                                								<img src="product/<?=$path?>" alt="<?=$row['prod_name']?>">
                                							</div>
                                							<div class="product-details-side-bar">
                                								<h3><?=$row['prod_name']?></h3>
                                								<h4 class="price-side-bar">₦ <?php echo $pricenew=number_format( $finalprice,2);?> </h4>
                                							</div>
                                							</a>
                                						</div>

                                					</li>


											<?php }} ?>

                                			</ul>
                                                            
															
                                                            </div>
<?php } ?>


                                                        </div>
                                                        <!--/.Slides-->
                                                        <!--Controls-->
                                                         <!-- Left and right controls -->
  <?php if($rowcount>10){ ?>
                                                         <div class="sidecarosal-bar-1">
                                                         	<a class="left carousel-control" href="#sideProduct-thumb" data-slide="prev">
    <span class="fa fa-angle-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#sideProduct-thumb" data-slide="next">
    <span class="fa fa-angle-right"></span>
    <span class="sr-only">Next</span>
  </a>
                                                         </div>
														 <?php } ?>
                                                         
                                                    </div>



                                			

                                		</div>
                                	</div>
                                	</div>
									
									
<?php ///////////////////////////////////////////////////

?>
 
 
					<div class="row productlisthistory">
					 <div class="col-md-12">
					  <h4>Recently Viewed by you</h4><br/>
            <div class=" productsslider">
			<?php
$db4 = new DB();
$h = array();
$sql4 = "SELECT * from history where user_id=" . $_SESSION['sess_webid'];
$db4->query($sql4);
if ($db4->numRows() > 0)
{
    while ($row4 = $db4->fetchArray())
    {
        $h[] = $row4['prod_id'];
    }
}
$allpid = implode(',', $h);

?>
               
						
                <div class="row ">
                    <div class="col-md-12">
                        <div id="blogCarousel1" class="carousel slide" data-ride="carousel">

                            

                            <!-- Carousel items -->
                        <div class="carousel-inner">
						<div class="carousel-item active">
                                    <div class="row">
						<?php
$sql = "SELECT * from " . $_TBL_PRODUCT . " where id IN($allpid) limit 0,6";
$db->query($sql);
if ($db->numRows() > 0)
{
    while ($row = $db->fetchArray())
    {
        $path = $row['prod_large_image'];
		if(!empty($path)){
							$path=$path;
						}else{
							$path='noimage.jpg'; 
						}
        $goid = base64_encode($row['id']);
        $save = $row['prod_price'] - $row['prod_sprice'];
        $mrp = $row['prod_price'];
        $persen = $row['prod_price'] - $row['prod_sprice'];
        $discount = ($persen * 100) / $mrp;
        $orgprice = $row['prod_sprice'];
        $finalprice = $row['prod_sprice'];
?>
                                        <div class="col-md-2">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap"><?=number_format($discount, 2) ?>% Off</span>
                                                        <div class="_7e903_3FsI6">
														 <a href="product-details.php?pid=<?=base64_encode($row['id']) ?>" pid="<?=$row['id'] ?>">
												                    <picture>
												                           <img   class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="<?=$_SITE_PATH ?>product/<?=$path ?>" alt="<?=$row['prod_name'] ?>" height="240"></picture>
												                </a>
                                                          
                                                          

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=<?=base64_encode($row['id']) ?>">
                                                                <!--<div class="af885_1iPzH">
                                                                   <h3><?=$row['prod_name'] ?></h3></div>-->
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span><?=number_format($row['prod_sprice'], 2); ?></span>
                                                                </div>
                                                            </a>
                                                            <!--<form action="" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id'] ?>" tono="1">Add To Cart</button>
                                                                    
                                                                </div>
																 <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtowishlist" type="button" pid="<?=$row['id'] ?>" tono="1">Add To Wishlist</button>
                                                                    
                                                                </div> 
                                                            </form>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
						<?php
    }
} ?>								
                                    </div>
                                    
                                </div>
								<!--
								 <div class="carousel-item">
                                    <div class="row">
						<?php $sql1 = "SELECT * from " . $_TBL_PRODUCT . " where id IN($allpid) limit 6,12";
$db->query($sql1);
if ($db->numRows() > 0)
{
    while ($row = $db->fetchArray())
    {
        $path = $row['prod_large_image'];
		if(!empty($path)){
							$path=$path;
						}else{
							$path='noimage.jpg'; 
						}
        $goid = base64_encode($row['id']);
        $save = $row['prod_price'] - $row['prod_sprice'];
        $mrp = $row['prod_price'];
        $persen = $row['prod_price'] - $row['prod_sprice'];
        $discount = ($persen * 100) / $mrp;
        $orgprice = $row['prod_sprice'];
        $finalprice = $row['prod_sprice'];
?>
                                         <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap"><?=number_format($discount, 2) ?>% Off</span>
                                                        <div class="_7e903_3FsI6">
														 <a href="product-details.php?pid=<?=base64_encode($row['id']) ?>" pid="<?=$row['id'] ?>">
												                    <picture>
												                           <img   class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="<?=$_SITE_PATH ?>product/<?=$path ?>" alt="<?=$row['prod_name'] ?>"></picture>
												                </a>
                                                          
                                                          

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=<?=base64_encode($row['id']) ?>">
                                                                <div class="af885_1iPzH">
                                                                   <h3><?=$row['prod_name'] ?></h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span><?=number_format($row['prod_sprice'], 2); ?></span>
                                                                </div>
                                                            </a>
                                                            <form action="" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id'] ?>" tono="1">Add To Cart</button>
                                                                    
                                                                </div>
																<div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtowishlist" type="button" pid="<?=$row['id'] ?>" tono="1">Add To Wishlist</button>
                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
						<?php
    }
} ?>								
                                    </div>
                                    
                                </div>
                                --> 
                            </div>
                            <!--.carousel-inner-->
							<?php if ($allpid > 0)
{ ?>
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
							<?php
} ?>

<div class="history-bar-1">
                                                         	<a class="left carousel-control" href="#blogCarousel1" data-slide="prev">
    <span class="fa fa-angle-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#blogCarousel1" data-slide="next">
    <span class="fa fa-angle-right"></span>
    <span class="sr-only">Next</span>
  </a>
                                                         </div>


                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

        </div>

					</div>
              

                    <?php
function setRecentlyViewed($item, $url, $path)
{
    //@session_start();
    $_SESSION['items'] = array(
        $item,
        $url,
        $path
    );
    //print_r($_SESSION['items']);
    
}

function getRecentlyViewed()
{
    $str = '<div class="_3aadb_LRmas _3aadb_LRmas1">Your Most Recently Viewed Item</div>';

    if ($_SESSION['items'] > 0)
    {
        $str .= '<section class="_588b5_3MtNs">';
        $str .= '<section class="morepdlisting">';
        $str .= '<ul class="b49ee_2pjyI _6a0fe_3Mm35">';
        $str .= '<li class="bbe45_3oExY _9efef_381hp">
        <a class="a2cf5_2S5q5 ae72d_3tPQG" href="' . $_SESSION['items'][1] . '"><div class="fd0b5_20IbM"><picture><img src="product/' . $_SESSION['items'][2] . '" /></picture></div>
        <h3 class="_25677_1VXsu">' . $_SESSION['items'][0] . '</h3>
        <div class="_4e81a_39Ehs f57ef_hFN-_"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>3</span>
        </div>
        </a>

        </li>';
        $str .= '</ul>';
        $str .= '</section>';
        $str .= '</section>';
    }
    else
    {
        $str .= 'Nothing selected yet!';
    }
    return $str;
}

// Display the results like so

?>
 
 
            <div class="row mt20">
            <div class="col-md-8">

                 
					<?php
$dbn = new DB();
$sqln = "select * from feedback where pages='product' and prod_id =" . $pid;
$dbn->query($sqln);
if ($dbn->numRows() > 0)
{
?>
					<h3 class="reviewtitle">Reviews </h3>
					<?php while ($rowfeed = $dbn->fetchArray())
    {
        $image_id = $db->getSingleResult("SELECT image_id from user_profile where user_id=" . $rowfeed['user_id']);
        $first_name = $db->getSingleResult("SELECT first_name from all_user where user_id=" . $rowfeed['user_id']);
?>
                    <div class="feedbackbox background-white">
                        <div class="headerfeedabcdk">
							<?php if (!empty($image_id))
        { ?>
                            <img src="upload/<?=$image_id
?>" alt="india">
							<?php
        }
        else
        { ?>
							<img src="images/resources/user.png" alt="" width="50" height="50">
							<?php
        } ?>
                            <h3><?=$first_name
?></h3>
                            <span class="feedback-time"><?php echo timeago($rowfeed['feedback_date']); ?></span>

                        </div>
                        <div class="feedbackbox-details">
                            <span class="starlinting">
							<?php if ($rowfeed['rate'] == 1)
        { ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php
        } ?>
							<?php if ($rowfeed['rate'] == 2)
        { ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php
        } ?>
							<?php if ($rowfeed['rate'] == 3)
        { ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php
        } ?>
							<?php if ($rowfeed['rate'] == 4)
        { ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php
        } ?>
							<?php if ($rowfeed['rate'] == 5)
        { ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php
        } ?>
							</span>

                            <h4><?=$rowfeed['title'] ?></h4>
                           <p><?=$rowfeed['review'] ?></p>
                        </div>
                    </div>
					<?php
    }
} ?>
 
            </div>
            </div> 
		<?php ////////////////////////////////////////

?>
                             
							<?php //echo getRecentlyViewed();

?>
                            <!-- new code ended -->
						
						



                                </div>

 	 



							 
                        </div>
                    </div>
                </div>

                <div class="container">
				
				
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
  
*/ ?>
				
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
        <?php include ('footer.php') ?>
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


<script type="text/javascript">
    $("#out").click(function(){
  alert("product not in stock right now !");
});
$("#out1").click(function(){
  alert("product not in stock right now !");
});
</script>