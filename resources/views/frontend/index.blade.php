@extends('frontend.layouts.master')

@section('title')
    Menovahub - Home
@endsection

@section('style')
@endsection

@section('content')
    <!-- ======= hero Section ======= -->
    {{-- <section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
            @foreach ($sliders as $slider)

                <div class="carousel-item active" ><img src="{{ $slider->image_path  }}">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown"> {{ $slider->name }}</h2>
                            <p class="animate__animated animate__fadeInUp">{!! $slider->description !!}</p>
                            @if (!auth()->check())
                                <a href="{{ route('login') }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            @else
                                <a href="{{ route('about_us.index') }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </div>
</section><!-- End Hero Section --> --}}

    {{-- <div class="carousel">
        @foreach ($sliders as $slider)
            <div class="carousel--item" style="background-image: url(assets/img/hero-carousel/3.jpg)">
                <div class="carousel--item-text">
                    <a href="" class="btn btn-get-started">@lang('site.get_started')</a>
                </div>
        @endforeach

    </div> --}}
    <!-- ======= hero Section =======-->

    <div class="carousel">
        @foreach ($sliders as $slider)
            <div class="carousel--item" style="background-image: url('{{ $slider->image_path }}">
                <div class="carousel--item-text">

                    <P>{!! $slider->data->isNotEmpty() ? $slider->data->first()->description : '' !!}</P>
                    @if (!auth()->check())
                        <a href="{{ route('login') }}" class="btn-join">@lang('site.get_started')</a>
                    @endif

                </div>
            </div>
        @endforeach


    </div>

    <!-- End Hero Section -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about sec-padding ">
        <div class="container " data-aos="fade-up">
            <header class="sec-heading ">
                <h2>@lang('site.about_us')</h2>
            </header>
            <div class="row gx-0">
                <div class="col-sm-12 d-flex flex-column justify-content-center " data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>@lang('site.who_are_you')</h3>
                        <p>
                            {!! $abouts->data->isNotEmpty() ? $abouts->data->first()->description : '' !!}
                        </p>
                    </div>
                </div>
            </div>
            <div id="values" class="values">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        @foreach ($about_us as $about)
                            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="box">
                                    <img src="{{ $about->image_path }}" class="img-fluid" alt="">
                                    <h3>{{ $about->about_title }}</h3>
                                    <p>{!! Str::limit($about->about_description, 100) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center sec-padding ">

                        <a href="{{ route('about_us.index') }}" class="btn-read-more"><span> @lang('site.read_more') </span> <i
                                class="bi bi-arrow-right"></i> </a>
                    </div>
                </div>
            </div><!-- End Values  -->
        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->

    <section id="service" class="service sec-bg sec-padding">
        <div class="container">
            <div class="service-area">
                <div class="sec-heading" data-aos="fade-up">
                    <h2>@lang('site.services')</h2>
                    <p>@lang('site.how_can_we_help_you') </p>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon"><i class="{{ $service->icon }}"></i></div>
                                <h4 class="service-title"><a href="/services">{{ $service->name }}</a></h4>
                                <p class="service-description">{!! Str::limit($service->description, 100) !!}</p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--end services section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts sec-padding">
        <div class="container">
            <div class="row">
                <div class="image col-xl-6  col-lg-7 d-flex align-items-stretch justify-content-center justify-content-xl-start"
                    data-aos="fade-right" data-aos-delay="150">
                    <img src="{{ asset('frontend/assets/img/clients/client-4.png') }}" alt="" class="img-fluid">
                </div>

                <div class="col-xl-6 col-lg-5  d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left"
                    data-aos-delay="300">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="row">
                            @foreach ($counters as $counter)
                                <div class="col-md-6 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="{{ $counter->icon }}"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="{{ $counter->counter }}"
                                            data-purecounter-duration="1" class="purecounter"></span>

                                        <p><strong>{{ $counter->data->isNotEmpty() ? $counter->data->first()->title : '' }}</strong>
                                            {!! Str::limit($counter->data->isNotEmpty() ? $counter->data->first()->description : '', 100) !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= connect Section ======= -->
    <div id="connect" class="sec-bg sec-padding">
        <div class="container">
            <div class="connect-area">
                <div class="sec-heading ">
                    <h2>@lang('site.connects')</h2>
                </div>
                <div class="row">
                    @foreach ($connects as $connect)
                        <div class="col-md-6  col-xs-12">
                            <div class="sec-textbox">
                                <h4 class="sec-head">
                                    {{ $connect->data->isNotEmpty() ? $connect->data->first()->title : '' }}</h4>
                                <p class="sec-text">{!! $connect->data->isNotEmpty() ? mb_substr($connect->data->first()->description, 0, 100) : '' !!}</p>
                            </div>
                            @if (!auth()->check())
                                <a href="{{ route('login') }}" class="btn-join">@lang('site.join_now')</a>
                            @endif

                        </div>
                    @endforeach

                    <div class="col-md-6  col-xs-12">
                        <div class="connect-img">
                            <img src="{{ asset($connect->image_path) }}" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!-- End connect Section -->

    <!-- ======= advisor Section ======= -->
    <div id="advisor" class=" sec-padding">
        <div class="container">
            <div class="advisor-area">
                <div class="sec-heading text-center ">
                    <h2>@lang('site.advisor')</h2>
                </div>
                <div class="row">
                    <div class="col-md-6  col-xs-12">
                        <div class="">
                            <h4 class="sec-head">@lang('site.find_your_advisors')</h4>
                            <p class="sec-text">
                                {!! $advisor_first->data->isNotEmpty() ? $advisor_first->data->first()->description : '' !!}
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-5  d-flex align-items-stretch pt-4 pt-xl-0 ">
                        <div class="content d-flex flex-column justify-content-center">
                            <div class="row">
                                @foreach ($advisor as $advisor)
                                    <div class="col-md-6 d-md-flex align-items-md-stretch">
                                        <div class="advisor-box">
                                            <p> <i class="ri-service-fill"></i>
                                                {{ Str::limit($advisor->data->isNotEmpty() ? $advisor->data->first()->title : '', 100) }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach


                            </div class="col-md-12 d-md-flex ">
                            <div class="advisor-join sec-padding">
                                @if (!auth()->check())
                                    <a href="{{ route('login') }}" class="btn-join">@lang('site.join_now')</a>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
    </div>
    </div>
    <!-- End advisor Section -->

    <!-- ======= Raise Section ======= -->
    <div id="raise" class="sec-bg sec-padding">
        <div class="container">
            <div class="raise-area">
                <div class="sec-heading text-center ">
                    <h2>@lang('site.rais')</h2>
                </div>
                <div class="row">

                    <div class="col-md-6  col-xs-12">
                        <div class="sec-textbox">
                            <h4 class="sec-head">{{ $rais->data->isNotEmpty() ? $rais->data->first()->title : '' }}
                            </h4>
                            <p class="sec-text">{!! Str::limit($rais->description, 100) !!} </p>
                        </div>

                        <div>
                            @if (!auth()->check())
                                <a href="{{ route('login') }}" class="btn-join">@lang('site.join_now')</a>
                            @endif

                        </div>
                    </div>

                    <div class="col-md-6  col-xs-12">
                        <div class="connect-img">
                            <img src="{{ asset('frontend/assets/img/raise.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!-- End Raise Section -->
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts sec-padding">
        <div class="container" data-aos="fade-up">
            <header class="sec-heading">
                <h2>@lang('site.blog')</h2>
                <p>@lang('site.recent_posts_form_our_blog')</p>
            </header>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ $blog->image_path }}" class="img-fluid"
                                    alt="{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : '' }}"></div>
                            <span
                                class="post-date">{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : '' }}</span>
                            <h3 class="post-title">{!! $blog->data->isNotEmpty() ? mb_substr($blog->data->first()->body, 0, 100) : '' !!}</h3>
                            <a href="{{ route('blogs.show', $blog->id) }}"
                                class="readmore stretched-link mt-auto"><span>@lang('site.read_more')</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section><!-- End Recent Blog Posts Section -->
@endsection

@section('script')
@endsection
