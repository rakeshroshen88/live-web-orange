<?php include("header.php");
$err="";

$db1=new DB();
$db2=new DB();
$dbn=new DB();
$uid=$_REQUEST['id'];
						  $sqln="SELECT * FROM all_user JOIN user_profile ON all_user.user_id=user_profile.user_id where all_user.user_id = '".$uid."'";
						$dbn->query($sqln);
						$billrow=$dbn->fetchArray();
$impidnew=$billrow['image_id'];
			


	
?>	

<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Customer</a></li>

                            <li class="active">View</li>

                        </ul>

                    </div>

                    

                    <!-- START PAGE CONTAINER -->

    <div class="page_container">

                    <div class="container">

                                                   

                       <div class="row"> 

                        <div class="col-md-12">                                          
<?php if(!empty($error)){?>
                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> <?=$error?>. 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

	</div>   <?php }?>                                        

                                </div>



                       <div  class="col-sm-12 verticle_tabs"> 

        <div class="col-xs-2">

            <!-- required for floating -->

            <!-- Nav tabs -->

            <h3> Customer View</h3>

            <ul class="nav nav-tabs tabs-left">

                <li class="active error"><a href="#Information" data-toggle="tab">Customer View 

                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>

                </a></li>

                <li><a href="#Inoices" data-toggle="tab">Account Information</a></li>

                <li><a href="#Shipments" data-toggle="tab">Orders</a></li>
				<li><a href="#Posts" data-toggle="tab">Posts</a></li>

                      

            </ul>

        </div>

<script>	
$(document).ready(function(){

$( "#send_email" ).on( "click", function() {

		var oid = jQuery(this).attr('oid');
		var social_AjaxURL='//orangestate.ng/admin/pages/send_email.php';
		var dataString ='id='+oid ;

			
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to Send an Order email..?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes,!'
				}).then((result) => {
				  if (result.value) {
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
					type: 'POST',
					data: dataString,
            	    success: function (data) {
						
					Swal.fire({
					  type: 'success',
					  title: 'success',
					  text: 'Order Has been send!'
					});
						
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	}else{
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'

					})
				}
				})
});


$( "#orderhold" ).on( "click", function() {
 
		var oid = jQuery(this).attr('oid');
		var social_AjaxURL='//orangestate.ng/admin/pages/order_hold.php';
		var dataString ='id='+oid ;

			
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to hold Order..?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes,!'
				}).then((result) => {
				  if (result.value) {
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
					type: 'POST',
					data: dataString,
            	    success: function (data) {
						
					Swal.fire({
					  type: 'success',					  
					  text: 'Order Has been send!'
					});
						
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	}else{
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'

					})
				}
				})
});

$( "#cancel" ).on( "click", function() {
 
		var oid = jQuery(this).attr('oid');
		var social_AjaxURL='//orangestate.ng/admin/pages/order_cancel.php';
		var dataString ='id='+oid ;

			
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to cancel this Order..?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes,!'
				}).then((result) => {
				  if (result.value) {
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
					type: 'POST',
					data: dataString,
            	    success: function (data) {
						
					Swal.fire({
					  type: 'success',					  
					  text: 'Order Has been Canceled!'
					});
						
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	}else{
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'

					})
				}
				})
});

$( "#ordership" ).on( "click", function() {
 
		var oid = jQuery(this).attr('oid');
		var traking = jQuery('#traking').val();
		var jobstatus = jQuery('#jobstatus').val();
	
		if(traking==''){
			traking='0';
		}
		var courier = jQuery('#courier').val();
		
		if(courier==''){
			courier='0';
		}
		
		var social_AjaxURL='//orangestate.ng/admin/pages/order_ship.php';
		var dataString ='id=' + oid + '&traking=' + traking + '&courier=' + courier + '&payment_status=' +jobstatus;

			
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to shipment this Order..?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes,!'
				}).then((result) => {
				  if (result.value) {
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
					type: 'POST',
					data: dataString,
            	    success: function (data) {
						
					Swal.fire({
					  type: 'success',					 
					  text: 'Order Has been shiped!'
					});
						
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	}else{
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'

					})
				}
				})
});


jQuery(document).on("click", ".deleteinv", function(e){


		var inv = jQuery(this).attr('inv');
		var social_AjaxURL='//orangestate.ng/admin/pages/deleteinv.php';
		var dataString ='inv='+inv ;

			
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to continue!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.value) {
					$.ajax({
            	    url: social_AjaxURL,
            	    async: true,
            	    cache: false,
					type: 'POST',
					data: dataString,
            	    success: function (data) {
						window.location.reload(true);
						
            	    },
            	    error : function(XMLHttpRequest, textStatus, errorThrown) {
            		    alert(textStatus);
            	    }
            	});
            	}else{
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'

					})
				}
				})


	});

});
</script>
        <div class="col-xs-10">

        	<div class="block ">                            

                             
  

                        </div>



            <!-- Tab panes -->

            <div class="tab-content mt-0">

                <div class="tab-pane active" id="Information">

                    <div class="add_produ">
