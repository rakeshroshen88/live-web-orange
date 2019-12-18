<?php
require_once("../config.inc.php");
 //$_FILES['uploadfile']['name'];
$uploaddir = '../destination/'; 
$uploaddir_thumb = '../destination/thumb/'; 
$extra=$_GET['m'];
$name=uniqid().$_FILES['uploadfile']['name'];
$file = $uploaddir . $name; 
if(!isset($_SESSION['picid']))
	{
	 $_SESSION['picid']=uniqid();
	}
if(isset($_SESSION["picid"]))
{
	

	
		if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) 
			{ 
		$updatearr=array(	
					 "item_id"=>$_SESSION["picid"],	
					 "image"=>$name,
					 "userid"=>$_SESSION['SES_ADMIN_ID']	
					
					 );
		
		$cc=insertData($updatearr, $_TBL_DESIMAGE);
				echo "success".$cc.'|'.$name; 
			}
			else 
			{
				echo "error";
			}
			//resizeimages($name,$uploaddir,$uploaddir);
	
}



?>