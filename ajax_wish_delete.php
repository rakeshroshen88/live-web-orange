<?php 
include_once("config.inc.php");
include('chksession.php');
 if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				} 
				
$pid=$_POST['pid'];
if(!empty($pid)){
 $sql="DELETE from wishlish where prodid=".$pid;
$db->query($sql);
echo $regmsg="wishlish product Deleted!";	
}
	 
//}
?>