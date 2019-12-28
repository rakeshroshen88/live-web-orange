 
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
$app->post('/newhomepro','newhomepro'); /* User weeklybestresele  */ 

$app->run();
   

/* ### userdetails ### */
function newhomepro() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$lastCreated=$data->lastCreated;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $newhomepro = '';
            $db = getDB();
			
			if($lastCreated){
				$sql1 = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount FROM product where prod_date < '$lastCreated'  ORDER BY prod_date DESC LIMIT 10";
				
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql1);
                  
                } 
                else{

                    $sql = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount FROM product ORDER BY prod_date DESC LIMIT 10";
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);


                }
				
				 
                 
            $stmt->execute();
            $newhomepro = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($newhomepro){
				echo '{"newhomepro": '. json_encode($newhomepro) .'}';
			}
			 
			else{
				echo '{"newhomepro": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 
} 
   
?>


