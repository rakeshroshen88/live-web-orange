<?php include("header.php"); 
//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$db2=new DB();
$makearr=array();
$makearr=getValuesArr( "countries", "countries_id","countries_name","", "" );
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
	
		
	$up=new UPLOAD();
$uploaddir1="../../upload/food_ordering/restaurant/";
$uploaddir2="../../upload/food_ordering/restaurant/";
$uploaddir3="../../upload/food_ordering/restaurant/";
$check_type="jpg|jpeg|gif|png";
/////////////////////////////////////////////////////////////////////////////////////////////////
$valid_formats = array("jpg", "png", "gif");
$max_file_size = 1024*100000; //100 kb
$path = "../../upload/food_ordering/restaurant/";
$count = 0;
 $_SESSION['picid']=uniqid();

	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
					//$image.=$name.',';
					 $updatearrimg=array(
					 "res_id"=>$_SESSION["picid"],
					 "image"=>$name,
					 "userid"=>$_SESSION['SES_ADMIN_ID']
						);	
				$insidi=insertData($updatearrimg, 'restaurant_image');
					 
					
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}







 $prod_detail=$_REQUEST['prod_desc'];
 if(empty($_REQUEST['cityname'])){
	$city=$_REQUEST['cityid'];
}else{
	$city=$_REQUEST['cityname'];
	
}

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

$array_valuescap=array();
if (isset($_POST["input_array_capacity"]) && is_array($_POST["input_array_capacity"])){ 
	$input_array_capacity = array_filter($_POST["input_array_capacity"]); 
    foreach($input_array_capacity as $field_valuecap){
        $array_valuescap[]= $field_valuecap;
    }
}
$array_valuescapnew=implode(",",$array_valuescap);
				
$array_valuesid=array();
				if (isset($_POST["input_array_id"]) && is_array($_POST["input_array_id"])){ 
					$input_array_id = array_filter($_POST["input_array_id"]); 
					foreach($input_array_id as $field_valueid){
						$array_valuesid[]= $field_valueid;
					}
				}
				$array_valuesids=implode(",",$array_valuesid);	
				$sizenew=explode(",",$array_values3);
				$quantitynew=explode(",",$array_valuesqunt);
				$array_valuescapnew1=explode(",",$array_valuescapnew);				
				$array_valuesidsnew=explode(",",$array_valuesids);
				$quantitycount=count($quantitynew);
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

