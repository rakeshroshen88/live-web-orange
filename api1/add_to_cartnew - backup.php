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
			if($prod_id){
				
				$sql="select * from product where id=".$prod_id;
                $stmt = $db->prepare($sql);
                }
            $stmt->execute();
			
            $newprodadded = $stmt->fetchAll(PDO::FETCH_OBJ);
			$proprice1=0;
			
			foreach($newprodadded as $row){
				$proprice1=$row->prod_sprice;
				$proprice1=str_replace(",","",$proprice1);
					
			    $total=$proprice1*$qty; 
				$prod_name=$row->prod_name;
				$prod_image=$row->prod_large_image;				
				$mrp=$row->prod_price;
				$mrp=str_replace(",","",$mrp);
				$persen=$mrp-$proprice1;
				//$discount=($persen*100)/$mrp;
			    $orgprice=$proprice1;
			    //$finalprice=$row->prod_sprice;
			} 
			$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
			$product_name = mysqli_real_escape_string($link, $prod_name);
			$session_id=session_id();
			$dates=date('Y-m-d h:i:s');
			 $sql1="INSERT INTO temp(product_name, user_id, sessionid, prodid, cost, discount, finalprice, prod_sprice, prod_total, quantity, mrp, buyitdate,prod_image,prodsize,prodcolor)VALUES('".$product_name."', '".$user_id."', '".$session_id."', '".$prod_id."', '".$orgprice."', '".$persen."', '".$orgprice."', '".$orgprice."', '".$total."', '".$qty."', '".$mrp."', '".$dates."','".$prod_image."','".$prod_size."','".$prod_color."')";
            $stmt1 = $db->prepare($sql1);
			$stmt1->execute();
			/////////////
			//$sqlnew = "SELECT id FROM temp WHERE session_id='".$session_id."'";
			$sqlnew = "SELECT id FROM temp WHERE user_id='".$user_id."'";
            $stmtnew = $db->prepare($sqlnew);            
            $stmtnew->execute();
            $newprodadded1 = $stmtnew->fetch(PDO::FETCH_OBJ);			
			
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
   

/* ### userdetails ### */
function viewcart() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token; 
	$user_id=$data->user_id; 
	//$lastCreated=$data->lastCreated;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $newhomepro = '';
            $db = getDB();			
			
			//$sqlnew = "SELECT id FROM temp WHERE session_id='".$session_id."'";
			$sqlnew = "SELECT id,product_name,prodid,discount,prod_sprice,quantity,prod_total,mrp,prodsize,prodcolor,prod_image FROM temp WHERE user_id='".$user_id."'";
            $stmtnew = $db->prepare($sqlnew);            
            $stmtnew->execute();
            $tempData = $stmtnew->fetchAll(PDO::FETCH_OBJ);
			$grandtoal=0;
			$subtoal=0;
			$discaunt=0;
			foreach($tempData as $temprow){
			$grandtoal+=$temprow->prod_total;
			$subtoal+=$temprow->mrp;
			$discaunt+=$temprow->discount;
			}
			
			/////////////
            $db = null;
			////////
			$array_record = array();					
			$data_prod['user_id']=$user_id;
			$data_prod['discount']=$discount;			
			$data_prod['selling_price']=$grandtoal;			
			$data_prod['mrp']=$subtoal;
			$data_prod['temp_val']=$tempData;	
			
			array_push($array_record,$data_prod);
			 
            if($array_record){
				echo '{"viewcart": '. json_encode($array_record) .'}';
			}
			 
			else{
				echo '{"viewcart": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 
} 
 
/* ### userdetails ### */
function deletecart() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token; 
	$user_id=$data->user_id;
	$temp_id=$data->temp_id;
	//$lastCreated=$data->lastCreated;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){            
            $db = getDB();			
			
			//$sqlnew = "SELECT id FROM temp WHERE session_id='".$session_id."'";
			$sqlnew = "DELETE  FROM temp WHERE user_id='".$user_id."' and id=".$temp_id;
            $stmtnew = $db->prepare($sqlnew);            
            $stmtnew->execute();
            
			/////////////
            $db = null;
			
            if($array_record){
				echo '{"Success": '. json_encode('Success') .'}';
			}
			 
			else{
				echo '{"Success": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 
} 
 
?>


