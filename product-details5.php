<?php include( 'header.php'); include( 'chksession.php'); ?>
 <?php $catid1=base64_decode($_REQUEST['cid']);
$subid1=base64_decode($_REQUEST['subid']);
$subsubid=base64_decode($_REQUEST['subsubid']);

  $pid=base64_decode($_REQUEST['pid']);
						
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
	 
	
	
	?>
<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					 <div class="col-lg-12">

					 	<div class="breadcrumb flat">
				        	<a href="../" >Home</a>
				        	<a href=""><?=$catname?></a>     
				        	<a href="javascript:;" class="active"><?=$row['prod_name']?></a>        	
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
		$pathslider=$rowt['prod_large_image'];?>
        <div class="carousel-item">
            <img class="d-block w-100" src="product/<?=$pathslider?>" alt="Second slide">
        </div>
		
	<?php }} ?>
        <!--<div class="carousel-item">
            <img class="d-block w-100" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/252820/1320x580-78.jfif" alt="Third slide">
        </div>-->
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
        <li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100" src="product/<?=$pathslider?>" class="img-fluid"></li>
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
																	<li><a href=""><?=$catname?></a>
																	</li>
																	<li><a href=""><?=$row['prod_name']?></a>
																	</li>
																</ul>
																<h3 class="prodcutname product_name"><?=$row['prod_name']?></h3>
																<p class="timeofproduc"> <?php echo timeago($row['prod_date']);?></p>
																<div class="prdcutprice">
																<?php
				$save=$row['prod_price']-$row['prod_sprice']; 			
			    $mrp=$row['prod_price'];
				$persen=$row['prod_price']-$row['prod_sprice'];
				$discount=($persen*100)/$mrp;
			    $orgprice=$row['prod_sprice'];
			    $finalprice=$row['prod_sprice'];
				?>
																	<h2 class="prodcfprice"> $ <?=number_format($row['prod_sprice'],2);?></h2>
																	<h3 class="prodcttype">Material: <?=$row['material']?></h3>
																	<h3 class="prodcttype">Size: <?=$row['prodsize1']?></h3>
																	<h3 class="prodcttype">Description:  <?=$row['sort_detail']?></h3>
																	<!--<h3 class="prodcttype">Condition: Used - Good</h3>-->
																</div>
																<div class="slelect-dteails">
																	<h2>Seller Information</h2>
																	<div class="post_topbar">
																		<div class="usy-dt">
					<?php $joindate=$db->getSingleResult('select joindate from all_user where user_id='.$_SESSION['sess_webid']);
					
					if($userspath=='' and empty($userspath)){ ?>
							<img src="images/resources/user.png" alt="">
						<?php }else{?>
							<img src="upload/<?=$userspath?>" alt="" height="40" width="40">
						<?php }?>
							<div class="usy-name">
							<h3><?=$_SESSION['sess_name']?></h3>
																				<span>Joined: <?php echo timeago($joindate);?></span>
																			</div>
																		</div>
																	</div>
																</div>
<hr>
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
                                <dt>Size: </dt>
                                <dd>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2<?=$row['id']?>" value="option2">
                                        <span class="form-check-label">SM</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2<?=$row['id']?>" value="option2">
                                        <span class="form-check-label">MD</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2<?=$row['id']?>" value="option2">
                                        <span class="form-check-label">XXL</span>
                                    </label>
                                </dd>
                            </dl>
                            <!-- item-property .// -->
                        </div>
                        <!-- col.// -->
                    </div>
					
					  <hr>
                    <a href="#" class="btn btn-lg btn-primary text-uppercase buynow-btn-n  addtocart" pid="<?=$row['id']?>"> Buy now </a>

                    <button class="btn btn-lg btn-outline-primary text-uppercase add-btnbtn11 my-cart-btn addtocart" pid="<?=$row['id']?>" data-id="1" data-name="product 1" data-summary="summary 1" data-price="10" data-quantity="1" data-image="https://s3-us-west-2.amazonaws.com/s.cdpn.io/252820/1320x580-78.jfif">Add to Cart</button>
                    <!-- row.// -->
				
                    <div class="detila-prodcs-descroption">
                    	<h3>Description</h3>
                    	<div class="scrsss">
                    		<?=$row['prod_detail']?>
                    	</div>
                    </div>

																 
															</div>

                    
                    
                </article>
                <!-- card-body.// -->
            </aside>
            <!-- col.// -->
        </div>
        <!-- row.// -->
    </div>
    <!-- card.// -->
					 </div>
				</div>
			</div>
			<!-- main-section-data end-->
		</div>
	</div>
</main>
 


 <script src="js/jquery.mycart.js"></script>

 <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        right: 350,
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: [
        {id: 1, name: 'product 1', summary: 'summary 1', price: 10, quantity: 1, image: 'images/img_1.png'},
        {id: 2, name: 'product 2', summary: 'summary 2', price: 20, quantity: 2, image: 'images/img_2.png'},
        {id: 3, name: 'product 3', summary: 'summary 3', price: 30, quantity: 1, image: 'images/img_3.png'}
      ],
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      afterAddOnCart: function(products, totalPrice, totalQuantity) {
        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
      },
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
      },
      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
        $.each(products, function(){
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
        });
        alert(checkoutString)
        console.log("checking out", products, totalPrice, totalQuantity);
      },
      getDiscountPrice: function(products, totalPrice, totalQuantity) {
        console.log("calculating discount", products, totalPrice, totalQuantity);
        return totalPrice * 0.5;
      }
    });

    $("#addNewProduct").click(function(event) {
      var currentElementNo = $(".row").children().length + 1;
      $(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>')
    });
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

axe.run( function(err, results) {
  console.log( results.violations );
} );
</script>
 