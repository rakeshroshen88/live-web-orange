<?php include("header.php"); 
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$makearr=array();
$makearr=getValuesArr( "countries", "countries_id","countries_name","", "" );
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir3="../../upload/";
$check_type="jpg|jpeg|gif|png";



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
					
				$updatearrimg=array(
					 "hub_id"=>$_SESSION["picid"],
					 "image"=>$name,
					 "userid"=>$_SESSION['SES_ADMIN_ID']
						);	
				$insidi=insertData($updatearrimg, 'business_hub_image');
	            $count++; // Number of successfully uploaded file
	        }
	    }
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
	
	if($act=="edit")
	{
	if(!empty($_FILES['largeimage1']['name']))
		{
		$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type);
		}else{
		$largeimage1=$_REQUEST['image4'];
		}	
	}else{	
	$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type);
	}	
	

$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$details = mysqli_real_escape_string($link, $_REQUEST['details']);
$vision = mysqli_real_escape_string($link, $_REQUEST['vision']);
$mission = mysqli_real_escape_string($link, $_REQUEST['mission']);
$related = implode(',', $_REQUEST['related']);
if(empty($related) or $related==''){
	$related=0;
}
$updatearr=array(	 "catid"=>$_REQUEST['category'],
					 "title"=>$title,
					 "details"=>$details,
					 "imgid"=>$largeimage,
					 "logoimage"=>$largeimage1,
					 "vision"=>$vision,
					 "related_services"=>$related,
					 "mission"=>$mission,
					 "date"=>date('Y-m-d'),
					 "country"=>$_REQUEST['country'],
					 "state"=>$_REQUEST['state'],
					 "city"=>$_REQUEST['cityname'],
					 "contact_person"=>$_REQUEST['owner'],
					 "address"=>$_REQUEST['address'],
					 "phone_no"=>$_REQUEST['phone_no'],
					 "email_id"=>$_REQUEST['email_id'],
					 "zip_code"=>$_REQUEST['zip_code'],
					 "stars"=>$_REQUEST['stars'],
					 "website"=>$_REQUEST['w'].'//'.$_REQUEST['website'],
					 "twitter"=>$_REQUEST['t'].'//'.$_REQUEST['twitter'],
					 "linkedin"=>$_REQUEST['l'].'//'.$_REQUEST['linkedin'],
					 "tumblr"=>$_REQUEST['tum'].'//'.$_REQUEST['tumblr'],
					 "facebook"=>$_REQUEST['f'].'//'.$_REQUEST['facebook'],
					 "date"=>date('Y-m-d'),
					 "status"=>$_REQUEST['pstatus']
						);		
						
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
		$whereClause=" title='".$_REQUEST['title']."' and id!=".$_REQUEST['id'] ;
		}elseif($act=="add"){
		$whereClause=" title='".$_REQUEST['title']."'" ;
		}
	if(matchExists('business_hub', $whereClause))
		{
			
			$errMsg1='<br>Already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$id;
					updateData($updatearr, 'business_hub', $whereClause);
					
					if(isset($_SESSION["picid"]))
					{
					$db->query("update business_hub_image set hub_id=".$_REQUEST['id']." where hub_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
					unset($_SESSION["picid"]);
					}else{
				$db->query("update business_hub_image set hub_id=".$_REQUEST['id']." where hub_id='".$_REQUEST['id']."' and userid=".$_SESSION['SES_ADMIN_ID']);		
					}
					
					for($i=0;$i<$quantitycount;$i++){				
					$updatearrnew=array(
					"business_id"=>$id,					
					 "day"=>$sizenew[$i],
					  "open_time"=>$quantitynew[$i],					 
					 "close_time"=>$array_valuescapnew1[$i]
					);

					$whereClausenew=" id=".$array_valuesidsnew[$i];
					if(!empty($array_valuesidsnew[$i])){
					updateData($updatearrnew, 'business_hours', $whereClausenew);
					}else{					
					$insidq=insertData($updatearrnew, 'business_hours');		
					}
				}
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'business_hub');
					$db->query("update business_hub_image set hub_id=".$insid." where hub_id='".$_SESSION["picid"]."' and userid=".$_SESSION['SES_ADMIN_ID']);
					unset($_SESSION["picid"]);
					
					
					if($insid>0){
						
				for($i=0;$i<$quantitycount;$i++){				
					$updatearrnew=array(
					"business_id"=>$insid,					
					  "day"=>$sizenew[$i],
					  "open_time"=>$quantitynew[$i],					 
					 "close_time"=>$array_valuescapnew1[$i]
					);

					
					$insidq=insertData($updatearrnew, 'business_hours');		
					
				}
							 $errMsg='<br><b>Added Successfully!</b><br>';
					}else{
						 $errMsg1='<b>There is an issue!</b><br>';
					}
					
				}
			
			
			}
	}
