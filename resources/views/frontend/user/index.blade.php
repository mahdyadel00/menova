
@extends('layouts.app')
@section('pageTitle', __('site.home'))
@section('content')
    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img class="heroimg" src="{{ asset('frontend/assets/img/G1.png') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="product-section mt-150 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>
                            <span class="blue-text">
                                @lang('site.welcome') @auth {{auth()->user()->first_name ? auth()->user()->first_name : ''}} @endauth 
                            </span> 
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80" id="connect">
        <div class="container">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="pink-text">Connect </span> </h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center col-12">
                        <div class="list-icon col-md-3">
                            <img src="{{ asset('frontend/assets/img/home/businessman.png') }}">
                        </div>
                        <div class="content col-md-9">
                            <h3>Find a Co-Founder</h3>
                            <br>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center col-12 ">
                        <div class="list-icon col-md-3">
                            <img src="{{ asset('frontend/assets/img/home/conversation.png') }}">
                        </div>
                        <div class="content col-md-9">
                            <h3>Talk to an advisor</h3>
                            <br>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center col-12 ">
                        <div class="list-icon col-md-3 align-items-center">
                            <img src="{{ asset('frontend/assets/img/home/programmer.png') }}">
                        </div>
                        <div class="content col-md-9">
                            <h3>Find a freelancer</h3>
                            <br>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-80 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="pink-text">@lang('site.collaborate')</span></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="list-box d-flex justify-content-start align-items-center col-12 ">
                            <div class="list-icon col-md-2 align-items-center">
                                <img src="{{asset('frontend/assets/img/home/conversation1.png')}}">
                            </div>
                            <div class="content col-md-9">
                                <h3>@lang('site.find_a_freelancer')</h3>
                                <br>
                                <p>It is a long established fact that a reader will be distracted by the readable </p>
                            </div>
                        </div>
                        <br>

                        <div class="list-box d-flex justify-content-start align-items-center col-12 ">
                            <div class="list-icon col-md-2 align-items-center">
                                <img src="{{ asset('frontend/assets/img/home/businessman.png') }}">
                            </div>
                            <div class="content col-md-9">
                                <h3>@lang('site.collaborate_with_our_partners')</h3>
                                <br>
                                <p>It is a long established fact that a reader will be distracted by the readable </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{ asset('frontend/assets/img/home/twoperson.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-section pt-80 pb-80">
        <div class="container">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="pink-text">@lang('site.educate')</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                    <p class="">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center col-12 ">
                        <div class="list-icon col-md-2">
                            <img src="{{ asset('frontend/assets/img/home/education.png') }}">
                        </div>
                        <div class="content col-md-9">
                            <h3>@lang('site.learning_center')</h3>
                            <br>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end product section -->

    <!-- cart banner section -->
    <div class="product-section mt-80 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="pink-text">@lang('site.raise')</span></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{ asset('frontend/assets/img/home/fourperson.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 text-center">
                    <div class="single-product-item">
                        <br> 		<br>
                        <div class="list-box d-flex justify-content-start align-items-center col-12 ">
                            <div class="list-icon col-md-2 align-items-center">
                                <img src="{{ asset('frontend/assets/img/home/businessman.png') }}">
                            </div>
                            <div class="content col-md-9">
                                <h3>Find an investor</h3>
                                <br>
                                <p>It is a long established fact that a reader will be distracted by the readable </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection

