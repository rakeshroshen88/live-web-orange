<?php include("header.php");
$_TBL_PROD1="product";
$makearr1=array();
$makearr1=getValuesArr( $_TBL_CAT, "id","catname","", "" );
$makearr3=array();
$makearr3=getValuesArr( $_TBL_SUBSUBCAT, "id","subsubcatname","", "" );
$makearr2=array();
$makearr2=getValuesArr( $_TBL_SUBCAT, "id","subcatname","", "" );
$db1=new DB();
$prodid=$_REQUEST['id'];
if(empty($prodid)){ $prodid=0; }
$act=$_REQUEST['act'];
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_PROD1 WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
	
	
if($_POST['Submit']=="Save & Next")
{

	
$up=new UPLOAD();
$uploaddir="../../product/";
$uploaddir1="../../product/medium/";
$uploaddir2="../../product/small/";
$target_dir = "../../product/";
$target_file = $target_dir . $rnd.basename($_FILES["largeimage"]["name"]);
$ppath='';
$check_type="jpg|jpeg|gif|png";
$rnd=round();
 if($act=="edit")
	{
	
	if(!empty($_FILES['largeimage']['name']))
		{
		//$largeimage=$up->upload_file($uploaddir,"largeimage",true,true,0,$check_type);
		$largeimage=move_uploaded_file($_FILES["largeimage"]["tmp_name"], $target_file);
       $ppath=$rnd.basename($_FILES["largeimage"]["name"]);
		
		}else{
		$largeimage=$_REQUEST['mainimage_edit'];
		$ppath=$_REQUEST['mainimage_edit'];
		}
	
	}else{	
	//$largeimage=$up->upload_file($uploaddir,"largeimage",true,true,0,$check_type);
		$largeimage=move_uploaded_file($_FILES["largeimage"]["tmp_name"], $target_file);
	$ppath=$rnd.basename($_FILES["largeimage"]["name"]);
	}
	
////////////////////////////////////////////

$uploadedFiles = array();
$uploadedFiles1 = array();
$extension = array("jpeg","jpg","png","gif");
$bytes = 1024;
$KB = 1024;
$totalBytes = $bytes * $KB;

$UploadFolder = "../../product/small";
 
$counter = 0;
$counter1 = 0;
foreach($_FILES["input_array_file"]["tmp_name"] as $key=>$tmp_name){
    $temp = $_FILES["input_array_file"]["tmp_name"][$key];
    $name = $_FILES["input_array_file"]["name"][$key];
     
    if(empty($temp))
    {
        break;
    }
     
    $counter++;
    $UploadOk = true;     
  
     
    if($UploadOk == true){
        move_uploaded_file($temp,$UploadFolder."/".$name);
        array_push($uploadedFiles, $name);
    }
}
$array_valuesfilenew=implode(",",$uploadedFiles);
///////////////////////////////////////////////
foreach($_FILES["input_array_file1"]["tmp_name"] as $key=>$tmp_name){
    $temp1 = $_FILES["input_array_file1"]["tmp_name"][$key];
    $name1 = $_FILES["input_array_file1"]["name"][$key];
     
    if(empty($temp1))
    {
        break;
    }
     
    $counter1++;
    $UploadOk1 = true;     
  
     
    if($UploadOk1 == true){
        move_uploaded_file($temp1,$UploadFolder."/".$name1);
        array_push($uploadedFiles1, $name1);
    }
}
$array_valuesfilenew1=implode(",",$uploadedFiles1);
///////////////////////////////////////////////

//echo "<script>alert('".$array_valuesfilenew."');</script>";
////////////////////////////////////////////
	
$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$prod_detail = mysqli_real_escape_string($link, $_REQUEST['prod_desc']);
$prodname = mysqli_real_escape_string($link, $_REQUEST['prodname']);
$sort_detail = mysqli_real_escape_string($link, $_REQUEST['sort_detail']);
$shipping = mysqli_real_escape_string($link, $_REQUEST['shipping']);
$warranty = mysqli_real_escape_string($link, $_REQUEST['warranty']);
$return = mysqli_real_escape_string($link, $_REQUEST['return-policy']);
$manufacturer = mysqli_real_escape_string($link, $_REQUEST['manufacturer']);
$material = mysqli_real_escape_string($link, $_REQUEST['material']);
//$prod_detail=$_REQUEST['prod_desc'];
$array_values=array();
if (isset($_POST["input_array_name"]) && is_array($_POST["input_array_name"])){ 
	$input_array_name = array_filter($_POST["input_array_name"]); 
    foreach($input_array_name as $field_value){
        $array_values[]= $field_value;
    }
}
$array_values2=implode(",",$array_values);

$array_values1=array();
if (isset($_POST["input_array_size"]) && is_array($_POST["input_array_size"])){ 
	$input_array_size = array_filter($_POST["input_array_size"]); 
    foreach($input_array_size as $field_value1){
        $array_values1[]= $field_value1;
    }
}
$array_values3=implode(",",$array_values1);

$array_valuesq=array();
if (isset($_POST["input_array_qtn"]) && is_array($_POST["input_array_qtn"])){ 
	$input_array_qtn = array_filter($_POST["input_array_qtn"]); 
    foreach($input_array_qtn as $field_valueq){
        $array_valuesq[]= $field_valueq;
    }
}
$array_valuesqunt=implode(",",$array_valuesq);


$array_valuestype=array();
if (isset($_POST["input_array_type"]) && is_array($_POST["input_array_type"])){ 
	$input_array_type = array_filter($_POST["input_array_type"]); 
    foreach($input_array_type as $field_valuetype){
        $array_valuestype[]= $field_valuetype;
    }
}
$array_valuestypenew=implode(",",$array_valuestype);



$array_valuescap=array();
if (isset($_POST["input_array_capacity"]) && is_array($_POST["input_array_capacity"])){ 
	$input_array_capacity = array_filter($_POST["input_array_capacity"]); 
    foreach($input_array_capacity as $field_valuecap){
        $array_valuescap[]= $field_valuecap;
    }
}
$array_valuescapnew=implode(",",$array_valuescap);



if(!empty($_REQUEST['category'])){
	$cid=$_REQUEST['category'];
}else{
	$cid=0;
}

if(!empty($_REQUEST['subcategory'])){
	$sid=$_REQUEST['subcategory'];
}else{
	$sid=0;
}

if(!empty($_REQUEST['subsubcategory'])){
	$ssid=$_REQUEST['subsubcategory'];
}else{
	$ssid=0;
}

if(!empty($_REQUEST['4thcatgory'])){
	$sssid=$_REQUEST['4thcatgory'];
}else{
	$sssid=0;
}

$updatearr=array(	 
				 	 "catid"=>$cid,									 
					 "prod_sku"=>$_REQUEST['sku'],
					 "subcatid"=>$sid,
					 "subsubcatid"=>$ssid,
					 "4thcatid"=>$sssid,
					 "userid"=>0,		
					 "weight"=>$_REQUEST['weight'],
					 "manufacturer"=>$manufacturer,
					 "country"=>$_REQUEST['country'],
					 "tax"=>$_REQUEST['tax'],
					 "prod_name"=>$prodname,					
					 "prod_price"=>$_REQUEST['prodprice'],
					 "prod_detail"=>$prod_detail,					
					 "shipping"=>$shipping,
					 "warranty"=>$warranty,		
					 "rpolicy"=>$return,						 
					 "prod_large_image"=>$_REQUEST['pimage'],						
					 "prod_sprice"=>$_REQUEST['sprodprice'],
					 "brandname"=>$_REQUEST['brandname'],
					 "prod_date"=>date('Y-m-d h:i:s'),
					 "prod_status"=>$_REQUEST['pstatus'],
					 "material"=>$material,					 
					 "newrelease"=>$_REQUEST['newrelease'],	
					 "populer"=>$_REQUEST['populer'],	
					 "shippingcharge"=>$_REQUEST['shippingcharge'],
					 "sort_detail"=>$sort_detail,
					 "featured"=>$_REQUEST['featured'],
					 "star"=>$_REQUEST['star'],
					  "discount"=>$_REQUEST['discount']
					 
				 );
		
if($act=="edit")
		{
		 $whereClause=" id!=".$_REQUEST['id']." and prod_sku=".$_REQUEST['sku'];
		}elseif($act=="add"){
			
		 $whereClause=" prod_sku=".$_REQUEST['sku'] ;
		}
	if(matchExists($_TBL_PROD1, $whereClause))
		{
			
			$errMsg='<br>This Product SKU ID is already exist!<br>';
			
		}else{
		
				
			if($act=="edit")
				{ 
				    $whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_PROD1, $whereClause);
					$where=" id=".$_REQUEST['id'];
					$sql="UPDATE productimage SET pid='".$_REQUEST['id']."' WHERE pid='".$_SESSION['picid']."'";
					$db->query($sql);
					
					////////////////////////
				$array_valuesid=array();
				if (isset($_POST["input_array_id"]) && is_array($_POST["input_array_id"])){ 
					$input_array_id = array_filter($_POST["input_array_id"]); 
					foreach($input_array_id as $field_valueid){
						$array_valuesid[]= $field_valueid;
					}
				}
				$array_valuesids=implode(",",$array_valuesid);
				
				$arrayimg=array();
				if (isset($_POST["input_imgid"]) && is_array($_POST["input_imgid"])){ 
					$input_imgid = array_filter($_POST["input_imgid"]); 
					foreach($input_imgid as $field_img){
						$arrayimg[]= $field_img;
					}
				}
				$arrayimgids=implode(",",$arrayimg);
				//////////////////////////////////
				$arrayimg1=array();
				if (isset($_POST["input_imgid1"]) && is_array($_POST["input_imgid1"])){ 
					$input_imgid1 = array_filter($_POST["input_imgid1"]); 
					foreach($input_imgid1 as $field_img1){
						$arrayimg1[]= $field_img1;
					}
				}
				$arrayimgids1=implode(",",$arrayimg1);
				//////////////////////////////////
				
				$array_update=explode(",",$arrayimgids);
				$array_update1=explode(",",$arrayimgids1);
				$array_image=explode(",",$array_valuesfilenew);
				$array_image1=explode(",",$array_valuesfilenew1);
				
				$colornew=explode(",",$array_values2);
				$sizenew=explode(",",$array_values3);
				$quantitynew=explode(",",$array_valuesqunt);
				$array_valuescapnew1=explode(",",$array_valuescapnew);
				$array_valuestypenew1=explode(",",$array_valuestypenew);
				$array_valuesidsnew=explode(",",$array_valuesids);
				$quantitycount=count($quantitynew);
				$prodid=$_REQUEST['id'];
				/* $sql="DELETE FROM prodattributes WHERE prodid='$prodid'";
				$db->query($sql); */
				for($i=0;$i<$quantitycount;$i++){
					if(!empty($array_image[$i])){ $img=$array_image[$i]; }else{ $img=$array_update[$i]; }
					if(!empty($array_image1[$i])){ $img1=$array_image1[$i]; }else{ $img1=$array_update1[$i]; }
					$updatearrnew=array(
					"prodid"=>$prodid,
					"prodcolor"=>$colornew[$i],
					 "prodsize"=>$sizenew[$i],
					  "prodcapacity"=>$array_valuescapnew1[$i],
					  "prodprice"=>$array_valuestypenew1[$i],
					 "prodquantity"=>$quantitynew[$i],					 
					 "image_id"=>$img,
					 "thumbnail"=>$img1
					);

					$whereClausenew=" id=".$array_valuesidsnew[$i];
					if(!empty($array_valuesidsnew[$i])){
					updateData($updatearrnew, 'prodattributes', $whereClausenew);
					}else{					
					$insidq=insertData($updatearrnew, 'prodattributes');		
					}
				}
					
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){		

					$insid=insertData($updatearr, $_TBL_PROD1);
				
					
					if($insid>0)
						{
				$sql="UPDATE productimage SET pid='".$insid."' WHERE pid='".$_SESSION['picid']."'";
					$db->query($sql);
				$errMsg='<b>Product Added Successfully!</b>';
				$array_image=explode(",",$array_valuesfilenew);
				$colornew=explode(",",$array_values2);
				$sizenew=explode(",",$array_values3);
				$quantitynew=explode(",",$array_valuesqunt);	
				$array_valuescapnew1=explode(",",$array_valuescapnew);
				$array_valuestypenew1=explode(",",$array_valuestypenew);
				$array_image1=explode(",",$array_valuesfilenew1);
				//$clrcount=count($colornew);
				$quantitycount=count($quantitynew);
				//$prodid=$_REQUEST['id'];
				for($i=0;$i<$quantitycount;$i++){
					if(!empty($array_image[$i])){ $img=$array_image[$i]; }else{ $img=$array_update[$i]; }
					if(!empty($array_image1[$i])){ $img1=$array_image1[$i]; }else{ $img1=$array_update1[$i]; }
					$updatearr11=array(
					"prodid"=>$insid,
					"prodcolor"=>$colornew[$i],
					 "prodsize"=>$sizenew[$i],
					 "prodquantity"=>$quantitynew[$i],
					  "prodcapacity"=>$array_valuescapnew1[$i],
					 "prodprice"=>$array_valuestypenew1[$i],
					 "image_id"=>$img,
					 "thumbnail"=>$img1
					);	
					$insidq=insertData($updatearr11, 'prodattributes');					
				}
						$errMsg='<br><b>Product Added Successfully!</b><br>';
						//redirect('main.php?mod=viewproduct');
						}else{
							$errMsg1='<b>There was some error!</b>';
						}
					
				   }
			}
	}


  $act1=$_REQUEST['act1'];
 $id1=$_REQUEST['id1'];

 if($act1=='del'){
	 $sqld="DELETE FROM prodattributes WHERE id='$id1'";	
	 $db->query($sqld);	
	 } ?>
<script>
var id=<?=$prodid?>;
var url= window.location.href; 

	 function deladmin(id1){
		 if(confirm("Are you sure to delete?"))	{
			 location.href='https://orangestate.ng/admin/admin_new/add_product.php?act=edit&id='+id+'&act1=del&id1='+id1;
			 }
		} 
		</script>


<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Product</a></li>

                            <li class="active">Add Product</li>

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

        <div class="col-xs-2">

            <!--  for floating -->

            <!-- Nav tabs -->

            <h3> Product Information</h3>

            <ul class="nav nav-tabs tabs-left">

                <li class="active error"><a href="#home" data-toggle="tab">Genral 

                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>

                </a></li>

                <li><a href="#Categories" data-toggle="tab">Categories
				 <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
				 </a></li>

                <li><a href="#Prices" data-toggle="tab">Prices
				 <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
				 </a></li>

                <li><a href="#Images" data-toggle="tab">Images
				 <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span></a></li> 

                <li><a href="#Policies" data-toggle="tab">Policies & Shipping
				 <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span></a></li>      

            </ul>

        </div>

        <div class="col-xs-10">

            <!-- Tab panes -->
				<form name="frmprod" class="" method="post" action=""  enctype="multipart/form-data">
						<input type="hidden" name="mainimage" id="mainimage" value="" />
						<input type="hidden" name="mainimage_edit" value="<?=$row['prod_large_image']?>" />
                        <input type="hidden" name="image1_edit" value="<?=$row['image1']?>" />
						<input type="hidden" name="image2_edit" value="<?=$row['image2']?>" />			
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
            <div class="tab-content">

                <div class="tab-pane active" id="home">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Basic Information</h2>

                                            <p>Basic Information of the Product</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                         

                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Name <span class="required">*</span></label>

                                                        <div class="col-md-10">

                                                                <input type="text"name="prodname" id="prodname" type="text" class="form-control" value="<?=$row['prod_name']?>"> 

                                                        </div>

                                                    </div>

                                                </div> 


                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Short Description</label>

                                                        <div class="col-md-10"> 
 <textarea name="sort_detail" class="editor-base" ><?=$row['sort_detail']?></textarea>
                                                          

                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Description </label>

                                                        <div class="col-md-10"> 
														  <textarea name="prod_desc" class="editor-base" ><?=$row['prod_detail']?></textarea>


                                                        </div>

                                                    </div>

                                                </div>





                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">SKU<span class="required">*</span></label>

                                                        <div class="col-md-10">

                                                                <input type="text" name="sku" id="sku"  class="form-control" value="<?=$row['prod_sku']?>"   > 

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Weight </label>

                                                        <div class="col-md-10">

                                                                <input name="weight" type="text" class="form-control" value="<?=$row['weight']?>"  > 

                                                        </div>

                                                    </div>

                                                </div>

                                              


                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Manufacturer Description </label>

                                                        <div class="col-md-10">
 <textarea name="manufacturer" class="editor-base"><?=$row['manufacturer']?></textarea>
                                                          

                                                               

                                                        </div>

                                                    </div>

                                                </div>





                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Status </label>

                                                        <div class="col-md-10">

                                                            <select class="form-control"name="pstatus">

                                                                <option value="1" <?php if($row['prod_status']=="1"){echo " selected";}?>>Active</option>

                                                                <option value="0" <?php if($row['prod_status']=="0"){echo " selected";}?>>In-Active</option>

                                                                

                                                            </select>

                                                               

                                                        </div>

                                                    </div>

                                                </div>


<?php $makearr=array();
$makearr=getValuesArr( "countries", "countries_name","countries_name","", "" );?>
                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Country of Manufacture </label>

                                                        <div class="col-md-10">
<?php echo createComboBox($makearr,"country", ""," id='country1' class='form-control'")?>
                                                               

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label"> Stars </label>

                                                        <div class="col-md-10">

                                                            <select class="form-control" name="star">

                                                                <option value="1">1</option>

                                                                <option value="2">2</option> 

                                                                <option value="3">3</option> 

                                                                <option value="4">4</option> 

                                                                <option value="5">5</option> 

                                                                

                                                            </select>

                                                               

                                                        </div>

                                                    </div>

                                                </div>





                                                <p></p>











                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

                </div>

                <div class="tab-pane" id="Categories">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Categories</h2>

                                            <p>Select Categories of the Product</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">
		
                                              <div class="form-group">
 
                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Main Category <span class="required">*</span></label>

                                                        <div class="col-md-10">
														<?php //echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" '); //onchange="return showcategory(this.value);"  ?>

                                                               <?php 
							 $sql="SELECT * FROM category WHERE cattype='Category'";
							$db->query($sql)or die($db->error());
							 if($db->numRows()>0){
								
							 ?>
							 
									 <select  name="category" id="category"  class="form-control" >
													<option value="0">Select cateory</option><?php
									while($row1=$db->fetchArray()){
									if($row1['id']==$row['catid']){ $select1='selected';}
								?>
		
                        <option value="<?=$row1['id']?>" <?=$select1?>><?=$row1['catname']?></option>
						  <?php }?>
						   </select>
						
						 <?php } ?>

                                                        </div>

                                                    </div>

                                                </div>
									<?php if($act=="edit"){ ?>
                                                <div class="form-group">

                                                    <div class="row" >
														<div id="subcatid">
                                                        <label class="col-md-2 control-label">Sub Category </label>
													
                                                        <div class="col-md-10">
														
									
								<?php $subid=$row['catid'];
							 $sql="SELECT * FROM $_TBL_SUBCAT WHERE catid=$subid";
							$db->query($sql)or die($db->error());
							 if($db->numRows()>0){
								
							 ?>
							 
									 <select  name="subcategory" id="subcategory" cid="<?=$subid?>" class="form-control" >
													<option value="0">Select subcateory</option><?php
									while($row1=$db->fetchArray()){
									if($row1['id']==$row['subcatid']){ $select1='selected';}
								?>
		
                        <option value="<?=$row1['id']?>" <?=$select1?>><?=$row1['subcatname']?></option>
						  <?php }?>
						   </select>
						
						 <?php } ?>
                                    
								</div>

                                                  </div>
												  
												  </div>

                                                </div>	<?php } ?>
										<?php if($act !="edit"){ ?>
									<div class="form-group">

                                         <div class="row">
												<div id="subcatid">
						

												</div>
										</div>

                                      </div>
									  
									  <div class="form-group">

                                          <div class="row">
												<div id="subsubcatid">
						

												</div>
									       </div>

                                     </div>
									 
									 
									 <div class="form-group">

                                      <div class="row">
										<div id="4thsubcatid">						

										</div>
									  </div>

                             </div>
										<?php } ?>
						
									<?php if($act=="edit"){ ?>
									<div class="form-group">
									 <div class="row">
									<div id="subsubcatid">
									<?php $cid=$row['catid'];
									$subcatid=$row['subcatid'];
									 $sql="SELECT * FROM $_TBL_SUBSUBCAT WHERE catid=$cid and subcatid=$subcatid";
$db->query($sql)or die($db->error());
 if($db->numRows()>0){
 ?>
<label class="col-md-2 control-label" for="name">  Ternary Category</label>
 <div class="col-md-10">
		 <select  name="subsubcategory" id="subsubcategory" cid="<?=$cid?>" sid="<?=$subcatid?>" class="form-control">
                        <option value="0">Select Ternary</option><?php
		while($row1=$db->fetchArray()){
		  if($row1['id']==$row['subsubcatid']){ $select2='selected';}
		?>
		
                        <option value="<?=$row1['id']?>" <?=$select2?> cid="<?=$row1['catid']?>"><?=$row1['subsubcatname']?></option>
                  <?php }?>
				   </select>

</div>
 <?php } ?>
									 </div> </div> </div>
									<?php } ?>
									
									
									<?php if($act=="edit"){ 
									$tid=$row['subsubcatid'];
						if(!empty($tid)){
									?>
									<div class="form-group">
									 <div class="row">
									<div id="4thsubcatid">	
									<?php 

						
						 $sql="SELECT * FROM 4thsubcategory WHERE catid=$cid and subcatid=$subcatid and thirdcatid=$tid";
						$db->query($sql)or die($db->error());
						 if($db->numRows()>0){
						 ?>
						  <label class="col-md-2 control-label" for="name">  4Th Category</label>
						 <div class="col-md-10">
							<select  name="4thcatgory" id="4thcatgory" class="form-control">
												<option value="0">Select 4Th cateory</option><?php
								while($row1=$db->fetchArray()){
								if($row1['id']==$row['4thcatid']){ $select3='selected';}  
								?>
		
                        <option value="<?=$row1['id']?>" <?=$select3?> ><?=$row1['thirdsubcatname']?></option>
                  <?php }?>
				   </select> </div>

 <?php } ?>
									 </div> </div> </div>
									<?php } } ?>
									
									<?php ?>
                                        <div class="form-group">
										<div class="row">
                                        <label class="col-md-2 control-label" for="name"> Product Manufacturer</label>

                                        <div class="col-md-10">

                            <?php
						
					
							
							 $sqlc="SELECT * FROM category where cattype='Brands'";
							$db->query($sqlc)or die($db->error());  ?>

						<select  name="brandname" id="brandname" class="form-control">
										<option value="0">Select Manufacturer</option><?php
						while($row1=$db->fetchArray()){
							if($row1['catname']==$row['brandname']){ $select='selected';} 
						  
						?>
		
                        <option value="<?=$row1['catname']?>" <?=$select?>><?=$row1['catname']?></option>
                  <?php }?>
				   </select>

                                        </div>
 </div>
                                    </div>
								          
								   
											   
											   <!-- <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Ternary Category <span class="">*</span></label>

                                                        <div class="col-md-10">

                                                            <select class="form-control">

                                                                <option>Red</option>

                                                                <option>Orange</option>

                                                                <option>Pink</option>

                                                                <option>Blue</option>

                                                            </select>

                                                               

                                                        </div>

                                                    </div>

                                                </div>-->



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Product Type </label>

                                                        <div class="col-md-10">

                                                            <select class="form-control" name="newrelease">

                                                                <option value="yes"<?php if($row['newrelease']=="yes"){echo " selected";}?>>New </option>

                                                                <option value="yes"<?php if($row['newrelease']=="no"){echo " selected";}?>>Old</option>

                                                                <!--<option>Like New</option>-->

                                                            </select>

                                                               

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Populer </label>

                                                        <div class="col-md-10">

                                                            <select class="form-control"  name="populer">

                                                                <option  value="yes"<?php if($row['populer']=="no"){echo " selected";}?> >No</option>

                                                                <option  value="yes"<?php if($row['populer']=="yes"){ echo " selected";}?>>Yes</option> 

                                                            </select>

                                                               

                                                        </div>

                                                    </div>

                                                </div>





                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Featured </label>

                                                        <div class="col-md-10">

                                                            <select class="form-control" name="featured" id="featured">

                                                                <option value="no" <?php if($row['featured']=="no"){echo " selected";}?>>No</option>

                                                                <option value="yes" <?php if($row['featured']=="yes"){echo " selected";}?>>Yes</option> 

                                                            </select>

                                                               

                                                        </div>

                                                    </div>

                                                </div>



                                                <p></p>









                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

                </div>

                <div class="tab-pane" id="Prices">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Prices</h2>

                                            <p>Prices of the Product</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">



                                        <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Maximum Retail Price <span class="required">*</span></label>

                                                        <div class="col-md-10">

                                                                <input name="prodprice" id="prodprice" type="text" class="form-control" value="<?=$row['prod_price']?>" / > 

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Selling Price <span class="required">*</span></label>

                                                        <div class="col-md-10">

                                                                <input  name="sprodprice" id="sprodprice" type="text" class="form-control" value="<?=$row['prod_sprice']?>" / > 

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Shipping Charge </label>

                                                        <div class="col-md-10">

                                                                <input name="shippingcharge" type="text" class="form-control" value="<?=$row['shippingcharge']?>" placeholder="shipping charge " > 

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Material </label>

                                                        <div class="col-md-10">

                                                                <input name="material" type="text" id="material" class="form-control" value="<?=$row['material']?>" / > 

                                                        </div>

                                                    </div>

                                                </div>



