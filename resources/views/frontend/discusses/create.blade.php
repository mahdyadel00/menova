@extends('layouts.app')
@section('pageTitle', __('site.discusses'))
@section('content')
<div class=" mt-100 mb-70" style="background-color: #E8EAF6;">
  <div class="container">
    <div class="col-lg-6 offset-lg-3 text-center">

      <div class="section-title">	
        <br>
        <h3><span class="pink-text">@lang('site.discuss') </span> </h3>
      </div>
    
    </div>
    <div class="row" >
      <div class="col-lg-3 col-md-2 " >
        <br>
        @include('frontend.discusses.sidemenu')  
      </div>
      <div class="col-lg-6 col-md-6  ">
        <div class="single-product-item">
          <div class="container rounded bg-white mt-4 mb-5">
            <div class="row">
            
              <div class="col-md-12 border-right">
                <div class="p-3 ">
                  <div class=" row pt-3 ">
                    <h4 class=" col-md-12 text-left profilepicname"> <i class="fa fa-question-circle" aria-hidden="true"></i>
                     @lang('site.ask_your_question')</h4>
                    <div class=" col-md-12 bgsetting1">
                      <p class="mt-3 col-12 text-left ">We are excited to have you as part of the Menova Hub community. To make sure you get the most out of this community discussion tool, here are a few guidelines:</p>
                      <h5 class="mt-50 mt-3 col-12 text-left profilepicname ">Highly encouraged</h5>
                      <div class="offset-md-1 col-sm-11 ">
                        <p class="colorfontdis">- Post questions related to entrepreneurship.</p>
                        <p class="colorfontdis">- Check to make sure your question hasn't been posted already. </p>
                        <p class="colorfontdis">- Connect with other community members.</p>
                      </div>
                      <h5 class="mt-50 mt-3 col-12 text-left profilepicname ">Highly encouraged</h5>
                      <div class="offset-md-1 col-sm-11 pb-3">
                        <p class="colorfontdis">- Soliciting a Menova Hub, adviser, or team member. That's what the Connect section is for.</p>
                        <p class="colorfontdis">- Promote yourself, your services or solicit business [directly/indirectly]. </p>
                        <p class="colorfontdis">- Post vague questions. </p>
                        <p class="colorfontdis">- Post questions without description. </p>

                      </div>
                    
                    </div>
                    <form action="{{route('frontend.discusses.store')}}" method="post">
                      <div class="row">
                        @csrf
                        <div class="col-md-12" >
                          @php
                            $input = "title";
                          @endphp
                          <div class="form-group mt-4">
                            <label class="colorfontdis" >@lang('site.title')</label>
                            <input type="text" name="{{$input}}" class="formcontroldiss" required min="100">
                            @error($input)
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12" >
                          @php
                            $input = "body";
                          @endphp
                          <div class="form-group mt-4">
                            <label class="colorfontdis">@lang('site.body')</label>
                            <textarea class="formcontroldiss" name="{{$input}}" id="editor" rows="7" required></textarea>
                            @error($input)
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12" >
                          @php
                              $input = "topic_id";
                          @endphp
                          <label class="colorfontdis" >@lang('site.topics')</label>
                          <select name="{{$input}}" class="form-control formcontroldiss">
                            <option selected disabled>@lang('site.search_for_topics')</option>
                              @foreach ($topics as $topic)
                                  <option value="{{$topic->id}}" {{$topic->id == old($input) ? 'selected' : ''}}>{{$topic->name }}</option>
                              @endforeach
                            </select>
                            @error($input)
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                      </div>
                      <button type="submit" class="btn btn-edit softadd my-3">@lang('site.publish')</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
