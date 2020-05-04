<?php include( 'header.php'); include( 'chksession.php'); 
$_TBL_PROD1="product";
$rdb=new DB();
$makearr1=array();
$makearr1=getValuesArr( $_TBL_CAT, "id","catname","", "" );
$makearrpro=array();
$makearrpro=getValuesArr( $_TBL_PROD1, "id","prod_name","", "" );

$makearr3=array();
$makearr3=getValuesArr( $_TBL_SUBSUBCAT, "id","subsubcatname","", "" );
$makearr2=array();
$makearr2=getValuesArr( $_TBL_SUBCAT, "id","subcatname","", "" );
?>

    <style>
        /* 2.2 Header Middle CSS
/*----------------------------------------*/
       .af885_1iPzH {
    height: 45px;
}
.posts-section.prodcutlisting .bbe45_3oExY._22339_3gQb9 {
    width: 24% !important;
}
    </style>
	<script>

function showUser(str)
{
	
	 var j=document.getElementById("catname").value;
	 
if (str=="0")
  {
  document.getElementById("txtHint").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
	
    }
  }
 
  
xmlhttp.open("GET","marketplace-home-search.php?q="+str+"&catid="+j,true);
xmlhttp.send();
}
}
</script>

    <div class="newsearch11">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="categorie-search-box">
                       <form class="searchform" action="search1.php">
                            <div class="form-group">
                                <select class="bootstrap-select" name="catname" id="catname">
                                 
								<option value="all">All categories</option>
									<?php $db1=new DB();
								 $sql1="SELECT * FROM $_TBL_CAT where status='yes'";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){
								 $catid=$row1['id'];
								?>
								 <option value="<?=$catid?>"><?php echo $row1['catname'];?></option>
								 <?php } ?>
                                     
                                </select>
                            </div>
                             
							 <input type="text" name="search" class="search" id="searchid" onkeypress="return showUser(this.value);" placeholder="Search for Products" required />
							 
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    <ul  id="txtHint"></ul>
					</div>
                </div>

                <div class="col-lg-6">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center newdarksarchlink">
                            <li class="stylli">
                                <a href=""> Buy Protection</a>
                            </li>
                            <li class="stylli">
                                <a href=""> Coupon</a>
                            </li>
                            <li class="stylli">
                                <a href=""> Deals</a>
                            </li>

<?php $ct=$db->getSingleResult("select count(*) from wishlish where user_id='".$_SESSION['sess_webid']."'"); ?>
                            <li class="wishmainlist"><a href="wishlist.php"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Wish</span><span>list (<?=$ct?>)</span></span></a>
							<ul class="wishlistcart">
							<?php $dbt=new DB;
