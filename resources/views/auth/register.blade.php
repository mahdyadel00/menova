@extends('layouts.auth')

@section('pageTitle', __('Sign Up'))
@section('content')
<div class="  ml-0 mt-5" >
    <div class="row" style="height: 100%;">
        <div class="col-md-6 " >
            <div class="card px-5 py-4 cardlogin"  style="width: 90%; height:800px; margin: 30px;" id="form1">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div  class="form-data">
                        <div class=" text-center">
                            <img src="{{asset('frontend/assets/img/user icon.svg')}}" alt="Image" class="img-fluid text-center"
                                 style="border: 50%; height: 60px; width: 60px;">
                        </div>
                        <br>
                        {{-- Email --}}
                        @php
                            $input = 'email';
                        @endphp
                        <div class="forms-control mb-4"> <span style="font-weight: bolder; color: #707070; ">{{__('Email')}}</span> <br>
                            <input  name="{{$input}}" class="  form-control @error($input) is-invalid @enderror" type="email"
                                    placeholder="{{__('site.enter_email')}}" value="{{old($input)}}" 
                                    style="background-color: #F3F4FA; border: none;"
                                    required>
                            @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        @php
                            $input = 'phone';
                        @endphp
                        <div class="forms-control mb-4"> <span style="font-weight: bolder; color: #707070; ">{{__('site.phone')}}</span> <br>
                            <input name="{{$input}}" class="form-control @error($input) is-invalid @enderror" type="tel"
                                   placeholder="{{__('site.enter_phone_number')}}" value="{{old($input)}}"
                                   style=" background-color: #F3F4FA;   border: none;" required>
                            @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{--  Password --}}
                        @php
                            $input = 'password';
                        @endphp
                        <div class="forms-control mb-4"> <span style="font-weight: bolder; color: #707070;">{{__('Password')}}</span> <br>
                            <input name="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                                   type="password" placeholder="{{__('site.enter_password')}}"
                                   style=" background-color: #F3F4FA; height: 45px;  border: none;" required>
                            @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Confirm Password--}}
                        @php
                            $input = 'password_confirmation';
                        @endphp
                        <div class="forms-control mb-4"> <span style="font-weight: bolder; color: #707070;">{{__('Confirm Password')}}</span> <br>
                            <input name="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                                   type="password" placeholder="{{__('site.enter_password')}}"
                                   style=" background-color: #F3F4FA; height: 45px;  border: none;" required>
                            @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="row align-items-center mt-4 mb-5">
                            <div class="col-md-12 ">
                                @php
                                    $input = 'accept_policy';
                                @endphp
                                <div class="custom-control custom-checkbox @error($input) is-invalid @enderror">
                                    <input id="my-input" class="custom-control-input" type="checkbox" name="{{$input}}" value="1" required>
                                    <label for="my-input" class="custom-control-label">
                                    <span style="color:#707070;font: normal normal normal 16px/21px Roboto; letter-spacing:0px; opacity: 1">
                                        {{__('site.registration_hint')}}
                                    </span>
                                    </label>
                                    @error($input)
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-login w-100" >{{__('site.sign_up')}}</button>
                        </div>
                    </div>
                </form>
                <div class="font-weight-normal text-center" style="color: #707070;">
                    @lang('site.have_account')
                    <a href="{{route('login')}}" style="color: #303F9F; font-weight: bold;">Sign In</a></div>
                <br>
                <h6 style=" width: 100%; text-align: center; border-bottom: 1px solid #303F9F; line-height: 0.1em ; margin: 10px 0 20px;">
                    <span style=" color:#303F9F; background:#fff; padding:0 10px; ">{{__('site.or')}}</span>
                </h6>
                <br>
                <div class="text-center align-content-center">
                    <div class="row justify-content-center btn w-100" style="height: 48px; background-color: #DADEF6;">
                        <a href="{{route('login_with','google')}}" class="font-weight-bold" style=" padding: 3px; color: #1a237e; font-size: medium;">
                            <img src="{{asset('frontend/assets/img/google.png')}}" alt="google" style=" margin-right: 10px; height: 25px; width: 25px;">
                            {{__('site.signup_with_google')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="Welcome justify-content-center" >
                <h2 class=" text-center " style="color:aliceblue; font-size: 40px; ">
                    {{__('site.welcome_to')}}
                </h2>
                <h2 class="text-center" style="font-weight: bolder; font-size: 55px; color: aliceblue;">{{config('app.name')}}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
