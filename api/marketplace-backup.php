 
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
$app->post('/getcategories','getcategories');  
$app->post('/getRecentProd','getRecentProd'); 
$app->post('/weeklybestresele','weeklybestresele');   
$app->post('/newhomepro','newhomepro');  
$app->post('/product_details','product_details');  
$app->post('/gettingproductImg','gettingproductImg');  
$app->post('/productfeedbackInsert','productfeedbackInsert');  
$app->post('/getSubCategories','getSubCategories');  
$app->post('/getSub2Categories','getSub2Categories');
$app->post('/getSub3Categories','getSub3Categories');
$app->post('/mainCategoriesName','mainCategoriesName');  
$app->post('/SubCategoriesName','SubCategoriesName'); 
$app->post('/SubCategories3Name','SubCategories3Name'); 
$app->post('/SubCategories4Name','SubCategories4Name');
$app->post('/getProdVCat','getProdVCat');
$app->post('/getProdVSubCat','getProdVSubCat');
$app->post('/getProdVSubCat4','getProdVSubCat4'); 
$app->post('/search/[{query}]','search');  

$app->run();
  
/* ### userdetails ### */
function getcategories() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $mainCategories = '';
            $db = getDB();
          
                $sql = "SELECT * FROM category LIMIT 9";
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $mainCategories = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($mainCategories){
				echo '{"mainCategories": '. json_encode($mainCategories) .'}';
			}
			 
			else{
				echo '{"mainCategories": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function mainCategoriesName() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){ 
            $mainCategoriesName = ''; 
            $db = getDB();
          
                 $sql = "SELECT * FROM category where id=".$categoryid;
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $mainCategoriesName = $stmt->fetch(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($mainCategoriesName){
                echo '{"mainCategoriesName": '. json_encode($mainCategoriesName) .'}';
            }
             
            else{
                echo '{"mainCategoriesName": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}
 


/* ### userdetails ### */
function SubCategoriesName() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){ 
            $mainCategoriesName = ''; 
            $db = getDB();
          
                 $sql = "SELECT * FROM subcategory where id=".$categoryid;
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $mainCategoriesName = $stmt->fetch(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($mainCategoriesName){
                echo '{"mainCategoriesName": '. json_encode($mainCategoriesName) .'}';
            }
             
            else{
                echo '{"mainCategoriesName": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}
 


/* ### userdetails ### */
function SubCategories3Name() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){ 
            $mainCategoriesName = ''; 
            $db = getDB();
          
                 $sql = "SELECT * FROM subsubcategory where subcatid=".$categoryid;
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $mainCategoriesName = $stmt->fetch(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($mainCategoriesName){
                echo '{"mainCategoriesName": '. json_encode($mainCategoriesName) .'}';
            }
             
            else{
                echo '{"mainCategoriesName": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function SubCategories4Name() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){  
            $mainCategoriesName = '';  
            $db = getDB(); 
          
                $sql = "SELECT * FROM 4thsubcategory where id=".$categoryid;
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $mainCategoriesName = $stmt->fetch(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($mainCategoriesName){
                echo '{"mainCategoriesName": '. json_encode($mainCategoriesName) .'}';
            }
             
            else{
                echo '{"mainCategoriesName": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}




/* ### userdetails ### */
function getSubCategories() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){ 
            $SubCategories = ''; 
            $db = getDB();
          
                 $sql = "SELECT * FROM subcategory where catid=".$categoryid;
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $SubCategories = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($SubCategories){
                echo '{"SubCategories": '. json_encode($SubCategories) .'}';
            }
             
            else{
                echo '{"SubCategories": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function getSub2Categories() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){ 
            $SubCategories = ''; 
            $db = getDB();
          
                 $sql = "SELECT * FROM subsubcategory where subcatid=".$categoryid;
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $SubCategories = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($SubCategories){
                echo '{"SubCategories": '. json_encode($SubCategories) .'}';
            }
             
            else{
                echo '{"SubCategories": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}




/* ### userdetails ### */
function getSub3Categories() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){ 
            $SubCategories = ''; 
            $db = getDB();
          
                 $sql = "SELECT * FROM 4thsubcategory where subcatid=".$categoryid;
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $SubCategories = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($SubCategories){
                echo '{"SubCategories": '. json_encode($SubCategories) .'}';
            }
             
            else{
                echo '{"SubCategories": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}



 

 
 
/* ### userdetails ### */
function getRecentProd() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $recentnewpro = '';
            $db = getDB();
          
                $sql = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, discount, star FROM product ORDER BY id DESC LIMIT 6";
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $recentnewpro = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($recentnewpro){
				echo '{"NewTenProd": '. json_encode($recentnewpro) .'}';
			}
			 
			else{
				echo '{"NewTenProd": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function weeklybestresele() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$post_id=$data->post_id; 
	$user_id=$data->user_id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $weeklybestresele = '';
            $db = getDB();
          
                $sql = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, discount, star FROM product ORDER BY id DESC LIMIT 6, 12";
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $weeklybestresele = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($weeklybestresele){
				echo '{"weeklybestresele": '. json_encode($weeklybestresele) .'}';
			}
			 
			else{
				echo '{"weeklybestresele": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}





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
				$sql1 = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product where prod_date < '$lastCreated'  ORDER BY prod_date DESC LIMIT 10";
				
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql1);
                  
                } 
                else{

                    $sql = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product ORDER BY prod_date DESC LIMIT 10";
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





 
/* ### userdetails ### */
function getProdVCat() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $lastCreated=$data->lastCreated;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){
            $recentnewpro = '';
            $db = getDB();

            if($lastCreated){
                $sql1 = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product where catid='".$categoryid."' AND prod_date < '$lastCreated'  ORDER BY prod_date DESC LIMIT 10";
                
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql1);
                  
                } 
                else{

                    $sql = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product where catid='".$categoryid."' ORDER BY prod_date DESC LIMIT 10";
 
                $stmt = $db->prepare($sql);
                 
                }
                  
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $recentnewpro = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($recentnewpro){
                echo '{"SubCatProd": '. json_encode($recentnewpro) .'}';
            }
             
            else{
                echo '{"SubCatProd": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function getProdVSubCat() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $lastCreated=$data->lastCreated;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){
            $recentnewpro = '';
            $db = getDB();

            if($lastCreated){
                $sql1 = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product where subcatid='".$categoryid."' AND prod_date < '$lastCreated'  ORDER BY prod_date DESC LIMIT 10";
                
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql1);
                  
                } 
                else{

                    $sql = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product where subcatid='".$categoryid."' ORDER BY prod_date DESC LIMIT 10";
 
                $stmt = $db->prepare($sql);
                 
                }
                  
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $recentnewpro = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($recentnewpro){
                echo '{"SubCatProd": '. json_encode($recentnewpro) .'}';
            }
             
            else{
                echo '{"SubCatProd": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/* ### userdetails ### */
function getProdVSubCat4() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $categoryid=$data->categoryid; 
    $user_id=$data->user_id;
    $lastCreated=$data->lastCreated;
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){
            $recentnewpro = '';
            $db = getDB();

            if($lastCreated){
                $sql1 = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product where 4thcatid='".$categoryid."' AND prod_date < '$lastCreated'  ORDER BY prod_date DESC LIMIT 10";
                
                //$sql = "SELECT * FROM user_post JOIN user_profile ON user_profile.user_id=user_post.user_id where user_profile.user_id=:user_id ORDER BY post_date DESC ";
                $stmt = $db->prepare($sql1);
                  
                } 
                else{

                    $sql = "SELECT id, prod_name, prod_price, prod_large_image, prod_sprice, prod_status, prod_date, discount, star FROM product where 4thcatid='".$categoryid."' ORDER BY prod_date DESC LIMIT 10";
 
                $stmt = $db->prepare($sql);
                 
                }
                  
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $recentnewpro = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
             
            if($recentnewpro){
                echo '{"SubCatProd": '. json_encode($recentnewpro) .'}';
            }
             
            else{
                echo '{"SubCatProd": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}






 
/* ### userdetails ### */
function product_details() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id; 
	$id=$data->id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $productDetails = '';
            $db = getDB();
          
                $sql = "SELECT * FROM product where id='".$id."' AND prod_status=1 ORDER BY id DESC LIMIT 1";
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $productDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
            $array_record = array();
			foreach($productDetails as $value){
				$id1 = $value->id;
				$data_prod['id']=$value->id;
				$data_prod['catid']=$value->catid;
				$data_prod['prod_sku']=$value->prod_sku;
				$data_prod['prod_name']=$value->prod_name;
                $data_prod['prod_price']=$value->prod_price;
                $data_prod['prod_detail']=$value->prod_detail;
                $data_prod['prod_large_image']=$value->prod_large_image;
                $data_prod['prod_sprice']=$value->prod_sprice;
                $data_prod['prod_date']=$value->prod_date;
                $data_prod['prod_status']=$value->prod_status;
                $data_prod['categotyname']=$value->categotyname;
                $data_prod['subcatid']=$value->subcatid;
                $data_prod['prodsize']=$value->prodsize;
                $data_prod['shippingcharge']=$value->shippingcharge;
                $data_prod['discount']=$value->discount;
                $data_prod['hcolor']=$value->hcolor;
                $data_prod['quantity']=$value->quantity;
                $data_prod['sort_detail']=$value->sort_detail;
                $data_prod['star']=$value->star;
                $data_prod['featured']=$value->featured;
                $data_prod['warranty']=$value->warranty;
                $data_prod['rpolicy']=$value->rpolicy;
                $data_prod['allsize']=$value->allsize; 

 
				//$sql12 = "SELECT * FROM post_like WHERE post_id=:post_id1 and user_id=:user_id";
				  $sql12 = "SELECT * FROM feedback WHERE prod_id='".$id1."' AND status=1";
				$stmt12 = $db->prepare($sql12);
				 
				//$stmt12->bindParam("id", $id, PDO::PARAM_INT); 
				$stmt12->execute();
				$ab = $stmt12->rowCount();
				//print_r($ab);
				
                if($ab!="0"){
                    $feedbackData = $stmt12->fetchAll(PDO::FETCH_OBJ);
                }else{
                    $feedbackData = array();
                }

                $data_prod['Feedback']=$feedbackData;

                array_push($array_record,$data_prod);



			}
           
            $db = null;
			 
            if($array_record){
				echo '{"productDetails": '. json_encode($array_record) .'}';
			}
			 
			else{
				echo '{"productDetails": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}

/* ### userdetails ### */
function gettingproductImg() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id; 
	$id=$data->id;
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $ProductIMG = '';
            $db = getDB();
          
                $sql = "SELECT * FROM productimage where pid=$id";
                $stmt = $db->prepare($sql);
                //$stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                 
            $stmt->execute();
            $ProductIMG = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
			 
            if($ProductIMG){
				echo '{"ProductIMG": '. json_encode($ProductIMG) .'}';
			}
			 
			else{
				echo '{"ProductIMG": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}

/* ### userdetails ### */
function productfeedbackInsert() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
	//print_r($data);
    $token=$data->token;
	$user_id=$data->user_id; 
	$prod_id=$data->prod_id;
	$review=$data->review;
	$feedback_date=date("Y-m-d");
	$rate=$data->rate;
	$certify='No';
	$status='0';
	$systemToken=apiToken($user_id);

	
   
    try {
         
        if($systemToken == $token){
            $insteredpost = '';
            $db = getDB();
            	$sql="INSERT INTO feedback(prod_id,user_id,review, feedback_date, rate, certify, status)VALUES('".$prod_id."','".$user_id."','".$review."', '".$feedback_date."', '".$rate."','".$certify."', '".$status."')";
            	$stmt = $db->prepare($sql); 
              
                $stmt->execute();    
                
                $sql2 = "SELECT  * from  feedback WHERE user_id='".$user_id."' ORDER BY id DESC LIMIT 1";
		        $stmt1 = $db->prepare($sql2);
		        $stmt1->execute();

           		$insteredpost = $stmt1->fetch(PDO::FETCH_OBJ); 
           
            $db = null;
			 
            if($insteredpost){
				echo '{"insteredpost": '. json_encode($insteredpost) .'}';
			}
			 
			else{
				echo '{"insteredpost": ""}';
			}
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}




/* ### userdetails ### */
function productfeedbackInsert() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    //print_r($data);
    $token=$data->token;
    $user_id=$data->user_id; 
    $prod_id=$data->prod_id;
    $review=$data->review;
    $feedback_date=date("Y-m-d");
    $rate=$data->rate;
    $certify='No';
    $status='0';
    $systemToken=apiToken($user_id);

    
   
    try {
         
        if($systemToken == $token){
            $insteredpost = '';
            $db = getDB();
                $sql="INSERT INTO feedback(prod_id,user_id,review, feedback_date, rate, certify, status)VALUES('".$prod_id."','".$user_id."','".$review."', '".$feedback_date."', '".$rate."','".$certify."', '".$status."')";
                $stmt = $db->prepare($sql); 
              
                $stmt->execute();    
                
                $sql2 = "SELECT  * from  feedback WHERE user_id='".$user_id."' ORDER BY id DESC LIMIT 1";
                $stmt1 = $db->prepare($sql2);
                $stmt1->execute();

                $insteredpost = $stmt1->fetch(PDO::FETCH_OBJ); 
           
            $db = null;
             
            if($insteredpost){
                echo '{"insteredpost": '. json_encode($insteredpost) .'}';
            }
             
            else{
                echo '{"insteredpost": ""}';
            }
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}

/* ### userdetails ### */
function search() {

    function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM product WHERE UPPER(prod_name) LIKE :query ORDER BY prod_name");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
 

   
?>


