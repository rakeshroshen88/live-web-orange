<?php include('config.inc.php');
include('chksession.php');
$output = '';  
if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}

//print_r($FormData);
$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
//print_r($FormData);
$feeling=$FormData['feeling'];
$post_details=$FormData['postid'];
$imgid=$FormData['imgidpopup'];
$tagfriends=$FormData['tagfriends'];
$fsubcatname=$FormData['fsubcatname'];
$livelocationinput=$FormData['livelocationinput'];
$post_id=$FormData['post_id'];
if(!empty($FormData['pageid'])){
$pageid=$FormData['pageid'];
}else{
$pageid=0;	
}
$post_title=$FormData['selectfeel1'];

$fname=$db->getSingleResult('select catname from '.$_TBL_FEELINGC." where id=".$post_title);
$prod_detail1 = mysqli_real_escape_string($link, $post_details);

		$arr=array(
							"user_id"=>$_SESSION['sess_webid'],
							"allpath"=>  $imgid,
							"post_title"=>$fname,
							"feelingimgid"=>  $fsubcatname,
							"post_details"=>$prod_detail1,
							"postemos"=>$feeling,
							"tagfriends"=>$tagfriends,
							"post_status"=>1,	
							"pageid"=>$pageid,	
							"livelocation"=>$livelocationinput,								
							"post_date"=>date('Y-m-d H:i:s')
			    );
				//print_r($arr);
   
$whereClause=" post_id=".$post_id;
		 updateData($arr, 'user_post', $whereClause);		
    
	 echo $regmsg="post updated Successfully !";	
?>