hea<?php include("header.php"); 
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$act1=$_REQUEST['act1'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir1="../../images/events";
$uploaddir2="../../upload/medium/";
$uploaddir3="../../images/events/";
$check_type="jpg|jpeg|gif|png";
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
	
	

// $prod_detail=$_REQUEST['prod_desc'];
$e1=$_REQUEST['edate'];
$e2=explode('/',$e1);
$edate1=$e2[2].$e2[0].$e2[1];
//if(!empty($edate)){
$edate=$_POST['edate'];
$edate=date('Y-m-d',strtotime($edate));
/* }else{
$edate=$_POST['eventdate'];
$edate=date('Y-m-d',strtotime($eventdate));

} */



$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$prod_desc = mysqli_real_escape_string($link, $_REQUEST['prod_desc']);
$highlight = mysqli_real_escape_string($link, $_REQUEST['highlight']);
$updatearr=array(	
					 "etitle"=>$title,					 
					 "eimageid"=>$largeimage,
					 //"eimageid1"=>$largeimage1,
					 "edetail"=>$prod_desc,
					 "highlight"=>$highlight,
					 "estatus"=>$_REQUEST['pstatus'],
					 "price"=>$_REQUEST['price'],
					 "eplace"=>$_REQUEST['place'],
					 "etime"=>$_REQUEST['etime'],
					  "eventcat"=>$_REQUEST['eventcat'],
					  "carparking"=>$_REQUEST['car'],
					 "edate"=>$edate
					 );

				//print_r($updatearr);
			if($act=="edit")
				{
					 $whereClause=" eid=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_EVENT, $whereClause);
					//$errMsg='<br><b>Update Successfully!</b><br>';
					 $_SESSION['picid']=uniqid();
			/////////////////////////////////////////////////////////
						$_SESSION['id']=$_REQUEST['id'];
						$valid_formats = array("jpg", "JPG", "png", "JPEG", "gif", "zip", "bmp");

						$max_file_size = 1024*100000000000000; //1000 kb

						$path = "../../images/events/"; // Upload directory

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

											 "e_id"=>$_SESSION['id'],					 

											 "image"=>$_SESSION['picid'].$name,

											 );

								$insid1=insertData($updatearr1, 'eimage');

										

									}

								}

							}
						unset($_SESSION['id']);
						/////////////////////////////
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_EVENT);
					//////////////////////////////////////////////
				$_SESSION['id']=$insid;

						 $_SESSION['picid']=uniqid();

						$valid_formats = array("jpg", "JPG", "png", "PNG", "JPEG", "gif", "zip", "bmp");

						$max_file_size = 1024*100000000000000; //1000 kb

						$path = "../../images/events/"; // Upload directory

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

											 "e_id"=>$_SESSION['id'],					 

											 "image"=>$_SESSION['picid'].$name,

											 );

								$insid1=insertData($updatearr1, 'eimage');
										

									}

								}

							}

						

						

						unset($_SESSION['id']);

						
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							//redirect('main.php?mod=viewevent');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_EVENT WHERE eid=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['edate'];
		 $e4=explode(' ',$e);
		 $e3=explode('-',$e4[0]);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
	}
	$id1=$_REQUEST['id1'];
	if($act1=='del')
	{	//echo $_SESSION['sess_pid'];	
		$sql="DELETE FROM eimage WHERE image='$id1'";
		$db->query($sql);
		$file='../../images/events/'.$id1;
		unlink($file);
		
	}
	$qryStr="&mod=addevent&id=".$prodid;

?>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>  
                            <li><a href="#">EVENT  </a></li>
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
						
							<input type="hidden" name="image3" value="<?=$row['eimageid']?>" />
						<input type="hidden" name="prodid" value="<?=$row['eid']?>" />
						<input type="hidden" name="eventdate" value="<?=$row['edate']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
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
													<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Event Type<span class="required">*</span></label>
                                        <div class="col-md-12">
							<select name="eventcat" id="eventcat" class="form-control" >
  <option value="">Select</option>
  <?php 
		$event=$row['eventcat'];
		$sql="SELECT * FROM com_category WHERE menuname='event'";
		$db->query($sql)or die($db->error());
		while($row1=$db->fetchArray()){	?>
  <option value="<?=$row1['catname']?>" <?php if($row1['catname']==$event){ echo "selected";}?>><?=$row1['catname']?></option>
		<?php } ?>
   
  
