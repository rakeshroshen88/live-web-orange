<?php include( 'header.php'); include( 'chksession.php'); ?>
 
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
         
         <div   id="comp-order-ta " class="myoder" aria-labelledby="complete-order">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-center oderconfirm">Thank you. Your order has been processed.</h4>
        </div>
      </div>
	  
	  <?php
include("chksession.php");

@defined('IN_CALLER', 1); 

  $id=$_REQUEST['id'];
  $db1=new DB();
  $db2=new DB();
  $dbp=new DB();

  $sql="select * from ".$_TBL_USER." where user_id=".$_SESSION['sess_webid'];
  $db->query($sql);
  $bill_row=$db->fetchArray();
  $councode=$db2->getSingleResult("select country_id from ".$_TBL_COUNTRIES." where country_id=".$bill_row['country']);

 $makearr=array();
$makearr=getValuesArr( $_TBL_COUNTRIES, "country_id","name","", "" );
 $orderid=(string)rand(10000,999999).rand(100,9999).$_SESSION['sess_webid'];
$whereClause=" orderid='".$orderid."'" ;	
if(matchExists($_TBL_ORDER, $whereClause))
		{
			
		      $orderid=(string)rand(1000,99999).$_SESSION['sess_webid'];
		}


/*   $sql="select * from ".$_TBL_PRODUCT." where id=".$id;
  $db->query($sql);
  while($row=$db->fetchArray())
	{
	
			 $name=$row['prod_name']; 
			 
		  	$price=$row['prod_price'];
		
   } */
   $dbup=new DB();
 $sql1="select * from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'";
 $db->query($sql1);
 if($db->numRows()>0)
  {
	while($row=$db->fetchArray())
	{		
		$prodname.=$row['product_name'].',';
		$prodid.=$row['prodid'].',';
		$cost.=$row['cost'].',';
		$total.=$row['prod_total'].',';
		 $quantity.=$row['quantity'].',';
		 $totalproduct=$db1->getSingleResult('select total from '.$_TBL_PRODUCT." where id=".$row['prodid']);
		 $restprod=($totalproduct-$row['quantity']);
		 $sqlup="UPDATE $_TBL_PRODUCT SET total='".$restprod."' WHERE id=".$row['prodid'];
		$dbup->query($sqlup);	
	
	}
}

$dbu=new DB();
$dbuship=new DB();
$errMsg="";

//////Billing Address detail////////////////////////////
  $u="select * from ".$_TBL_BILL." where id=".$_SESSION['billid']." and userid=".$_SESSION['sess_webid'];
  $dbu->query($u);
  $dbu->numRows();
  $billrow1=$dbu->fetchArray();


$ordarr=array(
						"userid"=>$_SESSION['sess_webid'],
						"prodid"=>$prodid,						
						"orderid"=>$orderid,
						"billid"=>$_SESSION['billid'],
						"product_name"=>$prodname,
						"price"=>$cost,
						//"used_coupone"=>$_SESSION['sess_coupcode'],
						"quantity"=>$quantity,
						"subtotal"=>$total,
						"totalprice"=>$_SESSION['sess_total'],						
						"buydate"=>date('Y-m-d H:i:s'));
//print_r($ordarr);						
				
$insid=insertData($ordarr, $_TBL_ORDER);
///////////////////////////////////////////////
$tatalreward=$bill_row['reward'];
if($_SESSION['sess_total']>2000){
$pointcalculate=$_SESSION['sess_total']%2000;
$db->query("update all_user set search=".($tatalreward+$pointcalculate)." where user_id=".$_SESSION['sess_webid']);
}
//////////////////////////////////////////////

