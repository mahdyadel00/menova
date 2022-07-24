@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')
@endsection

@section('content')
    <!-- Breadcrumbs -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumb-text">
                <ol>
                    <li><a href="/">@lang('site.home')</a></li>
                    <li>@lang('site.rais')</li>
                </ol>
                <h2>@lang('site.rais')</h2>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- start raise inner page -->
    <section id="raise" class="raise">

        <div class="container" data-aos="fade-up">

            <header class="raise-header text-center">
                <h2>menova hub</h2>
                <p>@lang('rais.found_find_your_founder')</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        @foreach ($rais as $rais)
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="{{ $rais->icon }}"></i>
                                    <h3>{{ $rais->data->isNotEmpty() ? $rais->data->first()->title : '' }}</h3>
                                    <p>{!! $rais->data->isNotEmpty() ? mb_substr($rais->data->first()->description, 0, 200) : '' !!}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- raise form-->
                <div class="col-lg-6">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('rais.store') }}" method="POST" class="raise-form ">
                        @csrf
                        <div class="row gy-4">
                            <h2 class="text-center"> call for fund </h2>
                            <div class="col-md-12 ">
                                <input type="text" name="name" class="form-control" placeholder="@lang('front.name')">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="@lang('front.email')">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="stage_business" rows="6" placeholder="@lang('front.business')"></textarea>
                                @error('stage_business')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="description" rows="6" placeholder="@lang('front.describe')"></textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">@lang('front.Send_now')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end raise inner page -->
@endsection

@section('script')
@endsection
