<?php 
set_time_limit(0);
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$act1=$_REQUEST['act1'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir1="../images/video/";
$uploaddir2="../images/video/";
$uploaddir3="../images/video/";
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
$valid_formats = array("mp4", "MP4", "m4v", "f4v", "wmv", "wma", "WMV", "3GP");	
if($act=="edit")
	{
		

	if(!empty($_FILES['files']['name']))
		{
		$files=$up->upload_file($uploaddir3,"files",true,true,0,$valid_formats);
		
		
		}else{
		$files=$_REQUEST['image4'];
		
		}
	
	}else{
	
	$files=$up->upload_file($uploaddir3,"files",true,true,0,$check_type);
	
	}	
	
	$updatearr1=array(	
											 "title"=>$_REQUEST['title'],
											 "duration"=>$_REQUEST['duration'],
											 "status"=>$_REQUEST['pstatus'],
											 "videosize"=>$_REQUEST['videosize'],
											 "image_id"=>$largeimage,
											 "video_id"=>$files,
											 "vdate"=>date('Y-m-d')

											 );

								
						if($act=="edit")
						{
					 $whereClause=" id=".$prodid;
					updateData($updatearr1, 'allvideo', $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					}elseif($act=="add"){
						$insid1=insertData($updatearr1, 'allvideo');
						$errMsg='<br><b>Added Successfully!</b><br>';
					}
						//print_r($updatearr1);
	}


if(!empty($prodid))
	{
		$sql="SELECT * FROM allvideo WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['vdate'];
		$e3=explode('-',$e);
		$edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
	}	

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Event</li><?=$errMsg?>
			</ol>
		</div><!--/.row-->
	<script>
		
			$(function() {
				$(document).ready(function(){
					var percent = $('#percent');
					var status = $('#status');
 
					$('form').ajaxForm({
							beforeSend: function() {
							status.empty();
							var percentVal = '0%';
							percent.html(percentVal);
						},
							uploadProgress: function(event, position, total, percentComplete) {
							var percentVal = percentComplete + '%';
							percent.html(percentVal);
						},
							complete: function(xhr) {
							status.html(xhr.responseText);
						}
					});
				});
			});
		</script>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					<div class="add-frim2">
						<!-- Area to display the percent of progress -->
		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		
		<!-- adding jquery form plugin --> 
		<script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
		<div id='percent'></div>
		
		<!-- area to display a message after completion of upload --> 
		<div id='status'></div>
                     
                       <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="image3" value="<?=$row['image_id']?>" />
						<input type="hidden" name="image4" value="<?=$row['video_id']?>" />
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						
						<input type="hidden" name="act" value="<?=$act?>" />
						
						<fieldset>
								<!-- Name input-->
                               
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Title</label>
                                        <div class="col-md-9">
                                        <input id="title" name="title" type="text" placeholder=" Title" class="form-control" value="<?=$row['title']?>">
                                        </div>
                                    </div>
									
									
									 <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Duration</label>
                                        <div class="col-md-9">
                                        <input id="duration" name="duration" type="text" placeholder=" Duration" class="form-control" value="<?=$row['duration']?>">
                                        </div>
                                    </div>
							
									 <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Video Size</label>
                                        <div class="col-md-9">
                                        <input id="videosize" name="videosize" type="text" placeholder=" Video Size" class="form-control" value="<?=$row['videosize']?>">
                                        </div>
                                    </div>
									
									
                                     <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Video Image</label>
                                        <div class="col-md-9">
                                       <input name="largeimage" id="largeimage" type="file" class="textfield" />
                                        </div>
                                    </div>
									
									
									 <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Video</label>
                                        <div class="col-md-9">
                                        <input type="file" id="file" name="files"  accept="image/*" />
                                        </div>
                                    </div>
                                   
                                <div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    		<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1" <?php if($row['status']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0" <?php if($row['status']=="0"){echo " checked";}?>/>Deactive
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
						
						
						
                        <div class="clear"></div>       
                        
                        
                        
                        

                     </div>
                        
					</div>
                    
                    
                    
                    
                    <!--/.row-->	
				</div>
				
				 
				
			</div><!--/.col-->
			 
		</div><!--/.row-->
	</div>