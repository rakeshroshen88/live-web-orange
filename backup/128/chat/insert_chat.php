<?php

//insert_chat.php

include('database_connection.php');

session_start();

$data = array(
	':to_user_id'		=>	$_POST['to_user_id'],
	':from_user_id'		=>	$_SESSION['user_id'],
	':chat_message'		=>	$_POST['chat_message'],
	':status'			=>	'1',
	':f_userid'			=>	$_SESSION['sess_webid']
);
//print_r($data);
  $query = "
INSERT INTO chat_message
(to_user_id, from_user_id, chat_message, status, f_userid)
VALUES (:to_user_id, :from_user_id, :chat_message, :status, :f_userid)
";
 /* $query = "
INSERT INTO chat_message
(to_user_id, from_user_id, chat_message, status)
VALUES (:to_user_id, :from_user_id, :chat_message, :status)
"; */
$statement = $connect->prepare($query);

if($statement->execute($data))
{
	//commented to keep the status as 1
	//echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}

?>
