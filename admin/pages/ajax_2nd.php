<?php 
include('../../config.inc.php');
$cid=$_REQUEST['cid'];
$subcatid=$_REQUEST['subcatid'];
 $sql="SELECT * FROM $_TBL_SUBSUBCAT WHERE catid=$cid and subcatid=$subcatid";
$db->query($sql)or die($db->error());
 if($db->numRows()>0){
 ?>
<label class="col-md-3 control-label" for="name">  Ternary Category</label>
 <div class="col-md-9">
		 <select  name="subsubcategory" id="subsubcategory" cid="<?=$cid?>" sid="<?=$subcatid?>" onchange="return show4th(this.value);" class="form-control">
                        <option value="0">Select subcateory</option><?php
		while($row1=$db->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>" cid="<?=$row1['catid']?>"><?=$row1['subsubcatname']?></option>
                  <?php }?>
				   </select>

</div>
 <?php } ?>