$sqlt="select * from wishlish where user_id='".$_SESSION['sess_webid']."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
	
		while($rowt=$dbt->fetchArray()){
			$ppid=$rowt['prodid'];
			$path2=$db->getSingleResult("select prod_large_image from $_TBL_PRODUCT where id='$ppid'");
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
		//echo "select prod_large_image from $_TBL_PRODUCT where id='$ppid'";
		$prod_name=$db->getSingleResult("select prod_name from $_TBL_PRODUCT where  id='$ppid'");
		$goid=base64_encode($ppid); 
			?>
							<li>
							  <a href="product-details.php?pid=<?=$goid?>"><img src="product/<?=$path1?>" height="50" width="50" />
							  <span class="prodcutname"><?=$prod_name?></span>
							  </a>
							  <a href="javascript:void(0);">
							  <span class="text-muted wbtndel" title="Remove"  pid="<?=$rowt['prodid']?>">X</span>
                               </a>
							</li>
	<?php }}else{ echo "Empty";} ?>
							</ul>
                            </li>
							<li><a href="#" class="sellproduct1 exp-bx-open  "><i class="lnr lnr-store"></i> Sell Your Product </a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="search-sec" style="display:none">
        <div class="container">
            <div class="search-box">
                <form action="search1.php" method="post">
                    <input type="text" name="search" class="search" id="searchid" onkeypress="return showUser(this.value);" placeholder="Is it me you're looking for?" />
                    <!--<input type="text" name="search" placeholder="Search keywords">-->
                    <button type="submit">Search</button>
                </form>
            </div>
            <ul id="txtHint"></ul>
         
        </div>
    </div>
    <!--search-sec end-->

    <div class="main-page-banner pb-50 off-white-bg">
        <div class="container">
            <div class="row">
                <!-- Vertical Menu Start Here -->
                <div class="col-xl-3 col-lg-4 d-none d-lg-block wdith20">
                    <div class="vertical-menu mb-all-30">
                        <nav>
                            <ul class="vertical-menu-list">
							<?php $db1=new DB(); $db2=new DB(); $db3=new DB(); $db4=new DB();
								 $sql1="SELECT * FROM $_TBL_CAT where status='yes' limit 0,12";
								 $db1->query($sql1)or die($db1->error());
								 ?>
								<?php while($row1=$db1->fetchArray()){
								
								$catid=$row1['id'];
								?>
                                <li class=""><a href="marketplace.php?cid=<?=$row1['id']?>"><span><img src="category/<?=$row1['icon']?>"   height="25px"></span><?php echo $row1['catname'];?><i class="fa fa-angle-right" aria-hidden="true"></i></a>

                                    <ul class="ht-dropdown mega-child">
									<?php  $sql2="SELECT * FROM subcategory where sub_status='1' and catid=".$row1['id'];
								 $db2->query($sql2)or die($db2->error());
								 ?>
								<?php while($row2=$db2->fetchArray()){	?>
                                    <li><a href="marketplace.php?cid=<?=$row1['id']?>&sid=<?php echo $row2['id'];?>"><?php echo $row2['subcatname'];?> </a>
									
									<?php ///////////////////?>
									 <ul class="ht-dropdown mega-child">
									<?php $sql3="SELECT * FROM $_TBL_SUBSUBCAT WHERE catid=".$row1['id']." and subcatid=".$row2['id'];
								 $db3->query($sql3)or die($db3->error());
								 ?>
								<?php while($row3=$db3->fetchArray()){	?>
                                    <li><a href="marketplace.php?cid=<?=$row1['id']?>&sid=<?php echo $row2['id'];?>&tid=<?php echo $row3['id'];?>"><?php echo $row3['subsubcatname'];?> </a>
									
									<?php ///////////////////?>
									 <ul class="ht-dropdown mega-child">
									<?php  $sql4="SELECT * FROM 4thsubcategory WHERE catid=".$row1['id']." and subcatid=".$row2['id']." and thirdcatid=".$row3['id'];
								 $db4->query($sql4)or die($db4->error());
								 ?>
								<?php while($row4=$db4->fetchArray()){	?>
                                    <li><a href="marketplace.php?cid=<?=$row1['id']?>&sid=<?php echo $row2['id'];?>&tid=<?php echo $row3['id'];?>&4thcid=<?php echo $row4['id'];?>"><?php echo $row4['thirdsubcatname'];?> </a>
									
									
									
									
									</li>
								<?php } ?>  
                                    </ul>
									<?php //////////////////////?>
									
									
									
									</li>
								<?php } ?>  
                                    </ul>
									
									
									
									</li>
								<?php } ?>  
                                    </ul>
                                
                                </li>
								<?php }?>
								
								
                              
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Vertical Menu End Here -->
                <!-- Slider Area Start Here -->
                <div class="col-xl-7 col-lg-7 slider_box">
                    <div class="slider-wrapper theme-default">
                        <!-- Slider Background  Image Start-->
                        <div class="bd-example maincarosal">
                            <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
								<?php 
								 $sql1="SELECT * FROM slider_add where img_type='slider' limit 0,1";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){?>
                                    <div class="carousel-item active">
                                        <img src="slider/<?=$row1['picture']?>" class="d-block w-100" alt="...">
                                         
                                    </div>
								 <?php } ?>
									
                                    <?php 
								 $sql1="SELECT * FROM slider_add where img_type='slider' limit 1,4";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){?>
                                    <div class="carousel-item">
                                        <img src="slider/<?=$row1['picture']?>" class="d-block w-100" alt="...">
                                         
                                    </div>
								 <?php } ?>
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
                        <!-- Slider Background  Image Start-->
                    </div>
                </div>
                <!-- Slider Area End Here -->

                <div class="col-xl-2 col-lg-2 slider_adss wdith20">
                    <div class="sliderad1">
					 <?php 
								 $sql1="SELECT * FROM slider_add where img_type='advertisement' limit 0,2";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){?>
                        <a href="slider/<?=$row1['picture']?>" target="_blank">
                            <img src="slider/<?=$row1['picture']?>" alt="ads">
                        </a>
								 <?php } ?>

                    </div>

                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>

     <section class="sponiserlist">
          <div class="container">

            <div id="demo" class="carousel slide" data-ride="carousel">

   

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <ul class="Sponsoredlist1">
							
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>

                        </ul> 
    </div>

    <div class="carousel-item">
      <ul class="Sponsoredlist1">
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>
                            <li>
                                <a href="#"> Sponsored Shops</a>
                            </li>

                        </ul> 
    </div>

    
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
 
          </div>
    </section>




            <section class="discount-banner">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="discount-banner-contain">
          <h2>Discount on every single item on our site.</h2>
          <h1><span>OMG! Just Look at the</span> <span>great Deals!</span></h1>
          <div class="rounded-contain rounded-inverse">
            <div class="rounded-subcontain">
              How does it feel, when you see great discount deals for each product?
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-12">
            <div class="timerproduct0">			<?php 
			$sql="SELECT * from ".$_TBL_PRODUCT." ORDER BY rand() limit 0,5 ";
			$db->query($sql);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];							?>
                <div class="product1ss">
                    <div class="prod-img1sn">
                        <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                        <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>" height="240">
                          <div class="simple-timer"></div>
                    </a>
                    </div>
                    <div class="productdetails223">
                        <div class="row">
                            <div class="col-md-7">
                                <h3 class="prodctnamenew"><?=$row['prod_name']?></h3>
                                <span class="prodcutstart">								<?php if($star==1){ ?>
                                    <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>								<?php } ?>																<?php if($star==2){ ?>                                    <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>								<?php } ?>																<?php if($star==3){ ?>                                    <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>								<?php } ?>																<?php if($star==4){ ?>                                    <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-o" aria-hidden="true"></i>								<?php } ?>																<?php if($star==5){ ?>                                    <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>								<?php } ?>																								
                                </span>
                            </div>
                            <div class="col-md-5">
                                <h5 class="process100">₦ <?=number_format($row['prod_sprice'],2);?></h5>
                                <h6 class="oldprice">₦ <?=number_format($row['prod_price'],2);?></h6>
                            </div>
                        </div>
                    </div>

                </div>
			<?php }} ?>

            </div>
            </div>

    </div>
  </div>
