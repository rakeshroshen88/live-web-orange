<?php
session_start();
include('database_connection.php');

$query = "
	UPDATE login_details 
	SET status = 'Offline' 
	WHERE user_id = '".$_SESSION['user_id']."'";
	$statement = $connect->prepare($query);
	$statement->execute();
session_destroy();
header('location:login.php');

?>
