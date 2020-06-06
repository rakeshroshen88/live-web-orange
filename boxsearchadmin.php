<?php
include('config.inc.php');
if($_POST)
{
$q=$_POST['keyword'];
$q=str_replace("@","",$q);
$q=str_replace(" ","%",$q);
$db4=new DB();

 $sql="select * from all_user where first_name like '%$q%'  order by user_id ";
$db->query($sql);
if($db->numRows()>0)
{
$dbus=new DB();
while($row3=$db->fetchArray()){

$userspath=$dbus->getSingleResult('select image_id from user_profile where user_id='.$row3['user_id']);
$fname=$row3['first_name'];
$lname=$row3['last_name'];
//$img=$row['img'];
//$country=$row3['country'];images/resources/user.png
?>
<div class="display_box" >
<?php if(!empty($userspath)){?>
<img src="../../upload/<?php echo $userspath; ?>" class="image" height="50" width="50" />
<?php }else{ ?>
<img src="../../images/resources/user.png" class="image" height="50" width="50" />
<?php }?>
<a href="javascript:void(0);" class='addname' userid='<?=$row3['user_id']?>' email_id='<?=$row3['email_id']?>' title='<?php echo $fname; ?>&nbsp;<?php echo $lname; ?>'>
<?php echo $fname; ?>&nbsp;<?php echo $lname; ?> </a>
</div>
<?php
}
}else{ echo "No match";}
}
?>