$del="delete  from ".$_TBL_TEMPORDER." where sessionid='".session_id()."'";
$db->query($del); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					 $sql="select * from ".$_TBL_ORDER." where orderid='".$orderid."'";
							$db->query($sql);
							if($db->numRows()>0)
								{
									
								     $grand_total=0;
								     $subtotal=0;
								     $row=$db->fetchArray();
								    $prodidarr=explode(',',$row['prodid']);
									$prodarray=explode(',',$row['product_name']);
									$qtyarr=explode(',',$row['quantity']);
									$pricearr=explode(',',$row['price']);	
									$subtotalarr=explode(',',$row['subtotal']);
						         	 $cn=count($prodarray)-1;
						         	
$shipid=$db1->getSingleResult("select billid from ".$_TBL_ORDER." where orderid='".$orderid."'");
$sql="select * from ".$_TBL_BILL." where id=".$shipid;
$db1->query($sql);
$billrow=$db1->fetchArray();


/*  $bsql="select * from ".$_TBL_USER." where user_id=".$row['userid'];
$db1->query($bsql);
$userrow=$db1->fetchArray();
		 */						
								

								
  
  
  $bdate=explode(' ',$row['buydate']);
  $newbdate=explode(' ',$bdate[0]);
  $date= $newbdate[0].'/'.$newbdate[0].'/'.$newbdate[0];

 
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//code to implement api
	
			//Username & Password
			//$username = "Abcbooks";
			//$password = "jaijai2401";
			
			//API Details
			/* $senderID = "ABCOMP";
			$mobileNo = $cell;
			$textmsg = "Hi $name !</br>Thanks for shopping Abcbookkart, Exciting to have you here. Your order has been successfully placed and we will ship it soon. You will receive a separate email once your order ships. " ;
			$priority = "ndnd";
			$stype = "normal";

			$data="user=".$username."&pass=".$password."&sender=".$senderID."&phone=".$mobileNo."&text=".$textmsg."&priority=".$priority."&stype=".$stype;
			
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, 'http://promo.smsfresh.co/api/sendmsg.php'); 
			curl_setopt($ch, CURLOPT_POST, true); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$result = curl_exec($ch); 
			curl_close($ch);  */

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
						///////////////////////////////////////////Invoice Generation////////////////////////////
							
				  $invdetail.=' 
<table width="800" border="0" align="center" style="border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; color:#585858;     font-size: 14px;">
  <tr style="btext-align:center;">
    <td height="15" >'.date('d-m-Y').'</td>
    <td height="15" align="left">Order Confirmation</td>
  </tr>
  <tr>
   <td colspan="3" align="left" style="padding: 20px 0;" ><img src="images/logo.png"  width="200" align="middle"></td>
   
    
  </tr>
  
  <tr>
    <td colspan="3" align="left" style="font-size: 25px;
    color: #049E18;"  ><b>Thank You </b></td>
  
   
    
  </tr>
  
  <tr>
    
   <td colspan="3" align="left" style="padding-bottom:20px;     font-size: 16px;" >Your Order Is Confirmed. Your Invoice #: <b>'.$orderid.' </b></td>
   
    
  </tr>
  
  <tr>
    <td style="padding:5px 0; color:#000; "><b>Delivery Address: </b></td>
    <td colspan="2" style="padding:5px 0;  color:#000;"><b>Payment Details:</b> </td>
    
  </tr>
  
  <tr>
    <td>'.$billrow['billing_firstname'].' '.$billrow['billing_lastname'].'</td>
    <td>Payment Mode:</td>
    <td align="right">Online</td>
    
  </tr>
  
   <tr>
    <td> Address:'.$billrow['billing_adress'].'<br />'.$billrow['billing_adress1'].'<br />State:'.$billrow['billing_state'].' <br />Phone:'.$billrow['billing_phone'].'<br />E-Mail:'.$billrow['billing_email'].'</td>
    <td>Order Total:</td>
    <td  align="right">₦'.$row['totalprice'].'</td>
  </tr>
  
  
   <tr>
    <td>Zip:'.$billrow['billing_zip'].'</td>
    <td>Convenience Charge:</td>
    <td  align="right"> Free </td>
  </tr>
  
  
   <tr>
    <td style="    padding-bottom: 10px;">India</td>
    <td style="    color: #049E18;
    padding-bottom: 0;
    border-bottom: 1px solid rgba(204, 204, 204, 0.8);">            </td>
    <td style="    color: #049E18;
    padding-bottom: 0;
    border-bottom: 1px solid rgba(204, 204, 204, 0.8); text-align:right;     width: 100px;">   </td>
  </tr>
  
  
  <tr>
    <td></td>
    <td style="padding: 10px 0;"><strong>Amount: </strong>   </td>
    <td style="padding: 10px 0;"  align="right"> <strong>₦'.$row['totalprice'].' </strong></td>
  </tr>
  
  <tr>
    
    <td style="padding: 10px 0;"  align="left" colspan="2"> '.$billrow['billing_phone'].' - You wil receive SMS alerts for order status on this number</td>
  </tr>
  
  
  <tr>
    <td colspan="2"><b>Whats Next? </b>
        <ul>
            <li style="margin: 10px 0; color:#000;">We will send you an email wit the courier name and tracking number once the order is shipped.</li>
            <li style="margin: 10px 0; color:#000; ">You are in safe hands when you shop on orangestate.
incase you dont receive  your order or if it is delivered in an unsatisfactory condition, you can reach our to us through orangestate GUARANTEE*</li>
            <li style="    margin: 10px 0; color:#000;">Need help? If you have any questions or concerns us at 000-00000000</li>
            
        </ul>
    </td>
    
  </tr>
  
  
  
  
  
  <tr>
    <td colspan="3" align="center" style="padding:5px; background:#079CA8; color:#fff;"><strong>Your Item(S) Details: </strong>
    </td>
  </tr>
  
  <!--details--> 
  <tr>
		<td colspan="3">
			<table width="100%" border="0" style="border-collapse: collapse;">
				<thead>
					<tr border="1" bordercolor="#ccc">
						<th style="width50%; text-align: left;     border-left: 2px solid #ccc;  padding: 5px 10px;     border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"  >Item Title</th>
						<th style="width:20%; text-align:center;     border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;">Qty </th>
                        <th style="width:10%; text-align:center ;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"> </th>
						<th style="width: 20%;      border-right: 2px solid #ccc;   text-align: left;    padding: 5px 10px;border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;">Total Price</th>
						
					</tr>
				</thead>
				
				
				<tbody>
    				<tr>
    						<td colspan="4"  style="padding:15px; font-size: 14px;     border-left: 2px solid #ccc;     border-right: 2px solid #ccc;    color: #585858; text-align:left;   border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"> From orangestate.ng (000-0000000, orangestate@gmail.com)</td>
    						
    				</tr>';
                    for($i=0;$i<$cn;$i++)
				{
					$pname=$db1->getSingleResult("select prod_name from ".$_TBL_PRODUCT." where id=".$prodidarr[$i]);
					$price=$db1->getSingleResult("select prod_price from ".$_TBL_PRODUCT." where id=".$prodidarr[$i]);
					$qtyarr[$i];	
					$prodarray[$i];
					$pricearr[$i];
					number_format($subtotalarr[$i],2,'.',',');
                    $ship3=$db->getSingleResult("select shippingcharge from ".$_TBL_PRODUCT." where  id=".$prodidarr[$i]);
                    $invdetail.='<tr>
    						<td style="color: #585858; text-align:center; padding: 10px;     border-left: 2px solid #ccc;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;">'.$prodarray[$i].'</td>
    						<td style="color: #585858;     border: 2px solid #ccc; padding: 10px; text-align:center;   border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;">'.$qtyarr[$i].'</td>
    						<td style="color: #585858;  border: 2px solid #ccc; padding: 10px; text-align:center;   border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"> ₦'.$pricearr[$i].'</td>
                            <td style="color: #585858; text-align:center;padding: 10px;     border-right: 2px solid #ccc;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($subtotalarr[$i],2,'.',',').'</td>
    					
    				</tr>';
                    $subtotal+=$subtotalarr[$i];
											 $grand_total+=$subtotalarr[$i];			 
								
							$shipb=$shipb+$ship3;		
																
									}
												
                    
                    
                   $invdetail.=' 
				   <tr>
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Shipping &amp; Handling</b> <p>
</p>
 </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($shipb,2,'.',',').'</td>
    					
    				</tr>
				   
				   
				   <tr>
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Net Amount</b> <p>
</p>
(Including applicable shipping cost & tex) </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($grand_total+$shipb,2,'.',',').'</td>
    					
    				</tr>
                    
                    
                
                    
                    <tr>
                    	<td colspan="4" style="  padding: 50px; text-align: center;"><a href="javascript:void(0)" onClick="window.print();"  style="background: #079AA7; padding: 9px; border-radius:5px;
    color: #fff;"> Print this Page</a></td>
    					
    				</tr>
                    
                    
                    
                    
                    
                  
				</tbody>
			</table>
		
		</td>
	
	  </tr>
  <!--end details-->
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>';
	  		}
	 								$to=$_SESSION['sess_webmail'];
			 						$adminto="info@orangestate.com";
									echo  $message=$invdetail;		die;
									$from='shop '.$adminto;
									$subject="Order No.".$orderid;			
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);
                    
                    
                   //////Site Admin///////////
                   
                    $adminfrom=$_SESSION['sess_webmail'];
                    $querysubject="order from customer !"; 
                    $adminheaders  = "MIME-Version: 1.0\r\n";
                    $adminheaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $adminheaders .= "From:$adminfrom\r\n";                   
                    @mail($adminto, $subject, $message, $adminheaders);
                    
                  
		//redirectpage("invoice1.php?mode=T&ordid=".$orderid);
			
			
		
								
		
	
	echo "<h2>Thanku you for purchaseing with Abcbookkart.com!</h2>";	

