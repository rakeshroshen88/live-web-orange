 <?php include("../../config.inc.php");?>    
	<?php $db1=new DB();
		 $id=$_REQUEST['sid'];
		$sql1="SELECT * FROM cities WHERE state_id='$id'";
		$db1->query($sql1)or die($db11->error());?>
		 <label class="col-md-2 control-label" for="name"> Select City</label>
          <div class="col-md-10">
		 <select  name="cityname" id="cityname"  class="form-control">
                        <option>Select city</option><?php
		while($row1=$db1->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
                  <?php }?>
				   </select>
		</div></br>
				   