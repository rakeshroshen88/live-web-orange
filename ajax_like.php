<?php 
include_once("config.inc.php");
include('chksession.php');
 if(isset($_POST['postid'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['postid'], $FormData);	
				} 
				
				 $post_id=$_POST['postid'];
				
				//if(!empty($post_id)){
 $sql="SELECT * from post_like where post_id=".$post_id;
$db->query($sql);
if($db->numRows()>0)
{
$row=$db->fetchArray();
if($row['do_like']==0){
$sql1 = "UPDATE post_like SET do_like = '1' WHERE post_id=".$post_id;
$db->query($sql1);
echo $regmsg="liked";	
}else{
$sql1 = "UPDATE post_like SET do_like = '0' WHERE post_id=".$post_id;
$db->query($sql1);
echo $regmsg="Like";	
}
	
}else{
		
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"post_id"=>$post_id,
							"do_like"=>1,
							"status"=>'yes',							
							"l_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
     $insid=insertData($arr, 'post_like');
	 echo $regmsg="liked";	
}
	 
//}
?>