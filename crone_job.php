<?php
session_start();
include('database_connection.php');
///////////////////////////
$query1 = "SELECT * FROM login_details GROUP by user_id";

$statement1 = $connect->prepare($query1);

$statement1->execute();

$result1 = $statement1->fetchAll();


foreach($result1 as $row1)
{
$login_details_id=$row1['login_details_id'];
$last_activity=$row1['last_activity'];
$cuttime=date('d-m-Y H:i:s');
$to_time = strtotime($last_activity);
$from_time = strtotime($cuttime);
$t=round(abs($to_time - $from_time) / 60);
if($t>10){
 $query2 = "UPDATE login_details SET status = 'Offline' WHERE login_details_id = '".$login_details_id."'";
$statement2 = $connect->prepare($query2);
$statement2->execute();
}	
}
echo "ok";
//////////////////////////
?>