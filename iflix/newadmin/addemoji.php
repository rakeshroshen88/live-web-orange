<?php include("header.php") ?>
<?php
$prodid=$_REQUEST['id'];
$subid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if($act=='del')
	{
		
		  $sql="DELETE FROM emoji WHERE id='$prodid'";
		$db->query($sql);
		
	}
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();

$uploaddir3="../emoji/";
$check_type="jpg|jpeg|gif|png|gif|GIF";
$check_type1="mp3|MP3";
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
	
	
	
if($act=="edit")
	{

	if(!empty($_FILES['largeimage1']['name']))
		{
		$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type1);
		
		}else{
		$largeimage1=$_REQUEST['image4'];
		}
	
	}else{
	
	$largeimage1=$up->upload_file($uploaddir3,"largeimage1",true,true,0,$check_type1);
	
	
	}
$updatearr=array(	
					 "item_id"=>123,
					 "image"=>$largeimage,
					 "mp3"=>$largeimage1,					 
					 "userid"=>1
						);
		
	
			/* if($act=="edit")
				{
					$whereClause=" id=".$subid;
					updateData($updatearr, 'emoji', $whereClause);
					
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				 */
					$insid=insertData($updatearr, 'emoji');
					
					if($insid>0)
						{
							$errMsg='<br><b>Emoji Added Successfully!</b><br>';
							
						}
					
				/* }
			
			
			} */
	}
if(!empty($subid) and $act=="edit")
	{
		$sql="SELECT * FROM emoji WHERE id=$subid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>

    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

           

            <li class="active">Manage Emoji</li>

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

                                    <h5>Manage Slider</h5>

                                    

                                </div>



                                <div class="heading-elements">

                                    <div class="btn-group">

                            <a href="?act=add&aid=<?=$_SESSION['SES_ADMIN_ID']?>" class="btn btn-primary btn-icon-fixed">Add Slider</a>
                        
                    
                                       

                                    </div> 

                                </div>





                            </div>

                            <!-- END HEADING -->



                            <div class="block-content">



                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">

                                    <thead>

                                        <tr>

                                            <th>ID</th>
                                          
                                            <th>Mp3</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									  <?php
			$db1=new DB();
			$ct=1;
			 $sql="SELECT * from emoji order by id desc";
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
				$date=explode('-',$row['date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>

                                            <td><a href="?act=edit&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>"><?=$row['mp3']?></a> </td>
											
											
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
							$sql2="SELECT * FROM emoji where id=".$_REQUEST['id'];
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
	
	<form action="" method="post" enctype="multipart/form-data"  >
	<input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
                        <input type="hidden" name="image3" value="<?=$row['image']?>" />
						 <input type="hidden" name="image4" value="<?=$row['mp3']?>" />	
    <div class="panel-heading bg-completed">
        <p class="lead m-n">Add/Emoji</p>
    </div><!-- /.panel-heading -->

    <div class="panel-body">
    	          
					
				
			
            <div class="form-group">
            <label class="control-label">Mp3</label>
        
            <div class="input-group">
                <input type="file" name="largeimage1" id="largeimage1"><span style="color:#FF0000;">(MP3)</span>  <?php if($row['mp3']){?><a href="javascript:void(0)" onclick="javascript:window.open('allimg.php?img=<?=$row['mp3']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									                     
               
            </div>
          </div>
		  
		  
		    <div class="form-group">
            <label class="control-label">Image</label>
        
            <div class="input-group">
            <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['image']){?><a href="javascript:void(0)" onclick="javascript:window.open('allimg.php?img=<?=$row['image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									                        
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
	