</section>

    <!-------- new code ended -------------->




    <div class="container clear newprodcuttab">
        <div class="col-md-12 tablinsg">

        		<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#newarrvial" role="tab" data-toggle="tab">New Arrivals</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#Featured" role="tab" data-toggle="tab">Featured </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#Mostselling" role="tab" data-toggle="tab">Most selling</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in show active" id="newarrvial">
  		 <div class="productsslider">
                <h4>New Arrivals</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="row">
						<?php    
						$dbc=new DB();
						$dbq=new DB();
						$cnt=$dbc->getSingleResult("SELECT count(*) FROM product WHERE prod_date > DATE_SUB(NOW(), INTERVAL 2 WEEK) ORDER BY rand()");
						
						$sql="SELECT * FROM product WHERE prod_date > DATE_SUB(NOW(), INTERVAL 2 WEEK) ORDER BY rand() DESC limit 0,4";									
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
						$finalprice=$row['prod_sprice'];
						$prodquantity=$dbq->getSingleResult("SELECT SUM(prodquantity) from prodattributes where prodid=".$row['id']);
							?>
                                        <div class="col-md-3 wdith20a"><!--wdith20a-->
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
                                
						<?php }}else{ echo "<div class='blackscreen'>Product not Available !</div>";} ?>								
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
							<?php if($cnt>5){?>

                                <div class="carousel-item">
                                    <div class="row">
						<?php   $sql="SELECT * FROM product WHERE prod_date > DATE_SUB(NOW(), INTERVAL 2 WEEK) ORDER BY rand() ASC limit 4 ";						
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
						$finalprice=$row['prod_sprice'];
						$prodquantity=$dbq->getSingleResult("SELECT SUM(prodquantity) from prodattributes where prodid=".$row['id']);
							?>
                                        <div class="col-md-3 wdith20a">
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
                                
						<?php }}else{ echo "<div class='blackscreen'>Product not Available !</div>";}  ?>								
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
                                 <?php } ?>
                            </div>
                            <!--.carousel-inner-->
							<?php if($cnt>5){?>
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
							<?php } ?>

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

  </div>
  <div role="tabpanel" class="tab-pane fade" id="Featured">
  	<div class=" productsslider">
                <h4>Featured Product</h4>
                <div class="row rowflow">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel2" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel2" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                 <div class="carousel-item active">
                                    <div class="row">
						<?php  
						$cnt1=$dbc->getSingleResult("SELECT * from ".$_TBL_PRODUCT." where featured='yes'"); // and catid='18'
						
						$sql="SELECT * from ".$_TBL_PRODUCT." where featured='yes'  ORDER BY rand() limit 0,5";									
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
                                        <div class="col-md-3 wdith20a">
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
                                
						<?php }}else{ echo "<div class='blackscreen'>Product not Available !</div>";}  ?>								
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
								<?php if($cnt1>5){?>
								
								  <div class="carousel-item">
                                    <div class="row">
						<?php  $sql="SELECT * from ".$_TBL_PRODUCT." where featured='yes' and catid='18' or catid='19' ORDER BY rand() limit 5,5";									
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
                                        <div class="col-md-3 wdith20a">
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
                                
						<?php }}//else{ //echo "<div class='blackscreen'>Product not Available !</div>";}  ?>								
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

								<?php } ?>
                            </div>
                            <!--.carousel-inner-->
								<?php if($cnt1>5){?>
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel2" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel2" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
								<?php } ?>

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="Mostselling">
  		<div class="row  productsslider">
                <h4>Most Selling Product</h4>
                <div class="row rowflow">
                    <div class="col-md-12">
                        <div id="blogCarousel3" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel3" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel3" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                              
								  <div class="carousel-item active">
                                    <div class="row">
						<?php  
						$cnt2=$dbc->getSingleResult("SELECT * from ".$_TBL_PRODUCT." where populer='yes'");
						 $sql="SELECT * from ".$_TBL_PRODUCT." where populer='yes' limit 0,5";									
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
                                        <div class="col-md-3 wdith20a ">
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
                                
						<?php }}else{ echo "<div class='blackscreen'>Product not Available !</div>";}  ?>								
                                    </div>
                                    
                                </div>
                                <!--.item-->
                                 <?php if($cnt2>5){ ?>
								 
								  <div class="carousel-item">
                                    <div class="row">
						<?php   
                        $db12=new DB();
                        $sql122="SELECT * from ".$_TBL_PRODUCT." where populer='yes'  LIMIT 5,5";									
						$db12->query($sql122);
						if($db12->numRows()>0)
						{
						while($row=$db12->fetchArray()){
						$path=$row['prod_large_image'];
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];
							?>
                                        <div class="col-md-3 wdith20a">
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
                                
						<?php }}else{ echo "<div class='blackscreen'>Product not Available !</div>";}  ?>								
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
								 <?php }?>
                            </div>
                            <!--.carousel-inner-->
							<?php if($cnt2>0){ ?>
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel3" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel3" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
							<?php } ?>
                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

  </div>
</div>




           

        </div>

    </div>



 
    <div class="cattegorilist">
        <div class="container">
            <div class="lisging-c-aro-home">
                <ul>
                <?php $db2=new DB();
     $sql2="SELECT * FROM $_TBL_CAT where status='yes'";
     $db2->query($sql2)or die($db2->error());
     ?>
    <?php while($row2=$db2->fetchArray()){
        $price=$db->getSingleResult("SELECT MIN(prod_sprice) from ".$_TBL_PRODUCT." where catid='".$row2['id']."'");
    
    $catid=$row2['id'];
    ?>
                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><a href="marketplace.php?cid=<?=$row2['id']?>"><img src="category/<?=$row2['imgid'];?>" alt="<?php echo $row2['catname'];?>" /></a></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span> ₦ <?=number_format($price,2);?></span>
                        </div>
                        <div class="catename">
                            <h4><a href="marketplace.php?cid=<?=$row2['id']?>"><?php echo $row2['catname'];?></a></h4>
                        </div>
                    </li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>


    <main>
       <div class="container">
    <div class="topdealsbar">
        <h3> <span class="listicon"><i class="fa fa-snowflake-o" aria-hidden="true"></i></span>Top Deals <span class="pull-right morevew"><a href="marketplace.php?cid=21">View  More</a></span> </h3>
        <div class="topliest">
            <ul>
			
			<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid='21' ORDER BY rand() limit 0,5";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$prod_price=str_replace(",","",$row['prod_price']);
				$prod_sprice=str_replace(",","",$row['prod_sprice']);
				$save=$prod_price-$prod_sprice;
				$mrp=$row['prod_price'];					
				$persen=$prod_price-$prod_sprice;
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];

				?>
				<?php

 //echo $price=number_format( $proprice1,2);?>
                <li class="dear1s">
                    <div class="dealimg">
                       <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                    </div>
                    <div class="productdeails1deals">
                        <h5>NGN <?=number_format($orgprice,2);?> <span><?=number_format($discount,2);?>% Off</span> </h5>
                        <div class="dearbar">
                            <div class="progress">
                                <div class="progress-bar" style="width:70%"></div>
                            </div>
                        </div>
                        <!--<div class="nm-sold">135 Sold</div>-->
                    </div>
                </li>
			<?php }} ?>	
             
		   </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="topdealsbar topselection ">
                <h3> <span class="listicon"><i class="fa fa-free-code-camp" aria-hidden="true"></i></span>Top Selection <span class="pull-right morevew"><a href="marketplace.php?cid=22">View  More</a></span> </h3>
                <div class="topliest">
                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." ORDER BY rand() limit 0,4";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];
