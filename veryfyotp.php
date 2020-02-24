<?php include('header.php');

if($_POST['submit1']=='Verify Contact & Continue')
 {	 
  $uid=$_POST['uid'];
   $sql="select * from ".$_TBL_USER." where email_id='".$_POST['email1']."'";
$db->query($sql);
if($db->numRows()>0)
	{
	$result=$db->fetchArray();
	$uid=$result['uniqueid'];
	$first_name=$result['first_name'];	 
	 $em=$_POST['email1'];
	$otp=$_POST['otp'];
	if($result['uniqueid']==$otp)
	{
		////////////////////////////
	 $update=array( "user_status"=>'1');	
	 $where=" email_id=".$_REQUEST['email1'];
	 $sql1="update $_TBL_USER set user_status='1' where email_id='$em'";
	 $db->query($sql1);
	 $dataupdate=updateData($update, $_TBL_USER, $where); 
	 ////////////////////////////////////
	 //////////////chat///////////////////
	  $connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e");
				//////////////chat///////////////////
	 
				 $data = array(
					':username'		=>	$result['email_id'],
					':name'		=>	$result['first_name'],
					':password'		=>	'123', //password_hash('12abc', PASSWORD_DEFAULT),
					':f_userid'		=>	$result['user_id']
				);
				$query = "
				INSERT INTO login 
				(username, password, name, f_userid) 
				VALUES (:username, :password, :name, :f_userid)
				";
				$statement = $connect->prepare($query);
				$statement->execute($data);  
	//////////////////////////////////	
	 
 $query = "
		SELECT * FROM login
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_REQUEST['email1']
		)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result1 = $statement->fetchAll();
		foreach($result1 as $row)
		{
			 $_SESSION['user_id'] = $row['user_id'];
			 $_SESSION['username'] = $row['username'];
			 //////////////DELETE login_details////////////////////
				 $sqld = "DELETE   FROM login_details WHERE  f_userid='".$result['user_id']."'";
				$stmt3 = $connect->prepare($sqld);				 
				$stmt3->execute();
				//////////
				$sub_query = "
				INSERT INTO login_details
	     		(user_id,f_userid,status)
	     		VALUES ('".$row['user_id']."', '".$result['user_id']."','Online')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				 $_SESSION['login_details_id'] = $connect->lastInsertId();	
	}} 
/////////////////////////////////////////////////	
	 echo"<script>alert('Verification successfully done! ! ')</script>";	
		
			
			$_SESSION['sess_webid']=$result['user_id'];
			$_SESSION['sess_webmail']=$em;	
			$_SESSION['sess_name']=$result['first_name'];
			redirect("get-started.php");
			//auto login/ get start/index/
			}else{
				
				$errMsg="incorrect otp";
			}	
	} 
 } 
 /////////resend//////////
if($_POST['resend']=='resend')
 {	 

  $sqlo="select * from ".$_TBL_USER." where email_id='".$_POST['emailresend']."'";
$db->query($sqlo);
if($db->numRows()>0)
	{
	$result=$db->fetchArray();
	 $uniqueid1=$result['uniqueid'];
	 $mobile_no=$result['mobile_no'];
	 $mobile_no=str_replace(",","",$mobile_no);
	 //////////////////////////////////////
	 
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://konnect.kirusa.com/api/v1/Accounts/9wT_SbF8UPiIPAx+w1IpNA==/Messages",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\"id\":\"357895\",\r\"to\":[\"$mobile_no\"],\r\"sender_mask\":\"kirusa\",\r\"body\":\"Your Verificatin code is : $uniqueid1\"\r}\r",
    CURLOPT_HTTPHEADER => array(
        "Authorization: PmbPgE671A7MEEMLhZBefasxJ7eXpqV0+SOQdHigyWA=",
        "Content-Type: application/json"
    )
));

$response = curl_exec($curl);
$err      = curl_error($curl);

curl_close($curl);

/* if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
} */
	 //////////////////////////////////////
			$evtstr='<table width="740"  style="border:#666666; size:2px;" align="center" cellpadding="10" cellspacing="0" bgcolor="#666666"  >
  <tr>
    <td valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0"  align="center"  style="border:#666666; size:2px;" >
      <tr>
        <td><img src="images/logo.png" style="width:200px" /><br><br></td>
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

	

