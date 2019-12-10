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

    <style>
        /* 2.2 Header Middle CSS
/*----------------------------------------*/
        
        .categorie-search-box form {
            color: #a9a9a9;
            height: 38px;
            padding: 0;
            position: relative;
            width: 100%;
        }
        
        .categorie-search-box input {
            background: white none repeat scroll 0 0;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            color: #a9a9a9;
            font-size: 13px;
            height: 38px;
            padding: 0 226px 0 16px;
            width: 100%;
        }
        
        .categorie-search-box button {
            background: #e62e04 none repeat scroll 0 0;
            border: medium none;
            border-radius: 0 3px 3px 0;
            color: white;
            font-size: 18px;
            height: 37px;
            line-height: 40px;
            margin: 0;
            padding: 0;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            transition: all 300ms ease-in 0s;
            width: 60px;
        }
        
        .categorie-search-box button:focus {
            border: none;
        }
        
		
		.bdr-top {
    border-top: 1px solid #ddd;
}

.pt-95 {
    padding-top: 95px;
}
.off-white-bg2 {
    background: #f9f9fb;
}


        .categorie-search-box button:hover {
            background: rgba(230, 46, 4, 0.8) none repeat scroll 0 0;
            cursor: pointer;
        }
        
        .categorie-search-box .form-group {
            align-items: center;
            background: transparent none repeat scroll 0 0;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            height: 38px;
            margin: 0;
            position: absolute;
            right: 60px;
            top: 0;
            width: 150px;
        }
        
        .bootstrap-select option {
            font-size: 13px;
        }
        
        .nice-select::after {
            margin-top: -3px;
        }
        
        .nice-select .current {
            display: block;
            overflow: hidden;
            width: 100%;
        }
        
        .categorie-search-box .nice-select .list {
            height: 350px;
            overflow-y: auto;
        }
        
        .bootstrap-select {
            border-radius: 15px 0 0 15px;
            border-style: none solid none none;
            border-width: 0 1px 0 0;
            color: #777777;
            font-size: 13px;
            height: 25px;
            line-height: 25px;
            margin: 0;
            width: 150px;
            padding: 0 13px;
            border: none;
        }
        
        .cart-box > ul > li:not(:first-child) {
            margin-left: 20px;
        }
        
        .cart-box-width > li {
            padding: 20px;
        }
        
        .cart-box > ul > li > a {
            color: #363636;
        }
        
        .cart-text {
            display: block;
        }
        
        .cart-box > ul > li > a i {
            font-size: 32px;
        }
        
        .my-cart {
            color: #666;
            display: inline-block;
            font-size: 13px;
            font-weight: 400;
            margin-left: 8px;
            text-transform: capitalize;
            vertical-align: top;
        }
        
        .cart-box-width {
            background: white none repeat scroll 0 0;
            box-shadow: 0 3px 9.3px 0.7px rgba(0, 0, 0, 0.15);
            left: auto;
            padding: 0;
            width: 290px;
        }
        
        .single-cart-box {
            margin-bottom: 18px;
            overflow: hidden;
            position: relative;
        }
        
        .cart-img {
            float: left;
            padding-right: 10px;
            position: relative;
            width: 35%;
        }
        
        .cart-img img {
            max-width: 100%;
        }
        
        .cart-content {
            float: left;
            padding: 0 15px 15px 0;
            width: 65%;
        }
        
        .cart-content h6 a {
            color: #666;
            display: block;
            font-size: 16px;
            line-height: 20px;
            overflow: hidden;
            overflow-wrap: break-word;
            text-overflow: ellipsis;
            text-transform: capitalize;
            white-space: nowrap;
        }
        
        .cart-content span {
            display: block;
            color: #666;
            font-size: 14px;
            line-height: 20px;
        }
        
        .cart-price {
            margin: 5px 0;
        }
        
        .cart-actions a {
            background: #2c2c2c none repeat scroll 0 0;
            border-radius: 5px;
            -webkit-box-shadow: none;
            box-shadow: none;
            color: white;
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            padding: 10px 20px;
        }
        
        .cart-checkout {
            background: #f26667 none repeat scroll 0 0;
            color: #fff;
        }
        
        .cart-checkout:hover {
            background-color: #E62E04;
            border-color: transparent;
            color: #fff;
        }
        
        .del-icone {
            color: #666;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 45;
        }
        
        .del-icone:hover,
        .cart-content h6 a:hover {
            color: #E62E04;
        }
        
        .my-cart > span {
            color: #363636;
            display: block;
            line-height: 18px;
        }
        
        span.total-pro {
            background: #e62e04 none repeat scroll 0 0;
            border-radius: 10px;
            color: #fff;
            display: block;
            font-size: 13px;
            font-weight: 400;
            margin-top: 3px;
            min-width: 30px;
            text-align: center;
        }
        
        .single-cart-box,
        .price-content {
            border-bottom: 1px solid #ededed;
            margin-bottom: 20px;
        }
        
        .price-content {
            overflow: hidden;
            padding-bottom: 20px;
        }
        
        .categorie-search-box input:hover {
            outline: none;
        }
        
        .price-content li {
            color: #333;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.5;
        }
        
        .price-content li span,
        .cart-content span.cart-price {
            float: right;
            font-size: 16px;
            font-weight: 500;
        }
        
        .cart-content span.cart-price {
            color: #E62E04;
            float: none;
        }
        
        .pro-quantity {
            background: #E62E04 none repeat scroll 0 0;
            border-radius: 100%;
            color: white;
            font-size: 16px;
            left: 5px;
            line-height: 23px;
            min-width: 25px;
            padding: 2px 0 0;
            position: absolute;
            text-align: center;
            top: 3px;
        }
        
        .newsearch11 {
            clear: both;
            padding: 21px;
			background:#fff;
			margin-bottom:20px;
        }
        
        .clear {
            clear: both;
        }
        /* 2.3 Header Bottom CSS
/*----------------------------------------*/
        
        .header-sticky.sticky {
            -webkit-transition: all 300ms ease-in 0s;
            transition: all 300ms ease-in 0s;
            -webkit-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.4);
            box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.4);
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            z-index: 1049;
            background: #fff;
        }
        
        .header-bottom.header-sticky.sticky .categorie-title {
            display: none;
        }
        
        .header-bottom-list > li {
            position: relative;
        }
        /* header bottom dropdown menu css start */
        
        .header-bottom-list > li > a,
        .header-bottom-list > li > ul.ht-dropdown li a {
            color: #333333;
            display: block;
            font-size: 15px;
            font-weight: 700;
            padding: 10px 15px;
            position: relative;
            text-transform: capitalize;
            font-family: "Lato", sans-serif;
        }
        
        .header-bottom-list > li > ul.ht-dropdown li a {
            color: #333;
            padding: 7px 20px;
            font-size: 14px;
            font-weight: 400;
            text-transform: capitalize;
        }
        
        .header-bottom-list > li > ul.ht-dropdown li:hover a {
            color: #E62E04;
        }
        
        .header-bottom-list > li > ul.ht-dropdown {
            width: 200px;
        }
        
        .header-bottom-list > li > a {
            padding: 10px 30px 10px 0;
        }
        /* header bottom dropdown menu css end */
        
        .header-bottom-list > li.active > a,
        .home-4 .header-bottom-list > li.active > a,
        .header-bottom-list > li:hover > a,
        .home-4 .header-bottom-list > li:hover > a {
            color: #E62E04;
        }
        
        .mean-container .mean-bar {
            background: #F2F2F2 none repeat scroll 0 0;
            min-height: 58px;
            position: static;
            width: 100%;
        }
        
        .mean-container .mean-nav ul {
            background: #fff none repeat scroll 0 0;
            width: auto;
        }
        
        .mean-container .mean-nav {
            margin-top: 56px;
        }
        
        .mean-container a.meanmenu-reveal span {
            background: #363636 none repeat scroll 0 0;
        }
        
        .mean-container a.meanmenu-reveal {
            background: transparent none repeat scroll 0 0;
            color: #363636;
            font-family: "Open Sans", sans-serif;
            right: 15px!important;
            top: 14px;
        }
        /*----------------------------------------*/
        /* 2.4 Vertical Mobile Menu CSS
/*----------------------------------------*/
        
        #cate-mobile-toggle {
            height: 265px;
            overflow-y: auto;
        }
        
        #cate-mobile-toggle > ul {
            padding: 22px 0 0;
        }
        
        #cate-mobile-toggle > ul > li > a {
            font-size: 15px;
        }
        
        #cate-mobile-toggle > ul li > a {
            font-size: 15px;
            padding-bottom: 3px;
            padding-top: 3px;
        }
        
        #cate-mobile-toggle .category-sub > li > a:before {
            content: "\f125";
            font-family: "Ionicons";
            font-size: 9px;
            position: absolute;
            left: 10px;
            color: #e62e04;
        }
        
        #cate-mobile-toggle .category-sub li a {
            padding-left: 20px;
        }
        
        .sidebar-menu .category-sub {
            padding-left: 10px;
        }
        /*----------------------------------------*/
        /* 3.1 Categorie Menu CSS
/*----------------------------------------*/
        
        .vertical-menu {
            position: relative;
        }
        
        .header-bottom.header-sticky {
            border-bottom: 1px solid #ebebeb;
            border-top: 1px solid #ebebeb;
        }
        
        .vertical-menu nav {
            width: 100%;
        }
        
        .vertical-menu-list {
            background: #fff none repeat scroll 0 0;
            left: 0;
            padding: 10px 0;
            top: 100%;
            width: 100%;
            text-align: left;
            z-index: 99;
            border: 1px solid #ededed;
            border-top-width: 0;
        }
        
        .vertical-menu-list li {
            position: relative;
            width: 100%;
            text-align: left;
            padding: 1px;
            margin: 0px;
        }
        
        .vertical-menu-list li li {
            padding: 0px;
        }
        
        .vertical-menu-list > li a {
            background: #fff none repeat scroll 0 0;
            color: #2c2c2c;
            display: block;
            font-size: 14px;
            font-weight: 400;
            line-height: 28px;
            overflow: hidden;
            overflow-wrap: break-word;
            padding: 3.7px 20px;
            position: relative;
            text-transform: capitalize;
            cursor: pointer
        }
        
        .vertical-menu-list li:hover > a {
            color: #E62E04;
        }
        
        .vertical-menu-list li > a i {
            position: absolute;
            right: 14px;
            top: 12px;
        }
        
        .vertical-menu-list li.has-sub > a {
            padding-left: 60px;
        }
        
        .category-menu ul.category-sub {
            display: none;
        }
        
        .vertical-menu-list li span {
            display: inline-block;
            margin-right: 10px;
            width: 30px;
        }
        
        .vertical-menu > span {
            background: #f2f2f2 none repeat scroll 0 0;
            color: #363636;
            cursor: pointer;
            display: block;
            font-family: "lato", sans-serif;
            font-size: 14px;
            font-weight: 700;
            height: 40px;
            line-height: 40px;
            overflow: hidden;
            padding-left: 45px;
            position: relative;
            text-transform: uppercase;
        }
        
        .vertical-menu > span::after {
            content: "";
            font-family: "Ionicons";
            font-size: 27px;
            font-weight: normal;
            left: 16px;
            position: absolute;
        }
        /* vertical mega menu css start */
        
        .megamenu {
            background: #fff none repeat scroll 0 0;
            border: 1px solid #e5e5e3;
            -webkit-box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.2);
            left: 100%;
            padding: 20px 35px;
            top: 0;
        }
        
        .vertical-menu-list > li ul.first-megamenu {
            width: 700px;
        }
        
        .vertical-menu-list > li ul.megamenu-two {
            width: 440px;
        }
        
        .vertical-menu-list > li ul.megamenu-two li.single-megamenu {
            width: 50%;
        }
        
        .vertical-menu-list .ht-dropdown {
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        
        .vertical-menu-list .ht-dropdown.mega-child {
            left: 100%;
            top: 0;
            flex-direction: column;
            box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            padding: 0px;
            background: none;
            width: 200px;
        }
        
        .vertical-menu-list .ht-dropdown.mega-child li > ul {
            left: 200px;
            top: -10px;
        }
        
        .vertical-menu-list > li .ht-dropdown li a {
            padding: 3px 20px;
        }
        
        .first-megamenu li.single-megamenu > ul {
            padding-bottom: 25px;
        }
        
        li.megamenu-img a {
            padding: 0;
        }
        
        .main-page-banner {
            clear: both;
        }
        
        .first-megamenu li.megamenu-img {
            -ms-flex-preferred-size: 40%;
            flex-basis: 40%;
        }
        
        .first-megamenu li.single-megamenu {
            -ms-flex-preferred-size: 30%;
            flex-basis: 30%;
        }
        
        .single-megamenu ul li a {
            color: #666;
            font-size: 14px;
            font-weight: 400;
            line-height: 30px;
            text-transform: capitalize;
        }
        
        .ht-dropdown .single-megamenu ul li a {
            padding: 0;
        }
        
        .menu-tile {
            color: #2c2c2c;
            display: block;
            font-size: 16px;
            font-weight: 500;
            line-height: 20px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        
        span.pricelistin3 {
            font-size: 10px;
            color: #6b6a6a;
        }
        
        .lisging-c-aro-home .catetgor-tios span.minprice {
            margin: 12px 0 0 0;
            display: inline-block;
        }
        
        .maincarosal .carousel-item img {
            height: 419px;
        }
        
        .lisging-c-aro-home {}
        
        .productsslider h4 {
            text-align: left;
            font-size: 27px;
            font-weight: 600;
            margin-bottom: 12px;
        }
        
        .lisging-c-aro-home li {
            margin-bottom: 12px;
        }
        
        .lisging-c-aro-home li .catetgor-tios {}
        
        .lisging-c-aro-home li .catetgor-tios img {}
        
        .lisging-c-aro-home .catetgor-tios span.minprice {}
        
        .lisging-c-aro-home .catename {
            text-align: center;
            background: #ccc;
            padding: 12px;
            color: #fff;
        }
        
        .cattegorilist {
            background: #ff5e00;
            float: left;
            width: 100%;
            padding: 30px;
            margin: 20px 0;
        }
        
        .lisging-c-aro-home li {
            width: 16%;
            float: left;
            border-radius: 12px !important;
            margin-bottom: 12px;
            margin: 3px;
            overflow: hidden;
            margin-bottom: 12px;
        }
        
        .lisging-c-aro-home li .catetgor-tios {
            background: #fff;
            padding: 15px;
            text-align: center;
        }
        
        .lisging-c-aro-home .catetgor-tios span.minprice {
            font-weight: 600;
        }
        
        .img-cat-sling {
            float: left;
            width: 100%;
            text-align: center;
            height: 150px;
            overflow: hidden;
        }
        
        .lisging-c-aro-home .catename {
            text-align: center;
            background: #ccc;
            padding: 11px;
        }
        
        .lisging-c-aro-home li:nth-child(1) .catename {
            background: #5F8CAF;
        }
        
        .lisging-c-aro-home li:nth-child(2) .catename {
            background: #1C84FB;
        }
        
        .lisging-c-aro-home li:nth-child(3) .catename {
            background: #FFB93A;
        }
        
        .lisging-c-aro-home li:nth-child(4) .catename {
            background: #1995D9;
        }
        
        .lisging-c-aro-home li:nth-child(5) .catename {
            background: #B913F;
        }
        
        .lisging-c-aro-home li:nth-child(6) .catename {
            background: #95CE00;
        }
        
        .lisging-c-aro-home li:nth-child(7) .catename {
            background: #016EFF;
        }
        
        .lisging-c-aro-home li:nth-child(8) .catename {
            background: #F13F7F;
        }
        
        .lisging-c-aro-home li:nth-child(9) .catename {
            background: #00BEDA;
        }
        
        .lisging-c-aro-home li:nth-child(10) .catename {
            background: #C1C704;
        }
        
        .prodcutcarosalnav {}
        
        .prodcutcarosalnav a {height: 24px;
    width: 7px;
    padding: 18px 16px;
    /* box-sizing: border-box; */
    right: 10px;
    left: inherit;
    border-radius: 0px;
    opacity: 1;
    background: #fff;
    top: -42px;
    right: 0;
        }
        
        .prodcutcarosalnav a.carousel-control-prev {
                right: 40px;
        }
        
        .prodcutcarosalnav a i {
        	    font-size: 12px;
            color: #717070;
        }
        
        .productsslider {
            clear: both;
        }
        
        .productsslider .bbe45_3oExY._22339_3gQb9 {
            width: 100%;
            float: left;
            margin-bottom: 14px;
            margin-right: 0;
        }
        
        .productsslider ._59c59_3-MyH {
            height: inherit;
            max-width: 100%;
        }
        
        .productsslider a picture {}
        
        .productsslider ._7e903_3FsI6 {
    flex-grow: initial;
    -ms-flex-negative: inherit;
    height: 155px;
}

 .productsslider .a2cf5_2S5q5{height:inherit;}
 
 /* 8. Support Area CSS
/*----------------------------------------*/
.support-area{clear: both;
    background: #fff;}
.support-area .single-support {
  border-right: 1px solid #ddd;
  flex: 0 0 20%;
  padding: 35px 17px;
}
.support-area .single-support:first-child{
  border-left: 1px solid #ddd;
}
.support-icon i {
    color:#08b484;
    font-size: 60px;
}
.support-desc h6 {
  color: #363636;
  font-family: "Open Sans",sans-serif;
  font-size: 20px;
  font-weight: 400;
  margin: 20px 0 10px;
  text-transform: capitalize;
}
.support-desc span {
  color: #363636;
  font-size: 14px;
  margin: 0;
  text-transform: capitalize;
}

/*----------------------------------------*/
/* 9. Newsletter CSS
/*----------------------------------------*/
.newsletter {
    padding: 35px 0;
}

.news-desc h3 {
  color: #212121;
  font-size: 28px;
  font-weight: 900;
  margin: 0 0 15px;
  line-height: 1;
}
.news-desc p {
    color: #757575;
    font-size: 16px;
    font-weight: 300;
    line-height: 1;
}

.newsletter-box .subscribe {
    background: #fff none repeat scroll 0 0;
    border: 0 none;
    border-radius: 5px;
    color: #777;
    display: block;
    font-size: 13px;
    height: 50px;
    padding: 0 166px 0 20px;
    width: 100%;
    text-transform: capitalize;
}
.newsletter-box {
    position: relative;
	margin: 17px 0;
}

.newsletter-box .submit {
    background: #ff5e00 none repeat scroll 0 0;
    border: 0 none;
    border-radius: 0 5px 5px 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    font-family: "Lato",sans-serif;
    color: #fff;
    font-size: 13px;
    font-weight: 900;
    height: 50px;
    line-height: 50px;
    padding: 0 35px;
    position: absolute;
    right: 0;
    text-transform: uppercase;
    top: 0;
    -webkit-transition: all 300ms ease-in 0s;
    transition: all 300ms ease-in 0s;
    cursor: pointer;
}
.newsletter-box .submit:hover {
    background: #e62e04;
}

/*----------------------------------------*/
/* 10. Footer CSS
/*----------------------------------------*/

/* footer top css */
.footer-top {
    padding-bottom: 20px;
}

.footer-title {
    color: #212121;
    font-size: 18px;
    font-weight: 600;
    line-height: 34px;
    margin: 0 0 15px;
    position: relative;
    text-transform: capitalize;
}

.footer-list li a {
  color: #212121;
  display: block;
  font-size: 14px;
  font-weight: 400;
  position: relative;
  text-transform: capitalize;
}

.footer-list li {
    line-height: 31px;
}

.footer-list li a:hover {
    color: #E62E04;
}

.footer-list li a:hover:before {
    opacity: 0;
}

.logo-footer {
    margin-bottom: 30px;
}

.footer-content p {
    font-size: 13px;
    line-height: 23px;
}

.footer-content h5 {
    color: #333;
    font-size: 16px;
    font-weight: 500;
    margin-top: 15px;
}

.social-footer-list a {
    color: #b2b2b1;
    display: inline-block;
    font-size: 22px;
    line-height: 30px;
}

.social-footer-list a:not(:last-child) {
    margin-right: 30px;
}

.social-footer-list a:hover {
    color: #E62E04;
}

.single-footer.style-change {
    padding-left: 40px;
}

/* footer middle css */
.social-footer > li {
  display: inline-block;
}

.social-footer li a {
  padding: 0 13px;
  text-align: center;
}
ul.social-footer {
    margin: 10px 0 20px;
    vertical-align: middle;
}

.social-footer li a i {
  color: #ff5e00;
  font-size: 28px;
  line-height: 1;
  vertical-align: middle;
  transition: all 0.3s ease-in-out;
}
.social-footer li a:hover i{
  color: #E62E04;
}
/* footer bottom css */
.footer-bottom-content p {
    color: #666;
    font-size: 14px;
}

.footer-bottom-content p a {
    color: #E62E04;
}

.footer-bottom-content p a:hover,
.tag-content a:hover {
    text-decoration: underline;
}

.footer-nav-list li {
    display: inline-block;
}

.footer-nav-list li a {
    color: #666;
    display: block;
    font-size: 14px;
    line-height: 1;
    margin: 0;
    padding-left: 30px;
    text-transform: uppercase;
}

.footer-nav-list li a:hover,
.tag-content a:hover {
    color: #E62E04;
}

.footer-nav-list li:first-child a {
    padding-left: 0;
}

#scrollUp {
    background: #333 none repeat scroll 0 0;
    bottom: 65px;
    color: #fff;
    cursor: pointer;
    font-weight: 600;
    height: 40px;
    position: fixed;
    right: 30px;
    text-align: center;
    text-transform: uppercase;
    width: 40px;
    z-index: 999;
}

#scrollUp:hover {
    background: #E62E04;
}

#scrollUp i {
    font-size: 25px;
    line-height: 40px;
}
.footer-list li {
  text-transform: capitalize;
  transition: all 0.5s ease-in-out 0s;
}
.address-content li {
  color: #212121;
  display: block;
  font-size: 14px;
  line-height: 28px;
  margin-bottom: 5px;
  padding-left: 30px;
  position: relative;
}
.address-content li i {
  display: inline-block;
  font-size: 18px;
  left: 0;
  position: absolute;
  top: 3px;
}
.copyright-text a {
  color: #212121;
}
.copyright-text.text-center > p {
  color: #212121;
  font-size: 14px;
}

