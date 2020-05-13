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
/*  $orderid=(string)rand(10000,999999).rand(100,9999).$_SESSION['sess_webid'];
$whereClause=" orderid='".$orderid."'" ;	
if(matchExists($_TBL_ORDER, $whereClause))
		{
			
		      $orderid=(string)rand(1000,99999).$_SESSION['sess_webid'];
		} */


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
		$shippingcharge.=$row['shippingcharge'].',';
		$tax.=$row['tax_amt'].',';
		$prod_image.=$row['prod_image'].',';
		$tax_percent.=$row['tax_percent'].',';
		$discount1.=$row['discount'].',';
		$prodsize.=$row['prodsize'].',';
		$prodcolor.=$row['prodcolor'].',';
		 $totalproduct=$db1->getSingleResult("select prodquantity from prodattributes where prodid=".$row['prodid']." and prodcolor='".$row['prodcolor']."'");
		 $restprod=($totalproduct-$row['quantity']); 
		 $sqlup="UPDATE prodattributes SET prodquantity='".$restprod."' WHERE prodid=".$row['prodid']." and prodcolor='".$row['prodcolor']."'";
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
$approvel=$_REQUEST['response'];
$transaction=$_REQUEST['transaction'];
$orderid=$_SESSION['sess_orderid'];
if($_REQUEST['pm']=='cod' and $_REQUEST['c']=='D4KFGXsdfsdf46'){
	  $us="select * from ".$_TBL_USER." where user_id=".$_SESSION['sess_webid'];
	  $db->query($us);
	  $db->numRows(); 
	  $user_row=$db->fetchArray();
	  $orderid=(string)rand(10000,999999).rand(100,9999).$_SESSION['sess_webid'];
		$whereClause=" orderid='".$orderid."'" ;	
		if(matchExists($_TBL_ORDER, $whereClause))
		{
			
		      $orderid=(string)rand(1000,99999).$_SESSION['sess_webid'];
		}
		$_SESSION['sess_orderid']=$orderid;
$ordarr=array(
						"userid"=>$_SESSION['sess_webid'],
						"prodid"=>$prodid,						
						"orderid"=>$_SESSION['sess_orderid'],
						"billid"=>$_SESSION['billid'],
						"product_name"=>$prodname,
						"price"=>$cost,
						"prodcolor"=>$prodcolor,
						"shippingcharge"=>$shippingcharge,
						"prodsize"=>$prodsize,
						"tax_amt"=>$tax,
						"paymentmd"=>'cod',
						"tax_percent"=>$tax_percent,
						"discount"=>$discount1,
						"quantity"=>$quantity,
						"subtotal"=>$total,
						"prod_image"=>$prod_image,
						"approvel"=>'pending',
						"ipaddress"=>$_SERVER['REMOTE_ADDR'],
						"transaction_id"=>'',
						"totalprice"=>$_SESSION['sess_total'],						
						"buydate"=>date('Y-m-d H:i:s'));
						
}else{
							
							$ordarr=array(
						"userid"=>$_SESSION['sess_webid'],
						"prodid"=>$prodid,						
						"orderid"=>$_SESSION['sess_orderid'],
						"billid"=>$_SESSION['billid'],
						"product_name"=>$prodname,
						"price"=>$cost,
						"prodcolor"=>$prodcolor,
						"shippingcharge"=>$shippingcharge,
						"prodsize"=>$prodsize,
						"tax_amt"=>$tax,
						"paymentmd"=>'Online',
						"tax_percent"=>$tax_percent,
						"discount"=>$discount1,
						"quantity"=>$quantity,
						"subtotal"=>$total,
						"prod_image"=>$prod_image,
						"approvel"=>$approvel,
						"ipaddress"=>$_SERVER['REMOTE_ADDR'],
						"transaction_id"=>$transaction,
						"totalprice"=>$_SESSION['sess_total'],						
						"buydate"=>date('Y-m-d H:i:s'));
						}
						
//print_r($ordarr);						
				
$insid=insertData($ordarr, $_TBL_ORDER);
$_SESSION['sess_oid']=$insid;

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
						         	 $cn=count($qtyarr)-1;
									 $shiparr=explode(',',$row['shippingcharge']);
	$prodcolorarr=explode(',',$row['prodcolor']);
	$prodsizearr=explode(',',$row['prodsize']);
	$taxarr=explode(',',$row['tax_amt']);
	$discountparr=explode(',',$row['discount']);
	print_r($discountparr);
						         	
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
   <td colspan="3" align="left" style="padding: 20px 0;" ><img src="https://orangestate.ng/images/logo.png"  width="200" align="middle"></td>
   
    
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
    <td  align="right">₦'.($row['totalprice']).'</td>
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
    <td style="padding: 10px 0;"  align="right"> <strong>₦'.(number_format(($row['totalprice']),2,'.',',')).' </strong></td>
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
    <td colspan="3" align="center" style="padding:5px; background:#ffc107; color:#fff;"><strong>Your Item(S) Details: </strong>
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
					
					$prodcolor=$prodcolorarr[$i];
					$prodsize=$prodsizearr[$i];
                    $invdetail.='<tr>
    						<td style="color: #585858; text-align:center; padding: 10px;     border-left: 2px solid #ccc;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;">'.$prodarray[$i].','.$prodcolor.','.$prodsize.'</td>
    						<td style="color: #585858;     border: 2px solid #ccc; padding: 10px; text-align:center;   border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;">'.$qtyarr[$i].'</td>
    						<td style="color: #585858;  border: 2px solid #ccc; padding: 10px; text-align:center;   border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"> ₦'.$pricearr[$i].'</td>
                            <td style="color: #585858; text-align:center;padding: 10px;     border-right: 2px solid #ccc;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($subtotalarr[$i],2,'.',',').'</td>
    					
    				</tr>';
					
					
					$shipb=$shipb+$shiparr[$i];	
					$taxprice=$taxprice+$taxarr[$i];
					$discountprice=$discountprice+$discountparr[$i];
                    $subtotal+=$subtotalarr[$i];
					$grand_total+=$subtotalarr[$i];			 
					
																
									}
												
                    
                    
                   $invdetail.=' <tr>
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Discount</b> <p>
</p>
 </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" >-₦'.number_format($discountprice,2,'.',',').'</td>
    					
    				</tr>
				   <tr>
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Shipping &amp; Handling</b> <p>
</p>
 </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($shipb,2,'.',',').'</td>
    					
    				</tr>
					
					<tr>
							
							
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Tax &amp; VAT</b> <p>
</p>
 </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($taxprice,2,'.',',').'</td>
    					
    				</tr>
					
					
				   
				   
				   <tr>
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Net Amount</b> <p>
</p>
(Including applicable shipping cost & tex) </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format(($row['totalprice']),2,'.',',').'</td>
    					
    				</tr>
                    
                    
                
                    
                    <tr>
                    	<td colspan="4" style="  padding: 50px; text-align: center;"><a href="javascript:void(0)" onClick="window.print();"  style="background: #ffc107; padding: 9px; border-radius:5px;
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
									echo  $message=$invdetail;		//die;
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
			
			
		
								
		
	
	echo "<h2>Thanku you for purchaseing with ORANGE STATE!</h2>";	

?>
  
	  
	  
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
 