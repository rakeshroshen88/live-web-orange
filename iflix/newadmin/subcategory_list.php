<?php include("header.php") ?>
<?php
$mod=$_REQUEST['mod'];
$catname=$_REQUEST['catname'];
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$stat=$_REQUEST['stat'];
$rec=$_REQUEST['rec'];
if($act=='dac')
	{
		if($stat=='0')
			$stat='1';
		else
			$stat='0';
		 $sql="UPDATE $_TBL_SUBCAT SET sub_status='$stat' WHERE id='$catid'";
		$db->query($sql);
		$errMsg='<br><b>Update Successfully!</b><br>';
		
	}

if($act=='del')
	{
		
		$sql="DELETE FROM $_TBL_SUBCAT WHERE id='$catid'";
		$db->query($sql);
		$errMsg='<br><b>Deleted Successfully!</b><br>';
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="https://iflex.ng/admin/admin_new/subcategory_list.php?act=del&aid=<?=$_SESSION['SES_ADMIN_ID']?>&id="+id;
	}
}
</script>

    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">Manage Category</li>
        </ul>
    </div>

    <!-- START PAGE CONTAINER -->
    <div class="page_container">
        <div class="container">
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

            <div class="row">
                  <div class="col-md-12">
                      <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Manage Sub Category</h5>
                                    <p>List of all Sub Category</p>
                                </div>

                                <div class="heading-elements">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-icon-fixed dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bars"></span> Export</button>
                                        <ul class="dropdown-menu dropdown-left">
                                             
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"> XLS</a></li>
                                             
                                        </ul>
                                    </div> 
                                </div>


                            </div>
                            <!-- END HEADING -->

                            <div class="block-content">

                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
                                    <thead>
                                         <th >Sl No.</th>
						        <th >Sub Category </th>
						       <th >Category </th>
						        <th >Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                    </thead>
                                    <tbody>
	<?php	$db1=new DB();
	$sql="SELECT * from ".$_TBL_SUBCAT." order by id desc";
	$db->query($sql);
	if($db->numRows()>0)
		{
			$ct=1;
	while($row=$db->fetchArray()){
$cat=$db1->getSingleResult("select catname from category where id=".$row['catid']);
	
	

$date=explode('-',$row['subcatdate']);

$st=mktime(0,0,0,$date[1],$date[2],$date[0]);			
	?>					
	<tr>
						<td><?=$ct?></td>
                        <td> <a href="https://iflex.ng/admin/admin_new/add_subcategory.php?act=edit&aid=<?=$_SESSION['SES_ADMIN_ID']?>&id=<?=$row['id']?>"><?=$row['subcatname']?></a></td>
							<td><?=$cat?></td>

                   
						<td> <?php echo date('d M,Y',$st);?></td>
                    <td> <a href='https://iflex.ng/admin/admin_new/subcategory_list.php?act=dac&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>&stat=<?=$row['sub_status']?>'><?=$row['sub_status']=='0'?'Deactive':'Active'?></a> </td>
                           
                        <td > <a href="https://iflex.ng/admin/admin_new/add_subcategory.php?act=edit&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span></a>
						</td>
                     </tr>
                                      
	<?php $ct=$ct+1; } } ?>  
                                    </tbody>
                                </table>

                            </div>

                            </div>
                  


                  </div>  
 
            </div>

        </div> 
        <!-- END PAGE CONTAINER -->
    </div>
    <!-- END page_container -->

    <?php include("footer.php") ?>