<div class="cover-sec1">
	<?php if(!empty($billrow['cover_image_id'])){ ?>
	<img src="https://orangestate.ng/upload/<?=$billrow['cover_image_id']?>" alt=""  style="width:1920px; height:500px">
	<?php }else{ ?>
        <img src="https://orangestate.ng/images/resources/company-cover.jpg" alt="" >
	<?php } ?>
	</div>
                         <!-- RECENT ACTIVITY -->
						 <?php if(empty($impidnew)){ ?>
							<img src="https://orangestate.ng/images/resources/user.png"  alt="" height="50" width="50">
						<?php }else{?>
							<img src="https://orangestate.ng/upload/<?=$impidnew?>" alt="" height="50" width="50">
						<?php }?>

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Order Information</h2>

                                            <p>Order Information of the Product</p>
							
                                        </div>  
													

                                    </div>

                                    <div class="block-content margin-bottom-0">


                                            <div class="row">



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Permanent Address

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2>  <?php if(!empty($billrow['first_name'])){ ?>
	Name: <?=$billrow['first_name']?>  <?=$billrow['last_name']?><?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['adress'])){ ?>
Address: <?=$billrow['adress']?> <?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['state'])){ ?>
	State: <?=$billrow['state']?>
     <?php }?></h2>

                                                                    <h2>  <?php if(!empty($billrow['zip_code'])){ ?>
	Zip Code: <?=$billrow['zip_code']?>
     <?php }?></h2>
	 <h2>  <?php if(!empty($billrow['country'])){ ?>
	Country: <?=$billrow['country']?>
     <?php }?></h2>
	 
	  <h2>  <?php if(!empty($billrow['email_id'])){ ?>
	Confirmed email: <?=$billrow['email_id']?>
     <?php }?></h2>

                                                                    <h2><?php if(!empty($billrow['mobileno'])){ ?>
	T: <?=$billrow['mobileno']?>
     <?php }?></h2>

    Account Created on:<?php $date=explode('-',$billrow['joindate']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	

?>                            
<?php echo date('d M,Y',$st);?>                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

 <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Current Address

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2>  <?php if(!empty($billrow['first_name'])){ ?>
	Name: <?=$billrow['first_name']?>  <?=$billrow['last_name']?><?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['adress'])){ ?>
Address: <?=$billrow['adress']?> <?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['state'])){ ?>
	State: <?=$billrow['state']?>
     <?php }?></h2>

                                                                    <h2>  <?php if(!empty($billrow['zip_code'])){ ?>
	Zip Code: <?=$billrow['zip_code']?>
     <?php }?></h2>
	 <h2>  <?php if(!empty($billrow['country'])){ ?>
	Country: <?=$billrow['country']?>
     <?php }?></h2>
	 
	  <h2>  <?php if(!empty($billrow['email_id'])){ ?>
	Confirmed email: <?=$billrow['email_id']?>
     <?php }?></h2>

                                                                    <h2><?php if(!empty($billrow['mobileno'])){ ?>
	T: <?=$billrow['mobileno']?>
     <?php }?></h2>

    Account Created on:<?php $date=explode('-',$billrow['joindate']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	

?>                            
<?php echo date('d M,Y',$st);?>                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

 <div class="col-md-12">
 <div class="app-heading-container app-heading-bordered top">

      About User

    </div>
  <div class="col-md-12"><?=$billrow['about_user']?> </div>
   </div>
   <div class="col-md-12">
    <div class="app-heading-container app-heading-bordered top">

     Social Site

    </div>
	<div class="col-md-12">
   <?php  $sql="SELECT * from social_link where user_id=".$uid;
										$db->query($sql);
										if($db->numRows()>0)
										{
										while($newrow=$db->fetchArray()){?>
   <p><a href="http://<?=$newrow['slink']?>" title=""><?=$newrow['slink']?></a></p>
										<?php }} ?> 
 </div>
  </div>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

 <div class="col-md-12">
<div class="container">
  <h2>Orders</h2>
 

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Product Order</a></li>
    <li><a data-toggle="tab" href="#menu1">Food Order</a></li>
    <li><a data-toggle="tab" href="#menu2">Hotel Order</a></li>
   
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>orders</h3>
     
                            <div class="block-content">

                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
                                    <thead>
                                        <tr>										<th>Sl No #</th>
                                            <th>Order #</th>
                                            <th>Purchased on</th>
                                            <th>Bill to Name</th>
                                            <th>Total Price</th>
                                          
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php	$db1=new DB(); $ct=1;   $sql="SELECT * from user_order";	$db->query($sql);	if($db->numRows()>0)	{	while($row=$db->fetchArray()){	$num=$db1->getSingleResult('select count(*) from '.$_TBL_ORDER." where id=".$row['id']);	 $name=$db1->getSingleResult('select first_name from all_user where user_id='.$row['userid']);			$arr1=@explode(' ',$row['buydate']);		$edate=@explode('-',$arr1[0]);		$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);		if($row['order_status']=="0")	{	$sta="<b style='color:red;'>Pending</b>";	}elseif($row['order_status']=="1"){		$sta="Cancelled";	}elseif($row['order_status']=="2"){		$sta="Confirmed";	}			?>							<tr>						<td><?=$ct?></td>                         <td><a href="//orangestate.ng/admin/admin_new/order_view.php?id=<?=$row[orderid]?>"><?=$row['orderid']?></a></td>						 <td ><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></td>						 <td ><?php echo $name;?></td>	<td align='center'>₦ <?=$row['totalprice']?></td>                           																																			                           <td>					   <?php echo $sta;?>							  </td>                        							 <td><a href="//orangestate.ng/admin/admin_new/order_view.php?id=<?=$row['orderid']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>						</a>							</td>                     </tr>
                                      
	<?php $ct=$ct+1; } } ?>  
                                    </tbody>
                                </table>

                            </div>

                            </div>
                  

    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Food Order</h3>
      <div class="block-content">

                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
                                    <thead>
                                        <tr>										<th>Sl No #</th>
                                            <th>Order #</th>
											<th>Order Type</th>
                                            <th>Purchased on</th>
                                            <th>Bill to Name</th>
                                            <th>Total Price</th>
                                          
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php	$db1=new DB(); $ct=1;
									if($_SESSION['Super_admin']=='superadmin'){
									  $sql="SELECT * from food_order";
									}else{
										 $sql="SELECT * from food_order where resturant_id=".$_REQUEST['rid'];
									}
									$db->query($sql);	if($db->numRows()>0)	{	while($row=$db->fetchArray()){	$num=$db1->getSingleResult('select count(*) from '.$_TBL_ORDER." where id=".$row['id']);	 $name=$db1->getSingleResult('select first_name from all_user where user_id='.$row['userid']);			$arr1=@explode(' ',$row['buydate']);		$edate=@explode('-',$arr1[0]);		$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);		if($row['order_status']=="0")	{	$sta="<b style='color:red;'>Pending</b>";	}elseif($row['order_status']=="1"){		$sta="Cancelled";	}elseif($row['order_status']=="2"){		$sta="Confirmed";	}			?>							<tr>						<td><?=$ct?></td>                         <td><a href="//orangestate.ng/admin/admin_new/food_order_details.php?id=<?=$row[orderid]?>"><?=$row['orderid']?></a></td>	
<td><?=$row['order_type']?></td>

									<td ><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></td>						 <td ><?php echo $name;?></td>	<td align='center'>₦ <?=$row['totalprice']?></td>                           																																			                           <td>					   <?php echo $sta;?>							  </td>                        							 <td><a href="//orangestate.ng/admin/admin_new/food_order_details.php?id=<?=$row['orderid']?>"> <span class="glyphicon glyphicon-edit" title="Edit"></span> &nbsp;
									<?php if($_SESSION['Super_admin']=='superadmin'){ ?>
									<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="glyphicon glyphicon-trash" title="Delete"></span>						</a>

									<?php } ?>

									</td>                     </tr>
                                      
	<?php $ct=$ct+1; } } ?>  
                                    </tbody>
                                </table>

                            </div>

                            </div>
                  
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Hotel Order</h3>
    
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
  </div>
                                            </div>

 
 
 

 
 
 <div class="row">
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0" style="height: 107px;">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Total Orders</div>
                                                <div class="title pull-right"><span class="label label-success label-ghost label-bordered">+14.2%</span></div>
                                            </div>                                        
                                            <div class="intval">15</div>                                        
                                            <!--<div class="line">
                                                <div class="subtitle">Total items sold</div>
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span> good</div>
                                            </div>-->
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Total pending order</div>
                                                <div class="title pull-right text-success">+32.9%</div>
                                            </div>                                                                                    <div class="intval">6</div>
                                            <!--<div class="line">
                                                <div class="subtitle">Total items sold</div>
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span> good</div>
                                            </div>-->
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Total Confirm Order</div>
                                                <div class="title pull-right text-success">+9.2%</div>
                                            </div>                                              
                                            <div class="intval">2<small></small></div>
                                           <!-- <div class="line">
                                                <div class="subtitle">Frofit for the year</div>                                                
                                            </div>-->
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Cancel Order</div>                                                <div class="title pull-right text-success">-12.7%</div>
                                            </div>                                        
                                            <div class="intval">4<small></small></div>
                                            <div class="line">
                                                <div class="subtitle">Statistic per year</div>                                                
                                            </div>
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0" style="height: 122px;">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">Visitors</div>
                                                <div class="title pull-right"><span class="label label-warning label-ghost label-bordered">3.5%</span></div>
                                            </div>                                        
                                            <div class="intval">28</div>
                                            <div class="line">
                                                <div class="subtitle">Visitors per month</div>
                                                <div class="subtitle pull-right text-warning"><span class="icon-arrow-down"></span> normal</div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">Returned</div>
                                                <div class="title pull-right text-success">67.1%</div>
                                            </div>                                        
                                            <div class="intval">61,488</div>
                                            <div class="line">
                                                <div class="subtitle">Returned visitors per month</div>
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span></div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">New</div>
                                                <div class="title pull-right text-success">33.9%</div>
                                            </div>                                        
                                            <div class="intval">38,085</div>
                                            <div class="line">
                                                <div class="subtitle">New visitors per month</div>                                                
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span></div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">Registred</div>
                                                <div class="title pull-right">+458</div>
                                            </div>                                        
                                            <div class="intval">12,554</div>
                                            <div class="line">
                                                <div class="subtitle">Total registred users</div>                                                
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                                                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0" style="height: 132px;">
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-bubble"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Messages</div>         
                                                        <div class="title pull-right"><span class="label label-success label-ghost label-bordered">3 NEW</span></div>
                                                    </div>                                        
                                                    <div class="intval text-left">39 / 1,589</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open all messages</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-warning"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Server Notifications</div>                                                        
                                                    </div>                                        
                                                    <div class="intval text-left">14 / 631</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open all notifications</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-envelope"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Inbox Mail</div>                                                        
                                                    </div>                                        
                                                    <div class="intval text-left">2 / 481</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open inbox messages</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-users"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Customers</div>             
                                                        <div class="title pull-right"><span class="label label-danger label-bordered">15 NEW</span></div>
                                                    </div>                                        
                                                    <div class="intval text-left">6,233</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open contact list</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0" style="height: 132px;">
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-cloud-check"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Total Server Load</div>
                                                        <div class="subtitle pull-right text-success"><span class="fa fa-check"></span> UP</div>
                                                    </div>                                        
                                                    <div class="intval text-left">85.2%</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle">Latest back up: <a href="#">12/07/2016</a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-database"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Database Load</div>
                                                        <div class="subtitle pull-right text-success"><span class="fa fa-check"></span> UP</div>
                                                    </div>                                        
                                                    <div class="intval text-left">43.16%</div>
                                                    <div class="line">
                                                        <div class="subtitle">4/10 databases used</div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-inbox text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Disk Space</div>
                                                        <div class="subtitle pull-right text-danger"><span class="fa fa-times"></span> Critical</div>
                                                    </div>                                        
                                                    <div class="intval text-left">99.98%</div>
                                                    <div class="line">
                                                        <div class="subtitle">234.2GB / 240GB used</div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-heart-pulse"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Proccessor</div>
                                                        <div class="subtitle pull-right text-success"><span class="fa fa-check"></span> Normal</div>
                                                    </div>                                        
                                                    <div class="intval text-left">32.5%</div>
                                                    <div class="line">
                                                        <div class="subtitle">Intule Cori P7, 3.6Ghz</div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                </ul>
                                
                            </div>
                        </div>









                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

                </div>

                <div class="tab-pane" id="Inoices">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Inoices</h2>

                                            <p>Inoices of this Order</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                        

                                        <table class="table table-striped table-bordered datatable-extended" id="sortable-data">

		                                    <thead>

		                                        <tr>

		                                            <th>Invoice #</th>

		                                            <th>Bill to Name</th>

		                                            <th>Invoice Date</th>

		                                            <th>Status</th>

		                                            <th>Amount</th>

		                                            <th>Action</th> 

		                                        </tr>

		                                    </thead>

		                                    <tbody>
											<?php 
											$dbinv=new DB();
											$sqlinv="select * from order_invoice where order_id='".$orderid."'";
											$dbinv->query($sqlinv);
											if($dbinv->numRows()>0)
											{	while($rowinv=$dbinv->fetchArray()){
											?>

		                                        <tr>

		                                            <td><?=$rowinv['invoice_id']?></td>

		                                            <td><?=$rowinv['customer_name']?></td>

		                                            <td><?=$rowinv['created_at']?></td>

		                                            <td><?=$rowinv['payment_status']?></td> 

		                                            <td><?=$rowinv['totalamount']?></td>  

		                                            <td><a href=""> View </a> <a href='javascript:void(0)' class="deleteinv" inv="<?=$rowinv['invoice_id']?>"> <span class="glyphicon glyphicon-trash" title="Delete"></span>
											</a></td>

		                                        </tr>
											<?php } } ?>


		                                    </tbody>

		                                </table>









                                        <p></p>









                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

                </div>

                <div class="tab-pane" id="Shipments">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Shippment</h2>

                                            <p>Shipment Details</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                        

                                        <table class="table table-striped table-bordered datatable-extended" id="sortable-data">

		                                    <thead>

		                                        <tr>

		                                            <th>Shipment #</th>

		                                            <th>Ship to Name</th>

		                                            <th>Shipment Date</th>

		                                            <th>Order Id</th>

		                                            <th>Action</th> 

		                                        </tr>

		                                    </thead>

		                                    <tbody>
											<?php
 $sqlship="select * from order_shipment where order_id='".$orderid."'";
