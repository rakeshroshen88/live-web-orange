 
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
$app->post('/feed','feed'); /* User Feeds  */ 

$app->run();


/* ### User login ### */
function login() {
    
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        
        $db = getDB();
        $userData ='';
        $sql = "SELECT user_id, first_name, email_id, mobile_no, last_name FROM all_user WHERE (email_id=:email_id or mobile_no=:email_id) and password=:password ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("email_id", $data->email_id, PDO::PARAM_STR);
        $password=hash('sha256',$data->password);
        $stmt->bindParam("password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $mainCount=$stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
            $user_id=$userData->user_id;
            $userData->token = apiToken($user_id);
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



/* ### User registration ### */
function signup() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email_id=$data->email_id;
    $first_name=$data->first_name; 
    $password=$data->password;
    $mobile_no=$data->mobile_no;
    $user_status=$data->user_status;
    $last_name=$data->last_name;
    $country=$data->country; 
    
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
                $sql1="INSERT INTO all_user(password,email_id,first_name, last_name, mobile_no, user_status, country)VALUES(:password,:email_id,:first_name, :last_name, :mobile_no, :user_status, :country)";
                $stmt1 = $db->prepare($sql1);
                
                $password=hash('sha256',$data->password);
                $stmt1->bindParam("password", $password,PDO::PARAM_STR);
                $stmt1->bindParam("email_id", $email_id,PDO::PARAM_STR);
                $stmt1->bindParam("first_name", $first_name,PDO::PARAM_STR);
                $stmt1->bindParam("mobile_no", $mobile_no,PDO::PARAM_STR);
                $stmt1->bindParam("country", $country,PDO::PARAM_STR);
                $stmt1->bindParam("last_name", $last_name,PDO::PARAM_STR);
                $stmt1->bindParam("user_status", $user_status,PDO::PARAM_STR);
                $stmt1->execute();
                
                $userData=internalUserDetails($email_id);
                
            }
            
            $db = null;
         

            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid data"}}';
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


function feed(){
	
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $user_id=$data->user_id;
	//$post_id=$data->post_id;
    $token=$data->token;
    $lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id); 
	 
    try {
         
		if($systemToken == $token){
         
            $feedData = '';
            $db = getDB();
             
				//$sql = "SELECT * FROM user_post WHERE user_id=:user_id AND created < :lastCreated ORDER BY feed_id DESC LIMIT 5";
				//$sqln="SELECT * FROM user_post JOIN all_user ON all_user.user_id=user_post.user_id where all_user.user_id = user_id";
				$sql = "SELECT * FROM user_post JOIN all_user ON all_user.user_id=user_post.user_id where all_user.user_id=:user_id ";
				$sql1 = "SELECT * FROM post_like WHERE user_id=:user_id";
                //$sql = "SELECT * FROM user_post JOIN all_user";
                $stmt = $db->prepare($sql);
				$stmt1 = $db->prepare($sql1);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
				$stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
				//$stmt->bindParam("post_id", $user_id, PDO::PARAM_INT);
				//$stmt->bindParam("likedata", $likedata, PDO::PARAM_STR);
                //$stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
				
             
            $stmt->execute();
			$stmt1->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
			$feedData1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
			$db = null;
			$hello = array_merge(['postDetails' => $feedData], ['likedetails' => $feedData1]);
			//print_r($hello);
            if($feedData)
             //echo '{"feedData": ' . json_encode(['kitten' => $feedData]).' ' . json_encode(['likest' => $feedData1]).'}';  
				echo '{"feedData": ' . json_encode($hello).'}';
				
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
 
 

?>
