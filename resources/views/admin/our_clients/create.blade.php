@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('our_clients.our_clients')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.our_clients.index') }}">@lang('our_clients.our_clients')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <h3>{{__('our_clients.our_clients')}}</h3>

                <ul class="nav nav-tabs">
                    @foreach (config('translatable.locales') as $index=>$locale)
                        <li class="nav-item"><a class="nav-link {{$index == 0 ? 'active' : ''}}" data-toggle="tab" href="#{{$locale}}">{{strtoupper($locale)}}</a></li>
                    @endforeach
                </ul>

                <form method="post" action="{{ route('admin.our_clients.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                        {{--Image--}}
                    <div class="form-group">
                        @php
                            $input = 'image';
                        @endphp
                        <label>@lang('our_clients.'.$input)</label>
                        <input type="file" name="{{$input}}" class="form-control load-image">
                        <img src="{{ Storage::url('uploads/images/our_clients/default.jpg') }}" class="loaded-image" alt="" style="width: 100px; margin: 10px 0;">
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Published--}}
                    <div class="form-group">
                      
                        <label>@lang('our_clients.published')</label>
                       <input type="checkbox" name="published" class="form-control"   autofocus>
                        @error('published') <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection


