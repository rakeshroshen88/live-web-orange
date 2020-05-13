<?php include("header.php"); 
$subid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$makearr1=array();
$makearr1=getValuesArr( 'category', "id","catname","", "" );
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir3="../../category/";
$check_type="jpg|jpeg|gif|png";
if($act=="edit")
	{
	if(!empty($_FILES['icon']['name']))
		{
		$icon=$up->upload_file($uploaddir3,"icon",true,true,0,$check_type);		
		}else{
		$icon=$_REQUEST['icon1'];
		}	
	}else{	
	$icon=$up->upload_file($uploaddir3,"icon",true,true,0,$check_type);
	}

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
if($act=="edit")
	{
	if(!empty($_FILES['largeimage1']['name']))
		{
		$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type);
		}else{
		$largeimage1=$_REQUEST['image4'];
		}	
	}else{	
	$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type);
	}	
	if($act=="edit")
	{
	if(!empty($_FILES['mobileicon']['name']))
		{
		$mobileicon=$up->upload_file($uploaddir3,"mobileicon",true,true,0,$check_type);
		}else{
		$mobileicon=$_REQUEST['image5'];
		}	
	}else{	
	$mobileicon=$up->upload_file($uploaddir3,"mobileicon",true,true,0,$check_type);
	}
	

$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$subcatname = mysqli_real_escape_string($link, $_REQUEST['catname']);
$cat_desc = mysqli_real_escape_string($link, $_REQUEST['cat_desc']);

$updatearr=array(	 "catid"=>$_REQUEST['category'],
					 "subcatname"=>$subcatname,
					"imgid"=>$largeimage,
					"bimg"=>$largeimage1,
					"icon"=>$icon,
					"mobileicon"=>$mobileicon,
					 "subcatdate"=>date('Y-m-d'),
					 "sub_status"=>$_REQUEST['catstatus']
						);		
					
	if($act=="edit")
		{
		$whereClause=" catid=".$_REQUEST['category']." and subcatname='".$_REQUEST['catname']."' and id!=".$_REQUEST['id'] ;
		}elseif($act=="add"){
		$whereClause=" catid=".$_REQUEST['category']." and subcatname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists($_TBL_SUBCAT, $whereClause))
		{
			
			$errMsg1='<br>Sub category already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$subid;
					updateData($updatearr, $_TBL_SUBCAT, $whereClause);
					
					
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_SUBCAT);
					
					
					
					if($insid>0){
							 $errMsg='<br><b>Subcategory Added Successfully!</b><br>';
					}else{
						 $errMsg1='<b>There is an issue!</b><br>';
					}
					
				}
			
			
			}
	}
if(!empty($subid) and $act=="edit")
	{
		  $sql="SELECT * FROM $_TBL_SUBCAT WHERE id=$subid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Product</a></li>

                            <li class="active">Category</li>

                        </ul>

                    </div>

                    

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
						
						<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						 <input type="hidden" name="image4" value="<?=$row['bimg']?>" />
                        <input type="hidden" name="image3" value="<?=$row['imgid']?>" />
						<input type="hidden" name="icon1" value="<?=$row['icon']?>" />
						<input type="hidden" name="image5" value="<?=$row['mobileicon']?>" />
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
													<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Category<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control"')?>  
                                        </div>
                                    </div>
                                                        
                                                    </div>
<br>
<div class="row">
                                               <div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Subcategory Name:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="catname" name="catname" type="text" placeholder=" Subcategory Name:" class="form-control" value="<?=$row['subcatname']?>" required>
                                        </div>
                                    </div>
	</div>						
                      


<div class="row">
<div class="form-group">
        									<label class="col-md-2 control-label"> Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imgid']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['imgid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
</div>  
  <div class="row">
                                         	<div class="form-group">
        									<label class="col-md-2 control-label"> Banner Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage1" id="largeimage1"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['bimg']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['bimg']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                							</div>
                                         <div class="row">
										 <div class="form-group">
        									<label class="col-md-2 control-label"> Icon</label>
        									<div class="col-md-10">
                                                <input type="file" name="icon" id="icon"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['icon']){?><a href="javascript:void(0)" onclick="javascript:window.open('..viewaimage.php?img=<?=$row['icon']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
										</div>
										<div class="row">
										 <div class="form-group">
        									<label class="col-md-2 control-label"> Mobile Icon</label>
        									<div class="col-md-10">
                                                <input type="file" name="mobileicon" id="mobileicon"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['mobileicon']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['mobileicon']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
										</div>

	<div class="row">
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="catstatus" type="radio" value="1" <?php if($row['sub_status']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="catstatus" type="radio" value="0" <?php if($row['sub_status']=="0"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
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
<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>                  

<?php include("footer.php") ?>

	