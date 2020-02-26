<?php 
 $prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$act1=$_REQUEST['act1'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir1="../images/events";
$uploaddir2="../upload/medium/";
$uploaddir3="../images/events/";
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

$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
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

						$path = "../images/events/"; // Upload directory

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

						$path = "../images/events/"; // Upload directory

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
		 $e3=explode('-',$e);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
	}
	$id1=$_REQUEST['id1'];
	if($act1=='del')
	{	//echo $_SESSION['sess_pid'];	
		$sql="DELETE FROM eimage WHERE image='$id1'";
		$db->query($sql);
		$file='../images/events/'.$id1;
		unlink($file);
		redirect("main.php?mod=addevent&act=edit&id=".$prodid);
	}
	$qryStr="&mod=addevent&id=".$prodid;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Event</li><?=$errMsg?>
			</ol>
		</div><!--/.row-->
	
      <script>
function deladmin(id)
{ 
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&act1=del&id1="+id;
	}
}
</script>  
        
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					<div class="add-frim2">
                     
                       <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="image3" value="<?=$row['eimageid']?>" />
						<input type="hidden" name="prodid" value="<?=$row['eid']?>" />
						<input type="hidden" name="eventdate" value="<?=$row['edate']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                        <div class="table-responsive">
                                  <table class="table">
                                    
                                    <tbody>
									 <tr>
                                        <td>Event Type :</td>
                                        <td colspan="3">
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
										</td>
                                        
                                      </tr>
									  
                                        <tr>
                                        <td>Title :</td>
                                        <td colspan="3"><input type="text" class="form-control" name="title" value="<?=$row['etitle']?>" required/></td>
                                        
                                      </tr>
                                     
                                     
									<tr>
                                        <td>Event Address:</td>
                                        <td colspan="3"><input type="text" class="form-control" name="place" value="<?=$row['eplace']?>"/></td>
                                        
                                      </tr>
									  
									  <tr>
                                        <td>Event Price:</td>
                                        <td colspan="3"><input type="text" class="form-control" name="price" value="<?=$row['price']?>"/></td>
                                        
                                      </tr>
                               
                                <tr>
                                      
                                        <td> Event Date  :</td>
                                        <td> <input type="date" class="form-control" name="edate" required /> <?=$row['edate']?></td> 
										<td> </td>
                                        <td> </td>
                                        
                               </tr>
							   
							   <tr>
                                      
                                        <td> Event time  :</td>
                                        <td> <input type="text" class="form-control" name="etime" placeholder="01:30 AM" required /> <?=$row['etime']?></td> 
										<td> </td>
                                        <td> </td>
                                        
                               </tr>
                               
                               
                               
                                <tr>
                                        
                                        <td>  About Event :</td>
                                        <td colspan="3">
                                        <textarea class="form-control" name="prod_desc"><?=$row['edetail']?></textarea>
                                        
                                         <script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>    
                                       <!-- <input type="text" class="form-control" name="detail" value="<?=$row['detail']?>"/>--></td>
                                  
                               </tr>
							   
							   
							    <tr>
                                        
                                        <td>  Highlights :</td>
                                        <td colspan="3">
                                        <textarea class="form-control" name="highlight"><?=$row['highlight']?></textarea>
                                        
                                      </td>
                                  
                               </tr>
                                
                                      
                                       <tr>
                                      <td> Event Image  :</td>
                                        <td> <input name="largeimage" id="largeimage" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['eimageid']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewLimage1.php?img=<?=$row['eimageid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?> </td>
                                      
									  <td>  Status  :</td>
                                        <td> <input name="pstatus" type="radio" value="yes" <?php if($row['estatus']=="yes"){echo " checked";}?>/>Active
							<input name="pstatus" type="radio" value="no" <?php if($row['estatus']=="no"){echo " checked";}?>/>Deactive </td>
                                        
                               </tr>  
							   <tr>  
							  <td>  Car Parking  :</td>
                                        <td> <input name="car" type="radio" value="yes" <?php if($row['carparking']=="yes"){echo " checked";}?>/>Active
							<input name="car" type="radio" value="no" <?php if($row['carparking']=="no"){echo " checked";}?>/>Deactive </td>
                                        
                               </tr>  
							   <tr><td>  Multi Image  :</td>
							  


        									<td>
  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
</td>
  </tr>         								

  <tr>         								
    <td colspan="2">
	<?php 
		if(!empty($_REQUEST['id'])){
		$sql1="SELECT * FROM eimage WHERE e_id=".$_REQUEST['id'];
		$db->query($sql1)or die($db->error());
		while($row1=$db->fetchArray()){	?>
				<img src="../images/events/<?=$row1['image']?>" width="100"  height="100"/>
				<a href='javascript:deladmin("<?=$row1['image']?>")'><img height="16" alt="Delete " src="images/delete.png" width="16" border="0" /></a>
										<?php } }?>	

 </td>	 </tr>  
							 
                                  

                                      <tr>
                                        <td colspan="4" class="text-center"> 
                                         <input name="Submit" type="submit" class="btn btn-primary" value="Save"  />
                                      
                                        
                                        </td>
                                         
                                        
                               </tr>
                               
                               
                                      
                                      
                                      
                                      
                               
                                       
                                    </tbody>
                                  </table>
                                  </div>
                            
                        <div class="clear"></div>       
                        
                        
                        
                        

                     </div>
                        
					</div>
                    
                    
                    
                    
                    <!--/.row-->	
				</div>
				
				 
				
			</div><!--/.col-->
			 
		</div><!--/.row-->
	</div>