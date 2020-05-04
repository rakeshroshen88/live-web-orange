<?php include("header.php") ?>

    <div class="app-heading-container app-heading-bordered bottom">
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">Manage Orders</li>
        </ul>
    </div>

    <!-- START PAGE CONTAINER -->
    <div class="page_container">
        <div class="container">

            <div class="row">
                  <div class="col-md-12">
                      <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>Manage Orders</h5>
                                    <p>List of all Orders</p>
                                </div>

                                <div class="heading-elements">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-icon-fixed dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bars"></span> Export</button>
                                        <ul class="dropdown-menu dropdown-left">
                                             
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"> XLS</a></li>
                                             
                                        </ul>
                                    </div> 
                                </div>


                            </div>
                            <!-- END HEADING -->

                            <div class="block-content">

                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Purchased on</th>
                                            <th>Bill to Name</th>
                                            <th>Total Price</th>
                                            <th># of Item</th>
                                            <th>Total QTY</th> 
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>251242</td>
                                            <td>Nov 24, 2020 3:55:36AM</td>
                                            <td>Rakesh Roshan</td>
                                            <td>₦ 2501.25</td>
                                            <td>5</td>
                                            <td>20</td> 
                                            <td>Pending</td>
                                            <td><a href=""> View </a> </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>

                            </div>
                  


                  </div>  
 
            </div>

        </div> 
        <!-- END PAGE CONTAINER -->
    </div>
    <!-- END page_container -->

    <?php include("footer.php") ?>