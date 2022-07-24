@extends('frontend.layouts.master')

@section('title')
    Menovahub-Disucss
@endsection

@section('style')
@endsection

@section('content')
    <!-- Breadcrumbs -->
    <section class="breadcrumbs">

        <div class="container">
            <div class="breadcrumbs-text ">
                <ol>
                    <li><a href="{{ route('home') }}" class="breadcrumbs-link"></a>@lang('site.home')</li>
                    <li><a href="{{ route('about_us.index') }}" class="breadcrumbs-link">@lang('site.about_us')</a></li>
                    <li><a href="{{ route('services.index') }}" class="breadcrumbs-link">@lang('site.services')</a></li>
                    <li><a href="{{ route('connect.index') }}" class="breadcrumbs-link">@lang('site.connects')</a></li>
                    <li><a href="{{ route('rais.index') }}" class="breadcrumbs-link">@lang('site.rais')</a></li>
                </ol>
                <h1>@lang('site.comments')</h1>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section class="discuss-single sec-padding">
        <div class="container-fluid   " data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-9 ">
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="card-title">{{ $dis->title }}</h5>
                            @foreach ($comments as $comment)
                                <ul class="list-inline m-3">
                                    <li class="list-inline-item"><i class="bi bi-person"></i> <a href="/discuss-single">
                                            {{ $comment->user->first_name }} {{ $comment->user->lasst_name }}</a></li>
                                    <li class="list-inline-item">
                                        <i class="bi bi-clock"></i>
                                        <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a>
                                    </li>
                                </ul>

                                <p class="card-text "> {{ $comment->comment }}</p>

                                <hr class="mt-4 mb-2">
                            @endforeach

                            <form class='' action="{{ route('frontend.reply.add') }}" method='POST'
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="discussess_id" value="{{ $uuid }}">
                                <div class="mb-3">
                                    <label for="reply" class="form-label">@lang('reply') </label>
                                    <input type="text" class="form-control" id="reply" name='comment'
                                        placeholder="@lang('site.please_enter_your_reply')">
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sub col-12"
                                            id='post'>@lang('site.post')</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
