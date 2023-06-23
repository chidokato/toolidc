@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div id="page_wrapper" class="bg-light">
@include('layout.header_page')

<div class="full-row py-4" style="margin-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col inner-page-banner">
                <h1 class="text-secondary">{{$data->name}}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{asset('')}}">{{__('lang.home')}}</a></li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{$data->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="full-row pt-0">
            <div class="container">
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                    @foreach($post as $val)
                        <div class="col iteam-product">
                            <!-- Property Grid -->
                            <div class="property-grid-1 property-block bg-white transation-this hover-shadow">
                                <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                    <a href="{{$data->category->slug}}/{{$val->post->slug}}"><img class="img-col-3" src="data/product/{{$val->post->img}}" alt="{{$val->name}}"></a>
                                    <a href="{{$data->category->slug}}" class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>{{$val->CategoryTranslation->name}}</span></a>
                                    <ul class="position-absolute quick-meta">
                                        <!-- <li class="md-mx-none"><a class="quick-view" href="#quick-view" title="Quick View"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="property_text p-4">
                                    <h5 class="listing-title"><a href="{{$data->category->slug}}/{{$val->post->slug}}">{{$val->name}}</a></h5>
                                    <span class="listing-location"><i class="fas fa-map-marker-alt"></i> {{$val->WardTranslation->name}}, {{$val->DistrictTranslation->name}}, {{$val->ProvinceTranslation->name}} </span>
                                    <span class="listing-price"><small>Giá bán: </small>{{$val->price}} {{$val->unit}} </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col mt-5">
                        <nav aria-label="Page navigation example">
                            {{ $post->links(); }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

@include('layout.footer')
</div>
@endsection
@section('script')

@endsection