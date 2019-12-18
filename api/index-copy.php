 
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
$app->post('/userdetails','userdetails'); /* User Feeds  */
$app->post('/getcommentlist','getcommentlist'); /* User Feeds  */
$app->post('/feed','feed'); /* User Feeds  */ 
$app->post('/createpost','createpost'); /* User Feeds  */
$app->post('/postcomment','postcomment'); /* User Feeds  */
$app->post('/uploadimg','uploadimg'); /* User Feeds  */


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
          
                $sql = "SELECT image_id, first_name, last_name FROM user_profile WHERE user_id=:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $userdetailslist = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($userdetailslist)

               echo '{"userdetailslist": ' . json_encode($userdetailslist) . '}';
            else
            echo '{"userdetailslist": ""}';
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
                
                //$password=hash('sha256',$data->password);
				$password=base64_encode($data->password);
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

                $sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where post_date < '$lastCreated'  ORDER BY post_date DESC LIMIT 2";
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
 

                } 
                else{

                    $sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id ORDER BY post_date DESC LIMIT 2";
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
				 
				 
				$sql12 = "SELECT * FROM post_like WHERE post_id=:post_id1 and user_id=:user_id";
				$stmt12 = $db->prepare($sql12);
				$stmt12->bindParam("post_id1", $post_id1, PDO::PARAM_INT);
				$stmt12->bindParam("user_id", $user_id, PDO::PARAM_INT);
				$stmt12->execute();
				$ab = $stmt12->rowCount();
				//print_r($ab);
				
                if($ab!="0"){
                    $feedData12 = $stmt12->fetchAll(PDO::FETCH_OBJ);
                }else{
                    $feedData12 = array();
                }
				
				////////////////////////////// comments list for post ////////////////
				
				$sql13 = "SELECT * FROM comment WHERE post_id=:post_id1 and user_id=:user_id";
				$stmt13 = $db->prepare($sql13);
				$stmt13->bindParam("post_id1", $post_id1, PDO::PARAM_INT);
				$stmt13->bindParam("user_id", $user_id, PDO::PARAM_INT);
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
	print_r($data);
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
	$post_date=date('Y-m-d H:i:s');
    //$lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id);
	$target_path = "uploads/";
	  
    try {

    	echo 'Post Created';
 
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

            

				
				$sql="INSERT INTO user_post(user_id, post_title, post_details, post_status, post_date, allpath, postemos, post_hide, tagfriends, shareuid)VALUES(:user_id, :post_title, :post_details, :post_status,:post_date, :allpath, :postemos, :post_hide, :tagfriends, :shareuid)";
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






				
                $stmt->execute(); 
             //$createpost=internalUserDetails1($user_id); 
            	$createpost = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null;
			
			if($createpost)

				 echo '{"Post Created"}';

            	//echo '{"createpost": ' . json_encode($createpost).'}';
			else
            echo '{"No Posted Failed"}';
		
			
			 
       } else{
         echo '{"error":{"text":"No access"}}'; 
       }
       
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
            $db = getDB();
          
                $sql = "SELECT c_id, user_id, comment, comment_status, post_id, cdate, cimage FROM comment WHERE post_id=:post_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("post_id", $post_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $commentlisting = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($commentlisting)
            echo '{"Commnetlist": ' . json_encode($commentlisting) . '}';
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
	print_r($data);
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
            $createcommnet = $stmt->fetchAll(PDO::FETCH_OBJ);
			$db = null;
			
			if($createcommnet)
            	echo '{"createcommnet": ' . json_encode($createcommnet).'}';
			else
            echo '{"Commnets Failed"}';
		
			
			 
       } else{
         echo '{"error":{"text":"No access"}}';
       }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

 
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
 
 

?>
