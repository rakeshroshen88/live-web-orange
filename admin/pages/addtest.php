<?php

//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();
$uploaddir1="../upload/Thumb/";
$uploaddir2="../upload/Medium/";
$uploaddir3="../upload/";
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
$prod_detail=addslashes($_REQUEST['prod_desc']);
$updatearr=array(	
					 "name"=>htmlentities($_REQUEST['name']),	
					 "detail"=>addslashes(htmlentities($prod_detail)),
					 "status"=>$_REQUEST['pstatus'],
					  "comp"=>$_REQUEST['comp'],
					  "imageid"=>$largeimage,
					 "tdate"=>date('Y-m-d')
					 );
	
				//print_r($updatearr);die;
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_TESTIMONIALS, $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_TESTIMONIALS);
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							redirect('main.php?mod=viewtest');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM $_TBL_TESTIMONIALS WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit TESTIMONIALS</li>			<span style="color:#FF0000; font-size:18px;"><?=$errMsg?></span></ol>
		</div><!--/.row-->
	
        
        
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					
                        <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                      
							<fieldset>
								<!-- Name input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Name</label>
                                        <div class="col-md-9">
                                        <input id="name" name="name" type="text" placeholder="Your name" class="form-control" value="<?=$row['name']?>">
                                        </div>
                                    </div>
							</div>
                             <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Company</label>
                                        <div class="col-md-9">
                                        <input id="name" name="comp" type="text" placeholder="Your company" class="form-control" value="<?=$row['comp']?>">
                                        </div>
                                    </div>
							</div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Description</label>
                                        <div class="col-md-9">
                                       <textarea name="prod_desc" id="prod_desc" cols="55" rows="7" class="textfield"><?=$row['detail']?></textarea>
                                        </div>
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
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Image</label>
                                        <div class="col-md-9">
                                        <input name="largeimage" id="largeimage" type="file" class="textfield" /><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imageid']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewLimage.php?img=<?=$row['imageid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
                                        </div>
                                    </div>
							</div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Status</label>
                                        <div class="col-md-9">
                                       <input name="pstatus" type="radio" value="yes"<?php if($row['status']=="yes"){echo " checked";}?>/>Active
							<input name="pstatus" type="radio" value="no"<?php if($row['status']=="no"){echo " checked";}?>/>Deactive
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