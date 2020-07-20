<?php include("header.php"); 
//$catid=$_REQUEST['id'];
$prodid=$_REQUEST['id'];
$act=$_REQUEST['act'];
$errMsg='';
$db2=new DB();
$makearr=array();
$makearr=getValuesArr( "countries", "countries_id","countries_name","", "" );
if(isset($_POST['Submit']) and $_POST['Submit']=="Save")
	{
	
		
	$up=new UPLOAD();
$uploaddir1="../../upload/food_ordering/restaurant/";
$uploaddir2="../../upload/food_ordering/restaurant/";
$uploaddir3="../../upload/food_ordering/restaurant/";
$check_type="jpg|jpeg|gif|png";
/////////////////////////////////////////////////////////////////////////////////////////////////
$valid_formats = array("jpg", "png", "gif");
$max_file_size = 1024*100000; //100 kb
$path = "../../upload/"; // Upload directory
$count = 0;
 $_SESSION['picid']=uniqid();

	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
					$image.=$name.',';
					/* $updatearrimg=array(
					 "item_id"=>$_SESSION["picid"],
					 "image"=>$name,
					 "userid"=>$_SESSION['SES_ADMIN_ID']
						);	
				$insidi=insertData($updatearrimg, $_TBL_ITEMIMAGE);
					 */
					
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}







 $prod_detail=$_REQUEST['prod_desc'];
 if(empty($_REQUEST['cityname'])){
	$city=$_REQUEST['cityid'];
}else{
	$city=$_REQUEST['cityname'];
	
}

if($act=="edit")
	{

	if(!empty($_FILES['largeimage']['name']))
		{
		$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
				}else{
		$largeimage=$_REQUEST['image3'];
		}
	
	}else{
	
	$largeimage=$up->upload_file($uploaddir3,"largeimage",true,true,0,$check_type);
	
	}

$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$prod_detail = mysqli_real_escape_string($link, $prod_detail);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);	
$updatearr=array(	
					 "recipe_name"=>$title,	
					  "description"=>$prod_detail,
					  "resturant_id"=>$_REQUEST['resturant_id'],
					  "recipe_category_id"=>$_REQUEST['recipe_category_id'],"price"=>$_REQUEST['price'],
					  "size"=>$_REQUEST['size'],					 
					 "delivery_avg_time"=>$_REQUEST['delivery_avg_time'],
					 "image"=>$largeimage,	
					  //"slider_image"=>$image,						 
					  "stars"=>$_REQUEST['star'],
					  "status"=>$_REQUEST['pstatus'],	
					  "featured"=>$_REQUEST['featured'],						
					 "date"=>date('Y-m-d')
					 );
		
				//print_r($updatearr);
			if($act=="edit")
				{
					$whereClause=" id=".$_REQUEST['prodid'];
					updateData($updatearr, 'resturant_recipe', $whereClause);
					
					
					$errMsg='<br><b>Update Successfully!</b><br>';
					
					
				}elseif($act=="add"){
				
					$insid=insertData($updatearr, 'resturant_recipe');
					
					if($insid>0)
						{
							$errMsg='<br><b>Added Successfully!</b><br>';
							
							
							
						}
					
				}
			
			
			
			//}
	}
$db1=new DB();
if(!empty($prodid))
	{
		$sql="SELECT * FROM resturant_recipe WHERE id=$prodid";
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
	}
