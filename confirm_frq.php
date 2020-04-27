<?php 
include_once("config.inc.php");
//include('chksession.php');
/*  if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				}  */
//$connect = new PDO("mysql:host=localhost;dbname=orangestate_chat;charset=utf8mb4", "orangestate_uchat", "nMCUWx-K^z8e");
$dbu=new DB();				
$followid=$_REQUEST['followid'];
$cuserid=$_REQUEST['user_id'];
$sqluser="SELECT * from user_profile where user_id=".$cuserid;
$dbu->query($sqluser);
if($dbu->numRows()>0)
{
$userrow=$dbu->fetchArray();
}
/* $emailid=$db->getSingleResult('select email_id from '.$_TBL_USER." where user_id=".$userrow['user_id']); */
				//if(!empty($post_id)){
  $sql="SELECT * from followers where user_id=".$cuserid." and follow=".$followid;
$db->query($sql);
if($db->numRows()>0)
{
$row=$db->fetchArray();
$follower=$row['follow'];
$dsql="DELETE FROM followers where user_id=".$cuserid." and follow=".$followid;
$db->query($dsql);
 echo $regmsg="follower Removed Successfully !";
/*if (in_array($followid, $follower, true)) {
    if (($key = array_search($followid, $follower)) !== false) {
    unset($array[$key]);
	}

$sql1 = "UPDATE user_profile SET allfriends = '".$friends"' WHERE user_id=".$cuserid; */

$conf=$_REQUEST['conf'];
if($conf=='conf' or $conf !='conf' ){
$sql1 = "UPDATE friendrequest SET status='2' WHERE request_fid = '".$followid."' and user_id=".$cuserid; 
$db->query($sql1);
}
}else{
		
		$arr=array(
							"user_id"=>$cuserid,
							"follow"=>$followid,							
							"status"=>'yes',							
							"f_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'followers');
	 
	 ////////////////Notification///////////////////
	 
		/* $notarr=array(
							"user_id"=>$cuserid,
							"f_userid"=>$followid,	
							"notification_type"=>'follower',
							"status"=>'1',							
							"date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $not=insertData($notarr, 'notification'); */
	 //////////////////////////////////
	 $conf=$_REQUEST['conf'];

//if($conf=='conf'){
$sql1 = "UPDATE friendrequest SET status='2' WHERE request_fid = '".$followid."' and user_id=".$cuserid; 
$db->query($sql1);
//}
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
	 echo $regmsg="following";	
}
	 
//}
?>