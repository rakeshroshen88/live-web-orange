<?php

$mod=$_REQUEST['mod'];
$firstname=$_REQUEST['firstname'];
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
$stat=$_REQUEST['stat'];
$rec=$_REQUEST['rec'];
$qryStr="firstname=$firstname&mod=$mod&rec=$rec";
if($act=='dac')
	{
		if($stat=='no')
			$stat='yes';
		else
			$stat='no';
		$sql="UPDATE language SET status= '$stat' WHERE id='$id'";
		$db->query($sql);
		redirect('main.php?mod=viewservice');
	}

if($act=='del')
	{
		
		 $sql="DELETE FROM language WHERE id='$id'";
		$db->query($sql);
		redirect('main.php?mod=viewservice');
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="main.php?mod=viewservice&act=del&id="+id;
	}
}



function audioplay(data)
{ 
	$("#audioplay").html('<audio controls="controls" autoplay="autoplay" style="opacity: 0; visibility: hidden; position:absolute;"><source src="'+data+'" type="audio/mp3" /><source src="'+data+'" type="audio/ogg" /></audio>');	
}
</script>
	<link rel="stylesheet" type="text/css" href="//orangestate.ng/css/line-awesome-font-awesome.min.css">
<div id="audioplay"></div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Language Management</li>
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
							<div class="large"><?=$count=$db->getSingleResult("select count(*) from language");	?></div>
							<div class="text-muted">Total Language</div>
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
						<div class="large"><?=$count=$db->getSingleResult("select count(*) from language where status='1'");	?></div>
							<div class="text-muted">Active Language</div>
						</div>
					</div>
				</div>
			</div>
            
            
            
            
			
			
			
		</div><!--/.row-->
        
        
        
        
        
        
        <!-- end-->
		
	  
       
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Language Management</div>
					<div class="panel-body">
                    
                        <div class="add-pro">
                            <a href="main.php?mod=addservice&act=add">Add Language</a>
                        
                        </div>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
                            
						    <tr>
						        <th data-field="state" data-checkbox="true" >chk ID</th>
						        <th data-field="id" data-sortable="true">English </th>
								<th data-field="id2" data-sortable="true">Ibibo</th>
								<th data-field="cat" data-sortable="true">Category</th>
						       
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
		$wherestr=" where title like '%$firstname%'";
		}
		if(empty($rec))
			{
			$_LIST_LEN=50;
			}else{
			$_LIST_LEN=$rec;
			}
	 $sql="SELECT * from language".$wherestr." order by id desc";
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
	//$num=$db1->getSingleResult('select count(*) from '.$_TBL_USER." where id=".$row['userid']);
	
$date=explode('-',$row['date']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
	if(empty($num))
		{
		$num=0;
		}
		
?>	
 					<tr>
						<td></td>
                        <td> <a href="main.php?mod=addservice&act=edit&id=<?=$row['id']?>"><?=$row['language_1']?></a></td>
							
                   <td> <a href="main.php?mod=addservice&act=edit&id=<?=$row['id']?>"><?=$row['language_2']?></a></td>
				   
						<td> <?=$row['category']?></td>
						<td> <?php echo date('d M,Y',$st);?></td>
                    <td> <a href='main.php?mod=viewservice&act=dac&id=<?=$row['id']?>&stat=<?=$row['status']?>'><?=$row['status']=='no'?'Deactive':'Active'?></a> </td>
                           
                        <td > <a href="main.php?mod=addservice&act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
						</a>
						
						&nbsp;<a href='javascript:audioplay("//orangestate.ng/img/language/<?=$row['audio_1']?>")'>  <i class="fa fa-play" title="play" aria-hidden="true"></i>
						</a>
						
						
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