<div class="form-group">
								 <div class="row">
								<?php //echo $array_values; ?>
								 <label class="col-md-2 control-label" for="size"> Add Attribute  (If applicabe)</label>
				<div class="col-md-10">
				<div class="wrapper">
				<?php 
				$color=$row['color'];
				//$quantity=$row['quantity'];
				//$quantitynew=explode(",",$quantity);
				$allsize=$row['allsize'];
				$allsizenew=explode(",",$allsize);
				$quantity=$row['quantity'];
				$quantitynew=explode(",",$quantity);
				$prodtype=$row['prodtype'];
				$prodtypenew=explode(",",$prodtype);
				
				$prodcapacity=$row['prodcapacity'];
				$prodcapacitynew=explode(",",$prodcapacity);?>
				
			
				<?php 
				$sql="SELECT * from prodattributes where prodid='$prodid'";
				$db->query($sql);
				if($db->numRows()>0)
					{
				while($rownew=$db->fetchArray()){
				?>
				<input type="hidden" name="input_array_id[]"  value="<?=$rownew['id']?>" />
				
				<input type="hidden" name="input_imgid[]"  value="<?=$rownew['image_id']?>" />
				
				<input type="hidden" name="input_imgid1[]"  value="<?=$rownew['thumbnail']?>" />
				<div class="row" style="display: flex;">
				<div class="col-md-2">
					<label class="" for="color"> Color</label><!--<input type="text" name="input_array_name[]" class="form-control" placeholder="Color" value="<?=$rownew['prodcolor']?>" />-->
					<?php  echo $color=$rownew['prodcolor'];
							$db22=new DB();
							  $sql22="SELECT * FROM allproductcolor";
							$db22->query($sql22)or die($db22->error());
							 if($db22->numRows()>0){
								
							 ?>
							 
									 <select  name="input_array_name[]" id="input_array_name[]"  class="form-control" >
													<option value="">select</option><?php
									while($row1=$db22->fetchArray()){
									
								?>
		
                        <option value="<?=$row1['nameofcolor']?>" <?php if($row1['nameofcolor']===$color){ echo "selected"; } ?> ><?=$row1['nameofcolor']?></option>
						  <?php }?>
						   </select>
						
						 <?php } ?>
					
					
					</div>
				<div class="col-md-2">
					<label class="" for="color"> Thumbnail</label><input type="file" name="input_array_file[]" class="form-control" placeholder="Input File" /></div>
				
				<div class="col-md-2">
					<label class="" for="color">Color Thumbnail</label><input type="file" name="input_array_file1[]" class="form-control" placeholder="Thumbnail File" /></div>
				<div class="col-md-2">
					<label class="" for="prodsize"> Product Size</label><input type="text" name="input_array_size[]" class="form-control"  placeholder="Input size" value="<?=$rownew['prodsize']?>" /></div>
				<div class="col-md-2">
					<label class="" for="Quantity"> Quantity<span class="required">*</span></label><input type="text" name="input_array_qtn[]" class="form-control" id="quantity"  placeholder="Quantity" value="<?=$rownew['prodquantity']?>"  /></div>
					
					<div class="col-md-2">
					<label class="" for="Price"> Price<span class="required">*</span></label>
					<input type="text" name="input_array_type[]" class="form-control" placeholder="Price" value="<?=$rownew['prodprice']?>" /></div>
				<div class="col-md-2">
				<label class="" for="Capacity"> Capacity<span class="required">*</span></label>
				<input type="text" name="input_array_capacity[]" class="form-control" placeholder="Capacity" value="<?=$rownew['prodcapacity']?>" /></div>
					
					
					<div class="col-md-2" style="margin-top: 30px;">
					<a href='javascript:deladmin("<?=$rownew['id']?>")' > <span class="glyphicon glyphicon-trash" title="Delete"></span>						</a>
					</div>
				</div>
				
					<?php } } 
				if(empty($color)){ 
				?><div class="row" style="display: flex;">
					<div class="col-md-2"> <label class="" for="color"> Color</label>
					
					<?php $color=$row['color'];
							$db22=new DB();
							  $sql22="SELECT * FROM allproductcolor";
							$db22->query($sql22)or die($db22->error());
							 if($db22->numRows()>0){
								
							 ?>
							 
									 <select  name="input_array_name[]" id="input_array_name[]"  class="form-control" >
													<option value="0">Select color</option><?php
									while($row1=$db22->fetchArray()){
									if($row1['id']==$row['color']){ $select1='selected';}
								?>
		
                        <option value="<?=$row1['nameofcolor']?>" <?=$select1?>><?=$row1['nameofcolor']?></option>
						  <?php }?>
						   </select>
						
						 <?php } ?>
					
                                                            

					<!--<input type="text" name="input_array_name[]" class="form-control" />--></div>
					<div class="col-md-2">
					<label class="" for="color"> Thumbnail</label>
					<input type="file" name="input_array_file[]" class="form-control"  /></div>
					<div class="col-md-2">
					<label class="" for="color"> Color Image </label>
					<input type="file" name="input_array_file1[]" class="form-control" /></div>
					<div class="col-md-2">
					<label class="" for="Size"> Size</label>
					<input type="text" name="input_array_size[]" class="form-control"  /></div>
					<div class="col-md-2">
					<label class="" for="Quantity"> Quantity<span class="required">*</span></label>
					<input type="text" name="input_array_qtn[]" id="quantity" class="form-control"   ></div>
					
					<div class="col-md-2">
					<label class="" for="Price"> Price<span class="required">*</span></label>
					<input type="text" name="input_array_type[]" class="form-control" placeholder="Price" /></div>
				<div class="col-md-2">
				<label class="" for="Capacity"> Capacity<span class="required">*</span></label>
				<input type="text" name="input_array_capacity[]" class="form-control" placeholder="Capacity"  /></div>

					
					
				</div>
				<?php } ?>
					
						</div>
					<br/>
					<p><button class="add_fields btn btn-info pull-right hidden-mobile">Add More</button></p>
				</div>
					</div>
			</div>						



                                                <!--<div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Total Quantity <span class="">*</span></label>

                                                        <div class="col-md-10">

                                                                <input name="quantity1" type="text" class="form-control" placeholder="100" value="<?=$row['total']?>" > 

                                                        </div>

                                                    </div>

                                                </div>-->

  <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Discount (In %) </label>

                                                        <div class="col-md-10">

                                                                <input name="discount" id="discount" type="text" class="form-control" value="<?=$row['discount']?>" / > 

                                                        </div>

                                                    </div>

                                                </div>




                                              




                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label"> Tax Class <span class="required">*</span></label>

                                                        <div class="col-md-10">

                                                            <select class="form-control" name="tax" id="tax">
