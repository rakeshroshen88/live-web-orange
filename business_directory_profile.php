<?php include('header.php');
$sql="SELECT * FROM business_hub where id=".base64_decode($_REQUEST['bid']);

$db->query($sql)or die($db->error());
$row=$db->fetchArray();

$errMsg="";
if(isset($_REQUEST['submit']) and $_REQUEST['submit']=='Send' )
{
     $evtstr='<table class="table_full editable-bg-color bg_color_e6e6e6 editable-bg-image" bgcolor="#e6e6e6" width="100%" align="center" mc:repeatable="castellab" mc:variant="Header" cellspacing="0" cellpadding="0" border="0">
	
	<tbody><tr><td height="70"></td></tr>
	<tr>
		<td>
			
			<table class="table1 editable-bg-color bg_color_303f9f" bgcolor="orange" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
				
				<tbody><tr><td height="25"></td></tr>
				<tr>
					<td>
						
						<table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
							<tbody><tr>
								<td>
									
									<table width="50%" align="left" border="0" cellspacing="0" cellpadding="0">
										<tbody><tr>
											<td align="left" class="editable-img">
												<a href="#">
													<img editable="true" mc:edit="image007" src="https://orangestate.ng/images/logo.png" width="68" style="display:block; line-height:0; font-size:0; border:0;" border="0" alt="logo">
												</a>
											</td>
										</tr>
										<tr><td height="22"></td></tr>
									</tbody></table>

									<table width="50%" align="right" border="0" cellspacing="0" cellpadding="0">
									
										<tbody><tr><td height="3"></td></tr>
										<tr>
											<td align="right">
												
											</td>
										</tr>
									</tbody></table>

								</td>
							</tr>

							
							<tr><td height="60"></td></tr>

							<tr>
								<td align="center">
									<div class="editable-img">
									
									</div>
								</td>
							</tr>

							
							<tr><td height="40"></td></tr>

							<tr>
								<td mc:edit="text009" align="center" class="text_color_ffffff" style="color: #ffffff; font-size: 30px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												Retrive Query
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="30"></td></tr>

							<tr>
								<td mc:edit="text010" align="center" class="text_color_ffffff" style="color: #ffffff; font-size: 12px; font-weight: 300; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												'.date('l').', '.date('d-m-Y').'
											</multiline>
										</span>
									</div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
				
				<tr><td height="104"></td></tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td>
			
			<table class="table1 editable-bg-color bg_color_ffffff" bgcolor="#ffffff" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
	
				<tbody><tr><td height="60"></td></tr>

				<tr>
					<td>
						
						<table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">

							<tbody><tr>
								<td mc:edit="text011" align="left" class="center_content text_color_282828" style="color: #282828; font-size: 20px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												Hi '.$_POST['firstname'].',
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="10"></td></tr>

							<tr>
								<td mc:edit="text012" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td mc:edit="text013" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												Below the Query Details
											</multiline>
										</span>';
									$evtstr1='</div>
								</td>
							</tr>

						
							

							<tr>
								<td mc:edit="text014" align="left" class="center_content" style="font-size: 14px; line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td mc:edit="text016" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												Thanks
											</multiline>
										</span>
									</div>
								</td>
							</tr>
							
							<tr><td height="5"></td></tr>

							<tr>
								<td mc:edit="text017" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												OrangeState team
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td mc:edit="text018" align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
											Any questions? Get in touch by <a href="https://orangestate.ng/contact-us.php" target="_blank" class="text_color_303f9f" style="color:#303f9f; text-decoration: none;">&nbsp; Email &nbsp; </a> 
											</multiline>
										</span>
									</div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>

				
				<tr><td height="60"></td></tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td>
			
			<table class="table1" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
				
				<tbody><tr><td height="40"></td></tr>

			
				
				<tr><td height="70"></td></tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>';
									$to=$_POST['email'];
                                    $from = "support@orangestate.ng";
                                    $subject=$_POST['subject'];
									$msg.='<br>comment: '.$_POST['comment'].'<br>';
									
									  $message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);

					//echo"<script>alert('Your Password has been successfully Sent to Your E-mail! ')</script>";
						$err='Your Query has been sent!';
}else{ $err= "Email address does not exit!";}

 ?>
