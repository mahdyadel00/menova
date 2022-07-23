@extends('frontend.layouts.master')

@section('title')
Menovahub-Profile

@endsection

@section('style')

@endsection

@section('content')
<div class="container rounded bg-white mt-4 mb-4">
    <div class="row justify-content-md-center">

        <div class="col-md-8 border border-light">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle " width="150px" src="{{ asset(auth()->user()->image_path)  }}"><span class="font-weight-bold">{{ auth()->user()->first_name }}  {{ auth()->user()->last_name }} </span><span class="text-black-50">{{ auth()->user()->email }}</span><span> </span></div>
        </div>
        <div class="col-md-8 border border-light">
            <form action="{{ route('profile.update' , auth()->user()->id) }}" method="POST">
                @csrf
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">@lang('site.profile_settings')</h4>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12 mb-3"><label class="labels">@lang('site.first_name')</label><input type="text" id = 'name' name = 'first_name' class="form-control" placeholder="@lang('site.first_name')" value="{{ auth()->user()->first_name }}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">@lang('site.last_name')</label><input type="text" id = 'name' name = 'last_name' class="form-control" placeholder="@lang('site.last_name')" value="{{ auth()->user()->last_name }}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">@lang('site.email') </label><input type="text" id = 'email' name = 'email' class="form-control" placeholder="@lang('site.email')" value="{{ auth()->user()->email }}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">@lang('site.mobile_number')</label><input type="text" id = 'phone' name = 'phone' class="form-control" placeholder="@lang('site.mobile_number')" value="{{ auth()->user()->phone }}"></div>
                    <div class="col-md-12 mb-3"><label class="labels">@lang('site.state')</label><input type="text" id = 'state' name = 'location' class="form-control" placeholder="@lang('site.state')" value="{{ auth()->user()->location }}"></div>
                </div>
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">@lang('site.save_profile')</button></div>
            </div>
            </form>
    </div>
       
    </div>
</div>
@endsection

@section('script')
@endsection
