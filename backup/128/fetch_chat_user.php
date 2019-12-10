<?php
//session_start();
//include('chat/database_connection.php');
//include('config.inc.php');
//session_start();


echo $query = "
SELECT * FROM login
WHERE user_id != '".$_SESSION['user_id']."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<ul>
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	 $a=strtotime($current_timestamp); 
	  $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	 
	 
	 $uid=$db->getSingleResult("select user_id from all_user where email_id='".$row['username']."'");
	  $userfpath=$db->getSingleResult('select image_id from user_profile where user_id='.$uid);
	  if(!empty($userfpath)){
	  $upath='upload/'.$userfpath;
	  }else{
	  $upath='/images/resources/user3.png';
	  }
	 $fname=$db->getSingleResult('select first_name from all_user where user_id='.$uid); 
	//$status =$row['status'];
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="greendot"></span>';
	}
	else
	{
		$status = '<span class="reddot"></span>';
	}
	
	$output .= '
	<li>
	<button type="button" class="start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['name'].'">
		  <div class="chat-user-img"><img src="'.$upath.'"></div><div class="chat-user-name"><h3>'.$fname.' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</h3></div>'.fetch_is_status($row['user_id'], $connect).'
		  </button>
	</li>';
}
//fetch_is_status($row['user_id'], $connect)
$output .= '</ul>';

echo $output;

?>