<body>
    
    <div class="container">
        

        <section class="profiledirectory"> 
        		 	<div class="compydetails">
        		 		<div class="row">
        		 			<div class="col-md-4">
        		 				<div class="companyTags"><ul>
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
        <?php
		if(!empty($row['logoimage'])){
		?>
        <img src="upload/<?=$row['logoimage']?>" />
		<?php }else{?>
			<img src="img/noimg.jpg" />
		<?php }?>
		
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
        		 	</div> 


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                         

                        <div class="row">
                            <div class="col-12">
							<?php if(!empty($err)){?><h5><?=$err?></h5><?php } ?>
                                <ul class="nav nav-tabs mb-4 busiensstabingnav " id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Product & Services</a>
                                    </li>
									 <li class="nav-item">
                                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Vision-tab" data-toggle="tab" href="#Vision" role="tab" aria-controls="Vision" aria-selected="false">Vision</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="Mission-tab" data-toggle="tab" href="#Mission" role="tab" aria-controls="Mission" aria-selected="false">Mission</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" id="Contact_Us-tab" data-toggle="tab" href="#Contact_Us" role="tab" aria-controls="Contact_Us" aria-selected="false">Contact Us</a>
                                    </li>


                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        <div class="row">
										<?php $related_services=$row['related_services'];
										
					 
					// $arrrelated = explode(",", $related_services);
					 $rsql="select * from directory_service where id IN($related_services)";
					 $rdb->query($rsql);
					 while($relrow=$rdb->fetchArray()){
										?>
                                        	<div class="col-md-2">
                                        		<div class="produimg1">
                                        			<a href="">
													<?php if(!empty($relrow['imgid'])){
		?><img src="upload/<?=$relrow['imgid']?>" />
		<?php }else{?>
			<img src="img/noimg.jpg" />
		<?php }?>
                                        				
                                        				<h5><?=$relrow['title']?> </h5>
                                        			</a>

                                        		</div>

                                        	</div>


                                        <?php }	?>


                                        </div>

                                        

                                    </div>
									
									 <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                    	 <div class="row">
											<div class="col-md-7 col-sm-6">
												<div class="about-title clearfix">
													<?=$row['details']?>
												</div>
											</div>
											 	
					                    </div>


                                    </div>

									
                                    <div class="tab-pane fade" id="Mission" role="tabpanel" aria-labelledby="Mission-tab">
                                        <div class="aboutus">
                                        	  <div class="row">
						<div class="col-md-7 col-sm-6">
							<div class="about-title clearfix">
								<?=$row['mission']?>
						 
							</div>
						</div>
						 	
                    </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="Vision" role="tabpanel" aria-labelledby="Vision-tab">
                                    	 <div class="row">
											<div class="col-md-7 col-sm-6">
												<div class="about-title clearfix">
													<?=$row['vision']?>
												</div>
											</div>
											 	
					                    </div>


                                    </div>

                                    <div class="tab-pane fade" id="Contact_Us" role="tabpanel" aria-labelledby="Contact_Us-tab">
									<form method="post" action="">
                                    		<div class="col-md-8">
                                    		<div class="busi_contact">
                                    			<div class="row">
						                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
						                                    <input class="form-control" name="firstname" placeholder="Firstname" type="text" required autofocus />
						                                </div>
						                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
						                                    <input class="form-control" name="lastname" placeholder="Lastname" type="text" required />
						                                </div>
						                            </div>
						                            <div class="row">
						                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
						                                    <input class="form-control" name="email" placeholder="E-mail" type="text" required />
						                                </div>
						                            </div>
						                            <div class="row">
						                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
						                                    <input class="form-control" name="subject" placeholder="Subject" type="text" required />
						                                </div>
						                            </div>
						                            <div class="row">
						                                <div class="col-lg-12 col-md-12 col-sm-12">
						                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="comment" required></textarea>
						                                </div>
						                            </div>

						                            <div class="row">
						                                <div class="col-lg-12 col-md-12 col-sm-12">
						                                	<br>
						                                    <input type="submit" class="btn btn-success" value="Send" name="submit"/>
						                                <!--<span class="glyphicon glyphicon-ok"></span>-->
						                           			<input type="reset" class="btn btn-danger" value="Clear" />
						                                </div>
						                            </div>

						                        </div>  
						                         
                                    		</div>
									</form>				
										</div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
	        	
        </section>
    </div>

    <?php include('footer.php') ?>
</body>