?>
<div class="app-heading-container app-heading-bordered bottom">

                        <ul class="breadcrumb">

                            <li><a href="#">Dashboard</a></li>

                            <li><a href="#">Restaurant</a></li>


                        </ul>

                    </div>

    <style>
	.form-group:last-child {
    margin-bottom: 15px !important;
}
	</style>                

                    <!-- START PAGE CONTAINER -->

    <div class="page_container">

                    <div class="container">

                                                   

                       <div class="row"> 
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
					

                       <div  class="col-sm-12 newtabforms"> 

        <div class="col-xs-12">
		<div class="row wrapper wrapper-content animated fadeInRight">
    <div class="col-lg-9">
        <form action="/1591628910_794/index.php?controller=pjAdminOrders&amp;action=pjActionUpdate" method="post" id="frmUpdateOrder" novalidate="novalidate">
            <input type="hidden" name="order_update" value="1" />
            <input type="hidden" name="id" value="4" />
            <input type="hidden" id="price" name="price" value="32.97" />
            <input type="hidden" id="price_packing" name="price_packing" value="" />
            <input type="hidden" id="price_delivery" name="price_delivery" value="0.00" />
            <input type="hidden" id="discount" name="discount" value="0.00" />
            <input type="hidden" id="subtotal" name="subtotal" value="32.97" />
            <input type="hidden" id="tax" name="tax" value="3.30" />
            <input type="hidden" id="total" name="total" value="36.27" />

            <div
                id="dateTimePickerOptions"
                style="display: none;"
                data-wstart="1"
                data-dateformat="DD.MM.YYYY"
                data-format="DD.MM.YYYY HH:mm"
                data-months="January_February_March_April_May_June_July_August_September_October_November_December"
                data-days="Su_Mo_Tu_We_Th_Fr_Sa"
            ></div>
            <div class="tabs-container tabs-reservations m-b-lg">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#order-details" aria-controls="order-details" role="tab" data-toggle="tab" aria-expanded="true">Orders </a></li>
                    <li role="presentation" class=""><a href="#client-details" aria-controls="client-details" role="tab" data-toggle="tab" aria-expanded="false">Clients</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="order-details">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Order ID</label>

                                        <p class="form-control-static">1533803758</p>
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>

                                        <select name="status" id="status" class="form-control required" data-msg-required="This field is required." aria-required="true">
                                            <option value="cancelled">Cancelled</option>
                                            <option value="confirmed" selected="selected">Confirmed</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->

                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Type</label>

                                        <div class="clearfix">
                                            <div class="switch onoffswitch-data pull-left">
                                                <div class="onoffswitch onoffswitch-order">
                                                    <input type="checkbox" class="onoffswitch-checkbox" id="type" name="type" checked="" />
                                                    <label class="onoffswitch-label" for="type">
                                                        <span class="onoffswitch-inner" data-on="Delivery" data-off="Pickup"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.clearfix -->
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group order-delivery" style="display: block;">
                                        <label class="control-label">Delivery date/time</label>

                                        <div class="input-group">
                                            <input
                                                type="text"
                                                id="d_dt"
                                                name="d_dt"
                                                value="08.06.2020 14:30"
                                                class="form-control fdRequired required"
                                                data-wt="open"
                                                data-msg-required="This field is required."
                                                readonly=""
                                                aria-required="true"
                                            />

                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group order-pickup" style="display: none;">
                                        <label class="control-label">Pickup date/time</label>

                                        <div class="input-group">
                                            <input type="text" id="p_dt" name="p_dt" value="" class="form-control fdRequired" data-wt="open" data-msg-required="This field is required." readonly="" />

                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Order is paid</label>

                                        <div class="switch">
                                            <div class="onoffswitch onoffswitch-data">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="is_paid" id="is_paid" checked="" />
                                                <label class="onoffswitch-label" for="is_paid">
                                                    <span class="onoffswitch-inner" data-on="Yes" data-off="Yes"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Payment method</label>

                                        <select name="payment_method" id="payment_method" class="form-control required" data-msg-required="This field is required." aria-required="true">
                                            <option value="">-- Choose--</option>
                                            <optgroup label="Online payments">
                                                <option value="paypal">PayPal</option><option value="authorize">Authorize.NET</option><option value="2checkout">2checkout</option><option value="braintree">Braintree</option>
                                                <option value="mollie">Mollie</option><option value="paypal_express">PayPal Express Checkout</option><option value="skrill">Skrill</option><option value="stripe">Stripe</option>
                                                <option value="world_pay">WorldPay</option>
                                            </optgroup>
                                            <optgroup label="Offline payments"> <option value="bank">Bank account</option><option value="cash" selected="selected">Cash</option> </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->

                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Voucher</label>

                                        <input type="text" name="voucher_code" id="voucher_code" value="" class="form-control" />
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->
                            </div>
                            <!-- /.row -->

                            <div class="hr-line-dashed"></div>

                            <div class="m-b-md">
                                <a href="#" class="btn btn-primary btn-outline m-t-xs" id="btnAddProduct"><i class="fa fa-plus"></i> Add Product</a>
                            </div>

                            <div class="form-group ibox-content">
                                <div class="sk-spinner sk-spinner-double-bounce">
                                    <div class="sk-double-bounce1"></div>
                                    <div class="sk-double-bounce2"></div>
                                </div>
                                <div class="table-responsive table-responsive-secondary">
                                    <table id="fdOrderList" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Size &amp; Price</th>
                                                <th>Qty</th>
                                                <th>
                                                    <div class="p-w-xs">Extra</div>
                                                </th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody class="main-body">
                                            <tr class="fdLine" data-index="a5099093d1f61b0475e4345b33de1df3">
                                                <td>
                                                    <select id="fdProduct_a5099093d1f61b0475e4345b33de1df3" data-index="a5099093d1f61b0475e4345b33de1df3" name="product_id[a5099093d1f61b0475e4345b33de1df3]" class="form-control fdProduct">
                                                        <option value="">-- Choose--</option>
                                                        <option value="5" data-extra="6">Caprichosa pizza</option>
                                                        <option value="11" data-extra="0">Cheesecake</option>
                                                        <option value="8" data-extra="4">Chef's Salad </option>
                                                        <option value="13" data-extra="0">Chocolate souffle</option>
                                                        <option value="18" data-extra="0">Coke</option>
                                                        <option value="15" data-extra="3">Fresh Baked Lasagna</option>
                                                        <option value="19" data-extra="0">Frozen Coke®</option>
                                                        <option value="12" selected="selected" data-extra="0">Homemade cookies</option>
                                                        <option value="10" data-extra="3">Homemade Salad</option>
                                                        <option value="4" data-extra="5">Margherita Pizza</option>
                                                        <option value="1" data-extra="8">Meat, Egg &amp; Cheese</option>
                                                        <option value="3" data-extra="6">Meatball Marinara</option>
                                                        <option value="20" data-extra="0">Orange Juice</option>
                                                        <option value="16" data-extra="4">Pasta with Meat Sauce</option>
                                                        <option value="6" data-extra="6">Quattro di carne </option>
                                                        <option value="7" data-extra="5">Quattro formaggi </option>
                                                        <option value="17" data-extra="3">Ravioli with Alfredo Sauce</option>
                                                        <option value="2" data-extra="7">Roast Beef</option>
                                                        <option value="9" data-extra="3">Splendor Salad</option>
                                                        <option value="14" data-extra="0">Tiramisu</option>
                                                    </select>
                                                </td>
                                                <td id="fdPriceTD_a5099093d1f61b0475e4345b33de1df3">
                                                    <div class="business-a5099093d1f61b0475e4345b33de1df3">
                                                        <span class="fdPriceLabel">$ 3.99</span>
                                                        <input type="hidden" id="fdPrice_a5099093d1f61b0475e4345b33de1df3" data-type="input" name="price_id[a5099093d1f61b0475e4345b33de1df3]" value="3.99" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="business-a5099093d1f61b0475e4345b33de1df3">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                                                            <input
                                                                type="text"
                                                                id="fdProductQty_a5099093d1f61b0475e4345b33de1df3"
                                                                name="cnt[a5099093d1f61b0475e4345b33de1df3]"
                                                                class="form-control pj-field-count"
                                                                value="2"
                                                                style="display: block;"
                                                            />
                                                            <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                                                            <span class="input-group-btn-vertical">
                                                                <button class="btn btn-white bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button>
                                                                <button class="btn btn-white bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="business-a5099093d1f61b0475e4345b33de1df3">
                                                        <table id="fdExtraTable_a5099093d1f61b0475e4345b33de1df3" class="table no-margins pj-extra-table">
                                                            <tbody></tbody>
                                                        </table>
                                                        <div class="p-w-xs" style="display: none;">
                                                            <a
                                                                href="#"
                                                                class="btn btn-primary btn-xs btn-outline pj-add-extra fdExtraBusiness_a5099093d1f61b0475e4345b33de1df3 fdExtraButton_a5099093d1f61b0475e4345b33de1df3"
                                                                data-index="a5099093d1f61b0475e4345b33de1df3"
                                                            >
                                                                <i class="fa fa-plus"></i> Add Extra
                                                            </a>
                                                        </div>
                                                        <!-- /.p-w-xs -->
                                                        <span class="fdExtraBusiness_a5099093d1f61b0475e4345b33de1df3 fdExtraNA_a5099093d1f61b0475e4345b33de1df3" style="display: block;">n/a</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong><span id="fdTotalPrice_a5099093d1f61b0475e4345b33de1df3">$ 7.98</span></strong>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <a href="#" class="btn btn-danger btn-outline btn-sm btn-delete pj-remove-product"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="fdLine" data-index="a26c4a39e63ffc35e7c05a448366dc47">
                                                <td>
                                                    <select id="fdProduct_a26c4a39e63ffc35e7c05a448366dc47" data-index="a26c4a39e63ffc35e7c05a448366dc47" name="product_id[a26c4a39e63ffc35e7c05a448366dc47]" class="form-control fdProduct">
                                                        <option value="">-- Choose--</option>
                                                        <option value="5" data-extra="6">Caprichosa pizza</option>
                                                        <option value="11" data-extra="0">Cheesecake</option>
                                                        <option value="8" data-extra="4">Chef's Salad </option>
                                                        <option value="13" data-extra="0">Chocolate souffle</option>
                                                        <option value="18" data-extra="0">Coke</option>
                                                        <option value="15" data-extra="3">Fresh Baked Lasagna</option>
                                                        <option value="19" data-extra="0">Frozen Coke®</option>
                                                        <option value="12" data-extra="0">Homemade cookies</option>
                                                        <option value="10" data-extra="3">Homemade Salad</option>
                                                        <option value="4" data-extra="5">Margherita Pizza</option>
                                                        <option value="1" data-extra="8">Meat, Egg &amp; Cheese</option>
                                                        <option value="3" data-extra="6">Meatball Marinara</option>
                                                        <option value="20" data-extra="0">Orange Juice</option>
                                                        <option value="16" data-extra="4">Pasta with Meat Sauce</option>
                                                        <option value="6" data-extra="6">Quattro di carne </option>
                                                        <option value="7" data-extra="5">Quattro formaggi </option>
                                                        <option value="17" data-extra="3">Ravioli with Alfredo Sauce</option>
                                                        <option value="2" selected="selected" data-extra="7">Roast Beef</option>
                                                        <option value="9" data-extra="3">Splendor Salad</option>
                                                        <option value="14" data-extra="0">Tiramisu</option>
                                                    </select>
                                                </td>
                                                <td id="fdPriceTD_a26c4a39e63ffc35e7c05a448366dc47">
                                                    <div class="business-a26c4a39e63ffc35e7c05a448366dc47">
                                                        <select id="fdPrice_a26c4a39e63ffc35e7c05a448366dc47" name="price_id[a26c4a39e63ffc35e7c05a448366dc47]" data-type="select" class="fdSize form-control">
                                                            <option value="">-- Choose--</option>
                                                            <option value="6" data-price="4.99">small: $ 4.99</option>
                                                            <option value="7" selected="selected" data-price="7.99">large: $ 7.99</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="business-a26c4a39e63ffc35e7c05a448366dc47">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                                                            <input
                                                                type="text"
                                                                id="fdProductQty_a26c4a39e63ffc35e7c05a448366dc47"
                                                                name="cnt[a26c4a39e63ffc35e7c05a448366dc47]"
                                                                class="form-control pj-field-count"
                                                                value="1"
                                                                style="display: block;"
                                                            />
                                                            <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                                                            <span class="input-group-btn-vertical">
                                                                <button class="btn btn-white bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button>
                                                                <button class="btn btn-white bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="business-a26c4a39e63ffc35e7c05a448366dc47">
                                                        <table id="fdExtraTable_a26c4a39e63ffc35e7c05a448366dc47" class="table no-margins pj-extra-table">
                                                            <tbody></tbody>
                                                        </table>
                                                        <div class="p-w-xs" style="display: block;">
                                                            <a
                                                                href="#"
                                                                class="btn btn-primary btn-xs btn-outline pj-add-extra fdExtraBusiness_a26c4a39e63ffc35e7c05a448366dc47 fdExtraButton_a26c4a39e63ffc35e7c05a448366dc47"
                                                                data-index="a26c4a39e63ffc35e7c05a448366dc47"
                                                            >
                                                                <i class="fa fa-plus"></i> Add Extra
                                                            </a>
                                                        </div>
                                                        <!-- /.p-w-xs -->
                                                        <span class="fdExtraBusiness_a26c4a39e63ffc35e7c05a448366dc47 fdExtraNA_a26c4a39e63ffc35e7c05a448366dc47" style="display: none;">n/a</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong><span id="fdTotalPrice_a26c4a39e63ffc35e7c05a448366dc47">$ 7.99</span></strong>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <a href="#" class="btn btn-danger btn-outline btn-sm btn-delete pj-remove-product"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="fdLine" data-index="bc87ae4ecfdbc85a65b450f38db0ce25">
                                                <td>
                                                    <select id="fdProduct_bc87ae4ecfdbc85a65b450f38db0ce25" data-index="bc87ae4ecfdbc85a65b450f38db0ce25" name="product_id[bc87ae4ecfdbc85a65b450f38db0ce25]" class="form-control fdProduct">
                                                        <option value="">-- Choose--</option>
                                                        <option value="5" data-extra="6">Caprichosa pizza</option>
                                                        <option value="11" data-extra="0">Cheesecake</option>
                                                        <option value="8" data-extra="4">Chef's Salad </option>
                                                        <option value="13" data-extra="0">Chocolate souffle</option>
                                                        <option value="18" data-extra="0">Coke</option>
                                                        <option value="15" data-extra="3">Fresh Baked Lasagna</option>
                                                        <option value="19" data-extra="0">Frozen Coke®</option>
                                                        <option value="12" data-extra="0">Homemade cookies</option>
                                                        <option value="10" data-extra="3">Homemade Salad</option>
                                                        <option value="4" data-extra="5">Margherita Pizza</option>
                                                        <option value="1" data-extra="8">Meat, Egg &amp; Cheese</option>
                                                        <option value="3" data-extra="6">Meatball Marinara</option>
                                                        <option value="20" data-extra="0">Orange Juice</option>
                                                        <option value="16" data-extra="4">Pasta with Meat Sauce</option>
                                                        <option value="6" data-extra="6">Quattro di carne </option>
                                                        <option value="7" data-extra="5">Quattro formaggi </option>
                                                        <option value="17" data-extra="3">Ravioli with Alfredo Sauce</option>
                                                        <option value="2" data-extra="7">Roast Beef</option>
                                                        <option value="9" data-extra="3">Splendor Salad</option>
                                                        <option value="14" selected="selected" data-extra="0">Tiramisu</option>
                                                    </select>
                                                </td>
                                                <td id="fdPriceTD_bc87ae4ecfdbc85a65b450f38db0ce25">
                                                    <div class="business-bc87ae4ecfdbc85a65b450f38db0ce25">
                                                        <span class="fdPriceLabel">$ 8.50</span>
                                                        <input type="hidden" id="fdPrice_bc87ae4ecfdbc85a65b450f38db0ce25" data-type="input" name="price_id[bc87ae4ecfdbc85a65b450f38db0ce25]" value="8.50" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="business-bc87ae4ecfdbc85a65b450f38db0ce25">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                                                            <input
                                                                type="text"
                                                                id="fdProductQty_bc87ae4ecfdbc85a65b450f38db0ce25"
                                                                name="cnt[bc87ae4ecfdbc85a65b450f38db0ce25]"
                                                                class="form-control pj-field-count"
                                                                value="2"
                                                                style="display: block;"
                                                            />
                                                            <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                                                            <span class="input-group-btn-vertical">
                                                                <button class="btn btn-white bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button>
                                                                <button class="btn btn-white bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="business-bc87ae4ecfdbc85a65b450f38db0ce25">
                                                        <table id="fdExtraTable_bc87ae4ecfdbc85a65b450f38db0ce25" class="table no-margins pj-extra-table">
                                                            <tbody></tbody>
                                                        </table>
                                                        <div class="p-w-xs" style="display: none;">
                                                            <a
                                                                href="#"
                                                                class="btn btn-primary btn-xs btn-outline pj-add-extra fdExtraBusiness_bc87ae4ecfdbc85a65b450f38db0ce25 fdExtraButton_bc87ae4ecfdbc85a65b450f38db0ce25"
                                                                data-index="bc87ae4ecfdbc85a65b450f38db0ce25"
                                                            >
                                                                <i class="fa fa-plus"></i> Add Extra
                                                            </a>
                                                        </div>
                                                        <!-- /.p-w-xs -->
                                                        <span class="fdExtraBusiness_bc87ae4ecfdbc85a65b450f38db0ce25 fdExtraNA_bc87ae4ecfdbc85a65b450f38db0ce25" style="display: block;">n/a</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong><span id="fdTotalPrice_bc87ae4ecfdbc85a65b450f38db0ce25">$ 17.00</span></strong>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <a href="#" class="btn btn-danger btn-outline btn-sm btn-delete pj-remove-product"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="clearfix">
                                <button type="submit" class="ladda-button btn btn-primary btn-lg btn-phpjabbers-loader pull-left" data-style="zoom-in" style="margin-right: 15px;">
                                    <span class="ladda-label">Save</span>
                                    <strong class="phpjabbers-loader ladda-spinner">
                                        <span class="load-1"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-1,3-4.png" alt="" /></span>
                                        <span class="load-2"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-2-4.png" alt="" /></span>
                                        <span class="load-3"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-1,3-4.png" alt="" /></span>
                                        <span class="load-4"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-4-4.png" alt="" /></span>
                                    </strong>
                                </button>
                                <a class="btn btn-white btn-lg pull-right" href="https://demo.phpjabbers.com/1591628910_794/index.php?controller=pjAdminOrders&amp;action=pjActionIndex">Cancel</a>
                            </div>
                            <!-- /.clearfix -->
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="client-details">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Client</label>

                                <div class="clearfix">
                                    <div class="switch onoffswitch-data pull-left">
                                        <div class="onoffswitch onoffswitch-client">
                                            <input type="checkbox" class="onoffswitch-checkbox" id="new_client" name="new_client" />

                                            <label class="onoffswitch-label" for="new_client">
                                                <span class="onoffswitch-inner" data-on="New client" data-off="Existing client"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.clearfix -->
                            </div>
                            <!-- /.form-group -->

                            <div class="current-client-area">
                                <div class="form-group">
                                    <label class="control-label">Existing client</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <select name="client_id" id="client_id" class="form-control fdRequired" data-msg-required="This field is required." style="display: none;">
                                                <option value="">-- Choose--</option>
                                                <option value="2">Martina Gay (cumetimibu@yahoo.com | +528-50-7913056)</option>
                                                <option value="4" selected="selected">Miriam Shaffer (xyjym@yahoo.com | +965-91-2984242)</option>
                                                <option value="1">Rudyard Rasmussen (dodyho@yahoo.com | +121-85-2819565)</option>
                                                <option value="3">Tatiana Dickerson (remixejuqe@yahoo.com | +417-57-3036185)</option>
                                            </select>
                                            <div class="chosen-container chosen-container-single" style="width: 0px;" title="" id="client_id_chosen">
                                                <a class="chosen-single" tabindex="-1">
                                                    <span>Miriam Shaffer (xyjym@yahoo.com | +965-91-2984242)</span>
                                                    <div><b></b></div>
                                                </a>
                                                <div class="chosen-drop">
                                                    <div class="chosen-search"><input type="text" autocomplete="off" /></div>
                                                    <ul class="chosen-results"></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a
                                                id="pjFdEditClient"
                                                class="btn btn-primary btn-outline btn-sm m-l-xs"
                                                href="/1591628910_794/index.php?controller=pjAdminClients&amp;action=pjActionUpdate&amp;id=4"
                                                target="blank"
                                                data-href="/1591628910_794/index.php?controller=pjAdminClients&amp;action=pjActionUpdate&amp;id={ID}"
                                                style="display: inline-block;"
                                            >
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.hidden-area -->

                            <div class="new-client-area" style="display: none;">
                                <div class="hr-line-dashed"></div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>

                                            <select id="c_title" name="c_title" class="form-control fdRequired" data-msg-required="This field is required.">
                                                <option value="">----</option>
                                                <option value="mr">Mr.</option>
                                                <option value="mrs">Mrs.</option>
                                                <option value="ms">Ms.</option>
                                                <option value="dr">Dr.</option>
                                                <option value="prof">Prof.</option>
                                                <option value="rev">Rev.</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>

                                            <input type="text" name="c_name" id="c_name" class="form-control fdRequired" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>

                                            <input type="text" name="c_email" id="c_email" class="form-control email fdRequired" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Password</label>

                                            <input type="text" name="c_password" id="c_password" class="form-control fdRequired" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>

                                            <input type="text" name="c_phone" id="c_phone" class="form-control fdRequired" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.new-client-area -->
                            <div class="hr-line-dashed"></div>
                            <div class="order-pickup" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label">Location</label>

                                    <select name="p_location_id" id="p_location_id" class="form-control fdRequired" data-msg-required="This field is required.">
                                        <option value="">-- Choose--</option>
                                        <option value="1">5th avenue</option>
                                        <option value="2" selected="selected">Brooklyn, Atlantic Ave</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Special instructions</label>
                                    <textarea name="p_notes" id="p_notes" class="form-control form-control-sm" data-msg-required="This field is required."></textarea>
                                </div>

                                <div class="hr-line-dashed"></div>
                            </div>
                            <!-- /.pickup -->
                            <div class="order-delivery" style="display: block;">
                                <div class="form-group">
                                    <label class="control-label">Location</label>

                                    <select name="d_location_id" id="d_location_id" class="form-control fdRequired required" data-msg-required="This field is required." aria-required="true">
                                        <option value="">-- Choose--</option>
                                        <option value="1">5th avenue</option>
                                        <option value="2" selected="selected">Brooklyn, Atlantic Ave</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Address 1</label>

                                            <input type="text" name="d_address_1" id="d_address_1" value="5310 Emerald Row" class="form-control fdRequired" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Address 2</label>

                                            <input type="text" name="d_address_2" id="d_address_2" value="2358 Round View Glen" class="form-control" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">City</label>

                                            <input type="text" name="d_city" id="d_city" value="Sugar Loaf Chase" class="form-control fdRequired" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Zip</label>

                                            <input type="text" name="d_zip" id="d_zip" value="94837" class="form-control fdRequired" data-msg-required="This field is required." />
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Special instructions</label>

                                            <textarea name="d_notes" id="d_notes" class="form-control" data-msg-required="This field is required.">
