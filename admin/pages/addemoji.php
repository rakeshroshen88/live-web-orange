<?php
$prodid=$_REQUEST['id'];
$subid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();

$uploaddir3="../emoji/";
$check_type="jpg|jpeg|gif|png|gif|GIF";
$check_type1="mp3|MP3";
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
		$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type1);
		
		}else{
		$largeimage1=$_REQUEST['image4'];
		}
	
	}else{
	
	$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type1);
	
	
	}
$updatearr=array(	
					 "item_id"=>123,
					 "image"=>$largeimage,
					 "mp3"=>$largeimage1,					 
					 "userid"=>1
						);
		
	
			/* if($act=="edit")
				{
					$whereClause=" id=".$subid;
					updateData($updatearr, 'emoji', $whereClause);
					
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				 */
					$insid=insertData($updatearr, 'emoji');
					
					if($insid>0)
						{
							$errMsg='<br><b>Emoji Added Successfully!</b><br>';
							
						}
					
				/* }
			
			
			} */
	}
if(!empty($subid) and $act=="edit")
	{
		$sql="SELECT * FROM emoji WHERE id=$subid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Emoji</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
			</ol>
		</div><!--/.row-->
	
        
        
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					
                        <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                        <input type="hidden" name="image3" value="<?=$row['image']?>" />
						 <input type="hidden" name="image4" value="<?=$row['mp3']?>" />
							<fieldset>
								
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['image']){?><a href="javascript:void(0)" onclick="javascript:window.open('allimg.php?img=<?=$row['image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                         <div class="form-group">
        									<label class="col-md-3 control-label"> Mp3</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage1" id="largeimage1"><span style="color:#FF0000;">(MP3)</span>  <?php if($row['mp3']){?><a href="javascript:void(0)" onclick="javascript:window.open('allimg.php?img=<?=$row['mp3']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                						
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