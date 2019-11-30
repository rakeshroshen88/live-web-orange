<?php include("config.inc.php");
 $pid=$_REQUEST['id'];
						
   $sql="SELECT * from ".$_TBL_PROD1." where id='$pid'";
	$db->query($sql);
	if($db->numRows()>0)
		{
	$row=$db->fetchArray();
		}
	$catname=$db->getSingleResult('select catname from category where id='.$row['catid']);
	
	$userspath=$db->getSingleResult('select image_id from user_profile where user_id='.$row['userid']);
	 $path=$row['prod_large_image'];	 
	 $goid=base64_encode($row['id']);
echo '
	<div class="overview-edit">
		<div class="prodocut-pup-details">
			<div class="row">
				<div class="col-md-7">
					<div class="pupp">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="product/'.$path.'" class="d-block w-100" alt="...">
								</div>';
								//$time=timeago($row['prod_date']);
								//$jtime=timeago($joindate);
								$price=number_format($row['prod_sprice'],2);
								 $dbt=new DB;
$sqlt="select * from productimage where pid='".$row['id']."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		
	while($rowt=$dbt->fetchArray()){
		$pathslider=$rowt['imgid'];
		
								echo '<div class="carousel-item">
									<img src="product/'.$pathslider.'" class="d-block w-100" alt="...">
								</div>';
	}} 
							echo '</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>  <span class="sr-only">Previous</span> 
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>  <span class="sr-only">Next</span> 
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="product-pup-detailss">
						<ul>
							<li><a href="">ALl Products</a>
							</li>
							<li><a href="">'.$row['prod_name'].'</a>
							</li>
						</ul>
						<h3 class="prodcutname">'.$catname.'</h3>
						
						<div class="prdcutprice">
							<h2 class="prodcfprice"> $ '.$price.'</h2>
							<h3 class="prodcttype">Material: '.$row['material'].'</h3>
							<h3 class="prodcttype">Size: '.$row['prodsize1'].'</h3>
							<h3 class="prodcttype">'.$row['sort_detail'].'</h3>
							
						</div>
						<div class="slelect-dteails">
							<h2>Seller Information</h2>
							<div class="post_topbar">
								<div class="usy-dt">';
								if($userspath=='' and empty($userspath)){
									echo '<img src="noimage.jpg" alt="">';
								}else{
									echo '<img src="upload/<?=$userspath?>" alt="" height="50" width="50">';
								}
									
									
									echo '<div class="usy-name">
										<h3>'.$_SESSION['sess_name'].'</h3>
										
									</div>
								</div>
							</div>
						</div>
						<div class="add-poup">
							<button class="add-pupp-btn addtocart" pid='.$row['id'].'>Buy Now</button>
							
						</div>
					</div>
				</div>
			</div>
		</div> <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div>
</div>';
									