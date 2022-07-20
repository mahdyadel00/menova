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
            <div class="breadcrumb-text">
                <ol>
                    <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                    <li>@lang('site.discuss')</li>
                </ol>
                <h2>@lang('site.discuss')</h2>
            </div>
        </div>
    </section>

    <!-- End Breadcrumbs -->
    <div class="container-fluid  pt-5 pb-2 bg-light" data-aos="fade-up">
        <div class="row ">
            <div class="col-md-3 ">
                <button type="button" class="btn btn-primary col-11 align-self-center" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Ask question
                </button>
                {{-- <a href="#" class="btn btn-primary">Ask question </a> --}}

            </div>
            <div class="col-md-6 ">

                @foreach ($comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <ul class="list-inline m-3">
                                <li class="list-inline-item"><i class="bi bi-person"></i> <a href="/discuss-single">
                                        {{ $comment->user->first_name }} {{ $comment->user->last_name }}</a></li>
                                <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time
                                            datetime="2020-01-01"> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at )->format('Y-m-d');}}</time></a></li>
                            </ul>

                            <p class="card-text">{{ $comment->comment }}</p>
                            <div class="d-flex align-items-center">
                                <a href="/{{ route('frontend.comment.add') }}" class="comment-icon"> <i
                                        class="bi bi-chat-dots"></i> @lang('site.comments')</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- <div class="col-md-3">
                <ul class="list-group">
                    @foreach ($discusses as $topic)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $topic->topic->name }}
                            <span class="badge bg-primary rounded-pill">{{ $topic->count() }}</span>
                        </li>
                    @endforeach

                </ul>
            </div> -->

        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">@lang('site.ask_question')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class='' action="{{ route('frontend.discusses.store') }}" method='POST'
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">@lang('site.title') </label>
                                @php
                                    $input = 'title';
                                @endphp
                                <input type="text" class="form-control" id="title" name="{{ $input }}"
                                    required placeholder='Please Enter Your Title'>
                                @error($input)
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                @php
                                    $input = 'body';
                                @endphp
                                <label for="body" class="form-label">@lang('site.body') </label>
                                <textarea class="form-control" id="body" name="{{ $input }}" required
                                    placeholder='Please Enter Your Contractor Name'></textarea>
                                @error($input)
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                @php
                                    $input = 'topic_id';
                                @endphp
                                <label for="body" class="form-label">@lang('site.topices') </label>
                                <select class="form-control" name="{{ $input }}" id="">
                                    <option value="0">@lang('site.select_topic')</option>
                                    @foreach ($topics as $topic)
                                        <option value="{{ $topic->id }}"
                                            {{ $topic->id == old($input) ? 'selected' : '' }}>{{ $topic->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error($input)
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex justify-content-start">
                                <button type="button" class="btn btn-light text-right"
                                    data-bs-dismiss="modal">@lang('site.close')</button>

                            </div>
                            <button type="submit" id='ask' name='ask'
                                class="btn btn-primary">@lang('site.ask')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