Commodi nisi sapiente iusto pariatur Explicabo Vitae quibusdam aute fuga Reprehenderit
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.delivery -->
                            <div class="clearfix">
                                <button type="submit" class="ladda-button btn btn-primary btn-lg btn-phpjabbers-loader pull-left" data-style="zoom-in" style="margin-right: 15px;">
                                    <span class="ladda-label">Save</span>
                                    <strong class="phpjabbers-loader ladda-spinner">
                                        <span class="load-1"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-1,3-4.png" alt="" /></span>
                                        <span class="load-2"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-2-4.png" alt="" /></span>
                                        <span class="load-3"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-1,3-4.png" alt="" /></span>
                                        <span class="load-4"><img src="https://demo.phpjabbers.com/1591628910_794/plugins/pjBase/web/img/phpjabbers-logo-4-4.png" alt="" /></span>
                                    </strong>
                                </button>
                                <a class="btn btn-white btn-lg pull-right" href="https://demo.phpjabbers.com/1591628910_794/index.php?controller=pjAdminOrders&amp;action=pjActionIndex">Cancel</a>
                            </div>
                            <!-- /.clearfix -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.col-lg-8 -->

    <div class="col-lg-3">
        <div class="m-b-lg">
            <div id="pjFdPriceWrapper" class="panel no-borders ibox-content">
                <div class="sk-spinner sk-spinner-double-bounce">
                    <div class="sk-double-bounce1"></div>
                    <div class="sk-double-bounce2"></div>
                </div>
                <div class="panel-heading bg-confirmed">
                    <p class="lead m-n"><i class="fa fa-check"></i> Status: <span class="pull-right status-text">Confirmed</span></p>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <p class="lead m-b-xs">
                        <span>
                            <a href="#" id="btnEmail" data-id="4" class="btn btn-primary btn-md btn-block btn-outline"><i class="fa fa-bell-o"></i> Re-send confirmation email</a>
                        </span>
                    </p>
                    <p class="lead m-b-xs text-right">
                        <span>
                            <a
                                href="/1591628910_794/index.php?controller=pjAdminOrders&amp;action=pjActionPrintOrder&amp;id=4&amp;hash=daaddd80079b20896d13728053c775b60d17065b"
                                class="btn btn-primary btn-block btn-md btn-outline"
                                target="_blank"
                            >
                                <i class="fa fa-print"></i> Print Order Details
                            </a>
                        </span>
                    </p>
                    <div class="hr-line-dashed"></div>

                    <p class="lead m-b-md">Price: <span id="price_format" class="pull-right">$ 32.97</span></p>
                    <p class="lead m-b-md">Packing fee: <span id="packing_format" class="pull-right">$ 0.00</span></p>
                    <p class="lead m-b-md">Delivery: <span id="delivery_format" class="pull-right">$ 0.00</span></p>
                    <p class="lead m-b-md">Discount: <span id="discount_format" class="pull-right text-right">$ 0.00</span></p>
                    <p class="lead m-b-md">Sub-total: <span id="subtotal_format" class="pull-right text-right">$ 32.97</span></p>
                    <p class="lead m-b-md">Tax: <span id="tax_format" class="pull-right text-right">$ 3.30</span></p>

                    <div class="hr-line-dashed"></div>

                    <h3 class="lead m-b-md">Total: <strong id="total_format" class="pull-right text-right">$ 36.27</strong></h3>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.m-b-lg -->
    </div>
    <!-- /.col-lg-4 -->
