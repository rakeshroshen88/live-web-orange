<?php include("header.php") ?>
<?php
$mod=$_REQUEST['mod'];
$firstname=$_REQUEST['firstname'];
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$stat=$_REQUEST['stat'];
$rec=$_REQUEST['rec'];
$qryStr="mod=$mod&firstname=$firstname";
if($act=='dac')
	{
		if($stat==0)

			$stat=1;

		else

			$stat=0;
		$sql="UPDATE allvideo SET status='$stat' WHERE id='$catid'";
		$db->query($sql);
		
	}

if($act=='del')
	{
		
		$sql="DELETE FROM allvideo WHERE id='$id'";
		$db->query($sql);
		
	}

$prodid=$_REQUEST['id'];
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();
$uploaddir1="../../images/video/";
$uploaddir2="../../images/video/";
$uploaddir3="../../images/video/";
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
$valid_formats = array("mp4", "MP4", "m4v", "f4v", "wmv", "wma", "WMV", "3GP");	
$size = $_FILES["fup"]["size"];

if($act=="edit")
	{
		

	if(!empty($_FILES['fup']['name']))
		{
		$files=$up->upload_file($uploaddir3,"fup",true,true,0,$valid_formats);
		
		
		}else{
		$files=$_REQUEST['image4'];
		
		}
	
	}else{
	
	$files=$up->upload_file($uploaddir3,"fup",true,true,0,$check_type);
	
	}	

$link = mysqli_connect("localhost", "iflex_iflexaccess", "pa@0lo~O=Ui3", "iflex_datahub");
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$video_details = mysqli_real_escape_string($link, $_REQUEST['video_details']);
	
	$updatearr1=array(	
											 "title"=>$title,
											 "duration"=>$_REQUEST['f_du'],
											 "status"=>$_REQUEST['pstatus'],
											
											 "videosize"=>$size,
											 "video_details"=>$video_details,
											 "image_id"=>$largeimage,
											 "video_id"=>$files,
											 "vdate"=>date('Y-m-d')

											 );

								
						if($act=="edit")
						{
					 $whereClause=" id=".$prodid;
					updateData($updatearr1, 'allvideo', $whereClause);
					$errMsg='<br><b>Update Successfully!</b><br>';
					}elseif($act=="add"){
						$insid1=insertData($updatearr1, 'allvideo');
						if($insid1>0){
						$errMsg='<br><b>Added Successfully!</b><br>';
						}else{
							$errMsg='<br><b>error!</b><br>';
						}
					}
	}
	?>
    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

           

            <li class="active">Manage video</li>

        </ul>

    </div>


