<?php include('config.inc.php');
include('chksession.php');
$output = '';  
 


if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}

//print_r($FormData);

$title=$FormData['title'];
$review=$FormData['review'];
$rate=$FormData['rate'];
$pages=$FormData['page'];
$prod_id=$FormData['pid'];
$post_title=$FormData['selectfeel'];

if(!empty($review)){
		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"title"=>$title,
							"review"=>$review,
							"rate"=>$rate,
							"status"=>0,	
							"pages"=>$pages,
							"prod_id"=>$prod_id,
							"feedback_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
$insid=insertData($arr, 'feedback');
echo 'ok';	 
$sql="SELECT * from feedback where id=".$insid;
$db->query($sql);
if($db->numRows()>0)
{
$row=$db->fetchArray();
}
$db1=new DB();
$dbu=new DB();
$db2=new DB();
$sqluser="SELECT * from user_profile where user_id=".$row['sess_webid'];
$dbu->query($sqluser);
if($dbu->numRows()>0)
{
$userrow=$dbu->fetchArray();
}	 

}

?>
