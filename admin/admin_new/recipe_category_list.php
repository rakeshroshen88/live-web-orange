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
		$sql="UPDATE recipe_categories SET status='$stat' WHERE id='$catid'";
		$db->query($sql);
		$errMsg='<br><b>Update Successfully!</b><br>';
		
	}

if($act=='del')
	{
		
		$sql="DELETE FROM recipe_categories WHERE id='$catid'";
		$db->query($sql);
		$errMsg='<br><b>Deleted Successfully!</b><br>';
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="https://orangestate.ng/admin/admin_new/recipe_category_list.php?act=del&id="+id;
	}
}
</script>

    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Recipe</a></li>
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
                                    <h5>Manage Category</h5>
                                    <p>List of all Category</p>
                                </div>

                                <div class="heading-elements">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-icon-fixed dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bars"></span> Export</button>
                                        <ul class="dropdown-menu dropdown-left">
                                             
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"> XLS</a></li>
                                             
                                        </ul>
                                   
<a class="btn btn-primary btn-icon-fixed" href="add_recipe_cat.php?act=add" ><span class="fa fa-plus"></span> Add</a>
								   </div> 
                                </div>


                            </div>
                            <!-- END HEADING -->

                            <div class="block-content">

                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
                                    <thead>
                                         <th >Sl No.</th>
						        <th >Title </th>
								<th >Product </th>
								<th >Order </th>
						       
						        <th >Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                    </thead>
                                    <tbody>
	<?php	$db1=new DB();
	$sql="SELECT * from recipe_categories order by id desc";
	$db->query($sql);
	if($db->numRows()>0)
		{
			$ct=1;
	while($row=$db->fetchArray()){
$date=explode('-',$row['cat_date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);		
	?>					
	<tr>
						<td><?=$ct?></td>
                        <td> <a href="https://orangestate.ng/admin/admin_new/add_recipe_cat.php?act=edit&id=<?=$row['id']?>"><?=$row['catname']?></a></td>
							
                   <td>0</td>
				   <td>0</td>
						<td> <?php echo date('d M,Y',$st);?></td>
                    <td> <a href='https://orangestate.ng/admin/admin_new/recipe_category_list.php?act=dac&id=<?=$row['id']?>&stat=<?=$row['status']?>'><?=$row['status']=='no'?'Deactive':'Active'?></a> </td>
                           
                        <td > <?php if($_SESSION['Super_admin']=='superadmin'){ ?>
						<a href="https://orangestate.ng/admin/admin_new/add_recipe_cat.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> 
						
						&nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span></a>
						<?php }else{ ?>
						Not Allowed
						<?php } ?>
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