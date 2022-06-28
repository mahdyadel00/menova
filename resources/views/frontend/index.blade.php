@extends('frontend.layouts.master')

@section('title')
Menovahub - Home
@endsection

@section('style')
@endsection

@section('content')
<!-- ======= hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
            @foreach($sliders as $slider)
                <div class="carousel-item active" ><img src="{{ $slider->image_path  }}">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown"> {{ $slider->name }}</h2>
                            <p class="animate__animated animate__fadeInUp">{!! $slider->description !!}</p>
                            @if(!auth()->check())
                                <a href="{{ route('login') }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            @else
                                <a href="{{ route('about_us.index') }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">At vero eos et accusamus</h2>
                            <p class="animate__animated animate__fadeInUp">Helping Business Security & Peace of Mind
                                for Your Family</p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/3.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Temporibus autem quibusdam</h2>
                            <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo
                                enim ipsam voluptatem</p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section><!-- End Hero Section -->
<!-- ======= About Section ======= -->
<section id="about" class="about sec-padding ">
    <div class="container " data-aos="fade-up">
        <header class="sec-heading ">
            <h2>about us</h2>
        </header>
        <div class="row gx-0">
            <div class="col-sm-12 d-flex flex-column justify-content-center " data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>Who We Are</h3>
                    <p>
                        Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor
                        consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam
                        et est corrupti.
                    </p>
                </div>
            </div>
        </div>
        <div id="values" class="values">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    @foreach($about_us as $about)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ $about->image_path }}" class="img-fluid" alt="">
                            <h3>{{ $about->title }}</h3>
                            <p>{!! $about->description !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center sec-padding ">
                    
                    <a href="#" class="btn-read-more"><span> Read More </span> <i class="bi bi-arrow-right"></i> </a>
                </div>
            </div>
        </div><!-- End Values  -->
    </div>
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services sec-bg sec-padding">
    <div class="container">
        <div class="services-area">
            <div class="sec-heading" data-aos="fade-up">
                <h2>Services</h2>
                <p>how can we help you </p>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="{{ $service->icon }}"></i></div>
                        <h4 class="title"><a href="{{ route('services.index') }}">{{ $service->name }} </a></h4>
                        <p class="description">{!! $service->description !!}</p>
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
            <div class="image col-xl-6  col-lg-7 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
                <img src="{{ asset('frontend/assets/img/clients/client-4.png') }}" alt="" class="img-fluid">
            </div>

            <div class="col-xl-6 col-lg-5  d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
                <div class="content d-flex flex-column justify-content-center">
                    <div class="row">
                        @foreach($counters as $counter)
                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1" class="purecounter"></span>
                              
                                <p><strong>{{ $counter->data->isNotEmpty() ? $counter->data->first()->title : '' }}</strong>
                                {!! $counter->data->isNotEmpty() ? $counter->data->first()->description : ''!!}</p>
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
                <h2> connect</h2>
            </div>
            <div class="row">
                @foreach($connects as $connect)
                <div class="col-md-6  col-xs-12">
                    <div class="sec-textbox">
                        <h4 class="sec-head">{{ $connect->data->isNotEmpty() ? $connect->data->first()->title : '' }}</h4>
                        <p class="sec-text">{!!  $connect->data->isNotEmpty() ? mb_substr( $connect->data->first()->description , 0 , 100) : ''  !!}</p>
                    </div>
                    <a href="#" class="btn-join"> join now</a>
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
                <h2> advisor</h2>
            </div>
            <div class="row">
                <div class="col-md-6  col-xs-12">
                    <div class="">
                        <h4 class="sec-head">Find Your Advisors</h4>
                        <p class="sec-text">
                            menova hub is startup community on the Internet. take your startup to the next level
                            . find your cofounder , business advisors and fund your business.
                        </p>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-5  d-flex align-items-stretch pt-4 pt-xl-0 ">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="row">
                        @foreach($advisor as $advisor)
                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="advisor-box">
                                    <p> <i class="ri-service-fill"></i> {{ $advisor->data->isNotEmpty() ? $advisor->data->first()->title : '' }}</p>
                                </div>
                            </div>
                        @endforeach

                    
                            </div class="col-md-12 d-md-flex ">
                            <div class="advisor-join sec-padding">
                                <a href="#" class="btn-join"> join now</a>

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
                <h2>Raise</h2>
            </div>
            <div class="row">
                @foreach($rais as $rais)
                <div class="col-md-6  col-xs-12">
                    <div class="sec-textbox">
                        <h4 class="sec-head">{{ $rais->name }}</h4>
                        <p class="sec-text">{{ $rais->describe  }} </p>
                    </div>

                    <div>
                        <a href="#" class="btn-join"> join now</a>
                    </div>
                </div>
                @endforeach

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
            <h2>Blog</h2>
            <p>Recent posts form our Blog</p>
        </header>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4">
                <div class="post-box">
                    <div class="post-img"><img src="{{ $blog->image_path  }}" class="img-fluid" alt=""></div>
                    <span class="post-date">{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : '' }}</span>
                    <h3 class="post-title">{!! $blog->data->isNotEmpty() ? $blog->data->first()->body : '' !!}</h3>
                    <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
</section><!-- End Recent Blog Posts Section -->
@endsection

@section('script')
@endsection