</div>

						
						<input type="hidden" name="prodid" value="<?=$row['id']?>" />
						<input type="hidden" name="act" value="<?=$act?>" />
						<input type="hidden" name="cityid" value="<?=$row['cityid']?>" />
						<input type="hidden" name="image3" value="<?=$row['picture']?>" />
						<input name="gallery" type="hidden" value="hotal"/>  
						<input type="hidden" name="extraoption1" id="extraoption1" value="" />
						<input type="hidden" name="extraoption2" id="extraoption2" value="" />
            <div class="tab-content">

                <div class="tab-pane active" id="home">

                    <div class="add_produ">

                         <!-- RECENT ACTIVITY -->

                                <div class="block block-condensed">

                                     <div class="app-heading app-heading-small">                                

                                        <div class="title">

                                            <h2>Basic Information</h2>

                                          

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                         

                                                
<div class="row" >	

									<div class="form-group col-md-6"  >
                                        <label class=" control-label" for="name"> Recipe Name:</label>
                                        <div >
                                        <input name="title" type="text" class="form-control" value="<?=$row['recipe_name']?>" requirment/>  
                                        </div>
                                    </div>
									 
									<div class="form-group col-md-6">
                                        <label class="col-md-2 control-label" for="name"> Restaurant<span class="required">*</span></label>
                                        <div class="col-md-10">
							<?php 
                             
							$sql="SELECT * FROM resturant_detail";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="resturant_id" id="resturant_id"  class="form-control" required>
						 <option value="0">Select  Restaurant</option>
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" <?php if($row2['id'] == $row['resturant_id']){ echo 'selected'; } ?>><?=$row2['title']?></option>
                  <?php }?>
				   </select>
                                        </div>
                                    </div>
                                                        
                                                    </div>
