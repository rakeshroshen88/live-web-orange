<?php include("header.php") ?>
<?php
$_TBL_PROD="product";
$rdb=new DB();
$makearr1=array();
$makearr1=getValuesArr( $_TBL_CAT, "id","catname","", "" );
$mod=$_REQUEST['mod'];
$firstname=$_REQUEST['firstname'];
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$stat=$_REQUEST['stat'];
$rec=$_REQUEST['rec'];
$qryStr="firstname=$firstname&mod=$mod&rec=$rec";
if($act=='dac')
	{
		
		if($stat==0){
			$stat=1;
		}else{
			$stat=0;
		}
		
		$sql="UPDATE resturant_recipe SET status='$stat' WHERE id='$id'";
		$db->query($sql);
		
	}


if($act=='del')
	{
		
		 $sql="DELETE FROM resturant_recipe WHERE id='$id'";
		$db->query($sql);
		
	}

?>
<script>
function deladminnew(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="//orangestate.ng/admin/admin_new/recipe_list.php?act=del&id="+id;
	}
}
</script>

    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

            <li><a href="#">Products</a></li>

            <li class="active">Manage Products</li>

        </ul>

    </div>



    <!-- START PAGE CONTAINER -->

    <div class="page_container">

        <div class="container">



            <div class="row">

                  <div class="col-md-12">

                      <div class="block block-condensed">

                            <!-- START HEADING -->

                            <div class="app-heading app-heading-small">

                                <div class="title">

                                    <h5>Manage Products</h5>

                                    <p>Manage Products </p>

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

                                        <tr>

                                            <th>ID</th>
<th>Image</th>
                                            <th>Product Name</th>

                                            <th>Category</th>

                                            <th>Restaurant</th>
                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									  <?php
			$db1=new DB();
			$ct=1;
			
			if($_SESSION['Super_admin']=='superadmin'){
			 $sql="SELECT * from resturant_recipe order by id desc";
			}else{
				 $sql="SELECT * from resturant_recipe where adminid='".$_SESSION['SES_ADMIN_ID']."' order by id desc";
			}
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
				$catname=$db1->getSingleResult("select catname from recipe_categories where id=".$row['recipe_category_id']);
				$date=explode('-',$row['prod_date']);
				$resto=$db1->getSingleResult("select title from resturant_detail where id=".$row['resturant_id']);
				$date=explode('-',$row['prod_date']);
				$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>
<td><img src="../../upload/food_ordering/recipe/<?=$row['image']?>" height="100" width="100"/></td>
                                            <td><?php echo $row['recipe_name'];?> </td>

                                            <td><?php echo $catname;?> </td>
											<td><?php echo $resto;?> </td>
                                           

                                            <td>  <a href='<?=$_PAGE."?".$qryStr?>&act=dac&id=<?=$row[id]?>&stat=<?=$row[status]?>'><?=$row[status]==0?'Deactive':'Active'?></a> </td>

                                            <!--<td><a href=""> Edit </a> <a href=""> Delete </a></td>-->
											<td><a href="//orangestate.ng/admin/admin_new/add_recipe.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
											</a></td>

                                        </tr>

<?php $ct=$ct+1; } ?>
<?php	}else{
	
?>  
						<tr><td colspan="" valign="top" align="center">Not found any Products !</td></tr>                      
 <?php   } ?>   

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