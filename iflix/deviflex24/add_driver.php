<?php include("header.php"); 
$_TBL_USER='all_user';

$id=$_REQUEST['id'];
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
					 "first_name"=>$_REQUEST['firstname'],
					 "last_name"=>$_REQUEST['lastname'],	
					 "email_id"=>$_REQUEST['email'],
					 "mobile_no"=>$_REQUEST['userphone'],
					 "usertype"=>$_REQUEST['usertype'],
					 "password"=>$password,
					 "joindate"=>date("Y-m-d")
					
						);
	
	if($act=="edit")
		{
		$whereClause=" user_id!=".$_REQUEST['id']." and  email_id='".$_REQUEST['email']."'";
		}elseif($act=="add"){
		$whereClause=" email_id='".$_REQUEST['email']."'";
		}
	
	if(matchExists($_TBL_USER, $whereClause))
		{
			 $errMsg='<br>'.$_REQUEST['email'].' already exist!<br>';
		}else{
			if($act=="edit")
				{
					echo "update user_profile set image_id='".$largeimage."', twon='".$_REQUEST["city"]."', address='".$_REQUEST["address"]."' where user_id='".$_REQUEST["id"]."'";
					$whereClause=" user_id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_USER, $whereClause);
					$db->query("update user_profile set image_id='".$largeimage."', twon='".$_REQUEST["city"]."', address='".$_REQUEST["address"]."' where user_id='".$_REQUEST["id"]."'");
					$errMsg='<br><b>Updated Successfully!</b><br>';
				}elseif($act=="add")
					{	 
						$insid=insertData($updatearr, $_TBL_USER);
						if($insid>0)
							{
								$errMsg='<br><b>User Added Successfully!</b><br>';							
							}
					
					}
			
			}		
		
			
	}
$dbn=new DB();
if(!empty($id))
	{
		$sql="SELECT * FROM $_TBL_USER WHERE user_id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$sqln="select * from user_profile where user_id =".$id;
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
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
						<input type="hidden" name="image3" value="<?=$row['imagepath']?>" />
						
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
                                        <input id="firstname" name="firstname" type="text" placeholder="Your name" class="form-control" value="<?=$row['first_name']?>" required>
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
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control" value="<?=$row['email_id']?>" required>
									</div>
								</div>
                               </div>
							   
							   
							    <div class="col-md-6">  
                                   <div class="form-group">
									<label class="col-md-12 control-label" for="email"> Phone No<span class="required">*</span></label>
									<div class="col-md-12">
										  <input name="userphone" placeholder="Your Phone No" type="text" class="form-control" value="<?=$row['mobile_no']?>" required/>          
									</div>
								</div>
                              </div> 
							   
							   
							   
							   
							   
							  </div>
							  
							  <div class="row">
							  
							 
							  <div class="col-md-6">  
                                   <div class="form-group">
									<label class="col-md-12 control-label" for="password"> Password</label>
									<div class="col-md-12">
										  <input name="password" placeholder="Your Password" type="text" class="form-control" value="<?=base64_decode($profilerow['password'])?>"/>          
									</div>
								</div>
                              </div> 
							 
							 
							 <div class="col-md-6">
                               </div>
							   
							 </div>
                             
							  
							  
							  
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
							  <div class="row">
							  </div>
							  <div class="row">
							  </div>							  
							
                      <div class="row">
                                    	<div class="form-group">
        									<label class="col-md-12 control-label">  Image</label>
        									<div class="col-md-12">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span> <!-- <?php if($row['image_id']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewnimage2.php?img=<?=$row['image_id']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>-->
        									 
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
<!--<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>                  
-->



<?php include("footer.php") ?>

	