@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')
@endsection

@section('content')
<!-- Breadcrumbs advisor -->
<section class="breadcrumbs-connect">
    <div class="container">
      <div class="breadcrumb-text">
        <ol>
        <li><a class="breadcrumbs-link " href="{{ route('home') }}">Home</a></li>
        <li><a class="breadcrumbs-link" href="{{ route('about_us.index') }}">About</a></li>
        <li><a class="breadcrumbs-link " href="{{ route('services.index') }}">Services</a></li>
        </ol>
        <h2>connect</h2>
      </div>
    </div>
  </section>
  <!-- End Breadcrumbs -->

<!-- start find-advisor inner page -->
<section id="connect-inner" class="connect-inner">

  <div class="container" data-aos="fade-up">
  <div class="connect-inner-area">
    <header class="connect-inner-header text-center">
      <h2>menovahub  network</h2>
      <p> find your cofounder , advisor and freelancers  </p>
    </header>

    <div class="row">

      <div class="col-lg-6">
        @foreach($connects as $connect)
        <div class="text-box">
          <h3>{{ $connect->data->isNotEmpty() ? $connect->data->first()->title : '' }}</h3>
          <p></p>
        </div>
        @endforeach
      
        </div>

        <div class="col-lg-6">
          <form action="{{ route('connect.store') }}" method="post" class="connect-inner-form ">
            @csrf
            <div class="row gy-4">
                  <h2 class="text-center"> call for fund </h2>
              <div class="col-md-12 ">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="col-md-12 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>
<!-- 
              <div class="col-md-12">
                <textarea class="form-control" name="stage_of_busniess" rows="3" placeholder=" stage of business " required></textarea>
              </div> -->

              <div class="col-md-12">
                <textarea class="form-control" name="describe " rows="3" placeholder="skills can help you " required></textarea>
              </div>
<!-- 
              <div class="col-md-12">
                <textarea class="form-control" name="Briefly Describe Your Idea / Startup" rows="3" placeholder="Describe" required></textarea>
              </div> -->

              <div class="col-md-12">
                <textarea class="form-control" name="how can advisor help you" rows="3" placeholder="how can advisor help you" required></textarea>
              </div>



              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Send Message</button>
              </div>

            </div>
          </form>
        </div><!-- advisor form-->


      </div>
    </div>

  </div>
  </div>
</section>
<!-- end find-advisor inner page -->
@endsection

@section('script')
@endsection
