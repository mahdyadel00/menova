<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Vendor CSS Files -->
<link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<link href="{{asset('frontend/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
{{-- <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet"> --}}
<link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">


<!--  Main CSS File -->
@if (app()->getLocale() == 'ar')
<link href="{{URL::asset('frontend/assets/css/style-rtl.css')}}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;500;700&display=swap" rel="stylesheet">
@else
<link href="{{URL::asset('frontend/assets/css/style.css')}}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&family=Tajawal:wght@300;400&family=Work+Sans:ital,wght@0,300;0,600;0,700;0,800;1,200;1,600&display=swap" rel="stylesheet">
@endif

@yield('style')