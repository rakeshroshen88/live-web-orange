<?php include("header.php") ?>
<?php

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
		
		$sql="UPDATE resturant_recipe_options SET status='$stat' WHERE id='$id'";
		$db->query($sql);
		
	}


if($act=='del')
	{
		
		 $sql="DELETE FROM resturant_recipe_options WHERE id='$id'";
		$db->query($sql);
		
	}
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
$array_extra=array();
if (isset($_POST["siteID"]) && is_array($_POST["siteID"])){ 
	$siteID = array_filter($_POST["siteID"]); 
    foreach($siteID as $field_valueextra){
        $array_extra[]= $field_valueextra;
    }
}
$array_valuesextra=implode(",",$array_extra);

$updatearr=array(	
					 "option_name"=>$_REQUEST['extra'],	
					  "receipy_id"=>$array_valuesextra,
						"option_price"=>$_REQUEST['price']
						
					 );
		
				
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, 'resturant_recipe_options', $whereClause);
					
					
					$errMsg='<br><b>Update Successfully!</b><br>';
					
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'resturant_recipe_options');
					
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							
						}else{
							$errMsg1='<br><b>Error!</b><br>';
						}
					
				}
			
	}

?>
<script>
function deladminnew(id)
{
	if(confirm("Are you sure to delete?"))
	{
		location.href="//orangestate.ng/admin/admin_new/extra_list.php?act=del&id="+id;
	}
}
</script>

    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

            <li><a href="#">Products</a></li>

            <li class="active">Manage Extra Options</li>

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

                                            <th width="350">Extra Name</th>

                                            <th>Price</th>

                                           
                                            <th>Status</th>
<?php if($_SESSION['Super_admin']=='superadmin'){ ?>
                                            <th>Action</th>
<?php } ?>
                                        </tr>

                                    </thead>

                                    <tbody>
									  <?php
			$db1=new DB();
			$ct=1;
			$sql="SELECT * from resturant_recipe_options order by id desc";
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
					
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>

                                            <td><?php echo $row['option_name'];?> </td>
											 <td><?php echo $row['option_price'];?> </td>

                                            <td>  <a href='<?=$_PAGE."?".$qryStr?>&act=dac&id=<?=$row[id]?>&stat=<?=$row[status]?>'><?=$row[status]==0?'Deactive':'Active'?></a> </td>

                                            <!--<td><a href=""> Edit </a> <a href=""> Delete </a></td>-->
											<?php if($_SESSION['Super_admin']=='superadmin'){ ?>
											<td><a href="//orangestate.ng/admin/admin_new/extra_list.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
											</a></td>
											<?php } ?>
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
				  
				  <?php if(!empty($errMsg)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> <?=$errMsg?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>

<?php if(!empty($errMsg1)){?>
                        <div class="col-md-12">                                          

                                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Error!</strong> <?=$errMsg1?> 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>

					<?php } ?>
                
				  <?php 
                             if(!empty($_REQUEST['id'])){
							$sql2="SELECT * FROM resturant_recipe_options where id=".$_REQUEST['id'];
							$db->query($sql2)or die($db->error());
							$row2=$db->fetchArray();
							 }
				  
				  ?>
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

			  <div  class="panel no-borders"><form action="" method="post"  >
	<input type="hidden" name="id" value="<?=$row2['id']?>">
    <div class="panel-heading bg-completed">
        <p class="lead m-n">Add new extra</p>
    </div><!-- /.panel-heading -->

    <div class="panel-body">
    	            <div class="form-group pj-multilang-wrap" data-index="1" style="display: block;">
                <label class="control-label">Extra name</label>
                                        
                <div class="" >
					<input type="text" class="form-control required" name="extra" value="<?=$row2['option_name']?>">	
									</div>
            </div>
                    <div class="form-group">
            <label class="control-label">Price</label>
        
            <div class="input-group">
                <input type="text" name="price" class="form-control number required" value="<?=$row2['option_price']?>">

                <span class="input-group-addon">₦</span> 
            </div>
        </div>
                    <div class="form-group">
                <label class="control-label">Products:</label>
            <select name="siteID[]" id="siteID"  class="form-control abcd" multiple="">
  <option value='0'> Not associated to any product </option>
  <?php $rid=$row2['receipy_id'];
  if(empty($rid)){ $rid=0; }
                             
							$sql="SELECT * FROM resturant_recipe where id IN($rid)";
							$db->query($sql)or die($db->error()); ?>

						
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" selected ><?=$row2['recipe_name']?></option>
                  <?php } $sql="SELECT * FROM resturant_recipe where id NOT IN($rid)";
							$db->query($sql)or die($db->error()); ?>

						
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>"  ><?=$row2['recipe_name']?></option>
                  <?php }?>
				  
</select>
	
               
			   </div>
            
		<div class="m-t-lg">
            <input type="submit" name="Submit" class="ladda-button btn btn-primary btn-lg btn-phpjabbers-loader pull-left"  style="margin-right: 15px;" value="Save">
               <!-- <span class="ladda-label">Save</span>
                <strong class="phpjabbers-loader ladda-spinner">
    
   
</strong>        -->    
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
