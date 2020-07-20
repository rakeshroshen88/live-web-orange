<?php include("header.php");?>
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
		
	}

if($act=='del')
	{
		
		 $sql="DELETE FROM language WHERE id='$id'";
		$db->query($sql);
		
	}

?>
<script>
function deladmin(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="//iflex.ng/admin/admin_new/language_list.php?mod=viewservice&aid=1&act=del&id="+id;
	}
}



function audioplay(data)
{ 
	$("#audioplay").html('<audio controls="controls" autoplay="autoplay" style="opacity: 0; visibility: hidden; position:absolute;"><source src="'+data+'" type="audio/mp3" /><source src="'+data+'" type="audio/ogg" /></audio>');	
}
</script>
	<link rel="stylesheet" type="text/css" href="//iflex.ng/css/line-awesome-font-awesome.min.css">
<div id="audioplay"></div>

    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Language </a></li>
            
        </ul>
    </div>

    <!-- START PAGE CONTAINER -->
    <div class="page_container">
        <div class="container">
				<div class="row">
			<div class="col-md-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						
						<div class="col-md-12">
							<div class="large"><h2><?=$count=$db->getSingleResult("select count(*) from language");	?></h2></div>
							<div class="text-muted"><h2>Total Language</h2></div>
						</div>
					</div>
				</div>
			</div>
           
            
            
            
            
			
			
			
		</div><!--/.row-->
        
        


            <div class="row">
                  <div class="col-md-12">
                      <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Manage Language</h5>
                                    <p>List of all Language</p>
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
                                            <th>English</th>
											<th>Local Language</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                          
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$ct=1;
 $sql="SELECT * from language order by id desc";
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
						<td><a href="add_language.php?act=edit&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>"><?=$row['language_1']?></a></td>
                        <td> <a href="add_language.php?act=edit&id=<?=$row['id']?>&aid=<?=$_SESSION['SES_ADMIN_ID']?>"><?=$row['language_2']?></a>( <?=$row['target']?>)</td>
							
                       <td><?=$row['category']?></td>
					
                    <td> <?php echo date('d M,Y',$st);?> </td>
                            <td> <a href='?act=dac&aid=<?=$_SESSION['SES_ADMIN_ID']?>&id=<?=$row['id']?>&stat=<?=$row['status']?>'><?=$row['status']=='no'?'Deactive':'Active'?></a> </td>
                       <td > <a href="add_language.php?act=edit&aid=<?=$_SESSION['SES_ADMIN_ID']?>&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
						</a>
						
						&nbsp;<a href='javascript:audioplay("//iflex.ng/img/language/<?=$row['audio_1']?>")'>  <i class="fa fa-play" title="play" aria-hidden="true"></i>
						</a>
						
						
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