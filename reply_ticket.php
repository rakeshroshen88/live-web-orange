<?php include('header.php'); 
include('chksession.php');
						$dbn=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();
				
if($_POST['Save']=="Save")
{

$up=new UPLOAD();
$uploaddir3="support/";
$check_type="jpg|jpeg|gif|png";

	
	

$updatearr=array(
					 "reply"=>$_REQUEST['reply'],
					 "ticketid"=>$_REQUEST['id'],
					 "user_id"=>$_SESSION['sess_webid'],
					 "reply_read"=>0,
					 "tdate"=>date("Y-m-d H:i:s")
						);
						
						$insid=insertData($updatearr, 'ticket_reply');
						if($insid>0)
							{
								$errMsg='<br><b>Ticket Added Successfully!</b><br>';							
							}
						//print_r($updatearr); die;
						redirect("supporttickets.php");
	}
$id=$_REQUEST['id'];			
$sql="SELECT * FROM support_system WHERE id=$id";
$db->query($sql)or die($db->error());
$row=$db->fetchArray();	
/////////////////////////////
$sql1 = "UPDATE ticket_reply SET reply_read = '1' WHERE user_id='0' and ticketid=".$id;
$db->query($sql1);			
	
	?>

    <section class="cover-sec">
	<div class="cover-sec1">
	<?php if(!empty($profilerow['cover_image_id'])){ ?>
	<img src="upload/<?=$profilerow['cover_image_id']?>" alt="" id="coverid" style="width:1920px; height:500px">
	<?php }else{ ?>
        <img src="images/resources/company-cover.jpg" alt="" id="coverid">
	<?php } ?>
	</div>
		<label class="btn btn-primary" style="position:absolute; right:10%; bottom:10%;">
			<input type="file" style="display:none;" id="file2" name="file2"/>
			Browse
		</label>
    </section>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                         <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <?php if($profilerow['image_id']=='' and empty($profilerow['image_id'])){ ?>
                                            <img src="images/resources/user.png" id="rmvid" alt="" height="120" width="120">
                                            <?php }else{?>
                                                <img src="upload/<?=$profilerow['image_id']?>" id="rmvid" alt="" height="200" width="120">
                                                <?php }?>
												<!-- <input type="file" id="file1">-->
												
                                                    <div class="add-dp" id="OpenImgUpload">
                                                        <input type="file" id="file1">
                                                        <label for="file1"><i class="fas fa-camera"></i></label>
                                                    </div>
                                    </div>
                                   
                                    <ul class="social_links">
                                        <li><a href="#" title=""><span>Open</span></a></li>
                                        <li><a href="#" title=""><span>Answered</span></a></li>
                                        <li><a href="#" title=""><span>Customer-Reply</span></a></li>
										<li><a href="#" title=""><span>Closed</span></a></li>
										 
                                 
                                    </ul>
                                </div>
                                <!--user_profile end-->
                               
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                       
					   <div class="col-lg-9">
                            <div class="main-ws-sec">
						<h1>Open Ticket</h1>
<form method="post"  enctype="multipart/form-data" role="form">
 <input type="hidden" name="Save" id="Save" value="Save" >
 <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
    <div class="row">
       
       
    </div>
    <div class="row">
        <div class="form-group col-sm-10">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" value="<?=$row['subject']?>" class="form-control">
        </div>
    </div>
    <div class="form-group">
	<p><?=$row['comment']?></p>
       <?php $sql="SELECT * FROM ticket_reply WHERE ticketid=$id ";
		$db->query($sql)or die($db->error());
		while($row2=$db->fetchArray()){	if($row2['user_id']==0){?>
		<h2><span>Admin</span><?=$row2['reply']?></h2>
		<?php }else{ ?>
		<h2><span><?=$profilerow['first_name']?></span><?=$row2['reply']?></h2>
		
		<?php }} ?>
    </div>
    <div class="form-group">
        <label for="reply">Reply</label>
        <textarea name="reply" id="reply" rows="12" class="form-control markdown-editor" ></textarea>
    </div>

 
    <p class="text-center">
        <input type="submit" id="openTicketSubmit" value="submit" class="btn btn-primary">
        <a href="supporttickets.php" class="btn btn-default">Cancel</a>
    </p>

</form>


  
                        </div>
                        <!--main-ws-sec end-->
                    </div>

                </div>
            </div>
            <!-- main-section-data end-->
        </div>
        </div>
    </main>
	

    <?php include('footer.php') ?>