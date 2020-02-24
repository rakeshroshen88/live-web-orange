<?php include('header.php');
include('chksession.php');
?>

 <section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>RESERVATION</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Availability</li>
                </ul>
            </nav>
        </div>
    </div>
</section>

 <section class="content reservation-main">
    <div class="container">
        <div class="reservation-links text-center">
            <h2 class="mar-bottom-60 text-capitalize">Make Your Reservation</h2>
            <div class="reservation-links-content">
                <div class="res-item">
                    <a href="availability.html" class="active">1</a>
                    <p>Check Availability</p>
                </div>
                <div class="res-item">
                    <a href="room-select.html">2</a>
                    <p>Select Room</p>
                </div>
                <div class="res-item">
                    <a href="booking.html">3</a>
                    <p>Booking</p>
                </div>
                <div class="res-item">
                    <a href="confirmation.html">4</a>
                    <p>Confirmation</p>
                </div>
            </div>
        </div>
        <div class="banner-form form-style-1">
            <div class="form-content">
                <div class="table-item">
                    <label>Check In</label>
                    <div class="form-group">
                         <input id="date-range2" class="form-control"   readonly="readonly">
                         
                    </div>
                </div>
                <div class="table-item">
                    <label>Check Out</label>
                    <div class="form-group">
                        <input id="date-range3" class="form-control"   readonly="readonly">
                         
                    </div>
                </div>
                <div class="table-item">
                    <label>Guests</label>
                    <div class="form-group">
                        <select class="niceSelect" >
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                        </select>
                         
                    </div>
                </div>
                <div class="table-item">
                    <label>Nights</label>
                    <div class="form-group">
                        <select class="niceSelect" >
                            <option value="1">05</option>
                            <option value="2">06</option>
                            <option value="3">07</option>
                            <option value="4">08</option>
                            <option value="5">09</option>
                        </select>
                         
                    </div>
                </div>
                <div class="table-item">
                    <div class="form-btn mar-top-35">
                        <a class="btn btn-orange">Check Availability</a>
                    </div>
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
       
     $('#myCarousel11').carousel({
        interval:   4000
    });
    </script> 

