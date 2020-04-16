@extends('frontends.layouts.app')
@section('_title', $post->title)
@section('_description', $post->description)
@section('_keyword', $post->keywords)
@section('content')
    <div class="single noo-shop-main">
        <div class="container">
            <div class="row">
                <div class="noo-main col-md-9">
                    <article>
                        <div class="blog-item">
                            <div class="blog-description">
											<span class="cat">
												<a href="#">{{ $post->category->name }}</a>
											</span>
                                <h1>{{ $post->title }}</h1>
                                <span class="meta">
												{{ convertDatetime($post->created_at) }} By <a href="#">{{ $post->user->name }}</a>
											</span>
                            </div>
                            <div class="content-featured">
                                <div class="blog-thumbnail">
                                    <div class="content-thumb">
                                        <img width="740" height="440" src="{{ Storage::url($post->image) }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="blog_excerpt">
                                <strong>
                                    {{ $post->short_content }}
                                </strong><br/>
                                {!! $post->content !!}
                            </div>
                        </div>
                    </article>
                    <div class="content-meta">
                        <div class="content-tags">
                            <span class="fa fa-tag"></span>
                            {!! $post->keywords?implode(', ', array_map(function($item){return '<a href="#">'.$item.'</a>';}, explode(',', $post->keywords))):'' !!}
                        </div>
                    </div>
                    <nav class="post-navigation post-navigation-line">
                        @if($previousPost)
                            <div class="prev-post">
                                <div class="bg-prev-post" style="background-image: url({{ Storage::url($previousPost->image) }});"></div>
                                <i class="fa fa-long-arrow-left">&nbsp;</i>
                                <a href="{{ route('frontend.post.detail', ['slug'=> $previousPost->slug, 'id' => $previousPost->id]) }}">{{ $previousPost->title }}</a>
                            </div>
                        @endif
                        @if($nextPost)
                            <div class="next-post">
                                <div class="bg-next-post" style="background-image: url({{ Storage::url($nextPost->image) }});"></div>
                                <a href="{{ route('frontend.post.detail', ['slug'=> $nextPost->slug, 'id' => $nextPost->id]) }}">{{ $nextPost->title }}</a>
                                <i class="fa fa-long-arrow-right">&nbsp;</i>
                            </div>
                        @endif
                    </nav>
                    <div id="comments" class="comments-area">
                        <h3 class="comments-title">Comments</h3>
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
                                <h3 class="comment-reply-title">
                                    <span>Leave us a comment</span>
                                </h3>
                                <form class="comment-form">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="comment-form-author">
                                                <input id="author" name="author" type="text" placeholder="Name*" class="form-control" value="" size="30" />
                                            </div>
                                            <div class="comment-form-email">
                                                <input id="email" name="email" type="text" placeholder="Email*" class="form-control" value="" size="30" />
                                            </div>
                                            <div class="comment-form-website">
                                                <input id="url" name="url" type="text" placeholder="Website" class="form-control" value="" size="30"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="comment-form-comment">
                                                <textarea class="form-control" placeholder="Your Comment" id="comment" name="comment" cols="40" rows="6" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="submit" value="Post Comments"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="noo-sidebar col-md-3">
                    <div class="noo-sidebar-wrap">
                        <div class="widget widget_search">
                            <h3 class="widget-title">Search</h3>
                            <form>
                                <input type="search" class="search-field" placeholder="Search&hellip;" value="" name="s"/>
                                <input type="submit" value="Search"/>
                            </form>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                @foreach($categories as $value)
                                    <li><a href="#">{{ $value->name }}</a> <span class="count">{{ $value->posts->count() }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget_recent_entries">
                            <h3 class="widget-title">Popular posts</h3>
                            <ul class="post_list_widget">
                                <li>
                                    @foreach($popular_posts as $post)
                                        <a href="{{ route('frontend.post.detail', ['slug'=> $post->slug, 'id' => $post->id]) }}">
                                            <span class="post-thumb" data-bg="{{ Storage::url($post->image) }}"></span>
                                            <span class="post-title">{{ $post->title }}</span>
                                            <span class="post-date">{{ convertDatetime($post->created_at) }}</span>
                                        </a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget-title">Search by tags</h3>
                            <div class="tagcloud">
                                {!! $post->keywords?implode(', ', array_map(function($item){return '<a href="#">'.$item.'</a>';}, explode(',', $post->keywords))):'' !!}
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
            <img src="{{ asset('vendor/organici/images/organici-love-me.png') }}" class="noo-image-footer" alt="" />
        </div>
    </div>
@endsection
