<div class="app-sidebar app-navigation app-navigation-fixed scroll app-navigation-style-default app-navigation-open-hover dir-left mCustomScrollbar _mCS_1 mCS-autoHide app-navigation-fixed-absolute app-navigation-minimized mCS_disabled" data-type="close-other">
                    <a href="index.html" class="app-navigation-logo">
                        Orange Admin Panel
                        <button class="app-navigation-logo-button mobile-hidden" data-sidepanel-toggle=".app-sidepanel"><span class="icon-alarm"></span> <span class="app-navigation-logo-button-alert">7</span></button>
                    </a>
                    <nav>
                        <ul>
                            <li class="title">MAIN</li>
                            <li><a href="index.php"><span class="nav-icon-hexa text-bloody-100">Ds</span> Dashboard</a></li>
						 <li>
							<?php 
								
								$totaluser=$db->getSingleResult("select count(user_id) from all_user");?>
                                <a href="#"><span class="nav-icon-hexa text-orange-100">UM</span> Client Management <span class="label label-success label-bordered label-ghost">+<?=$totaluser?></span></a>
                                <ul> 		

								
								
								
								 <li><a href="https://orangestate.ng/admin/admin_new/view_user.php"><span class="nav-icon-hexa">View</span> Client</a></li>
								 
								 
								 
									
								  
                                  </ul>
                            </li>     
						

	<li>
	 <a href="#"><span class="nav-icon-hexa text-orange-100">OM</span> Order Management <span class="label label-success label-bordered label-ghost">+<?=$totaluser?></span></a> <ul>
						<li>
								 <a href="https://orangestate.ng/admin/admin_new/restautant_order.php"><span class="nav-icon-hexa">View</span> Food Order</a>
								 
								 </li>	

 </ul>
                            </li>     
						
								<li>
							<?php 
								
								//$totalproduct=$db->getSingleResult("select count(id) from product where newrelease='yes'");?>
                                <a href="#"><span class="nav-icon-hexa text-orange-100">FD</span> Food Ordering <span class="label label-success label-bordered label-ghost">+<?=$totalproduct?></span></a>
                                <ul> 		

								<li><a href="https://orangestate.ng/admin/admin_new/recipe_list.php?act=add"><span class="nav-icon-hexa">View</span> Product</a>
								<ul><li><a href="https://orangestate.ng/admin/admin_new/recipe_list.php"><span class="nav-icon-hexa">View</span> Product</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_recipe.php?act=add"><span class="nav-icon-hexa">Add</span> Product</a></li>
								  
								   <li><a href="https://orangestate.ng/admin/admin_new/recipe_category_list.php"><span class="nav-icon-hexa">View</span> Category</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_recipe_cat.php?act=add"><span class="nav-icon-hexa">Add</span> Category</a></li>
								  
								   <li><a href="https://orangestate.ng/admin/admin_new/extra_list.php?act=add"><span class="nav-icon-hexa">View</span> Extra</a></li>
								 
								
								
								
																
								
								
								
								  
								</ul>
								
								</li>
								 
								
								
							
								  
                                  </ul>
                            </li>     
												
               </nav>
                </div>