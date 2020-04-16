<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content='@yield('_keyword', 'nong san moc chau, dac san moc chau, dac san tay bac, man hau moc chau')'/>
    <meta name='description' content='@yield('_description', 'Nông sản sạch, chất lượng từ Mộc Châu')'/>
    <title>@yield('_title', 'Nông sản Mộc Châu | Nông sản sạch Mộc Châu')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/vendor/greenfarm/assets/images/favicon.ico') }}">

    <!-- CSS
    ============================================ -->
    <!-- Bootstrap CSS -->
    <link href="{{ asset('/vendor/greenfarm/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="{{ asset('/vendor/greenfarm/assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Elegent CSS -->
    <link href="{{ asset('/vendor/greenfarm/assets/css/elegent.min.css') }}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('/vendor/greenfarm/assets/css/plugins.css') }}" rel="stylesheet">

    <!-- Helper CSS -->
    <link href="{{ asset('/vendor/greenfarm/assets/css/helper.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('/vendor/greenfarm/assets/css/main.css') }}" rel="stylesheet">
    <link id="style-main-color" rel="stylesheet" href="{{ asset('/css/frontend.css?v=4') }}">
    <!-- Modernizer JS -->
    <script src="{{ asset('/vendor/greenfarm/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

</head>

<body>

<!--=============================================
=            Header         =
=============================================-->

<header>
    <!--=======  header top  =======-->

    <div class="header-top pt-10 pb-10 pt-lg-10 pb-lg-10 pt-md-10 pb-md-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center text-sm-left">
                    <!-- currncy language dropdown -->
                    <div class="lang-currency-dropdown">
                        <ul>
                            <li> <a href="#">English <i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Japanease</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dollar <i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Euro</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- end of currncy language dropdown -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  text-center text-sm-right">
                    <!-- header top menu -->
                    <div class="header-top-menu">
                        <ul>
                            <li><a href="my-account.html">My account</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </div>
                    <!-- end of header top menu -->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of header top  =======-->

    <!--=======  header bottom  =======-->

    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 text-lg-left text-md-center text-sm-center">
                    <!-- logo -->
                    <div class="logo mt-15 mb-15">
                        <a href="index.html">
                            <img src="{{ asset('/vendor/greenfarm/assets/images/logo.png') }}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <!-- end of logo -->
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="menubar-top d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap flex-lg-nowrap mt-sm-15">
                        <!-- header phone number -->
                        <div class="header-contact d-flex">
                            <div class="phone-icon">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/icon-phone.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="phone-number">
                                Phone: <span class="number">1-888-123-456-89</span>
                            </div>
                        </div>
                        <!-- end of header phone number -->
                        <!-- search bar -->
                        <div class="header-advance-search">
                            <form action="#">
                                <input type="text" placeholder="Search your product">
                                <button><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <!-- end of search bar -->
                        <!-- shopping cart -->
                        <div class="shopping-cart" id="shopping-cart">
                            <a href="cart.html">
                                <div class="cart-icon d-inline-block">
                                    <span class="icon_bag_alt"></span>
                                </div>
                                <div class="cart-info d-inline-block">
                                    <p>Shopping Cart
                                        <span>
													0 items - $0.00
												</span>
                                    </p>
                                </div>
                            </a>
                            <!-- end of shopping cart -->

                            <!-- cart floating box -->
                            <div class="cart-floating-box" id="cart-floating-box">
                                <div class="cart-items">
                                    <div class="cart-float-single-item d-flex">
                                        <span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
                                        <div class="cart-float-single-item-image">
                                            <a href="single-product.html"><img src="{{ asset('/vendor/greenfarm/assets/images/products/product01.jpg') }}" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-float-single-item-desc">
                                            <p class="product-title"> <a href="single-product.html">Duis pulvinar obortis eleifend </a></p>
                                            <p class="price"><span class="count">1x</span> $20.50</p>
                                        </div>
                                    </div>
                                    <div class="cart-float-single-item d-flex">
                                        <span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
                                        <div class="cart-float-single-item-image">
                                            <a href="single-product.html"><img src="{{ asset('/vendor/greenfarm/assets/images/products/product02.jpg') }}" class="img-fluid" alt=""></a>
                                        </div>
                                        <div class="cart-float-single-item-desc">
                                            <p class="product-title"> <a href="single-product.html">Fusce ultricies dolor vitae</a></p>
                                            <p class="price"><span class="count">1x</span> $20.50</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-calculation">
                                    <div class="calculation-details">
                                        <p class="total">Subtotal <span>$22</span></p>
                                    </div>
                                    <div class="floating-cart-btn text-center">
                                        <a href="checkout.html">Checkout</a>
                                        <a href="cart.html">View Cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end of cart floating box -->
                        </div>
                    </div>

                    <!-- navigation section -->
                    <div class="main-menu">
                        <nav>
                            <ul>
                                {!! $buildTreeMenu !!}
                            </ul>
                        </nav>
                    </div>
                    <!-- end of navigation section -->
                </div>
                <div class="col-12">
                    <!-- Mobile Menu -->
                    <div class="mobile-menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of header bottom  =======-->
</header>
<!--=============================================
=            breadcrumb area         =
=============================================-->
@if(!isset($disabled_breadcrumb))
<div class="breadcrumb-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Login - Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--=====  End of breadcrumb area  ======-->
<!--=====  End of Header  ======-->
@yield('content')
<!--=============================================
=            Footer         =
=============================================-->

<footer>
    <!--=======  newsletter section  =======-->

    <div class="newsletter-section pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 mb-sm-20 mb-xs-20">
                    <!--=======  newsletter title =======-->

                    <div class="newsletter-title">
                        <h1>
                            <img src="{{ asset('/vendor/greenfarm/assets/images/icon-newsletter.png') }}" alt="">
                            Send Newsletter
                        </h1>
                    </div>

                    <!--=======  End of newsletter title  =======-->
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <!--=======  subscription-form wrapper  =======-->

                    <div class="subscription-form-wrapper d-flex flex-wrap flex-sm-nowrap">
                        <p class="mb-xs-20">Sign up for our newsletter to get up-to-date from us</p>
                        <div class="subscription-form">
                            <form  id="mc-form" class="mc-form subscribe-form">
                                <input type="email" id="mc-email" autocomplete="off" placeholder="Your email address">
                                <button id="mc-submit" type="submit"> subscribe!</button>
                            </form>

                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>

                    <!--=======  End of subscription-form wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of newsletter section  =======-->

    <!--=======  social contact section  =======-->

    <div class="social-contact-section pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 order-2 order-md-2 order-sm-2 order-lg-1">
                    <!--=======  social media links  =======-->

                    <div class="social-media-section">
                        <h2>Follow us</h2>
                        <div class="social-links">
                            <a class="facebook" href="http://www.facebook.com" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="http://www.twitter.com" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
                            <a class="instagram" href="http://www.instagram.com" data-tooltip="Instagram"><i class="fa fa-instagram"></i></a>
                            <a class="linkedin" href="http://www.linkedin.com" data-tooltip="Linkedin"><i class="fa fa-linkedin"></i></a>
                            <a class="rss" href="http://www.rss.com" data-tooltip="RSS"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>

                    <!--=======  End of social media links  =======-->

                </div>
                <div class="col-lg-8 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">
                    <!--=======  contact summery  =======-->

                    <div class="contact-summery">
                        <h2>Contact us</h2>

                        <!--=======  contact segments  =======-->

                        <div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap">
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_pin_alt"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Address: <span>123 New Design Str, Melbourne, Australia</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_mobile"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Phone: <span>1-888-123-456-89</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                            <!--=======  single contact  =======-->

                            <div class="single-contact d-flex">
                                <div class="icon">
                                    <span class="icon_mail_alt"></span>
                                </div>
                                <div class="contact-info">
                                    <p>Email: <span>support@hastech.company</span></p>
                                </div>
                            </div>

                            <!--=======  End of single contact  =======-->
                        </div>

                        <!--=======  End of contact segments  =======-->



                    </div>

                    <!--=======  End of contact summery  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of social contact section  =======-->

    <!--=======  footer navigation  =======-->

    <div class="footer-navigation-section pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">INFORMATION</h3>
                        <ul>
                            <li> <a href="about-us.html">About Us</a></li>
                            <li> <a href="#">Delivery Information</a></li>
                            <li> <a href="#">Privacy Policy</a></li>
                            <li> <a href="#">Terms & Condition</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">MY ACCOUNT</h3>
                        <ul>
                            <li> <a href="my-account.html">My Account</a></li>
                            <li> <a href="wishlist.html">Wishlist</a></li>
                            <li> <a href="cart.html">Shopping Cart</a></li>
                            <li> <a href="#">Newsletter</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">CUSTOMER SERVICE</h3>
                        <ul>
                            <li> <a href="contact.html">Contact</a></li>
                            <li> <a href="#">OUR SERVICE</a></li>
                            <li> <a href="#">RETURNS</a></li>
                            <li> <a href="#">SITE MAP</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <!--=======  single navigation section  =======-->

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title">Extras</h3>
                        <ul>
                            <li> <a href="contact.html">BRANDS</a></li>
                            <li> <a href="#">GIFT VOUCHERS</a></li>
                            <li> <a href="#">AFFILIATES</a></li>
                            <li> <a href="#">SPECIALS</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single navigation section  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of footer navigation  =======-->


    <!--=======  copyright section  =======-->

    <div class="copyright-section pt-35 pb-35">
        <div class="container">
            <div class="row align-items-md-center align-items-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">
                    <!--=======  copyright text	  =======-->

                    <div class="copyright-segment">
                        <p>
                            <a href="#">Privacy Policy</a>
                            <span class="separator">|</span>
                            <a href="#">Term and conditions</a>
                        </p>
                        <p class="copyright-text">&copy; 2019 <a href="/">Greenfarm</a>. All Rights Reserved</p>
                    </div>

                    <!--=======  End of copyright text	  =======-->

                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <!--=======  payment info  =======-->

                    <div class="payment-info text-center text-md-right">
                        <p>Allow payment base on <img src="{{ asset('/vendor/greenfarm/assets/images/payment-icon.png') }}" class="img-fluid" alt=""></p>
                    </div>

                    <!--=======  End of payment info  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of copyright section  =======-->
</footer>

<!--=====  End of Footer  ======-->


<!--=============================================
=            Quick view modal         =
=============================================-->

<div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-xs-12">
                        <!-- product quickview image gallery -->
                        <div class="product-image-slider">
                            <!--Modal Tab Content Start-->
                            <div class="tab-content product-large-image-list" id="myTabContent">
                                <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="{{ asset('/vendor/greenfarm/assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                                <div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="{{ asset('/vendor/greenfarm/assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                                <div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="{{ asset('/vendor/greenfarm/assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                                <div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
                                    <!--Single Product Image Start-->
                                    <div class="single-product-img img-full">
                                        <img src="{{ asset('/vendor/greenfarm/assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Single Product Image End-->
                                </div>
                            </div>
                            <!--Modal Content End-->
                            <!--Modal Tab Menu Start-->
                            <div class="product-small-image-list">
                                <div class="nav small-image-slider" role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="{{ asset('/vendor/greenfarm/assets/images/products/product01.jpg') }}"
                                                                                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="{{ asset('/vendor/greenfarm/assets/images/products/product02.jpg') }}"
                                                                                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="{{ asset('/vendor/greenfarm/assets/images/products/product03.jpg') }}"
                                                                                                                class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="{{ asset('/vendor/greenfarm/assets/images/products/product04.jpg') }}"
                                                                                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!--Modal Tab Menu End-->
                        </div>
                        <!-- end of product quickview image gallery -->
                    </div>
                    <div class="col-lg-7 col-md-6 col-xs-12">
                        <!-- product quick view description -->
                        <div class="product-feature-details">
                            <h2 class="product-title mb-15">Kaoreet lobortis sagittis laoreet</h2>

                            <h2 class="product-price mb-15">
                                <span class="main-price">$12.90</span>
                                <span class="discounted-price"> $10.00</span>
                            </h2>

                            <p class="product-description mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>


                            <div class="cart-buttons mb-20">
                                <div class="pro-qty mr-10">
                                    <input type="text" value="1">
                                </div>
                                <div class="add-to-cart-btn">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>


                            <div class="social-share-buttons">
                                <h3>share this product</h3>
                                <ul>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of product quick view description -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--=====  End of Quick view modal  ======-->

<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->

<!-- JS
============================================ -->
<!-- jQuery JS -->
<script src="{{ asset('/vendor/greenfarm/assets/js/vendor/jquery.min.js') }}"></script>

<!-- Popper JS -->
<script src="{{ asset('/vendor/greenfarm/assets/js/popper.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('/vendor/greenfarm/assets/js/bootstrap.min.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('/vendor/greenfarm/assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('/vendor/greenfarm/assets/js/main.js') }}"></script>
<script type='text/javascript' src='{{ asset('/js/main.js') }}'></script>
</body>

</html>
