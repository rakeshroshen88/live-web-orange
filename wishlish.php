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
                            <li class="wishmainlist"><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Wish</span><span>list (<?=$ct?>)</span></span></a>
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
							  <span class="prodcutname"><?=$prod_name?></span><span class="text-muted wbtndel" title="Remove"  pid="<?=$rowt['prodid']?>">X</span>
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
							<?php $db1=new DB(); $db2=new DB();
								 $sql1="SELECT * FROM $_TBL_CAT where status='yes'";
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
                                    <li><a href="marketplace.php?cid=<?=$row1['id']?>&sid=<?php echo $row2['id'];?>"><?php echo $row2['subcatname'];?> </a></li>
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
                                    <div class="carousel-item active">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                         
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                        
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                         
                                    </div>
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
                        <a href="">
                            <img src="img/ads1.JPG" alt="ads">
                        </a>

                        <a href="">
                            <img src="img/ads1.JPG" alt="ads">
                        </a>

                    </div>

                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>

    



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
            <div class="timerproduct0">			<?php    $sql="SELECT * from ".$_TBL_PRODUCT." limit 0,5";															$db->query($sql);						if($db->numRows()>0)						{						while($row=$db->fetchArray()){						$path=$row['prod_large_image'];						$goid=base64_encode($row['id']); 						$save=$row['prod_price']-$row['prod_sprice']; 									$mrp=$row['prod_price'];						$persen=$row['prod_price']-$row['prod_sprice'];						$discount=($persen*100)/$mrp;						$orgprice=$row['prod_sprice'];						$finalprice=$row['prod_sprice'];						$star=$row['star'];							?>
                <div class="product1ss">
                    <div class="prod-img1sn">
                        <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                        <img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>`">
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