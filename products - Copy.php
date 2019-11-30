
                      <div class="row">
                      <!--mid 5-->
<div class="col-md-12">
                        <?php include("config.inc.php");
						$sql="SELECT * from ".$_TBL_PROD."  order by p_id desc";
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){
						
						$path=$row['product_image'];
						$goid=base64_encode($row['p_id']);
	
						?>
    
    <a href="products-details.php?pid=<?php echo base64_encode($row['p_id']);?>">
    <div class="col-md-2">
        <div class="abox">
            <h3><?=$row['prod_name']?></h3>
                <div class="col-md-3 aimg">
                <img src="<?=$_SITE_PATH?>/<?=$path?>" alt="<?=$row['prod_name']?>" height="100" width="100"/>
                </div>
            
           
            <p class="aprice"><span>Rs.<?=number_format($row['price'],2);?></span> </p>
        </div>
    </div>
    </a>
	
						<form action="task.php" method="post" id="cart" name="cart">
						<input type="hidden" name="task"  value="task" />   
						<input type="hidden" name="id"  value="<?=$goid?>" /> 
                                <select name="tono">
                                   <!-- <option disabled="disabled"  >Select Quantity</option>-->
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
								<input type="submit" name="submit"  onclick="document.forms['cart'].submit(); return false;" value="buy now" />
                               <!-- <a href="task.php?task=task&id=<?=$goid?>">buy now</a>-->
                                <input type="submit" name="submit"  onclick="document.forms['cart'].submit(); return false;" value="add to cart" />
								</form>
                              
	 <?php }}?>
	
    
    </div>

<!--end mid 5-->
                      </div>
                      