<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="?<?=$qryStr?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>&act=del&id="+id;
	}
}
</script>
    <!-- START PAGE CONTAINER -->

    <div class="page_container">

        <div class="container">



            <div class="row">

                  <div class="col-md-9">

                      <div class="block block-condensed">

                            <!-- START HEADING -->

                            <div class="app-heading app-heading-small">

                                <div class="title">

                                    <h5>Manage video</h5>

                                    

                                </div>



                                <div class="heading-elements">

                                    <div class="btn-group">

                            <a href="?act=add&aid=<?=$_SESSION['SES_ADMIN_ID']?>" class="btn btn-primary btn-icon-fixed">Add video</a>
                        
                    
                                       

                                    </div> 

                                </div>





                            </div>

                            <!-- END HEADING -->



                            <div class="block-content">



                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">

                                    <thead>

                                        <tr>

                                            <th>ID</th>`
                                            <th>Title</th>
											<th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									  <?php
			$db1=new DB();
			$ct=1;
			$sql="SELECT * from allvideo order by id desc";
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
				$date=explode('-',$row['vdate']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>

                                            <td><a href="?act=edit&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>"><?=$row['title']?></a> </td>
											<td><?php echo date('d M,Y',$st);?></td>
											 <td><a href='?act=dac&aid=<?=$_SESSION['SES_ADMIN_ID']?>&id=<?=$row['id']?>&stat=<?=$row['status']?>'><?=$row['status']=='0'?'Deactive':'Active'?></a> </td>

											<td> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span></a></td>

                                        </tr>

<?php $ct=$ct+1; } ?>
<?php	}else{
	
?>  
						<tr><td colspan="" valign="top" align="center">Not found any record !</td></tr>                      
 <?php   } ?>   

                                    </tbody>

                                </table>



                            </div>



                            </div>

                  





                  </div>  
				  <div class="col-md-3">
				  
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
                
				  <?php 
                             if(!empty($_REQUEST['id'])){
							$sql2="SELECT * FROM allvideo where id=".$_REQUEST['id'];
							$db->query($sql2)or die($db->error());
							$row=$db->fetchArray();
							 }
				  
				  ?>
				  <style>
				  .bg-completed {
    background-color: #0A2D0F;
    border-color: #0A2D0F;
    color: #fff;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
	height: 40px;
}
.panel p {
    font-size: 14px;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
	
}
.m-t-lg {
    margin-top: 30px;
}
.btn-primary {
    background-color: #0a5114;
    border-color: #0a5114;
    color: #FFFFFF;
}
				  
				  </style>
	

			  <div  class="panel no-borders">
	
	<form action="" method="post"  >
	<input type="hidden" name="image3" value="<?=$row['image_id']?>" />
						<input type="hidden" name="image4" value="<?=$row['video_id']?>" />
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						
						<input type="hidden" name="act" value="<?=$act?>" />
    <div class="panel-heading bg-completed">
        <p class="lead m-n">Add video</p>
    </div><!-- /.panel-heading -->

    <div class="panel-body">
    	          
					
				
			
            <div class="form-group">
            <label class="control-label">Title</label>
        
            <div class="input-group">
               <input id="title" name="title" type="text" placeholder=" Title" class="form-control" value="<?=$row['title']?>">

               
            </div>
          </div>
		  
		  
		    <div class="form-group">
            <label class="control-label">Detail</label>
        
            <div class="input-group">
               <textarea name="video_details" class="form-control editor-base"><?=$row['video_details']?></textarea>
               
            </div>
          </div>
		  
		  
		  
		  
		  
		  <div class="form-group">
            <label class="control-label">Video Image</label>
        
            <div class="input-group">
              <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['icon']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['icon']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
               
            </div>
          </div>
		  
		  
									 <div class="form-group"><audio id='audio'></audio> 
                                        <label class="col-md-3 control-label" for="name"> Video</label>
                                        <div class="col-md-9"><input type='hidden' class="form-control"  name='f_du' id='f_du' size='5' value="<?=$row['duration']?>"/> 
                                       <!doctype html> 

<meta charset="utf-8" /> 



<input type='file' name='fup' id='fup' /><br> 


 
<audio id='audio'></audio> 
<script>
// Code to get duration of audio /video file before upload - from: https://coursesweb.net/ 
 
//register canplaythrough event to #audio element to can get duration 
var f_duration =0; //store duration 
document.getElementById('audio').addEventListener('canplaythrough', function(e){ 
 //add duration in the input field #f_du 
 f_duration = Math.round(e.currentTarget.duration); 
 document.getElementById('f_du').value = f_duration; 
 URL.revokeObjectURL(obUrl); 
}); 
 
//when select a file, create an ObjectURL with the file and add it in the #audio element 
var obUrl; 
document.getElementById('fup').addEventListener('change', function(e){ 
 var file = e.currentTarget.files[0]; 
 //check file extension for audio/video type 
 if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){ 
 obUrl = URL.createObjectURL(file); 
 document.getElementById('audio').setAttribute('src', obUrl); 
 } 
});
</script>

                                        </div>
                                    </div>
                                   
		  
		  
		  
		  
		  
		  
		  
		  
		    <div class="form-group">
            <label class="control-label">Status</label>
        
            <div class="input-group">
               <input name="pstatus" type="radio" value="1" <?php if($row['status']=="1"){echo " checked";}?>/>Active
			   <input name="pstatus" type="radio" value="0" <?php if($row['status']=="0"){echo " checked";}?>/>Deactive

               
            </div>
          </div>
		
		
		
                  
		<div class="m-t-lg">
           <input type="submit" name="Submit" class="ladda-button btn btn-primary btn-lg btn-phpjabbers-loader pull-left"  style="margin-right: 15px;" value="Save">
              <!--<span class="ladda-label">Save</span>-->
                <strong class="phpjabbers-loader ladda-spinner">
    
   
</strong>         
            <button type="button" class="btn btn-white btn-lg pull-right pjFdBtnCancel">Cancel</button>
        </div><!-- /.clearfix -->
    </div><!-- /.panel-body -->
</form></div>
				  
				  </div>

 

            </div>



        </div> 

        <!-- END PAGE CONTAINER -->

    </div>

    <!-- END page_container -->



    <?php include("footer.php") ?>
	