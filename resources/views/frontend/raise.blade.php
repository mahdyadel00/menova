@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')
@endsection

@section('content')
 <!-- Breadcrumbs -->
 <section class="breadcrumbs">
    <div class="container">
      <div class="breadcrumb-text">
        <ol>
          <li><a href="/">Home</a></li>
          <li>Raise</li>
        </ol>
        <h2>Raise</h2>
      </div>
    </div>
  </section>
  <!-- End Breadcrumbs -->
  <!-- start raise inner page -->
<section id="raise" class="raise">

<div class="container" data-aos="fade-up">

  <header class="raise-header text-center">
    <h2>menova hub</h2>
    <p>fund find your founder </p>
  </header>

  <div class="row gy-4">

    <div class="col-lg-6">

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-award"></i>
            <h3>Funden AI</h3>
            <p>Eliminate the guesswork and find the right investors for your startup in minutes, not hours.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-award"></i>
            <h3>30,000+ Investor Profiles</h3>
            <p>Eliminate the guesswork and find the right investors for your startup in minutes, not hours.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-award"></i>
            <h3>30,000+ Investor Profiles</h3>
            <p>Eliminate the guesswork and find the right investors for your startup in minutes, not hours.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-award"></i>
            <h3>30,000+ Investor Profiles</h3>
            <p>Eliminate the guesswork and find the right investors for your startup in minutes, not hours.</p>
          </div>
        </div>
      </div>
    </div>

<!-- raise form-->
    <div class="col-lg-6">
      <form action="#" method="post" class="raise-form ">
        <div class="row gy-4">
              <h2 class="text-center"> call for fund </h2>
          <div class="col-md-12 ">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>

          <div class="col-md-12 ">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
          </div>

          <div class="col-md-12">
            <textarea class="form-control" name="Stage of Business" rows="6" placeholder=" stage of business " required></textarea>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name=" your revenu last 12 months" placeholder="" required>
          </div>

          <div class="col-md-12">
            <textarea class="form-control" name="Briefly Describe Your Idea / Startup" rows="6" placeholder="Describe" required></textarea>
          </div>

          <div class="col-md-12 text-center">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>

            <button type="submit">Send Message</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<!-- end raise inner page -->

@endsection

@section('script')
@endsection
