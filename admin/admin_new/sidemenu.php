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
                                <a href="#"><span class="nav-icon-hexa text-orange-100">UM</span> User Management <span class="label label-success label-bordered label-ghost">+<?=$totaluser?></span></a>
                                <ul> 		

								
								 <li><a href="https://orangestate.ng/admin/admin_new/view_user.php"><span class="nav-icon-hexa">View</span> Users</a></li>
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/add_users.php?act=add"><span class="nav-icon-hexa">Add</span> Users</a></li>
								 
								 
									
								  
                                  </ul>
                            </li>     
						




						  <li>
							<?php 
								
								$totalproduct=$db->getSingleResult("select count(id) from product where newrelease='yes'");?>
                                <a href="#"><span class="nav-icon-hexa text-orange-100">PM</span> Product Management <span class="label label-success label-bordered label-ghost">+<?=$totalproduct?></span></a>
                                <ul> 		

								<li><a href="https://orangestate.ng/admin/admin_new/product_list.php?act=add"><span class="nav-icon-hexa">View</span> Product</a></li>
								 <li><a href="https://orangestate.ng/admin/admin_new/add_product.php?act=add"><span class="nav-icon-hexa">Add</span> Product</a></li>
								 
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/category_list.php"><span class="nav-icon-hexa">View</span> Category</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_category.php?act=add"><span class="nav-icon-hexa">Add</span> Category</a></li>
								 <li><a href="https://orangestate.ng/admin/admin_new/add_subcategory.php?act=add"><span class="nav-icon-hexa">Add</span> Sub Category</a></li>
								 
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/subcategory_list.php"><span class="nav-icon-hexa">View</span> Sub Category</a></li>
								
								
								<li><a href="https://orangestate.ng/admin/admin_new/add_subsubcategory.php?act=add"><span class="nav-icon-hexa">Add</span> Sub  Sub Category</a></li>
								 
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/subsubcategory_list.php"><span class="nav-icon-hexa">View</span> Sub Sub Category</a></li>
								 
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/add_4thsubcat.php?act=add"><span class="nav-icon-hexa">Add</span> 4th Category</a></li>
								 
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/4thsubcat.php"><span class="nav-icon-hexa">View</span> 4th  Category</a></li>
								 
                                  <li><a href="https://orangestate.ng/admin/admin_new/viewcolor.php?act=add"><span class="nav-icon-hexa">Add</span> Color</a></li>  


								  
                                  </ul>
                            </li>     
								
							


  <li>
							<?php 
								
								//$totalproduct=$db->getSingleResult("select count(id) from product where newrelease='yes'");?>
                                <a href="#"><span class="nav-icon-hexa text-orange-100">FD</span> Food Ordering <span class="label label-success label-bordered label-ghost">+<?=$totalproduct?></span></a>
                                <ul> 		

								<li><a href="https://orangestate.ng/admin/admin_new/restaurants_list.php?act=add"><span class="nav-icon-hexa">View</span> Restaurants</a>
								<ul><li><a href="https://orangestate.ng/admin/admin_new/restaurants_list.php?act=add"><span class="nav-icon-hexa">View</span> Restaurants</a></li>
								<li><a href="https://orangestate.ng/admin/admin_new/add_restaurants.php?act=add"><span class="nav-icon-hexa">Add</span> Restaurants</a></li>

								
								
								<li><a href="https://orangestate.ng/admin/admin_new/client.php?act=add"><span class="nav-icon-hexa">View</span> client</a></li>
								
								
								<li><a href="https://orangestate.ng/admin/admin_new/add_all_user.php?act=add"><span class="nav-icon-hexa">Add</span> client</a></li>
								
								
																
								
								
								
								  
								</ul>
								
								</li>
								 
								  <li>
								 <a href=""><span class="nav-icon-hexa">View</span> Menu</a>
								 <ul>
								 <li><a href="https://orangestate.ng/admin/admin_new/recipe_list.php"><span class="nav-icon-hexa">View</span> Product</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_recipe.php?act=add"><span class="nav-icon-hexa">Add</span> Product</a></li>
								  
								   <li><a href="https://orangestate.ng/admin/admin_new/recipe_category_list.php"><span class="nav-icon-hexa">View</span> Category</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_recipe_cat.php?act=add"><span class="nav-icon-hexa">Add</span> Category</a></li>
								  
								   <li><a href="https://orangestate.ng/admin/admin_new/extra_list.php?act=add"><span class="nav-icon-hexa">View</span> Extra</a></li>
								 
								 
								  </ul>
								</li>
								 
								 
								<li>
								 <a href=""><span class="nav-icon-hexa">Delivery</span> Charges</a>
								 <ul>
								 <li><a href="https://orangestate.ng/admin/admin_new/deliverycharge.php?act=add"><span class="nav-icon-hexa">Delivery</span> Charges</a></li>
								
								
								  </ul>
								</li>
								
								
								
							
								  
                                  </ul>
                            </li>     
							
							<?php 
								
								 $newordercount=$db->getSingleResult("select count(id) from user_order where order_status='0'");?>
                            <li><a href=""><span class="nav-icon-hexa text-yellow-100">OM</span> Order Management <span class="label label-success label-bordered label-ghost">+<?=$newordercount?></span></a>
							<ul>
                             
								
							<li>
							 <a href="https://orangestate.ng/admin/admin_new/order_list.php"><span class="nav-icon-hexa text-lime-200">View</span> Product Order</a>
								</li>
								
								 <li><a href="https://orangestate.ng/admin/admin_new/hotel_order_list.php?act=add"><span class="nav-icon-hexa">View</span> Hotel Order </a></li>
								 
								 <li>
								 <a href="https://orangestate.ng/admin/admin_new/food_order.php"><span class="nav-icon-hexa">View</span> Food Order</a>
								 
								 </li>
							</ul>
							</li>
                            
                         <li>
							<?php 
								
								$totalhotel=$db->getSingleResult("select count(id) from hotel");?>
                                <a href="#"><span class="nav-icon-hexa text-orange-100">HM</span> Hotel Management <span class="label label-success label-bordered label-ghost">+<?=$totalhotel?></span></a>
                                <ul> 		

								
								 <li><a href="https://orangestate.ng/admin/admin_new/hotel_list.php"><span class="nav-icon-hexa">View</span> Hotel</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add-hotel.php?act=add"><span class="nav-icon-hexa">Add</span> Hotel</a></li>
								  
								  
								  
								   <li><a href="https://orangestate.ng/admin/admin_new/hotel_list_type.php"><span class="nav-icon-hexa">View</span> Room Type</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_types.php?act=add"><span class="nav-icon-hexa">Add</span> Room Type</a></li>
								  
								  
								  
								  
								  
								   <li><a href="https://orangestate.ng/admin/admin_new/rooms_list.php"><span class="nav-icon-hexa">View</span> Hotel Rooms</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_rooms.php?act=add"><span class="nav-icon-hexa">Add</span> Hotel Rooms</a></li>
								  
								 
								 

								  
                                  </ul>
                            </li>     
						

 <li>
							<?php 
								
								$totalhub=$db->getSingleResult("select count(id) from business_hub");?>
                                <a href="#"><span class="nav-icon-hexa text-orange-100">BH</span> Business Management <span class="label label-success label-bordered label-ghost">+<?=$totalhub?></span></a>
                                <ul> 		

								
								 <li><a href="https://orangestate.ng/admin/admin_new/business_list.php"><span class="nav-icon-hexa">View</span> Business</a></li>
								  <li><a href="https://orangestate.ng/admin/admin_new/add_businesshub.php?act=add"><span class="nav-icon-hexa">Add</span> Business</a></li>
								 
									<li><a href="https://orangestate.ng/admin/admin_new/add_services.php?act=add"><span class="nav-icon-hexa">Add</span> Business Service</a></li> 
								  
                                  </ul>
                            </li>     
												
              

							<li>
							<?php 
								
								/* $totalhub=$db->getSingleResult("select count(id) from support_system where status='Open'"); */?>
                                <a href="#"><span class="nav-icon-hexa text-orange-100">WEB</span> Web Management <span class="label label-success label-bordered label-ghost"></span></a>
                                <ul> 		

								
								 <li><a href="https://orangestate.ng/admin/admin_new/view_ticket.php"><span class="nav-icon-hexa">View</span> Ticket</a></li>
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/open_ticket.php?act=add"><span class="nav-icon-hexa">Open</span> Ticket</a></li>
								 
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/view_adds.php"><span class="nav-icon-hexa">View</span> Ads</a></li>
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/add_edit_adds.php?act=add"><span class="nav-icon-hexa">Add Ads</a></li>
								 
								 <li><a href="https://orangestate.ng/admin/admin_new/deliverycharge.php?act=add"><span class="nav-icon-hexa">Delivery</span> Charges</a></li>
									
								  
                                  </ul>
                            </li>     
						
                        </ul>
                    </nav>
                </div>