<div class="modal fade" id="editproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-lg modal-dialog" role="document">
        <div class="modal-content modalupload">
            <div class="modal-header p-4">
                <h5 class="modal-title" style="padding: 12px;" id="editproject" ><img class="img1" src="{{asset('frontend/assets/img/iconedit.svg')}}">
                    <span class="modal-title">@lang('site.edit_your_project')</span>
                    <p  class="paragraph">@lang('site.edit_project_note')</p>
                </h5>
                <button type="button" style="padding: 12px;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('frontend.projects.update',0)}}" id="edit-project-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 border-right">
                        <div>
                            <div class="row mb-5 ">
                                @php
                                    $input = 'title';
                                @endphp
                             
                                <div class="col-md-12">
                                    <label class="labelsname">@lang('site.project_name')</label>
                                    <input type="text" id="project_{{$input}}" name="{{$input}}" value="" class="form-control form-control1" placeholder="@lang('site.enter_project_name')">
                                    @error($input)
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-5 ">
                                @php
                                    $input = 'description';
                                @endphp
                                <div class="col-md-12 ">
                                    <label class="labelsname">@lang('site.project_description')</label>
                                    <textarea id="project_{{$input}}" class="form-control form-control1" name="{{$input}}" rows="7">{!! old($input) !!}</textarea>
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
                                    <select id="{{$input}}" name="{{$input}}" class="form-control form-control1">
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
                                    <select id="project_{{$input}}" name="{{$input}}" class="form-control form-control1">
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
                        <button class="btn btn-edit softadd white" type="submit"> <i class="fa fa-upload"></i> @lang('site.upload')</button>
                    </div>
                </form><!-- end of form-->
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            CKEDITOR.config.language="{{ app()->getLocale() }}";
            if ($('#project_description').length) {
                CKEDITOR.replace('project_description');
            }
            
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            var btnEdit = $('.edit-project');
            btnEdit.on('click', function(e){
                e.preventDefault();
                let projectId = $(this).attr('data-id');
                let url = "{{ route('frontend.projects.update',':id') }}";
                    url = url.replace(':id', projectId);
                $('#edit-project-form').attr('action',url);
                fillProjectData(projectId);
            });

            function fillProjectData(id) {
                $.ajax({
                    url: '{{ route('frontend.projects.get_data') }}',
                    type: 'GET',
                    data: {id},
                    success: function(response){
                        let data = response.data;

                        $('#project_title').val(data.title);
                        CKEDITOR.instances.project_description.setData(data.description, function()
                        {
                            this.checkDirty();  // true
                        });
                        $('#project_type_id').val(data.project_type_id);
                        $('#project_domain_id').val(data.domain_id);
                    }
                });
            }
        });
    </script>
@endpush
