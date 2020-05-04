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
                <div class="col-lg-8">
                    <div class="categorie-search-box">
                       <form class="searchform" action="search1.php">
                            <div class="form-group">
                                <select class="bootstrap-select" name="catname" id="catname">
                                 
								<option value="all">All categories</option>
									<?php $db1=new DB();
								 $sql1="SELECT * FROM $_TBL_CAT where status='yes' limit 0,12";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){
								 $catid=$row1['id'];
								?>
								 <option value="<?=$catid?>"><?php echo $row1['catname'];?></option>
								 <?php } ?>
                                    <!--<option value="2">Arrivals</option>
                                    <option value="3">Cameras</option>
                                    <option value="4">Cords and Cables</option>
                                    <option value="5">gps accessories</option>
                                    <option value="6">Microphones</option>
                                    <option value="7">Wireless Transmitters</option>
                                    <option value="8">GamePad</option>
                                    <option value="9">cube lifestyle hd</option>
                                    <option value="10">Bags</option>
                                    <option value="11">Bottoms</option>
                                    <option value="12">Shirts</option>
                                    <option value="13">Tailored</option>
                                    <option value="14">Home &amp; Kitchen</option>
                                    <option value="15">Large Appliances</option>
                                    <option value="16">Armchairs</option>
                                    <option value="17">Bunk Bed</option>
                                    <option value="18">Mattress</option>
                                    <option value="19">Sideboard</option>
                                    <option value="20">Small Appliances</option>
                                    <option value="21">Bootees Bags</option>
                                    <option value="22">Jackets</option>
                                    <option value="23">Shelf</option>
                                    <option value="24">Shoes</option>
                                    <option value="25">Phones &amp; Tablets</option>
                                    <option value="26">Tablet</option>
                                    <option value="27">phones</option>-->
                                </select>
                            </div>
                            <!--<input type="text" name="search" placeholder="I’m shopping for...">-->
							 <input type="text" name="search" class="search" id="searchid" onkeypress="return showUser(this.value);" placeholder="Is it me you're looking for?" required />
							 
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    <ul  id="txtHint"></ul>
					</div>
                </div>

                <div class="col-lg-4">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
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
							  <span class="prodcutname"><?=$prod_name?></span><span class="text-muted wbtndel" title="Remove"  pid="<?=$rowt['prodid']?>">X</span></a>
							</li>
	<?php }}else{ echo "Empty";} ?>
							</ul>
                            </li>
							<li><a href="#" class="sellproduct1 exp-bx-open"><i class="lnr lnr-store"></i> Sell Your Product </a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

<div class="search-sec" style="display:none;">
	<div class="container">
		<div class="search-box">
			<form  action="search1.php" method="post">
			<input type="text" name="search" class="search" id="searchid" onkeypress="return showUser1(this.value);" placeholder="Is it me you're looking for?"  />
				<!--<input type="text" name="search" placeholder="Search keywords">-->
				<button type="submit">Search</button>
			</form>
		</div>
		<ul  id="txtHint1"></ul>
		<script>

