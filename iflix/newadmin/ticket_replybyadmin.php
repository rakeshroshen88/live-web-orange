<?php include("header.php");?>
<?php
$_TBL_USER='all_user';

$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(!empty($id))
	{
		 $sql="SELECT * FROM ticket_reply WHERE rid=$id";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		
		
	}
$sql1 = "UPDATE ticket_reply SET reply_read = '1' WHERE ticketid=".$row['ticketid'];
$db->query($sql1);

if($_POST['Submit']=="Reply")
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
					 "reply"=>$reply,
					 "ticketid"=>$_REQUEST['ticketid'],
					 "user_id"=>$_REQUEST['user_id'],
					 "reply_read"=>0,
					 "img_id"=>$largeimage,
					 "tdate"=>date("Y-m-d H:i:s")
						);
					$whereClause=" rid=".$_REQUEST['rid'];
					$insid=updateData($updatearr, 'ticket_reply', $whereClause);	
						
					$errMsg='<br><b>Reply updated Successfully!</b><br>';						
					
	
			
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
						
						<input type="hidden" name="ticketid" value="<?=$row['ticketid']?>" />
						<input type="hidden" name="rid" value="<?=$row['rid']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						
						<input type="hidden" name="image3" value="<?=$row['img_id']?>" />
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
                                        <label class="col-md-2 control-label" for="name">Ticket Id</label>
                                        <div class="col-md-10">
										#<?=$row['ticketid']?>
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
						<div class="row" >
									
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Subject</label>
                                        <div class="col-md-10">
                                        <input id="firstname" name="firstname" type="text" placeholder="Subject" class="form-control" value="<?=$row['subject']?>" readonly>
                                        </div>
                                  
							</div>
									</div>
    



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
    


					<div class="row" >
									<div class="form-group">
        									<label class="col-md-2 control-label">Reply:</label>
            									<div class="col-md-10">
		<textarea name="reply" class="editor-base"><?=$row['reply']?></textarea>
									</div>
        								</div>
									</div>
    	
<div class="row">
<div class="form-group">
        									<label class="col-md-2 control-label"> Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <!--<?php if($row['picture']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['picture']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>-->
        									 
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
<h3> <?=$row['comment']?></h3>
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
						<a href="//orangestate.ng/admin/admin_new/ticket_reply.php?act=edit&id=<?=$row['id']?>" class="btn btn-xs btn-small btn-default"> <span class="glyphicon glyphicon-edit" title="Edit" ></span></a>
                       <!--<input type="button" value="Edit" onclick="javascript:deladmin("<?=$row2['rid']?>")" class="btn btn-xs btn-small btn-default">-->
                     <input type="button" value="Delete" onclick="javascript:deladmin("<?=$row2['rid']?>")" class="btn btn-xs btn-small btn-danger">
                                                    </div>
                        <div class="editbtnst2" style="display:none">
                            
                            <input type="button" value="Save" onclick="editTicketSave('t2')" class="btn btn-xs btn-small btn-success">
                            <input type="button" value="Cancel" onclick="editTicketCancel('t2')" class="btn btn-xs btn-small btn-default">
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

                    </div> <!-- END PAGE CONTAINER -->

    </div> 
<!--<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>                  
-->
<script>
jQuery(document).on("change","#country",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajstate.php';
        var dataString ="cid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showstate').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#state",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajcity.php';
        var dataString ="sid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showcity').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#cityname",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajhotel.php';
        var dataString ="hid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showhotel').html(response);
                }else{
                
                }
            },
        });
});

</script>

	<script>

function showUser(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHint").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
	
    }
  }
  
xmlhttp.open("GET","pages/ajcity.php?q="+str,true);
xmlhttp.send();
}
}



function showhotel(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHinthotel").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
		
    document.getElementById("txtHinthotel").innerHTML=xmlhttp1.responseText;
	
	
    }
  }
  
xmlhttp1.open("GET","pages/ajhotel.php?q="+str,true);
xmlhttp1.send();
}
}

</script>														  
<script language="javascript">
function getCheckedCheckboxesFor(checkboxName) {
    var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
		
		$('#emplist').val(values);
    });
    return values;
}
	</script>
	
	
	
	<script language="javascript">
function getCheckedCheckboxesFor1(checkboxName) {
    var checkboxes1 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes1, function(el1) {
        values.push(el1.value);
		
		$('#emplist1').val(values);
    });
    return values;
}
	</script>
	
	
	<script language="javascript">
function getCheckedCheckboxesFor2(checkboxName) {
    var checkboxes2 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes2, function(el2) {
        values.push(el2.value);
		
		$('#emplist2').val(values);
    });
	
    return values;
}
	</script>
	
	
		<script language="javascript">
function getCheckedCheckboxesFor3(checkboxName) {
    var checkboxes3 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes3, function(el3) {
        values.push(el3.value);
		
		$('#emplist3').val(values);
    });
    return values;
}
	</script>


<?php include("footer.php") ?>

	