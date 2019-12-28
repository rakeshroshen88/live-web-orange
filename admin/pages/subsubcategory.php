<?php
?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="<?=$_PAGE.'?'.$qryStr?>&mod=subsubcat&act=del&id="+id;
	}
}


function deladmin(id)

{

	if(confirm("Are you sure to delete?"))

	{

		location.href="<?=$_PAGE.'?'.$qryStr?>&mod=subsubcat&act=del&id="+id;

	}

}

</script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			

		<div class="row">

			<ol class="breadcrumb">

				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>

				<li class="active">Category Management</li>

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

							<div class="large"><?=$count=$db->getSingleResult("select count(*) from $_TBL_SUBSUBCAT");	?></div>

							<div class="text-muted">Total Category</div>

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

						<div class="large"><?=$count=$db->getSingleResult("select count(*) from $_TBL_SUBSUBCAT where status='1'");	?></div>

							<div class="text-muted">Active Category</div>

						</div>

					</div>

				</div>

			</div>

            

            

            

            

			

			

			

		</div><!--/.row-->

        

        

        

        

        

        

        <!-- end-->

		

	  

       

				

		

		<div class="row">

			<div class="col-lg-12">

				<div class="panel panel-default">

					<div class="panel-heading">3rd category Management</div>

					<div class="panel-body">

                    

                        <div class="add-pro">

                            <a href="main.php?mod=add_subsubcat&act=add">Add 3rd category</a>

                        

                        </div>

						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">

						    <thead>

                            

						    <tr>

						        <th data-field="state" data-checkbox="true" >chk ID</th>

						        <th data-field="Title" data-sortable="true">Title </th>

						       <th data-field="id" data-sortable="true">Category </th>
								<th data-field="subcat" data-sortable="true">Sub Category </th>

						        <th data-field="Date" data-sortable="true">Date</th>

                                <th data-field="Status" data-sortable="true">Status</th>

                                <th data-field="Action" data-sortable="true">Action</th>

						    </tr>

						    </thead>

                            

                            

                            

                            

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
		if($stat==0){
			$stat=1;
		}else{
			$stat=0;
		}
		 $sql="UPDATE $_TBL_SUBSUBCAT SET sub_status='$stat' WHERE id=$catid";
		$db->query($sql);
		
	}

if($act=='del')
	{
		
		$sql="DELETE FROM $_TBL_SUBSUBCAT WHERE id='$catid'";
		$db->query($sql);
		redirect('main.php?mod=subsubcat');
	}


$db1=new DB();

	$wherestr=" ";

	

	//if(!empty($wherestr)){$wherestr.=" and catname='Story'";}else{$wherestr=" where catname='Story'";}

	if(!empty($_REQUEST['firstname']) or isset($_REQUEST['firstname']))

		{

		$wherestr=" where title like '%$firstname%'";

		}

		if(empty($rec))

			{

			$_LIST_LEN=50;

			}else{

			$_LIST_LEN=$rec;

			}

	$sql="SELECT * from ".$_TBL_SUBSUBCAT.$wherestr." order by id desc";

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
		
$num=$db1->getSingleResult('select count(*) from '.$_TBL_PROD." where subsubcatid=".$row['id']);

	$catname=$db1->getSingleResult('select catname from '.$_TBL_CAT." where id=".$row['catid']);
	
	$subcatname=$db1->getSingleResult('select subcatname from '.$_TBL_SUBCAT." where id=".$row['subcatid']);
	
	//$num=$db1->getSingleResult('select count(*) from '.$_TBL_USER." where id=".$row['userid']);

	

$date=explode('-',$row['subcatdate']);

$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	


	if(empty($num))

		{

		$num=0;

		}

		$cat=$db1->getSingleResult("select catname from category where id=".$row['catid']);
	$subcatname=$db1->getSingleResult('select subcatname from '.$_TBL_SUBCAT." where id=".$row['subcatid']);

?>	

 					<tr>

						<td></td>

                        <td> <a href="main.php?mod=add_subsubcat&act=edit&id=<?=$row['id']?>"><?=$row['subsubcatname']?></a></td>

							
 <td valign="middle" align="center"><?=$cat?></td>
					  <td valign="middle" align="center"><?=$subcatname?></td>
                   

						<td> <?php echo date('d M,Y',$st);?></td>

                    <td> <a href='main.php?mod=subsubcat&act=dac&id=<?=$row['id']?>&stat=<?=$row['sub_status']?>'><?=$row['sub_status']=='0'?'Deactive':'Active'?></a> </td>

                           

                        <td > <a href="main.php?mod=add_subsubcat&act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span></a>

						</td>

                     </tr>

<?php } ?>

<?php	}else{

	

?>  

						<tr><td colspan="4" valign="top" align="center">Not found any Record !</td></tr>                      

 <?php   } ?>   					  

	

						</table>

					</div>

				</div>

			</div>

		</div><!--/.row-->	

		 <!--/.row-->	

		

		

	</div>