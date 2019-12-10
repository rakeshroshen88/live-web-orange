<?php 
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$_TBL_BLOG='catlog';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();

$uploaddir3="../catlog/";
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

 $prod_detail=$_REQUEST['prod_desc'];
$updatearr=array(	
					 "title"=>mysql_real_escape_string($_REQUEST['title']),	
					"price"=>mysql_real_escape_string($_REQUEST['price']),	
					"area"=>mysql_real_escape_string($_REQUEST['area']),
					"location"=>mysql_real_escape_string($_REQUEST['location']),
					"type"=>mysql_real_escape_string($_REQUEST['type']),
					"type1"=>mysql_real_escape_string($_REQUEST['type1']),
					"beds"=>mysql_real_escape_string($_REQUEST['beds']),
					"baths"=>mysql_real_escape_string($_REQUEST['baths']),						 
					"imageid"=>$largeimage,
					 "detail"=>mysql_real_escape_string($prod_detail),
					 "status"=>$_REQUEST['pstatus'],
					 "date"=>date('Y-m-d')
					 );

				
			if($act=="edit")
				{
					 $whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_BLOG, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_BLOG);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							redirect('main.php?mod=viewcatlog');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_BLOG WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Property</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
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
                        <input type="hidden" name="image3" value="<?=$row['imageid']?>" />
							<fieldset>
								<!-- Name input-->
                               
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Property Title</label>
                                        <div class="col-md-9">
                                        <input id="title" name="title" type="text" placeholder="Property Title" class="form-control" value="<?=$row['title']?>">
                                        </div>
                                    </div>
							
                      
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Property Price</label>
                                        <div class="col-md-9">
                                        <input id="price" name="price" type="text" placeholder="Property Price" class="form-control" value="<?=$row['price']?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Property Area</label>
                                        <div class="col-md-9">
                                        <input id="area" name="area" type="text" placeholder="Property Area" class="form-control" value="<?=$row['area']?>">
                                        </div>
                                    </div>
									<!--	
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Property location</label>
                                        <div class="col-md-9">
                                        <select id="location" name="location" class="form-control" >
                        <option>Select location</option>
		<?php $db1=new DB();
	$state=$row['location'];
		$sql1="SELECT * FROM  cities";		
		
		$db1->query($sql1)or die($db11->error());
		while($row1=$db1->fetchArray()){
		  $tt=$row1['id'];
		  
		?>				
                        <option value="<?=$row1['cityname']?>" <?php if($row1['cityname']==$state){echo " selected";}?>><?=$row1['cityname']?></option>
		<?php }?>	
                    </select>
                                        </div>
                                    </div>-->
									
									
									
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Property Type</label>
                                        <div class="col-md-9">
                                       <select id="type" name="type" class="form-control" >
                        
					<option value="shop" <?php if($row['type']=='shop'){echo " selected";}?>>Shops available on Rent </option>
<option value="commercial" <?php if($row['type']=='commercial'){echo " selected";}?>>Commercial</option>
<option value="guesthouse" <?php if($row['type']=='guesthouse'){echo " selected";}?>>Guest House</option><option value="sale" <?php if($row['type']=='sale'){echo " selected";}?>>Sale</option>
<option value="pg" <?php if($row['type']=='pg'){echo " selected";}?>>P.G </option>
                       
			
                    </select>
                                        </div>
                                    </div>
									<!--
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Property Status</label>
                                        <div class="col-md-9">
                                       <select id="type1" name="type1" class="form-control" >
                        
					<option value="any" <?php if($row['type1']=='any'){echo " selected";}?>>Any</option>
<option value="Sale" <?php if($row['type1']=='Sale'){echo " selected";}?>>Sale</option>
<option value="Rent" <?php if($row['type1']=='Rent'){echo " selected";}?>>Rent</option>
<option value="Commercial" <?php if($row['type1']=='Commercial'){echo " selected";}?>>Commercial</option>
                       
			
                    </select>
                                        </div>
                                    </div>
									
									-->
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Beds</label>
                                        <div class="col-md-9">
                                        <input id="beds" name="beds" type="text" placeholder="Beds" class="form-control" value="<?=$row['beds']?>">
                                        </div>
                                    </div>
									
									
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Baths</label>
                                        <div class="col-md-9">
                                        <input id="baths" name="baths" type="text" placeholder="Baths" class="form-control" value="<?=$row['baths']?>">
                                        </div>
                                    </div>
									
									
								<!--	.....-------------------------->
                                   
                                  
        							
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">Property Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="prod_desc" class="form-control"><?=$row['detail']?></textarea>
            									 
            									</div>
        								</div>
                                   
                                         <script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
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
                                         
                                        
                                    
                                    
                                    	<!-- File input-->
        							
                                      
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">Property Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imageid']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewaimage.php?img=<?=$row['imageid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                         
                							
                                         
                                            	<div class="form-group">
                									<label class="col-md-3 control-label">Property Active Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="yes" <?php if($row['status']=="yes"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="no" <?php if($row['status']=="no"){echo " checked";}?>/>Deactive
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