$cnt=$db->getSingleResult("select count(*) from feedback where pages='product' prod_id =".$row['id']);
				?>
                        <li class="dear1s">
                            <div class="dealimg">
                                 <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                            <div class="productdeails1deals">
                                <h5>NGN <?=number_format($orgprice,2);?> </h5>
                                <div class="nm-sold"> <i class="fa fa-smile-o" aria-hidden="true"></i> <?=$cnt?></div>
                            </div>
                        </li>
			<?php }} ?>
                       <!-- <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product2.jpg" alt="product 1">
                            </div>
                            <div class="productdeails1deals">
                                <h5>NGN 6,5400 </h5>
                                <div class="nm-sold"> <i class="fa fa-smile-o" aria-hidden="true"></i> 880</div>
                            </div>
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product3.jpg" alt="product 1">
                            </div>
                            <div class="productdeails1deals">
                                <h5>NGN 6,5400 </h5>
                                <div class="nm-sold"> <i class="fa fa-smile-o" aria-hidden="true"></i> 880</div>
                            </div>
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product4.jpg" alt="product 1">
                            </div>
                            <div class="productdeails1deals">
                                <h5>NGN 6,5400 </h5>
                                <div class="nm-sold"> <i class="fa fa-smile-o" aria-hidden="true"></i> 880</div>
                            </div>
                        </li>
                    -->
					
					</ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="topdealsbar topselection newforyou">
                <h3> <span class="listicon"><i class="fa fa-grav" aria-hidden="true"></i></span>New For You <span class="pull-right morevew"><a href="marketplace.php?cid=19">View  More</a></span> </h3>
                <div class="topliest">
                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where newrelease='yes' ORDER BY rand() limit 0,5";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];
				$cnt=$db->getSingleResult("select count(*) from feedback where pages='product' prod_id =".$row['id']);

				?>
                        <li class="dear1s">
                            <div class="dealimg">
                               <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                            <div class="productdeails1deals">
                                <h5>NGN <?=number_format($orgprice,2);?> </h5>
                                <div class="nm-sold"> <i class="fa fa-smile-o" aria-hidden="true"></i> <?=$cnt?></div>
                            </div>
                        </li>
						
			<?php }} ?>
                       

				   </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="topdealsbar topselection featuredband">
                <h3> <span class="listicon"><i class="fa fa-grav" aria-hidden="true"></i></span> Featured Brands<span class="pull-right morevew"><!--View  More--></span> </h3>
                <div class="topliest">
                    <ul>
					      <?php $db2=new DB();
     $sql21="SELECT * FROM $_TBL_CAT where featured='yes' ORDER BY rand() DESC limit 0,2";
     $db2->query($sql21)or die($db2->error());
     ?>
    <?php while($row21=$db2->fetchArray()){
        $price=$db->getSingleResult("SELECT MIN(prod_sprice) from ".$_TBL_PRODUCT." where catid='".$row21['id']."'");
    
    $catid=$row21['id'];
$startTimeStamp = strtotime($row21['sdate']);
$endTimeStamp = strtotime(date('Y-m-d'));

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day
$numberDays = intval($numberDays);
    ?>
                        <li class="dear1s">
                            <div class="dealimg">
                               <a href="marketplace.php?cid=<?=$row21['id']?>"><img src="category/<?=$row21['imgid'];?>" alt="<?php echo $row21['catname'];?>" /></a>
                            </div>
                            <div class="productdeails1deals">
                                <h5>Coming Soon </h5>
                                <div class="nm-sold"> <i class="fa fa-clock-o" aria-hidden="true"></i> Sale Starts in: <?=$numberDays?> Days</div>
                            </div>
                        </li>
                      
	<?php } ?>
	<!--
					  <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/banner-03.jpg" alt="product 1">
                            </div>
                            <div class="productdeails1deals">
                                <h5>Big Sale are Coming</h5>
                                <div class="nm-sold"> <i class="fa fa-clock-o" aria-hidden="true"></i> Sale Starts in: 5 Days</div>
                            </div>
                        </li>
                    -->
</ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="topdealsbar topselection featuredband">
                <h3> <span class="listicon"><i class="fa fa-grav" aria-hidden="true"></i></span> Stores You'll Love<span class="pull-right morevew"> <a href="marketplace.php?cid=all&brands=all"> View  More</a></span> </h3>
                <div class="topliest">
                    <ul>
					
						<?php 
						$dbstore=new DB();
						//$sqlstore="SELECT * from ".$_TBL_PRODUCT." where catid='28' ORDER BY rand() limit 0,2";
			$sqlstore="SELECT * from category limit 0,2";
			$db->query($sqlstore);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$icon=$row['icon'];
				$path=$row['imgid'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']);
				
				?>
                        <li class="dear1s">
                            <div class="dealimg">
                                 <a href="marketplace.php?cid=<?=$row['id']?>">  <img src="<?=$_SITE_PATH?>category/<?=$path?>" alt="<?=$row['catname']?>"></a>
                            </div>
                              <div class="productdeails1deals">
                                <div class="logobrantop">
                                    <img src="category/<?=$icon?>">
                                </div>
                                <h5><?=$row['catname']?></h5>
                            </div>
							 
                        </li>
			<?php } }else{ ?>
            <li>
                <div class="noprod">
                                    No Prodcuct Available
                                </div>
            </li>

      <?php  } ?>
	  </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>



<div class="container">
    
    <div class="row">
        <div class="col-md-3">
		<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid=10 ORDER BY rand() limit 0,1";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];
