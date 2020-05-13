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
$uploaddir1="../holi/thumb/";
$uploaddir2="../holi/medium/";
$uploaddir3="../holi/";
$check_type="jpg|jpeg|gif|png";
/////////////////////////////////////////////////////////////////////////////////////////////////
$valid_formats = array("jpg", "png", "gif");
$max_file_size = 1024*100000; //100 kb
$path = "../upload/"; // Upload directory
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
					
					$insert=mysql_query("insert into $_TBL_ITEMIMAGE set item_id='".$_SESSION["picid"]."', image='".$name."',userid=".$_SESSION['SES_ADMIN_ID']) or die(mysql_error());
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}




////////////////////////////////////////////////////////////////////////////////////////////////
if(empty($_REQUEST['amenities'])){
	$an=$_REQUEST['amenities1'];
}else{
	$an=$_REQUEST['amenities'];
	
}


if(empty($_REQUEST['rateid'])){
	$rateid=$_REQUEST['rateid1'];
}else{
	$rateid=$_REQUEST['rateid'];
	
}




if(empty($_REQUEST['popularplaceid'])){
	$popularplaceid=$_REQUEST['popularplaceid1'];
}else{
	$popularplaceid=$_REQUEST['popularplaceid'];
	
}


 $prod_detail=$_REQUEST['prod_desc'];
 if(empty($_REQUEST['cityname'])){
	$city=$_REQUEST['cityid'];
}else{
	$city=$_REQUEST['cityname'];
	
}
if(empty($_REQUEST['flightid'])){
	$fac=$_REQUEST['flightid1'];
}else{
	$fac=$_REQUEST['flightid'];
	
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
$updatearr=array(	
					 "title"=>$_REQUEST['prodname'],	
					 "detail"=>$prod_detail,
					 "price"=>$_REQUEST['price'],					
					 "place"=>$_REQUEST['place'],					
					 "chkin"=>$_REQUEST['chkin'],
					 "chkout"=>$_REQUEST['chkout'],
					 "picture"=>$largeimage,
					 "roomdetail"=>$_REQUEST['roomdetail'],
					  "starrating"=>$_REQUEST['star'],
					  "day"=>$_REQUEST['day'],
					  "noofroom"=>$_REQUEST['noofroom'],
					  "nooffloor"=>$_REQUEST['nooffloor'],
					   "address"=>$_REQUEST['address'],
					"night"=>$_REQUEST['night'],
					 "discount"=>$_REQUEST['discount'],
					 "status"=>$_REQUEST['pstatus'],
					"stateid"=>$_REQUEST['statetitle'],
					"landmark"=>$_REQUEST['landmark'],
					"sortdetail"=>$_REQUEST['sortdetail'],
					"cityid"=>$city,	
						"popularplaceid"=>$popularplaceid,	
						"rateid"=>$rateid,	
					"amenities"=>$an,
						"facilityid"=>$fac,			
					 "date"=>date('Y-m-d')
					 );
		
				//print_r($updatearr);
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_HOTEL, $whereClause);
					/////////////////price Table///////////////////////
					/* $whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_HOTEL, $whereClause); */
					////////////////////////////////////////
					
					$errMsg='<br><b>Update Successfully!</b><br>';
					if(isset($_SESSION["picid"]))
					{
					$db->query("update $_TBL_ITEMIMAGE set item_id=".$_REQUEST['id']." where item_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
					unset($_SESSION["picid"]);
					}else{
				$db->query("update $_TBL_ITEMIMAGE set item_id=".$_REQUEST['id']." where item_id='".$_REQUEST['id']."' and userid=".$_SESSION['SES_ADMIN_ID']);		
					}
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_HOTEL);
					$db->query("update $_TBL_ITEMIMAGE set item_id=".$insid." where item_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
					unset($_SESSION["picid"]);
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
		$sql="SELECT * FROM $_TBL_HOTEL WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Product</a></li>

                            <li class="active">Hotel</li>

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
													<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Country</label>
                                        <div class="col-md-10">
										<?php echo createComboBox($makearr,"country", ""," id='country' class='form-control country'")?>
                                      
                                        </div><br>
                                    </div>
                                                        
                                                    </div>
													
													
													<div class="row">
													<div class="form-group" id="showstate">
                                       
													</div>
                                                        
                                                    </div>
													
													<div class="row" >
													<div class="form-group" id="showcity">
                                       
													</div>
                                                        
                                                    </div>
													<div class="row" >
													<div class="form-group" id="showhotel">
                                       
													</div>
                                                        
                                                    </div>
<br>
<div class="row" >
<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Hotel Amenities</label>
                                        <div class="col-md-10">
										<div class="data">
							      <?php           
     $db1=new DB();
      $sql1="SELECT * FROM $_TBL_AMENITIES where status='1' order by id desc";
	 $db1->query($sql1)or die($db1->error());
	  while($row1=$db1->fetchArray()){?>	
	  <span>
    <input name="employee" type="checkbox" onchange="getCheckedCheckboxesFor('employee');" value="<?php echo $row1['id']?>"/>
    <label for="employee"><?php echo $row1['title']?></label>
    </span> 
		
							<?php }?>
							</div><input type='hidden' name="amenities" id='emplist' value='' />
							<input type='hidden' name="amenities1"  value='<?php echo $row['amenities']?>' />
                                        </div>
                                    </div>
</div>									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Room Amenities</label>
                                        <div class="col-md-10">
                                        <div class="data">
							      <?php           
     $db1=new DB();
      $sql1="SELECT * FROM $_TBL_FACI where status='1' order by id desc";
	 $db1->query($sql1)or die($db1->error());
	  while($row2=$db1->fetchArray()){?>	
		
							<span>
    <input name="employee1" type="checkbox" onchange="getCheckedCheckboxesFor1('employee1');" value="<?php echo $row2['id']?>"/>
    <label for="employee1"><?php echo $row2['title']?></label>
    </span> 
							<?php }?></div>
							<input type='hidden' name="flightid" id='emplist1' value='' />
							<input type='hidden' name="flightid1"  value='<?php echo $row['facilityid']?>' />
							
                         
                                        </div>
                                    </div>
									</div>
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Price:</label>
                                        <div class="col-md-10">
                                        <input name="price" type="text" class="form-control" value="<?=$row['price']?>"/>  
                                        </div>
                                    </div>
									</div>
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> No of Rooms:</label>
                                        <div class="col-md-10">
                                        <input name="noofrooms" type="text" class="form-control" value="<?=$row['noofrooms']?>"/>
                                        </div>
                                    </div>
									</div>
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> No of Floors</label>
                                        <div class="col-md-10">
                                       <input name="nooffloor" type="text" class="form-control" value="<?=$row['nooffloor']?>"/>
                                        </div>
                                    </div>
									</div>
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Address:</label>
                                        <div class="col-md-10">
                                        <input name="address" type="text" class="form-control" value="<?=$row['address']?>"/>  
                                        </div>
                                    </div>
									</div>
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Landmark :</label>
                                        <div class="col-md-10">
                                         <input name="landmark" type="text" class="form-control" value="<?=$row['landmark']?>"/>
                                        </div>
                                    </div>
									</div>
									<div class="row" >
								 <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Star Rating:(0-5):</label>
                                        <div class="col-md-10">
                        <select id="star" name="star" class="form-control" >
                        <option value='0'>Select Rating</option>
						<option value='1'>1 Star Rating</option>
						<option value='2'>2 Star Rating</option>
						<option value='3'>3 Star Rating</option>
						<option value='4'>4 Star Rating</option>
						<option value='5'>5 Star Rating</option>
						 </select>
                                        </div>
                                    </div>
								</div>
								<div class="row" >
								<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Check In</label>
                                        <div class="col-md-10">
                                        <input name="chkin" type="text" class="form-control" value="<?=$row['chkin']?>"/>  
                                        </div>
                                    </div>
								</div>
									<div class="row" >
									 <div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Check Out</label>
                                        <div class="col-md-10">
                                         <input name="chkin" type="text" class="form-control" value="<?=$row['chkout']?>"/>  
                                        </div>
                                    </div>
									</div>
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Room Detail :</label>
                                        <div class="col-md-10">
                                         <textarea name="roomdetail" cols="50" rows="5" class="editor-base" ><?=$row['roomdetail']?></textarea> 
                                        </div>
                                    </div>
									</div>
									<div class="row" >
							   <div class="form-group">
                                        <label class="col-md-2 control-label" for="sortdetail"> Sort Details</label>
                                        <div class="col-md-10">
                                      <textarea name="sortdetail" cols="50" rows="5" class="editor-base" ><?=$row['sortdetail']?></textarea>
                                        </div>
                                    </div>
							   </div>
							   <div class="row" >
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Description</label>
                                        <div class="col-md-10">
                                      <textarea name="prod_desc" cols="50" rows="5" class="editor-base" ><?=$row['detail']?></textarea>
                                        </div>
                                    </div>
												
                      </div>


<div class="row">
<div class="form-group">
        									<label class="col-md-2 control-label"> Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
</div>  
  <div class="row">
  <div class="form-group">
        									<label class="col-md-2 control-label"> Multiple Image:</label>
        									<div class="col-md-10">
                                                  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><span style="color:#FF0000;">(jpg, gif, png)</span> 
        									 
        									</div>
        								</div>
  </div>
                                         <div class="row">
										 	<div class="form-group">
                									<label class="col-md-2 control-label"> Status</label>
                									<div class="col-md-10">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1"<?php if($row['status']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0"<?php if($row['status']=="0"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
														</div> </div></div>

 <div class="row">
<div class="form-group">
<label class="col-md-2 control-label"> Main Image:</label>
<div class="col-md-10">                								
 <tr>
<td ></td>                                                
 <?php	if($act=="edit")
	{

		 $sql2="SELECT * FROM $_TBL_ITEMIMAGE WHERE item_id=".$_REQUEST['id'];
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
 <?=$newtr?><span id='<?=$imagerow['id']?>'><img src="<?=$_SITE_PATH?>upload/<?=$imagerow['image']?>" /><a href="javascript:void(0)" id="submit1" atr="<?=$imagerow['id']?>" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a></span></td>
  
<?php $inum=($inum+1); }
 
 } 
 
?>
	

</td>
</tr>	                                     	
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

jQuery(document).on("change","#cityname",function(){
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
	</script>


<?php include("footer.php") ?>

	