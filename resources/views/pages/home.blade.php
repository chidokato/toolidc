@extends('layout.index')

@section('title') Công Ty Cổ Phần Bất Động Sản Indochine @endsection
@section('description') Công Ty Cổ Phần Bất Động Sản Indochine là công ty thành viên của Đất Xanh Miền Bắc - UY TÍN số 1 thị trường BĐS Việt Nam @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div id="page_wrapper" class="bg-white">
    @include('layout.header')


<div class="full-row p-0 overflow-hidden bg-light">
    <div class="owl-carousel owl-theme home_slider">
        @foreach($slider as $key => $val)
        <div class="item"><img src="data/home/{{$val->slider->img}}"></div>
        @endforeach
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <form class="banner-search-form shadow-sm bg-white mb-3 quick-search form-icon-right position-relative" action="#" method="post" style="margin-top: -60px; z-index: 1">
                    <div class="row row-cols-lg-4 row-cols-md-4 row-cols-1 g-4">
                        <div class="col">
                            <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa...">
                        </div>
                        <div class="col">
                            <select class="form-control">
                                <option>-- Danh mục --</option>
                                <option>Chung cư</option>
                                <option>Biệt thự</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control">
                                <option>-- Khu Vực --</option>
                                <option>Hà Nội</option>
                                <option>Hồ Chí Minh</option>
                            </select>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary w-100">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- =============== Counting ================-->

        <!--============== Recent Property Start ==============-->
        <div class="full-row bg-light">
            <div class="container">
                <div class="row">
                    <div class="col mb-4">
                        <div class="align-items-center d-flex">
                            <div class="me-auto">
                                <h2 class="d-table">Dự án nổi bật</h2>
                            </div>
                            <a href="property-grid-v1.html" class="ms-auto btn-link">Xem tất cả</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="3block-carusel nav-disable owl-carousel">
                            @foreach($project->PostTranslation as $val)
                            <div class="item">
                                <div class="property-grid-1 property-block bg-white transation-this">
                                    <div class="overflow-hidden position-relative transation thumbnail-img bg-secondary hover-img-zoom">
                                        <a href="{{$project->Category->slug}}/{{$val->post->slug}}"><img class="img-col-3" src="data/product/{{$val->post->img}}" alt="{{$val->name}}"></a>
                                        <a href="{{$project->Category->slug}}" class="listing-ctg text-white"><i class="fa-solid fa-building"></i><span>{{$project->name}}</span></a>
                                        <ul class="position-absolute quick-meta">
                                            <li class="md-mx-none"><a data-fancybox="" href="https://www.youtube.com/watch?v=bh-klGboIg8" class="" style="z-index: 10"><i class="flaticon-zoom-increasing-symbol flat-mini"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="property_text p-4">
                                        <h5 class="listing-title line"><a href="{{$project->Category->slug}}/{{$val->post->slug}}">{{$val->name}}</a></h5>
                                        <span class="listing-location"><i class="fas fa-map-marker-alt"></i> {{$val->address}}, {{$val->DistrictTranslation->name}}, {{$val->ProvinceTranslation->name}} </span>
                                        <span class="listing-price"><small>Giá bán: </small>{{$val->price}} {{$val->unit}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Recent Property End ==============-->


         <!--============== Property Location Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-secondary text-center mb-5">
                            <h2 class="text-secondary mx-auto mb-4">Find Properties in These Cities</h2>
                            <span class="d-table w-50 w-sm-100 sub-title mx-auto text-center">Mauris primis turpis Laoreet magna felis mi amet quam enim curae. Sodales semper tempor dictum faucibus habitasse.</span>
                        </div>
                    </div>
                </div>
                <div class="row g-4 location-style-1">
                    <div class="col-md-6">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img src="frontend/assets/images/property/3.png" alt="real estate template">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="mb-0"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">Miami</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">482 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img src="frontend/assets/images/property/4.png" alt="real estate template">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="transation"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">Los Angeles</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">357 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img src="frontend/assets/images/property/7.png" alt="real estate template">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="mb-0"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">New Maxico</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">192 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img src="frontend/assets/images/property/8.png" alt="real estate template">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="mb-0"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">Varginha</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">192 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img src="frontend/assets/images/property/13.png" alt="real estate template">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="mb-0"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">Florida</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">192 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img src="frontend/assets/images/property/18.png" alt="real estate template">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="mb-0"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">New York</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">812 Listing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="entry-wrapper hover-img-zoom position-relative h-100">
                            <div class="overflow-hidden transation thumbnail-img">
                                <img src="frontend/assets/images/property/15.png" alt="real estate template">
                            </div>
                            <div class="d-flex position-absolute align-items-center bottom-0 p-4 w-100">
                                <h5 class="mb-0"><a class="btn btn-white font-700 rounded-pill text-nowrap" href="#">Lasvegas</a></h5>
                                <span class="d-table ms-4 fs-5 font-500 text-white">256 Listing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Property Location End ==============-->

        <!--============== Property Category Start ==============-->
        <div class="full-row bg-secondary">
            <div class="container">
                <div class="row">
                    <div class="col mb-5">
                        <h2 class="down-line w-50 mx-auto mb-4 text-center text-white w-sm-100">What You Area Looking For?</h2>
                        <span class="d-table w-50 w-sm-100 sub-title text-white fw-normal mx-auto text-center">Mauris primis turpis Laoreet magna felis mi amet quam enim curae. Sodales semper tempor dictum faucibus habitasse.</span>
                    </div>
                </div>
                <div class="row row-cols-lg-5 row-cols-sm-4 row-cols-1 g-3 justify-content-center">
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary h-100">
                            <div class="box-70px position-relative">
                                <i class="flaticon-home flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Living House</h5>
                            <p>Preview listing of accommodation property living houses</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary h-100">
                            <div class="box-70px position-relative">
                                <i class="flaticon-sketch-1 flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Solid Land</h6>
                            <p>Hight listed solid use-able land in most popular area for development</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary h-100">
                            <div class="box-70px position-relative">
                                <i class="flaticon-online-booking flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Office Floor</h6>
                            <p>Preview most popular are office building listed category</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-center d-flex flex-column align-items-center hover-text-white p-4 bg-white transation text-general hover-bg-primary h-100">
                            <div class="box-70px position-relative">
                                <i class="flaticon-shop flat-medium d-inline-block text-primary position-absolute xy-center"></i>
                            </div>
                            <h6 class="d-block text-secondary">Commercial</h6>
                            <p>Listing Commercial property for business and factory development</p>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--============== Property Category End ==============-->



        <!--============== Testimonial Section Start ==============-->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col mb-5">
                        <span class="text-primary tagline pb-2 d-table m-auto">Testimonial</span>
                        <h2 class="down-line w-50 mx-auto mb-4 text-center w-sm-100">Whay Client Says About Us</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="testimonial-simple text-center px-5">
                            <div class="text-carusel owl-carousel">
                                <div class="item">
                                    <i class="flaticon-right-quote flat-large text-primary d-table mx-auto"></i>
                                    <blockquote class="text-secondary fs-5 fst-italic">“ Posuere mus curabitur parturient scelerisque suspendisse elementum facilisis dignissim non purus torquent turpis interdum hendrerit erat ultrices pretium risus elementum. Fringilla aliquet mattis lacinia quam a montes maecenas parturient urna varius. Sollicitudin pede sapien taciti dui. ”</blockquote>
                                    <h4 class="mt-4 font-400">Mark Wiggins</h4>
                                    <span class="text-primary font-fifteen">CEO ( Grodins Group )</span>
                                </div>
                                <div class="item">
                                    <i class="flaticon-right-quote flat-large text-primary d-table mx-auto"></i>
                                    <blockquote class="text-secondary fs-5 fst-italic">“ Posuere mus curabitur parturient scelerisque suspendisse elementum facilisis dignissim non purus torquent turpis interdum hendrerit erat ultrices pretium risus elementum. Fringilla aliquet mattis lacinia quam a montes maecenas parturient urna varius. Sollicitudin pede sapien taciti dui. ”</blockquote>
                                    <h4 class="mt-4 font-400">Mark Wiggins</h4>
                                    <span class="text-primary font-fifteen">CEO ( Grodins Group )</span>
                                </div>
                                <div class="item">
                                    <i class="flaticon-right-quote flat-large text-primary d-table mx-auto"></i>
                                    <blockquote class="text-secondary fs-5 fst-italic">“ Posuere mus curabitur parturient scelerisque suspendisse elementum facilisis dignissim non purus torquent turpis interdum hendrerit erat ultrices pretium risus elementum. Fringilla aliquet mattis lacinia quam a montes maecenas parturient urna varius. Sollicitudin pede sapien taciti dui. ”</blockquote>
                                    <h4 class="mt-4 font-400">Mark Wiggins</h4>
                                    <span class="text-primary font-fifteen">CEO ( Grodins Group )</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Testimonial Section End ==============-->

        <!--============== Reg Banner Start ==============-->
        <div class="full-row bg-center paraxify" style="background-image: url(frontend/assets/images/background/bg-1.png); background-repeat: no-repeat; background-position: center top;">
            <div class="container position-relative z-index-9">
                <div class="row align-items-center">
                    <div class="col-lg-7 text-white">
                        <h3 class="text-white mb-3">Do you want to sell your property ?</h3>
                        <p>You can also fill out our online form if you are interested in learning more.</p>
                        <span class="h6 d-inline-block text-white">Please Call : +902 100 523551</span>
                    </div>
                    <div class="col-lg-5">
                        <div class="simple-video-play d-flex">
                            <div class="position-relative d-inline-block">
                                <a data-fancybox href="https://www.youtube.com/watch?v=N5dT2TztcHg&t" class="rounded-circle position-relative bg-primary" style="z-index: 10"><i class="flaticon-play-button position-relative xy-center flat-mini rounded-circle text-white"></i></a>
                                <div class="loader position-absolute xy-center">
                                    <div class="loader-inner ball-scale-multiple">
                                        <div class="bg-primary"></div>
                                        <div class="bg-primary"></div>
                                    </div><span class="tooltip">
                                  <b>ball-scale-multiple</b></span>
                                </div>
                            </div>
                            <div class="ps-4 text-white font-medium">Play Video</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Reg Banner End ==============-->

        <!--============== Blog Section Start ==============-->
        <div class="full-row bg-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <span class="pb-2 d-table w-50 w-sm-100 text-primary m-auto text-center tagline">Our Recent Post</span>
                        <h2 class="down-line w-50 w-sm-100 mx-auto text-center mb-5">Publish What We Think, About Our Company Activities</h2>
                    </div>
                </div>
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                            <div class="post-image position-relative overlay-secondary">
                                <img src="frontend/assets/images/blog/1.png" alt="Image not found!">
                                <div class="position-absolute xy-center">
                                    <div class="overflow-hidden text-center">
                                        <a class="text-white first-push-up transation font-large" href="#">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content p-35">
                                <h5 class="d-block font-400 mb-3"><a href="#" class="transation text-dark hover-text-primary">Our latest development projects by more efficie.</a></h5>
                                <p>Nostra maecenas malesuada vel lobortis sociis mus aliquam tempor etiam ipsum pretium cursus.</p>
                                <div class="post-meta text-uppercase">
                                    <a href="#"><span>By Robert Haven</span></a>
                                    <a href="#"><span>Dec 25, 2019</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                            <div class="post-image position-relative overlay-secondary">
                                <img src="frontend/assets/images/blog/2.png" alt="Image not found!">
                                <div class="position-absolute xy-center">
                                    <div class="overflow-hidden text-center">
                                        <a class="text-white first-push-up transation font-large" href="#">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content p-35">
                                <h5 class="d-block font-400 mb-3"><a href="#" class="transation text-dark hover-text-primary">Cultivating market leadership from the inside.</a></h5>
                                <p>Nostra maecenas malesuada vel lobortis sociis mus aliquam tempor etiam ipsum pretium cursus.</p>
                                <div class="post-meta text-uppercase">
                                    <a href="#"><span>By Robert Haven</span></a>
                                    <a href="#"><span>Dec 25, 2019</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom mb-4">
                            <div class="post-image position-relative overlay-secondary">
                                <img src="frontend/assets/images/blog/3.png" alt="Image not found!">
                                <div class="position-absolute xy-center">
                                    <div class="overflow-hidden text-center">
                                        <a class="text-white first-push-up transation font-large" href="#">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-content p-35">
                                <h5 class="d-block font-400 mb-3"><a href="#" class="transation text-dark hover-text-primary">We are the next generation of the advertising.</a></h5>
                                <p>Nostra maecenas malesuada vel lobortis sociis mus aliquam tempor etiam ipsum pretium cursus.</p>
                                <div class="post-meta text-uppercase">
                                    <a href="#"><span>By Robert Haven</span></a>
                                    <a href="#"><span>Dec 25, 2019</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Blog Section End ==============-->
@include('layout.footer')
</div>
@endsection


@section('script')

@endsection