$db->query($sqlship);
while($shiprow=$db->fetchArray()){
											?>
											

		                                        <tr>

		                                            <td><?=$shiprow['ship_id']?></td>

		                                            <td><?=$shiprow['ship_to_name']?></td>

		                                            <td><?=$shiprow['ship_status_date']?></td>

		                                            <td><?=$shiprow['order_id']?></td>    

		                                            <td><a href=""> View </a> </td>

		                                        </tr>

	<?php } ?>

		                                    </tbody>

		                                </table>









                                        <p></p>









                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

                </div>

                 
<div class="tab-pane" id="Posts">
  <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Posts</h2>

                                            <p>Posts Details</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                        

                                        <table class="table table-striped table-bordered datatable-extended" id="sortable-data">

		                                    <thead>

		                                        <tr>

		                                            <th>Post #</th>

		                                            <th>Post to Name</th>

		                                            <th>Post Date</th>

		                                            <th>Action</th> 

		                                        </tr>

		                                    </thead>

		                                    <tbody>
											<?php
 $sqlship="select * from user_post where user_id='".$uid."'";
$db->query($sqlship);
while($shiprow=$db->fetchArray()){
											?>
											

		                                        <tr>

		                                            <td><?=$shiprow['post_id']?></td>

		                                            <td><?=$shiprow['post_details']?></td>

		                                            <td><?=$shiprow['post_date']?></td>
													
		                                            <td><a href=""> View </a> </td>

		                                        </tr>

	<?php } ?>

		                                    </tbody>

		                                </table>









                                        <p></p>









                                    </div>



                                </div>

                                <!-- END RECENT -->



                    </div>

