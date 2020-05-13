<?php include( 'header.php'); include( 'chksession.php');
$makearr=array();
$makearr=getValuesArr( "countries", "countries_name","countries_name","", "" );
////////////////////
if(!empty($_REQUEST['billing_firstname'])){
$billing_firstname=$_REQUEST['billing_firstname'];
$billing_lastname=$_REQUEST['lastName'];
$billing_email=$_REQUEST['email'];
$billing_phone=$_REQUEST['phone'];
$billing_adress=$_REQUEST['address'];
$billing_adress1=$_REQUEST['address2'];
$billing_state=$_REQUEST['state'];
$billing_city=$_REQUEST['city'];
$billing_zip=$_REQUEST['zip'];
//$username=$_REQUEST['username'];	
$discount=$_REQUEST['discount'];	
	$billupdatearr=array(
						"userid"=>$_SESSION['sess_webid'],
						"billing_firstname"=>$billing_firstname,
						"billing_lastname"=>$billing_lastname,
						"billing_email"=>$billing_email,
						"billing_phone"=>$billing_phone,
						"billing_adress"=>$billing_adress,
						"billing_adress1"=>$billing_adress1,
						"billing_state"=>$billing_state,
						"billing_city"=>$billing_city,
						"billing_zip"=>$billing_zip,
						"discount"=>$discount,
						"billdate"=>date('Y-m-d h:i:s')																	
				);	
				//print_r($billupdatearr);die;

	$whereClause1=" userid=".$_SESSION['sess_webid'];
	

if(matchExists($_TBL_BILL, $whereClause1))
       {	
   $bid=$db->getSingleResult("SELECT id from $_TBL_BILL where userid=".$_SESSION['sess_webid']);
		   $_SESSION['billid']=$bid;
			updateData($billupdatearr, $_TBL_BILL, $whereClause1);
			
			if($_POST['pm']=='cod'){ redirect("order-sucessful.php?c=D4KFGXsdfsdf46&pm=cod"); }else{
		redirect("payment.php");
		}
			
		}else{

		$insid1=insertData($billupdatearr, $_TBL_BILL);
		//redirect("pay.php");
		$_SESSION['billid']=$insid1;
		
		if($insid1>0)
		{
		if($_POST['pm']=='cod'){ redirect("order-sucessful.php?c=D4KFGXsdfsdf46&pm=cod"); }else{
		redirect("payment.php");
		}
		}
}
}
$dbu=new DB();
 $u="select * from ".$_TBL_BILL." where userid=".$_SESSION['sess_webid'];
  $dbu->query($u);
  $dbu->numRows(); 
  $bill_row=$dbu->fetchArray();
  
  $us="select * from ".$_TBL_USER." where user_id=".$_SESSION['sess_webid'];
  $dbu->query($us);
  $dbu->numRows(); 
  $user_row=$dbu->fetchArray();
  //////////////////////////
  $order_row=$db->getSingleResult("select orderid from ".$_TBL_ORDER." where userid='".$_SESSION['sess_webid']."'");
  
  //////////////////////////

 ?>
 
<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					 <div class="col-lg-12">

					 	<div class="breadcrumb flat">
				        	<a href="../" >Home</a>
				        	<a href="">Shop</a>
                  <a href="">Checkout</a>     
				        	<a href="javascript:;" class="active">Billing</a>

				        </div>
          
          <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <div class="card">
            <div class="card-header mb-3">
              <h4 class="card-title">Your cart (<?php 
												echo $iemcount=$db->getSingleResult("SELECT count(*) from $_TBL_TEMPORDER where sessionid='".session_id()."'");
												?>)</h4>
            </div>
            <div class="card-content">
              <ul class="list-group mb-3 checkoutlist-rpdoct">
               <?php $grand_total=0;
			   $shipn=0;
