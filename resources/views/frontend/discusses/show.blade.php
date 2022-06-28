@extends('frontend.layouts.app')
@section('pageTitle', $discuss->title)
@push('styles')
    <style>
      .like, .like a{
        color:#707070;
      }
      .isLiked {
        color: #1A237E !important;
      }
    </style>
@endpush
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
      <div class="col-lg-6 col-md-6  ">
        <div class="single-product-item">
          <div class="container rounded bg-white mt-4 mb-5">
            <div class="row">
            
              <div class="col-md-12 border-right">
                <div class="p-3 ">
                  
                  <div class=" row pt-3 ">
                    <h4 class=" col-md-12 text-left profilepicname">{{$discuss->title}}</h4>
                    <div class=" col-md-12 ">
                      <div class="d-flex flex-start align-items-center m-3">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="{{$discuss->user->image_path}}" alt="{{$discuss->user->full_name}}" width="50"
                          height="50" />
                        <div class="col-12">
                          <span class="float-right m-3 bordproojecttext">{{$discuss->created_at->diffForHumans()}}</span>
                          <h6 class="fw-bold mb-1 ml-2">{{$discuss->user->full_name}}</h6>
                          <p class="text-muted small mb-0 ml-2">Shared publicly - Jan 2020</p> 
                        </div>
                        </div>
                      <p class="mt-3 col-12 text-left bordproojecttext ">{!! $discuss->body !!}</p>
                      <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                          <div class="bg-white p-2">
                            <div class="d-flex flex-row fs-12">

                              <div class="like p-2 cursor">
                                @auth
                                  <a href="javascript:void(0)" data-id="{{$discuss->id}}" 
                                    class="like-btn {{$discuss->likes->contains('user_id', auth()->id()) ? 'isLiked':''}}">
                                    <i class="fa fa-thumbs-up"></i>
                                    <span class="likesCount">{{$discuss->likes()->count()}}</span>
                                    <span class="ml-1">@lang('site.like')</span>
                                  </a>
                                @else 
                                  <p>
                                    <i class="fa fa-thumbs-up"></i>
                                    <span>{{$discuss->likes()->count()}}</span>
                                    <span class="ml-1">@lang('site.like')</span>
                                  </p>
                                @endauth
                              </div>
     
                              <a class="like p-2 cursor  active" id="nav-home-tab" data-toggle="tab" href="#nav-home" 
                              role="tab" aria-controls="nav-home" aria-selected="true"> <i class="fa fa-comments"></i>@lang('site.comments')</a>
                            </div>
                          </div>
                          <div id="collapse-1" class="bg-light p-2 collapse" data-parent="#myGroup">
                            <div class="d-flex flex-row align-items-start">
                              <img class="rounded-circle" src="{{auth()->user()->image_path }}" width="40">
                              <textarea name="replay" class="form-control ml-1 shadow-none textarea"></textarea></div>
                            <div class="mt-2 text-right">
                              <button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button>
                              <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button>
                            </div>
                          </div>
                        </div>
                        <div class="tab-content  mt-3" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @include('frontend.discusses.comments',['comments' => $discuss->comments])

                            {{-- Comment input --}}
                            <div class="media-block  mt-3  col-12">
                              <form action="{{route('frontend.comment.add')}}" method="post">
                                @csrf
                                <input type="hidden" name="discuss_id" value="{{ $discuss->id }}" />
                                <div class="d-flex flex-row align-items-start">
                                  <div class="col-2">
                                    <img class="rounded-circle" src="{{auth()->user()->image_path}}" width="50">
                                  </div>
                                  <div class="col-10">
                                      <textarea name="comment" class="w-100 ml-1 bgsetting1 shadow-none textarea"></textarea>
                                    <div class="mt-2 text-right">
                                      <button class="btn btn-primary btn-sm shadow-none" type="submit">@lang('site.post_comment')</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div><!-- end of comment input -->

                          </div><!-- end of tab-pane -->
                        </div><!-- end of tab-content -->
                      </div>
                    </div>
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

@push('scripts')
    <script>
      $(function(){
        $.ajaxSetup({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        });

        $('.like-btn').on('click', function(e){
          var isLogedIn = {{Auth::check()}};
          if (!isLogedIn) {
            alert("@lang('site.login_first')");
            return;
          }
          var elem = $(this);
          var id = elem.data('id');

          $.ajax({
            url: "{{route('frontend.likes.add')}}",
            method: 'POST',
            data: {id},
            success: function (response) {
              elem.find('.likesCount').text(response.likes);
              if(elem.hasClass('isLiked')) {
                elem.removeClass('isLiked');
              }else{
                elem.addClass('isLiked');
              } 
            }
          });
        });
      });
    </script>
@endpush
