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
                <li><a href="{{route('home')}}">@lang('site.home')</a></li>
                <li>@lang('front.connect')</li>
            </ol>
            <h1>@lang('front.connect')</h1>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<section id="connect-inner" class="connect-inner" style="background-image: url('{{ asset('frontend/assets/img/connect..jpg') }}">
    <div class="container" data-aos="fade-up">
        <div class="connect-inner-area">
            <header class="connect-inner-header text-center">
                <h2>@lang('front.menovahub_network')</h2>
                <p>@lang('front.find_cofounder') </p>
            </header>

            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('connect.store') }}" method="post" class="connect-inner-form ">
                        @csrf
                        <div class="col-md-12 ">
                            <input type="text" name="name" class="form-control" placeholder="@lang('front.name')">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12  ">
                            <input type="email" class="form-control" name="email" placeholder="@lang('front.email')">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-12">
                                <input type="text" class="form-control" name=" your revenu last 12 months" placeholder=""
                                    >
                            </div>  --}}
                        <div class="col-md-12 mb-5">
                            <textarea class="form-control" name="stage_business" rows="6" placeholder="@lang('front.business') "></textarea>
                            @error('stage_business')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-5">
                            <textarea class="form-control" name="description" rows="6" placeholder="@lang('front.describe')"></textarea>
                            @error('stage_business')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit">@lang('front.Send_now')</button>
                </div>

                </form>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection