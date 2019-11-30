<?php
include('config.inc.php');
if($_POST)
{
$q=$_POST['searchword'];
$q=str_replace("@","",$q);
$q=str_replace(" ","%",$q);
$sql="select * from all_user where first_name like '%$q%' or last_name like '%$q%' order by user_id ";
$db->query($sql);
if($db->numRows()>0)
{
$dbus=new DB();
while($row=$db->fetchArray()){

$userspath=$dbus->getSingleResult('select image_id from user_profile where user_id='.$row['user_id']);
$fname=$row['first_name'];
$lname=$row['last_name'];
//$img=$row['img'];
$country=$row['country'];
?>
<div class="display_box" >
<img src="upload/<?php echo $userspath; ?>" class="image" />
<a href="#" class='addname' userid='<?=$row['user_id']?>' title='<?php echo $fname; ?>&nbsp;<?php echo $lname; ?>'>
<?php echo $fname; ?>&nbsp;<?php echo $lname; ?> </a>
</div>
<?php
}
}else{ echo "No match";}
}
?>