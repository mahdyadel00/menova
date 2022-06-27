@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('users.users')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('users.users')</a></li>
        <li class="breadcrumb-item">@lang('site.edit')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    @include('admin.partials._errors')

                   {{--FirstName--}}
                   <div class="form-group">
                        @php
                            $input = 'first_name';
                        @endphp
                        <label>@lang('users.'.$input)<span class="text-danger">*</span></label>
                        <input type="text" name="{{$input}}" class="form-control" value="{{ old($input, $user->{$input}) }}"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                   {{--LastName--}}
                   <div class="form-group">
                        @php
                            $input = 'last_name';
                        @endphp
                        <label>@lang('users.'.$input)<span class="text-danger">*</span></label>
                        <input type="text" name="{{$input}}" class="form-control" value="{{ old($input, $user->{$input}) }}"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Email--}}
                    <div class="form-group">
                        @php
                            $input = 'email';
                        @endphp
                        <label>@lang('users.'.$input)<span class="text-danger">*</span></label>
                        <input type="email" name="{{$input}}" class="form-control" value="{{ old($input, $user->{$input}) }}"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Phone--}}
                    <div class="form-group">
                        @php
                            $input = 'phone';
                        @endphp
                        <label>@lang('users.'.$input)<span class="text-danger">*</span></label>
                        <input type="text" name="{{$input}}" class="form-control" value="{{ old($input, $user->{$input}) }}"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>
<!-- 
                    {{--Password--}}
                    <div class="form-group">
                        @php
                            $input = 'password';
                        @endphp
                        <label>@lang('users.'.$input)<span class="text-danger">*</span></label>
                        <input type="password" name="{{$input}}" class="form-control"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Password Confirmation--}}
                    <div class="form-group">
                        @php
                            $input = 'password_confirmation';
                        @endphp
                        <label>@lang('users.'.$input)<span class="text-danger">*</span></label>
                        <input type="password" name="{{$input}}" class="form-control"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div> -->

                    {{--Role--}}
                    <div class="form-group">
                        @php
                            $input = 'roles';
                        @endphp
                        <label>@lang('users.'.$input)<span class="text-danger">*</span></label>
                        @foreach ($roles as $role)
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="{{$input}}[]" value="{{$role->name}}" 
                                {{in_array($role->name, $user->roles->pluck('name')->toArray()) ? 'checked':''}}>
                                <span class="label-text">{{$role->display_name}}</span>
                            </label>
                        </div>
                        @endforeach
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Image--}}
                    <div class="form-group">
                        @php
                            $input = 'image';
                        @endphp
                        <label>@lang('users.'.$input)</label>
                        <input type="file" name="{{$input}}" class="form-control load-image">
                        <img src="{{ $user->image_path }}" class="loaded-image" alt="" style="width: 100px; margin: 10px 0;">
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

