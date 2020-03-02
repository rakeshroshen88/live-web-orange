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
						
							//////////////////////////////
							$querynew = "SELECT login_details_id FROM login_details WHERE f_userid = '".$user_id."'";					
							$statement = $connect->prepare($querynew);
							$statement->execute();
							$login_details_id = $statement->fetch();
							$login_details_id=$login_details_id[0];
							$_SESSION['login_details_id'] = $login_details_id;	
							
							//$_SESSION['login_details_id'] = $connect->lastInsertId();	
									if($login_details_id > 0){
									$query2 = "UPDATE login_details SET status = 'Online' WHERE f_userid = '".$user_id."'";
									$stmt3 = $connect->prepare($query2);				 
									$stmt3->execute();
									}else{				
									
									 $sub_query = "
									INSERT INTO login_details
									(user_id,f_userid,status)
									VALUES ('".$row['user_id']."', '".$user_id."','Online')
									";
									$statement = $connect->prepare($sub_query);
									$statement->execute();	
									//$_SESSION['login_details_id'] = $login_details_id->login_details_id;	
									$_SESSION['login_details_id'] = $connect->lastInsertId();					
									}
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
								"update_date"=>date("Y-m-d")
						);
						$insidm=insertData($updatear1, 'user_profile');
				////////////////chat///////////////////////
				/* $connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e"); */
							$data = array(
							':username'		=>	$emial,
							':name'		=>	$name,
							':password'		=>	'123',//password_hash($password, PASSWORD_DEFAULT),
							':f_userid'		=>	$insid
							);

						$query = "
							INSERT INTO login 
							(username, password, name, f_userid) 
							VALUES (:username, :password, :name, :f_userid)
							";
							$statement = $connect->prepare($query);
							$statement->execute($data);
							$user_id1=$connect->lastInsertId();
							$_SESSION['user_id'] = $user_id1;
							$_SESSION['username'] = $emial;
				
						////////////////////////////////////////
						$sub_query = "INSERT INTO login_details
	     		(user_id,f_userid,status)
	     		VALUES ('".$user_id1."', '".$insid."','Online')
				";
							$statement = $connect->prepare($sub_query);
							$statement->execute();
							$_SESSION['login_details_id'] = $connect->lastInsertId();	
						
					
					
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