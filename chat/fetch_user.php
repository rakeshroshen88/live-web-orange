<?php
session_start();
include('database_connection.php');
include('../config.inc.php');
//session_start();

$db4=new DB();
$l=array();
$sql4="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
$db4->query($sql4);
if($db4->numRows()>0)
{
while($row4=$db4->fetchArray()){
	$l[]=$row4['follow'];
}
}
$allfriend=implode(',',$l);


//$query = "SELECT * FROM login WHERE user_id != '".$_SESSION['user_id']."'";
$query = "
SELECT * FROM login
WHERE user_id != '".$_SESSION['user_id']."' and f_userid IN($allfriend)";

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
		  <div class="chat-user-img"><img src="'.$upath.'" height="40" width="40"></div><div class="chat-user-name"><h3>'.$row['name'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</h3></div>'.fetch_is_status($row['user_id'], $connect).'
		  </button>
	</li>';
}
//fetch_is_status($row['user_id'], $connect)
$output .= '</ul>';

echo $output;

?>
