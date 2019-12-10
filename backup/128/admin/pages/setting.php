   
   
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Change Password</li>
			</ol>
		</div><!--/.row-->
	<?php 
	
	if(empty($_SESSION['SES_ADMIN_ID'])){
	redirect("index.php");
	}
	if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{ $adminpassword=$_POST['pass'];
	$password =md5($_POST['pass']);
	  $salt =md5('samastkjfsdlkhfks5424737&^ds#@$^@$#&kjipu748574r random');

	  $hash = md5($salt . $password);
        mysql_query("UPDATE $_TBL_ADMIN
SET adminpassword='$hash'
WHERE id=1");
$MESSAGE="Password has been change Successfully!";
 }?>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default"> 
					<div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> Change Admin Password</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
                                <span style="color:#FF0000; font-size:18px;"><?=$MESSAGE?></span>
                                <div class="col-md-6 col-md-offset-2">
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-4 control-label">New Password</label>
									<div class="col-md-8">
									<input id="pass" name="pass" type="text" placeholder="New Password " class="form-control" required/>
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-4 control-label" >Confirm Password</label>
									<div class="col-md-8">
										<input id="pass1" name="pass1" type="text" placeholder="Confirm Password" class="form-control">
									</div>
								</div>
								
                                  
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-center text-center">
                                    <input name="Submit" type="submit" class="btn btn-default btn-md" value="Save"  />
										
									</div>
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
    
    