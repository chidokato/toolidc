@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<?php use App\Models\Images; ?>
<div id="page_wrapper" class="project">
@include('layout.header_page')

<div class="full-row p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div class="3block-carusel nav-disable dot-disable owl-carousel owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1795px;">
                            <div class="owl-item active" style="width: 335px; margin-right: 24px;">
                                <div class="item" style="margin-right: -30px;">
                                    <img src="data/product/{{$post->post->img}}" alt="real estate template">
                                </div>
                            </div>
                            @foreach($images as $val)
                            <div class="owl-item active" style="width: 335px; margin-right: 24px;">
                                <div class="item" style="margin-right: -30px;">
                                    <img src="data/product/detail/{{$val->img}}" alt="real estate template">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav">
                        <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button>
                        <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                    </div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot active"><span></span></button>
                        <button role="button" class="owl-dot"><span></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="full-row p-0 menuproject sicky-70">
    <div class="container">
        <ul>
            @foreach($section as $val)
            <li><a href="#tab{{$val->id}}">{{$val->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<div class="full-row property-overview py-30">
    <div class="container mb-10">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{asset('')}}">{{__('lang.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{$catslug}}">{{$post->CategoryTranslation->name}}</a></li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{$post->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="post-meta font-small text-uppercase list-color-primary">
                    <a href="#" class="listing-ctg"><i class="fa-solid fa-building"></i><span>{{$post->CategoryTranslation->name}}</span></a>
                </div>
                <h4 class="listing-title">{{$post->name}}</h4>
                <span class="listing-location"><i class="fas fa-map-marker-alt text-primary"></i> {{$post->address}}</span>
            </div>
            <div class="col-auto ms-auto xs-m-0 text-end xs-text-start pb-4">
                <span class="listing-price">{{$post->price}}<small>( {{$post->unit}} )</small></span>
                <span class="text-white font-mini px-2 rounded product-status ms-auto xs-m-0 py-1 bg-primary"><i class="fas fa-check"></i> Available</span>
            </div>
        </div>
    </div> -->
</div>

<div class="full-row pt-0">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="property-overview  summary rounded  mb-0">
                    <div class="row">
                        <div class="col-auto">
                            <div class="post-meta font-small text-uppercase list-color-primary">
                                <a href="{{$post->CategoryTranslation->category->slug}}" class="listing-ctg"><i class="fa-solid fa-building"></i><span>{{$post->CategoryTranslation->name}}</span></a>
                            </div>
                            <h1 class="listing-title">{{$post->name}}</h1>
                            <span class="listing-location"><i class="fas fa-map-marker-alt text-primary"></i> {{$post->address}}, {{$post->WardTranslation->name}}, {{$post->DistrictTranslation->name}}, {{$post->ProvinceTranslation->name}}</span>
                        </div>
                        <div class="col-auto ms-auto xs-m-0 text-end xs-text-start pb-4">
                            @if($post->price)
                            <span class="listing-price"><span>Giá bán </span>{{$post->price}} {{$post->unit}}</span>
                            @else
                            <span class="listing-price"><span>Giá bán </span>Liên hệ</span>
                            @endif
                            <span class="text-white font-mini px-2 rounded product-status ms-auto xs-m-0 py-1 bg-primary"><i class="fas fa-check"></i> Available</span>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">

                            <div class="product-offers mt-2">
                                {!! $post->content !!}
                                <!-- <ul class="product-offers-list">
                                    <li class="product-offer-item"> <strong>Special Price </strong>Get extra 19% off (price inclusive of discount)</li>
                                    <li class="product-offer-item"> <strong>Bank Offer </strong> 10% instant discount on VISA Cards</li>
                                    <li class="product-offer-item"> <strong>No cost EMI $49/month.</strong> Standard EMI also available</li>
                                </ul> -->
                            </div>
                            <ul class="quick-meta mt-4">
                                <li class="bg-primary w-auto"><a href="#" class="px-5 text-white">Booking Now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach($section as $val)
                <div class="property-overview summary rounded bg-white mb-20">
                    <div class="row row-cols-1">
                        <div class="col">
                            <h2 id="tab{{$val->id}}" class="heading-title">{{$val->header}}</h2>
                            <div class="content">
                                {!! $val->content !!}
                            </div>
                        </div>
                        <?php $images = Images::where('section_id',$val->section_id)->get(); ?>
                        @if(count($images) > 1)
                        <div class="owl-carousel owl-theme project_slider mt-3">
                            @foreach($images as $key => $img)
                            <div class="item"><img src="data/product/detail/{{$img->img}}"></div>
                            @endforeach
                        </div>
                        @else
                            @foreach($images as $key => $img)
                            <div class="mt-3">
                                <img src="data/product/detail/{{$img->img}}">
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-xl-4 order-xl-2">
                <!--============== Recent Property Widget Start ==============-->
                <div class="widget widget_recent_property">
                    <h5 class="text-secondary mb-4">Dự án liên quan</h5>
                    <ul>
                        @foreach($related_post as $val)
                        <li>
                            <img src="data/product/{{$val->Post->img}}" alt="">
                            <div class="thumb-body">
                                <h6 class="listing-title"><a href="property-single-1.html">{{$val->name}}</a></h6>
                                <span class="listing-price">$3200<small>( Monthly )</small></span>
                                <ul class="d-flex quantity font-fifteen">
                                    <li title="Area"><span><i class="fa-solid fa-vector-square"></i></span>6500 Sqft</li>

                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--============== Recent Property Widget End ==============-->

                <div class="widget widget_contact bg-white border p-30 shadow-one rounded mb-30 sicky-120">
                    <h5 class="mb-4">Quản lý dự án</h5>
                    <div class="media mb-3">
                        <img class="rounded-circle me-3" src="frontend/assets/images/user1.jpg" alt="avata">
                        <div class="media-body">
                            <div class="h6 pb-0 m-0">Hằng Lee</div>
                            <span>Hotline: 0916 442 096</span><br>
                            <span>info@datxanhindochine.com</span>
                        </div>
                    </div>
                    <form class="quick-search form-icon-right" action="#" method="post">
                        <div class="form-row">
                            <div class="col-12 mb-10">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-12 mb-10">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-12 mb-10">
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary w-100">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
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