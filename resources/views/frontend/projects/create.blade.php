<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-lg modal-dialog" role="document">
        <div class="modal-content modalupload">
            <div class="modal-header p-4">
                <h5 class="modal-title" style="padding: 12px;" id="exampleModalLongTitle" ><img class="img" src="{{asset('frontend/assets/img/icon i.png')}}">
                    <span class="modal-title" > @lang('site.start_new_project')</span>
                    <p  class="paragraph">@lang('site.start_new_project_desc')</p>
                </h5>
                <button type="button" style="padding: 12px;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('frontend.projects.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 border-right">
                        <div>
                            <div class="row mb-5 ">
                                @php
                                    $input = 'title';
                                @endphp
                                <div class="col-md-12">
                                    <label class="labelsname">@lang('site.project_name')</label>
                                    <input type="text" name="{{$input}}" value="{{old($input)}}" class="form-control form-control1" placeholder="@lang('site.enter_project_name')">
                                    @error($input)
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-5 ">
                                @php
                                    $input = 'description';
                                @endphp
                                <div class="col-md-12 "><label class="labelsname">@lang('site.project_description')</label>
                                    <textarea class="form-control form-control1" name="{{$input}}" id="editor" rows="7">{!! old($input) !!}</textarea>
                                    @error($input)
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row  mb-5">
                                @php
                                    $input = 'project_type_id';
                                @endphp
                                <div class="col-md-12 ">
                                    <label class="labelsname">@lang('site.project_type')</label>
                                    <select name="{{$input}}" class="form-control form-control1">
                                        <option>--</option>
                                        @forelse ($project_types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @empty
                                            <option>@lang('site.no_data')</option>
                                        @endforelse
                                    </select>
                                    @error($input)
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-5 ">
                                @php
                                    $input = "domain_id";
                                @endphp
                                <div class="col-md-12 ">
                                    <label class="labelsname">@lang('site.domain_of_interest')</label>
                                    <select name="{{$input}}" class="form-control form-control1" aria-placeholder="@lang('site.domain_of_interest')">
                                        <option>--</option>
                                        @forelse ($domains as $domain)
                                            <option value="{{$domain->id}}">{{$domain->name}}</option>
                                        @empty
                                            <option>@lang('site.no_data')</option>
                                        @endforelse
                                    </select>
                                    @error($input)
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row  mb-5 ">
                                <div class="col-md-12 ">
                                    <label class="labelsname">@lang('site.attach_file')</label>
                                    <br>
                                    <label for="fileUpload_create" class="file-upload attach file-upload1  form-control1">
                                        <input id="fileUpload_create" name="file" type="file">
                                    </label>
                                    <p style="color: #707070;" class="paragraph">@lang('site.attach_file_note')</p>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-edit  softadd white" type="submit"> <i class="fa fa-upload"></i> @lang('site.upload')</button>
                    </div>
                </form><!-- end of form-->
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script src="{{asset('admin_assets/plugins/ckeditor/ckeditor.js')}}"></script>
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
