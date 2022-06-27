@extends('layouts.auth')
@section('pageTitle', __('site.complete_profile'))
@section('content')

<div class="container-fluid px-1 px-md-4 py-5 mx-auto">
    <div class="row d-flex ">
        <div class="col-12 col-md-11 col-lg-10 col-xl-9">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-9" style="padding-left: 40px;">
                        <div class="card card00 m-2 border-0">
                            <div class="d-flex flex-md-row px-3 mt-4 flex-column-reverse">
                                <div class="">
                                    <div class="card1">
                                        <ul id="progressbar" class="text-center">
                                            <li class="active step0"></li>
                                            <li class="active step0"></li>
                                            <li class="step0"></li>
                                        </ul>
                                        <h6 class="">@lang('site.create_account')
                                            <p>@lang('site.create_account_hint')</p>
                                        </h6>
                                        <form action="{{route('frontend.complete_profile')}}" method="POST">
                                            @include('frontend.includes._errors')
                                            @csrf
                                            <h6 class="">@lang('site.personal_information')
                                                <p>@lang('site.personal_information_hint')</p>
                                                <div class="row px-3 mt-4">
                                                    @php
                                                        $input = "first_name";
                                                        @endphp
                                                    <div class="col-12  mt-1 mb-1"> 
                                                        <label class="ml-3 form-control-placeholder" for="{{$input}}">@lang('site.first_name')</label> 
                                                        <input type="text" name="{{$input}}" id="{{$input}}" class="form-control babyblue @error($input) is-invalid @enderror"
                                                        value="{{old($input)}}" required> 
                                                        @error($input)
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row px-3 mt-4">
                                                    @php
                                                        $input = "last_name";
                                                    @endphp
                                                    <div class="col-12  mt-1 mb-1"> 
                                                        <label class="ml-3 form-control-placeholder" for="{{$input}}">@lang('site.last_name')</label>
                                                        <input type="text" name="{{$input}}" id="{{$input}}" class="form-control babyblue @error($input) is-invalid @enderror"
                                                        value="{{old($input)}}" required> 
                                                        @error($input)
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror 
                                                    </div>
                                                </div>
                                                <div class="row px-3 mt-4">
                                                    @php
                                                        $input = "location";
                                                        @endphp
                                                    <div class="col-12  mt-1 mb-1"> 
                                                        <label class="ml-3 form-control-placeholder" for="{{$input}}">@lang('site.location')</label>
                                                        <input type="text" name="{{$input}}" id="{{$input}}" class="form-control babyblue @error($input) is-invalid @enderror"
                                                        value="{{old($input)}}" required> 
                                                        @error($input)
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror 
                                                    </div>
                                                </div>
                                                <div class="row px-3 mt-4">
                                                    @php
                                                        $input = "roles";
                                                    @endphp
                                                    <div class="col-12  mt-1 mb-1"> 	
                                                        <label class="ml-3 form-control-placeholder" for="{{$input}}">@lang('site.role')</label> 
                                                        <select name="{{$input}}[]" class="form-control babyblue @error($input) is-invalid @enderror" id="{{$input}}" multiple>
                                                            <option>---</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{$role->name}}" {{old($input) == $role->name ? 'selected':''}}>
                                                                    {{$role->display_name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error($input)
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row px-3 mt-4">
                                                    @php
                                                        $input = "domain_id";
                                                    @endphp
                                                    <div class="col-12  mt-1 mb-1"> 	
                                                        <label class="ml-3 form-control-placeholder" for="{{$input}}">@lang('site.domain_of_interest')</label> 
                                                        <select class="form-control babyblue @error($input) is-invalid @enderror" id="{{$input}}" name="{{$input}}">
                                                            <option>--</option>
                                                            @foreach ($domains as $domain)
                                                                <option value="{{$domain->id}}">{{$domain->name}}</option>
                                                            @endforeach
                                                        </select>	 
                                                        @error($input)
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </h6>
                                            <button type="submit" class="next-button file-upload btn btn-uplaod btn-block shadow">@lang('site.save')</button>
                                        </form> <!-- ./end-form-->
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
