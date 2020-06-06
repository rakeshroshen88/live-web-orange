<?php 
include_once("config.inc.php");
include('chksession.php');
$cid=$_POST['cid'];
$row = $_POST['row'];
$rowperpage = $row+5;
$db1=new DB();
$dbr=new DB();
$sqlr="SELECT * from reply where c_id=".$cid." limit ".$row.",".$rowperpage;
$dbr->query($sqlr);
if($dbr->numRows()>0)
{
while($rowr=$dbr->fetchArray()){
$date=explode('-',$rowr['rdate']);
$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
$username1=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowr['user_id']);
$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowr['user_id']);?>
		
 <div class="comment">
						                    <div class="contact contact-rounded contact-lg">
						                    	<div class="comnetimg">
						                    		<?php if(!empty($rpimage)){ ?>
																	<a href="view-profile.php?uid=<?php echo base64_encode($rowr['user_id']);?>"><img src="upload/<?=$rpimage?>" alt=""></a> 
																	<?php }else{?>
																	<a href="view-profile.php?uid=<?php echo base64_encode($rowr['user_id']);?>"><img src="images/resources/user.png" alt=""  ></a>
																	<?php }?>


						                    	</div>
						                        <div class="contact-container">
						                            <a href="#"> <?=$username1?></a>
						                            <span class="coment-time"><?php echo timeago($rowr['rdate']);?> </span> 
						                            <?php if(!empty($rowr['rimage'])){ ?><br/>
																	<img src="upload/<?=$rowr['rimage']?>" height="50" width="50"/><?php }?>
																	<span class="commword"><?=$rowr['r_comment']?> 

						                        </div>
						                    </div>
						                </div>

						         
	
	
																
 <?php } 			
}
?>