</div>
 

            </div>



             



        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>





<!--------------------------------------------->



<!-- MODAL FULL WIDTH -->

            <div class="modal fade" id="modal-full" tabindex="-1" role="dialog" aria-labelledby="modal-large-header">                        

                <div class="modal-dialog modal-lg" role="document">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>



                    <div class="modal-content">

                        <div class="modal-header">                        

                            <h4 class="modal-title" id="modal-large-header">Create Invoice</h4>

                        </div>

                        <div class="modal-body">

                          <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Order Information</h2>

                                            <p>Order Information of the Product</p>

                                        </div>                                

                                    </div>

                                   <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Order Information</h2>

                                            <p>Order Information of the Product</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                            <div class="row">

                                                

                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Order # <?=$orderid?>

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Order  Date</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></h2>

                                                                </div>

                                                            </div>

                                                            



                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Order Status</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><?=$sta?></h2>

                                                                </div>

                                                            </div>





                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Placed from IP</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><?=$row['ipaddress']?></h2>

                                                                </div>

                                                            </div>





                                                           

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Account Information

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Customer Name</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><a href="#"> <?php if(!empty($billrow['first_name'])){ ?>
	<?=$billrow['first_name']?> <?php }?></a></h2>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Email</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><a href="#"><?php if(!empty($billrow['email_id'])){ ?>
<?=$billrow['email_id']?> <?php }?></a></h2>

                                                                </div>

                                                            </div>

                                                           

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>

                                            <div class="row">



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Billing Address

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2>  <?php if(!empty($billrow['first_name'])){ ?>
	<?=$billrow['first_name']?>  <?=$billrow['last_name']?><?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['adress'])){ ?>
<?=$billrow['adress']?> <?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['state'])){ ?>
	<?=$billrow['state']?>
     <?php }?></h2>

                                                                    <h2>  <?php if(!empty($billrow['zip_code'])){ ?>
	<?=$billrow['zip_code']?>
     <?php }?></h2>
	 <h2>  <?php if(!empty($billrow['country'])){ ?>
	<?=$billrow['country']?>
     <?php }?></h2>
	 
	  <h2>  <?php if(!empty($billrow['email_id'])){ ?>
	<?=$billrow['email_id']?>
     <?php }?></h2>

                                                                    <h2><?php if(!empty($billrow['mobileno'])){ ?>
	T: <?=$billrow['mobileno']?>
     <?php }?></h2>

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Shipping Address

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 <?php $dbsp=new DB();
																  $sqlship1="select * from billing_address where userid=".$row['userid'];
$dbsp->query($sqlship1);
$shiprow1=$dbsp->fetchArray();
																 ?>

                                                                <div class="col-md-12">

                                                                    <h2>  <?php if(!empty($shiprow1['billing_firstname'])){ ?>
	<?php echo $shiprow1['billing_firstname']; ?>  <?php echo $shiprow1['billing_lastname']; ?><?php }?></h2>

                                                                    <h2> <?php if(!empty($shiprow1['billing_adress'])){ ?>
<?=$shiprow1['billing_adress']?> <?php }?></h2>

                                                                    <h2> <?php if(!empty($shiprow1['billing_state'])){ ?>
	<?=$shiprow1['billing_state']?>
     <?php }?></h2>

                                                                    <h2>  <?php if(!empty($shiprow1['billing_zip'])){ ?>
	<?=$shiprow1['billing_zip']?>
     <?php }?></h2>
	 <h2>  <?php if(!empty($shiprow1['country'])){ ?>
	<?=$shiprow1['country']?>
     <?php }?></h2>
	 
	  <h2>  <?php if(!empty($shiprow1['billing_email'])){ ?>
	<?=$shiprow1['billing_email']?>
     <?php }?></h2>

                                                                    <h2><?php if(!empty($shiprow1['billing_phone'])){ ?>
	T: <?=$shiprow1['billing_phone']?>
     <?php }?></h2>

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>



                                            <div class="row">

                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Payment Information

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2>Online Payment</h2>

                                                                    <h2>Order was placed using NGN</h2> 

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Shipping & Handling Information

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2><b>Flat Rate - Fixed </b> ₦0.00 </h2> 

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>



                                            <div class="row">





                                                <div class="col-md-12 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Items Ordered

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">







                                                        <table class="table table-striped table-bordered billprotable">

                                                            <thead class="">

                                                                <tr>

                                                                    <th width="300">Product</th>

                                                                    <th>Item Status</th>

                                                                    <th>Original Price</th>

                                                                    <th>Price</th>

                                                                    <th>Qty</th>

                                                                    <th>SubTotal</th>

                                                                    <th>Tax Amount</th>

                                                                    <th>Tax Percent</th>

                                                                    <th>Discount Amount</th>

                                                                    <th>Grand Total</th> 

                                                                </tr>

                                                            </thead>

                                                            <tbody>
<?php

