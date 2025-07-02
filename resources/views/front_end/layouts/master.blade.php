<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Sazao || e-Commerce HTML Template</title>
    <link rel="icon" type="{{asset('/frontend/assets/images/png')}}" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/venobox.min.css')}}">

    <link rel="stylesheet" href="{{asset('/frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('/frontend/assets/css/rtl.css')}}"> -->
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    @include('front_end.layouts.header')
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MAIN MENU START
    ==============================-->
    @include('front_end.layouts.nav')
    <!--============================
        MAIN MENU END
    ==============================-->

    @yield('content')


    <!-- sections -->
    @include('front_end.sections.mobile_menu')
    @include('front_end.sections.product_model_view')
    @include('front_end.sections.banner_part_2')
    @include('front_end.sections.flash_sell')
    @include('front_end.sections.monthly_top_product')
    @include('front_end.sections.brand_slider')
    @include('front_end.sections.single_banner')
    @include('front_end.sections.hot_deals')
    @include('front_end.sections.electronic_part_1')
    @include('front_end.sections.electronic_part_2')
    @include('front_end.sections.large_banner')
    @include('front_end.sections.weekly_best_item')
    @include('front_end.sections.home_service')
    @include('front_end.sections.home_blogs')
    

    @include('front_end.layouts.footer')


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{asset('/frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('/frontend/assets/js/Font-Awesome.js')}}"></script>
    <!--select2 js-->
    <script src="{{asset('/frontend/assets/js/select2.min.js')}}"></script>
    <!--slick slider js-->
    <script src="{{asset('/frontend/assets/js/slick.min.js')}}"></script>
    <!--simplyCountdown js-->
    <script src="{{asset('/frontend/assets/js/simplyCountdown.js')}}"></script>
    <!--product zoomer js-->
    <script src="{{asset('/frontend/assets/js/jquery.exzoom.js')}}"></script>
    <!--nice-number js-->
    <script src="{{asset('/frontend/assets/js/jquery.nice-number.min.js')}}"></script>
    <!--counter js-->
    <script src="{{asset('/frontend/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/frontend/assets/js/jquery.countup.min.js')}}"></script>
    <!--add row js-->
    <script src="{{asset('/frontend/assets/js/add_row_custon.js')}}"></script>
    <!--multiple-image-video js-->
    <script src="{{asset('/frontend/assets/js/multiple-image-video.js')}}"></script>
    <!--sticky sidebar js-->
    <script src="{{asset('/frontend/assets/js/sticky_sidebar.js')}}"></script>
    <!--price ranger js-->
    <script src="{{asset('/frontend/assets/js/ranger_jquery-ui.min.js')}}"></script>
    <script src="{{asset('/frontend/assets/js/ranger_slider.js')}}"></script>
    <!--isotope js-->
    <script src="{{asset('/frontend/assets/js/isotope.pkgd.min.js')}}"></script>
    <!--venobox js-->
    <script src="{{asset('/frontend/assets/js/venobox.min.js')}}"></script>
    <!--classycountdown js-->
    <script src="{{asset('/frontend/assets/js/jquery.classycountdown.js')}}"></script>

    <!--main/custom js-->
    <script src="{{asset('/frontend/assets/js/main.js')}}"></script>
</body>

</html>