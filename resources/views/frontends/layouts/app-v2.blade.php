<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content='@yield('_keyword', 'nong san moc chau, dac san moc chau, dac san tay bac, man hau moc chau')'/>
    <meta name='description' content='@yield('_description', 'Nông sản sạch, chất lượng từ Mộc Châu')'/>
    <title>@yield('_title', 'Nông sản Mộc Châu | Nông sản sạch Mộc Châu')</title>

    <link rel='stylesheet' href='{{ asset('/vendor/organici/css/bootstrap.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('/vendor/organici/css/owl.carousel.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ asset('/vendor/organici/css/owl.theme.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ asset('/vendor/organici/css/font-awesome.min.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic,400italic,700italic,900italic' type='text/css' media='all'/>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Pacifico:100,300,400,700,900,300italic,400italic,700italic,900italic' type='text/css' media='all'/>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Anonymous+Pro:' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ asset('/vendor/organici/css/style.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ asset('/vendor/organici/css/custom.css?v=2') }}' type='text/css' media='all'/>
    <link rel="stylesheet" href='{{ asset('/vendor/organici/css/magnific-popup.css') }}' type='text/css' media='all' />
    <link rel="stylesheet" href='{{ asset('/vendor/organici/css/style-selector.css') }}' type='text/css' media='all' />
    <link id="style-main-color" rel="stylesheet" href="{{ asset('/vendor/organici/css/colors/default.css') }}">
    <link id="style-main-color" rel="stylesheet" href="{{ asset('/css/frontend.css?v=4') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="noo-spinner">
    <div class="spinner">
        <div class="cube1"></div>
        <div class="cube2"></div>
    </div>
</div>
<div class="site">
    <header class="noo-header header-4">
        <div class="noo-topbar">
            <div class="container">
                <ul>
                    <li>
                        <span><i class="fa fa-phone"></i></span>
                        <a href="tel:0981914596">0981914596</a>
                    </li>
                    <li>
                        <span><i class="fa fa-envelope"></i></span>
                        <a href="mailto:phamphuongict@gmail.com">phamphuongict@gmail.com</a>
                    </li>
                </ul>
                <ul>
                    @guest
                        <li>
                            <span><i class="fa fa-sign-in"></i></span>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <span><i class="fa fa-user-plus"></i></span>
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <span><i class="fa fa-user"></i></span>
                            <a href="#">My Account</a>
                        </li>
                        <li>
                            <span><i class="fa fa-sign-out"></i></span>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    <li>
                        <span><i class="fa fa-heart-o"></i></span>
                        <a href="wishlist.html">Wishlist</a>
                    </li>
                    <li>
                        <a href="cart.html">
									<span class="has-cart">
										<i class="fa fa-shopping-cart"></i>
										<em>0</em>
									</span>
                        </a>
                        &nbsp; &#8209; &nbsp; <span class="amount">&#36;0.00</span>
                    </li>
                    <li>
                        <a href="#" class="fa fa-search noo-search" id="noo-search"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar navbar-default">
                <div class="container">
                    <div class="menu-position">
                        <div class="navbar-header pull-left">
                            <div class="noo_menu_canvas">
                                <div class="btn-search noo-search topbar-has-search">
                                    <i class="fa fa-search"></i>
                                </div>
                                <div data-target=".nav-collapse" class="btn-navbar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <a href="./" class="navbar-brand">
                                <img class="noo-logo-img noo-logo-normal" src="{{ asset('/vendor/organici/images/logo.png') }}" alt="" style="max-width: 180px;">
                            </a>
                        </div>
                        <nav class="pull-right noo-main-menu">
                            <ul class="nav-collapse navbar-nav">
                                <li class="menu-item-has-children current-menu-item">
                                    <a href="./">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index-2.html">Homepage 2</a></li>
                                        <li><a href="index-3.html">Homepage 3</a></li>
                                        <li><a href="index-4.html">Homepage 4</a></li>
                                        <li><a href="index-5.html">Homepage 5</a></li>
                                        <li><a href="index-6.html">Homepage 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Header</a>
                                    <ul class="sub-menu">
                                        <li><a href="header-1.html">Header 1</a></li>
                                        <li><a href="header-2.html">Header 2</a></li>
                                        <li><a href="header-3.html">Header 3</a></li>
                                        <li><a href="header-4.html">Header 4</a></li>
                                        <li><a href="header-5.html">Header 5</a></li>
                                        <li><a href="header-6.html">Header 6</a></li>
                                    </ul>
                                </li>
                                <li><a href="our-story.html">Our Story</a></li>
                                <li class="menu-item-has-children noo_megamenu mega-col-columns-4">
                                    <a href="shop.html">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop page</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop-list.html">Shop List</a></li>
                                                <li><a href="shop-detail.html">Shop Detail</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="cart-empty.html">Empty Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <div class="noo_megamenu_widget_area">
                                                <div class="widget commerce widget_products">
                                                    <h3 class="widget-title">Products</h3>
                                                    <ul class="product_list_widget">
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_1.png') }}" alt="" />
                                                                <span class="product-title">French Bread</span>
                                                            </a>
                                                            <span class="amount">&#36;10.00</span>
                                                        </li>
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_2.png') }}" alt="" />
                                                                <span class="product-title">Cookie</span>
                                                            </a>
                                                            <span class="amount">&#36;15.00</span>
                                                        </li>
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_3.png') }}" alt="" />
                                                                <span class="product-title">Brown Bread</span>
                                                            </a>
                                                            <span class="amount">&#36;12.00</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="noo_megamenu_widget_area">
                                                <div class="widget commerce widget_products">
                                                    <h3 class="widget-title">Featured</h3>
                                                    <ul class="product_list_widget">
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_4.jpg') }}" alt="" />
                                                                <span class="product-title">French Bread</span>
                                                            </a>
                                                            <span class="amount">&#36;10.00</span>
                                                        </li>
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_2.png') }}" alt="" />
                                                                <span class="product-title">Cookie</span>
                                                            </a>
                                                            <span class="amount">&#36;15.00</span>
                                                        </li>
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_5.jpg') }}" alt="" />
                                                                <span class="product-title">Brown Bread</span>
                                                            </a>
                                                            <span class="amount">&#36;12.00</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="noo_megamenu_widget_area">
                                                <div class="widget commerce widget_products">
                                                    <h3 class="widget-title">Sales</h3>
                                                    <ul class="product_list_widget">
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_1.png') }}" alt="" />
                                                                <span class="product-title">French Bread</span>
                                                            </a>
                                                            <span class="amount">&#36;10.00</span>
                                                        </li>
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_2.png') }}" alt="" />
                                                                <span class="product-title">Cookie</span>
                                                            </a>
                                                            <span class="amount">&#36;15.00</span>
                                                        </li>
                                                        <li>
                                                            <a href="shop-detail.html">
                                                                <img width="100" height="100" src="{{ asset('/vendor/organici/images/product/thumb/product_3.png') }}" alt="" />
                                                                <span class="product-title">Brown Bread</span>
                                                            </a>
                                                            <span class="amount">&#36;12.00</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="boxes.html">Boxes</a>
                                    <ul class="sub-menu">
                                        <li><a href="box-detail.html">Box Detail</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="blog-masonry.html">Blog Masonry</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-masonry-two-columns.html">2 Columns</a></li>
                                                <li><a href="blog-masonry.html">3 Columns</a></li>
                                                <li><a href="blog-masonry-four-columns.html">4 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog Listing</a></li>
                                        <li><a href="blog-detail.html">Blog Single Default</a></li>
                                        <li><a href="blog-detail-video.html">Blog Single Video</a></li>
                                        <li><a href="blog-detail-audio.html">Blog Single SoundCloud</a></li>
                                        <li><a href="blog-detail-slider.html">Blog Single Slider</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-header5">
            <div class="remove-form"></div>
            <div class="container">
                <form class="form-horizontal">
                    <label class="note-search">Type and Press Enter to Search</label>
                    <input type="search" name="s" class="form-control" value="" placeholder="Search...">
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </header>
{{--    <section class="noo-page-heading eff heading-4">--}}
{{--        <div class="container">--}}
{{--            <div class="noo-heading-content">--}}
{{--                <h1 class="page-title eff">Nông Sản Mộc Châu</h1>--}}
{{--                <div class="noo-page-breadcrumb eff">--}}
{{--                    <span>Nông sản sạch tây bắc</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <div class="main">
        @yield('content')
        <div class="newsletter">
            <div class="noo-sh-mailchimp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <h3 class="noo-mail-title">Subscribe to us!</h3>
                            <p class="noo-mail-desc">
                                Enter Your email address for our mailing list to keep yourself update.
                            </p>
                        </div>
                        <div class="col-md-7 col-xs-12">
                            <form>
                                <div class="newsletter-form-fields">
                                    <input type="email" name="EMAIL" placeholder="Email address" required />
                                    <input type="submit" value="submit"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="wrap-footer footer-2 colophon wigetized">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 item-footer-four">
                    <div class="widget widget_about">
                        <div class="noo_about_widget">
                            <a href="#">
                                <img src="{{ asset('/vendor/organici/images/logo.png') }}" alt="" />
                            </a>
                            <p>
                                Maecenas tristique gravida, odio et sagi ttis justo. Suspendisse ultricies nisi veafn. onec dictum non nulla ut lobortis tellus.
                            </p>
                        </div>
                    </div>
                    <div class="widget widget_noo_social">
                        <div class="noo_social">
                            <div class="social-all">
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-google-plus"></a>
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-youtube"></a>
                                <a href="#" class="fa fa-skype"></a>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget_text">
                        <div class="textwidget">
                            <div class="copyright">
                                2015 Oganici.<br/>
                                Designed with <i class="fa fa-heart-o"></i> by TK-Themes.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item-footer-four">
                    <div class="widget widget_text">
                        <h4 class="widget-title">Contact</h4>
                        <div class="textwidget">
                            <h5>Address</h5>
                            <p>No 13, Sky Tower Street, New York, USA</p>
                            <h5>Hotline</h5>
                            <p>
                                <a href="#">(+844) 123 456 78</a><br/>
                                <a href="#">(+844) 888 97989</a>
                            </p>
                            <h5>Email</h5>
                            <p>
                                <a href="mailto:contact@organicistore.com">
                                    contact@organicistore.com
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item-footer-four">
                    <div class="widget widget_flickr">
                        <h4 class="widget-title">Photo in flickr</h4>
                        <div class='flickr-badge-wrapper'></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item-footer-four">
                    <div class="widget widget_noo_openhours">
                        <h4 class="widget-title">Working time</h4>
                        <ul class="noo-openhours">
                            <li>
                                <span>Monday to Friday: </span>
                                <span>08:00am - 08:00pm </span>
                            </li>
                            <li>
                                <span>Saturday &amp; Sunday: </span>
                                <span>10:00am - 06:00pm </span>
                            </li>
                        </ul>
                    </div>
                    <div class="widget widget_noo_happyhours">
                        <h4 class="widget-title">Happy Hours</h4>
                        <ul class="noo-happyhours">
                            <li>
                                <div>Enjoy discount baked goods. </div>
                                <div>06:00 am - 08:00 pm daily </div>
                            </li>
                        </ul>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="go-to-top hidden-print"><i class="fa fa-angle-up"></i></a>

<script type='text/javascript' src='{{ asset('/vendor/organici/js/jquery.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/bootstrap.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/jquery-migrate.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/modernizr-2.7.1.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/off-cavnass.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/jquery.cookie.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/style.selector.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/script.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/custom.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/imagesloaded.pkgd.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/isotope.pkgd.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/portfolio.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/jquery.touchSwipe.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/jquery.isotope.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/owl.carousel.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/jflickrfeed.min.js?v=2') }}'></script>
<script type='text/javascript' src='{{ asset('/vendor/organici/js/jquery.magnific-popup.js') }}'></script>
<script type='text/javascript' src='{{ asset('/js/main.js') }}'></script>
</body>
</html>
