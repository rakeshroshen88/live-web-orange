<?php include('config.inc.php');
include('chksession.php');
$output = '';  
 


if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}

//print_r($FormData);

$title=$FormData['subject'];
$review=$FormData['comreview'];
$rate=$FormData['rate'];
$pages=$FormData['page'];
$prod_id=$FormData['pid'];

if(!empty($review)){
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"title"=>$title,
							"review"=>$review,
							"rate"=>$rate,
							"status"=>0,	
							"pages"=>$pages,
							"prod_id"=>$prod_id,
							"feedback_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
$insid=insertData($arr, 'feedback');
echo 'ok';	 

}

?>
