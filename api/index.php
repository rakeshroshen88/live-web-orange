 
<?php


header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header("Content-Type: application/json; charset=UTF-8");


require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->post('/login','login'); /* User login */
$app->post('/signup','signup'); /* User Signup  */ 
$app->post('/verifyotp','verifyotp'); /* User verifyotp  */
$app->post('/userdetails','userdetails'); /* User userdetails  */
$app->post('/getcommentlist','getcommentlist'); /* User getcommentlist  */
$app->post('/feed','feed'); /* User Feeds  */ 
$app->post('/createpost','createpost'); /* User createpost  */
$app->post('/updatepost','updatepost'); /* User createpost  */
$app->post('/feelingcategories','feelingcategories'); /* User feelingcategories  */
$app->post('/post_like','post_like'); /* User feelingcategories  */
$app->post('/postcomment','postcomment'); /* User postcomment  */
$app->post('/deletepost','deletepost'); /* User postcomment  */
$app->post('/uploadimg','uploadimg');  
$app->post('/resendotp','resendotp');  
$app->post('/search','search');  


$app->run();
 

/* ### User login ### */
function login() {
    
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        
        $db = getDB();
		$db1 = getDB();
        $userData ='';
         $sql = "SELECT user_id, first_name, email_id, mobile_no, last_name FROM all_user WHERE (email_id=:email_id or mobile_no=:email_id) and password=:password and user_status=1";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("email_id", $data->email_id, PDO::PARAM_STR);
        //$password=hash('sha256',$data->password);
		$password=base64_encode($data->password);
        $stmt->bindParam("password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $mainCount=$stmt->rowCount(); 
        $userData = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
             $user_id=$userData->user_id;
             $userData->token = apiToken($user_id);
				$chatdb = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e"); 
			    /////////Fetch chat table user id////////////
				 $sql = "SELECT user_id  FROM login WHERE  f_userid='".$user_id."'";
				 $stmt2 = $chatdb->prepare($sql);				 
				 $stmt2->execute();
				 $user_iddetails = $stmt2->fetch(PDO::FETCH_OBJ);
				 $uid=$user_iddetails->user_id;				 
				//////////////DELETE login_details////////////////////
				 //$sqld = "DELETE   FROM login_details WHERE  f_userid='".$user_id."'";
				if(!empty($uid)){ 
				$query2 = "UPDATE login_details SET status = 'Online' WHERE f_userid = '".$user_id."'";
				$stmt3 = $chatdb->prepare($query2);				 
				$stmt3->execute();
				}else{
				////////////////insert status /////////////////
				 $sub_query = "
				INSERT INTO login_details
	     		(user_id,f_userid,status)
	     		VALUES ('".$uid."', '".$user_id."', 'Online')
				";
				$statement = $chatdb->prepare($sub_query);
				$statement->execute();
				}
				//////////////////////
			
        }
        
        $db = null;
		
         if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":" Incorrect username and password"}}';
            }

           
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/* ### User login ### */
function userdetails() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $userdetailslist = '';
            $db = getDB();
          
                $sql = "SELECT profile_id, image_id, first_name, last_name FROM user_profile WHERE user_id=:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $userdetailslist = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($userdetailslist){
				echo '{"userdetailslist": '. json_encode($userdetailslist) .'}';
			}
			 
			else{
				echo '{"userdetailslist": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}





/* ### User registration ### */
function signup() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $email_id=$data->email_id;
    $first_name=$data->first_name; 
    $password=$data->password;
    $mobile_no=$data->mobile_no;
    $user_status=$data->user_status;
    $last_name=$data->last_name;
    $country=$data->country; 
	$uniqueid=rand(1000,9999);
	$joindate=date("Y-m-d");
	//$dob=$data->dataofbirth;
	$dob=date("Y-m-d");
    $gender='male';
	$update_date=date("Y-m-d");
	
    try {
        
        //$userfirst_name_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $userfirst_name);
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email_id);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
        
        //echo $email_check.'<br/>'.$email;
        
        if (strlen(trim($password))>0 && strlen(trim($email_id))>0 && $email_check>0 && $password_check>0)
        {
            //echo 'here';
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM all_user WHERE email_id=:email_id";
            $stmt = $db->prepare($sql);
            
            $stmt->bindParam("email_id", $email_id,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                
                /*Inserting user values*/
                $sql1="INSERT INTO all_user(password,email_id,first_name, last_name, mobile_no, user_status, country, uniqueid, joindate)VALUES(:password,:email_id,:first_name, :last_name, :mobile_no, :user_status, :country,:uniqueid, :joindate)";
                $stmt1 = $db->prepare($sql1);
                
                $password1=$data->password;
				$password=base64_encode($data->password);
                $stmt1->bindParam("password", $password,PDO::PARAM_STR);
                $stmt1->bindParam("email_id", $email_id,PDO::PARAM_STR);
                $stmt1->bindParam("first_name", $first_name,PDO::PARAM_STR);
                $stmt1->bindParam("mobile_no", $mobile_no,PDO::PARAM_STR);
                $stmt1->bindParam("country", $country,PDO::PARAM_STR);
                $stmt1->bindParam("last_name", $last_name,PDO::PARAM_STR);
                $stmt1->bindParam("user_status", $user_status,PDO::PARAM_STR);
				$stmt1->bindParam("uniqueid", $uniqueid,PDO::PARAM_STR);
				$stmt1->bindParam("joindate", $joindate,PDO::PARAM_STR);
                $stmt1->execute();
                
                $userData=internalUserid($email_id);
				$userid=$userData->user_id;
				//echo $sql2="INSERT INTO user_profile(user_id, first_name, last_name, dob, gender ,update_date )VALUES($userid, $first_name, $last_name, $dob, $gender, $update_date)";
				$sql2="INSERT INTO user_profile(user_id, first_name, last_name, dob, gender ,update_date )VALUES(".$userid.", '".$first_name."', '".$last_name."', '".$dob."', '".$gender."', '".$update_date."')";
                $stmt2 = $db->prepare($sql2);
                $stmt2->execute();
				//////////////////////
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
                                	$to=$email_id;
                                    $from = "c.k.roy90@gmail.com";
                                    $subject="Thank your for registering with Us. You one time OTP: " . $uniqueid;

				                    $msg.='Email: '.$email_id.'<br><br>';
									$msg.='Name: '.$first_name.'<br><br>';
									$msg.='Phone No.: '.$mobile_no.'<br><br>';
									$msg.='Password: '.$password1.'<br><br>';									
							     	 $message=$evtstr.$msg.$evtstr1;
									$headers  = "MIME-Version: 1.0\r\n";
									$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
									$headers .= "From:$from\r\n";
									@mail($to, $subject, $message, $headers); 
                    
	 
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
 

				/////////////////////
				
				 if($userData){
					   $userData = json_encode($userData);
						echo '{"userData": ' .$userData . '}';
						 
						
					} else {
					   echo '{"error":{"text":"Enter valid data 1"}}';
					}
					
					
            }else {
               echo '{"error":{"text":"Email Already Exist"}}';
            }
            
            $db = null;
         

           

           
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
/*
function email() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email=$data->email;

    try {
       
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
       
        if (strlen(trim($email))>0 && $email_check>0)
        {
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM emailUsers WHERE email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $email,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                
                 
                $sql1="INSERT INTO emailUsers(email)VALUES(:email)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("email", $email,PDO::PARAM_STR);
                $stmt1->execute();
                
                
            }
            $userData=internalEmailDetails($email);
            $db = null;
            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid dataaaa"}}';
            }
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
*/


/* ### Resend Otp ### */
function resendotp() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);    
    $mobile_no=$data->mobile_no;    
	$uniqueid=rand(1000,9999);
	$joindate=date("Y-m-d");
	//$dob=$data->dataofbirth;
	
    try {
        
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM all_user WHERE mobile_no='".$mobile_no."'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount>0)
            {
                  $sql3="update all_user set uniqueid='".$uniqueid."' WHERE mobile_no='".$mobile_no."'";
				 $stmt3 = $db->prepare($sql3);
				 $stmt3->execute();
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
 /* if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
} */

				/////////////////////
				
				 if($err){
					  // $userData = json_encode($userData);
						echo '{"error": '.$err.'}';
						 
						
					} else {
					   echo '{"error":{"Success":"'.$response.'"}}';
					}
					
					
            }else {
               echo '{"error":{"text":"User Not Exist"}}';
            }
            
            $db = null;
         
        
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/* ### internal Userfirst_name Details ### */
function internalUserDetails($input) {
    
    try {
        $db = getDB();
        $sql = "SELECT user_id, first_name, email_id, mobile_no, user_status, country, last_name FROM all_user WHERE  email_id=:input";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("input", $input,PDO::PARAM_STR);
        $stmt->execute();
        $userfirst_nameDetails = $stmt->fetch(PDO::FETCH_OBJ);
        $userfirst_nameDetails->token = apiToken($userfirst_nameDetails->user_id);
        $db = null;
        return $userfirst_nameDetails;
        
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    
}


/* ### Get userid ### */
function internalUserid($input) {
    
    try {
        $db = getDB();
        $sql = "SELECT user_id, uniqueid  FROM all_user WHERE  email_id=:input";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("input", $input,PDO::PARAM_STR);
        $stmt->execute();
        $userfirst_nameDetails = $stmt->fetch(PDO::FETCH_OBJ);
		
        //$userfirst_nameDetails->token = apiToken($userfirst_nameDetails->user_id);
        $db = null;
        return $userfirst_nameDetails;
        
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    
}



////////// otp verification



function verifyotp(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
	$user_id=$data->user_id;  
    $uniqueid=$data->uniqueid;
       
    try {
			 $verifyotpcode ="";
			 $verifyotpcode1 ="";
             $db = getDB(); 
			 
					 $sql2 = "SELECT uniqueid, first_name, email_id from all_user WHERE user_id=:user_id"; 
					$stmt1 = $db->prepare($sql2);
					$stmt1->bindParam("user_id", $user_id, PDO::PARAM_STR); 
					$stmt1->execute();
					$verifyotpcode = $stmt1->fetch(PDO::FETCH_OBJ);
					 
					
				
				 $createdotp = $verifyotpcode->uniqueid;
				$email_id = $verifyotpcode->email_id;
				$first_name = $verifyotpcode->first_name;
				$db = null;
							
			 if($uniqueid == $createdotp){
					
				 $verifyotpcode1=internalUserDetails($email_id); 
				 $db = getDB();
				 $sql3="update all_user set user_status='1' WHERE user_id=".$user_id;
				 $stmt3 = $db->prepare($sql3);
				 $stmt3->execute();
				 ////////////////////////
				 $chatdb = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e"); 
				 //////////////chat login table///////////////////
	 
				 $data = array(
					':username'		=>	$email_id,					
					':password'		=>	'123',
					':name'		=>	$first_name,
					':f_userid'		=>	$user_id
				);
				$query = "
				INSERT INTO login 
				(username, password, name, f_userid) 
				VALUES (:username, :password, :name, :f_userid)
				";
				$statement = $chatdb->prepare($query);
				$statement->execute($data);  
				//////////////////////////////
				 $sql = "SELECT user_id  FROM login WHERE  username='".$email_id."'";
				 $stmt2 = $chatdb->prepare($sql);				 
				 $stmt2->execute();
				 $user_iddetails = $stmt2->fetch(PDO::FETCH_OBJ);
				$uid=$user_iddetails->user_id;				 
				//////////////////////////////////
				$sub_query = "
				INSERT INTO login_details
	     		(user_id,f_userid,status)
	     		VALUES ('".$uid."', '".$user_id."', 'Online')
				";
				$statement = $chatdb->prepare($sub_query);
				$statement->execute();
				//////////////////////
				$db1 = null; 
				$verifyotpcode1 = json_encode($verifyotpcode1);
				echo '{"userData": ' .$verifyotpcode1. '}';			 
			 
			 }
			 else{
				 echo '{"error":{"text":"Code Not Matching"}}'; 
			} 
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}






function feed(){ 
	
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $user_id=$data->user_id;
	$post_id=$data->post_id;
    $token=$data->token;
    $lastCreated=$data->lastCreated;
    $systemToken=apiToken($user_id); 
    try {
		
		
         
		if($systemToken == $token){
         
            $feedData = '';
            $db = getDB();
             
				//$sql = "SELECT * FROM user_post JOIN all_user JOIN user_profile ORDER BY post_date DESC "; 
				// $sql = "SELECT * FROM user_post JOIN all_user.first_name, all_user.last_name
				// all_user ON all_user.user_id=user_post.user_id  JOIN user_profile user_profile.image_id ON all_user.user_id=user_profile.user_id where all_user.user_id=:user_id ";
				

                if($lastCreated){

                $sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where post_date < '$lastCreated'  ORDER BY post_date DESC LIMIT 10";
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
 

                } 
                else{

                    $sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id ORDER BY post_date DESC LIMIT 10";
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);


                }
				
             
            $stmt->execute();
			$feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
			$array_record = array();
			foreach($feedData as $value){
				$post_id1 = $value->post_id;
				 $data_post['post_id']=$value->post_id;
				 $data_post['user_id']=$value->user_id;
				 $data_post['post_title']=$value->post_title;
				 $data_post['post_details']=$value->post_details;
				 $data_post['post_status']=$value->post_status;
				 $data_post['post_date']=$value->post_date;
				 $data_post['allpath']=$value->allpath;
				 $data_post['postemos']=$value->postemos;
				 $data_post['post_hide']=$value->post_hide;
				 //$data_post['pageid']=$value->pageid;
				 $data_post['tagfriends']=$value->tagfriends;
				 $data_post['shareuid']=$value->shareuid;
				 $data_post['first_name']=$value->first_name;
				 $data_post['last_name']=$value->last_name;
				 $data_post['image_id']=$value->image_id;
                 $data_post['livelocation']=$value->livelocation;
                 $data_post['isLiked']=$value->isLiked;
				 //$data_post['display_name']=$value->display_name;
				 //$data_post['mobile_no']=$value->mobile_no;
				 //$data_post['email_id']=$value->email_id;
				 //$data_post['joindate']=$value->joindate;
				 //$data_post['country']=$value->country;
				 //$data_post['user_status']=$value->user_status;
				 //$data_post['password']=$value->password;
				//$data_post['uniqueid']=$value->uniqueid;
				 //$data_post['reward']=$value->reward;
				 //$data_post['totaltime']=$value->totaltime;
				 
				 ////////////////////////////// Like list for post ////////////////
				 
				 
				//$sql12 = "SELECT * FROM post_like WHERE post_id=:post_id1 and user_id=:user_id";
				$sql12 = "SELECT * FROM post_like WHERE post_id=:post_id1";
				$stmt12 = $db->prepare($sql12);
				$stmt12->bindParam("post_id1", $post_id1, PDO::PARAM_INT);
				//$stmt12->bindParam("user_id", $user_id, PDO::PARAM_INT);
				$stmt12->execute();
				$ab = $stmt12->rowCount();
				//print_r($ab);
				
                if($ab!="0"){
                    $feedData12 = $stmt12->fetchAll(PDO::FETCH_OBJ);
                }else{
                    $feedData12 = array();
                }
				
				////////////////////////////// comments list for post ////////////////
				
				//$sql13 = "SELECT * FROM comment WHERE post_id=:post_id1 and user_id=:user_id";
				$sql13 = "SELECT * FROM comment WHERE post_id=:post_id1";
				$stmt13 = $db->prepare($sql13);
				$stmt13->bindParam("post_id1", $post_id1, PDO::PARAM_INT);
				//$stmt13->bindParam("user_id", $user_id, PDO::PARAM_INT);
				$stmt13->execute();
				$aba = $stmt13->rowCount();
				//echo $aba;
				
                if($aba!="0"){
                    $feedData13 = $stmt13->fetchAll(PDO::FETCH_OBJ);
                }else{
                    $feedData13 = array();
                }
				 
		
				
				$data_post['likedetails']=$feedData12;
				$data_post['commentlist']=$feedData13;
				
				
				array_push($array_record,$data_post);
				
				
			}
			$db = null;
			if($feedData)
            	echo '{"feedData": '. json_encode($array_record).'}';
			else
            echo '{"feedData": ""}';
       } else{
         echo '{"error":{"text":"No access"}}';
		 
;
       }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

 

function createpost(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $user_id=$data->user_id; 
    $token=$data->token;
	$post_title=$data->post_title; 
	$post_details=$data->post_details; 
	$post_status=$data->post_status; 
	//$post_date==$data->post_date;  
	$allpath=$data->allpath; 
	$postemos=$data->postemos; 
	$post_hide=$data->post_hide; 
	//$pageid=$data->pageid; 
	$tagfriends=$data->tagfriends;
	$shareuid=$data->shareuid;
    $livelocation=$data->livelocation; 
	$post_date=date('Y-m-d H:i:s');
    //$lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id);
	$target_path = "uploads/";
	  
    try {

    	
    	/*
    	$target_path = $target_path . basename( $_FILES['file']['name']);
 
			if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
			    echo "Upload and move success";
			} else {
			echo $target_path;
			    echo "There was an error uploading the file, please try again!";
			}*/


		if($systemToken == $token){
			$createpost = '';
            $db = getDB();

            

				
				$sql ="INSERT INTO user_post(user_id, post_title, post_details, post_status, post_date, allpath, postemos, post_hide, tagfriends, shareuid, livelocation)VALUES(:user_id, :post_title, :post_details, :post_status,:post_date, :allpath, :postemos, :post_hide, :tagfriends, :shareuid, :livelocation)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT);
                $stmt->bindParam("post_title", $post_title,PDO::PARAM_STR);
                $stmt->bindParam("post_details", $post_details,PDO::PARAM_STR);
                $stmt->bindParam("post_status", $post_status,PDO::PARAM_INT);
                $stmt->bindParam("post_date", $post_date,PDO::PARAM_STR);
				$stmt->bindParam("allpath", $allpath,PDO::PARAM_STR);
                $stmt->bindParam("postemos", $postemos,PDO::PARAM_INT);
                $stmt->bindParam("post_hide", $post_hide,PDO::PARAM_STR);
				//$stmt->bindParam("pageid", $pageid,PDO::PARAM_INT);
				$stmt->bindParam("tagfriends", $tagfriends,PDO::PARAM_INT);
				$stmt->bindParam("shareuid", $shareuid,PDO::PARAM_INT);
                $stmt->bindParam("livelocation", $livelocation,PDO::PARAM_INT);
	
                $stmt->execute();

					$sql2 = "SELECT  * from  user_post WHERE 1 ORDER BY post_ID DESC LIMIT 1";
        $stmt1 = $db->prepare($sql2);
        $stmt1->bindParam("input", $input,PDO::PARAM_STR);
        $stmt1->execute();
        $createpost = $stmt1->fetch(PDO::FETCH_OBJ);
		//print_r($createpost);
				//$createpost = 1;
				//$createpost = $stmt->fetch(PDO::FETCH_OBJ);
             	//$createpost=internalUserDetails($user_id); 
            	//echo $createpost = $stmt->fetch(PDO::FETCH_OBJ);
				$db = null;
			
			if($createpost)

				echo '{"createpost": ' . json_encode($createpost).'}';
			else
            echo '{"No Posted Failed"}';
		
			
			 
       } else{
         echo '{"error":{"text":"No access"}}'; 
       }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



function updatepost(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
	$post_id=$data->post_id;	
    $user_id=$data->user_id; 
    $token=$data->token;
	$post_title=$data->post_title; 
	$post_details=$data->post_details; 
	$post_status=$data->post_status;  
	$allpath=$data->allpath; 
	$postemos=$data->postemos; 
	$posthide=$data->post_hide;  
	$tagfriends=$data->tagfriends;
	$shareuid=$data->shareuid;
    $livelocation=$data->livelocation; 
	$post_date=date('Y-m-d H:i:s'); 
    $systemToken=apiToken($user_id);
	$target_path = "uploads/";
	  
    try {
 
		if($systemToken == $token){
			$createpost = '';
            $db = getDB();

				$sql ="UPDATE user_post SET user_id='".$user_id."', post_title='".$post_title."', post_details='".$post_details."', post_status='".$post_status."', post_date='".$post_date."', allpath='".$allpath."', postemos='".$postemos."', post_hide='".$posthide."', tagfriends='".$tagfriends."', shareuid='".$shareuid."', livelocation='".$livelocation."' WHERE post_id=".$post_id;
                $stmt = $db->prepare($sql); 
                $stmt->execute();
  
				$db = null;
				
				echo '{"success":{"text":"Post has been updated"}}';
			 
			 
       } else{
         echo '{"error":{"text":"No access"}}'; 
       }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}


function deletepost(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
	$user_id=$data->user_id;
	$post_id=$data->post_id;  	
    //$uniqueid=$data->uniqueid;
       
    try { 
	
             $db = getDB(); 
					$sql2 = "DELETE FROM user_post WHERE post_id=:post_id;";
					$stmt1 = $db->prepare($sql2);
					$stmt1->bindParam("post_id", $post_id, PDO::PARAM_STR); 
					$stmt1->execute();
					//$deletedlist = $stmt1->fetch(PDO::FETCH_OBJ);
					 
					
				$db = null;
				
				echo '{"success":{"text":"Post has been deleted"}}'; 				
			  
			  
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



function getcommentlist(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if(1){
            $commentlisting = '';
			$userdata='';
            $db = getDB();
          
                $sql = "SELECT c_id, user_id, comment, comment_status, post_id, cdate, cimage FROM comment WHERE post_id=:post_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("post_id", $post_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $commentlisting = $stmt->fetchAll(PDO::FETCH_OBJ);
			
			
			
			$array_record = array();
			foreach($commentlisting as $row){
				$post_id1 = $row->c_id; 
				 $data_post['user_id']=$row->user_id;
				 $data_post['comment']=$row->comment;
				 $data_post['comment_status']=$row->comment_status;
				 $data_post['post_id']=$row->post_id;
				 $data_post['cdate']=$row->cdate;
				 $data_post['cimage']=$row->cimage;
				  
				  
				  ////////////////////////////
				  $sql = "SELECT first_name,last_name,image_id  FROM user_profile WHERE  user_id=".$row->user_id;
				$stmt1 = $db->prepare($sql);
				$stmt1->bindParam("input", $input,PDO::PARAM_STR);
				$stmt1->execute();
				//$userDetails = $stmt1->fetchAll(PDO::FETCH_OBJ);
				$ab = $stmt1->rowCount();
				//print_r($ab);
				
                if($ab!="0"){
                    $userDetails = $stmt1->fetchAll(PDO::FETCH_OBJ);
                }else{
                    $userDetails = array();
                }
				//print_r($userDetails);
				$data_post['userdetails']=$userDetails;
				
				
				
				array_push($array_record,$data_post);
		
				
				
			}
			
			
			
			//$commentlistwithus = array_merge($commentlisting,$userDetails);
			 
            $db = null;

            if($array_record)
            echo '{"Commnetlist": ' . json_encode($array_record) . '}';
            else
            echo '{"No Comments": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

  

// post a new commnent
function postcomment(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $user_id=$data->user_id; 
    $token=$data->token;
	$post_id=$data->post_id; 
	$comment=$data->comment;
	$comment_status=$data->comment_status; 
	$cdate=date('Y-m-d H:i:s');
    $systemToken=apiToken($user_id);

    try {
		if($systemToken == $token){
			$createcommnet = '';
            $db = getDB();
				
				$sql="INSERT INTO comment(user_id, comment, comment_status, post_id, cdate)VALUES(:user_id, :comment, :comment_status, :post_id,:cdate)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT);
                $stmt->bindParam("comment", $comment,PDO::PARAM_STR);
                $stmt->bindParam("comment_status", $comment_status,PDO::PARAM_STR);
                $stmt->bindParam("post_id", $post_id,PDO::PARAM_INT);
                $stmt->bindParam("cdate", $cdate,PDO::PARAM_STR);
				 
                $stmt->execute(); 
				
				 
				$sql2 = "SELECT  * from comment ORDER BY c_id DESC LIMIT 1";
				$stmt1 = $db->prepare($sql2);
				//$stmt1->bindParam("input", $input,PDO::PARAM_STR);
				$stmt1->execute();
				$createcommnet = $stmt1->fetchAll(PDO::FETCH_OBJ);
				//print_r($createcommnet);
				
				$array_record = array();
				foreach($createcommnet as $row){
					$post_id1 = $row->c_id; 
					 $data_post1['user_id']=$row->user_id;
					 $data_post1['comment']=$row->comment;
					 $data_post1['comment_status']=$row->comment_status;
					 $data_post1['post_id']=$row->post_id;
					 $data_post1['cdate']=$row->cdate; 
					  
					  
					  ////////////////////////////
					$sq3 = "SELECT first_name,last_name,image_id  FROM user_profile WHERE  user_id=".$row->user_id;  
					$stmt3 = $db->prepare($sq3);
					//$stmt3->bindParam("input", $input,PDO::PARAM_STR);
					$stmt3->execute();
					//$userDetails = $stmt1->fetchAll(PDO::FETCH_OBJ);
					$ab = $stmt3->rowCount();
					//print_r($ab);
					
					if($ab!="0"){
						$userDetails = $stmt3->fetchAll(PDO::FETCH_OBJ);
					}else{
						$userDetails = array();
					}
					//print_r($userDetails);
					$data_post1['userdetails']=$userDetails;
					
					
					
					array_push($array_record,$data_post1);
			
					
					
				}
				
				
			$db = null;
			
			if($array_record){
            	echo '{"createcommnet": ' . json_encode($array_record).'}';
			}
			else{
            echo '{"Commnets Failed"}';
			}
			
			 
       } else{
         echo '{"error":{"text":"No access"}}';
       }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

 


// get feeeling categegorise


function feelingcategories(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    print_r($data);
    $user_id=$data->user_id; 
    $token=$data->token;
    $post_id=$data->post_id; 
    $comment=$data->comment;
    $comment_status=$data->comment_status; 
    $cdate=date('Y-m-d H:i:s');
    $systemToken=apiToken($user_id); 
    
   
    try {
          $feelingcategories = '';
            $db = getDB();
          
                $sql = "SELECT * FROM feeling_ctivity_category";
                $stmt = $db->prepare($sql);
                 
            $stmt->execute();
            $feelingcategories = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feelingcategories)
            echo '{"feelingcategories": ' . json_encode($feelingcategories) . '}';
            else
            echo '{"feelingcategories": ""}';
         
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



// get feeeling categegorise


function post_like(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $user_id=$data->user_id; 
    $token=$data->token;
    $post_id=$data->post_id;
	$do_like=$data->do_like;
	$status=$data->status; 
	$l_date=date('Y-m-d');	
    $systemToken=apiToken($user_id); 
    
   
    try {


////////////////////////////
         //if(!empty($post_id)){
        $db = getDB();
 $sql="SELECT * from post_like where post_id=".$post_id." and user_id=".$user_id;
 $stmt = $db->prepare($sql);
$stmt->execute();
$mainCount=$stmt->rowCount();
if($mainCount>0){
        $calculate=$stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($calculate as $row){
            $do_like=$row->do_like;
        }
        if($do_like==0){
                $sql1 = "UPDATE post_like SET do_like = '1' WHERE post_id=".$post_id." and user_id=".$user_id;
                $stmt1 = $db->prepare($sql1);
                $stmt1->execute();
               echo '{"like_status": "liked"}';

        }else{
               $sql2 = "UPDATE post_like SET do_like = '0' WHERE post_id=".$post_id." and user_id=".$user_id;
                $stmt2 = $db->prepare($sql2);
                $stmt2->execute();
                echo '{"like_status": "like"}';
               


        }

    
}else{

     $sql3="INSERT INTO post_like(post_id, user_id, do_like, status, l_date)VALUES($post_id, $user_id, '1','yes','$l_date')";
    $stmt3 = $db->prepare($sql3);
    $stmt3->execute();   
    echo '{"like_status": "liked"}';   
                
    
}

//////////////////////////


 
			 
            $db = null;  
			
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}


/*
function post_like(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $user_id=$data->user_id; 
    $token=$data->token;
    $post_id=$data->post_id;
    $do_like=$data->do_like;
    $status=$data->status; 
    $l_date=date('Y-m-d H:i:s');    
    $systemToken=apiToken($user_id); 
    
   
    try {
        
                //echo 'here';
            $db = getDB();
            $mylikelist = '';
            $sql = "SELECT * FROM post_like WHERE post_id=:post_id AND user_id=".$user_id; 
            $stmt = $db->prepare($sql);
            
            $stmt->bindParam("post_id", $post_id,PDO::PARAM_INT); 
            $stmt->execute();
            $mylikelist = $stmt->fetchAll(PDO::FETCH_OBJ);
            $mainCount=$stmt->rowCount();
            //$created=time();
            if($mainCount==0){
                
                $sql="INSERT INTO post_like(post_id, user_id, do_like, status, l_date)VALUES(:post_id, :user_id, :do_like,:status,:l_date)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("post_id", $post_id,PDO::PARAM_INT);
                $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT);
                $stmt->bindParam("do_like", $do_like,PDO::PARAM_INT);
                $stmt->bindParam("status", $status,PDO::PARAM_STR);
                $stmt->bindParam("l_date", $l_date,PDO::PARAM_STR);
                 
                $stmt->execute();
                
                $sql2 = "SELECT  * from post_like ORDER BY like_id DESC LIMIT 1";
                $stmt1 = $db->prepare($sql2);
                //$stmt1->bindParam("input", $input,PDO::PARAM_STR);
                $stmt1->execute();
                $mylikelist = $stmt1->fetchAll(PDO::FETCH_OBJ);
                
                if($mylikelist){
                    echo '{"mylikelist": ' . json_encode($mylikelist) . '}';
                }else{
                    echo '{"mylikelist": ""}';
                    
                }
                
                
            }else{
                echo '{"mylikelist": ' . json_encode($mylikelist) . '}';
                
            }
             
            $db = null;  
            
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}
*/
 
// post a new commnent
function uploadimg(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $target_path = "uploads/";

    try {

    	$target_path = $target_path . basename( $_FILES['avatar']['name']);
 
			if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
			    echo "Upload and move success";
			} else {
			echo $target_path;
			    echo "There was an error uploading the file, please try again!";
			}

			} catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }




}
 


/* ### search ### */
function search() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data); 
    $SearchItem=$data->SearchItem;
    $tablename=$data->tablename;
    $calumName=$data->calumName;
    $calumName2=$data->calumName2;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        //if($systemToken == $token){
            $newhomepro = '';
            $db = getDB();
             
            $sql = "SELECT * FROM $tablename where ($calumName like '%$SearchItem%') or ($calumName2 like '%$SearchItem%')";
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
 
                 
                 
            $stmt->execute();
            $newhomepro = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($newhomepro){
                echo '{"newhomepro": '. json_encode($newhomepro) .'}';
            }
             
            else{
                echo '{"newhomepro": ""}';
            }
            
       /* } else{
            echo '{"error":{"text":"No access"}}';
        }*/
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}





?>
