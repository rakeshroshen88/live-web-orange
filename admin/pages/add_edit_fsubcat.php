<?php
$prodid=$_REQUEST['id'];
$subid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$makearr1=array();
$makearr1=getValuesArr( $_TBL_FEELINGC, "id","catname","", "" );

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();

$uploaddir3="../allimg/";
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
	
	

$updatearr=array(	 
					 "catid"=>$_REQUEST['category'],
					 "subcatname"=>$_REQUEST['catname'],
					 "subdesc"=>$_REQUEST['catdesc'],
					  "imgid"=>$largeimage,
					 
					 "subcatdate"=>date('Y-m-d'),
					 "sub_status"=>$_REQUEST['catstatus']
						);
						//print_r($updatearr);
	if($act=="edit")
		{
		$whereClause=" catid=".$_REQUEST['category']." and subcatname='".$_REQUEST['catname']."' and id!=".$_REQUEST['id'] ;
		}elseif($act=="add"){
		$whereClause=" catid=".$_REQUEST['category']." and subcatname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists($_TBL_FEELINGS, $whereClause))
		{
			
			$errMsg='<br>Subcategory already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$subid;
					updateData($updatearr, $_TBL_FEELINGS, $whereClause);
					$where=" id=".$subid;
					$cat='SC'.$subid;
					
					$upd=array( "subuniqid"=>$cat);
					updateData($upd, $_TBL_FEELINGS, $where);
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_FEELINGS);
					$where=" id=".$insid;
					$cat='SC'.$insid;
					
					$upd=array( "subcatid"=>$cat);
					updateData($upd, $_TBL_FEELINGS, $where);
					if($insid>0)
						{
							$errMsg='<br><b>Subcategory Added Successfully!</b><br>';
							
						}
					
				}
			
			
			}
	}
if(!empty($subid) and $act=="edit")
	{
		$sql="SELECT * FROM $_TBL_FEELINGS WHERE id=$subid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<SCRIPT>
function formValidator(theForm)
{

	if(is_empty(theForm.catname.value))
		{
			alert("Please fill the subcategory name !")
			theForm.catname.focus();
			return false;
		}
	/*if(is_empty(theForm.catdesc.value))
		{
			alert("Please fill the category description !")
			theForm.catdesc.focus();
			return false;
		}*/
}
</SCRIPT>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Category</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
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
                        <input type="hidden" name="image3" value="<?=$row['imgid']?>" />
						 <input type="hidden" name="image4" value="<?=$row['bimg']?>" />
							<fieldset>
								<!-- Name input-->
                               
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Select Category:</label>
                                        <div class="col-md-9">
                                       <?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control"')?>  
                                        </div>
                                    </div>
									
									
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Subcategory Name:</label>
                                        <div class="col-md-9">
                                        <input id="catname" name="catname" type="text" placeholder=" Title" class="form-control" value="<?=$row['subcatname']?>">
                                        </div>
                                    </div>
							
                      
                                    
                                   
                                  
        							
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="catdesc" class="form-control"><?=$row['subdesc']?></textarea>
            									 
            									</div>
        								</div>
                                   
                                         <script type="text/javascript" src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
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
                                         
                                        
                                    
                                  
                                      
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Icon</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imgid']){?><a href="javascript:void(0)" onclick="javascript:window.open('allimg.php?img=<?=$row['imgid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                      <!--   <div class="form-group">
        									<label class="col-md-3 control-label"> Banner Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage1" id="largeimage1"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['bimg']){?><a href="javascript:void(0)" onclick="javascript:window.open('allimg.php?img=<?=$row['bimg']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>-->
                							
                                         
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="catstatus" type="radio" value="1" <?php if($row['sub_status']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="catstatus" type="radio" value="1" <?php if($row['sub_status']=="0"){echo " checked";}?>/>Deactive
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