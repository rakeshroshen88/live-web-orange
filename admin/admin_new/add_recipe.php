<?php include("header.php"); 
//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
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
$path = "../../upload/"; // Upload directory
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
					$image.=$name.',';
					/* $updatearrimg=array(
					 "item_id"=>$_SESSION["picid"],
					 "image"=>$name,
					 "userid"=>$_SESSION['SES_ADMIN_ID']
						);	
				$insidi=insertData($updatearrimg, $_TBL_ITEMIMAGE);
					 */
					
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

$array_valuestype=array();
if (isset($_POST["input_array_type"]) && is_array($_POST["input_array_type"])){ 
	$input_array_type = array_filter($_POST["input_array_type"]); 
    foreach($input_array_type as $field_valuetype){
        $array_valuestype[]= $field_valuetype;
    }
}
$array_valuestypenew=implode(",",$array_valuestype);



$array_values1=array();
if (isset($_POST["input_array_size"]) && is_array($_POST["input_array_size"])){ 
	$input_array_size = array_filter($_POST["input_array_size"]); 
    foreach($input_array_size as $field_value1){
        $array_values1[]= $field_value1;
    }
}
$array_values3=implode(",",$array_values1);

$updatearr=array(	
					 "recipe_name"=>$title,	
					  "description"=>$prod_detail,
					  "resturant_id"=>$_REQUEST['resturant_id'],
					  "recipe_category_id"=>$_REQUEST['recipe_category_id'],
					 "image"=>$largeimage,
"price"=>$array_valuestypenew,
"size"=>$array_values3,					 
					  "stars"=>$_REQUEST['star'],
					   "tax_class"=>$_REQUEST['tax_class'],
					    "shipping_charges"=>$_REQUEST['shipping_charges'],
					  "status"=>$_REQUEST['pstatus'],	
					  "featured"=>$_REQUEST['featured'],						
					 "date"=>date('Y-m-d')
					 );
		
				
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, 'resturant_recipe', $whereClause);
					
					
					$errMsg='<br><b>Update Successfully!</b><br>';
					
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'resturant_recipe');
					
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							
							
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM resturant_recipe WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Restaurant product</a></li>


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
						<input type="hidden" name="cityid" value="<?=$row['city_id']?>" />
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

                                         

                                                
								<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="control-label col-md-12" for="name"> Recipe Name:</label>
                                        <div class="col-md-12">
                                        <input name="title" type="text" class="form-control" value="<?=$row['recipe_name']?>" requirment/>  
                                        </div>
                                    </div>
									 <div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Restaurant<span class="required">*</span></label>
                                        <div class="col-md-12">
							<?php 
                             
							$sql="SELECT * FROM resturant_detail";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="resturant_id" id="resturant_id"  class="form-control" required>
						 <option value="0">Select  Restaurant</option>
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" <?php if($row2['id'] == $row['resturant_id']){ echo 'selected'; } ?>><?=$row2['title']?></option>
                  <?php }?>
				   </select>
                                        </div>
                                    </div>
                                                        
                                                    </div>

