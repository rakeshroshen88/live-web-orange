<?php include('config.inc.php');
include('chksession.php');
$output = '';  
 


if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}

//print_r($FormData);

$servicename=$FormData['servicename'];
$description=$FormData['description'];
$start_price=$FormData['start_price'];
$pages=$FormData['company'];
$com_id=$FormData['com_id'];
$service_image_id=$FormData['serviceimage'];
if(!empty($servicename)){
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"service_name"=>$servicename,
							"service_details"=>$description,
							"starting_price"=>$start_price,
							"status"=>1,	
							"service_page_type"=>$pages,
							"com_id"=>$com_id,
							"service_image_id"=>$service_image_id,
							"date"=>date('Y-m-d')
			    );
				//print_r($arr);
$insid=insertData($arr, 'com_services');
echo 'ok';	 

}

?>