<br>
<div class="row">
													<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Category Type<span class="required">*</span></label>
                                        <div class="col-md-10">
							<?php 
                             
							$sql="SELECT * FROM recipe_categories";
							$db->query($sql)or die($db->error()); ?>

						 <select  name="recipe_category_id" id="recipe_category_id"  class="form-control" required>
						 <option value="0">Select  Type</option>
						 <?php	//echo $row['catid'];
						while($row2=$db->fetchArray()){
					
						
						?>		
                        <option value="<?=$row2['id']?>" <?php if($row2['id'] == $row['recipe_category_id']){ echo 'selected'; } ?>><?=$row2['catname']?></option>
                  <?php }?>
				   </select>
                                        </div>
                                    </div>
                                                        
                                                    </div>
	
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Delivery Avg Time :</label>
                                        <div class="col-md-10">
                                         <input name="delivery_avg_time" type="text" class="form-control" value="<?=$row['delivery_avg_time']?>"/>
                                        </div>
                                    </div>
									</div>
									
									
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Price :</label>
                                        <div class="col-md-10">
                                         <input name="price" type="text" class="form-control" value="<?=$row['price']?>"/>
                                        </div>
                                    </div>
									</div>
									
									
									
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Size :</label>
                                        <div class="col-md-10">
                                         <input name="size" type="text" class="form-control" value="<?=$row['size']?>"/>
                                        </div>
                                    </div>
									</div>
									
									
										<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Shipping Charges :</label>
                                        <div class="col-md-10">
                                         <input name="shipping_charges" type="text" class="form-control" value="<?=$row['shipping_charges']?>"/>
                                        </div>
                                    </div>
									</div>
									<!--
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Shipping Charges :</label>
                                        <div class="col-md-10">
                                         <input name="shipping_charges" type="text" class="form-control" value="<?=$row['shipping_charges']?>"/>
                                        </div>
                                    </div>
									</div>-->
									
									<div class="row" >
									<div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Tax class :</label>
                                        <div class="col-md-10">
                                         <input name="tax_class" type="text" class="form-control" value="<?=$row['tax_class']?>"/>
                                        </div>
                                    </div>
									</div>
					 
									
								
								   	<div class="row" >
								 <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Star Rating:(0-5):</label>
                                        <div class="col-md-10">
                        <select id="star" name="star" class="form-control" >
                        <option value='0' <?php if($row['stars'] == 0){ echo 'selected'; } ?>>Select Rating</option>
						<option value='1' <?php if($row['stars'] == 1){ echo 'selected'; } ?>>1 Star Rating</option>
						<option value='2' <?php if($row['stars'] == 2){ echo 'selected'; } ?>>2 Star Rating</option>
						<option value='3' <?php if($row['stars'] == 3){ echo 'selected'; } ?>>3 Star Rating</option>
						<option value='4' <?php if($row['stars'] == 4){ echo 'selected'; } ?>>4 Star Rating</option>
						<option value='5' <?php if($row['stars'] == 5){ echo 'selected'; } ?>>5 Star Rating</option>
						 </select>
                                        </div>
                                    </div>
								</div>
								
								
								<!--
									<div class="row" >
							   <div class="form-group">
                                        <label class="col-md-2 control-label" for="sortdetail"> Sort Details</label>
                                        <div class="col-md-10">
                                      <textarea name="sortdetail" cols="50" rows="5" class="editor-base" ><?=$row['sortdetail']?></textarea>
                                        </div>
                                    </div>
							   </div>-->
							   <div class="row" >
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name"> Description</label>
                                        <div class="col-md-10">
                                      <textarea name="prod_desc" cols="50" rows="5" class="editor-base" ><?=$row['description']?></textarea>
                                        </div>
                                    </div>
												
                      </div>


