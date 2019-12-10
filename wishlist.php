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



<section class="discount-banner">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="discount-banner-contain">
         
          <h1><span>OMG! Just Look at the</span> <span>wishlist!</span></h1>
          <div class="rounded-contain rounded-inverse">
            <div class="rounded-subcontain">
              How does it feel, when you see wishlist for each product?
            </div>
          </div>
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
    <a class="nav-link active" href="#newarrvial" role="tab" data-toggle="tab">New Wishlist</a>
  </li>
 
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in show active" id="newarrvial">
  		 <div class="row  productsslider">
                <h4>New Wishlist</h4>
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
						<?php  $w=array();
						$dbt=new DB();
		 $sqlt="select * from wishlish where user_id='".$_SESSION['sess_webid']."'";
		$dbt->query($sqlt);
		if($dbt->numRows()>0)
			{	
		     while($rowt1=$dbt->fetchArray()){
				 $w[]=$rowt1['prodid'];
			 }
			}
			$allproduct=implode(',',$w);

						 $sql="SELECT * from ".$_TBL_PRODUCT." WHERE id IN($allproduct)";									
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
                                
						<?php }}else{ echo "Result Not Found !";} ?>								
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item
							

                                <div class="carousel-item">
                                    <div class="row">
						<?php  $sql="SELECT * from ".$_TBL_PRODUCT." limit 5,10";						
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
                                
						<?php }}else{ echo "Result Not Found !";}  ?>								
                                    </div>
                                   
                                </div>
                                <!--.item-->
                                 
                            </div>
                            <!--.carousel-inner
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>-->

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

  </div>
 

</div>




           

        </div>

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