function showUser1(str)
{
if (str=="0")
  {
  document.getElementById("txtHint1").innerHTML="";
  
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
		
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
	
	
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
<!--search-sec end--><style>.posts-section.prodcutlisting .bbe45_3oExY._22339_3gQb9 {    width: 32% !important;}img {    float: none !important;}</style>
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
											<option value="desc">Price: High to Low</option>
											<option value="asc">Price: Low to High</option>
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
										<?php  $sql1="select * from category where status='yes'";//die;
										$db->query($sql1);
										if($db->numRows()> 0)
											{
											while($result=$db->fetchArray()){?>
										<li><a href="?cid=<?=$result['id']?>"><img src="category/<?=$result['icon']?>" > <small><?=$result['catname']?></small> </a>
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
						<?php $cpath=$db->getSingleResult("select bimg from category where id='".$_GET['cid']."'"); ?>					<?php if(!empty($cpath)){ ?>
						<img src="category/<?=$cpath?>"/>					<?php } ?>
							<div class="posts-section prodcutlisting">
								<div class="row searchrec">
									<ul class="b49ee_2pjyI _58c31_2R34y _22339_3gQb9">
									<?php 
						 if(!empty($_GET['cid'])){
							 if($_GET['cid']=='all'){
								 if($_GET['brands']=='all'){
							  $sql="SELECT * from ".$_TBL_PRODUCT.' where prod_status=1 AND brandname >= 0 ORDER BY rand()'; 
								 }else{
									  $sql="SELECT * from ".$_TBL_PRODUCT." where prod_status=1 ORDER BY rand()"; 
								 }
							 }else{
								 if(!empty($_GET['sid']) and (empty($_GET['tid'])) and (empty($_GET['4thcid']))){
								  $sql="SELECT * from ".$_TBL_PRODUCT." where prod_status=1 and catid=".$_GET['cid']." and subcatid=".$_GET['sid']." ORDER BY rand() DESC";
								 }else if(!empty($_GET['sid']) and (!empty($_GET['tid'])) and (empty($_GET['4thcid']))){

								$sql="SELECT * from ".$_TBL_PRODUCT." where prod_status=1 and catid=".$_GET['cid']." and subcatid=".$_GET['sid']." and subsubcatid=".$_GET['tid']." ORDER BY rand() DESC";
								}else if(!empty($_GET['sid']) and (!empty($_GET['tid'])) and (!empty($_GET['4thcid']))){

								$sql="SELECT * from ".$_TBL_PRODUCT." where prod_status=1 and catid=".$_GET['cid']." and subcatid=".$_GET['sid']." and subsubcatid=".$_GET['tid']." and 4thcatid=".$_GET['4thcid']." ORDER BY rand() DESC";
									 
								 }else{
								 $sql="SELECT * from ".$_TBL_PRODUCT." where prod_status=1 and catid=".$_GET['cid']." ORDER BY rand() DESC";										//}
								 }
							 }
						}else{														
							 $sql="SELECT * from ".$_TBL_PRODUCT.' where prod_status=1 ORDER BY rand() DESC desc';							
						}
						 
						 //." where catid='".$catid1."' and subcatid='$subid1' and subsubcatid='$subsubid' order by id desc";
						 $dbq=new DB();
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
									<!-- one product--->
											 <li class="bbe45_3oExY _22339_3gQb9">
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
												           <?php if($prodquantity>0){?>
												                    <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
												                        <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id']?>" tono="1">Add To Cart</button>
												                    </div>
																	<div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
																 <button class="_0a08a_3czMG addtowishlist" type="button" pid="<?=$row['id']?>" tono="1">Add To Wishlist</button>
                                                                    
                                                                </div>
												                
														   <?php }else{ ?>
														    <button id="out" disabled="disabled">Buy </button>
                                        			<button id="out1" disabled="disabled"    >Add to Cart <i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
														   <?php } ?>
																
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
									
									
									
						<?php $goid=''; }}else{ echo "<div class='a2cf5_2S5q5 cf5dc_3HhOq'>Result Not Found !</div>";} ?>
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
			</div>
			<!-- main-section-data end-->
		</div>
	</div>
</main>


<div class="selle-prodcut-popup">
	<div class="overview-box addprodutpopup"  id="experience-box" >
			<div class="overview-edit">
				<h3>Add Product</h3>
				<form  method="post" id="AddForm" enctype="multipart/form-data">
					<div class="formsection1">
					<div class="sn-field">
				<?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" ');?>
				<span><i class="fa fa-ellipsis-h"></i></span>
				</div>
				<div class="sn-field">

				<?php 

				
				echo createComboBox($makearr2,'subcategory',$row['subcatid'],' class="form-control" id="subcategory" ');
								?>
								<span><i class="fa fa-ellipsis-h"></i></span>
				</div>
											 <input type="text" name="prodname" id="prodname" placeholder="Product Name..." required />
											 
											  <input name="sku" id="sku" type="text" class="form-control" value="<?=$row['prod_sku']?>" placeholder="Sku..."/>  
										
											 <input type="text" name="price" id="price" placeholder="Product Mrp..." required />
										
										
											 <input type="text" name="prod_sprice" id="prod_sprice" placeholder="Product selling price..." required />
											  <input name="star" type="text" class="form-control" value="<?=$row['star']?>" placeholder="star 1-5"/>  
										
										<input placeholder="material" name="material" type="text" class="form-control" value="<?=$row['material']?>"/> 
										 <input name="shippingcharge" type="text" class="form-control" value="<?=$row['shippingcharge']?>" placeholder="shipping charge "/> 
										
										<div class="fgt-sec">
															<input type="checkbox" name="size" id="size" value="S" <?php if($row['prodsize1']=='S'){echo "checked";} ?>>
															<label for="size">
																<span></span>
															</label>
															<small>Small</small>
														</div>
										<div class="fgt-sec">
															<input type="checkbox" name="size1" id="size1" value="M" <?php if($row['prodsize2']=='M'){echo "checked";} ?>>
															<label for="size1">
																<span></span>
															</label>
															<small>Medium</small>
														</div>
														
														
														
									<div class="fgt-sec">
															<input type="checkbox" name="size2" id="size2" value="L" <?php if($row['prodsize3']=='L'){echo "checked";} ?>>
															<label for="size2">
																<span></span>
															</label>
															<small>Large</small>
														</div>
									<div class="fgt-sec">
															<input type="checkbox" name="size3" id="size3" value="EXL" <?php if($row['prodsize4']=='EXL'){echo "checked";}?>>
															<label for="size3">
																<span></span>
															</label>
															<small>Extra Large</small>
														</div>
										
										
		
		<input name="quantity" type="text" class="form-control" value="<?=$row['quantity']?>" placeholder="quantity"/> 
		
		 <textarea placeholder="sort detail" name="sort_detail" class="form-control"><?=$row['sort_detail']?></textarea>
											
											
										
											 <textarea cols="5" rows="4" placeholder="Product Details..." name="prod_desc" id="prod_desc"></textarea>
										
											
														<!--	<img src="images/gallery.png">--><h3 class="uploadimgs">Add product Image</h3>
														<div class="row clear">
														<div class="col-md-6">
														 <label>Main Images</label>
														 <input type="file" id="p" name="p"  multiple>
														 
														</div>
														<div class="col-md-6">
														 <label>Multiple Images</label>
														 <input type="file" id="mp" name="mp"  multiple>
														 
														</div>
														<input type="hidden" name="pimgid" id="pimgid" value=""/>
														</div>

	<input type="hidden" name="mpimgid" id="mpimgid" value=""/>
													
									

									
						
					
					
					</div>
					<button type="button" class="save addproduct" id="addproduct">Add Product</button>
					<!--<button type="submit" class="save-add">Save & Add More</button>-->
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->
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