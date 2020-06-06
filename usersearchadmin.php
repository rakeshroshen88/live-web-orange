<?php include("config.inc.php");
 $q=$_REQUEST['keyword'];
   $c=$_REQUEST['catid'];

$db1=new DB();
$db10=new DB();

	 $sql1="SELECT * from all_user where first_name like '$q%' order by user_id desc";
	
	 echo "<ul id='country-list'>";
		 $db1->query($sql1)or die($db1->error());
		  while($row1=$db1->fetchArray()){
			
			$work=$db10->getSingleResult("select current_company from user_profile where user_id=".$row1['user_id']);
			
			$pimage=$db10->getSingleResult('select image_id from user_profile where user_id='.$row1['user_id']);	
			
			if(!empty($pimage)){
			$path='<img src="upload/'.$pimage.'" alt="" height="50" width="50">';
			}else{ 
			$path='<img src="images/resources/user.png" alt="">';
			}								
			echo "<li>".$path."<a href='view-profile.php?uid=".base64_encode($row1['user_id'])."'>".$row1['first_name']."</a> ".$work."</li>"; 
		 // }
	  }

echo "</ul>" ?>
