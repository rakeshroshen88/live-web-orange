<?php

$_TBL_PROD1="product";
$rdb=new DB();
$makearr1=array();
$makearr1=getValuesArr( $_TBL_CAT, "id","catname","", "" );
$makearrpro=array();
$makearrpro=getValuesArr( $_TBL_PROD1, "id","prod_name","", "" );

$makearr3=array();
$makearr3=getValuesArr( $_TBL_SUBSUBCAT, "id","subsubcatname","", "" );
$makearr2=array();
$makearr2=getValuesArr( $_TBL_SUBCAT, "id","subcatname","", "" );

$idm=$_REQUEST['idm'];
$id1=$_REQUEST['id1'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
if(!empty($prodid)){
 $_SESSION['sess_pid']=$prodid;
}else{
	
 $_SESSION['sess_pid']=$_REQUEST['prodid'];	
}
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

//$up=new UPLOAD();
$uploaddir="../product/";
$uploaddir1="../product/medium/";
$uploaddir2="../product/small/";
$target_dir = "../product/";
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
	

	
	


$prod_detail=$_REQUEST['prod_desc'];
$con=mysqli_connect("localhost","orangestate_uorange","MN9Ydvr,Hg!!","orangestate_orange");
$pn=$con->real_escape_string($_REQUEST['prodname']);
$updatearr=array(	 
				 	 "catid"=>$_REQUEST['category'],										 
					 "prod_sku"=>$_REQUEST['sku'],
					 "subcatid"=>$_REQUEST['subcategory'],
					 "subsubcatid"=>$_REQUEST['subsubcategory'],
					"quantity"=>$_REQUEST['quantity'],
					"total"=>$_REQUEST['quantity'],
					 "prod_name"=>$_REQUEST['prodname'],					
					 "prod_price"=>$_REQUEST['prodprice'],
					 "prod_detail"=>$_REQUEST['prod_desc'],					
					 //"shippingcharge"=>$_REQUEST['shippingcharge'],					 
					 "prod_large_image"=>$ppath,						
					 "prod_sprice"=>$_REQUEST['sprodprice'],
					 "prod_date"=>date('Y-m-d h:i:s'),
					 "prod_status"=>$_REQUEST['pstatus'],
					 "material"=>$_REQUEST['material'],
					 "prodsize1"=>$_REQUEST['size'],
					 //"newrelease"=>$_REQUEST['newrelease'],					 
					 "shippingcharge"=>$_REQUEST['shippingcharge'],
					"sort_detail"=>$_REQUEST['sort_detail'],
	//				 "total"=>$_REQUEST['total']
					 
				 );
			//	print_r($updatearr);die;
if($act=="edit")
		{
		$whereClause=" id!=".$_REQUEST['prodid']." and prod_sku=".$_REQUEST['sku'];
		}elseif($act=="add"){
			
		$whereClause=" prod_sku=".$_REQUEST['sku'] ;
		}
	if(matchExists($_TBL_PROD1, $whereClause))
		{
			
			$errMsg='<br>This Product SKU ID is already exist!<br>';
			
		}else{
		
				
			if($act=="edit")
				{ 
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_PROD1, $whereClause);
					$where=" id=".$_REQUEST['prodid'];
                    $_SESSION['picid']=uniqid();
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

							$_SESSION['id']=$_REQUEST['prodid'];

						$valid_formats = array("jpg", "JPG", "png", "JPEG", "gif", "zip", "bmp");

						$max_file_size = 1024*100000000000000; //1000 kb

						$path = "../product/"; // Upload directory

						$count = 0;

						foreach ($_FILES['files']['name'] as $f => $name) {     

								if ($_FILES['files']['error'][$f] == 4) {

									continue; // Skip file if any error found

								}	       

								if ($_FILES['files']['error'][$f] == 0) {	           

									if ($_FILES['files']['size'][$f] > $max_file_size) {

										$message[] = "$name is too large!.";

										echo "<script>alert('".$name.' is too large!'."');</script>";

										continue; // Skip large files

									}

									elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){

										$message[] = "$name is not a valid format";

										echo "<script>alert('".$name.' is not a valid format'."');</script>";

										continue; // Skip invalid file formats

									}

									else{ // No error found! Move uploaded files 

										if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$_SESSION['picid'].$name))

										$count++; // Number of successfully uploaded file

										

						$updatearr1=array(	

											 "pid"=>$_SESSION['id'],					 

											 "imgid"=>$_SESSION['picid'].$name,

															 							 

											

											 );

								$insid=insertData($updatearr1, 'productimage');

										

									}

								}

							}

						

						

						unset($_SESSION['id']);

						

						

						//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){		

					$insid1=insertData($updatearr, $_TBL_PROD1);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$_SESSION['id']=$insid1;

						 $_SESSION['picid']=uniqid();

						$valid_formats = array("jpg", "JPG", "png", "JPEG", "gif", "zip", "bmp");

						$max_file_size = 1024*100000000000000; //1000 kb

						$path = "../product/"; // Upload directory

						$count = 0;

						foreach ($_FILES['files']['name'] as $f => $name) {     

								if ($_FILES['files']['error'][$f] == 4) {

									continue; // Skip file if any error found

								}	       

								if ($_FILES['files']['error'][$f] == 0) {	           

									if ($_FILES['files']['size'][$f] > $max_file_size) {

										$message[] = "$name is too large!.";

										echo "<script>alert('".$name.' is too large!'."');</script>";

										continue; // Skip large files

									}

									elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){

										$message[] = "$name is not a valid format";

										echo "<script>alert('".$name.' is not a valid format'."');</script>";

										continue; // Skip invalid file formats

									}

									else{ // No error found! Move uploaded files 

										if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$_SESSION['picid'].$name))

										$count++; // Number of successfully uploaded file

										

						$updatearr1=array(	

											 "pid"=>$_SESSION['id'],					 

											 "imgid"=>$_SESSION['picid'].$name,

															 							 

											

											 );

								$insid=insertData($updatearr1, 'productimage');

										

									}

								}

							}

						

						

						unset($_SESSION['id']);

						

						

						////////////////////////////////////////////////////////////////////////////////////////////

					if($insid1>0)
						{
						$errMsg='<br><b>Product Added Successfully!</b><br>';
					
						//redirect('main.php?mod=viewproduct&msg='.$errMsg);
						}else{
							$errMsg="some error occore !";
						}
					
				   }
			}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_PROD1 WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
