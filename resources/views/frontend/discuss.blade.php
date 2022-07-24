@extends('frontend.layouts.master')

@section('title')
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
                <h1>@lang('site.discussess')</h1>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- start discuss .................... -->
    <section class="discuss">
        <div class="container-fluid  pt-5 pb-2 bg-light" data-aos="fade-up">
            <div class="row ">
                <div class="col-md-3 ">

                    <button id="myBtn" class="btn btn-sub m-left">@lang('site.ask_question')</button>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>

                            <form class="" action="{{ route('discusses.store') }}" method='POST'
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">@lang('site.title') </label>
                                        <input type="text" class="form-control" id="title" name='title'
                                            placeholder="@lang('site.please_enter_your_title')" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="body" class="form-label">@lang('site.disscuss_now') </label>
                                        <textarea class="form-control" id="body" name='body'  placeholder="@lang('site.please_enter_your_question')" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="topic" class="form-label">@lang('site.disscuss_now') </label>
                                        <select name="topic_id" id="topic_id" class="form-control" required>
                                            <option value="0">@lang('site.select_topic')</option>
                                            @foreach ($topics as $topic)
                                                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" id='ask' class="btn btn-sub">@lang('site.ask')</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 pb-4 tab-content" id="pills-tabContent">
                    @if (count($topics) > 0)
                        @foreach ($topics as $key => $topic)
                            <div class="tab-pane fade @if ($key == 0) show active @endif"
                                id="v-pills-{{ $key }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $key }}-tab" tabindex="0">

                                @foreach ($topic->discusses as $discusses)
                                    <div class="card mb-3 ">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $discusses->title }}</h5>
                                            <ul class="list-inline m-3">
                                                <li class="list-inline-item">
                                                    <i class="bi bi-person"></i>
                                                    <a href="/discuss-single"> {{ $discusses->user->first_name }}</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="bi bi-clock"></i>
                                                    <a href="/discuss-single">
                                                        <time datetime="2020-01-01">
                                                            {{ date($discusses->created_at) }}</time>
                                                    </a>
                                                </li>
                                            </ul>
                                            <p class="card-text">{{ $discusses->body }}</p>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('discusses.show', $discusses->id) }}">
                                                    <i class="bi bi-chat-dots sub-color"></i>
                                                    @lang('site.comment')
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach
                    @endif



                </div>
                <div class="col-md-3 side-bar">
                    <ul class="list-group" id="pills-tab" role="tablist">
                        @if (count($topics) > 0)
                            @foreach ($topics as $key => $topic)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a class="nav-link " id="v-pills-{{ $key }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-{{ $key }}" type="button" role="tab"
                                        aria-controls="v-pills-{{ $key }}" aria-selected="true">
                                        {{ $topic->slug }}</a>
                                    @php
                                        $publish = 0;
                                        foreach ($topic->discusses as $discuss) {
                                            if ($discuss->published == '1') {
                                                $publish += 1;
                                            }
                                        }
                                    @endphp
                                    <span class="badge  rounded-pill">{{ $publish }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

            </div>

        @endsection

        @section('script')
        @endsection
