<?php
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$updatearr=array(	
					 "cityname"=>htmlentities($_REQUEST['city']),					 
					 //"country"=>htmlentities($_REQUEST['country']),	
					"stateid"=>$_REQUEST['state'],	
					 "date"=>date('Y-m-d')
					 );
		
	//print_r($updatearr);
	if($act=="edit")
		{
		$whereClause=" id!=".$_REQUEST['id']." and  cityname='".$_REQUEST['city']."'";
		}elseif($act=="add"){
		$whereClause=" cityname='".$_REQUEST['city']."'";
		}
	
	if(matchExists('cities', $whereClause))
		{
			
			 $errMsg='<br>'.$_REQUEST['city'].' already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, 'cities', $whereClause);
					$errMsg='<br><b>Updated Successfully!</b><br>';
				}elseif($act=="add")
					{	
						$insid=insertData($updatearr, 'cities');
						if($insid>0)
							{
								$errMsg='<br><b>City Added Successfully!</b><br>';							
							}
					
					}
			
			}		
		
			
	}

if(!empty($id))
	{
		$sql="SELECT * FROM cities WHERE id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Add/Edit Location</li>
			<span style="color:#FF0000; font-size:18px;"><?=$errMsg?></span></ol>
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
                                        <label class="col-md-3 control-label" for="name">Location Name</label>
                                        <div class="col-md-9">
                                        <input id="city" name="city" type="text" placeholder="Your name" class="form-control" value="<?=$row['cityname']?>">
                                        </div>
                                    </div>
							</div>
                            
                            
								<!-- Email input-->
                              <div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Location State</label>
									<div class="col-md-9">
											<select id="state" name="state" class="form-control" >
                        <option>Select state</option>
		<?php $db1=new DB();
	$state=$row['stateid'];
		$sql1="SELECT * FROM  state_list";		
		
		$db1->query($sql1)or die($db11->error());
		while($row1=$db1->fetchArray()){
		  $tt=$row1['id'];
		?>				
                        <option value="<?=$row1['id']?>" <?php if($row1['id']==$state){echo " selected";}?>><?=$row1['state']?></option>
		<?php }?>	
                    </select>
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