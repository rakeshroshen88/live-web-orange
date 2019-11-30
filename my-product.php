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
					<div class="col-lg-12">
						<div class="sellc-btn">
							<a href="" class="exp-bx-open add-prodcut-btn">Add Products</a>
						</div>
					
					</div>
					<div class="col-lg-12">
						<div class="main-ws-sec">
							<div class="posts-section prodcutlisting">
								<div class="row searchrec">
									<ul class="b49ee_2pjyI _58c31_2R34y _22339_3gQb9">
									<?php 
					
						$sql="SELECT * from ".$_TBL_PRODUCT." where userid=".$_SESSION['sess_webid'];
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
									<!-- one product--->
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
												                        <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id']?>" tono="1">Add To Cart</button>
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
			</div>
			<!-- main-section-data end-->
		</div>
	</div>
</main>


<div class="selle-prodcut-popup">
	<div class="overview-box"  id="experience-box" style="overflow: scroll; max-height: 80vh; height:600px;
">
			<div class="overview-edit">
				<h3>Add Product</h3>
				<form  method="post" id="AddForm" enctype="multipart/form-data">
				<?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" ');?>
				
				<?php 
				
				echo createComboBox($makearr2,'subcategory',$row['subcatid'],' class="form-control" id="subcategory" ');
								?>
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
										
											
															<img src="images/gallery.png">Add product Image
															<input type="file" id="p" name="p"  multiple>
														</label>
														<input type="hidden" name="pimgid" id="pimgid" value=""/>
														
														<!--
														<img src="images/gallery.png">Add Multiple Image
															<input type="file" id="mp" name="mp"  multiple>
														</label>
														<input type="hidden" name="mpimgid" id="mpimgid" value=""/>
													-->
									

									
						
					
					
					
					<button type="button" class="save addproduct" id="addproduct">Save</button>
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