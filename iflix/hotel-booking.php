<?php include('header.php');
include('chksession.php');
$id=base64_decode($_REQUEST['hid']);
$db2=new DB();
$db3=new DB();
$sql="SELECT * FROM $_TBL_HOTEL WHERE id=$id";
$db->query($sql)or die($db->error());
$row=$db->fetchArray();
$cid=$row['cityid'];
$sid=$row['stateid'];
$title=$row['title'];
 $city=$db2->getSingleResult("select cityname from cities where id=".$cid);
 $state=$db2->getSingleResult("select title from $_TBL_STATE where id=".$sid);
$sql3="SELECT * FROM hotellist WHERE title='$title'";
$db3->query($sql3)or die($db3->error());
$row3=$db3->fetchArray();

/////////////////////////////////////////////////////////////

		$e=$row['date'];
		  $e31=explode(' ',$e);
		  
		  $e3=explode('-',$e31[0]);
		  $edate=$e3[1].'/'.$e3[2].'/'.$e3[0];
		  $month_name = date("F", mktime(0, 0, 0, $e3[1], 10));
		 // print_r($_POST);
		  if(!empty($_POST['order'])){
///////////////////
  $us="select * from ".$_TBL_USER." where user_id=".$_SESSION['sess_webid'];
  $db->query($us);
  $db->numRows(); 
  $user_row=$db->fetchArray();
   $orderid=(string)rand(10000,999999).rand(100,9999).$_SESSION['sess_webid'];
$whereClause=" orderid='".$orderid."'" ;	
if(matchExists('event_order', $whereClause))
		{
			
		      $orderid=(string)rand(1000,99999).$_SESSION['sess_webid'];
		}
		echo $_SESSION['sess_orderid']=$orderid;
///////////////////			  
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
                      <td width="60%" colspan="4" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #003300;"><p><span style="font-size:16px;font-weight: bold;color: #333333;">Event details :</span></p>
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
$msg.='Hotel : '.$row['title'].'<br><br>';
$msg.='Check in: '.$_REQUEST['checkin'].'<br><br>';
$msg.='Check out: '.$_REQUEST['checkout'].'<br><br>';
$msg.='Rooms: '.$_REQUEST['rooms'].'<br><br>';	

//////////////////////////
$startTimeStamp = strtotime($_REQUEST['checkin']);
$endTimeStamp = strtotime($_REQUEST['checkout']);

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);
$total=($numberDays*$row['price']*$_REQUEST['rooms']);//$_REQUEST['night']*$row['price'];
$msg.='Total price: '.$total.'<br><br>';										
$message=$evtstr.$msg.$evtstr1;
$totalvat=intval(($total*7.5)/100);
$_SESSION['hotelfinalamoun']=$total+$totalvat;
$dob=$_POST['dob'];
$dob=date('Y-m-d',strtotime($dob));
$checkin=$_POST['checkin'];
$checkin=date('Y-m-d',strtotime($checkin));
$checkout=$_POST['checkout'];
$checkout=date('Y-m-d',strtotime($checkout));
$updatear1=array(	"user_id"=>$_SESSION['sess_webid'],				
					"first_name"=>$_REQUEST['fullname'],
					"last_name"=>$_REQUEST['lname'],
					"emailid"=>$_REQUEST['emailid'],
					"address"=>$_REQUEST['address'],
					"hotel_name"=>$row['title'],
					"hotel_ID"=>$row['id'],
					"hotel_address"=>$row['address'],
					"dob"=>$dob,	
					"from_date"=>$checkin,						
					"to_date"=>$checkout,
					"price"=>$row['price'],
					"guest"=>$_REQUEST['guest'],
					"phoneno"=>$_REQUEST['phoneno'],
					"rooms"=>$_REQUEST['rooms'],
					"orderid"=>$orderid,
					"total_days"=>$numberDays,
					"ipaddress"=>$_SERVER['REMOTE_ADDR'],
					"payment_status"=>'no',
					"totalamount"=>$total,
					"tax_amt"=>$totalvat,
					"country"=>$_REQUEST['country'],
					"book_date"=>date('Y-m-d')
					
						);
