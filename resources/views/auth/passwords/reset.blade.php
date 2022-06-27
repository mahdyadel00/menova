@extends('layouts.auth')
@section('pageTitle', __('Reset Password'))
@section('content')
<div class="ml-0 mt-5" >
    <div class="row" style="height: 100%;">

        <div class="col-md-6 " >
            <div class="card px-5 py-4 cardlogin"  style="width: 90%; height:370px; " id="form1">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div  class="form-data">
                        <div class=" text-center">
                            <img src="{{asset('frontend/assets/img/user icon.svg')}}" alt="Image"
                            class="img-fluid text-center" 
                            style="border: 50%; height: 60px; width: 60px;">
                        </div>
                        <br>
                        <h3 style="text-align: left; font: normal normal bold  Roboto; letter-spacing: 0px; color: #1A237E;">
                            @lang('site.forgot_password')
                        </h3>
                        <div class="font-weight-normal " style="color: #707070;">
                            @lang('site.back_to') 
                            <a href="{{route('login')}}" style="color: #303F9F; font-weight: bold;">
                                @lang('site.sign_in')
                            </a>
                        </div>
                        @php
                            $input = 'email';
                        @endphp
                        <div class="forms-control mt-4"> 
                            <span style="font-weight: bolder; color: #707070; ">@lang('site.email')</span> 
                            <br>
                            <div class="input-group ">
                                <input name="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                                type="email" value="{{ $email ?? old('email') }}" required 
                                autocomplete="email" autofocus 
                                placeholder="{{__('site.enter_your_email')}}" 
                                style=" background-color: #F3F4FA; border: none;">
                                <div class="input-group-append"></div>
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
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
                        <br>
                        <div class="mb-3"> 
                        <button type="submit" class="btn btn-login w-100" >Request password reset</button> 
                        </div>
                    </div>
                </form>
            </div> 
        </div>
        <div class="col-md-6"> 
            <div class="Welcome justify-content-center" >
                <h2 class="text-center" style="color:aliceblue; font-size: 40px; ">
                    @lang('site.welcome_to')
                </h2>
                <h2 class="text-center" style="font-weight: bolder; font-size: 55px; color: aliceblue;">
                  {{config('app.name')}}
                </h2>
            </div>
        </div>
        
    </div>
</div>
@endsection
