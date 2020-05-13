<?php include("header.php"); 
$subid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$makearr1=array();
$makearr1=getValuesArr( 'category', "id","catname","", "" );
$makearr2=array();
$makearr2=getValuesArr( $_TBL_SUBCAT, "id","subcatname","", "" );
$makearr3=array();
$makearr3=getValuesArr( $_TBL_SUBSUBCAT, "id","subsubcatname","", "" );

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
$thirdsubcatname = mysqli_real_escape_string($link, $_REQUEST['catname']);
$cat_desc = mysqli_real_escape_string($link, $_REQUEST['cat_desc']);

$updatearr=array(	 "catid"=>$_REQUEST['category'],
					 "subcatid"=>$_REQUEST['subcategory'],
					 "thirdcatid"=>$_REQUEST['subsubcategory'],
					 "thirdsubcatname"=>$thirdsubcatname,
					"imgid"=>$largeimage,
					"bimg"=>$largeimage1,
					"icon"=>$icon,
					"mobileicon"=>$mobileicon,
					 "thirdcatdate"=>date('Y-m-d'),
					 "thirdstatus"=>$_REQUEST['catstatus']
						);		
					
	if($act=="edit")
		{
		$whereClause=" catid=".$_REQUEST['category']." and subcatid=".$_REQUEST['subcategory']." and thirdcatid=".$_REQUEST['subsubcategory']." and thirdsubcatname='".$_REQUEST['catname']."' and id!=".$_REQUEST['id'] ;
		}elseif($act=="add"){
		$whereClause=" catid=".$_REQUEST['category']." and subcatname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists('4thsubcategory', $whereClause))
		{
			
			$errMsg1='<br>Sub category already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$subid;
					
					updateData($updatearr, '4thsubcategory', $whereClause);
					
					
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, '4thsubcategory');
					
					
					
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
		  $sql="SELECT * FROM 4thsubcategory WHERE id=$subid";
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

                                        <script>
               
				</script>   
				  

                                                

                                                    <div class="row">
													<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Category<span class="required">*</span></label>
                                        <div class="col-md-10">
							<?php 
                             $catid=$row['catid'];
							$sql="SELECT * FROM category WHERE cattype='Category'";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="category" id="category"  class="form-control" required>
						 <option value="0">Select cateory</option>
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" <?php if($row2['id'] == $catid){ echo 'selected'; } ?>><?=$row2['catname']?></option>
                  <?php }?>
				   </select>
                                        </div>
                                    </div>
                                                        
                                                    </div>
<br>

									
									<div class="row">
									<div class="form-group" id="subcatid">
									<?php if($act=="edit"){ ?>
								<?php  $subid=$row['catid'];
							 $sql="SELECT * FROM $_TBL_SUBCAT WHERE catid=$subid";
							$db->query($sql)or die($db->error());
							 if($db->numRows()>0){
								
							 ?>
							  <label class="col-md-2 control-label" for="name">  Sub Category</label>

									  <div class="col-md-10">
									 <select  name="subcategory" id="subcategory" cid="<?=$subid?>" class="form-control">
													<option value="0">Select subcateory</option><?php
									while($row1=$db->fetchArray()){
									if($row1['id']==$row['subcatid']){ $select1='selected';}
								?>
		
                        <option value="<?=$row1['id']?>" <?=$select1?>><?=$row1['subcatname']?></option>
						  <?php }?>
						   </select>
						</div>
						 <?php } ?>
						 	<?php } ?>
                                    </div><br></div>
								
									
									
  <div class="row">
									<div class="form-group" id="subsubcatid">
									<?php if($act=="edit"){ ?>
								<?php  $cid=$row['catid'];
									 $subcatid=$row['subcatid'];
							   $sql="SELECT * FROM $_TBL_SUBSUBCAT WHERE catid=$cid and subcatid=$subcatid";
							$db->query($sql)or die($db->error());
							 if($db->numRows()>0){
								
							 ?>
							  <label class="col-md-2 control-label" for="name">  Ternary Category</label>

									  <div class="col-md-10">
									  <select  name="subsubcategory" id="subsubcategory" cid="<?=$cid?>" sid="<?=$subcatid?>" class="form-control">
                        <option value="0">Select subcateory</option><?php
		while($row1=$db->fetchArray()){ echo $row['subsubcatid']; echo $row1['id'];
		 
		?>
		
                        <option value="<?=$row1['id']?>" <?php  if($row1['id']==$row['thirdcatid']){ echo $select2='selected';} ?> ><?=$row1['subsubcatname']?></option>
                  <?php }?>
				   </select>

						</div>
						 <?php } ?>
						 	<?php } ?>
                                    </div><br></div>
								
									

                                   
									
									
												<div class="row">
                                               <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">4th category Name:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="catname" name="catname" type="text" placeholder=" Subcategory Name:" class="form-control" value="<?=$row['thirdsubcatname']?>" required>
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
                                                <input type="file" name="icon" id="icon"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['icon']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['icon']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
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
                    												<input name="catstatus" type="radio" value="1" <?php if($row['thirdstatus']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="catstatus" type="radio" value="0" <?php if($row['thirdstatus']=="0"){echo " checked";}?>/>Deactive
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
<script>
    $("#category").change(function() {
  var str=$(this).val();
	

	var social_AjaxURL='//orangestate.ng/admin/pages/ajax_subcat.php';
        var dataString ='subcatid='+str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#subcatid').html(response);
                }else{
                
                }
            },
        });
});
           
jQuery(document).on("change","#subcategory",function(){

 var cid1 = jQuery(this).attr('cid');	
  var str=$(this).val();
  
  var cid = jQuery('#category').val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajax_2nd.php';
        var dataString ="subcatid=" + str + '&cid=' + cid ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#subsubcatid').html(response);
                }else{
                
                }
            },
        });
});
		   
		   
				</script>   

<?php include("footer.php") ?>

	