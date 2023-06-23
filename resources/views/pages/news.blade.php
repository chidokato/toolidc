@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div id="page_wrapper" class="bg-light news">
@include('layout.header_page')

<div class="full-row py-3" style="margin-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col inner-page-banner">
                <h1 class="text-secondary">{{$data->name}}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{asset('')}}">{{__('lang.home')}}</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Listing</a></li> -->
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{$data->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="full-row pt-0">
    <div class="container">
        <div class="row">
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
                    <div class="widget widget_categories">
                        <h5 class="widget-title mb-3">Categories</h5>
                        <ul>
                            <li class="cat-item cat-item-3"><a href="#">Apartment</a> (23)</li>
                        </ul>
                    </div>

                    <!--============== Recent Property Widget Start ==============-->
                    <div class="widget widget_recent_property">
                        <h5 class="text-secondary mb-4">Recent Property</h5>
                        <ul>
                            <li>
                                <img src="frontend/assets/images/thumbnaillist/01.jpg" alt="">
                                <div class="thumb-body">
                                    <h6 class="listing-title"><a href="property-single-1.html">Nirala Appartment</a></h6>
                                    <span class="listing-price">$3200<small>( Monthly )</small></span>
                                    <ul class="d-flex quantity font-fifteen">
                                        <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>6500 Sqft</li>

                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-8 order-xl-1 sm-mb-30">
                <div class="row row-cols-1 g-4">
                    @foreach($post as $val)

                        @include('pages.iteam.news')
                    
                    @endforeach
                </div>

                <div class="row">
                    <div class="col mt-5">
                        <nav class="paginate">
                            {{ $post->links(); }}
                        </nav>
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