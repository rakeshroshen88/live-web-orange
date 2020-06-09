<?php include("header.php");?>
<?php
$mod=$_REQUEST['mod'];
$catname=$_REQUEST['catname'];
$catid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$stat=$_REQUEST['stat'];
$rec=$_REQUEST['rec'];
 $qryStr="catname=$catname&mod=$mod";
if($act=='dac')
	{
		if($stat=='0')
			$stat='1';
		else
			$stat='0';
		$sql="UPDATE support_system SET status='$stat' WHERE id='$catid'";
		$db->query($sql);
		$errMsg='<br><b>Update Successfully!</b><br>';
	}

if($act=='del')
	{
		
		$sql="DELETE FROM support_system WHERE id='$catid'";
		$db->query($sql);
		$errMsg='<br><b>Deleted Successfully!</b><br>';
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&mod=support&act=del&id="+id;
	}
}
</script>


    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Support System</a></li>
            <li class="active">View</li>
        </ul>
    </div>
<div class="container">
                       
                        <div class="row">
                            <div class="col-md-3">
                                <div class="app-widget-tile">                                                                                    
                                    <div class="intval intval-lg"><?php 
									
									echo $totalo=$db->getSingleResult("select count(id) from support_system where status='Open'");?></div>
                                    <div class="line">
                                        <div class="title wide text-center"><a href="https://orangestate.ng/admin/admin_new/view_ticket.php?ts=Open">Open</a></div>                                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="app-widget-tile">                                                                                    
                                    <div class="intval intval-lg"><?php echo $totali=$db->getSingleResult("select count(id) from support_system where status='In Progress'");?></div>
                                    <div class="line">
                                        <div class="title wide text-center"><a href="https://orangestate.ng/admin/admin_new/view_ticket.php?ts=In Progress">In Progress</a></div>                                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="app-widget-tile">                                                                                    
                                    <div class="intval intval-lg"><?php echo $totali=$db->getSingleResult("select count(id) from support_system where status='Closed'");?></div>
                                    <div class="line">
                                        <div class="title wide text-center">
										<a href="https://orangestate.ng/admin/admin_new/view_ticket.php?ts=Closed">Closed</a></div>                                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="app-widget-tile">                                                                                    
                                    <div class="intval intval-lg">Create</div>
                                    <div class="line">
                                        <div class="title wide text-center"><a href="open_ticket.php?act=add">Ticket</a></div>                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
                                    <h5>Manage Support</h5>
                                    <p>List of all Tickets</p>
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
                                            <th>Subject</th>
                                           
      <th class="th-sm">Department
      </th>
	   <th>Priority</th>
	     <th class="th-sm">Customer Name
      </th>   
      <th class="th-sm">Date
      </th>                                            
                                          
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$ct=1;
$db2=new DB();
if(empty($_REQUEST['ts'])){
 $sql="SELECT * from support_system order by id desc";
}else{
 $sql="SELECT * from support_system where status='".$_REQUEST['ts']."'";
}
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
	
$date=explode('-',$row['sdate']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
	$unread=$db2->getSingleResult("select count(rid) from ticket_reply where reply_read='0' and ticketid='".$row['id']."'");
		
?>	
<tr>
						<td><?=$ct?></td>
                        <td> <a href="//orangestate.ng/admin/admin_new/ticket_reply.php?act=edit&id=<?=$row['id']?>"><?=$row['subject']?></a>(<?=$unread?>)</td>
							
                      
						<td><?=$row['department']?></td>
						 <td><?=$row['priority']?></td>
						  <td><?=$row['name']?></td>
						<td> <?php echo date('d M,Y',$st);?></td>
						<td> <?=$row['status']?> </td>
                           
                        <td > <a href="//orangestate.ng/admin/admin_new/ticket_reply.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>						</a>
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