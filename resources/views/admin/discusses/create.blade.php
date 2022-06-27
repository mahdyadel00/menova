@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('discuss.discusses')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.discusses.index') }}">@lang('discuss.discusses')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <h3>{{__('discuss.discusses')}}</h3>

                <form method="post" action="{{ route('admin.discusses.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--Title--}}
                    <div class="form-group">
                        @php
                            $input = 'title';
                        @endphp
                        <label>@lang('discuss.'.$input)<span class="text-danger">*</span></label>
                        <input type="text" name="{{$input}}" class="form-control" value="{{ old($input) }}" required autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Description--}}
                    <div class="form-group">
                        @php
                            $input = 'body';
                        @endphp
                        <label>@lang('discuss.'.$input)<span class="text-danger">*</span></label>
                        <textarea name="{{$input}}" class="form-control" id="editor" required autofocus>{{ old($input) }}</textarea>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    
                    {{--Topic--}}
                    <div class="form-group">
                        @php
                            $input = 'topic_id';
                        @endphp
                        <label>@lang('discuss.topic')<span class="text-danger">*</span></label>
                        <select name="{{$input}}" class="form-control select2" required>
                            <option>--</option>
                            @foreach ($topics as $topic)
                                <option value="{{$topic->id}}" {{$topic->id == old($input) ? 'selected' : ''}}>
                                    {{$topic->name}}
                                </option>
                            @endforeach
                        </select>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
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
        if ($('#editor').length) {
            CKEDITOR.replace('editor');
        }
    });
</script>
@endpush


