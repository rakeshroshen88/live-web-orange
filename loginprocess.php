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
				 $sub_query = "
				INSERT INTO login_details
	     		(user_id,status)
	     		VALUES ('".$row['user_id']."','Online')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				 $_SESSION['login_details_id'] = $connect->lastInsertId();	
	}}else{
		//////////////chat///////////////////
	 
				 $data = array(
					':username'		=>	$result['email_id'],
					':name'		=>	$result['first_name'],
					':password'		=>	password_hash('12abc', PASSWORD_DEFAULT),
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
				$sub_query = "
				INSERT INTO login_details
	     		(user_id,status)
	     		VALUES ('".$row['user_id']."','Online')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				 $_SESSION['login_details_id'] = $connect->lastInsertId();	
	}} 
/////////////////////////////////////////////////	
		
	}
	/////////////////////////////////////////////////	

			redirect("dashboard.php");

			}else{
			$a="Sorry,You are not Active user, please veryfy your account !";
			$_SESSION['sess_otp']=$uniqueid;
			$_SESSION['sess_webidlogin']=$result['user_id'];
			$_SESSION['sess_webmaillogin']=$result['email_id'];	
			$_SESSION['sess_webidofotp']=$result['user_id'];
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
                                	 $to=$email;
                                    $from = "c.k.roy90@gmail.com";
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

