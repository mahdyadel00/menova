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
        <li><a href="/" class="breadcrumbs-link"></a>Home</li>
        <li><a href="/about" class="breadcrumbs-link">about</a></li>
        <li><a href="/services" class="breadcrumbs-link">services</a></li>
        <li><a href="/connect" class="breadcrumbs-link">connect</a></li>
        <li><a href="/raise" class="breadcrumbs-link">raise</a></li>
      </ol>
      <h1>Disucss</h1>
    </div>
  </div>
</section>
<!-- End Breadcrumbs -->
<!-- start discuss .................... -->
<section class="discuss">
  <div class="container-fluid  pt-5 pb-2 bg-light" data-aos="fade-up">
    <div class="row ">
      <div class="col-md-3 ">

        <button id="myBtn" class="btn btn-sub m-left">Ask Question</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>

            <form class='' action="" method='POST' enctype="multipart/form-data">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="title" class="form-label">Title </label>
                  <input type="text" class="form-control" id="title" name='title' required placeholder='Please Enter Your Title'>
                </div>
                <div class="mb-3">
                  <label for="body" class="form-label">Discuss Now </label>
                  <textarea class="form-control" id="body" name='body' required placeholder='Please Enter Your question'></textarea>
                </div>
              </div>
              <div class="modal-footer">

                <button type="submit" id='ask' name='ask' class="btn btn-sub">Ask</button>
              </div>
            </form>
          </div>

        </div>

      </div>
      <div class="col-md-6 pb-4 tab-content" id="pills-tabContent">
        @if(count($topics)>0)
        @foreach($topics as $key => $topic)
        <div class="tab-pane fade show active" id="v-pills-{{ $key}}" role="tabpanel" aria-labelledby="v-pills-{{ $key}}-tab" tabindex="0">
         
        @foreach($topic->discusses as $discusses)
        <div class="card mb-3 ">
            <div class="card-body">
              <h5 class="card-title">{{$discusses->title}}</h5>
              <ul class="list-inline m-3">
                <li class="list-inline-item">
                  <i class="bi bi-person"></i>
                  <a href="/discuss-single"> John Doe</a>
                </li>
                <li class="list-inline-item">
                  <i class="bi bi-clock"></i>
                  <a href="/discuss-single">
                    <time datetime="2020-01-01"> Jan 1, 2020</time>
                  </a>
                </li>
              </ul>
              <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
              <div class="d-flex align-items-center">
                <a href="/discuss-single">
                  <i class="bi bi-chat-dots sub-color"></i>
                  comment
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
          @if(count($topics)>0)
          @foreach($topics as $key => $topic)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="nav-link " id="v-pills-{{$key}}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{$key}}" type="button" role="tab" aria-controls="v-pills-{{$key}}" aria-selected="true">
              {{$topic->slug}}</a>
            <span class="badge  rounded-pill">2</span>
          </li>
          @endforeach
          @endif
        </ul>
      </div>

    </div>

    @endsection

    @section('script')

    @endsection