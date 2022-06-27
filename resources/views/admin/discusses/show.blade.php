@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('discuss.discusses')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.discusses.index') }}">@lang('discuss.discusses')</a></li>
        <li class="breadcrumb-item">@lang('site.show')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

              <h3 class="tile-title">{{$discuss->title}}</h3>

              <div class="tile-body">
                {!! $discuss->body !!}
              </div><!-- end of body -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


