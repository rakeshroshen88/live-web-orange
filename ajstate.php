 <?php include("config.inc.php");?>    
	<?php $db1=new DB();
		 $id=$_REQUEST['q'];
		$sql1="SELECT * FROM state WHERE country_id='$id'";
		$db1->query($sql1)or die($db11->error());?>
		<div class="col-lg-12 no-pdd">
													<div class="sn-field">
				 <select  name="stateid" id="stateid"  class="custom-select d-block w-100">
                        <option>Select State</option><?php
		while($row1=$db1->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
                  <?php }?>
				   </select>
	
				   <i class="la la-globe"></i>
				   </div>
													<span id="error_con" class="text-danger"></span>
												</div>