if(!empty($id) and $act=="edit")
	{
		  $sql="SELECT * FROM business_hub WHERE id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<style>
.form-group:last-child {
    margin-bottom: 5px !important;
}
</style>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Business Hub</a></li>

                            <li class="active">Business Hub</li>

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

        <div class="col-xs-12">

            <!-- Tab panes -->
				<form name="frmprod"  method="post" action=""  enctype="multipart/form-data">
						
						<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />						 
                        <input type="hidden" name="image3" value="<?=$row['imgid']?>" />
						
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
										<?php echo createComboBox($makearr,"country", $row['country']," id='country' class='form-control country' required")?>
                                      
                                        </div><br>
                                    </div>
                                                        
                                                    </div>
													
													
													<div class="row">
													<div class="form-group" id="showstate">
<?php 
if($act=='edit'){
$state=$row['state'];
$country=$row['country'];

 $sql="SELECT * FROM state WHERE country_id=$country";
$db->query($sql)or die($db->error());
 if($db->numRows()>0){
 ?>
  <label class="col-md-2 control-label" for="name"> State</label>
 <div class="col-md-10">
		 <select  name="state" id="state" class="form-control">
                        <option value="0">Select State</option><?php
		while($row1=$db->fetchArray()){
		  
		?>
		<option value="<?=$row1['id']?>" <?php if($state===$row1['id']){ echo "selected"; } ?> ><?=$row1['name']?></option>
                  <?php }?>
				   </select> </div>

<?php } }  ?>
                                       
													</div>
                                                        
                                                    </div>
													
													<div class="row" >
													<div class="form-group" id="showcity">
<?php $db1=new DB();
if($act=='edit'){
$state=$row['state'];
$city=$row['city'];
$sql1="SELECT * FROM cities WHERE state_id='$state'";
$db1->query($sql1)or die($db1->error());
if($db1->numRows()>0){
 ?>
  <label class="col-md-2 control-label" for="name"> City</label>
 <div class="col-md-10">
		 <select  name="cityname" id="cityname" class="form-control">
<option value="0">Select City</option>
		<?php
		while($row1=$db1->fetchArray()){
		?>
		<option value="<?=$row1['id']?>" <?php if($city===$row1['id']){ echo "selected"; } ?> ><?=$row1['name']?>
		</option>
         <?php }?>
				   </select> </div>

<?php } }  ?>
                                       
													</div>
                                                        
                                                    </div>
													

                                                

                                                    <div class="row">
													<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Category<span class="required">*</span></label>
                                        <div class="col-md-10">
										<select name="category" id="category" class="form-control" required >
  <option value="">Select</option>
  <?php 
		
		$sql="SELECT * FROM com_category WHERE menuname='company'";
		$db->query($sql)or die($db->error());
		while($row1=$db->fetchArray()){	?>
  <option value="<?=$row1['catname']?>" <?php if($row['catid']===$row1['catname']){ echo "selected"; } ?>><?=$row1['catname']?></option>
		<?php } ?>
   
  
</select> 
                                        </div>
                                    </div>
                                                        
                                                    </div>
<br>
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Business Name:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="title" name="title" type="text" placeholder=" Business Name:" class="form-control" value="<?=$row['title']?>" required>
                                        </div>
                                    </div>
								</div>	


								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="Owner"> Owner Name:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="owner" name="owner" type="text" placeholder="Owner Name:" class="form-control" value="<?=$row['contact_person']?>" required>
                                        </div>
                                    </div>
								</div>	
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="address"> Address:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="address" name="address" type="text" placeholder="Address:" class="form-control" value="<?=$row['address']?>" required>
                                        </div>
                                    </div>
								</div>	
								
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="zip_code"> Zip Code:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="zip_code" name="zip_code" type="text" placeholder="Zip Code:" class="form-control" value="<?=$row['zip_code']?>" required>
                                        </div>
                                    </div>
								</div>	
								
								
								<div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="email_id"> Email:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="email_id" name="email_id" type="text" placeholder="Email:" class="form-control" value="<?=$row['email_id']?>" required>
                                        </div>
                                    </div>
								</div>	
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="phone_no"> Mobile No:<span class="required">*</span></label>
                                        <div class="col-md-10">
                                        <input id="phone_no" name="phone_no" type="text" placeholder="Mobile No:" class="form-control" value="<?=$row['phone_no']?>" required>
                                        </div>
                                    </div>
								</div>	
								
								
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="stars"> Stars:</label>
                                        <div class="col-md-10">
                                       
										<select name="stars" id="stars" class="form-control"  >
  <option value="">Select</option>
  <option value="1" <?php if($row['stars']=='1'){ echo "selected"; }?>>1</option>
  <option value="2" <?php if($row['stars']=='2'){ echo "selected"; }?>>2</option>
  <option value="3" <?php if($row['stars']=='3'){ echo "selected"; }?>>3</option>
  <option value="4" <?php if($row['stars']=='4'){ echo "selected"; }?>>4</option>
  <option value="5" <?php if($row['stars']=='5'){ echo "selected"; }?>>5</option>
                                      </select>  </div>
                                    </div>
								</div>
								
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="tumblr"> Tumblr:</label>
										
										<div class="col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                               <?php   $tumblr=$row['tumblr'];
											   $tumblr1=explode('//',$tumblr);
											  
											   ?>
                                                <select class=" btn btn-default dropdown-toggle" style="height: 34px;" name="tum">
												<option value="http:" <?php if($tumblr1[0]==='http:'){ echo "selected"; }?>>http<span class="caret"></span></option>
												<option value="https:" <?php if($tumblr1[0]==='https:'){ echo "selected"; }?>>https</option>
                                                   
                                                  
                                                </select>
                                            </div>
                                            <input id="tumblr" name="tumblr" type="text" placeholder="Tumblr:" class="form-control" value="<?=$tumblr1[1]?>" >
                                        </div>
                                    </div>
										
                                       
                                    </div>
								</div>
								
								
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="linkedin"> LinkedIn:</label>
                                        <div class="col-md-10">
										 <div class="input-group">
                                            <div class="input-group-btn">
                                               <?php   $linkedin=$row['linkedin'];
											   $linkedin1=explode('//',$linkedin);
											  
											   ?>
                                                <select class=" btn btn-default dropdown-toggle" style="    height: 34px;" name="l">
												<option value="http:" <?php if($linkedin1[0]==='http:'){ echo "selected"; }?>>http<span class="caret"></span></option>
												<option value="https:" <?php if($linkedin1[0]==='https:'){ echo "selected"; }?>>https</option>
                                                   
                                                  
                                                </select>
                                            </div>
                                            <input id="linkedin" name="linkedin" type="text" placeholder="linkedin:" class="form-control" value="<?=$linkedin1[1]?>" >
                                        </div>
                                  
                                       
                                        </div>
                                    </div>
								</div>
								
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="twitter"> Twitter:</label>
                                        <div class="col-md-10">
										 <div class="input-group">
                                            <div class="input-group-btn">
                                               <?php   $twitter=$row['twitter'];
											   $twitter1=explode('//',$twitter);
											  
											   ?>
                                                <select class=" btn btn-default dropdown-toggle" style="    height: 34px;" name="t">
												<option value="http:" <?php if($twitter1[0]==='http:'){ echo "selected"; }?>>http<span class="caret"></span></option>
												<option value="https:" <?php if($twitter1[0]==='https:'){ echo "selected"; }?>>https</option>
                                                   
                                                  
                                                </select>
                                            </div>
                                         <input id="twitter" name="twitter" type="text" placeholder="Twitter:" class="form-control" value="<?=$twitter1[1]?>" >
                                        </div>
                                  
                                        
                                        </div>
                                    </div>
								</div>
								
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="facebook"> Facebook:</label>
                                        <div class="col-md-10">
										 <div class="input-group">
                                            <div class="input-group-btn">
                                               <?php   $facebook=$row['facebook'];
											   $facebook1=explode('//',$facebook);
											  
											   ?>
                                                <select class=" btn btn-default dropdown-toggle" style="    height: 34px;" name="f">
												<option value="http:" <?php if($facebook1[0]==='http:'){ echo "selected"; }?>>http<span class="caret"></span></option>
												<option value="https:" <?php if($facebook1[0]==='https:'){ echo "selected"; }?>>https</option>
                                                   
                                                  
                                                </select>
                                            </div>
                                            <input id="facebook" name="facebook" type="text" placeholder="Facebook:" class="form-control" value="<?=$facebook1[1]?>" >
                                        </div>
                                  
                                      
                                        </div>
                                    </div>
								</div>
								
								<div class="row">
                                        <div class="form-group">
                                        <label class="col-md-2 control-label" for="website"> Website:</label>
                                        <div class="col-md-10">
										 <div class="input-group">
                                            <div class="input-group-btn">
                                               <?php   $web=$row['website'];
											   $webarr=explode('//',$web);
											  
											   ?>
                                                <select class=" btn btn-default dropdown-toggle" style="height: 34px;" name="w">
												<option value="http:" <?php if($webarr[0]=='http:'){ echo "selected"; }?>>http<span class="caret"></span></option>
												<option value="https:" <?php if($webarr[0]=='https:'){ echo "selected"; }?>>https</option>
                                                   
                                                  
                                                </select>
                                            </div>
                                             <input id="website" name="website" type="text" placeholder="Website:" class="form-control" value="<?=$webarr[1]?>" >
                                        </div>
                                  
                                       
                                        </div>
                                    </div>
								</div>
								
								   <div class="row">
													<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Business Services</label>
                                        <div class="col-md-10">
										<?php
					$rdb=new DB();
					 	
					$arrrelated = explode(",", $row['related_services']);
					 $rsql="select * from directory_service where status='1'";
					 $rdb->query($rsql);
					 ?>
                   <select name="related[]" style="height:200px;" class="form-control" multiple="multiple" >
                    <?php  $cont=1;
					 while($relrow=$rdb->fetchArray()){
						 $sel=" ";
						
						 for($ir=0;$ir<count($arrrelated);$ir++)
						 	{ 
								if($arrrelated[$ir]==$relrow['id'])
									{
										$sel=" selected";
										break;
									}else{
										$sel=" ";
									}
								
							}
					?>
                    <option value="<?=$relrow['id']?>" <?=$sel?>><?=$cont?> <?=$relrow['title']?></option><?php  $cont=$cont+1; } ?>
                    </select>
                                        </div>
                                    </div>
                                                        
                                                    </div>

								
                       <div class="row">
						<div class="form-group">
								<label class="col-md-2 control-label">About Us </label>

                                                        <div class="col-md-10"> 
														  <textarea name="details" class="editor-base" ><?=$row['details']?></textarea>


                                                        </div>

                             </div>

                           </div>
						   
						   
						     <div class="row">
						<div class="form-group">
								<label class="col-md-2 control-label">Vision </label>

                                                        <div class="col-md-10"> 
														  <textarea name="vision" class="editor-base" ><?=$row['vision']?></textarea>


                                                        </div>

                             </div>

                           </div>
						   
						   
						   
						     <div class="row">
						<div class="form-group">
								<label class="col-md-2 control-label">Mission : </label>

                                                        <div class="col-md-10"> 
														  <textarea name="mission" class="editor-base" ><?=$row['mission']?></textarea>


                                                        </div>

                             </div>

                           </div>











<div class="form-group">
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
				?><div class="row" style="display: flex;">
					
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
								<div class="form-group">
        								<label class="col-md-2 control-label">  Image</label>
        						        <div class="col-md-10">
                                         <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imgid']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewhubimage.php?img=<?=$row['imgid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        							 </div>
        							</div>
								</div>  


  <div class="row">
                                         	<div class="form-group">
        									<label class="col-md-2 control-label"> Logo Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage1" id="largeimage1"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['logoimage']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['bimg']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
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

		 $sql2="SELECT * FROM business_hub_image WHERE hub_id=".$_REQUEST['id'];
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
 <?=$newtr?><span id='<?=$imagerow['id']?>'><img src="<?=$_SITE_PATH?>upload/<?=$imagerow['image']?>" style="width:100px; height:100px;" /><a href="javascript:void(0)" id="submit1" atr="<?=$imagerow['id']?>" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a></span></td>
  
<?php $inum=($inum+1); }
 
 }else{ echo "Not Available";} 
 
?>
	

</td>
</tr>	                                     	
</div>                                      
</div>



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



<script>
$(document).ready(function(){

/* jQuery(document).on("change","#country",function(){ 
$(".country").change(function() {	*/
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

});

function deleteFile(id)
{
	var aurl="//orangestate.ng/admin/pages/delete-file.php";
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
    		

                    </div> <!-- END PAGE CONTAINER -->
					
					

    </div> 
                
<?php include("footer.php") ?>
<script type="text/javascript" src="js/vendor/bootstrap-select/bootstrap-select.js"></script>
<script type="text/javascript" src="js/vendor/select2/select2.full.min.js"></script>
	<script>                                

</script> 
