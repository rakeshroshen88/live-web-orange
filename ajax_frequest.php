<?php 
include_once("config.inc.php");
include('chksession.php');
/*  if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				}  */
//$connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e");
$dbu=new DB();				
$followid=$_POST['followid'];

$sql="SELECT * from friendrequest where user_id=".$_SESSION['sess_webid']." and request_fid=".$followid;
$db->query($sql);
if($db->numRows()>0)
{
 echo $regmsg="Already Sent!";
}else{
		
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"request_fid"=>$followid,							
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'friendrequest');
	 //////////////chat///////////////////
	 
				/*  $data = array(
					':username'		=>	$emailid,
					':name'		=>	$userrow['first_name'],
					':password'		=>	password_hash('12abc', PASSWORD_DEFAULT),
					':f_userid'		=>	$followid,
				);
				$query = "
				INSERT INTO login 
				(username, password, name, f_userid) 
				VALUES (:username, :password, :name, :f_userid)
				";
				$statement = $connect->prepare($query);
				$statement->execute($data);   */
	//////////////////////////////////	
 ////////////////////////////////////
/* $query = "
		SELECT * FROM login
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $userrow['first_name']
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
	}} */
/////////////////////////////////////////////////
	 echo $regmsg="Request Sent";	
}
	 
//}
?>