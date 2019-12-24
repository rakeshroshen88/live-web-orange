<?php 
include('../../config.inc.php');
$cid=$_REQUEST['cid'];
$subcatid=$_REQUEST['subcatid'];
$tid=$_REQUEST['4thcatid'];
 $sql="SELECT * FROM 4thsubcategory WHERE catid=$cid and subcatid=$subcatid and 3rdcatid=$tid";
$db->query($sql)or die($db->error()); ?>
  <label class="col-md-3 control-label" for="name">  4Th Category</label>
 <div class="col-md-9">
		 <select  name="4thcatgory" id="4thcatgory" class="form-control">
                        <option>Select subcateory</option><?php
		while($row1=$db->fetchArray()){
		  
		?>
		
                        <option value="<?=$row1['id']?>" ><?=$row1['3rdsubcatname']?></option>
                  <?php }?>
				   </select> </div>

