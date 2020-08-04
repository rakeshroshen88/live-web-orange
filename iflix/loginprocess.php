<?php
session_start();
include('chat/database_connection.php');
include("config.inc.php");
 //$errMsg="";
$db1=new DB();
$Password=base64_encode($_POST['txtPassword']);
$Password1=$_POST['txtPassword'];
 $sql1="select * from ".$_TBL_USER." where (email_id='".$_POST['txtUserName']."' or mobile_no='".$_POST['txtUserName']."') and password='".$Password."'";//die;
$db->query($sql1);
if($db->numRows()> 0)
	{
	$result=$db->fetchArray();
	$uniqueid=$result['uniqueid'];
	$email=$result['email_id'];
		if($result['user_status']=='1')
			{
if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("txtUserName",$_POST["txtUserName"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["txtUserName"])) {
setcookie ("txtUserName","");
if(isset($_COOKIE["password"])) {
setcookie ("password","");
				}
			}
}
			$_SESSION['sess_webid']=$result['user_id'];
			$_SESSION['sess_webmail']=$result['email_id'];	
			$_SESSION['sess_name']=$result['first_name'];
////////////////////////////////////
 $query = "
		SELECT * FROM login
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $result['email_id']
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
				
				
				
				/* $sqld = "DELETE   FROM login_details WHERE  f_userid='".$result['user_id']."'";
				$stmt3 = $connect->prepare($sqld);				 
				$stmt3->execute(); */
				//////////
				 $querynew = "SELECT login_details_id FROM login_details WHERE f_userid = '".$result['user_id']."'";					
				$statement = $connect->prepare($querynew);
				$statement->execute();
				$login_details_id = $statement->fetch();
				//print_r($login_details_id);
				$login_details_id=$login_details_id[0];
				$_SESSION['login_details_id'] = $login_details_id;	
				$dats=date('Y-m-d h:i:s');
				//,last_activity='".$dats."'
				if($login_details_id > 0){
				 $query2 = "UPDATE login_details SET status = 'Online' WHERE f_userid = '".$result['user_id']."'";
				$stmt3 = $connect->prepare($query2);				 
				$stmt3->execute();
				}else{		
					$sub_query = "
				INSERT INTO login_details
	     		(user_id,f_userid,status)
	     		VALUES ('".$row['user_id']."', '".$result['user_id']."','Online')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				  /* $sub_query = "UPDATE login_details SET status = 'Online' WHERE f_userid = '".$result['user_id']."'";
				$statement = $connect->prepare($sub_query);
				$statement->execute(); */
				 
				}
	}
	}else{
		//////////////chat///////////////////
	 
				 $data = array(
					':username'		=>	$result['email_id'],
					':name'		=>	$result['first_name'],
					':password'		=>	'123', 
					':f_userid'		=>	$result['user_id']
				);
				 $query = "
				INSERT INTO login 
				(username, password, name, f_userid) 
				VALUES (:username, :password, :name, :f_userid)
				";
				$statement = $connect->prepare($query);
				$statement->execute($data);  
				$user_id=$connect->lastInsertId();
				//////////////////////////////////	
				$_SESSION['user_id'] = $user_id;
				$_SESSION['username'] = $result['email_id'];
			$sub_query = "
				INSERT INTO login_details
	     		(user_id,f_userid,status)
	     		VALUES ('".$user_id."', '".$result['user_id']."','Online')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				 $_SESSION['login_details_id'] = $connect->lastInsertId();
				 //////////////////////////////
	 
 	
	}
	/////////////////////////////////////////////////	

			redirect("dashboard.php");

			}else{
			$a="Sorry,You are not Active user, please veryfy your account !";
			$_SESSION['sess_otp']=$uniqueid;
			$_SESSION['sess_webidlogin']=$result['user_id'];
			$_SESSION['sess_webmaillogin']=$result['email_id'];	
			$_SESSION['sess_webidofotp']=$result['user_id'];
			$uniqueid1=$result['uniqueid'];
			$mobile_no=$result['mobile_no'];
			$mobile_no=str_replace(",","",$mobile_no);
			//////////////////////////////////////////
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

Mobile No:-  +91 000 000 750<br>

</div></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>';

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
    CURLOPT_POSTFIELDS => "{\r\"id\":\"357895\",\r\"to\":[\"$mobile_no\"],\r\"sender_mask\":\"kirusa\",\r\"body\":\"Your Verificatin code is : $uniqueid\"\r}\r",
    CURLOPT_HTTPHEADER => array(
        "Authorization: PmbPgE671A7MEEMLhZBefasxJ7eXpqV0+SOQdHigyWA=",
        "Content-Type: application/json"
    )
));

$response = curl_exec($curl);
$err      = curl_error($curl);

curl_close($curl);
 
                                	 $to=$email;
                                    $from = "signup@orangestate.ng";
                                    $subject="Thank your for registering with Us. You one time OTP: " . $uniqueid;
//$msg.=$_SITE_PATH('').'<br><br>';
				                    $msg.='Email: '.$email.'<br><br>';
																	
							     	$message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers); 
                    
                    
                    //////////////////////////////
			
			/////////////////////////////////////////
			$nonce='decode';
			$encoded = base64_encode($a);
			$decoded = base64_decode($a);
			//redirectpage("sign-in.php?msg=".$encoded);
			redirectpage("veryfyotp.php?msg=".$encoded);
			die();
			}
	}else{
		
		 $a="Invalid E-mail or Password";
		 $nonce='decode';
		 $encoded = base64_encode($a);
		 $decoded = base64_decode($a);
		 redirectpage("index.php?msg=".$encoded);
	die();
	
	}
?>

