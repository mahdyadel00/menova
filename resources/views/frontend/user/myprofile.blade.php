{{-- @extends('frontend.layouts.app')
@section('pageTitle', auth()->user()->first_name)
@section('content')
   <!-- main content -->
   <div class="container-md mt-80">
        <div class="row">

            <div class="col-2 pink-bg mb-5">
                <div>
                    <img class="mt-5" src="{{ $user->image_path }}">
                </div>
            </div>
            <div class="col md-sm-auto mr-lg-5">
                <div class="blue-textt mt-5 mb-3">
                   {{ $user->first_name }}
                   {{ $user->last_name }}
                </div>
                <div class="greyy-text ttl">
                    Investor
                </div>
                <hr class="hr-pink">
                <div class="greyy-text mt-4 mb-2">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                    alteration in some form, by injected humour, or randomised words which don't look even slightly
                    believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                    anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet
                    tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                    It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,
                    to generate Lorem Ipsum which looks reasonable.
                </div>
                <br>
                <div class="col-1 pl-0 ml-0 pr-0 mr-0 d-inline">
                    <img src="{{ asset('frontend') }}/assets/img/Layer 21.png">
                    <div class="blue-text d-inline mt-2 ml-1">
                        Location
                    </div>
                    <div class="greyy-text">{{ $user->location }}</div>
                </div>
                <br>
                <!-- <div class="col-1 pl-0 ml-0 pr-0 mr-0 d-inline">
                    <img src="assets/img/link_icon.png">
                    <div class="blue-text d-inline mt-2 ml-1">
                        Link
                    </div>
                    <div class="greyy-text">Demo link of Menova hub </div>
                </div> -->
                <!-- <br>
                <div class="col-1 pl-0 ml-0 pr-0 mr-0 d-inline">
                    <img src="assets/img/heart.png">
                    <div class="blue-text d-inline mt-2 ml-1">
                        Interests
                    </div>
                    <div class="greyy-text">Education , Agriculture </div>
                </div>
               <br> -->
                <div class="col-auto pl-0 ml-0 pr-0 mr-0 d-inline">

                    <button class="btn-pinkk2 d-inline mt-2 ml-1 mr-2">
                        <img src="{{ asset('frontend') }}/assets/img/Core.png" class=" mb-1">
                        <div class="d-inline-flex">
                            @lang('site.message')
                        </div>
                    </button>
                    <button class="btn-white d-inline mt-2 ml-3">
                        <a href="{{ route('frontend.projects.show' , $user->id) }}">
                        <img src="{{ asset('frontend') }}/assets/img/eye.png" class=" mb-1"> @lang('site.view_project')
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br> <br> <br>
    <!-- end of main content -->
@endsection --}}


@extends('frontend.layouts.master')

@section('title')
    @lang('site.menovahub_profile')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container rounded bg-white mt-4 mb-4">
        <div class="row justify-content-md-center">

            <div class="col-md-8 border border-light">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle "
                        width="150px" @if(auth()->check()) src="{{ auth()->user()->image_path }}" @else
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                        @endif><span
                        class="font-weight-bold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span><span class="text-black-50">{{ auth()->user()->email }}</span><span>
                    </span></div>
            </div>
            <div class="col-md-8 border border-light">
                <form action="{{ route('frontend.update_profile') }}" method="podt">
                    @csrf
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">@lang('site.profile_settings')</h4>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 mb-3"><label class="labels">@lang('site.first_name')</label><input type="text" id='name'
                                    name='first_name' value="{{ auth()->user()->first_name }}" class="form-control" placeholder="@lang('site.enter_your_first_name')"></div>
                            <div class="col-md-12 mb-3"><label class="labels">@lang('site.last_name')</label><input type="text" id='name'
                                    name='lanst_name' value="{{ auth()->user()->last_name }}" class="form-control" placeholder="@lang('site.enter_your_last_name')"></div>
                            <div class="col-md-12 mb-3"><label class="labels">@lang('site.email') </label><input type="email" id='email'
                                    name='email' value="{{ auth()->user()->email }}" class="form-control" placeholder="@lang('site.enter_your_email')"></div>
                            <div class="col-md-12 mb-3"><label class="labels">@lang('site.phone')</label><input type="text"
                                    id='phone' name='phone' value="{{ auth()->user()->phone }}" class="form-control" placeholder="@lang('site.enter_phone_number')"></div>
                            <div class="col-md-12 mb-3"><label class="labels">@lang('site.location')</label><input type="text" id='state'
                                    name='location' value="{{ auth()->user()->location }}" class="form-control" placeholder="@lang('site.enter_your_address')"></div>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">@lang('site.save')
                                </button></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')
@endsection
