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
		 $sql="UPDATE language_category SET status= '$stat' WHERE id='$id'";
		$db->query($sql);
		
	}

if($act=='del')
	{
		
		$sql="DELETE FROM language_category WHERE id='$id'";
		$db->query($sql);
		
	}



$_TBL_LANCAT='language_category';
$prodid=$_REQUEST['id'];
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{


$up=new UPLOAD();

$uploaddir3="../category/";
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
					 "cat_date"=>date('Y-m-d'),
					 "status"=>'yes'
						);
					
		//print_r($updatearr); die;				
	if($act=="edit")
		{
		echo $whereClause=" id!=".$_REQUEST['id']." and catname='".$_REQUEST['catname']."'" ;
		}elseif($act=="add"){
		$whereClause="catname='".$_REQUEST['catname']."'" ;
		}
	if(matchExists($_TBL_LANCAT, $whereClause))
		{
			
			$errMsg='<br>Category already exist!<br>';
			
		}else{
			if($act=="edit")
				{
					$whereClause=" id=".$catid;
					updateData($updatearr, $_TBL_LANCAT, $whereClause);		
					
				
					$errMsg='<br><b>Update Successfully!</b><br>';
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, $_TBL_LANCAT);
					if($insid>0){
							 $errMsg='<br><b>Category Added Successfully!</b><br>';
					}else{
						$errMsg1='<br><b>error!</b><br>';
					}
						
						
					
				}
			
			
			}
	}
	?>
    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

           

            <li class="active">Manage Language category</li>

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

                                    <h5>Manage Language category</h5>

                                    

                                </div>



                                <div class="heading-elements">

                                    <div class="btn-group">

                            <a href="?act=add&aid=<?=$_SESSION['SES_ADMIN_ID']?>" class="btn btn-primary btn-icon-fixed">Add Language category</a>
                        
                    
                                        <!--<button class="btn btn-primary btn-icon-fixed dropdown-toggle" data-toggle="dropdown" style="width: 175px;"><span class="fa fa-bars" ></span> Export</button>

                                        <ul class="dropdown-menu dropdown-left">

                                             

                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"> XLS</a></li>

                                             

                                        </ul>-->

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
			$sql="SELECT * from language_category order by id desc";
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

											<td><a href="?act=edit&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span></a></td>

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
							 $sql2="SELECT * FROM $_TBL_LANCAT where id=".$_REQUEST['id'];
							$db->query($sql2)or die($db->error());
							$row3=$db->fetchArray();
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
	<input type="hidden" name="id" value="<?=$row3['id']?>">
	
						<input type="hidden" name="act" value="<?=$act?>" />
    <div class="panel-heading bg-completed">
        <p class="lead m-n">Add Category</p>
    </div><!-- /.panel-heading -->

    <div class="panel-body">
    	          
					
				
			
            <div class="form-group">
            <label class="control-label">Title</label>
        
            <div class="input-group">
               <input id="catname" name="catname" type="text" placeholder=" Title" class="form-control" value="<?=$row3['catname']?>">

               
            </div>
        </div>
		
		
		
                  
		<div class="m-t-lg">
            <input type="submit" name="Submit" class="ladda-button btn btn-primary btn-lg btn-phpjabbers-loader pull-left"  style="margin-right: 15px;" value="Save">
               <!-- <span class="ladda-label">Save</span>
                <strong class="phpjabbers-loader ladda-spinner">
    
   
</strong>        -->    
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>