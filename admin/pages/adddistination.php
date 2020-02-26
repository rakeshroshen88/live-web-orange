<?php
//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$makearr=array();
$makearr=getValuesArr( "countries", "countries_name","countries_name","", "" );

$db2=new DB();
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
	$up=new UPLOAD();
$uploaddir1="../destination/thumb/";
$uploaddir2="../destination/medium/";
$uploaddir3="../destination/";
$check_type="jpg|jpeg|gif|png";

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
	

		$prod_detail=$_REQUEST['prod_desc'];
		$updatearr=array(	
					 "title"=>$_REQUEST['prodname'],	
					 "detail"=>$prod_detail,
					 "country"=>$_REQUEST['country'],	
					 "address"=>$_REQUEST['address'],	
					 "picture"=>$largeimage,					 
					 "place"=>$_REQUEST['place'],
					 "price"=>$_REQUEST['price'],
					  "type"=>$_REQUEST['type'],
					 "status"=>$_REQUEST['pstatus'],
					 "populor"=>$_REQUEST['populor'],
					  "rating"=>$_REQUEST['rating'],
					"weither"=>$_REQUEST['weither'],
					"cityid"=>$_REQUEST['city'],
					"stateid"=>$_REQUEST['state'],							
					"date"=>date('Y-m-d')
					 );
		
				//print_r($updatearr);
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, $_TBL_DESTINATION, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					if(isset($_SESSION["picid"]))
					{
					$db->query("update $_TBL_DESIMAGE set item_id=".$_REQUEST['id']." where item_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
					unset($_SESSION["picid"]);
					}else{
				$db->query("update $_TBL_DESIMAGE set item_id=".$_REQUEST['id']." where item_id='".$_REQUEST['id']."' and userid=".$_SESSION['SES_ADMIN_ID']);		
					}
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_DESTINATION);
					$db->query("update $_TBL_DESIMAGE set item_id=".$insid." where item_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
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
		$sql="SELECT * FROM $_TBL_DESTINATION WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit </li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
			</ol>
		</div><!--/.row-->
	
        
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
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					
                        <form name="frmprod" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="cityid" value="<?=$row['cityid']?>" />
						<input type="hidden" name="image3" value="<?=$row['picture']?>" />
						<input type="hidden" name="extraoption1" id="extraoption1" value="" />
						<input type="hidden" name="extraoption2" id="extraoption2" value="" />
							<fieldset>
								<!-- Name input-->
								
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Title</label>
                                        <div class="col-md-9">
                                        <input name="prodname" id="title" placeholder="Name" type="text"  class="form-control" value="<?=$row['title']?>"/>  
                                        </div>
                                    </div>
							
                      
                                    <div class="form-group">
								<div class="col-md-3">
								<b>Country</b>
								</div>
								  <div class="col-md-9">
                               <?php echo createComboBox($makearr,"country", ""," id='country' class='class='custom-select d-block w-100 countrynew'")?>  </div>
							   </div>
                                   <div class="map_canvas"></div>
								
								<div class="form-group">
                                        <div class="col-md-3" for="price">Adventure Type</div>
                                        <div class="col-md-9">
											<select class="selectpicker" data-live-search="true" data-width="100%"name="type" id="type" >
                                                <option data-tokens="Adventure Type">Adventure Type</option>
                                                <option data-tokens="Ice Adventure Vacations">Ice Adventure Vacations</option>
                                                <option data-tokens="National Park">National Park</option>
                                                <option data-tokens="Adult Vacations">Adult Vacations</option>
                                            </select>
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Nearest place:</label>
                                        <div class="col-md-9">
                                         <input name="place" type="text"  class="form-control" value="<?=$row['place']?>"/>     
                                        </div>
                                    </div>
                                  

								<div class="form-group">
                                        <label class="col-md-3 control-label" for="price">Price</label>
                                        <div class="col-md-9">
                                        <input name="price" type="text"  class="form-control" value="<?=$row['price']?>"/>  
                                        </div>
                                    </div>
									
									
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="rating">Rating</label>
                                        <div class="col-md-9">
                                        <input name="rating" type="text"  class="form-control" value="<?=$row['rating']?>"/>  
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="rating">Address</label>
                                        <div class="col-md-9">
                                        <input name="address" id="address" type="text"  class="form-control" value="<?=$row['address']?>"/>  
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="rating">City</label>
                                        <div class="col-md-9">
                                        <input name="city" type="text"  class="form-control" value="<?=$row['cityid']?>"/>  
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="state">State</label>
                                        <div class="col-md-9">
                                        <input name="state" type="text"  class="form-control" value="<?=$row['stateid']?>"/>  
                                        </div>
                                    </div>



 <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Sort Description :</label>
                                        <div class="col-md-9">
                                        <textarea name="weither" cols="50" rows="5" class="textfield" ><?=$row['weither']?></textarea>
                                        </div>
                                    </div>
                                  
        							
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Detail</label>
            									<div class="col-md-9">
                                                     <textarea name="prod_desc" cols="50" rows="5" class="textfield" ><?=$row['detail']?></textarea>
            									 
            									</div>
        								</div>
<script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script><script>tinymce.init({    selector: "textarea",            height: 250,    theme: "modern",    plugins: [        "advlist autolink lists link image charmap print preview hr anchor pagebreak",        "searchreplace wordcount visualblocks visualchars code fullscreen",        "insertdatetime media nonbreaking save table contextmenu directionality",        "emoticons template paste textcolor"    ],            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons",    image_advtab: true,    templates: [        { title: 'Test template 1', content: 'Test 1' },        { title: 'Test template 2', content: 'Test 2' }    ]});</script>  
                                        
                                         
                                        
                                    
                                    
                                    	<!-- File input-->
        							
                                      
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Cover Image</label>
        									<div class="col-md-9">
                                                <input name="largeimage" id="largeimage" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewdimage.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?> 
        									 
        									</div>
        								</div>
                                         
                                         
                							
                                         
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
                								</div>
												
												
														<div class="form-group">
                									<label class="col-md-3 control-label"> Populor</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="populor" type="radio" value="1"<?php if($row['populor']=="1"){echo " checked";}?>/>Yes
							
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="populor" type="radio" value="0"<?php if($row['populor']=="0"){echo " checked";}?>/>No
                    										</label>
                    									</div>
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
			upurl="desupload-file.php?m=1";
		}else{
			upurl="desupload-file.php?m=0";
		}*/
	var upurl="desupload-file.php";
	new AjaxUpload(btnUpload, {
	action: upurl,
	name: 'uploadfile',
	onSubmit: function(file, ext)
	{
	 if (! (ext && /^(jpg|png|jpeg|gif|mp3|MP3)$/.test(ext))){ 
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
			$('<span id='+idd+'></span>').appendTo('#files').html('<img src="../destination/thumb/'+filename+'" alt="" style="margin:5px;" /><br><a href="javascript:void(0)" onClick="deleteFile('+idd+');">Delete</a>').addClass('success');
		}
		else 
		{
			$('<span></span>').appendTo('#files').text(response).addClass('error');
		}
	}});
});

