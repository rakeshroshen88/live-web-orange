<?php 

if(!isset($_SESSION['sess_userid']) or empty($_SESSION['sess_userid']))
	{
	$_SESSION['sess_doc']="login.php";
	}
$err="";
$orderid=$_REQUEST['id'];
$db1=new DB();
if(isset($_GET['errMsg'])){$errMsg=$_GET['errMsg'];}else{$errMsg="";}

if(isset($_POST['submit']))
	{

if($_POST['jobstatus']=="0")
	{
	$sta="Pending";
	}elseif($_POST['jobstatus']=="1"){
	$sta1="Cancelled";
	$cn=$_POST['comment'];
	$sta=$sta1.'-'.$cn;
	}elseif($_POST['jobstatus']=="2"){
	$sta="Conformed";
	}

	
		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//code to implement api
	
$bsql="select * from ".$_TBL_USER." where ser_id=".$_POST['userid'];
$db1->query($bsql);
$billrow=$db1->fetchArray();
$name=$billrow['name'];
$cell=$billrow['cellno'];	
	$ord=$billrow['invid'];
			//Username & Password
			$username = "Abcbooks";
			$password = "jaijai2401";
			
			//API Details
			
			/* $textmsg = "Hi $name !</br>Thanks for shopping Abcbookkart, Exciting to have you here. Your order $ord has been $sta by seller !" ;
			$priority = "ndnd";
			$stype = "normal";

			$data="user=".$username."&pass=".$password."&sender=".$senderID."&phone=".$mobileNo."&text=".$textmsg."&priority=".$priority."&stype=".$stype;
			
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, 'http://promo.smsfresh.co/api/sendmsg.php'); 
			curl_setopt($ch, CURLOPT_POST, true); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$result = curl_exec($ch); 
			curl_close($ch); 
 */
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		}
		?>

<!--Header Ends -->

<!--Big Image -->


<?php 
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
	 $cn=count($prodarray)-1;

$sql="select * from ".$_TBL_BILL." where id=".$row['userid'];
$db1->query($sql);
$shiprow=$db1->fetchArray();


 $bsql="select * from ".$_TBL_USER." where id=".$row['userid'];
$db1->query($bsql);
$billrow=$db1->fetchArray();
?>	
	<table cellpadding="0" cellspacing="5" width="100%">
	<tr><td width="77%" align="left"><strong>User Address</strong></td>
	<td width="23%" align="left" style="padding-right:5px;"><strong>Shipping Address</strong></td>
	</tr>
	<tr><td align="left" valign="top" style="">
    <?php if(!empty($billrow['name'])){ ?>
	Name:<?=$billrow['name']?>	<br />
     <?php }?>
     <?php if(!empty($billrow['address'])){ ?>
	Address:<?=$billrow['address']?><br />
     <?php }?>
     <?php if(!empty($billrow['city'])){ ?>
      
	City:<?=$billrow['city']?><br />
     <?php }?>
     <?php if(!empty($billrow['state'])){ ?>
      
	State: <?=$billrow['state']?><br />
     <?php }?>
     <?php if(!empty($billrow['zip'])){ ?>
	Zip Code:<?=$billrow['zip']?><br />
     <?php }?>
     <?php if(!empty($billrow['phone'])){ ?>
	Phone:<?=$billrow['phone']?><br />
     <?php }?>
	 <?php if(!empty($billrow['email'])){ ?>
	E-Mail:<?=$billrow['email']?><br />
     <?php }?>
	</td>
	<td align="left" valign="top" style="padding-left:5px;">
	<?php if(!empty($shiprow['billing_firstname'])){ ?>
	<?=$shiprow['billing_firstname']?>	<br />
    <?php }?>
    <?php if(!empty($shiprow['billing_lastname'])){ ?>
    <?=$shiprow['billing_lastname']?><br />
     <?php }?>
    <?php if(!empty($shiprow['billing_adress'])){ ?>
	<?=$shiprow['billing_adress']?>	<br />
     <?php }?>
    <?php if(!empty($shiprow['billing_state'])){ ?>
	<?=$shiprow['billing_state']?><br />
     <?php }?>
    <?php if(!empty($shiprow['billing_zip'])){ ?>
	Zip Code:<?=$shiprow['billing_zip']?><br />
     <?php }?>
    <?php if(!empty($shiprow['billing_phone'])){ ?>
	Phone:<?=$shiprow['billing_phone']?><br />
     <?php }?>
    <?php if(!empty($shiprow['billing_email'])){ ?>
	
	E-Mail:<?=$shiprow['billing_email']?><br />
     <?php }?>
	</td></tr>
	</table>

</td></tr>
  <tr>
    <td valign="top">    
    <td height="320" valign="top" align="center">
	<table width="95%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td width="7%" bgcolor="#f2f2f2">Image</td>
        <td width="19%" bgcolor="#f2f2f2">Quantity</td>
        <td width="27%" bgcolor="#f2f2f2">Products</td>
		
		  <td width="13%" bgcolor="#f2f2f2">Product Price</td>
        <td width="12%" bgcolor="#f2f2f2" align="right">Total</td>        
      </tr>
