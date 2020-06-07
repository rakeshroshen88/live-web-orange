<?php include('header.php');
$bname=$_REQUEST['bname'];

 ?>
<body>
    
    <div class="container">
        

        <section class="profiledirectory"> 
        		 	<div class="compydetails">
<?php $category=$_REQUEST['category'];
$sql="SELECT * FROM business_hub where catid='".$category."' and title like '%$bname%'";
$db->query($sql)or die($db->error());
while($row=$db->fetchArray()){
?>
					
        		 		<div class="row">
        		 			<div class="col-md-4">
        		 				<div class="companyTags">
        		 					<ul>
																		<?php $related_services=$row['related_services'];
										$rdb=new DB();
					 
					// $arrrelated = explode(",", $related_services);
					 $rsql="select * from directory_service where id IN($related_services)";
					 $rdb->query($rsql);
					 while($relrow=$rdb->fetchArray()){ ?>
                            <li><?=$relrow['title']?></li>
                                        <?php }	?>
</ul>
        		 				</div>
        		 			</div>

        		 			<div class="col-md-4">
        		 				<div  class="companylogomimd">
		<a href="business_directory_profile.php?bid=<?=base64_encode($row['id'])?>">
        <?php
		if(!empty($row['logoimage'])){
		?>
        <img src="upload/<?=$row['logoimage']?>" />
		<?php }else{?>
			<img src="img/noimg.jpg" />
		<?php }?></a>
		
        		 				</div>
        		 			</div>


        		 			<div class="col-md-4">
        		 					<div class="classi-box-body bosndetail">
							        <ul>
							            <li>
							                <i aria-hidden="true" class="fa fa-map-marker"></i>
							                 <h4><span> <?=$row['address']?></span><span>, <?=$row['city']?></span><span>, <?=$row['state']?></span><span>, <?=$row['zip_code']?></span><span>, <?=$row['country']?></span></h4>
							            </li>
							            
							           <li><i aria-hidden="true" class="fa fa-phone"></i><a href=""><?=$row['phone_no']?> </a></li>
							            <li><i aria-hidden="true" class="fa fa-envelope-o"></i><a href="mailto:<?=$row['email_id']?>"><?=$row['email_id']?></a></li>
							            <li><i aria-hidden="true" class="fa fa-globe"></i><a href="<?=$row['email_id']?>" target="_blank"><?=$row['website']?> </a></li>
							            <li class="socallisthome-direct">
							                <a href="<?=$row['tumblr']?>" target="_blank"><i aria-hidden="true" class="fa fa-tumblr"></i></a> <a href="<?=$row['twitter']?>" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a> <a href="<?=$row['linkedin']?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin"></i></a>
							                <a href="<?=$row['facebook']?>"><i aria-hidden="true" class="fa fa-facebook" target="_blank"></i></a>



							                <div class="startlink pull-right">
											
											<?php if($row['stars']==1){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==2){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==3){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==4){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==5){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>
							                	
							                </div>
							            </li>
							        </ul>
							    </div>


        		 			</div>
        		 		</div>
						
<?php echo "<hr/>"; } ?>	
						
        		 	</div> 


        	<div class="row">
        				 

        				<div class="col-md-9">
        					<div class="row">
<?php  $sql="SELECT * FROM business_hub where catid='".$category."' limit 0,6";
		$db->query($sql)or die($db->error());
		while($row=$db->fetchArray()){ ?>
        						<div class="col-md-4">
		        					<div class="one-list-home">
									    <div class="boxhead-list">
									        <i aria-hidden="true" class="fa fa-address-book-o"></i>
									        <h5 tabindex="0" ng-reflect-router-link="/,business-directory,business-"><a href="business_directory_profile.php?bid=<?=base64_encode($row['id'])?>"><?=$row['title']?></a></h5>
									        <h6 class="catnames"><?=$row['catid']?></h6>
									    </div>
									    <div class="classi-box-body">
									        <ul>
									            <li>
									                <i aria-hidden="true" class="fa fa-map-marker"></i>
									                 <h4><span> <?=$row['address']?></span><span>, <?=$row['city']?></span><span>, <?=$row['state']?></span><span>, <?=$row['zip_code']?></span><span>, <?=$row['country']?></span></h4>
									            </li>
									            <li><i aria-hidden="true" class="fa fa-phone"></i><a href=""><?=$row['phone_no']?> </a></li>
									            <li><i aria-hidden="true" class="fa fa-envelope-o"></i><a href="mailto:<?=$row['email_id']?>"><?=$row['email_id']?></a></li>
									            <li><i aria-hidden="true" class="fa fa-globe"></i><a href="<?=$row['website']?>" target="_blank"><?=$row['website']?> </a></li>
									            <li class="socallisthome-direct">
 <a href="<?=$row['tumblr']?>" target="_blank"><i aria-hidden="true" class="fa fa-tumblr"></i></a> <a href="<?=$row['twitter']?>" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a> <a href="<?=$row['linkedin']?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin"></i></a>
							                <a href="<?=$row['facebook']?>"><i aria-hidden="true" class="fa fa-facebook" target="_blank"></i></a>



									                <div class="startlink pull-right">
									                	<?php if($row['stars']==1){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==2){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==3){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==4){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==5){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>

									                </div>
									            </li>
									        </ul>
									    </div>
									</div>


		        				</div>



		<?php } ?>		
							
							</div>


        				</div>

        				<div class="col-md-3">
        					<div class="addv">
							<?php $db1=new DB();
								 $sql1="SELECT * FROM slider_add where img_type='hub' and section='businesshub' limit 0,1";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){?>
                                   <a href="<?=$row1['addlink']?>" target="_blank">
                                <img src="slider/<?=$row1['picture']?>"  alt="...">
                                     </a>    
                                   
								 <?php } ?>
									
									</div>


        				</div>

 



        			</div>



	<div class="row">
        				 

        				<div class="col-md-9">
        					<div class="row">
<?php  $sql="SELECT * FROM business_hub where catid='".$category."' limit 6,6";
		$db->query($sql)or die($db->error());
		while($row=$db->fetchArray()){ ?>
        						<div class="col-md-4">
		        					<div class="one-list-home">
									    <div class="boxhead-list">
									        <i aria-hidden="true" class="fa fa-address-book-o"></i>
									        <h5 tabindex="0" ng-reflect-router-link="/,business-directory,business-"><a href="business_directory_profile.php?bid=<?=base64_encode($row['id'])?>"><?=$row['title']?></a></h5>
									        <h6 class="catnames"><?=$row['catid']?></h6>
									    </div>
									    <div class="classi-box-body">
									        <ul>
									            <li>
									                <i aria-hidden="true" class="fa fa-map-marker"></i>
									                 <h4><span> <?=$row['address']?></span><span>, <?=$row['city']?></span><span>, <?=$row['state']?></span><span>, <?=$row['zip_code']?></span><span>, <?=$row['country']?></span></h4>
									            </li>
									            <li><i aria-hidden="true" class="fa fa-phone"></i><a href=""><?=$row['phone_no']?> </a></li>
									            <li><i aria-hidden="true" class="fa fa-envelope-o"></i><a href="mailto:<?=$row['email_id']?>"><?=$row['email_id']?></a></li>
									            <li><i aria-hidden="true" class="fa fa-globe"></i><a href="<?=$row['website']?>" target="_blank"><?=$row['website']?> </a></li>
									            <li class="socallisthome-direct">
 <a href="<?=$row['tumblr']?>" target="_blank"><i aria-hidden="true" class="fa fa-tumblr"></i></a> <a href="<?=$row['twitter']?>" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a> <a href="<?=$row['linkedin']?>" target="_blank"><i aria-hidden="true" class="fa fa-linkedin"></i></a>
							                <a href="<?=$row['facebook']?>"><i aria-hidden="true" class="fa fa-facebook" target="_blank"></i></a>



									                <div class="startlink pull-right">
									                	<?php if($row['stars']==1){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==2){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==3){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==4){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<?php } ?>
							<?php if($row['stars']==5){ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<?php } ?>

									                </div>
									            </li>
									        </ul>
									    </div>
									</div>


		        				</div>



		<?php } ?>		
							
							</div>


        				</div>

        				<div class="col-md-3">
        					<div class="addv">
							<?php $db1=new DB();
								 $sql1="SELECT * FROM slider_add where img_type='hub' and section='businesshub' limit 0,1";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){?>
                                   <a href="<?=$row1['addlink']?>" target="_blank">
                                <img src="slider/<?=$row1['picture']?>"  alt="...">
                                     </a>    
                                   
								 <?php } ?>
									
									</div>


        				</div>

 



        			</div>

		
		</div>
    </div>
	        	
        </section>
    </div>

    <?php include('footer.php') ?>
</body>
