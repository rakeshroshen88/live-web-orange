<?php
require_once("../config.inc.php");
if(isset($_GET["imageid"]) && $_GET["imageid"]!="")
{
	// select image name
	$image=mysql_query("select image from $_TBL_DESIMAGE where id='".$_GET["imageid"]."'") or die(mysql_error());
	if(mysql_num_rows($image)>0)
	{
		$image_row=mysql_fetch_array($image);
		$image_name=$image_row["image"];
			
		$check=mysql_query("delete from $_TBL_DESIMAGE where id='".$_GET["imageid"]."'") or die(mysql_error());
		
		if($check)
		{
			// remove from folder too
			@unlink("../upload/".$image_name);
			@unlink("../upload/thumb/".$image_name);
			@unlink("../upload/medium/".$image_name);
			echo "ok";
		}
		else
		{
			echo "Oops, there is some problem";
		}
	}	
}
?>