<option value="0">Select</option>
<?php  $dbnew=new DB();
		$ct=1;
		$sql12="SELECT * FROM alltax WHERE status='1'";
		$dbnew->query($sql12)or die($dbnew->error());
		while($row2=$dbnew->fetchArray()){	?>
               <option value="<?=$row2['tax']?>"><?=$row2['tax']?> %</option>
		<?php } ?>

                                                            </select>

                                                               

                                                        </div>

                                                    </div>

                                                </div>







                                                <p></p>









                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

                </div>

                <div class="tab-pane" id="Images">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Images</h2>

                                            <p>Images of the Product
</p>
                                        </div>                                
<input type="file" id="filesnew" name="filesnew" class=" btn btn-info pull-right hidden-mobile" >
                                    </div>

                                    <div class="block-content margin-bottom-0">

                                        <div class="uploadimg1">

                                            <table class="table table-striped">

                                            <thead>

                                                <tr>

                                                    <th>S.N.</th> 

                                                    <th>Image</th>
                                                    <th>Main Image</th>

                                                    <th>Action</th> 

                                                </tr>

                                            </thead>

                                            <tbody class="uploaded-img">

                                              
                                                 



                                            </tbody>
											<?php $cnt=1;
											$dbi=new DB();
											$img2=$row['prod_large_image'];
		if(!empty($_REQUEST['id'])){
		$sqli="SELECT * FROM productimage WHERE pid=".$_REQUEST['id'];
		$dbi->query($sqli)or die($dbi->error());
		while($row1=$dbi->fetchArray()){	
		
		?>
		
		<tr class="<?=$row1['imgid']?>">
		<td><?=$cnt?></td>
		<td><div class="thmis"><img src="../../product/<?=$row1['imgid']?>" width="50"></div></td>
		<td>
	
		<input type="radio" id="pimage" name="pimage" value="<?=$row1['imgid']?>"	
		<?php if($row1['imgid']===$img2){ echo "checked"; }?>></td>
		<td><button class="btn btn-default btn-icon deleteimg" img="<?=$row1['imgid']?>"><span class="fa fa-times"></span></button></td>
		</tr>
											 
		<?php $cnt=$cnt+1; } } ?>
                                        </table>





                                        </div>

                                        

                                        <p></p>









                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>



                </div>



                <div class="tab-pane" id="Policies">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Policies & Shipping Information</h2>

                                            <p>Policies & Shipping Information of the Product</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                         

                                                  

                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Shipping </label>

                                                        <div class="col-md-10"> 
