<?php 
include('config.inc.php');
include_once("chksession.php");

if(isset($_POST['formData'])){
						$FormData = array();
						$AllFormData = parse_str($_POST['formData'], $FormData);	
				}

//print_r($FormData);
$price=$FormData['price'];
$ptype=$FormData['ptype'];
$category=$FormData['category'];
$pdetails=$FormData['pdetails'];
$imgid=$FormData['imgid'];
$prod_sprice=$FormData['prod_sprice'];
$ppath=$FormData['pimgid'];
//$stripped = str_replace(' ', '', $ppath);
	$link = mysqli_connect("localhost", "orangestate_uorange", "MN9Ydvr,Hg!!", "orangestate_orange");
		
$prod_detail = mysqli_real_escape_string($link, $FormData['prod_desc']);
$prodname = mysqli_real_escape_string($link, $FormData['prodname']);
$sort_detail = mysqli_real_escape_string($link, $FormData['sort_detail']);
if(!empty($prodname)){
		$updatearr=array(
		
				 	 "catid"=>$FormData['category'],									 
					 "prod_sku"=>$FormData['sku'],
					 "subcatid"=>$FormData['subcategory'],
					 "userid"=>$_SESSION['sess_webid'],
					 "quantity"=>$FormData['quantity'],
					 "total"=>$FormData['quantity'],
					 "prod_name"=>$prodname,					
					 "prod_price"=>$FormData['price'],
					 "prod_detail"=>$prod_detail,					
					 //"shippingcharge"=>$FormData['shippingcharge'],					 
					 "prod_large_image"=>$ppath,						
					 "prod_sprice"=>$FormData['prod_sprice'],
					 "prod_date"=>date('Y-m-d h:i:s'),
					 "prod_status"=>0,
					 "material"=>$FormData['material'],
					 "prodsize1"=>$FormData['size'],
					 "prodsize2"=>$FormData['size1'],
					 "prodsize3"=>$FormData['size2'],
					 "prodsize4"=>$FormData['size3'],
					 //"newrelease"=>$FormData['newrelease'],					 
					 "shippingcharge"=>$FormData['shippingcharge'],
					 "sort_detail"=>$sort_detail,
					 "star"=>$FormData['star']
					 
				 );
				//print_r($updatearr);
				

     $insid=insertData($updatearr, 'product');
$sql1 = "UPDATE productimage SET pid = '".$insid."' WHERE ses_id=".$_SESSION['sess_ses_id'];
$db->query($sql1);
	 echo $regmsg="Product Added Successfully !";	
}else{
	echo "error found";
}

?>