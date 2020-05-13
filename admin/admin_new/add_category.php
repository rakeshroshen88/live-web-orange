<?php include("header.php"); 
$prodid=$_REQUEST['id'];
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
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
	if(!empty($_REQUEST['featured1'])){$f=$_REQUEST['featured1'];}else{$f='no';}
$sdate = date("Y-m-d", strtotime($_REQUEST['sdate']));

$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$catname = mysqli_real_escape_string($link, $_REQUEST['catname']);
$cat_desc = mysqli_real_escape_string($link, $_REQUEST['cat_desc']);
$related = implode(',', $_REQUEST['related']);
if(empty($related) or $related==''){
	$related=0;
}
$updatearr=array(	"catname"=>$catname,					
					"imgid"=>$largeimage,
					"bimg"=>$largeimage1,
					"icon"=>$icon,
					"mobileicon"=>$mobileicon,
					"cat_date"=>date('Y-m-d'),
					"sdate"=>$sdate,
					"featured"=>$f,
					"related_product"=>$related,
					"discount"=>$_REQUEST['discount'],
					"cattype"=>$_REQUEST['cattype'],
					"status"=>$_REQUEST['catstatus']
						);		
						
	if($act=="edit")
		{
		$whereClause=" id!=".$catid." and catname='".$_REQUEST['catname']."'" ;
		}elseif($act=="add"){
		$whereClause="catname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists($_TBL_CAT, $whereClause))
		{
			
			$errMsg1='<br>Category already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$catid;
					updateData($updatearr, $_TBL_CAT, $whereClause);
					$where=" id=".$catid;
					
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_CAT);
					$where=" id=".$insid;
					
					
					if($insid>0){
							 $errMsg='<br><b>Category Added Successfully!</b><br>';
					}else{
						 $errMsg1='<b>There is an issue!</b><br>';
					}
					
				}
			
			
			}
	}
if(!empty($catid) and $act=="edit")
	{
		$sql="SELECT * FROM $_TBL_CAT WHERE id=$catid";
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
                                        <label class="col-md-2 control-label" for="name"> Add As  a</label>
                                        <div class="col-md-10">
                                        <select name="cattype" id="cattype" class="form-control" >
  <option value="">Select</option>
  <option value="Category" <?php if($row['cattype']=='Category'){ echo "selected";}?>>Category</option>
  <option value="Brands" <?php if($row['cattype']=='Brands'){ echo "selected";}?>>Brands</option>
   
  
</select>
                                        </div>
                                    </div>
                                                        
                                                    </div>
<br>
<div class="row">
                                               <div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Category Name <span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="catname" name="catname" type="text" placeholder=" Title" class="form-control" value="<?=$row['catname']?>" required>
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


<!-- <div class="form-group">
        									<label class="col-md-3 control-label"> Select Product (* If requre)</label>
        									<div class="col-md-9">
										<?php
					$rdb=new DB();
					 //$arrrelated=unserialize(stripslashes($row['related_product']));		
						$arrrelated = explode(",", $row['related_product']);
					 $rsql="select * from ".$_TBL_PRODUCT." where prod_status='1'";
					 $rdb->query($rsql);
					 ?>
                   <select name="related[]" style="height:200px;" class="form-control" multiple="multiple" >
                    <?php  $cont=1;
					 while($relrow=$rdb->fetchArray()){
						 $sel=" ";
						
						 for($ir=0;$ir<count($arrrelated);$ir++)
						 	{ 
								if($arrrelated[$ir]==$relrow['id'])
									{
										$sel=" selected";
										break;
									}else{
										$sel=" ";
									}
								
							}
					?>
                    <option value="<?=$relrow['id']?>" <?=$sel?>><?=$cont?> <?=$relrow['prod_name']?></option><?php  $cont=$cont+1; } ?>
                    </select>
                    </div>
        								</div>-->
										
                	<!--	<div class="form-group">
                                        <label class="col-md-3 control-label" for="discount"> Discount % (* If requre)</label>
                                        <div class="col-md-9">
                                        <input id="discount" name="discount" type="text" placeholder="% of discount" class="form-control" value="<?=$row['discount']?>">
                                        </div>
                                    </div>	-->	
									<div class="row">
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="catstatus" type="radio" value="yes" <?php if($row['status']=="yes"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="catstatus" type="radio" value="no" <?php if($row['status']=="no"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
                									</div>
                								</div>
                                        </div>        
                                      <div class="row">
                                        	<div class="form-group">
                									<label class="col-md-3 control-label"> Featured Brands</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="featured1" type="radio" value="no" <?php if($row['featured']=="no"){echo " checked";}?> onclick="myFunction()"/>No
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="featured1" type="radio" value="yes" <?php if($row['featured']=="yes"){echo " checked";}?>  onclick="myFunction()"/>Yes
                    										</label>
                    									</div>
                									</div>
                								</div>
            </div>

			<script type="text/javascript">
          function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
		  </script>
                                      <div class="row">
                                     <div class="form-group" id="myDIV" style="display:none;">
                                        <label class="col-md-3 control-label" for="sdate"> Start date</label>
                                        <div class="col-md-9">
                                        <input id="sdate" name="sdate" type="date" placeholder=" Title" class="form-control" value="<?=$row['sdate']?>">
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

	