@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
@endsection

@section('content')
<section class="mt-5 mb-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="Post" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
<<<<<<< HEAD
                        <p class="lead fw-normal mb-0 me-3">@lang('site.sign_in_with')</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class='bx bxl-facebook-circle' ></i>
=======
                        <p class="lead fw-normal mb-0 me-3">@lang('front.sign')</p> <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class='bx bxl-facebook-circle'></i>
>>>>>>> 28ab721571422cab466fa916e34f6de7845124cd
                        </button>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class='bx bxl-google'></i>
                        </button>


                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">@lang('site.or')</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
<<<<<<< HEAD
                        <label class="form-label" for="form3Example3">@lang('site.email')</label>
=======
                        <label class="form-label" for="form3Example3">@lang('front.email')</label>
>>>>>>> 28ab721571422cab466fa916e34f6de7845124cd

                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="@lang('front.email')" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
<<<<<<< HEAD
                        <label class="form-label" for="form3Example4">@lang('site.password')</label>
=======
                        <label class="form-label" for="form3Example4">@lang('front.password')</label>
>>>>>>> 28ab721571422cab466fa916e34f6de7845124cd

                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="@lang('front.password')" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
<<<<<<< HEAD
                                @lang('site.remmber_me')
                            </label>
                        </div>
                        <a href="#!" class="text-body">@lang('site.forget_password')?</a>
=======
                                @lang('front.Remember_me')
                            </label>
                        </div>
                        <a href="#!" class="text-body"> @lang('front.Forgot_password')?</a>
>>>>>>> 28ab721571422cab466fa916e34f6de7845124cd
                    </div>

                
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
<<<<<<< HEAD
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">@lang('site.login')</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">@lang('site.donot_have_account')? <a href="{{ route('sign_up') }}"
                                class="link-danger">@lang('site.sign_up')</a></p>
=======
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">@lang('front.Login')</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">@lang('front.NO_account') <a href="{{route('sign_up')}}"
                                class="link-danger">@lang('front.Register')</a></p>
>>>>>>> 28ab721571422cab466fa916e34f6de7845124cd
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
@endsection
