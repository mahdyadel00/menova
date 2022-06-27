@extends('layouts.app')
@section('pageTitle', $blog->title)
@push('styles')
    <style>
      .subheader:first-letter{
        font-size: 32px;
        line-height: 0%;
        font-weight: bold;
      }
    </style>
@endpush
@section('content')
<div class="container">
  <div class="list-box pt-100 pb-80">
      <div class="container">
          <div class="row">
              <div class="col-lg-5 col-md-5 mb-4 mb-lg-0 mr-0 pr-0">
                  <div class="right-side d-inline-flex">
                      <img src="{{$blog->image_path}}">
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 mb-4 mb-lg-0 ml-0 pl-0">
                  <div class="greyy-text">
                      {{$blog->domain->name}}
                  </div>
                  <hr class="hr-grey mb-3">
                  <div class="blue-title">
                      {{$blog->title}}
                  </div>
                  <hr class="hr-grey-bolder">
                  <br>
                  <div class="greyy-text subheader">
                     {!! $blog->body !!}
                  </div>
                  <br>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
