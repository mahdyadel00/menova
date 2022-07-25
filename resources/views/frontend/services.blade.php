@extends('frontend.layouts.master')

@section('title')
Menovahub-Services
@endsection

@section('style')
@endsection

@section('content')

<!-- Breadcrumbs -->
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumb-text">
            <ol>
                <li><a href="{{route('home')}}">@lang('site.home')</a></li>
                <li>@lang('site.services')</li>
            </ol>
            <h2>@lang('site.services')</h2>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->
 <!-- ======= Services Section ======= -->
 <section id="services" class="services mt-5 mb-3">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>@lang('site.services')</h2>
        <p>@lang('front.services_desc')</p>
      </header>

      <div class="row gy-4 mt-3">
      @foreach($services as $service)
        <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
          <div class="service-box blue">
            <img src="{{ $service->image_path }}" alt="{{  $service->data->isNotEmpty() ? $service->data->first()->name : '' }}">
            {{-- <i class="{{ $service->icon }}"></i> --}}
            <h3>{{  $service->data->isNotEmpty() ? $service->data->first()->name : '' }}</h3>
            <p>{!! $service->data->isNotEmpty() ? $service->data->first()->description : '' !!}</p>
          </div>
        </div>
        @endforeach

        <!-- <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
          <div class="service-box orange">
            <i class="ri-discuss-line icon"></i>
            <h3>Eosle Commodi</h3>
            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
          <div class="service-box green">
            <i class="ri-discuss-line icon"></i>
            <h3>Ledo Markt</h3>
            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
          <div class="service-box red">
            <i class="ri-discuss-line icon"></i>
            <h3>Asperiores Commodi</h3>
            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
          </div>
        </div> -->



      </div>

    </div>

  </section><!-- End Services Section -->

@endsection

@section('script')
@endsection