for($i=0;$i<$cn;$i++)
{
	$sku=$db1->getSingleResult("select prod_sku from product where id=".$prodidarr[$i]);
	
	$tax=$db1->getSingleResult("select tax from product where id=".$prodidarr[$i]);
	$prod_price	=$db1->getSingleResult("select prod_price from product where id=".$prodidarr[$i]);				
?>
                                                                <tr>

                                                                    <td>

                                                                        <div id="order_item_621" class="item-container">

                                                                            <div class="item-text">

                                                                                <h5 class="title"><span id="order_item_621_title"><?=$prodarray[$i]?></span></h5>

                                                                                <strong>SKU:</strong> <?=$sku?>

                                                                            </div>

                                                                        </div>

                                                                    </td>

                                                                    <td><?=$sta?></td>

                                                                    <td>₦<?=$prod_price?></td>

                                                                    <td><b> ₦<?=$pricearr[$i]?></b> </td> 

                                                                    <td> <?php 		
		echo $qtyarr[$i];		
		?> </td> 
		<?php 		$shipprice=$shiparr[$i];					
					$taxprice=$taxprice+$taxarr[$i];
					$discountprice2=$discountprice2+$discountparr[$i];                    		 
					$shipb=$shipb+$shipprice;	
		
		?>

                                                                    <td><b> ₦ <?=number_format($subtotalarr[$i],2,'.',',')?></b>  </td> 

                                                                     <td> ₦ <?=number_format($taxarr[$i],2,'.',',')?></td> 

                                                                    <td> <?php  echo $tax_percent[$i]; ?>%</td> 

                                                                   <td>₦ <?=number_format($discountprice2,2,'.',',')?></td> 

                                                                    <td>₦ <?=number_format(($subtotalarr[$i]+$shipprice),2,'.',',')?></td> 



                                                                </tr>


<?php 
	$taxtotal2=$taxtotal2+$taxarr[$i];
	$shiptotal2+=$shiparr[$i];
	 $subtotal2+=$subtotalarr[$i];
	$grand_total2+=$subtotalarr[$i]+$shiparr[$i];
	
			}
?>	

                                                                



                                                            </tbody>

                                                        </table>

 



 

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>





                                            <div class="row">

                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Comments History

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
									<?php 
									$db2=new DB();
									 $statusorder="select * from $_TBL_STATUS where invoiceid='$orderid' order by id desc limit 0,1";
									$db1->query($statusorder);
									$row1=$db1->fetchArray();
									?>
									<form action="" method="post" name="frmstatus" ">
									<input type="hidden" name="invmsg" value="" />
									<input type="hidden" name="jobid" value="<?php echo $row['id'];?>" />									
									<input type="hidden" name="invid" value="<?php echo $orderid;?>" id="invid" />
									<input type="hidden" name="custemail" value="<?php echo $db2->getSingleResult("SELECT email_id FROM $_TBL_USER WHERE user_id=".$row['userid']);?>" />
                                                        <div class="form-group col-md-12">



                                                            <label >Status</label>

                                                           
                                           <select name="jobstatus" class="form-control">
											<option value="0"  >Pending</option>
											<option value="1" >Cancelled</option>
											<option value="2"  selected="selected">Processed</option
>											<option value="4"  >Hold</option>
											</select>



                                                        </div>

                                                       


								


                                                      </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Order Totals

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                               

                                                                <div class="col-md-12">

                                                                    <h2 class="text-right">

                                                                         Discount <span class="width100">-₦<?=number_format($discountprice2,2,'.',',')?></span>

                                                                     </h2>

                                                                     <h2 class="text-right">

                                                                         Sub Total <span class="width100">₦<?=number_format(($subtotal2-$discountprice2),2,'.',',')?></span>

                                                                     </h2>
 
                                                                     <h2 class="text-right">

                                                                         Shipping & Handling <span class="width100">₦<?=number_format($shiptotal2,2,'.',',')?>
                                                                     </h2>
																	 
																	   <h2 class="text-right">

                                                                        <b>

                                                                         Total Tax <span class="width100">₦<?=number_format($taxtotal2,2,'.',',')?></span>

                                                                         </b>

                                                                     </h2>

                                                                     <h2 class="text-right">

                                                                        <b>

                                                                         Grand Total <span class="width100">₦<?=number_format($grand_total2,2,'.',',')?></span>

                                                                     </b>
                                                               </h2>

                                                                     <h2 class="text-right">

                                                                        <b>

                                                                         Total Paid <span class="width100">₦<?=number_format($grand_total2,2,'.',',')?></span>

                                                                         </b>

                                                                     </h2>

                                                                     

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>





                                        </div>



                                                 





                                                <p></p>











                                    </div>



                                </div>

                                <!-- END RECENT -->


                                </div>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						<?php if($row['order_status']==1){ ?>
					
						<button type="button" class="btn btn-warning btn-icon-fixed" >Closed</button>
						<?php }else{ ?>
                            <input type="Submit" name="Submit" value="Submit" class="btn btn-warning btn-icon-fixed">
						<?php } ?>
                        </div>
</form>
                    </div>

                </div>            

            </div>

            <!-- END MODAL FULL WIDTH -->

