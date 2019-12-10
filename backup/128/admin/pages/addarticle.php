<?php
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{


$updatearr=array(	 
					 "title"=>$_REQUEST['title'],					
					 "email"=>$_REQUEST['email'],
					 "phone"=>$_REQUEST['phone'],
					 "address"=>$_REQUEST['address'],
					 "city"=>$_REQUEST['city'],
					 "state"=>$_REQUEST['state'],
					"company"=>$_REQUEST['company'],
					 "postedby"=>$_REQUEST['postedby'],
					 "zip"=>$_REQUEST['zip'],
					 "contact"=>$_REQUEST['contact'],
					  "category"=>$_REQUEST['category'],
					   "requirment"=>$_REQUEST['requirment'],
					   "other"=>$_REQUEST['other'],
					
					 "adate"=>date("Y-m-d"),
					
						);
	//print_r($updatearr);
	if($act=="edit")
		{
		$whereClause=" id!=".$_REQUEST['id']." and  title='".$_REQUEST['title']."'";
		}elseif($act=="add"){
		$whereClause=" title!='".$_REQUEST['title']."'";
		}
	
	if(matchExists($_TBL_ART, $whereClause))
		{
			
			 $errMsg='<br>'.$_REQUEST['title'].' already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, $_TBL_ART, $whereClause);
					$errMsg='<br><b>Updated Successfully!</b><br>';
				}elseif($act=="add")
					{	
						$insid=insertData($updatearr, $_TBL_ART);
						if($insid>0)
							{
								$errMsg='<br><b>Article Added Successfully!</b><br>';							
							}
					
					}
			
			}		
		
			
	}

if(!empty($id))
	{
		$sql="SELECT * FROM $_TBL_ART WHERE id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Article</li><?=$errMsg?>
			</ol>
		</div><!--/.row-->
	
        
        
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Add/Edit Form</div>
					<div class="panel-body">
					<div class="add-frim2">
                     
                       <form name="frmprod" class="form-horizontal" method="post" action="" onsubmit="return formValidator(this);" enctype="multipart/form-data">
						
						<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                        <input type="hidden" name="image3" value="<?=$row['imagepath']?>" />
                        <div class="table-responsive">
                                  <table class="table">
                                    
                                    <tbody>
                                        <tr>
                                        <td> Title :</td>
                                        <td colspan="3"><input type="text" class="form-control" name="title" value="<?=$row['title']?>"/></td>
                                        
                                      </tr>
                                      
                                      
                                      <tr>
                                        <td>Firm Name :</td>
                                        <td><input type="text" class="form-control" name="company" value="<?=$row['company']?>"/></td>
                                        <td>Category :</td>
                                        <td><input type="text" class="form-control" name="category" value="<?=$row['category']?>"/></td>
                                       
                                      </tr>
                                      
                                      
                                      
                                       <tr>
                                        <td>Contact Person  :</td>
                                        <td> <input type="text" class="form-control" name="contact" value="<?=$row['contact']?>"/> </td>
                                        <td>Requirement :</td>
                                        <td><input type="text" class="form-control" name="requirment" value="<?=$row['requirment']?>"/></td>
                                        
                                      </tr>
                                      
                                      
                                      
                                    
                                      
                                       <tr>
                                        <td colspan="4" class="head-details">Company Details : <hr /></td>
                                         
                                        
                                      </tr>
                                      
                                      
                                      <tr>
                                        <td>Address :</td>
                                        <td colspan="3"> <input type="text" class="form-control" placeholder=" Company Address" name="address" value="<?=$row['address']?>"/></td>
                                        
                                        
                                      </tr>
                                      
                                      <tr>
                                        <td> State :</td>
                                        <td>
                                             <select class="form-control" name="state">
                                                <option value="Delhi">Delhi</option>
                                                <option value="UP">UP</option>
                                            </select>
                                        </td>
                                        
                                        <td> City :</td>
                                        <td> 
                                            <select class="form-control" name="city">
                                                <option value="Delhi">Delhi</option>
                                                <option value="UP">UP</option>
                                            </select>
                                            
                                         
                                         </td>
                                         
                                  </tr>       
                               <tr>
                                        <td> Pin Code  :</td>
                                        <td> <input type="number" class="form-control" name="zip" value="<?=$row['zip']?>"/> </td>
                                        <td>  Phone :</td>
                                        <td><input type="number" class="form-control" name="phone" value="<?=$row['phone']?>"/></td>
                                        
                               </tr>
                               
                                <tr>
                                        <td> Posted By  :</td>
                                        <td> <input type="text" class="form-control" name="postedby" value="<?=$row['postedby']?>"/> </td>
                                        <td> Email-Id  :</td>
                                        <td> <input type="email" class="form-control" name="email" value="<?=$row['email']?>"/> </td>
                                        
                               </tr>
                               
                               
                                <tr>
                                        
                                        <td>  Other Detail :</td>
                                        <td><input type="text" class="form-control" name="other" value="<?=$row['other']?>"/></td>
                                        <td> </td>
                                        <td> </td>
                               </tr>
                                      
                                      
                                      <tr>
                                        <td colspan="4" class="text-center"> 
                                         <input name="Submit" type="submit" class="btn btn-primary" value="Save"  />
                                      
                                        
                                        </td>
                                         
                                        
                               </tr>
                               
                               
                                      
                                      
                                      
                                      
                               
                                       
                                    </tbody>
                                  </table>
                                  </div>
                            
                        <div class="clear"></div>       
                        
                        
                        
                        

                     </div>
                        
					</div>
                    
                    
                    
                    
                    <!--/.row-->	
				</div>
				
				 
				
			</div><!--/.col-->
			 
		</div><!--/.row-->
	</div>