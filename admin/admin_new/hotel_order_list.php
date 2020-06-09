<?php include("header.php") ?>
<?php $makearr1=array();
$makearr1=getValuesArr( $_TBL_USER, "user_id","first_name","", "" );
 $mod=$_REQUEST['mod'];
 $innumber=$_REQUEST['innumber'];
 $id=$_REQUEST['id'];
 $act=$_REQUEST['act'];
 $stat=$_REQUEST['stat'];
 $rec=$_REQUEST['rec'];
 $qryStr="innumber=$innumber&mod=$mod&rec=$rec";
 if($act=='dac'){	
 if($stat==0)
	 $stat=1;	
 else		
	 $stat=0;		
 $sql="UPDATE hotel_order SET status='$stat' WHERE id='$id'";	
 $db->query($sql);		
 } 
 if($act=='del'){
	 $sql="DELETE FROM hotel_order WHERE id='$id'";	
	 $db->query($sql);	
	 } ?>
	 <script>function deladmin(id){	if(confirm("Are you sure to delete?"))	{		location.href="<?=$_PAGE.'?'.$qryStr?>&mod=order&act=del&id="+id;	}}</script>

    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Hotel</a></li>
            <li class="active">Manage Orders</li>
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
                                    <h5>Manage Orders</h5>
                                    <p>List of all Orders</p>
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
                                            <th>Order #</th>
                                            <th>Purchased on</th>
                                            <th>Bill to Name</th>
											<th>Hotel Name</th>
                                            <th>Total Price</th>
                                          
                                            <th>payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php	$db1=new DB(); $ct=1;   $sql="SELECT * from hotel_order";	$db->query($sql);	if($db->numRows()>0)	{	while($row=$db->fetchArray()){
				$num=$db1->getSingleResult('select count(*) from hotel_order where id='.$row['id']);
				
				$name=$db1->getSingleResult('select first_name from all_user where user_id='.$row['user_id']);	
									$arr1=@explode(' ',$row['book_date']);		$edate=@explode('-',$arr1[0]);		$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);		$sta=$row['payment_status'];
if(empty($sta)){ $sta="Unpaid"; }
									?>							<tr>						<td><?=$ct?></td>                         <td><a href="//orangestate.ng/admin/admin_new/hotel_order_view.php?id=<?=$row[orderid]?>"><?=$row['orderid']?></a></td>						 <td ><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></td>						 
									
									<td ><?php echo $name;?></td>	
									
									<td align='center'> <?=$row['hotel_name']?></td>                           						<td align='center'>₦ <?=$row['totalamount']?></td>																													                           <td>					   <?php echo $sta;?>							  </td>                        							 <td><a href="//orangestate.ng/admin/admin_new/hotel_order_view.php?id=<?=$row['orderid']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>						</a>							</td>                     </tr>
                                      
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