<!-- MODAL FULL WIDTH -->

            <div class="modal fade" id="modal-full1" tabindex="-1" role="dialog" aria-labelledby="modal-large-header">                        

                <div class="modal-dialog modal-lg" role="document">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>



                    <div class="modal-content">

                        <div class="modal-header">                        

                            <h4 class="modal-title" id="modal-large-header">Shipment</h4>

                        </div>

                        <div class="modal-body">

                          <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Order Information</h2>

                                            <p>Order Information of the Product</p>

                                        </div>                                

                                    </div>

                                   <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Order Information</h2>

                                            <p>Order Information of the Product</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                            <div class="row">

                                                

                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Order # <?=$orderid?>

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Order  Date</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></h2>

                                                                </div>

                                                            </div>

                                                            



                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Order Status</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><?=$sta?></h2>

                                                                </div>

                                                            </div>





                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Placed from IP</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><?=$row['ipaddress']?></h2>

                                                                </div>

                                                            </div>





                                                           

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Account Information

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Customer Name</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><a href="#"> <?php if(!empty($billrow['first_name'])){ ?>
	<?=$billrow['first_name']?> <?php }?></a></h2>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="row">

                                                                <div class="col-md-5">

                                                                     <p>Email</p>

                                                                </div>

                                                                <div class="col-md-7">

                                                                    <h2><a href="#"><?php if(!empty($billrow['email_id'])){ ?>
<?=$billrow['email_id']?> <?php }?></a></h2>

                                                                </div>

                                                            </div>

                                                           

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>

                                            <div class="row">



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Billing Address

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2>  <?php if(!empty($billrow['first_name'])){ ?>
	<?=$billrow['first_name']?>  <?=$billrow['last_name']?><?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['adress'])){ ?>
<?=$billrow['adress']?> <?php }?></h2>

                                                                    <h2> <?php if(!empty($billrow['state'])){ ?>
	<?=$billrow['state']?>
     <?php }?></h2>

                                                                    <h2>  <?php if(!empty($billrow['zip_code'])){ ?>
	<?=$billrow['zip_code']?>
     <?php }?></h2>
	 <h2>  <?php if(!empty($billrow['country'])){ ?>
	<?=$billrow['country']?>
     <?php }?></h2>
	 
	  <h2>  <?php if(!empty($billrow['email_id'])){ ?>
	<?=$billrow['email_id']?>
     <?php }?></h2>

                                                                    <h2><?php if(!empty($billrow['mobileno'])){ ?>
	T: <?=$billrow['mobileno']?>
     <?php }?></h2>

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Shipping Address

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2>  <?php if(!empty($shiprow1['billing_firstname'])){ ?>
	<?=$shiprow1['billing_firstname']?>  <?=$shiprow1['billing_lastname']?><?php }?></h2>

                                                                    <h2> <?php if(!empty($shiprow1['billing_adress'])){ ?>
<?=$shiprow1['billing_adress']?> <?php }?></h2>

                                                                    <h2> <?php if(!empty($shiprow1['billing_state'])){ ?>
	<?=$shiprow1['billing_state']?>
     <?php }?></h2>

                                                                    <h2>  <?php if(!empty($shiprow1['billing_zip'])){ ?>
	<?=$shiprow1['billing_zip']?>
     <?php }?></h2>
	 <h2>  <?php if(!empty($shiprow1['country'])){ ?>
	<?=$shiprow1['country']?>
     <?php }?></h2>
	 
	  <h2>  <?php if(!empty($shiprow1['billing_email'])){ ?>
	<?=$shiprow1['billing_email']?>
     <?php }?></h2>

                                                                    <h2><?php if(!empty($shiprow1['billing_phone'])){ ?>
	T: <?=$shiprow1['billing_phone']?>
     <?php }?></h2>

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>



                                            <div class="row">

                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Payment Information

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                                 

                                                                <div class="col-md-12">

                                                                    <h2>Online Payment</h2>

                                                                    <h2>Order was placed using NGN</h2> 

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Shipping & Handling Information

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">
<form action="" method="post" name="frmstatus" ">
                                                                 

                                                                <div class="col-md-12">

                                                                    <h2><b>Flat Rate - Fixed </b> ₦0.00 </h2> 

                                                                </div>
																
																 <div class="col-md-12">

                                                                    <h2><b>Traking Id </b></h2> 
																	<input type="text" name="traking" id="traking" class="form-group "/>

                                                                </div>
																
																
																 <div class="col-md-12">

                                                                    <h2><b>courier Name </b>  </h2> 
<input type="text" name="courier" id="courier" class="form-group"/>
                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>



                                            <div class="row">





                                                <div class="col-md-12 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                        Items Ordered

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">







                                                        <table class="table table-striped table-bordered billprotable">

                                                            <thead class="">

                                                                <tr>

                                                                    <th width="300">Product</th>

                                                                    <th>Item Status</th>

                                                                    <th>Original Price</th>

                                                                    <th>Price</th>

                                                                    <th>Qty</th>

                                                                    <th>SubTotal</th>

                                                                    <th>Tax Amount</th>

                                                                    <th>Tax Percent</th>

                                                                    <th>Discount Amount</th>

                                                                    <th>Grand Total</th> 

                                                                </tr>

                                                            </thead>

                                                            <tbody>
<?php

for($i=0;$i<$cn;$i++)
{
	$sku=$db1->getSingleResult("select prod_sku from product where id=".$prodidarr[$i]);
	
	$tax=$db1->getSingleResult("select tax from product where id=".$prodidarr[$i]);
	$prod_price	=$db1->getSingleResult("select prod_price from product where id=".$prodidarr[$i]);				
?>
                                                                <tr>

                                                                    <td>

                                                                        <div id="order_item_621" class="item-container">

                                                                            <div class="item-text">

                                                                                <h5 class="title"><span id="order_item_621_title"><?=$prodarray[$i]?></span></h5>

                                                                                <strong>SKU:</strong> <?=$sku?>

                                                                            </div>

                                                                        </div>

                                                                    </td>

                                                                    <td><?=$sta?></td>

                                                                    <td>₦<?=$prod_price?></td>

                                                                    <td><b> ₦<?=$pricearr[$i]?></b> </td> 

                                                                    <td> <?php 		
		echo $qtyarr[$i];		
		?> </td> 
		<?php 		$shipprice=$shiparr[$i];					
					$taxprice1=$taxprice1+$taxarr[$i];
					$discountprice1=$discountprice1+$discountparr[$i];                    		 
					$shipb1=$shipb1+$shipprice;	
		
		?>

                                                                    <td><b> ₦ <?=number_format($subtotalarr[$i],2,'.',',')?></b>  </td> 

                                                                     <td> ₦ <?=number_format($taxarr[$i],2,'.',',')?></td> 

                                                                    <td> <?php  echo $tax_percent[$i]; ?>%</td> 

                                                                   <td>₦ <?=number_format($discountprice1,2,'.',',')?></td> 

                                                                    <td>₦ <?=number_format(($subtotalarr[$i]+$shipprice),2,'.',',')?></td> 



                                                                </tr>


<?php 
	$taxtotal1+=$taxtotal1+$taxarr[$i];
	$shiptotal1+=$shiparr[$i];
	 $subtotal1+=$subtotalarr[$i];
	$grand_total1+=$subtotalarr[$i]+$shiparr[$i];
	
			}
