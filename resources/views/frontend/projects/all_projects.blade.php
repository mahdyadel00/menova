@extends('frontend.layouts.master')

@section('title')
    Menovahub-Find Cofounder
@endsection

@section('style')
@endsection
@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-text">
                <ol>
                    <li><a class="breadcrumbs-link " href="{{ route('home') }}">@lang('site.home')</a></li>
                    <li><a class="breadcrumbs-link " href="{{ route('frontend.projects') }}">@lang('site.projects')</a></li>
                </ol>
                <h1>@lang('site.find_your_solutaion')</h1>
            </div>
        </div>
    </section>
    <!-- ======= projects Section ======= -->
    <section id="projects" class="projects sec-padding">
        <div class="container-fluid mt-3">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-3 px-sm-2 px-0 bg-slide d-none d-sm-block side-bar" id='nav'>
                    <div class="flex-column  align-items-sm-start px-1 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start align-items-sm-start px-sm-2 px-0"
                            id="myTab" role="tablist">
                            <li class="nav-item mt-5 mb-3 h5 w-100" role="presentation">
                                <label class="mb-2">@lang('site.roles')</label>
                                <div class='m-2'>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Default checkbox
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Checked checkbox
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Checked checkbox
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Checked checkbox
                                        </label>
                                    </div>
                                </div>



                            </li>
                            <li class="nav-item mt-3 mb-5 h5 w-100 " role="presentation">
                                <label class="mb-2">category</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1" class="option">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </li>
                            <li class="nav-item mt-3 mb-25 h5 w-100" role="presentation">
                                <label class="mb-2">City</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col py-3 px-1  ">
                    <button type='button' id='toggle' class="btn btn-white mb-3 d-block d-sm-block d-md-none">
                        <i class='bx bx-list-ul bx-md'></i>
                    </button>
                    <div id='info' class='px-4'>

                        <div class="container" data-aos="fade-up">
                            <header class="sec-inner-heading text-center mb-5">
                                <h2> @lang('site.projects') </h2>
                            </header>
                            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                                @foreach ($projects as $project)

                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="{{ $project->image_path }}" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $project->title  }}</h5>
                                                <p class="card-text">{!! Str::limit($project->description , 150)  !!}</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i class="bi bi-chat-left-dots-fill"></i>@lang('site.message')</a>
                                                    <a href=""><i class="bi bi-link"></i>@lang('site.project_link')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="300">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="400">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">الأكثر تقدمً</h5>
                                                <p class="card-text"> عام 2016 وبعد شهر واحد من إطلاق شركة سامسونج لهاتفها
                                                    الأكثر تقدمًا “غالاكسي نوت 7″، تفاجأ العملاء بأكثر المشاكل خطورة وهي
                                                    انفجار البطاريات وقد واجه</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="300">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="400">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="300">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="300">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                    data-aos-delay="300">
                                    <div class="col project-box">
                                        <div class="card h-100">
                                            <img src="assets/img/projects/project-4.jpg" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a
                                                    natural lead-in to additional content. This content is a little bit
                                                    longer.</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="social d-flex justify-content-center align-item-center">
                                                    <a href=""> <i
                                                            class="bi bi-chat-left-dots-fill"></i>messege</a>
                                                    <a href=""><i class="bi bi-link"></i>project-link</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
    </section>
    <!-- End projects Section -->
@endsection

@section('script')
@endsection
