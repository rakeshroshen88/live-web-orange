 
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
$app->post('/','feed'); 


$app->run();
 
  

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

 
 

?>
