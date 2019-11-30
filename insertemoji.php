<?php include("config.inc.php");  

//insert_chat.php

include('chat/database_connection.php');

session_start();

$data = array(
	':to_user_id'		=>	$_POST['to_user_id'],
	':from_user_id'		=>	$_SESSION['user_id'],
	':chat_message'		=>	$_POST['chat_message'],
	':mp3'		=>	$_POST['mp3'],
	':status'			=>	'1'
);

$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, mp3, status) 
VALUES (:to_user_id, :from_user_id, :chat_message, :mp3, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}
?>