<div class="row">
					<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Category Type<span class="required">*</span></label>
                                        <div class="col-md-12">
							<?php 
                             
							$sql="SELECT * FROM recipe_categories";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="recipe_category_id" id="recipe_category_id"  class="form-control" required>
						 <option value="0">Select  Type</option>
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" <?php if($row2['id'] == $row['recipe_category_id']){ echo 'selected'; } ?>><?=$row2['catname']?></option>
                  <?php }?>
				   </select>
                                        </div>
                                    </div>
                                                    
									
									
									
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Shipping Charges :</label>
                                        <div class="col-md-12">
                                         <input name="shipping_charges" type="text" class="form-control" value="<?=$row['shipping_charges']?>"/>
                                        </div>
                                    </div>
									</div>
									<!--
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Shipping Charges :</label>
                                        <div class="col-md-10">
                                         <input name="shipping_charges" type="text" class="form-control" value="<?=$row['shipping_charges']?>"/>
                                        </div>
                                    </div>
									</div>-->
									
									<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Tax class :</label>
                                        <div class="col-md-12">
                                         <input name="tax_class" type="text" class="form-control" value="<?=$row['tax_class']?>"/>
                                        </div>
                                    </div>
									
								<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name">Star Rating:(0-5):</label>
                                        <div class="col-md-12">
                        <select id="star" name="star" class="form-control" >
                        <option value='0' <?php if($row['stars'] == 0){ echo 'selected'; } ?>>Select Rating</option>
						<option value='1' <?php if($row['stars'] == 1){ echo 'selected'; } ?>>1 Star Rating</option>
						<option value='2' <?php if($row['stars'] == 2){ echo 'selected'; } ?>>2 Star Rating</option>
						<option value='3' <?php if($row['stars'] == 3){ echo 'selected'; } ?>>3 Star Rating</option>
						<option value='4' <?php if($row['stars'] == 4){ echo 'selected'; } ?>>4 Star Rating</option>
						<option value='5' <?php if($row['stars'] == 5){ echo 'selected'; } ?>>5 Star Rating</option>
						 </select>
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
										<div class="row" >
												 <div class="col-md-6">
                									<label class="col-md-12 control-label"> Status</label>
                									<div class="col-md-12">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1" <?php if($row['status']=="1"){ echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0"<?php if($row['status']=="0"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
													</div>
												</div>
												
												<div class="col-md-6">
											
        									<label class="col-md-12 control-label"> Image</label>
        									<div class="col-md-12">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['main_image']){?><a href="javascript:void(0)" onclick="javascript:window.open('../resviewaimage.php?img=<?=$row['main_image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 </div>
        									
        								</div>

												<div class="col-md-6">
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


								</div>  


							   
                                   <div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Description</label>
                                        <div class="col-md-12">
                                      <textarea name="prod_desc" cols="50" rows="5" class="editor-base" ><?=$row['desciption']?></textarea>
                                        </div>
                                    </div>
												
								</div>



<div class="row">
		  <div class="form-group col-md-12">
								 <div class="row">
								<?php //echo $array_values; ?>
								 <label class="col-md-12 control-label" for="size"> Add Attribute  (If applicabe)</label>
				<div class="col-md-12">
				<div class="wrapper">
				<?php
				$allsize=$row['size'];
				$allsizenew=explode(",",$allsize);
				$cnt=count($allsizenew);
				$price=$row['price'];
				$pricenew=explode(",",$price);
				
				?>
				
			
				<?php 
				for($i=0;$i<=$cnt-1; $i++){
				
				?>
				
				<div class="row" style="display: flex;">
				
			
				<div class="col-md-6">
					<label class="" for="prodsize"> Product Size</label><input type="text" name="input_array_size[]" class="form-control"  placeholder="Input size" value="<?=$allsizenew[$i]?>" /></div>
				
					<div class="col-md-6">
					<label class="" for="Price"> Price<span class="required">*</span></label>
					<input type="text" name="input_array_type[]" class="form-control" placeholder="Price" value="<?=$pricenew[$i]?>" /></div>
				
				</div>
				
					<?php }
				if(empty($pricenew)){ 
				?><div class="row" style="display: flex;">
					
					
					<div class="col-md-6">
					<label class="" for="Size"> Size</label>
					<input type="text" name="input_array_size[]" class="form-control"  /></div>
					
					
					<div class="col-md-6">
					<label class="" for="Price"> Price<span class="required">*</span></label>
					<input type="text" name="input_array_type[]" class="form-control" placeholder="Price" /></div>
				
					
					
				</div>
				<?php } ?>
					
						</div>
					<br/>
					<p><button class="add_fields btn btn-info pull-right hidden-mobile">Add More</button></p>
				</div>
					</div>
			</div>						

</div>		
					
					
					
					
					
					
					
					
					
					
					
					
					
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
	var aurl="//orangestate.ng/admin/pages/delete-filehotels.php";
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
            jQuery(wrapper).append('<div class="row"><div class="col-md-6"> <label class="" for="color"> Size</label><input type="text" name="input_array_size[]" placeholder="size" class="form-control" /> </div><div class="col-md-6"><label class="" for="Price"> Price<span class="required">*</span></label><input type="text" name="input_array_type[]" class="form-control" placeholder="Price" /></div><a href="javascript:void(0);" class="remove_field add_fields btn btn-info pull-right hidden-mobile" style="margin-right: 20px; margin-top: 30px;">Remove</a></div>');
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

	