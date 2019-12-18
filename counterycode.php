<?php
include("config.inc.php");
 $c=$_POST['c'];
 
		$db1=new DB();

		 $sql1="SELECT * from countries where countries_id =".$c;
		 $db1->query($sql1)or die($db1->error());
		 $row1=$db1->fetchArray();
		 echo $row1['countries_isd_code'];
			  

?>