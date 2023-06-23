@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div id="page_wrapper" class="bg-light">
@include('layout.header_page')

<div class="full-row post">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{asset('')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{$post->CategoryTranslation->category->slug}}">{{$post->CategoryTranslation->name}}</a></li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{$post->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xl-8 order-xl-1 sm-mb-30">
                <div class="single-post summary  "> <!-- bg-white -->
                    <div class="single-post-title">
                        <!-- <span class="d-inline-block text-primary">{{$post->CategoryTranslation->name}}</span> -->
                        <h1 class="mt-2 text-secondary">{{$post->name}}</h1>
                        <div class="post-meta list-color-general mb-4">
                            <a href="#"><i class="flaticon-user-silhouette flat-mini"></i> <span>By Admin</span></a>
                            <a href="#"><i class="flaticon-calendar flat-mini"></i> <span>Sep 1, 2019</span></a>
                            <!-- <a href="#"><i class="flaticon-comments flat-mini"></i> <span>02</span></a> -->
                            <!-- <a href="#"><i class="flaticon-like flat-mini"></i> <span>30</span></a> -->
                            <a href="#"><i class="flaticon-eye-1 flat-mini"></i> <span>731</span></a>
                            <span><i class="flaticon-document flat-mini"></i> <a href="{{$post->CategoryTranslation->category->slug}}"><span>{{$post->CategoryTranslation->name}}</span></a></span>
                        </div>
                    </div>
                    <!-- <div class="post-image">
                        <img src="data/news/{{$post->post->img}}" alt="Image not found!">
                    </div> -->
                    <div class="post-desc">
                        <p>{!! $post->detail !!}</p>
                    </div>
                    <div class="post-content pt-4 mb-5">
                        {!! $post->content !!}
                    </div>
                    <!-- <div class="tagcloud">
                        <h6 class="mb-3">Tags:</h6>
                        <ul>
                            <li><a href="#">general</a></li>
                            <li><a href="#">videos</a></li>
                            <li><a href="#">media</a></li>
                            <li><a href="#">web</a></li>
                            <li><a href="#">parallax</a></li>
                            <li><a href="#">ecommerce</a></li>
                            <li><a href="#">t-shirt</a></li>
                            <li><a href="#">women</a></li>
                            <li><a href="#">trade</a></li>
                            <li><a href="#">animation</a></li>
                            <li><a href="#">theme</a></li>
                        </ul>
                    </div> -->
                    <div class="share-post border-0 px-0 d-flex mt-5">
                        <span class="py-10"><b>Share:</b></span>
                        <div class="media-widget-round-white-primary-shadow">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 order-xl-2">
                <div class="blog-sidebar widget-box-model">
                    <!-- Search Field -->
                    <div class="widget widget_search">
                        <form role="search" method="get" class="search_form" action="http://localhost/axeman-wp/">
                            <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                        </label>
                            <input type="submit" class="search-submit" value="Search">
                        </form>
                    </div>
                    <!-- Category Field -->
                    <!-- <div class="widget widget_categories">
                        <h5 class="widget-title mb-3">Categories</h5>
                        <ul>
                            <li class="cat-item cat-item-3"><a href="#">Apartment</a> (23)</li>
                            <li class="cat-item cat-item-2"><a href="#">Condo</a> (10)</li>
                            <li class="cat-item cat-item-2"><a href="#">Family House</a> (09)</li>
                            <li class="cat-item cat-item-2"><a href="#">Modern Villa</a> (35)</li>
                            <li class="cat-item cat-item-2"><a href="#">Town House</a> (05)</li>
                        </ul>
                    </div> -->
                    

                    <!--============== Recent Property Widget Start ==============-->
                    <div class="widget widget_recent_property">
                        <h5 class="text-secondary mb-4">Bài viết mới nhất</h5>
                        <ul>

                            <li>
                                <img src="assets/images/thumbnaillist/01.jpg" alt="">
                                <div class="thumb-body">
                                    <h6 class="listing-title"><a href="property-single-1.html">Nirala Appartment</a></h6>
                                    <ul class="d-flex quantity font-fifteen">
                                        <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>6500 Sqft</li>
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>   

                
            
        </div>
    </div>
</div>




@include('layout.footer')
</div>
@endsection
@section('script')

@endsection