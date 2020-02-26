<?php
$_TBL_USER='all_user';

$id=$_REQUEST['ticketid'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();

$uploaddir3="../support/";
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
					 "reply"=>$_REQUEST['reply'],
					 "ticketid"=>$_REQUEST['ticketid'],
					 "user_id"=>0,
					 "reply_read"=>0,
					 "tdate"=>date("Y-m-d H:i:s")
						);
						
						$insid=insertData($updatearr, 'ticket_reply');
						if($insid>0)
							{
								$errMsg='<br><b>Ticket Added Successfully!</b><br>';							
							}
	//print_r($updatearr);
	
			
	}

if(!empty($id))
	{
		$sql="SELECT * FROM support_system WHERE id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		
		$sql1 = "UPDATE ticket_reply SET reply_read = '1' WHERE user_id='".$row['user_id']."' and ticketid=".$id;
		$db->query($sql1);
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
						
						<input type="hidden" name="ticketid" value="<?=$_REQUEST['ticketid']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                        <input type="hidden" name="image3" value="<?=$row['imagepath']?>" />
							<fieldset>
								<!-- Name input-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Subject</label>
                                        <div class="col-md-9">
                                        <input id="firstname" name="firstname" type="text" placeholder="Your name" class="form-control" value="<?=$row['subject']?>">
                                        </div>
                                    </div>
							</div>														
                            
                            
                                    
                                     <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Question</label>
                                        <div class="col-md-9">
                                        <?=$row['comment']?>
		<?php $sql="SELECT * FROM ticket_reply WHERE ticketid=$id ";
		$db->query($sql)or die($db->error());
		while($row2=$db->fetchArray()){	if($row2['user_id']==0){?>
		<h2><span>Admin</span><?=$row2['reply']?></h2>
		<?php }else{ ?>
		<h2><span><?=$profilerow['first_name']?></span><?=$row2['reply']?></h2>
		
		<?php }} ?>
                                        </div>
                                    </div>
							</div>		
        						 
                                        
                                         
                                        
                                    
                                    
                                    	
                                         <div class="col-md-12">
                                    	<div class="form-group">
        									<label class="col-md-3 control-label">Reply:</label>
            									<div class="col-md-9">
		<textarea name="reply" class="form-control"></textarea>
									</div>
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