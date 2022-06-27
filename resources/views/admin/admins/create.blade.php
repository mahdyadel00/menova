@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('admins.admins')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">@lang('admins.admins')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.admins.store') }}">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--First_name--}}
                    <div class="form-group">
                        <label>@lang('users.first_name') <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" autofocus class="form-control" value="{{ old('first_name') }}" >
                    </div>
                    {{--Last_name--}}
                    <div class="form-group">
                        <label>@lang('users.last_name') <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" autofocus class="form-control" value="{{ old('last_name') }}" >
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>@lang('users.email') <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" >
                    </div>

                    {{--Phone--}}
                    <div class="form-group">
                        <label>@lang('users.phone') <span class="text-danger">*</span></label>
                        <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" >
                    </div>

                    {{--password--}}
                    <div class="form-group">
                        <label>@lang('users.password') <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" value="" >
                    </div>

                    {{--password_confirmation--}}
                    <div class="form-group">
                        <label>@lang('users.password_confirmation') <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" value="" >
                    </div>

                    {{--role_id--}}
                    <div class="form-group">
                        <label>@lang('roles.role') <span class="text-danger">*</span></label>
                        <select name="role_id" class="form-control select2" >
                            <option value="">@lang('site.choose') @lang('roles.role')</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == old('role_id') ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.create')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection