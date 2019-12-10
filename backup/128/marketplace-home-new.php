<?php include( 'header.php'); include( 'chksession.php'); 
$_TBL_PROD1="product";
$rdb=new DB();
$makearr1=array();
$makearr1=getValuesArr( $_TBL_CAT, "id","catname","", "" );
$makearrpro=array();
$makearrpro=getValuesArr( $_TBL_PROD1, "id","prod_name","", "" );

$makearr3=array();
$makearr3=getValuesArr( $_TBL_SUBSUBCAT, "id","subsubcatname","", "" );
$makearr2=array();
$makearr2=getValuesArr( $_TBL_SUBCAT, "id","subcatname","", "" );
?>


    <div class="newsearch11">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="categorie-search-box">
                        <form action="#">
                            <div class="form-group">
                                <select class="bootstrap-select" name="poscats">
                                    <option value="0">All categories</option>
                                    <option value="2">Arrivals</option>
                                    <option value="3">Cameras</option>
                                    <option value="4">Cords and Cables</option>
                                    <option value="5">gps accessories</option>
                                    <option value="6">Microphones</option>
                                    <option value="7">Wireless Transmitters</option>
                                    <option value="8">GamePad</option>
                                    <option value="9">cube lifestyle hd</option>
                                    <option value="10">Bags</option>
                                    <option value="11">Bottoms</option>
                                    <option value="12">Shirts</option>
                                    <option value="13">Tailored</option>
                                    <option value="14">Home &amp; Kitchen</option>
                                    <option value="15">Large Appliances</option>
                                    <option value="16">Armchairs</option>
                                    <option value="17">Bunk Bed</option>
                                    <option value="18">Mattress</option>
                                    <option value="19">Sideboard</option>
                                    <option value="20">Small Appliances</option>
                                    <option value="21">Bootees Bags</option>
                                    <option value="22">Jackets</option>
                                    <option value="23">Shelf</option>
                                    <option value="24">Shoes</option>
                                    <option value="25">Phones &amp; Tablets</option>
                                    <option value="26">Tablet</option>
                                    <option value="27">phones</option>
                                </select>
                            </div>
                            <input type="text" name="search" placeholder="I’m shopping for...">
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">

                            <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Wish</span><span>list (0)</span></span></a>
                            </li>
							<li><a href="#" class="sellproduct1"><i class="lnr lnr-store"></i> Sell Your Product </a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="search-sec" style="display:none">
        <div class="container">
            <div class="search-box">
                <form action="search1.php" method="post">
                    <input type="text" name="search" class="search" id="searchid" onkeypress="return showUser(this.value);" placeholder="Is it me you're looking for?" />
                    <!--<input type="text" name="search" placeholder="Search keywords">-->
                    <button type="submit">Search</button>
                </form>
            </div>
            <ul id="txtHint"></ul>
            <script>
                function showUser(str) {
                    if (str == "0") {
                        document.getElementById("txtHint").innerHTML = "";

                        return;
                    } else {

                        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else { // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

                            }
                        }

                        xmlhttp.open("GET", "newsearch.php?q=" + str, true);
                        xmlhttp.send();
                    }
                }
            </script>
            <!--search-box end-->
        </div>
    </div>
    <!--search-sec end-->

    <div class="main-page-banner pb-50 off-white-bg">
        <div class="container">
            <div class="row">
                <!-- Vertical Menu Start Here -->
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                    <div class="vertical-menu mb-all-30">
                        <nav>
                            <ul class="vertical-menu-list">
                                <li class=""><a href="shop.html"><span><img src="img/vertical-menu/1.png" alt="menu-icon"></span>Automotive &amp; Motorcycle<i class="fa fa-angle-right" aria-hidden="true"></i></a>

                                    <ul class="ht-dropdown mega-child">
                                        <li><a href="shop.html">Office chair </a>

                                        </li>
                                        <li><a href="shop.html">Purus Lacus </a>

                                        </li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/3.png" alt="menu-icon"></span>Sports &amp; Outdoors<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    <ul class="ht-dropdown mega-child">
                                        <li><a href="shop.html">Office chair </a>

                                        </li>
                                        <li><a href="shop.html">Purus Lacus </a>

                                        </li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/6.png" alt="menu-icon"></span>Fashion<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    <ul class="ht-dropdown mega-child">
                                        <li><a href="shop.html">Office chair </a>

                                        </li>
                                        <li><a href="shop.html">Purus Lacus </a>

                                        </li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/7.png" alt="menu-icon"></span>Home &amp; Kitchen<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    <ul class="ht-dropdown mega-child">
                                        <li><a href="shop.html">Office chair </a>

                                        </li>
                                        <li><a href="shop.html">Purus Lacus </a>

                                        </li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/4.png" alt="menu-icon"></span>Phones &amp; Tablets<i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                    <ul class="ht-dropdown mega-child">
                                        <li><a href="shop.html">Office chair </a>

                                        </li>
                                        <li><a href="shop.html">Purus Lacus </a>

                                        </li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/6.png" alt="menu-icon"></span>TV &amp; Video<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    <ul class="ht-dropdown mega-child">
                                        <li><a href="shop.html">Office chair </a>

                                        </li>
                                        <li><a href="shop.html">Purus Lacus </a>

                                        </li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                        <li><a href="shop.html">Sagittis Eget</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/5.png" alt="menu-icon"></span>Beauty</a>
                                </li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/8.png" alt="menu-icon"></span>Fruits &amp; Veggies</a></li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/9.png" alt="menu-icon"></span>Computer &amp; Laptop</a></li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/10.png" alt="menu-icon"></span>Meat &amp; Seafood</a></li>
                                <!-- More Categoies Start -->
                                <li id="cate-toggle" class="category-menu v-cat-menu">
                                    <ul>
                                        <li class="has-sub"><a href="#">More Categories</a>
                                            <ul class="category-sub">
                                                <li><a href="shop.html"><span><img src="img/vertical-menu/11.png" alt="menu-icon"></span>Accessories</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- More Categoies End -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Vertical Menu End Here -->
                <!-- Slider Area Start Here -->
                <div class="col-xl-9 col-lg-8 slider_box">
                    <div class="slider-wrapper theme-default">
                        <!-- Slider Background  Image Start-->
                        <div class="bd-example maincarosal">
                            <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                        <!--<div class="carousel-caption d-none d-md-block">
                                            <h5>First slide label</h5>
                                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                        </div>-->
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                       
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                        
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- Slider Background  Image Start-->
                    </div>
                </div>
                <!-- Slider Area End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>





    <!-------- new code -------------->
<style type="text/css">
	.timerproduct0 {
    background: #fff;
    padding: 0 19px;
    float: left;
    width: 100%;
}
	.discount-banner {
         margin: 11px 0 0 0;
}
.discount-banner .discount-banner-contain {
    padding: 47px 25px 40px;
    text-align: center;
    background: #fff;
}
.discount-banner .discount-banner-contain h2 {
    font-size: calc(14px + (24 - 14) * ((100vw - 320px) / (1920 - 320)));
    text-transform: capitalize;
    margin-bottom: 3px;
    margin-top: -5px;
}
.discount-banner .discount-banner-contain h1 {
    font-size: calc(18px + (42 - 18) * ((100vw - 320px) / (1920 - 320)));
    font-weight: normal;
    text-transform: uppercase;
    margin-bottom: 10px;
    color: #444;
}

.discount-banner .discount-banner-contain h1 span {
    color: #00baf2;
}

.discount-banner .discount-banner-contain h1 span+span {
    color: #1c3481;
    font-weight: 700;
}

.discount-banner .discount-banner-contain .rounded-contain.rounded-inverse {
    border: 2px dashed #00baf2;
}
.discount-banner .discount-banner-contain .rounded-contain {
    border: 2px dashed #1c3481;
    border-radius: 50px;
    padding: 5px;
}

.discount-banner .discount-banner-contain .rounded-contain.rounded-inverse .rounded-subcontain {
    background-color: #ff5e00;
}
.discount-banner .discount-banner-contain .rounded-contain .rounded-subcontain {
    background-color: #00baf2;
    color: #fff;
    text-transform: uppercase;
    padding: 18px 0;
    font-weight: 600;
    font-size: calc(14px + (18 - 14) * ((100vw - 320px) / (1920 - 320)));
    letter-spacing: .08em;
    line-height: 1;
    border-radius: 50px;
}


