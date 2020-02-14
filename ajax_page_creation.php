<?php 
include('config.inc.php');
include('chksession.php');
//if($_SESSION['sess_webid']==''){return $errMsg='<b>Please login before create page !</b>'; }else{
//if(!empty($_POST['companyname'])){
$companyname=$_POST['companyname'];
$category=$_POST['category'];
$country=$_POST['country'];
					$updatear=array(	
					"user_id"=>$_SESSION['sess_webid'],	
					"page_name"=>$companyname,					
					"page_cat_id"=>$category,
					"country"=>$country,
					"page_status"=>0,	
					"created_date"=>date("Y-m-d H:i:s")
					);
						//print_r($updatear);
					$insid=insertData($updatear, $_TBL_COMPANY);

						if($insid>0)
							{
								$_SESSION['com_webid']=$insid;
								echo $errMsg='<b>Company Added Successfully!</b>';
							}else{
								echo $errMsg='<b>Sorry, There is some thing wrong!</b>';
							}

//}

?>