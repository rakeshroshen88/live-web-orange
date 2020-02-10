 
<?php


header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header("Content-Type: application/json; charset=UTF-8");


require 'config-chat.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(); 
$app->post('/getting_old_chat','getting_old_chat'); 
$app->post('/PostMessage','PostMessage');
$app->post('/ToUserID','ToUserID');
$app->post('/getting_new_chat','getting_new_chat');
$app->post('/getting_active_user','getting_active_user');
$app->post('/updating_deliver_chat_Status','updating_deliver_chat_Status');
$app->post('/updatePlayStatus','updatePlayStatus');
$app->post('/view_chat_emoji','view_chat_emoji');

$app->run();


function ToUserID(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id;
	$to_user_id=$data->to_user_id;
	$systemToken=apiToken($user_id);   
   
    try {
        if($systemToken == $token){ 
            $M_userID = ''; 


            $db = getDB();
          
               	$sql = "SELECT user_id FROM login WHERE f_userid='".$to_user_id."'";
                $stmt = $db->prepare($sql); 
                 
            $stmt->execute();
            $M_userID = $stmt->fetch(PDO::FETCH_OBJ);
			 
			 
            $db = null;

            if($M_userID){
            echo '{"M_userID": ' . json_encode($M_userID) . '}';
            }else{
            echo '{"M_userIDs": ""}';
         	}
       }
       else{
            echo '{"error":{"text":"No access"}}';
         	}
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 
}




function getting_old_chat(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id;
	$to_user_id=$data->to_user_id;
    $from_user_id=$data->from_user_id; 
	$systemToken=apiToken($user_id); 
	
   
    try {
        if($systemToken == $token){ 
            $PostMessage = ''; 


            $db = getDB();
          
               	$sql = "SELECT * FROM chat_message WHERE (to_user_id='".$to_user_id."' AND from_user_id='".$from_user_id."') or (to_user_id='".$from_user_id."' AND from_user_id='".$to_user_id."') order by timestamp asc";
                $stmt = $db->prepare($sql); 
                 
            $stmt->execute();
            $getting_old_chat = $stmt->fetchAll(PDO::FETCH_OBJ);
			 
			 
            $db = null;

            if($getting_old_chat){
            echo '{"getting_old_chat": ' . json_encode($getting_old_chat) . '}';
            }else{
            echo '{"getting_old_chat": ""}';
         	}
       }
       else{
            echo '{"error":{"text":"No access"}}';
         	}
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}
 

function getting_new_chat(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id;
	$to_user_id=$data->to_user_id;
    $from_user_id=$data->from_user_id; 
	$systemToken=apiToken($user_id); 
	
   
    try {
        if($systemToken == $token){ 
            $getting_new_chat = ''; 


            $db = getDB();
          
               	//$sql = "SELECT * FROM chat_message WHERE (to_user_id='".$to_user_id."' AND from_user_id=".$from_user_id.") or (to_user_id='".$from_user_id."' AND from_user_id=".$to_user_id.") AND IsDelivered=0 order by timestamp asc";

            	$sql = "SELECT * FROM chat_message WHERE to_user_id='".$from_user_id."' AND from_user_id='".$to_user_id."' AND (IsDelivered='0' Or IsDelivered='' Or IsDelivered=null) order by timestamp asc";  

                $stmt = $db->prepare($sql); 
                 
            $stmt->execute();
            $getting_new_chat = $stmt->fetchAll(PDO::FETCH_OBJ);

            /*

           	foreach ($getting_new_chat as $value) {
           		 $sql1 = "UPDATE chat_message SET IsDelivered='1' WHERE chat_message_id='".$value->chat_message_id."'";  

                $stmt1 = $db->prepare($sql1); 
                 
            	$stmt1->execute();
           		
           	} 
           	*/
			 
			 
            $db = null;

            if($getting_new_chat){
            echo '{"getting_new_chat": ' . json_encode($getting_new_chat) . '}';
            }else{
            echo '{"getting_new_chat": ""}';
         	}
       }
       else{
            echo '{"error":{"text":"No access"}}';
         	}
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

function updating_deliver_chat_Status(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $user_id=$data->user_id; 
    $chat_message_id=$data->chat_message_id;  
    $systemToken=apiToken($user_id); 
    
  
    try {
        if($systemToken == $token){ 
            $deliveredStaus = ''; 


            $db = getDB();  
 
                    $sql1 = "UPDATE chat_message SET IsDelivered='1' WHERE chat_message_id='".$chat_message_id."'";  

                $stmt1 = $db->prepare($sql1); 
                
                $stmt1->execute();  
            $db = null;
            echo '{"success":{"text":"Status Changed"}}'; 
            
       }
       else{
            echo '{"error":{"text":"No access"}}';
             }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}


function updatePlayStatus(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $user_id=$data->user_id; 
    $chat_message_id=$data->chat_message_id;  
    $systemToken=apiToken($user_id); 
    
  
    try {
        if($systemToken == $token){ 
            $aplayStaus = ''; 


            $db = getDB();  
 
                    $sql1 = "UPDATE chat_message SET aplay='1' WHERE chat_message_id='".$chat_message_id."'";  

                $stmt1 = $db->prepare($sql1); 
                
                $stmt1->execute();  
            $db = null;
            echo '{"success":{"text":"Status Changed aplayStaus"}}'; 
            
       }
       else{
            echo '{"error":{"text":"No access"}}';
             }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}


function PostMessage(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id;
	$to_user_id=$data->to_user_id;
    $from_user_id=$data->from_user_id;
	$chat_message=$data->chat_message;
	$timestamp=date("Y-m-d H:i:s");
	$status=$data->status;
	$mp3="0";
	$aplay=$data->aplay;
	$messageIdMob=$data->messageIdMob;
	$systemToken=apiToken($user_id);

	
   
    try {
        if($systemToken == $token){ 
            $postsingMsg = ''; 
            $db = getDB();


				$sql ="INSERT INTO chat_message(to_user_id, from_user_id, chat_message, timestamp, status, mp3, aplay,f_userid, messageIdMob)VALUES('".$to_user_id."', '".$from_user_id."', '".$chat_message."','".$timestamp."','".$status."','".$mp3."', '".$aplay."', '".$user_id."', '".$messageIdMob."')";

                $stmt = $db->prepare($sql);
                
                $stmt->execute();

				$sql2 = "SELECT  * from  chat_message WHERE  from_user_id='".$from_user_id."' order by timestamp DESC LIMIT 1";
		        $stmt1 = $db->prepare($sql2); 
		        $stmt1->execute();
		        $postsingMsg = $stmt1->fetch(PDO::FETCH_OBJ);
				///////////Update last chat time////////////1
			    $query = "
				UPDATE login_details 
				SET last_activity = '".$timestamp."' 
				WHERE f_userid = '".$user_id."'
				";
				$statement = $db->prepare($query);
				$statement->execute();				
				//////////////////
			 	
			 
            $db = null;

            if($postsingMsg){
            echo '{"SinelMsg": ' . json_encode($postsingMsg) . '}';
            }else{
            echo '{"SinelMsg": ""}';
         	}

       }
       else{
          echo '{"error":{"text":"No access"}}';
         	}
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



function getting_active_user(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $user_id=$data->user_id;
    $from_user_id=$data->from_user_id;
    $systemToken=apiToken($user_id); 
    
   
    try {
        if($systemToken == $token){ 
            $onlineUser = ''; 


            $db = getDB();
          
                $sql = "SELECT * FROM login_details WHERE f_userid='".$from_user_id."' order by last_activity DESC LIMIT 1";
                $stmt = $db->prepare($sql); 
                 
            $stmt->execute();
            $onlineUser = $stmt->fetchAll(PDO::FETCH_OBJ);
             
             
            $db = null;

            if($onlineUser){
            echo '{"onlineUser": ' . json_encode($onlineUser) . '}';
            }else{
            echo '{"onlineUser": ""}';
            }
       }
       else{
            echo '{"error":{"text":"No access"}}';
            }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}
 
function view_chat_emoji(){
	$request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id; 
	$systemToken=apiToken($user_id); 
	$servername = "localhost";
	 $conn = new PDO("mysql:host=$servername;dbname=orangestate_orange", 'orangestate_uorange', 'MN9Ydvr,Hg!!');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    try {
       // if($systemToken == $token){ 
            $getting_emoji = ''; 


           
          
               	$sql = "SELECT id,image,mp3 FROM emoji order by id desc";
                $stmt = $conn->prepare($sql);                 
				$stmt->execute();
				$getting_emoji = $stmt->fetchAll(PDO::FETCH_OBJ);
			 
			 
            $conn = null;

            if($getting_emoji){
            echo '{"getting_emoji": ' . json_encode($getting_emoji) . '}';
            }else{
            echo '{"getting_emoji": ""}';
         	}
       /*}
        else{
            echo '{"error":{"text":"No access"}}';
         	} */
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}
 

?>
