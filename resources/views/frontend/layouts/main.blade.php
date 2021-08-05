<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:31:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>HONO - @yield('title', 'Multi Purpose HTML Template')</title>
    
    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/vendor/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/vendor/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/vendor/jquery-ui.min.css') }}"> 

    <!-- Plugin CSS -->
   <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/plugins/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/plugins/jquery.lineProgressbar.css') }}">
    <link rel="stylesheet" href="{{ asset('shop-hono/assets/css/plugins/aos.min.css') }}">

    <!-- Main CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('shop-hono/assets/sass/style.css') }}">      --}}
    
    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{ asset('shop-hono/assets/images/favicon.ico') }}" type="image/png">


    {{-- <link rel="stylesheet" href="{{ asset('shop-hono/assets/assets/css/vendor/vendor.min.css' )}}"> --}}
    <link rel="stylesheet" href="{{asset('shop-hono/assets/css/plugins/plugins.min.css')  }}">
    <link rel="stylesheet" href="{{asset('shop-hono/assets/css/style.min.css')  }}">
    @yield('css')

</head>
<body>

    @include('frontend.home.components.header')

    @yield('content')

    @include('frontend.home.components.footer')

    <script src="{{ asset('shop-hono/assets/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('shop-hono/assets/js/plugins/plugins.min.js') }}"></script> 
    <script src="{{ asset('shop-hono/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/addtocart.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @yield('js')

</body>

</html>