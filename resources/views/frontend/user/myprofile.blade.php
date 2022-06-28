@extends('frontend.layouts.app')
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
@endsection
