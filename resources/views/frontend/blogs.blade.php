@extends('layouts.app')
@section('pageTitle', __('site.blogs'))
@section('content')
    <div class=" mt-100  pb-80 ">
        <div class="container">
            <div class="row">
                <span class="bgdot" ></span>
                <div class="col-lg-6 offset-lg-3 text-center">
                    <div class="section-title">
                        <br>
                        <h3><span class="pink-text">@lang('site.our_blogs')</span></h3>
                    </div>
                </div>
                <span class="bgdot1" >
                </span>
                <div class=" row softcard">
                    <div class="container-fluid pt-10">
                        <div class="row justify-content-md-center ">
                            <div class="col-md-12 col-sm-12">
                                <div class="card-columns">
                                    @foreach ($blogs as $blog)
                                    <a href="{{route('frontend.blogs.show', $blog->slug)}}">
                                        <div class="card mt-4 card-hover h-100" >
                                            <div class="card-img ">
                                                <img class="card-img-top" src="{{$blog->domain->image_path}}" height="330px" alt="Card image cap">
                                            </div>
                                            <div class="">
                                                <div class="reveal h-100 d-flex card-img-overlay1">
                                                <span class="bgdot11"></span>
                                                    <div class="w-100 m-40 text-left">
                                                        <h3 class="card-title color-white">{{$blog->title}}</h3>
                                                        <div class="card-text color-white mt-2">{!! Str::limit($blog->body, 200, '...') !!}</div>
                                                        <div class="row mt-5">
                                                            <div class="col-2 p-0">
                                                                <img src="{{$blog->user->image_path}}" width="50px" height="50px">
                                                            </div>
                                                            <div class="col-6">
                                                                <span class="card-text color-white">{{$blog->user->full_name}}</span>
                                                                <p class=" color-white">
                                                                    <span class="">{{$blog->created_at->toFormattedDateString()}}</span>
                                                                </p>
                                                            </div>
                                                            <div class="col-4">
                                                                <p class="card-text color-white">
                                                                    <span class="float-right mt-4">{{$blog->domain->name}}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (count($blogs) == 0)
                    @include('frontend.includes._no-results')
                @endif
            </div>
        </div>
    </div>
    @if(count($blogs))
        {!! $blogs->links() !!}
    @endif
@endsection
