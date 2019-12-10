<?php include('header.php');
include('chksession.php');

?>
<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Following</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="suggestions-list">
										<?php  
										$dbuf=new DB();
										$sql="SELECT * from followers where user_id=".$_SESSION['sess_webid'];
										$db->query($sql);
										if($db->numRows()>0)
										{
										while($frow=$db->fetchArray()){
										$usernamef=$dbuf->getSingleResult('select first_name from '.$_TBL_USER." where user_id=".$frow['user_id']);

										$woorking=$dbuf->getSingleResult('select current_company from user_profile where user_id='.$frow['user_id']);
										$userfpath=$dbuf->getSingleResult('select image_id from user_profile where user_id='.$frow['user_id']);										
											
										/* $sqluserf="SELECT * from user_profile where user_id=".$row['user_id'];
										$dbuf->query($sqluserf);
										if($dbuf->numRows()>0)
										{
										$userrowf=$dbuf->fetchArray();
										} */
											
											?>
											<div class="suggestion-usd">
											<a href="">
											<?php if(!empty($userfpath)){?>
												<img src="upload/<?=$userfpath?>" alt="" height="50" width="50">
											<?php }else{ ?>
											<img src="images/resources/s2.png" alt="">
											<?php }?></a>
												<div class="sgt-text">
													<a href=""><h4><?=$usernamef?></h4></a>
													<a href=""><span><?=$woorking?></span></a>
												</div>
												 
											</div>
											
										<?php }}?>
		</div>
		</div>
		<?php include('footer.php');

?>