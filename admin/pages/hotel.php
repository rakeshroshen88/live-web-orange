<?php
//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$db2=new DB();
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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Page</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
			</ol>
		</div><!--/.row-->
	
        
        
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					<?php //print_r($updatearr);	?>
                       <form name="frmprod" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data" >
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="cityid" value="<?=$row['cityid']?>" />
						<input type="hidden" name="image3" value="<?=$row['picture']?>" />
						<input name="gallery" type="hidden" value="hotal"/>  
						<input type="hidden" name="extraoption1" id="extraoption1" value="" />
						<input type="hidden" name="extraoption2" id="extraoption2" value="" />
							<fieldset>
								<!-- Name input-->
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Select state:</label>
                                        <div class="col-md-9">
                                       <select id="statetitle" name="statetitle" onchange="return showUser(this.value);" class="form-control">
                        <option value='0'>Select state</option>
		<?php $db1=new DB();
		$sql1="SELECT * FROM $_TBL_STATE WHERE status='1'";
		$db1->query($sql1)or die($db11->error());
		while($row1=$db1->fetchArray()){
		 $tt=$row1['id'];
		?>				
                     <option value="<?=$row1['id']?>" <?php if($row1['id']==$row['stateid']){echo " selected";}?>><?=$row1['title']?></option>
		<?php }?>	
                    </select>
                                
                                        </div>
                                    </div>
									
									 <div class="form-group">
                                       
                                        <div  id="txtHint"></div>
                                   
									</div>
									
									 <div class="form-group">
                                        
                                       <div  id="txtHinthotel"></div>
                                   
									</div>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
						<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Hotel Amenities</label>
                                        <div class="col-md-9">
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
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Room Amenities</label>
                                        <div class="col-md-9">
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
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Price:</label>
                                        <div class="col-md-9">
                                        <input name="price" type="text" class="form-control" value="<?=$row['price']?>"/>  
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Price Days Wise:</label>
                                        <div class="col-md-9">
                                        Sunday:<input name="price1" type="text" class="form-control" value="<?=$row['Sunday']?>"/>

 Monday:<input name="price1" type="text" class="form-control" value="<?=$row['Monday']?>"/>  

 Tuesday:<input name="price1" type="text" class="form-control" value="<?=$row['price']?>"/>  
 wednesday:<input name="price1" type="text" class="form-control" value="<?=$row['wednesday']?>"/>   
     

 Thursday:<input name="price1" type="text" class="form-control" value="<?=$row['Thursday']?>"/>  

 Friday:<input name="price1" type="text" class="form-control" value="<?=$row['Friday']?>"/>  

 Saturday:<input name="price1" type="text" class="form-control" value="<?=$row['Saturday']?>"/>  

                                   </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> No of Rooms:</label>
                                        <div class="col-md-9">
                                        <input name="noofrooms" type="text" class="form-control" value="<?=$row['noofrooms']?>"/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> No of Floors</label>
                                        <div class="col-md-9">
                                       <input name="nooffloor" type="text" class="form-control" value="<?=$row['nooffloor']?>"/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Address:</label>
                                        <div class="col-md-9">
                                        <input name="address" type="text" class="form-control" value="<?=$row['address']?>"/>  
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Landmark :</label>
                                        <div class="col-md-9">
                                         <input name="landmark" type="text" class="form-control" value="<?=$row['landmark']?>"/>
                                        </div>
                                    </div>
								
								 <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Star Rating:(0-5):</label>
                                        <div class="col-md-9">
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
								 <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Check In</label>
                                        <div class="col-md-9">
                                        <input name="chkin" type="text" class="form-control" value="<?=$row['chkin']?>"/>  
                                        </div>
                                    </div>
									
									 <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Check Out</label>
                                        <div class="col-md-9">
                                         <input name="chkin" type="text" class="form-control" value="<?=$row['chkout']?>"/>  
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Room Detail :</label>
                                        <div class="col-md-9">
                                         <textarea name="roomdetail" cols="50" rows="5" class="form-control" ><?=$row['roomdetail']?></textarea> 
                                        </div>
                                    </div>
							   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Description</label>
                                        <div class="col-md-9">
                                      <textarea name="prod_desc" cols="50" rows="5" class="form-control" ><?=$row['detail']?></textarea>
                                        </div>
                                    </div>
							
                      
                                    
                                   
                                  
        							
                                    	<!--<div class="form-group">
        									<label class="col-md-3 control-label"> Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="cat_desc" class="form-control"><?=$row['cat_desc']?></textarea>
            									 
            									</div>
        								</div>-->
                                   
                                         <script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
      
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
    toolbar2: "forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script> 
                                         
                                        
                                    
                                    
                                    
        							
                                    
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Main Image:</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewaimage.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                         	<div class="form-group">
        									<label class="col-md-3 control-label"> Multiple Image:</label>
        									<div class="col-md-9">
                                                  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><span style="color:#FF0000;">(jpg, gif, png)</span> 
        									 
        									</div>
        								</div>
                				                   
<script type="text/javascript" src="../uploadjs/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="../uploadjs/ajaxupload.3.5.js" ></script>
<script language="javascript" type="text/javascript">
$(function()
{
	var btnUpload=$('#upload');
	var status=$('#status');
	/*if(document.getElementById('extrapic').checked)
		{
			upurl="upload-file.php?m=1";
		}else{
			upurl="upload-file.php?m=0";
		}*/
	var upurl="upload-file.php";
	new AjaxUpload(btnUpload, {
	action: upurl,
	name: 'uploadfile',
	onSubmit: function(file, ext)
	{
	 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
     // extension is not allowed 
	status.text('Only JPG, PNG or GIF files are allowed');
	return false;
	}status.text('Uploading...');
	},
	
	onComplete: function(file, response)
	{
		//On completion clear the status
		status.text('');
		
		//Add uploaded file to list
		var str=response.split('|');
		var bb=str[0].substr(0,7);
		var filename=str[1];		
		var idd=str[0].replace('success',' ');
		var idb =idd.replace(/^\s*|\s*$/g,'');
		if(bb==="success")
		{
			$('<span id='+idd+'></span>').appendTo('#files').html('<img src="../upload/thumb/'+filename+'" alt="" style="margin:5px;" /><br><a href="javascript:void(0)" onClick="deleteFile('+idd+');">Delete</a>').addClass('success');
		}
		else 
		{
			$('<span></span>').appendTo('#files').text(response).addClass('error');
		}
	}});
});

function deleteFile(id)
{
	var aurl="delete-file.php?imageid="+id;
	$.get(aurl);
	document.getElementById(id).innerHTML='';
	/*var result=$.ajax({
		type:"GET",
		data:"stuff=1",
		url:aurl,
		async:false
	}).responseText;
	if(result!="")
	{
		$("#"+id).load("index.php");	
	}*/
}

</script>		
<style type="text/css">
#upload{
-moz-border-radius:5px 5px 5px 5px;
background:none repeat scroll 0 0 #FF00FF;
color:#FFFFFF;
cursor:pointer !important;
font-family:Arial,Helvetica,sans-serif;
font-size:1.3em;
font-weight:bold;
margin:10px 0;
padding:5px;
text-align:center;
width:98px;
}
#upload1{
-moz-border-radius:5px 5px 5px 5px;
background:none repeat scroll 0 0 #000000;
color:#FFFFFF;
cursor:pointer !important;
font-family:Arial,Helvetica,sans-serif;
font-size:1.3em;
font-weight:bold;
margin:10px 0;
padding:5px;
text-align:center;
width:98px;
}
.darkbg{
	background:#ddd !important;
}
#status{
	font-family:Arial; padding:5px;
}


.error{ background:#f0c6c3; border:1px solid #cc6622; }
.baltr{background-image:url(../images/head_bg.png); color:#FFFFFF}
.baltd1{ background-color:#e9e5e5}
.baltd2{ background-color:#f4f1f1}

#files span{float:left;}

</style>  			
                                         
										
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
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
                									</div>
<div class="form-group">
<label class="col-md-3 control-label"> Main Image:</label>
<div class="col-md-9">                								
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
 <?=$newtr?><span id='<?=$imagerow['id']?>'><img src="<?=$_SITE_PATH?>upload/<?=$imagerow['image']?>" /><a href="javascript:void(0)" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a></span></td>
  
<?php $inum=($inum+1); }
 
 } 
 
?>
	

</td>
</tr>	                                     	
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