<div class="row">
<div class="form-group">
        									<label class="col-md-2 control-label"> Image</label>
        									<div class="col-md-10">
                                                <input type="file" name="largeimage" id="largeimage"><span style="color:#FF0000;">(jpg, gif, png)</span>  <?php if($row['image']){?><a href="javascript:void(0)" onclick="javascript:window.open('../resviewaimage.php?img=<?=$row['image']?>','imgid','height=510,width=660,toolbars=no,left=150,top=200');">View Image</a><?php }?>
        									 
        									</div>
        								</div>
</div>  
  <div class="row">
  <div class="form-group">
        									<label class="col-md-2 control-label"> Multiple Image:</label>
        									<div class="col-md-10">
                                                  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><span style="color:#FF0000;">(jpg, gif, png)</span> 
        									 
        									</div>
        								</div>
  </div>
                                         <div class="row">
										 	<div class="form-group">
                									<label class="col-md-2 control-label"> Status</label>
                									<div class="col-md-10">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="pstatus" type="radio" value="1"<?php if($row['Status']=="1"){echo " checked";}?>/>Active
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="pstatus" type="radio" value="0"<?php if($row['Status']=="0"){echo " checked";}?>/>Deactive
                    										</label>
                    									</div>
														</div> </div></div>

 <div class="row">
										 	<div class="form-group">
                									<label class="col-md-2 control-label"> Featured</label>
                									<div class="col-md-10">
                                                       
                    								
                    									<div class="radio">
                    										<label>
                    												<input name="featured" type="radio" value="1"<?php if($row['featured']=="1"){echo " checked";}?>/>Yes
						
                    										</label>
                    									</div>
                    									<div class="radio">
                    										<label>
                    											<input name="featured" type="radio" value="0"<?php if($row['featured']=="0"){echo " checked";}?>/>No
                    										</label>
                    									</div>
														</div> </div></div>

 <div class="row">