<textarea name="shipping" class="editor-base"><?=$row['shipping']?></textarea>
                                                           
                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Warranty</label>

                                                        <div class="col-md-10"> 
<textarea name="warranty" class="editor-base"><?=$row['warranty']?></textarea>
                                                            

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Return Policy</label>

                                                        <div class="col-md-10"> 
 <textarea name="return-policy" class="editor-base"><?=$row['rpolicy']?></textarea>
                                                           
                                                        </div>

                                                    </div>

                                                </div>



                                                

                                                <!--<div class="form-group">

                                                    <div class="row">

                                                        <label class="col-md-2 control-label">Manufacturer<span class="">*</span></label>

                                                        <div class="col-md-10"> 

                                                            <textarea class="editor-base" ></textarea>

                                                        </div>

                                                    </div>

                                                </div>-->



                                                <p></p>











                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

                </div>

 

            </div>



             <div class="block ">                            

                             

                            <p class="text-right">
							
							
                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Reset</button>

                                <!--<button class="btn btn-success btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button>-->
<input name="Submit" id="submit" type="submit" class="btn btn-success btn-icon-fixed" value="Save & Next"  />
                               

                            </p>

                             

                        </div>

</form>

        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>


<input type="hidden" name="cnt" id="cnt" value="" />
                        

                    </div> <!-- END PAGE CONTAINER -->

    </div> <!-- END page_container
