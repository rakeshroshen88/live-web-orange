<?php include("header.php");
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
		$sql="UPDATE hotel_rooms SET status= '$stat' WHERE id='$id'";
		$db->query($sql);
		
	}

if($act=='del')
	{
		
		$sql="DELETE FROM hotel_rooms WHERE id='$id'";
		$db->query($sql);
	
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&act=del&id="+id;
	}
}
</script>

    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Hotel </a></li>
            <li class="active">Rooms</li>
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
                                    <h5>Manage Hotel</h5>
                                    <p>List of all Rooms</p>
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
                                        <tr>										<th>Sl No #</th>
                                            <th>Title</th>
											<th>Price</th>
                                            <th>Date</th>
                                            
                                          
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$ct=1;
 $sql="SELECT * from hotel_rooms order by id desc";
	$db->query($sql);
	$total_records=$db->numRows();
	$page=new Page;
	$page->show_disabled_links=true;
	$page->set_page_data($_PAGE,$total_records,50,10,true,true,true);
	$page->set_qry_string($qryStr);
	$db->query($page->get_limit_query($sql));
	
	if($db->numRows()>0)
		{
	while($row=$db->fetchArray()){
	/* $num=$db1->getSingleResult('select count(*) from '.$_TBL_USER." where id=".$row['userid']); */
	
$date=explode('-',$row['date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
	
		
?>	
<tr>
						<td><?=$ct?></td>
                        <td> <a href="//orangestate.ng/admin/admin_new/add_rooms.php?act=edit&id=<?=$row['id']?>"><?=$row['title']?></a></td>
							
                       <td> <?=$row['price']?>.00</td>
						<td> <?php echo date('d M,Y',$st);?></td>
                    <td> <a href='//orangestate.ng/admin/admin_new/rooms_list.php?act=dac&id=<?=$row['id']?>&stat=<?=$row['status']?>'><?=$row['status']==0?'Deactive':'Active'?></a> </td>
                           
                        <td > <a href="//orangestate.ng/admin/admin_new/add_rooms.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>						</a>
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