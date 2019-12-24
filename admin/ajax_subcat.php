<?php 
include('../../config.inc.php');
$subid=$_POST['subcatid'];
echo $sql="SELECT * FROM $_TBL_SUBCAT WHERE id=$subid";
$db->query($sql)or die($db->error());
$row=$db->fetchArray()){
	echo $row['catid'];
}

?>