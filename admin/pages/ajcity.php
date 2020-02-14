 <?php include("../../config.inc.php");?>    
	<?php $db1=new DB();
		 $id=$_REQUEST['q'];
		$sql1="SELECT * FROM cities WHERE stateid='$id'";
		$db1->query($sql1)or die($db11->error());?>
		 <label class="col-md-3 control-label" for="name"> Select City</label>
          <div class="col-md-9">
		 <select  name="cityname" onchange="return showhotel(this.value);" class="form-control">
                        <option>Select city</option><?php
		while($row1=$db1->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>"><?=$row1['cityname']?></option>
                  <?php }?>
				   </select>
		</div>
				   