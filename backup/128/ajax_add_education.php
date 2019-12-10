<?php 
include_once("config.inc.php");
//include('chksession.php');

if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}
//print_r($FormData);	
if(!empty($FormData)){
$eduid=$FormData['eduid'];
$description=$FormData['description'];
$to=$FormData['to'];
$from=$FormData['from'];
$school=$FormData['school'];
$degree=$FormData['degree'];
if(!empty($eduid)){
					$whereClause=" edu_id=".$eduid;
					$arr=array( "user_id"=>$_SESSION['sess_webid'],
							"edu_title"=>$school,
							"star_year"=>$from,
							"end_year"=>$to,
							"degree"=>$degree,
							"description"=>$description,							
							"edu_date"=>date('Y-m-d H:i:s')
						);
					updateData($arr, 'user_education', $whereClause);
					echo $regmsg="Data Updated!";
}else{
		$arr=array(  		"user_id"=>$_SESSION['sess_webid'],
							"edu_title"=>$school,
							"star_year"=>$from,
							"end_year"=>$to,
							"degree"=>$degree,
							"description"=>$description,							
							"edu_date"=>date('Y-m-d H:i:s')
			    );
				
     $insid=insertData($arr, 'user_education');
	echo $regmsg="Data saved!";
}
}
?>