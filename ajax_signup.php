<?php include('config.inc.php');
header('Content-type: application/json');
if(!empty($_POST['name1'])){
$name=$_POST['name1'];
$lastname=$_POST['lastname'];
$emial=$_POST['email1'];
$dob=$_POST['dob'];
$dob=date('Y-m-d',strtotime($dob));
$gender=$_POST['gender'];
$state=$_POST['state'];
$phoneno=$_POST['phoneno'];
$country=$_POST['country'];
$countrycode=$_POST['countrycode'];
//$location=$_POST['location'];
//$postal_code=$_POST['postal_code'];
if(!empty($countrycode)){
	$phoneno1=$countrycode.'-'.$phoneno;
}else{
	$phoneno1=$phoneno;
}
$uniqueid=rand(100000,999999);
$p=$_POST['password1'];
$password=base64_encode($_POST['password1']);
					$updatear=array(	 
					 "first_name"=>$name,
					 "last_name"=>$lastname,
					 "email_id"=>$emial,
					 "mobile_no"=>$phoneno,
					 "password"=>$password,
					 "uniqueid"=>$uniqueid,
					 "country"=>$country,
					 "countrycode"=>$countrycode,
					 "user_status"=>0,	
					 "joindate"=>date("Y-m-d")

						);
					$whereClause=" email_id='".$emial."' and mobile_no='".$phoneno1."'";
					if(matchExists($_TBL_USER, $whereClause))
					{
						 $errMsg='<br>'.$emial.' or '.$phoneno1.' &nbsp already &nbsp exist!<br> <br>';
					$status = false;
					$message = $errMsg;
						
					}else{
						$insid=insertData($updatear, $_TBL_USER);

						if($insid>0)
							{
								///////////////////////////
	 $phoneno=$countrycode.$phoneno;
	 //$mobile_no=str_replace(",","",$mobile_no);
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
    CURLOPT_POSTFIELDS => "{\r\"id\":\"357895\",\r\"to\":[\"$phoneno\"],\r\"sender_mask\":\"kirusa\",\r\"body\":\"Your Verificatin code is : $uniqueid\"\r}\r",
    CURLOPT_HTTPHEADER => array(
        "Authorization: PmbPgE671A7MEEMLhZBefasxJ7eXpqV0+SOQdHigyWA=",
        "Content-Type: application/json"
    )
));


								///////////////////////////
					$updatear1=array(	 
					"user_id"=>$insid,
					"first_name"=>$name,
					"last_name"=>$lastname,
					"dob"=>$dob,
					"gender"=>$gender,
					//"address"=>$location,
					//"zip_code"=>$postal_code,
					"state"=>$state,					
					"update_date"=>date("Y-m-d")
						);
				/* ////////////////chat///////////////////////
				$connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e");
				$data = array(
					':username'		=>	$emial,
					':name'		=>	$name,
					':password'		=>	password_hash($p, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO login 
				(username, password, name) 
				VALUES (:username, :password, :name)
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					//$message = "<label>Registration Completed</label>";
				} */
						////////////////////////////////////////
						//print_r($updatear1);
						$insidm=insertData($updatear1, 'user_profile');
								$_SESSION['sess_otp']=$uniqueid;
						
$evtstr='<table class="table_full editable-bg-color bg_color_e6e6e6 editable-bg-image" bgcolor="#e6e6e6" width="100%" align="center" mc:repeatable="castellab" mc:variant="Header" cellspacing="0" cellpadding="0" border="0">
	
	<tbody><tr><td height="70"></td></tr>
	<tr>
		<td>
			
			<table class="table1 editable-bg-color bg_color_303f9f" bgcolor="orange" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
				
				<tbody><tr><td height="25"></td></tr>
				<tr>
					<td>
						
						<table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
							<tbody><tr>
								<td>
									
									<table width="50%" align="left" border="0" cellspacing="0" cellpadding="0">
										<tbody><tr>
											<td align="left" class="editable-img">
												
											</td>
										</tr>
										<tr><td height="22"></td></tr>
									</tbody></table>

									<table width="50%" align="right" border="0" cellspacing="0" cellpadding="0">
									
										<tbody><tr><td height="3"></td></tr>
										<tr>
											<td align="right">
												
											</td>
										</tr>
									</tbody></table>

								</td>
							</tr>

							
							<tr><td height="60"></td></tr>

							<tr>
								<td align="center">
									<div class="editable-img">
										<img editable="true" mc:edit="image009" src="https://orangestate.ng/images/resources/user.png" style="display:block; line-height:0; font-size:0; border:0;" border="0" alt="">
									</div>
								</td>
							</tr>

							
							<tr><td height="40"></td></tr>

							<tr>
								<td align="center" class="text_color_ffffff" style="color: #ffffff; font-size: 30px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												Get Registration Details
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="30"></td></tr>

							<tr>
								<td align="center" class="text_color_ffffff" style="color: #ffffff; font-size: 12px; font-weight: 300; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												'.date('l').', '.date('d-m-Y').'
											</multiline>
										</span>
									</div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
				
				<tr><td height="104"></td></tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td>
			
			<table class="table1 editable-bg-color bg_color_ffffff" bgcolor="#ffffff" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
	
				<tbody><tr><td height="60"></td></tr>

				<tr>
					<td>
						
						<table class="table1" width="520" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">

							<tbody><tr>
								<td align="left" class="center_content text_color_282828" style="color: #282828; font-size: 20px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												Hi '.$name.' '.$lastname.' ,
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="10"></td></tr>

							<tr>
								<td align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												Below to retrieve your Detais
											</multiline>
										</span>';
									$evtstr1='</div>
								</td>
							</tr>

						
							


							
							<tr><td height="20"></td></tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td  align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												Thanks
											</multiline>
										</span>
									</div>
								</td>
							</tr>
							
							<tr><td height="5"></td></tr>

							<tr>
								<td align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
												OrangeState team
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>

							<tr>
								<td  align="left" class="center_content text_color_a1a2a5" style="color: #a1a2a5; font-size: 14px;line-height: 2; font-weight: 500; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text" style="line-height: 2;">
										<span class="text_container">
											<multiline>
											Any questions? Get in touch by <a href="https://orangestate.ng/contact-us.php" target="_blank" class="text_color_303f9f" style="color:#303f9f; text-decoration: none;">&nbsp; Email &nbsp; </a> 
											</multiline>
										</span>
									</div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>

				
				<tr><td height="60"></td></tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td>
			
			<table class="table1" width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
				
				<tbody><tr><td height="40"></td></tr>

			
				
				<tr><td height="70"></td></tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>';
						
					
$msg.='<br>Email: '.$_REQUEST['email1'].'<br>';
$msg.='Name: '.$_REQUEST['name1'].'<br>'; 
$msg.='Phone No.: '.$_REQUEST['phoneno'].'<br>';
$msg.='Password: '.$_REQUEST['password1'].'<br>';									
$message=$evtstr.$msg.$evtstr1;
//////////////////////////
$to=$_REQUEST['email1'];
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
 
$mail->Subject = "Thank you for registering with Us. You one time OTP: " . $uniqueid;
$mail->Body = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
$mail->Send();
/* if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
} */

/////////////////////////
                                 $to=$_REQUEST['email1'];
                                    $from = "admin@orangestate.ng";
                                    $subject="Thank you for registering with Us. You one time OTP: " . $uniqueid;

									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers); 
                    
                    
                   //////////Site Admin////////////
                     $adminto="admin@orangestate.ng";
                    $adminfrom=$_REQUEST['email1'];
                    $querysubject="Registration from user !"; 
                    $adminheaders  = "MIME-Version: 1.0\r\n";
                    $adminheaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $adminheaders .= "From:$adminfrom\r\n";                   
                    @mail($adminto, $subject, $message, $adminheaders);  
                    
                    /////////////////////////////////////////
					 $decoded = base64_encode($insid);
					$_SESSION['sess_webidofotp']=$insid;
					if($insid !== false){
					$status = true;
					$message = "successfully";
					$response = curl_exec($curl);
					$err      = curl_error($curl);
					curl_close($curl);
					}else{
					$status = false;
					$message = "Un successfully";
					}
			
			
								//echo $errMsg='<b>User Added Successfully!</b>';
							}
					
					}
			$response['status']= $status;
			$response['id']= $insid;
			$response['message'] = $message;
			echo json_encode($response);
			die;
					
    }


if(isset($_REQUEST['veryfy']) and $_REQUEST['veryfy']=='veryfy')
 {	
  $uid=$_POST['uid'];
  $sql="select * from ".$_TBL_USER." where email_id='".$_POST['email']."'";
$db->query($sql);
if($db->numRows()>0)
	{
	$result=$db->fetchArray();
	$uid=$result['uniqueid'];
	 $first_name=$result['first_name'];
	 
	$em=$_POST['email'];
		if($result['uniqueid']==$uid)
			{
	 $update=array( "user_status"=>'1');	
	 $where=" email=".$_REQUEST['email'];
	 $sql="update $_TBL_USER set user_status='1' where email_id='$em'";
	mysql_query($sql);
	//updateData($update, $_TBL_USER, $where); 
	echo"<script>alert('Verification successfully done! ! ')</script>";	
			}
			
			$_SESSION['sess_webid']=$result['user_id'];
			$_SESSION['sess_webmail']=$em;	
			$_SESSION['sess_name']=$result['first_name'];
			redirect("get-started.php");
			//auto login/ get start/index/
	} 
 } 

?>