$insidm=insertData($updatear1, 'hotel_order');
if($insidm>0)
{
$updatear2=array(	"user_id"=>$_SESSION['sess_webid'],				
					"hotel_id"=>$row['id'],
					"room_type"=>$_REQUEST['room_type'],
					"start_date"=>$checkin,
					"end_date"=>$checkout,
					"status"=>'0',
					"orderid"=>$orderid );
					
$insid12=insertData($updatear2, 'book_room_of_hotel');
$to=$_REQUEST['emailid'];
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
 
$mail->Subject = "Thank you for ordering with Us.";
$mail->Body = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
$mail->Send();
/* if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}else{ */
	redirect("hotel_payment.php");
	echo "<script>alert('You have successfully place your event order!');</script>";
//}
}
			  
		  }
$dbn=new DB();
						$sqln="select * from user_profile where user_id =".$_SESSION['sess_webid'];
						$dbn->query($sqln);
						$profilerow=$dbn->fetchArray();  
		?>


 <form name="" action="" method="post" >  
 <section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>RESERVATION</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Booking</li>
                </ul>
            </nav>
        </div>
    </div>
</section>


<section class="content reservation-main bookinghotelService">
    <div class="container">
        <div class="reservation-links text-center">
            <h2 class="mar-bottom-60 text-capitalize">Make Your Reservation</h2>
            <div class="reservation-links-content">
                <div class="res-item">
                    <a href="availability.html" class="active"><i class="fa fa-check"></i></a>
                    <p>Check Availability</p>
                </div>
                <div class="res-item">
                    <a href="room-select.html" class="active"><i class="fa fa-check"></i></a>
                    <p>Select Room</p>
                </div>
                <div class="res-item">
                    <a href="booking.html" class="active">3</a>
                    <p>Booking</p>
                </div>
                <div class="res-item">
                    <a href="confirmation.html">4</a>
                    <p>Confirmation</p>
                </div>
            </div>
        </div>
        <div class="booking">
            <div class="row">
                <div class="col-md-8">
                    <div class="booking-content">
                        <div class="booking-image">
                            <?php if(!empty($row['picture'])){ ?>
                            <img src="<?=$_SITE_PATH?>holi/<?=$row['picture']?>" class="d-block w-100" alt="image">
						<?php }else{ ?>
						<img src="img/room1.jpg" alt="image" class="d-block w-100">
						<?php }?>
                            <div class="booking-title">
                                <div class="title-left">
                                    <h3><?=$row['title']?></h3>
                                    <div class="rating">
                                       <!-- <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>-->
										 <span><?php if($row['starrating']==1) {?>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				
				<?php }elseif($row['starrating']==2){?>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<?php }elseif($row['starrating']==3){?>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<?php }elseif($row['starrating']==4){?>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star bk"></i>
				<?php }elseif($row['starrating']==5){?>
			<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<i class="fa fa-star yl"></i>
				<?php }else{?>
					
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
				<i class="fa fa-star bk"></i>
					
			<?php	}?></span>
			
                                    </div>
                                </div>
                                <div class="title-right pull-right">
                                    <div class="title-price">
                                        <h4 class="pad-top-15"><a href="#">₦<?=$row['price']?><span>/Night</span></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="booking-desc mar-top-50">
                             <div class="row">
			<?php  				if(!empty($row['amenities'])){
								$a=explode(',' , $row['amenities']);
								$b=count($a);
								for($i=0;$i<$b;$i++){
								$sql3="SELECT * FROM $_TBL_AMENITIES WHERE status='1' and id=".$a[$i];
								$db2->query($sql3)or die($db2->error());
								if($db2->numRows()>0)	
								{
								$imagerow1=$db2->fetchArray();
						?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <?=$imagerow1['icon']?>
                        </div>
                        <h4><?=$imagerow1['title']?></h4>
                    </div>
                </div>
			<?php }} }	?>
		 <div class="section-title">
            <h3><span>Room Amenities</span></h3>
        </div>	
			
			<?php  	
			//print_r($row['facilityid']);
			if(!empty($row['facilityid'])){
			$a1=explode(',' , $row['facilityid']);
								$b1=count($a1);
								for($i1=0;$i1<$b1;$i1++){
								 $sql3="SELECT * FROM facility WHERE status='1' and id=".$a1[$i1];
								$db->query($sql3)or die($db->error());
								if($db->numRows()>0)	
								{
								$imagerow2=$db->fetchArray();
						?>	
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <?=$imagerow2['icon']?>
                        </div>
                        <h4><?=$imagerow2['title']?></h4>
                    </div>
                </div>
			<?php }} }	?>
				<!--
				<div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </div>
                        <h4>Transport</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                        </div>
                        <h4>Free wifi</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-bath" aria-hidden="true"></i>
                        </div>
                        <h4>Laundry service</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                        </div>
                        <h4>Quick service</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <h4>City map</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                        </div>
                        <h4>Swimming pool</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <h4>Smoking free</h4>
                    </div>
                </div>
            
			-->
			</div>
     

                            <p><?=$row['detail']?> </p>
							
                        </div>
                        <!--<div class="extra-services mar-top-50">
                            <h4 class="mar-bottom-30">Add Extra Services</h4>
                            <ul>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>10 Bedrooms</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>Wifi</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>Television</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>Hot Water</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>Dinner</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>Quick Services</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>A/C</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>Laundry Services</label>
                                            </span>
                                    </span>
                                </li>
                                <li>
                                    <span class="pretty p-default p-thick p-pulse mar-bottom-15">
                                            <input type="checkbox">
                                            <span class="state p-warning-o">
                                                <label>AirPort Taxi</label>
                                            </span>
                                    </span>
                                </li>
                            </ul>
                        </div>-->
                        <div class="personal-info mar-top-50">
                            <div class="form-title">
                                <span>1</span>
                                <h4 class="mar-bottom-30">Personal Information</h4>
                            </div>
                        <input type="hidden" name="roomsprice"   id="roomsprice"  value="0">
						
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="fullname" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Last Name" name="lname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="dob" placeholder="DOB">
                                        </div>
                                    </div>
									<?php $makearr=array();
