<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">

    <title>{{ config('app.name', 'Laravel') }}|@yield('pageTitle')</title>

    <!-- Google Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/formslogin.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    {{--    @if (app()->getLocale() == 'ar')--}}
    {{--        <!-- RTL Styles -->--}}
    {{--    @endif--}}
    @stack('styles')
</head>
<body>
<div id="app">

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->


    <main class="py-4">
        @yield('content')
    </main>


<!-- Scripts -->

    <!-- jquery -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('frontend/assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('frontend/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('frontend/assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('frontend/assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('frontend/assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @stack('scripts')
</div>
</body>
</html>