function deleteFile(id)
{
	var aurl="desdelete-file.php?imageid="+id;
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
       <label class="col-md-3 " for="name"> </label>
                                        <div class="col-md-9">
										<table>
                                           <tr>
	<td width="30%" align="right" class="textfield_text" > </td>
    
      <?php	if($act=="edit")
	{

		 $sql2="SELECT * FROM $_TBL_DESIMAGE WHERE item_id=".$_REQUEST['id'];
		$db2->query($sql2)or die($db2->error());
			
	
	}?>

    <td width="70%" class="textfield_text" >
	
	<div id="upload"><span>Upload Image</span></div><span id="status"></span>
	<table>
	
	
	
	<tr><td id="files"></td></tr></table>
	</td>
</tr>

         <tr>
    <td ></td>
   
    
 <?php if($db2->numRows()>0)	
	{
		$inum=0;		
		while($imagerow=$db2->fetchArray()){
			
			if($inum>3){				
			echo $newtr='</tr><tr><td>';
			$inum=0;
			}else{$newtr='<td>';}
		
?>
 <?=$newtr?><span id='<?=$imagerow['id']?>'><img src="<?=$_SITE_PATH?>destination/thumb/<?=$imagerow['image']?>" /><a href="javascript:void(0)" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a></span></td>
  
<?php $inum=($inum+1); }
 
 } 
 
?>
	
</table>
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