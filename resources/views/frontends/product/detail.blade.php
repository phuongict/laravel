@extends('frontends.layouts.app')
@section('_title', $_product->name)
@section('_description', $_product->description)
@section('_keyword', $_product->keywords)
@section('content')
    <div class="main">
        <div class="commerce single-product noo-shop-main">
            <div class="container">
                <div class="row">
                    <div class="noo-main col-md-9">
                        <div class="product">
                            <div class="single-inner">
                                <div class="images">
                                    <div class="project-slider">
                                        <div class="owl-carousel sync1">
                                            <div class="item">
                                                <a href="{{ Storage::url($_product->image) }}" data-rel="prettyPhoto[product-gallery]">
                                                    <img width="561" height="713" src="{{ Storage::url($_product->image) }}" alt="" />
                                                </a>
                                            </div>
                                            @if($_product->gallery != '')
                                                @foreach(unserialize($_product->gallery) as $image)
                                                    <div class="item">
                                                        <a href="{{ Storage::url($image) }}" data-rel="prettyPhoto[product-gallery]">
                                                            <img width="561" height="713" src="{{ Storage::url($image) }}" alt="" />
                                                        </a>
                                                    </div>
                                                    @endforeach
                                            @endif
                                        </div>
                                        <div class="owl-carousel sync2">
                                            <div class="item">
                                                <img width="150" height="150" src="{{ Storage::url($_product->image) }}" alt="" />
                                            </div>
                                            @if($_product->gallery != '')
                                                @foreach(unserialize($_product->gallery) as $image)
                                                    <div class="item">
                                                        <img width="150" height="150" src="{{ Storage::url($image) }}" alt="" />
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="summary entry-summary">
                                    <h1 class="product_title entry-title">{{ $_product->name }}</h1>
                                    <p class="price">
                                        @if($_product->discount > 0)
                                            <del>{{ number_format($_product->price) }}</del>
                                            <span class="amount">{{ number_format(($_product->price-(($_product->price*$_product->discount)/100))) }}</span>
                                        @else
                                            <span class="amount">{{ number_format($_product->price) }}</span>
                                        @endif
                                        <sup>đ</sup>
                                    </p>
                                    <p class="description">
                                        {{ $_product->product_info }}
                                    </p>
                                    <div class="product_meta">
                                        <span class="posted_in">Category: <a href="#">{{ $_product->productCategory->name }}</a></span>
                                        <span class="tagged_as">
                                            Tags:
                                            @if($_product->keywords != '')
                                                {!!  implode(', ', array_map(function($item){return '<a href="#">'.$item.'</a>';}, explode(',', $_product->keywords))) !!}
                                                @endif
                                        </span>
                                    </div>
                                    <form class="cart">
                                        <div class="quantity">
                                            <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4"/>
                                        </div>
                                        <button type="submit" class="single_add_to_cart_button button">Add to cart</button>
                                    </form>
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button">
                                            <a href="#" class="add_to_wishlist"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="noo-social-share">
                                        <span>Share:</span>
                                        <a href="#share" class="noo-share" title="Share on Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#share" class="noo-share" title="Share on Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#share" class="noo-share" title="Share on Google+">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#share" class="noo-share" title="Share on Pinterest">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="commerce-tabs">
                                <ul class="nav nav-tabs tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab-1">Description</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2">Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-1">
                                        {!! $_product->product_description !!}
                                    </div>
                                    <div id="tab-2" class="tab-pane fade">
                                        <div id="comments" class="comments-area">
                                            <h2 class="comments-title">3 Comments</h2>
                                            <ol class="comments-list">
                                                <li class="comment">
                                                    <div class="comment-wrap">
                                                        <div class="comment-img">
                                                            <img alt='' src='http://placehold.it/100x100' height='80' width='80' />
                                                        </div>
                                                        <article class="comment-block">
                                                            <header class="comment-header">
                                                                <cite class="comment-author">
                                                                    admin
                                                                </cite>
                                                                <div class="comment-meta">
												                            <span class="time">
												                                4 months ago
												                            </span>
                                                                </div>
                                                            </header>
                                                            <div class="comment-content">
                                                                <p>fames ac turpis egestas. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi. Phasellus</p>
                                                            </div>
                                                            <span class="comment-reply">
						                        						<a class='comment-reply-link' href='#'><i class="fa fa-reply"></i> Reply</a>
						                        					</span>
                                                        </article>
                                                    </div>
                                                    <ol class="children">
                                                        <li class="comment">
                                                            <div class="comment-wrap">
                                                                <div class="comment-img">
                                                                    <img alt='' src='http://placehold.it/100x100' height='80' width='80' />
                                                                </div>
                                                                <article class="comment-block">
                                                                    <header class="comment-header">
                                                                        <cite class="comment-author">
                                                                            admin
                                                                        </cite>
                                                                        <div class="comment-meta">
														                            <span class="time">
														                                4 months ago
														                            </span>
                                                                        </div>
                                                                    </header>
                                                                    <div class="comment-content">
                                                                        <p>fSames ac turpis egestas. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi. Phasellus</p>
                                                                    </div>
                                                                    <span class="comment-reply">
								                        						<a class='comment-reply-link' href='#'><i class="fa fa-reply"></i> Reply</a>
								                        					</span>
                                                                </article>
                                                            </div>
                                                        </li><!-- #comment-## -->
                                                    </ol><!-- .children -->
                                                </li><!-- #comment-## -->
                                                <li class="comment">
                                                    <div class="comment-wrap">
                                                        <div class="comment-img">
                                                            <img alt='' src='http://placehold.it/100x100' height='80' width='80' />
                                                        </div>
                                                        <article class="comment-block">
                                                            <header class="comment-header">
                                                                <cite class="comment-author">
                                                                    admin
                                                                </cite>
                                                                <div class="comment-meta">
												                            <span class="time">
												                                4 months ago
												                            </span>
                                                                </div>
                                                            </header>
                                                            <div class="comment-content">
                                                                <p>fames ac turpis egestas. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi. Phasellus</p>
                                                            </div>
                                                            <span class="comment-reply">
						                        						<a class='comment-reply-link' href='#'><i class="fa fa-reply"></i> Reply</a>
						                        					</span>
                                                        </article>
                                                    </div>
                                                </li><!-- #comment-## -->
                                            </ol> <!-- /.comments-list -->
                                            <div id="respond-wrap">
                                                <div id="respond" class="comment-respond">
                                                    <h3 id="reply-title" class="comment-reply-title">
                                                        <span>Leave your thought</span>
                                                    </h3>
                                                    <form class="comment-form">
                                                        <div class="row">
                                                            <div class="comment-form-author col-sm-6">
                                                                <input id="author" name="author" type="text" placeholder="Enter Your Name*" class="form-control" value="" size="30" />
                                                            </div>
                                                            <div class="comment-form-email col-sm-6">
                                                                <input id="email" name="email" type="text" placeholder="Enter Your Email*" class="form-control" value="" size="30" />
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="comment-form-comment">
                                                                    <textarea class="form-control" placeholder="Enter Your Comment" id="comment" name="comment" cols="40" rows="6"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-submit">
                                                            <input name="submit" type="submit" id="submit" class="submit" value="Post Comments" />
                                                        </div>
                                                    </form>
                                                </div><!-- #respond -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="related products">
                                <h2>Related Products</h2>
                                <div class="products row product-grid">
                                    @foreach($relatedProducts as $product)
                                        <div class="masonry-item noo-product-column col-md-4 col-sm-6 product">
                                            <div class="noo-product-inner">
                                                <div class="noo-product-thumbnail">
                                                    <a href="{{ route('frontend.product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                                        <img width="600" height="760" src="{{ Storage::url($product->image) }}" alt="" />
                                                    </a>
                                                    <div class="noo-rating">
                                                        <div class="star-rating">
                                                            <span style="width:100%"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="noo-product-title">
                                                    <h3><a href="{{ route('frontend.product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">{{ $product->name }}</a></h3>
                                                    <span class="price">
                                                        <span class="amount">
                                                            @if($product->discount > 0)
                                                                <del>{{ number_format($product->price) }}</del> {{ number_format($product->price - (($product->price*$product->discount)/100)) }}
                                                            @else
                                                                {{ $product->price }}
                                                            @endif
                                                        </span>
                                                    </span>
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
                    <div class="noo-sidebar col-md-3">
                        <div class="noo-sidebar-wrap">
                            <div class="widget commerce widget_product_search">
                                <h3 class="widget-title">Search</h3>
                                <form class="commerce-product-search">
                                    <input type="search" id="commerce-product-search-field" class="search-field" placeholder="Search Products&hellip;" value="" name="s"/>
                                    <input type="submit" value="Search"/>
                                </form>
                            </div>
                            <div class="widget commerce widget_product_categories">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="product-categories">
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category->name }}</a></li>
                                        @endforeach
                                </ul>
                            </div>
                            <div class="widget commerce widget_products">
                                <h3 class="widget-title">Popular products</h3>
                                <ul class="product_list_widget">
                                    @foreach($popularProducts as $product)
                                        <li>
                                            <a href="{{ route('frontend.product.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                                <img width="100" height="100" src="{{ Storage::url($product->image) }}" alt="" />
                                                <span class="product-title">{{ $product->name }}</span>
                                            </a>
                                            <span class="amount">
                                                @if($product->discount > 0)
                                                    <del>{{ number_format($product->price) }}</del> {{ number_format($product->price - (($product->price*$product->discount)/100)) }}
                                                @else
                                                    {{ $product->price }}
                                                @endif
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget commerce widget_product_tag_cloud">
                                <h3 class="widget-title">Product Tags</h3>
                                <div class="tagcloud">
                                    @if($_product->keywords != '')
                                        {!!  implode(', ', array_map(function($item){return '<a href="#">'.$item.'</a>';}, explode(',', $_product->keywords))) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="noo-footer-shop-now">
            <div class="container">
                <div class="col-md-7">
                    <h4>- Every day fresh -</h4>
                    <h3>organic food</h3>
                </div>
                <img src="{{ asset('/vendor/organici/images/organici-love-me.png') }}" class="noo-image-footer" alt="" />
            </div>
        </div>
    </div>
@endsection