if(empty($path)){
					$path='noimage.jpg';
				}				
				$goid=base64_encode($row['id']);?>
            <div class="big-adds0mill">
			
                 <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>


            </div>
			<?php }} ?>

        </div>
        <div class="col-md-9 shotsliting">
            <div class="row">
                <div class="col-md-4">
            <div class="topdealsbar topselection shortprofileshot">
                <h3> Woman's Fashion </h3>
                <div class="topliest">

                    

                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid='15' and subccatid='7' ORDER BY rand() limit 0,3";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];

				?>
                        <li class="dear1s">
                            <div class="dealimg">
                                 <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                             
                        </li>
			<?php } }else{ ?>
            <li>
                <div class="noprod">
                                    No Prodcuct Available
                                </div>
            </li>

      <?php  } ?>
                       <!-- <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product9.jpg" alt="product 1">
                            </div>
                             
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product10.jpg" alt="product 1">
                            </div>
                             
                        </li>-->
                        
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="topdealsbar topselection shortprofileshot">
                <h3> Phone & Accessories </h3>
                <div class="topliest">
                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid='16' ORDER BY rand() limit 0,3";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];

				?>
					
                        <li class="dear1s">
                            <div class="dealimg">
                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                             
                        </li>
			<?php } }else{ ?>
            <li>
                <div class="noprod">
                                    No Prodcuct Available
                                </div>
            </li>

      <?php  } ?>
						<!--
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product12.jpg" alt="product 1">
                            </div>
                             
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product13.jpg" alt="product 1">
                            </div>
                             
                        </li>-->
                        
                    </ul>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="topdealsbar topselection shortprofileshot">
                <h3> Renovation</h3>
                <div class="topliest">
                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid=13  ORDER BY rand() limit 0,3";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];
if(empty($path)){
					$path='noimage.jpg';
				}				
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];

				?>
                        <li class="dear1s">
                            <div class="dealimg">
                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                             
                        </li>
						
			<?php } }else{ ?>
            <li>
                <div class="noprod">
                                    No Prodcuct Available
                                </div>
            </li>

      <?php  } ?>
                     <!--   <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product13.jpg" alt="product 1">
                            </div>
                             
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product15.jpg" alt="product 1">
                            </div>
                             
                        </li>-->
                        
                    </ul>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="topdealsbar topselection shortprofileshot">
                <h3> Kids </h3>
                <div class="topliest">
                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid='7' ORDER BY rand() limit 0,3";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];

				?>
                        <li class="dear1s">
                            <div class="dealimg">
                                 <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                             
                        </li>
			<?php } }else{ ?>
            <li>
                <div class="noprod">
                                    No Prodcuct Available
                                </div>
            </li>

      <?php  } ?>
                       <!-- <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product17.jpg" alt="product 1">
                            </div>
                             
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product158.jpg" alt="product 1">
                            </div>
                             
                        </li>-->
                        
                    </ul>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="topdealsbar topselection shortprofileshot">
                <h3> Beauty </h3>
                <div class="topliest">
                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid=8 ORDER BY rand() limit 0,3";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];

				?>
                        <li class="dear1s">
                            <div class="dealimg">
                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                             
                        </li>
						
			<?php } }else{ ?>
            <li>
                <div class="noprod">
                                    No Prodcuct Available
                                </div>
            </li>

      <?php  } ?>
                       <!-- <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product160.jpg" alt="product 1">
                            </div>
                             
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product161.jpg" alt="product 1">
                            </div>
                             
                        </li>-->
                        
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="topdealsbar topselection shortprofileshot">
                <h3> Vehicles</h3>
                <div class="topliest">
                    <ul>
					<?php $sqltop="SELECT * from ".$_TBL_PRODUCT." where catid=6 and subcatid=3 ORDER BY rand() limit 0,3";
			$db->query($sqltop);			
			if($db->numRows()>0){		
			while($row=$db->fetchArray()){
				$path=$row['prod_large_image'];	
				if(empty($path)){
					$path='noimage.jpg';
				}
				$goid=base64_encode($row['id']); 
				$save=$row['prod_price']-$row['prod_sprice'];
				$mrp=$row['prod_price'];					
				$persen=$row['prod_price']-$row['prod_sprice'];	
				$discount=($persen*100)/$mrp;		
				$orgprice=$row['prod_sprice'];		
				$finalprice=$row['prod_sprice'];	
				$star=$row['star'];

				?>
                        <li class="dear1s">
                            <div class="dealimg">
                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">  <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></a>
                            </div>
                             
                        </li>
			<?php } }else{ ?>
            <li>
                <div class="noprod">
                                    No Prodcuct Available
                                </div>
            </li>

      <?php  } ?>
                        <!--<li class="dear1s">
                            <div class="dealimg">
                                <img src="img/social_product163.jpg" alt="product 1">
                            </div>
                             
                        </li>
                        <li class="dear1s">
                            <div class="dealimg">
                                <img src="img/prodcss111.jpg" alt="product 1">
                            </div>
                             
                        </li>-->
                        
                    </ul>
                </div>
            </div>
        </div>
            </div>
        </div>

        
         
        <div class="clear"></div>
    </div>
