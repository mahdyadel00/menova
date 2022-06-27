@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('projects.projects_types')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.project-types.index') }}">@lang('projects.projects_types')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <h3>{{__('projects.projects_types')}}</h3>

                <ul class="nav nav-tabs">
                    @foreach (config('translatable.locales') as $index=>$locale)
                        <li class="nav-item"><a class="nav-link {{$index == 0 ? 'active' : ''}}" data-toggle="tab" href="#{{$locale}}">{{strtoupper($locale)}}</a></li>
                    @endforeach
                </ul>

                <form method="post" action="{{ route('admin.project-types.store') }}">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    <div class="tab-content" id="myTabContent">

                        @foreach (config('translatable.locales') as $index=>$locale)
                        <div class="tab-pane fade show {{$index == 0 ? 'active' : ''}} pt-2" id="{{$locale}}">

                            {{--Name--}}
                            <div class="form-group">
                                @php
                                    $input = 'name';
                                @endphp
                                <label>@lang('projects.'.$locale.'.'.$input)<span class="text-danger">*</span></label>
                                <input type="text" name="{{$locale.'_'.$input}}" class="form-control" value="{{ old($locale.'_'.$input) }}"  autofocus>
                                @error($locale.'_'.$input) <div class="text-danger">{{$message}}</div>@enderror
                            </div>

                        </div><!-- end of tab-pane -->
                        @endforeach

                    </div><!-- end of tab-content -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


