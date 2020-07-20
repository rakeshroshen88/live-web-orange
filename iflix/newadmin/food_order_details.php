<?php include("header.php");
$err="";
$_TBL_STATUS='order_status';
$orderid=$_REQUEST['id'];
$db1=new DB();
$db2=new DB();
$Date = date('D-m-Y');
 $deleverydate=date('D-m-Y', strtotime($Date. ' + 4 days'));
if(!empty($_POST['invid'])){
$updatearr1=array(	 "order_status"=>$_POST['jobstatus'],
					  "comment"=>$_POST['comment'],
						);
						
					$whereClause=" orderid=".$_POST['invid'];
					/* updateData($updatearr1, 'food_order', $whereClause); */
}
$sql="select * from food_order where orderid='".$orderid."'";
$db->query($sql);
if($db->numRows()>0)
	{
	$grand_total=0;
	$row=$db->fetchArray();
	 $prodidarr=explode(',',$row['prodid']);
	 $prodarray=explode(',',$row['receipy_name']);
	 $qtyarr=explode(',',$row['quantity']);
	$pricearr=explode(',',$row['price']);	
	$subtotalarr=explode(',',$row['subtotal']);
	$shiparr=explode(',',$row['shippingcharge']);
	$prodcolorarr=explode(',',$row['prodcolor']);
	$prodsizearr=explode(',',$row['prodsize']);
	$taxarr=explode(',',$row['tax_amt']);
	$discountparr=explode(',',$row['discount']);
	$tax_percent=explode(',',$row['tax_percent']);
	$extra_option_name=explode(',',$row['extra_option_name']);
	$extra_option_price=explode(',',$row['extra_option_price']);
	
	 $cn=count($qtyarr)-1;
	 
$sqlship="select * from billing_address where userid=".$row['userid'];
$db->query($sqlship);
$shiprow=$db->fetchArray();
 $sql22="SELECT * FROM all_user JOIN user_profile ON all_user.user_id=user_profile.user_id where all_user.user_id=".$row['userid'];
$db->query($sql22);
$billrow=$db->fetchArray();

if(!empty($_REQUEST['sendemil']))
	{
	 $invdetail1.='<div style="width: 100%; height: 100%; margin: 10px auto; padding: 0; background-color: #f1f2f3;, Arial, Tahoma, Verdana, sans-serif; font-weight: 300; font-size: 13px; text-align: center;">
    <table width="100%" cellspacing="0" cellpadding="0" height="60">
        <tbody>
            <tr style="background: #2175ff;">
                <td>
                    <table width="100%" style="max-width: 600px; margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td style="width: 50%; text-align: left; padding-left: 16px;">
                                    <a
                                        style="text-decoration: none; outline: none; color: #ffffff; font-size: 13px;"
                                        href=""
                                        target="_blank"
                                        data-saferedirecturl=""
                                    >
                                        <img
                                            border="0"
                                            height="30"
                                            src="https://orangestate.ng/images/logo.png"
                                            alt=""
                                            style="border: none;"
                                            class="CToWUd"
                                        />
                                    </a>
                                </td>
                                <td style="width: 50%; text-align: right; color: rgba(255, 255, 255, 0.8); sans-serif; font-size: 14px; font-style: normal; font-stretch: normal; padding-right: 16px;">
                                    Order confirmed
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" style="margin: 0 auto; padding: 10px; background-color: #f1f2f3;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" style="margin: 0 auto; max-width: 600px; background: #ffffff;">
                        <tbody>
                            <tr>
                                <td align="left" valign="top" style="display: block; margin: 0 auto; clear: both; padding: 0px 40px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" style="margin: 0 auto; max-width: 600px; background: #ffffff;">
                                        <tbody>
                                            <tr>
                                                <td align="left" valign="top" style="color: #212121; display: block; margin: 0 auto; clear: both; padding: 3px 0 0 0;">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td id="m_5513078824955673524journey" valign="top" align="left" style="float: right; background-color: #fafafa; padding: 0; text-align: center; vertical-align: middle;">
                                                                    <img
                                                                        border="0"
                                                                        src="https://orangestate.ng/images/order.png"
                                                                        alt="Order Jouney"
                                                                        style="border: none; width: 80%;"
                                                                        class="CToWUd"
                                                                    />
                                                                </td>
                                                                <td valign="top" align="left" style="float: left; vertical-align: middle;">
                                                      <p style="font-weight: normal; font-style: normal; line-height: 1.5; font-stretch: normal; color: #212121; margin: 16px 0px;"
                                                                    >
                                                                        Hi '.$shiprow['billing_firstname'].' '.$shiprow['billing_lastname'].',
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" cellpadding="0" style="margin: 0 auto; padding: 30px 0 0 0; max-width: 600px; background: #ffffff;" border="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table
                                                        width="100%"
                                                        border="0"
                                                        cellpadding="0"
                                                        cellspacing="0"
                                                        align="left"
                                                        style="table-layout: fixed; border-spacing: 0; border-collapse: collapse; width: 100%; max-width: 260px; border: none; margin-bottom: 24px; margin-right: 30px;"
                                                    >
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" align="left" style="border-right: 1px solid #f4f4f4; padding-right: 10px;">
                                                                    <p style="padding: 0; margin: 0; font-size: 16px; font-family: sans-serif; color: #212121;">Order successfully placed.</p>
                                                                    <p style="padding: 0; margin: 0; font-size: 16px; font-family: sans-serif; color: #212121; margin-bottom: 12px;"></p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; line-height: 20px; , sans-serif;">
                                                                        Your order <span style="font-size: 12px; , sans-serif;">will be delivered between '.date('D m Y').' and '.$deleverydate.'.</span>
                                                                    </p>
                                                                    <br />
                                                                    <p></p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; line-height: 20px; , sans-serif; font-weight: 400; padding-bottom: 12px;">
                                                                        We are pleased to confirm your order no '.$orderid.'. <br />
                                                                        Thank you for shopping with OrangeState!
                                                                    </p>
                                                                   
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table
                                                        width="100%"
                                                        border="0"
                                                        cellpadding="0"
                                                        cellspacing="0"
                                                        align="left"
                                                        style="border-spacing: 0; border-collapse: collapse; width: 100%; max-width: 220px; border: none; margin-bottom: 24px;"
                                                    >
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" align="left">
                                                                    <p style="padding: 0; margin: 0; font-size: 16px; font-family: sans-serif; color: #212121; margin-bottom: 12px;">Delivery Address</p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; line-height: 20px; padding-right: 35px; color: #212121;"></p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; line-height: 20px;">'.$billrow['billing_firstname'].' '.$billrow['billing_lastname'].'</p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; line-height: 20px;">'.$shiprow['billing_adress'].','.$shiprow['billing_adress1'].', </p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; line-height: 20px;">'.$shiprow['billing_email'].'</p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; line-height: 20px;">'.$shiprow['billing_zip'].'</p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; line-height: 20px;">'.$shiprow['billing_state'].'</p>
                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; line-height: 20px;">Mob. '.$shiprow['billing_phone'].'</p>
                                                                    <p></p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" cellpadding="0" style="margin: 0 auto; max-width: 600px; background: #ffffff;">
                                        <tbody>
                                            <tr>
                                                <td align="left" valign="top" style="color: #212121; display: block; margin: 0 auto; clear: both; padding: 30px 0 24px 0;">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>';
			$prod_imagearr=explode(',',$row['prod_image']);
                 for($i=0;$i<$cn;$i++)
				{
					
					$prodcolor=$prodcolorarr[$i];
					$prodsize=$prodsizearr[$i];
					$prodimage=$prod_imagearr[$i];
					if(empty($prodimage)){ $prodimage='noimage.jpg'; }
                    $invdetail1.=' <tr>
                                                                <td width="120" valign="top" align="left">
                                                                    <a
                                                                        style="color: #027cd8; text-decoration: none; outline: none; color: #ffffff; font-size: 13px; display: block; width: 100px;"
                                                                        href=""
                                                                        target="_blank"
                                                                    >
                                                                        <img
                                                                            border="0"
                                                                            src="https://orangestate.ng/product/'.$prodimage.'"
                                                                            alt="Red Chief Lace Up"
                                                                            style="border: none; width: 100%;"
                                                                            class="CToWUd"
                                                                        />
                                                                    </a>
                                                                </td>
                                                                <td width="8"></td>
                                                                <td valign="top" align="left">
                                                                    <p style="margin-bottom: 13px;">
                                                                        <a
                                                                            href=""
style="font-size: 14px; font-weight: normal; font-style: normal; font-stretch: normal; line-height: 1.25; #2175ff; text-decoration: none;" target="_blank">
                                                                         '.$prodarray[$i].','.$prodcolor.','.$prodsize.' </a>
                                                                        <sup></sup> <br />
                                                                    </p>
                                                                   
                                                                    <p
                                                                        style="
                                                                            , sans-serif;
                                                                            font-size: 12px;
                                                                            font-weight: normal;
                                                                            font-style: normal;
                                                                            line-height: 1.5;
                                                                            font-stretch: normal;
                                                                            color: #212121;
                                                                            margin: 0px 0px;
                                                                        "
                                                                    >
                                                                        Item will be delivered between '.date('D m Y').' and '.$deleverydate.'
                                                                    </p>
                                                                    <p style="font-family:  sans-serif; font-style: normal; line-height: 1.5; font-stretch: normal; color: #212121; margin: 5px 0px;">
                                                                        <span style="padding-right: 10px;">₦'.$row['totalprice'].'</span>
                                                                        <span
                                                                            style="
                                                                                font-family: sans-serif;
                                                                                font-size: 12px;
                                                                                font-weight: normal;
                                                                                font-style: normal;
                                                                                line-height: 1.5;
                                                                                font-stretch: normal;
                                                                                color: #878787;
                                                                                margin: 0px 0px;
                                                                                border: 1px solid #dfdfdf;
                                                                                display: inline;
                                                                                border-radius: 3px;
                                                                                padding: 3px 10px;
                                                                            "
                                                                        >
                                                                            Qty: '.$qtyarr[$i].'
                                                                        </span>
                                                                    </p>
                                                                </td>
                                                            </tr>';
				}												
															
                                                         $invdetail1.='</tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td height="1" style="background-color: #f0f0f0; font-size: 0px; line-height: 0px;" bgcolor="#f0f0f0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td height="1" style="background-color: #f0f0f0; font-size: 0px; line-height: 0px;" bgcolor="#f0f0f0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" cellspacing="0" cellpadding="0" style="margin: 0 auto; padding: 30px 0 0 0; max-width: 600px; background: #ffffff;" border="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table
                                                        width="100%"
                                                        border="0"
                                                        cellpadding="0"
                                                        cellspacing="0"
                                                        align="left"
                                                        style="border-spacing: 0; border-collapse: collapse; width: 100%; max-width: 220px; border: none; margin-bottom: 24px;"
                                                    >
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" align="left">
                                                                    <p style="padding: 0; margin: 0; font-size: 14px; font-family: sans-serif; color: #212121; margin-bottom: 12px;">Payment Details</p>
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding: 0px;">
                                                                                    <p style="padding: 0; margin: 0; font-size: 12px; , sans-serif; font-weight: 400; color: #212121;">
                                                                                        Amount Payable on Delivery
                                                                                        <span style="padding: 0; margin: 0; font-size: 12px; font-family:sans-serif; color: #212121; padding-left: 10px;">₦'.$row['totalprice'].'</span>
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td height="1" style="background-color: #f0f0f0; font-size: 0px; line-height: 0px;" bgcolor="#f0f0f0"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    
</div>
';
									$to=$_SESSION['sess_webmail'];
			 						$adminto="info@orangestate.com";
									$message=$invdetail;		//die;
									$from='shop '.$adminto;
									$subject="Order No.".$orderid;			
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);

	}
 $arr1=@explode(' ',$row['buydate']);
 $edate=@explode('-',$arr1[0]);		
 $stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);
 if($row['order_status']=="0")	{
	 $sta="Pending";	
	 }elseif($row['order_status']=="1"){
		 $sta="Cancelled";
		 }elseif($row['order_status']=="2"){
			 $sta="Confirmed";
		 }elseif($row['order_status']=="3"){
			 $sta="Processed";
		 }elseif($row['order_status']=="4"){
			$sta="Hold";	
		  }elseif($row['order_status']=="5"){
			 $sta="Delivered";
		 }
		 
	}
	
	
if(isset($_POST['submit']))
	{
	
	$updatearr=array(
						"invoiceid"=>$_POST['invid'],
						"comment"=>$_POST['comment'],
						"order_status"=>$_POST['jobstatus'],
						"order_type"=>'food',
						"order_status_date"=>date('Y-m-d h:i:s')
						
				);

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
	$sta="confirmed";
	}elseif($_POST['jobstatus']=="3"){
	$sta="Processed";
	}elseif($_POST['jobstatus']=="4"){
	$sta="Hold";
	}elseif($_POST['jobstatus']=="5"){
	$sta="Delivered";
	}

	$whereClause=" invoiceid='".$_POST['invid']."'";
	
	

				$insid=insertData($updatearr, $_TBL_STATUS);
				if($insid>0){
							
							$invdetail.=' <table style="margin:auto;border-spacing:0;background:white;border-radius:12px;overflow:hidden" align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
	<tbody>
		<tr>
			<td style="border-collapse:collapse">
				<table style="border-spacing:0;border-collapse:collapse" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td style="border-collapse:collapse;padding:16px 32px" align="left" valign="middle">
								<table style="border-spacing:0;border-collapse:collapse" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td style="padding:0;text-align:left;border-collapse:collapse" width="40" align="left" valign="middle">
												<a href="">
													<img src="https://orangestate.ng/images/logo.png" title="OrangeState" alt="OrangeState" style="margin:auto;text-align:center;border:0;outline:none;text-decoration:none;min-height:40px" align="middle" border="0" width="40" class="CToWUd">
												</a>
											</td>
											<td width="16" align="left" valign="middle" style="border-collapse:collapse">&nbsp;</td>
											<td align="right" valign="middle">'.date('D m Y').'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:0 16px">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="background:#f7f9fa;padding:16px;border-radius:8px;overflow:hidden">
					<tbody>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding-bottom:16px;border-bottom:1px solid #eaeaed">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize"> <span style="border-collapse:collapse;width:100%;display:block">Paid to</span>  <span style="border-collapse:collapse;font-size:16px;font-weight:500;width:100%;display:block"> OrangeState                                       </span> 
											</td>
											<td width="32" align="left" valign="middle" style="border-collapse:collapse"></td>
											<td align="right" valign="middle" style="border-collapse:collapse;font-size:20px;font-weight:500">₦'.$row['totalprice'].'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Txn. ID</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal">'.$row['transaction_id'].'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Txn. status</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:16px;color:#5eaa46">Successful</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Order Status</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:12px"> <span style="border-collapse:collapse;font-size:16px;width:100%;display:block">'.$sta.' </span> 
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr></tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0 0;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse">Order ID</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal">'.$orderid.'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:32px;background:#ffffff;,Arial,Helvetica,sans-serif">
				<p style="padding:0;margin:0">Hi '.$billrow['billing_firstname'].' '.$billrow['billing_lastname'].'
					
					<br>'.$_POST['comment'].'<br>
					If you have not made this transaction or notice any error please contact us at <a href="mailto:support@Orangestate.ng" style="color:#673ab7" target="_blank">support@Orangestate.ng</a> 
					<br>
					<br>Cheers!
					<br>Team OrangeState</p>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:16px 32px;border-top:1px solid #eaeaed;,Arial,Helvetica,sans-serif;font-size:12px">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						
						<tr>
							<td style="border-collapse:collapse;font-weight:normal;padding-top:16px;font-style:italic;color:#7e818c" colspan="3">Important Note: OrangeState or its merchant partners never ask for your OrangeState password, bank details or MPIN over email/phone. Please do not share your OrangeState password or MPIN with anyone. For any questions write to <a href="mailto:support@OrangeState.com" style="color:#673ab7" target="_blank">support@Orangestate.ng</a> 
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>';
 
									$to=$_SESSION['sess_webmail'];
			 						$adminto="info@orangestate.com";
									$message=$invdetail;		//die;
									$from='shop '.$adminto;
									$subject="Order No.".$orderid;			
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);
                    
                    
                   //////Site Admin///////////
                   
                    /* $adminfrom=$_SESSION['sess_webmail'];
                    $querysubject="order from customer !"; 
                    $adminheaders  = "MIME-Version: 1.0\r\n";
                    $adminheaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $adminheaders .= "From:$adminfrom\r\n";                   
                    @mail($adminto, $subject, $message, $adminheaders); */
						}
						$error="Comment Added successfully !";
				
		}
	
				


if(isset($_POST['Submit']))
	{
$updatearr1=array("order_status"=>'3');
$whereClause=" orderid=".$orderid;
updateData($updatearr1, $_TBL_ORDER, $whereClause);
	$updatearrinv=array(
						"order_id"=>$orderid,
						"payment_status"=>'Paid',
						"order_type"=>'food',
						"totalamount"=>$row['totalprice'],
						"customer_name"=>$shiprow['billing_firstname'].' '.$billrow['billing_lastname'],
						"is_closed"=>'0',
						"created_at"=>date('Y-m-d h:i:s')
						
				);
		$insidinv=insertData($updatearrinv, 'order_invoice');

			
				if($insidinv>0){
							
							$invdetail.=' <table style="margin:auto;border-spacing:0;background:white;border-radius:12px;overflow:hidden" align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
	<tbody>
		<tr>
			<td style="border-collapse:collapse">
				<table style="border-spacing:0;border-collapse:collapse" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td style="border-collapse:collapse;padding:16px 32px" align="left" valign="middle">
								<table style="border-spacing:0;border-collapse:collapse" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td style="padding:0;text-align:left;border-collapse:collapse" width="40" align="left" valign="middle">
												<a href="">
													<img src="https://orangestate.ng/images/logo.png" title="OrangeState" alt="OrangeState" style="margin:auto;text-align:center;border:0;outline:none;text-decoration:none;min-height:40px" align="middle" border="0" width="40" class="CToWUd">
												</a>
											</td>
											<td width="16" align="left" valign="middle" style="border-collapse:collapse">&nbsp;</td>
											<td align="right" valign="middle">'.date('D m Y').'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:0 16px">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="background:#f7f9fa;padding:16px;border-radius:8px;overflow:hidden">
					<tbody>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding-bottom:16px;border-bottom:1px solid #eaeaed">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize"> <span style="border-collapse:collapse;width:100%;display:block">Paid to</span>  <span style="border-collapse:collapse;font-size:16px;font-weight:500;width:100%;display:block"> OrangeState                                       </span> 
											</td>
											<td width="32" align="left" valign="middle" style="border-collapse:collapse"></td>
											<td align="right" valign="middle" style="border-collapse:collapse;font-size:20px;font-weight:500">₦'.$row['totalprice'].'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Txn. ID</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal">'.$row['transaction_id'].'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Txn. status</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:16px;color:#5eaa46">Successful</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0;border-bottom:1px solid #eaeaed;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse;text-transform:capitalize">Order Status</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal;font-size:12px"> <span style="border-collapse:collapse;font-size:16px;width:100%;display:block">'.$sta.' </span> 
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr></tr>
						<tr>
							<td align="left" valign="middle" style="border-collapse:collapse;padding:8px 0 0;font-size:12px">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td width="28%" align="left" valign="top" style="border-collapse:collapse">Order ID</td>
											<td width="16" align="left" valign="top" style="border-collapse:collapse;font-weight:normal">:</td>
											<td align="left" valign="top" style="border-collapse:collapse;font-weight:normal">'.$orderid.'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:32px;background:#ffffff;,Arial,Helvetica,sans-serif">
				<p style="padding:0;margin:0">Hi '.$billrow['billing_firstname'].' '.$billrow['billing_lastname'].'
					
					<br>Your order <br>has been ready to delivery.<br>
					If you have not made this transaction or notice any error please contact us at <a href="mailto:support@Orangestate.ng" style="color:#673ab7" target="_blank">support@Orangestate.ng</a> 
					<br>
					<br>Cheers!
					<br>Team OrangeState</p>
			</td>
		</tr>
		<tr>
			<td style="border-collapse:collapse;padding:16px 32px;border-top:1px solid #eaeaed;,Arial,Helvetica,sans-serif;font-size:12px">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						
						<tr>
							<td style="border-collapse:collapse;font-weight:normal;padding-top:16px;font-style:italic;color:#7e818c" colspan="3">Important Note: OrangeState or its merchant partners never ask for your OrangeState password, bank details or MPIN over email/phone. Please do not share your OrangeState password or MPIN with anyone. For any questions write to <a href="mailto:support@OrangeState.com" style="color:#673ab7" target="_blank">support@Orangestate.ng</a> 
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>';
 
									$to=$_SESSION['sess_webmail'];
			 						$adminto="info@orangestate.com";
									$message=$invdetail;		//die;
									$from='shop '.$adminto;
									$subject="Order No.".$orderid;			
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);
                    
						}
						$error="Invoice created successfully !";
				
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

            <h3> Order View</h3>

            <ul class="nav nav-tabs tabs-left">

                <li class="active error"><a href="#Information" data-toggle="tab">Information 

                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>

                </a></li>

                <li><a href="#Inoices" data-toggle="tab">Inoices</a></li>

                <li><a href="#Shipments" data-toggle="tab">Delivery</a></li>

                      

            </ul>

        </div>
