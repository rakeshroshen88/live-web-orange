<?php 
include_once("config.inc.php");
include('chksession.php');
/*  if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				}  */
//$connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e");
$dbu=new DB();				
$followid=$_POST['followid'];
$user_id=$_SESSION['sess_webid'];
$sql="SELECT * from friendrequest where user_id=".$_SESSION['sess_webid']." and request_fid=".$followid;
$db->query($sql);
if($db->numRows()>0)
{
 echo $regmsg="Already Sent!";
}else{
		
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"request_fid"=>$followid,							
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'friendrequest');
	 ////////notification//////////////
	 $notarr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"f_userid"=>$followid,	
							"notification_type"=>'friend_request',
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $not=insertData($notarr, 'notification');
	 /////////////////Mail//////////////////
	 $userimage=$db->getSingleResult('select image_id from user_profile where user_id='.$_SESSION['sess_webid']);
	  $email_id=$db->getSingleResult('select email_id from all_user where user_id='.$followid);
	 $name=$db->getSingleResult('select first_name from all_user where user_id='.$followid);
	 $lastname=$db->getSingleResult('select last_name from all_user where user_id='.$followid);
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
										<img src="https://orangestate.ng/upload/'.$userimage.'" style="width:80px; height: 80px; border-radius: 50%;"/>
									</div>
								</td>
							</tr>

							
							<tr><td height="40"></td></tr>

							<tr>
								<td align="center" class="text_color_ffffff" style="color: #ffffff; font-size: 30px; font-weight: 700; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;">
									<div class="editable-text">
										<span class="text_container">
											<multiline>
												Friend Request
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
												'.$_SESSION['sess_name'].' wants to be friends on OrangeState
											</multiline>
										</span>
									</div>
								</td>
							</tr>

							
							<tr><td height="20"></td></tr>
							<tr><td valign="middle" style="color: #ffffff; font-size: 16px; font-weight: 600; font-family: lato, Helvetica, sans-serif; mso-line-height-rule: exactly;" class="text_color_ffffff">
												<div class="editable-text">
													<span class="text_container">
														<multiline>
																<a href="https://orangestate.ng/confirm_frq.php?followid='.$followid.'&user_id='.$user_id.'" target="_blank" class="text_color_303f9f" style="color:#303f9f; text-decoration: none;  display: inline-block;
  border-radius: 4px; background-color: #f4511e; border: none; color: #FFFFFF; text-align: center; font-size: 28px; padding: 0px; width: 190px; transition: all 0.5s;
  cursor: pointer; margin: 5px;">&nbsp; Accept &nbsp; </a>
														</multiline>
													</span>
												</div>
											</td>
										</tr><tr><td height="20"></td></tr>

							
						
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
						
				
									
 $message=$evtstr.$evtstr1;
//////////////////////////
$to=$email_id;

/////////////////////////////////////////////

                                    $from = "support@orangestate.ng";
                                    $subject=$_SESSION['sess_name']." wants to be friends on OrangeState";
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers);


////////////////////////////////////////////
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
 
$mail->Subject = $_SESSION['sess_name']." wants to be friends on OrangeState";
$mail->Body = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
//$mail->Send();
 if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
//exit;
}
	 
	 //////////////chat///////////////////
	 
				/*  $data = array(
					':username'		=>	$emailid,
					':name'		=>	$userrow['first_name'],
					':password'		=>	password_hash('12abc', PASSWORD_DEFAULT),
					':f_userid'		=>	$followid,
				);
				$query = "
				INSERT INTO login 
				(username, password, name, f_userid) 
				VALUES (:username, :password, :name, :f_userid)
				";
				$statement = $connect->prepare($query);
				$statement->execute($data);   */
	//////////////////////////////////	
 ////////////////////////////////////
/* $query = "
		SELECT * FROM login
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $userrow['first_name']
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
				$sub_query = "
				INSERT INTO login_details
	     		(user_id,status)
	     		VALUES ('".$row['user_id']."','Online')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				 $_SESSION['login_details_id'] = $connect->lastInsertId();	
	}} */
/////////////////////////////////////////////////
	 echo $regmsg="Request Sent";	
}
	 
//}
?>