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
		//$db->query("update ".$_TBL_PROD1." set prod_status='0'");
		if($stat==0)
			$stat=1;
		else
			$stat=0;
			
		//$db->query("update ".$_TBL_PROD1." set prod_status='$stat' where id!=".$id." and catid=".$_REQUEST['category']);
		
		$sql="UPDATE $_TBL_PROD1 SET prod_status='$stat' WHERE id='$id'";
		$db->query($sql);
		redirect('main.php?mod=viewproduct');
	}


if($act=='del')
	{
		
		$sql="DELETE FROM ".$_TBL_PROD1." WHERE id='$id'";
		$db->query($sql);
		redirect('main.php?mod=viewproduct');
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="main.php?mod=viewproduct&act=del&id="+id;
	}
}
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Product Management</li>
				<?php echo $_REQUEST['msg'];?>
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
							<div class="large"><?=$count=$db->getSingleResult("select count(*) from product");	?></div>
							<div class="text-muted">Total Product</div>
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
						<div class="large"><?=$count=$db->getSingleResult("select count(*) from product where prod_status='1'");	?></div>
							<div class="text-muted">Active Product</div>
						</div>
					</div>
				</div>
			</div>
            
            
            
            
			
			
			
		</div><!--/.row-->
        
        
        
        
        
        
        <!-- end-->
		
	  
       
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Product Management</div>
					<div class="panel-body">
                    
                        <div class="add-pro">
                            <a href="main.php?mod=addproduct&act=add">Add Product</a>
                        
                        </div>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
                            
						    <tr>
						        <th data-field="state" data-checkbox="true" >chk ID</th>
						        <th data-field="Title" data-sortable="true">Title </th>
						        <th data-field="id" data-sortable="true">Category </th>
								<th data-field="subcat" data-sortable="true">Sub Category </th>
								<th data-field="subsubcat" data-sortable="true">3rd Category </th>
						        <th data-field="Date" data-sortable="true">Date</th>
                                <th data-field="Status" data-sortable="true">Status</th>
                                <th data-field="Action" data-sortable="true">Action</th>
						    </tr>
						    </thead>
                            
                            
                            
                            
                            <?php
$db1=new DB();
	$wherestr=" ";
	
	//if(!empty($wherestr)){$wherestr.=" and catname='Story'";}else{$wherestr=" where catname='Story'";}
	if(!empty($_REQUEST['firstname']) or isset($_REQUEST['firstname']))
		{
		$wherestr=" where prod_name like '%$firstname%'";
		}
		if(empty($rec))
			{
			$_LIST_LEN=50;
			}else{
			$_LIST_LEN=$rec;
			}
	 $sql="SELECT * from product".$wherestr." order by id desc";
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
	$cat=$db1->getSingleResult("select catname from category where id=".$row['catid']);
	$subcatname=$db1->getSingleResult('select subcatname from '.$_TBL_SUBCAT." where id=".$row['subcatid']);
		$subsubcatname=$db1->getSingleResult('select subsubcatname from '.$_TBL_SUBSUBCAT." where id=".$row['subsubcatid']);
$date=explode('-',$row['prod_date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
	if(empty($num))
		{
		$num=0;
		}
	$row['prod_name'];	
?>	
 					<tr>
					<td></td>	
                        <td><?php echo $row['prod_name'];?> </td>
							
                    <td valign="middle" align="center"><?=$cat?></td>
					  <td valign="middle" align="center"><?=$subcatname?></td>
					   <td valign="middle" align="center"><?=$subsubcatname?></td>
						<td> <?php echo date('d M,Y',$st);?></td>
                    <td>  <a href='<?=$_PAGE."?".$qryStr?>&act=dac&id=<?=$row[id]?>&stat=<?=$row[prod_status]?>'><?=$row[prod_status]==0?'Deactive':'Active'?></a> </td>
                           
                        <td > <a href="main.php?mod=addproduct&act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span></a>
						</td>
                     </tr>
<?php } ?>
<?php	}else{
	
?>  
						<tr><td colspan="4" valign="top" align="center">Not found any Staff !</td></tr>                      
 <?php   } ?>   					  
	
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		 <!--/.row-->	
		
		
	</div>