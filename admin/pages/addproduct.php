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

/* $makearr4=array();
$makearr4=getValuesArr( '', "id","3rdsubcatname","", "" );
 */

$idm=$_REQUEST['idm'];
$id1=$_REQUEST['id1'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
if(!empty($prodid)){
 $_SESSION['sess_pid']=$prodid;
}else{
	
 $_SESSION['sess_pid']=$_REQUEST['id'];	
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
	
////////////////////////////////////////////

$uploadedFiles = array();
$uploadedFiles1 = array();
$extension = array("jpeg","jpg","png","gif");
$bytes = 1024;
$KB = 1024;
$totalBytes = $bytes * $KB;

$UploadFolder = "../product/small";
 
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
					 "color"=>$array_values2,
					 "allsize"=>$array_values3,
					 "quantity"=>$array_valuesqunt,
					 //"prodcapacity"=>$array_valuescapnew,
					 //"prodtype"=>$array_valuestypenew,
					 "weight"=>$_REQUEST['weight'],
					 "manufacturer"=>$_REQUEST['manufacturer'],
					 "total"=>$_REQUEST['quantity1'],
					 "prod_name"=>$prodname,					
					 "prod_price"=>$_REQUEST['prodprice'],
					 "prod_detail"=>$prod_detail,					
					 "shipping"=>$shipping,
					 "warranty"=>$warranty,		
					 "rpolicy"=>$return,						 
					 "prod_large_image"=>$ppath,						
					 "prod_sprice"=>$_REQUEST['sprodprice'],
					 "prod_date"=>date('Y-m-d h:i:s'),
					 "prod_status"=>$_REQUEST['pstatus'],
					 "material"=>$_REQUEST['material'],
					 "prodsize1"=>$_REQUEST['size'],
					 "prodsize2"=>$_REQUEST['size1'],
					 "prodsize3"=>$_REQUEST['size2'],
					 "prodsize4"=>$_REQUEST['size3'],
					 "newrelease"=>$_REQUEST['newrelease'],	
					 "populer"=>$_REQUEST['populer'],	
					 "shippingcharge"=>$_REQUEST['shippingcharge'],
					 "sort_detail"=>$sort_detail,
					 "featured"=>$_REQUEST['featured'],
					 "prodcapacity"=>$_REQUEST['prodcapacity'],
					 "prodtype"=>$_REQUEST['prodtype'],
					 "star"=>$_REQUEST['star']
					 
				 );
			//print_r($updatearr);//die;
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
				$sql="DELETE FROM prodattributes WHERE prodid='$prodid'";
				$db->query($sql);
				for($i=0;$i<$quantitycount;$i++){
					if(!empty($array_image[$i])){ $img=$array_image[$i]; }else{ $img=$array_update[$i]; }
					if(!empty($array_image1[$i])){ $img1=$array_image1[$i]; }else{ $img1=$array_update1[$i]; }
					$updatearrnew=array(
					"prodid"=>$prodid,
					"prodcolor"=>$colornew[$i],
					 "prodsize"=>$sizenew[$i],
					 "prodquantity"=>$quantitynew[$i],
					 //"prodcapacity"=>$array_valuescapnew1[$i],
					 //"prodtype"=>$array_valuestypenew1[$i],
					 "image_id"=>$img,
					 "thumbnail"=>$img1
					);

				/* 	$whereClausenew=" id=".$array_valuesidsnew[$i];
					if(!empty($array_valuesidsnew[$i])){
					updateData($updatearrnew, 'prodattributes', $whereClausenew);
					}else{			 */		
					$insidq=insertData($updatearrnew, 'prodattributes');		
					//}
				}
					
				    $_SESSION['picid']=uniqid();
			/////////////////////////////////////////////////////////////////
						$_SESSION['id']=$_REQUEST['id'];
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
						unset($_SESSION['id']);/////////////////////////////////////////////////////////////////////////
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){		

					$insid=insertData($updatearr, $_TBL_PROD1);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$_SESSION['id']=$insid;

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

								$insid11=insertData($updatearr1, 'productimage');

										

									}

								}

							}

						

						

						unset($_SESSION['id']);

						

						

						////////////////////////////////////////////////////////////////////////////////////////////
