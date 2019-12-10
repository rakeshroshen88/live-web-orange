<?php include( 'header.php'); include( 'chksession.php'); ?>
<div class="search-sec">
	<div class="container">
		<div class="search-box">
			<form  action="search1.php" method="post">
			<input type="text" name="search" class="search" id="searchid" onkeypress="return showUser(this.value);" placeholder="Is it me you're looking for?"  />
				<!--<input type="text" name="search" placeholder="Search keywords">-->
				<button type="submit">Search</button>
			</form>
		</div>
		<ul  id="txtHint"></ul>
		<script>

function showUser(str)
{
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
 
  
xmlhttp.open("GET","newsearch.php?q="+str,true);
xmlhttp.send();
}
}
</script>
		<!--search-box end-->
	</div>
</div>
<!--search-sec end-->
<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					<div class="col-lg-3">
						<div class="sellc-btn">
							<a href="" class="exp-bx-open add-prodcut-btn">Add Products</a>
						</div>
						<div class="filter-secs">
							<div class="filter-heading">
								<h3>Filters</h3>
								<a href="javascript:void(0);" class="allclear" title="">Clear all filters</a>
							</div>
							<!--filter-heading end-->
							<div class="paddy">
								<div class="filter-dd">
									<div class="filter-ttl">
										<h3>Price</h3>
										<a href="javascript:void(0);" class="allclear">Clear</a>
									</div>
									<form>
										<div class="row">
											<div class="col-md-6">
												<input type="text" name="min" id="min" placeholder="Min">
											</div>
											<div class="col-md-6">
												<input type="text" id="max" name="max" placeholder="Max">
											</div>
										</div>
									</form>
								</div>
								<div class="filter-dd">
									<div class="filter-ttl">
										<h3>Location</h3>
										<a href="javascript:void(0);" class="allclear">Clear</a>
									</div>
									<form>
										<input type="text" placeholder="New Delhi, India">
									</form>
								</div>
								<div class="filter-dd">
									<div class="filter-ttl">
										<h3>Short BY</h3>
										<a href="#" title="">Clear</a>
									</div>
									<form class="job-tp">
										<select class="pricelowtohigh" name="pricelowtohigh" id="pricelowtohigh">
											<option value="">Recommended</option>
											<option value="asc">Price: Low to High</option>
											<option value="desc">Price: High to Low</option>
										</select> <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
									</form>
								</div>
								<div class="filter-dd">
									<div class="filter-ttl">
										<h3>Categories</h3>
									</div>
									<ul class="avail-checks">
										<li><a href="?cid=all" catid="all"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <small>All Products</small> </a>
										</li>
										<?php  $sql1="select * from category";//die;
										$db->query($sql1);
										if($db->numRows()> 0)
											{
											while($result=$db->fetchArray()){?>
										<li><a href="?cid=<?=$result['id']?>"><img src="category/<?=$result['icon']?>" height="25px" > <small><?=$result['catname']?></small> </a>
										</li>
											<?php }} ?>
										<!--<li><a href="#"><i class="fa fa-microchip" aria-hidden="true"></i> <small>Electronics</small> </a>
										</li>
										<li><a href="#"><i class="fa fa-blind" aria-hidden="true"></i> <small>Home & Garden</small> </a>
										</li>
										<li><a href="#"><i class="fa fa-user-secret" aria-hidden="true"></i> <small>Clothing & Accessories</small> </a>
										</li>
										<li><a href="#"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> <small>Classifieds</small> </a>
										</li>
										<li><a href="#"><i class="fa  fa-futbol-o" aria-hidden="true"></i> <small>Hobbies</small> </a>
										</li>
										<li><a href="#"><i class="fa fa-television" aria-hidden="true"></i> <small>Entertainment</small> </a>
										</li>
										<li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> <small>Family</small> </a>
										</li>-->
									</ul>
								</div>
							</div>
						</div>
						<!--filter-secs end-->
					</div>
					<div class="col-lg-9">
						<div class="main-ws-sec">
							<div class="posts-section prodcutlisting">
								<div class="row searchrec"> <?php 
								//Print_r($_POST);
								$s=$_REQUEST['search'];
						if(!empty($_GET['cid'])){
						  if($_GET['cid']=='all'){
							 $sql="SELECT * from ".$_TBL_PRODUCT; }else{
								 $sql="SELECT * from ".$_TBL_PRODUCT." where catid=".$_GET['cid'];
							 }
						  
						}elseif(!empty($_REQUEST['search'])){
							 $sql="SELECT * from product where prod_name like '%$s%'";
						}else{
							 $sql="SELECT * from ".$_TBL_PRODUCT;
						}//." where catid='".$catid1."' and subcatid='$subid1' and subsubcatid='$subsubid' order by id desc";
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
									 <li class="bbe45_3oExY _22339_3gQb9">
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
												                    <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span><?=number_format($row['prod_sprice'],2);?></span><span class="f6eb3_1MyTu"><span style="font-family: sans-serif; margin-right: 1px;">₦</span><?=number_format($row['prod_price'],2);?></span>
												                    </div>
												                </a>
												                <form action="/cart/overview" method="POST">
												                    <input name="action_type" type="hidden" value="add_to_cart">
												                    <input name="product_sku" type="hidden" value="4522359">
												                    <input name="product_qty" type="hidden" value="1">
												                    <input name="product_price" type="hidden" value="78500">
												                    <input name="product_type" type="hidden" value="simple"><span class="_7cc7b_23GsY">Sold by  <a href="/merchant/konga-store">konga</a></span>
												                    <div class="_09e22_1ojNd"><span class="_13ef4_vzqNh">Posted</span><span class="_13ef4_vzqNh"><?=$row['sort-detail']?> <?php echo timeago($row['prod_date']);?></span></div>
												                    <div class="ccc19_2IYt0">
						<div><?php if($row['start']=='1'){ echo "<i class='fas fa-star'></i>";}?>
						
						<?php if($row['start']=='2'){ echo "<i class='fas fa-star'></i>";}?>
						
						<?php if($row['start']=='3'){ echo "<i class='fas fa-star'></i>";}?>






						</div>
												                    </div>
												                     
												                    <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
												                        <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id']?>">Add To Cart</button>
												                    </div>
																	
																	<div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">

																 <button class="_0a08a_3czMG addtowishlist" type="button" pid="<?=$row['id']?>" tono="1">Add To Wishlist</button>

                                                                    

                                                                </div>
												                </form>
												            </div>
												        </div>
												    </div>
												</li>
											
									
									
						<?php $goid=''; }}else{ echo "Result Not Found !"; } ?>
									



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
			</div>
			<!-- main-section-data end-->
		</div>
	</div>
</main>


<div class="selle-prodcut-popup">
	<div class="overview-box"  id="experience-box">
			<div class="overview-edit">
				<h3>Education</h3>
				<form>
					<input type="text" name="school" placeholder="School / University">
					<div class="datepicky">
						<div class="row">
							<div class="col-lg-6 no-left-pd">
								<div class="datefm">
									<input type="text" name="from" placeholder="From" class="datepicker">	
									<i class="fa fa-calendar"></i>
								</div>
							</div>
							<div class="col-lg-6 no-righ-pd">
								<div class="datefm">
									<input type="text" name="to" placeholder="To" class="datepicker">
									<i class="fa fa-calendar"></i>
								</div>
							</div>
						</div>
					</div>
					<input type="text" name="degree" placeholder="Degree">
					<textarea placeholder="Description"></textarea>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save & Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

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