$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$prod_detail = mysqli_real_escape_string($link, $prod_detail);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);	
$updatearr=array(	
					 "title"=>$title,	
					 "desciption"=>$prod_detail,
					"food_type"=>$_REQUEST['food_type'],					 
					 "pin_code"=>$_REQUEST['pin_code'],
					 "delivery_avg_time"=>$_REQUEST['delivery_avg_time'],
					 "main_image"=>$largeimage,	
					  "slider_image"=>$image,						 
					  "starrating"=>$_REQUEST['star'],
					  "Status"=>$_REQUEST['pstatus'],
					  "state_id"=>$_REQUEST['state'],
					  "country_id"=>$_REQUEST['country'],
					  "landmark"=>$_REQUEST['landmark'],
					  "address"=>$address,
					  "city_id"=>$city,	
					  "featured"=>$_REQUEST['featured'],						
					 "date"=>date('Y-m-d')
					 );
		
				//print_r($updatearr);
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, 'resturant_detail', $whereClause);
					
					if(isset($_SESSION["picid"]))
					{
					$db->query("update restaurant_image set res_id=".$_REQUEST['id']." where res_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
					unset($_SESSION["picid"]);
					}else{
				$db->query("update restaurant_image set res_id=".$_REQUEST['id']." where res_id='".$_REQUEST['id']."' and userid=".$_SESSION['SES_ADMIN_ID']);		
					}
					
					for($i=0;$i<$quantitycount;$i++){				
					$updatearrnew=array(
					"res_id"=>$id,					
					 "day"=>$sizenew[$i],
					  "open_time"=>$quantitynew[$i],					 
					 "close_time"=>$array_valuescapnew1[$i]
					);

					$whereClausenew=" id=".$array_valuesidsnew[$i];
					if(!empty($array_valuesidsnew[$i])){
					updateData($updatearrnew, 'restaurant_hours', $whereClausenew);
					}else{					
					$insidq=insertData($updatearrnew, 'restaurant_hours');		
					}
				}
					$errMsg='<br><b>Update Successfully!</b><br>';
					
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'resturant_detail');
					
					if($insid>0)
						{
							
							for($i=0;$i<$quantitycount;$i++){				
					$updatearrnew=array(
					"res_id"=>$insid,					
					  "day"=>$sizenew[$i],
					  "open_time"=>$quantitynew[$i],					 
					 "close_time"=>$array_valuescapnew1[$i]
					);

					
					$insidq=insertData($updatearrnew, 'restaurant_hours');		
					
				}
					
							
							$db->query("update restaurant_image set res_id=".$insid." where res_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
							unset($_SESSION["picid"]);
							$errMsg='<br><b>Added Successfully!</b><br>';
							
							
							
						}else{
							$errMsg1='<br><b>Error!</b><br>';
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM resturant_detail WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Restaurant</a></li>


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
				<form name="frmprod"  method="post" action=""  enctype="multipart/form-data"  id="restaurant">
						
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="cityid" value="<?=$row['cityid']?>" />
						<input type="hidden" name="image3" value="<?=$row['picture']?>" />
						<input name="gallery" type="hidden" value="hotal"/>  
						<input type="hidden" name="extraoption1" id="extraoption1" value="" />
						<input type="hidden" name="extraoption2" id="extraoption2" value="" />
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

                                         

                                                

                                                    <div class="row" >
													<div class="form-group col-md-4">
                                        <label class="col-md-12 control-label" for="name"> Country<span class="required">*</span></label>
                                        <div class="col-md-12">
										<?php echo createComboBox($makearr,"country",$row['country_id'] ," id='country' class='form-control country' required")?>
                                      
                                        </div><br>
                                    </div>
									
									
								
<script>


jQuery(document).on("click", ".submit ", function(e){
	
	var a=$('#tinymce').contents().find('body').text();
	alert('hi');
	var state = $("#state").val();
	var prod_desc = $("#prod_desc").val();
	alert(prod_desc);
	var food_type = $("#food_type").val();
	   if(state=='' || state==0){ 
		$( "#state" ).focus();
		alert('Select State!');
		return false;
	   }
	    if(food_type=='' || food_type==0){ 
		$( "#food_type" ).focus();
		alert('Select Food Type!');
		return false;
	   }
	   
	   
	   var editorContent = tinyMCE.get('prod_desc').getContent();
if (editorContent == '')
{
    alert('ho');
}
else
{
	 alert('hoqq');
    // Editor contains a value
}
	    /* if(prod_desc=='' || prod_desc==0){ 
		$( "#prod_desc" ).focus();
		alert('Description!');
		//return false;
	   } */
	});



</script>
											      <div class="form-group col-md-4" id="showstate">
													
<?php $stateid=$row['state_id'];
if(!empty($stateid)){
 $sqlstate="SELECT * FROM state WHERE country_id=".$row['country_id'];

$db->query($sqlstate)or die($db->error());
 if($db->numRows()>0){
 ?>
  <label class="col-md-12 control-label" for="name"> State<span class="required">*</span></label>
 <div class="col-md-12">
		 <select  name="state" id="state" class="form-control state" required>
         <option value="0">Select State</option>
		 <?php
			while($row1=$db->fetchArray()){		  
		 ?>
			<option value="<?=$row1['id']?>" <?php if($row1['id']==$stateid){ echo "selected"; }?> ><?=$row1['name']?></option>
        <?php }?>
		</select>
		</div><br/>

 <?php } } ?>
                                       
													</div>
                                                        
                                                   <div class="form-group col-md-4" id="showcity">
<?php
		$city=$row['city_id'];
  if(!empty($city)){
  $sql1="SELECT * FROM cities WHERE state_id='$stateid'";
  $db1->query($sql1)or die($db1->error());?>
		 <label class="col-md-12 control-label" for="name"> Select City</label>
          <div class="col-md-12">
		 <select  name="cityname" id="cityname"  class="form-control">
                        <option>Select city</option><?php
		while($row1=$db1->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>" <?php if($row1['id']==$city){ echo "selected"; }?>><?=$row1['name']?></option>
                  <?php }?>
				   </select>
  </div>
  <?php }?>
                                       
													</div>
                                                        
													
													</div>
													
													<div class="row" >
													 
                                                    </div>
													<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Restaurant Name<span class="required">*</span></label>
                                        <div class="col-md-12">
                                        <input name="title" type="text" class="form-control" value="<?=$row['title']?>" required/>  
                                        </div>
                                    </div>
									
													<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Restaurant Type<span class="required">*</span></label>
                                        <div class="col-md-12">
							<?php 
                             
							$sql="SELECT * FROM recipe_categories";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="food_type" id="food_type"  class="form-control" required>
						 <option value="0">Select  Type</option>
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['catname']?>" <?php if($row2['catname'] == $row['food_type']){ echo 'selected'; } ?>><?=$row2['catname']?></option>
                  <?php }?>
				   </select>
                                        </div>
                                    </div>
                                                        
                                                    </div>
<br>
								<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Address<span class="required">*</span></label>
                                        <div class="col-md-12">
                                        <input name="address" type="text" class="form-control" value="<?=$row['address']?>" required/>  
                                        </div>
                                    </div>
									
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Zip code <span class="required">*</span></label>
                                        <div class="col-md-12">
                                         <input name="pin_code" type="text" class="form-control" value="<?=$row['pin_code']?>" required/>
                                        </div>
                                    </div>
									</div>
									<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Delivery Avg Time(In Minutes) <span class="required">*</span></label>
                                        <div class="col-md-12">
                                         <input name="delivery_avg_time" type="text" class="form-control" value="<?=$row['delivery_avg_time']?>" placeholder="In Minutes" required/>
                                        </div>
                                    </div>
									
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Landmark :</label>
                                        <div class="col-md-12">
                                         <input name="landmark" type="text" class="form-control" value="<?=$row['landmark']?>"/>
                                        </div>
                                    </div>
									</div>
								
								   	<div class="row" >
								 <div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name">Star Rating:(0-5):</label>
                                        <div class="col-md-12">
                        <select id="star" name="star" class="form-control" >
                        <option value='0' <?php if($row['starrating'] == 0){ echo 'selected'; } ?>>Select Rating</option>
						<option value='1' <?php if($row['starrating'] == 1){ echo 'selected'; } ?>>1 Star Rating</option>
						<option value='2' <?php if($row['starrating'] == 2){ echo 'selected'; } ?>>2 Star Rating</option>
						<option value='3' <?php if($row['starrating'] == 3){ echo 'selected'; } ?>>3 Star Rating</option>
						<option value='4' <?php if($row['starrating'] == 4){ echo 'selected'; } ?>>4 Star Rating</option>
						<option value='5' <?php if($row['starrating'] == 5){ echo 'selected'; } ?>>5 Star Rating</option>
						 </select>
                                        </div>
                                    </div>
									
									
										<div class="form-group col-md-6">
                									<label class="col-md-12 control-label"> Featured</label>
                									<div class="col-md-12">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="featured" type="radio" value="1"<?php if($row['featured']=="1"){echo " checked";}?>/>Yes
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="featured" type="radio" value="0"<?php if($row['featured']=="0"){echo " checked";}?>/>No
                    										</label>
                    									</div>
														</div> 
														</div>
											
								</div>
								
								
								<!--
									<div class="row" >
							   <div class="form-group">
                                        <label class="col-md-2 control-label" for="sortdetail"> Sort Details</label>
                                        <div class="col-md-10">
                                      <textarea name="sortdetail" cols="50" rows="5" class="editor-base" ><?=$row['sortdetail']?></textarea>
                                        </div>
                                    </div>
							   </div>-->
							   <div class="row" >
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Description<span class="required">*</span></label>
                                        <div class="col-md-12">
                                      <textarea name="prod_desc" id="prod_desc" cols="50" rows="5" class="editor-base" ><?=$row['desciption']?></textarea>
                                        </div>
                                    </div>
												
                    
<div class="form-group col-md-6">
        									<label class="col-md-12 control-label"> Image</label>
        									<div class="col-md-12">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['main_image']){?><a href="javascript:void(0)" onclick="javascript:window.open('../resviewaimage.php?img=<?=$row['main_image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
</div>  
  <div class="row">
  <div class="form-group col-md-6">
        									<label class="col-md-12 control-label"> Multiple Image:</label>
        									<div class="col-md-12">
                                                  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><span style="color:#FF0000;">(jpg, gif, png)</span> 
        									 
        									</div>
        								</div>

										 	<div class="form-group col-md-6">
                									<label class="col-md-12 control-label"> Status<span class="required">*</span></label>
                									<div class="col-md-12" required>
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1"<?php if($row['Status']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0"<?php if($row['Status']=="0"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
														</div> 
														</div>
														</div>
														
<div class="form-group ">
								 <div class="row">
								<?php //echo $array_values; ?>
								 <label class="col-md-2 control-label" for="size"> Add Working Days/Hour</label>
				<div class="col-md-10">
				<div class="wrapper">
				
				
			
				<?php 
				$sql="SELECT * from business_hours where business_id='$id'";
				$db->query($sql);
				if($db->numRows()>0)
					{
				while($rownew=$db->fetchArray()){
				?>
			<input type="hidden" name="input_array_id[]"  value="<?=$rownew['id']?>" />
				
				<div class="row" style="display: flex;">
				
				
				
				<div class="col-md-2">
					<label class="" for="Days"> Days</label>
					
<select  name="input_array_size[]" class="form-control" >
<option value="Monday" <?php if($rownew['day']=='Monday'){ echo "selected";} ?>>Monday</option>
<option value="Tuesday" <?php if($rownew['day']=='Tuesday'){ echo "selected";} ?>>Tuesday</option>
<option value="Wednesday" <?php if($rownew['day']=='Wednesday'){ echo "selected";} ?>>Wednesday</option>
<option value="Thursday" <?php if($rownew['day']=='Thursday'){ echo "selected";} ?>>Thursday</option>
<option value="Friday" <?php if($rownew['day']=='Friday'){ echo "selected";} ?>>Friday</option>
<option value="Saturday" <?php if($rownew['day']=='Saturday'){ echo "selected";} ?>>Saturday</option>
<option value="Sunday" <?php if($rownew['day']=='Sunday'){ echo "selected";} ?>>Sunday</option>
</select>
					</div>
				<div class="col-md-2">
					<label class="" for="Opening Time"> Opening Time</label>
					
					<select  name="input_array_qtn[]" class="form-control" >
<option value="01:00 AM" <?php if($rownew['open_time']=='01:00 AM'){ echo "selected";} ?>>01:00 AM</option>
<option value="02:00 AM" <?php if($rownew['open_time']=='02:00 AM'){ echo "selected";} ?>>02:00 AM</option>
<option value="03:00 AM" <?php if($rownew['open_time']=='03:00 AM'){ echo "selected";} ?>>03:00 AM</option>
<option value="04:00 AM" <?php if($rownew['open_time']=='04:00 AM'){ echo "selected";} ?>>04:00 AM</option>
<option value="05:00 AM" <?php if($rownew['open_time']=='05:00 AM'){ echo "selected";} ?>>05:00 AM</option>
<option value="06:00 AM" <?php if($rownew['open_time']=='06:00 AM'){ echo "selected";} ?>>06:00 AM</option>
<option value="07:00 AM" <?php if($rownew['open_time']=='07:00 AM'){ echo "selected";} ?>>07:00 AM</option>
<option value="08:00 AM" <?php if($rownew['open_time']=='08:00 AM'){ echo "selected";} ?>>08:00 AM</option>
<option value="09:00 AM" <?php if($rownew['open_time']=='09:00 AM'){ echo "selected";} ?>>09:00 AM</option>
<option value="10:00 AM" <?php if($rownew['open_time']=='10:00 AM'){ echo "selected";} ?>>10:00 AM</option>
<option value="11:00 AM" <?php if($rownew['open_time']=='11:00 AM'){ echo "selected";} ?>>11:00 AM</option>
<option value="12:00 AM" <?php if($rownew['open_time']=='12:00 AM'){ echo "selected";} ?>>12:00 AM</option>
<option value="Closed" >Closed</option>
</select>
	
					
					</div>
					
					
				<div class="col-md-2">
				<label class="" for="Days"> Closing Time</label>
				
				
				<select  name="input_array_capacity[]" class="form-control" >
<option value="01:00 PM" <?php if($rownew['close_time']=='01:00 PM'){ echo "selected";} ?>>01:00 PM</option>
<option value="02:00 PM" <?php if($rownew['close_time']=='02:00 PM'){ echo "selected";} ?>>02:00 PM</option>
<option value="03:00 PM" <?php if($rownew['close_time']=='03:00 PM'){ echo "selected";} ?>>03:00 PM</option>
<option value="04:00 PM" <?php if($rownew['close_time']=='04:00 PM'){ echo "selected";} ?>>04:00 PM</option>
<option value="05:00 PM" <?php if($rownew['close_time']=='05:00 PM'){ echo "selected";} ?>>05:00 PM</option>
<option value="06:00 PM" <?php if($rownew['close_time']=='06:00 PM'){ echo "selected";} ?>>06:00 PM</option>
<option value="07:00 PM" <?php if($rownew['close_time']=='07:00 PM'){ echo "selected";} ?>>07:00 PM</option>
<option value="08:00 PM" <?php if($rownew['close_time']=='08:00 PM'){ echo "selected";} ?>>08:00 PM</option>
<option value="09:00 PM" <?php if($rownew['close_time']=='09:00 PM'){ echo "selected";} ?>>09:00 PM</option>
<option value="10:00 PM" <?php if($rownew['open_time']=='10:00 PM'){ echo "selected";} ?>>10:00 PM</option>
<option value="11:00 PM" <?php if($rownew['close_time']=='11:00 PM'){ echo "selected";} ?>>11:00 PM</option>
<option value="12:00 PM" <?php if($rownew['close_time']=='12:00 PM'){ echo "selected";} ?>>12:00 PM</option>
<option value="Closed" >Closed</option>
</select>
				
				
				</div>
					
					
					<div class="col-md-2" style="margin-top: 30px;">
					<a href='javascript:deladmin("<?=$rownew['id']?>")' > <span class="glyphicon glyphicon-trash" title="Delete"></span>						</a>
					</div>
				</div>
				
					<?php } } 
				if(empty($id)){ 
				?>
				<div class="row" style="display: flex;">
					
					<div class="col-md-2">
					<label class="" for="day"> Days</label>
<select  name="input_array_size[]" class="form-control" >
<option value="Monday" >Monday</option>
<option value="Tuesday" >Tuesday</option>
<option value="Wednesday" >Wednesday</option>
<option value="Thursday" >Thursday</option>
<option value="Friday" >Friday</option>
<option value="Saturday">Saturday</option>
<option value="Sunday" >Sunday</option>
</select>
					
					</div>
					<div class="col-md-2">
					<label class="" for="Opening Time"> Opening Time</label>
<select  name="input_array_qtn[]" class="form-control" >
<option value="01:00 AM" >01:00 AM</option>
<option value="02:00 AM" >02:00 AM</option>
<option value="03:00 AM" >03:00 AM</option>
<option value="04:00 AM" >04:00 AM</option>
<option value="05:00 AM" >05:00 AM</option>
<option value="06:00 AM" >06:00 AM</option>
<option value="07:00 AM" >07:00 AM</option>
<option value="08:00 AM" >08:00 AM</option>
<option value="09:00 AM" >09:00 AM</option>
<option value="10:00 AM" >10:00 AM</option>
<option value="11:00 AM" >11:00 AM</option>
<option value="12:00 AM" >12:00 AM</option>
<option value="Closed" >Closed</option>
</select>
	
					</div>					
					
				<div class="col-md-2">
				<label class="" for="Closing Time"> Closing Time</label>
				
				
<select  name="input_array_capacity[]" class="form-control" >
<option value="01:00 PM" >01:00 PM</option>
<option value="02:00 PM" >02:00 PM</option>
<option value="03:00 PM" >03:00 PM</option>
<option value="04:00 PM" >04:00 PM</option>
<option value="05:00 PM" >05:00 PM</option>
<option value="06:00 PM" >06:00 PM</option>
<option value="07:00 PM" >07:00 PM</option>
<option value="08:00 PM" >08:00 PM</option>
<option value="09:00 PM" >09:00 PM</option>
<option value="10:00 PM" >10:00 PM</option>
<option value="11:00 PM" >11:00 PM</option>
<option value="12:00 PM" >12:00 PM</option>
<option value="Closed" >Closed</option>
</select>
				</div>
					
					
				</div>
				<?php } ?>
					
						</div>
					<br/>
					<p><button class="add_fields btn btn-info pull-right hidden-mobile">Add More</button></p>
				</div>
					</div>
			</div>		



 <div class="row">
										 			
														</div>

<!--
<div class="row">
<div class="form-group">
<?php if($act=="edit")
	{ ?>
<label class="col-md-2 control-label"> Additional Image:</label>
	<?php } ?>
<div class="col-md-10">                								
 <tr>
<td ></td>                                                
 <?php	
 $db2=new DB();
 if($act=="edit")
	{

		 $sql2="SELECT * FROM restaurant_image WHERE res_id=".$_REQUEST['id'];
		$db2->query($sql2)or die($db2->error());
			
	
	}?>   
    <?php if($db2->numRows()>0)	
	{
		$inum=0;		
		while($imagerow=$db2->fetchArray()){
			
			if($inum>3){				
			echo $newtr='</tr><tr><td>';
			$inum=0;
			}else{$newtr='<td>';}
		
?>
 <?=$newtr?><span id='<?=$imagerow['id']?>'><img src="<?=$_SITE_PATH?>upload/food_ordering/restaurant/<?=$imagerow['image']?>" style="width:100px; height:100px;" /><a href="javascript:void(0)" id="submit1" atr="<?=$imagerow['id']?>" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a></span></td>
  
<?php $inum=($inum+1); }
 
 }else{ echo "Not Available";} 
 
?>
	

</td>
</tr>	                                     	
</div>                                      
-->
<div class="row">
<div class="form-group">
<label class="col-md-2 control-label"></label>
<div class="col-md-10">                								
 <tr>
<td ></td>                                                
 <?php	if($act=="edit")
	{

		 $sql2="SELECT * FROM restaurant_image WHERE res_id=".$_REQUEST['id'];
		$db2->query($sql2)or die($db2->error());
			
	
	}?>   
    <?php if($db2->numRows()>0)	
	{
		$inum=0;		
		while($imagerow=$db2->fetchArray()){
			
			if($inum>3){				
			echo $newtr='</tr><tr><td>';
			$inum=0;
			}else{$newtr='<td>';}
		
?>
 <?=$newtr?><span id='<?=$imagerow['id']?>'>
 <?php if(!empty($imagerow['image'])){ ?>
 <img src="<?=$_SITE_PATH?>upload/food_ordering/restaurant/<?=$imagerow['image']?>" style="width:100px; height:100px;" />
 
 <a href="javascript:void(0)" id="submit1" atr="<?=$imagerow['id']?>" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a>
 <?php }else{?>
 
  <img src="<?=$_SITE_PATH?>img/noimage.jpg" style="width:100px; height:100px;" />
 
 <a href="javascript:void(0)" id="submit1" atr="<?=$imagerow['id']?>" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a>
 <?php }?>
 </span></td>
  
<?php $inum=($inum+1); }
 
 } 
 
?>
	

</td>
</tr>	                                     	
</div>                                      


<!--
<div class="row">
<div class="form-group">
<label class="col-md-2 control-label"></label>
<div class="col-md-10">                								
 <tr>
<td ></td>                                                
 <?php	if($act=="edit")
	{
		$inum=0;		
		$slider_image=$row['slider_image'];
		$slider_image=explode(",",$slider_image);
		$cnt=count($slider_image);
		for($i=0;$i<=$cnt; $i++){
			
			if($inum>3){				
			echo $newtr='</tr><tr><td>';
			$inum=0;
			}else{$newtr='<td>';}
		
?>
 <?=$newtr?><span id='<?=$imagerow['id']?>'>
 
 <img src="<?=$_SITE_PATH?>upload/food_ordering/restaurant/<?=$slider_image[$i]?>" style="width:100px; height:100px;" />
 
 <a href="javascript:void(0)" id="submit1" atr="<?=$slider_image[$i]?>" onClick="deleteFile('<?=$slider_image[$i]?>');">Delete</a></span></td>
  
<?php $inum=($inum+1); }
 
 } 
 
?>
	

</td>
</tr>	                                     	
</div>                                      
</div>



   </div>
   
   -->

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

<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed submit" value="Save"  />
                               

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
<script>
jQuery(document).on("change","#country",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajstate.php';
        var dataString ="cid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showstate').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#state",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajcity.php';
        var dataString ="sid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showcity').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#cityname1",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajhotel.php';
        var dataString ="hid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showhotel').html(response);
                }else{
                
                }
            },
        });
});

