@extends('frontend.layouts.master')
@section('title')
    Menovahub - Blog
@endsection

@section('style')
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                <li><a href="{{ route('blogs.index') }}">@lang('site.blog')</a></li>
                <!-- <li>Blog Single</li> -->
            </ol>
            <h2>@lang('site.single_blog')</h2>

        </div>
    </section>

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{ $blog->image_path }}"
                                alt="{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : ' ' }}" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a
                                href="{{ route('blogs.show', $blog->id) }}">{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : ' ' }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">John Doe</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="blog-single.html">12 Comments</a></li>
                            </ul>
                        </div>

                        <div class="entry-content">

                            <h3>{!! $blog->data->isNotEmpty() ? $blog->data->first()->title : ' ' !!}</h3>
                            <p> {!! $blog->data->isNotEmpty() ? $blog->data->first()->body : '' !!} </p>


                        </div>
                    </article><!-- End blog entry -->


                    <div class="blog-comments">

                        <h4 class="comments-count"> @lang('site.comment') :{{ $comments->count() }}</h4>
                        @foreach ($comments as $comment)
                            <div id="comment-1" class="comment">
                                <div class="d-flex">

                                    <div>

                                        <h5>{{ $comment->name }}</h5>
                                        <time datetime="2020-01-01">{{ date($comment->created_at) }}</time>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div><!-- End comment #1 -->
                        @endforeach
                        @auth

                        <div class="reply-form">
                            <h4>@lang('site.leave_comment')</h4>
                            <p>{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : ' ' }}</p>
                            <form action="{{ route('blog_comment.store') }}">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input name="name" type="text" class="form-control"
                                            placeholder="@lang('site.your_name')*">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="@lang('site.leave_comment')*"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sub">@lang('site.post_comment')</button>

                            </form>

                        </div>
                       @endauth

                    </div><!-- End blog comments -->

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">@lang('site.search')</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">@lang('site.blog')</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="#">{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : '' }}
                                    </a></li>
                            </ul>
                        </div><!-- End sidebar blogs-->

                        <h3 class="sidebar-title">@lang('site.recent_post')</h3>
                        <div class="sidebar-item recent-posts">
                            <div class="post-item clearfix">
                                <img src="{{ $blog->image_path }}" alt="{{ $blog->title }}">
                                <h4><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h4>
                                <time datetime="2020-01-01">{{ date($blog->created_at) }}</time>
                            </div>

                        </div><!-- End sidebar recent posts-->
                        {{-- <h3 class="sidebar-title">Tags</h3>
                <div class="sidebar-item tags">
                  <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">IT</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Studio</a></li>
                    <li><a href="#">Smart</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div><!-- End sidebar tags--> --}}

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->
@endsection
@section('script')
@endsection
