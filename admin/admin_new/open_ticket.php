<?php include("header.php");?>
<?php
$_TBL_USER='all_user';
$makearr=array();
$makearr=getValuesArr( "all_user", "user_id","first_name","", "" );
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if($_POST['Submit']=="Open")
	{

$up=new UPLOAD();

$uploaddir3="../../support/";
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
	
	
$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$reply = mysqli_real_escape_string($link, $_REQUEST['reply']);
			$updatearr=array(	 
						 "user_id"=>$_REQUEST['user_id'],
						 "subject"=>$_REQUEST['subject'],
						 "name"=>$_REQUEST['name'],
						 "email"=>$_REQUEST['email'],
						 "img_id"=>$largeimage,
						 "priority"=>$_REQUEST['priority'],
						 "department"=>$_REQUEST['department'],
						 "comment"=>$_REQUEST['message'],
						 "close"=>0,
						 "sdate"=>date('Y-m-d'),
						 "status"=>'Open'
						);
					$tid=insertData($updatearr, 'support_system');
						if($tid>0)
							{
							$errMsg='<br><b>Ticket Added Successfully!</b><br>';	

$invdetail.=' <table style="margin:auto;border-spacing:0;background:white;border-radius:12px;overflow:hidden" align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
	<tbody>
		<tr>
			<td style="border-collapse:collapse">
				<table style="border-spacing:0;border-collapse:collapse" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td style="border-collapse:collapse;padding:16px 32px" align="left" valign="middle">
								<table style="border-spacing:0;border-collapse:collapse" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td style="padding:0;text-align:left;border-collapse:collapse" width="40" align="left" valign="middle">
												<a href="">
													<img src="https://orangestate.ng/images/logo.png" title="OrangeState" alt="OrangeState" style="margin:auto;text-align:center;border:0;outline:none;text-decoration:none;min-height:40px" align="middle" border="0" width="40" class="CToWUd">
												</a>
											</td>
											<td width="16" align="left" valign="middle" style="border-collapse:collapse">&nbsp;</td>
											<td align="right" valign="middle">'.date('D m Y').'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:0 16px">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="background:#f7f9fa;padding:16px;border-radius:8px;overflow:hidden">
					<tbody>
						
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Ticket ID #</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal">'.$tid.'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
									
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Subject</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:16px;color:#5eaa46">'.$_REQUEST['subject'].'</td>
										</tr>
									
									
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Priority</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:16px;color:#5eaa46">'.$_REQUEST['priority'].'</td>
										</tr>
										
											<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Department</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:16px;color:#5eaa46">'.$_REQUEST['department'].'</td>
										</tr>
										
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Ticket Status</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:12px"> <span style="border-collapse:collapse;font-size:16px;width:100%;display:block">Open</span> 
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr></tr>
						
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:32px;background:#ffffff;,Arial,Helvetica,sans-serif">
				<p style="padding:0;margin:15px">Hi '.$_REQUEST['name'].'
					<br>'.$_REQUEST['message'].'</br>
					<br>This message is regarding your <a href="https://orangestate.ng/reply_ticket.php?id="'.$tid.'>ticket ID #'.$tid.'.</a> We are changing the status of this ticket to Closed (no survey) as we have not heard back from you in 72 hours.<br>
					If you have not made this transaction or notice any error please contact us at <a href="mailto:support@Orangestate.ng" style="color:#673ab7" target="_blank">support@Orangestate.ng</a> 
					<br>
					<br>Cheers!
					<br>Team OrangeState</p>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:16px 32px;border-top:1px solid #eaeaed;,Arial,Helvetica,sans-serif;font-size:12px">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						
						<tr>
							<td style="border-collapse:collapse;font-weight:normal;padding-top:16px;font-style:italic;color:#7e818c" colspan="3">Important Note: OrangeState or its merchant partners never ask for your OrangeState password, bank details or MPIN over email/phone. Please do not share your OrangeState password or MPIN with anyone. For any questions write to <a href="mailto:support@OrangeState.com" style="color:#673ab7" target="_blank">support@Orangestate.ng</a> 
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>';
 
									$to=$_REQUEST['email'];
			 						$adminto="info@orangestate.com";
									$message=$invdetail;		//die;
									$from='OrangeState '.$adminto;
									$subject="OrangeState Ticket #.".$tid;			
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);
							
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
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Support</a></li>

                            <li class="active">Reply</li>

                        </ul>

                    </div>

    <style>
	.form-group:last-child {
    margin-bottom: 15px !important;
}
	</style>                

                    <!-- START PAGE CONTAINER -->

    <div class="page_container">

                    <div class="container">

                                                   

                       <div class="row"> 
				<?php if(!empty($errMsg)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> <?=$errMsg?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>

<?php if(!empty($errMsg1)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Error!</strong> <?=$errMsg1?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>
                       <div  class="col-sm-12 verticle_tabs"> 

        <div class="col-xs-12">

            <!-- Tab panes -->
				<form name="frmprod"  method="post" action=""  enctype="multipart/form-data">
						
						<input type="hidden" name="ticketid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						
						<input type="hidden" name="image3" value="<?=$row['imagepath']?>" />
						<input type="hidden" name="user_id" value="<?=$row['user_id']?>" />
						<input name="gallery" type="hidden" value="hotal"/>  
						
            <div class="tab-content">

                <div class="tab-pane active" id="home">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Basic Information</h2>

                                          

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">
	<div class="row" >
									
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">User</label>
                                        <div class="col-md-10">
                                        <input id="user_id" name="user_id" type="text" placeholder="User Name" class="form-control" >
										<div id="suggesstion-box" class="searchrsult"></div>
										<?php /* echo createComboBox($makearr,"user_id",$row['user_id'] ," id='user_id' class='form-control country'") */?>
                                        </div>
                                  
							</div>
						</div>
    
<script>

$(document).ready(function(){
	$("#user_id").keyup(function(){
		$.ajax({
		type: "POST",
		url: "https://orangestate.ng/boxsearchadmin.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
	
	
	
jQuery(document).on("click", ".addname", function(e){

var userid=$(this).attr('userid');
var email_id=$(this).attr('email_id');
var name=$(this).attr('title');
jQuery("#user_id").val(userid);
jQuery("#name").val(name);
jQuery("#email").val(email_id);
});



	
	
	
	
	
	
});
//To select country name
function selectCountry(val) {

$("#search-box").val(val);
$("#suggesstion-box").hide();
}

/* $(function() {
	
	var $placeholder = $('input[placeholder]');
	
	if ($placeholder.length > 0) {
	
		var attrPh = $placeholder.attr('placeholder');
		
		$placeholder.attr('value', attrPh)
		  .bind('focus', function() {
			
			var $this = $(this);
			
			if($this.val() === attrPh)
				$this.val('').css('color','#171207');
			
		}).bind('blur', function() {
		
			var $this = $(this);
		
			if($this.val() === '')
				$this.val(attrPh).css('color','#333');
		
		});
	
	}
	
});

 */


</script>

						<div class="row" >
									
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="subject">Subject</label>
                                        <div class="col-md-10">
                                        <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control"  required>
										
                                        </div>
                                  
							</div>
						</div>
    
<div class="row">
        <div class="form-group">
            <label  class="col-md-2 control-label" for="inputName">Name</label> <div class="col-md-10">
            <input type="text" name="name" id="name" value="" class="form-control " required>
        </div>  
		</div>
</div>
<div class="row">
        <div class="form-group">
		
            <label for="email"  class="col-md-2 control-label">Email Address</label> <div class="col-md-10">
            <input type="email" name="email" id="email" value="" class="form-control disabled" required>
        </div>
		 </div>
    </div>

 <div class="row">
        <div class="form-group">
            <label for="department"  class="col-md-2 control-label">Department</label>
			 <div class="col-md-10">
            <select name="department" id="department" class="form-control" >
            <option value="Support" selected="selected">
                        Support
                    </option>
				</select>
        </div> </div>
	 </div>	
		<div class="row">
                <div class="form-group">
            <label for="priority"  class="col-md-2 control-label">Priority</label>
			 <div class="col-md-10">
            <select name="priority" id="priority" class="form-control">
                <option value="High">
                    High
                </option>
                <option value="Medium" selected="selected">
                    Medium
                </option>
                <option value="Low">
                    Low
                </option>
            </select>
        </div>
    </div>
    </div>
<div class="row" >
									 <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Query</label>
                                        <div class="col-md-10">
										<textarea name="message" id="message" class="editor-base"></textarea>
                                      
									   
		                          </div>
                                    </div>
									</div>
    


				
<div class="row">
<div class="form-group">
        									<label class="col-md-2 control-label"> Attachments</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png, pdf,doc)</span>  <!--<?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>-->
        									 
        									</div>
        								</div>
</div>  
 
   

<p></p>

                    </div>

                </div>
<p></p>
             

            </div>



             <div class="block ">                            

                             

                            <p class="text-right">

                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>


<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed" value="Open"  />
                               

                            </p>

                             

                        </div>

</form>

        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>

                    </div> <!-- END PAGE CONTAINER -->

    </div> 

<?php include("footer.php") ?>

	