<button onclick="myFunction()">Click me</button>
//$('.nav nav-tabs tabs-left a[href="#Prices"]').closest('li').addClass('error');
$('a[href$="#Prices"]').closest('li').addClass("error");
 $("#error_name").text("* You have to enter your first name!");
<p id="demo"></p>-->  
<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>  
<?php							
								$db22=new DB();
							   $sql22="SELECT * FROM allproductcolor";
							$db22->query($sql22)or die($db22->error());
							 if($db22->numRows()>0){
								 $datanew.='<label class="" for="color"> Color</label><select  name="input_array_name[]" id="input_array_name[]"  class="form-control" ><option value="0">Select color</option>';
									while($row1=$db22->fetchArray()){
										$aa=$row1['nameofcolor'];
										 $datanew.='<option value="'.$aa.'">'.$aa.'</option>'; }
										  $datanew.='</select>'; 
										
										 } 
										
										
										 ?> 
<script>
/* $(".add_fields").click(function () {
   $(".appendme").append('<?=$datanew?>');
}); */

$(document).ready(function(){
	
	jQuery(document).on("change",".pimagenew",function(){
	 var pimage = $(".pimagenew").attr('pimage');	
	
	$('#mainimage').val(pimage);
});
	
	$("#prodname").focusout(function(){
				
					if($(this).val()==''){
						$(this).css("border-color", "#FF0000");
							$('#submit').attr('disabled',true);
							
					}
					else
					{
						$(this).css("border-color", "#2eb82e");
						$('#submit').attr('disabled',false);			
						

					}
			   });
	   
			   $("#sku").focusout(function(){

					if($(this).val()==''){
						$(this).css("border-color", "#FF0000");
							$('#submit').attr('disabled',true);
							
					}
					else
					{
						$(this).css("border-color", "#2eb82e");
						$('#submit').attr('disabled',false);
						$('a[href$="#home"]').closest('li').removeClass("error");
						

					}
			   });
			   
	$("#category").focusout(function(){

    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);			
        		

        	}
       });
	   
	
	   $("#prodprice").focusout(function(){

    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);				
        		

        	}
       });
	
	$("#sprodprice").focusout(function(){

    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);				
        		

        	}
       });

	
	$("#quantity").focusout(function(){

    		if($(this).val()==''){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);				
        		

        	}
       });
	
	
	$("#tax").focusout(function(){

    		if($(this).val()=='' || $(this).val()=='0'){
        		$(this).css("border-color", "#FF0000");
        			$('#submit').attr('disabled',true);
        			
        	}
        	else
        	{
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);				
        		

        	}
       }); 
	
	$('form').submit(function () {
			
    // Get the Login Name value and trim it
    var prodname = $.trim($('#prodname').val());
	
	if( prodname === ''){
        		$('#prodname').css("border-color", "#FF0000");
        		$('#submit').attr('disabled',true);
				return false;        			
        	}
	 var sku = $.trim($('#sku').val());
	 if( sku === ''){
        		$('#sku').css("border-color", "#FF0000");
        		$('#submit').attr('disabled',true);    
				return false;					
        	}
	
var category = $.trim($('#category').val());
	if( category === '' || category=='0' ){
		
		 $('#category').css("border-color", "#FF0000");
		 $('#submit').attr('disabled',true);
		 $('a[href$="#home"]').closest('li').removeClass("error");		
		 $('a[href$="#Categories"]').closest('li').addClass("error");
		return false;				
     }
	var prodprice = $.trim($('#prodprice').val());	
	if( prodprice === '' || prodprice==''){
        		$('#prodprice').css("border-color", "#FF0000");
        		$('#submit').attr('disabled',true);
				$('a[href$="#home"]').closest('li').removeClass("error");		
		        $('a[href$="#Categories"]').closest('li').removeClass("error");
				$('a[href$="#Prices"]').closest('li').addClass("error");
				return false;	
        	}
	var sprodprice = $.trim($('#sprodprice').val());
	if( sprodprice == '' || sprodprice==''){
        		$('#sprodprice').css("border-color", "#FF0000");
        		$('#submit').attr('disabled',true);
				$('a[href$="#home"]').closest('li').removeClass("error");		
		        $('a[href$="#Categories"]').closest('li').removeClass("error");
				$('a[href$="#Prices"]').closest('li').addClass("error");
				return false;	
        	}
	var quantity = $.trim($('#quantity').val());	
	if( quantity === '' || quantity==''){
        	$('#quantity').css("border-color", "#FF0000");
        	$('#submit').attr('disabled',true);
			$('a[href$="#home"]').closest('li').removeClass("error");		
		    $('a[href$="#Categories"]').closest('li').removeClass("error");
			$('a[href$="#Prices"]').closest('li').addClass("error");
			return false;        			
        	}
			
	var tax = $.trim($('#tax').val());
	if( tax == '' || tax==''){
        $('#tax').css("border-color", "#FF0000");
        $('#submit').attr('disabled',true);
		$('a[href$="#home"]').closest('li').removeClass("error");		
		$('a[href$="#Categories"]').closest('li').removeClass("error");
		$('a[href$="#Prices"]').closest('li').addClass("error");
        return false; 
	 }	
	
	 
  var pimage = document.getElementsByName('pimage');
  var imgValue = false;  
  for(var i=0; i<pimage.length;i++){
   if(pimage[i].checked == true){
    imgValue = true; 
   }
  }
  if(!imgValue){  
   $('#submit').attr('disabled',false);
   $('a[href$="#home"]').closest('li').removeClass("error");		
   $('a[href$="#Categories"]').closest('li').removeClass("error");
   $('a[href$="#Prices"]').closest('li').removeClass("error");
   $('a[href$="#Images"]').closest('li').addClass("error");
   return false;
  }
	
	/* 	
    if (prodprice === '' || sprodprice === ''|| tax === '' || quantity === '') {
		$('a[href$="#home"]').closest('li').removeClass("error");
		$('a[href$="#home"]').closest('li').removeClass("active");
		$('a[href$="#Prices"]').closest('li').addClass("error");
		$('a[href$="#Prices"]').closest('li').addClass("active");
         jQuery("#home").removeClass("active");
		  jQuery("#Prices").addClass("active");
        return false;
    }
 */	
	
});


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

