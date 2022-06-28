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
        <div class = "col-md-3 ">
            <button type="button" class="btn btn-primary col-11 align-self-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Ask question
              </button>
            {{-- <a href="#" class="btn btn-primary">Ask question </a> --}}

        </div>
        <div class = "col-md-6 ">


              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>
                 
                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single" class="comment-icon"> <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>
                 
                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single" class="comment-icon"> <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>
                 
                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single" class="comment-icon"> <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>
              
              
        </div>
        <div class = "col-md-3">
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

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Ask Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class='' action = "" method='POST' enctype="multipart/form-data">
        <div class="modal-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title </label>
                <input type="text" class="form-control" id="title" name='title' required
                    placeholder='Please Enter Your Title'>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body </label>
                <textarea class="form-control" id="body" name='body' required
                    placeholder='Please Enter Your Contractor Name'></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class="d-flex justify-content-start">
                <button type="button" class="btn btn-light text-right" data-bs-dismiss="modal">Close</button>

            </div>
          <button type="submit" id = 'ask' name  = 'ask' class="btn btn-primary">Ask</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  </div>
@endsection

@section('script')
@endsection