</script>

	<script>

function showUser(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHint").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
	
    }
  }
  
xmlhttp.open("GET","pages/ajcity.php?q="+str,true);
xmlhttp.send();
}
}



function showhotel(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHinthotel").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
		
    document.getElementById("txtHinthotel").innerHTML=xmlhttp1.responseText;
	
	
    }
  }
  
xmlhttp1.open("GET","pages/ajhotel.php?q="+str,true);
xmlhttp1.send();
}
}

</script>														  
<script language="javascript">
function getCheckedCheckboxesFor(checkboxName) {
    var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
		
		$('#emplist').val(values);
    });
    return values;
}
	</script>
	
	
	
	<script language="javascript">
function getCheckedCheckboxesFor1(checkboxName) {
    var checkboxes1 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes1, function(el1) {
        values.push(el1.value);
		
		$('#emplist1').val(values);
    });
    return values;
}
	</script>
	
	
	<script language="javascript">
function getCheckedCheckboxesFor2(checkboxName) {
    var checkboxes2 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes2, function(el2) {
        values.push(el2.value);
		
		$('#emplist2').val(values);
    });
	
    return values;
}
	</script>
	
	
		<script language="javascript">
function getCheckedCheckboxesFor3(checkboxName) {
    var checkboxes3 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes3, function(el3) {
        values.push(el3.value);
		
		$('#emplist3').val(values);
    });
    return values;
}


