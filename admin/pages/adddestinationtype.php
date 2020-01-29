<?php 
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';

if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$up=new UPLOAD();

$uploaddir3="../protection/";
$check_type="jpg|jpeg|gif|png";
/* if($act=="edit")
	{

	if(!empty($_FILES['largeimage']['name']))
		{
		$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
		
		}else{
		$largeimage=$_REQUEST['image3'];
		}
	
	}else{
	
	$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
	
	
	} */

 $prod_detail=$_REQUEST['link'];
$updatearr=array(	
					 "title"=>$_REQUEST['title'],					 
					 //"imageid"=>$largeimage,
					 //"link"=>$prod_detail,
					 "status"=>$_REQUEST['pstatus'],
					 "date"=>date('Y-m-d')
					 );

				
			if($act=="edit")
				{
					 $whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, 'destinationtype', $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'destinationtype');
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							redirect('main.php?mod=viewdestype');
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM destinationtype WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Destination type</li> <span style="color:red; font-size:14px;"<?=$errMsg?></span>
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
                                        <label class="col-md-3 control-label" for="name">  Title</label>
                                        <div class="col-md-9">
                                        <input id="title" name="title" type="text" placeholder=" Title" class="form-control" value="<?=$row['title']?>">
                                        </div>
                                    </div>
							
                      
                                    
                                   
                                  
        							
                                        
                                                      
                                    
                                    
                                    	<!-- File input-->
        							
                                     
                                         
                							
                                         
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
						</form>
					</div>
                    
                    
                    
                    
                    <!--/.row-->	
				</div>
				
				 
				
			</div><!--/.col-->
			 
		</div><!--/.row-->
	</div>