.product1ss {
       width: 25%;
    float: left;
    background: #fff;
    padding: 0 12px;
}

h6.oldprice {
    color: #999;
    font-size: 16px;
    margin: 0;
    position: relative;
    top: -1px;
    float: right;
    text-decoration: line-through;
    display: block;
    width: 100%;

    text-align: right;
}

h5.process100 {
    color: #ff5e00;
    font-size: 21px;
    font-weight: 700;
    float: right;
    width: 100%;
    text-align: right;
    margin-bottom: 8px;
}

.productdetails223 {
    clear: both;
    background: #fff;
    padding: 14px 12px;
    text-align: left;

}

.prod-img1sn {
    width: 100%;
    float: left;
    height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
    padding-bottom: 8px;
    margin-bottom: 8px;
    position: relative;
}
.sj_deals_cd_day {
    width: 40px;
    height: 50px;
    min-width: 40px;
    padding-top: 5px;
    margin: 0 2px;
    background: #00bcd4;
    font-size: 18px;
    opacity: 1;
    transform: translateY(0);
    -moz-transform: translateY(0);
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transition: all 0.3s ease-in;
    box-sizing: content-box;
  display: inline-block;
    color: #fff;
        text-align: center;
}

.sj_deals_cd_day p{color: #fff;}


.item-deals{position: absolute;
    top: 50%;
    text-align: center;
    left: 0;
    margin-top: 36px;
    width: 100%;
    z-index: 2;}
.sj_deals_cd_day{width: auto;
    height: 50px;
    min-width: 40px;
    padding-top: 5px;
    margin: 0 2px;
    background: #00bcd4;
    font-size: 18px;
    opacity: 1;
    transform: translateY(0);
    -moz-transform: translateY(0);
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transition: all 0.3s ease-in;}
.prodctnamenew{    font-size: 15px;    margin-bottom: 6px;}
.prodctnamenew{}
span.prodcutstart {
    font-size: 13px;
    color: #ffb204;
}
</style>

    		<section class="discount-banner">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="discount-banner-contain">
          <h2>Discount on every single item on our site.</h2>
          <h1><span>OMG! Just Look at the</span> <span>great Deals!</span></h1>
          <div class="rounded-contain rounded-inverse">
            <div class="rounded-subcontain">
              How does it feel, when you see great discount deals for each product?
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-12">
    		<div class="timerproduct0">
    			<div class="product1ss">
    				<div class="prod-img1sn">
    					<a href="#">
    					<img src="img/timerproduct4.jpg" alt="product`">
    					  <div class="simple-timer"></div>
					</a>
    				</div>
    				<div class="productdetails223">
    					<div class="row">
    						<div class="col-md-7">
    							<h3 class="prodctnamenew">LIGE Brand Women Watch  	</h3>
    							<span class="prodcutstart">
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    							</span>
    						</div>
    						<div class="col-md-5">
    							<h5 class="process100">₦ 199.90</h5>
    							<h6 class="oldprice">₦ 200</h6>
    						</div>
    					</div>
    				</div>

    			</div>

    			<div class="product1ss">
    				<div class="prod-img1sn">
    					<a href="#">
    					<img src="img/timerproduct.jpg" alt="product`">
    					<div class="simple-timer"></div>
					</a>
    				</div>
    				<div class="productdetails223">
    					<div class="row">
    						<div class="col-md-7">
    							<h3 class="prodctnamenew">Bamos Luxury White Zircon</h3>
    							<span class="prodcutstart">
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    							</span>
    						</div>
    						<div class="col-md-5">
    							<h5 class="process100">₦ 199.90</h5>
    							<h6 class="oldprice">₦ 200</h6>
    						</div>
    					</div>
    				</div>

    			</div>

    			<div class="product1ss">
    				<div class="prod-img1sn">
    					<a href="#">
    					<img src="img/timerproduct1.jpg" alt="product`">
    					<div class="simple-timer"></div>
					</a>
    				</div>
    				<div class="productdetails223">
    					<div class="row">
    						<div class="col-md-7">
    							<h3 class="prodctnamenew">NO.ONEPAUL Genuine Leather</h3>
    							<span class="prodcutstart">
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    							</span>
    						</div>
    						<div class="col-md-5">
    							<h5 class="process100">₦ 199.90</h5>
    							<h6 class="oldprice">₦ 200</h6>
    						</div>
    					</div>
    				</div>

    			</div>	

    			<div class="product1ss">
    				<div class="prod-img1sn">
    					<a href="#">
    					<img src="img/timerproduct2.jpg" alt="product`">

    					 
    					<div class="simple-timer"></div>	
 
					</a>
    				</div>
    				<div class="productdetails223">
    					<div class="row">
    						<div class="col-md-7">
    							<h3 class="prodctnamenew">Cotton Panty 3Pcs/lot Solid   </h3>
    							<span class="prodcutstart">
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    								<i class="fa fa-star-o" aria-hidden="true"></i>
    							</span>
    						</div>
    						<div class="col-md-5">
    							<h5 class="process100">₦ 199.90</h5>
    							<h6 class="oldprice">₦ 200</h6>
    						</div>
    					</div>
    				</div>

    			</div>

    		</div>
    		</div>

    </div>
  </div>
</section>

    <!-------- new code ended -------------->




    <div class="cattegorilist">
        <div class="container">
            <div class="lisging-c-aro-home">
                <ul>
                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Automotive</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product2.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Sports & Outdoors</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product3.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Fashion</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product4.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Home & Kitchen</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product5.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Phones & Tablets</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product6.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>TV & Video</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Sagittis Eget</h4>
                        </div>
                    </li>


                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product7.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Beauty</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product8.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Fruits & Veggies</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product9.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Computer & Laptop</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product10.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Meat & Seafood</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/product11.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Office Chair</h4>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>



    <div class="container clear newprodcuttab">
        <div class="col-md-12">

        		<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#newarrvial" role="tab" data-toggle="tab">New Arrivals</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#Featured" role="tab" data-toggle="tab">Featured </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#Mostselling" role="tab" data-toggle="tab">Most selling</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in show active" id="newarrvial">
  		 <div class="row  productsslider">
                <h4>New Arrivals</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
								
								<div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                                 
                            </div>
                            <!--.carousel-inner-->
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

  </div>
  <div role="tabpanel" class="tab-pane fade" id="Featured">
  	<div class="row  productsslider">
                <h4>Featured Product</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel2" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel2" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
								
								<div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                                 
                            </div>
                            <!--.carousel-inner-->
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel2" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel2" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="Mostselling">
  		<div class="row  productsslider">
                <h4>Most Selling Product</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li data-target="#blogCarousel3" data-slide-to="0" class="active"></li>
                                <li data-target="#blogCarousel3" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
								
								<div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap">89.97% Off</span>
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                                 
                            </div>
                            <!--.carousel-inner-->
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel3" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel3" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

  </div>
</div>




           

        </div>

    </div>

 

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                        <a href=""><img src="img/ads1.png" alt="ads"></a>
						    
						<!--filter-secs end-->
							
                        </div>
                        <div class="col-lg-9">
                            <div class="main-ws-sec">
                                <div class="posts-section prodcutlisting">
                                    <div class="row searchrec">
                                        <ul class="b49ee_2pjyI _58c31_2R34y _22339_3gQb9">
                                            <?php 
						 if(!empty($_GET['cid'])){
							 if($_GET['cid']=='all'){
							 $sql="SELECT * from ".$_TBL_PRODUCT ; }else{
								 $sql="SELECT * from ".$_TBL_PRODUCT." where catid=".$_GET['cid'];
							 }
						}else{
							 $sql="SELECT * from ".$_TBL_PRODUCT;
						}

						 //." where catid='".$catid1."' and subcatid='$subid1' and subsubcatid='$subsubid' order by id desc";
						$db->query($sql);
						if($db->numRows()>0)
						{
						while($row=$db->fetchArray()){

						$path=$row['prod_large_image'];
						$goid=base64_encode($row['id']); 
						$save=$row['prod_price']-$row['prod_sprice']; 			
						$mrp=$row['prod_price'];
						$persen=$row['prod_price']-$row['prod_sprice'];
						$discount=($persen*100)/$mrp;
						$orgprice=$row['prod_sprice'];
						$finalprice=$row['prod_sprice'];

						?>
                                                <!-- one product--->
                                                <li class="bbe45_3oExY _22339_3gQb9">
                                                    <div>
                                                        <div class="a2cf5_2S5q5 cf5dc_3HhOq"><span class="_4472a_zYlL- _6c244_q2qap"><?=number_format($discount,2)?>% Off</span>
                                                            <div class="_7e903_3FsI6">
                                                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>" pid="<?=$row['id']?>">
                                                                    <picture>
                                                                        <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"></picture>
                                                                </a>

                                                            </div>
                                                            <div class="_4941f_1HCZm">
                                                                <a href="product-details.php?pid=<?=base64_encode($row['id'])?>">
                                                                    <div class="af885_1iPzH">
                                                                        <h3><?=$row['prod_name']?></h3></div>
                                                                    <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>
                                                                        <?=number_format($row['prod_sprice'],2);?>
                                                                            </span><span class="f6eb3_1MyTu"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>
                                                                            <?=number_format($row['prod_price'],2);?>
                                                                                </span>
                                                                    </div>
                                                                </a>
                                                                <form action="/cart/overview" method="POST">
                                                                    <input name="action_type" type="hidden" value="add_to_cart">
                                                                    <input name="product_sku" type="hidden" value="4522359">
                                                                    <input name="product_qty" type="hidden" value="1">
                                                                    <input name="product_price" type="hidden" value="78500">
                                                                    <input name="product_type" type="hidden" value="simple"><span class="_7cc7b_23GsY">Sold by  <a href="/merchant/konga-store">konga</a></span>
                                                                    <div class="_09e22_1ojNd"><span class="_13ef4_vzqNh">Posted</span><span class="_13ef4_vzqNh"><?=$row['sort-detail']?> <?php echo timeago($row['prod_date']);?></span></div>
                                                                    <div class="ccc19_2IYt0">
                                                                        <div>
                                                                            <?php if($row['start']=='1'){ echo "<i class='fas fa-star'></i>";}?>

                                                                                <?php if($row['start']=='2'){ echo "<i class='fas fa-star'></i>";}?>

                                                                                    <?php if($row['start']=='3'){ echo "<i class='fas fa-star'></i>";}?>

                                                                        </div>
                                                                    </div>

                                                                    <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                        <button class="_0a08a_3czMG addtocartnew1" type="button" pid="<?=$row['id']?>" tono="1">Add To Cart</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- one product ended -->

                                                <!-- old code 	
									<div class="col-md-3 prodct-col">
										<div class="post-bar prodctbar">
											<div class="post_topbar">
												<div class="prodcut-list-1">
													<div class="prod-img"> 
														<a href="javascript:void(0);" class="bid_now11" pid="<?=$row['id']?>">
															<img src="<?=$_SITE_PATH?>product/<?=$path?>" alt="<?=$row['prod_name']?>"> <span class="proctprice">$ <?=number_format($row['prod_sprice'],2);?></span>
														</a>
													</div>
													<div class="prod-detials">
														<h3 class="prodct_titl"><?=$row['prod_name']?></h3>
														<h3 class="prodct_time"><?=$row['sort-detail']?> <?php echo timeago($row['prod_date']);?></h3>
													</div>
													<div class="add-card_bttn">
														<a href="product-details.php?pid=<?=base64_encode($row['id'])?>" class="addtocard-btn bid_now ">Add To Card</a>
													</div>
												</div>
											</div>
										</div>

									</div>
								-->

                                                <?php $goid=''; }} ?>
                                        </ul>

                                        <!---------------------- product popup ------------------->
                                        <div class="popupforproduct" id="popupid">
                                            <div class="overview-box abc" id="overview-box">

                                            </div>
                                        </div>
                                        <!---------------------- product popup ------------------->

                                    </div>
                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                    </div>
					
					<div class="row">
					 <div class="col-md-12">
            <div class="row  productsslider">
                <h4>View History</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div id="blogCarousel1" class="carousel slide" data-ride="carousel">

                            

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"> 
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq">
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq">
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"> 
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->
								
								<div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"> 
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"> 
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"> 
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="bbe45_3oExY _22339_3gQb9">
                                                <div>
                                                    <div class="a2cf5_2S5q5 cf5dc_3HhOq"> 
                                                        <div class="_7e903_3FsI6">
                                                            <a href="product-details.php?pid=NQ==" pid="5">
                                                                <picture>
                                                                    <img class="f5e10_VzEXF _59c59_3-MyH lazyloaded" src="http://orangestate.ng/product/71OApDkUntL._AC_SL1500_.jpg" alt="HP DeskJet 1112 Single Function Inkjet Colour Printer"></picture>
                                                            </a>

                                                        </div>
                                                        <div class="_4941f_1HCZm">
                                                            <a href="product-details.php?pid=NQ==">
                                                                <div class="af885_1iPzH">
                                                                    <h3>HP DeskJet 1112 Single Function Inkjet Colour Printer</h3></div>
                                                                <div class="_4e81a_39Ehs"><span class="d7c0f_sJAqi"><span style="font-family: sans-serif; margin-right: 1px;">₦</span>8,796.00</span>
                                                                </div>
                                                            </a>
                                                            <form action="/cart/overview" method="POST">

                                                                <div class="_2aac2_3bwnD _549f7_zvZ8u _49c0c_3Cv2D _977c5_2vBMq">
                                                                    <button class="_0a08a_3czMG addtocartnew1" type="button" pid="5" tono="1">Add To Cart</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                                 
                            </div>
                            <!--.carousel-inner-->
                            <div class="prodcutcarosalnav">
                                <a class="carousel-control-prev" href="#blogCarousel1" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogCarousel1" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>

        </div>

					</div>
                </div>
                <!-- main-section-data end-->
            </div>
        </div>
    </main>
	
	<div class="support-area bdr-top clear">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Great Value</h6>
                            <span>Nunc id ante quis tellus faucibus dictum in eget.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Worlwide Delivery</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Safe Payment</h6>
                            <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Shop Confidence</h6>
                            <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Help Center</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
		
	<footer class="off-white-bg2 pt-95 bdr-top pt-sm-55 clear">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">
                    <!-- Signup Newsletter Start -->
                    <div class="row mb-60">
                         <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                            <div class="news-desc text-center mb-30">
                                 <h3>Sign Up For Newsletters</h3>
                                 <p>Be the First to Know. Sign up for newsletter today</p>
                             </div>
                             <div class="newsletter-box">
                                 <form action="#">
                                      <input class="subscribe" placeholder="your email address" name="email" id="subscribe" type="text">
                                      <button type="submit" class="submit">subscribe!</button>
                                 </form>
                             </div>
                         </div>
                    </div> 
                    <!-- Signup-Newsletter End -->                   
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Information</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="contact.html">Terms &amp; Conditions</a></li>
                                        <li><a href="login.html">FAQs</a></li>
                                        <li><a href="login.html">Return Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Customer Service</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li><a href="#">Site Map</a></li>
                                        <li><a href="#">Gift Certificates</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Extras</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Newsletter</a></li>
                                        <li><a href="#">Brands</a></li>
                                        <li><a href="#">Gift Certificates</a></li>
                                        <li><a href="#">Affiliate</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Site Map</a></li>      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                        <li><i class="lnr lnr-map-marker"></i> Address: 169-C, Technohub, Dubai Silicon Oasis.</li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#"> mail Us: Support@orangestate.com </a></li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i> Phone: (+800) 123 456 789)
                                        </li>
                                    </ul>
                                    <div class="payment mt-25 bdr-top pt-30">
                                        <a href="#"><img class="img" src="img/1.png" alt="payment-image"></a>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Middle Start -->
            <div class="footer-middle text-center">
                <div class="container">
                    <div class="footer-middle-content pt-20 pb-30">
                            <ul class="social-footer">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><img src="img/social-img1.png" alt="google play"></a></li>
                                <li><a href="#"><img src="img/social-img2.png" alt="app store"></a></li>
                            </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom pb-30">
                <div class="container">

                     <div class="copyright-text text-center">                    
                        <p>Copyright © 2018 <a target="_blank" href="#">OrangeState</a> All Rights Reserved.</p>
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>	

    <div class="selle-prodcut-popup">
        <div class="overview-box" id="experience-box" style="overflow: scroll; max-height: 80vh; height:600px;
">
            <div class="overview-edit">
                <h3>Add Product</h3>
                <form method="post" id="AddForm" enctype="multipart/form-data">
                    <?php echo createComboBox($makearr1,'category',$row['catid'],' class="form-control" id="category" ');?>

                        <?php 

				echo createComboBox($makearr2,'subcategory',$row['subcatid'],' class="form-control" id="subcategory" ');
								?>
                            <input type="text" name="prodname" id="prodname" placeholder="Product Name..." required />

                            <input name="sku" id="sku" type="text" class="form-control" value="<?=$row['prod_sku']?>" placeholder="Sku..." />

                            <input type="text" name="price" id="price" placeholder="Product Mrp..." required />

                            <input type="text" name="prod_sprice" id="prod_sprice" placeholder="Product selling price..." required />
                            <input name="star" type="text" class="form-control" value="<?=$row['star']?>" placeholder="star 1-5" />

                            <input placeholder="material" name="material" type="text" class="form-control" value="<?=$row['material']?>" />
                            <input name="shippingcharge" type="text" class="form-control" value="<?=$row['shippingcharge']?>" placeholder="shipping charge " />

                            <div class="fgt-sec">
                                <input type="checkbox" name="size" id="size" value="S" <?php if($row[ 'prodsize1']=='S' ){echo "checked";} ?>>
                                <label for="size">
                                    <span></span>
                                </label>
                                <small>Small</small>
                            </div>
                            <div class="fgt-sec">
                                <input type="checkbox" name="size1" id="size1" value="M" <?php if($row[ 'prodsize2']=='M' ){echo "checked";} ?>>
                                <label for="size1">
                                    <span></span>
                                </label>
                                <small>Medium</small>
                            </div>

                            <div class="fgt-sec">
                                <input type="checkbox" name="size2" id="size2" value="L" <?php if($row[ 'prodsize3']=='L' ){echo "checked";} ?>>
                                <label for="size2">
                                    <span></span>
                                </label>
                                <small>Large</small>
                            </div>
                            <div class="fgt-sec">
                                <input type="checkbox" name="size3" id="size3" value="EXL" <?php if($row[ 'prodsize4']=='EXL' ){echo "checked";}?>>
                                <label for="size3">
                                    <span></span>
                                </label>
                                <small>Extra Large</small>
                            </div>

                            <input name="quantity" type="text" class="form-control" value="<?=$row['quantity']?>" placeholder="quantity" />

                            <textarea placeholder="sort detail" name="sort_detail" class="form-control">
                                <?=$row['sort_detail']?>
                            </textarea>

                            <textarea cols="5" rows="4" placeholder="Product Details..." name="prod_desc" id="prod_desc"></textarea>

                            <img src="images/gallery.png">Add product Image
                            <input type="file" id="p" name="p" multiple>
                            </label>
                            <input type="hidden" name="pimgid" id="pimgid" value="" />

                            <input type="file" id="mp" name="mp" multiple>
                            </label>
                            <input type="hidden" name="mpimgid" id="mpimgid" value="" />

                            <button type="button" class="save addproduct" id="addproduct">Save</button>
                            <!--<button type="submit" class="save-add">Save & Add More</button>-->
                            <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div>
            <!--overview-edit end-->
        </div>
        <!--overview-box end-->
    </div>
    </div>

    <script src="lib/js/config.js"></script>
    <script src="lib/js/util.js"></script>
    <script src="lib/js/jquery.emojiarea.js"></script>
    <script src="lib/js/emoji-picker.js"></script>
    <script>
        $(function() {
            // Initializes and creates emoji set from sprite sheet
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: 'lib/img/',
                popupButtonClasses: 'fa fa-smile-o'
            });
            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
            // It can be called as many times as necessary; previously converted input fields will not be converted again
            window.emojiPicker.discover();
        });
    </script>
    <?php include( 'footer.php') ?>
        <script>
            function preview_image() {
                var total_file = document.getElementById("upload_file").files.length;
                for (var i = 0; i < total_file; i++) {

                    $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'>");
                }
            }

            //video player
        </script>

        <script type="text/javascript" src="js/jquery.syotimer.js"></script>
        <script type="text/javascript">
         jQuery(function($){
			    
			    $('.simple-timer').syotimer({
			        year: 2019,
			        month: 11,
			        day: 12,
			        hour: 22,
			        minute: 30
			    });

			 
			}); 

        </script>