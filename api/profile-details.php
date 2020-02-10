 
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
$app->post('/userdetails','userdetails'); /* User userdetails  */ 
$app->post('/usergallery','usergallery'); /* User usergallery  */ 
$app->post('/gettingfollows','gettingfollows'); /* User usergallery  */ 
$app->post('/followerdetails','followerdetails'); /* User followerdetails  */ 
$app->post('/updateuserdetails','updateuserdetails'); /* User updateuserdetails  */

$app->post('/otherUserdetails','otherUserdetails'); /* User updateuserdetails  */
$app->post('/otherUsergallery','otherUsergallery'); /* User updateuserdetails  */
$app->post('/otherGettingfollows','otherGettingfollows'); /* User updateuserdetails  */
$app->post('/otherFollowerdetails','otherFollowerdetails'); /* User otherFollowerdetails  */ 
$app->post('/unfollow','unfollow'); /* User unfollow  */  
$app->post('/gettingAllUser','gettingAllUser'); /* User gettingAllUser  */ 
$app->post('/follow','follow'); /* User follow  */
$app->post('/OneMyfollow','OneMyfollow');  
/*$app->get('/gettingUser',  'gettingUser'); */

$app->run();
  
/* ### userdetails ### */
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
          
                $sql = "SELECT * FROM user_profile WHERE user_id=:user_id";
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


