<?php 
include('../../config.inc.php');
$subid=$_REQUEST['subcatid'];
 $sql="SELECT * FROM $_TBL_SUBCAT WHERE catid=$subid";
$db->query($sql)or die($db->error());
 if($db->numRows()>0){
 ?>
  <label class="col-md-3 control-label" for="name">  Sub Category</label>

          <div class="col-md-9">
		 <select  name="subcategory" id="subcategory" cid="<?=$subid?>" onchange="return show3rd(this.value);" class="form-control">
                        <option value="0">Select subcateory</option><?php
		while($row1=$db->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>"><?=$row1['subcatname']?></option>
                  <?php }?>
				   </select>
</div>
 <?php } ?>