<?php include("header.php"); 

$id=$_REQUEST['id'];
if(empty($id)){
$id=$_SESSION['SES_ADMIN_ID'];	
}
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();

$uploaddir3="../../upload/";
$check_type="jpg|jpeg|gif|png";
if($act=="edit")
	{

	if(!empty($_FILES['largeimage']['name']))
		{
		$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
				}else{
		$largeimage=$_REQUEST['image3'];
		}
	
	}else{
	
	$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
	
	}
	$password=base64_encode($_POST['password']);

$updatearr=array(	 
					 "adminname"=>$_REQUEST['firstname'],
					 "last_name"=>$_REQUEST['lastname'],	
					 "adminemail"=>$_REQUEST['email'],
					 "adminphone"=>$_REQUEST['userphone'],
					 "usertype"=>$_REQUEST['usertype'],
					 "adminpassword"=>$_POST['password'],
					 "image"=>$largeimage,
					 "admindate"=>date("Y-m-d")
					
						);
						
						/* print_r($updatearr); */
	
	if($act=="edit")
		{
		$whereClause=" id!=".$id." and  adminemail='".$_REQUEST['email']."'";
		}elseif($act=="add"){
		$whereClause=" adminemail='".$_REQUEST['email']."'";
		}
	
	if(matchExists('admin', $whereClause))
		{
			 $errMsg='<br>'.$_REQUEST['email'].' already exist!<br>';
		}else{
			if($act=="edit")
				{
					
					$whereClause=" id=".$id;
					updateData($updatearr, 'admin', $whereClause);
					
					$errMsg='<br><b>Updated Successfully!</b><br>';
				}elseif($act=="add")
					{	 
						$insid=insertData($updatearr, 'admin');
						if($insid>0)
							{
								$errMsg='<br><b>User Added Successfully!</b><br>';							
							}else{
								$errMsg1='<br><b>There is an some error!</b><br>';
							}
					
					}
			
			}		
		
			
	}
$dbn=new DB();
if(!empty($id))
	{
		 $sql="SELECT * FROM admin WHERE id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		
	}
?>


<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li class="active"><a href="#">User</a></li>


                        </ul>

                    </div>

    <style>
	.form-group:last-child {
    margin-bottom: 15px !important;
}
	</style>                

                    <!-- START PAGE CONTAINER -->

    <div class="page_container">

                    <div class="container">

                                                   

                       <div class="row"> 
				<?php if(!empty($errMsg)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> <?=$errMsg?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>

<?php if(!empty($errMsg1)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Error!</strong> <?=$errMsg1?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>
                       <div  class="col-sm-12 verticle_tabs"> 

        <div class="col-xs-12">

            <!-- Tab panes -->
				<form name="frmprod"  method="post" action=""  enctype="multipart/form-data">
						
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="image3" value="<?=$row['image']?>" />
						
            <div class="tab-content">

                <div class="tab-pane active" id="home">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Basic Information</h2>

                                          

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

							  <div class="row">
							  <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-22 control-label" for="name">Name<span class="required">*</span></label>
                                        <div class="col-md-12">
                                        <input id="firstname" name="firstname" type="text" placeholder="Your name" class="form-control" value="<?=$row['adminname']?>" required>
                                        </div>
                                    </div>
							  </div>
							  
							  
							  <div class="col-md-6">                                    <div class="form-group"><label class="col-md-12 control-label" for="name">Last Name</label>                                        <div class="col-md-12">                                        <input id="lastname" name="lastname" type="text" placeholder="Your name" class="form-control" value="<?=$row['last_name']?>">                                        </div>                                    </div>							</div>
							  
							  </div>

							  <div class="row">
							  <div class="col-md-6">
								<div class="form-group">
									<label class="col-md-12 control-label" for="email">Your E-mail<span class="required">*</span></label>
									<div class="col-md-12">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control" value="<?=$row['adminemail']?>" required>
									</div>
								</div>
                               </div>
							   
							   
							    <div class="col-md-6">  
                                   <div class="form-group">
									<label class="col-md-12 control-label" for="email"> Phone No<span class="required">*</span></label>
									<div class="col-md-12">
										  <input name="userphone" placeholder="Your Phone No" type="text" class="form-control" value="<?=$row['adminphone']?>" required/>          
									</div>
								</div>
                              </div> 
							   
							   
							   
							   
							   
							  </div>
							  
							  <div class="row">
							  <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-22 control-label" for="name">User Type<span class="required">*</span></label>
                                        <div class="col-md-12">
                                        <select  name="usertype" id="usertype"  class="form-control" required>

						 <option value="superadmin" <?php if('superadmin' == $row['usertype']){ echo 'selected'; } ?>>Super admin</option>

                        <option value="hotel" <?php if('hotel' == $row['usertype']){ echo 'selected'; } ?>>Hotel </option>
						<option value="product" <?php if('product' == $row['usertype']){ echo 'selected'; } ?>>Product </option>
						<option value="restaurant" <?php if('restaurant' == $row['usertype']){ echo 'selected'; } ?>>Restaurant </option>

                
				   </select>

                                        </div>
                                    </div>
							  </div>
							 
							  <div class="col-md-6">  
                                   <div class="form-group">
									<label class="col-md-12 control-label" for="password"> Password</label>
									<div class="col-md-12">
										  <input name="password" placeholder="Your Password" type="text" class="form-control" value="<?=$row['adminpassword']?>"/>          
									</div>
								</div>
                              </div> 
							 
							 
							 
							 </div>
                             
							  
							  
							  <!--
							  <div class="row">
							 
							   
							    <div class="col-md-6">  
                                   <div class="form-group">
									<label class="col-md-12 control-label" for="email"> Address</label>
									<div class="col-md-12">
										  <input name="address" placeholder="Your Phone No" type="text" class="form-control" value="<?=$profilerow['address']?>"/>          
									</div>
								</div>
                              </div> 
							   
							     <div class="col-md-6">
								<div class="form-group">
									<label class="col-md-12 control-label" for="email">City</label>
									<div class="col-md-12">
										<input id="city" name="city" type="text" placeholder="Your city" class="form-control" value="<?=$profilerow['twon']?>">
									</div>
								</div>
                               </div>
							  
							  </div>
							  
							  -->
							  <div class="row">
							  </div>
							  <div class="row">
							  </div>							  
							
                      <div class="row">
                                    	<div class="form-group">
        									<label class="col-md-12 control-label">  Image</label>
        									<div class="col-md-12">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span> <!-- <?php if($row['image']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewnimage2.php?img=<?=$row['image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>-->
        									 
        									</div>
        								</div>
                                         </div>
                                         
                						


</div>



   </div>

                                <!-- END RECENT -->

<p></p>

                    </div>

                </div>
<p></p>
             

            </div>



             <div class="block ">                            

                             

                            <p class="text-right">

                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>

                                <!--<button class="btn btn-success btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button>-->

<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed" value="Save"  />
                               

                            </p>

                             

                        </div>

</form>

        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>



                        

                    </div> <!-- END PAGE CONTAINER -->

    </div> 




<?php include("footer.php") ?>

	