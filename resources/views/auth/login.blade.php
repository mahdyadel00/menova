@extends('layouts.auth')
@section('pageTitle', __('site.sign_in'))
@section('content')
<div class="ml-0 mt-5" >
    <div class="row" style="height: 100%;">
        <div class="col-md-6 " >
            <div class="card px-5 py-4 cardlogin"  style="width: 90%; height:630px; " id="form1">
                {{-- Form --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div  class="form-data" v-if="!submitted">
                        <div class="text-center">
                            <img src="{{ asset('frontend/assets/img/user icon.svg') }}" alt="Image" class="img-fluid text-center" 
                            style="border: 50%; height: 60px; width: 60px;">
                        </div>
                        <br>
                        {{-- Email --}}
                        @php
                            $input = 'email';
                        @endphp
                        <div class="forms-control mb-4"> 
                            <span style="font-weight: bolder; color: #707070; ">@lang('Email')</span> 
                            <br>
                            <input class="form-control @error($input) is-invalid @enderror" name="{{$input}}" type="{{$input}}"
                            value="{{old($input)}}"
                            placeholder="{{__('site.enter_your_email')}}" style=" background-color: #F3F4FA; border: none;">
                            @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        {{-- Password --}}
                        @php
                            $input = 'password';
                        @endphp
                        <div class="forms-control mb-4"> <span style="font-weight: bolder; color: #707070;">@lang('Password')</span> <br>
                            <input class="form-control @error($input) is-invalid @enderror" 
                                name="{{$input}}" type="password" placeholder="{{__('site.enter_your_password')}}" 
                            style="background-color: #F3F4FA; border: none;">
                            @error($input)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="row align-items-center mt-4 mb-5">
                            <div class="col-md-6 ">
                                @php
                                    $input = 'remember';
                                @endphp
                                <div class="custom-control custom-checkbox">
                                    <input id="my-input" class="custom-control-input" type="checkbox" 
                                    name="{{$input}}" value="true"
                                    {{ old('remember') ? 'checked' : '' }}>
                                    <label for="my-input" class="custom-control-label">
                                        <span style="color:#1A237E;font: normal normal normal 16px/21px Roboto; letter-spacing:0px;color: #1A237E; opacity: 1">
                                            @lang('Remember Me')</span>
                                    </label>
                                </div>
                                @error($input)
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('password.request') }}" class="pass" 
                                    style="color: #303F9F;">@lang('Forgot Your Password?')</a>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-login w-100" >@lang('site.sign_in')</button>
                        </div>
                    </div>
                </form>
                {{-- ./Form --}}
                <div class="font-weight-normal text-center" style="color: #707070;">
                    @lang('site.donot_have_account') 
                    <a href="{{route('register')}}" style="color: #303F9F; font-weight: bold;">@lang('site.sign_up')</a>
                </div>
                <br>
                <h6 style=" width: 100%; text-align: center; border-bottom: 1px solid #303F9F; line-height: 0.1em ; margin: 10px 0 20px;">
                    <span style=" color:#303F9F; background:#fff; padding:0 10px; ">@lang('site.or')</span>
                </h6>
                <br>
                <div class="text-center align-content-center">
                    <div class="row justify-content-center btn w-100" style="height: 48px; background-color: #DADEF6;">
                        <a href="{{route('login_with', 'google')}}" class="font-weight-bold" style=" padding: 3px; color: #1a237e; font-size: medium;">
                            <img src="{{asset('frontend/assets/img/google.png')}}" alt="Google" 
                            style=" margin-right: 10px; height: 25px; width: 25px;">
                            @lang('site.sign_in_with_google')
                        </a>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="col-md-6">
            <div class="Welcome justify-content-center" >
                <h2 class=" text-center " style="color:aliceblue; font-size: 40px; ">
                    @lang('site.welcome_to')
                </h2>
                <h2 class="text-center" style="font-weight: bolder; font-size: 55px; color: aliceblue;">
                    @lang('menvoa')
                </h2>
            </div>
        </div>
    </div>

</div>
@endsection
