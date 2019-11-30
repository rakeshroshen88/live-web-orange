<?php
session_start();
include('chat/database_connection.php');
$query = "
	UPDATE login_details 
	SET status = 'Offline' 
	WHERE user_id = '".$_SESSION['user_id']."'";
	$statement = $connect->prepare($query);
	$statement->execute();
unset($_SESSION['sess_webid']);
unset($_SESSION['sess_webmail']);
session_regenerate_id(true);	
session_destroy();
header('location:index.php');
?>
