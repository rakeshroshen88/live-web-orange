 <?php $id=$_REQUEST['id'];
 $act=$_REQUEST['act'];
 $stat=$_REQUEST['stat'];
 $rec=$_REQUEST['rec'];  
 if($act=='del'){ $sql="DELETE FROM food_order WHERE id='$id'";
 $db->query($sql);
 } ?>
 <script>
 function deladmin(id){
	 if(confirm("Are you sure to delete?"))	{
		 location.href="<?=$_PAGE.'?'.$qryStr?>&mod=order&act=del&id="+id;
		 }
		} </script>
                    <!-- START PAGE CONTAINER -->
    <div class="page_container">
                    <div class="container">
                                                
                        <div class="row">
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Total Orders</div>
                                                <div class="title pull-right"><span class="label label-success label-ghost label-bordered">+14.2%</span></div>
                                            </div>  <?php											if($_SESSION['Super_admin']=='superadmin'){											$totalorder1=$db->getSingleResult("SELECT count(id) from food_order");											$totalorder2=$db->getSingleResult("SELECT count(id) from user_order");											$totalorder=$totalorder1+$totalorder2;											}else{												$totalorder1=$db->getSingleResult("SELECT count(id) from food_order");																								$totalorder2=$db->getSingleResult("SELECT count(id) from user_order");												$totalorder=$totalorder1+$totalorder2;											}											if(empty($totalorder)){ $totalorder=0;}											?>                                      
                                            <div class="intval"><?=$totalorder?></div>                                        
                                            <!--<div class="line">
                                                <div class="subtitle">Total items sold</div>
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span> good</div>
                                            </div>-->
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Total pending order</div>
                                                <div class="title pull-right text-success">+32.9%</div>
                                            </div>                                        <?php if($_SESSION['Super_admin']=='superadmin'){											$nooforder1=$db->getSingleResult("SELECT count(id) from food_order where order_status='0'");											$nooforder2=$db->getSingleResult("SELECT count(id) from user_order where order_status='0'");											$nooforder=$nooforder1+$nooforder2;											}else{												$nooforder1=$db->getSingleResult("SELECT count(id) from food_order where order_status='0'");																								$nooforder2=$db->getSingleResult("SELECT count(id) from user_order where order_status='0'");																								$nooforder=$nooforder1+$nooforder2;											} ?>
                                            <div class="intval"><?=$nooforder?></div>
                                            <!--<div class="line">
                                                <div class="subtitle">Total items sold</div>
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span> good</div>
                                            </div>-->
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Total Confirm Order</div>
                                                <div class="title pull-right text-success">+9.2%</div>
                                            </div>  <?php																						if($_SESSION['Super_admin']=='superadmin'){											$totalcorder1=$db->getSingleResult("SELECT count(id) from food_order where order_status='2'");											$totalcorder2=$db->getSingleResult("SELECT count(id) from user_order where order_status='2'");											$totalcorder=$totalcorder1+$totalcorder2;											}else{												$totalcorder1=$db->getSingleResult("SELECT count(id) from food_order where order_status='2' and  resturant_id=".$_SESSION['rid']);																								$totalcorder2=$db->getSingleResult("SELECT count(id) from user_order where order_status='2'");																								$totalcorder=$totalcorder1+$totalcorder2;											}																																												if(empty($totalcorder)){ $totalcorder=0;}											?>                                            
                                            <div class="intval"><?=$totalcorder?><small></small></div>
                                           <!-- <div class="line">
                                                <div class="subtitle">Frofit for the year</div>                                                
                                            </div>-->
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile">
                                            <div class="line">
                                                <div class="title">Cancel Order</div><?php 										if($_SESSION['Super_admin']=='superadmin'){											$totalcanorder1=$db->getSingleResult("SELECT count(id) from food_order where order_status='1'");											$totalcanorder2=$db->getSingleResult("SELECT count(id) from user_order where order_status='1'");											$totalcanorder=$totalcanorder1+$totalcanorder2;										}else{												$totalcanorder1=$db->getSingleResult("SELECT count(id) from food_order where order_status='1' and  resturant_id=".$_SESSION['rid']);																								$totalcanorder2=$db->getSingleResult("SELECT count(id) from user_order where order_status='1'");												$totalcanorder=$totalcanorder1+$totalcanorder2;											}	if(empty($totalcanorder)){ $totalcanorder=0;}											?>
                                                <div class="title pull-right text-success">-12.7%</div>
                                            </div>                                        
                                            <div class="intval"><?=$totalcanorder?><small></small></div>
                                            <div class="line">
                                                <div class="subtitle">Statistic per year</div>                                                
                                            </div>
                                        </div>                                                                        
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">Visitors</div>
                                                <div class="title pull-right"><span class="label label-warning label-ghost label-bordered">3.5%</span></div>
                                            </div>        <?php											$totaluser=$db->getSingleResult("SELECT count(*) from all_user ");	if(empty($totaluser)){ $totaluser=0;}											?>                                
                                            <div class="intval"><?=$totaluser?></div>
                                            <div class="line">
                                                <div class="subtitle">Visitors per month</div>
                                                <div class="subtitle pull-right text-warning"><span class="icon-arrow-down"></span> normal</div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">Returned</div>
                                                <div class="title pull-right text-success">67.1%</div>
                                            </div>                                        
                                            <div class="intval">61,488</div>
                                            <div class="line">
                                                <div class="subtitle">Returned visitors per month</div>
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span></div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">New</div>
                                                <div class="title pull-right text-success">33.9%</div>
                                            </div>                                        
                                            <div class="intval">38,085</div>
                                            <div class="line">
                                                <div class="subtitle">New visitors per month</div>                                                
                                                <div class="subtitle pull-right text-success"><span class="icon-arrow-up"></span></div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="line">
                                                <div class="title">Registred</div>
                                                <div class="title pull-right">+458</div>
                                            </div>                                        
                                            <div class="intval">12,554</div>
                                            <div class="line">
                                                <div class="subtitle">Total registred users</div>                                                
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                                                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-bubble"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Messages</div>         
                                                        <div class="title pull-right"><span class="label label-success label-ghost label-bordered">3 NEW</span></div>
                                                    </div>                                        
                                                    <div class="intval text-left">39 / 1,589</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open all messages</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-warning"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Server Notifications</div>                                                        
                                                    </div>                                        
                                                    <div class="intval text-left">14 / 631</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open all notifications</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-envelope"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Inbox Mail</div>                                                        
                                                    </div>                                        
                                                    <div class="intval text-left">2 / 481</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open inbox messages</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-users"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Customers</div>             
                                                        <div class="title pull-right"><span class="label label-danger label-bordered">15 NEW</span></div>
                                                    </div>                                        
                                                    <div class="intval text-left">6,233</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle"><a href="#">Open contact list</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="col-md-3">
                                
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-cloud-check"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Total Server Load</div>
                                                        <div class="subtitle pull-right text-success"><span class="fa fa-check"></span> UP</div>
                                                    </div>                                        
                                                    <div class="intval text-left">85.2%</div>                                        
                                                    <div class="line">
                                                        <div class="subtitle">Latest back up: <a href="#">12/07/2016</a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-database"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Database Load</div>
                                                        <div class="subtitle pull-right text-success"><span class="fa fa-check"></span> UP</div>
                                                    </div>                                        
                                                    <div class="intval text-left">43.16%</div>
                                                    <div class="line">
                                                        <div class="subtitle">4/10 databases used</div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-inbox text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Disk Space</div>
                                                        <div class="subtitle pull-right text-danger"><span class="fa fa-times"></span> Critical</div>
                                                    </div>                                        
                                                    <div class="intval text-left">99.98%</div>
                                                    <div class="line">
                                                        <div class="subtitle">234.2GB / 240GB used</div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                    <li>                                        
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="icon-heart-pulse"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                                                    
                                                    <div class="line">
                                                        <div class="title">Proccessor</div>
                                                        <div class="subtitle pull-right text-success"><span class="fa fa-check"></span> Normal</div>
                                                    </div>                                        
                                                    <div class="intval text-left">32.5%</div>
                                                    <div class="line">
                                                        <div class="subtitle">Intule Cori P7, 3.6Ghz</div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!-- END WIDGET -->                                        
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-6">
                                
                                <!-- START PRODUCT SALES HISTORY -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Product Sales History</h2>
                                            <p>In comparison with "Purchase Button"</p>
                                        </div>              
                                        <div class="heading-elements">                                            
                                            <button type="button" class="btn btn-default btn-icon-fixed dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-calendar-full"></span> June 13, 2016 - July 14, 2016
                                            </button>
                                            <ul class="dropdown-menu dropdown-form dropdown-left">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            
                                                            <div class="form-group margin-bottom-10">
                                                                <label>From:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><span class="icon-calendar-full"></span></div>
                                                                    <input type="text" class="form-control bs-datepicker" value="13/06/2016">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                            <div class="form-group">                                                        
                                                                <label>To:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><span class="icon-calendar-full"></span></div>
                                                                    <input type="text" class="form-control bs-datepicker" value="13/07/2016">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-default btn-block">Confirm</button>
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="block-content">
                                        <div class="app-chart-wrapper app-chart-with-axis">
                                            <div id="yaxis" class="app-chart-yaxis"></div>
                                            <div class="app-chart-holder" id="dashboard-chart-line" style="height: 325px;"></div>
                                            <div id="xaxis" class="app-chart-xaxis"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PRODUCT SALES HISTORY -->
                                
                            </div>
                            <div class="col-md-6">
                                
                                <!-- START LATEST TRANSACTIONS -->
                                <div class="block block-condensed">
                                    <div class="app-heading">                                        
                                        <div class="title">
                                            <h2>Latest Transactions</h2>
                                            <p>Quick information</p>
                                        </div>              
                                        <div class="heading-elements">
                                            <button class="btn btn-default btn-icon-fixed"><span class="icon-file-add"></span> All Transactions</button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="table-responsive">
                                            <table class="table table-clean-paddings margin-bottom-0">
                                                <thead>
                                                    <tr>
                                                        <th>Customer</th>
                                                        <th width="150">Order</th>                                                    
                                                        <th width="150">Status</th>
                                                        <th width="55"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>								<?php									$db1=new DB(); $ct=1;if($_SESSION['Super_admin']=='superadmin'){																	$sql="SELECT * from food_order group by userid";}else{		$sql="SELECT * from food_order where resturant_id=".$_SESSION['rid'];}																		$db->query($sql);									if($db->numRows()>0){										while($row=$db->fetchArray()){ 										$name=$db1->getSingleResult('select first_name from all_user where user_id='.$row['userid']);										$image_id=$db1->getSingleResult('select image_id from user_profile where user_id='.$row['userid']);																														$arr1=@explode(' ',$row['buydate']);										$edate=@explode('-',$arr1[0]);										$stamp1=@mktime(0,0,0,$edate[2],$edate[1],$edate[0]);												if($row['order_status']=="0"){													$sta="<b style='color:red;'>Pending</b>";	}elseif($row['order_status']=="1"){													/* $sta="Canceled"; */$sta='<td><span class="label label-danger label-bordered">Canceled</span></td>';													}elseif($row['order_status']=="2"){																										$sta='<td><span class="label label-success label-bordered">Confirmed</span></td>';													 }elseif($row['order_status']=="3"){																										$sta='<td><span class="label label-warning label-bordered">Processed</span></td>';													 }elseif($row['order_status']=="4"){														 $sta='<td><span class="label label-warning label-bordered">Waiting payment</span></td>';													$sta="Hold";													 }elseif($row['order_status']=="5"){													$sta='<td><span class="label label-primary label-bordered">Delivered</span></td>';													} ?>													
                                                    <tr>
                                                        <td>
                                                            <div class="contact contact-rounded contact-bordered contact-lg">
                                                              <?php if(empty($image_id)){?>					<img src="https://orangestate.ng/images/resources/user.png" height="40" alt=""  /> 					<?php }else{?>					<img src="https://orangestate.ng/upload/<?=$image_id?>" alt="" height="40" /> 					<?php }?> 
                                                                <div class="contact-container">
                                                                    <a href="#"><?=$name?></a>
                                                                    <span><?=date('dS'.' '.'M',$stamp1)?><?=date('Y',$stamp1)?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?=$row['orderid']?></td>
                                                       <?php echo $sta;?>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-default btn-icon btn-clean dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-cog"></span></button>
                                                                <ul class="dropdown-menu dropdown-left">
                                                                    <li><a href="//orangestate.ng/admin/admin_new/food_order_details.php?id=<?=$row['orderid']?>"><span class="icon-question-circle text-info"></span> More information</a></li> 
                                                                   
                                                                    <li class="divider"></li>
                                                                    <li>																	<?php if($_SESSION['Super_admin']=='superadmin'){ ?>									<a href='javascript:deladmin("<?=$row['id']?>")'> <span class="icon-cross-circle text-danger"></span>	 Delete transactions					</a>									<?php } ?>																	</li> 
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr><?php  }} ?>
                                                 <!--   <tr>
                                                        <td>
                                                            <div class="contact contact-rounded contact-bordered contact-lg">
                                                                <img src="assets/images/users/user_3.jpg">
                                                                <div class="contact-container">
                                                                    <a href="#">Juan Obrien</a>
                                                                    <span>on July 12, 2016</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>SPW-955-20</td>
                                                        <td><span class="label label-warning label-bordered">Waiting payment</span></td>                                                    
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-default btn-icon btn-clean dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-cog"></span></button>
                                                                <ul class="dropdown-menu dropdown-left">
                                                                    <li><a href="#"><span class="icon-question-circle text-info"></span> More information</a></li> 
                                                                    <li><a href="#"><span class="icon-arrow-up-circle text-warning"></span> Promote to top</a></li> 
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><span class="icon-cross-circle text-danger"></span> Delete transactions</a></li> 
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>                                                
                                                    <tr>
                                                        <td>
                                                            <div class="contact contact-rounded contact-bordered contact-lg">
                                                                <img src="assets/images/users/user_4.jpg">
                                                                <div class="contact-container">
                                                                    <a href="#">Erin Stewart</a>
                                                                    <span>on July 12, 2016</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>SPW-955-18</td>
                                                        <td><span class="label label-success label-bordered">Confirmed</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-default btn-icon btn-clean dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-cog"></span></button>
                                                                <ul class="dropdown-menu dropdown-left">
                                                                    <li><a href="#"><span class="icon-question-circle text-info"></span> More information</a></li> 
                                                                    <li><a href="#"><span class="icon-arrow-up-circle text-warning"></span> Promote to top</a></li> 
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><span class="icon-cross-circle text-danger"></span> Delete transactions</a></li> 
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>                                                
                                                    <tr>
                                                        <td>
                                                            <div class="contact contact-rounded contact-bordered contact-lg">
                                                                <img src="assets/images/users/user_5.jpg">
                                                                <div class="contact-container">
                                                                    <a href="#">Jeff Kuhn</a>
                                                                    <span>on July 11, 2016</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>SPW-955-17</td>
                                                        <td><span class="label label-danger label-bordered">Payment expired</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-default btn-icon btn-clean dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-cog"></span></button>
                                                                <ul class="dropdown-menu dropdown-left">
                                                                    <li><a href="#"><span class="icon-question-circle text-info"></span> More information</a></li> 
                                                                    <li><a href="#"><span class="icon-arrow-up-circle text-warning"></span> Promote to top</a></li> 
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><span class="icon-cross-circle text-danger"></span> Delete transactions</a></li> 
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>                                                
                                                    <tr>
                                                        <td>
                                                            <div class="contact contact-rounded contact-bordered contact-lg">
                                                                <img src="assets/images/users/user_6.jpg">
                                                                <div class="contact-container">
                                                                    <a href="#">Jared Stevens</a>
                                                                    <span>on July 11, 2016</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>SPW-955-14</td>
                                                        <td><span class="label label-primary label-bordered">Delivered</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-default btn-icon btn-clean dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-cog"></span></button>
                                                                <ul class="dropdown-menu dropdown-left">
                                                                    <li><a href="#"><span class="icon-question-circle text-info"></span> More information</a></li> 
                                                                    <li><a href="#"><span class="icon-arrow-up-circle text-warning"></span> Promote to top</a></li> 
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><span class="icon-cross-circle text-danger"></span> Delete transactions</a></li> 
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>                                                -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LATEST TRANSACTIONS -->
                                
                            </div>
                        </div>
                        
                    </div> <!-- END PAGE CONTAINER -->
    </div> <!-- END page_container -->