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
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{  $blog->data->isNotEmpty() ? $blog->data->first()->title: ' ' }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{ $blog->user->first_name }}  {{ $blog->user->last_name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ date($blog->created_at) }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html"></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>{!!  $blog->data->isNotEmpty() ? $blog->data->first()->title: ' ' !!}</p>


              <blockquote>
                  <p>
                   {!! $blog->data->isNotEmpty() ? $blog->data->first()->body : '' !!}
                  </p>
                </blockquote>  


                <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">


              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>  

            </article><!-- End blog entry -->

          <div class="blog-author d-flex align-items-center">
              <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
              <div>
                <h4>{{ auth()->user()->first_name }}  {{ auth()->user()->last_name }}</h4>
                <div class="social-links">
                  <a href="https://twitters.com/h"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/h"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/h"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div><!-- End blog author bio --> 


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
              <li><a href="#">{{ $blog->data->isNotEmpty() ? $blog->data->first()->title : '' }} </a></li>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">@lang('site.recent_post')</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="{{ $blog->image_path }}" alt="">
                  <h4><a href="blog-single.html">{{ $blog->title }}</a></h4>
                  <time datetime="2020-01-01">{{ date($blog->created_at) }}</time>
                </div>

                </div><!-- End sidebar recent posts-->

              <!-- <h3 class="sidebar-title">Tags</h3>
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
              </div> -->
              <!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->
@endsection

@section('script')
@endsection
