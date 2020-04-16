@extends('frontends.layouts.app')
@section('_title', $_title)
@section('content')
    <div class="pt-5 container">
        <div class="noo-slider-wrap">
            <ul class="noo-slider-image">
                @foreach($sliders as $slider)
                    <li>
                        <div class="image-style">
                            <a href="{{ $slider->link }}">
                                <img width="610" height="520" src="{{ Storage::url($slider->image) }}" alt="" />
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="noo-simple-product-wrap">
            <ul class="noo-simple-product-slider">
                @foreach($featureProducts as $product)
                    <li>
                        <a href="{{ route('frontend.product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                            <div class="noo-simple-slider-item" data-bg="{{ Storage::url($product->image) }}">
                                <div class="n-simple-content">
                                    <h3>{{ $product->name }}</h3>
                                    <span class="price">
                                        <span class="amount">
                                            @if($product->discount > 0)
                                                <del>{{ number_format($product->price) }}</del> {{ number_format($product->price - (($product->price*$product->discount)/100)) }}
                                            @else
                                                {{ $product->price }}
                                            @endif
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="pt-10 pb-11">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="noo-product-grid-wrap commerce product-style">
                        <div class="noo-sh-title">
                            <h2>Our new products</h2>
                            <p>Maecenas tristique gravida odio, et sagi ttis justo interdum porta. Duis et lacus mattis, tincidunt eronec dictum non nulla.</p>
                        </div>
                        <div class="noo-product-filter masonry-filters">
                            <ul class="noo-header-filter" data-option-key="filter">
                                <li>
                                    <a data-option-value=".all-products" href="#all" class="selected">
                                        <img width="30" height="26" src="{{ asset('/vendor/organici/images/filter/filter-1.png') }}" alt="" />
                                        <span>All products</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-option-value=".organic-fruits" href="#organic-fruits">
                                        <img width="30" height="26" src="{{ asset('/vendor/organici/images/filter/filter-2.png') }}" alt=""/>
                                        <span>Fruits</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-option-value=".vegetable" href="#vegetable">
                                        <img width="30" height="26" src="{{ asset('/vendor/organici/images/filter/filter-3.png') }}" alt=""/>
                                        <span>Vegetable</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-option-value=".bread" href="#bread">
                                        <img width="30" height="26" src="{{ asset('/vendor/organici/images/filter/filter-4.png') }}" alt=""/>
                                        <span>Bread</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-option-value=".others" href="#others">
                                        <img width="30" height="26" src="{{ asset('/vendor/organici/images/filter/filter-5.png') }}" alt=""/>
                                        <span>Others</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="noo-product-grid products row product-grid noo-grid-4">
                            @foreach($fruits as $product)
                                <div class="fruit organic-fruits masonry-item col-md-4 col-sm-6">
                                    <div class="noo-product-inner">
                                        <div class="noo-product-thumbnail">
                                            <a href="#">
                                                <img width="600" height="760" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" />
                                            </a>
                                            <div class="noo-rating">
                                                <div class="star-rating">
                                                    <span style="width:100%"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="noo-product-title">
                                            <h3><a href="#">{{ $product->name }}</a></h3>
                                            <span class="price"><span class="amount">{{ number_format($product->price - (($product->price*$product->discount)/100)) }}</span></span>
                                            <div class="noo-product-action">
                                                <div class="noo-action">
                                                    <a href="#" class="button product_type_simple add_to_cart_button">
                                                        <span>Add to cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach($vegetables as $product)
                                    <div class="vegetable masonry-item col-md-4 col-sm-6">
                                        <div class="noo-product-inner">
                                            <div class="noo-product-thumbnail">
                                                <a href="#">
                                                    <img width="600" height="760" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" />
                                                </a>
                                                <div class="noo-rating">
                                                    <div class="star-rating">
                                                        <span style="width:100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="noo-product-title">
                                                <h3><a href="#">{{ $product->name }}</a></h3>
                                                <span class="price"><span class="amount">{{ number_format($product->price - (($product->price*$product->discount)/100)) }}</span></span>
                                                <div class="noo-product-action">
                                                    <div class="noo-action">
                                                        <a href="#" class="button product_type_simple add_to_cart_button">
                                                            <span>Add to cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach($breads as $product)
                                    <div class="bread masonry-item col-md-4 col-sm-6">
                                        <div class="noo-product-inner">
                                            <div class="noo-product-thumbnail">
                                                <a href="#">
                                                    <img width="600" height="760" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" />
                                                </a>
                                                <div class="noo-rating">
                                                    <div class="star-rating">
                                                        <span style="width:100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="noo-product-title">
                                                <h3><a href="#">{{ $product->name }}</a></h3>
                                                <span class="price"><span class="amount">{{ number_format($product->price - (($product->price*$product->discount)/100)) }}</span></span>
                                                <div class="noo-product-action">
                                                    <div class="noo-action">
                                                        <a href="#" class="button product_type_simple add_to_cart_button">
                                                            <span>Add to cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach($others as $product)
                                    <div class="others masonry-item col-md-4 col-sm-6">
                                        <div class="noo-product-inner">
                                            <div class="noo-product-thumbnail">
                                                <a href="#">
                                                    <img width="600" height="760" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" />
                                                </a>
                                                <div class="noo-rating">
                                                    <div class="star-rating">
                                                        <span style="width:100%"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="noo-product-title">
                                                <h3><a href="#">{{ $product->name }}</a></h3>
                                                <span class="price"><span class="amount">{{ number_format($product->price - (($product->price*$product->discount)/100)) }}</span></span>
                                                <div class="noo-product-action">
                                                    <div class="noo-action">
                                                        <a href="#" class="button product_type_simple add_to_cart_button">
                                                            <span>Add to cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature-product">
        <div class="noo-sh-title text-center">
            <h2>Sale products</h2>
            <p>Maecenas tristique gravida odio, et sagi ttis justo interdum porta</p>
        </div>
        <div class="noo-product-masonry columns-3">
            @foreach($sales as $product)
                <div class="product-masonry">
                    <img width="644" height="380" src="{{ Storage::url($product->image) }}" alt="" />
                    <div class="noo-link">
                        <div class="noo-product-table">
                            <div class="noo-product-table-cell">
                                <h4><a href="#">{{ $product->name }} </a></h4>
                                <p>
                                    {{ $product->product_info }}
                                </p>
                                <span class="noo-sh-pmeta">
											<a href="#" class="button product_type_simple add_to_cart_button">
												<span>Add to cart</span>
											</a>
											<a class="fa fa-link" href="shop-detail.html"></a>
										</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
{{--    <div class="pt-11 pb-10">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12">--}}
{{--                    <div class="noo-sh-title noo-farmer-title">--}}
{{--                        <h2>Our farmer</h2>--}}
{{--                        <p>--}}
{{--                            Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo ipsum dolor sit amet, consectetur adipiscing elit.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="noo-farmer">--}}
{{--                        <div class="noo-farmer-thumbnail">--}}
{{--                            <img width="284" height="380" src="{{ asset('/vendor/organici/images/team/team_1.png') }}" alt="" />--}}
{{--                        </div>--}}
{{--                        <div class="noo-farmer-content">--}}
{{--                            <h4>Tristique</h4>--}}
{{--                            <p>--}}
{{--                                Maecenas tristique gravida, odio et sagi ttis justo Vestibulum non justo ultrices. Donec dictum non nulla tristique gravida odio.--}}
{{--                            </p>--}}
{{--                            <span class="social">--}}
{{--											<a href="#" class="fa fa-facebook"></a>--}}
{{--											<a href="#" class="fa fa-twitter"></a>--}}
{{--											<a href="#" class="fa fa-google"></a>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="noo-farmer">--}}
{{--                        <div class="noo-farmer-thumbnail">--}}
{{--                            <img width="330" height="380" src="{{ asset('/vendor/organici/images/team/team_2.png') }}" alt=""/>--}}
{{--                        </div>--}}
{{--                        <div class="noo-farmer-content">--}}
{{--                            <h4>Alyssa Hiyama</h4>--}}
{{--                            <p>--}}
{{--                                Maecenas tristique gravida, odio et sagi ttis justo Vestibulum non justo ultrices. Donec dictum non nulla tristique gravida odio.--}}
{{--                            </p>--}}
{{--                            <span class="social">--}}
{{--											<a href="#" class="fa fa-facebook"></a>--}}
{{--											<a href="#" class="fa fa-twitter"></a>--}}
{{--											<a href="#" class="fa fa-instagram"></a>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-sm-6">--}}
{{--                    <div class="noo-farmer">--}}
{{--                        <div class="noo-farmer-thumbnail">--}}
{{--                            <img width="285" height="380" src="{{ asset('/vendor/organici/images/team/team_3.png') }}" alt="" />--}}
{{--                        </div>--}}
{{--                        <div class="noo-farmer-content">--}}
{{--                            <h4>Alberto Trombin</h4>--}}
{{--                            <p>--}}
{{--                                Maecenas tristique gravida, odio et sagi ttis justo Vestibulum non justo ultrices. Donec dictum non nulla tristique gravida odio.--}}
{{--                            </p>--}}
{{--                            <span class="social">--}}
{{--											<a href="#" class="fa fa-facebook"></a>--}}
{{--											<a href="#" class="fa fa-twitter"></a>--}}
{{--											<a href="#" class="fa fa-pinterest"></a>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="call-to-action-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="noo-represent">
                        <img width="194" height="66" src="{{ asset('/vendor/organici/images/since.png') }}" alt=""/>
                        <h2>Organic products!</h2>
                        <p>
                            Maecenas tristique gravida odio, et sagittis justo interdum porta. Duislacus mattis, tincidunt eros ac, consequat tortor.
                        </p>
                        <div class="noo-button-creative">
                            <a href="#">
                                <span class="first"></span>
                                <span class="second"></span>
                                Shop now
                                <span class="three"></span>
                                <span class="four"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </div>
    </div>
    <div class="pt-12 pb-8">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="noo-sh-title noo-blog-title">
                        <h2>Blog updates</h2>
                        <p>
                            Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo <br />lipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                    </div>
                    <div class="masonry noo-blog">
                        <div class="row masonry-container">
                            @foreach($newPostLists as $value)

                                <div class="masonry-item col-md-4 col-sm-6">
                                    <div class="blog-item">
                                        <a class="blog-thumbnail" href="{{ route('frontend.post.detail', ['slug'=> $value->slug, 'id' => $value->id]) }}">
                                            <img width="600" height="440" src="{{ Storage::url($value->image) }}" alt=""/>
                                        </a>
                                        <div class="blog-description">
													<span class="cat">
														<a href="#">{{ $value->category->name }}</a>
													</span>
                                            <h3><a href="{{ route('frontend.post.detail', ['slug'=> $value->slug, 'id' => $value->id]) }}">{{ $value->title }}</a></h3>
                                            <p class="blog_excerpt">
                                                {{ mb_strlen($value->short_content)>130?mb_substr($value->short_content, 0, 130):$value->short_content }}...
                                            </p>
                                            <a class="view-more" href="{{ route('frontend.post.detail', ['slug'=> $value->slug, 'id' => $value->id]) }}">View more</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial">
        <div class="noo_testimonial_wrap">
            <img width="328" height="851" src="{{ asset('/vendor/organici/images/image_left.png') }}" class="image_left" alt=""/>
            <img width="329" height="789" src="{{ asset('/vendor/organici/images/image_right.png') }}" class="image_right" alt="" />
            <div class="noo-testimonial-sync2 testimonial-three">
                <div class="item">
                    <div class="testimonial-content">
                        <h3 class="testi-title">Taylor McCartney</h3>
                        <div>
                            <i class="fa fa-quote-left"></i>
                            <p>
                                Maecenas tristique gravida odio, et sagi ttis justo interdum porta. Duis et lacus mattis, tincidunt ero. Donec dictum non nulla ut tris tique gravida odio lobortis tristique gravida. Aliquam erat volutpat. Pellentesque auctor, arcu id tristique.
                            </p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-content">
                        <h3 class="testi-title">Ashley Simpsons</h3>
                        <div>
                            <i class="fa fa-quote-left"></i>
                            <p>
                                Maecenas tristique gravida odio, et sagi ttis justo interdum porta. Duis et lacus mattis, tincidunt ero. Donec dictum non nulla ut tris tique gravida odio lobortis tristique gravida. Aliquam erat volutpat. Pellentesque auctor, arcu id tristique.
                            </p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-content">
                        <h3 class="testi-title">Olivia Jolie</h3>
                        <div>
                            <i class="fa fa-quote-left"></i>
                            <p>
                                Maecenas tristique gravida odio, et sagi ttis justo interdum porta. Duis et lacus mattis, tincidunt ero. Donec dictum non nulla ut tris tique gravida odio lobortis tristique gravida. Aliquam erat volutpat. Pellentesque auctor, arcu id tristique.
                            </p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-content">
                        <h3 class="testi-title">Tyrion Lannister</h3>
                        <div>
                            <i class="fa fa-quote-left"></i>
                            <p>
                                Maecenas tristique gravida odio, et sagi ttis justo interdum porta. Duis et lacus mattis, tincidunt ero. Donec dictum non nulla ut tris tique gravida odio lobortis tristique gravida. Aliquam erat volutpat. Pellentesque auctor, arcu id tristique.
                            </p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="noo-testimonial-sync1 testimonial-three">
                <div class="item">
                    <div class="background_image">
                        <img class="noo_testimonial_avatar" src="{{ asset('/vendor/organici/images/avatar/avatar_1.jpg') }}" alt=""/>
                    </div>
                    <div class="testimonial-name">
                        <h4 class="noo_testimonial_name">- Taylor -</h4>
                        <span class="noo_testimonial_position">( Web Desinger )</span>
                    </div>
                </div>
                <div class="item">
                    <div class="background_image">
                        <img class="noo_testimonial_avatar" src="{{ asset('/vendor/organici/images/avatar/avatar_2.jpg') }}" alt=""/>
                    </div>
                    <div class="testimonial-name">
                        <h4 class="noo_testimonial_name">- Ashley -</h4>
                        <span class="noo_testimonial_position">( Developer )</span>
                    </div>
                </div>
                <div class="item">
                    <div class="background_image">
                        <img class="noo_testimonial_avatar" src="{{ asset('/vendor/organici/images/avatar/avatar_3.jpg') }}" alt=""/>
                    </div>
                    <div class="testimonial-name">
                        <h4 class="noo_testimonial_name">- Olivia -</h4>
                        <span class="noo_testimonial_position">( Web Desinger )</span>
                    </div>
                </div>
                <div class="item">
                    <div class="background_image">
                        <img class="noo_testimonial_avatar" src="{{ asset('/vendor/organici/images/avatar/avatar_4.jpg') }}" alt=""/>
                    </div>
                    <div class="testimonial-name">
                        <h4 class="noo_testimonial_name">- Tyrion Lannister -</h4>
                        <span class="noo_testimonial_position">( Ceo )</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
