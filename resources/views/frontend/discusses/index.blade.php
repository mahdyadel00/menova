@extends('frontend.layouts.app')
@section('pageTitle', __('site.discusses'))
@section('content')
<div class=" mt-100 mb-70" style="background-color: #E8EAF6;">
  <div class="container">
    <div class="col-lg-6 offset-lg-3 text-center">

      <div class="section-title">	
        <br>
        <h3><span class="pink-text">@lang('site.discusses')</span> </h3>
      </div>
    
    </div>
    <div class="row" >
      <div class="col-lg-3 col-md-2 " >
        <br>
          @include('frontend.discusses.sidemenu') 
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="single-product-item">
          <div class="container rounded bg-white mt-4 mb-5">
            @foreach ($discusses as $discuss)
              <div class="row">
                <div class="col-md-12 border-right">
                  <div class="p-3 ">
                    <div class=" row pt-3 ">
                      <h4 class=" col-md-12 text-left profilepicname">
                        <a href="{{route('frontend.discusses.show', $discuss->uuid)}}">{{$discuss->title}}</a>
                      </h4>
                      <div class=" col-md-12 ">
                        <div class="d-flex flex-start align-items-center m-3">
                          <img class="rounded-circle shadow-1-strong me-3"
                            src="{{$discuss->user->image_path}}" alt="{{$discuss->user->first_name}}" width="50"
                            height="50" />
                            <div class="col-12">
                              <span class="float-right m-3 bordproojecttext">{{$discuss->created_at->diffForHumans()}}</span>
                              <h6 class="fw-bold mb-1 ml-2">{{$discuss->user->full_name}}</h6>
                              <p class="text-muted small mb-0 ml-2">Shared publicly - Jan 2020</p>
                            </div>
                          </div>
                        <p class="mt-3 col-12 text-left bordproojecttext">{{Str::limit($discuss->body, 200, $end='...')}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
              <hr>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3  ">
        <div class="single-product-item">
          <div class="container rounded bg-white mt-4 mb-5">
            <div class="row">
              @include('frontend.discusses.trend-list',['trending_topics' => $trending_topics])
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
