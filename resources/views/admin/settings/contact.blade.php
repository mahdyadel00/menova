@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('settings.settings')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.contact_settings')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    {{--Address--}}
                    <div class="form-group">
                        <label>@lang('settings.address1_en')</label>
                        <input type="text" name="address1_en" class="form-control" value="{{setting('address1_en')}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.address2_en')</label>
                        <input type="text" name="address2_en" class="form-control" value="{{setting('address2_en')}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.address1_ar')</label>
                        <input type="text" name="address1_ar" class="form-control" value="{{setting('address1_ar')}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.address2_ar')</label>
                        <input type="text" name="address2_ar" class="form-control" value="{{setting('address2_ar')}}">
                    </div>

                    {{--Email--}}
                    <div class="form-group">
                        <label>@lang('settings.contact_email')</label>
                        <input type="email" name="contact_email" class="form-control" value="{{setting('contact_email')}}">
                    </div>

                    {{--Phone--}}
                    <div class="form-group">
                        <label>@lang('settings.phone1')</label>
                        <input type="text" name="phone1" class="form-control" value="{{ setting('phone1') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.phone2')</label>
                        <input type="text" name="phone2" class="form-control" value="{{ setting('phone2') }}">
                    </div>

                    {{--Open-hours--}}
                    <div class="form-group">
                        <label>@lang('settings.open_hours_en')</label>
                        <textarea name="open_hours_en" class="form-control">{{ setting('open_hours_en') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.open_hours_ar')</label>
                        <textarea name="open_hours_ar" class="form-control">{{ setting('open_hours_ar') }}</textarea>
                    </div>

                    {{-- Social Media Links--}}
                    <div class="form-group">
                        <label>@lang('settings.facebook')</label>
                        <input type="text" name="facebook" class="form-control" value="{{ setting('facebook') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.twitter')</label>
                        <input type="text" name="twitter" class="form-control" value="{{ setting('twitter') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.instagram')</label>
                        <input type="text" name="instagram" class="form-control" value="{{ setting('instagram') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.linkedin')</label>
                        <input type="text" name="linkedin" class="form-control" value="{{ setting('linkedin') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('settings.dribbble')</label>
                        <input type="text" name="dribbble" class="form-control" value="{{ setting('dribbble') }}">
                    </div>

                    {{--submit--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection
