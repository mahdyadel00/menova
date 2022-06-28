<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mata &  Favicons -->
    @include('frontend.layouts.meta')

    <!--  Main Style header -->
    @include('frontend.layouts.style')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class=" d-flex align-items-center">
        @include('frontend.layouts.header')
    </header>
    <!-- End Header -->



    <main id="main">
        @yield('content')
    </main>
    <!-- ======= Footer & preloader ======= -->
        @include('frontend.layouts.footer')
    <!-- End Footer -->

    <!-- Vendor Scripts -->
  @include('frontend.layouts.footer-scripts')


</body>

</html>
