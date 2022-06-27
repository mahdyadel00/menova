@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('projects.projects')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">@lang('projects.projects')</a></li>
        <li class="breadcrumb-item">@lang('site.show')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

              <h3>{{$project->title}}</h3>

              <div class="mt-5">
                <h6>@lang('projects.description')</h6>
                {!! $project->description !!}
              </div> <!-- end of discription -->

              <div class="mt-5" style="width:360px;">
                <h6>@lang('projects.image')</h6>
                <img src="{{$project->image_path}}" style="width:100%;height:auto;">  
              </div> <!-- end of image -->

              <div class="mt-5">
                <h6>@lang('projects.attachment')</h6>
                @if ($project->attachment_path)
                  <a href="{{$project->attachment_path}}" class="btn btn-secondary" download>
                    @lang('projects.download') <i class="fas fa-download"></i>
                  </a>
                @endif  
              </div> <!-- end of attachment -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


