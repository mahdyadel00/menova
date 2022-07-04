@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')
@endsection

@section('content')
    <!-- Breadcrumbs connect -->

    <section class="breadcrumbs-connect">
        <div class="container">
            <div class="breadcrumbs-connect-text">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/services">Services</a></li>
                </ol>
                <h1>connect</h1>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="connect-inner" class="connect-inner"
        style="background-image: url('{{ asset('frontend/assets/img/connect..jpg') }}">
        <div class="container" data-aos="fade-up">
            <div class="connect-inner-area">
                <header class="connect-inner-header text-center">
                    <h2>menovahub network</h2>
                    <p> find your cofounder , advisor and freelancers. connect with our team </p>
                </header>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <form action="{{ route('connect.store') }}" method="post" class="connect-inner-form ">
                            @csrf
                            <h2 class="text-center mb-5"> call for fund </h2>
                            <div class="col-md-12 ">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-12  ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            {{--  <div class="col-md-12">
                                <input type="text" class="form-control" name=" your revenu last 12 months" placeholder=""
                                    required>
                            </div>  --}}
                            <div class="col-md-12 mb-5">
                                <textarea class="form-control" name="stage_business" rows="6" placeholder=" stage of business " required></textarea>
                            </div>
                            <div class="col-md-12 mb-5">
                                <textarea class="form-control" name="description" rows="6" placeholder="Describe"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">@lang('site.send_message')</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
