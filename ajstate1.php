<?php 
include('../../config.inc.php');
$cid=$_REQUEST['cid'];

 $sql="SELECT * FROM state WHERE country_id=$cid";
$db->query($sql)or die($db->error());
 if($db->numRows()>0){
 ?>
  <label class="col-md-2 control-label" for="name"> State</label>
 <div class="col-md-10">
		 <select  name="state" id="state" class="form-control">
                        <option value="0">Select State</option><?php
		while($row1=$db->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>" ><?=$row1['name']?></option>
                  <?php }?>
				   </select> </div><br/>

 <?php } ?>