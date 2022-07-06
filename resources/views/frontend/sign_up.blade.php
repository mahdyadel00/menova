@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')
@endsection

@section('content')

<section class="mt-5 mb-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="{{ route('sign_up') }}">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">@lang('site.sign_up_with')</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class='bx bxl-facebook-circle' ></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class='bx bxl-google' ></i>
                        </button>


                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>
                     <!-- name input -->
                     <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">@lang('site.user_name')</label>

                        <input type="text" name="name" id="form3Example3" class="form-control form-control-lg"
                            placeholder="@lang('enter_your_user_name') " />
                    </div>
                     <!-- phone input -->
                     <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">@lang('site.mobile')</label>

                        <input type="number" name="phone" id="form3Example3" class="form-control form-control-lg"
                            placeholder="@lang('site.mobile')" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">@lang('site.email_address')</label>

                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                            placeholder="@lang('site.enter_a_valid_email_address')" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">@lang('site.password')</label>

                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                            placeholder="@lang('site.enter_password')" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">@lang('site.password_confirmation')</label>

                        <input type="password" name="password_confirmation" id="form3Example4" class="form-control form-control-lg"
                            placeholder="@lang('site.enter_password_confirmation')" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">sign up</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
@endsection
