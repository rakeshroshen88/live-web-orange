<?php include("header.php");
$err="";
$_TBL_STATUS='order_status';
$orderid=$_REQUEST['id'];
$db1=new DB();
$db2=new DB();
if(isset($_POST['submit']))
	{
	
	$updatearr=array(
						"invoiceid"=>$_POST['invid'],
						"comment"=>$_POST['comment'],
						"order_status"=>$_POST['jobstatus'],
						"order_type"=>'product',
						"order_status_date"=>date('Y-m-d h:i:s')
						
				);
print_r($updatearr);
$dt=@explode(' ',date('Y-m-d h:i:s'));
$date=@explode('-',$dt[0]);
$time=@explode(':',$dt[1]);
$st=mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
if($_POST['jobstatus']=="0")
	{
	$sta="Pending";
	}elseif($_POST['jobstatus']=="1"){
	$sta="Cancelled";
	}elseif($_POST['jobstatus']=="2"){
	$sta="Processed";
	}

	$whereClause=" invoiceid='".$_POST['invid']."'";
		
/* 	if(matchExists($_TBL_STATUS, $whereClause))
			{
				$whereClause=" invoiceid='".$_POST['invid']."'";
				updateData($updatearr, $_TBL_STATUS, $whereClause);
							$mail=new MIMEMAIL();
							$mail->from=$adminEmail;
							$mail->bcc=$adminEmail;
							$mail->to=$_POST['custemail'];
							$mail->subject="Your Product Order Status";
							$msg="Status On : ".date(' M dS, Y',$st);
							$msg.="<br><b>".$sta."</b>";
							$msg.="<br><br>".$_POST['comment'];							
							$mail->body=$msg."<br><br>".$_POST['invmsg'];
							$mail->html=true;
							$mail->send();		
			}else{ */
				$insid=insertData($updatearr, $_TBL_STATUS);
				if($insid>0){
							$mail=new MIMEMAIL();
							$mail->from=$adminEmail;
							$mail->bcc=$adminEmail;
							$mail->to=$_POST['custemail'];
							$mail->subject="Your Product Order Status";
							$msg="Status On : ".date(' M dS, Y',$st);
							$msg.="<br><b>".$sta."</b>";
							$msg.="<br><br>".$_POST['comment'];							
							$mail->body=$msg."<br><br>".$_POST['invmsg'];
							$mail->html=true;
							$mail->send();		
						}
				
		}
	
$updatearr1=array(	 "order_status"=>$_POST['jobstatus'],
					  "comment"=>$_POST['comment'],
						);
						
					$whereClause=" orderid=".$_POST['invid'];
					updateData($updatearr1, $_TBL_ORDER, $whereClause);

	
$bsql="select * from ".$_TBL_USER." where ser_id=".$_POST['userid'];
$db1->query($bsql);
$billrow=$db1->fetchArray();
$name=$billrow['name'];
$cell=$billrow['cellno'];	
$ord=$billrow['invid'];

$sql="select * from ".$_TBL_ORDER." where orderid='".$orderid."'";
$db->query($sql);
if($db->numRows()>0)
	{
	$grand_total=0;
	$row=$db->fetchArray();
	 $prodidarr=explode(',',$row['prodid']);
	 $prodarray=explode(',',$row['product_name']);
	 $qtyarr=explode(',',$row['quantity']);
	$pricearr=explode(',',$row['price']);	
	$subtotalarr=explode(',',$row['subtotal']);
	$shiparr=explode(',',$row['shippingcharge']);
	 $cn=count($qtyarr)-1;

$sql="select * from billing_address where userid=".$row['userid'];
$db->query($sql);
$shiprow=$db->fetchArray();
$sql22="SELECT * FROM all_user JOIN user_profile ON all_user.user_id=user_profile.user_id where all_user.user_id=".$row['userid'];
$db->query($sql22);
$billrow=$db->fetchArray();
 $billrow['first_name'];
 $arr1=@explode(' ',$row['buydate']);
 $edate=@explode('-',$arr1[0]);		
 $stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);
 if($row['order_status']=="0")	{
	 $sta="Pending";	
	 }elseif($row['order_status']=="1"){
		 $sta="Cancelled";
		 }elseif($row['order_status']=="2"){
			 $sta="Confirmed";
		 }
	}
?>	

<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Sales</a></li>

                            <li class="active">Order</li>

                        </ul>

                    </div>

                    

                    <!-- START PAGE CONTAINER -->

    <div class="page_container">

                    <div class="container">

                                                   

                       <div class="row"> 

                        <div class="col-md-12">                                          

                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                                        <div class="alert-icon">

                                            <span class="icon-checkmark-circle"></span> 

                                        </div>

                                        <strong>Success!</strong> You successfully read this important alert message. 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                                    </div>                                           

                                </div>



                       <div  class="col-sm-12 verticle_tabs"> 

        <div class="col-xs-2">

            <!-- required for floating -->

            <!-- Nav tabs -->

            <h3> Order View</h3>

            <ul class="nav nav-tabs tabs-left">

                <li class="active error"><a href="#Information" data-toggle="tab">Information 

                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>

                </a></li>

                <li><a href="#Inoices" data-toggle="tab">Inoices</a></li>

                <li><a href="#Shipments" data-toggle="tab">Shipments</a></li>

                      

            </ul>

        </div>

        <div class="col-xs-10">

        	<div class="block ">                            

                             

                            <p class="text-right">

                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>

                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Send Email</button>

                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Hold</button>

                                <button class="btn btn-warning btn-icon-fixed" data-toggle="modal" data-target="#modal-full"><span class="icon-arrow-up-circle"></span> Create Invoice</button>

                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Shipment</button>

                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button> 

                               

                            </p>

                             

                        </div>



            <!-- Tab panes -->

            <div class="tab-content mt-0">

                <div class="tab-pane active" id="Information">

                    <div class="add_produ">

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

                                                                    <h2>  <?php if(!empty($shiprow['billing_firstname'])){ ?>
	<?=$shiprow['billing_firstname']?>  <?=$shiprow['billing_lastname']?><?php }?></h2>

                                                                    <h2> <?php if(!empty($shiprow['billing_adress'])){ ?>
<?=$shiprow['billing_adress']?> <?php }?></h2>

                                                                    <h2> <?php if(!empty($shiprow['billing_state'])){ ?>
	<?=$shiprow['billing_state']?>
     <?php }?></h2>

                                                                    <h2>  <?php if(!empty($shiprow['billing_zip'])){ ?>
	<?=$shiprow['billing_zip']?>
     <?php }?></h2>
	 <h2>  <?php if(!empty($shiprow['country'])){ ?>
	<?=$shiprow['country']?>
     <?php }?></h2>
	 
	  <h2>  <?php if(!empty($shiprow['billing_email'])){ ?>
	<?=$shiprow['billing_email']?>
     <?php }?></h2>

                                                                    <h2><?php if(!empty($shiprow['billing_phone'])){ ?>
	T: <?=$shiprow['billing_phone']?>
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
	$prod_price=$db1->getSingleResult("select prod_price from product where id=".$prodidarr[$i]);
	$tax=$db1->getSingleResult("select tax from product where id=".$prodidarr[$i]);
				
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
		<?php $taxamt=$pricearr[$i]*$tax/100;?>

                                                                    <td><b> ₦ <?=number_format($subtotalarr[$i],2,'.',',')?></b>  </td> 

                                                                    <td> ₦ <?=number_format($taxamt,2,'.',',')?></td> 

                                                                    <td> <?php if(empty($tax)){ echo "0"; echo $tax; }?>%</td> 

                                                                    <td> ₦0.00 </td> 

                                                                    <td>₦ <?=number_format($subtotalarr[$i],2,'.',',')?></td> 



                                                                </tr>


<?php
	$taxtotal+=$taxamt;
	$shiptotal+=$shiparr[$i];
	 $subtotal+=$subtotalarr[$i];
	$grand_total+=$subtotalarr[$i]+$shiparr[$i];
	
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
									<input type="hidden" name="submit" value="submit" />
									<input type="hidden" name="invid" value="<?php echo $orderid;?>" id="invid" />
									<input type="hidden" name="custemail" value="<?php echo $db2->getSingleResult("SELECT email_id FROM $_TBL_USER WHERE user_id=".$row['userid']);?>" />
                                                        <div class="form-group col-md-3">



                                                            <label >Status</label>

                                                           
                                                               <select name="jobstatus" class="form-control">
											<option value="0" selected="selected" <?php if($row1['order_status']=="0"){echo "selected";}?>>Pending</option>
											<option value="1" <?php if($row1['order_status']=="1"){echo "selected";}?>>Cancelled</option>
											<option value="2" <?php if($row1['order_status']=="2"){echo "selected";}?>>Processed</option>
											</select>



                                                        </div>

                                                        <div class="form-grou col-md-12">

                                                            <label class="">Comment</label>
<textarea name="comment" cols="3" rows="3" class="form-control"><?php echo $row1['comment'];?></textarea>
                                                           
                                                        </div>

                                                        <div class="form-group text-right">

                                                            <br>

                                                            <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Add Comment</button>

                                                        </div>


								</form>


                                                        <div class="chatbox-order">

                                                            <ul>
<?php 
$statusorder="select * from $_TBL_STATUS where invoiceid='$orderid'";
$db1->query($statusorder);
while($row2=$db1->fetchArray()){ 
$arr1=@explode(' ',$row2['order_status_date']);

$edate=@explode('-',$arr1[0]);	
$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);
if($row2['order_status']=="0"){
$sta="Pending";	}elseif($row2['order_status']=="1"){
$sta="Cancelled";
}elseif($row2['order_status']=="2"){
$sta="Confirmed";
}
?>
                                                                <li>

                                                                    <strong><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></strong> <?=$arr1[1]?>

                                                                    <span class="separator">|</span><strong><?=$sta?></strong>

                                                                    <br>

                                                                    <small><?=$row2['comment']?>

                                                                    </small> 

                                                                </li>

                                                               
<?php } ?>

                                                            </ul>



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

                                                                         Sub Total <span class="width100">₦<?=number_format($subtotalarr[$i],2,'.',',')?><?=$subtotal?></span>

                                                                     </h2>
 
                                                                     <h2 class="text-right">

                                                                         Shipping & Handling <span class="width100">₦<?=number_format($shiptotal,2,'.',',')?>
                                                                     </h2>

                                                                     <h2 class="text-right">

                                                                        <b>

                                                                         Grand Total <span class="width100">₦<?=number_format($grand_total,2,'.',',')?></span>

                                                                     </b>
                                                               </h2>

                                                                     <h2 class="text-right">

                                                                        <b>

                                                                         Total Paid <span class="width100">₦<?=number_format($grand_total,2,'.',',')?></span>

                                                                         </b>

                                                                     </h2>

                                                                     <h2 class="text-right">

                                                                        <b>

                                                                         Total Tax <span class="width100">₦<?=number_format($taxtotal,2,'.',',')?></span>

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

		                                        <tr>

		                                            <td>251242</td>

		                                            <td>Rakesh roshen</td>

		                                            <td>Nov 24, 2020 3:55:36AM</td>

		                                            <td>Paid</td> 

		                                            <td>20</td>  

		                                            <td><a href=""> View </a> </td>

		                                        </tr>



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

		                                            <th>Date Date</th>

		                                            <th>Total Qty</th>

		                                            <th>Action</th> 

		                                        </tr>

		                                    </thead>

		                                    <tbody>

		                                        <tr>

		                                            <td>251242</td>

		                                            <td>Rakesh roshen</td>

		                                            <td>Nov 24, 2020 3:55:36AM</td>

		                                            <td>2</td>    

		                                            <td><a href=""> View </a> </td>

		                                        </tr>



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

                            <h4 class="modal-title" id="modal-large-header">Large Modal</h4>

                        </div>

                        <div class="modal-body">

                            <p>Vestibulum eget risus id ante semper sodales vel sed nibh. Nullam tortor tellus, vestibulum a laoreet laoreet, lacinia in lorem. Fusce tempor lorem tellus, sed egestas velit ornare et.</p>

                            <p>Vivamus viverra sem non imperdiet porta. Suspendisse quis dolor varius, gravida felis nec, vulputate sem. Nunc at rhoncus dui. Aenean quis quam diam. Nam fringilla arcu ipsum, vel venenatis tellus aliquam eu. Nam vehicula quis diam vel placerat. Vivamus a congue erat. Ut venenatis libero massa, sed tincidunt nunc ultricies eget. Vestibulum in ultricies sem. Duis ac risus et leo egestas aliquet ac nec ante. Donec varius pharetra tristique.</p>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-default">Submit</button>

                        </div>

                    </div>

                </div>            

            </div>

            <!-- END MODAL FULL WIDTH -->



<!--------------------------------------------->









                        

                    </div> <!-- END PAGE CONTAINER -->

    </div> <!-- END page_container -->

                    

<?php include("footer.php") ?>



