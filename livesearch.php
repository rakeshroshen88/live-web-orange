<?php include("config.inc.php");
 $q=$_REQUEST['keyword'];
   $c=$_REQUEST['catid'];

$db1=new DB();

	 $sql1="SELECT * from products where prod_name like '%$q%' order by id desc";
	
	 echo "<ul id='country-list'>";
		 $db1->query($sql1)or die($db1->error());
		  while($row1=$db1->fetchArray()){
			  
			echo "<li><a href='searchdone?prodid=".base64_encode($row1['id'])."'>".$row1['prod_name']."</a></li>"; 
		 // }
	  }

echo "</ul>" ?>