<div class="form-group">
<label class="col-md-2 control-label"></label>
<div class="col-md-10">                								
 <tr>
<td ></td>                                                
 <?php	if($act=="edit")
	{

		 $sql2="SELECT * FROM $_TBL_ITEMIMAGE WHERE item_id=".$_REQUEST['id'];
		$db2->query($sql2)or die($db2->error());
			
	
	}?>   
    <?php if($db2->numRows()>0)	
	{
		$inum=0;		
		while($imagerow=$db2->fetchArray()){
			
			if($inum>3){				
			echo $newtr='</tr><tr><td>';
			$inum=0;
			}else{$newtr='<td>';}
		
?>
 <?=$newtr?><span id='<?=$imagerow['id']?>'><img src="<?=$_SITE_PATH?>upload/<?=$imagerow['image']?>" style="width:100px; height:100px;" /><a href="javascript:void(0)" id="submit1" atr="<?=$imagerow['id']?>" onClick="deleteFile('<?=$imagerow['id']?>');">Delete</a></span></td>
  
<?php $inum=($inum+1); }
 
 } 
 
?>
	

</td>
</tr>	                                     	
</div>                                      
</div>



   </div>

                                <!-- END RECENT -->

<p></p>

                    </div>

                </div>
<p></p>
             

            </div>



             <div class="block ">                            

                             

                            <p class="text-right">

                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>

                                <!--<button class="btn btn-success btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button>-->