//$errMsg='<br><b>Product Added Successfully!</b><br>';
					if($insid>0)
						{
				$array_image=explode(",",$array_valuesfilenew);
				$colornew=explode(",",$array_values2);
				$sizenew=explode(",",$array_values3);
				$quantitynew=explode(",",$array_valuesqunt);	
				$array_valuescapnew1=explode(",",$array_valuescapnew);
				$array_valuestypenew1=explode(",",$array_valuestypenew);				
				//$clrcount=count($colornew);
				$quantitycount=count($quantitynew);
				//$prodid=$_REQUEST['id'];
				for($i=0;$i<$quantitycount;$i++){
					$updatearr11=array(
					"prodid"=>$insid,
					"prodcolor"=>$colornew[$i],
					 "prodsize"=>$sizenew[$i],
					 "prodquantity"=>$quantitynew[$i],
					 "prodcapacity"=>$array_valuescapnew1[$i],
					 "prodtype"=>$array_valuestypenew1[$i],
					 "image_id"=>$array_image[$i]
					);	
					$insidq=insertData($updatearr11, 'prodattributes');					
				}
						$errMsg='<br><b>Product Added Successfully!</b><br>';
						//redirect('main.php?mod=viewproduct');
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
if (str=="sheet
  {
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
						echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" onchange="return showUser(this.value);" '); 
					
							/* 
							 $sql="SELECT * FROM category";
							$db->query($sql)or die($db->error()); */ ?>

						<!-- <select  name="category" id="category" cid="<?=$subid?>" onchange="return showUser(this.value);" class="form-control">
										<option value="0"><?=$row['catid']?>Select cateory</option><?php
						/* while($row1=$db->fetchArray()){
							if($row1['id']=='16'){ $select='selected';} */
						  
						?>
		
                        <option value="<?=$row1['id']?>" <?=$select?>><?=$row1['catname']?></option>
                  <?php //}?>
				   </select>-->

                                        </div>

                                    </div>
									
									<?php if($act=="edit"){ ?>
									<div class="form-group">
								<?php $subid=$row['catid'];
							 $sql="SELECT * FROM $_TBL_SUBCAT WHERE catid=$subid";
							$db->query($sql)or die($db->error());
							 if($db->numRows()>0){
								
							 ?>
							  <label class="col-md-3 control-label" for="name">  Sub Category</label>

									  <div class="col-md-9">
									 <select  name="subcategory" id="subcategory" cid="<?=$subid?>" class="form-control" onchange="return show3rd(this.value);" >
													<option value="0">Select subcateory</option><?php
									while($row1=$db->fetchArray()){
									if($row1['id']==$row['subcatid']){ $select1='selected';}
								?>
		
                        <option value="<?=$row1['id']?>" <?=$select1?>><?=$row1['subcatname']?></option>
						  <?php }?>
						   </select>
						</div>
						 <?php } ?>
                                    </div>
									<?php } ?>
									
									<?php if($act=="edit"){ ?>
									<div class="form-group">
									<?php $cid=$row['catid'];
									$subcatid=$row['subcatid'];
									 $sql="SELECT * FROM $_TBL_SUBSUBCAT WHERE catid=$cid and subcatid=$subcatid";
$db->query($sql)or die($db->error());
 if($db->numRows()>0){
 ?>
<label class="col-md-3 control-label" for="name">  Ternary Category</label>
 <div class="col-md-9">
		 <select  name="subsubcategory" id="subsubcategory" cid="<?=$cid?>" sid="<?=$subcatid?>" class="form-control" onchange="return show4th(this.value);">
                        <option value="0">Select subcateory</option><?php
		while($row1=$db->fetchArray()){
		  if($row1['id']==$row['subsubcatid']){ $select2='selected';}
		?>
		
                        <option value="<?=$row1['id']?>" <?=$select2?> cid="<?=$row1['catid']?>"><?=$row1['subsubcatname']?></option>
                  <?php }?>
				   </select>

</div>
 <?php } ?>
									 </div>
									<?php } ?>
									
									<?php if($act=="edit"){ 
									$tid=$row['subsubcatid'];
						if(!empty($tid)){
									?>
									<div class="form-group">
									<?php 

						
						 $sql="SELECT * FROM 4thsubcategory WHERE catid=$cid and subcatid=$subcatid and thirdcatid=$tid";
						$db->query($sql)or die($db->error());
						 if($db->numRows()>0){
						 ?>
						  <label class="col-md-3 control-label" for="name">  4Th Category</label>
						 <div class="col-md-9">
							<select  name="4thcatgory" id="4thcatgory" class="form-control">
												<option value="0">Select subcateory</option><?php
								while($row1=$db->fetchArray()){
								if($row1['id']==$row['4thcatid']){ $select3='selected';}  
								?>
		
                        <option value="<?=$row1['id']?>" <?=$select3?> ><?=$row1['thirdsubcatname']?></option>
                  <?php }?>
				   </select> </div>

 <?php } ?>
									 </div>
									<?php } }?>
									

							 <script>
                function showUser(str) {
					
                    if (str == "0") {
                        document.getElementById("subcatid").innerHTML = "";

                        return;
                    } else {

                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else { // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                document.getElementById("subcatid").innerHTML = xmlhttp.responseText;

                            }
                        }

                        xmlhttp.open("GET", "pages/ajax_subcat.php?subcatid=" + str, true);
                        xmlhttp.send();
                    }
                }
				
				
				 function show3rd(str) {
					
					var cid1 = jQuery(this).attr('cid');	
					
					var cid = jQuery('#category').val();	
					
                    if (str == "0") {
                        document.getElementById("subsubcatid").innerHTML = "";

                        return;
                    } else {

                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else { // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                document.getElementById("subsubcatid").innerHTML = xmlhttp.responseText;

                            }
                        }

                        xmlhttp.open("GET", "pages/ajax_2nd.php?subcatid=" + str + '&cid=' + cid, true);
                        xmlhttp.send();
                    }
                }
				
				
				function show4th(str) {
					
					var cid1 = jQuery(this).attr('cid');	
					
					var cid = jQuery('#category').val();
					var sid = jQuery('#subcategory').val();	
					var tid = jQuery('#subsubcategory').val();						
					
                    if (str == "0") {
                        document.getElementById("4thsubcatid").innerHTML = "";

                        return;
                    } else {

                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else { // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                document.getElementById("4thsubcatid").innerHTML = xmlhttp.responseText;

                            }
                        }

                        xmlhttp.open("GET", "pages/ajax_4thcat.php?4thcatid=" + str + '&cid=' + cid + '&subcatid=' + sid, true);
                        xmlhttp.send();
                    }
                }
            </script>		
									
									
                              <div class="form-group" id="subcatid">
  

                                    </div>

									
									
									
									
									
                            <div class="form-group" id="subsubcatid">

                                    </div>

									
									
								 <div class="form-group" id="4thsubcatid">
 

                                    </div>
									
									
									
									
									
									
									
									
									

                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Title</label>

                                        <div class="col-md-6">
										
										<input name="prodname" type="text" class="form-control" value="<?=$row['prod_name']?>" required/>  
								
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

                                        <label class="col-md-3 control-label" for="Weight "> Weight </label>

                                        <div class="col-md-6">
										
										<input name="weight" type="text" class="form-control" value="<?=$row['weight']?>" />  
								
                                        </div>

                                    </div>




									<div class="form-group">

                                        <label class="col-md-3 control-label" for="Manufacturer"> Manufacturer</label>

                                        <div class="col-md-6">
										 <textarea name="manufacturer" class="form-control"><?=$row['manufacturer']?></textarea>
										
										<!--<input name="manufacturer" type="text" class="form-control" value="<?=$row['manufacturer']?>" /> 	-->							
                                        </div>
                                    </div>


									
									 <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Star</label>

                                        <div class="col-md-6">
					   
    <input name="star" type="text" class="form-control" value="<?=$row['star']?>" placeholder="1-5"/>     
                                        </div>

                                    </div>
									
									 <!--<div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Color</label>

                                        <div class="col-md-6">
					   
    <input name="color" type="text" class="form-control" value="<?=$row['color']?>" placeholder="Color"/>     
                                        </div>

                                    </div>-->

									 
									  <div class="form-group">

                                        <label class="col-md-3 control-label" for="name"> Shipping Charge</label>

                                        <div class="col-md-6">
					   
    <input name="shippingcharge" type="text" class="form-control" value="<?=$row['shippingcharge']?>" placeholder="shipping charge "/>     


                                       

                                        </div>

                                    </div>

									


 <div class="form-group">

                                        <label class="col-md-3 control-label" for="material">Material</label>

                                        <div class="col-md-6">
								   
	<input name="material" type="text" class="form-control" value="<?=$row['material']?>"/> 

                                        </div>

                                    </div>
									
									<!-- <div class="form-group">

                                        <label class="col-md-3 control-label" for="size"> Size</label>

                                        <div class="col-md-6">
								   

	 
	 <input type="checkbox" name="size" value="S" <?php if($row['prodsize1']=='S'){echo "checked";}?> />Small<br />
        <input type="checkbox" name="size1" value="M" <?php if($row['prodsize2']=='M'){echo "checked"; } ?>/> Medium <br />
        <input type="checkbox" name="size2" value="L" <?php if($row['prodsize3']=='L'){echo "checked";} ?> />Large<br />
        <input type="checkbox" name="size3" value="EXL" <?php if($row['prodsize4']=='EXL'){echo "checked";}?> />Extra Large <br />
                                        </div>

                                    </div>-->
									
									 <div class="form-group">

                                        <label class="col-md-3 control-label" for="size">Total Quantity</label>

                                        <div class="col-md-6">
								   
	<input name="quantity1" type="text" class="form-control" placeholder="100" value="<?=$row['total']?>" /> 

                                        </div>

                                    </div>
									
								<div class="form-group">
								
								<?php //echo $array_values; ?>
								 <label class="col-md-3 control-label" for="size"> Add Attribute  (If applicabe)</label>
				<div class="col-md-6">
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
				$prodcapacitynew=explode(",",$prodcapacity);
				
			/* 	if(!empty($color)){
				$colornew=explode(",",$color);
				//print_r($color);
				$colorcount=count($colornew);
				$allsizenew=count($allsizenew);
				$prodtype=count($prodtype);
				$prodtypenew=count($prodtypenew);
				$prodcapacity=count($prodcapacity);
				for($i=0;$i<$colorcount;$i++){ */
				?>
				<!--<div><input type="text" name="input_array_name[]" class="form-control" placeholder="Input Color" value="<?=$colornew[$i]?>" /></div>
				<div><input type="text" name="input_array_size[]" class="form-control"  placeholder="Input size" value="<?=$allsizenew[$i]?>" /></div>
				<div><input type="text" name="input_array_qtn[]" class="form-control"  placeholder="Input Quantity" value="<?=$quantitynew[$i]?>" /></div>
				<div><input type="text" name="input_array_type[]" class="form-control" placeholder="Input Type" value="<?=$prodtypenew[$i]?>" /></div>
				<div><input type="text" name="input_array_capacity[]" class="form-control" placeholder="Input Capacity" value="<?=$prodcapacitynew[$i]?>" /></div>-->
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
				
				<div><input type="text" name="input_array_name[]" class="form-control" placeholder="Input Color" value="<?=$rownew['prodcolor']?>" /></div>
				<div><input type="file" name="input_array_file[]" class="form-control" placeholder="Input File" /></div>
				
				<div><input type="file" name="input_array_file1[]" class="form-control" placeholder="Thumbnail File" /></div>
				<div><input type="text" name="input_array_size[]" class="form-control"  placeholder="Input size" value="<?=$rownew['prodsize']?>" /></div>
				<div><input type="text" name="input_array_qtn[]" class="form-control"  placeholder="Input Quantity" value="<?=$rownew['prodquantity']?>" /></div>
				<!--<div><input type="text" name="input_array_type[]" class="form-control" placeholder="Input Type" value="<?=$rownew['prodtype']?>" /></div>
				<div><input type="text" name="input_array_capacity[]" class="form-control" placeholder="Input Capacity" value="<?=$rownew['prodcapacity']?>" /></div>-->
				
				
					<?php }}  //} }
				if(empty($color)){
				?>
					<div><input type="text" name="input_array_name[]" class="form-control" placeholder="Input Color" /></div>
					<div><input type="file" name="input_array_file[]" class="form-control" placeholder="Input File" /></div>
					<div><input type="file" name="input_array_file1[]" class="form-control" placeholder="Input File" /></div>
					<div><input type="text" name="input_array_size[]" class="form-control" placeholder="Input Size" /></div>
					<div><input type="text" name="input_array_qtn[]" class="form-control" placeholder="Input Quantity" required /></div>
					
				<?php } ?>
					
						</div>
					<br/>
					<p><button class="add_fields">Add More</button></p>
					</div>
					</div>
									
