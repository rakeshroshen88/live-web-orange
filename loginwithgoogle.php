<?php include('config.inc.php');
include('chat/database_connection.php');
if(!empty($_POST['name1'])){
$name=$_POST['name1'];
$lastname=$_POST['lastname'];
$emial=$_POST['email1'];
$password=$_POST['password1'];
	$updatear=array(	 
					 "first_name"=>$name,
					 "last_name"=>$lastname,
					 "email_id"=>$emial,
					 "mobile_no"=>'',
					 "password"=>$password,
					 "uniqueid"=>$uniqueid,
					 "country"=>'',
					 "user_status"=>1,	
					 "joindate"=>date("Y-m-d")

						);
					$whereClause=" email_id='".$emial."'";
					if(matchExists($_TBL_USER, $whereClause))
					{
					$user_id=$db->getSingleResult("SELECT user_id from all_user where email_id='".$emial."'");
					
					$_SESSION['sess_webid']=$user_id;
					$_SESSION['sess_webmail']=$emial;	
					$_SESSION['sess_name']=$name;
					////////////////////////////////////
					$query = "
					SELECT * FROM login
					WHERE username = :username
					";
					$statement = $connect->prepare($query);
					$statement->execute(
					array(
						':username' => $emial
						)
					);
					$count = $statement->rowCount();
					if($count > 0)
						{
							$result1 = $statement->fetchAll();
							foreach($result1 as $row)
							{
							$_SESSION['user_id'] = $row['user_id'];
							$_SESSION['username'] = $row['username'];
							$sub_query = "
								INSERT INTO login_details
								(user_id,status)
								VALUES ('".$row['user_id']."','Online')
								";
							$statement = $connect->prepare($sub_query);
							$statement->execute();
							$_SESSION['login_details_id'] = $connect->lastInsertId();	
							}
						}
	/////////////////////////////////////////////////	

						//redirect("dashboard.php");
					$status = true;
					$message = "successfully";
						
					}else{
						$insid=insertData($updatear, $_TBL_USER);

					if($insid>0)
						{
							$updatear1=array(	 
								"user_id"=>$insid,
								"first_name"=>$name,
								"last_name"=>$lastname,
								"dob"=>'',
								"gender"=>'',						 
								"update_date"=>date("Y-m-d")

						);
						$insidm=insertData($updatear1, 'user_profile');
				////////////////chat///////////////////////
				/* $connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e"); */
							$data = array(
							':username'		=>	$emial,
							':name'		=>	$name,
							':password'		=>	password_hash($password, PASSWORD_DEFAULT),
							':f_userid'		=>	$insid
							);

						$query = "
							INSERT INTO login 
							(username, password, name, f_userid) 
							VALUES (:username, :password, :name, :f_userid)
							";
							$statement = $connect->prepare($query);
							$statement->execute($data);
				
						////////////////////////////////////////
						
					
					
					if($insid !== false){
					$status = true;
					$message = "successfully";
					}else{
					$status = false;
					$message = "un successfully";
					}
			
			
								//echo $errMsg='<b>User Added Successfully!</b>';
					}
					
					}
			$response['status']= $status;
			$response['id']= $insid;
			$response['message'] = $message;
			echo json_encode($response);
			die;


}






?>