if($act=='del')
	{	//echo $_SESSION['sess_pid'];	
		$sql="DELETE FROM productimage WHERE imgid='$id1'";
		$db->query($sql);
		$file='../product/'.$id1;
		unlink($file);
		redirect("main.php?mod=addproduct&act=edit&id=".$_SESSION['sess_pid']);
	}
	
	if($act=='del1')
	{	
		$sql="UPDATE $_TBL_PROD1 SET prod_large_image='' WHERE prod_large_image='$idm'";
		$db->query($sql);
		
		$file='../product/'.$idm;
		unlink($file);
		redirect("main.php?mod=add_prod&id=".$_SESSION['sess_pid']);
	}
$qryStr="mod=addproduct&rec=$rec&act=edit&id=".$_SESSION['sess_pid'];
?>
<script>
function deladmin(id)
{ 
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&act=del&id1="+id;
	}
}
</script>


<script>
function deladmin1(id2)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&act=del1&idm="+id2;
	}
}
</script>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		

		<div class="row">

			<ol class="breadcrumb">

				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>

				<li class="active">Add/Edit product</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>

			</ol>

		</div><!--/.row-->

	

        

        

		

		<div class="row">

			<div class="col-md-12">

				<div class="panel panel-default">

					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>

					<div class="panel-body">

					

                        <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">

												<input type="hidden" name="mainimage_edit" value="<?=$row['prod_large_image']?>" />
                        <input type="hidden" name="image1_edit" value="<?=$row['image1']?>" />
						<input type="hidden" name="image2_edit" value="<?=$row['image2']?>" />			
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />

				

							<fieldset>

								<!-- Name input-->

                               



                          <script>











function showUser(str)