</select>
                                        </div>
                                    </div>
                                                        
                                                  
													<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Title<span class="required">*</span></label>
                                        <div class="col-md-12">
							<input type="text" class="form-control" name="title" value="<?=$row['etitle']?>" required/>
                                        </div>
                                    </div>
                                                        
                                                    </div>
<br>
                                                
<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Address:</label>
                                        <div class="col-md-12">
                                       <input type="text" class="form-control" name="place" value="<?=$row['eplace']?>"/>
                                        </div>
                                    </div>
									
										<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Price:</label>
                                        <div class="col-md-12">
                                        <input name="price" type="number" class="form-control" value="<?=$row['price']?>"/>  
                                        </div>
                                    </div>
									</div>
									
									<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Event Date:</label>
                                        <div class="col-md-12">
                                      <input type="date" class="form-control" name="edate" value="<?=$edate?>" /> <?=$edate?>
                                        </div>
                                    </div>
									
										<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Event time:</label>
                                        <div class="col-md-12">
                                       <input type="text" class="form-control" name="etime" placeholder="01:30 AM" required  value="<?=$row['etime']?>" /> <?=$row['etime']?> 
                                        </div>
                                    </div>
									</div>
									
									
									<div class="row" >
									<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> About Event:</label>
                                        <div class="col-md-12">
                                      <textarea class="form-control editor-base" name="prod_desc"><?=$row['edetail']?></textarea>
                                        </div>
                                    </div>
									
										<div class="form-group col-md-6">
                                        <label class="col-md-12 control-label" for="name"> Highlights:</label>
                                        <div class="col-md-12">
                                      <textarea class="form-control editor-base" name="highlight"><?=$row['highlight']?></textarea>
                                        </div>
                                    </div>
									</div>
									
                                     <div class="row" >
									<div class="form-group col-md-6">
                									<label class="col-md-12 control-label"> Status</label>
                									<div class="col-md-12">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="yes"<?php if($row['estatus']=="yes"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="no"<?php if($row['estatus']=="no"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
														</div>

														</div>
												
								</div>
							<div class="row">
<div class="form-group col-md-6">
        									<label class="col-md-12 control-label"> Image</label>
        									<div class="col-md-12">
                                              <input name="largeimage" id="largeimage" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['eimageid']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewLimage1.php?img=<?=$row['eimageid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>

  <div class="form-group col-md-6">
        									<label class="col-md-12 control-label"> Multiple Image:</label>
        									<div class="col-md-12">
                                                  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><span style="color:#FF0000;">(jpg, gif, png)</span> 
        									 
        									</div>
        								</div>
  </div>
                                    
 <div class="row">
<div class="form-group">
<label class="col-md-2 control-label"> </label>
<div class="col-md-10">  
  <script>
function deladmin(id)
{ 
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&aid=1&act1=del&id1="+id;
	}
}
</script>  
 <tr>         								
    <td colspan="2">
	<?php 
		if(!empty($_REQUEST['id'])){
		$sql1="SELECT * FROM eimage WHERE e_id=".$_REQUEST['id'];
		$db->query($sql1)or die($db->error());
		while($row1=$db->fetchArray()){	?>
				<img src="../../images/events/<?=$row1['image']?>" width="100"  height="100"/>
				<a href='javascript:deladmin("<?=$row1['image']?>")'><img height="16" alt="Delete " src="../images/delete.png" width="16" border="0" /></a>
										<?php } }?>	

 </td>	 </tr>               								
                                      	
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
	var social_AjaxURL='<?=$_SITE_PATH?>admin/pages/ajstate.php';
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
	var social_AjaxURL='<?=$_SITE_PATH?>admin/pages/ajcity.php';
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

	