<input name="Submit" type="submit" class="btn btn-success btn-icon-fixed" value="Save"  />
                               

                            </p>

                             

                        </div>

</form>

        </div>



       



        <div class="clearfix"></div>

    </div>                 

</div>



                        

                    </div> <!-- END PAGE CONTAINER -->

    </div> 
<!--<script type="text/javascript" src="https://orangestate.ng/js/sweetalert2@8.js"></script>                  
-->
<script>
jQuery(document).on("change","#country",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajstate.php';
        var dataString ="cid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showstate').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#state",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajcity.php';
        var dataString ="sid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showcity').html(response);
                }else{
                
                }
            },
        });
});

jQuery(document).on("change","#cityname1",function(){
var str=$(this).val();
	var social_AjaxURL='//orangestate.ng/admin/pages/ajhotel.php';
        var dataString ="hid=" + str ;
        $.ajax({
            url: social_AjaxURL,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                   $('#showhotel').html(response);
                }else{
                
                }
            },
        });
});

</script>

	<script>

function showUser(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHint").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
	
    }
  }
  
xmlhttp.open("GET","pages/ajcity.php?q="+str,true);
xmlhttp.send();
}
}



function showhotel(str)
{
	
if (str=="0")
  {
  document.getElementById("txtHinthotel").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
		
    document.getElementById("txtHinthotel").innerHTML=xmlhttp1.responseText;
	
	
    }
  }
  
xmlhttp1.open("GET","pages/ajhotel.php?q="+str,true);
xmlhttp1.send();
}
}

</script>														  
<script language="javascript">
function getCheckedCheckboxesFor(checkboxName) {
    var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
		
		$('#emplist').val(values);
    });
    return values;
}
	</script>
	
	
	
	<script language="javascript">
function getCheckedCheckboxesFor1(checkboxName) {
    var checkboxes1 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes1, function(el1) {
        values.push(el1.value);
		
		$('#emplist1').val(values);
    });
    return values;
}
	</script>
	
	
	<script language="javascript">
function getCheckedCheckboxesFor2(checkboxName) {
    var checkboxes2 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes2, function(el2) {
        values.push(el2.value);
		
		$('#emplist2').val(values);
    });
	
    return values;
}
	</script>
	
	
		<script language="javascript">
function getCheckedCheckboxesFor3(checkboxName) {
    var checkboxes3 = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes3, function(el3) {
        values.push(el3.value);
		
		$('#emplist3').val(values);
    });
    return values;
}


function deleteFile(id)
{
	var aurl="//orangestate.ng/admin/pages/delete-filehotels.php";
	 var dataString ="imageid=" + id ;
        $.ajax({
            url: aurl,
            async: true,
            cache: false,
			type: 'POST',
			data: dataString,
            success: function(response){
            
                if(response != 0){
                  $("#"+id).hide();	
                }else{
                
                }
            },
        });

}
	</script>


<?php include("footer.php") ?>

	