<?php include('config.inc.php');
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
$location=$_POST['location'];
$postal_code=$_POST['postal_code'];
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
					 "mobile_no"=>$phoneno1,
					 "password"=>$password,
					 "uniqueid"=>$uniqueid,
					 "country"=>$country,
					 "user_status"=>0,	
					 "joindate"=>date("Y-m-d")

						);
					$whereClause=" email_id='".$emial."' and mobile_no='".$phoneno."'";
					if(matchExists($_TBL_USER, $whereClause))
					{
						 $errMsg='<br>'.$emial.' or '.$phoneno.' &nbsp already &nbsp exist!<br> <br>';
					$status = false;
					$message = $errMsg;
						
					}else{
						$insid=insertData($updatear, $_TBL_USER);

						if($insid>0)
							{
					$updatear1=array(	 
					"user_id"=>$insid,
					"first_name"=>$name,
					"last_name"=>$lastname,
					"dob"=>$dob,
					"gender"=>$gender,
					"address"=>$location,
					"zip_code"=>$postal_code,
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
								
							 $evtstr='<table width="740"  style="border:#666666; size:2px;" align="center" cellpadding="10" cellspacing="0" bgcolor="#666666"  >
  <tr>
    <td valign="top"><table width="94%" border="0" cellspacing="0" cellpadding="0"  align="center"  style="border:#666666; size:2px;" >
      <tr>
        <td><img src="http://orangestate.ng/images/logo.png" style="width:200px" /><br><br></td>
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
                                	 $to=$_REQUEST['email1'];
                                    $from = "c.k.roy90@gmail.com";
                                    $subject="Thank your for registering with Us. You one time OTP: " . $uniqueid;

				                    $msg.='Email: '.$_REQUEST['email1'].'<br><br>';
									$msg.='Name: '.$_REQUEST['name1'].'<br><br>';                                    
									
									$msg.='Phone No.: '.$_REQUEST['phoneno'].'<br><br>';
									$msg.='Password: '.$_REQUEST['password1'].'<br><br>';									
							     	$message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers); 
                    
                    
                    /////////////////////////////////////////Site Admin/////////////////////////////////////////////////////////////
                     $adminto="c.k.roy90@gmail.com";
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
					}else{
					$status = false;
					$message = "unlinked successfully";
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