?>
<?php include("footer.php"); ?>
	  
	  
	  
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="d-flex justify-content-around lh-condensed">
              <div class="order-details text-center">
                <div class="order-title">Order Number</div>
                <div class="order-info">#CV45632</div>
              </div>
              <div class="order-details text-center">
                <div class="order-title">Date</div>
                <div class="order-info">10<sup>th</sup> Oct, 2018</div>
              </div>
              <div class="order-details text-center">
                <div class="order-title">Amount Paid</div>
                <div class="order-info">$2550</div>
              </div>
              <div class="order-details text-center">
                <div class="order-title">Payment Method</div>
                <div class="order-info">Credit Card</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0"><strong>My Orders</strong></h4>
        </div>
      </div>
      <div class="card pull-up">
        <div class="card-header">
          <div class="float-left">
            <a href="#" class="btn btn-info">#CV45632</a>
          </div>
          <div class="float-right">
            <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
            
          </div>
        </div>
        <div class="card-content">
          <div class="card-body py-2">
            <div class="d-flex justify-content-between lh-condensed">
              <div class="order-details text-center">
                <div class="product-img d-flex align-items-center">
                  <img class="img-fluid" src="images/shop4.jpg" alt="Card image cap">
                </div>
              </div>
              <div class="order-details">
                <h6 class="my-0">Fitbit Alta HR Special Edition x 1</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <div class="order-details">
                <div class="order-info">$250</div>
              </div>
              <div class="order-details">
                <h6 class="my-0">Delivered on Sun, Oct 15th 2018</h6>
                <small class="text-muted">Brief description</small>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
          <span class="float-left">
            <span class="text-muted">Ordered On</span>
            <strong>Wed, Oct 3rd 2018</strong>
          </span>
          <span class="float-right">
            <span class="text-muted">Ordered Amount</span>
            <strong>$250</strong>
          </span>
        </div>
      </div>
      <div class="card pull-up">
        <div class="card-header">
          <div class="float-left">
            <a href="#" class="btn btn-info">#CV65472</a>
          </div>
          <div class="float-right">
            <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
            
          </div>
        </div>
        <div class="card-content">
          <div class="card-body py-2">
            <div class="d-flex justify-content-between lh-condensed">
              <div class="order-details text-center">
                <div class="product-img d-flex align-items-center">
                  <img class="img-fluid" src="images/shop4.jpg" alt="Card image cap">
                </div>
              </div>
              <div class="order-details">
                <h6 class="my-0">Mackbook pro 19'' x 1</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <div class="order-details">
                <div class="order-info">$1150</div>
              </div>
              <div class="order-details">
                <h6 class="my-0">Delivered on Mon, Oct 16th 2018</h6>
                <small class="text-muted">Brief description</small>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
          <span class="float-left">
            <span class="text-muted">Ordered On</span>
            <strong>Wed, Oct 3rd 2018</strong>
          </span>
          <span class="float-right">
            <span class="text-muted">Ordered Amount</span>
            <strong>$1150</strong>
          </span>
        </div>
      </div>
      <div class="card pull-up">
        <div class="card-header">
          <div class="float-left">
            <a href="#" class="btn btn-info">#CV78645</a>
          </div>
          <div class="float-right">
            <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
            
          </div>
        </div>
        <div class="card-content">
          <div class="card-body py-2">
            <div class="d-flex justify-content-between lh-condensed">
              <div class="order-details text-center">
                <div class="product-img d-flex align-items-center">
                  <img class="img-fluid" src="images/shop4.jpg" alt="Card image cap">
                </div>
              </div>
              <div class="order-details">
                <h6 class="my-0">VR Headset x 2</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <div class="order-details">
                <div class="order-info">$700</div>
              </div>
              <div class="order-details">
                <h6 class="my-0">Delivered on Tue, Oct 17th 2018</h6>
                <small class="text-muted">Brief description</small>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
          <span class="float-left">
            <span class="text-muted">Ordered On</span>
            <strong>Wed, Oct 3rd 2018</strong>
          </span>
          <span class="float-right">
            <span class="text-muted">Ordered Amount</span>
            <strong>$700</strong>
          </span>
        </div>
      </div>
      <div class="card pull-up">
        <div class="card-header">
          <div class="float-left">
            <a href="#" class="btn btn-info">#CV84123</a>
          </div>
          <div class="float-right">
            <a href="#" class="btn btn-outline-info mr-1"><i class="la la-question"></i> Need Help</a>
            
          </div>
        </div>
        <div class="card-content">
          <div class="card-body py-2">
            <div class="d-flex justify-content-between lh-condensed">
              <div class="order-details text-center">
                <div class="product-img d-flex align-items-center">
                  <img class="img-fluid" src="images/shop4.jpg" alt="Card image cap">
                </div>
              </div>
              <div class="order-details">
                <h6 class="my-0">Smart Watch with LED x 1</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <div class="order-details">
                <div class="order-info">$700</div>
              </div>
              <div class="order-details">
                <h6 class="my-0">Delivered on Wed, Oct 18th 2018</h6>
                <small class="text-muted">Brief description</small>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
          <span class="float-left">
            <span class="text-muted">Ordered On</span>
            <strong>Wed, Oct 3rd 2018</strong>
          </span>
          <span class="float-right">
            <span class="text-muted">Ordered Amount</span>
            <strong>$700</strong>
          </span>
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
 