jQuery(document).on("change","#subsubcategory",function(){

 var cid = jQuery('#category').val();
var sid = jQuery('#subcategory').val();	
var tid = jQuery('#subsubcategory').val();	
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajax_4thcat.php';
        var dataString ="4thcatid=" + str + '&cid=' + cid + '&subcatid=' + sid ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#4thsubcatid').html(response);
                }else{
                
                }
            },
        });
});

	jQuery("#filesnew").on('change', function() {
	var $cnt = $("#cnt");
    var a = $cnt.val();    
    a++;
	 $cnt.val(a);
	
   var social_AjaxURL='//orangestate.ng/admin/pages/uploadprod.php';
   var form_data = new FormData();

  
   var totalfiles = document.getElementById('filesnew').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('filesnew').files[index]);
   }

  
   $.ajax({
     url: social_AjaxURL,
     type: 'post',
     data: form_data,
     dataType: 'json',
     contentType: false,
     processData: false,
     success: function (response) {
		jQuery(".uploaded-img").append( '<tr class="im'+ a +'"><td>'+ a +'</td> <td><div class="thmis"><img src="https://orangestate.ng/product/'+ response +'" width="50"></div></td><td><input type="radio" id="pimage" name="pimage" value="'+ response +'" pimage="'+ response +'" class="pimagenew"></td><td><button class="btn btn-default btn-icon deleteimg1" img="'+ a +'"><span class="fa fa-times"></span></button></td></tr>');
		
     }
   });

});

jQuery(document).on("click", ".deleteimg1", function(e){
var $cnt = $("#cnt");
    var a = $cnt.val();    
    a--;
	 $cnt.val(a);
var img = jQuery(this).attr('img');
jQuery('.im'+img+'').hide();
});
jQuery(document).on("click", ".deleteimg", function(e){


		var img = jQuery(this).attr('img');
		var social_AjaxURL='//orangestate.ng/admin/pages/imgdelete.php';
		var dataString ='img='+img ;

			e.preventDefault();
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to continue!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.value) {
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
					type: 'POST',
					data: dataString,
            	    success: function (data) {
						window.location.reload(true);
						jQuery("#Images").addClass("active");
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	}else{
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'

					})
				}
				})


	});


				
});				

jQuery(document).ready(function() {
    var max_fields = 10;
    var wrapper    = jQuery(".wrapper"); 
    var add_button = jQuery(".add_fields"); 
	var x = 1; 
	
	jQuery(add_button).click(function(e){
        e.preventDefault();
		
        if(x < max_fields){ 
            x++; 
            jQuery(wrapper).append('<div class="row" style="display: flex;"><div class="col-md-2 appendme"><?php echo $datanew;?> </div><div class="col-md-2"> <label class="" for="color"> Thumbnail</label><input type="file" name="input_array_file[]" placeholder="file" class="form-control" /> </div><div class="col-md-2"> <label class="" for="color"> Color Image</label><input type="file" name="input_array_file1[]" placeholder="file" class="form-control" /> </div><div class="col-md-2"> <label class="" for="color"> Size</label><input type="text" name="input_array_size[]" placeholder="size" class="form-control" /> </div><div class="col-md-2"> <label class="" for="Quntity"> Quntity</label><input type="text" name="input_array_qtn[]" class="form-control" placeholder="Quantity"  /> </div><div class="col-md-2"><label class="" for="Price"> Price<span class="required">*</span></label><input type="text" name="input_array_type[]" class="form-control" placeholder="Price" /></div><div class="col-md-2"><label class="" for="Capacity"> Capacity<span class="required">*</span></label><input type="text" name="input_array_capacity[]" class="form-control" placeholder="Capacity"  /></div><a href="javascript:void(0);" class="remove_field add_fields btn btn-info pull-right hidden-mobile" style="margin-right: 20px; margin-top: 30px;">Remove</a></div>');
        }
    });
	
    jQuery(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault();
		$(this).parent('div').remove(); 
		x--; 
    })
});



jQuery(document).ready(function() {
    var max_fields = 10;
    var wrapper    = jQuery(".wrapper1"); 
    var add_button = jQuery(".add_fields1");
	var x = 1;
	
	
	jQuery(add_button).click(function(e){
        e.preventDefault();
		
        if(x < max_fields){ 
            x++; 
			
            jQuery(wrapper).append('<div><input type="text" name="input_array_size[]" placeholder="Input Other Size" /> <a href="javascript:void(0);" class="remove_field1">Remove</a></div>');
        }
    });
	
  
    jQuery(wrapper).on("click",".remove_field1", function(e){ 
        e.preventDefault();
		jQuery(this).parent('div').remove(); 
		x--; 
    })
});
</script>
<?php include("footer.php") ?>

	