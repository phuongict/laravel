@extends('frontends.layouts.app')
@section('_title', $_title)
@section('content')
<!--=============================================
=            Hero slider with category         =
=============================================-->

<div class="hero-slider-with-category-container mt-35 mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--=======  slider left category  =======-->

                <div class="hero-side-category">
                    <!-- Category Toggle Wrap -->
                    <div class="category-toggle-wrap">
                        <!-- Category Toggle -->
                        <button class="category-toggle"> <span class="arrow_carrot-right_alt2 mr-2"></span> All Categories</button>
                    </div>

                    <!-- Category Menu -->
                    <nav class="category-menu">
                        <ul>
                            @foreach($categories as $index => $category)
                                @if($index < 8)
                                    <li><a href="#">{{ $category->name }}</a></li>
                                @else
                                    <li class="hidden"><a href="#">{{ $category->name }}</a></li>
                                    <li><a href="#" id="more-btn"><span class="icon_plus_alt2"></span> More Categories</a></li>
                                @endif
                            @endforeach
{{--                            <li class="menu-item-has-children"><a href="shop-left-sidebar.html">Salad</a>--}}

{{--                                <!-- Mega Category Menu Start -->--}}
{{--                                <ul class="category-mega-menu">--}}
{{--                                    <li class="menu-item-has-children">--}}
{{--                                        <a class="megamenu-head" href="shop-left-sidebar.html">Vegetables</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Salad</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fruits</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Peanuts</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item-has-children">--}}
{{--                                        <a class="megamenu-head" href="shop-left-sidebar.html">Fast Foods</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Vegetables</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fruit</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Butter</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item-has-children">--}}
{{--                                        <a class="megamenu-head" href="shop-left-sidebar.html">Salad</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Vegetables</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Salad</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Peanuts</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul><!-- Mega Category Menu End -->--}}

{{--                            </li>--}}
{{--                            <li class="menu-item-has-children"><a href="shop-left-sidebar.html">Fast Foods</a>--}}

{{--                                <!-- Mega Category Menu Start -->--}}
{{--                                <ul class="category-mega-menu">--}}
{{--                                    <li class="menu-item-has-children">--}}
{{--                                        <a class="megamenu-head" href="shop-left-sidebar.html">Vegetables</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Salad</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fruits</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Peanuts</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item-has-children">--}}
{{--                                        <a class="megamenu-head" href="shop-left-sidebar.html">Fast Foods</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Vegetables</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fruit</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Butter</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item-has-children">--}}
{{--                                        <a class="megamenu-head" href="shop-left-sidebar.html">Salad</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Vegetables</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Fast Food</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Salad</a></li>--}}
{{--                                            <li><a href="shop-left-sidebar.html">Peanuts</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul><!-- Mega Category Menu End -->--}}

{{--                            </li>--}}
{{--                            <li><a href="shop-left-sidebar.html">Beans</a></li>--}}
{{--                            <li><a href="shop-left-sidebar.html">Bread</a></li>--}}
{{--                            <li><a href="shop-left-sidebar.html">Fish &amp; Meats</a></li>--}}
{{--                            <li><a href="shop-left-sidebar.html">Peanuts</a></li>--}}
{{--                            <li><a href="shop-left-sidebar.html">Birds</a></li>--}}
{{--                            <li class="hidden"><a href="shop-left-sidebar.html">Eggs</a></li>--}}
{{--                            <li class="hidden"><a href="shop-left-sidebar.html">Fruits</a></li>--}}
{{--                            <li><a href="#" id="more-btn"><span class="icon_plus_alt2"></span> More Categories</a></li>--}}
                        </ul>
                    </nav>
                </div>

                <!--=======  End of slider left category  =======-->
            </div>

            <div class="col-lg-9 col-md-12">
                <!--=======  slider container  =======-->

                <div class="slider-container">
                    <!--=======  Slider area  =======-->

                    <div class="hero-slider-two">
                        <!--=======  hero slider item  =======-->
                        @foreach($sliders as $slider)
                            <div class="hero-slider-item">
                                    <a href="{{ $slider->link }}">
                                        <img class="img-fluid" src="{{ Storage::url($slider->image) }}" alt="" />
                                    </a>
                            </div>
                        @endforeach
{{--                        <div class="hero-slider-item slider-bg-3">--}}
{{--                            <div class="slider-content">--}}
{{--                                <h1>Fresh fruit & <span>vegetable supplied</span></h1>--}}
{{--                                <h1 class="change-text">Up to <span>50% off</span></h1>--}}

{{--                                <p><img src="{{ asset('/vendor/greenfarm/assets/images/icon-slider.png') }}" alt=""> <span>save up to 10%</span></p>--}}
{{--                                <p><img src="{{ asset('/vendor/greenfarm/assets/images/icon-slider.png') }}" alt=""> <span>free shipping</span></p>--}}
{{--                                <p><img src="{{ asset('/vendor/greenfarm/assets/images/icon-slider.png') }}" alt=""> <span>return in 24 hours</span></p>--}}

{{--                                <a href="shop-left-sidebar.html" class="slider-two-btn mt-20">start at $9</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <!--=======  End of hero slider item  =======-->


                        <!--=======  Hero slider item  =======-->

{{--                        <div class="hero-slider-item slider-bg-4">--}}
{{--                            <div class="slider-content">--}}
{{--                                <h1>Organic<span>vegetables</span></h1>--}}
{{--                                <h1 class="change-text">Up to <span>50% off</span></h1>--}}

{{--                                <p><img src="{{ asset('/vendor/greenfarm/assets/images/icon-slider.png') }}" alt=""> <span>save up to 10%</span></p>--}}
{{--                                <p><img src="{{ asset('/vendor/greenfarm/assets/images/icon-slider.png') }}" alt=""> <span>free shipping</span></p>--}}
{{--                                <p><img src="{{ asset('/vendor/greenfarm/assets/images/icon-slider.png') }}" alt=""> <span>return in 24 hours</span></p>--}}

{{--                                <a href="shop-left-sidebar.html" class="slider-two-btn mt-20">start at $9</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <!--=======  End of Hero slider item  =======-->

                    </div>

                    <!--=======  End of Slider area  =======-->
                </div>

                <!--=======  End of slider container  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of Hero slider with category   ======-->



<!--=============================================
=            Policy area         =
=============================================-->

<div class="policy-section mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="policy-titles d-flex align-items-center flex-wrap">
                    <!--=======  single policy  =======-->

                    <div class="single-policy">
                        <span><img src="{{ asset('/vendor/greenfarm/assets/images/policy-icon1.png') }}" class="img-fluid" alt=""></span>
                        <p> FREE SHIPPING ON ORDERS OVER $200</p>
                    </div>

                    <!--=======  End of single policy  =======-->


                    <!--=======  single policy  =======-->

                    <div class="single-policy">
                        <span><img src="{{ asset('/vendor/greenfarm/assets/images/policy-icon2.png') }}" class="img-fluid" alt=""></span>
                        <p>30 -DAY RETURNS MONEY BACK</p>
                    </div>

                    <!--=======  End of single policy  =======-->

                    <!--=============================================
                    =            single policy         =
                    =============================================-->

                    <div class="single-policy">
                        <span><img src="{{ asset('/vendor/greenfarm/assets/images/policy-icon3.png') }}" class="img-fluid" alt=""></span>
                        <p> 24/7 SUPPORT</p>
                    </div>

                    <!--=====  End of single policy  ======-->

                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of Policy area  ======-->

<!--=============================================
=            category slider         =
=============================================-->

<div class="slider category-slider mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  category slider section title  =======-->

                <div class="section-title">
                    <h3>top categories</h3>
                </div>

                <!--=======  End of category slider section title  =======-->

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--=======  category container  =======-->

                <div class="category-slider-container">

                    <!--=======  single category  =======-->

                    <div class="single-category">
                        <div class="category-image">
                            <a href="shop-left-sidebar.html" title="Vegetables">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/categories/category1.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="category-title">
                            <h3>
                                <a href="shop-left-sidebar.html"> Vegetables</a>
                            </h3>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                    <!--=======  single category  =======-->

                    <div class="single-category">
                        <div class="category-image">
                            <a href="shop-left-sidebar.html" title="Fast Food">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/categories/category2.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="category-title">
                            <h3>
                                <a href="shop-left-sidebar.html"> Fast Food</a>
                            </h3>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                    <!--=======  single category  =======-->

                    <div class="single-category">
                        <div class="category-image">
                            <a href="shop-left-sidebar.html" title="Fish & Meats">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/categories/category3.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="category-title">
                            <h3>
                                <a href="shop-left-sidebar.html"> Fish & Meats</a>
                            </h3>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                    <!--=======  single category  =======-->

                    <div class="single-category">
                        <div class="category-image">
                            <a href="shop-left-sidebar.html" title="Fruits">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/categories/category4.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="category-title">
                            <h3>
                                <a href="shop-left-sidebar.html"> Fruits</a>
                            </h3>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                    <!--=======  single category  =======-->

                    <div class="single-category">
                        <div class="category-image">
                            <a href="shop-left-sidebar.html" title="Salads">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/categories/category5.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="category-title">
                            <h3>
                                <a href="shop-left-sidebar.html"> Salads</a>
                            </h3>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                    <!--=======  single category  =======-->


                    <div class="single-category">
                        <div class="category-image">
                            <a href="shop-left-sidebar.html" title="Bread">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/categories/category6.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="category-title">
                            <h3>
                                <a href="shop-left-sidebar.html"> Bread</a>
                            </h3>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                    <!--=======  single category  =======-->

                    <div class="single-category">
                        <div class="category-image">
                            <a href="shop-left-sidebar.html" title="Beans">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/categories/category7.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="category-title">
                            <h3>
                                <a href="shop-left-sidebar.html"> Beans</a>
                            </h3>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                </div>

                <!--=======  End of category container  =======-->

            </div>
        </div>
    </div>
</div>

<!--=====  End of category slider  ======-->

<!--=============================================
=            Double banner          =
=============================================-->

<div class="double-banner-section mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-xs-35">
                <!--=======  single banner  =======-->

                <div class="single-banner">
                    <a href="shop-left-sidebar.html">
                        <img src="{{ asset('/vendor/greenfarm/assets/images/banners/home2-banner1-1.jpg') }}" class="img-fluid" alt="">
                    </a>
                </div>

                <!--=======  End of single banner  =======-->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!--=======  single banner  =======-->

                <div class="single-banner">
                    <a href="shop-left-sidebar.html">
                        <img src="{{ asset('/vendor/greenfarm/assets/images/banners/home2-banner1-2.jpg') }}" class="img-fluid" alt="">
                    </a>
                </div>

                <!--=======  End of single banner  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of Double banner   ======-->

<!--=============================================
=            Tab slider         =
=============================================-->

<div class="slider tab-slider mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-slider-wrapper">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="featured-tab" data-toggle="tab" href="#featured" role="tab"
                               aria-selected="true">Featured</a>
                            <a class="nav-item nav-link" id="new-arrival-tab" data-toggle="tab" href="#new-arrivals" role="tab"
                               aria-selected="false">New Arrival</a>
                            <a class="nav-item nav-link" id="nav-onsale-tab" data-toggle="tab" href="#on-sale" role="tab"
                               aria-selected="false">On Sale</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <!--=======  tab slider container  =======-->

                            <div class="tab-slider-container">
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>

                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product05.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product06.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->
                                </div>
                                <!--=======  End of single tab slider product  =======-->

                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product07.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product08.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->
                                </div>
                                <!--=======  End of single tab slider product  =======-->

                                <!--=======  single tab slider item  =======-->

                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product09.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product10.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                            </div>

                            <!--=======  End of tab slider container  =======-->
                        </div>
                        <div class="tab-pane fade" id="new-arrivals" role="tabpanel" aria-labelledby="new-arrival-tab">
                            <!--=======  tab slider container  =======-->

                            <div class="tab-slider-container">
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->

                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product05.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product06.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->
                                </div>
                                <!--=======  End of single tab slider product  =======-->

                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product07.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product08.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->
                                </div>
                                <!--=======  End of single tab slider product  =======-->

                                <!--=======  single tab slider item  =======-->

                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product09.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product10.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                            </div>

                            <!--=======  End of tab slider container  =======-->
                        </div>
                        <div class="tab-pane fade" id="on-sale" role="tabpanel" aria-labelledby="nav-onsale-tab">
                            <!--=======  tab slider container  =======-->

                            <div class="tab-slider-container">
                                <!--=======  single tab slider item  =======-->

                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product09.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product10.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->


                                </div>
                                <!--=======  End of single tab slider product  =======-->
                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product05.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product06.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a class="active" href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->
                                </div>
                                <!--=======  End of single tab slider product  =======-->

                                <!--=======  single tab slider item  =======-->
                                <div class="single-tab-slider-item">
                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product07.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->

                                    <!--=======  tab slider sub product  =======-->

                                    <div class="gf-product tab-slider-sub-product">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <span class="onsale">Sale!</span>
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product08.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="product-hover-icons">
                                                <a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
                                                <a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
                                                <a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
                                                <a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--=======  End of tab slider sub product  =======-->
                                </div>
                                <!--=======  End of single tab slider product  =======-->
                            </div>

                            <!--=======  End of tab slider container  =======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--=====  End of Tab slider  ======-->

<!--=============================================
=            Featured product image gallery         =
=============================================-->

<div class="featured-product-image-gallery mb-80 pt-120 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  gallery product container  =======-->
                <div class="gallery-product-container">
                    <div class="row no-gutters">
                        <div class="col-lg-4 col-sm-6">
                            <!--=======  single featured product  =======-->

                            <div class="single-featured-product">
                                <a href="single-product.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/product-banners/fullbanner-1.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <!--=======  End of single featured product  =======-->
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!--=======  single featured product  =======-->

                            <div class="single-featured-product">
                                <a href="single-product.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/product-banners/fullbanner-2.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <!--=======  End of single featured product  =======-->
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!--=======  single featured product  =======-->

                            <div class="single-featured-product">
                                <a href="single-product.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/product-banners/fullbanner-3.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <!--=======  End of single featured product  =======-->
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!--=======  single featured product  =======-->

                            <div class="single-featured-product">
                                <a href="single-product.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/product-banners/fullbanner-4.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <!--=======  End of single featured product  =======-->
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!--=======  single featured product  =======-->

                            <div class="single-featured-product">
                                <a href="single-product.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/product-banners/fullbanner-5.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <!--=======  End of single featured product  =======-->
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!--=======  single featured product  =======-->

                            <div class="single-featured-product">
                                <a href="single-product.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/product-banners/fullbanner-6.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <!--=======  End of single featured product  =======-->
                        </div>
                    </div>
                </div>

                <!--=======  End of gallery product container  =======-->

            </div>
        </div>
    </div>
</div>

<!--=====  End of Featured product image gallery  ======-->

<!--=============================================
=            Best seller slider         =
=============================================-->

<div class="slider best-seller-slider mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  category slider section title  =======-->

                <div class="section-title">
                    <h3>best seller</h3>
                </div>

                <!--=======  End of category slider section title  =======-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--=======  best seller slider container  =======-->

                <div class="best-seller-slider-container pt-15 pb-15">

                    <!--=======  single best seller product  =======-->
                    <div class="col">
                        <div class="single-best-seller-item">
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product01.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product02.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Officiis debitis varius risus</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of single best seller product  =======-->

                    <!--=======  single best seller product  =======-->
                    <div class="col">
                        <div class="single-best-seller-item">
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product03.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Phasellus vel hendrerit eget</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product04.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of single best seller product  =======-->

                    <!--=======  single best seller product  =======-->
                    <div class="col">
                        <div class="single-best-seller-item">
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product05.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product06.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of single best seller product  =======-->

                    <!--=======  single best seller product  =======-->
                    <div class="col">
                        <div class="single-best-seller-item">
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product07.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product08.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of single best seller product  =======-->

                    <!--=======  single best seller product  =======-->
                    <div class="col">
                        <div class="single-best-seller-item">
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product09.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product10.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of single best seller product  =======-->

                    <!--=======  single best seller product  =======-->
                    <div class="col">
                        <div class="single-best-seller-item">
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product11.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="best-seller-sub-product">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 pr-0">
                                        <div class="image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('/vendor/greenfarm/assets/images/products/product12.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 pl-0 pr-0">
                                        <div class="product-content">
                                            <div class="product-categories">
                                                <a href="shop-left-sidebar.html">Fast Foods</a>,
                                                <a href="shop-left-sidebar.html">Vegetables</a>
                                            </div>
                                            <h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
                                            <div class="price-box">
                                                <span class="main-price">$89.00</span>
                                                <span class="discounted-price">$80.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=======  End of single best seller product  =======-->

                </div>

                <!--=======  End of best seller slider container  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of Best seller slider  ======-->

<!--=============================================
=            Blog post slider container         =
=============================================-->

<div class="slider blog-slider mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  blog slider section title  =======-->

                <div class="section-title">
                    <h3>greenfarm news</h3>
                </div>

                <!--=======  End of blog slider section title  =======-->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!--=======  blog slide container  =======-->

                <div class="blog-slider-container pt-30 pb-30 pr-30 pl-30">

                    <!--=======  single blog post  =======-->
                    <div class="col">
                        <div class="single-post-wrapper">
                            <div class="post-thumb">
                                <a href="blog-post-image-format.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/blog-image/blog01.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <div class="post-meta">
                                    <div class="post-date">29.09.2019</div>
                                </div>
                                <h3 class="post-title"><a href="blog-post-image-format.html">Blog image post</a></h3>
                                <a href="blog-post-image-format.html" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--=======  End of single blog post  =======-->

                    <!--=======  single blog post  =======-->
                    <div class="col">
                        <div class="single-post-wrapper">
                            <div class="post-thumb">
                                <a href="blog-post-image-gallery.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/blog-image/blog02.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <div class="post-meta">
                                    <div class="post-date">29.09.2019</div>
                                </div>
                                <h3 class="post-title"><a href="blog-post-image-gallery.html">Post with gallery</a></h3>
                                <a href="blog-post-image-gallery.html" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--=======  End of single blog post  =======-->

                    <!--=======  single blog post  =======-->
                    <div class="col">
                        <div class="single-post-wrapper">
                            <div class="post-thumb">
                                <a href="blog-post-audio-format.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/blog-image/blog03.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <div class="post-meta">
                                    <div class="post-date">29.09.2019</div>
                                </div>
                                <h3 class="post-title"><a href="blog-post-audio-format.html">Blog with audio</a></h3>
                                <a href="blog-post-audio-format.html" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--=======  End of single blog post  =======-->

                    <!--=======  single blog post  =======-->
                    <div class="col">
                        <div class="single-post-wrapper">
                            <div class="post-thumb">
                                <a href="blog-post-video-format.html">
                                    <img src="{{ asset('/vendor/greenfarm/assets/images/blog-image/blog04.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="post-info">
                                <div class="post-meta">
                                    <div class="post-date">29.09.2019</div>
                                </div>
                                <h3 class="post-title"><a href="blog-post-video-format.html">Blog with video</a></h3>
                                <a href="blog-post-video-format.html" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--=======  End of single blog post  =======-->

                </div>

                <!--=======  End of blog slide container  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of Blog post slider  ======-->


<!--=============================================
=            Brand logo slider         =
=============================================-->

<div class="slider brand-logo-slider mb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  blog slider section title  =======-->

                <div class="section-title">
                    <h3>brand logos</h3>
                </div>

                <!--=======  End of blog slider section title  =======-->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!--=======  brand logo wrapper  =======-->

                <div class="brand-logo-wrapper pt-20 pb-20">

                    <!--=======  single-brand-logo  =======-->

                    <div class="col">
                        <div class="single-brand-logo">
                            <a href="#">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/brands/brand1.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single-brand-logo  =======-->
                    <!--=======  single-brand-logo  =======-->

                    <div class="col">
                        <div class="single-brand-logo">
                            <a href="#">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/brands/brand2.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single-brand-logo  =======-->
                    <!--=======  single-brand-logo  =======-->

                    <div class="col">
                        <div class="single-brand-logo">
                            <a href="#">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/brands/brand3.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single-brand-logo  =======-->
                    <!--=======  single-brand-logo  =======-->

                    <div class="col">
                        <div class="single-brand-logo">
                            <a href="#">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/brands/brand4.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single-brand-logo  =======-->
                    <!--=======  single-brand-logo  =======-->

                    <div class="col">
                        <div class="single-brand-logo">
                            <a href="#">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/brands/brand5.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single-brand-logo  =======-->
                    <!--=======  single-brand-logo  =======-->

                    <div class="col">
                        <div class="single-brand-logo">
                            <a href="#">
                                <img src="{{ asset('/vendor/greenfarm/assets/images/brands/brand6.png') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>

                    <!--=======  End of single-brand-logo  =======-->
                </div>

                <!--=======  End of brand logo wrapper  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of Brand logo slider  ======-->
@endsection
