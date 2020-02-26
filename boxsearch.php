<?php
include('config.inc.php');
if($_POST)
{
$q=$_POST['searchword'];
$q=str_replace("@","",$q);
$q=str_replace(" ","%",$q);
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
//user_id IN ($allfriend) and 
 $sql="select * from all_user where user_id IN ($allfriend) and  first_name like '%$q%'  order by user_id ";
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
<img src="upload/<?php echo $userspath; ?>" class="image" />
<?php }else{ ?>
<img src="images/resources/user.png" class="image" />
<?php }?>
<a href="#" class='addname' userid='<?=$row3['user_id']?>' title='<?php echo $fname; ?>&nbsp;<?php echo $lname; ?>'>
<?php echo $fname; ?>&nbsp;<?php echo $lname; ?> </a>
</div>
<?php
}
}else{ echo "No match";}
}
?>