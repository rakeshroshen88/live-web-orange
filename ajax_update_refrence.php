<?php 
include_once("config.inc.php");

$dbu=new DB();				
$ref=$_POST['ref'];
$sql1 = "UPDATE $_TBL_ORDER SET refrenceid = '".$ref."' WHERE userid=".$_SESSION['sess_webid'].' and id='.$_SESSION['sess_oid'];
$db->query($sql1);

	 
}
?>