<?php include("header.php") ?>
<?php

$rdb=new DB();
$db2=new DB();
$makearr=array();
$makearr=getValuesArr( "countries", "countries_id","countries_name","", "" );
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
		
		$sql="UPDATE delivery_charge SET status='$stat' WHERE id='$id'";
		$db->query($sql);
		
	}


if($act=='del')
	{
		
		 $sql="DELETE FROM delivery_charge WHERE id='$id'";
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
										 
					    "city_id"=>$array_valuesextra,
						"price"=>$_REQUEST['price'],
						"order_type"=>$_REQUEST['type'],
						"resturant_id"=>$_REQUEST['resturant_id']
						
					 );
		
				
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['id'];
					updateData($updatearr, 'delivery_charge', $whereClause);
					
					
					$errMsg='<br><b>Update Successfully!</b><br>';
					
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'delivery_charge');
					
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
		location.href="//orangestate.ng/admin/admin_new/deliverycharge.php?act=del&id="+id;
	}
}
</script>

    <div class="app-heading-container app-heading-bordered bottom">

        <ul class="breadcrumb">

            <li><a href="#">Dashboard</a></li>

            <li><a href="#">Products</a></li>

            <li class="active">Manage delivery charge</li>

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

                                    <p>Manage delivery charge </p>

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

                                            <th width="350">City Name</th>
<th>Restaurant Name</th>
                                            <th>Price</th>

                                           
                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>
									  <?php
			$db1=new DB();
			$ct=1;
			$sql="SELECT * from delivery_charge where order_type='Restaurant' order by id desc";
			$db->query($sql);		
	
				if($db->numRows()>0)
					{
				while($row=$db->fetchArray()){
					$title=$db1->getSingleResult('select title from resturant_detail where id='.$row['resturant_id']);
			
?>	

                                        <tr>

                                            <td><?=$ct?></td>

                                            <td><?php echo $row['city_id'];?> </td>
											<td><?=$title?></td>
											 <td><?php echo $row['price'];?> </td>

                                            <td>  <a href='<?=$_PAGE."?".$qryStr?>&act=dac&id=<?=$row[id]?>&stat=<?=$row[status]?>'><?=$row[status]==0?'Deactive':'Active'?></a> </td>

                                            <!--<td><a href=""> Edit </a> <a href=""> Delete </a></td>-->
											<td><a href="//orangestate.ng/admin/admin_new/deliverycharge.php?act=edit&id=<?=$row['id']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladminnew("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>
											</a></td>

                                        </tr>

<?php $ct=$ct+1; } ?>
<?php	}else{
	
?>  
						<tr><td colspan="" valign="top" align="center">Not found any record !</td></tr>                      
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
							$sql2="SELECT * FROM delivery_charge where id=".$_REQUEST['id'];
							$db->query($sql2)or die($db->error());
							$row3=$db->fetchArray();
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
        <p class="lead m-n">Add Delivery Charges</p>
    </div><!-- /.panel-heading -->

    <div class="panel-body">
    	           <!-- <div class="form-group pj-multilang-wrap" data-index="1" style="display: block;">
                <label class="control-label">Country name</label>
                                        
                <div class="" >
				<?php echo createComboBox($makearr,"country",$row2['country_id'] ," id='country' class='form-control country'")?>
					
									</div>
            </div>multiple=""-->
			
					<div class="form-group">
                                        <label class="control-label" for="name"> Delivery Charge  For<span class="required">*</span></label>
                                        
							
						 <select  name="type" id="type"  class="form-control" required>
						 <option value="Restaurant">Restaurant</option>
						 <option value="Product">Product</option>
						 
				   </select>
                                        
                                    </div>
					<div class="form-group">
                                        <label class="control-label" for="name"> Restaurant<span class="required">*</span></label>
                                        
							<?php 
                             
							$sql="SELECT * FROM resturant_detail";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="resturant_id" id="resturant_id"  class="form-control" required>
						 <option value="0">Select  Restaurant</option>
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" <?php if($row2['id'] == $row3['resturant_id']){ echo 'selected'; } ?>><?=$row2['title']?></option>
                  <?php }?>
				   </select>
                                        
                                    </div>
			
			  <div class="form-group">
                <label class="control-label">City Name:</label>
            <select name="siteID[]" id="siteID"  class="form-control abcd" >
  <option> Not associated to any City </option>
  <?php $cid=$row3['city_id'];
  $cityid="2647,2648,2649,2650,2651,2652,2653,2654,2655,2656,2657,2658,2659,2660,2661,2662,2663,2664,2665,2666,2667,2668,2669,2670,2671";
							/* if(!empty($rid)){
                             
							 $sql="SELECT * FROM cities where name IN($rid) limit 10";
							$db->query($sql)or die($db->error()); */ ?>

						
						 <?php	//echo $row['catid'];
						/* while($row2=$db->fetchArray()){ */
					
						
						?>		
                        <!--<option value="<?=$row2['name']?>" selected ><?=$row2['name']?></option>-->
                  <?php //} } 
				  $sql="SELECT * FROM cities where state_id IN($cityid)";
							$db->query($sql)or die($db->error()); ?>

					
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['name']?>" <?php if($cid===$row2['name']){ echo "selected"; } ?> ><?=$row2['name']?></option>
                  <?php }?>
				  
</select>
	
               
			   </div>
            
			
			
            <div class="form-group">
            <label class="control-label">Price</label>
        
            <div class="input-group">
                <input type="text" name="price" class="form-control number required" value="<?=$row3['price']?>">

                <span class="input-group-addon">₦</span> 
            </div>
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