/* ### userdetails ### */
function usergallery() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $usergallery = '';
            $db = getDB();
				$sql = "SELECT allpath FROM `user_post` WHERE  user_id=:user_id  AND allpath!=''";
                //$sql = "SELECT allpath FROM user_post WHERE user_id=:user_id AND allpath != NULL";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $usergallery = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($usergallery){
				echo '{"usergallery": '. json_encode($usergallery) .'}';
			}
			 
			else{
				echo '{"usergallery": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}



/* ### userdetails ### */
function gettingfollows() { 
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token; 
	$user_id=$data->user_id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $followerlist = '';
            $db = getDB();
				$sql = "SELECT f_id, follow FROM followers WHERE  user_id=:user_id";
                //$sql = "SELECT allpath FROM user_post WHERE user_id=:user_id AND allpath != NULL";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $followerlist = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($followerlist){
				echo '{"followerlist": '. json_encode($followerlist) .'}';
			}
			 
			else{
				echo '{"followerlist": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function followerdetails() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    //$token=$data->token;
	$follower_id=$data->follower_id; 
	//$user_id=$data->user_id;
	//$systemToken=apiToken($user_id);

	
   
    try {
         
        //if($systemToken == $token){
            $followerdetails = '';
            $db = getDB();
          
                $sql = "SELECT user_id, image_id, first_name, last_name FROM user_profile WHERE user_id=:follower_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("follower_id", $follower_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $followerdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
			//echo followerdetails;
            $db = null;
			 
            if($followerdetails){
				echo '{"followerdetails": '. json_encode($followerdetails) .'}';
			}
			 
			else{
				echo '{"followerdetails": ""}';
			}
            
         
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}




function updateuserdetails(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data); 	
    $user_id=$data->user_id; 
    $token=$data->token;
	$image_id=$data->image_id; 
	$current_city=$data->current_city; 
	$twon=$data->twon;  
	$work=$data->work; 
	$college=$data->college; 
	$school=$data->school;  
	$current_company=$data->current_company;
	$last_company=$data->last_company;
    $current_studied=$data->current_studied;
	$address=$data->address; 
	$website=$data->website; 
	$about_user=$data->about_user;  
	$state=$data->state; 
	$dob=$data->dob; 
	$mobileno=$data->mobileno;
	$gender=$data->gender;
	$first_name=$data->first_name;
	$last_name=$data->last_name;  
	$update_date=date('Y-m-d H:i:s'); 
    $systemToken=apiToken($user_id);
	$target_path = "uploads/";
	  
    try {
 
		if($systemToken == $token){
			$createpost = '';
            $db = getDB();

				$sql ="UPDATE user_profile SET image_id='".$image_id."', current_city='".$current_city."', twon='".$twon."', work='".$work."', college='".$college."', school='".$school."', current_company='".$current_company."', last_company='".$last_company."', current_studied='".$current_studied."', address='".$address."', website='".$website."', about_user='".$about_user."', state='".$state."', dob='".$dob."', mobileno='".$mobileno."', gender='".$gender."', first_name='".$first_name."', last_name='".$last_name."', update_date='".$update_date."' WHERE user_id=".$user_id;
                $stmt = $db->prepare($sql); 
                $stmt->execute();
  
				$db = null;
				
				echo '{"success":{"text":"Your Profile has been updated"}}';
			 
			 
       } else{
         echo '{"error":{"text":"No access"}}'; 
       }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



/* ### userdetails ### */
function otherUserdetails() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$viewuserid=$data->viewuserid;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $userdetailslist = '';
            $db = getDB();
          
                $sql = "SELECT * FROM user_profile WHERE user_id=:viewuserid";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("viewuserid", $viewuserid, PDO::PARAM_INT);
                 
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


/* ### userdetails ### */
function otherUsergallery() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$viewuserid=$data->viewuserid;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $usergallery = '';
            $db = getDB();
				$sql = "SELECT allpath FROM `user_post` WHERE  user_id=:viewuserid  AND allpath!=''";
                //$sql = "SELECT allpath FROM user_post WHERE user_id=:user_id AND allpath != NULL";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("viewuserid", $viewuserid, PDO::PARAM_INT);
                 
            $stmt->execute();
            $usergallery = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($usergallery){
				echo '{"usergallery": '. json_encode($usergallery) .'}';
			}
			 
			else{
				echo '{"usergallery": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}



/* ### userdetails ### */
function otherGettingfollows() { 
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token; 
	$user_id=$data->user_id;
	$viewuserid=$data->viewuserid;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $followerlist = '';
            $db = getDB();
				$sql = "SELECT f_id, follow FROM followers WHERE  user_id=:viewuserid";
                //$sql = "SELECT allpath FROM user_post WHERE user_id=:user_id AND allpath != NULL";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("viewuserid", $viewuserid, PDO::PARAM_INT);
                 
            $stmt->execute();
            $followerlist = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($followerlist){
				echo '{"followerlist": '. json_encode($followerlist) .'}';
			}
			 
			else{
				echo '{"followerlist": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function otherFollowerdetails() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    //$token=$data->token;
	$follower_id=$data->follower_id; 
	//$user_id=$data->user_id;
	//$systemToken=apiToken($user_id);

	
   
    try {
         
        //if($systemToken == $token){
            $followerdetails = '';
            $db = getDB();
          
                $sql = "SELECT user_id, image_id, first_name, last_name FROM user_profile WHERE user_id=:follower_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("follower_id", $follower_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $followerdetails = $stmt->fetchAll(PDO::FETCH_OBJ);
			//echo followerdetails;
            $db = null;
			 
            if($followerdetails){
				echo '{"followerdetails": '. json_encode($followerdetails) .'}';
			}
			 
			else{
				echo '{"followerdetails": ""}';
			}
            
         
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}




/* ### userdetails ### */
function unfollow() { 
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token; 
	$user_id=$data->user_id;
	$FollowerID=$data->FollowerID;
	$systemToken=apiToken($user_id);
    
    try {
         
        if($systemToken == $token){
            $db = getDB();
				
				$sql = "DELETE FROM followers WHERE user_id=:user_id AND follow=:FollowerID";
				$stmt = $db->prepare($sql);
                $stmt->bindParam("FollowerID", $FollowerID, PDO::PARAM_INT);
				$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
             
            $db = null;
			 
            echo '{"success":{"text":"You are not following"}}';
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}



/* ### userdetails ### */
function follow() { 
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token; 
	$user_id=$data->user_id;
	$FollowerID=$data->FollowerID;
	$f_date=date("Y-m-d");
	$status="yes";
	$systemToken=apiToken($user_id);
    
    try {
         
        if($systemToken == $token){
			$newfollowlist = '';
            $db = getDB();
			
			
				$sql="INSERT INTO followers(user_id, follow, f_date, status)VALUES(:user_id, :FollowerID, :f_date, :status)"; 
				//$sql = "DELETE FROM followers WHERE user_id=:user_id AND follow=:FollowerID";
				$stmt = $db->prepare($sql);
                $stmt->bindParam("FollowerID", $FollowerID, PDO::PARAM_INT);
				$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
				$stmt->bindParam("f_date", $f_date, PDO::PARAM_STR);
				$stmt->bindParam("status", $status, PDO::PARAM_STR);
                 
            $stmt->execute();
			
			//$sql = "SELECT f_id, follow FROM followers WHERE  user_id=:viewuserid";
			 $sql2 = "SELECT f_id, follow from followers ORDER BY f_id DESC LIMIT 1";
				$stmt1 = $db->prepare($sql2);
				//$stmt1->bindParam("input", $input,PDO::PARAM_STR);
				$stmt1->execute();
				$newfollowlist = $stmt1->fetchAll(PDO::FETCH_OBJ);
				$newfollowlist;
				
				if($newfollowlist){
					echo '{"newfollowlist": ' . json_encode($newfollowlist) . '}';
				}else{
					echo '{"newfollowlist": ""}';
					
				}
				
             
            $db = null; 
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}




/* ### userdetails ### */
function gettingAllUser() { 
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;  
	$user_id=$data->user_id; 
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $alluser = '';
            $db = getDB();
			$l=array();
$sql4="SELECT * from followers where user_id=".$user_id;
$stmt1 = $db->prepare($sql4);
                  
   $stmt1->execute();
  $alluser = $stmt1->fetchAll(PDO::FETCH_OBJ);
  foreach($alluser as $row4){
	  $l[]=$row4->follow;
	  
  }
/* if($db->rowCount()>0)
{
while($row4=$db->fetchAll(PDO::FETCH_OBJ);){
	$l[]=$row4['follow'];
}
}
 */$allfriend=implode(',',$l);
 if(empty($allfriend)){
	$allfriend=0; 
}
//print_r($allfriend);
//$stmt = $db->prepare($sql4);             

//$alluser = $stmt->fetchAll(PDO::FETCH_OBJ);
			
			
          
             $sql = "SELECT user_id, image_id, gender, first_name, last_name FROM user_profile  where user_id NOT IN($allfriend)";
             $stmt = $db->prepare($sql);
             $stmt->execute();
			 
            $alluser = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($alluser){
				echo '{"alluser": '. json_encode($alluser) .'}';
			}
			 
			else{
				echo '{"alluser": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}



/* ### userdetails ### */
function OneMyfollow() { 
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token; 
	$user_id=$data->user_id;
	$FollowerID=$data->FollowerID;
	$systemToken=apiToken($user_id);
    
    try {
         
        if($systemToken == $token){
            $db = getDB();
				
			 $sql = "SELECT * FROM followers WHERE follow='".$FollowerID."' AND user_id=".$user_id;
				$stmt = $db->prepare($sql);
                 
                 
            	$stmt->execute();
            	$IsFollowing = $stmt->fetchAll(PDO::FETCH_OBJ);
            
             
            $db = null;
            if($IsFollowing){
				echo '{"IsFollowing": '. json_encode($IsFollowing) .'}';
			}
			 
			else{
				echo '{"IsFollowing": ""}';
			}
		 
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}




 
 /*
function gettingUser() {
    $sql = "SELECT * FROM wine WHERE id=:id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $wine = $stmt->fetchObject();
        $db = null;
        echo json_encode($wine);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

 
function gettingUser()() {
     
    try {
            $userdetailsingle = '';
            $db = getDB();
          
                $sql = "SELECT * FROM user_profile";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $userdetailsingle = $stmt->fetchObject(PDO::FETCH_OBJ);
			//echo followerdetails;
            $db = null; 
			echo json_encode($userdetailsingle);
            
         
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}

*/




   
?>


