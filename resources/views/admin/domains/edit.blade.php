@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('domains.domains')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.domains.index') }}">@lang('domains.domains')</a></li>
        <li class="breadcrumb-item">@lang('site.edit')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <h3>{{__('domains.domains')}}</h3>

                <ul class="nav nav-tabs">
                    @foreach (config('translatable.locales') as $index=>$locale)
                        <li class="nav-item"><a class="nav-link {{$index == 0 ? 'active' : ''}}" data-toggle="tab" href="#{{$locale}}">{{strtoupper($locale)}}</a></li>
                    @endforeach
                </ul>

                <form method="post" action="{{ route('admin.domains.update', $domain->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    @include('admin.partials._errors')

                    <div class="tab-content" id="myTabContent">

                        @foreach (config('translatable.locales') as $index=>$locale)
                        <div class="tab-pane fade show {{$index == 0 ? 'active' : ''}} pt-2" id="{{$locale}}">

                            {{--Name--}}
                            <div class="form-group">
                                @php
                                    $input = 'name';
                                @endphp
                                <label>@lang('domains.'.$locale.'.'.$input)<span class="text-danger">*</span></label>
                                <input type="text" name="{{$locale.'_'.$input}}" class="form-control" 
                                value="{{ old($locale.'_'.$input, $domain->translate($locale)->{$input}) }}" required autofocus>
                                @error($locale.'_'.$input) <div class="text-danger">{{$message}}</div>@enderror
                            </div>

                        </div><!-- end of tab-pane -->
                        @endforeach

                    </div><!-- end of tab-content -->


                    {{--Image--}}
                    <div class="form-group">
                        @php
                            $input = 'image';
                        @endphp
                        <label>@lang('domains.'.$input)</label>
                        <input type="file" name="{{$input}}" class="form-control load-image">
                        <small class="d-block">@lang('domains.image_note')</small>
                        <img src="{{ $domain->image_path }}" class="loaded-image" alt="" style="width: 100px; margin: 10px 0;">
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

