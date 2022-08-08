@extends('frontend.layouts.master')

@section('title')
    Menovahub - About
@endsection

@section('style')
@endsection

@section('content')
    <!-- Breadcrumbs connect -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-text">
                <ol>
                    <li><a href="/">@lang('site.home')</a></li>
                    <li>@lang('site.about_us')</li>
                </ol>
                <h2>@lang('site.about_us')</h2>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= about inner page  Section ======= -->
    <section id="about-inner" class="about-inner sec-padding">

        <div class="container" data-aos="fade-up">

            <header class="sec-inner-heading text-center">
                <h2> @lang('site.about_us') </h2>
            </header>

            <!-- about inner Tabs -->
            <div class="row  about-inner-tabs" data-aos="fade-up">
                <div class="col-lg-6 ">
                    <div class="about-inner-text">
                        <h3>{{ $about_us->data->isNotEmpty() ? $about_us->data->first()->title : '' }}</h3>
                        <p>{!! Str::limit($about_us->data->isNotEmpty() ? $about_us->data->first()->description : '', 150) !!}</p>
                    </div>
                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li>
                            <a class="nav-link active" data-bs-toggle="pill" href="#tab1">@lang('site.start')</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#tab2">@lang('site.develop')</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#tab3">@lang('site.fund')</a>
                        </li>
                    </ul><!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            @foreach ($about_us3 as $about3)
                                <p>{!! $about3->data->isNotEmpty() ? $about3->data->first()->about_description : '' !!}</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4> {{ $about3->data->isNotEmpty() ? $about3->data->first()->about_title : '' }} </h4>
                                </div>
                            @endforeach
                        </div><!-- End Tab 1 Content -->

                        <div class="tab-pane fade show" id="tab2">
                            @foreach ($about_us2 as $about2)
                                <p>{!! $about2->data->isNotEmpty() ? $about2->data->first()->about_description : '' !!}</p>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>{!! $about2->data->isNotEmpty() ? $about2->data->first()->about_title : '' !!}</h4>
                                </div>
                            @endforeach
                        </div><!-- End Tab 2 Content -->

                        <div class="tab-pane fade show" id="tab3">
                            @foreach ($about_us1 as $about1)
                                <p>{!! $about1->data->isNotEmpty() ? $about1->data->first()->about_description : '' !!}</p>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>{!! $about1->data->isNotEmpty() ? $about1->data->first()->about_title : '' !!}</h4>
                                </div>
                            @endforeach
                        </div><!-- End Tab 3 Content -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <img src="{{ asset('frontend') }}/assets/img/about-inner.png" class="img-fluid" alt=""
                        data-aos="fade-up">
                </div>

            </div><!-- End Feature Tabs -->



        </div>

    </section>
    <!-- End about  page Section --

     <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients ">

        <div class="container" data-aos="fade-up">

            <header class="sec-inner-heading text-center ">
                <h2>عملائنا</h2>
                <p>@lang('site.be_part_of_our_family')</p>
            </header>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">

                    @foreach ($our_clients as $o_client)
                        <div class="swiper-slide"><img src="{{ $o_client->image_path }}" class="img-fluid" alt="">
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section><!-- End Clients Section -->
@endsection

@section('script')
@endsection
