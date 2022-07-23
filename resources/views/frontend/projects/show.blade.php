@extends('frontend.layouts.master')
@section('title')
Menovahub-Find Cofounder
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid mt-3">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-3 px-sm-2 px-0 bg-slide d-none d-sm-block" id='nav'>
            <div class="flex-column  align-items-sm-start px-1 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start align-items-sm-start px-sm-2 px-0"
                    id="myTab" role="tablist">
                    <li class="nav-item mt-3 h5 w-100" role="presentation">
                        <label class="mb-2">Roles</label>
                        <div class='m-2'>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">

                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Checked checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Checked checkbox
                                </label>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item mt-3 h5 w-100 " role="presentation">
                        <label class="mb-2">category</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>

                    </li>
                    <li class="nav-item mt-3 h5 w-100" role="presentation">
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
                <!-- ======= projects Section ======= -->
                <section id="projects" class="projects sec-padding">
                    <div class="container" data-aos="fade-up">
                    <header class="sec-inner-heading text-center mb-5">
                        <h2> projects </h2>
                    </header>

                        <div class="row gy-3 mb-5">

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="project-box">
                                    <div class="project-img">
                                        <img src="assets/img/projects/project-2.jpg" class="img-fluid" alt="">

                                    </div>
                                    <div class="project-info">
                                        <h4>Sarah Jhonson</h4>
                                        <span>Product Manager</span>
                                        <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil
                                            minima suscipit corporis. Voluptate sed quas reiciendis animi neque
                                            sapiente.</p>
                                    </div>
                                    <div class="social d-flex justify-content-space-around align-item-center">
                                            <a href=""><i class="bi bi-chat-left-dots-fill"></i>messege</a>
                                            <a href=""><i class="bi bi-link"></i>project-link</a>
                                     </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="300">
                                <div class="project-box">
                                    <div class="project-img">
                                        <img src="assets/img/projects/project-3.jpg" class="img-fluid" alt="">

                                    </div>
                                    <div class="project-info">
                                        <h4>William Anderson</h4>
                                        <span>CTO</span>
                                        <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae
                                            deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.
                                        </p>
                                    </div>
                                    <div class="social d-flex justify-content-space-around align-item-center">
                                            <a href=""><i class="bi bi-chat-left-dots-fill"></i>messege</a>
                                            <a href=""><i class="bi bi-link"></i>project-link</a>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="400">
                                <div class="project-box">
                                    <div class="project-img">
                                        <img src="assets/img/projects/project-4.jpg" class="img-fluid" alt="">

                                    </div>
                                    <div class="project-info">
                                        <h4>Amanda Jepson</h4>
                                        <span>Accountant</span>
                                        <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia
                                            aut aliquid doloremque ut possimus ipsum officia.</p>
                                    </div>
                                    <div class="social d-flex justify-content-space-around align-item-center">
                                            <a href=""> <i class="bi bi-chat-left-dots-fill"></i>messege</a>
                                            <a href=""><i class="bi bi-link"></i>project-link</a>

                                    </div>
                                </div>
                            </div>

             </div>
            <div class="row gy-3 mb-5">

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="project-box">
                                <div class="project-img">
                                    <img src="assets/img/projects/project-2.jpg" class="img-fluid" alt="">

                                </div>
                                <div class="project-info">
                                    <h4>Sarah Jhonson</h4>
                                    <span>Product Manager</span>
                                    <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil
                                        minima suscipit corporis. Voluptate sed quas reiciendis animi neque
                                        sapiente.</p>
                                </div>
                                <div class="social d-flex justify-content-space-around align-item-center">
                                        <a href=""><i class="bi bi-chat-left-dots-fill"></i>messege</a>
                                        <a href=""><i class="bi bi-link"></i>project-link</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="300">
                            <div class="project-box">
                                <div class="project-img">
                                    <img src="assets/img/projects/project-3.jpg" class="img-fluid" alt="">

                                </div>
                                <div class="project-info">
                                    <h4>William Anderson</h4>
                                    <span>CTO</span>
                                    <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae
                                        deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.
                                    </p>
                                </div>
                                <div class="social d-flex justify-content-space-around align-item-center">
                                        <a href=""><i class="bi bi-chat-left-dots-fill"></i>messege</a>
                                        <a href=""><i class="bi bi-link"></i>project-link</a>
                                    </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="400">
                            <div class="project-box">
                                <div class="project-img">
                                    <img src="assets/img/projects/project-4.jpg" class="img-fluid" alt="">

                                </div>
                                <div class="project-info">
                                    <h4>Amanda Jepson</h4>
                                    <span>Accountant</span>
                                    <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia
                                        aut aliquid doloremque ut possimus ipsum officia.</p>
                                </div>
                                <div class="social d-flex justify-content-space-around align-item-center">
                                        <a href=""> <i class="bi bi-chat-left-dots-fill"></i>messege</a>
                                        <a href=""><i class="bi bi-link"></i>project-link</a>

                                </div>
                            </div>
                        </div>

                 </div>
             </div>
         </section><!-- End projects Section -->
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

@endsection
