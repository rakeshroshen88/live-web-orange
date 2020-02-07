<?php 
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();

$uploaddir3="../img/language/";
$check_type="mp3|MP3";
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
					 "language_1"=>$_REQUEST['title'],					 
					 "audio_1"=>$largeimage,
					 "language_2"=>$prod_detail,
					 "status"=>$_REQUEST['pstatus'],
					 "date"=>date('Y-m-d')
					 );

				
			if($act=="edit")
				{
					 $whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, 'language', $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'language');
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							redirect('main.php?mod=viewservice');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM language WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Service</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
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
                        <input type="hidden" name="image3" value="<?=$row['audio_1']?>" />
							<fieldset>
								<!-- Name input-->
                               
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Language_1</label>
                                        <div class="col-md-9">
                                        <input id="title" name="title" type="text" placeholder="Language_1" class="form-control" value="<?=$row['language_1']?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Language_2</label>
                                        <div class="col-md-9">
                                        <input id="prod_desc" name="prod_desc" type="text" placeholder="Language_2" class="form-control" value="<?=$row['language_2']?>">
                                        </div>
                                    </div>
							
							
                      
                                    
                                   
                                  
        							
                                    	<!--<div class="form-group">
        									<label class="col-md-3 control-label"> Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="prod_desc" class="form-control"><?=$row['detail']?></textarea>
            									 
            									</div>
        								</div>-->
                                   
                                        
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
        									<label class="col-md-3 control-label"> Audio</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(Audio)</span>  <?php if($row['audio_1']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewnimage1.php?img=<?=$row['audio_1']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">Audio</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                         
                							
                                         
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
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