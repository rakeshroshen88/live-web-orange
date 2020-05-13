<?php include("../../config.inc.php");
$orderid=$_REQUEST['id'];
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
	$prodcolorarr=explode(',',$row['prodcolor']);
	$prodsizearr=explode(',',$row['prodsize']);
	$taxarr=explode(',',$row['tax_amt']);
	$discountparr=explode(',',$row['discount']);
	 $cn=count($qtyarr)-1;

$sql="select * from billing_address where userid=".$row['userid'];
$db->query($sql);
$billrow=$db->fetchArray();
/* $sql22="SELECT * FROM all_user JOIN user_profile ON all_user.user_id=user_profile.user_id where all_user.user_id=".$row['userid'];
$db->query($sql22);
$billrow=$db->fetchArray();
 $billrow['first_name']; */
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
	
	 $invdetail.=' 
<table width="800" border="0" align="center" style="border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; color:#585858;     font-size: 14px;">
  <tr style="btext-align:center;">
    <td height="15" >'.date('d-m-Y').'</td>
    <td height="15" align="left">Order Confirmation</td>
  </tr>
  <tr>
   <td colspan="3" align="left" style="padding: 10px 0;" ><img src="https://orangestate.ng/images/logo.png"  width="100" align="middle"></td>
   
    
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
    <td style="padding: 10px 0;"  align="right"> <strong>₦'.($row['totalprice']).' </strong></td>
  </tr>
  
  <tr>
    
    <td style="padding: 10px 0;"  align="left" colspan="2"> '.$billrow['billing_phone'].' - You wil receive SMS alerts for order status on this number</td>
  </tr>
  
  
  <tr>
    <td colspan="2"><b>Whats Next? </b>
        <ul>
            <li style="margin: 10px 0; color:#000;">We will send you an email wit the courier name and tracking number once the order is shipped.</li>
         
            
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
					
					$shipprice=$shiparr[$i];					
					$taxprice=$taxprice+$taxarr[$i];
					$discountprice=$discountprice+$discountparr[$i];
                    $subtotal+=$subtotalarr[$i];
					$grand_total+=$subtotalarr[$i];			 
					$shipb=$shipb+$shipprice;		
																
									}
												
                    
                    
                   $invdetail.=' 
				   <tr>
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Shipping &amp; Handling</b> <p>
</p>
 </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($shipprice,2,'.',',').'</td>
    					
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
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Discount</b> <p>
</p>
 </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format($discountprice,2,'.',',').'</td>
    					
    				</tr>
				   
				   
				   <tr>
    						<td style="width:50%;    border-left: 2px solid #ccc;color: #585858; text-align:center; padding: 10px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"></td>
    						<td colspan="2" style="width:10%; color: #585858;padding: 10px; text-align:center;    font-size: 13px;  border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;"><b> Net Amount</b> <p>
</p>
(Including applicable shipping cost & tex) </td>   					
                            <td style="width:20%;     border-right: 2px solid #ccc; color: #585858; text-align:center;padding: 10px;    border-top: 2px solid #ccc; border-bottom: 2px solid #ccc;" > ₦'.number_format(($grand_total+$taxprice+$shipb-$discountprice),2,'.',',').'</td>
    					
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
echo  $invdetail;
?>