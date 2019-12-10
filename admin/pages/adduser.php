<?php
$_TBL_USER='all_user';

$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();

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
$updatearr=array(	 
					 "first_name"=>$_REQUEST['firstname'],
					 "last_name"=>$_REQUEST['lastname'],	
					 "email_id"=>$_REQUEST['email'],
					 "mobile_no"=>$_REQUEST['userphone'],
					 //"address"=>$_REQUEST['streetaddress'],
					
					 //"message"=>$_REQUEST['message'],				
					
					//"imagepath"=>$largeimage,
					 "joindate"=>date("Y-m-d")
					
						);
	//print_r($updatearr);
	if($act=="edit")
		{
		$whereClause=" user_id!=".$_REQUEST['id']." and  email_id='".$_REQUEST['email']."'";
		}elseif($act=="add"){
		$whereClause=" email_id='".$_REQUEST['email']."'";
		}
	
	if(matchExists($_TBL_USER, $whereClause))
		{
			 $errMsg='<br>'.$_REQUEST['email'].' already exist!<br>';
		}else{
			if($act=="edit")
				{
					$whereClause=" user_id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_USER, $whereClause);
					$errMsg='<br><b>Updated Successfully!</b><br>';
				}elseif($act=="add")
					{	 
						$insid=insertData($updatearr, $_TBL_USER);
						if($insid>0)
							{
								$errMsg='<br><b>User Added Successfully!</b><br>';							
							}
					
					}
			
			}		
		
			
	}

if(!empty($id))
	{
		$sql="SELECT * FROM $_TBL_USER WHERE user_id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Member</li><?=$errMsg?>
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
                        <input type="hidden" name="image3" value="<?=$row['imagepath']?>" />
							<fieldset>
								<!-- Name input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Name</label>
                                        <div class="col-md-9">
                                        <input id="firstname" name="firstname" type="text" placeholder="Your name" class="form-control" value="<?=$row['first_name']?>">
                                        </div>
                                    </div>
							</div>														<div class="col-md-6">                                    <div class="form-group">                                        <label class="col-md-3 control-label" for="name">Last Name</label>                                        <div class="col-md-9">                                        <input id="lastname" name="lastname" type="text" placeholder="Your name" class="form-control" value="<?=$row['last_name']?>">                                        </div>                                    </div>							</div>
                            
                            
								<!-- Email input-->
                              <div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Your E-mail</label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control" value="<?=$row['email_id']?>">
									</div>
								</div>
                               </div>
								
                               <!-- 
                                <div class="col-md-6">
                                <div class="form-group">
									<label class="col-md-3 control-label" for="email">Your Password</label>
									<div class="col-md-9">
										  <input name="password" placeholder="Your Password" type="text" class="form-control" value="<?=$row['password']?>"/>          
									</div>
								</div>
                                </div>
                                
                                 <div class="col-md-6">
                                   <div class="form-group">
									<label class="col-md-3 control-label" for="email">Your Address</label>
									<div class="col-md-9">
										  <input name="streetaddress" placeholder="Your Address" type="text" class="form-control" value="<?=$row['address']?>"/>          
									</div>
								</div>
                                </div>
                                
                                 <div class="col-md-6">
                                   <div class="form-group">
									<label class="col-md-3 control-label" for="email">Your City</label>
									<div class="col-md-9">
										  <input name="city" placeholder="Your City" type="text" class="form-control" value="<?=$row['city']?>"/>          
									</div>
								</div>
                                </div>
                                <div class="col-md-6"> 
                                   <div class="form-group">
									<label class="col-md-3 control-label" for="email">Your State</label>
									<div class="col-md-9">
										  <input name="state" placeholder="Your State" type="text" class="form-control" value="<?=$row['state']?>"/>          
									</div>
								</div>
                               </div> -->
                               <div class="col-md-6">  
                                   <div class="form-group">
									<label class="col-md-3 control-label" for="email"> Phone No</label>
									<div class="col-md-9">
										  <input name="userphone" placeholder="Your Phone No" type="text" class="form-control" value="<?=$row['mobile_no']?>"/>          
									</div>
								</div>
                              </div>  
                                	<!-- Select input
    							 <div class="col-md-6">
                                	<div class="form-group">
    									<label class="col-md-3 control-label">Zip Code</label>
    									<div class="col-md-9">
                                            <input name="zip" placeholder="Your Pin Code" type="text" class="form-control" value="<?=$row['zip']?>"/>          
    									 
    									</div>
    								</div>
                                 </div>   
                                    
                                    
                                    
        							 <div class="col-md-6">
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">Select Country</label>
            									<div class="col-md-9">
                                                    <select class="form-control" name="country">
                                                        <option value="India">India</option>
                                                      
                                                    </select>
            									 
            									</div>
        								</div>
                                     </div>   
                                        
                                         
                                        
                                    
                                    
                                    	<!-- File input
                                        
                                         <div class="col-md-6">
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">Messaage:</label>
            									<div class="col-md-9">
										   <textarea name="message" class="form-control"><?=$row['message']?></textarea>
									</div>
        								</div>
                                     </div>   
        							<!-- <div class="col-md-6">
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">File input</label>
        									<div class="col-md-9">
                                                <input type="file" name="largeimage" id="largeimage">
        									 
        									</div>
        								</div>
                                    </div>   --> 
                                      
                                         
                                         	<!-- Radio input
                							
                                             <div class="col-md-6">
                                            	<div class="form-group">
                									<label class="col-md-3 control-label">User Status</label>
                									<div class="col-md-9">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 3
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 4
                    										</label>
                    									</div>
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