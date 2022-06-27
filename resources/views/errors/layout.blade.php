<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{asset('frontend/assets/img/menova.png')}}" rel="icon">
    <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend/assets/img/menova.png')}}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('pageTitle')</title>

    <!-- Google Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"rel="stylesheet">

    <!-- noty -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/noty/noty.css') }}">
    <script src="{{ asset('frontend/plugins/noty/noty.min.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/stylehome.css')}}">

    @if (app()->getLocale() == 'ar')
        <!-- RTL Styles -->
       <link rel="stylesheet" href="{{asset('frontend/assets/css/main-rtl.css')}}">
       <link rel="stylesheet" href="{{asset('assets/css/style-ar.css')}}">
    @endif
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

    @auth
        @include('frontend.includes._header',[])
    @else
        @include('frontend.includes._header-home',[])
    @endauth
    @include('frontend.includes._session')
    <main class="py-4" id="main">
        @yield('content')
    </main>

    @include('frontend.includes._footer',[])

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Scripts -->

    <!-- jquery -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('frontend/assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</div>
</body>
</html>
