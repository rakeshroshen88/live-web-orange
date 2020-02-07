 <?php include("../../config.inc.php");?>    
	<?php $db1=new DB();
		 $id=$_REQUEST['q'];
		$sql1="SELECT * FROM cities WHERE stateid='$id'";
		$db1->query($sql1)or die($db11->error());?>
		<h3>Select city:</h3>
		 <select style="width: 40%;" name="cityname" onchange="return showhotel(this.value);">
                        <option>Select city</option><?php
		while($row1=$db1->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>"><?=$row1['cityname']?></option>
                  <?php }?>
				   </select>
				   