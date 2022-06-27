@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('users.edit_profile')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('users.edit_profile')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    @include('admin.partials._errors')

                    {{--first name--}}
                    <div class="form-group">
                        <label>@lang('users.first_name') <span class="text0danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" 
                            value="{{ old('first_name', auth()->user()->first_name) }}" >
                    </div>
                    {{--last_name--}}
                    <div class="form-group">
                        <label>@lang('users.last_name') <span class="text0danger">*</span></label>
                        <input type="text" name="last_name" class="form-control" 
                            value="{{ old('last_name', auth()->user()->last_name) }}" >
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>@lang('users.email') <span class="text0danger">*</span></label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', auth()->user()->email) }}" >
                    </div>

                    {{--image--}}
                    <div class="form-group">
                        <label>@lang('users.image') <span class="text0danger">*</span></label>
                        <input type="file" name="image" class="form-control load-image">
                        <img src="{{auth()->user()->image_path}}" class="loaded-image" alt="" 
                            style="display: {{ auth()->user()->hasImage() ? 'block' : 'none' }}; width: 50px; margin: 10px 0;">
                    </div>
                    {{--submit--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection
