<?php include("header.php") ?>

<div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Sales</a></li>
                            <li class="active">Order</li>
                        </ul>
                    </div>
                    
                    <!-- START PAGE CONTAINER -->
    <div class="page_container">
                    <div class="container">
                                                   
                       <div class="row"> 
                        <div class="col-md-12">                                          
                                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">
                                        <div class="alert-icon">
                                            <span class="icon-checkmark-circle"></span> 
                                        </div>
                                        <strong>Success!</strong> You successfully read this important alert message. 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                                    </div>                                           
                                </div>

                       <div  class="col-sm-12 verticle_tabs"> 
        <div class="col-xs-2">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <h3> Order View</h3>
            <ul class="nav nav-tabs tabs-left">
                <li class="active error"><a href="#Information" data-toggle="tab">Information 
                    <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                </a></li>
                <li><a href="#Inoices" data-toggle="tab">Inoices</a></li>
                <li><a href="#Shipments" data-toggle="tab">Shipments</a></li>
                      
            </ul>
        </div>
        <div class="col-xs-10">
        	<div class="block ">                            
                             
                            <p class="text-right">
                                <button class="btn btn-default btn-icon-fixed"><span class="icon-menu-circle"></span> Cancel</button>
                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Send Email</button>
                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Hold</button>
                                <button class="btn btn-warning btn-icon-fixed" data-toggle="modal" data-target="#modal-full"><span class="icon-arrow-up-circle"></span> Create Invoice</button>
                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Shipment</button>
                                <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Save</button> 
                               
                            </p>
                             
                        </div>

            <!-- Tab panes -->
            <div class="tab-content mt-0">
                <div class="tab-pane active" id="Information">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Order Information</h2>
                                            <p>Order Information of the Product</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">
                                            <div class="row">
                                                
                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                        Order # 145000015 
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="title w100">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                     <p>Order  Date</p>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h2>Nov 24, 2018 3:55:36 AM</h2>
                                                                </div>
                                                            </div>
                                                            

                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                     <p>Order Status</p>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h2>Pending</h2>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                     <p>Placed from IP</p>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h2>Nov 24, 2018 3:55:36 AM</h2>
                                                                </div>
                                                            </div>


                                                           
                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>

                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                       Account Information
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="title w100">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                     <p>Customer Name</p>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h2><a href="#">Rakesh Roshan</a></h2>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                     <p>Email</p>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h2><a href="#">RakeshRoshan@gmail.com</a></h2>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                        Billing Address
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="title w100">
                                                            <div class="row">
                                                                 
                                                                <div class="col-md-12">
                                                                    <h2>Rakesh ROshan</h2>
                                                                    <h2>L-14/ 931, Sangam Vihar </h2>
                                                                    <h2>delhi, 11062</h2>
                                                                    <h2>India</h2>
                                                                    <h2>T: 01120169513</h2>
                                                                </div>
                                                            </div>
                                                              
                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>

                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                        Shipping Address
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="title w100">
                                                            <div class="row">
                                                                 
                                                                <div class="col-md-12">
                                                                    <h2>Rakesh ROshan</h2>
                                                                    <h2>L-14/ 931, Sangam Vihar </h2>
                                                                    <h2>delhi, 11062</h2>
                                                                    <h2>India</h2>
                                                                    <h2>T: 01120169513</h2>
                                                                </div>
                                                            </div>
                                                              
                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                       Payment Information
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="title w100">
                                                            <div class="row">
                                                                 
                                                                <div class="col-md-12">
                                                                    <h2>Online Payment</h2>
                                                                    <h2>Order was placed using NGN</h2> 
                                                                </div>
                                                            </div>
                                                              
                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>

                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                       Shipping & Handling Information
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="title w100">
                                                            <div class="row">
                                                                 
                                                                <div class="col-md-12">
                                                                    <h2><b>Flat Rate - Fixed </b> ₦0.00 </h2> 
                                                                </div>
                                                            </div>
                                                              
                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>
                                            </div>

                                            <div class="row">


                                                <div class="col-md-12 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                        Items Ordered
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">



                                                        <table class="table table-striped table-bordered billprotable">
                                                            <thead class="">
                                                                <tr>
                                                                    <th width="300">Product</th>
                                                                    <th>Item Status</th>
                                                                    <th>Original Price</th>
                                                                    <th>Price</th>
                                                                    <th>Qty</th>
                                                                    <th>SubTotal</th>
                                                                    <th>Tax Amount</th>
                                                                    <th>Tax Percent</th>
                                                                    <th>Discount Amount</th>
                                                                    <th>Row Total</th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div id="order_item_621" class="item-container">
                                                                            <div class="item-text">
                                                                                <h5 class="title"><span id="order_item_621_title">Low Profile Special Cotton Mesh Cap-Black W40S62B</span></h5>
                                                                                <strong>SKU:</strong> svs5
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Ordered</td>
                                                                    <td>₦352.00</td>
                                                                    <td><b> ₦352.00</b> </td> 
                                                                    <td> Ordered    1 </td> 
                                                                    <td><b> ₦352.00</b>  </td> 
                                                                    <td> ₦0.00</td> 
                                                                    <td> 0%</td> 
                                                                    <td> ₦0.00 </td> 
                                                                    <td> ₦352.00</td> 

                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <div id="order_item_621" class="item-container">
                                                                            <div class="item-text">
                                                                                <h5 class="title"><span id="order_item_621_title">Low Profile Special Cotton Mesh Cap-Black W40S62B</span></h5>
                                                                                <strong>SKU:</strong> svs5
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Ordered</td>
                                                                    <td>₦352.00</td>
                                                                    <td><b> ₦352.00</b> </td> 
                                                                    <td> Ordered    1 </td> 
                                                                    <td><b> ₦352.00</b>  </td> 
                                                                    <td> ₦0.00</td> 
                                                                    <td> 0%</td> 
                                                                    <td> ₦0.00 </td> 
                                                                    <td> ₦352.00</td> 

                                                                </tr>

                                                                

                                                            </tbody>
                                                        </table>
 

 
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                       Comments History
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="form-group col-md-3">

                                                            <label >Status</label>
                                                            <select class="form-control">
                                                                <option>Pending</option>
                                                                <option>Reject</option>
                                                                <option>Accept</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-grou col-md-12">
                                                            <label class="">Comment</label>
                                                            <textarea class="form-control" rows="3" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group text-right">
                                                            <br>
                                                            <button class="btn btn-warning btn-icon-fixed"><span class="icon-arrow-up-circle"></span> Add Comment</button>
                                                        </div>


                                                        <div class="chatbox-order">
                                                            <ul>
                                                                <li>
                                                                    <strong>Apr 27, 2020</strong> 2:48:29 PM
                                                                    <span class="separator">|</span><strong>Pending</strong>
                                                                    <br>
                                                                    <small>This is test foo me 
                                                                    </small> 
                                                                </li>
                                                                <li>
                                                                    <strong>Apr 27, 2020</strong> 2:48:29 PM
                                                                    <span class="separator">|</span><strong>Pending</strong>
                                                                    <br>
                                                                    <small>This is test foo me 
                                                                    </small> 
                                                                </li>

                                                            </ul>

                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>

                                                <div class="col-md-6 ordedbox">
                                                    <!-- START PAGE HEADING -->
                                                    <div class="app-heading-container app-heading-bordered top">
                                                       Order Totals
                                                    </div>
                                                    <div class="app-heading app-heading-small app-heading-bordered orderDetailsbox">
                                                        <div class="title w100">
                                                            <div class="row">
                                                                 
                                                                <div class="col-md-12">
                                                                     <h2 class="text-right">
                                                                         Sub Total <span class="width100">₦0.00</span>
                                                                     </h2>
                                                                     <h2 class="text-right">
                                                                         Shipping & Handling <span class="width100">₦0.00</span>
                                                                     </h2>
                                                                     <h2 class="text-right">
                                                                        <b>
                                                                         Grand Total <span class="width100">₦0.00</span>
                                                                     </b>
                                                                     </h2>
                                                                     <h2 class="text-right">
                                                                        <b>
                                                                         Total Paid <span class="width100">₦0.00</span>
                                                                         </b>
                                                                     </h2>
                                                                     <h2 class="text-right">
                                                                        <b>
                                                                         Total Tax <span class="width100">₦0.00</span>
                                                                         </b>
                                                                     </h2>
                                                                     
                                                            </div>
                                                              
                                                        </div>
                                                    </div>
                                                    <!-- END PAGE HEADING -->
                                                </div>
                                            </div>


                                        </div>

                                                 


                                                <p></p>





                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>
                </div>
                <div class="tab-pane" id="Inoices">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Inoices</h2>
                                            <p>Inoices of this Order</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">
                                        
                                        <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
		                                    <thead>
		                                        <tr>
		                                            <th>Invoice #</th>
		                                            <th>Bill to Name</th>
		                                            <th>Invoice Date</th>
		                                            <th>Status</th>
		                                            <th>Amount</th>
		                                            <th>Action</th> 
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <tr>
		                                            <td>251242</td>
		                                            <td>Rakesh roshen</td>
		                                            <td>Nov 24, 2020 3:55:36AM</td>
		                                            <td>Paid</td> 
		                                            <td>20</td>  
		                                            <td><a href=""> View </a> </td>
		                                        </tr>

		                                    </tbody>
		                                </table>




                                        <p></p>




                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>
                </div>
                <div class="tab-pane" id="Shipments">
                    <div class="add_produ">
                         <!-- RECENT ACTIVITY -->
                                <div class="block block-condensed">
                                     <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Shippment</h2>
                                            <p>Shipment Details</p>
                                        </div>                                
                                    </div>
                                    <div class="block-content margin-bottom-0">
                                        
                                        <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
		                                    <thead>
		                                        <tr>
		                                            <th>Shipment #</th>
		                                            <th>Ship to Name</th>
		                                            <th>Date Date</th>
		                                            <th>Total Qty</th>
		                                            <th>Action</th> 
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <tr>
		                                            <td>251242</td>
		                                            <td>Rakesh roshen</td>
		                                            <td>Nov 24, 2020 3:55:36AM</td>
		                                            <td>2</td>    
		                                            <td><a href=""> View </a> </td>
		                                        </tr>

		                                    </tbody>
		                                </table>




                                        <p></p>




                                    </div>

                                </div>
                                <!-- END RECENT -->

                    </div>
                </div>
                 
 
            </div>

             

        </div>

       

        <div class="clearfix"></div>
    </div>                 