function deleteFile(id)
{
	var aurl="//orangestate.ng/admin/pages/delete-restaurants.php";
	 var dataString ="imageid=" + id ;
        $.ajax({
            url: aurl,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                  $("#"+id).hide();	
                }else{
                
                }
            },
        });

}
	jQuery(document).ready(function() {
    var max_fields = 10;
    var wrapper    = jQuery(".wrapper"); 
    var add_button = jQuery(".add_fields"); 
	var x = 1; 
	
	jQuery(add_button).click(function(e){
        e.preventDefault();
		
        if(x < max_fields){ 
            x++; 
            jQuery(wrapper).append('<div class="row" style="display: flex;"><div class="col-md-2"> <label class="" for="Day"> Days</label><select  name="input_array_size[]" class="form-control" ><option value="Monday" >Monday</option><option value="Tuesday" >Tuesday</option><option value="Wednesday" >Wednesday</option><option value="Thursday" >Thursday</option><option value="Friday" >Friday</option><option value="Saturday">Saturday</option><option value="Sunday" >Sunday</option></select> </div><div class="col-md-2"> <label class="" for="Opening Time"> Opening Time</label><select  name="input_array_qtn[]" class="form-control" ><option value="01:00 AM" >01:00 AM</option><option value="02:00 AM" >02:00 AM</option><option value="03:00 AM" >03:00 AM</option><option value="04:00 AM" >04:00 AM</option><option value="05:00 AM" >05:00 AM</option><option value="06:00 AM" >06:00 AM</option><option value="07:00 AM" >07:00 AM</option><option value="08:00 AM" >08:00 AM</option><option value="09:00 AM" >09:00 AM</option><option value="10:00 AM" >10:00 AM</option><option value="11:00 AM" >11:00 AM</option><option value="12:00 AM" >12:00 AM</option><option value="Closed" >Closed</option></select> </div><div class="col-md-2"><label class="" for="Closing Time"> Closing Time</label><select  name="input_array_capacity[]" class="form-control" ><option value="01:00 PM" >01:00 PM</option><option value="02:00 PM" >02:00 PM</option><option value="03:00 PM" >03:00 PM</option><option value="04:00 PM" >04:00 PM</option><option value="05:00 PM" >05:00 PM</option><option value="06:00 PM" >06:00 PM</option><option value="07:00 PM" >07:00 PM</option><option value="08:00 PM" >08:00 PM</option><option value="09:00 PM" >09:00 PM</option><option value="10:00 PM" >10:00 PM</option><option value="11:00 PM" >11:00 PM</option><option value="12:00 PM" >12:00 PM</option><option value="Closed" >Closed</option></select></div><a href="javascript:void(0);" class="remove_field add_fields btn btn-info pull-right hidden-mobile" style="margin-right: 20px; margin-top: 30px;">Remove</a></div>');
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

	