<style>
#semail{
    margin-top: -38px;
    width: 220px;
}
</style>
<script>	
$(document).ready(function(){

$( "#send_email" ).on( "click", function() {

$('#orderloader').show();
		var oid = jQuery(this).attr('oid');
		var social_AjaxURL='//orangestate.ng/admin/pages/send_email.php';
		var dataString ='id='+oid+'&order_type=food';

			
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
					$('#orderloader').hide();
					Swal.fire({
					  type: 'success',
					  title: 'success',
					  text: 'Order Has been send!'
					});
						setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
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
 $('#orderloader').show();

		var oid = jQuery(this).attr('oid');
		var social_AjaxURL='//orangestate.ng/admin/pages/order_hold.php';
		var dataString ='id='+oid+'&order_type=food';

			
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
						$('#orderloader').hide();

					Swal.fire({
					  type: 'success',					  
					  text: 'Order Has been send!'
					});
					setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						
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
 $('#orderloader').show();

		var oid = jQuery(this).attr('oid');
		var social_AjaxURL='//orangestate.ng/admin/pages/order_cancel.php';
		var dataString ='id='+oid + '&order_type=food';

			
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
						$('#orderloader').hide();

					Swal.fire({
					  type: 'success',					  
					  text: 'Order Has been Canceled!'
					});
					setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						
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
 $('#orderloader').show();

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
		var dataString ='id=' + oid + '&traking=' + traking + '&courier=' + courier + '&payment_status=' +jobstatus+'&order_type=food';

			
				Swal.fire({
				  title: 'Are you sure?',
				  text: "want to delivery this Order..?",
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
						$('#orderloader').hide();

					Swal.fire({
					  type: 'success',					 
					  text: 'Order Has been delivered!'
					});
					setTimeout(function(){
							window.location.reload(true);
						   }, 5000);
						
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

                             

                            <p class="text-right">
							<span style="display:none;" id="orderloader"><img src="//orangestate.ng/images/loading.gif" /> Just a moment...</span>
						<?php if($row['order_status']==1){ ?>
						<button class="btn btn-default btn-icon-fixed cancel"><span class="icon-menu-circle" id="cancel"></span> Cancel</button>
							  <button class="btn btn-warning btn-icon-fixed " ><span class="icon-arrow-up-circle" ></span> Send Email</button>
							
                                <button class="btn btn-warning btn-icon-fixed "><span class="icon-arrow-up-circle" id="hold"></span> Hold</button>

                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle" id="inv"></span> Create Invoice</button>

                                <button class="btn btn-warning btn-icon-fixed "><span class="icon-arrow-up-circle" id="delivery"></span> Delivery</button>

                               
							 
						
						<?php }else{ ?>
                             <button class="btn btn-default btn-icon-fixed cancel" id="cancel" oid="<?=$orderid?>"><span class="icon-menu-circle" id="cancel"></span> Cancel</button>
							  <button class="btn btn-warning btn-icon-fixed send_email" id="send_email" oid="<?=$orderid?>"><span class="icon-arrow-up-circle" ></span> Send Email</button>
							
                                <button class="btn btn-warning btn-icon-fixed orderhold"  id="orderhold" oid="<?=$orderid?>"><span class="icon-arrow-up-circle" id="hold" ></span> Hold</button>

                                <button class="btn btn-warning btn-icon-fixed" data-toggle="modal" data-target="#modal-full"><span class="icon-arrow-up-circle"></span> Create Invoice</button>

                                <button class="btn btn-warning btn-icon-fixed ordership1" id="ordership1" oid="<?=$orderid?>" data-toggle="modal" data-target="#modal-full1"><span class="icon-arrow-up-circle" id="delivery"></span> Delivery</button>

                               
							 
							 
						<?php } ?>

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

                                                                                <h5 class="title"><span id="order_item_621_title"><?=$prodarray[$i]?></span>
	</br><span><?=$extra_option_name[$i]?></span>
																				
																				
																				
																				</h5>

                                                                                
                                                                            </div>

                                                                        </div>

                                                                    </td>

                                                                    
                                                                   

                                                                    <td><b> ₦<?=$pricearr[$i]?></b>₦ <?=$extra_option_price[$i]?> </td> 

                                                                    <td> <?php 		
		echo $qtyarr[$i];		
		?> </td> 
		<?php 		$shipprice=$shiparr[$i];					
					$taxprice=$taxprice+$taxarr[$i];
					$discountprice=$discountprice+$discountparr[$i];                    		 
					$shipb=$shipb+$shipprice;	
		
		?>

                                                                    <td><b> ₦ <?=number_format($subtotalarr[$i],2,'.',',')?></b>  </td> 

                                                                    <td> ₦ <?=number_format($taxarr[$i],2,'.',',')?></td> 
																	<?php if(!empty($tax_percent[$i])){ ?>
                                                                    <td> <?php  echo $tax_percent[$i]; ?>%</td> 
																	<?php }else{?>
																		 <td>0 %</td>
																	<?php } ?>
                                                                   <td>₦ <?=number_format($discountprice,2,'.',',')?></td> 

                                                                    <td>₦ <?=number_format(($subtotalarr[$i]+$shipprice),2,'.',',')?></td> 



                                                                </tr>


<?php 
	$taxtotal=$taxtotal+$taxarr[$i];
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
									 $statusorder="select * from $_TBL_STATUS where invoiceid='$orderid' and order_type ='food' order by id desc limit 0,1";
									$db1->query($statusorder);
									$row1=$db1->fetchArray();
									?>
									<form action="" method="post" name="frmstatus" ">
									<input type="hidden" name="invmsg" value="" />
									<input type="hidden" name="jobid" value="<?php echo $row['id'];?>" />
									<input type="hidden" name="submit" value="submit" />
									<input type="hidden" name="invid" value="<?php echo $orderid;?>" id="invid" />
									<input type="hidden" name="custemail" value="<?php echo $db2->getSingleResult("SELECT email_id FROM $_TBL_USER WHERE user_id=".$row['userid']);?>" />
                                                        <div class="form-group col-md-12">



                                                            <label >Status</label>

                                                           
                                                               <select name="jobstatus" class="form-control">
											<option value="0" selected="selected" <?php if($row1['order_status']=="0"){echo "selected";}?>>Pending</option>
											<option value="1" <?php if($row1['order_status']=="1"){echo "selected";}?>>Cancelled</option>
											<option value="2" <?php if($row1['order_status']=="2"){echo "selected";}?> >Confirm</option>
											
											<option value="3" <?php if($row1['order_status']=="3"){echo "selected";}?>>Processed</option>

<option value="3" <?php if($row1['order_status']=="4"){echo "selected";}?>>Hold</option>

											</select>



                                                        </div>

                                                        <div class="form-grou col-md-12">

                                                            <label class="">Comment</label>
<textarea name="comment" cols="3" rows="3" class="form-control"><?php echo $row1['comment'];?></textarea>
                                                           
                                                        </div>

                                                        <div class="form-group text-right">

                                                            <br>
																<?php if($row['order_status']==1){ ?>
					
						<button type="button" class="btn btn-warning btn-icon-fixed" >Closed</button>
						<?php }else{ ?>
                         <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Add Comment</button>
						<?php } ?>

                                                           

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

                                                                         Sub Total <span class="width100">₦<?=number_format(($subtotal-$discountprice),2,'.',',')?></span>

                                                                     </h2>
 
                                                                    <h2 class="text-right">

                                                                         Discount <span class="width100">-₦<?=number_format($discountprice,2,'.',',')?></span>

                                                                     </h2>

                                                                     
                                                                     <h2 class="text-right">

                                                                         Shipping & Handling <span class="width100">₦<?=number_format($shiptotal,2,'.',',')?>
                                                                     </h2>
																	 
																	   <h2 class="text-right">

                                                                        <b>

                                                                         Total Tax <span class="width100">₦<?=number_format($taxtotal,2,'.',',')?></span>

                                                                         </b>

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

                                            <h2>Delivery</h2>

                                            <p>Delivery Details</p>

                                        </div>                                

                                    </div>

                                    <div class="block-content margin-bottom-0">

                                        

                                        <table class="table table-striped table-bordered datatable-extended" id="sortable-data">

		                                    <thead>

		                                        <tr>

		                                            <th>Delivery #</th>

		                                            <th>Delivery to Name</th>

		                                            <th>Delivery Date</th>

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

                                                        Delivery Address

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
 

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Delivery & Handling Information

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

                                                                                <h5 class="title"><span id="order_item_621_title"><?=$prodarray[$i]?></span>
																				</br><span><?=$extra_option_name[$i]?></span>
																				
																				</h5>

                                                                                
                                                                            </div>

                                                                        </div>

                                                                    </td>

                                                                  
                                                                   

                                                                    <td><b> ₦<?=$pricearr[$i]?></b>₦ <?=$extra_option_price[$i]?> </td> 

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

                                                                   <?php if(!empty($tax_percent[$i])){ ?>
                                                                    <td> <?php  echo $tax_percent[$i]; ?>%</td> 
																	<?php }else{?>
																		 <td>0 %</td>
																	<?php } ?>

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
									 $statusorder="select * from $_TBL_STATUS where invoiceid='$orderid' and order_type='food' order by id desc limit 0,1";
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
											<option value="0" <?php if($row['order_status']==0){ echo "selected"; }?> >Pending</option>
											<option value="1" <?php if($row['order_status']==1){ echo "selected"; }?> >Cancelled</option>
											<option value="2" <?php if($row['order_status']==2){ echo "selected"; }?> >confirm</option>
											<option value="3" <?php if($row['order_status']==3){ echo "selected"; }?>  >Processed</option
>											<option value="4" <?php if($row['order_status']==4){ echo "selected"; }?>  >Hold</option>
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

                                                                         Sub Total <span class="width100">₦<?=number_format(($subtotal2-$discountprice2),2,'.',',')?></span>

                                                                     </h2>
 

                                                                    <h2 class="text-right">

                                                                         Discount <span class="width100">-₦<?=number_format($discountprice2,2,'.',',')?></span>

                                                                     </h2>

                                                                    
                                                                     <h2 class="text-right">

                                                                         Delivery & Handling <span class="width100">₦<?=number_format($shiptotal2,2,'.',',')?>
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

                            <h4 class="modal-title" id="modal-large-header">Delivery</h4>

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

                                                                   

                                                                </div>

                                                            </div>

                                                              

                                                        </div>

                                                    </div>

                                                    <!-- END PAGE HEADING -->

                                                </div>



                                                <div class="col-md-6 ordedbox">

                                                    <!-- START PAGE HEADING -->

                                                    <div class="app-heading-container app-heading-bordered top">

                                                       Delivery & Handling Information

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

                                                                                <h5 class="title"><span id="order_item_621_title"><?=$prodarray[$i]?></span>
</br><span><?=$extra_option_name[$i]?></span>
																				
																				</h5>

                                                                                
                                                                            </div>

                                                                        </div>

                                                                    </td>

                                                                  
                                                                    <td><b> ₦<?=$pricearr[$i]?></b> ₦ <?=$extra_option_price[$i]?></td> 

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

                                                                   <?php if(!empty($tax_percent[$i])){ ?>
                                                                    <td> <?php  echo $tax_percent[$i]; ?>%</td> 
																	<?php }else{?>
																		 <td>0 %</td>
																	<?php } ?>

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
$statusorder="select * from $_TBL_STATUS where invoiceid='$orderid' and order_type='food'";
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

                                                                         Sub Total <span class="width100">₦<?=number_format(($subtotal1-$discountprice1),2,'.',',')?></span>

                                                                     </h2>
 
																 <h2 class="text-right">

                                                                         Discount <span class="width100">-₦<?=number_format($discountprice1,2,'.',',')?></span>

                                                                     </h2>

                                                                     
                                                                     <h2 class="text-right">

                                                                         Delivery & Handling <span class="width100">₦<?=number_format($shiptotal1,2,'.',',')?>
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



