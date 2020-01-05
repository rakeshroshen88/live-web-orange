 
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
$app->post('/addtocart','addtocart');  
$app->post('/viewcart','viewcart');  
$app->post('/deletecart','deletecart'); 

$app->run();
 
function addtocart() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $prod_id=$data->prod_id; 
    $user_id=$data->user_id;
    $qty=$data->qty;
    $prod_size=$data->prodsize;
    $prod_color=$data->prodcolor;
    //$lastCreated=$data->lastCreated;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){
            $newprodadded = '';
            $newprodadded1 = '';
            $db = getDB();          
           
           <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"email\": \"customer@email.com\",\n\"amount\":\"5000\",\n\"currency\":\"NGN\",\n\"metadata\":{\n\"custom_fields\":[\n{\n\"display_name\":\"Mobile Number\",\n\"variable_name\":\"mobile_number\",\n\"value\":\"+2348012345678\"\n}\n]\n}\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer pk_live_ff9da0378cea58ecfafbfa2d6befd3da90e64255",
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 3c9d3cfb-efe1-49f8-a91e-631f2cdd9705"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
                     
            
            /////////////
            $db = null;
             
             
            if($newprodadded1){
                echo '{"success": '. json_encode($newprodadded1) .'}';
            }
             
            else{
                echo '{"failed": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 
} 
   
 




?>
