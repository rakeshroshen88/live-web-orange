<?php 
$makearr1=array();
$makearr1=getValuesArr( $_TBL_USER, "user_id","first_name","", "" ); 
$mod=$_REQUEST['mod'];
$innumber=$_REQUEST['innumber'];
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$stat=$_REQUEST['stat'];
$rec=$_REQUEST['rec'];
$qryStr="innumber=$innumber&mod=$mod&rec=$rec";
if($act=='dac')
	{
		if($stat==0)
			$stat=1;
		else
			$stat=0;
		$sql="UPDATE $_TBL_ORDER SET status='$stat' WHERE id='$id'";
		$db->query($sql);
		redirectpage('main.php?mod=order');
	}

if($act=='del')
	{
		
		$sql="DELETE FROM $_TBL_ORDER WHERE id='$id'";
		$db->query($sql);
		redirectpage('main.php?mod=order');
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&mod=order&act=del&id="+id;
	}
}
</script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			

		<div class="row">

			<ol class="breadcrumb">

				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>

				<li class="active">Order Management</li>

			</ol>

		</div><!--/.row   All count-->

        

         							

		<div class="row">

			<div class="col-xs-12 col-md-6 col-lg-3">

				<div class="panel panel-blue panel-widget ">

					<div class="row no-padding">

						<div class="col-sm-3 col-lg-5 widget-left">

							<em class="glyphicon glyphicon-user glyphicon-l"></em>

                            

						</div>

						<div class="col-sm-9 col-lg-7 widget-right">

							<div class="large"><?=$count=$db->getSingleResult("select count(*) from $_TBL_ORDER");	?></div>

							<div class="text-muted">Total Order</div>

						</div>

					</div>

				</div>

			</div>

            <div class="col-xs-12 col-md-6 col-lg-3">

				<div class="panel panel-orange panel-widget">

					<div class="row no-padding">

						<div class="col-sm-3 col-lg-5 widget-left">

							<em class="glyphicon glyphicon-user glyphicon-l"></em>

						</div>

						<div class="col-sm-9 col-lg-7 widget-right">

						<div class="large"><?=$count=$db->getSingleResult("select count(*) from $_TBL_ORDER where order_status='1'");	?></div>

							<div class="text-muted">Active Order</div>

						</div>

					</div>

				</div>

			</div>

            

            

            

            

			

			

			

		</div><!--/.row-->

        

        

        

        

        

        

        <!-- end-->

		

	  

       

				

		

		<div class="row">

			<div class="col-lg-12">

				<div class="panel panel-default">

					<div class="panel-heading">Order Management</div>

					<div class="panel-body">

                    

                       <!-- <div class="add-pro">

                            <a href="main.php?mod=addarticle&act=add">Add Article</a>

                        

                        </div>-->

						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">

						    <thead>

                            

						    <tr>

						        <th data-field="state" data-checkbox="true" >chk ID</th>

						        <th data-field="amount" data-sortable="true">Amount </th>

						       

						        <th data-field="Date" data-sortable="true">Order Date</th>
 <th data-field="Username" data-sortable="true">Username</th>
  
                                <th data-field="Status" data-sortable="true">Status</th>

                                <th data-field="Action" data-sortable="true">Action</th>

						    </tr>

						    </thead>

                            
<?php
$db1=new DB();
$wherestr=" ";
	
	//if(!empty($wherestr)){$wherestr.=" and catname='Story'";}else{$wherestr=" where catname='Story'";}
	if(!empty($_REQUEST['innumber']) or isset($_REQUEST['innumber']))
		{
		$wherestr=" where orderid like '%$innumber%'";
		}
		if(empty($rec))
			{
			$_LIST_LEN=10;
			}else{
			$_LIST_LEN=$rec;
			}
if($order_field=="")
	{
	$order_field=" order by id desc";
	}
	$sql="SELECT * from ".$_TBL_ORDER.$wherestr.$order_field;
	$db->query($sql);
	$total_records=$db->numRows();
	$page=new Page;
	$page->show_disabled_links=true;
	$page->set_page_data($_PAGE,$total_records,$_LIST_LEN,50,true,true,true);
	$page->set_qry_string($qryStr);
	$db->query($page->get_limit_query($sql));
	
	if($db->numRows()>0)
		{
	while($row=$db->fetchArray()){
	$num=$db1->getSingleResult('select count(*) from '.$_TBL_ORDER." where id=".$row['id']);
	 $name=$db1->getSingleResult('select name from '.$_TBL_USER." where id=".$row[userid]);
	
$arr1=@explode(' ',$row['buydate']);
		$edate=@explode('-',$arr1[0]);
		$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);?>		
 					<tr>

						<td></td>

                         <td><a href="main.php?mod=order_detail&id=<?=$row[orderid]?>"><?=$row['orderid']?></a></td>
<td align='center'>INR<?=$row[totalprice]?></td>
                           
							<td valign="top" align="center"><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></td>
							<td align='center'><?php echo $name;?></td>	
							
							
							
                           <td valign="top" align="center">
					   <a href='<?=$_PAGE."?".$qryStr?>&act=dac&id=<?=$row[id]?>&stat=<?=$row[status]?>'><?=$row[status]==0?'Deactive':'Active'?></a>
							  </td>
                            <td align='center'><a href='javascript:deladmin("<?=$row[id]?>")'>Delete</a></td>

                     </tr>

<?php } ?>

<?php	}else{

	

?>  

						<tr><td colspan="4" valign="top" align="center">Not found any order !</td></tr>                      

 <?php   } ?>   					  

	

						</table>

					</div>

				</div>

			</div>

		</div><!--/.row-->	

		 <!--/.row-->	

		

		

	</div>