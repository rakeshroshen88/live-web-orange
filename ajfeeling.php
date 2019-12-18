 <?php include("config.inc.php");?>    
	<?php $db1=new DB();
		 $id=$_POST['f'];
		  $sql1="SELECT * FROM $_TBL_FEELINGS WHERE catid='$id'";
		$db1->query($sql1)or die($db11->error());?>
		
		 <select name="fsubcatname" id="fsubcatname" class="select-fee-select">
                        <option>Select feeling</option><?php
		while($row1=$db1->fetchArray()){
		    $row1['imgid'];
		?> <option value='<?=$row1['subcatname']?>'><?=$row1['subcatname']?></option>
       <?php }?>
				   </select>
				   