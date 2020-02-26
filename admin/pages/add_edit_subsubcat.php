<?php
$prodid=$_REQUEST['id'];
$subid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$makearr1=array();
$makearr1=getValuesArr( $_TBL_CAT, "id","catname","", "" );
$makearr2=array();
$makearr2=getValuesArr( $_TBL_SUBCAT, "id","subcatname","", "" );


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

$updatearr=array(	 
					 "catid"=>$_REQUEST['category'],
					 "subcatid"=>$_REQUEST['subcategory'],
					  //"imgid"=>$largeimage,
					    //"bimg"=>$largeimage1,
					 "subsubcatname"=>$_REQUEST['catname'],
					 //"subsubdesc"=>$_REQUEST['cat_desc'],
					 "subcatdate"=>date('Y-m-d'),
					 "sub_status"=>$_REQUEST['catstatus']
						);
	if($act=="edit")
		{
		$whereClause=" catid=".$_REQUEST['category']." and subcatname='".$_REQUEST['catname']."' and id!=".$_REQUEST['id'] ;
		}elseif($act=="add"){
		$whereClause=" catid=".$_REQUEST['category']." and subcatname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists($_TBL_SUBCAT, $whereClause))
		{
			
			$errMsg='<br>Subcategory already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$subid;
					updateData($updatearr, $_TBL_SUBSUBCAT, $whereClause);
					
					
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_SUBSUBCAT);
				
				
					if($insid>0)
						{
							$errMsg='<br><b>Subcategory Added Successfully!</b><br>';
							
						}
					
				}
			
			
			}
	}
if(!empty($subid) and $act=="edit")
	{
		$sql="SELECT * FROM $_TBL_SUBSUBCAT WHERE id=$subid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>

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

                                        <label class="col-md-3 control-label" for="name"> Ptoduct Category</label>

                                        <div class="col-md-9">

                                       <?php
						/* if(isset($_REQUEST['catid']))
							{
							$selcat=$_REQUEST['catid'];						
							}else{
							$selcat=$row['id'];							
							}						
						echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" onchange="return showUser(this.value);" '); */
					
							$catid=$row['catid'];
							  $sql="SELECT * FROM category";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="category" id="category" cid="<?=$subid?>" onchange="return showUser(this.value);" class="form-control">
										<option value="0">Select cateory</option><?php
										//echo $row['catid'];
						while($row1=$db->fetchArray()){
							if($row1['id'] == $catid){ $select='selected';}
						  
						?>
		
                        <option value="<?=$row1['id']?>" <?=$select?>><?=$row1['catname']?></option>
                  <?php }?>
				   </select>

                                        </div>

                                    </div>
								
                               
                                   <!-- <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Select Category:</label>
                                        <div class="col-md-9">
                                       <?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control"')?>  
                                        </div>
                                    </div>-->
									
									
									
                                    <!--<div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Select Sub Category:</label>
                                        <div class="col-md-9">
                                        <?php echo createComboBox($makearr2,'subcategory',$row['subcatid'],' class="form-control"')?>    
                                        </div>
                                    </div>-->
									 <script>
                function showUser(str) {
					
                    if (str == "0") {
                        document.getElementById("subcatid").innerHTML = "";

                        return;
                    } else {

                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else { // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                document.getElementById("subcatid").innerHTML = xmlhttp.responseText;

                            }
                        }

                        xmlhttp.open("GET", "pages/ajax_subcat.php?subcatid=" + str, true);
                        xmlhttp.send();
                    }
                }
				</script>     	<?php if($act=="edit"){ ?>
									<div class="form-group">
								<?php $subid=$row['catid'];
							 $sql="SELECT * FROM $_TBL_SUBCAT WHERE catid=$subid";
							$db->query($sql)or die($db->error());
							 if($db->numRows()>0){
								
							 ?>
							  <label class="col-md-3 control-label" for="name">  Sub Category</label>

									  <div class="col-md-9">
									 <select  name="subcategory" id="subcategory" cid="<?=$subid?>" class="form-control">
													<option value="0">Select subcateory</option><?php
									while($row1=$db->fetchArray()){
									if($row1['id']==$row['subcatid']){ $select1='selected';}
								?>
		
                        <option value="<?=$row1['id']?>" <?=$select1?>><?=$row1['subcatname']?></option>
						  <?php }?>
						   </select>
						</div>
						 <?php } ?>
                                    </div>
									<?php } ?>
									
				
									<div class="form-group" id="subcatid">
  

                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Title</label>
                                        <div class="col-md-9">
                                        <input id="catname" name="catname" type="text" placeholder=" Title" class="form-control" value="<?=$row['subsubcatname']?>">
                                        </div>
                                    </div>
							
                      
                                    
                                   
                                  
        				<!--			
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="cat_desc" class="form-control"><?=$row['subsubdesc']?></textarea>
            									 
            									</div>
        								</div>-->
                                   
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
                                         
                                        
                                    
                                    
                                   
        							
                                      <!--
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imgid']){?><a href="javascript:void(0)" onclick="javascript:window.open('allimg.php?img=<?=$row['imgid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                         
                							<div class="form-group">
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
                    												<input name="catstatus" type="radio" value="1" <?php if($row['sub_status']=='1'){echo " checked";}?>/>Active
							
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="catstatus" type="radio" value="0" <?php if($row['sub_status']=='0'){echo " checked";}?>/>Deactive
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