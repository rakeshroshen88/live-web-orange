<?php include("header.php");
$rid=$_REQUEST['rid'];
$id=$_REQUEST['id'];
$tid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if($act=='del')
	{
		
		$sql="DELETE FROM ticket_reply WHERE rid='$rid'";
		$db->query($sql);
		$errMsg='<br><b>Deleted Successfully!</b><br>';
	}
$sql1 = "UPDATE ticket_reply SET reply_read = '1' WHERE ticketid=".$id;
$db->query($sql1);

if($_POST['Submit']=="Reply")
	{
$tid=$_REQUEST['ticketid'];
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
					 "reply"=>$reply,
					 "ticketid"=>$_REQUEST['ticketid'],
					 "user_id"=>0,
					 "reply_read"=>0,
					 "img_id"=>$largeimage,
					 "tdate"=>date("Y-m-d H:i:s")
						);
						
						$insid=insertData($updatearr, 'ticket_reply');
						if($insid>0)
							{
								
								 $errMsg='<br><b>Reply Added Successfully!</b><br>';	
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
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:12px"> <span style="border-collapse:collapse;font-size:16px;width:100%;display:block">'.$_REQUEST['ticketstatus'].' </span> 
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
					<br>Your Reply #'.$_REQUEST['reply'].'</br>
					<br>This message is regarding your <a href="https://orangestate.ng/reply_ticket.php?id="'.$tid.'>ticket ID #'.$tid.'</a>. We are changing the status of this ticket to Closed (no survey) as we have not heard back from you in 72 hours.<br>
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

$sql1 = "UPDATE support_system SET status = '".$_REQUEST['ticketstatus']."' WHERE id=".$tid;
$db->query($sql1);									
							}
	//print_r($updatearr);
	
			
	}

if(!empty($id))
	{
		 $sql="SELECT * FROM support_system WHERE id=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		
		
	}
?>

<script>
var id=<?=$id?>;
function deladmin(rid)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&act=del&rid="+rid+"&id="+id;
	}
}
</script>
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
						
						<input type="hidden" name="image3" value="<?=$row['img_id']?>" />
						<input type="hidden" name="user_id" value="<?=$row['user_id']?>" />
						  <input type="hidden" name="priority" value="<?=$row['priority']?>" />
  
   <input type="hidden" name="department" value="<?=$row['department']?>" />
  
   <input type="hidden" name="status" value="<?=$row['status']?>" />
  <input type="hidden" name="email" value="<?=$row['email']?>" />
  <input type="hidden" name="name" value="<?=$row['name']?>" />
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
                                        <label class="col-md-2 control-label" for="name">Ticket Id</label>
                                        <div class="col-md-10">
										<div class="row">
										<div class="col-md-1">
										#<?=$row['id']?>
										</div>
										<div class="col-md-5">
                                       <select name="ticketstatus" id="ticketstatus" class="form-control select-inline">
                    <option value="Open" <?php if($row['status']=='Open'){ echo "selected";} ?> style="color:#779500">Open</option>
                   <!-- <option value="Answered" style="color:#000000">Answered</option>
                    <option value="Customer-Reply" style="color:#ff6600">Customer-Reply</option>
                    <option value="On Hold" style="color:#224488">On Hold</option>-->
                    <option value="In Progress"  <?php if($row['status']=='In Progress'){ echo "selected";} ?>  style="color:#cc0000">In Progress</option>
                    <option value="Closed"  <?php if($row['status']=='Closed'){ echo "selected";} ?>  style="color:#888888">Closed</option>
            </select>
                                        </div>
									   </div>
									    </div>
                                  
							</div>
									</div>
						<div class="row" >
									
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Subject</label>
                                        <div class="col-md-10">
                                        <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control" value="<?=$row['subject']?>" >
                                        </div>
                                  
							</div>
									</div>
    




<!--
<div class="row" >
									 <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Question</label>
                                        <div class="col-md-10">
                                       <h3> <?=$row['comment']?></h3>
									   <?php if(!empty($row['img_id'])){ ?>
									   <a href="../../support/<?=$row['img_id']?>"  target="_blank"> Ticket Image</a>
									   <?php } ?>
									   
		                          </div>
                                    </div>
									</div>
  -->  


					<div class="row" >
									<div class="form-group">
        									<label class="col-md-2 control-label">Reply:</label>
            									<div class="col-md-10">
		<textarea name="reply" class="editor-base" ></textarea>
									</div>
        								</div>
									</div>
    	
<div class="row">
<div class="form-group">
        									<label class="col-md-2 control-label"> Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png, doc, pdf)</span>  <!--<?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>-->
        									 
        									</div>
        								</div>
