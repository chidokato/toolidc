<!doctype html>
<html>
<head>
    <!-- seo -->
    <base href="{{asset('')}}">
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')" />
    <meta name="news_keywords" content="@yield('keywords')" />
    <meta name="robots" content="@yield('robots')"/>
    <link rel="shortcut icon" href="{{asset('')}}/frontend/assets/img/favicon.png" />
    <link rel="canonical" href="@yield('url')"/>
    <link rel="alternate" href="{{asset('')}}" hreflang="vi-vn" />
    <!-- and seo -->
    <!-- og -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:site_name" content="site_name" />
    <meta property="og:images" content="@yield('img')" />
    <meta property="og:image" content="@yield('img')" />
    <meta property="og:image:alt" content="@yield('title')" />
    <!-- and og -->
    <!-- twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <!-- and twitter -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="article:author" content="admin" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Sen" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> 


    <!-- Required style of the theme -->
    <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="frontend/assets/css/all.min.css">
    <link rel="stylesheet" href="frontend/assets/css/animate.min.css">
    <link rel="stylesheet" href="frontend/assets/webfonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="frontend/assets/css/owl.css">
    <link rel="stylesheet" href="frontend/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="frontend/assets/css/layerslider.css">
    <link rel="stylesheet" href="frontend/assets/css/template.css">
    <link rel="stylesheet" href="frontend/assets/css/style.css">
    <link rel="stylesheet" href="frontend/assets/css/colors/color.css">
    <link rel="stylesheet" href="frontend/assets/css/loader.css">
    <link rel="stylesheet" href="frontend/assets/css/custom.css">
</head>

<body>

    <!-- <div class="preloader">
        <div class="loader xy-center"></div>
    </div> -->

    @yield('content')
    <!-- Javascript Files -->
    <script src="frontend/assets/js/jquery.min.js"></script>
    <script src="frontend/assets/js/greensock.js"></script>
    <script src="frontend/assets/js/layerslider.transitions.js"></script>
    <script src="frontend/assets/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="frontend/assets/js/popper.min.js"></script>
    <script src="frontend/assets/js/bootstrap.min.js"></script>
    <script src="frontend/assets/js/bootstrap-select.min.js"></script>
    <script src="frontend/assets/js/jquery.fancybox.min.js"></script>
    <script src="frontend/assets/js/owl.js"></script>
    <!-- <script src="frontend/assets/js/range/tmpl.js"></script>
    <script src="frontend/assets/js/range/jquery.dependClass.js"></script>
    <script src="frontend/assets/js/range/draggable.js"></script>
    <script src="frontend/assets/js/range/jquery.slider.js"></script> -->
    <script src="frontend/assets/js/wow.js"></script>
    <script src="frontend/assets/js/mixitup.min.js"></script>
    <script src="frontend/assets/js/paraxify.js"></script>
    <script src="frontend/assets/js/custom.js"></script>
    <script>
        $('#slider').layerSlider({
            sliderVersion: '6.0.0',
            type: 'fullwidth',
            responsiveUnder: 0,
            maxRatio: 1,
            slideBGSize: 'auto',
            hideUnder: 0,
            hideOver: 100000,
            skin: 'outline',
            fitScreenWidth: true,
            fullSizeMode: 'fitheight',
            navButtons: false,
            navStartStop: false,
            height:840,
            skinsPath: 'assets/skins/'
        });

        $(document).ready(function() {
          $("a[href*='#']:not([href='#])").click(function() {
            let target = $(this).attr("href");
            $('html,body').stop().animate({
              scrollTop: $(target).offset().top
            }, 100);
            event.preventDefault();
          });
        });

    </script>

    
</body>

</html>