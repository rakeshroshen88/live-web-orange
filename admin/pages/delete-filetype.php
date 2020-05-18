<?php
require_once("../../config.inc.php");
    
	
		$check=$db->query("delete from rooms_type where id='".$_POST["imageid"]."'");
		
		if($check)
		{
		
			echo "ok";
		}
		else
		{
			echo "Oops, there is some problem";
		}
		

?>