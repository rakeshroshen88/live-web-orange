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
		
		$sql="UPDATE resturant_recipe SET status='$stat' WHERE id='$id'";
		$db->query($sql);
		
	}


if($act=='del')
	{
		
		 $sql="DELETE FROM resturant_recipe WHERE id='$id'";
		$db->query($sql);
		
	}

?>
<script>
function deladminnew(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="//orangestate.ng/admin/admin_new/recipe_list.php?act=del&id="+id;
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

                  <div class="col-md-9">

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

                                            <th>Category</th>

                                            <th>Restaurant</th>
                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									  <?php
			$db1=new DB();
			$ct=1;
			$sql="SELECT * from resturant_recipe order by id desc";
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
				$catname=$db1->getSingleResult("select catname from recipe_categories where id=".$row['recipe_category_id']);
				$date=explode('-',$row['prod_date']);
				$resto=$db1->getSingleResult("select title from resturant_detail where id=".$row['resturant_id']);
				$date=explode('-',$row['prod_date']);
				$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>

                                            <td><?php echo $row['recipe_name'];?> </td>

                                            <td><?php echo $catname;?> </td>
											<td><?php echo $resto;?> </td>
                                           

                                            <td>  <a href='<?=$_PAGE."?".$qryStr?>&act=dac&id=<?=$row[id]?>&stat=<?=$row[status]?>'><?=$row[status]==0?'Deactive':'Active'?></a> </td>

                                            <!--<td><a href=""> Edit </a> <a href=""> Delete </a></td>-->
											<td><a href="//orangestate.ng/admin/admin_new/add_recipe.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
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
				  <div class="col-md-3">
				  <style>
				  .bg-completed {
    background-color: #0A2D0F;
    border-color: #0A2D0F;
    color: #fff;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
	height: 40px;
}
.panel p {
    font-size: 14px;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
	
}
.m-t-lg {
    margin-top: 30px;
}
.btn-primary {
    background-color: #0a5114;
    border-color: #0a5114;
    color: #FFFFFF;
}
				  
				  </style>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet">			  
<script>
 $(function () {
  $("select").select2();
});
</script>

			  <div id="pjFdFormWrapper" class="panel no-borders"><form action="/1591669575_233/index.php?controller=pjAdminExtras&amp;action=pjActionCreate" method="post" id="frmCreateExtra" novalidate="novalidate">
	<input type="hidden" name="extra_create" value="1">
    <div class="panel-heading bg-completed">
        <p class="lead m-n">Add new extra</p>
    </div><!-- /.panel-heading -->

    <div class="panel-body">
    	            <div class="form-group pj-multilang-wrap" data-index="1" style="display: block;">
                <label class="control-label">Extra name</label>
                                        
                <div class="" data-index="1">
					<input type="text" class="form-control required" name="i18n[1][name]" data-msg-required="This field is required." aria-required="true">	
									</div>
            </div>
                    <div class="form-group">
            <label class="control-label">Price</label>
        
            <div class="input-group">
                <input type="text" name="price" class="form-control text-right number required" data-msg-required="This field is required." data-msg-number="Please enter a valid number." aria-required="true">

                <span class="input-group-addon">₦</span> 
            </div>
        </div>
                    <div class="form-group">
                <label class="control-label">Products:</label>
            <select name="siteID" id="siteID"  class="form-control abcd" multiple="">
  <option value='0' selected='true'> Not associated to any product </option>
  <?php 
                             
							$sql="SELECT * FROM resturant_recipe";
							$db->query($sql)or die($db->error()); ?>

						
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" ><?=$row2['recipe_name']?></option>
                  <?php }?>
				  
</select>
	
               
			   </div>
            
		<div class="m-t-lg">
            <button type="submit" class="ladda-button btn btn-primary btn-lg btn-phpjabbers-loader pull-left" data-style="zoom-in" style="margin-right: 15px;">
                <span class="ladda-label">Save</span>
                <strong class="phpjabbers-loader ladda-spinner">
    
   
</strong>            </button>
            <button type="button" class="btn btn-white btn-lg pull-right pjFdBtnCancel">Cancel</button>
        </div><!-- /.clearfix -->
    </div><!-- /.panel-body -->
</form></div>
				  
				  </div>

 

            </div>



        </div> 

        <!-- END PAGE CONTAINER -->

    </div>

    <!-- END page_container -->



    <?php include("footer.php") ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
