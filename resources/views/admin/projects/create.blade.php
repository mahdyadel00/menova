@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('projects.projects')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">@lang('projects.projects')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <h3>{{__('projects.projects')}}</h3>

                <form method="post" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--Title--}}
                    <div class="form-group">
                        @php
                            $input = 'title';
                        @endphp
                        <label>@lang('projects.'.$input)<span class="text-danger">*</span></label>
                        <input type="text" name="{{$input}}" class="form-control" value="{{ old($input) }}"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    {{--Link--}}
                    <div class="form-group">
                        @php
                            $input = 'link';
                        @endphp
                        <label>@lang('projects.'.$input)<span class="text-danger">*</span></label>
                        <input type="text" name="{{$input}}" class="form-control" value="{{ old($input) }}"  autofocus>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Description--}}
                    <div class="form-group">
                        @php
                            $input = 'description';
                        @endphp
                        <label>@lang('projects.'.$input)<span class="text-danger">*</span></label>
                        <textarea name="{{$input}}" class="form-control" id="editor"  autofocus>{{ old($input) }}</textarea>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>


                    {{--Domain--}}
                    <div class="form-group">
                        @php
                            $input = 'domain_id';
                        @endphp
                        <label>@lang('projects.domain')<span class="text-danger">*</span></label>
                        <select name="{{$input}}" class="form-control select2" >
                            <option>--</option>
                            @foreach ($domains as $domain)
                                <option value="{{$domain->id}}" {{$domain->id == old($input) ? 'selected' : ''}}>
                                    {{$domain->name}}
                                </option>
                            @endforeach
                        </select>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--ProjectType--}}
                    <div class="form-group">
                        @php
                            $input = 'project_type_id';
                        @endphp
                        <label>@lang('projects.project_type')<span class="text-danger">*</span></label>
                        <select name="{{$input}}" class="form-control select2" >
                            <option>--</option>
                            @foreach ($projectTypes as $pt)
                                <option value="{{$pt->id}}" {{$pt->id == old($input) ? 'selected' : ''}}>{{$pt->name}}</option>
                            @endforeach
                        </select>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--User--}}
                    <div class="form-group" id="users_list">
                        @php
                            $input = 'user_id';
                        @endphp
                        <label>@lang('projects.user')<span class="text-danger">*</span></label>
                        <select name="{{$input}}" class="form-control select2" >
                            <option>--</option>
                        </select>
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Image--}}
                    <div class="form-group">
                        @php
                            $input = 'image';
                        @endphp
                        <label>@lang('projects.'.$input)</label>
                        <input type="file" name="{{$input}}" class="form-control load-image">
                        <img src="{{ Storage::url('uploads/images/projects/default.jpg') }}" class="loaded-image" alt="" style="width: 100px; margin: 10px 0;">
                        @error($input) <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    {{--Attachment--}}
                    <div class="form-group">
                        @php
                            $input = 'attachment';
                        @endphp
                        <label>@lang('projects.'.$input) <i class="mx-2 far fa-file"></i></label>
                        <input type="file" name="{{$input}}" class="form-control">
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
        // Select user
        $('#users_list .select2').select2({
            ajax:{
                url: '{{ route('admin.users.list')}}',
                type:'get',
                datatype: 'json',
                delay:250,
                data:function(params){
                    var query = {
                        query: params.term,
                        page: params.page || 1
                    }
                    return query;
                },
                processResults: function (response, params) {
                    params.page = params.page || 1;
                    let data = $.map(response.data, function(item) {
                        return { id: item.id, text: item.first_name+' '+item.last_name };
                    });
                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 10) < response.total
                        }
                    };
                },
                cache: false
            }
        });//end of select user.
    });
</script>
@endpush


