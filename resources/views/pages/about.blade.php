@extends('layout.index')

@section('title') Công Ty Cổ Phần Bất Động Sản Indochine @endsection
@section('description') Công Ty Cổ Phần Bất Động Sản Indochine là công ty thành viên của Đất Xanh Miền Bắc – đơn vị trực thuộc Tập Đoàn Đất Xanh @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')
<div id="page_wrapper" class="bg-light">
@include('layout.header_page')

<div class="page-banner-simple bg-secondary py-0" style="">
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h3 class="banner-title text-white">Chúng ta là ai ?</h3>
                <span class="banner-tagline font-medium text-white">Chúng tôi lập chiến lược, thiết kế & phát triển để tạo ra những sản phẩm có giá trị.</span>
            </div>
        </div>
    </div> -->
    <style type="text/css">
        .page-banner-simple{ margin-top: 70px; background: url(data/about/bg-news.jpg) no-repeat center center; height: 350px }
    </style>
</div>

<div class="full-row pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-secondary mb-5">
                            <span class="tagline-2 text-primary">Capablities</span>
                            <h2 class="text-secondary mb-4">Awesome Real Estate Company for Housing and Construction.</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col border-start border-geay mb-5">
                                <div class="simple-thumb transation px-4">
                                    <span class="h3 down-line text-general mb-4 d-table">01</span>
                                    <h5 class="my-3"><a href="#" class="text-secondary">Property Booking</a></h5>
                                    <p>Creating a higher spacing and how people move through a unique and impactful campaign.</p>
                                </div>
                            </div>
                            <div class="col border-start border-geay mb-5">
                                <div class="simple-thumb transation px-4">
                                    <span class="h3 down-line text-general mb-4 d-table">02</span>
                                    <h5 class="my-3"><a href="#" class="text-secondary">Payment Guarantee</a></h5>
                                    <p>Creating a higher spacing and how people move through a unique and impactful campaign.</p>
                                </div>
                            </div>
                            <div class="col border-start border-geay mb-5">
                                <div class="simple-thumb transation px-4">
                                    <span class="h3 down-line text-general mb-4 d-table">03</span>
                                    <h5 class="my-3"><a href="#" class="text-secondary">House Management</a></h5>
                                    <p>Creating a higher spacing and how people move through a unique and impactful campaign.</p>
                                </div>
                            </div>
                            <div class="col border-start border-geay mb-5">
                                <div class="simple-thumb transation px-4">
                                    <span class="h3 down-line text-general mb-4 d-table">04</span>
                                    <h5 class="my-3"><a href="#" class="text-secondary">Property Deal</a></h5>
                                    <p>Creating a higher spacing and how people move through a unique and impactful campaign.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="full-row paraxify" style="background-image: url(frontend/assets/images/background/bg-4.png); background-repeat: no-repeat; background-position: center -12.97px; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8">
                        <div class="text-white">
                            <span class="tagline text-primary">PROUDLY LOCAL, GOING GLOBAL</span>
                            <h3 class="mb-4 text-white">VỀ CÔNG TY CỔ PHẦN BĐS INDOCHINE</h3>
                            <p>Công Ty Cổ Phần Bất Động Sản Indochine là công ty thành viên của Đất Xanh Miền Bắc – đơn vị trực thuộc Tập Đoàn Đất Xanh – một trong những đơn vị bất động sản chuyên nghiệp và uy tín nhất Việt Nam. Trong hành trình 12 năm hoạt động, chúng tôi đã vươn lên trở thành Đơn vị phân phối & cho thuê bất động sản hàng đầu cả nước với thị phần lớn nhất miền Bắc.</p>
                            <p>Không chỉ hướng đến mục tiêu đem đến những sản phẩm bất động sản ưu việt cho khách hàng nội địa, với khát vọng vươn tầm thế giới, trở thành đơn vị kinh tế toàn cầu trong tương lai, Công Ty Cổ Phần Bất Động Sản Indochine tự hào tiên phong dẫn đầu trong lĩnh vực “xuất khẩu” bất động sản Việt Nam ra thị trường quốc tế, phân phối các sản phẩm bất động sản đầu tư – an cư chất lượng tới khách hàng và nhà đầu tư nước ngoài.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="full-row bg-light pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="text-secondary mb-lg-5">
                            <span class="tagline-2 text-primary">Capabilities</span>
                            <h2 class="text-secondary mb-4">Creative studio with art &amp; technologies.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row row-cols-xl-2 row-cols-1">
                    <div class="col px-0"><img src="https://datxanhindochine.com/wp-content/uploads/2022/10/IMG-INTRODUCE.png" alt="image not found"></div>
                    <div class="col bg-white" style="margin-top: -100px;">
                        <div class="w-75 w-lg-100 sm-px-0" style="padding:50px 80px">
                            <div class="simple-video-play d-flex mb-3">
                                <div class="position-relative d-inline-block">
                                    <a data-fancybox="" href="https://www.youtube.com/watch?v=bh-klGboIg8" class="rounded-circle position-relative bg-secondary" style="z-index: 10"><i class="flaticon-play-button position-relative xy-center flat-mini rounded-circle text-white"></i></a>
                                    <div class="loader position-absolute xy-center">
                                        <div class="loader-inner ball-scale-multiple">
                                            <div></div>
                                            <div></div>
                                        </div><span class="tooltip">
									  <b>ball-scale-multiple</b></span>
                                    </div>
                                </div>
                                <div class="ps-4 text-secondary font-medium">Play Video</div>
                            </div>

                            <h2 class="text-secondary mb-5">We work in the fields of UI/UX design and art direction.</h2>
                            <div class="bb-accordion ac-single-show accordion-plus-left">
                                <div class="ac-card">
                                    <a class="ac-toggle text-dark text-truncate active" href="#">Website and Mobile App Design</a>
                                    <div class="ac-collapse show" style="display: block;">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                    </div>
                                </div>
                                <div class="ac-card">
                                    <a class="ac-toggle text-dark text-truncate" href="#">Motion Graphics and Animation</a>
                                    <div class="ac-collapse">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                    </div>
                                </div>
                                <div class="ac-card">
                                    <a class="ac-toggle text-dark text-truncate" href="#">User Experience and Brand Strategy</a>
                                    <div class="ac-collapse">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                    </div>
                                </div>
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