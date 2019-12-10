<?php
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$updatearr=array(	 
					    "page_detail"=>$_REQUEST['about'],
					  "page_date"=>date('Y-m-d')
						);
					$whereClause=" id=2";
					updateData($updatearr, 'page', $whereClause);
					$errMsg='<br><b>Successfully Updated!</b><br>';

	}

 $sql="SELECT * FROM page WHERE id=2";
$db->query($sql)or die($db->error());
$row=$db->fetchArray();	

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Service Detail</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
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
        									<label class="col-md-3 control-label">Service Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="about" id="about" class="form-control"><?=$row['page_detail']?></textarea>
            									 
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
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>  
                                         
                                        
                                    
                                    
                                    	
        							
                                      <!--    
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imageid']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewnimage.php?img=<?=$row['imageid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         -->
                						<!-- File input	
                                         
                                            	<div class="form-group">
                									<label class="col-md-3 control-label">Blog Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="yes" <?php if($row['newsstatus']=="yes"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="no" <?php if($row['newsstatus']=="no"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
                									</div>
                								</div>-->
                                                
                                      
                                        
                                        
                                       
                                
                                
                                
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