$ct=1;
$dbt=new DB;
$sqlt="select * from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'";
$dbt->query($sqlt);
if($dbt->numRows()>0)
	{
		
		while($rowt=$dbt->fetchArray()){
			$ppid=$rowt['prodid'];
		 
		
		  $path2=$rowt['prod_image'];
		   $shippingcharge=$rowt['shippingcharge'];
		   $tax_amt=$rowt['tax_amt'];
          if(!empty($path2)){
            $path1=$path2;
          }else{
         $path1='noimage.jpg'; 
        }
		
			
			?>

			   <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0"><?php if(!empty($rowt['product_name'])){
		echo $rowt['product_name']; } ?></h6>
                    <small class="text-muted"><?php if(!empty($rowt['sort_detail'])){
		echo $rowt['sort_detail']; } ?></small>
                  </div>
				  <span class="text-muted"><?php if(!empty($rowt['quantity'])){
		echo $rowt['quantity']; } ?></span>
                  <span class="text-muted">₦<?php if(!empty($rowt['cost'])){
		echo number_format($rowt['cost'],2,'.',','); } ?></span>
                </li>
                             
	<?php
$ct++; 
$discount=$rowt['discount'];
$shipn=$shipn+$shippingcharge;
	   //echo $sub_total+=$rowt['cost'];
	    $discountamt=$discountamt+$discount;
	   $grand_total=$grand_total+$rowt['prod_total'];
	       $totaltax_amt=$totaltax_amt+$tax_amt;
	//$_SESSION['sess_total']=$grand_total+$totalvat;

	}} ?>   

 <li class="list-group-item d-flex justify-content-between border-top1px">
                  <span class="product-name">Grass Total</span>
                  <span class="product-price">₦<?=number_format($grand_total,2,'.',',')?></span>
                </li>
				
				
				 <li class="list-group-item d-flex justify-content-between border-top1px">
                  <span class="product-name">Discount</span>
                  <span class="product-price">-₦<?=number_format($discountamt,2,'.',',')?></span>
                </li>

	<li class="list-group-item d-flex justify-content-between border-top1px">
                  <span class="product-name">Shipping &amp; Handling</span>
                  <span class="product-price">₦<?=number_format($shipn,2,'.',',')?></span>
                </li>
                
                <li class="list-group-item d-flex justify-content-between ">
                  <span class="product-name">TAX / VAT</span>
                  <span class="product-price">₦<?=number_format($totaltax_amt,2,'.',',')?></span>
                </li>
				<?php 
				if(empty($order_row)){
					$famt=$_SESSION['sess_total'];
					$discount=($famt-$famt*50/100);
					$finalamoun=($famt-$famt*50/100);
					$_SESSION['finalamoun']=$finalamoun;
				}else{
					$finalamoun=$_SESSION['sess_total'];
					$_SESSION['finalamoun']=$finalamoun;
				}
				?>
                <li class="list-group-item d-flex justify-content-between">
                  <span class="product-name success bold finalprice">Order Total</span>
                  <span class="product-price bold finalprice">₦<?=number_format($finalamoun,2,'.',',')?></span>
                </li>
				 <li class="list-group-item d-flex justify-content-between">
				 <?php  if(empty($order_row)){ ?>
                  <span class="product-name success bold finalprice">Get First Time User Additional 50% Discount &nbsp;</span>
				   <span class="product-price bold finalprice">₦<?=number_format($finalamoun,2,'.',',')?></span>
				 <?php }?>
                 
                </li>
               
              
              </ul>
            </div>
          </div>

           
        </div>
        <div class="col-md-8 order-md-1">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Billing address</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="needs-validation" novalidate="" action="" method="post">
				<input type="hidden" name="discount" value="<?=$discount?>" />
                  <div class="row">
				  <?php if(!empty($bill_row['billing_firstname'])){
					  $fname=$bill_row['billing_firstname'];
				  }else{
					   $fname=$user_row['first_name'];
				  } ?>
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="billing_firstname" placeholder="First name" name="billing_firstname" value="<?= $fname?>" required="required">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
					<?php if(!empty($bill_row['billing_lastname'])){
					  $lname=$bill_row['billing_lastname'];
				  }else{
					   $lname=$user_row['last_name'];
				  } ?>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="lastName" value="<?=$lname?>" required="required" name="lastName">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>

                 <!-- <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" value="<?=$bill_row['username']?>" required="required">
                      <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                      </div>
                    </div>
                  </div>-->
