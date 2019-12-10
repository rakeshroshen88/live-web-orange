<?php
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active"> Destination Management</li>
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
							<div class="large"><?=$count=$db->getSingleResult("select count(*) from $_TBL_DESTINATION");	?></div>
							<div class="text-muted">Total Destination</div>
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
						<div class="large"><?=$count=$db->getSingleResult("select count(*) from $_TBL_DESTINATION where status='1'");	?></div>
							<div class="text-muted">Active Destination</div>
						</div>
					</div>
				</div>
			</div>
            
            
            
            
			
			
			
		</div><!--/.row-->
        
        
        
        
        
        
        <!-- end-->
		
	  
       
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Destination Management</div>
					<div class="panel-body">
                    
                        <div class="add-pro">
                            <a href="main.php?mod=adddistination&act=add">Add Destination</a>
                        
                        </div>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
                            
						    <tr>
						        <th data-field="state" data-checkbox="true" >chk ID</th>
						        <th data-field="id" data-sortable="true">Title </th>
						       <th data-field="Date"  data-sortable="true">Date </th>
						        <th data-field="Price" data-sortable="true">Price</th>
                                <th data-field="Status" data-sortable="true">Status</th>
                                <th data-field="Action" data-sortable="true">Action</th>
						    </tr>
						    </thead>
                          <?php
 					<tr>
						<td></td>
                        <td> <a href="main.php?mod=adddistination&act=edit&id=<?=$row['id']?>"><?=$row['title']?></a></td>
							<td> <?php echo date('d M,Y',$st);?></td>
						
                    <td> <a href='main.php?mod=distination&id=<?=$row['id']?>&stat=<?=$row['status']?>'><?=$row['status']==0?'Deactive':'Active'?></a></a> </td>
                           
                        <td > <a href="main.php?mod=adddistination&act=edit&id=<?=$row['id']?>"><img height="16" alt="Edit USER" src="images/edit.png" width="16" border="0" /> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'><img height="16" alt="Delete Category" src="images/delete.png" width="16" border="0" /></a></a>
						</td>
                     </tr>
<?php } ?>
<!--<tr><td colspan="5" align="center" height="30" valign="bottom"><?php $page->get_page_nav()?></td></tr>-->
<?php	}else{
	
?>  
						<tr><td colspan="5" valign="top" align="center">Not found any Staff !</td></tr>                      
 <?php   } ?>   					  
	
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		 <!--/.row-->	
		
		
	</div>