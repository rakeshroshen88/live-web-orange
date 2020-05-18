<?php
require_once("../config.inc.php");
if(isset($_POST["imageid"]) && $_POST["imageid"]!="")
{
	// select image name
	$image=mysqli_query("select image from $_TBL_ITEMIMAGE where id='".$_POST["imageid"]."'") or die(mysqli_error());
	if(mysqli_num_rows($image)>0)
	{
		$image_row=mysqli_fetch_array($image);
		$image_name=$image_row["image"];
			
		$check=mysqli_query("delete from $_TBL_ITEMIMAGE where id='".$_POST["imageid"]."'") or die(mysqli_error());
		
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