<?php

		for($i=0;$i<$cn;$i++)
				{
?>	  
      <tr>
        
        <td valign="top">
		<?php
		$pic=$db1->getSingleResult("select prod_large_image from ".$_TBL_PRODUCT." where id=".$prodidarr[$i]);
		?>
		<img src="<?php echo $_SITE_PATH.'product/'.$pic;?>" alt="" />		</td>
        <td valign="top">
		<?php 		
		echo $qtyarr[$i];		
		?></td>
        <td valign="top"><strong><?=$prodarray[$i]?></strong></td>
		
		  <td width="13%" valign="top">$<?=$pricearr[$i]?></td>
        <td align="right" valign="top"><strong>$<?=number_format($subtotalarr[$i],2,'.',',')?></strong></td>
       
      </tr>
<?php
	 $subtotal+=$subtotalarr[$i];
	$grand_total+=$subtotalarr[$i];
	
			}
?>	
<?php 
$grand_total=$row['totalprice'];
if(empty($row['used_coupone']))
	{
	$dis='0.00';
	$grand=($subtotal-$dis);
	}else{
	$coup=$db1->getSingleResult("select codeamount from ".$_TBL_COUPON." where promocode='".$row['used_coupone']."'");
	$coup_type=$db1->getSingleResult("select discount_type from ".$_TBL_COUPON." where promocode='".$row['used_coupone']."'");
		if($coup_type=="1")
			{
			$dis=($subtotal*$coup)/100;
			}elseif($coup_type=="0"){
			$dis=$coup;
			}
				//$dis=($subtotal*$coup)/100;
				$grand=($subtotal-$dis);
				}
?>  
      <tr>
       
        <td bgcolor="#F2F2F2">&nbsp;</td>
		<td bgcolor="#F2F2F2">&nbsp;</td>
		<td bgcolor="#F2F2F2" colspan="3" align="right">Sub-Total: $<?=number_format($subtotal,2,'.',',')?></td>
      
      </tr>
	
	  
<?php
$grand_total=$grand;
if(!empty($row['tax']) and $row['tax']!=0.00)
	{
	//$tax=($grand*9.25)/100;
	$grand_total=($grand_total+$row['tax']);	
?>

<?php	}
$grand_total=($grand_total+(int)$shipcharges);
	
?>
     
	  <tr>
       
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td align="right" colspan="3"><strong>Grand Total: $<?=number_format($row['totalprice'],2,'.',',')?></strong></td>
     
      </tr>
<?php } ?>
      <tr>
        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
       <td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
         <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
    	 </table>
	
	 </td>
  </tr>
 </td>
</table>
</div>
<table cellpadding="0" cellspacing="0">
  <tr><td colspan="7" align="center"><input type="button" name="invoice" value="Print" onclick="invprint()" /></td></tr>
  
<?php 
$db2=new DB();
$user="select * from $_TBL_STATUS where invoiceid='$orderid'";
$db1->query($user);
$row1=$db1->fetchArray();
?>
								  <tr>
								  	<td valign="top" align="left" colspan="7" style="padding:30px;">

									<form action="" method="post" name="frmstatus" onsubmit="return validatejob();">
									<input type="hidden" name="invmsg" value="" />
									<input type="hidden" name="jobid" value="<?php echo $row['id'];?>" />
									<input type="hidden" name="invid" value="<?php echo $orderid;?>" id="invid" />
									<input type="hidden" name="userid" value="<?php echo $row['userid'];?>" id="userid" />
									<input type="hidden" name="custemail" value="<?php echo $db2->getSingleResult("SELECT email_id FROM $_TBL_USER WHERE user_id=".$row['userid']);?>" />
										<table align="left" cellspacing="0" >
											<tr>
											<td valign="top">Order Status:</td>
											<td valign="top">
											<select name="jobstatus">
											<option value="0" selected="selected" <?php if($row1['order_status']=="0"){echo "selected";}?>>Pending</option>
											<option value="1" <?php if($row1['order_status']=="1"){echo "selected";}?>>Cancelled</option>
											<option value="2" <?php if($row1['order_status']=="2"){echo "selected";}?>>Conformed</option>
											</select>
											</td>
											</tr>
											<tr>
											<td valign="top">Comment:</td>
											<td valign="top">
											<textarea name="comment" cols="50" rows="10"></textarea></td>
											</tr>
											<tr>
											<td valign="top">Date:</td>
											<td valign="top">
											<?php $jd=explode(" ",$row1['order_status_date']);?>
											
										 <SCRIPT LANGUAGE="JavaScript" ID="js18">
var cal18 = new CalendarPopup("testdiv1");
cal18.setCssPrefix("TEST");
</SCRIPT>
<INPUT TYPE="text" NAME="jobstatusdate" VALUE="<?php echo $jd[0];?>" SIZE=10>
<A HREF="javascript:void(0)" onClick="cal18.select(document.forms['frmstatus'].jobstatusdate,'anchor18','yyyy-MM-dd'); return false;" TITLE="" NAME="anchor18" ID="anchor18"><img src="<?=$_COM_IMGS?>cal.gif" align='top' border="0"></A>
<DIV ID="testdiv1" STYLE="position:absolute;visibility:hidden;background-color: #FFFFFF;layer-background-color:white; *margin-left:600px; margin-left:50px; margin-top:-20px; *margin-top:-10px; "></DIV>
										 </td>
											</tr>
											<tr>
											<td valign="top" colspan="2" align="center">
											<input type="submit" name="submit" value="Submit" /></td>
											</tr>
										</table>
									</form>
								
									</td>
								  </tr>
								
</table>

 