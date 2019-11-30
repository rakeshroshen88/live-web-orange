<?php include( 'config.inc.php');
	  include( 'chksession.php');
	   $pricelowtohigh=$_POST['pricelowtohigh'];
	   $min=$_POST['min'];
	   $max=$_POST['max'];
						if(!empty($_POST['pricelowtohigh'])  and empty($min) and empty($max)){
						   $sql="SELECT * from ".$_TBL_PRODUCT." order by prod_sprice $pricelowtohigh";//." where catid='".$catid1."' and subcatid='$subid1' and subsubcatid='$subsubid' order by id desc";
						}elseif(!empty($_POST['pricelowtohigh'])  and !empty($min) and !empty($max)){
						    $sql="SELECT * from ".$_TBL_PRODUCT." where prod_sprice BETWEEN $min AND $max order by prod_sprice $pricelowtohigh";
						
							}elseif(empty($_POST['pricelowtohigh'])  and !empty($min) and empty($max)){
						     $sql="SELECT * from ".$_TBL_PRODUCT." where prod_sprice >= $min order by prod_sprice $pricelowtohigh";
						   }elseif(empty($_POST['pricelowtohigh'])  and !empty($min) and !empty($max)){
						     $sql="SELECT * from ".$_TBL_PRODUCT." where prod_sprice BETWEEN $min AND $max ";
						   
						    }elseif(empty($_POST['pricelowtohigh'])  and empty($min) and !empty($max)){
						     $sql="SELECT * from ".$_TBL_PRODUCT." where prod_sprice <= $max ";
						}						
						else{
							  $sql="SELECT * from ".$_TBL_PRODUCT;
							
						}
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){
						//echo timeago($row['prod_date']);
						$path=$row['prod_large_image'];
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$row['prod_price'];
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];
						$mrp=number_format($row['prod_price'],2);
						$s=number_format($discount,2);
						$sp=number_format($row['prod_sprice'],2);
						$dt=timeago($row['prod_date']);
						echo '<li class="bbe45_3oExY _22339_3gQb9">
												    <div>
												        <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">'.$s.'% Off</span>
												            <div class="_7e903_3FsI6">
												                <a href="product-details.php?pid='.$goid.'" pid="<'.$row['id'].'">
												                    <picture>
												                           <img   class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="'.$_SITE_PATH.'product/'.$path.'" alt="'.$row['prod_name'].'"></picture>
												                </a>
												                 
												            </div>
												            <div class="_4941f_1HCZm">
												                <a href="product-details.php?pid='.$goid.'">
												                    <div class="af885_1iPzH">
												                        <h3>'.$row['prod_name'].'</h3></div>
												                    <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>'.$sp.'</span><span class="f6eb3_1MyTu"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>'.$mrp.'</span>
												                    </div>
												                </a>
												                <form action="/cart/overview" method="POST">
												                    <input name="action_type" type="hidden" value="add_to_cart">
												                    <input name="product_sku" type="hidden" value="4522359">
												                    <input name="product_qty" type="hidden" value="1">
												                    <input name="product_price" type="hidden" value="78500">
												                    <input name="product_type" type="hidden" value="simple"><span class="_7cc7b_23GsY">Sold by  <a href="/merchant/konga-store">konga</a></span>
												                    <div class="_09e22_1ojNd"><span class="_13ef4_vzqNh">Posted</span><span class="_13ef4_vzqNh">'.$row['sort-detail'].' '.$dt.'</span></div>
												                    <div class="ccc19_2IYt0">
						<div>';
						if($row['start']=='1'){ echo "<i class='fas fa-star'></i>";}
						
						 if($row['start']=='2'){ echo "<i class='fas fa-star'></i>";}
						
						if($row['start']=='3'){ echo "<i class='fas fa-star'></i>";}

						echo '</div>
												                    </div>
												                     
												                    <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
												                        <button class="_0a08a_3czMG addtocartnew1" type="button" pid="'.$row['id'].'">Add To Cart</button>
												                    </div>
												                </form>
												            </div>
												        </div>
												    </div>
												</li>';
											 
									
									
									
									
						$goid=''; }}else{ echo "Result Not Found!";}
die;
						?>