</div>


<!--------------------------------------------->

<!-- MODAL FULL WIDTH -->
            <div class="modal fade" id="modal-full" tabindex="-1" role="dialog" aria-labelledby="modal-large-header">                        
                <div class="modal-dialog modal-lg" role="document">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                    <div class="modal-content">
                        <div class="modal-header">                        
                            <h4 class="modal-title" id="modal-large-header">Large Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>Vestibulum eget risus id ante semper sodales vel sed nibh. Nullam tortor tellus, vestibulum a laoreet laoreet, lacinia in lorem. Fusce tempor lorem tellus, sed egestas velit ornare et.</p>
                            <p>Vivamus viverra sem non imperdiet porta. Suspendisse quis dolor varius, gravida felis nec, vulputate sem. Nunc at rhoncus dui. Aenean quis quam diam. Nam fringilla arcu ipsum, vel venenatis tellus aliquam eu. Nam vehicula quis diam vel placerat. Vivamus a congue erat. Ut venenatis libero massa, sed tincidunt nunc ultricies eget. Vestibulum in ultricies sem. Duis ac risus et leo egestas aliquet ac nec ante. Donec varius pharetra tristique.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </div>            
            </div>
            <!-- END MODAL FULL WIDTH -->

<!--------------------------------------------->




                        
                    </div> <!-- END PAGE CONTAINER -->
    </div> <!-- END page_container -->
                    
<?php include("footer.php") ?>

