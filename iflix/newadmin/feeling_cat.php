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
		if($stat=='no')
			$stat='yes';
		else
			$stat='no';
		$sql="UPDATE $_TBL_FEELINGC SET status='$stat' WHERE id='$catid'";
		$db->query($sql);
		
	}

if($act=='del')
	{
		
		$sql="DELETE FROM $_TBL_FEELINGC WHERE id='$id'";
		$db->query($sql);
		
	}



$_TBL_LANCAT='feedback';
$prodid=$_REQUEST['id'];
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{

$up=new UPLOAD();

$uploaddir3="../../category/";
$check_type="jpg|jpeg|gif|png";

if($act=="edit")
	{

	if(!empty($_FILES['icon']['name']))
		{
		$icon=$up->upload_file($uploaddir3,"icon",true,true,0,$check_type);
		
		}else{
		$icon=$_REQUEST['icon1'];
		}
	
	}else{
	
	$icon=$up->upload_file($uploaddir3,"icon",true,true,0,$check_type);
	
	
	}

$updatearr=array(	"catname"=>$_REQUEST['catname'],
					"cat_desc"=>$_REQUEST['cat_desc'],					
					"icon"=>$icon,
					 "cat_date"=>date('Y-m-d'),
					 "status"=>$_REQUEST['catstatus']
						);
					
		//print_r($updatearr); die;				
	if($act=="edit")
		{
		$whereClause=" id!=".$catid." and catname='".$_REQUEST['catname']."'" ;
		}elseif($act=="add"){
		$whereClause="catname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists($_TBL_FEELINGC, $whereClause))
		{
			
			$errMsg='<br>Category already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$catid;
					updateData($updatearr, $_TBL_FEELINGC, $whereClause);
					
					
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_FEELINGC);
							 $errMsg='<br><b>Feeling Category Added Successfully!</b><br>';
							
						
					
				}
			
			
			}
	}
	?>
    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

           

            <li class="active">Manage Feeling category</li>

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

                                    <h5>Manage feeling category</h5>

                                    

                                </div>



                                <div class="heading-elements">

                                    <div class="btn-group">

                            <a href="?act=add&aid=<?=$_SESSION['SES_ADMIN_ID']?>" class="btn btn-primary btn-icon-fixed">Add feeling category</a>
                        
                    
                                       

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
			$sql="SELECT * from $_TBL_FEELINGC order by id desc";
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
				$date=explode('-',$row['cat_date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>

                                            <td><a href="?act=edit&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>"><?=$row['catname']?></a> </td>
											<td><?php echo date('d M,Y',$st);?></td>
											 <td><a href='?act=dac&aid=<?=$_SESSION['SES_ADMIN_ID']?>&id=<?=$row['id']?>&stat=<?=$row['status']?>'><?=$row['status']=='no'?'Deactive':'Active'?></a> </td>

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
							$sql2="SELECT * FROM $_TBL_FEELINGC where id=".$_REQUEST['id'];
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
	<input type="hidden" name="id" value="<?=$row['id']?>">
	<input type="hidden" name="act" value="<?=$act?>" />
	<input type="hidden" name="image4" value="<?=$row['bimg']?>" />
    <input type="hidden" name="image3" value="<?=$row['imgid']?>" />
	<input type="hidden" name="icon1" value="<?=$row['icon']?>" />
    <div class="panel-heading bg-completed">
        <p class="lead m-n">Add/feedback feedback</p>
    </div><!-- /.panel-heading -->

    <div class="panel-body">
    	          
					
				
			
            <div class="form-group">
            <label class="control-label">Title</label>
        
            <div class="input-group">
               <input id="catname" name="catname" type="text" placeholder=" Title" class="form-control" value="<?=$row['catname']?>">

               
            </div>
          </div>
		  
		  
		    <div class="form-group">
            <label class="control-label">Detail</label>
        
            <div class="input-group">
               <textarea name="cat_desc" class="form-control editor-base"><?=$row['cat_desc']?></textarea>
               
            </div>
          </div>
		  
		  
		  
		  
		  
		  <div class="form-group">
            <label class="control-label">Icon</label>
        
            <div class="input-group">
              <input type="file" name="icon" id="icon"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['icon']){?><a href="javascript:void(0)" onclick="javascript:window.open('../viewaimage.php?img=<?=$row['icon']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
               
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		    <div class="form-group">
            <label class="control-label">Status</label>
        
            <div class="input-group">
               <input name="catstatus" type="radio" value="yes" <?php if($row['status']=="yes"){echo " checked";}?>/>Active
			   <input name="catstatus" type="radio" value="no" <?php if($row['status']=="no"){echo " checked";}?>/>Deactive

               
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
	