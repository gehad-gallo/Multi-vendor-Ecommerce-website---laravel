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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--main/custom js-->
    <script src="{{asset('/frontend/assets/js/main.js')}}"></script>
    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    
        @if(session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    
        @if(session('info'))
            toastr.info("{{ session('info') }}");
        @endif
    </script>
    
</body>

</html>