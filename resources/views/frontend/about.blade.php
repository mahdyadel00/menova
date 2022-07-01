@extends('frontend.layouts.master')

@section('title')
   Menovahub - About
@endsection

@section('style')
@endsection

@section('content')
<section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">@lang('site.home')</a></li>
          <li>@lang('site.about_us')</li>
        </ol>
        <h2>@lang('site.about_us')</h2>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= Features Section ======= -->
<section id="features" class="features">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2> @lang('site.about_us') </h2>
    <p> about menova hub </p>
  </header>

  <div class="row">

    <div class="col-lg-6">
      <img src="assets/img/features.png" class="img-fluid" alt="">
    </div>

    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
      <div class="row align-self-center gy-4">
      
        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
          <div class="feature-box d-flex align-items-center">
            <i class="bi bi-check"></i>
            <h3>{{ $about_us->data->isNotEmpty() ? $about_us->data->first()->title : '' }}</h3>
          </div>
      </div>
   
      </div>
    </div>

  </div> <!-- / row -->

  <!-- Feature Tabs -->
  <div class="row feture-tabs" data-aos="fade-up">
    <div class="col-lg-6">
      <h3>{{ $about_us->data->isNotEmpty() ? $about_us->data->first()->title : '' }}</h3>

      <!-- Tabs -->
      <ul class="nav nav-pills mb-3">
        <li>
          <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Saepe fuga</a>
        </li>
        <li>
          <a class="nav-link" data-bs-toggle="pill" href="#tab2">Voluptates</a>
        </li>
        <li>
          <a class="nav-link" data-bs-toggle="pill" href="#tab3">Corrupti</a>
        </li>
      </ul><!-- End Tabs -->

      <!-- Tab Content -->
      <div class="tab-content">

        <div class="tab-pane fade show active" id="tab1">
          @foreach($about_us1 as $about1)
          <p>{!! $about1->data->isNotEmpty() ? $about1->data->first()->description : '' !!}</p>
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-check2"></i>
            <h4>{{ $about1->data->isNotEmpty() ? $about1->data->first()->title : '' }}</h4>
          </div>
          @endforeach
        </div><!-- End Tab 1 Content -->

        <div class="tab-pane fade show" id="tab2">
        @foreach($about_us2 as $about2)
        <p>{!! $about2->data->isNotEmpty() ? $about2->data->first()->description : '' !!}</p>
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-check2"></i>
            <h4>{{ $about2->data->isNotEmpty() ? $about2->data->first()->title : '' }}</h4>
          </div>
          @endforeach
        </div><!-- End Tab 2 Content -->

        <div class="tab-pane fade show" id="tab3">
        @foreach($about_us3 as $about3)
        <p>{!! $about3->data->isNotEmpty() ? $about3->data->first()->description : '' !!}</p>
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-check2"></i>
            <h4>{{ $about3->data->isNotEmpty() ? $about3->data->first()->title : '' }}</h4>
          </div>
          @endforeach
        </div><!-- End Tab 3 Content -->

      </div>

    </div>

    <div class="col-lg-6">
      <img src="assets/img/features-2.png" class="img-fluid" alt="">
    </div>

  </div><!-- End Feature Tabs -->

  <!-- Feature Icons -->
  <div class="row feature-icons" data-aos="fade-up">
    <h3>Ratione mollitia eos ab laudantium rerum beatae quo</h3>

    <div class="row">

      <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
        <img src="assets/img/features-3.png" class="img-fluid p-4" alt="">
      </div>

      <div class="col-xl-8 d-flex content">
        <div class="row align-self-center gy-4">
          @foreach($abouts as $about)
          <div class="col-md-6 icon-box" data-aos="fade-up">
            <i class="ri-line-chart-line"></i>
            <div>
              <h4>{{ $about->data->isNotEmpty() ? $about->data->first()->title : '' }}</h4>
              <p>{!! $about->data->isNotEmpty() ? $about->data->first()->description : '' !!}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>

    </div>

  </div><!-- End about Icons -->

</div>

</section><!-- End about  page Section --

 <!-- ======= Clients Section ======= -->
 <section id="clients" class="clients">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Our Clients</h2>
    <p>Temporibus omnis officia</p>
  </header>

  <div class="clients-slider swiper">
    <div class="swiper-wrapper align-items-center">
      <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>

</section><!-- End Clients Section -->


@endsection

@section('script')
@endsection
