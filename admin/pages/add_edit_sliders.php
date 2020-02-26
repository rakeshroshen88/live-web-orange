<?php 
$_TBL_SLIDER='slider_add';
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();

$uploaddir3="../slider/";
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

 //$prod_detail=$_REQUEST['prod_desc'];
$updatearr=array(	
					"picture"=>$largeimage,
					"addlink"=>$_REQUEST['link'],
					 "homestatus"=>$_REQUEST['pstatus'],
					 "img_type"=>$_REQUEST['type'],	
					 "homedate"=>date('Y-m-d')
					 );

				
			if($act=="edit")
				{
					 $whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_SLIDER, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_SLIDER);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							redirect('main.php?mod=sliderr');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_SLIDER WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Slider</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
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
                        <input type="hidden" name="image3" value="<?=$row['picture']?>" />
							<fieldset>
								<!-- Name input-->
                               <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Add/Slider Type</label>
                                        <div class="col-md-9">
                                        <select name="type" id="type" class="form-control" >
  <option value="">Select</option>
  <option value="slider" <?php if($row['img_type']=='slider'){ echo "selected";}?>>Market Place Slider</option>
  <option value="advertisement" <?php if($row['img_type']=='advertisement'){ echo "selected";}?>>Advertisement</option>
   <option value="Sponsor" <?php if($row['img_type']=='Sponsor'){ echo "selected";}?>>Sponsor</option>
   <option value="Mobile" <?php if($row['img_type']=='Mobile'){ echo "selected";}?>>Mobile Slider</option>
 
</select>
                                        </div>
                                    </div>
							   
							   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Add/Slider Url</label>
                                        <div class="col-md-9">
                                        <input id="link" name="link" type="text" placeholder="Slider Url" class="form-control" value="<?=$row['addlink']?>">
                                        </div>
                                    </div>
							
                      
                                    
                                   





        							<!--
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="prod_desc" class="form-control"><?=$row['description']?></textarea>
            									 
            									</div>
        								</div>-->
                                                                            <script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script><script>tinymce.init({    selector: "textarea",            height: 250,    theme: "modern",    plugins: [        "advlist autolink lists link image charmap print preview hr anchor pagebreak",        "searchreplace wordcount visualblocks visualchars code fullscreen",        "insertdatetime media nonbreaking save table contextmenu directionality",        "emoticons template paste textcolor"    ],            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons",    image_advtab: true,    templates: [        { title: 'Test template 1', content: 'Test 1' },        { title: 'Test template 2', content: 'Test 2' }    ]});</script>  
                                        
                                         
                                        
                                    
                                    
                                    	<!-- File input-->
        							
                                      
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">  Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewnimage2.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                         
                							
                                         
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1" <?php if($row['homestatus']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0" <?php if($row['homestatus']=="0"){echo " checked";}?>/>Deactive
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
						</form>
					</div>
                    
                    
                    
                    
                    <!--/.row-->	
				</div>
				
				 
				
			</div><!--/.col-->
			 
		</div><!--/.row-->
	</div>