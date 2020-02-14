 <?php include("../../config.inc.php");?>    
	<?php $db1=new DB();
		 $id=$_REQUEST['q'];		
		 $sql1="SELECT * FROM hotellist WHERE cityid='$id'";
		 $db1->query($sql1)or die($db11->error());?>
	
                                        <label class="col-md-3 control-label" for="name"> Hotel List</label>
                                        <div class="col-md-9">
		 <select name="prodname" class="form-control">
         <option>Select Hotel</option>
		 <?php
		  while($row1=$db1->fetchArray()){
		  
		?> <option value="<?=$row1['title']?>"><?=$row1['title']?></option>
                  <?php }?>
		</select>
			 </div>	   