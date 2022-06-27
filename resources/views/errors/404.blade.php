@extends('errors.layout')
@section('pageTitle', __('Not Found'))
@section('content')
<div class=" pt-80 pb-80 ">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
              <p class="blue-title mt-5">
                  @lang('site.oops')
              </p>
              <div class="blue-textt">
                  @lang('site.404_title')
              </div>
              <div class="greyy-text">@lang('site.404_message')
              </div>
              <br> <br>
              <button class=" btn-pink btn" onclick="history.back()"> <i class="fa fa-arrow-left "></i> <span class="ml-2">@lang('site.go_back')</span></button>
          </div>
          <div class="col-6">
              <div class="imgg mt-10">
                  <img src="{{asset('frontend/assets/img/404 error.png')}}" class="mt-10">
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
