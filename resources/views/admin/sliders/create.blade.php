@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('sliders.sliders')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">@lang('sliders.sliders')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <h3>{{__('sliders.sliders')}}</h3>

                <ul class="nav nav-tabs">
                    @foreach (config('translatable.locales') as $index=>$locale)
                        <li class="nav-item"><a class="nav-link {{$index == 0 ? 'active' : ''}}" data-toggle="tab" href="#{{$locale}}">{{strtoupper($locale)}}</a></li>
                    @endforeach
                </ul>

                <form method="post" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
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
                                    <label>@lang('sliders.'.$locale.'.'.$input)<span class="text-danger">*</span></label>
                                    <input type="text" name="{{$locale.'_'.$input}}" class="form-control" value="{{ old($locale.'_'.$input) }}"  autofocus>
                                    @error($locale.'_'.$input) <div class="text-danger">{{$message}}</div>@enderror
                                </div>

                                {{--Description--}}
                                <div class="form-group">
                                    @php
                                        $input = 'description';
                                    @endphp
                                    <label>@lang('sliders.'.$locale.'.'.$input)<span class="text-danger">*</span></label>
                                    <textarea name="{{$locale.'_'.$input}}" class="form-control" id="editor_{{$locale}}"  autofocus>{!! old($locale.'_'.$input) !!}</textarea>
                                    @error($locale.'_'.$input) <div class="text-danger">{{$message}}</div>@enderror
                                </div>

                            </div> <!-- end of tab-pane-->

                        @endforeach

                    </div> <!-- end of tab-content-->

                   

                    {{--Image--}}
                    <div class="form-group">
                        @php
                            $input = 'image';
                        @endphp
                        <label>@lang('sliders.'.$input)</label>
                        <input type="file" name="{{$input}}" class="form-control load-image">
                        <img src="{{ Storage::url('uploads/images/sliders/default.jpg') }}" class="loaded-image" alt="" style="width: 100px; margin: 10px 0;">
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Published--}}
                    <div class="form-group">
                      
                        <label>@lang('sliders.published')</label>
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

@push('scripts')
<script src="{{asset('admin_assets/js/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function(){
        // Ckeditor config
        CKEDITOR.config.language="{{ app()->getLocale() }}";
        if ($('#editor_en').length) {
            CKEDITOR.replace('editor_en');
        }
        if ($('#editor_ar').length) {
            CKEDITOR.replace('editor_ar');
        }
    });
</script>
@endpush


