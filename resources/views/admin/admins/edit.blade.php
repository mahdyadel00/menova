@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('admins.admins')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">@lang('admins.admins')</a></li>
        <li class="breadcrumb-item">@lang('site.edit')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.admins.update', $admin->id) }}">
                    @csrf
                    @method('put')

                    @include('admin.partials._errors')

                    {{--first_name--}}
                    <div class="form-group">
                        <label>@lang('users.first_name') <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $admin->first_name) }}" required>
                    </div>

                    {{--last_name--}}
                    <div class="form-group">
                        <label>@lang('users.last_name') <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $admin->last_name) }}" required>
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>@lang('users.email') <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                    </div>
                    {{--phone--}}
                    <div class="form-group">
                        <label>@lang('users.phone') <span class="text-danger">*</span></label>
                        <input type="number" name="phone" class="form-control" value="{{ old('phone', $admin->phone) }}" required>
                    </div>

                    {{--role_id--}}
                    <div class="form-group">
                        <label>@lang('roles.role') <span class="text-danger">*</span></label>
                        <select name="role_id" class="form-control select2" required>
                            <option value="">@lang('site.choose') @lang('roles.role')</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection