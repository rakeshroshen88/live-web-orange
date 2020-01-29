<?php include('header.php');
include('chksession.php');
		$sql="SELECT * FROM $_TBL_EVENT where eid=".$_REQUEST['eid'];
		$db->query($sql)or die($db->error());
		$row=$db->fetchArray();	
		$e=$row['edate'];
		  $e31=explode(' ',$e);
		  
		  $e3=explode('-',$e31[0]);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
		  $month_name = date("F", mktime(0, 0, 0, $e3[1], 10));
		  if(!empty($_POST['order'])){
			  
$evtstr='<table width="740"  style="border:#666666; size:2px;" align="center" cellpadding="10" cellspacing="0" bgcolor="#666666"  >
  <tr>
    <td valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0"  align="center"  style="border:#666666; size:2px;" >
      <tr>
        <td><img src="//orangestate.ng/images/logo.png" style="width:200px" /><br><br></td>
      </tr>
      
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="122" valign="top"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF">
              <tr valign="top">
                <td width="50%"><table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                      <td colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;"></span></p>
					  </td>
  </tr>
					  <tr>
                      <td width="60%" colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;">Registration  detail :</span></p>
                        <p>';
$evtstr1.='</p></td>
                    </tr>  
                    </tr>  
                   
                </table></td>
              </tr>
              
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#666666"><table width="100%" border="0" cellpadding="10" cellspacing="0" bgcolor="#666666">
          <tr>
            <td style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000;"><div align="center" style="style4">

</div></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>'; 
$msg.='Email: '.$_REQUEST['emailid'].'<br><br>';
$msg.='Name: '.$_REQUEST['fullname'].'<br><br>';                                  
									
$msg.='Phone No.: '.$_REQUEST['phoneno'].'<br><br>';
$msg.='Address: '.$_REQUEST['address'].'<br><br>';
$msg.='Event : '.$row['etitle'].'<br><br>';
$msg.='Event Address: '.$row['eplace'].'<br><br>';
$msg.='Event Date: '.$row['edate'].'<br><br>';
$msg.='Quantity: '.$_REQUEST['quantity1'].'<br><br>';	
$msg.='Event price: '.$row['price'].'*'.$_REQUEST['quantity1'].'<br><br>';										
$message=$evtstr.$msg.$evtstr1;
//////////////////////////
$updatear1=array(	"user_id"=>'',				
					"first_name"=>$_REQUEST['fullname'],
					"emailid"=>$_REQUEST['emailid'],
					"address"=>$_REQUEST['address'],
					"event_name"=>$row['etitle'],
					"event_address"=>$row['eplace'],
					"event_date"=>$row['edate'],					
					"price"=>$row['price'],
					"quantity"=>$_REQUEST['quantity1'],
					"phoneno"=>$_REQUEST['phoneno']				
					
						);
$insidm=insertData($updatear1, 'event_order');
if($insidm>0)
{

echo $to=$_REQUEST['emailid'];
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "orangestate.ng";//"webdevelopmentcompanyusa.com";  /*SMTP server*/
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;//465;/587/
$mail->Username = "developer@orangestate.ng";  /*Username*/
$mail->Password = "Hello@123dasd@";    /**Password**/

$mail->From = "admin@orangestate.ng";    /*From address required*/
$mail->FromName = "OrangeState";
$mail->AddAddress($to, 'To'); 
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);
 
$mail->Subject = "Thank you for ordering with Us. You one time OTP: " . $uniqueid;
$mail->Body = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}else{
	echo "<script>alert('You have successfully place your event order!');</script>";
}
}
			  
		  }
		  
		?>

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/event-style.css" >
<link rel="stylesheet" href="css/responsive.css" >
 
        <section class="section-page-header">
            <div class="container">
                <h1 class="entry-title">Order Details</h1>
            </div>
        </section>
    
        <section class="section-page-content">
		<form  action="" method="post">
		<input type="hidden" name="order" value="order" />
            <div class="container">
                <div class="row">
                    <div id="primary" class="col-md-6">
                        

                        <div class="contact-event-venue-details">
                                <h3>Your Details</h3>
                                <div class="contact-event-venue-details-info">
                                     <fieldset>
                <!-- Address form --> 
         
                <!-- full-name input-->
                <div class="control-group">
                    <label class="control-label">Full Name</label>
                    <div class="controls">
                        <input id="full-name" name="fullname" type="text" placeholder="full name" required
                        class="form-control">
                         
                    </div>
                </div> 
				<div class="control-group">
                    <label class="control-label">Email Id</label>
                    <div class="controls">
                        <input id="full-name" name="emailid" type="text" placeholder="full name" required
                        class="form-control">
                         
                    </div>
                </div> 
                <!-- address-line1 input-->
                <div class="control-group">
                    <label class="control-label">Address Line 1</label>
                    <div class="controls">
                        <textarea placeholder="Full Address" name="address" class="form-control" cols="5" rows="5"></textarea>
                        <p class="help-block">Street address, P.O. box, company name, c/o</p>
                    </div>
                </div>
                 
                <!-- postal-code input-->
                <div class="control-group">
                    <label class="control-label">Contact Number</label>
                    <div class="controls">
                        <input id="postal-code" name="phoneno" type="text" placeholder="Contact Number"
                        class="form-control"> 
                    </div>
                </div>
                
            </fieldset>
                                </div>
                            </div>

                    </div>  
                    
                    <div id="secondary" class="col-md-6">
                        <div class="section-order-details-event-title">
                            <span class="event-caption"><?=$row['eventcat']?></span>
                            <h2 class="event-title"><strong><?=$row['etitle']?></strong></h2>
                             
                        </div>

                        <div class="section-order-details-event-info">
                            <div class="venue-details">
                                <h3>Venue & Event Information</h3>
                                <div class="venue-details-info">
                                    <p><?=$row['eplace']?></p>
									<?php $timestamp = strtotime($row['edate']);

//echo $day = date('l', $timestamp);?>
                                    <p> <?php echo $date = date('F M Y', $timestamp);?> <span>  <?=$row['etime']?></span></p>
                                </div>
                            </div>
                            
                            <div class="seat-details">
                                <h3>Seats Order Information</h3>
                                <div class="seat-details-info">
                                   <!-- <table class="table seat-row">
                                        <thead>
                                            <tr>
                                                <th>Section</th>
                                                <th>Row</th>
                                                <th>Seats</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>C16-Middle</td>
                                                <td>5</td>
                                                <td>10-12</td>
                                            </tr>
                                        </tbody>
                                    </table> -->   
                                    <table class="table number-tickets">
                                        <thead>
                                            <tr>
                                                <th>Delivery</th>
                                                <th>Number of Tickets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Instant Download</td>
                                                <td>
                                                    <div class="qty-select">
                                                        <div class="qty-minus"> 
                                                            <a class="qty-btn" href="#">-</a>
                                                        </div>
                                                        <div class="qty-input">
               <input type="text" class="quantity-input" name="quantity1" value="1" />
                                                        </div>
                                                        <div class="qty-plus"> 
                                                            <a class="qty-btn" href="#">+</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="seat-details-info-price">
                                    <table class="table total-price">
                                        <tbody>
                                            <tr>
                                                <td>Total Price</td>
                                                <td class="price">₦ <?=number_format($row['price'],2);?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="section-order-details-event-action">
                            <ul class="row">
                                <li class="col-xs-6 col-sm-6">
                                    <a class="secondary-link" href="#">Back</a>
                                </li>
                                <li class="col-xs-6 col-sm-6">
                                    <button type="submit" class="primary-link" href="#">Request for Ticket</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			</form>
        </section>

        
         
          

<?php include('footer.php') ?> 
<script type="text/javascript">
    $("a,section,div,span,li,input[type='text'],input[type='button'],tr,button").on("click", function(){
        
        if ($(this).hasClass("event-map")) { 
            $('.event-map iframe').css("pointer-events", "auto");
        }
        
        if ($(this).hasClass("select-seat")) { 
            $(this).siblings().removeClass("selected");
            $(this).addClass('selected');
        }
        
        if ($(this).hasClass("clearer")) { 
            $(this).prev('input').val('').focus();
            $(this).hide();
        }
        
        if ($(this).hasClass("qty-btn")) { 
            var $button = $(this);
            var oldValue = $button.closest('.qty-select').find("input.quantity-input").val();

            if ($button.text() === "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.closest('.qty-select').find("input.quantity-input").val(newVal);
            return false;
        }
        
        if ($(this).hasClass("closecanvas")) { 
            $("body").removeClass("offcanvas-stop-scrolling");
        }
    });

</script>