.sellproduct1{}
.sellproduct1{}
.sellproduct1 i{       vertical-align: sub;
    margin-right: 7px;
    font-size: 24px;}
.sellproduct1 {
    background: #ff5e00;
    padding:8px 12px;
    border-radius: 3px;
    color: #fff !important;
}

    </style>
	<script>

function showUser(str)
{
	
	 var j=document.getElementById("catname").value;
	 
if (str=="0")
  {
  document.getElementById("txtHint").innerHTML="";
  
  return;
  }else { 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
	
    }
  }
 
  
xmlhttp.open("GET","marketplace-home-search.php?q="+str+"&catid="+j,true);
xmlhttp.send();
}
}
</script>

    <div class="newsearch11">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="categorie-search-box">
                       <form class="searchform" action="search1.php">
                            <div class="form-group">
                                <select class="bootstrap-select" name="catname" id="catname">
                                 
								<option value="all">All categories</option>
									<?php $db1=new DB();
								 $sql1="SELECT * FROM $_TBL_CAT where status='yes'";
								 $db1->query($sql1)or die($db1->error());
								 while($row1=$db1->fetchArray()){
								 $catid=$row1['id'];
								?>
								 <option value="<?=$catid?>"><?php echo $row1['catname'];?></option>
								 <?php } ?>
                                    <!--<option value="2">Arrivals</option>
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
                                    <option value="27">phones</option>-->
                                </select>
                            </div>
                            <!--<input type="text" name="search" placeholder="I’m shopping for...">-->
							 <input type="text" name="search" class="search" id="searchid" onkeypress="return showUser(this.value);" placeholder="Is it me you're looking for?" required />
							 
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    <ul  id="txtHint"></ul>
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
							<?php $db1=new DB(); $db2=new DB();
								 $sql1="SELECT * FROM $_TBL_CAT where status='yes'";
								 $db1->query($sql1)or die($db1->error());
								 ?>
								<?php while($row1=$db1->fetchArray()){
								
								$catid=$row1['id'];
								?>
                                <li class=""><a href="marketplace.php?cid=<?=$row1['id']?>"><span><img src="category/<?=$row1['imgid']?>" ></span><?php echo $row1['catname'];?><i class="fa fa-angle-right" aria-hidden="true"></i></a>

                                    <ul class="ht-dropdown mega-child">
									<?php  $sql2="SELECT * FROM subcategory where sub_status='1' and catid=".$row1['id'];
								 $db2->query($sql2)or die($db2->error());
								 ?>
								<?php while($row2=$db2->fetchArray()){	?>
                                    <li><a href="marketplace.php?cid=<?=$row1['id']?>&sid=<?php echo $row2['id'];?>"><?php echo $row2['subcatname'];?> </a></li>
								<?php } ?>  
                                    </ul>
                                
                                </li>
								<?php }?>
								
								
                              
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
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>First slide label</h5>
                                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide label</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/la.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide label</h5>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
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

    <div class="cattegorilist">
        <div class="container">
            <div class="lisging-c-aro-home">
                <ul>
                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
                        </div>
                    </li>

                    <li>
                        <div class="catetgor-tios">
                            <div class="img-cat-sling"><img src="img/categoary1.jpg" alt="ca" /></div>
                            <span class="minprice"><span class="pricelistin3">Price Starting </span>- ₦ 20000</span>
                        </div>
                        <div class="catename">
                            <h4>Consumer Electronics</h4>
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



    <div class="container clear">
        <div class="col-md-12">
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