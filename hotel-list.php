<?php include('header.php');
include('chksession.php');
?>

 <section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Room listing</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Room List</li>
                </ul>
            </nav>
        </div>
    </div>
</section>



<section class="room-list">
    <div class="container container1170">
        <div class="row">
            <div class="col-md-3 sidebar pull-left">
                <div class="list-sidebar">
                    <div class="room-type list-sidebar-item">
                        <h4>Room Types</h4>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Single Rooms</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Double Rooms</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Studio Rooms</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Kingsize Rooms</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Presidentsuite Rooms</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Murphy Rooms</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Connecting Rooms</label>
                            </div>
                        </div>
                    </div>
                     
                    <div class="ratings list-sidebar-item">
                        <h4>Ratings</h4>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>
                                    <span class="rating">
                                            <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>
                                    <span class="rating">
                                            <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>
                                    <span class="rating">
                                            <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>
                                    <span class="rating">
                                            <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>
                                    <span class="rating">
                                            <span class="fa fa-star"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="list-sidebar-item">
                        <h4>Services</h4>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>24/7 Reception</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Parking</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Bar</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Restaurant</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Satellite Television</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Lift/ELevator</label>
                            </div>
                        </div>
                        <div class="pretty p-default p-thick p-pulse">
                            <input type="checkbox">
                            <div class="state p-warning-o">
                                <label>Luggage Storage </label>
                            </div>
                        </div>
                    </div>
                    <div class="info-1 list-sidebar-item">
                        <i class="fa fa-phone-volume"></i>
                        <h5>Need help? Call us</h5>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>Monday to Friday 9.00am - 7.30pm</small>
                    </div>
                </div>
            </div>

            <div class="col-md-9 pull-right">
                <div class="list-results">
                    <div class="list-results-sort pull-left pad-top-5">
                        <p class="mar-0">Showing 1-5 of 80 results</p>
                    </div>
                     
                </div>
                <div class="list-content">
                    <div class="list-grid">
                        <div class="room-grid">
                            <div class="grid-image">
                                <img src="https://cyclonethemes.com/demo/html/hotux/images/room-list/grid1.jpg" alt="image">
                            </div>
                            <div class="grid-content">
                                <div class="room-title">
                                    <h4>Standard Suite</h4>
                                    <p class="mar-top-5"><i class="fa fa-tag"></i> $900/Night</p>
                                    <div class="deal-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                                <div class="room-detail">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
                                </div>
                                <div class="room-services">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-btn mar-top-20">
                                    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
                                    <a href="#" class="btn btn-orange">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="room-grid">
                            <div class="grid-image">
                                <img src="https://cyclonethemes.com/demo/html/hotux/images/room-list/grid1.jpg" alt="image">
                            </div>
                            <div class="grid-content">
                                <div class="room-title">
                                    <h4>Deluxe Suite</h4>
                                    <p class="mar-top-5"><i class="fa fa-tag"></i> $800/Night</p>
                                    <div class="deal-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                                <div class="room-detail">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
                                </div>

                                <div class="room-services">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-btn mar-top-20">
                                    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
                                    <a href="#" class="btn btn-orange">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="room-grid">
                            <div class="grid-image">
                                <img src="https://cyclonethemes.com/demo/html/hotux/images/room-list/grid1.jpg" alt="image">
                            </div>
                            <div class="grid-content">
                                <div class="room-title">
                                    <h4>Superior Suite</h4>
                                    <p class="mar-top-5"><i class="fa fa-tag"></i> $1000/Night</p>
                                    <div class="deal-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                                <div class="room-detail">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
                                </div>

                                <div class="room-services">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-btn mar-top-20">
                                    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
                                    <a href="#" class="btn btn-orange">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="room-grid">
                            <div class="grid-image">
                                <img src="https://cyclonethemes.com/demo/html/hotux/images/room-list/grid1.jpg" alt="image">
                            </div>
                            <div class="grid-content">
                                <div class="room-title">
                                    <h4>Normal Suite</h4>
                                    <p class="mar-top-5"><i class="fa fa-tag"></i> $200/Night</p>
                                    <div class="deal-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                                <div class="room-detail">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
                                </div>

                                <div class="room-services">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-btn mar-top-20">
                                    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
                                    <a href="#" class="btn btn-orange">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="room-grid">
                            <div class="grid-image">
                                <img src="https://cyclonethemes.com/demo/html/hotux/images/room-list/grid1.jpg" alt="image">
                            </div>
                            <div class="grid-content">
                                <div class="room-title">
                                    <h4>Royal Suite</h4>
                                    <p class="mar-top-5"><i class="fa fa-tag"></i> $1200/Night</p>
                                    <div class="deal-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </div>
                                <div class="room-detail">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
                                </div>

                                <div class="room-services">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <i class="fa fa-wifi" aria-hidden="true"></i> Quick Service
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-btn mar-top-20">
                                    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
                                    <a href="#" class="btn btn-orange">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-content text-center">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">10</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>



    <?php include('footer.php') ?>


    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        $('#date-range2').datepicker({
            uiLibrary: 'bootstrap'
        });

        $('#date-range3').datepicker({
            uiLibrary: 'bootstrap'
        });
    </script>
     
    
    <script>
       
       /* $('#date-range2').dateRangePicker({
    autoClose: true,
    singleDate : true,
    showShortcuts: false,
    singleMonth: true,
    showTopbar: false,
    extraClass: 'reserved-form',
    customArrowPrevSymbol: '<span class="fa fa-angle-left"></span>',
    customArrowNextSymbol: '<span class="fa fa-angle-right"></span>'
    
  });

$('#date-range3').dateRangePicker({
    autoClose: true,
    singleDate : true,
    showShortcuts: false,
    singleMonth: true,
    showTopbar: false,
    extraClass: 'reserved-form',
    customArrowPrevSymbol: '<span class="fa fa-angle-left"></span>',
    customArrowNextSymbol: '<span class="fa fa-angle-right"></span>'
    
  });*/
    </script> 

