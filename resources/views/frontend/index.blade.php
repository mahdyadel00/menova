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

                <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown"> menovahub</h2>
                            <p class="animate__animated animate__fadeInUp">make your idea real startup</p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                        </div>
                    </div>
                </div>

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

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

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
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="assets/img/values-1.png" class="img-fluid" alt="">
                            <h3>start your own startup</h3>
                            <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et
                                veritatis id.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="assets/img/values-2.png" class="img-fluid" alt="">
                            <h3>growth your startup</h3>
                            <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit
                                non.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="assets/img/values-3.png" class="img-fluid" alt="">
                            <h3>fund your startup</h3>
                            <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem
                                commodi.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center sec-padding ">
                    <a href="#" class="btn-read-more">
                        <span> Read More </span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
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
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="#">find co-founder </a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                            excepturi</p>
                    </div>

                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis

                        </p>

                    </div>
                </div>

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
                <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
            </div>

            <div class="col-xl-6 col-lg-5  d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
                <div class="content d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam
                                    architecto ut.</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium
                                    et quia dere tan</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-clock"></i>
                                <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam
                                    ducimus aut voluptate non vel</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-award"></i>
                                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et
                                    nemo pad der</p>
                            </div>
                        </div>
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
                <div class="col-md-6  col-xs-12">
                    <div class="sec-textbox">
                        <h4 class="sec-head">find cofounder</h4>
                        <p class="sec-text">
                            menova hub is startup community on the Internet. <span>Join now</span> take your
                            startup to the next level . find your cofounder , business advisors and fund your
                            business.
                        </p>
                    </div>
                    <a href="#" class="btn-join"> join now</a>
                </div>

                <div class="col-md-6  col-xs-12">
                    <div class="connect-img">
                        <img src="assets/img/connect (1).png" alt="" class="img-fluid">
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

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="advisor-box">
                                    <p> <i class="ri-service-fill"></i> consequuntur voluptas nostrum aliquid
                                        ipsam architecto ut.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="advisor-box">

                                    <p> <i class="ri-service-fill"></i>adipisci atque cum quia aspernatur totam
                                        laudantium et quia dere tan</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="advisor-box">

                                    <p> <i class="ri-service-fill"></i> aut commodi quaerat modi aliquam nam
                                        ducimus aut voluptate non vel</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="advisor-box">
                                    <p> <i class="ri-service-fill"></i> rerum asperiores dolor alias quo
                                        reprehenderit eum et nemo pad der</p>
                                </div>
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
                <div class="col-md-6  col-xs-12">
                    <div class="sec-textbox">
                        <h4 class="sec-head">Raise</h4>
                        <p class="sec-text">
                            menova hub is startup community on the Internet. <span>Join now</span> take your
                            startup to the next level . find your cofounder , business advisors and fund your
                            business.
                        </p>
                    </div>

                    <div>
                        <a href="#" class="btn-join"> join now</a>
                    </div>
                </div>

                <div class="col-md-6  col-xs-12">
                    <div class="connect-img">
                        <img src="assets/img/raise.png" alt="" class="img-fluid">
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

            <div class="col-lg-4">
                <div class="post-box">
                    <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
                    <span class="post-date">Tue, September 15</span>
                    <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit
                    </h3>
                    <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="post-box">
                    <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
                    <span class="post-date">Fri, August 28</span>
                    <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
                    <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="post-box">
                    <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
                    <span class="post-date">Mon, July 11</span>
                    <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                    <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Recent Blog Posts Section -->
@endsection

@section('script')
@endsection