</div>  
 
                                                
<!--
                                                              <div class="row">
										 	<div class="form-group">
                									<label class="col-md-2 control-label"> Status</label>
                									<div class="col-md-10">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1"<?php if($row['status']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0"<?php if($row['status']=="0"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
														</div> </div></div>-->


                                <!-- END RECENT -->

<p></p>

                    </div>

                </div>
<p></p>
             

            </div>



             <div class="block ">                            

                             

                            <p class="text-right">

                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>

                                <!--<button class="btn btn-success btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button>-->

<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed" value="Reply"  />
                               

                            </p>

                             

                        </div>

</form>

        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>
 <div class="col-xs-12">
<div id="ticketreplies">
<?php 
$date1=explode(' ',$row['sdate']);		
	$date=explode('-',$date1[0]);
	$st1=mktime(0,0,0,$date[1],$date[2],$date[0]);
?>
              <div class="reply  staff">
				<div class="leftcol">
                     <div class="submitter">
					 <?php if($row['user_id']==0){?>
                       <div class="name">Admin</div>
                         <?php }else{ ?>  
						 <div class="name"><?=$first_name?></div>
						 <?php } ?>
                       </div>
                    <div class="tools">
                        <div class="editbtnst2">
						 <input type="button" value="Edit"  class="btn btn-xs btn-small btn-danger" disable>
						<!--<a href="" class="btn btn-xs btn-small btn-default"disable> <span class="glyphicon glyphicon-edit" title="Edit" ></span></a>
                       <input type="button" value="Edit" onclick="javascript:deladmin("<?=$row2['rid']?>")" class="btn btn-xs btn-small btn-default">-->
                     <input type="button" value="Delete"  class="btn btn-xs btn-small btn-danger" disable>
                                              </div>
                       
                    </div>
                </div>
                <div class="rightcol">
                           <div class="quoteicon">
						   <?php if(!empty($row['img_id'])){ ?>
                            <a href="../../support/<?=$row['img_id']?>">View Document</a>
						   <?php } ?>
							</div>
                        <div class="postedon"> Posted on <?php echo date('d M,Y',$st1);?>
                    </div>
                    <div class="msgwrap" id="contentt2">
                        <div class="message markdown-content">
<?=$row['comment']?>
                        </div>
                                            </div>
                </div>
              <div class="clear"></div>
            </div>
           
<!--<h3> <?=$row['comment']?></h3>-->
<?php $ct=1;
		$dbr=new DB();
		$sql1="SELECT * FROM ticket_reply WHERE ticketid=$id ";
		$dbr->query($sql1)or die($dbr->error());
		while($row2=$dbr->fetchArray()){
	$date1=explode(' ',$row2['tdate']);		
	$date=explode('-',$date1[0]);
	$st=mktime(0,0,0,$date[1],$date[2],$date[0]);
			$first_name=$db->getSingleResult("select first_name from all_user where  user_id=".$row2['user_id']);
			?>	
		
              <div class="reply  staff">
				<div class="leftcol">
                     <div class="submitter">
					 <?php if($row2['user_id']==0){?>
                       <div class="name">Admin</div>
                         <?php }else{ ?>  
						 <div class="name"><?=$first_name?></div>
						 <?php } ?>
                       </div>
                    <div class="tools">
                        <div class="editbtnst2">
						<a href="//orangestate.ng/admin/admin_new/ticket_replybyadmin.php?act=edit&id=<?=$row2['rid']?>" class="btn btn-xs btn-small btn-default"> <span class="glyphicon glyphicon-edit" title="Edit" ></span></a>
                       <!--<input type="button" value="Edit" onclick="javascript:deladmin("<?=$row2['rid']?>")" class="btn btn-xs btn-small btn-default">-->
                     <input type="button" value="Delete" onclick="deladmin('<?=$row2['rid']?>')" class="btn btn-xs btn-small btn-danger">
                                              </div>
                       
                    </div>
                </div>
                <div class="rightcol">
                           <div class="quoteicon">
						   <?php if(!empty($row2['img_id'])){ ?>
                            <a href="../../support/<?=$row2['img_id']?>">View Document</a>
						   <?php } ?>
							</div>
                        <div class="postedon"> Posted on <?php echo date('d M,Y',$st);?>
                    </div>
                    <div class="msgwrap" id="contentt2">
                        <div class="message markdown-content">
<?=$row2['reply']?>
                        </div>
                                            </div>
                </div>
              <div class="clear"></div>
            </div>
           
<?php  $ct=$ct+1; } ?>
</div>

  </div>                      
<style>
#ticketreplies .reply .leftcol {
    float: left;
    width: 200px;
}


#ticketreplies .reply .rightcol {
    margin-left: 200px;
    border-left: 1px solid #e5e5e5;
    min-height: 150px;
}

#ticketreplies .postedon {
    padding: 10px 12px 0 12px;
    font-size: 11px;
    color: #999;
}

#ticketreplies .msgwrap {
    padding: 10px;
}

#ticketreplies .message {
    padding: 0;
    color: #000;
}

#ticketreplies .reply.staff {
    border: 1px solid #efe9d3;
    background-color: #faf8f1;
    box-shadow: 0 0 5px #f3efde;
}

#ticketreplies {
    word-wrap: break-word;
}

#ticketreplies .submitter {
    text-align: right;
    padding: 15px 20px;
}

#ticketreplies .submitter .name {
    font-weight: 700;
}
#ticketreplies .tools {
    margin: 0;
    padding: 0 20px;
    text-align: right;
}
#ticketreplies h3 {
    margin: 0;
    padding: 0 20px;
    
}
</style>
                    </div> <!-- END PAGE CONTAINER -->

    </div> 
<!--<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>                  
-->

	
	

<?php include("footer.php") ?>

	