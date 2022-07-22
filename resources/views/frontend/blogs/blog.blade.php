@extends('frontend.layouts.master')

@section('title')
Menovahub - Blog
@endsection

@section('style')

@endsection

@section('content')
<section class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
      <li>@lang('site.blog')</li>
    </ol>
    <h2>@lang('site.blog')</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-8 entries">
        @foreach($blogs as $blog)
        <article class="entry">

          <div class="entry-img">
            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
          </div>

          <h2 class="entry-title">
            <a href="{{ route('blogs.show' , $blog->id) }}">{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : '' }}</a>
          </h2>
          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="/blog-single">{{ $blog->user->first_name }} {{ $blog->user->last_name }}</a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="/blog-single"><time datetime="2020-01-01">{{ date($blog->created_at) }}</time></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="/blog-single">12 Comments</a></li>
            </ul>
          </div>
          <div class="entry-content">
            <p>{!! $blog->data->isNotEmpty() ? $blog->data->first()->body : '' !!} </p>
            <div class="read-more">
              <a href="{{ route('blogs.show' , $blog->id) }}">@lang('site.read_more')</a>
            </div>
          </div>
        </article><!-- End blog entry -->
        @endforeach
        <div class="blog-pagination">
          {{ $blogs->links() }}
        </div>

      </div><!-- End blog entries list -->

      <div class="col-lg-4">

        <div class="sidebar">

          <h3 class="sidebar-title">@lang('site.search')</h3>
          <div class="sidebar-item search-form">
            <form action="{{ route('blog_search') }}" method="POST">
              @csrf

              <input type="text" name="slug">
              <button type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End sidebar search formn-->

          <h3 class="sidebar-title">@lang('site.blog')</h3>
          <div class="sidebar-item categories">
            <ul>
              @foreach($blogs as $blog)
              <li><a href="#">{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : '' }} </a></li>
              @endforeach
             
            </ul>
          </div><!-- End sidebar categories-->

          <h3 class="sidebar-title">@lang('site.recent_post')</h3>
          <div class="sidebar-item recent-posts">
            @foreach($blogs as $blog)
            <div class="post-item clearfix">
              <img src="{{ asset($blog->image) }}" alt="">
              <h4><a href="/blog-single">{{ $blog->title }}</a></h4>
              <time datetime="2020-01-01">{{ date($blog->created_at) }}</time>
            </div>
            @endforeach
          </div><!-- End blog entries list -->



        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>
</section><!-- End Blog Section -->

@section('script')

@endsection