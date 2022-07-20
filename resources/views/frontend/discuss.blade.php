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
        <h1>@lang('site.dicess')</h1>
      </div>
    </div>
  </section>
  <!-- End Breadcrumbs -->
  <!-- start discuss .................... -->
<section class="discuss">
  <div class="container-fluid  pt-5 pb-2 bg-light" data-aos="fade-up">
    <div class="row ">
        <div class = "col-md-3 ">

        <button id="myBtn" class="btn btn-sub m-left">@lang('site.ask_question')</button>

                <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>

                    <form class='' action = "{{ route('discusses.store') }}" method='POST' enctype="multipart/form-data">
                      @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">@lang('site.title') </label>
                                @php
                                    $input = 'title';
                                @endphp
                                <input type="text" class="form-control" id="title" name='{{ $input }}' 
                                    placeholder="@lang('site.please_enter_your_title')">
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
                                    placeholder="@lang('site.please_enter_your_Contractor_name')"></textarea>
                                @error($input)
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="topic" class="form-label">@lang('site.topic') </label>
                                @php
                                    $input = 'topic_id';
                                @endphp
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

                        <button type="submit" id ='ask' name = 'ask' class="btn btn-sub">@lang('site.ask')</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class = "col-md-6 pb-4 tab-content" id="pills-tabContent">
<div class="card mb-3">
    @foreach ($comments as $comment)
        <div class="card-body">
          <h5 class="card-title">Special hr </h5>
          <ul class="list-inline m-3">
            <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single">   {{ $comment->user->first_name }} {{ $comment->user->last_name }}</a></li>
            <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
          </ul>

          <p class="card-text">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at )->format('Y-m-d');}}</p>
          <div class="d-flex align-items-center">
            <a href="/discuss-single"> <i class="bi bi-chat-dots"></i> @lang('site.comments')</a>
        </div>
        </div>
      </div>
      @endforeach
</div>

        </div>
        <div class = "col-md-3 side-bar">
            <ul class="list-group" id="pills-tab" role="tablist">
            @foreach ($discusses as $topic)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="nav-link "  > {{ $topic->topic->name }}</a>
                <span class="badge  rounded-pill">{{ $topic->count() }}</span>
                </li>
                @endforeach

              </ul>
        </div>

    </div>

@endsection

@section('script')

@endsection
