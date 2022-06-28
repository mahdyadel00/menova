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
        <li><a href="/">Home</a></li>
        <li>Discuss</li>
      </ol>
      <h2>Discuss</h2>
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
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <ul class="list-inline m-3">
            <li class="list-inline-item"><i class="bi bi-person"></i> <a href="/discuss-single"> John Doe</a></li>
            <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time
                  datetime="2020-01-01"> Jan 1, 2020</time></a></li>
          </ul>

          <p class="card-text ">With supporting text below as a natural lead-in to additional contentWith supporting text
            below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to
            additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text
            below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to
            additional content.</p>

            <hr class="mt-4 mb-2">
            <label for="comment" class="form-label">Comments </label>

            <div class = 'm-4'>

              <ul class="list-inline m-2">
                <li class="list-inline-item"><i class="bi bi-person"></i> <a href="/discuss-single"> John Doe</a></li>
                <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time
                      datetime="2020-01-01"> Jan 1, 2020</time></a></li>
              </ul>
    
              <p class="card-text ">With supporting text below as a natural lead-in to additional contentWith supporting text
                below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to
                additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text
                below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to
                additional content.</p>
  
            </div>
            <div class = 'm-4'>

              <ul class="list-inline m-2">
                <li class="list-inline-item"><i class="bi bi-person"></i> <a href="/discuss-single"> John Doe</a></li>
                <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time
                      datetime="2020-01-01"> Jan 1, 2020</time></a></li>
              </ul>
    
              <p class="card-text ">With supporting text below as a natural lead-in to additional contentWith supporting text
                below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to
                additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text
                below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to
                additional content.</p>
  
            </div>
            <hr class="mt-4 mb-2">
        <form class='' action = "" method='POST' enctype="multipart/form-data">
          <div class="mb-3">
            <label for="reply" class="form-label">Reply </label>
            <input type="text" class="form-control" id="reply" name='reply' required
                placeholder='Please Enter Your Reply'>
          </div>
          <div class="row justify-content-end">
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary col-12" id = 'post' name  = 'post' >Post</button>
            </div>
          </div>

        </form>
        </div>
      </div>


    </div>
    <div class="col-md-3">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          A list item
          <span class="badge bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          A second list item
          <span class="badge bg-primary rounded-pill">2</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          A third list item
          <span class="badge bg-primary rounded-pill">1</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          A list item
          <span class="badge bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          A second list item
          <span class="badge bg-primary rounded-pill">2</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          A third list item
          <span class="badge bg-primary rounded-pill">1</span>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection

@section('script')
@endsection