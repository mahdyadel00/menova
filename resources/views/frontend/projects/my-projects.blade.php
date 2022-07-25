@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')
@endsection

@section('content')
<section class=" inner-my-projects">
    <div class="container">

        <header class="sec-inner-heading  sec-padding">
            <div class="title col-md-12 ">
                <h2> @lang('site.my_project')</h2>

                <button id="myBtn" class="btn btn-sub m-left">@lang('site.create_project')</button>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>

                        <form class='' action="{{ route('frontend.projects.store') }}" method='POST' enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">@lang('site.title') </label>
                                    <input type="text" class="form-control" id="title" name='title' placeholder="@lang('site.please_enter_your_name')" required>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">@lang('site.link_project') </label>
                                    <input type="text" class="form-control" id="link" name='link' placeholder="@lang('site.please_enter_your_name')" required>
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">@lang('site.discuss_now')</label>
                                    <textarea class="form-control" id="body" name='body' placeholder="@lang('site.please_enter_your_question')" required></textarea>
                                </div>
                                <div class="input-group mb-5">
                                    <select name="project_type_id" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" required>
                                        <option selected>@lang('site.choose_your_domain')</option>
                                        @foreach($domains as $domain)
                                        <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-5">
                                    <select name="domain_id" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" required>
                                        <option selected>@lang('site.choose_your_project_type')</option>
                                        @foreach($project_type as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">@lang('site.image') </label>
                                    <input type="file" class="form-control" id="image" name='image' required>
                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-sub">@lang('site.save')</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </header>


        <div class="row">
            @foreach($projects as $project)
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="card mb-5">
                    <img src="{{ $project->image_path }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center ">
                        <a href="{{ route('frontend.projects.destroy' , $project->id) }}" class="card-link btn btn-sub2">@lang('site.delete')</a>
                    </div>
                </div>
            </div>

            @endforeach



        </div>

    </div>

</section>
@endsection

@section('script')
@endsection
