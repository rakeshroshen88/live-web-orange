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
	if(!empty($_FILES['largeimage1']['name']))
		{
		$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type);
		
		}else{
		$largeimage1=$_REQUEST['image4'];
		}
	
	

$updatearr=array(	 
					 "user_id"=>$_SESSION['sess_webid'],
					 "subject"=>$_REQUEST['subject'],
					 "name"=>$profilerow['last_name'].' '.$profilerow['last_name'],
					 "email"=>$profilerow['first_name'],
					 "img_id"=>$largeimage1,
					 "priority"=>$_REQUEST['priority'],
					 "department"=>$_REQUEST['department'],
					 "comment"=>$_REQUEST['message'],
					 "close"=>0,
					 "sdate"=>date('Y-m-d'),
					 "status"=>1
						);
					$insid=insertData($updatearr, 'support_system');
						//print_r($updatearr); die;
						redirect("supporttickets.php");
	}
						
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
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="inputName">Name</label>
            <input type="text" name="name" id="name" value="<?=$profilerow['first_name']?> <?=$profilerow['last_name']?>" class="form-control disabled" disabled="disabled">
        </div>
        <div class="form-group col-sm-5">
		
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="<?=$_SESSION['sess_webmail']?>" class="form-control disabled" disabled="disabled">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-10">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" value="" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="department">Department</label>
            <select name="department" id="department" class="form-control" >
            <option value="Support" selected="selected">
                        Support
                    </option>
					
					<option value="Sales" >
                        Sales
                    </option>
					
					<option value="Purchase" >
                        Purchase
                    </option>
                            </select>
        </div>
                <div class="form-group col-sm-3">
            <label for="priority">Priority</label>
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
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" rows="12" class="form-control markdown-editor" data-auto-save-name="client_ticket_open"></textarea>
    </div>

    <div class="row form-group">
        <div class="col-sm-12">
            <label for="inputAttachments">Attachments</label>
        </div>
        <div class="col-sm-9">
            <input type="file" name="largeimage1" id="largeimage1" class="form-control">
            <div id="fileUploadsContainer"></div>
        </div>
        
        <div class="col-xs-12 ticket-attachments-message text-muted">
            Allowed File Extensions: .jpg, .gif, .jpeg, .png
        </div>
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