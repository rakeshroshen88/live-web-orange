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
		
		$sql="UPDATE $_TBL_PROD SET prod_status='$stat' WHERE id='$id'";
		$db->query($sql);
		
	}


if($act=='del')
	{
		
		echo $sql="DELETE FROM ".$_TBL_PROD." WHERE id='$id'";
		$db->query($sql);
		
	}

?>
<script>
function deladminnew(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="//orangestate.ng/admin/admin_new/product_list.php?act=del&id="+id;
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

                                            <th width="350">Product Name</th>

                                            <th>Type</th>

                                            <th>SKU</th>

                                            <th>Price</th>

                                            <th>QTY</th> 

                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									  <?php
			$db1=new DB();
			$ct=1;
			$sql="SELECT * from product order by id desc";
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
				$cat=$db1->getSingleResult("select catname from category where id=".$row['catid']);
				$quantity=$db1->getSingleResult("select prodquantity from prodattributes where prodid=".$row['id']);
				if(empty($quantity) or $quantity==0){ $quantity=0; }
				$subcatname=$db1->getSingleResult('select subcatname from '.$_TBL_SUBCAT." where id=".$row['subcatid']);
				$subsubcatname=$db1->getSingleResult('select subsubcatname from '.$_TBL_SUBSUBCAT." where id=".$row['subsubcatid']);
			    $date=explode('-',$row['prod_date']);
				$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>

                                            <td><?php echo $row['prod_name'];?> </td>

                                            <td><?php if($row['newrelease']=='yes'){ echo "New"; }else{ echo "Old";} ?> </td>

                                            <td><?php echo $row['prod_sku'];?> </td>

                                            <td><?php echo $row['prod_sprice'];?> </td>

                                            <?php if($quantity<10){?>
										   <td><b style="color:red;"><?php echo $quantity;?> (Low)</b> </td>
										   <?php }else{ ?>
										   <td><?php echo $quantity;?> </td>
										   <?php } ?>

                                            <td>  <a href='<?=$_PAGE."?".$qryStr?>&act=dac&id=<?=$row[id]?>&stat=<?=$row[prod_status]?>'><?=$row[prod_status]==0?'Deactive':'Active'?></a> </td>

                                            <!--<td><a href=""> Edit </a> <a href=""> Delete </a></td>-->
											<td><a href="//orangestate.ng/admin/admin_new/add_product.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
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