{





	





if (str=="sheet")





  {





 // document.getElementById("vidid1").style.display = "table-row";





  document.getElementById("vidid").style.display = "block";





  }





  





  }





  </script>

                              <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Ptoduct Category</label>

                                        <div class="col-md-9">

                                       <?php
						if(isset($_REQUEST['catid']))
							{
							$selcat=$_REQUEST['catid'];						
							}else{
							$selcat=$row['id'];							
							}						
						echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" ');
					
							?>

                                        </div>

                                    </div>

									
									
									
                              <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Ptoduct Sub Category</label>

                                        <div class="col-md-9">
 
                                       <?php
							
						echo createComboBox($makearr2,'subcategory',$row['subcatid'],' class="form-control" id="category" ');
					
							?>

                                        </div>

                                    </div>

									
									
									
									
									
                              <div class="form-group">

                                        <label class="col-md-3 control-label" for="name">  Ternary Category</label>

                                        <div class="col-md-9">

                                       <?php
											
						echo createComboBox($makearr3,'subsubcategory',$row['subsubcatid'],' class="form-control" id="category" ');
					
							?>

                                        </div>

                                    </div>

									
									
									
									
									
									
									
									
									
									
									
									

                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Product Name</label>

                                        <div class="col-md-6">
										
										<input name="prodname" type="text" class="form-control" value="<?=$row['prod_name']?>" required />  
								
                                        </div>

                                    </div>

									
									  <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> SKU</label>

                                        <div class="col-md-6">
										
									
								 <input name="sku" id="sku" type="text" class="form-control" value="<?=$row['prod_sku']?>" required/>  

                                       

                                        </div>

                                    </div>

									  <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Mrp</label>

                                        <div class="col-md-6">
										
		
  <input name="prodprice" type="text" class="form-control" value="<?=$row['prod_price']?>" required/>    


                                       

                                        </div>

                                    </div>

									  <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Selling Price</label>

                                        <div class="col-md-6">
					   
    <input name="sprodprice" type="text" class="form-control" value="<?=$row['prod_sprice']?>" required/>     


                                       

                                        </div>

                                    </div>

									  <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Shipping Charge</label>

                                        <div class="col-md-6">
								   
	<input name="shippingcharge" type="text" class="form-control" value="<?=$row['shippingcharge']?>"/> 

                                        </div>

                                    </div>


 <div class="form-group">

                                        <label class="col-md-3 control-label" for="material">Material</label>

                                        <div class="col-md-6">
								   
	<input name="material" type="text" class="form-control" value="<?=$row['material']?>"/> 

                                        </div>

                                    </div>
									
									 <div class="form-group">

                                        <label class="col-md-3 control-label" for="size"> Size</label>

                                        <div class="col-md-6">
								   
	<input name="size" type="text" class="form-control" value="<?=$row['prodsize1']?>"/> 

                                        </div>

                                    </div>
									
									 <div class="form-group">

                                        <label class="col-md-3 control-label" for="size"> Quantity</label>

                                        <div class="col-md-6">
								   
	<input name="quantity" type="text" class="form-control" value="<?=$row['quantity']?>"/> 

                                        </div>

                                    </div>
									
								
									
							

									

										<div class="form-group">
        									<label class="col-md-3 control-label"> Sort Detail </label>
            									<div class="col-md-9">
            									    <input name="sort_detail" type="text" class="form-control" value="<?=$row['sort_detail']?>"/> 


                                                      <!--<textarea name="sort_detail" class="form-control"><?=$row['sort_detail']?></textarea>-->

            									 

            									</div>

        								</div>
                                    

                                   

        							

                                    	<div class="form-group">

        									<label class="col-md-3 control-label"> Detail </label>

            									<div class="col-md-9">

                                                      <textarea name="prod_desc" class="form-control"><?=$row['prod_detail']?></textarea>

            									 

            									</div>

        								</div>																																									<div class="form-group">        
										
										
										

                                   

                                         <script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script><script>tinymce.init({    selector: "textarea",            height: 250,    theme: "modern",    plugins: [        "advlist autolink lists link image charmap print preview hr anchor pagebreak",        "searchreplace wordcount visualblocks visualchars code fullscreen",        "insertdatetime media nonbreaking save table contextmenu directionality",        "emoticons template paste textcolor"    ],            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons",    image_advtab: true,    templates: [        { title: 'Test template 1', content: 'Test 1' },        { title: 'Test template 2', content: 'Test 2' }    ]});</script>  

                                        

                                    

                                    

                                    	<!-- File input-->

        							

                                      

                                    	<div class="form-group">

        									<label class="col-md-3 control-label"> Main Image</label>

        									<div class="col-md-3">

                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['prod_large_image']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewprodLimage.php?img=<?=$row['prod_large_image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>

        									 

        									</div>

        								</div>	





<div class="form-group">

        									<label class="col-md-3 control-label"> Multi Image</label>

        									<div class="col-md-3">
  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />

        									</div>

        								</div>	
    <div class="form-group">
										<?php 
										if(!empty($_SESSION['sess_pid'])){
										$sql1="SELECT * FROM productimage WHERE pid=".$_SESSION['sess_pid'];
		$db->query($sql1)or die($db->error());
		while($row1=$db->fetchArray()){	?>
				<p><img src="../product/<?=$row1['imgid']?>" width="100"  height="100"/><br />		
							<a href='javascript:deladmin("<?=$row1['imgid']?>")'><img height="16" alt="Delete " src="images/delete.png" width="16" border="0" /></a></p>
										<?php } }?>	

 	</div>	
                                    <div class="form-group">

                                        <label class="col-md-3 control-label"> Status</label>

                                        <div class="col-md-9">

                                           

                                        

                                            <div class="radio">

                                                <label>

                                                        <input name="pstatus" type="radio" value="1" <?php if($row['prod_status']=="1"){echo " checked";}?>/>Active

            

                                                </label>

                                            </div>

                                            <div class="radio">

                                                <label>

                                                    <input name="pstatus" type="radio" value="0" <?php if($row['prod_status']=="0"){echo " checked";}?>/>Deactive

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                                

                                       <div class="form-group">

                                        <label class="col-md-3 control-label"> ReleaseStatus</label>

                                        <div class="col-md-9">

                                           

                                        

                                            <div class="radio">

                                                <label>

                                                      <input name="newrelease" type="radio" value="yes"<?php if($row['newrelease']=="yes"){echo " checked";}?>/>New Product
						

            

                                                </label>

                                            </div>

                                            <div class="radio">

                                                <label>

                                               
							<input name="newrelease" type="radio" value="no"<?php if($row['newrelease']=="no"){echo " checked";}?>/>Old Product

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                        

                                        

                                       

                                

                                

                                

								<!-- Message body -->

								 

								<!-- Form actions -->

								<div class="form-group">

									<div class="col-md-12 widget-right">

									<input name="Submit" type="submit" class="btn btn-default btn-md pull-right" value="Save"  />

									</div>

								</div>

							</fieldset>

						</form>

					</div>

                    

                    

                    

                    

                    <!--/.row-->	

				</div>

				

				 

				

			</div><!--/.col-->

			 

		</div><!--/.row-->

	</div>