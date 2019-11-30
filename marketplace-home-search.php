<?php
include("config.inc.php");
 $q=$_REQUEST['q'];
   $c=$_REQUEST['catid'];

$db1=new DB();
		if($c=='all'){
		 $sql1="SELECT * from ".$_TBL_PRODUCT." where prod_name like '%$q%' order by id desc";
	}else{
		
		 $sql1="SELECT * from ".$_TBL_PRODUCT." where catid='$c' and prod_name like '%$q%' order by id desc";
		
	}
	 echo "<ul>";
		 $db1->query($sql1)or die($db1->error());
		  while($row1=$db1->fetchArray()){
		 $goid=base64_encode($row1['id']); 
			  
			echo "<li><a href='product-details.php?pid=".$goid."'>".$row1['prod_name']."</a></li>"; 
		 // }
	  }

echo "</ul>"

?>