</div>








        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <!--<div class="col-lg-3">
                        <a href=""><img src="img/ads1.png" alt="ads"></a>
						 
                        </div>-->
                        <div class="col-lg-12">
                            <div class="main-ws-sec">
                                <div class="posts-section prodcutlisting">
                                    <div class="row searchrec">
                                        <ul class="b49ee_2pjyI _58c31_2R34y _22339_3gQb9">
                                            <?php 
						 if(!empty($_GET['cid'])){
							 if($_GET['cid']=='all'){
							 $sql="SELECT * from ".$_TBL_PRODUCT ; }else{
								 $sql="SELECT * from ".$_TBL_PRODUCT." where catid=".$_GET['cid'];
							 }
						}else{
							 $sql="SELECT * from ".$_TBL_PRODUCT." limit 9";
						}

						 //." where catid='".$catid1."' and subcatid='$subid1' and subsubcatid='$subsubid' order by id desc";
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){

						$path=$row['prod_large_image'];
						if(empty($path)){
					$path='noimage.jpg';
				}
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];

						?>
                                                <!-- one product--->
                                                <li class="bbe45_3oExY _22339_3gQb9 wdith20a wdith20">
                                                    <div>
                                                        <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap"><?=number_format($discount,2)?>% Off</span>
                                                            <div class="_7e903_3FsI6">
                                                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>" pid="<?=$row['id']?>">
                                                                    <picture>
                                                                        <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></picture>
                                                                </a>

                                                            </div>
                                                            <div class="_4941f_1HCZm">
                                                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                                                                    <div class="af885_1iPzH">
                                                                        <h3><?=$row['prod_name']?></h3></div>
                                                                    <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>
                                                                        <?=number_format($row['prod_sprice'],2);?>
                                                                            </span><span class="f6eb3_1MyTu"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>
                                                                            <?=number_format($row['prod_price'],2);?>
                                                                                </span>
                                                                    </div>
                                                                </a>
                                                                <form action="/cart/overview" method="POST">
                                                                    <input name="action_type" type="hidden" value="add_to_cart">
                                                                    <input name="product_sku" type="hidden" value="4522359">
                                                                    <input name="product_qty" type="hidden" value="1">
                                                                    <input name="product_price" type="hidden" value="78500">
                                                                    <input name="product_type" type="hidden" value="simple"><span class="_7cc7b_23GsY">Sold by  <a href="">Admin</a></span>
                                                                    <div class="_09e22_1ojNd"><span class="_13ef4_vzqNh">Posted</span><span class="_13ef4_vzqNh"><?=$row['sort-detail']?> <?php echo timeago($row['prod_date']);?></span></div>
                                                                    <div class="ccc19_2IYt0">
                                                                        <div>
                                                                            <?php if($row['start']=='1'){ echo "<i class='fas fa-star'></i>";}?>

                                                                                <?php if($row['start']=='2'){ echo "<i class='fas fa-star'></i>";}?>

                                                                                    <?php if($row['start']=='3'){ echo "<i class='fas fa-star'></i>";}?>

                                                                        </div>
                                                                    </div>

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
                                                </li>
                                                <!-- one product ended -->

                                                <!-- old code 	
									<div class="col-md-3 prodct-col">
										<div class="post-bar prodctbar">
											<div class="post_topbar">
												<div class="prodcut-list-1">
													<div class="prod-img"> 
														<a href="javascript:void(0);" class="bid_now11" pid="<?=$row['id']?>">
															<img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"> <span class="proctprice">$ <?=number_format($row['prod_sprice'],2);?></span>
														</a>
													</div>
													<div class="prod-detials">
														<h3 class="prodct_titl"><?=$row['prod_name']?></h3>
														<h3 class="prodct_time"><?=$row['sort-detail']?> <?php echo timeago($row['prod_date']);?></h3>
													</div>
													<div class="add-card_bttn">
														<a href="product-details.php?pid=<?=base64_encode($row['id'])?>" class="addtocard-btn bid_now ">Add To Card</a>
													</div>
												</div>
											</div>
										</div>

									</div>
								-->

                                                <?php $goid=''; }} ?>
                                        </ul>

                                        <!---------------------- product popup ------------------->
                                        <div class="popupforproduct" id="popupid">
                                            <div class="overview-box abc" id="overview-box">

                                            </div>
                                        </div>
                                        <!---------------------- product popup ------------------->

                                    </div>
                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                    </div>
					
					<div class="row">
					 <div class="col-md-12">
					  <h4>View History</h4> <br/>
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
						//if($allpid>0){ ?>
               
						<?php //} ?>
                <!--<div class="row">
                    <div class="col-md-12">-->
                        <div id="blogCarousel1" class="carousel slide" data-ride="carousel">

                            

                            <!-- Carousel items -->
                        <div class="carousel-inner">
						<div class="carousel-item active">
                                    <div class="row">
						<?php
						 $sql="SELECT * from ".$_TBL_PRODUCT." where id IN($allpid) limit 0,6";									
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){
						$path=$row['prod_large_image'];
						if(empty($path)){
					$path='noimage.jpg';
				}
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];
							?>
                                        <div class="col-md-2">
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

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq width100">
																 <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id']?>" tono="1">Add To Cart</button>
                                                                    
                                                                </div>
																<!--<div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtowishlist" type="button" pid="<?=$row['id']?>" tono="1">Add To Wishlist</button>
                                                                    
                                                                </div>-->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
						<?php }} ?>								
                                    </div>
                                    
                                </div>
								
								<!-- <div class="carousel-item">
                                    <div class="row">
						<?php   $sql1="SELECT * from ".$_TBL_PRODUCT." where id IN($allpid) limit 4,8";										
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
                                    
                                </div>-->
                                 
                            </div>
                            <!--.carousel-inner-->
							<?php if($allpid>0){ ?>
                           <!-- <div class="prodcutcarosalnav">
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

                   <!-- </div>
                </div>-->
            </div>

        </div>

					</div>
              

			  </div>
                <!-- main-section-data end-->
            </div>
        </div>
    </main>
	
	<div class="support-area bdr-top clear">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Great Value</h6>
                            <span>Nunc id ante quis tellus faucibus dictum in eget.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Worlwide Delivery</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Safe Payment</h6>
                            <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Shop Confidence</h6>
                            <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Help Center</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
	 

    <div class="selle-prodcut-popup">
        <div class="overview-box" id="experience-box" style="overflow: scroll; max-height: 80vh; height:600px;
">
            <div class="overview-edit">
                <h3>Add Product</h3>
                <form method="post" id="AddForm" enctype="multipart/form-data">
                    <?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" ');?>

                        <?php 

				echo createComboBox($makearr2,'subcategory',$row['subcatid'],' class="form-control" id="subcategory" ');
								?>
                            <input type="text" name="prodname" id="prodname" placeholder="Product Name..." required />

                            <input name="sku" id="sku" type="text" class="form-control" value="<?=$row['prod_sku']?>" placeholder="Sku..." />

                            <input type="text" name="price" id="price" placeholder="Product Mrp..." required />

                            <input type="text" name="prod_sprice" id="prod_sprice" placeholder="Product selling price..." required />
                            <input name="star" type="text" class="form-control" value="<?=$row['star']?>" placeholder="star 1-5" />

                            <input placeholder="material" name="material" type="text" class="form-control" value="<?=$row['material']?>" />
                            <input name="shippingcharge" type="text" class="form-control" value="<?=$row['shippingcharge']?>" placeholder="shipping charge " />

                            <div class="fgt-sec">
                                <input type="checkbox" name="size" id="size" value="S" <?php if($row[ 'prodsize1']=='S' ){echo "checked";} ?>>
                                <label for="size">
                                    <span></span>
                                </label>
                                <small>Small</small>
                            </div>
                            <div class="fgt-sec">
                                <input type="checkbox" name="size1" id="size1" value="M" <?php if($row[ 'prodsize2']=='M' ){echo "checked";} ?>>
                                <label for="size1">
                                    <span></span>
                                </label>
                                <small>Medium</small>
                            </div>

                            <div class="fgt-sec">
                                <input type="checkbox" name="size2" id="size2" value="L" <?php if($row[ 'prodsize3']=='L' ){echo "checked";} ?>>
                                <label for="size2">
                                    <span></span>
                                </label>
                                <small>Large</small>
                            </div>
                            <div class="fgt-sec">
                                <input type="checkbox" name="size3" id="size3" value="EXL" <?php if($row[ 'prodsize4']=='EXL' ){echo "checked";}?>>
                                <label for="size3">
                                    <span></span>
                                </label>
                                <small>Extra Large</small>
                            </div>

                            <input name="quantity" type="text" class="form-control" value="<?=$row['quantity']?>" placeholder="quantity" />

                            <textarea placeholder="sort detail" name="sort_detail" class="form-control">
                                <?=$row['sort_detail']?>
                            </textarea>

                            <textarea cols="5" rows="4" placeholder="Product Details..." name="prod_desc" id="prod_desc"></textarea>

                            <img src="images/gallery.png">Add product Image
                            <input type="file" id="p" name="p" multiple>
                            </label>
                            <input type="hidden" name="pimgid" id="pimgid" value="" />

                            <input type="file" id="mp" name="mp" multiple>
                            </label>
                            <input type="hidden" name="mpimgid" id="mpimgid" value="" />

                            <button type="button" class="save addproduct" id="addproduct">Save</button>
                            <!--<button type="submit" class="save-add">Save & Add More</button>-->
                            <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
            <!--overview-edit end-->
        </div>
        <!--overview-box end-->
    </div>
    </div>

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