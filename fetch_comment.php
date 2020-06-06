<?php

// configuration
include 'config.inc.php';
/* $post_id=$db->getSingleResult("SELECT post_id from comment where c_id=".$_POST['comid']); */
$post_id = $_POST['pid'];
$comallcount=$db->getSingleResult("SELECT count(c_id) from comment where post_id=".$post_id);	
 $row = $_POST['row'];
/* $post_id = $_POST['postid']; */
$rowperpage = $row+5;
 $dbc=new DB();
	 $dbr=new DB();
	 $sqlc="SELECT * from comment where post_id=".$post_id." limit ".$row.",".$rowperpage;
		$dbc->query($sqlc);
		if($dbc->numRows()>0)
		{
		while($rowc=$dbc->fetchArray()){
		
		$username=$dbc->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowc['user_id']);

		$pimage=$dbc->getSingleResult('select image_id from user_profile where user_id='.$rowc['user_id']);	
?>


 <div class="comment" >
				                    <div class="contact contact-rounded contact-lg">
				                    	<div class="comnetimg">
				                    		<?php if(!empty($pimage)){ ?>
				                    			<a href="view-profile.php?uid=<?php echo base64_encode($rowc['user_id']);?>">
				                    				<img src="upload/<?=$pimage?>" alt="" >
				                    				</a>
				                    			<?php }else{ ?>
												<a href="view-profile.php?uid=<?php echo base64_encode($rowc['user_id']);?>"><img src="images/resources/user.png" alt=""></a>
												<?php }?>


					                    </div>
				                        <div class="contact-container">
				                            <a href="view-profile.php?uid=<?php echo base64_encode($rowc['user_id']);?>"><?=$username?></a>
				                            <span class="coment-time"><?php echo timeago($rowc['cdate']);?> </span> 
				                            <div class="replybody-mg">
					                            <?php if(!empty($rowc['mp3'])){ ?>
														<img src="emoji/<?=$rowc['cimage']?>" height="50" width="50"/><?php }elseif(!empty($rowc['cimage'])){ ?>
														<img src="upload/<?=$rowc['cimage']?>" height="50" width="50"/>
														<?php }?>
					                            <span><?=$rowc['comment']?></span>
					                        </div>
				                            <div class="replycommnetbt">
								           		<a  href="javascript:void(0)" id="replyiddiv" cid="<?=$rowc['c_id']?>" >Reply</a>
								           	</div>
				                        </div>
				                    </div>


				                    <?php ///////Show Reply////////


											 $sqlr="SELECT * from reply where c_id=".$rowc['c_id'];
											$dbr->query($sqlr);
											if($dbr->numRows()>0)
											{
											while($rowr=$dbr->fetchArray()){
											$date=explode('-',$rowr['rdate']);


											$st=mktime(0,0,0,$date[1],$date[2],$date[0]);	
											$username1=$db1->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$rowr['user_id']);
											$rpimage=$db1->getSingleResult('select image_id from user_profile where user_id='.$rowr['user_id']);		
												?>

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
						                            <?php if(!empty($rowr['rimage'])){ ?>
																	<img src="upload/<?=$rowr['rimage']?>" height="50" width="50"/><?php }?>
																	<span class="commword"><?=$rowr['r_comment']?> 

						                        </div>
						                    </div>
						                </div>

						           <?php }} ///////////////?>


						           <div id="replydisplay<?=$rowc['c_id']?>" style="display:none;">
													<div class="post-comment">
													<div class="cm_img">
														<?php if(!empty($mainuserimage)){ ?>
														<img src="upload/<?=$mainuserimage?>"/>
														<?php }else{?>
														<img src="images/resources/user.png" alt="" height="40" width="40">
														<?php } ?>
													</div>
													<div class="comment_box">
													<form id="replyForm" method="post">
													<input type="hidden" name="pid" id="pid<?=$rowc['c_id']?>" value="<?=$rowc['post_id']?>">
													<input type="hidden" name="uid" id="uid<?=$rowc['c_id']?>" value="<?=$rowc['user_id']?>" >
													<input type="hidden" name="cid" id="cid<?=$rowc['c_id']?>" value="<?=$rowc['c_id']?>" >
													<input type="hidden" name="rimage" id="rimage<?=$rowc['c_id']?>" value="" >
													<label class="cemeraicon" for="rimageupload"><i class="fa fa-camera" aria-hidden="true"></i></label>
													<input type="file" id="rimageupload" name="rimageupload" >
													<p class="lead emoji-picker-container">
													<input type="text"  rid="<?=$rowc['c_id']?>"  placeholder="Reply on comment" name="rpostcomment" class="rp" id="rpostcomment<?=$rowc['c_id']?>" data-emojiable="true">
													</p>
													<button type="button" name="replyid" id="replyid<?=$rowc['c_id']?>" class="replyid" rid="<?=$rowc['c_id']?>">Send</button>
														</form>
													</div>
												</div>
									</div>

				                  



				                </div>
				    

		<?php }} //else{ echo "No more comment found"; } ?>