<?php if(!empty($bill_row['billing_email'])){
	
					  $em=$bill_row['billing_email'];
				  }else{
					 
					   $em=$user_row['email_id'];
				  } ?>
                  <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?=$em?>" required="required">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
<?php if(!empty($bill_row['billing_adress'])){
					  $lname=$bill_row['billing_adress'];
				  }else{
					   $lname=$user_row['address'];
				  } ?>
                  <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="required" value="<?=$bill_row['billing_adress']?>">
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="<?=$bill_row['billing_adress1']?>">
                  </div>

                  <div class="row">
                    <div class="col-md-5 mb-3">
                      <label for="country">Country</label>
					  <?php echo createComboBox($makearr,"country", "","class='custom-select d-block w-100'")?>
                     
                      <div class="invalid-feedback">
                        Please select a valid country.
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="state">State</label>
					   <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?=$bill_row['billing_state']?>">
                     <!-- <select class="custom-select d-block w-100" id="state"  name="state" required="">
                        <option value="">Choose...</option>
                        <option value="California" >California</option>
                      </select>-->
                      <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="zip">Zip</label>
                      <input type="text" class="form-control" id="zip" name="zip" placeholder="" required="" value="<?=$bill_row['billing_zip']?>">
                      <div class="invalid-feedback">
                        Zip code required.
                      </div>
                    </div>
					
					<div class="col-md-3 mb-3">
                      <label for="phone">Mobile NO</label>
                      <input type="number" class="form-control" name="phone" id="phone" placeholder="" required="" value="<?=$bill_row['billing_phone']?>">
                      <div class="invalid-feedback">
                        Phone Number required.
                      </div>
                    </div>
					<div class="col-md-3 mb-3">
					<label for="online">Payment Mode</label><br>
					<input type="radio" id="cod" name="pm" value="cod" required>
					<label for="cod">COD</label>
					<input type="radio" id="online" name="pm" value="online" required>
					<label for="online">ONLINE</label><br>
									   
                 
				  </div>
				  
                  </div>
                  <hr class="mb-2">
				
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address" checked="">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info" checked="">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                  </div>
                  <hr class="mt-2 mb-4">

                    
                  <button class="btn btn-info btn-lg finalbuton" type="submit">Continue to checkout</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



    <!-- card.// -->
					 </div>
				</div>
			</div>
			<!-- main-section-data end-->
		</div>
	</div>
</main>
 



<script src="lib/js/config.js"></script>
<script src="lib/js/util.js"></script>
<script src="lib/js/jquery.emojiarea.js"></script>
<script src="lib/js/emoji-picker.js"></script>
<script>
	$(function() {
	            // Initializes and creates emoji set from sprite sheet
	            window.emojiPicker = new EmojiPicker({
	                emojiable_selector: '[data-emojiable=true]',
	                assetsPath: 'lib/img/',
	                popupButtonClasses: 'fa fa-smile-o'
	            });
	            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
	            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
	            // It can be called as many times as necessary; previously converted input fields will not be converted again
	            window.emojiPicker.discover();
	        });
</script>
<?php include( 'footer.php') ?>
<script>
	function preview_image() {
	                var total_file = document.getElementById("upload_file").files.length;
	                for (var i = 0; i < total_file; i++) {
	
	                    $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
	                }
	            }
	
	            //video player
</script>
<script type="text/javascript">
	
	document.documentElement.setAttribute("lang", "en");
document.documentElement.removeAttribute("class");

axe.run( function(err, results) {
  console.log( results.violations );
} );
</script>
 