$makearr=getValuesArr( "countries", "countries_id","countries_name","", "" );?>
                                    <div class="col-md-6">
                                       
                                            <?php echo createComboBox($makearr,"country", ""," id='country' class='form-group'")?>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="emailid" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phoneno" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mar-0">
                                            <textarea placeholder="Message" name="address"></textarea>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                        <div class="card-info mar-top-50">
                            <!--<div class="form-title">
                                <span>2</span>
                                <h4 class="mar-bottom-30">Payment Information</h4>
                            </div>-->
                            
                                <div class="row">
                                  
                                   <!--
                                    <div class="col-md-3">
                                        <div class="form-group radio-group">
                                            <input type="radio">Via Credit Card
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group radio-group">
                                            <input type="radio">Via Paypal
                                        </div>
                                    </div>-->
                                    <div class="col-md-12 mar-top-15">
                                        <div class="form-group mar-bottom-30">
                                            <input type="checkbox"> I agree to the <a href="#">Terms and Conditions</a>
                                        </div>
                                        <div class="card-btn">
										<input type="hidden" name="order" value="order" />
										<input type="submit" name="CONFIRM" value="CONFIRM BOOKING" class="btn btn-orange" />
                                            <!--<a href="hotel-confirmation.php" class="btn btn-orange">CONFIRM BOOKING</a>-->
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
				
                <div class="col-md-4">
                    <div class="detail-sidebar">
                        <div class="sidebar-reservation">
                            <h3>Your reservation</h3>
                            <div class="reservation-detail">
							 <div class="price-table ">
                                    <h4>Price and Rates(/Night)</h4>
									 <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
                                    <thead>
                                        <tr>										<th>Room Image</th>
                                            <th>Title</th>
											<th>Price</th>
                                           
                                            <th>No of Rooms</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$ct=1;
 $sql="SELECT * from hotel_rooms order by id desc";
	$db->query($sql);
	
	if($db->numRows()>0)
		{
	while($row=$db->fetchArray()){
	
	
?>	
<tr>
						<td><?php if(!empty($row['picture'])){ ?>
									   <img src="upload/<?=$row['picture']?>" height="100" width="100"/> 
									   <?php }else{ ?>
										    <img src="upload/noimage.jpg" height="100" width="100"/> 
									   <?php } ?></td>
                        <td><?=$row['title']?></td>
							
                       <td> <?=$row['price']?>.00</td>
						
                      <td> <input type="radio" name="room_type" value="<?=$row['title']?>"   price="<?=$row['price']?>" required /> <?=$row['title']?>
				
					</td>
                           
                       
                     </tr>

								
                                      
	<?php $ct=$ct+1; } } ?>  
                                    </tbody>
                                </table>

                            </div>

                                <div class="rd-top">
                                    <div class="rd-box">
                                        <label>Check in</label>
										<input type="date" name="checkin" id="checkin" required>
                                        <!--<p class="bold">04</p>
                                        <p>August, 2019
                                            <br>Monday</p>-->
                                    </div>
                                    <div class="rd-box">
                                        <label>Check out</label>
                                       <input type="date" name="checkout" id="checkout" required>
                                    </div>
                                </div>
                                <div class="rd-top">
                                    <div class="rd-box">
                                        <p class="bold"><input type="text" name="guest" required></p>
                                        <p>Guest</p>
                                    </div>
                                    <div class="rd-box">
                                       <p class="bold"><input type="text" name="rooms"   id="rooms"  required></p>
                                        <p>No of Room</p>
										<span id="error_rooms"></span>
                                    </div>
                                </div>
                            </div>							<script type="text/javascript">            $('document').ready(                function(){                    $('input:radio').click(                        function(){                          							var price = $('input[name="room_type"]:checked').attr("price");							$('#roomsprice').val(price);                        }                    );                  }            );
			$("#rooms").focusout(function(){
				var checkin = $('#checkin').val();
				var checkout = $('#checkout').val();
				var rooms = $('#rooms').val();
				var roomsprice = $('#roomsprice').val();
    		if($(this).val()==''){
				
        		 $(this).css("border-color", "#FF0000");
        			//$('#submit').attr('disabled',true);
        			$("#error_rooms").text("* You have to enter No of rooms!"); 
        	}
        	else
        	{
				const date1 = new Date(checkin);
const date2 = new Date(checkout);
const diffTime = Math.abs(date2 - date1);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
var totalvalue= diffDays * rooms * roomsprice;
var totalvat= (totalvalue * (75/10))/100;
var totalamt= totalvalue + totalvat;
$('#tv').html('');
$('#tv').html(totalvalue);
$('#tax').html('');
$('#tax').html(totalvat);
$('#gt').html('');
$('#gt').html(totalamt);				
				
        		$(this).css("border-color", "#2eb82e");
        		$('#submit').attr('disabled',false);
        		$("#error_dob").text("");
        	}
       }); 
							</script>
                            <table class="reservation-table table">
                                <tbody>
                                    <tr>
                                        <td>Total Value</td>
                                        <td>₦<span id="tv">0</span>.00</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>₦<span id="tax">0</span>.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Grand Total</td>
                                        <td>₦<span id="gt">0</span>.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="sidebar-support">
                            <h3>Help and Support</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut arnare</p>
                            <p><i class="fa fa-phone"></i> 977 - 222 - 444 - 666</p>
                        </div>
                    </div>
                </div>
				 
            </div>
        </div>
    </div>
</section>
</form>
<script>$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
		day1 = '0' + day.toString()+1;
    
    var minDate= year + '-' + month + '-' + day;
	 var minDate1= year + '-' + month + '-' + day1;
    
    $('#checkin').attr('min', minDate);
	$('#checkout').attr('min', minDate1);
});</script>

  

    <?php include('footer.php') ?>


    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        $('#date-range2').datepicker({
            uiLibrary: 'bootstrap'
        });

        $('#date-range3').datepicker({ 
            uiLibrary: 'bootstrap'
        });
    </script>
     
    
    <script>
       
     $('#myCarousel11').carousel({
        interval:   4000
    });
    </script> 

