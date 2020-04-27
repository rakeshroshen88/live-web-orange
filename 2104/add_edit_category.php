<?php
$prodid=$_REQUEST['id'];
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{


$up=new UPLOAD();

$uploaddir3="../category/";
$check_type="jpg|jpeg|gif|png";

if($act=="edit")
	{

	if(!empty($_FILES['icon']['name']))
		{
		$icon=$up->upload_file($uploaddir3,"icon",true,true,0,$check_type);
		
		}else{
		$icon=$_REQUEST['icon1'];
		}
	
	}else{
	
	$icon=$up->upload_file($uploaddir3,"icon",true,true,0,$check_type);
	
	
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
	
	if($act=="edit")
	{

	if(!empty($_FILES['mobileicon']['name']))
		{
		$mobileicon=$up->upload_file($uploaddir3,"mobileicon",true,true,0,$check_type);
		
		}else{
		$mobileicon=$_REQUEST['image5'];
		}
	
	}else{
	
	$mobileicon=$up->upload_file($uploaddir3,"mobileicon",true,true,0,$check_type);
	
	
	}
	if(!empty($_REQUEST['featured1'])){$f=$_REQUEST['featured1'];}else{$f='no';}
$sdate = date("Y-m-d", strtotime($_REQUEST['sdate']));
//print_r($_POST);
$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$catname = mysqli_real_escape_string($link, $_REQUEST['catname']);
$cat_desc = mysqli_real_escape_string($link, $_REQUEST['cat_desc']);
$updatearr=array(	"catname"=>$catname,
					//"cat_desc"=>$cat_desc,
					"imgid"=>$largeimage,
					"bimg"=>$largeimage1,
					"icon"=>$icon,
					"mobileicon"=>$mobileicon,
					"cat_date"=>date('Y-m-d'),
					"sdate"=>$sdate,
					"featured"=>$f,
					"status"=>$_REQUEST['catstatus']
						);
					
						
	if($act=="edit")
		{
		$whereClause=" id!=".$catid." and catname='".$_REQUEST['catname']."'" ;
		}elseif($act=="add"){
		$whereClause="catname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists($_TBL_CAT, $whereClause))
		{
			
			$errMsg='<br>Category already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$catid;
					updateData($updatearr, $_TBL_CAT, $whereClause);
					$where=" id=".$catid;
					
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_CAT);
					$where=" id=".$insid;
					
					
					
							 $errMsg='<br><b>Category Added Successfully!</b><br>';
							//redirect('main.php?mod=cat');
						
					
				}
			
			
			}
	}
if(!empty($catid) and $act=="edit")
	{
		$sql="SELECT * FROM $_TBL_CAT WHERE id=$catid";
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
					<?php //print_r($updatearr);	?>
                        <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						 <input type="hidden" name="image4" value="<?=$row['bimg']?>" />
                        <input type="hidden" name="image3" value="<?=$row['imgid']?>" />
						<input type="hidden" name="icon1" value="<?=$row['icon']?>" />
						<input type="hidden" name="image5" value="<?=$row['mobileicon']?>" />
							<fieldset>
								<!-- Name input-->
                               
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name"> Title</label>
                                        <div class="col-md-9">
                                        <input id="catname" name="catname" type="text" placeholder=" Title" class="form-control" value="<?=$row['catname']?>">
                                        </div>
                                    </div>
							
                      
                                    
                                   
                                  
        							
                                    	<!--<div class="form-group">
        									<label class="col-md-3 control-label"> Detail</label>
            									<div class="col-md-9">
                                                      <textarea name="cat_desc" class="form-control"><?=$row['cat_desc']?></textarea>
            									 
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
                                         
                                        
                                    
                                    
                                    
        							
                                    
                                    	<div class="form-group">
        									<label class="col-md-3 control-label"> Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['imgid']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewaimage.php?img=<?=$row['imgid']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                                         
                                         	<div class="form-group">
        									<label class="col-md-3 control-label"> Banner Image</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage1" id="largeimage1"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['bimg']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewaimage.php?img=<?=$row['bimg']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                							
                                         
										 <div class="form-group">
        									<label class="col-md-3 control-label"> Icon</label>
        									<div class="col-md-9">
                                                <input type="file" name="icon" id="icon"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['icon']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewaimage.php?img=<?=$row['icon']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
										
										 <div class="form-group">
        									<label class="col-md-3 control-label"> Mobile Icon</label>
        									<div class="col-md-9">
                                                <input type="file" name="mobileicon" id="mobileicon"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['mobileicon']){?><a href="javascript:void(0)" onclick="javascript:window.open('viewaimage.php?img=<?=$row['mobileicon']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
                							
                                            	<div class="form-group">
                									<label class="col-md-3 control-label"> Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="catstatus" type="radio" value="yes" <?php if($row['status']=="yes"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="catstatus" type="radio" value="no" <?php if($row['status']=="no"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
                									</div>
                								</div>
                                                
                                      
                                        	<div class="form-group">
                									<label class="col-md-3 control-label"> Featured Brands</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="featured1" type="radio" value="no" <?php if($row['featured']=="no"){echo " checked";}?> onclick="myFunction()"/>No
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="featured1" type="radio" value="yes" <?php if($row['featured']=="yes"){echo " checked";}?>  onclick="myFunction()"/>Yes
                    										</label>
                    									</div>
                									</div>
                								</div>
             <script type="text/javascript">
          function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
		  </script>
                                      
                                     <div class="form-group" id="myDIV" style="display:none;">
                                        <label class="col-md-3 control-label" for="sdate"> Start date</label>
                                        <div class="col-md-9">
                                        <input id="sdate" name="sdate" type="date" placeholder=" Title" class="form-control" value="<?=$row['sdate']?>">
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