?>	

                                                                



                                                            </tbody>

                                                        </table>

 



 

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>





                                            <div class="row">

                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Payment History

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
									<?php 
									$db2=new DB();
									 $statusorder="select * from $_TBL_STATUS where invoiceid='$orderid' order by id desc limit 0,1";
									$db1->query($statusorder);
									$row1=$db1->fetchArray();
									?>
									
									<input type="hidden" name="invmsg" value="" />
									<input type="hidden" name="jobid" value="<?php echo $row['id'];?>" />
									<input type="hidden" name="submit" value="submit" />
									<input type="hidden" name="invid" value="<?php echo $orderid;?>" id="invid" />
									<input type="hidden" name="custemail" value="<?php echo $db2->getSingleResult("SELECT email_id FROM $_TBL_USER WHERE user_id=".$row['userid']);?>" />
                                                        <div class="form-group col-md-12">



                                                            <label >Status</label>

                                                           
                                                               <select name="jobstatus" class="form-control" id="jobstatus">
											<option value="Paid" selected="selected" <?php if($row1['order_status']=="Paid"){echo "selected";}?>>Paid</option>
											<option value="Unpaid" <?php if($row1['order_status']=="Unpaid"){echo "selected";}?>>Unpaid</option>
											</select>



                                                        </div>

                                                       
 <!--
                                                        <div class="form-group text-right">

                                                            <br>

                                                           <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Add Comment</button>

                                                        </div>-->


								


                                                        <!--<div class="chatbox-order">

                                                            <ul>
<?php 
$statusorder="select * from $_TBL_STATUS where invoiceid='$orderid'";
$db1->query($statusorder);
while($row2=$db1->fetchArray()){ 
$arr1=@explode(' ',$row2['order_status_date']);

$edate=@explode('-',$arr1[0]);	
$stamp1=@mktime(0,0,0,$edate[1],$edate[2],$edate[0]);
if($row2['order_status']=="0"){
$sta="Pending";	}elseif($row2['order_status']=="1"){
$sta="Cancelled";
}elseif($row2['order_status']=="2"){
$sta="Confirmed";
}elseif($row2['order_status']=="3"){
$sta="processing";
}elseif($row2['order_status']=="4"){
$sta="Hold";
}
?>
                                                                <li>

                                                                    <strong><?=date('dS'.' '.'M',$stamp1)?> <?=date('Y',$stamp1)?></strong> <?=$arr1[1]?>

                                                                    <span class="separator">|</span><strong><?=$sta?></strong>

                                                                    <br>

                                                                    <small><?=$row2['comment']?>

                                                                    </small> 

                                                                </li>

                                                               
<?php } ?>

                                                            </ul>



                                                        </div>-->

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Order Totals

                                                    </div>

                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">

                                                        <div class="title w100">

                                                            <div class="row">

                                                               

                                                                <div class="col-md-12">
																
																 <h2 class="text-right">

                                                                         Discount <span class="width100">-₦<?=number_format($discountprice1,2,'.',',')?></span>

                                                                     </h2>

                                                                     <h2 class="text-right">

                                                                         Sub Total <span class="width100">₦<?=number_format(($subtotal1-$discountprice1),2,'.',',')?></span>

                                                                     </h2>
 
                                                                     <h2 class="text-right">

                                                                         Shipping & Handling <span class="width100">₦<?=number_format($shiptotal1,2,'.',',')?>
                                                                     </h2>
																	 
																	   <h2 class="text-right">

                                                                        <b>

                                                                         Total Tax <span class="width100">₦<?=number_format($taxtotal1,2,'.',',')?></span>

                                                                         </b>

                                                                     </h2>

                                                                     <h2 class="text-right">

                                                                        <b>

                                                                         Grand Total <span class="width100">₦<?=number_format($grand_total1,2,'.',',')?></span>

                                                                     </b>
                                                               </h2>

                                                                     <h2 class="text-right">

                                                                        <b>

                                                                         Total Paid <span class="width100">₦<?=number_format($grand_total1,2,'.',',')?></span>

                                                                         </b>

                                                                     </h2>

                                                                   

                                                                     

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>

                                            </div>





                                        </div>



                                                 





                                                <p></p>











                                    </div>



                                </div>

                                <!-- END RECENT -->


                                </div>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                           
							
							<?php if($row['order_status']==1){ ?>
					
						<button type="button" class="btn btn-warning btn-icon-fixed" >Closed</button>
						<?php }else{ ?>
                           <button type="button" class="btn btn-default ordership" id="ordership" oid="<?=$orderid?>">Submit</button>
						<?php } ?>

                        </div>

                    </div>
</form>
                </div>            

            </div>

            <!-- END MODAL FULL WIDTH -->


<!--------------------------------------------->









                        

                    </div> <!-- END PAGE CONTAINER -->

    </div> <!-- END page_container -->

                    

<?php include("footer.php") ?>