</h6>



</div></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>'; 
                                	 $to=$_POST['emailresend'];
                                    $from = "c.k.roy90@gmail.com";
                                    $subject="You one time OTP: " . $uniqueid1;
//$msg.=$_SITE_PATH('').'<br><br>';
				                    $msg.='Email: '.$_POST['emailresend'].'<br><br>';
									$msg.='You one time OTP: '.$uniqueid1.'<br><br>';								
							     	 $message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers); 
                    $errMsg='Otp send on your Email !';
                    
                    //////////////////////////////
 }}
?>
  
<font color="#FF0000" size="+1" face="Arial Black, Gadget, sans-serif"><center>
 <?php 

$decoded = base64_decode($_GET['msg']);
if(!empty($decoded)){echo $decoded;}
//$uid=base64_decode($_GET['vid']);
  $sql="select * from ".$_TBL_USER." where user_id=".$_SESSION['sess_webidofotp'];
$db->query($sql);
if($db->numRows()>0)
	{
	$result=$db->fetchArray();
	$email_id=$result['email_id'];
	}
					if(!empty($errMsg))
						{
							echo '<br />';
						echo $errMsg;
						echo '<br />';
						}
						//echo $_SESSION['sess_otp'];
					?></center>
</font>
 
<style type="text/css">

	.chatfeature-leftbar{display: none}
	.otp-box{    width: 555px;   margin:0 auto;     margin-top: 50px;	  background-color: #fff;
    border: 1px solid #ccc;    border-radius: 4px; padding: 25px}
	.otp-box h3{     line-height: 20px;
		font-size: 18px;
    font-weight: bold;
    min-height: 20px;
    padding-bottom: 2px;
    border-bottom: 1px solid #ccc;
    vertical-align: bottom;
    padding-bottom: 8px;
    margin-bottom: 18px;}
	.otp-box p{padding-bottom: 20px;}
	.otp-box .max-width-60{    width: 60px;}
	.otp-box input[type="submit"]{    color: #ffffff;
    font-size: 16px;
    background-color: #ff5e00;
    padding: 12px 27px;
    border: 0;
    font-weight: 500;
    margin-top: 30px;}
	.otp-box{}
	.resent-otp-btn{	font-size: 14px;}
	strong{font-weight: bold}
</style>

<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							 <div class="col-md-12 text-center">
							 		<div class="otp-box text-left">
							 			<h3>Enter the code from the SMS/email message</h3>
							 			<p>Let us know if this email belongs to you. Enter the code in the SMS sent to <strong><?=$email_id?></strong> </p>
							 			<form name="forpass" action="" method="post">
									       <input type="hidden" name="email1" value="<?=$email_id?>" />
										   <input type="hidden" name="uid" value="<?=$_SESSION['sess_webidofotp']?>" />
										   <input type="hidden" name="veryfyotp" value="veryfyotp" />
								 			OGS-<input name="otp"  class="max-width-60" type="text" size="50" style="height:25px;" required />

								 			 
								 			<input name="send" type="hidden" value="save">
								 			<br/>
								 			<br/>
								 			<a class="resent-otp-btn" id="resend" href="javascript:void(0);" onclick="document.getElementById('myotp').submit()">Did you not get the OTP?</a>
											<br/>
								 			<input type="submit" name="submit1" id="submit1" value="Verify Contact & Continue">
								 		</form>


							 		</div>


							 </div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>

 <form name="myotp" id="myotp" action="" method="post">
									       <input type="hidden" name="emailresend" value="<?=$email_id?>" />
										    <input type="hidden" name="email1" value="<?=$email_id?>" />
										   <input type="hidden" name="uid" value="<?=$_SESSION['sess_webidofotp']?>" />
										   <input type="hidden" name="resend" value="resend" />
								 			
								 			
								 		
								 		</form>


 <script>
 jQuery(document).on("click", "#resend", function(e){
	//var cid = jQuery(this).attr('cid');
	$(".wishlistcartemoji").css("display", "none");
	$(".wishlistcartemoji").hide();
	
	

}	);
</script>

<style>
	header nav,header .user-account{display: none}
</style>

<?php include('footer.php');?>