<!--							
<div class="form-group">
								
								<?php //echo $array_values; ?>
								 <label class="col-md-3 control-label" for="size"> Add Size (If applicabe)</label>
				<div class="col-md-6">
				<div class="wrapper1">
				<?php 
				$allsize=$row['allsize'];
				$allsizenew=explode(",",$allsize);
				//print_r($color);
				$allsizecount=count($allsizenew);
				for($i=0;$i<$allsizecount;$i++){
				?>
				<div><input type="text" name="input_array_size[]" placeholder="Input size" value="<?=$allsizenew[$i]?>" /></div>
				<?php }
				
				?>
					<div><input type="text" name="input_array_size[]" placeholder="Input Size" /></div>
						</div>
					<br/>
					<p><button class="add_fields1">Add More</button></p>
					</div>
					</div>
								-->	
								<div class="form-group">

                                        <label class="col-md-3 control-label" for="prodtype"> Product Type</label>

                                        <div class="col-md-6">
										
										<input name="prodtype" type="text" class="form-control" value="<?=$row['prodtype']?>" /> 								
                                        </div>
                                    </div>
									
									<div class="form-group">

                                        <label class="col-md-3 control-label" for="prodcapacity"> Product Capacity</label>

                                        <div class="col-md-6">
										
										<input name="prodcapacity" type="text" class="form-control" value="<?=$row['prodcapacity']?>" /> 								
                                        </div>
                                    </div>

										<div class="form-group">
        									<label class="col-md-3 control-label"> Over View</label>
            									<div class="col-md-9">

                                                      <textarea name="sort_detail" class="form-control"><?=$row['sort_detail']?></textarea>
            									</div>

        								</div>
                                    

                                   

        							

                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Product Details </label>
            									<div class="col-md-9">
                                                      <textarea name="prod_desc" class="form-control"><?=$row['prod_detail']?></textarea>
            									</div>
        								</div>												
										<div class="form-group">
        									<label class="col-md-3 control-label"> Shipping </label>
            									<div class="col-md-9">
                                                      <textarea name="shipping" class="form-control"><?=$row['shipping']?></textarea>
            									</div>
        								</div>
										
										<div class="form-group">
        									<label class="col-md-3 control-label"> Warranty </label>
            									<div class="col-md-9">
                                                      <textarea name="warranty" class="form-control"><?=$row['warranty']?></textarea>
            									</div>
        								</div>
										
										<div class="form-group">
        									<label class="col-md-3 control-label"> Return Policy </label>
            									<div class="col-md-9">
                                                      <textarea name="return-policy" class="form-control"><?=$row['rpolicy']?></textarea>
            									</div>
        								</div>

										<div class="form-group">
                                         <script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script><script>tinymce.init({    selector: "textarea",            height: 250,    theme: "modern",    plugins: [        "advlist autolink lists link image charmap print preview hr anchor pagebreak",        "searchreplace wordcount visualblocks visualchars code fullscreen",        "insertdatetime media nonbreaking save table contextmenu directionality",        "emoticons template paste textcolor"    ],            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons",    image_advtab: true,    templates: [        { title: 'Test template 1', content: 'Test 1' },        { title: 'Test template 2', content: 'Test 2' }    ]});</script>  

                                        

                                    

                                    

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
    <div class="form-group" style="margin-left:20px;">
	<?php 
		if(!empty($_SESSION['sess_pid'])){
		$sql1="SELECT * FROM productimage WHERE pid=".$_REQUEST['id'];
		$db->query($sql1)or die($db->error());
		while($row1=$db->fetchArray()){	?>
				<img src="../product/<?=$row1['imgid']?>" width="100"  height="100"/>
				<a href='javascript:deladmin("<?=$row1['imgid']?>")'><img height="16" alt="Delete " src="images/delete.png" width="16" border="0" /></a>
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

                                          

                                       <div class="form-group">

                                        <label class="col-md-3 control-label"> Populer</label>

                                        <div class="col-md-9">

                                           

                                        

                                            <div class="radio">

                                                <label>

                                                      <input name="populer" type="radio" value="yes"<?php if($row['populer']=="yes"){echo " checked";}?>/>Yes
						

            

                                                </label>

                                            </div>

                                            <div class="radio">

                                                <label>

                                               
							<input name="populer" type="radio" value="no"<?php if($row['populer']=="no"){echo " checked";}?>/>No

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                         

  <div class="form-group">
                                        <label class="col-md-3 control-label"> Featured</label>

                                        <div class="col-md-9">
                                            <div class="radio">

                                                <label>

                                                      <input name="featured" type="radio" value="yes" <?php if($row['featured']=="yes"){echo " checked";}?>/>Yes

                                                </label>

                                            </div>

                                            <div class="radio">

                                                <label>

                                               
							<input name="featured" type="radio" value="no" <?php if($row['featured']=="no"){ echo " checked";}?>/>No

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                               										 

                                        

                                       

                                

                                

                                

								<!-- Message body -->

								 

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
	
	
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
//Add Input Fields
$(document).ready(function() {
    var max_fields = 10; //Maximum allowed input fields 
    var wrapper    = $(".wrapper"); //Input fields wrapper
    var add_button = $(".add_fields"); //Add button class or ID
	var x = 1; //Initlal input field is set to 1
	
	//When user click on add input button
	$(add_button).click(function(e){
        e.preventDefault();
		//Check maximum allowed input fields
        if(x < max_fields){ 
            x++; //input field increment
			 //add input field
            $(wrapper).append('<div><input type="text" name="input_array_name[]" placeholder="Input Other Color" class="form-control"/> <a href="javascript:void(0);" class="remove_field">Remove</a></div><div><input type="file" name="input_array_file[]" placeholder="Input file" class="form-control" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div><div><input type="file" name="input_array_file1[]" placeholder="Input file" class="form-control" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div><div><input type="text" name="input_array_size[]" placeholder="Input size" class="form-control" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div><div><input type="text" name="input_array_qtn[]" class="form-control" placeholder="Input Quantity" required /> <a href="javascript:void(0);" class="remove_field">Remove</a></div>');
        }
    });
	/* <div><input type="text" name="input_array_type[]" class="form-control" placeholder="Input Type" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div><div><input type="text" name="input_array_capacity[]" class="form-control" placeholder="Input Capacity" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div> */
    //when user click on remove button
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault();
		$(this).parent('div').remove(); //remove inout field
		x--; //inout field decrement
    })
});


$(document).ready(function() {
    var max_fields = 10; //Maximum allowed input fields 
    var wrapper    = $(".wrapper1"); //Input fields wrapper
    var add_button = $(".add_fields1"); //Add button class or ID
	var x = 1; //Initlal input field is set to 1
	
	//When user click on add input button
	$(add_button).click(function(e){
        e.preventDefault();
		//Check maximum allowed input fields
        if(x < max_fields){ 
            x++; //input field increment
			 //add input field
            $(wrapper).append('<div><input type="text" name="input_array_size[]" placeholder="Input Other Size" /> <a href="javascript:void(0);" class="remove_field1">Remove</a></div>');
        }
    });
	
    //when user click on remove button
    $(wrapper).on("click",".remove_field1", function(e){ 
        e.preventDefault();
		$(this).parent('div').remove(); //remove inout field
		x--; //inout field decrement
    })
});
</script>